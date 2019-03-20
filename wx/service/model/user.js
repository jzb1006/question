var http = require('../../service/http.js');

function saveUser(params) {  // get请求
  return http('user', params, 'POST')
}

function wxLogin(params){
  return http('user/login', params,'POST')
}
module.exports = { saveUser, wxLogin}
