<?php
$display_preview = show_preview($block, $is_preview);
if ($display_preview) return;

$visibility = !empty(get_field('google_map_block_visibility') && is_array(get_field('google_map_block_visibility'))) ? implode(' ', get_field('google_map_block_visibility') ) : '';
$add_class = isset($block['className']) ? $block['className'] : null;
$location = get_field('google_map_location');
$marker_icon = get_field('google_map_marker_icon');
?>

<div class="fullwidth google-map <?= $visibility ?> <?= $add_class ?>">
    <?php if ($location) : ?>
        <div class="acf-map" data-zoom="16">
            <div class="marker" data-lat="<?= esc_attr($location['lat']) ?>" data-lng="<?= esc_attr($location['lng']) ?>" data-icon="<?= $marker_icon ?>"></div>
            <?php
                $address = '';
                foreach( array('street_name', 'street_number', 'city', 'state', 'post_code', 'country') as $i => $k ) {
                    if( isset( $location[ $k ] ) ) {
                        $address .= sprintf( '<span class="segment-%s">%s</span>, ', $k, $location[ $k ] );
                    }
                }

                $address = trim( $address, ', ' );
                echo '<p>' . $address . '.</p>';
            ?>
            </div>
        </div>
    <?php endif; ?>
</div>