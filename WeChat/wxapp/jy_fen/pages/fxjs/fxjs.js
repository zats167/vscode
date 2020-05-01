var e = getApp(), n = require("../../utils/util.js");

Page({
    data: {
        1000: 3e3
    },
    onLoad: function(o) {
        var t = this;
        n.huanfu(t, function(e) {
            t.setData({
                system: e
            });
        });
        var i = decodeURIComponent(o.scene);
        console.log("e", i);
        var s = 0, a = 0;
        if ("undefined" != i) {
            var c = i.split(",");
            2 == c.length ? (s = c[0], a = c[1]) : s = i;
        }
        null != o.userid && (console.log("转发获取到的userid:", o.userid), s = o.userid), null != o.type && (a = o.type), 
        wx.setNavigationBarTitle({
            title: "登录中..."
        }), wx.login({
            success: function(n) {
                var o = n.code;
                wx.setStorageSync("code", n.code), e.util.request({
                    url: "entry/wxapp/openid",
                    cachetime: "0",
                    data: {
                        code: o
                    },
                    success: function(n) {
                        console.log("openid", n), wx.setStorageSync("key", n.data.session_key), wx.setStorageSync("openid", n.data.openid);
                        var o = n.data.openid;
                        console.log(o), "" == o ? wx.showToast({
                            title: "没有获取到openid",
                            icon: "",
                            image: "",
                            duration: 1e3,
                            mask: !0,
                            success: function(e) {},
                            fail: function(e) {},
                            complete: function(e) {}
                        }) : e.util.request({
                            url: "entry/wxapp/Login",
                            cachetime: "0",
                            data: {
                                openid: o
                            },
                            success: function(n) {
                                console.log("Login", n), wx.setStorageSync("users", n.data), t.uid = n.data.id, 
                                null != s && e.util.request({
                                    url: "entry/wxapp/Binding",
                                    cachetime: "0",
                                    data: {
                                        fx_user: t.uid,
                                        user_id: s
                                    },
                                    success: function(e) {
                                        console.log(e), 4 == a && wx.redirectTo({
                                            url: "/jy_fen/pages/logs/wifi/wifi?dlid=" + s
                                        });
                                    }
                                });
                            }
                        });
                    }
                });
            }
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