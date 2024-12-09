<?php
$display_preview = show_preview($block, $is_preview);
if ($display_preview) return;

$visibility = !empty(get_field('person_slider_block_visibility') && is_array(get_field('person_slider_block_visibility'))) ? implode(' ', get_field('person_slider_block_visibility') ) : '';
$add_class = isset($block['className']) ? $block['className'] : null;
$persons = get_field('persons') ? get_field('persons') : null;

if ($persons) : ?>
    <div class="person-slider <?= $visibility ?>">
        <div class="person-slider__wrapper">
            <div class="person-slider__slides">
                <?php foreach ($persons as $person) : ?>
                    <?php
                    $image = get_field('image', $person);
                    $name = get_field('name', $person);
                    $position = get_field('position', $person);
                    $desc = get_field('description', $person);
                    $email = get_field('email', $person);
                    ?>
                    <div class="person-slider__slides--slide">
                        <div class="person-tile fullwidth">
                            <div class="person-tile__image-wrapper">
                                <?php if ($image) : ?>
                                    <img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>" class="person-tile__image">
                                <?php endif; ?>
                            </div>
                            <?php if ($name) : ?>
                                <h4 class="person-tile__name"><?= $name ?></h4>
                            <?php endif;
                            if ($position) : ?>
                                <p class="person-tile__position"><?= $position ?></p>
                            <?php endif;
                            if ($desc) : ?>
                                <p class="person-tile__desc"><?= $desc ?></p>
                            <?php endif;
                            if ($email) : ?>
                                <a href="<?= $is_preview ? '#void' : ("mailto:" . $email) ?>" class="person-tile__email"><?= $email ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>

<?php endif ?>