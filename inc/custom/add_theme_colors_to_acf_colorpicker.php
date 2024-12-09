<?php
function add_theme_colors_to_acf_colorpicker() { ?>
    <script type="text/javascript">
        (function($) {
            acf.add_filter('color_picker_args', function( $args, $field ){

                const $settings = wp.data.select( "core/editor" ).getEditorSettings();

                let $colors = $settings.colors.map(x => x.color);

                if ($settings && $settings.colors.length > 0) {
                    $args.palettes = $settings.colors.map(x => x.color);
                }

                return $args;
            });
        })(jQuery);
    </script>
<?php 
}
add_action('acf/input/admin_footer', 'add_theme_colors_to_acf_colorpicker');

/**
 * Customize TinyMCE text color picker.
 * Filter: tiny_mce_before_init
 *
 * @param  array $init Initialiation array for TinyMCE
 * @return array
 */
function add_colors_from_theme_to_tinymce( $init ) {
	$color_palette = [];
    if ( class_exists( 'WP_Theme_JSON_Resolver' ) ) {
        $settings = WP_Theme_JSON_Resolver::get_theme_data()->get_settings();
        if ( isset( $settings['color']['palette']['theme'] ) ) {
            $color_palette = $settings['color']['palette']['theme'];
        }
    }
	
	// Create empty Array for Colour Values
	$colors_custom = array();

	// Loop through each Colour and grab the Colours Hex Value
	foreach ( $color_palette as $color_value ) {

		// Get Colour value, remove '#' & add it to the Array
		$colors_custom[] = str_replace( '#', '', $color_value['color'] );

		// Get Colour name & add it to the Array
		$colors_custom[] = $color_value['name'];
	}

	/**
	 * I like the custom colors to take up the entire
	 * first row. However, if there are only a few colors,
	 * the color picker becomes too narrow and tall,
	 * so this adds blank squares to help stretch it out.
	 * This block can be removed if you don't want placeholders
	 */
	$_num_of_cols = 8;
	while ( count( $colors_custom ) / 2 < $_num_of_cols ) {
		$colors_custom[] = '_hide';
		$colors_custom[] = '';
	}
	
	/**
	 * Original colors.
	 * @see wp-includes/js/timemce/langs/wp-langs-en.js
	 */
	$colors_original = array(
		'000000', 'Black',
		'993300', 'Burnt orange',
		'333300', 'Dark olive',
		'003300', 'Dark green',
		'003366', 'Dark azure',
		'000080', 'Navy Blue',
		'333399', 'Indigo',
		'333333', 'Very dark gray',
		'800000', 'Maroon',
		'FF6600', 'Orange',
		'808000', 'Olive',
		'008000', 'Green',
		'008080', 'Teal',
		'0000FF', 'Blue',
		'666699', 'Grayish blue',
		'808080', 'Gray',
		'FF0000', 'Red',
		'FF9900', 'Amber',
		'99CC00', 'Yellow green',
		'339966', 'Sea green',
		'33CCCC', 'Turquoise',
		'3366FF', 'Royal blue',
		'800080', 'Purple',
		'999999', 'Medium gray',
		'FF00FF', 'Magenta',
		'FFCC00', 'Gold',
		'FFFF00', 'Yellow',
		'00FF00', 'Lime',
		'00FFFF', 'Aqua',
		'00CCFF', 'Sky blue',
		'993366', 'Brown',
		'C0C0C0', 'Silver',
		'FF99CC', 'Pink',
		'FFCC99', 'Peach',
		'FFFF99', 'Light yellow',
		'CCFFCC', 'Pale green',
		'CCFFFF', 'Pale cyan',
		'99CCFF', 'Light sky blue',
		'CC99FF', 'Plum',
		'FFFFFF', 'White',
	);
	
	// Create complete colors array with custom and original colors
	$colors = array_merge( $colors_custom, $colors_original );

	/**
	 * Begin textcolor parameters for TinyMCE plugin.
	 * @link https://www.tinymce.com/docs/plugins/textcolor/
	 */
	$init['textcolor_map'] 	= json_encode( $colors );

	/**
	 * Colors are displayed in a grid of columns and rows.
	 * Set the number of columns to match the number of custom colors,
	 * this way our colors make up the first row so they're easier to identify quickly.
	 * Halve the count since each color has two array entries.
	 */
	$init['textcolor_cols'] = count( $colors_custom ) / 2;
	
	// Set number of rows
	$init['textcolor_rows'] = ceil( ( ( count( $colors ) / 2 ) + 1 ) / $init['textcolor_cols'] );

	return $init;
}
add_filter( 'tiny_mce_before_init', 'add_colors_from_theme_to_tinymce' );

/**
 * Adjust TinyMCE custom color styling grid
 * Action: admin_head
 */
function improve_timymce_custom_colors_styles () { ?>
	<style type="text/css">
		/* Add padding after first row */
		.mce-colorbutton-grid tr:first-of-type td {
			padding-bottom: 10px;
		}

		/* Hide the filler blocks */
		.mce-colorbutton-grid tr:first-of-type td div[data-mce-color="#_hide"] {
			visibility: hidden;
		}

		/* Fix spacing issue with the "transparent" block */
		.mce-colorbtn-trans div {
		    line-height: 11px !important;
		}
	</style>
<?php }
add_action( 'admin_head', 'improve_timymce_custom_colors_styles' );

