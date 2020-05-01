var t = getApp(), a = require("../../../utils/util.js");

Page({
    data: {},
    onLoad: function(e) {
        var n = this;
        a.huanfu(n, function(t) {
            n.setData({
                system: t
            });
        }), a.getUrl(n, function(t) {}), a.login(function(e) {
            console.log(e);
            var o = e.id;
            t.util.request({
                url: "entry/wxapp/MyggruZhu",
                cachetime: "0",
                data: {
                    user_id: o
                },
                success: function(e) {
                    console.log(e), t.util.request({
                        url: "entry/wxapp/mygglist",
                        cachetime: "0",
                        data: {
                            ggzid: e.data.id
                        },
                        success: function(t) {
                            for (var e = 0; e < t.data.length; e++) t.data[e].time = a.ormatDate(t.data[e].time), 
                            t.data[e].start_time = a.ormatDate(t.data[e].start_time), t.data[e].end_time = a.ormatDate(t.data[e].end_time);
                            console.log(t), n.setData({
                                list: t.data
                            });
                        }
                    });
                }
            });
        });
    },
    onReady: function() {},
    onShow: function() {},
    onHide: function() {},
    onUnload: function() {},
    onPullDownRefresh: function() {},
    onReachBottom: function() {},
    onShareAppMessage: function() {},
    qxyy: function(t) {
        var a = t.currentTarget.dataset.ggid;
        console.log("234"), console.log("234", a), wx.navigateTo({
            url: "mytuiguang?id=" + a
        });
    },
    ckxq: function(t) {
        var e = this, n = t.currentTarget.dataset.index;
        console.log(n), a.adDeal(e.data.list[t.currentTarget.dataset.index]);
    }
});