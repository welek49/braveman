<?php
    //Get the active tab from the $_GET param
    $default_tab = null;
    $tab = isset($_GET['tab']) ? $_GET['tab'] : $default_tab;
?>
<style>
    .wrap {
        max-width: 1400px;
    }
    .wrap p, .wrap ul {
        font-size: 14px;
    }
    .content-wrapper {
        display: grid;
        grid-template-columns: calc(33.33% - 10px) calc(66.66% - 10px);
        grid-template-rows: 1fr;
        grid-gap: 30px;
        align-items: center;
        margin-top: 20px;
        padding: 20px 30px;
        background: #FFF;
        border: 1px solid #b8b8b8;
        box-shadow: 0px 3px 5px #d7d5d5;
    }
    .content-wrapper ul {
        list-style: circle;
        padding-left: 15px;
    }
    .content-wrapper img {
        box-sizing: border-box;
        display: block;
        max-width: 100%;
        height: auto;
        max-height: 500px;
        padding: 10px;
        border: 1px solid #eee;

    }
    .color-preview {
        float: left;
        width: 20px;
        height: 20px;
        margin-top: 0px;
        margin-right: 10px;
    }
</style>
<div class="wrap">
    <h1>Instructions, how to use Gutenberg editor</h1>

    <nav class="nav-tab-wrapper">
        <a href="?page=instructions" class="nav-tab <?php if($tab===null):?>nav-tab-active<?php endif; ?>">Theme options</a>
        <a href="?page=instructions&tab=gutenberg" class="nav-tab <?php if($tab==='gutenberg'):?>nav-tab-active<?php endif; ?>">Gutenberg editor</a>
        <a href="?page=instructions&tab=grid" class="nav-tab <?php if($tab==='grid'):?>nav-tab-active<?php endif; ?>">Layout logic</a>
        <a href="?page=instructions&tab=blocks" class="nav-tab <?php if($tab==='blocks'):?>nav-tab-active<?php endif; ?>">Blocks library</a>
        <a href="?page=instructions&tab=classes" class="nav-tab <?php if($tab==='classes'):?>nav-tab-active<?php endif; ?>">Custom classes</a>
        <a href="?page=instructions&tab=shortcodes" class="nav-tab <?php if($tab==='shortcodes'):?>nav-tab-active<?php endif; ?>">Shortcodes</a>
    </nav>

    <div class="tab-content">
    <?php 
        switch($tab) :
            case 'gutenberg':
                ?>
                    <h2>How to use Gutenberg editor</h2>
                    <p>This website is based on Gutenberg blocks with custom fields. This allows you to create pages and entries with interesting and engaging layouts. Moving, adding or replacing elements in most cases no longer requires programmers intervention. The most important convenience is the copying of blocks. This allows you to easily copy section from one page to another and then replace content of it. Of course - it won't cut all the programmers involvement but we belive that with a bit of engagement you will be able to learn how to use it and develop your content to show your business from the best angle.</p>
                    <p>We are also sure that we are going to develop our theme and blocks to make it even better in the future so stay tuned and feel welcome to learn how to use it!</p>

                    <div class="content-wrapper">
                        <div>
                            <h3>Getting started with Gutenberg</h3>
                            <p>In every post/page/custom post type you will see the Gutenberg editor. On the top of the content you can set page/post title. In the top bar there are icon buttons that:
                                <ul>
                                    <li><b>show/hide blocks inserter</b></li>
                                    <li>undo/redo changes</li>
                                    <li>show list of blocks</li>
                                    <li>show list of blocks added into the current page</li>
                                    <li>save draft(described later)</li>
                                    <li>show preview</li>
                                    <li><b>publish/save changes</b></li>
                                    <li>show/hide SEO panel</li>
                                    <li>show/hide <b>right sidebar which will be used the most during content/entry edition</b></li>
                                    <li>advanced options</li>
                                </ul>
                            </p>
                        </div>
                        <img src="<?= IMAGES ?>instructions/editor.webp">
                    </div>

                    <div class="content-wrapper">
                        <div>
                            <h3>Block-based approach</h3>
                            <p>Gutenberg editor is based on building with blocks. Each piece of the content such as a text, image, heading or quote is represented by a separate block. Also layout is builded with blocks. As you can see in the picture - in the left sidebar we can see list of all available blocks. Some of them are used to display content: 
                                <ul>
                                    <li>text</li>
                                    <li>image</li>
                                    <li>list</li>
                                    <li>tiles with numbers</li>
                                    <li>video</li>
                                </ul> etc., while others serve to build creative layouts:
                                <ul>
                                    <li>section</li>
                                    <li>row</li>
                                    <li>column</li>
                                    <li>wrapper</li>
                                </ul>
                            </p>
                            <p><b>Important:</b> Proper structure of layout is: section > row > column(s).</p>
                        </div>
                        <img src="<?= IMAGES ?>instructions/blocks.webp">
                    </div>

                    <div class="content-wrapper">
                        <div>
                            <h3>Adding blocks</h3>
                            <p>To add a new block, click on the "Add Block" button on the top toolbar or you can click on specific block and if it allows nested blocks - there will be another blue button showing list of the blocks, then select the appropriate block type from the available options.</p>
                        </div>
                        <img src="<?= IMAGES ?>instructions/adding-blocks.webp">
                    </div>

                    <div class="content-wrapper">
                        <div>
                            <h3>Editing blocks</h3>
                            <p>Click on any block to start editing it's content. You will see editing options of the block, which depend on it's type. Most of them have their options <b>in the right sidebar</b>. You can show it on/off by clicking blacked icon in the top right corner(screenshot).</p>
                            <p>All of them have something called <b>Additional CSS Class(es)</b> field. You can add there custom classes to make this block looks different. Examples <a href="/wp-admin/admin.php?page=instructions&tab=classes">here</a>.</br>
                            <b>Important:</b> This field is also used by column blocks width classes(example: col-md-12) - don't edit those.</p>
                        </div>
                        <img src="<?= IMAGES ?>instructions/editor.webp">
                    </div>

                    <div class="content-wrapper">
                        <div>
                            <h3>Moving blocks</h3>
                            <p>Blocks can be dragged and dropped to change their order on the page. Click on a block, then click and hold six dots icon from the toolbar and drag it up or down to move it untill blue line shows on another element(it will be moved there).</p>
                            <p>Blocks can be also moved up or down (by one position). Click on a block then click on of the arrows in toolbar.</p>
                        </div>
                        <div>
                            <img src="<?= IMAGES ?>instructions/drag.webp">
                            <img src="<?= IMAGES ?>instructions/move-up.webp">
                            <img src="<?= IMAGES ?>instructions/move-down.webp">
                        </div>
                    </div>

                    <div class="content-wrapper">
                        <div>
                            <h3>Other useful block's options</h3>
                            <p>Blocks can be also copied and pasted by using keyboard shortcuts(Cmd + C, Cmd + V or Ctrl + C, Ctrl + V). Duplication adds the same block below(with the same options).</p>
                            <p>To delete a block, click on the three dots icon (block options) located in the upper right corner of the block, and then select "Delete". You can also use keyboard key: Backspace.</p>
                        </div>
                        <img src="<?= IMAGES ?>instructions/options.webp">
                    </div>

                    <div class="content-wrapper">
                        <div>
                            <h3>Publish an entry or page, change visibility, change author</h3>
                            <p>Every change done in entry has to be saved by blue button in the right top corner. If you just click "Publish" it will be publicly visible for everyone(who knows the link to the entry). During editing you may want to make your entry hidden. If so you can click on "Public" next to "Visiblity". In the screenshot you can see that there are thee options to choose. Each one will have different result after publish.</p>
                            <p>After entry is published you can change it's status to draft or private so your site viewers can't see it. You can also change its author(it has to be real user added in the Dashboard > Users).</p>
                        </div>
                        <img src="<?= IMAGES ?>instructions/page-settings.webp">
                    </div>

                    <div class="content-wrapper">
                        <div>
                            <h3>Patterns</h3>
                            <p>Since 2023 we have avibility to create patterns which are prepared part of content. These can work in two modes, synchronized or not. If pattern is synchronized and added to any post/page etc. - after you change it's content it will be changed everywhere it is used. It's very comfortable to change text of the CTA section in one place to change it across entire website.</p>
                            <p>Usynchronized patterns allows us to build a library of content parts ready to be reused where you need it. No synchronization, edition made in one place at a time.</p>
                            <p>To create one - click on any block and click three dots icon in the toolbar(above or below block), then click "Create pattern". Then you will be able to name it, add categories and choose whether it should be synchronised or not - think twice because it can't be set as synchronized after creating is done. When everything looks good - click "Create".</p>
                            <p>To add it to an entry - open blocks inserter(blue button with plus icon or after clicking on any container block) click "Patterns" tab on top of blocks inserter and choose "My patterns" or specific category.</p>
                            <p>There is also option to make synchronized pattern an ordinary part of the content again. When it's already added into the content - click on it(in editor), then choose from toolbar three dots icon and click "Detach".</p>
                        </div>
                        <img src="<?= IMAGES ?>instructions/patterns.webp">
                    </div>

                    <div class="content-wrapper">
                        <div>
                            <h3>Block settings</h3>
                            <p>Additional configuration options will be available for most of the blocks. To access them, click on the block, then go to the "Block Settings" section in the right sidebar. More informations about block settings are <a href="/wp-admin/admin.php?page=instructions&tab=blocks">here</a>.</p>
                        </div>
                        <img src="<?= IMAGES ?>instructions/block-settings.webp">
                    </div>
                <?php
            break;
            case 'grid':
                ?>
                    <h2>How does our layout work?</h2>

                    <div class="content-wrapper">
                        <div>
                            <h3>Sections and rows</h3>
                            
                            <p>The content of the pages, as in most documents, is divided into sections. This is what the "Section" block is for. It can have top and bottom spaces, but most importantly it has 3 possible widths.</p>

                            <p>Often the content of a section has a smaller width than the section itself and has several rows. For this the "Row" block is used. This block can also have top and bottom spacing settings and like the section - 3 possible widths. It must always be a direct "child" of the "Section" block.</p>

                            <p>In our template we have 3 main widths depending on the design:
                                <ul>
                                    <li>Full</li>
                                    <li>Wide - the specific width is defined during design but is always larger than the standard width</li>
                                    <li>Boxed - the default width of the section/row</li>
                                </ul>
                            </p>
                        </div>
                        <div>
                            <p>Screenshot from website, every column has custom class with primary(green) color border.</p>
                            <img src="<?= IMAGES ?>instructions/grid.webp">
                        </div>
                    </div>

                    <div class="content-wrapper">
                        <div>
                            <h3>Columns - containers for content blocks</h3>
                            
                            <p>To make the layout more interesting it can be divided into columns. This is what the "Column" block is used for. This block can also have top and bottom spacing and width set. The column must always be a direct "child" of the "Row" block.</p>

                            <p>Unlike previous blocks the width of a column can be set from 1/12 to 12/12 of the parent row width.Columns are always placed from left to right. In addition, we can also create empty spaces between columns, for this there is an "offset" setting, which is also based on the range from 1/12 to 12/12. </p>

                            <p>We set the widths of the columns depending on the resolution, as well as the offset and their order. On mobile they can have a different order than on desktop.</p>

                            <p>The column also has settings to set its contents to the left, right, center, top and bottom. This gives us a huge number of possibilities. And all this without additional coding.</p>
                        </div>
                        <div>
                            <p>Screenshot from editor, section has custom class with secondary(black) color border.</p>
                            <img src="<?= IMAGES ?>instructions/grid-0.webp">
                            <p>Screenshot from editor, showing the rest of above example from website.</p>
                            <img src="<?= IMAGES ?>instructions/grid-1.webp">
                        </div>
                    </div>

                    <div class="content-wrapper">
                        <div>
                            <h3>Spacing settings</h3>
                            <p>Space settings allows you to add spacing above or below block. Margins add space outside of element's area, paddings add space inside block's area. We recommend to use paddings only. </p>

                            <p>Margins are a bit problematic as they can't "see" each other. If we have two sections with bottom and top margins set between them we only see bigger one, or one of them if sizes of margins are the same. </p>
                        </div>
                        <img src="<?= IMAGES ?>instructions/spacing-settings.webp">
                    </div>
                <?php
            break;
            case 'classes':
                ?>
                    <h2>Custom classes</h2>
                    <div class="content-wrapper">
                        <div>
                            <h2>How it works?</h2>
                            <p>Every Gutenberg block has <b>Additional CSS class(es)</b> field below other settings. It shows up after block selection in right sidebar under other settings.</p>
                            
                            <p>You can add there classes to make this block looks different. Examples below. </br><b>Important:</b> This field is also used by columns width classes(example: col-md-12) - don't edit those.</p>
                        </div>
                        <img src="<?= IMAGES ?>instructions/custom-classes.webp">
                    </div>

                    <div class="content-wrapper">
                        <div>
                            <h2>List of custom classes:</h2>
                            <p><b>bg--colorname</b> sets background of element to chosen color </br> ex. <b>bg--primary</b></p>
                            <p><b>border--colorname</b> adds border to chosen element</p>
                        </div>
                        <img src="<?= IMAGES ?>instructions/custom-classes-1.webp">
                    </div>
                    <?php if ( class_exists( 'WP_Theme_JSON_Resolver' ) ) { ?>
                    <div class="content-wrapper">
                        <div>
                            <h2>Theme colors</h2>
                            <?php
                                $settings = WP_Theme_JSON_Resolver::get_theme_data()->get_settings();
                                if ( isset( $settings['color']['palette']['theme'] ) ) {
                                    $color_palette = $settings['color']['palette']['theme'];
                                    foreach ( $color_palette as $color_value ) { ?>
                                        <div>
                                            <span class="color-preview" style="background-color: <?= $color_value['color'] ?>;"></span>
                                            <p>Name: <?= $color_value['slug'] ?>. Hex value: <?= $color_value['color'] ?></p>
                                        </div>
                                    <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>
                <?php }
            break;
            case 'blocks':
                ?>
                    <h2>Blocks list</h2>
                    <?php
                        // Get post types
                        global $wp_post_types;
                        $post_type_names = [];
                        $post_types = array_keys( $wp_post_types );

                        // Remove _builtins or others
                        $pt_remove = array("attachment","nav_menu_item","customize_changeset","revision", "custom_css", "oembed_cache","user_request","wp_template","wp_template_part","wp_global_styles","wp_navigation","wp_font_family","wp_font_face","acf-taxonomy","acf-post-type","acf-ui-options-page","acf-field-group","acf-field","wpcf7_contact_form", "import_users");

                        foreach ( $post_types as $post_type ):
                            if ( in_array($post_type, $pt_remove) ) continue;
                            $post_type_names[] = $post_type;
                        endforeach;

                        // Posts, pages and other post types query
                        global $post;
                        $args = array(
                            'post_type' => $post_type_names,
                            'posts_per_page' => -1
                        );
                        $the_query = new WP_Query( $args );

                        $folders = glob(BLOCKS . '*', GLOB_ONLYDIR);

                        for($i = 0; $i < count($folders); $i++) {
                            $block_data = file_get_contents($folders[$i] . '/block.json');
                            $block = json_decode($block_data);
                    ?>
                            <div class="content-wrapper">
                                <div>
                                    <h3 class="hndle ui-sortable-handle"><?= $block->title ?></h3>
                                    <p><?= $block->description ?></p>
                                    <?php
                                        $counter = 0;
                                        if ( $the_query->have_posts() ) {
                                            while ( $the_query->have_posts() ) {
                                                $the_query->the_post();
                                                if(has_block($block->name)) {
                                                    $counter = $counter + 1;
                                                }
                                            }
                                        }
                                        echo "This block was used on " . $counter . " pages/posts/other custom post type.";
                                    ?>
                                </div>
                                <?php if (isset($block->example->attributes->data->preview_image))
                                    echo '<img src="' . ASSETS . 'block-previews/' . str_replace('bn/', '', $block->name) . '.png">';
                                ?>
                            </div>
                    <?php } ?>
                <?php
                wp_reset_postdata();
            break;
            case 'shortcodes':
                ?>
                    <h2>Shortcodes</h2>

                    <div class="metabox-holder">
                        <div>
                            <div class="postbox">
                                <div class="postbox-header">
                                    <h3 class="hndle ui-sortable-handle">table-responsive</h3>
                                </div>
                                <div class="inside">
                                    <h4><strong>[table-responsive]</strong>Your table<strong>[/text-bigger]</strong></h4>
                                    The table between the square brackets will be more responsible. This shortcode can be used in a text block.
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
            break;
            default:
                ?>
                    <h2>Theme options</h2>

                    <p><a href="<?= get_dashboard_url() ?>admin.php?page=theme_general_settings">Click here</a> to visit page where you can set global options like logo, header, social links or footer copyrights texts.</p>
                <?php
            break;
        endswitch;
    ?>
    </div>
</div>