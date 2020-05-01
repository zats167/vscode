var a = getApp(), t = require("../../../utils/util.js");

Page({
    data: {
        havecode: 0,
        fwxy: !0,
        todayD: 0,
        wdtd: 0,
        todayM: 0,
        allM: 0,
        todayW: 0,
        allW: 0,
        todayQ: 0,
        allQ: 0,
        ifdianji: !0,
        btntxt: "申请入驻"
    },
    onLoad: function(a) {
        var o = this;
        o.type = 0, console.log(a), console.log(o), t.huanfu(o, function(a) {
            a.wxapp_shuoming = a.wxapp_shuoming.replace(/\<img/gi, '<img style="max-width:100%;height:auto;" '), 
            o.setData({
                content: a.wxapp_shuoming
            });
        }), t.getUrl(o, function(a) {});
    },
    onReady: function() {},
    onShow: function() {
        var o = this;
        console.log(o), t.login(function(t) {
            console.log("123", t), o.usersinfo = t, o.setData({
                usersinfo: t
            });
            var n = t.id;
            t.name;
            console.log(n), a.util.request({
                url: "entry/wxapp/Mygzh",
                cachetime: "0",
                data: {
                    user_id: n
                },
                success: function(t) {
                    console.log(t.data), t.data ? (o.setData({
                        wxappid: t.data.id,
                        appname: t.data.appname,
                        logo: t.data.logo
                    }), "1" == t.data.status ? (o.setData({
                        havecode: 1
                    }), a.util.request({
                        url: "entry/wxapp/getal",
                        cachetime: "0",
                        data: {
                            wxappid: o.data.wxappid
                        },
                        success: function(a) {
                            console.log(a.data), o.setData({
                                jradd: a.data.jradd,
                                jrfw: a.data.jrfw,
                                zradd: a.data.zradd,
                                zrfw: a.data.zrfw,
                                zadd: a.data.zadd,
                                zfw: a.data.zfw,
                                zmoney: a.data.zmoney,
                                xmoney: a.data.xmoney
                            });
                        }
                    })) : "3" == t.data.status ? o.setData({
                        btntxt: "您的申请正在审核中，请耐心等待",
                        havecode: 2,
                        ifdianji: !0
                    }) : "5" == t.data.status ? o.setData({
                        btntxt: "您的公众号已欠费",
                        havecode: 2,
                        ifdianji: !0
                    }) : "2" == t.data.status ? o.setData({
                        btntxt: "您的公众号已关闭",
                        ifdianji: !1,
                        havecode: 2
                    }) : "4" == t.data.status && o.setData({
                        btntxt: "审核失败，请重新提交！",
                        ifdianji: !1,
                        havecode: 2
                    })) : o.setData({
                        btntxt: "申请入驻",
                        havecode: 2,
                        ifdianji: !1
                    });
                }
            });
        });
    },
    ljyq: function() {
        wx.navigateTo({
            url: "apply"
        });
    },
    coupon: function() {
        var a = this;
        wx.navigateTo({
            url: "coupon?wxappid=" + a.data.wxappid
        });
    },
    fwjl: function() {
        var a = this;
        wx.navigateTo({
            url: "sjlist?type=zfw&wxappid=" + a.data.wxappid
        });
    },
    nadd: function() {
        var a = this;
        wx.navigateTo({
            url: "sjlist?type=zadd&wxappid=" + a.data.wxappid
        });
    },
    sett: function(a) {
        var t = this;
        wx.navigateTo({
            url: "apply?wxappid=" + t.data.wxappid
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
        }), this.onShow(), setTimeout(function() {
            wx.stopPullDownRefresh();
        }, 1500);
    },
    onReachBottom: function() {},
    onShareAppMessage: function(a) {
        console.log(this.type);
    }
});