<?php

function textBigger($atts, $content)
{
    return '<p class="text-bigger">' . $content . '</p>';
}
add_shortcode('text-bigger', 'textBigger');
