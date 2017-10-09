<?php
/**
 * Function to handle email subscriptions
 *
 * @package manofbytes
 */

/**
 * Handle subscriptions
 */
function mob_subscribe() {
	require_once( get_template_directory() . '/api/activecampaign/config.php' );
	require_once( get_template_directory() . '/api/activecampaign/ActiveCampaign.class.php' );

	$ac = new ActiveCampaign( ACTIVECAMPAIGN_URL, ACTIVECAMPAIGN_API_KEY );

	$email = sanitize_email( $_POST['email'] );
	$response;

	if ( ! empty( $email ) ) {
		if ( filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {

			// Check if contact exists in AC.
			$check_exists = $ac->api( 'contact/view?email=' . $email );

			if ( $check_exists->result_code == 0 ) {
				// Contact doesn't exist so we add it to list.
				$contact = array(
					'email'     => $email,
					'p[6]'      => 6, // List id.
					'status[1]' => 1,
					'ip4'       => $_SERVER['REMOTE_ADDR'],
				);

				// Add to list.
				$contact_sync = $ac->api( 'contact/sync', $contact );
			}

			$response['success'] = true;
			echo wp_json_encode( $response );

			wp_die();

		} else {
			$response['error'] = '<p>Not a valid email address.</p>';
			echo wp_json_encode( $response );
			wp_die();
		}
	} else {
		$response['error'] = '<p>Please add your email address first!</p>';
		echo wp_json_encode( $response );
		wp_die();
	}
}
add_action( 'wp_ajax_nopriv_mob_subscribe', 'mob_subscribe' );
