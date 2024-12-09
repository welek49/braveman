jQuery(document).ready(function($) {
    // Delegate the event
    $(document).on('click', '.acf-collapse-repeater-button',function() {
        // Collapse all fields, if any of the items is collapsible.
        let isCollapsible = ($(this).closest('.acf-input').find('.-collapsed-target').length > 0);
        if(isCollapsible) {
            $(this).closest('.acf-input').find('.acf-row').addClass('-collapsed');
        } 
    });
    $(document).on('click', '.acf-show-repeater-button',function() {
        // Expand all fields, if any of the items is collapsible.
        let isCollapsible = ($(this).closest('.acf-input').find('.-collapsed').length > 0);
        if(isCollapsible) {
            $(this).closest('.acf-input').find('.acf-row').removeClass('-collapsed');
        } 
    });
});
