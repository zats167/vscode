var a = getApp(), t = require("../../../utils/util.js");

Page({
    data: {
        pagenum: 1,
        pagesize: 5
    },
    onLoad: function(e) {
        var i = this;
        t.huanfu(i, function(a) {
            i.setData({
                system: a
            });
        }), i.id = 0, e.id ? (i.id = e.id, t.getUrl(i, function(a) {}), t.login(function(t) {
            console.log(t);
            var e = t.id;
            a.util.request({
                url: "entry/wxapp/MyggruZhu",
                cachetime: "0",
                data: {
                    user_id: e
                },
                success: function(a) {
                    console.log("243", a), i.ggzid = a.data.id, i.dataIni();
                }
            });
        })) : wx.navigateBack({
            delta: 1
        });
    },
    dataIni: function() {
        var a = this;
        a.data.pagenum = 1, a.data.list = [], a.data.isload = !0, a.data.isloadtis = !0, 
        a.setData({
            loadstaue: !1
        }), a.getmx();
    },
    getmx: function() {
        var e = this;
        console.log("111111111111111111111111"), e.data.isload ? (console.log("22222222222222222222222222222"), 
        a.util.request({
            url: "entry/wxapp/userggdjgglist",
            cachetime: "0",
            data: {
                ggzid: e.ggzid,
                ggid: e.id,
                pagesize: e.data.pagesize,
                page: e.data.pagenum
            },
            success: function(a) {
                console.log("4444", a), console.log("4444", e.data.pagesize), a.data.length < e.data.pagesize ? e.data.isload = !1 : e.data.pagenum += 1;
                for (var i = 0; i < a.data.length; i++) a.data[i].time = t.ormatDate(a.data[i].time);
                0 != a.data && (e.data.list = e.data.list.concat(a.data)), e.setData({
                    loadstaue: !0,
                    list: e.data.list
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
        }, 1500);
    },
    onReachBottom: function() {
        this.setData({
            loadstaue: !1
        }), this.getmx();
    },
    onShareAppMessage: function() {}
});