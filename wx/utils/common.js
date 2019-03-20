var app = getApp();
//获取用户密钥
function getAccesstoken() {
    var timestamp = Math.ceil(((new Date()).getTime())/1000);
    return new Promise( (resolve, reject)=>{
      wx.request({
        url: app.globalData.apiHost +'token/token',
        header: {
          "Content-Type": "applciation/json",
        },
        data: {
          appid: app.globalData.appid,
          mobile: app.globalData.mobile,
          nonce: app.globalData.nonce,
          timestamp: timestamp,
        },
        method: "POST",
        success(res) {
          console.log(res);
          if (res.data.code=='200'){
             resolve(res.data);
          }else{
            reject(res.data.message)
          }
          
        }
      })
     
    })
  }
//获得访问接口密钥
function getAuthentication(){
  getAccesstoken().then((res)=>{
    app.globalData.access_token = res.data.access_token;
    app.globalData.refresh_token = res.data.refresh_token;
    wx.request({
      url: app.globalData.apiHost+'getAuthentication/index',
      method:'POST',
      data:{
        'appid': app.globalData.appid,
        'uid': app.globalData.uid,
        'accesstoken': app.globalData.access_token
      },
      success(res){
        if(res.data.code==200){
          app.globalData.authentication = res.data.data.authentication;
          console.log(app.globalData.refresh_token)
        }
      }
    })
  }).catch((err)=>{
    console.log(err);
  });
}
//刷新用户密钥
function refreshToken(){
  wx.request({
    url: app.globalData.apiHost + 'token/refresh',
    method: 'POST',
    data: {
      'appid': app.globalData.appid,
      'refresh_token': app.globalData.access_token
    },
    success(res) {
      if (res.data.code == 200) {
        app.globalData.access_token = res.data.access_token;
        app.globalData.refresh_token = res.data.refresh_token;
        console.log(app.globalData.refresh_token)
      }
    }
  })
}
// //初始化用户访问权限
function initAuthentication(){
  if (app.globalData.authentication == ''){
     getAuthentication();
  }
}
module.exports.refreshToken = refreshToken;
module.exports.getAuthentication = getAuthentication;
module.exports.initAuthentication = initAuthentication;