let baseURL_signup = 'http://localhost/loanApp/index.php';

let isLoggedIn = phpObj.isLogedIn;

function signUpUserData() {
  console.log(isLoggedIn);

  return {
    firstName: '',
    lastName: '',
    email: '',
    password: '',

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

          window.location.replace(`${baseURL_signup}`);

          //  window.location.replace(`${baseURL_signup}/index.php/sign-in`);
        })
        .catch((err) => console.log(err));
    },
  };
}
