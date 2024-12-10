<?php

$header_logo = get_field('header_logo', 'option') ? get_field('header_logo', 'option') : null;
$menu_position = get_field('menu_position') ? get_field('menu_position') : null;
$facebook = get_field('facebook_link', 'option') ? get_field('facebook_link', 'option') : null;
$instagram = get_field('instagram_link', 'option') ? get_field('instagram_link', 'option') : null;

if (is_singular('post')) {
    $menu_position = true;
}

?>
<header class="fullwidth <?= $menu_position ? '--absolute' : '' ?>">

    <?php
    /*
    *
    * Widget - menu top
    *
    */
    if (is_active_sidebar("menu-top")) :
    ?>
        <div class="fullwidth flex vertical vertical__center header-top"><?php dynamic_sidebar("menu-top"); ?></div>
    <?php endif ?>
    <div class="header fullwidth">
        <div class="header__content boxwidth">
            <div class="header__content--left">
                <a href="<?= get_home_url() ?>" class="header__logo">
                    <?php if ($header_logo) : ?>
                        <img src="<?= $header_logo['url'] ?>" alt="Logo <?= get_home_url() ?>"/>
                    <?php else : ?>
                        LOGO
                    <?php endif ?>
                </a>
            </div>
            <div class="header__content--right">
                <nav class="header__nav">
                    <?php
                    if (has_nav_menu('header-menu')) {
                        wp_nav_menu(array(
                            'names' => 'Header menu',
                            'theme_location' => 'header-menu',
                            'container' => '',
                            'menu_id' => '',
                            'link_before' => '',
                            'link_after' => '',
                            'menu_class' => ''
                        ));
                    }
                    ?>
                </nav>
                <div class="header__social">
                    <?php if ($facebook) : ?>
                        <a href="<?= $facebook ?>" target="_blank"><svg>
                                <use href="#facebook" />
                            </svg></a>
                    <?php endif;
                    if ($instagram) : ?>
                        <a href="<?= $instagram ?>" target="_blank"><svg>
                                <use href="#instagram" />
                            </svg></a>
                    <?php endif; ?>
                </div>
                <?php
                /*
                *
                * Widget - before hamurger
                * Remove it for adding custom elements(e.g. icons from sumbols.php)
                *
                */
                if (is_active_sidebar("before-hamburger")) :
                ?>

                    <div class=""><?php dynamic_sidebar("before-hamburger"); ?></div>
                <?php endif ?>
                <div class="header__hamburger">
                    <div class="header__hamburger--stick"></div>
                    <div class="header__hamburger--stick"></div>
                    <div class="header__hamburger--stick"></div>
                </div>
                <?php
                /*
                *
                * Widget - after hamurger
                * Remove it for adding custom elements(e.g. icons from sumbols.php)
                *
                */
                if (is_active_sidebar("after-hamburger")) :
                ?>
                    <div class=""><?php dynamic_sidebar("after-hamburger"); ?></div>
                <?php endif ?>
            </div>
        </div>
    </div>
    <?php
    /*
    *
    * Widget - menu bottom
    *
    */
    if (is_active_sidebar("menu-bottom")) :
    ?>
        <div class="fullwidth flex vertical vertical__center header-bottom"><?php dynamic_sidebar("menu-bottom"); ?></div>
    <?php endif; ?>
</header>