var t = getApp(), n = require("../../../utils/util.js");

Page({
    data: {
        tabs: [ "我的wifi列表", "二级代理wifi列表" ],
        activeIndex: 0,
        djd: []
    },
    tabClick: function(t) {
        this.setData({
            activeIndex: t.currentTarget.id
        });
    },
    onLoad: function(e) {
        var i = this, a = wx.getStorageSync("users").id;
        n.huanfu(i, function(t) {
            i.setData({
                system: t
            });
        }), n.getUrl(i, function(t) {}), t.util.request({
            url: "entry/wxapp/myitwifilist",
            cachetime: "0",
            data: {
                user_id: a,
                type: e.tye
            },
            success: function(t) {
                console.log(t);
                var e = [];
                e = t.data.one, console.log(e.length);
                for (var a = 0; a < e.length; a++) e[a].addtime = n.ormatDate(e[a].addtime);
                i.setData({
                    yj: e
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