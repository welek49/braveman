<?php
$display_preview = show_preview($block, $is_preview);
if ($display_preview) return;

$visibility = !empty(get_field('video_block_visibility') && is_array(get_field('video_block_visibility'))) ? implode(' ', get_field('video_block_visibility') ) : '';
$add_class = isset($block['className']) ? $block['className'] : null;
$spaces = get_field('video_styles_space_settings') ? str_replace('none', '', implode(' ', get_field('video_styles_space_settings'))) : null;
$video_url = get_field('video_url') ? get_field('video_url') : null;

if ($video_url) :
    $id = '';
    if (str_contains($video_url, 'embed/')) {
        $id = strstr($video_url, 'embed/');
        $id = str_replace('embed/', '', $id);
    }
    $thumbnail = get_field('video_thumbnail') ? get_field('video_thumbnail') : 'https://img.youtube.com/vi/' . $id . '/hqdefault.jpg';
?>

    <div class="bn-video <?= $spaces ?> <?= $add_class ?> <?= $visibility ?>">
        <div class="bn-video__cover">
            <img src="<?= $thumbnail ?>" class="bn-video__cover--image">
            <button class="bn-video__cover--button" data-video="<?= esc_html($video_url); ?>">
                <svg>
                    <use href="#play" />
                </svg>
            </button>
        </div>
    </div>
<?php endif; ?>