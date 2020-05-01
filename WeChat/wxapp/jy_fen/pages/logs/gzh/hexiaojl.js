var a = getApp(), t = require("../../../utils/util.js");

Page({
    data: {
        address_list: [],
        type: 2,
        pagenum: 1,
        pagesize: 8,
        isload: !0,
        loadstaue: !1,
        isloadtis: !0
    },
    onLoad: function(a) {
        var s = this;
        s.setData({
            storeid: a.storeid
        }), t.huanfu(s, function(a) {}), t.login(function(a) {
            s.uid = a.id, s.iniData();
        });
    },
    onReady: function() {},
    onShow: function() {},
    iniData: function() {
        var a = this;
        a.data.pagenum = 1, a.data.isload = !0, a.setData({
            address_list: [],
            loadstaue: !1,
            isloadtis: !0
        }), a.getquan();
    },
    getquan: function() {
        var t = this;
        t.data.isload ? a.util.request({
            url: "entry/wxapp/hexiaolist",
            cachetime: "0",
            data: {
                page: t.data.pagenum,
                pagesize: t.data.pagesize,
                storeid: t.data.storeid,
                type: 2
            },
            success: function(a) {
                console.log("hexiaolist", a), a.data.length < t.data.pagesize ? t.data.isload = !1 : t.data.pagenum += 1, 
                t.data.address_list = t.data.address_list.concat(a.data), t.setData({
                    loadstaue: !0,
                    address_list: t.data.address_list
                });
            }
        }) : t.setData({
            loadstaue: !0,
            isloadtis: !1
        });
    },
    onHide: function() {},
    onUnload: function() {},
    onPullDownRefresh: function() {
        this.iniData(), setTimeout(function() {
            wx.stopPullDownRefresh();
        }, 1e3);
    },
    onReachBottom: function() {
        this.setData({
            loadstaue: !1,
            isloadtis: !0
        }), this.getquan();
    },
    onShareAppMessage: function() {}
});