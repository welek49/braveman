<?php
$display_preview = show_preview($block, $is_preview);
if ($display_preview) return;

$visibility = !empty(get_field('map_with_locations_block_visibility') && is_array(get_field('map_with_locations_block_visibility'))) ? implode(' ', get_field('numbers_tile_block_visibility') ) : '';
$add_class = isset($block['className']) ? $block['className'] : null;
$locations = get_field('map_with_locations_countries');
?>

<div class="fullwidth map-with-locations <?= $visibility ?> <?= $add_class ?>"> 
    <style>
        <?php foreach($locations as $key=>$location): ?>
            <?= '[data-pin-id="' . $key . '"] { left: ' . $location['placement_horizontal'] . '%; top: ' . $location['placement_vertical'] . '%}' ?>
        <?php endforeach; ?>
    </style>
    <div class="map-with-locations__map">
        <img decoding="async" src="<?= IMAGES . 'world_map.webp'?>" alt="" class="image">
        <div class="map-with-locations__glow background-glow-1"></div>
        <div class="map-with-locations__pins">
            <?php foreach($locations as $key=>$location): ?>
                <div class="map-with-locations__pin" data-pin-id="<?= $key ?>"></div>
            <?php endforeach; ?>
        </div>
        <div class="map-with-locations__locations">
            <?php foreach($locations as $key=>$location): ?>
                <div class="map-with-locations__location" data-pin-id="<?= $key ?>">
                    <div class="map-with-locations__country">
                        <div class="map-with-locations__country-name"><?= $location['name_of_the_country'] ?></div>
                        <ul class="map-with-locations__cities">
                            <?php if (!empty($location['list_of_cities']))
                                foreach($location['list_of_cities'] as $city): ?>
                                <?php if($city['link_for_the_city']): ?>
                                        <li class="map-with-locations__city"><a href="<?= $city['link_for_the_city'] ?>"><?= $city['name_of_the_city'] ?></a></li>
                                    <?php else: ?>
                                        <li class="map-with-locations__city"><?= $city['name_of_the_city'] ?></li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="map-with-locations__locations--mobile">
        <ul class="map-with-locations__locations-list">
            <?php foreach($locations as $key=>$location): ?>
                <?php if (!empty($location['list_of_cities']))
                    foreach($location['list_of_cities'] as $city): ?>
                    <?php if($city['link_for_the_city']): ?>
                            <li class="map-with-locations__location--mobile"><a href="<?= $city['link_for_the_city'] ?>"><?= $location['name_of_the_country'] ?> (<?= $city['name_of_the_city'] ?>)</a></li>
                        <?php else: ?>
                            <li class="map-with-locations__location--mobile"><?= $location['name_of_the_country'] ?> (<?= $city['name_of_the_city'] ?>)</li>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </ul>
    </div>
</div>