<?php

/**
 * Plugin Name:       Get Loan
 * Plugin URI:        http://localhost/my_loan_app/
 * Description:       Loan Application form for my_loan_app
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Edozie Nneke
 */

function enqueue_get_loan_files()
{

  wp_enqueue_script('get_loan_js', plugin_dir_url(__FILE__) . './assets/getLoan.js', array(), false);

  wp_localize_script('get_loan_js', 'objectName', array(
    'isUserLoggedIn' =>  is_user_logged_in()
  ));

  wp_enqueue_style('get_loan_css', plugin_dir_url(__FILE__) . './assets/getLoan.css', array());
}
add_action('init', 'enqueue_get_loan_files');

function getLoan()
{

?>

  <section x-data="getLoanData();" class="container">
    <div id="toastbox" x-ref=""></div>
    <form @submit.prevent="getLoan();">
      <div class="row my-3">
        <div class="col">
          <label for="customer_bvn" class="form-label">BVN</label>
          <input x-model="customer_bvn" type="number" class="form-control tab_input" id="customer_bvn" placeholder="10101010101" />
        </div>
      </div>

      <div class="row my-3">
        <div class="col">
          <label for="customer_tel" class="form-label">Phone</label>
          <input x-model="customer_tel" type="tel" class="form-control tab_input" id="customer_tel" placeholder="0801 234 5678" />
        </div>
      </div>

      <div class="row my-3">
        <label for="loan_amount" class="form-label">Loan Amount</label>
        <div class="col input-group">
          <span class="input-group-text" id="basic-addon1"> &#8358; </span>
          <input x-model="loan_amount" type="number" class="form-control tab_input" id="loan_amount" placeholder="" />
        </div>
      </div>

      <div class="row my-4">
        <div class="col">
          <button x-text="isComplete ? 'Submit' : 'Continue'" x-bind:type="isComplete ? 'submit' : 'button'" class="btn btn-success signupBtn"></button>
        </div>
      </div>
    </form>
  </section>

<?php
}
add_shortcode('getLoan', 'getLoan');
