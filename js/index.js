/**
 * We're using $.ready for everything because... jQuery.
 **/

$( document ).ready( function() {

  /**
   * We're wrapping all things in an anonymous function because
   * they're just... just so neat.
   **/
  
  ( function() {
    /**
     * Here be an object called crud... it does things, many things.
     * Mostly it handles the $.ajax requests for the CRUD functions. 
     **/

    var crud = {
      
      ajax: function( params, method ) {
        if ( typeof params === 'object' ) {
          $.ajax( {
            type: method, 
            data: params,
            url: 'ajax/ajax.php',
            success: function( data, status, request ) {
              console.log( 'ajax success: ' + data );
              return data;
            },
            error: function( request, status ) {
              console.log( 'ajax error: ' + status );
              return status;
            }
          }, 'json'); 
        } else {
          console.log( 'invalid' );
          return 'invalid';
        }
      },
      create: function( params ) {
        var response = this.ajax( params, 'POST' );
        console.log( response );
        if ( response === 'error' || response === 'invalid' ){
          console.error( 'error in request' );
        } else {
          console.dir( response );
        }
      },
      read: function() {
        var read = { read: true };
        var response = this.ajax( read, 'GET' );        
      },
      search: function( params ) {
        if ( typeof params === 'object' ) {
          var response = this.ajax( params, 'POST' );
        } else {
          console.error( 'There was an error with your request' );
        }
        if ( response === 'error' || response === 'invalid' ){
          console.error( 'error in request' );
        } else {
          console.dir( response );
        }
      },
      update: function( params ) {
        var response = this.ajax( params, 'POST' );
        if ( response === 'error' || response === 'invalid' ){
          console.error( 'error in request' );
        } else {
          console.dir( response );
        }
      },
      delete: function( params ) {
        var response = this.ajax( params, 'POST' );
        if ( response === 'error' || response === 'invalid' ){
          console.error( 'error in request' );
        } else {
          console.dir( response );
        }
      }
    };

    /**
     * Add listeners
     **/

    $( '#insertSubmit' ).on( 'click', function( e ) { 
      e.preventDefault();
      var value = $( '#insertValue' ).val();
      if ( value !== '' ) {
        var postParams = { create: value };
        crud.create( postParams );
        $( '#insertValue' ).val( '' );
      }
    });
    $( '#insertValue' ).on( 'keydown', function( e ) {
      if ( e.which === 13 ){
        e.preventDefault();
        var value = $( '#insertValue' ).val();
        if ( value !== '' ) {
          var postParams = { create: value };
          crud.create( postParams );
          $( '#insertValue' ).val( '' );
        }
      }
    });
    $( '#readSubmit' ).on( 'click', function( e ) {
      e.preventDefault();
      crud.read();
    });
    $( '#readValueSubmit').on( 'click', function( e ) {
      e.preventDefault();
      var value = $( '#readValue' ).val();
      if ( value !== '' ) {
        var postParams = { search: value };
        crud.search( postParams );
        $( '#readValue' ).val( '' );
      }
    });
    $( '#readValue' ).on( 'keydown', function( e ) {
      if ( e.which === 13 ) {
        e.preventDefault();
        var value = $( '#readValue' ).val();
        if ( value !== '' ) {
          var postParams = { search: value };
          crud.search( postParams );
          $( '#readValue' ).val( '' );
        }
      }
    });
    $( '#updateSubmit' ).on( 'click', function( e ) {
      e.preventDefault();
      var value = $( '#updateValue' ).val();
      var newValue = $( '#updateNewValue' ).val();
      if ( value !== '' && newValue !== '' ) {
        postParams = { update: value, to: newValue };
        crud.update( postParams );
        $( '#updateValue, #updateNewValue' ).val( '' );
      }
    });
    $( '#updateValue, #updateNewValue' ).on( 'keydown', function( e ) {
      if ( e.which === 13 ){
        var value = $( '#updateValue' ).val();
        var newValue = $( '#updateNewValue' ).val();
        if ( value !== '' && newValue !== '' ) {
          postParams = { update: value, to: newValue };
          crud.update( postParams );
          $( '#updateValue, #updateNewValue' ).val( '' );
        }
      }
    });
    $( '#deleteSubmit' ).on( 'click', function( e ) {
      e.preventDefault();
      var value = $( '#deleteValue' ).val();
      if ( value !== '' ) {
        var postParams = { delete: value };
        crud.delete( postParams );
        $( '#deleteValue' ).val( '' );
      }
    });
    $( '#deleteValue' ).on( 'keydown', function( e ) {
      if ( e.which === 13) {
        e.preventDefault();
        var value = $( '#deleteValue' ).val();
        if ( value !== '' ) {
          var postParams = { delete: value };
          crud.delete( postParams );
          $( '#deleteValue' ).val( '' );
        }
      }
    });

  })();
});
