var t = getApp(), a = (require("../../utils/qqmap-wx-jssdk.js"), require("../../utils/amap-wx.js"), 
require("../../utils/util.js")), e = (require("../../../siteinfo.js"), null);

Page({
    data: {
        longitude: "0",
        latitude: "0",
        pagenum: 0,
        pagesize: 10,
        xqlist: [],
        storetype: [],
        cid: 0
    },
    onLoad: function(i) {
        var n = this;
        a.getUrl(n, function(t) {
            a.huanfu(n, function(t) {
                a.muenList(n, n.data.url, t.color, function(t) {});
            }), n.getdizhi(), 1 == n.data.system.is_tanping && "" != n.data.system.tanping_id && (wx.createInterstitialAd ? (console.log("77777777777777777"), 
            (e = wx.createInterstitialAd({
                adUnitId: n.data.system.tanping_id
            })).onLoad(function() {}), e.onError(function(t) {}), e.onClose(function() {})) : console.log("444444433333333333"));
        }), t.util.request({
            url: "entry/wxapp/Getstoretype",
            cachetime: "0",
            success: function(t) {
                console.log(t), n.setData({
                    storetype: t.data
                });
            }
        });
    },
    selCate: function(t) {
        var a = this;
        console.log(t.currentTarget.dataset.id), a.setData({
            cid: t.currentTarget.dataset.id
        }), a.dataIni();
    },
    bindGetUserInfo: function(t) {
        console.log("bindGetUserInfo", t), "openSetting:ok" == t.detail.errMsg && (this.setData({
            hydl: !1
        }), this.getdizhi());
    },
    getdizhi: function() {
        var e = this;
        a.getLocationStorage(function(i) {
            null == i ? wx.getLocation({
                type: "gcj02",
                success: function(i) {
                    e.data.longitude = i.longitude, e.data.latitude = i.latitude, t.locationStorage = {
                        longitude: i.longitude,
                        latitude: i.latitude,
                        data: a.formatTime(new Date()).replace(/\//g, "-")
                    }, e.dataIni();
                },
                fail: function() {
                    wx.getSystemInfo({
                        success: function(t) {
                            "ios" == t.platform ? wx.showModal({
                                title: "警告",
                                content: "无法获取你的位置服务，请到手机系统的[设置]->[隐私]->[定位服务]中打开定位服务，并允许微信使用定位服务！",
                                showCancel: !1,
                                success: function(t) {
                                    e.setData({
                                        hydl: !0
                                    });
                                }
                            }) : wx.showModal({
                                title: "警告",
                                content: "无法获取你的位置服务，请打开手机定位服务！",
                                showCancel: !1,
                                success: function(t) {
                                    e.setData({
                                        hydl: !0
                                    });
                                }
                            });
                        }
                    });
                }
            }) : (e.data.longitude = t.locationStorage.longitude, e.data.latitude = t.locationStorage.latitude, 
            e.dataIni());
        });
    },
    dataIni: function() {
        var t = this;
        t.data.pagenum = 1, t.data.isload = !0, t.setData({
            xqlist: [],
            loadstaue: !1,
            isloadtis: !0
        }), t.getxqlist();
    },
    getweizhi: function() {
        var t = this;
        (void 0).reverseGeocoder({
            location: {
                latitude: t.data.latitude,
                longitude: t.data.longitude
            },
            coord_type: 1,
            success: function(a) {
                a.result.ad_info.location;
                console.log("qqmapsdk", a), console.log(a.result.formatted_addresses.recommend), 
                console.log("坐标转地址后的经纬度：", a.result.ad_info.location);
                var e = a.result.address_component.city.replace(/市/gi, "");
                t.setData({
                    citytxt: e,
                    city: a.result.address_component.city,
                    district: a.result.address_component.district
                }), t.getxqlist();
            },
            fail: function(t) {
                console.log(t);
            },
            complete: function(t) {
                console.log(t);
            }
        });
    },
    getxqlist: function() {
        var e = this;
        e.data.isload ? t.util.request({
            url: "entry/wxapp/fjwifi",
            cachetime: "0",
            data: {
                pagesize: e.data.pagesize,
                page: e.data.pagenum,
                latitude: e.data.latitude,
                longitude: e.data.longitude,
                cid: e.data.cid
            },
            success: function(t) {
                console.log("fjwifi", t.data.data), t.data.data.length < e.data.pagesize ? e.data.isload = !1 : e.data.pagenum += 1;
                for (var i = 0; i < t.data.data.length; i++) t.data.data[i].distance = parseInt(a.getDistance2(e.data.latitude, e.data.longitude, t.data.data[i].latitude, t.data.data[i].longitude)), 
                t.data.data[i].distancetxt = a.getDistancetxt(t.data.data[i].distance);
                e.data.xqlist = e.data.xqlist.concat(t.data.data), e.setData({
                    loadstaue: !0,
                    xqlist: e.data.xqlist
                });
            }
        }) : e.setData({
            loadstaue: !0,
            isloadtis: !1,
            loadtis: "下拉到底啦"
        });
    },
    tel_tap: function(t) {
        var a = this, e = t.currentTarget.dataset.index;
        wx.makePhoneCall({
            phoneNumber: a.data.xqlist[e].store_tel
        });
    },
    sel_tap: function(t) {
        var a = t.currentTarget.dataset.index;
        wx.openLocation({
            latitude: parseFloat(this.data.xqlist[a].latitude),
            longitude: parseFloat(this.data.xqlist[a].longitude),
            name: this.data.xqlist[a].store_name,
            address: this.data.xqlist[a].address,
            scale: 14
        });
    },
    tosj: function(t) {
        console.log("3333=", t), wx.navigateTo({
            url: "/jy_fen/pages/wifi/wifi?sjid=" + t.currentTarget.dataset.id
        });
    },
    onReady: function() {},
    onShow: function() {
        var t = this;
        e && t.data.system && 1 == t.data.system.is_tanping && "" != t.data.system.tanping_id && e.show().catch(function(t) {
            console.error(t);
        });
    },
    onHide: function() {},
    onUnload: function() {},
    onPullDownRefresh: function() {
        this.dataIni(), setTimeout(function() {
            wx.stopPullDownRefresh();
        }, 1e3);
    },
    onReachBottom: function() {
        this.setData({
            loadstaue: !1,
            isloadtis: !0
        }), this.getxqlist();
    },
    onShareAppMessage: function() {},
    r_tap: function(t) {
        var a = this, e = t.currentTarget.dataset.index;
        1 == a.data.muenList.data[e].type ? a.data.muenList.data[e].url1.indexOf("pages/wifi/wifi") > 0 || a.data.muenList.data[e].url1.indexOf("pages/logs/logs") > 0 || a.data.muenList.data[e].url1.indexOf("pages/store_coupons/store_coupons") > 0 || a.data.muenList.data[e].url1.indexOf("pages/fjwifi/fjwifi") > 0 ? wx.redirectTo({
            url: "/" + a.data.muenList.data[e].url1
        }) : wx.navigateTo({
            url: "/" + a.data.muenList.data[e].url1
        }) : 2 == a.data.muenList.data[e].type && wx.navigateTo({
            url: "/jy_fen/pages/web/web?url=" + encodeURIComponent(a.data.muenList.data[e].url)
        });
    }
});