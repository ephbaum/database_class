// Create app object. It can do many things, probably.
var app = {};



/**
 * A wrapper for AJAX requests to help with error handling.
 *
 * @param {!string} action the action to perform
 * @param {object=} parameters the data to send
 * @param {function(string)=} success the action to perform when the request
 *     succeeds
 */
app.ajax = function( action ) {
    var type = typeof arguments[1];
    var parameters = (type === 'object') ? arguments[1] : {};
    var success = (type === 'function') ? arguments[1] : arguments[2];
    var error = (type === 'function') ? arguments[2] : arguments[3];

    parameters['action'] = action;

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
};