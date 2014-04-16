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
        this.requestType = 'create';
        this.ajax( params, 'POST' );
      },
      read: function() {
        var read = { read: true };
        this.requestType = 'read';
        this.ajax( read, 'GET' );
      },
      search: function( params ) {
        this.requestType = 'search';
        this.ajax( params, 'POST' );
      },
      update: function( params ) {
        this.requestType = 'update';
        this.ajax( params, 'POST' );
      },
      delete: function( params ) {
        this.requestType = 'delete';
        this.ajax( params, 'POST' );
      },
      delete_all: function() {
        var deleteItAll = { delete_all: true };
        this.requestType = 'delete'
        this.ajax( deleteItAll, "POST" );
      },
      callback: function( response ) {
        var data = JSON.parse( response );
        var type = this.requestType;

        if ( type === 'create' || type === 'update' || type === 'delete' ) {
          $( '#'+type+'Submit' ).toggleClass( 'btn-primary' ).toggleClass( 'btn-success' );
          console.log( data );
          var html = 'Successfully '+type+'d ' + data + ' database entr' + (( data == 1 ) ? 'y' : 'ies') + '.';
          $( '#'+type+'Insert' ).html( html );
          $( '#'+type+'Results' ).fadeIn( function() {
            setTimeout( function() { 
              $( '#'+type+'Submit' ).toggleClass( 'btn-primary' ).toggleClass( 'btn-success' );
              $( '#'+type+'Results' ).fadeOut( 'fast' );
              $( '#'+type+'Insert' ).html('');
            }, 2000);
          });
        }
        if ( type === 'read' || type === 'search' ) {
          if ( type === 'read' ) $( '#readSubmit' ).toggleClass( 'btn-primary' ).toggleClass( 'btn-success' );
          if ( type === 'search' ) $( '#readValueSubmit' ).toggleClass( 'btn-primary' ).toggleClass( 'btn-success' );
          $( '#readResults:visible' ).fadeOut( 'fast' );
          $( '#readInsert' ).html( '' );
          var html = '<thead><tr><th>id</th><th>data</th></tr></thead>\n<tbody>\n';
          data.forEach( function( el, idx, arr ) {
            html += '<tr><td>' + el.id + '</td><td>' + el.data + '</td></tr>\n';
          });
          html += '</tbody>\n'
          $( '#readInsert').append(html);
          $( '#readResults' ).fadeIn( function() {
            if ( type === 'read' ) $( '#readSubmit' ).toggleClass( 'btn-primary' ).toggleClass( 'btn-success' );
            if ( type === 'search' ) $( '#readValueSubmit' ).toggleClass( 'btn-primary' ).toggleClass( 'btn-success' );
          });
        }        
      },
      requestType: ''
    };

    /**
     * Add listeners
     **/

    $( '#createSubmit' ).on( 'click', function( e ) { 
      e.preventDefault();
      var value = $( '#createValue' ).val();
      if ( value !== '' ) {
        var postParams = { create: value };
        result = crud.create( postParams );
        $( '#createValue' ).val( '' );
      }
    });
    $( '#createValue' ).on( 'keydown', function( e ) {
      if ( e.which === 13 ){
        e.preventDefault();
        var value = $( '#createValue' ).val();
        if ( value !== '' ) {
          var postParams = { create: value };
          result = crud.create( postParams );
          $( '#createValue' ).val( '' );
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
    $( '#deleteAll' ).on( 'click', function( e ) {
      e.preventDefault();
      if (window.confirm( "Are you sure you want to delete everything in the database?" )) {
        crud.delete_all();
      }
    })
  })();
});
