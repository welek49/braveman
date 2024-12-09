<?php
$display_preview = show_preview($block, $is_preview);
if ($display_preview) return;

$visibility = !empty(get_field('testimonials_block_visibility') && is_array(get_field('testimonials_block_visibility'))) ? implode(' ', get_field('testimonials_block_visibility')) : '';
$add_class = isset($block['className']) ? $block['className'] : null;
$testimonials = get_field('testimonials_list') ? get_field('testimonials_list') : null;
?>

<div class="testimonials-slider <?= $add_class ?> <?= $visibility ?>">
    <?php if ($testimonials) : ?>
        <div class="testimonials-slider__wrapper">
            <?php foreach ($testimonials as $testimonial) :
                $text = $testimonial['testimonial_text'];
                $name = $testimonial['testimonial_signature'];
                $position = $testimonial['testimonial_position'];
                $image = $testimonial['testimonial_image'];
            ?>
                <div>
                    <div class="testimonials-slider__slide">
                        <div class="testimonials-slider__slide-image">
                            <?php if ($image) : ?>
                                <div class="testimonials-slider__slide-image--frame">
                                    <?php
                                    echo wp_get_attachment_image($image, 'medium');
                                    ?>
                                </div>
                                <svg class="testimonials-slider__slide-image--ico">
                                    <use href="#quote" />
                                </svg>
                            <?php endif; ?>
                        </div>
                        <p class="testimonials-slider__slide-text"><?= $text ?></p>
                        <div class="testimonials-slider__slide-author">
                            <p class="testimonials-slider__slide-name"><?= $name ?></p>
                            <?php if ($position) : ?>
                                <p class="testimonials-slider__slide-position"><?= $position ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>