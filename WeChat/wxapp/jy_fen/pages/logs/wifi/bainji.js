var t = getApp(), a = (require("../../../utils/qqmap-wx-jssdk.js"), require("../../../utils/amap-wx.js"), 
require("../../../utils/util.js"));

Page({
    data: {
        model: null,
        ssid: "",
        pass: "",
        bssid: "",
        miaoshu: "",
        longitude: "0",
        latitude: "0",
        SSarray: [],
        SSindex: -1,
        tjloading: !1,
        tjdisabled: !1,
        isbangding: 0
    },
    onLoad: function(t) {
        var i = this;
        i.id = 0, t.dlid && i.setData({
            dlid: t.dlid
        }), t.userid && i.setData({
            dlid: t.userid
        }), a.huanfu(i, function(t) {}), i.getdizhi(), a.login(function(a) {
            i.uid = a.id, wx.getSystemInfo({
                success: function(a) {
                    console.log("platform", a.platform), i.data.platform = a.platform, t.id ? (i.id = t.id, 
                    i.getWifiModel()) : (i.startWifi(), i.getyangshi(0));
                }
            });
        });
    },
    bindGetUserInfo: function(t) {
        console.log("123123", t), "openSetting:ok" == t.detail.errMsg && (this.setData({
            hydl: !1
        }), this.getdizhi());
    },
    getdizhi: function() {
        var t = this;
        wx.getLocation({
            type: "gcj02",
            success: function(a) {
                console.log("gcj02", a), t.data.longitude = a.longitude, t.data.latitude = a.latitude;
            },
            fail: function() {
                wx.getSystemInfo({
                    success: function(a) {
                        "ios" == a.platform ? wx.showModal({
                            title: "警告",
                            content: "无法获取你的位置服务，请到手机系统的[设置]->[隐私]->[定位服务]中打开定位服务，并允许微信使用定位服务！",
                            showCancel: !1,
                            success: function(a) {
                                t.setData({
                                    hydl: !0
                                });
                            }
                        }) : t.setData({
                            hydl: !0
                        });
                    }
                });
            }
        });
    },
    getWifiModel: function() {
        var a = this;
        t.util.request({
            url: "entry/wxapp/wifi",
            cachetime: "0",
            data: {
                id: a.id
            },
            success: function(t) {
                1 == t.data.status ? (2 == t.data.data.status && (a.data.isbangding = 1), a.setData({
                    model: t.data.data,
                    ssid: t.data.data.zhanghao,
                    pass: t.data.data.pass,
                    bssid: t.data.data.bssid,
                    miaoshu: t.data.data.miaoshu,
                    longitude: t.data.data.longitude,
                    latitude: t.data.data.latitude
                }), a.startWifi(), a.getyangshi(t.data.data.ysid)) : wx.showToast({
                    title: "账号不存在！",
                    icon: "none",
                    duration: 5e3,
                    success: function() {
                        1 == getCurrentPages().length ? wx.reLaunch({
                            url: "wifi"
                        }) : wx.navigateBack({
                            delta: 1
                        });
                    }
                });
            }
        });
    },
    getyangshi: function(a) {
        var i = this;
        t.util.request({
            url: "entry/wxapp/yangshi",
            cachetime: "0",
            data: {
                id: a
            },
            success: function(t) {
                console.log("yangshi", t.data), 1 == t.data.status && i.setData({
                    yangshi: t.data.data
                });
            }
        });
    },
    startWifi: function() {
        var t = this;
        wx.startWifi({
            success: function(a) {
                console.log("startWifi2", a), "android" == t.data.platform && t.getwifList(), "ios" == t.data.platform && (t.id > 0 ? t.dealIosUp() : t.dealIosAdd());
            },
            fail: function(t) {
                console.log("startWifi1", t), wx.showModal({
                    title: "提示",
                    confirmText: "确定",
                    showCancel: !1,
                    content: a.getWifiErrCode(t.errCode, t.errMsg, ""),
                    success: function(t) {
                        1 == getCurrentPages().length ? wx.reLaunch({
                            url: "wifi"
                        }) : wx.navigateBack({
                            delta: 1
                        });
                    }
                });
            }
        });
    },
    dealIosAdd: function() {
        var t = this;
        wx.getConnectedWifi({
            success: function(a) {
                if (null == a.wifi || "" == a.wifi.SSID) wx.showModal({
                    title: "提示",
                    confirmText: "确定",
                    showCancel: !1,
                    content: "苹果手机请先连接上要发布的wifi再编辑！",
                    success: function(t) {
                        1 == getCurrentPages().length ? wx.reLaunch({
                            url: "wifi"
                        }) : wx.navigateBack({
                            delta: 1
                        });
                    }
                }); else {
                    t.data.SSindex = 0;
                    var i = {
                        SSID: a.wifi.SSID,
                        BSSID: a.wifi.BSSID
                    };
                    t.data.SSarray.push(i), t.setData({
                        SSarray: t.data.SSarray,
                        SSindex: t.data.SSindex,
                        ssid: a.wifi.SSID,
                        bssid: a.wifi.BSSID
                    });
                }
            },
            fail: function(t) {
                console.log("11111", t), 12005 == t.errCode ? wx.showModal({
                    title: "提示",
                    confirmText: "确定",
                    showCancel: !1,
                    content: "请先打开手机 Wi-Fi 开关再尝试！",
                    success: function(t) {
                        1 == getCurrentPages().length ? wx.reLaunch({
                            url: "wifi"
                        }) : wx.navigateBack({
                            delta: 1
                        });
                    }
                }) : 12006 == t.errCode ? wx.showModal({
                    title: "提示",
                    confirmText: "确定",
                    showCancel: !1,
                    content: "请先打开打开 GPS 定位开关再尝试！",
                    success: function(t) {
                        1 == getCurrentPages().length ? wx.reLaunch({
                            url: "wifi"
                        }) : wx.navigateBack({
                            delta: 1
                        });
                    }
                }) : wx.showModal({
                    title: "提示",
                    confirmText: "确定",
                    showCancel: !1,
                    content: "请先打开无线局域网开关和地位服务开关再尝试",
                    success: function(t) {
                        1 == getCurrentPages().length ? wx.reLaunch({
                            url: "wifi"
                        }) : wx.navigateBack({
                            delta: 1
                        });
                    }
                });
            }
        });
    },
    dealIosUp: function() {
        var t = this;
        if (console.log("234=", t.data.isbangding), 1 == t.data.isbangding) wx.getConnectedWifi({
            success: function(a) {
                if (console.log("35345"), null == a.wifi || "" == a.wifi.SSID) console.log("333333"), 
                wx.showModal({
                    title: "提示",
                    confirmText: "确定",
                    showCancel: !1,
                    content: "苹果手机请先连接上要发布的wifi再编辑！",
                    success: function(t) {
                        1 == getCurrentPages().length ? wx.reLaunch({
                            url: "wifi"
                        }) : wx.navigateBack({
                            delta: 1
                        });
                    }
                }); else {
                    console.log("33322111"), t.data.SSindex = 0;
                    var i = {
                        SSID: a.wifi.SSID,
                        BSSID: a.wifi.BSSID
                    };
                    console.log("3", i), t.data.SSarray.push(i), t.setData({
                        SSarray: t.data.SSarray,
                        SSindex: t.data.SSindex,
                        ssid: a.wifi.SSID,
                        bssid: a.wifi.BSSID
                    });
                }
            },
            fail: function(t) {
                12005 == t.errCode ? wx.showModal({
                    title: "提示",
                    confirmText: "确定",
                    showCancel: !1,
                    content: "请先打开手机 Wi-Fi 开关再尝试！",
                    success: function(t) {
                        1 == getCurrentPages().length ? wx.reLaunch({
                            url: "wifi"
                        }) : wx.navigateBack({
                            delta: 1
                        });
                    }
                }) : 12006 == t.errCode ? wx.showModal({
                    title: "提示",
                    confirmText: "确定",
                    showCancel: !1,
                    content: "请先打开打开 GPS 定位开关再尝试！",
                    success: function(t) {
                        1 == getCurrentPages().length ? wx.reLaunch({
                            url: "wifi"
                        }) : wx.navigateBack({
                            delta: 1
                        });
                    }
                }) : wx.showModal({
                    title: "提示",
                    confirmText: "确定",
                    showCancel: !1,
                    content: "苹果手机请先连接上要发布的wifi再编辑！",
                    success: function(t) {
                        1 == getCurrentPages().length ? wx.reLaunch({
                            url: "wifi"
                        }) : wx.navigateBack({
                            delta: 1
                        });
                    }
                });
            }
        }); else {
            t.data.SSindex = 0;
            var a = {
                SSID: t.data.ssid,
                BSSID: t.data.bssid
            };
            t.data.SSarray.push(a), t.setData({
                SSarray: t.data.SSarray,
                SSindex: t.data.SSindex
            });
        }
    },
    getwifList: function() {
        var t = this;
        wx.getWifiList({
            success: function(a) {
                t.getonWifList();
            },
            fail: function(t) {
                console.log("startWifi3", t), 12005 != t.errCode ? 12006 != t.errCode ? wx.showModal({
                    title: "提示",
                    confirmText: "确定",
                    showCancel: !1,
                    content: t.errMsg,
                    success: function(t) {
                        1 == getCurrentPages().length ? wx.reLaunch({
                            url: "wifi"
                        }) : wx.navigateBack({
                            delta: 1
                        });
                    }
                }) : wx.showModal({
                    title: "提示",
                    confirmText: "确定",
                    showCancel: !1,
                    content: "请先打开打开 GPS 定位开关再尝试！",
                    success: function(t) {
                        1 == getCurrentPages().length ? wx.reLaunch({
                            url: "wifi"
                        }) : wx.navigateBack({
                            delta: 1
                        });
                    }
                }) : wx.showModal({
                    title: "提示",
                    confirmText: "确定",
                    showCancel: !1,
                    content: "请先打开手机 Wi-Fi 开关再尝试！",
                    success: function(t) {
                        1 == getCurrentPages().length ? wx.reLaunch({
                            url: "wifi"
                        }) : wx.navigateBack({
                            delta: 1
                        });
                    }
                });
            }
        });
    },
    getonWifList: function() {
        var t = this;
        wx.onGetWifiList(function(a) {
            if (console.log("wifiList", a.wifiList), a.wifiList.length > 0) if (console.log("x1"), 
            null != t.data.model) {
                console.log("x2");
                for (var i = 0; i < a.wifiList.length; i++) a.wifiList[i].BSSID == t.data.bssid && (t.data.SSindex = i);
                if (t.data.SSindex < 0) {
                    console.log("x3"), t.data.SSindex = a.wifiList.length;
                    var e = {
                        SSID: t.data.ssid,
                        BSSID: t.data.bssid,
                        password: t.data.pass,
                        signalStrength: 0
                    };
                    a.wifiList.push(e);
                }
                console.log("SSindex", t.data.SSindex), console.log("SSindex2", a.wifiList[t.data.SSindex]), 
                t.setData({
                    SSarray: a.wifiList,
                    SSindex: t.data.SSindex,
                    ssid: a.wifiList[t.data.SSindex].SSID,
                    bssid: a.wifiList[t.data.SSindex].BSSID
                });
            } else console.log("x4"), wx.getConnectedWifi({
                success: function(i) {
                    console.log("getConnectedWifi", i);
                    for (var e = 0; e < a.wifiList.length; e++) a.wifiList[e].SSID == i.wifi.SSID && (t.data.SSindex = e);
                    t.data.SSindex < 0 && (t.data.SSindex = 0), t.setData({
                        SSarray: a.wifiList,
                        SSindex: t.data.SSindex,
                        ssid: a.wifiList[t.data.SSindex].SSID,
                        bssid: a.wifiList[t.data.SSindex].BSSID
                    });
                },
                fail: function(i) {
                    t.setData({
                        SSarray: a.wifiList,
                        SSindex: 0,
                        ssid: a.wifiList[0].SSID,
                        bssid: a.wifiList[0].BSSID
                    });
                }
            }); else console.log("x5"), wx.showModal({
                title: "提示",
                confirmText: "确定",
                showCancel: !1,
                content: "请确保你的路由器已经开启wifi！",
                success: function(t) {
                    1 == getCurrentPages().length ? wx.reLaunch({
                        url: "wifi"
                    }) : wx.navigateBack({
                        delta: 1
                    });
                }
            });
        });
    },
    bindSSPickerChange: function(t) {
        var a = this;
        a.setData({
            SSindex: t.detail.value,
            ssid: a.data.SSarray[t.detail.value].SSID,
            bssid: a.data.SSarray[t.detail.value].BSSID
        });
    },
    onReady: function() {},
    onShow: function() {
        var t = this, a = wx.getStorageSync("key-ysid");
        a && (t.getyangshi(a), wx.clearStorageSync("key-ysid"));
    },
    formSubmit: function(a) {
        var i = this, e = a.detail;
        return i.data.pass = e.value.pass, i.setData({
            tjloading: !0,
            tjdisabled: !0
        }), 0 == i.uid ? (i.setData({
            tjloading: !1,
            tjdisabled: !1
        }), void wx.showToast({
            title: "服务器繁忙!",
            icon: "none",
            duration: 5e3
        })) : "" == i.data.pass ? (i.setData({
            tjloading: !1,
            tjdisabled: !1
        }), void wx.showToast({
            title: "请输入密码!",
            icon: "none",
            duration: 5e3
        })) : (console.log("longitude", i.data.longitude), console.log("longitude", i.data.latitude), 
        void (0 != i.id ? t.util.request({
            url: "entry/wxapp/updatewifi",
            cachetime: "0",
            data: {
                id: i.id,
                zhanghao: i.data.ssid,
                pass: i.data.pass,
                bssid: i.data.bssid,
                miaoshu: e.value.miaoshu,
                ysid: i.data.yangshi.id,
                longitude: i.data.longitude,
                latitude: i.data.latitude,
                user_id: i.uid
            },
            success: function(t) {
                console.log("updatewifi", t), 1 == t.data.status ? wx.showToast({
                    title: "保存成功!",
                    icon: "success",
                    duration: 8e3,
                    success: function(t) {
                        1 == getCurrentPages().length ? wx.reLaunch({
                            url: "wifi"
                        }) : wx.navigateBack({
                            delta: 1
                        });
                    }
                }) : wx.showModal({
                    title: "提示",
                    confirmText: "确定",
                    showCancel: !1,
                    content: "服务器繁忙！",
                    success: function(t) {
                        1 == getCurrentPages().length ? wx.reLaunch({
                            url: "wifi"
                        }) : wx.navigateBack({
                            delta: 1
                        });
                    }
                });
            }
        }) : t.util.request({
            url: "entry/wxapp/addwifi",
            cachetime: "0",
            data: {
                id: i.id,
                zhanghao: i.data.ssid,
                pass: i.data.pass,
                bssid: i.data.bssid,
                miaoshu: e.value.miaoshu,
                ysid: i.data.yangshi.id,
                longitude: i.data.longitude,
                latitude: i.data.latitude,
                addr: "",
                user_id: i.uid,
                dlid: i.data.dlid,
                form_id: e.formId
            },
            success: function(t) {
                console.log("addwifi", t), 2 == t.data.status ? wx.showModal({
                    title: "提示",
                    confirmText: "确定",
                    showCancel: !1,
                    content: "该wifi已经添加过来，请不要重复添加哦！",
                    success: function(t) {}
                }) : 1 == t.data.status ? wx.showToast({
                    title: "保存成功!",
                    icon: "success",
                    duration: 8e3,
                    success: function(t) {
                        1 == getCurrentPages().length ? wx.reLaunch({
                            url: "wifi"
                        }) : wx.navigateBack({
                            delta: 1
                        });
                    }
                }) : wx.showModal({
                    title: "提示",
                    confirmText: "确定",
                    showCancel: !1,
                    content: "服务器繁忙！",
                    success: function(t) {
                        1 == getCurrentPages().length ? wx.reLaunch({
                            url: "wifi"
                        }) : wx.navigateBack({
                            delta: 1
                        });
                    }
                });
            }
        })));
    },
    onHide: function() {},
    onUnload: function() {},
    onPullDownRefresh: function() {
        wx.stopPullDownRefresh();
    },
    onReachBottom: function() {},
    onShareAppMessage: function() {}
});