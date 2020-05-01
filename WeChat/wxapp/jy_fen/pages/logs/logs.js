var t = getApp(), a = require("../../utils/util.js");

Page({
    data: {
        coupon: 0,
        Vouchers: 0,
        v: new Date().getTime(),
        isshangjia: !1
    },
    bindGetUserInfo: function(t) {
        console.log(t), "getUserInfo:ok" == t.detail.errMsg && (this.setData({
            hydl: !1
        }), this.changeData());
    },
    changeData: function() {
        var a = this;
        wx.getSetting({
            success: function(e) {
                console.log(e), e.authSetting["scope.userInfo"] ? wx.getUserInfo({
                    success: function(e) {
                        console.log(e), wx.login({
                            success: function(n) {
                                var o = n.code;
                                t.util.request({
                                    url: "entry/wxapp/openid",
                                    cachetime: "0",
                                    data: {
                                        code: o
                                    },
                                    success: function(n) {
                                        console.log("openid", n), t.util.request({
                                            url: "entry/wxapp/login",
                                            cachetime: "0",
                                            data: {
                                                openid: n.data.openid,
                                                img: e.userInfo.avatarUrl,
                                                name: e.userInfo.nickName
                                            },
                                            header: {
                                                "content-type": "application/json"
                                            },
                                            dataType: "json",
                                            success: function(e) {
                                                console.log("用户信息", e.data), wx.setStorageSync("users", e.data), t.util.request({
                                                    url: "entry/wxapp/MyRuZhu",
                                                    cachetime: "0",
                                                    data: {
                                                        user_id: e.data.id
                                                    },
                                                    success: function(t) {
                                                        console.log("MyRuZhu", t), t.data && "2" == t.data.state && a.setData({
                                                            isshangjia: !0
                                                        });
                                                    }
                                                }), t.util.request({
                                                    url: "entry/wxapp/zcwifiyhj",
                                                    cachetime: "0",
                                                    data: {
                                                        user_id: e.data.id
                                                    },
                                                    success: function(t) {
                                                        console.log("zcwifiyhj", t), a.setData({
                                                            wifinum: t.data.wifi,
                                                            vouchernum: t.data.voucher,
                                                            wallets: t.data.wallet
                                                        });
                                                    }
                                                }), a.smuserid > 0 && t.util.request({
                                                    url: "entry/wxapp/hexiao",
                                                    cachetime: "0",
                                                    data: {
                                                        user_id: e.data.id,
                                                        type: 1,
                                                        store_id: a.smuserid
                                                    },
                                                    success: function(t) {
                                                        console.log("hexiao", t), 1 == t.data.status && wx.showToast({
                                                            title: "核销人员绑定成功!"
                                                        });
                                                    }
                                                }), a.souserid > 0 && t.util.request({
                                                    url: "entry/wxapp/hexiao",
                                                    cachetime: "0",
                                                    data: {
                                                        user_id: e.data.id,
                                                        type: 2,
                                                        store_id: a.souserid
                                                    },
                                                    success: function(t) {
                                                        console.log("hexiao", t), 1 == t.data.status && wx.showToast({
                                                            title: "核销人员绑定成功!"
                                                        });
                                                    }
                                                });
                                            }
                                        });
                                    }
                                });
                            }
                        });
                        var n = e.userInfo;
                        n.nickName, n.avatarUrl, n.gender, n.province, n.city, n.country, console.log(n), 
                        a.setData({
                            avatarUrl: n.avatarUrl,
                            nickName: n.nickName
                        });
                    }
                }) : (console.log("未授权过"), a.setData({
                    hydl: !0
                }));
            }
        });
    },
    onLoad: function(e) {
        var n = this;
        e.smuserid && (n.smuserid = e.smuserid), e.souserid && (n.souserid = e.souserid), 
        this.changeData(), a.getUrl(n, function(t) {
            a.huanfu(n, function(t) {
                a.muenList(n, n.data.url, t.color, function(t) {}), a.getDianImg(n, n.data.system);
            });
        }), t.util.request({
            url: "entry/wxapp/FxSet",
            cachetime: "0",
            success: function(t) {
                console.log(t.data), n.setData({
                    fxset: t.data
                });
            }
        }), t.util.request({
            url: "entry/wxapp/QuSet",
            cachetime: "0",
            success: function(t) {
                console.log("QuSet", t.data), n.setData({
                    quset: t.data
                });
            }
        }), t.util.request({
            url: "entry/wxapp/pingset",
            cachetime: "0",
            success: function(t) {
                console.log("pingset", t.data), n.setData({
                    pingset: t.data
                });
            }
        });
    },
    onReady: function() {},
    onShow: function() {},
    onHide: function() {},
    onUnload: function() {},
    onPullDownRefresh: function() {
        this.onLoad(), this.onShow(), wx.stopPullDownRefresh();
    },
    onReachBottom: function() {},
    onShareAppMessage: function() {},
    seller: function(t) {
        wx.navigateTo({
            url: "../seller/login"
        });
    },
    zxkf: function() {
        wx.navigateTo({
            url: "kfzx"
        });
    },
    bzzx: function() {
        wx.navigateTo({
            url: "bzzx"
        });
    },
    wallet: function(t) {
        wx.navigateTo({
            url: "wallet"
        });
    },
    mypt: function(t) {
        wx.navigateTo({
            url: "mypt"
        });
    },
    towifi: function(t) {
        wx.navigateTo({
            url: "wifi/wifi"
        });
    },
    youhui: function(t) {
        wx.navigateTo({
            url: "../coupons/shop_coupons"
        });
    },
    mine_coupons: function(t) {
        wx.navigateTo({
            url: "mine_coupons"
        });
    },
    wyrz: function(t) {
        wx.navigateTo({
            url: "wyrz/authen"
        });
    },
    fx: function(t) {
        wx.navigateTo({
            url: "distribution/yaoqing"
        });
    },
    czzx: function(t) {
        wx.navigateTo({
            url: "cash"
        });
    },
    tuig: function(t) {
        wx.navigateTo({
            url: "tuiguang/tuiguang"
        });
    },
    gzh: function(t) {
        wx.navigateTo({
            url: "gzh/gzh"
        });
    },
    store_coupons: function(t) {
        wx.navigateTo({
            url: "store_coupons"
        });
    },
    fjwifi: function(t) {
        wx.navigateTo({
            url: "fjwifi"
        });
    },
    store: function(t) {
        wx.navigateTo({
            url: "store"
        });
    },
    r_tap: function(t) {
        var a = this, e = t.currentTarget.dataset.index;
        1 == a.data.muenList.data[e].type ? a.data.muenList.data[e].url1.indexOf("pages/wifi/wifi") > 0 || a.data.muenList.data[e].url1.indexOf("pages/logs/logs") > 0 || a.data.muenList.data[e].url1.indexOf("pages/store_coupons/store_coupons") > 0 || a.data.muenList.data[e].url1.indexOf("pages/fjwifi/fjwifi") > 0 ? wx.redirectTo({
            url: "/" + a.data.muenList.data[e].url1
        }) : wx.navigateTo({
            url: "/" + a.data.muenList.data[e].url1
        }) : 2 == a.data.muenList.data[e].type && wx.navigateTo({
            url: "/jy_fen/pages/web/web?url=" + encodeURIComponent(a.data.muenList.data[e].url)
        });
    },
    map: function(t) {
        wx.getStorageSync("users").id;
        wx.navigateTo({
            url: "address"
        });
    },
    quzhang: function(t) {
        wx.navigateTo({
            url: "quzhang/yaoqing"
        });
    }
});