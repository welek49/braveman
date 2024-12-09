<?php

/*
*
*   Convert gutenberg content to string
*
*   @param string $content content from gutenberg page
*
*
*/
function content_gutenberg_acf_to_excerpt($content)
{
    $blocks = parse_blocks($content);
    $contentHtml = '';

    foreach ($blocks as $block) {
        if ($block['blockName'] != 'bn/hero-page') { //exclude hero page block
            $contentHtml .= render_block($block);
        }
    }

    $excerpt = wp_strip_all_tags($contentHtml);

    return $excerpt;
}
