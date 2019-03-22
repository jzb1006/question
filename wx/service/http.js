var app = getApp();
var common = require('../utils/common.js');
common.getAuthentication();
var authentication = wx.getStorageSync('authentication')
var session = wx.getStorageSync('miniSession')
module.exports = function (url='', params,method='POST'){
    console.log("数据",params);
    return new Promise((resolve,reject)=>{
        wx.request({
          url: app.globalData.apiHost+url,
          method:method,
          data:params,
          header:{
            "Content-Type": "applciation/json",
            "authentication": authentication,
            "3rd-session": session
          },
          success:resolve,
          fail:reject
        })
    })
}