<?php
/**
 * Hook in and add a metabox that only appears on the 'Resources' page
 */
if(!function_exists('zfw_register_services_metabox')) {
    function zfw_register_services_metabox() {
        $prefix = '_zfw_services_metabox_';

        /**
         * Metabox to be displayed on a single page ID
         */
        $cmb = new_cmb2_box(array(
            'id' => $prefix . 'metabox',
            'title' => 'Services',
            'object_types' => array('page'), //Post type
            'show_on' => array('key' => 'page-template', 'value' => 'services.php'), //Find real post/page number later
            'show_names' => true, //show field names on the left
            'context' => 'normal',
            'priority' => 'high',
        ));

        //$group_field_id is the field id string, so in this case: $prefix. 'demo'
        $group_field_id = $cmb->add_field(array(
            'id' => $prefix . 'Service',
            'type' => 'group',
            'description' => __('Enter Service', 'cmb2'),
            'options' => array(
                'group_title' => __('Entry{#}', 'cmb2'),
                'add_button' => __('Add Another Service', 'cmb2'),
                'remove_button' => __('Remove Service', 'cmb2'),
                'sortable' => true,
                'repeatable' => true,
            ),
        ));

        $cmb->add_group_field($group_field_id, array(
            'name' => 'Name',
            'description' => 'Name of Service',
            'id' => 'name',
            'type' => 'text',
        ));
        $cmb->add_group_field($group_field_id, array(
            'name' => 'Service',
            'id' => 'service',
            'type' => 'textarea_small',
        ));
        $cmb->add_group_field($group_field_id, array(
            'name' => 'Photo',
            'id' => 'photo',
            'type' => 'file',
        ));
        $cmb->add_group_field($group_field_id, array(
            'name' => 'Woocommerce Bookings Link',
            'id' => 'bookings',
            'type' => 'text',
        ));
        $cmb->add_group_field($group_field_id, array(
            'name' => 'Learn More',
            'id' => 'learn-more',
            'type' => 'text',
        ));
        $cmb->add_group_field($group_field_id, array(
            'name' => 'Testimonials',
            'id' => 'services-testimonial',
            'type' => 'wysiwyg',
        ));
    }
}
add_action('cmb2_admin_init', 'zfw_register_services_metabox');