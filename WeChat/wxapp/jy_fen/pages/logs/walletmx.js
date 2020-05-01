var a = getApp(), t = require("../../utils/util.js");

Page({
    data: {
        pagenum: 0,
        pagesize: 15
    },
    onLoad: function(a) {
        var e = this;
        t.huanfu(e, function(a) {
            e.setData({
                system: a
            });
        }), t.getUrl(e, function(a) {}), t.login(function(a) {
            console.log(a), e.uid = a.id, e.dataIni();
        });
    },
    dataIni: function() {
        var a = this;
        a.data.pagenum = 1, a.data.score = [], a.data.isload = !0, a.data.isloadtis = !0, 
        a.setData({
            v: new Date().getTime(),
            loadstaue: !1
        }), a.getscoreList();
    },
    getscoreList: function() {
        var t = this;
        t.data.isload ? (console.log("user_id", t.uid), a.util.request({
            url: "entry/wxapp/Qbmxlimit",
            cachetime: "0",
            data: {
                user_id: t.uid,
                pagesize: t.data.pagesize,
                page: t.data.pagenum
            },
            success: function(a) {
                console.log("Qbmxlimit", a.data), a.data.length < t.data.pagesize ? t.data.isload = !1 : t.data.pagenum += 1, 
                t.data.score = t.data.score.concat(a.data), t.setData({
                    loadstaue: !0,
                    score: t.data.score
                });
            }
        })) : t.setData({
            loadstaue: !0,
            isloadtis: !1,
            loadtis: "下拉到底啦"
        });
    },
    tzjfsc: function() {
        wx.redirectTo({
            url: "../integral/integral"
        });
    },
    onReady: function() {},
    onShow: function() {},
    onHide: function() {},
    onUnload: function() {},
    onPullDownRefresh: function() {
        this.dataIni(), setTimeout(function() {
            wx.stopPullDownRefresh();
        }, 500);
    },
    onReachBottom: function() {
        console.log("234"), this.setData({
            loadstaue: !1
        }), this.getscoreList();
    },
    onShareAppMessage: function() {}
});