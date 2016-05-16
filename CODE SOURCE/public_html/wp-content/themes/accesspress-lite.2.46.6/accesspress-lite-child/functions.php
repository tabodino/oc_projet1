<?php

	add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
	function theme_enqueue_styles() {
	    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

	}

	if ( current_user_can('contributor') || current_user_can('subscriber') && !current_user_can('upload_files') )
	add_action('admin_init', 'esti_upload_perms');
 
	// On ajoute l'option upload media pour les contributeurs
	function esti_upload_perms() {
		$contributor = get_role('contributor');
		$contributor->add_cap('upload_files');
		$subscriber = get_role('subscriber');
		$subscriber->add_cap('upload_files');
	}


?>