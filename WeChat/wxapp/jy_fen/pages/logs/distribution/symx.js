var a = getApp(), t = require("../../../utils/util.js");

Page({
    data: {
        symx: [],
        pagenum: 0,
        pagesize: 15
    },
    onLoad: function(a) {
        var e = this;
        t.huanfu(e, function(a) {
            e.setData({
                link_logo: a.link_logo,
                pt_name: a.pt_name,
                system: a
            });
        }), t.getUrl(e, function(a) {}), t.login(function(a) {
            e.usersinfo = a, e.uid = a.id, e.dataIni();
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
        var e = this;
        e.data.isload ? (console.log("user_id", e.uid), a.util.request({
            url: "entry/wxapp/Earningslimit",
            cachetime: "0",
            data: {
                user_id: e.uid,
                pagesize: e.data.pagesize,
                page: e.data.pagenum
            },
            success: function(a) {
                console.log("Earningslimit", a.data), a.data.length < e.data.pagesize ? e.data.isload = !1 : e.data.pagenum += 1;
                for (var n = 0; n < a.data.length; n++) a.data[n].time = t.ormatDate(a.data[n].time);
                e.data.score = e.data.score.concat(a.data), e.setData({
                    loadstaue: !0,
                    symx: e.data.score
                });
            }
        })) : e.setData({
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