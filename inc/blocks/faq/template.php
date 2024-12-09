<?php
$display_preview = show_preview($block, $is_preview);
if ($display_preview) return;

$visibility = !empty(get_field('faq_block_visibility') && is_array(get_field('faq_block_visibility'))) ? implode(' ', get_field('faq_block_visibility') ) : '';
$add_class = isset($block['className']) ? $block['className'] : null;
$spaces = get_field('faq_styles_space_settings') ? str_replace('none', '', implode(' ', get_field('faq_styles_space_settings'))) : null;
$faqs = get_field('faqs') ? get_field('faqs') : null;
?>

<div class="bn-faq <?= $spaces ?> <?= $add_class ?> <?= $visibility ?>">
    <?php if ($faqs) : ?>
        <div class="faq-list">
            <?php foreach ($faqs as $faq) : ?>
                <div class="faq-list__tab">
                    <h3 class="faq-list__tab--question"><?= $faq['question'] ?></h3>
                    <div class="faq-list__tab--answer">
                        <div class="faq-list__tab--text"><?= $faq['answer'] ?></div>

                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>