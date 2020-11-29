import * as axios from "axios";


const auth = {
  login: (login, password) => {
      return new Promise((success, failure) => {
                axios({
                    method: "POST",
                    url: "login",
                    data: {
                        'email': login,
                        'password': password
                    }
                })
                    .then(resp => {
                        let token = resp.data.data.api_token;
                        success(token)
                    })
                    .catch(err => {
                        failure(err)
                    });
          }
      );
  }
};

export default auth;