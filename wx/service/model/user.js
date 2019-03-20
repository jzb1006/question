var http = require('../../service/http.js');

function saveUser(params) {  // get请求
  return http('user', params, 'POST')
}
module.exports = { saveUser }
