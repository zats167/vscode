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
        e.data.isload ? a.util.request({
            url: "entry/wxapp/getallist",
            cachetime: "0",
            data: {
                type: e.options.type,
                wxappid: e.options.wxappid,
                pagesize: e.data.pagesize,
                page: e.data.pagenum
            },
            success: function(a) {
                console.log(a), a.data.length < e.data.pagesize ? e.data.isload = !1 : e.data.pagenum += 1;
                for (o = 0; o < a.data.length; o++) a.data[o].dateline && (a.data[o].dateline = t.ormatDate(a.data[o].dateline));
                for (var o = 0; o < a.data.length; o++) a.data[o].gz_time && (a.data[o].gz_time = t.ormatDate(a.data[o].gz_time));
                e.data.score = e.data.score.concat(a.data), console.log(e), e.setData({
                    loadstaue: !0,
                    symx: e.data.score
                });
            }
        }) : e.setData({
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