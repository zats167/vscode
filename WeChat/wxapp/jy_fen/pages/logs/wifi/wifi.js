var a = getApp(), t = require("../../../utils/util.js");

Page({
    data: {
        wifiList: [],
        pagenum: 0,
        pagesize: 10,
        dlid: 0
    },
    onLoad: function(i) {
        var e = this;
        i.dlid && (e.setData({
            dlid: i.dlid
        }), a.dlid = i.dlid), a.util.request({
            url: "entry/wxapp/Url3",
            cachetime: "0",
            success: function(a) {
                console.log(a), e.setData({
                    url3: a.data
                });
            }
        }), t.huanfu(e, function(a) {
            e.setData({
                system: a
            });
        });
    },
    onReady: function() {},
    onShow: function() {
        var i = this;
        a.dlid && i.setData({
            dlid: a.dlid
        }), t.login(function(a) {
            console.log("234234", a), i.uid = a.id, i.dataIni(), i.setData({
                uid: i.uid
            });
        });
    },
    dataIni: function() {
        var a = this;
        a.data.pagenum = 1, a.data.wifiList = [], a.data.isload = !0, a.data.isloadtis = !0, 
        a.setData({
            v: new Date().getTime(),
            loadstaue: !1
        }), a.getWifiList();
    },
    getWifiList: function() {
        var t = this;
        t.data.isload ? (console.log("user_id", t.uid), a.util.request({
            url: "entry/wxapp/userwifilist",
            cachetime: "0",
            data: {
                user_id: t.uid,
                pagesize: t.data.pagesize,
                page: t.data.pagenum
            },
            success: function(a) {
                console.log("userwifilist", a.data), a.data.data.length < t.data.pagesize ? t.data.isload = !1 : t.data.pagenum += 1, 
                t.data.wifiList = t.data.wifiList.concat(a.data.data), t.setData({
                    loadstaue: !0,
                    wifiList: t.data.wifiList
                });
            }
        })) : t.setData({
            loadstaue: !0,
            isloadtis: !1,
            loadtis: "下拉到底啦"
        });
    },
    onHide: function() {},
    onUnload: function() {},
    onPullDownRefresh: function() {
        this.dataIni(), setTimeout(function() {
            wx.stopPullDownRefresh();
        }, 500);
    },
    onReachBottom: function() {
        this.setData({
            loadstaue: !1
        }), this.getWifiList();
    },
    onShareAppMessage: function() {},
    op_home_tap: function() {
        wx.reLaunch({
            url: "/jy_fen/pages/logs/logs"
        });
    }
});