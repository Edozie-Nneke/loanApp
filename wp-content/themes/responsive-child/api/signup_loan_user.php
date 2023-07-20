<?php

// Endpoint to create a user
function signup_loan_user_endpoint(WP_REST_Request $request) {

    $params = $request->get_json_params();
    // return $params;
    
    // Validate required parameters
    if (empty($params['firstname']) || empty($params['lastname']) || empty($params['email']) || empty($params['password'])) {
      return new WP_Error('missing_parameters', 'Required parameters are missing.', array('status' => 400));
    }
    
    $firstname = sanitize_text_field($params['firstname']);
    $lastname = sanitize_text_field($params['lastname']);
    $email = sanitize_email($params['email']);
    $password = $params['password'];
    
    // Validate email format
    if (!is_email($email)) {
        return new WP_Error('invalid_email', 'Invalid email format.', array('status' => 400));
    }
    
    // Validate password strength (you can customize the validation as needed)
    if (strlen($password) < 6) {
        return new WP_Error('weak_password', 'Password must be at least 6 characters long.', array('status' => 400));
    }
    
    // Check if user with the provided email already exists
    if (email_exists($email)) {
        return new WP_Error('user_exists', 'User with this email already exists.', array('status' => 400));
    }
    
    // Create the user
    $user_id = wp_create_user($email, $password, $email);
    
    if (is_wp_error($user_id)) {
        return new WP_Error('create_user_failed', 'Failed to create user.', array('status' => 500));
    }
    
    // Update user meta with first name and last name
    $user_credit_score = 0;

    update_user_meta($user_id, 'first_name', $firstname);
    update_user_meta($user_id, 'last_name', $lastname);
    update_user_meta($user_id, 'user_credit_score', $user_credit_score);
    
    // Return success response
    return array(
        'message' => 'User created successfully.',
        'user_id' => $user_id,
    );
}

// Register the API endpoint
function register_user_api_endpoint() {
    register_rest_route('api/v1', '/signup-loan-user', array(
        'methods' => 'POST',
        'callback' => 'signup_loan_user_endpoint',
        'permission_callback' => '__return_true'
    ));
}
add_action('rest_api_init', 'register_user_api_endpoint');

