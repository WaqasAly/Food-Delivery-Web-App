var NotyJgrowl = function () {


    //
    // Setup module components
    //

    // Noty.js examples
    var _componentNoty = function () {
        if (typeof Noty == 'undefined') {
            console.warn('Warning - noty.min.js is not loaded.');
            return;
        }

        // Override Noty defaults
        Noty.overrideDefaults({
            theme: 'limitless',
            layout: 'topRight',
            type: 'alert',
            timeout: 2500
        });
        // Warning
        $('#noty_warning').jGrowl("This will be prepended before the last message.",{
            new :Noty({
                text: 'Warning! Best check yo self, you\'re not looking too good.',
                type: 'warning'
            }).show(),
        });
    };

    //
    // Return objects assigned to module
    //

    return {
        init: function () {
            _componentNoty();
            _componentJgrowl();
        }
    }
}();


// Initialize module
// ------------------------------

document.addEventListener('DOMContentLoaded', function () {
    NotyJgrowl.init();
});
