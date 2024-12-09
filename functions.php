<?php

/**
 *
 * Define global values
 *
 */

define('CONFIG', dirname(__FILE__) . '/inc/config/');
define('INC', dirname(__FILE__) . '/inc/');
define('CPT', dirname(__FILE__) . '/inc/cpt/');
define('BLOCKS', dirname(__FILE__) . '/inc/blocks/');
define('CUSTOM', dirname(__FILE__) . '/inc/custom/');
define('SHORTCODES', dirname(__FILE__) . '/inc/shortcodes/');
define('TMP', dirname(__FILE__) . '/tmp/');
define('TMPSHARED', dirname(__FILE__) . '/tmp/shared/');
define('IMAGES', get_template_directory_uri() . '/dist/img/');
define('ASSETS', get_template_directory_uri() . '/assets/');
define('WEBSITE_NAME', get_bloginfo('name'));
define('VER', is_string(wp_get_theme()->get('Version')) ? wp_get_theme()->get('Version') : false);

/*
*
*   Import all .php files from destination
*
*   @param string $path path to folder with php files
*
*
*/
function importFilesFromFolder($path)
{
    foreach (glob($path . "*.php") as $filename) {
        include $filename;
    }
}

function gtp($dir, $file_name)
{
    return get_template_part('tmp/' . $dir . '/' . $file_name);
}

importFilesFromFolder(CONFIG);
importFilesFromFolder(CPT);
importFilesFromFolder(CUSTOM);
importFilesFromFolder(SHORTCODES);
importFilesFromFolder(BLOCKS);
