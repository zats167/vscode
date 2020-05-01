var a = getApp(), t = require("../../../utils/util.js");

Page({
    data: {
        pagenum: 1,
        pagesize: 4,
        yj: []
    },
    onLoad: function(i) {
        var e = this;
        e.id = 0, i.id && (e.id = i.id), t.huanfu(e, function(a) {}), a.util.request({
            url: "entry/wxapp/Url3",
            cachetime: "0",
            success: function(a) {
                e.setData({
                    url3: a.data
                });
            }
        }), t.login(function(a) {
            e.uid = a.id, e.setData({
                userinfo: a
            }), e.tz();
        });
    },
    tz: function() {
        var a = this;
        a.data.pagenum = 1, a.data.isload = !0, a.setData({
            yj: [],
            loadstaue: !1,
            isloadtis: !0
        }), this.reLoad();
    },
    reLoad: function() {
        var i = this;
        i.data.isload ? a.util.request({
            url: "entry/wxapp/userbywifiid",
            cachetime: "0",
            data: {
                userid: i.uid,
                wifi: i.id,
                page: i.data.pagenum,
                pagesize: i.data.pagesize
            },
            success: function(a) {
                console.log("userbywifiid", a.data.data), a.data.data.length < i.data.pagesize ? i.data.isload = !1 : i.data.pagenum += 1;
                for (var e = 0; e < a.data.data.length; e++) a.data.data[e].join_time = t.ormatDate(a.data.data[e].join_time);
                i.data.yj = i.data.yj.concat(a.data.data), i.setData({
                    loadstaue: !0,
                    yj: i.data.yj
                });
            }
        }) : i.setData({
            loadstaue: !0,
            isloadtis: !1,
            loadtis: "下拉到底啦"
        });
    },
    onReady: function() {},
    onShow: function() {},
    onHide: function() {},
    onUnload: function() {},
    onPullDownRefresh: function() {
        wx.stopPullDownRefresh();
    },
    onReachBottom: function() {
        this.setData({
            loadstaue: !1,
            isloadtis: !0
        }), this.reLoad();
    },
    onShareAppMessage: function() {}
});