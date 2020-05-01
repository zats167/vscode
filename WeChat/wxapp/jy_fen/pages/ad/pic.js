var t = getApp(), e = require("../../utils/util.js");

Page({
    data: {
        model: null
    },
    onLoad: function(t) {
        var n = this;
        n.id = 0, t.id ? (n.id = t.id, e.huanfu(n, function(t) {
            n.setData({
                system: t
            });
        }), e.getUrl(n, function(t) {}), n.getModel()) : wx.showToast({
            title: "该信息不存在了！",
            icon: "none",
            duration: 2e3,
            success: function() {
                wx.redirectTo({
                    url: "/jy_fen/pages/wifi/wifi"
                });
            }
        });
    },
    getModel: function() {
        var e = this;
        t.util.request({
            url: "entry/wxapp/getonegg",
            cachetime: "0",
            data: {
                id: e.id
            },
            success: function(t) {
                console.log("getonegg", t.data), 1 == t.data.status ? (e.setData({
                    model: t.data
                }), wx.setNavigationBarTitle({
                    title: t.data.name
                })) : wx.showToast({
                    title: "该信息不存在了！",
                    icon: "none",
                    duration: 2e3,
                    success: function() {
                        wx.redirectTo({
                            url: "/jy_fen/pages/wifi/wifi"
                        });
                    }
                });
            }
        });
    },
    tel_tap: function() {
        wx.makePhoneCall({
            phoneNumber: this.data.model.phone
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