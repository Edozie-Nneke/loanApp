let baseURL_getLoan = 'http://localhost/my_loan_app/index.php';

const userCreditScore = objectName.userCreditScore;

function getLoanData() {
  // console.log(userCreditScore);
  return {
    user_credit_score: userCreditScore,
    customer_bvn: '',
    customer_tel: '',
    loan_amount: '',
    prompt_msg: '',
    password: '',
    isEligible: false,
    isComplete: false,

    async postASYNCFunc(url = '', data = {}) {
      const response = await fetch(url, {
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache',
        credentials: 'same-origin',
        headers: {
          'Content-Type': 'application/json',
        },
        redirect: 'follow',
        referrerPolicy: 'no-referrer',
        body: JSON.stringify(data),
      });
      return response.json();
    },

    checkEligibility() {
      if (this.user_credit_score === '1' && this.loan_amount === 5000) {
        this.isEligible = true;
      } else if (
        this.user_credit_score === '2' &&
        this.loan_amount >= 5000 &&
        this.loan_amount <= 10000
      ) {
        this.isEligible = true;
      } else if (
        this.user_credit_score === '3' &&
        this.loan_amount >= 10000 &&
        this.loan_amount <= 30000
      ) {
        this.isEligible = true;
      } else if (
        this.user_credit_score === '4' &&
        this.loan_amount >= 15000 &&
        this.loan_amount <= 40000
      ) {
        this.isEligible = true;
      } else if (
        this.user_credit_score === '5' &&
        this.loan_amount >= 20000 &&
        this.loan_amount <= 50000
      ) {
        this.isEligible = true;
      } else {
        this.isEligible = false;
        this.prompt_msg = `You are not eligible to get N${this.loan_amount} loan.`;
        setTimeout(() => {
          this.prompt_msg = '';
        }, 5000);
      }
    },

    getLoan() {},
  };
}
