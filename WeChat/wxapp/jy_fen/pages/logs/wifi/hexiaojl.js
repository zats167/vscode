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
        var e = this;
        e.setData({
            storeid: a.storeid
        }), t.huanfu(e, function(a) {}), t.login(function(a) {
            e.uid = a.id, e.iniData();
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
        var e = this;
        e.data.isload ? a.util.request({
            url: "entry/wxapp/hexiaolist",
            cachetime: "0",
            data: {
                page: e.data.pagenum,
                pagesize: e.data.pagesize,
                storeid: e.data.storeid,
                type: 2
            },
            success: function(a) {
                console.log("hexiaolist", a), a.data.length < e.data.pagesize ? e.data.isload = !1 : e.data.pagenum += 1;
                for (var s = 0; s < a.data.length; s++) a.data[s].hxtime && (a.data[s].hxtime = t.ormatDate(a.data[s].hxtime));
                e.data.address_list = e.data.address_list.concat(a.data), e.setData({
                    loadstaue: !0,
                    address_list: e.data.address_list
                });
            }
        }) : e.setData({
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