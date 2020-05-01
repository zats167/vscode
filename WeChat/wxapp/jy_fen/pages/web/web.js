getApp();

var n = require("../../utils/util.js");

Page({
    data: {
        url: ""
    },
    onLoad: function(o) {
        var t = this;
        console.log("options.url", o.url), o.url ? n.huanfu(t, function(n) {
            t.setData({
                system: n,
                url: decodeURIComponent(o.url)
            });
        }) : wx.showToast({
            title: "该地址不存在了！",
            icon: "none",
            duration: 2e3,
            success: function() {
                wx.reLaunch({
                    url: "/jy_fen/pages/wifi/wifi"
                });
            }
        });
    },
    onReady: function() {},
    onShow: function() {},
    onHide: function() {},
    onUnload: function() {},
    onPullDownRefresh: function() {
        wx.stopPullDownRefresh();
    },
    onReachBottom: function() {},
    onShareAppMessage: function() {}
});