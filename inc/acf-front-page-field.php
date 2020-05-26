<?php

function understrap_acf_front_page(){
    acf_add_local_field_group( array(
        'key' => 'understrap_frontpage_fields',
        'title' => 'Front Page Options',
        'fields' => array(
            array(
                'key' => 'age_block_beavers_link',
                'label' => 'Beavers Link',
                'name' => 'beavers_link',
                'type' => 'page_link',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => '',
                'taxonomy' => '',
                'allow_null' => 0,
                'allow_archives' => 1,
                'multiple' => 0,
                'default_value' => '/sections/beavers'
            ),
            array(
                'key' => 'age_block_cubs_link',
                'label' => 'Cubs Link',
                'name' => 'cubs_link',
                'type' => 'page_link',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => '',
                'taxonomy' => '',
                'allow_null' => 0,
                'allow_archives' => 1,
                'multiple' => 0,
                'default_value' => '/sections/cubs'
            ),
            array(
                'key' => 'age_block_scouts_link',
                'label' => 'Scouts Link',
                'name' => 'scouts_link',
                'type' => 'page_link',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => '',
                'taxonomy' => '',
                'allow_null' => 0,
                'allow_archives' => 1,
                'multiple' => 0,
                'default_value' => '/sections/scouts'
            ),
            array(
                'key' => 'age_block_explorers_link',
                'label' => 'Explorers Link',
                'name' => 'explorers_link',
                'type' => 'page_link',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => '',
                'taxonomy' => '',
                'allow_null' => 0,
                'allow_archives' => 1,
                'multiple' => 0,
                'default_value' => '/sections/explorers'
            ),
            array(
                'key' => 'age_block_network_link',
                'label' => 'Network Link',
                'name' => 'network_link',
                'type' => 'page_link',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => '',
                'taxonomy' => '',
                'allow_null' => 0,
                'allow_archives' => 1,
                'multiple' => 0,
                'default_value' => '/sections/network'
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
        ),
    ) );
}

add_action('acf/init', 'understrap_acf_front_page');


function understrap_acf_section_page(){

    acf_add_local_field_group(array(
        'key' => 'group_5eca9e968629b',
        'title' => 'Section Information',
        'fields' => array(
            array(
                'key' => 'field_5eca9eb01d9f4',
                'label' => 'Subtitle',
                'name' => 'subtitle',
                'type' => 'text',
                'required' => 1
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-templates/page-section.php',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
    ));
}

add_action('acf/init', 'understrap_acf_section_page');