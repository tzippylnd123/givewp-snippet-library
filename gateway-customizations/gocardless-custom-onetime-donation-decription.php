<?php
/**
 * Set custom description for onetime donation for gocardless payment gateway
 * Note: this snippet only work with Gocardless version >= 1.3.3
 *
 * @param $description
 * @param $payment_id
 * @param $payment_type
 *
 * @return mixed
 */
function give_gocardless_onetime_donation_description( $description, $payment_id, $payment_type ) {

	if( 'single' === $payment_type ){
		$description = sprintf(
			__( '%1$s - %2$s%3$s one time donation', 'give' ),
			get_the_title( give_get_payment_form_id( $payment_id ) ),
			gocardless_get_currency_sign( give_get_currency() ),
			give_donation_amount( $payment_id )
		);

	}

	return $description;

}

add_filter( 'gocardless_get_payment_description', 'give_gocardless_onetime_donation_description', 10, 3 );
