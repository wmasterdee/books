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
        methods.booksControl();
        methods.authorsControl();
        
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
    
    /**
     * Methods to work with books
     *
     * @return
     */
    methods.booksControl = function() {
        var booksList = $('.books_list');
        
        booksList.find('.control_remove').unbind('click').click(function() {
            var r = confirm("Remove book?"),
                bookId = $(this).data('id');
            if (r == true) {
                methods.url_post(
                        'index.php?r=admin/removebook', 
                        {
                            id : bookId
                        },
                        function() {
                            booksList.find('.book_'+bookId).hide(1000);
                        }
                );
            }
            return false;
        });
        
        booksList.find('.control_edit').unbind('click').click(function() {
            var bookId = $(this).data('id'),
                site_url = $('body').data('url'),
                full_url = site_url+'/index.php?r=admin/addbook&id='+bookId;
                
            window.location = full_url;    
            return false;
        });
    };
    
    /**
     * Methods to work with authors
     *
     * @return
     */
    methods.authorsControl = function() {
        var authorsList = $('.authors_list');
        
        authorsList.find('.control_remove').unbind('click').click(function() {
            var r = confirm("Remove author and his books?"),
                authorsId = $(this).data('id');
            if (r == true) {
                methods.url_post(
                        'index.php?r=admin/removeauthors', 
                        {
                            id : authorsId
                        },
                        function() {
                            authorsList.find('.author_'+authorsId).hide(1000);
                        }
                );
            }
            return false;
        });
        
        authorsList.find('.control_edit').unbind('click').click(function() {
            var authorsId = $(this).data('id'),
                site_url = $('body').data('url'),
                full_url = site_url+'/index.php?r=admin/addauthor&id='+authorsId;
                
            window.location = full_url;    
            return false;
        });
    };
    
     /**
     * Method to make post
     *
     * @return
     */
    methods.url_post = function(url, data, callbacks) {    
        var site_url = $('body').data('url'),
            full_url = site_url+'/'+url;
    
        $.ajax({
            url: full_url,
            type: "POST",
            data: data,
            success: function(data) {
                callbacks(data);
            }
        }).fail(function(data) {

        });
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

