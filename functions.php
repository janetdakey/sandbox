<?php

/* ---------------------------------------------------------------------------
 * Enqueue Style
 * --------------------------------------------------------------------------- */
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

/* ---------------------------------------------------------------------------
 * Enqueue other Scripts here
 * --------------------------------------------------------------------------- */
 
/**
 * Add a text field to the donation form.
 */
 function ed_charitable_register_honor_memory_name_field() {
    /**
     * Define a new text field.
     */
    $field = new Charitable_Donation_Field( 'honor_memory_name', array(
        'label' => __( 'Donation Cause', 'charitable' ),
        'data_type' => 'user',
        'donation_form' => array(
            'show_after' => 'phone',
            'required'   => false,
        ),
        'admin_form' => true,
        'show_in_meta' => true,
        'show_in_export' => true,
        'email_tag' => array(
            'description' => __( 'In honor or memory of, or for event' , 'charitable' ),
        ),
    ) );
    /**
     * Register the field.
     */
    charitable()->donation_fields()->register_field( $field );
}
add_action( 'init', 'ed_charitable_register_honor_memory_name_field' );

/**
 * Add a text field to the donation form.
 */
 function ed_charitable_register_honor_memory_label_field() {
    /**
     * Define a new text field.
     */
    $field = new Charitable_Donation_Field( 'honor_memory_label', array(
        'label' => __( 'If you would like to make your donation in honor/memory of someone, for a program or for a NATAL event, please specify below.', 'charitable' ),
        'data_type' => 'user',
        'donation_form' => array(
            'show_after' => 'phone',
            'required'   => false,
        ),
        'admin_form' => true,
        'show_in_meta' => true,
        'show_in_export' => true,
        'email_tag' => array(
            'description' => __( 'In honor or memory of, or for event' , 'charitable' ),
        ),
    ) );
    /**
     * Register the field.
     */
    charitable()->donation_fields()->register_field( $field );
}
add_action( 'init', 'ed_charitable_register_honor_memory_label_field' );


/**
 * Make all address fields required.
 *
 * @param   array[] $fields
 * @return  array[]
 */
function ed_make_donor_address_required( $fields ) {
    /**
     * These are the fields that we will make required. 
     */
    $required_fields = array(
        'address',
        // 'address_2',
        'city',
        'state',
        'postcode',
        'country',
        'phone'
    );
    foreach ( $required_fields as $key ) {
        $fields[ $key ][ 'required' ] = true;
    }
    return $fields;
}
add_filter( 'charitable_donation_form_user_fields', 'ed_make_donor_address_required' );


?>
