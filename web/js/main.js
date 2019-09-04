(function($, window) {
    'use strict';

    var pluginName = 'Books',
        privMethods = {},
        methods = {};

    //-----[ private methods ]--------------------------------------------------

    /**
     * Initialize plugin.
     *
     * @param options
     * @return
     * @memberOf init
     */
    privMethods.init = function(options) {
        console.log('Initializing plugin -> ' + pluginName);     
        
        methods.loadJQui();
        
        return this;
    };

    //-----[ public methods ]--------------------------------------------------
    
    /**
     * Load jquery UI components
     *
     * @return
     */
    methods.loadJQui = function() {
        $(".datepicker").datepicker({dateFormat: 'yy-mm-dd'});
    };
    
  

    $[pluginName] = function(method) {
        // Method calling logic
        if (methods[method]) {
            console.log('Method requested: ' + method);
            return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method) {
            return privMethods.init.apply(this, arguments);
        } else {
            console.error('The method ' + method + ' does not exist in jQuery.' + pluginName + '!');
        }
    };

}(jQuery, window));

