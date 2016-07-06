<?php
$open_table_widget_options = array(
	array( 'name' => __( 'About', $open_table_widget->textdomain ), 'type' => 'opentab' ),
	array( 'type' => 'about' ),
	array( 'type' => 'closetab', 'actions' => false ),

	array(
		'name' => __( 'Options', $open_table_widget->textdomain ),
		'type' => 'opentab'
	),

	array(
		'name'  => __( 'Disable Plugin CSS', $open_table_widget->textdomain ),
		'desc'  => __( 'Useful to style your own widget and for theme integration and optimization. This will <span style="text-decoration:underline">not</span> disable the Selectric styles since they are necessary for Selectric to function.', $open_table_widget->textdomain ),
		'std'   => '',
		'id'    => 'disable_css',
		'type'  => 'checkbox',
		'label' => __( 'Yes', $open_table_widget->textdomain )
	),
	array(
		'name'  => __( 'Disable Selectric.js select fields', $open_table_widget->textdomain ),
		'desc'  => __( 'By default, Open Table Widget uses the <a href="http://lcdsantos.github.io/jQuery-Selectric" target="_blank">jQuery Selectric</a> library. You can diable it with this setting. The select fields will be replaced by standard HTML select fields rather than the Selectric ones.', $open_table_widget->textdomain ),
		'std'   => '',
		'id'    => 'disable_bootstrap_select',
		'type'  => 'checkbox',
		'label' => __( 'Yes', $open_table_widget->textdomain )
	),
	array( 'type' => 'closetab' )
);