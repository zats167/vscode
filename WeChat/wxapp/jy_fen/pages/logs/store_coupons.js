var t = getApp(), a = require("../../utils/util.js");

require("../../../siteinfo.js");

Page({
    data: {
        totalPrice: 0,
        longitude: "0",
        latitude: "0",
        pagenum: 1,
        pagesize: 8,
        isload: !0,
        Vouchers: []
    },
    onLoad: function(t) {
        var e = this;
        a.getUrl(e, function(t) {
            a.huanfu(e, function(t) {});
        }), console.log(e), a.login(function(t) {
            e.uid = t.id, e.getdizhi();
        });
    },
    iniData: function() {
        var a = this;
        a.data.isload ? (console.log("223", a.data), t.util.request({
            url: "entry/wxapp/allstorecoupon",
            cachetime: "0",
            data: {
                latitude: a.data.latitude,
                longitude: a.data.longitude,
                page: a.data.pagenum,
                pagesize: a.data.pagesize
            },
            success: function(t) {
                console.log(t), t.data.length < a.data.pagesize ? a.data.isload = !1 : a.data.pagenum += 1, 
                a.data.Vouchers = a.data.Vouchers.concat(t.data), a.setData({
                    loadstaue: !0,
                    Vouchers: t.data.data
                });
            }
        })) : a.setData({
            loadstaue: !0,
            isloadtis: !1,
            loadtis: "下拉到底啦"
        });
    },
    bindGetUserInfo: function(t) {
        console.log("bindGetUserInfo", t), "openSetting:ok" == t.detail.errMsg && (this.setData({
            hydl: !1
        }), this.getdizhi());
    },
    getdizhi: function() {
        var e = this;
        a.getLocationStorage(function(o) {
            null == o ? wx.getLocation({
                type: "wgs84",
                success: function(o) {
                    e.data.longitude = o.longitude, e.data.latitude = o.latitude, t.locationStorage = {
                        longitude: o.longitude,
                        latitude: o.latitude,
                        data: a.formatTime(new Date()).replace(/\//g, "-")
                    }, e.iniData();
                },
                fail: function() {
                    wx.showModal({
                        title: "警告",
                        content: "无法获取你的位置服务，请到手机系统的[设置]->[隐私]->[定位服务]中打开定位服务，并允许微信使用定位服务！",
                        showCancel: !1,
                        success: function(t) {
                            e.setData({
                                hydl: !0
                            });
                        }
                    });
                }
            }) : (e.data.longitude = t.locationStorage.longitude, e.data.latitude = t.locationStorage.latitude, 
            e.iniData());
        });
    },
    receive: function(a) {
        var e = this;
        console.log(a), console.log(e), t.util.request({
            url: "entry/wxapp/AddVoucher",
            cachetime: "0",
            data: {
                user_id: e.uid,
                vouchers_id: a.target.id
            },
            success: function(t) {
                console.log("AddVoucher", t), wx.hideLoading(), e.islq = !1, "1" == t.data ? wx.showToast({
                    title: "领取成功",
                    icon: "success",
                    duration: 5e3
                }) : "3" == t.data ? wx.showToast({
                    title: "已经领取过了！",
                    icon: "none",
                    duration: 5e3
                }) : "2" == t.data && wx.showToast({
                    title: "服务器繁忙！",
                    icon: "none",
                    duration: 5e3
                });
            },
            complete: function() {}
        });
    },
    onReady: function() {},
    onShow: function() {},
    onHide: function() {},
    onUnload: function() {},
    onPullDownRefresh: function() {},
    onReachBottom: function() {},
    onShareAppMessage: function() {}
});