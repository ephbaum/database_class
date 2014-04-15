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
              crud.callback( data );
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
          return response;
        }
      },
      read: function() {
        var read = { read: true };
        this.requestType = 'read';
        this.ajax( read, 'GET' );
      },
      search: function( params ) {
        if ( typeof params === 'object' ) {
          this.reqeustType = 'read';
          this.ajax( params, 'POST' );
        } else {
          console.error( 'There was an error with your request' );
        }
      },
      update: function( params ) {
        var response = this.ajax( params, 'POST' );
        if ( response === 'error' || response === 'invalid' ){
          console.error( 'error in request' );
        } else {
          return response;
        }
      },
      delete: function( params ) {
        var response = this.ajax( params, 'POST' );
        if ( response === 'error' || response === 'invalid' ){
          console.error( 'error in request' );
        } else {
          return response;
        }
      },
      callback: function( data ) {
        data = JSON.parse( data );
        if ( this.requestType === 'read' ) {
          $( '#readResults' ).fadeOut( 'fast' );
          $( '#readInsert' ).html( '' );
          var html = '<thead><tr><th>id</th><th>data</th></tr></thead>\n<tbody>\n';
          data.forEach( function( el, idx, arr ) {
            html += '<tr><td>' + el.id + '</td><td>' + el.data + '</td></tr>\n';
          });
          html += '</tbody>\n'
          $( '#readInsert').append(html);
          $( '#readResults' ).fadeIn();
        }
      },
      requestType: ''
    };

    /**
     * Add listeners
     **/

    $( '#insertSubmit' ).on( 'click', function( e ) { 
      e.preventDefault();
      var value = $( '#insertValue' ).val();
      if ( value !== '' ) {
        var postParams = { create: value };
        result = crud.create( postParams );
        $( '#insertValue' ).val( '' );
      }
    });
    $( '#insertValue' ).on( 'keydown', function( e ) {
      if ( e.which === 13 ){
        e.preventDefault();
        var value = $( '#insertValue' ).val();
        if ( value !== '' ) {
          var postParams = { create: value };
          result = crud.create( postParams );
          $( '#insertValue' ).val( '' );
        }
      }
    });
    $( '#readSubmit' ).on( 'click', function( e ) {
      e.preventDefault();
      window.result = crud.read();
    });
    $( '#readValueSubmit').on( 'click', function( e ) {
      e.preventDefault();
      var value = $( '#readValue' ).val();
      if ( value !== '' ) {
        var postParams = { search: value };
        result = crud.search( postParams );
        $( '#readValue' ).val( '' );
      }
    });
    $( '#readValue' ).on( 'keydown', function( e ) {
      if ( e.which === 13 ) {
        e.preventDefault();
        var value = $( '#readValue' ).val();
        if ( value !== '' ) {
          var postParams = { search: value };
          result = crud.search( postParams );
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
        result = crud.update( postParams );
        $( '#updateValue, #updateNewValue' ).val( '' );
      }
    });
    $( '#updateValue, #updateNewValue' ).on( 'keydown', function( e ) {
      if ( e.which === 13 ){
        var value = $( '#updateValue' ).val();
        var newValue = $( '#updateNewValue' ).val();
        if ( value !== '' && newValue !== '' ) {
          postParams = { update: value, to: newValue };
          result = crud.update( postParams );
          $( '#updateValue, #updateNewValue' ).val( '' );
        }
      }
    });
    $( '#deleteSubmit' ).on( 'click', function( e ) {
      e.preventDefault();
      var value = $( '#deleteValue' ).val();
      if ( value !== '' ) {
        var postParams = { delete: value };
        result = crud.delete( postParams );
        $( '#deleteValue' ).val( '' );
      }
    });
    $( '#deleteValue' ).on( 'keydown', function( e ) {
      if ( e.which === 13) {
        e.preventDefault();
        var value = $( '#deleteValue' ).val();
        if ( value !== '' ) {
          var postParams = { delete: value };
          result = crud.delete( postParams );
          $( '#deleteValue' ).val( '' );
        }
      }
    });
  })();
});
