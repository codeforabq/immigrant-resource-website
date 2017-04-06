<?php
/**
 * Template Name: Resources
 **/


add_action('genesis_entry_content', 'add_resources');
function add_resources()
{
    $meta = get_post_meta(get_the_ID(), '_ap_resources_metabox_Resources', true);
    foreach ((array)$meta as $key => $entry) {
        ?>
        <div class="resource-section">

                <div class="resource-title">
                    <?php
                    if (isset($entry['name'])) {
                        echo($entry['name']);
                    }
                    ?>

                </div>

                <div class="resource-image">
                    <?php
                    if (isset($entry['photo'])) {
                        echo wp_get_attachment_image($entry['photo_id'], 'full', "", array("class" => "alignright"));
                    }
                    ?>
                </div>
            <div class="resource-content">

                <div class="resource-description">
                    <?php
                    if (isset($entry['resource'])) {
                        echo($entry['resource']);
                    }
                    ?>
                </div>
                <div class="resource-contact-info">
                    <div class="resource-address">
                        <?php
                        if (isset($entry['address'])) {
                            echo '<span class="label">Address: </span>' . ($entry['address']);
                        }
                        ?>
                    </div>
                    <div class="resource-phone">
                        <?php
                        if (isset($entry['phone-number'])) {
                            echo '<span class="label">Phone: </span>' . ($entry['phone-number']);
                        }
                        ?>
                    </div>
                    <div class="resource-email">
                        <?php
                        if (isset($entry['email'])) {
                            echo '<span class="label">E-mail: </span>' . ($entry['email']);
                        }
                        ?>
                    </div>
                </div>
            </div>


                <div class="resource-link">
                    <?php
                    if (isset($entry['learn-more']) && $entry['learn-more'] != '') {
                        echo '<a class="button" href="' . $entry['learn-more'] . ' " target="_blank">';
                        echo 'Learn More</a>';
                    }
                    ?>
                </div>
        </div>
        <?php

    }

}

genesis();