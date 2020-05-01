var n = getApp(), t = require("../../utils/util.js");

Page({
    data: {
        list: [ {
            id: "form",
            name: "优惠券的帮助中心",
            open: !1,
            pages: "优惠券的帮助中心主要显示用户可能回碰到的问题,正在开发中，敬请期待"
        }, {
            id: "form",
            name: "优惠券的帮助中心",
            open: !1,
            pages: "优惠券的帮助中心主要显示用户可能回碰到的问题,正在开发中，敬请期待"
        }, {
            id: "form",
            name: "优惠券的帮助中心",
            open: !1,
            pages: "优惠券的帮助中心主要显示用户可能回碰到的问题,正在开发中，敬请期待"
        } ]
    },
    kindToggle: function(n) {
        var t = n.currentTarget.id, e = this.data.list;
        console.log(t);
        for (var o = 0, a = e.length; o < a; ++o) e[o].open = o == t && !e[o].open;
        this.setData({
            list: e
        });
    },
    onLoad: function(e) {
        var o = this;
        t.huanfu(o, function(n) {
            o.setData({
                system: n
            });
        }), t.getUrl(o, function(n) {}), n.util.request({
            url: "entry/wxapp/GetHelp",
            cachetime: "0",
            success: function(n) {
                console.log(n.data), o.setData({
                    list: n.data
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