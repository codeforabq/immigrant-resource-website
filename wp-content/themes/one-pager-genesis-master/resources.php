<?php
/**
 * Template Name: Resources
 **/

add_action('genesis_entry_content', 'add_resources');
function add_resources()
{
    $meta = get_post_meta(get_the_ID(), '_ap_resources_metabox_Resources', true);
    $count = 0;
    foreach ((array)$meta as $key => $entry) {
        $count++;
        if ($count % 2 === 1) {
                        ?>
            <div class="resource-section one-half first">
            <?php
        }else{
        ?>
            <div class="resource-section one-half">
            <?php
        }
            ?>
                <div class="resource-title">
                    <?php
                    if(isset($entry['name'])){
                        echo($entry['name']);
                    }
                    ?>

                </div>
                <div class="resource-image">
                    <?php
                    if (isset($entry['photo'])) {
                        echo wp_get_attachment_image($entry['photo_id'], 'thumbnail', "", array("class" => "aligncenter"));
                    }
                    ?>
                </div>
                <div class="resource-description">
                    <?php
                    if (isset($entry['resource'])) {
                        echo($entry['resource']);
                    }
                    ?>
                </div>
                <div class="resource-address">
                    <?php
                    if (isset($entry['address'])) {
                        ?> <span class="label">Address: </span><?php echo($entry['address']);
                    }
                    ?>
                </div>
                <div class="resource-phone">
                    <?php
                    if (isset($entry['phone'])) {
                        ?> <span class="label">Phone: </span><?php echo($entry['phone']);
                    }
                    ?>
                </div>
                <div class="resource-email">
                    <?php
                    if (isset($entry['email'])) {
                        ?> <span class="label">E-mail: </span><?php echo($entry['email']);
                    }
                    ?>
                </div>

                <div class="resource-link">
                    <?php
                    if (isset($entry['learn-more']) && $entry['learn-more'] != '') {
                        echo '<a class="button" href="' . $entry['learn-more'] . ' ">';
                        echo 'Learn More</a>';
                    }
                    ?>
                </div>
            </div>
            <?php

    }

}


genesis();