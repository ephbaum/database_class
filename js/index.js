$( document ).ready( function() {

  (function(){
    // Create app object. It can do many things, probably.
    var app = {
    /**
     * A wrapper for AJAX requests to help with error handling.
     *
     * @param {!string} action the action to perform
     * @param {object=} parameters the data to send
     * @param {function(string)=} success the action to perform when the request
     *     succeeds
     */
    ajax: function( action ) {
      var type = typeof arguments[1];
      var parameters = (type === 'object') ? arguments[1] : {};
      var success = (type === 'function') ? arguments[1] : arguments[2];
      var error = (type === 'function') ? arguments[2] : arguments[3];

      parameters.action = action;

      var handleResponse = function( request, response ) {

          var code = parseInt(request.getResponseHeader('X-Application-Status')) || 0;
          if (request.status === 200) {
              if (code === 0) {
                  if (typeof success !== 'undefined') success(response);
                  return;  // it was successful, don't bother with error code
              } else if (code === 102) {
                  return;  // this action has been handled
              } else if (typeof error !== 'undefined' && error(code)) {
                  return;  // the custom callback handled it
              }
          }

          // if we get here, we had an unhandled exception - write some dang error handling.
          return;
      };

      $.ajax({
          type: 'POST',
          data: parameters,
          url: '/ajax/ajax.php',
          success: function(data, status, request) {
              handleResponse(request, data);
          },
          error: function(request, status) {
              handleResponse(request, null);
          }
      });
    },
    insert: function( value ) {
      // We're not using the this.ajax for these fuCKtions yet because... 
      // Well, because I want to get them working without the other voodoo first
      // Also, there's some callbacks and things that need to be written first.
      if ( typeof value === 'object' ) {
        $.ajax( {
          type: 'POST', 
          data: value,
          url: 'ajax/ajax.php',
          success: function( data, status, request ) {
            console.dir( arguments );
            console.log( data );
          },
          error: function( request, status ) {
            console.dir( arguments );
          }
        }, 'json'); 
      } else {
        console.error( 'Cannot submit ' + value + ' it is not an object it is a(n) ' + typeof value );
      }
    }
  };
  
  $('#insertSubmit').on( 'click', function( e ) { 
    e.preventDefault();
    submitInsert();
  });
  $('#insertValue').on( 'keydown', function( e ) {
    if ( e.which === 13 ){
      e.preventDefault();
      submitInsert();      
    }
  });
  
  function submitInsert() {
    var value = $('#insertValue').val();
    $('#insertValue').val('');
    if ( value !== '') {
      var postParams = {
        insert: value
      };
    console.dir( postParams );
    app.insert( postParams );
    }
  }
  })();
});
