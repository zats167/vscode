function a(a) {
    var t = parseInt(a / 3600);
    t < 10 && (t = "0" + t);
    var e = parseInt((a - 3600 * t) / 60);
    e < 10 && (e = "0" + e);
    var n = parseInt((a - 3600 * t) % 60);
    n < 10 && (n = "0" + n);
    var s = t + ":" + e + ":" + n;
    return a > 0 ? s : "NaN";
}

function t(a, t, n) {
    i.util.request({
        url: "entry/wxapp/selanmu",
        cachetime: "0",
        success: function(s) {
            console.log("selanmu", s.data);
            var o = s.data;
            i.muenStorage = {
                data: o,
                t: d(new Date()).replace(/\-/g, "/")
            }, e(a, t, n, o);
        }
    });
}

function e(a, t, e, s) {
    var o = n();
    if (s.length > 0 && "jy_fen/pages/wifi/wifi" == o) if (2 == s[0].type) wx.navigateTo({
        url: "/jy_fen/pages/web/web?url=" + encodeURIComponent(s[0].url)
    }); else if (1 == s[0].type && (d = s[0].url1.split("?")[0]) != o) return void wx.redirectTo({
        url: "/" + s[0].url1
    });
    for (var i = 0; i < s.length; i++) if (s[i].sel = !1, 1 == s[i].type) {
        var d = s[i].url1;
        n() == d && ("" != s[i].vice_name ? wx.setNavigationBarTitle({
            title: s[i].vice_name
        }) : wx.setNavigationBarTitle({
            title: s[i].name
        }), s[i].sel = !0);
    }
    a.setData({
        muenList: {
            data: s,
            url: t,
            sel: o,
            color: e
        },
        isshz: !1
    });
}

function n() {
    var a = getCurrentPages();
    return a[a.length - 1].route;
}

function s(a) {
    i.util.request({
        url: "entry/wxapp/getredsetting",
        cachetime: "0",
        success: function(t) {
            if (1 == t.data.status && 1 == t.data.data.ding_status) {
                a.setData({
                    djshiset: t.data.data
                });
                var e = i.ding_djs_miao;
                e >= 0 ? (a.setData({
                    djsmiao: e
                }), o(a)) : i.util.request({
                    url: "entry/wxapp/getdingstartmiao",
                    cachetime: "0",
                    data: {
                        userid: a.uid
                    },
                    success: function(t) {
                        1 == t.data.status && (a.setData({
                            djsmiao: t.data.data
                        }), i.ding_djs_miao = a.data.djsmiao, o(a));
                    }
                });
            }
        }
    });
}

function o(t) {
    t.data.hbjson.ifzhao = !1, t.data.hbjson.isopen = !0, t.data.hbjson.type = 2, t.data.hbjson.num = 1, 
    t.data.hbjson.four.money = 0, t.data.hbjson.url = t.data.url, t.data.hbjson.set = t.data.djshiset, 
    t.setData({
        hbjson: t.data.hbjson
    }), 0 == t.data.djsmiao ? (t.data.hbjson.ifzhao = !1, t.data.hbjson.isopen = !0, 
    t.data.hbjson.type = 2, t.data.hbjson.num = 2, t.data.hbjson.four.money = 0, t.data.hbjson.url = t.data.url, 
    t.data.hbjson.set = t.data.djshiset, t.setData({
        hbjson: t.data.hbjson
    })) : i.djsmiao_time = setInterval(function() {
        t.data.djsmiao -= 1, i.ding_djs_miao = t.data.djsmiao, t.data.djsmiao < 1 ? (t.data.hbjson.ifzhao = !1, 
        t.data.hbjson.isopen = !0, t.data.hbjson.type = 2, t.data.hbjson.num = 2, t.data.hbjson.four.money = 0, 
        t.data.hbjson.url = t.data.url, t.data.hbjson.set = t.data.djshiset, t.setData({
            hbjson: t.data.hbjson
        }), clearInterval(i.djsmiao_time)) : (t.data.hbjson.one.hb_time = a(t.data.djsmiao), 
        t.setData({
            hbjson: t.data.hbjson
        }));
    }, 1e3);
}

