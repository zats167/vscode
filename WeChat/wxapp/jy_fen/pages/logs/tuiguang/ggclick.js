var t = getApp(), n = require("../../../utils/util.js");

Page({
    data: {},
    onLoad: function(o) {
        var a = this;
        console.log(o.yyid), n.huanfu(a, function(t) {
            a.setData({
                system: t
            });
        }), t.util.request({
            url: "entry/wxapp/myggclicklist",
            cachetime: "0",
            data: {
                ggid: o.yyid
            },
            success: function(t) {
                for (var o = 0; o < t.data.length; o++) t.data[o].time = n.ormatDate(t.data[o].time);
                console.log(t), a.setData({
                    list: t.data
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