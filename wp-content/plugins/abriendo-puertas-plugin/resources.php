<?php
/**
 * Hook in and add a metabox that only appears on the 'Resources' page
 */
if(!function_exists('ap_register_resources_metabox')) {
    function ap_register_resources_metabox() {
        $prefix = '_ap_resources_metabox_';

        /**
         * Metabox to be displayed on a single page ID
         */
        $cmb = new_cmb2_box(array(
            'id' => $prefix . 'metabox',
            'title' => 'Resources',
            'object_types' => array('page'), //Post type
            'show_on' => array('key' => 'page-template', 'value' => 'resources.php'), //Find real post/page number later
            'show_names' => true, //show field names on the left
            'context' => 'normal',
            'priority' => 'high',
        ));

        //$group_field_id is the field id string, so in this case: $prefix. 'demo'
        $group_field_id = $cmb->add_field(array(
            'id' => $prefix . 'Resources',
            'type' => 'group',
            'description' => __('Enter Resource', 'cmb2'),
            'options' => array(
                'group_title' => __('Entry{#}', 'cmb2'),
                'add_button' => __('Add Another Resource', 'cmb2'),
                'remove_button' => __('Remove Resource', 'cmb2'),
                'sortable' => true,
                'repeatable' => true,
            ),
        ));

        $cmb->add_group_field($group_field_id, array(
            'name' => 'Name',
            'description' => 'Name of Resource',
            'id' => 'name',
            'type' => 'text',
        ));
        $cmb->add_group_field($group_field_id, array(
            'name' => 'Resource',
            'description' => 'Description of Resource',
            'id' => 'resource',
            'type' => 'textarea',
        ));
        $cmb->add_group_field($group_field_id, array(
            'name' => 'Photo',
            'id' => 'photo',
            'type' => 'file',
        ));
        $cmb->add_group_field($group_field_id, array(
            'name' => 'Address',
            'id' => 'address',
            'type' => 'text',
        ));
        $cmb->add_group_field($group_field_id, array(
            'name' => 'Phone Number',
            'id' => 'phone-number',
            'type' => 'text',
        ));
        $cmb->add_group_field($group_field_id, array(
            'name' => 'Email',
            'id' => 'email',
            'type' => 'text',
        ));

        $cmb->add_group_field($group_field_id, array(
            'name' => 'Learn More',
            'id' => 'learn-more',
            'type' => 'text',
        ));

    }
}
add_action('cmb2_admin_init', 'ap_register_resources_metabox');