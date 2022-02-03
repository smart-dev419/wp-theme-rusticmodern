<?php 
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_global',
		'title' => 'Global',
		'fields' => array (
			array (
				'key' => 'field_56adcfe1c0968',
				'label' => 'Site Logo',
				'name' => 'site_logo',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_56af72398812b',
				'label' => 'Site Description',
				'name' => 'site_description',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => 5,
				'formatting' => 'html',
			),
			array (
				'key' => 'field_56b33a5755b20',
				'label' => 'Contact Information',
				'name' => 'contact_information',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_56b33a5f55b21',
						'label' => 'Phone',
						'name' => 'phone',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_56b33a8755b22',
						'label' => 'Email',
						'name' => 'email',
						'type' => 'email',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array (
						'key' => 'field_56b33a9755b23',
						'label' => 'Location',
						'name' => 'location',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
				),
				'row_min' => 1,
				'row_limit' => 1,
				'layout' => 'table',
				'button_label' => 'Add Row',
			),
			array (
				'key' => 'field_56b0dc4e71e40',
				'label' => 'Team Members',
				'name' => 'team_members',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_56b0dc6271e41',
						'label' => 'Photo',
						'name' => 'photo',
						'type' => 'image',
						'column_width' => '',
						'save_format' => 'object',
						'preview_size' => 'thumbnail',
						'library' => 'all',
					),
					array (
						'key' => 'field_56b0dc7c71e42',
						'label' => 'Name',
						'name' => 'name',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_56b0de3e71e43',
						'label' => 'Position',
						'name' => 'position',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Member',
			),
			array (
				'key' => 'field_56b2d8f73b381',
				'label' => 'Blog Background Images',
				'name' => 'blog_background_images',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_56b2d90f3b382',
						'label' => 'Left Image',
						'name' => 'left_image',
						'type' => 'image',
						'column_width' => '',
						'save_format' => 'object',
						'preview_size' => 'thumbnail',
						'library' => 'all',
					),
					array (
						'key' => 'field_56b2d9203b383',
						'label' => 'Right Image',
						'name' => 'right_image',
						'type' => 'image',
						'column_width' => '',
						'save_format' => 'object',
						'preview_size' => 'thumbnail',
						'library' => 'all',
					),
				),
				'row_min' => 1,
				'row_limit' => 1,
				'layout' => 'table',
				'button_label' => 'Add Row',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-global',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_home',
		'title' => 'Home',
		'fields' => array (
			array (
				'key' => 'field_56b0af7a5444e',
				'label' => 'Images',
				'name' => 'images',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_56b0af885444f',
						'label' => 'Image',
						'name' => 'image',
						'type' => 'image',
						'column_width' => '',
						'save_format' => 'object',
						'preview_size' => 'thumbnail',
						'library' => 'all',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Image',
			),
			array (
				'key' => 'field_56b0af9b54450',
				'label' => 'Textareas',
				'name' => 'textareas',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_56b0b00254451',
						'label' => 'Textarea',
						'name' => 'textarea',
						'type' => 'textarea',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'maxlength' => '',
						'rows' => 3,
						'formatting' => 'html',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Textarea',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page',
					'operator' => '==',
					'value' => '5',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_portfolio',
		'title' => 'Portfolio',
		'fields' => array (
			array (
				'key' => 'field_56bb306eebf2e',
				'label' => 'Portfolios',
				'name' => 'portfolios',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_56bb372da1ee1',
						'label' => 'Title',
						'name' => 'title',
						'type' => 'text',
						'column_width' => '13.8',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_56bb3118ebf2f',
						'label' => 'Featured Image',
						'name' => 'featured_image',
						'type' => 'image',
						'column_width' => 18,
						'save_format' => 'object',
						'preview_size' => 'thumbnail',
						'library' => 'all',
					),
					array (
						'key' => 'field_56bb3122ebf30',
						'label' => 'Description',
						'name' => 'description',
						'type' => 'textarea',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'maxlength' => '',
						'rows' => 10,
						'formatting' => 'html',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Portfolio',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page',
					'operator' => '==',
					'value' => '16',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
