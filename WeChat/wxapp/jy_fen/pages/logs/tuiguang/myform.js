var t = getApp(), e = require("../../../utils/util.js");

Page({
    data: {},
    onLoad: function(n) {
        var a = this;
        e.huanfu(a, function(t) {
            a.setData({
                system: t
            });
        }), e.getUrl(a, function(t) {}), e.login(function(n) {
            console.log(n);
            var o = n.id;
            t.util.request({
                url: "entry/wxapp/MyggruZhu",
                cachetime: "0",
                data: {
                    user_id: o
                },
                success: function(n) {
                    console.log(n), t.util.request({
                        url: "entry/wxapp/userfklist",
                        cachetime: "0",
                        data: {
                            ggzid: n.data.id
                        },
                        success: function(t) {
                            for (var n = 0; n < t.data.length; n++) t.data[n].created_time = e.ormatDate(t.data[n].created_time);
                            console.log(t), a.setData({
                                list: t.data
                            });
                        }
                    });
                }
            });
        });
    },
    tzjfsc: function() {
        wx.redirectTo({
            url: "../integral/integral"
        });
    },
    tel: function(t) {
        console.log(t.currentTarget.dataset.tel), wx.makePhoneCall({
            phoneNumber: t.currentTarget.dataset.tel
        });
    },
    onReady: function() {},
    onShow: function() {},
    onHide: function() {},
    onUnload: function() {},
    onPullDownRefresh: function() {},
    onReachBottom: function() {},
    onShareAppMessage: function() {}
});