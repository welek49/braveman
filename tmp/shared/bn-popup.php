<?php if (!isset($_COOKIE["bn-popup"]) && get_field('popup_status', 'option')) :  ?>
    <?php
    $popup_title = get_field('popup_title', 'option') ? get_field('popup_title', 'option') : null;
    $popup_text = get_field('popup_text', 'option') ? get_field('popup_text', 'option') : null;
    $popup_button = get_field('popup_button', 'option') ? get_field('popup_button', 'option') : null;
    ?>
    <div class="bn-popup --open">
        <div class="bn-popup__window">
            <span class="bn-popup__window--close">

            </span>
            <?php if ($popup_title) : ?><p class="bn-popup__window--title"><?= $popup_title ?></p><?php endif; ?>
            <?php if ($popup_text) : ?><p class="bn-popup__window--desc text-bigger"><?= $popup_text ?></p><?php endif; ?>
            <?php if ($popup_button) : ?><a href="<?= $is_preview ? '#void' : $popup_button['url'] ?>" target="<?= $popup_button['target'] ?>" class="btn-flat-secondary bn-popup__window--button"><?= $popup_button['title'] ?></a><?php endif; ?>
        </div>
    </div>
<?php endif; ?>