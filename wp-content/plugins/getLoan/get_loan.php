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
    'isUserLoggedIn' =>  is_user_logged_in(),
    'userCreditScore' => get_user_meta(get_current_user_id(), 'user_credit_score', true)
    // 'userCreditScore' => 2
  ));

  wp_enqueue_style('get_loan_css', plugin_dir_url(__FILE__) . './assets/getLoan.css', array());
}
add_action('init', 'enqueue_get_loan_files');

function getLoan()
{
  $userId = get_current_user_id();
  $user_credit_score = get_user_meta($userId, 'user_credit_score', true);

  $max_amount = 0;
  $min_amount = 0;

  switch ($user_credit_score) {

    case 1:
      $max_amount = 5000;
      $min_amount = 5000;
      break;
    case 2:
      $max_amount = 10000;
      $min_amount = 5000;
      break;
    case 3:
      $max_amount = 30000;
      $min_amount = 10000;
      break;
    case 4:
      $max_amount = 40000;
      $min_amount = 15000;
      break;
    case 5:
      $max_amount = 50000;
      $min_amount = 20000;
      break;
    default:
      $max_amount = 5000;
      $min_amount = 0;
      break;
  }


?>

  <section x-data="getLoanData();" class="container">
    <div id="toastbox" x-ref="notification"></div>
    <form @submit.prevent="getLoan();">
      <div class="row my-3">
        <label for="loan_amount" class="form-label">Loan Amount</label>
        <div class="col input-group">
          <span class="input-group-text" id="basic-addon1"> &#8358; </span>
          <input x-model="loan_amount" max="<?php echo $max_amount; ?>" min="<?php echo $min_amount; ?>" type="number" class="form-control tab_input" id="loan_amount" placeholder="" />
        </div>
      </div>

      <template x-if="isEligible == true">
        <div x-transition class="row my-3">
          <div class="col">
            <label for="customer_bvn" class="form-label">BVN</label>
            <input x-model="customer_bvn" type="number" class="form-control tab_input" id="customer_bvn" placeholder="10101010101" />
          </div>
        </div>
      </template>

      <template x-if="isEligible == true">
        <div x-transition class="row my-3">
          <div class="col">
            <label for="phone_num" class="form-label">Phone</label>
            <input x-model="phone_num" type="tel" class="form-control tab_input" id="phone_num" placeholder="0801 234 5678" />
          </div>
        </div>
      </template>

      <div class="row my-4">
        <div class="col">
          <button x-text="isComplete ? 'Submit' : 'Continue'" x-bind:type="isComplete ? 'submit' : 'button'" class="btn btn-success signupBtn" @click="checkEligibility();"></button>
        </div>
        <div class="my-3 prompt_msg">
          <p x-text="prompt_msg" x-ref="prompt_msg_ref"></p>
        </div>
      </div>
    </form>
  </section>

<?php
}
add_shortcode('getLoan', 'getLoan');
