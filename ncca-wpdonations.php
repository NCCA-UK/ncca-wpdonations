<?php
/*
Plugin Name: NCCA WPDonations
Plugin URI: http://wptechcentre.com/
Description: Declares a plugin that extends Remi Corson's WPDonations plugin.
Version: 1.4
Author: Tom Frearson
Author URI: http://wptechcentre.com/
License: GPLv2
*/
if( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Include custom widgets
 */
include( 'widgets/wpdonations-login-widget.php' );

/**
 * Filter number format for donations and funds raised 
 */
function ncca_donation_number_format( $campaign_target ) {
	$campaign_target = number_format( $campaign_target, 0, '.', ',' );
	
	return $campaign_target;
}
add_filter( 'the_campaign_target', 'ncca_donation_number_format' );

function ncca_funds_number_format( $campaign_funds ) {
	$campaign_funds = number_format( $campaign_funds, 0, '.', ',' );
	
	return $campaign_funds;
}
add_filter( 'the_campaign_funds', 'ncca_funds_number_format' );


/**
 * Add donate button to bottom and sidebar of single Appeal, Journey and In Memory pages
 */
function ncca_add_donate_button( $post = null ) {
	$post = get_post( $post );
	$campaign_name = $post->post_name;
	$campaign_title = $post->post_title;
	
	if( is_singular( 'appeal' ) || is_singular( 'journey' ) ) {
		echo '
			<form action="/donate/" method="POST">'
				. wp_nonce_field( 'donate_now' ) .
				'<input name="campaign_name" type="hidden" value="' . esc_attr( $campaign_name ) . '">
				<input name="campaign_title" type="hidden" value="' . esc_attr( $campaign_title ) . '">
				<input class="button donate" type="submit" value="Donate to ' . esc_attr( $campaign_title ) . ' &rarr;">
			</form>';
	}
	
	elseif( is_singular( 'in-memory' ) ) {
		echo '
			<form action="/donate/" method="POST">'
				. wp_nonce_field( 'donate_now' ) .
				'<input name="campaign_name" type="hidden" value="' . esc_attr( $campaign_name ) . '">
				<input name="campaign_title" type="hidden" value="' . esc_attr( $campaign_title ) . '">
				<input class="button donate" type="submit" value="Donate in memory of ' . esc_attr( $campaign_title ) . ' &rarr;">
			</form>';
	}
}
add_action( 'udesign_single_post_entry_bottom', 'ncca_add_donate_button', 1 );
add_action( 'udesign_sidebar_top', 'ncca_add_donate_button', 1 );


/**
 * Add donations progress bar to single Appeal pages
 */
function ncca_donation_progress_bar( $post = null ) {	
	$post = get_post( $post );
	$campaign_name = $post->post_name;
	$campaign_title = $post->post_title;
	
	$campaign_id = get_term_by( 'slug', $campaign_name , 'donation_campaign' );
	$campaign_id = $campaign_id->term_id;
	
	if( is_singular( 'appeal' ) && !empty( $campaign_id ) ) {
		echo '
			<div id="donation-progress" class="widget widget_text substitute_widget_class">
				<h3>' . esc_attr( $campaign_title ) . ' Progress</h3>
					<p class="tight">' . do_shortcode( '[the_campaign_target id="' . $campaign_id . '" before="Target: &pound;" after=""]' ) . '</p>
					<p class="tight">' . do_shortcode( '[the_campaign_funds id="' . $campaign_id . '" before="Current total: &pound;" after=""]' ) . '</p>'
					. do_shortcode( '[the_donation_progress_bar id="' . $campaign_id . '"]' ) .
			'</div>';
	}
	wp_reset_postdata();
}
add_action( 'udesign_sidebar_top', 'ncca_donation_progress_bar', 0 );


/**
 * Add running total to single Journey and In Memory pages
 */
function ncca_total_donations( $post = null ) {	
	$post = get_post( $post );
	$campaign_name = $post->post_name;
	$campaign_title = $post->post_title;
	
	$campaign_id = get_term_by( 'slug', $campaign_name , 'donation_campaign' );
	$campaign_id = $campaign_id->term_id;
	
	if( ( is_singular( 'journey' ) || is_singular( 'in-memory' ) ) && !empty( $campaign_id ) ) {
		echo '
			<div id="donation-progress" class="widget widget_text substitute_widget_class">
				<h3>Donations to ' . esc_attr( $campaign_title ) . '</h3>
					<p class="tight">' . do_shortcode( '[the_campaign_funds id="' . $campaign_id . '" before="Amount to date: &pound;" after=""]' ) . '</p>
			</div>';
	}
	wp_reset_postdata();
}
add_action( 'udesign_sidebar_top', 'ncca_total_donations', 0 );


/*
 * Edit WPDonations form fields
 */
function ncca_edit_donations_form_fields( $fields ) {
	$campaign_name = $_POST[ 'campaign_name' ];
	
	if( !empty( $campaign_name ) ) {
		$campaign_name = $campaign_name;
	} else {
		$campaign_name = 'ncca';
	}

    $fields['donation']['donation_campaign']['label'] = 'Campaign name';
	$fields['donation']['donation_campaign']['description'] = '';
	$fields['donation']['donation_campaign']['type'] = 'text';
	$fields['donation']['donation_campaign']['required'] = true;
	$fields['donation']['donation_campaign']['options'] = null;
	$fields['donation']['donation_campaign']['placeholder'] = null;
	$fields['donation']['donation_campaign']['value'] = $campaign_name;
	
	$fields['donor']['donor_address']['required'] = true;
	$fields['donor']['donor_zip']['required'] = true;
	$fields['donor']['donor_town']['required'] = true;
	
    return $fields;
}
add_filter( 'submit_donation_form_fields', 'ncca_edit_donations_form_fields' );


/*
 * Remove WPDonations form fields
 */
function ncca_remove_donations_form_fields( $fields ) {
    unset( $fields['donor']['donor_logo'] );
	
    return $fields;
}
add_filter( 'submit_donation_form_fields', 'ncca_remove_donations_form_fields' );


/*
 * Add WPDonations form fields
 */
function ncca_add_donations_form_fields( $fields ) {
	$campaign_title = stripslashes( $_POST[ 'campaign_title' ] );
	
	if( !empty( $campaign_title ) ) {
		$campaign_title = $campaign_title;
	} else {
		$campaign_title = get_bloginfo( 'name' );
	}
	
    $fields['donation']['campaign_title'] = array(
		'label'       => __( 'Campaign title', 'wpdonations' ),
		'description' => __( '' ),
		'type'        => 'text',
		'required'    => true,
		'value'       => $campaign_title,
		'priority'    => 8
		);
	
    return $fields;
}

// Hook function that save field(s) data
add_action( 'wpdonations_update_donation_data', 'frontend_add_fields_save', 10, 2 );

// Save field(s) data
function frontend_add_fields_save( $donation_id, $values ) {
    // Duplicate the following line for each new field added
	update_post_meta( $donation_id, '_campaign_title', $values['donation']['campaign_title'] );
}
add_filter( 'submit_donation_form_fields', 'ncca_add_donations_form_fields' );


/*
 * Filter donations form amounts
 */
function ncca_donation_amounts( $options ) {
	$options = array( 
					'10' => '10',
					'50' => '50',
					'100' => '100'
				);
	
	return $options;
}
add_filter( 'donation_available_amounts', 'ncca_donation_amounts' );


/**
 * Remove donations page title
 */
function ncca_hide_donations_page_title() {
	if( is_page( 'donate' ) ) {
		print '<style type="text/css">.pagetitle{display:none}</style>';
	}
}
add_action( 'wp_print_styles', 'ncca_hide_donations_page_title' );


/*
 * Add custom donations page title
 */
function ncca_donations_page_title() {
	$campaign_title = stripslashes( $_POST[ 'campaign_title' ] );
	
	if( is_page( 'donate' ) && !empty( $campaign_title ) ) {
		echo '
			<div id="page-title">
				<h1 class="pagetitle donate">Donate to ' . esc_attr( $campaign_title ) . '</h1>
			</div>';
	} elseif( is_page( 'donate' ) && empty( $campaign_title ) ) {
		echo '
			<div id="page-title">
				<h1 class="pagetitle donate">Donate to ' . get_bloginfo( 'name' ) . '</h1>
				<p style="font-size:19px">Or donate to a specific <a href="/appeals/">Appeal</a> or <a href="/journeys/">Journey</a>.</p>
			</div>';
	}
}
add_action( 'udesign_main_content_top', 'ncca_donations_page_title' );


/**
 * Get the donation campaign title for preview page
 */
function ncca_the_campaign_title() {
	$campaign_title = stripslashes( $_POST[ 'campaign_title' ] );
		echo $campaign_title;
}


/**
 * Hide page title and sidebar when donations form is submitted
 */
function ncca_hide_donations_sidebar() {
	if( is_page( 'donate' ) && isset( $_GET[ 'step' ] ) ) {
		print '<style type="text/css">#sidebar,#page-title{visibility:hidden}</style>';
	}
}
add_action( 'wp_print_styles', 'ncca_hide_donations_sidebar' );


/**
 * Filter content for Appeal and Journey archive pages
 */
function ncca_filter_appeal_archive() {
	if( is_tax( 'appeal_type', 'our_appeal' ) ) {
		echo '
			<p>NCCA UK runs campaigns to fund the treatment of individual children. These campaigns are organised into \'journeys\' and \'appeals\'. The difference between the two formats is whether or not a final decision has been made on which treatment path represents the best option for a family. Appeals are only run when a family have determined their chosen treatment path and, with the charity, have fixed a fundraising total. Journeys are less focused campaigns for funds, keeping children with neuroblastoma in the public consciousness and collecting money for the very probable eventuality that they will require costly treatment path abroad.</p>
			<h3 style="margin: 0 0 20px 0"><a href="/journey_type/our_journey/">Go to Journeys</a></h3>';
	}
}
add_action( 'udesign_main_content_top', 'ncca_filter_appeal_archive', 999 );

function ncca_filter_journey_archive( $content ) {
	if( is_tax( 'journey_type', 'our_journey' ) ) {
		echo '
			<p>NCCA UK runs campaigns to fund the treatment of individual children. These campaigns are organised into \'journeys\' and \'appeals\'. The difference between the two formats is whether or not a final decision has been made on which treatment path represents the best option for a family. Appeals are only run when a family have determined their chosen treatment path and, with the charity, have fixed a fundraising total. Journeys are less focused campaigns for funds, keeping children with neuroblastoma in the public consciousness and collecting money for the very probable eventuality that they will require costly treatment path abroad.</p>
			<h3 style="margin: 0 0 20px 0"><a href="/appeal_type/our_appeal/">Go to Appeals</a></h3>
		';
	}
}
add_action( 'udesign_main_content_top', 'ncca_filter_journey_archive', 999 );
?>
