let baseURL_signup = 'http://localhost/loanApp/index.php';

let isLoggedIn = phpObj.isLogedIn;

function signUpUserData() {
  return {
    firstName: '',
    lastName: '',
    email: '',
    password: '',
    signup_msg: '',

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

    signup() {
      this.signup_msg = '';
      const userData = {
        firstname: this.firstName,
        lastname: this.lastName,
        email: this.email,
        password: this.password,
      };

      this.postASYNCFunc(
        `${baseURL_signup}/wp-json/api/v1/signup-loan-user`,
        userData
      )
        .then((res) => {
          console.log(res);
          this.signup_msg = 'Sign up Successful';

          setTimeout(() => {
            window.location.replace(`${baseURL_signup}/index.php/sign-in`);
          }, 5000);
        })
        .catch((err) => {
          this.signup_msg = 'Unable to register. Please try again';
          console.log(err);
        });
    },
  };
}
