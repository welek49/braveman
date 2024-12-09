<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <title>
        <?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?>
    </title>

    <meta charset="UTF-8">
    <meta name="description" content="<?php bloginfo('description'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php if (is_search()) : ?>
        <meta name="robots" content="noindex, nofollow">
    <?php endif; ?>

    <meta name="viewport" content="height=device-height, width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <?php
    /*
     * extended libs
     */
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree:wght@300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
    <link rel="stylesheet" type="text/css" media="screen" href="https://unpkg.com/photoswipe@5.2.2/dist/photoswipe.css">
    <?php wp_head(); ?>
</head>
<?php
/*
 * Get page options
 */

$menu_type = get_field('menu_type');
?>

<body <?php body_class($menu_type) ?>>

    <?php
        //an idea to discuss
        gtp('shared', 'symbols');
    ?>

    <div id="container">
        <?= gtp('shared', 'navigation') ?>
        <main class="fullwidth">
            <div class="content">