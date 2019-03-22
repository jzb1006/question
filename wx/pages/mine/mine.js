var app = getApp();
var util = require('../../utils/util.js');
var api = require('../../service/model/user.js');
var qcloud = require('../../utils/wafer-client-sdk/index.js');
Page({
  /**
   * 页面的初始数据
   */
  data: {
    userInfo: {},
    hasUserInfo: false, //是否已获取用户信息
    canIUse: wx.canIUse('button.open-type.getUserInfo'),
    myProfile: [],
    introText: null,
    intro: "请在此处填写您的个人简介",
    fans: 0 //用户粉丝
  },
  /**
   * 获取用户信息
   */
  getUserInfo: function () {
    var self = this;
    wx.login({
      success: function (loginResult) {
            wx.getUserInfo({
              success: function(userInfo){
                console.log(userInfo)
                console.log(loginResult)
                var code = loginResult.code;
                var encryptedData = userInfo.encryptedData;
                var iv = userInfo.iv;
                var params = {
                  code,
                  encryptedData,
                  iv
                }
                api.wxLogin(params).then((res) => {
                  console.log(res);
                  wx.setStorage({
                    key: 'miniSession',
                    data: res.data.data.info.session,
                  })
                  self.setData({
                    userInfo:res.data.data.info,
                    fansh:res.data.data.info.fansh,
                    intro: res.data.data.info.info,
                  })
                })
              }
          })

      },
      fail: function (loginError) {
        console.log(loginError)
      },
    });
  },
  /**
   * 找人提问
   */
  toMake: function (e) {
    wx.switchTab({
      url: '../search/search',
    })
  },
  /**
   * 分享秘密
   */
  toShare: function (e) {
    console.log("跳转进入...")
    wx.navigateTo({
      url: '../share/share',
    })
  },
  /**
   * 账户管理
   */
  toMoney: function (e) {
    wx.navigateTo({
      url: '../account/account',
    })
  },
  /**
   * 我的回答记录
   */
  toMyAnswer: function (e) {
    wx.navigateTo({
      url: '../listans/listans',
    })
  },
  /**
   * 充值操作
   */
  toGet: function (e) {
    wx.navigateTo({
      url: '../cash/cash',
    })
  },
  /**
   * 我的提问记录
   */
  toQues: function (e) {
    wx.navigateTo({
      url: '../listques/listques',
    })
  },
  /**
   * 我的分享记录
   */
  toMyShare: function (e) {
    wx.navigateTo({
      url: '../listshares/listshares',
    })
  },
  /**
   * 我的账单记录
   */
  toMyAccount: function (e) {
    wx.navigateTo({
      url: '../listshares/listshares',
    })
  },
  /**
   * 修改个人简介信息
   */
  updateIntro: function (e) {
    var that = this;
    console.log(that.data.introText)
    wx.request({
      url: 'https://stupidant.cn/queswerServer/updateIntro',
      data: {
        'user.username': that.data.userInfo.nickName,
        'intro': that.data.introText
      },
      header: {//请求头
        "Content-Type": "applciation/json"
      },
      method: "GET",
      success: function (res) {
        that.setData({
          intro: res.data.intro
        });
      },
    })
  },
  bindTextAreaBlur: function (e) {
    console.log("1." + e.detail.value)
    this.setData({
      introText: e.detail.value
    })
  },
  onLoad: function () {
  },
})
