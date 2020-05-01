var t = getApp(), i = (require("../../utils/qqmap-wx-jssdk.js"), require("../../utils/amap-wx.js"), 
require("../../utils/util.js")), a = null;

Page({
    data: {
        isindex: 0,
        entrance: 0,
        islianjied: !1,
        platform: "",
        ssid: "",
        pass: "",
        bssid: "",
        secure: !0,
        signalStrength: 0,
        wifimodel: null,
        wifiList: [],
        longitude: "0",
        latitude: "0",
        isfrist: !0,
        loadstaue2: !0,
        isloadtis2: !0,
        iswl: !1,
        swiperAdList: [],
        isad2sc: !0,
        isad1sc: !0,
        coupon_list: [],
        gzhModel: [],
        isshowpay: !0,
        ishbbg: !1,
        isshhb: !1,
        isophb: !1,
        isgg: !1,
        cid: 2,
        ljnum: 0,
        lianjieing: !1,
        sjid: 0,
        is_sygg: !1
    },
    onLoad: function(e) {
        var s = this, n = decodeURIComponent(e.scene);
        if (s.wifiid = 0, s.wxapp_openid = "", s.dingyuehao = !1, t.istanping || (t.istanping = 0), 
        "undefined" != n) {
            var d = n.split(",");
            2 == d.length ? (s.wifiid = d[0], s.userid = d[1]) : 3 == d.length ? (s.wifiid = d[0], 
            s.userid = d[1], s.wxapp_openid = d[2]) : 4 == d.length ? (s.wifiid = d[0], s.userid = d[1], 
            s.wxapp_openid = d[2], s.dingyuehao = !0) : s.wifiid = n;
        }
        console.log("wxapp_openid", s.wxapp_openid), console.log("wifiid", s.wifiid), e.sjid && s.setData({
            sjid: e.sjid
        }), i.huanfu(s, function(n) {
            i.muenList(s, s.data.url, n.color, function(t) {}), wx.getSystemInfo({
                success: function(a) {
                    var n = a.model + "/" + a.system + "/" + a.windowHeight + "X" + a.windowWidth;
                    wx.login({
                        success: function(a) {
                            var d = a.code;
                            t.util.request({
                                url: "entry/wxapp/openid",
                                cachetime: "0",
                                data: {
                                    code: d
                                },
                                success: function(a) {
                                    console.log("openid", a), t.util.request({
                                        url: "entry/wxapp/login",
                                        cachetime: "0",
                                        data: {
                                            openid: a.data.openid,
                                            wxapp_openid: s.wxapp_openid,
                                            mb_type: n
                                        },
                                        header: {
                                            "content-type": "application/json"
                                        },
                                        dataType: "json",
                                        success: function(a) {
                                            s.uid = a.data.id, s.setData({
                                                userInfo: a.data
                                            }), e.sjid ? t.util.request({
                                                url: "entry/wxapp/UserInfo",
                                                cachetime: "0",
                                                data: {
                                                    user_id: e.sjid
                                                },
                                                success: function(a) {
                                                    console.log("UserInfo2", a.data), a.data && (a.data.goods_pic && "" != a.data.goods_pic ? a.data.goods_piclist = a.data.goods_pic.split(",") : a.data.goods_piclist = [], 
                                                    a.data.logo = a.data.store_logo, s.getcoupon2(a.data.id), s.getwxappsnum(2, a.data.id), 
                                                    a.data.gonggaosub = i.subStr(a.data.gonggao, 18), s.setData({
                                                        mdModel: a.data,
                                                        isindex: 3
                                                    }), wx.setNavigationBarTitle({
                                                        title: a.data.store_name
                                                    }), 2 == s.data.system.is_tanping && s.data.mdModel.stgg_img && "" != s.data.mdModel.stgg_img && 0 == t.istanping && (t.istanping = 1, 
                                                    s.setData({
                                                        is_sygg: !0
                                                    })));
                                                }
                                            }) : s.getdizhi();
                                        }
                                    });
                                }
                            });
                        }
                    });
                }
            }), 1 == s.data.system.is_tanping && "" != s.data.system.tanping_id && (wx.createInterstitialAd ? (console.log("77777777777777777"), 
            (a = wx.createInterstitialAd({
                adUnitId: s.data.system.tanping_id
            })).onLoad(function() {}), a.onError(function(t) {}), a.onClose(function() {})) : console.log("444444433333333333"));
        });
    },
    bindGetUserInfo: function(t) {
        console.log("bindGetUserInfo", t), "openSetting:ok" == t.detail.errMsg && (this.setData({
            hydl: !1
        }), this.getdizhi());
    },
    getdizhi: function() {
        var a = this;
        i.getLocationStorage(function(e) {
            null == e ? wx.getLocation({
                type: "gcj02",
                success: function(e) {
                    a.data.longitude = e.longitude, a.data.latitude = e.latitude, t.locationStorage = {
                        longitude: e.longitude,
                        latitude: e.latitude,
                        data: i.formatTime(new Date()).replace(/\//g, "-")
                    }, a.getsupport();
                },
                fail: function() {
                    wx.getSystemInfo({
                        success: function(t) {
                            "ios" == t.platform ? wx.showModal({
                                title: "警告",
                                content: "无法获取你的位置服务，请到手机系统的[设置]->[隐私]->[定位服务]中打开定位服务，并允许微信使用定位服务！",
                                showCancel: !1,
                                success: function(t) {
                                    a.setData({
                                        hydl: !0
                                    });
                                }
                            }) : a.setData({
                                hydl: !0
                            });
                        }
                    });
                }
            }) : (a.data.longitude = t.locationStorage.longitude, a.data.latitude = t.locationStorage.latitude, 
            a.getsupport());
        });
    },
    getsupport: function() {
        var t = this;
        wx.getSystemInfo({
            success: function(a) {
                console.log(a);
                var e = "";
                a.brand;
                "android" == a.platform && (e = parseInt(a.system.substr(8))), "ios" == a.platform && (e = parseInt(a.system.substr(4))), 
                t.system = e, t.setData({
                    platform: a.platform
                }), a.platform, "ios" == a.platform && e < 11 ? t.nosupport() : t.dingyuehao ? (wx.startWifi({
                    success: function(i) {
                        t.getwifList();
                    },
                    fail: function(a) {
                        "12005" == a.errCode ? t.setData({
                            entrance: 3,
                            isindex: 1,
                            islianjied: !1,
                            startError: "请先打开 Wi-Fi 开关，再点击下边的重连按钮"
                        }) : t.setData({
                            entrance: 3,
                            isindex: 1,
                            islianjied: !1,
                            startError: i.getWifiErrCode(a.errCode, a.errMsg, "")
                        });
                    }
                }), t.getSwiperAdList(), t.setData({
                    isgg: !0
                })) : t.wifiid > 0 ? (console.log("指定连接wifi"), t.getWifiModel()) : (console.log("未指定连接wifi"), 
                wx.startWifi({
                    success: function(i) {
                        wx.getConnectedWifi({
                            success: function(i) {
                                t.dingweiljwifi(i.wifi.BSSID), t.setData({
                                    ssid: i.wifi.SSID,
                                    bssid: i.wifi.BSSID,
                                    secure: i.wifi.secure,
                                    signalStrength: i.wifi.signalStrength,
                                    islianjied: !0,
                                    isgg: !0
                                }), t.getSwiperAdList(), t.getwifList(), t.getmdInfo();
                            },
                            fail: function(i) {
                                console.log("getConnectedWifi", i), t.setData({
                                    entrance: 3,
                                    isindex: 2,
                                    islianjied: !1
                                }), t.getwifList();
                            }
                        });
                    },
                    fail: function(a) {
                        "12005" == a.errCode ? t.setData({
                            entrance: 3,
                            isindex: 1,
                            islianjied: !1,
                            startError: "请先打开 Wi-Fi 开关，再点击下边的重连按钮"
                        }) : t.setData({
                            entrance: 3,
                            isindex: 1,
                            islianjied: !1,
                            startError: i.getWifiErrCode(a.errCode, a.errMsg, "")
                        });
                    }
                }));
            }
        });
    },
    nosupport: function() {
        var i = this;
        i.wifiid > 0 ? t.util.request({
            url: "entry/wxapp/wifilianjie",
            cachetime: "0",
            data: {
                id: i.wifiid
            },
            success: function(t) {
                console.log("wifi==", t.data), 1 == t.data.status ? (i.mm = t.data.data.pass, i.setData({
                    isindex: 1,
                    entrance: 4,
                    startError: "你的系统版本太低, 不支持此功能！请手动连wifi，账号：" + t.data.data.zhanghao + "，点击下边按钮复制密码"
                })) : wx.showToast({
                    title: "账号不存在！",
                    icon: "none",
                    duration: 4e3,
                    success: function() {
                        i.setData({
                            isindex: 1,
                            entrance: 0,
                            startError: "你的ios系统版本太低, 不支持此功能！"
                        });
                    }
                });
            }
        }) : (i.dingyuehao, i.setData({
            isindex: 1,
            entrance: 0,
            startError: "你的ios系统版本太低, 不支持此功能！"
        }));
    },
    getmdInfo: function() {
        var i = this, a = t.gzhModel || null;
        if (null != a) {
            if (i.setData({
                gzhModel: a,
                isindex: 3
            }), 1 == a.is_yhj && (i.getcoupon(), i.setData({
                mdModel: a
            }), wx.setNavigationBarTitle({
                title: a.appname
            }), 2 == i.data.system.is_tanping && i.data.mdModel.stgg_img && "" != i.data.mdModel.stgg_img && 0 == t.istanping && (t.istanping = 1, 
            i.setData({
                is_sygg: !0
            })), i.getwxappsnum(1, e.id)), 2 == a.is_yhj) {
                var e = t.sjModel || null;
                console.log("sjModel", e), null != e ? (i.getcoupon2(e.id), i.setData({
                    mdModel: e,
                    sjid: e.id
                }), wx.setNavigationBarTitle({
                    title: e.store_name
                }), 2 == i.data.system.is_tanping && i.data.mdModel.stgg_img && "" != i.data.mdModel.stgg_img && 0 == t.istanping && (t.istanping = 1, 
                i.setData({
                    is_sygg: !0
                })), i.getwxappsnum(2, e.id)) : i.setData({
                    isindex: 2
                });
            }
            (a.is_gg = 1) && (i.getSwiperAdList(), i.setData({
                isgg: !0
            }));
        } else i.getSwiperAdList(), i.setData({
            isgg: !0,
            isindex: 2
        });
    },
    getgzhModel: function(a) {
        console.log("3333333333222222222222222222222222222222222");
        var e = this;
        t.util.request({
            url: "entry/wxapp/GetWxappByWifiid",
            cachetime: "0",
            data: {
                wifiid: a
            },
            success: function(s) {
                console.log("GetWxappByWifiid", s), 1 == s.data.status ? 1 == s.data.data.status && (3 == s.data.data.is_yhj ? (console.log("3322222222222222"), 
                e.setData({
                    isindex: 2
                })) : (s.data.data.goods_pic && "" != s.data.data.goods_pic ? s.data.data.goods_piclist = s.data.data.goods_pic.split(",") : s.data.data.goods_piclist = [], 
                t.gzhModel = s.data.data, s.data.data.gonggaosub = i.subStr(s.data.data.gonggao, 18), 
                e.setData({
                    gzhModel: s.data.data
                }), 1 == s.data.data.is_yhj && (e.getcoupon(), e.setData({
                    mdModel: e.data.gzhModel,
                    isindex: 3
                }), wx.setNavigationBarTitle({
                    title: s.data.data.appname
                }), 2 == e.data.system.is_tanping && e.data.mdModel.stgg_img && "" != e.data.mdModel.stgg_img && 0 == t.istanping && (t.istanping = 1, 
                e.setData({
                    is_sygg: !0
                })), e.getwxappsnum(1, s.data.data.id)), 2 == s.data.data.is_yhj && t.util.request({
                    url: "entry/wxapp/getuser",
                    cachetime: "0",
                    data: {
                        wifi_id: a
                    },
                    success: function(a) {
                        console.log("getuser", a.data), t.sjModel = a.data, a.data ? (a.data.goods_pic && "" != a.data.goods_pic ? a.data.goods_piclist = a.data.goods_pic.split(",") : a.data.goods_piclist = [], 
                        a.data.logo = a.data.store_logo, e.getcoupon2(a.data.id), a.data.gonggaosub = i.subStr(a.data.gonggao, 18), 
                        e.setData({
                            mdModel: a.data,
                            isindex: 3,
                            sjid: a.data
                        }), wx.setNavigationBarTitle({
                            title: a.data.store_name
                        }), 2 == e.data.system.is_tanping && e.data.mdModel.stgg_img && "" != e.data.mdModel.stgg_img && 0 == t.istanping && (t.istanping = 1, 
                        e.setData({
                            is_sygg: !0
                        })), e.getwxappsnum(2, a.data.id)) : e.setData({
                            isindex: 2
                        });
                    }
                })), (e.data.gzhModel.is_gg = 1) && (e.setData({
                    isgg: !0
                }), e.getSwiperAdList())) : (e.getSwiperAdList(), e.setData({
                    isindex: 2,
                    isgg: !0
                }));
            }
        });
    },
    getWifiModel: function() {
        var i = this;
        t.util.request({
            url: "entry/wxapp/wifilianjie",
            cachetime: "0",
            data: {
                id: i.wifiid
            },
            success: function(a) {
                if (console.log("wifi", a.data), 1 == a.data.status) {
                    if (2 == a.data.data.status) return void wx.redirectTo({
                        url: "../logs/wifi/bainji?id=" + i.wifiid
                    });
                    t.keywifiid = a.data.data.id, i.setData({
                        wifimodel: a.data.data,
                        ssid: a.data.data.zhanghao,
                        pass: a.data.data.pass,
                        bssid: a.data.data.bssid
                    }), i.upuserwifiid(), i.accessfun(), i.startWifi(0);
                } else wx.showToast({
                    title: "账号不存在！",
                    icon: "none",
                    duration: 4e3,
                    success: function() {
                        i.setData({
                            entrance: 2,
                            islianjied: !1
                        }), wx.reLaunch({
                            url: "/jy_fen/pages/wifi/wifi"
                        });
                    }
                });
            }
        });
    },
    startWifi: function(t) {
        var a = this;
        wx.startWifi({
            success: function(t) {
                console.log("startWifi1", t), "android" == a.data.platform && (a.system < 6 && a.wifiid > 0 ? a.AndroidConnected() : (console.log("startWifi1333"), 
                a.getwifList())), "ios" == a.data.platform && a.getwifList();
            },
            fail: function(t) {
                console.log("startWifi2", t), a.setData({
                    isindex: 1,
                    entrance: 3,
                    loadstaue2: !0,
                    islianjied: !1,
                    loadtis2: i.getWifiErrCode(t.errCode, t.errMsg, ""),
                    startError: i.getWifiErrCode(t.errCode, t.errMsg, "")
                });
            }
        });
    },
    getwifList: function() {
        var t = this;
        "android" == t.data.platform && (console.log("startWifi777"), wx.getWifiList({
            success: function(i) {
                console.log("startWifi88"), t.getonWifList(), t.setData({
                    loadstaue2: !1
                });
            },
            fail: function(a) {
                console.log("startWifi99"), t.setData({
                    isindex: 1,
                    entrance: 3,
                    islianjied: !1,
                    loadstaue2: !0,
                    startError: i.getWifiErrCode(a.errCode, a.errMsg, "")
                });
            }
        })), "ios" == t.data.platform && t.getfujinWifList();
    },
    getonWifList: function() {
        var a = this;
        console.log("startWifi9888"), wx.onGetWifiList(function(e) {
            console.log("wifiList", e.wifiList);
            for (var s = "", n = 0; n < e.wifiList.length; n++) s = "" == s ? e.wifiList[n].BSSID : s + "," + e.wifiList[n].BSSID, 
            a.wifiid > 0 && e.wifiList[n].SSID == a.data.ssid && (a.data.signalStrength = e.wifiList[n].signalStrength);
            s = encodeURIComponent(s), t.util.request({
                url: "entry/wxapp/bssidwifi",
                cachetime: "0",
                data: {
                    pagesize: 30,
                    page: 1,
                    bssid: s
                },
                success: function(s) {
                    if (console.log("bssidwifi", s.data), s.data.data.length > 0) {
                        for (var n = [], d = 0; d < s.data.data.length; d++) i.getwifiitem(e.wifiList, s.data.data[d].bssid, function(t) {
                            t[0].id = s.data.data[d].id, t[0].dj = a.getsignalStrength(t[0].signalStrength), 
                            t[0].signalStrength = t[0].signalStrength, t[0].pass = s.data.data[d].pass, n = n.concat(t[0]);
                        });
                        n = n.sort(a.sortId), console.log("seljson", n), a.setData({
                            wifiList: n,
                            loadstaue2: !0
                        }), a.dingyuehao && n.length > 0 ? (a.setData({
                            wifimodel: n[0],
                            ssid: n[0].SSID,
                            pass: n[0].pass,
                            bssid: n[0].signalStrength
                        }), t.keywifiid = n[0].id, a.AndroidConnected()) : a.wifiid > 0 && (a.data.signalStrength ? a.AndroidConnected() : (wx.showToast({
                            title: "该WIFI新号太弱了，无法连接！",
                            icon: "none",
                            duration: 4e3,
                            success: function() {}
                        }), a.getgzhModel(a.wifiid), a.setData({
                            islianjied: !1
                        })));
                    } else a.wifiid > 0 ? (wx.showToast({
                        title: "热点不在范围内！",
                        icon: "none",
                        duration: 4e3,
                        success: function() {}
                    }), a.getgzhModel(a.wifiid), a.setData({
                        islianjied: !1,
                        loadstaue2: !0
                    })) : a.setData({
                        isindex: 2,
                        wifiList: [],
                        loadstaue2: !0
                    });
                }
            });
        });
    },
    sortId: function(t, i) {
        return i.signalStrength - t.signalStrength;
    },
    getfujinWifList: function() {
        var a = this;
        t.util.request({
            url: "entry/wxapp/wifilist",
            cachetime: "0",
            data: {
                pagesize: 20,
                page: 1,
                longitude: a.data.longitude,
                latitude: a.data.latitude
            },
            success: function(e) {
                if (console.log("wifilist", e), e.data.data.length > 0) {
                    for (var s = e.data.data, n = 0; n < e.data.data.length; n++) s[n].SSID = e.data.data[n].zhanghao, 
                    s[n].BSSID = e.data.data[n].bssid, s[n].dj = 0, s[n].pass = e.data.data[n].pass, 
                    s[n].distance = parseInt(i.getDistance2(a.data.latitude, a.data.longitude, s[n].latitude, s[n].longitude)), 
                    s[n].distancetxt = i.getDistancetxt(s[n].distance);
                    console.log("seljson", s), a.setData({
                        wifiList: s,
                        islianjied: !1,
                        loadstaue2: !0
                    }), a.dingyuehao && s.length > 0 ? (a.setData({
                        wifimodel: s[0],
                        ssid: s[0].SSID,
                        pass: s[0].pass,
                        bssid: s[0].signalStrength,
                        isindex: 2
                    }), t.keywifiid = s[0].id, a.IosConnected()) : a.wifiid > 0 && a.IosConnected();
                } else a.wifiid > 0 ? (a.getgzhModel(a.wifiid), a.setData({
                    wifiList: [],
                    loadstaue2: !0
                })) : a.setData({
                    isindex: 2,
                    wifiList: [],
                    loadstaue2: !0
                });
            }
        });
    },
    AndroidConnected: function() {
        console.log("AndroidConnected");
        var t = this, a = 0;
        a = t.wifiid, t.wifiid = 0, wx.connectWifi({
            SSID: t.data.ssid,
            BSSID: t.data.bssid,
            password: t.data.pass,
            success: function(i) {
                wx.showToast({
                    title: "连接成功！",
                    icon: "success",
                    duration: 5e3,
                    success: function(t) {}
                }), a > 0 ? (t.getgzhModel(a), t.iscg(), t.setData({
                    islianjied: !0
                })) : (t.iscg(), t.setData({
                    islianjied: !0,
                    isindex: 2
                }));
            },
            fail: function(e) {
                console.log("res12", e), wx.showToast({
                    title: i.getWifiErrCode(e.errCode, e.errMsg, "该WIFI新号太弱了，无法连接！"),
                    icon: "none",
                    duration: 4e3,
                    success: function() {}
                }), a > 0 ? (t.getgzhModel(a), t.setData({
                    islianjied: !1
                })) : t.setData({
                    isindex: 2,
                    islianjied: !1
                });
            }
        });
    },
    IosConnected: function() {
        console.log("IosConnected!");
        var t = this, a = 0;
        a = t.wifiid, t.wifiid = 0, wx.connectWifi({
            SSID: t.data.ssid,
            BSSID: t.data.bssid,
            password: t.data.pass,
            success: function(e) {
                console.log("IosConnected22!", e), wx.getConnectedWifi({
                    success: function(e) {
                        t.data.bssid == e.wifi.BSSID ? (wx.showToast({
                            title: "连接成功！",
                            icon: "success",
                            duration: 5e3,
                            success: function(t) {}
                        }), a > 0 ? (t.getgzhModel(a), t.setData({
                            islianjied: !0
                        }), t.iscg()) : (t.iscg(), t.setData({
                            islianjied: !0,
                            isindex: 2
                        }))) : (wx.showToast({
                            title: i.getWifiErrCode(e.errCode, e.errMsg, "该WIFI新号太弱了，无法连接！"),
                            icon: "none",
                            duration: 4e3,
                            success: function() {}
                        }), a > 0 ? (t.getgzhModel(a), t.setData({
                            islianjied: !1
                        })) : t.setData({
                            islianjied: !1,
                            isindex: 2
                        }));
                    },
                    fail: function(e) {
                        wx.showToast({
                            title: i.getWifiErrCode(e.errCode, e.errMsg, "该WIFI新号太弱了，无法连接！"),
                            icon: "none",
                            duration: 4e3,
                            success: function() {}
                        }), a > 0 ? (t.getgzhModel(a), t.setData({
                            islianjied: !1
                        })) : t.setData({
                            islianjied: !1,
                            isindex: 2
                        });
                    }
                });
            },
            fail: function(e) {
                console.log("res12", e), wx.showToast({
                    title: i.getWifiErrCode(e.errCode, e.errMsg, "该WIFI新号太弱了，无法连接！"),
                    icon: "none",
                    duration: 4e3,
                    success: function() {}
                }), a > 0 ? (t.getgzhModel(a), t.setData({
                    islianjied: !1
                })) : t.setData({
                    islianjied: !1,
                    isindex: 2
                });
            }
        });
    },
    iscg: function() {
        var i = this;
        "" != i.wxapp_openid && t.util.request({
            url: "entry/wxapp/GetRedSet",
            cachetime: "0",
            success: function(a) {
                a.data && 1 == a.data.gz_status && (i.setData({
                    redSet: a.data
                }), t.util.request({
                    url: "entry/wxapp/gzredcheck",
                    cachetime: "0",
                    data: {
                        userid: i.data.userInfo.id,
                        wxapp_openid: i.wxapp_openid
                    },
                    success: function(t) {
                        console.log("gzredcheck", t), 1 == t.data.status && t.data.money > 0 && (i.redlogid = t.data.redlogid, 
                        i.setData({
                            hbmoney: t.data.money,
                            ishbbg: !0,
                            isshhb: !0
                        }));
                    }
                }));
            }
        }), t.util.request({
            url: "entry/wxapp/lianjiewifisuccess",
            cachetime: "0",
            data: {
                userid: i.data.userInfo.id
            },
            success: function(t) {}
        });
    },
    getwxappsnum: function(i, a) {
        var e = this;
        t.util.request({
            url: "entry/wxapp/getwxappsnum",
            cachetime: "0",
            data: {
                id: a,
                type: i
            },
            success: function(t) {
                console.log("userconnectwifi", t), e.setData({
                    ljnum: t.data
                });
            }
        });
    },
    accessfun: function() {
        var i = this;
        t.util.request({
            url: "entry/wxapp/fwwifilist",
            cachetime: "0",
            data: {
                user_id: i.data.userInfo.id,
                wifi: i.wifiid,
                wifi_user: i.data.wifimodel.user_id
            },
            success: function(t) {}
        });
    },
    hb_ophb_tap: function() {
        this.setData({
            isophb: !0,
            isshhb: !1
        });
    },
    hb_close_tap: function() {
        var i = this;
        wx.showLoading({
            title: "领取中...",
            mask: !0
        }), t.util.request({
            url: "entry/wxapp/qugzhongbao",
            cachetime: "0",
            data: {
                userid: i.data.userInfo.id,
                redlogid: i.redlogid
            },
            success: function(t) {
                console.log("qugzhongbao", t), wx.hideLoading(), 1 == t.data.status ? (wx.showToast({
                    title: "领取成功！",
                    icon: "none",
                    duration: 2e3,
                    success: function() {}
                }), i.setData({
                    isophb: !1,
                    isshhb: !1,
                    ishbbg: !1,
                    hbmoney: 0
                })) : (wx.showToast({
                    title: "领取失败！",
                    icon: "none",
                    duration: 2e3,
                    success: function() {}
                }), i.setData({
                    isophb: !1,
                    isshhb: !1,
                    ishbbg: !1,
                    hbmoney: 0
                }));
            }
        });
    },
    getWifiOnlineList: function() {
        var t = this;
        t.setData({
            wifiList: []
        }), t.startWifi();
    },
    getSwiperAdList: function() {
        var i = this;
        t.util.request({
            url: "entry/wxapp/classgg",
            cachetime: "0",
            data: {
                num: 10,
                longitude: i.data.longitude,
                latitude: i.data.latitude,
                type: 1
            },
            success: function(t) {
                t.data.data.length > 0 && i.setData({
                    swiperAdList: t.data.data
                }), console.log("swiperAdList", i.data.swiperAdList);
            }
        });
    },
    op_fujin_tap: function() {
        var t = this;
        t.wifiid = 0, t.getWifiOnlineList(), t.setData({
            loadstaue2: !1
        });
    },
    upuserwifiid: function() {
        var i = this;
        0 == i.data.userInfo.is_wifi && t.util.request({
            url: "entry/wxapp/userconnectwifi",
            cachetime: "0",
            data: {
                user_id: i.data.userInfo.id,
                wifi: i.wifiid
            },
            success: function(t) {
                console.log("userconnectwifi", t);
            }
        });
    },
    op_fzmm_tap: function() {
        var t = this;
        wx.setClipboardData({
            data: t.mm,
            success: function(t) {
                wx.getClipboardData({
                    success: function(t) {
                        console.log(t.data), wx.showToast({
                            title: "已经复制密码，请打开手机热点选择指定账号连接wifi！",
                            icon: "none",
                            duration: 4e3,
                            success: function() {}
                        });
                    }
                });
            }
        });
    },
    op_sel_tap: function(t) {
        var i = this, a = i.data.wifiList[t.currentTarget.dataset.index];
        i.wifiid = a.id, wx.showLoading({
            title: "连接中..."
        }), i.getWifiModel();
    },
    op_saoma_tap: function() {
        var t = this;
        wx.scanCode({
            success: function(i) {
                var a = t.getQueryVariable(i.path, "scene");
                a && (t.wifiid = a), t.setData({
                    entrance: 1,
                    isfrist: !0
                }), t.getsupport();
            }
        });
    },
    getQueryVariable: function(t, i) {
        for (var a = t.split("?")[1].split("&"), e = 0; e < a.length; e++) {
            var s = a[e].split("=");
            if (s[0] == i) return s[1];
        }
        return !1;
    },
    op_chonglian_tap: function() {
        var t = this;
        t.setData({
            isindex: 1,
            entrance: 1,
            lianjieing: !0
        }), t.getsupport();
    },
    getsignalStrength: function(t) {
        var i;
        return t <= 25 ? i = 4 : t <= 50 ? i = 3 : t <= 75 ? i = 2 : t <= 100 && (i = 1), 
        i;
    },
    onReady: function() {},
    onShow: function() {
        var i = this;
        i.data.isfrist ? i.data.isfrist = !1 : 2 == i.data.isindex && (t.shuawifi || (t.shuawifi = setInterval(function() {
            i.dingweinewwifi();
        }, 3e4))), a && i.data.system && 1 == i.data.system.is_tanping && "" != i.data.system.tanping_id && a.show().catch(function(t) {
            console.error(t);
        });
    },
    dingweinewwifi: function() {
        var t = this;
        wx.startWifi({
            success: function(i) {
                wx.getConnectedWifi({
                    success: function(i) {
                        t.data.bssid != i.wifi.BSSID && (t.dingweiljwifi(i.wifi.BSSID), t.setData({
                            ssid: i.wifi.SSID,
                            bssid: i.wifi.SSID,
                            secure: i.wifi.secure,
                            signalStrength: i.wifi.signalStrength,
                            isindex: 2,
                            islianjied: !0
                        }));
                    }
                });
            }
        });
    },
    ad_tap: function(t) {
        var a = this;
        console.log(t.currentTarget.dataset.index);
        t.currentTarget.dataset.index;
        i.adDeal(a.data.swiperAdList[t.currentTarget.dataset.index]);
    },
    dingweiljwifi: function(i) {
        t.util.request({
            url: "entry/wxapp/bssidonewifi",
            cachetime: "0",
            data: {
                bssid: i
            },
            success: function(i) {
                console.log("bssidwifi2", i.data), i.data && (t.keywifiid = i.data.id);
            }
        });
    },
    ad1sb: function(t) {
        console.log("isad1sb", t), this.setData({
            isad1sc: !1
        });
    },
    ad1cg: function(t) {
        console.log("isad1sc", t), this.setData({
            isad1sc: !0
        });
    },
    tozz: function() {
        wx.navigateTo({
            url: "/jy_fen/pages/logs/wifi/wifi"
        });
    },
    tel_tap: function() {
        1 == this.data.gzhModel.is_yhj ? wx.makePhoneCall({
            phoneNumber: this.data.mdModel.utel
        }) : wx.makePhoneCall({
            phoneNumber: this.data.mdModel.store_tel
        });
    },
    daohang_tap: function() {
        1 == this.data.gzhModel.is_yhj ? wx.openLocation({
            latitude: parseFloat(this.data.mdModel.latitude),
            longitude: parseFloat(this.data.mdModel.longitude),
            name: this.data.mdModel.appname,
            address: this.data.mdModel.address,
            scale: 14
        }) : wx.openLocation({
            latitude: parseFloat(this.data.mdModel.latitude),
            longitude: parseFloat(this.data.mdModel.longitude),
            name: this.data.mdModel.store_name,
            address: this.data.mdModel.address,
            scale: 18
        });
    },
    previewImage: function(t) {
        if (0 == this.data.mdModel.is_type) {
            for (var i = [], a = 0; a < this.data.mdModel.goods_piclist.length; a++) i.push(this.data.url + this.data.mdModel.goods_piclist[a]);
            var e = t.target.dataset.src;
            wx.previewImage({
                current: e,
                urls: i
            });
        } else 1 == this.data.mdModel.is_type && wx.navigateTo({
            url: "/jy_fen/pages/web/web?url=" + encodeURIComponent(this.data.mdModel.src)
        });
    },
    erweima_tap: function(t) {
        var i = [];
        i.push(this.data.url + this.data.mdModel.ewm);
        var a = this.data.mdModel.ewm;
        wx.previewImage({
            current: a,
            urls: i
        });
    },
    gg_tap: function() {
        wx.showModal({
            title: "公告详情",
            content: this.data.mdModel.gonggao,
            showCancel: !1,
            success: function(t) {}
        });
    },
    selCate: function(t) {
        var i = this;
        console.log(t.currentTarget.dataset.id), i.setData({
            cid: t.currentTarget.dataset.id
        });
    },
    onHide: function() {
        t.shuawifi && clearInterval(t.shuawifi);
    },
    onUnload: function() {
        t.shuawifi && clearInterval(t.shuawifi);
    },
    onPullDownRefresh: function() {
        wx.stopPullDownRefresh();
    },
    onReachBottom: function() {},
    onShareAppMessage: function() {
        t = this.data.system.pt_name;
        if (this.data.sjid > 0) {
            if (this.data.mdModel) var t = 1 == this.data.gzhModel.is_yhj ? this.data.mdModel.appname : this.data.mdModel.store_name;
            return console.log(this.data.sjid), {
                title: t,
                path: "/jy_fen/pages/wifi/wifi?sjid=" + this.data.sjid,
                success: function(t) {},
                fail: function(t) {}
            };
        }
        return {
            title: this.data.system.pt_name,
            path: "/jy_fen/pages/wifi/wifi",
            success: function(t) {},
            fail: function(t) {}
        };
    },
    getcoupon: function() {
        var i = this;
        t.util.request({
            url: "entry/wxapp/yhj",
            cachetime: "0",
            data: {
                id: i.data.gzhModel.id
            },
            success: function(t) {
                console.log("yhj", t), t.data.data && t.data.data.length > 0 && i.setData({
                    coupon_list: t.data.data
                });
            }
        });
    },
    getcoupon2: function(i) {
        var a = this;
        t.util.request({
            url: "entry/wxapp/yhj2",
            cachetime: "0",
            data: {
                wxapp_id: i
            },
            success: function(t) {
                console.log("yhj2", t), t.data.data && t.data.data.length > 0 && a.setData({
                    coupon_list: t.data.data
                });
            }
        });
    },
    receive: function(i) {
        if (console.log(i), !this.islq) {
            this.islq = !0;
            var a = this, e = i.detail.target.dataset.index, s = a.uid, n = i.detail.formId, d = a.data.coupon_list[e].id;
            wx.showLoading({
                title: "加载中...",
                mask: !0
            }), t.util.request({
                url: "entry/wxapp/AddVoucher",
                cachetime: "0",
                data: {
                    user_id: s,
                    vouchers_id: d,
                    form_id: n
                },
                success: function(t) {
                    wx.hideLoading(), a.islq = !1, "1" == t.data ? wx.showToast({
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
        }
    },
    formSubmit: function(t) {
        this.formid = t.detail.formId;
    },
    closelq: function() {
        this.setData({
            isshowpay: !1
        });
    },
    closelq2: function() {
        this.setData({
            is_sygg: !1
        });
    },
    tolq: function(i) {
        var a = this;
        a.setData({
            isshowpay: !1
        }), wx.showLoading({
            title: "加载中...",
            mask: !0
        });
        var e = i.detail.formId;
        t.util.request({
            url: "entry/wxapp/Dalibao",
            cachetime: "0",
            data: {
                userid: a.uid,
                formid: e
            },
            success: function(t) {
                wx.hideLoading(), 1 == t.data ? wx.showModal({
                    title: "提示",
                    confirmText: "知道了",
                    showCancel: !1,
                    content: "你领取了一个优惠券礼包，可以直接购物使用！",
                    success: function(t) {}
                }) : wx.showToast({
                    title: "服务器繁忙！",
                    icon: "none",
                    duration: 5e3
                });
            },
            complete: function() {}
        });
    },
    r_tap: function(t) {
        var i = this, a = t.currentTarget.dataset.index;
        1 == i.data.muenList.data[a].type ? i.data.muenList.data[a].url1.indexOf("pages/wifi/wifi") > 0 || i.data.muenList.data[a].url1.indexOf("pages/logs/logs") > 0 || i.data.muenList.data[a].url1.indexOf("pages/store_coupons/store_coupons") > 0 || i.data.muenList.data[a].url1.indexOf("pages/fjwifi/fjwifi") > 0 ? wx.redirectTo({
            url: "/" + i.data.muenList.data[a].url1
        }) : wx.navigateTo({
            url: "/" + i.data.muenList.data[a].url1
        }) : 2 == i.data.muenList.data[a].type && wx.navigateTo({
            url: "/jy_fen/pages/web/web?url=" + encodeURIComponent(i.data.muenList.data[a].url)
        });
    },
    djgg: function() {
        that.setData({
            is_sygg: !1
        }), 3 == that.data.mdModel.is_types && (that.data.mdModel.srcs2.indexOf("pages/wifi/wifi") > 0 || that.data.mdModel.srcs2.indexOf("pages/logs/logs") > 0 || that.data.mdModel.srcs2.indexOf("pages/store_coupons/store_coupons") > 0 || that.data.mdModel.srcs2.indexOf("pages/fjwifi/fjwifi") > 0 ? wx.redirectTo({
            url: "/" + that.data.mdModel.srcs2
        }) : wx.navigateTo({
            url: "/" + that.data.mdModel.srcs2
        })), 1 == that.data.mdModel.is_types && wx.navigateTo({
            url: "/jy_fen/pages/web/web?url=" + encodeURIComponent(that.data.mdModel.srcs)
        });
    }
});