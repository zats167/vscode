var t = getApp(), e = require("../../../utils/util.js");

Page({
    data: {
        scrollheight: 0
    },
    onLoad: function(a) {
        var n = this;
        e.huanfu(n, function(t) {
            n.setData({
                system: t
            });
        }), wx.getSystemInfo({
            success: function(t) {
                n.setData({
                    scrollheight: t.windowHeight / t.windowWidth * 750 - 100
                });
            }
        }), t.util.request({
            url: "entry/wxapp/Url3",
            cachetime: "0",
            success: function(t) {
                n.setData({
                    url3: t.data
                });
            }
        }), t.util.request({
            url: "entry/wxapp/Url",
            cachetime: "0",
            success: function(t) {
                n.setData({
                    url: t.data
                });
            }
        }), t.util.request({
            url: "entry/wxapp/yangshilist",
            cachetime: "0",
            success: function(t) {
                console.log("yangshi", t.data), 1 == t.data.status && n.setData({
                    yangshilist: t.data.data
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
    onShareAppMessage: function() {},
    toxx: function(t) {
        var e = t.currentTarget.dataset.id;
        wx.setStorageSync("key-ysid", e), wx.navigateBack({
            delta: 1
        });
    }
});