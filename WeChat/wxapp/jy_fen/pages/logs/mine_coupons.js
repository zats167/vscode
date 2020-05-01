var t = getApp(), e = require("../../utils/util.js");

require("../../../siteinfo.js");

Page({
    data: {
        totalPrice: 0,
        fwxy: !0,
        current_time: ""
    },
    onLoad: function(a) {
        var o = this, n = this;
        e.getUrl(o, function(t) {
            e.huanfu(o, function(t) {});
        }), e.login(function(e) {
            if (n.setData({
                uid: e.id
            }), null == a.totalPrice) var o = 0; else o = Number(a.totalPrice);
            var i;
            i = null == a.state ? 0 : a.state, n.setData({
                states: i,
                totalPrice: o
            });
            var s = n.data.uid;
            t.util.request({
                url: "entry/wxapp/myVoucher",
                cachetime: "0",
                data: {
                    user_id: s
                },
                success: function(t) {
                    console.log("myVoucher", t);
                    var e = t.data.data;
                    if (1 == n.data.states) for (i = 0; i < e.length; i++) e[i].s = !1, console.log("2222", e[i]), 
                    console.log("2222", n.data.totalPrice), console.log("3333", e[i].conditions), n.data.totalPrice >= e[i].conditions && (e[i].s = !0);
                    n.setData({
                        Vouchers: e
                    });
                }
            });
        });
    },
    select: function(t) {
        wx.navigateBack({
            delta: 1
        });
    },
    user: function(t) {
        console.log(this.data.Vouchers[t.target.dataset.index].id), console.log(this.data.Vouchers[t.target.dataset.index].preferential), 
        wx.setStorageSync("vouchers_id", this.data.Vouchers[t.target.dataset.index].id), 
        wx.setStorageSync("vprice", this.data.Vouchers[t.target.dataset.index].preferential), 
        wx.navigateBack({
            delta: 1
        });
    },
    hexiao: function(e) {
        var a = this;
        console.log(a), console.log(e), a.setData({
            code: ""
        }), t.util.request({
            url: "entry/wxapp/couponhxCode",
            cachetime: "0",
            data: {
                id: e.currentTarget.id,
                type: e.currentTarget.dataset.types
            },
            success: function(t) {
                console.log(t), a.setData({
                    code: t.data,
                    fwxy: !1
                });
            }
        });
    },
    yczz: function() {
        this.setData({
            fwxy: !0
        });
    },
    onReady: function() {},
    onShow: function() {},
    onHide: function() {},
    onUnload: function() {},
    onPullDownRefresh: function() {
        this.onLoad(), wx.stopPullDownRefresh();
    },
    onReachBottom: function() {},
    onShareAppMessage: function() {}
});