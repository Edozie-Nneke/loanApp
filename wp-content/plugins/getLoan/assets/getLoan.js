let baseURL_getLoan = 'http://localhost/my_loan_app/index.php';

function getLoanData() {
  return {
    customer_bvn: '',
    customer_tel: '',
    loan_amount: '',
    password: '',
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
  };
}
