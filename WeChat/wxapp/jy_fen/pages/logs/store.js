var t = getApp(), a = require("../../utils/util.js");

Page({
    data: {
        havecode: 0,
        fwxy: !0,
        jrfw: 0,
        zrfw: 0,
        bzfw: 0,
        byfw: 0,
        todayW: 0,
        allW: 0,
        todayQ: 0,
        allQ: 0,
        ifdianji: !0,
        btntxt: "申请入驻"
    },
    onLoad: function(t) {
        var e = this;
        e.type = 0, a.getUrl(e, function(t) {
            a.huanfu(e, function(t) {
                t.store_shuoming = t.store_shuoming.replace(/\<img/gi, '<img style="max-width:100%;height:auto;" '), 
                e.setData({
                    content: t.store_shuoming
                });
            });
        });
    },
    onReady: function() {},
    onShow: function() {
        var e = this;
        wx.clearStorageSync("users"), a.login(function(a) {
            console.log("123", a), e.usersinfo = a, e.setData({
                usersinfo: a
            }), t.util.request({
                url: "entry/wxapp/UserInfo",
                cachetime: "0",
                data: {
                    user_id: a.id
                },
                success: function(o) {
                    e.setData({
                        us: o.data
                    }), 0 == o.data.status ? e.setData({
                        btntxt: "申请入驻",
                        havecode: 2,
                        ifdianji: !1
                    }) : 1 == o.data.status ? e.setData({
                        btntxt: "审核中",
                        havecode: 2,
                        ifdianji: !0
                    }) : 3 == o.data.status ? e.setData({
                        btntxt: "已拒绝，请重新提交申请",
                        havecode: 2,
                        ifdianji: !1
                    }) : (t.util.request({
                        url: "entry/wxapp/getwifiuser",
                        cachetime: "0",
                        data: {
                            user_id: a.id
                        },
                        success: function(t) {
                            console.log(t), e.setData({
                                jrfw: t.data.jrfw,
                                zrfw: t.data.zrfw,
                                bzfw: t.data.bzfw,
                                byfw: t.data.byfw
                            });
                        }
                    }), e.setData({
                        havecode: 1
                    }));
                }
            });
        });
    },
    ljyq: function() {
        var t = this;
        wx.navigateTo({
            url: "wifi/store?store=" + t.data.usersinfo.id
        });
    },
    coupon: function() {
        var t = this;
        wx.navigateTo({
            url: "wifi/coupon?storeid=" + t.data.usersinfo.id
        });
    },
    sett: function(t) {
        var a = this;
        wx.navigateTo({
            url: "wifi/store?store=" + a.data.usersinfo.id
        });
    },
    showShareModal: function() {
        this.setData({
            share_modal_active: !0,
            no_scroll: !0
        });
    },
    shareModalClose: function() {
        this.setData({
            share_modal_active: !1,
            no_scroll: !1
        });
    },
    mdmfx: function() {
        this.setData({
            share_modal_active: !1,
            no_scroll: !1,
            fwxy: !1
        });
    },
    yczz: function() {
        this.setData({
            fwxy: !0
        });
    },
    onHide: function() {},
    onUnload: function() {},
    onPullDownRefresh: function() {
        this.setData({
            havecode: 0
        }), this.onLoad(), setTimeout(function() {
            wx.stopPullDownRefresh();
        }, 1500);
    },
    onReachBottom: function() {},
    onShareAppMessage: function(t) {}
});