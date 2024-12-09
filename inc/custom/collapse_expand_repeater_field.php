<?php 

if(class_exists('acf') && !function_exists('collapse_button_for_acf_repeater') && !function_exists('collapse_repeater_button_scripts')) {
    function collapse_button_for_acf_repeater($field) {
        if(isset($field['collapsed']) && $field['collapsed']):
            ?>
            <div style="display: flex; flex-wrap: wrap; justify-content: space-between; column-gap: 10px;">
                <button class="acf-collapse-repeater-button acf-button button" style="margin-bottom: 10px; display: inline-block; min-width: 200px; flex: 1;"><?= esc_html__('Collapse all repeater fields', 'textdomain') ?></button>
                <button class="acf-show-repeater-button acf-button button" style="margin-bottom: 10px; display: inline-block; min-width: 200px; flex: 1;"><?= esc_html__('Expand all repeater fields', 'textdomain') ?></button>
            </div>
            <?php
        endif;
    }
    add_action('acf/render_field/type=repeater', 'collapse_button_for_acf_repeater', 9, 1 );

    function collapse_repeater_button_scripts() {
        // Enqueue js
        wp_enqueue_script('acf-collapse-expand-repeater-button', get_template_directory_uri() . '/tmp/shared/editor/js/collapse-expand-repeater-field.js', array('jquery'), '1.0', true);
    }

    add_action('acf/input/admin_enqueue_scripts', 'collapse_repeater_button_scripts');
    
}