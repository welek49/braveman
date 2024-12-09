<?php

if (isset($sort)) {
    $max_numbers = count($sort); //condition for pagination simulation
} else {
    $max_numbers = $posts_loop->max_num_pages; // condition for normal cases
}
if ($pagination) {
    $pagination_html = '';
    if (1 === $paged) {
        $pagination_html = '<div></div>
<div class="bn-pagination__numbers">';
        for ($i = 0; $i < count($pagination) - 1; $i++) {
            $pagination_html .= $pagination[$i];
        }
        $pagination_html .= '</div><div class="bn-pagination__next">' . $pagination[count($pagination) - 1] . '</div>';
    } elseif ($max_numbers == $paged) {
        $pagination_html .= '<div class="bn-pagination__prev">' . $pagination[0] . '</div><div class="bn-pagination__numbers">';
        for ($i = 1; $i < count($pagination); $i++) {
            $pagination_html .= $pagination[$i];
        }
        $pagination_html .= '</div><div></div>';
    } else {
        $pagination_html = '<div class="bn-pagination__prev">' . $pagination[0] . '</div><div class="bn-pagination__numbers">';
        for ($i = 1; $i < count($pagination) - 1; $i++) {
            $pagination_html .= $pagination[$i];
        }
        $pagination_html .= '</div><div class="bn-pagination__next">' . $pagination[count($pagination) - 1] . '</div>';
    }
    echo '
            <div class="bn-pagination">' . $pagination_html . '</div>';
}