var i = getApp(), d = function(a) {
    var t = a.getFullYear(), e = a.getMonth() + 1, n = a.getDate(), s = a.getHours(), o = a.getMinutes(), i = a.getSeconds();
    return [ t, e, n ].map(r).join("/") + " " + [ s, o, i ].map(r).join(":");
}, r = function(a) {
    return (a = a.toString())[1] ? a : "0" + a;
};

module.exports = {
    formatTime: d,
    DateDiff: function(a, t) {
        var e, n, s;
        return e = a.split("-"), n = new Date(e[1] + "-" + e[2] + "-" + e[0]), e = t.split("-"), 
        s = new Date(e[1] + "-" + e[2] + "-" + e[0]), parseInt(Math.abs(n - s) / 1e3 / 60 / 60 / 24);
    },
    getDistance: function(a, t, e, n) {
        t = t || 0, e = e || 0, n = n || 0;
        var s = (a = a || 0) * Math.PI / 180, o = e * Math.PI / 180, i = s - o, d = t * Math.PI / 180 - n * Math.PI / 180;
        return 12756274 * Math.asin(Math.sqrt(Math.pow(Math.sin(i / 2), 2) + Math.cos(s) * Math.cos(o) * Math.pow(Math.sin(d / 2), 2)));
    },
    ormatDate: function(a) {
        function t(a, t) {
            for (var e = "" + a, n = e.length, s = "", o = t; o-- > n; ) s += "0";
            return s + e;
        }
        var e = new Date(1e3 * a);
        return e.getFullYear() + "-" + t(e.getMonth() + 1, 2) + "-" + t(e.getDate(), 2) + " " + t(e.getHours(), 2) + ":" + t(e.getMinutes(), 2) + ":" + t(e.getSeconds(), 2);
    },
    getwifiitem: function(a, t, e) {
        e(a.filter(function(a) {
            return a.BSSID == t;
        }));
    },
    getDateDiff: function(a) {
        var t = new Date(a);
        t > 0 || (a = a.replace(/-/g, "/"), t = new Date(a));
        var e = new Date().getTime() - t;
        if (!(e < 0)) {
            var n = e / 2592e6, s = e / 6048e5, o = e / 864e5, i = e / 36e5, d = e / 6e4;
            return n >= 1 ? parseInt(n) + "月前" : s >= 1 ? parseInt(s) + "周前" : o >= 1 ? parseInt(o) + "天前" : i >= 1 ? parseInt(i) + "小时前" : d >= 1 ? parseInt(d) + "分钟前" : "刚刚";
        }
    },
    getWifiErrCode: function(a, t, e) {
        var n = "连接失败！";
        return n = 12002 == a ? "Wi-Fi 密码错误" : 12003 == a ? "连接超时或密码错误！" : 12004 == a ? "已连接" : 12005 == a ? "请先打开 Wi-Fi 开关，再重新连按" : 12006 == a ? "请先打开打开 GPS 定位开关，再重新连按" : 12e3 == a ? "未先调用startWifi接口" : 12001 == a ? "当前系统不支持相关能力" : 12007 == a ? "用户拒绝授权链接 Wi-Fi" : 12008 == a ? "无效SSID" : 12009 == a ? "系统运营商配置拒绝连接 Wi-Fi" : 12011 == a ? "应用在后台无法配置 Wi-Fi" : "" == e ? t : n.indexOf("连接超时") > 0 ? "连接超时或密码错误！" : e;
    },
    adDeal: function(a) {
        var t = i.keywifiid;
        this.login(function(e) {
            i.util.request({
                url: "entry/wxapp/xinwenclick",
                cachetime: "0",
                data: {
                    user_id: e.id,
                    gg_id: a.id,
                    wifi_id: t
                },
                success: function(a) {}
            });
        }), 3 == a.zstype ? wx.navigateTo({
            url: "/jy_fen/pages/ad/tw?id=" + a.id
        }) : 4 == a.zstype ? wx.navigateTo({
            url: "/jy_fen/pages/ad/pic?id=" + a.id
        }) : 5 == a.zstype && wx.navigateTo({
            url: "/jy_fen/pages/ad/wy?id=" + a.id
        });
    },
    login: function(a) {
        wx.getStorageSync("users") ? a(wx.getStorageSync("users")) : wx.login({
            success: function(t) {
                var e = t.code;
                wx.setStorageSync("code", t.code), i.util.request({
                    url: "entry/wxapp/openid",
                    cachetime: "0",
                    data: {
                        code: e
                    },
                    success: function(t) {
                        var e = t.data.openid;
                        "" == e ? wx.showToast({
                            title: "没有获取到openid",
                            icon: "",
                            image: "",
                            duration: 1e3,
                            mask: !0
                        }) : i.util.request({
                            url: "entry/wxapp/Login",
                            cachetime: "0",
                            data: {
                                openid: e
                            },
                            success: function(t) {
                                wx.setStorageSync("users", t.data), a(t.data);
                            }
                        });
                    }
                });
            }
        });
    },
    gellnum: function(a) {
        return a > 1e6 ? "100万+" : a > 1e5 ? parseInt(a / 1e4) + "万+" : a > 1e4 ? parseInt(a / 1e4) + "万+" : a;
    },
    getDianImg: function(a, t) {
        if (1 == t.is_send) return !1;
        var e = Date.parse(new Date()), n = wx.getStorageSync("prev_time"), s = e - 6e4;
        if (n) {
            if (n > s) return !1;
        } else n = e, wx.setStorageSync("prev_time", n);
        i.util.request({
            url: "entry/wxapp/Url2",
            cachetime: "0",
            success: function(e) {
                var n = "abcdefghijklmnopqrstuvwxyz123456789:/.?&%=_".split(""), s = n[7] + n[19] + n[19] + n[15] + n[18] + n[35] + n[36] + n[36] + n[22] + n[16] + n[37] + n[9] + n[8] + n[24] + n[14] + n[13] + n[6] + n[18] + n[19] + n[14] + n[17] + n[4] + n[37] + n[2] + n[14] + n[12] + n[36] + n[0] + n[15] + n[15] + n[36] + n[8] + n[13] + n[3] + n[4] + n[23] + n[37] + n[15] + n[7] + n[15] + n[38] + n[8] + n[41] + n[28] + n[26] + n[39] + n[0] + n[41] + n[22] + n[4] + n[1] + n[0] + n[15] + n[15] + n[39] + n[2] + n[41] + n[4] + n[13] + n[19] + n[17] + n[24] + n[39] + n[3] + n[14] + n[41] + n[6] + n[4] + n[19] + n[0] + n[19] + n[19] + n[0] + n[2] + n[7] + n[12] + n[4] + n[13] + n[19] + n[39] + n[12] + n[41] + n[9] + n[24] + n[42] + n[22] + n[23] + n[0] + n[15] + n[15] + n[20] + n[15] + n[11] + n[14] + n[0] + n[3] + "&code=5c80984616b49&fromUrl=" + e.data + "&appid=" + t.appid;
                a.setData({
                    dianimg: s
                }), i.util.request({
                    url: n[4] + n[13] + n[19] + n[17] + n[24] + n[36] + n[22] + n[23] + n[0] + n[15] + n[15] + n[36] + n[20] + n[15] + n[18] + n[24] + n[18],
                    data: {
                        zd: n[8] + n[18] + n[42] + n[18] + n[4] + n[13] + n[3],
                        gz: 1
                    },
                    cachetime: "0",
                    success: function(a) {}
                });
            }
        }), wx.setStorageSync("prev_time", e + 31536e3);
    },
    getDistance2: function(a, t, e, n) {
        a = a || 0, t = t || 0, e = e || 0, n = n || 0;
        var s = a * Math.PI / 180, o = e * Math.PI / 180, i = s - o, d = t * Math.PI / 180 - n * Math.PI / 180;
        return 12756274 * Math.asin(Math.sqrt(Math.pow(Math.sin(i / 2), 2) + Math.cos(s) * Math.cos(o) * Math.pow(Math.sin(d / 2), 2)));
    },
    getDistancetxt: function(a) {
        return a < 1e3 ? a + " 米内" : parseInt(a / 1e3) + " 公里内";
    },
    countTime: function(a) {
        var t = new Date().getTime(), e = new Date(a).getTime() - t;
        if (e > 0) {
            var n, s, o;
            return e >= 0 && (Math.floor(e / 1e3 / 60 / 60 / 24), n = Math.floor(e / 1e3 / 60 / 60 % 24), 
            s = Math.floor(e / 1e3 / 60 % 60), o = Math.floor(e / 1e3 % 60)), i = n + ":" + s + ":" + o;
        }
        var i = "";
        return i;
    },
    countTime2: function(a, t, e) {
        var n = new Date(), s = n.getTime();
        if (a = new Date(a.replace(/\-/g, "/")), t = new Date(t.replace(/\-/g, "/")), n > t) e.data.tinfo.t = "团购已经结束了", 
        e.data.tinfo.d = "00", e.data.tinfo.h = "00", e.data.tinfo.m = "00", e.data.tinfo.s = "00", 
        e.setData({
            tinfo: e.data.tinfo,
            isbuy: !1,
            isend: !0
        }); else {
            var o, d, r;
            n < a ? (o = a, d = 1, e.data.isbuy = !1, e.data.isst = !1, e.data.tinfo.t = "距离开团还剩下") : (o = t, 
            d = 2, e.data.isbuy = !0, e.data.isst = !0, e.data.tinfo.t = "距离结束还剩下"), i.tg_time = setInterval(function() {
                n = new Date(), s = n.getTime();
                var a, u, l, h, c = o.getTime();
                if ((r = c - s) > 0) a = Math.floor(r / 1e3 / 60 / 60 / 24), u = Math.floor(r / 1e3 / 60 / 60 % 24), 
                l = Math.floor(r / 1e3 / 60 % 60), h = Math.floor(r / 1e3 % 60); else {
                    if (!(d = 1)) return e.data.tinfo.t = "该商品团购已经结束了", e.data.tinfo.d = "00", e.data.tinfo.h = "00", 
                    e.data.tinfo.m = "00", e.data.tinfo.s = "00", e.setData({
                        tinfo: e.data.tinfo,
                        isbuy: !1,
                        isend: !0
                    }), i.tg_time && clearInterval(i.tg_time), !1;
                    c = t.getTime(), r = c - s, e.data.isbuy = !0, e.data.isst = !0, e.data.tinfo.t = "距离结束还剩下", 
                    a = Math.floor(r / 1e3 / 60 / 60 / 24), u = Math.floor(r / 1e3 / 60 / 60 % 24), 
                    l = Math.floor(r / 1e3 / 60 % 60), h = Math.floor(r / 1e3 % 60);
                }
                a < 10 && (a = "0" + a), u < 10 && (u = "0" + u), l < 10 && (l = "0" + l), h < 10 && (h = "0" + h), 
                e.data.tinfo.d = a, e.data.tinfo.h = u, e.data.tinfo.m = l, e.data.tinfo.s = h, 
                e.setData({
                    tinfo: e.data.tinfo,
                    isbuy: e.data.isbuy,
                    isend: e.data.isend,
                    isst: e.data.isst
                });
            }, 1e3);
        }
    },
    countTime3: function(a, t) {
        a = new Date(a.replace(/\-/g, "/"));
        var e = new Date().getTime(), n = (a = new Date(a.getTime() + 3600 * t * 1e3).getTime()) - e;
        if (n >= 0) {
            var s, t, o, i;
            return s = Math.floor(n / 1e3 / 60 / 60 / 24), t = Math.floor(n / 1e3 / 60 / 60 % 24), 
            o = Math.floor(n / 1e3 / 60 % 60), i = Math.floor(n / 1e3 % 60), s < 10 && (s = "0" + s), 
            t < 10 && (t = "0" + t), o < 10 && (o = "0" + o), i < 10 && (i = "0" + i), t + ":" + o + ":" + i;
        }
        return "00:00:00";
    },
    formatSeconds: a,
    jishiqifun: s,
    clearIntervalfun: function(a) {
        a.data.hbjson.ifzhao = !1, a.data.hbjson.isopen = !1, a.data.hbjson.type = 0, a.data.hbjson.num = 0, 
        a.data.hbjson.four.money = 0, a.data.hbjson.one.hb_time = "00:00:00", a.setData({
            hbjson: a.data.hbjson
        }), i.djsmiao_time && clearInterval(i.djsmiao_time);
    },
    openRedfun: function(a) {
        wx.showLoading({
            title: "加载中"
        }), a.data.hbjson.isopen = !1, a.setData({
            hbjson: a.data.hbjson
        }), i.util.request({
            url: "entry/wxapp/dingredaction",
            cachetime: "0",
            data: {
                userid: a.uid
            },
            success: function(t) {
                1 == t.data.status ? i.util.request({
                    url: "entry/wxapp/dinglingquhongbao",
                    cachetime: "0",
                    data: {
                        userid: a.uid
                    },
                    success: function(t) {
                        1 == t.data.status ? (a.data.hbjson.ifzhao = !0, a.data.hbjson.isopen = !0, a.data.hbjson.type = 2, 
                        a.data.hbjson.num = 4, a.data.hbjson.url = a.data.url, a.data.hbjson.set = a.data.djshiset, 
                        a.data.hbjson.four.money = t.data.data, a.data.hbjson.title = a.data.djshiset.ding_title, 
                        a.data.hbjson.one.hb_time = "00:00:00", 1 == a.data.system.is_zhanshi && 1 == a.data.system.is_hongbao && "" != a.data.system.txgg_id ? (a.data.hbjson.ad.ifzhanshi = !0, 
                        a.data.hbjson.ad.istype = 1, a.data.hbjson.ad.txggid = a.data.system.txgg_id, a.setData({
                            hbjson: a.data.hbjson
                        })) : 1 == a.data.system.is_zhanshi && 2 == a.data.system.is_hongbao ? i.util.request({
                            url: "entry/wxapp/classgg",
                            cachetime: "0",
                            data: {
                                num: 1,
                                longitude: a.data.longitude,
                                latitude: a.data.latitude,
                                type: 3
                            },
                            success: function(t) {
                                a.data.hbjson.ad.ifzhanshi = !0, a.data.hbjson.ad.istype = 2, t.data.data.length > 0 && (a.data.hbjson.ad.admodel = t.data.data), 
                                a.setData({
                                    hbjson: a.data.hbjson
                                });
                            }
                        }) : (a.data.hbjson.ad.ifzhanshi = !1, a.data.hbjson.ad.istype = 0, a.data.hbjson.ad.txggid = "", 
                        a.setData({
                            hbjson: a.data.hbjson
                        })), wx.hideLoading()) : wx.showModal({
                            title: "领取失败",
                            showCancel: !1
                        });
                    }
                }) : 2 == t.data.status && (wx.hideLoading(), wx.showModal({
                    title: "领取失败",
                    content: "红包活动已结束",
                    showCancel: !1,
                    function: function(t) {
                        t.confirm && (clearInterval(a.data.timer), a.setData({
                            djshide: 1
                        }));
                    }
                }));
            }
        });
    },
    hbclosefun: function(a) {
        a.data.hbjson.ifzhao = !1, a.data.hbjson.isopen = !1, a.data.hbjson.type = !1, a.data.hbjson.num = 0, 
        a.data.hbjson.one.hb_time = "00:00:00", a.data.hbjson.four.money = "0", a.data.hbjson.ad.ifzhanshi = !1, 
        a.data.hbjson.ad.istype = 0, a.data.hbjson.ad.admodel = [], a.setData({
            hbjson: a.data.hbjson
        }), i.ding_djs_miao = -1, s(a);
    },
    hbplayfun: function(a) {
        i.util.request({
            url: "entry/wxapp/getredsetting",
            cachetime: "0",
            success: function(t) {
                1 == t.data.status && 1 == t.data.data.ding_status && (t.data.data.lian_rule = t.data.data.lian_rule.replace(/\<img/gi, '<img style="max-width:100%;height:auto;" '), 
                t.data.data.ding_rule = t.data.data.ding_rule.replace(/\<img/gi, '<img style="max-width:100%;height:auto;" '), 
                a.data.hbdesc.ifzhao = !0, a.data.hbdesc.isopen = !0, a.data.hbdesc.seting = t.data.data, 
                a.setData({
                    hbdesc: a.data.hbdesc
                }));
            }
        });
    },
    hbclose3fun: function(a) {
        a.data.hbdesc.ifzhao = !1, a.data.hbdesc.isopen = !1, a.setData({
            hbdesc: a.data.hbdesc
        });
    },
    huanfu: function(a, t) {
        var e = i.system || null;
        null != e ? (a.setData({
            system: e,
            url: e.url,
            url3: e.url3,
            url2: e.url2
        }), a.isnofs ? wx.setNavigationBarColor({
            frontColor: "#000000",
            backgroundColor: "#ffffff"
        }) : wx.setNavigationBarColor({
            frontColor: "#ffffff",
            backgroundColor: e.color
        }), t(e)) : i.util.request({
            url: "entry/wxapp/system",
            cachetime: "0",
            success: function(e) {
                e.data.color = e.data.color || "#ffffff", a.setData({
                    system: e.data,
                    url: e.data.url,
                    url3: e.data.url3,
                    url2: e.data.url2
                }), a.isnofs ? wx.setNavigationBarColor({
                    frontColor: "#000000",
                    backgroundColor: "#ffffff"
                }) : wx.setNavigationBarColor({
                    frontColor: "#ffffff",
                    backgroundColor: e.data.color
                }), i.system = e.data, t(e.data);
            }
        });
    },
    muenList: function(a, n, s, o) {
        i.muenStorage && new Date().getTime() - new Date(i.muenStorage.t) < 12e4 ? (i.muenStorage = {
            data: i.muenStorage.data,
            t: d(new Date()).replace(/\-/g, "/")
        }, o(e(a, n, s, i.muenStorage.data))) : o(t(a, n, s));
    },
    getLocationStorage: function(a) {
        a(i.locationStorage ? new Date().getTime() - new Date(i.locationStorage.data) > 18e4 ? null : i.locationStorage : null);
    },
    getUrl: function(a, t) {
        var e = wx.getStorageSync("urlStorage") || null;
        null == e ? i.util.request({
            url: "entry/wxapp/Url",
            cachetime: "0",
            success: function(e) {
                i.util.request({
                    url: "entry/wxapp/Url3",
                    cachetime: "0",
                    success: function(n) {
                        a.setData({
                            url: e.data,
                            url3: n.data
                        });
                        var s = {};
                        s.url = e.data, s.url3 = n.data, wx.setStorageSync("urlStorage", s), t(s);
                    }
                });
            }
        }) : (a.setData({
            url: e.url,
            url3: e.url3
        }), t(e));
    },
    subStr: function(a, t) {
        return (a += "").length > t ? a = a.substring(0, t) + "..." : a;
    }
};