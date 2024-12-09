<?php

function tableResponsive($atts, $content)
{
    return '<div class="bn-table">' . $content . '</div>';
}
add_shortcode('table-responsive', 'tableResponsive');
