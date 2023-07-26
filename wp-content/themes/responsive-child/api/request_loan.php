<?php

//Endpoint to request loan

function request_loan_endpoint(WP_REST_Request $request)
{

  // Get the data from the request
  $loan_amount = $request->get_param('loan_amount');
  $customer_bvn = $request->get_param('customer_bvn');
  $phone_num = $request->get_param('phone_num');


  // Data validation (you should add more validation as per your requirements)
  if (empty($loan_amount) || empty($customer_name) || empty($phone_num)) {
    return new WP_REST_Response(array('error' => 'Missing required fields.'), 400);
  }

  /**
   * Standard variables
   */
  $loan_interest = 4.2;

  $loan_period = '+7 days';

  $loan_request_date = date('Y-m-d');

  $loan_due_date = date('Y-m-d', strtotime($loan_period, strtotime($loan_request_date)));

  $loan_outstanding_amount = $loan_interest * $loan_amount;

  $loan_status = 'out standing';

  // Insert data into loan_table (replace 'your_db_prefix_' with your actual database table prefix)
  global $wpdb;
  $table_name = $wpdb->prefix . 'loan_table';
  $result = $wpdb->insert(
    $table_name,
    array(
      'user_id' => get_current_user_id(),
      'bvn' => $customer_bvn,
      'phone_num' => $phone_num,
      'loan_requested_amount' => $loan_amount,
      'loan_funded_amount' => $loan_amount,
      'loan_interest' => $loan_interest,
      'loan_period' => $loan_period,
      'loan_request_date' => $loan_request_date,
      'loan_due_date' => $loan_due_date,
      'loan_status' => $loan_status,
      'loan_outstanding_amount' => $loan_outstanding_amount,

    )
  );

  if ($result === false) {
    return new WP_REST_Response(array('error' => 'Failed to insert data.'), 500);
  }

  // Data inserted successfully
  return new WP_REST_Response(array('success' => true), 200);
}

// Register the API endpoint
function register_user_api_endpoint()
{
  register_rest_route('api/v1', '/request-loan', array(
    'methods' => 'POST',
    'callback' => 'request_loan_endpoint',
    'permission_callback' => '__return_true'
  ));
}
add_action('rest_api_init', 'register_user_api_endpoint');
