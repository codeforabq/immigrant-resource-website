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
                <div class="resource-title">

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

        } else {
            ?>
            <div class="resource-section one-half">
                <div class="resource-title">

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
}


genesis();