var n = getApp(), t = require("../../utils/util.js");

Page({
    data: {},
    onLoad: function(o) {
        var a = this;
        t.huanfu(a, function(n) {
            a.setData({
                system: n
            });
        }), t.getUrl(a, function(n) {}), t.login(function(t) {
            console.log(t), a.uid = t.id, n.util.request({
                url: "entry/wxapp/UserInfo",
                cachetime: "0",
                data: {
                    user_id: a.uid
                },
                success: function(n) {
                    console.log(n), a.setData({
                        wallet: n.data.wallet
                    });
                }
            }), n.util.request({
                url: "entry/wxapp/Qbmx",
                cachetime: "0",
                data: {
                    user_id: a.uid
                },
                success: function(n) {
                    console.log("Qbmx", n), a.setData({
                        score: n.data
                    });
                }
            });
        });
    },
    cash: function(n) {
        wx.navigateTo({
            url: "cash"
        });
    },
    tixian: function(n) {
        wx.navigateTo({
            url: "tixian"
        });
    },
    tradeinfo: function(n) {
        wx.navigateTo({
            url: "walletmx"
        });
    },
    onReady: function() {},
    onShow: function() {
        this.onLoad();
    },
    onHide: function() {},
    onUnload: function() {},
    onPullDownRefresh: function() {},
    onReachBottom: function() {},
    onShareAppMessage: function() {}
});