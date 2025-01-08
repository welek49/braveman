<?php
$display_preview = show_preview($block, $is_preview);
if ($display_preview) return;

$visibility = !empty(get_field('read-more_block_visibility') && is_array(get_field('read-more_block_visibility'))) ? implode(' ', get_field('read-more_block_visibility')) : '';
$add_class = isset($block['className']) ? $block['className'] : null;
$class_key = generateRandomString(10);
$content = get_field('read-more_content') ?? null;
$height_collapsed = get_field('height_collapsed') ?? '750';
$label_read_more = get_field('read-more_label_read_more') ?? 'Read more';
$label_read_less = get_field('read-less_label_read_more') ?? 'Read more';
$color_bottom_gradient = get_field('read-more_color_bottom_gradient') ?? 'rgba(255, 255, 255, 0)';
$color_label = get_field('read-more_color_label') ?? 'rgba(255, 255, 255, 1)';
?>
<script>
    const labelReadMore = < ? php echo json_encode($label_read_more); ? > ;
    const labelReadLess = < ? php echo json_encode($label_read_less); ? > ;
    const heightReadMore = < ? php echo json_encode((int) $height_collapsed); ? > ;
</script>
<style>
    .<?=$class_key ?>.read-more:after {
        background: linear-gradient(180deg,
                rgba(255, 255, 255, 0) 0%,
                <?=$color_bottom_gradient ?> 85%);
    }

    .<?=$class_key . ' '?>.read-more__label {
        color: <?=$color_label ?>;
    }
</style>

<div class="read-more <?= $add_class ?> <?= $visibility ?> <?= $class_key ?>">
    <?php if ($content) : ?>
    <div class="read-more__content">
        <?= $content ?>
    </div>
    <?php endif; ?>
</div>