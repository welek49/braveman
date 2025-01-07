<?php
$display_preview = show_preview($block, $is_preview);
if ($display_preview) return;

$background_image = get_field('img') ?? null;
$tooltips = get_field('tooltips') ?? null;
?>

<div class="image-tooltip-section">
    <?php if ($background_image): ?>
    <img src="<?php echo esc_url($background_image); ?>" alt="Background">
    <?php endif; ?>

    <?php if ($tooltips): ?>
    <?php foreach ($tooltips as $tooltip): ?>
    <div class="tooltip-container tooltip-<?php echo esc_attr($tooltip['tooltip_direction']); ?>"
        style="left: <?php echo esc_attr($tooltip['tooltip_position']['position_x']); ?>%; top: <?php echo esc_attr($tooltip['tooltip_position']['position_y']); ?>%;">
        <div class="tooltip-wrapper">

            <div class="tooltip-inner-wrapper">
                <!-- Tytuł tooltipa -->
                <div class="tooltip-title"><?php echo esc_html($tooltip['tooltip_title']); ?></div>

                <div class="tooltip-graphics">
                    <!-- Linia SVG -->
                    <div class="tooltip-line">
                        <?php if ($tooltip['tooltip_direction'] === 'left'): ?>
                        <svg width="212" height="71" viewBox="0 0 212 71" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <line x1="211.579" y1="70.2704" x2="166.579" y2="0.27038" stroke="black" />
                            <line x1="167" y1="0.5" x2="0" y2="0.5" stroke="black" />
                        </svg>
                        <?php else: ?>
                        <svg width="196" height="72" viewBox="0 0 196 72" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <line y1="-0.5" x2="83.2166" y2="-0.5"
                                transform="matrix(0.540758 -0.841178 -0.841178 -0.540758 3.05176e-05 71)"
                                stroke="black" />
                            <line x1="45" y1="0.5" x2="196" y2="0.5" stroke="black" />
                        </svg>
                        <?php endif; ?>
                    </div>

                    <!-- Kółko z plusem SVG -->
                    <div class="tooltip-circle">
                        <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.5551 25.5675C20.1893 25.5675 25.5673 20.1894 25.5673 13.5552C25.5673 6.92103 20.1893 1.54297 13.5551 1.54297C6.92091 1.54297 1.54285 6.92103 1.54285 13.5552C1.54285 20.1894 6.92091 25.5675 13.5551 25.5675Z"
                                stroke="#2B2A29" stroke-width="2.97551" stroke-miterlimit="22.9256" />
                            <path d="M13.5551 7.60425V19.3961" stroke="#2B2A29" stroke-width="2.97551"
                                stroke-miterlimit="22.9256" />
                            <path d="M7.60406 13.5552H19.3959" stroke="#2B2A29" stroke-width="2.97551"
                                stroke-miterlimit="22.9256" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Tooltip (pojawia się po najechaniu) -->
            <div class="tooltip-content">
                <?php if (!empty($tooltip['tooltip_image'])): ?>
                <img src="<?php echo esc_url($tooltip['tooltip_image']); ?>" alt="Tooltip Image">
                <?php endif; ?>
                <p><?php echo esc_html($tooltip['tooltip_text']); ?></p>
            </div>
        </div>
    </div>


    <?php endforeach; ?>
    <?php endif; ?>
</div>