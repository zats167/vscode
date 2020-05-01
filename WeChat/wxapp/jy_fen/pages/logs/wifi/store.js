var t = getApp(), e = require("../../../utils/util.js"), a = require("../../../../siteinfo.js"), o = require("../../../utils/qqmap-wx-jssdk.js");

Page({
    data: {
        logg: !1,
        log: !1,
        lo: !1,
        fwxy: !0,
        yyzz4: "",
        yyzz5: "",
        qid: 0,
        latitude: "",
        longitude: "",
        storeid: "",
        storeinfo: !0,
        spfl: [],
        spflIndex: 0,
        photos: [],
        1000: 3e3
    },
    onLoad: function(a) {
        var s = this;
        void 0 != a.qid && s.setData({
            qid: a.qid
        }), e.huanfu(s, function(a) {
            s.qqmapsdk = new o({
                key: a.map_key
            });
            e.login(function(e) {
                s.uid = e.id, 2 == e.status ? t.util.request({
                    url: "entry/wxapp/UserInfo",
                    cachetime: "0",
                    data: {
                        user_id: s.uid
                    },
                    success: function(e) {
                        console.log("UserInfo", e);
                        var a = [];
                        if (null != e.data.goods_pic && "" != e.data.goods_pic) for (var o = e.data.goods_pic.split(","), i = 0; i < o.length; i++) a.push({
                            src: s.data.url + o[i],
                            url: o[i]
                        });
                        s.setData({
                            storeinfo: e.data,
                            address: e.data.address,
                            files4: s.data.url + e.data.store_logo,
                            files5: s.data.url + e.data.ewm,
                            photos: a,
                            tyid: e.data.typeid,
                            latitude: e.data.latitude,
                            longitude: e.data.longitude
                        }), e.data.store_logo && s.setData({
                            yyzz4: e.data.store_logo
                        }), e.data.ewm && s.setData({
                            yyzz5: e.data.ewm
                        }), t.util.request({
                            url: "entry/wxapp/Getstoretype",
                            cachetime: "0",
                            success: function(t) {
                                s.setData({
                                    spfl: t.data
                                });
                                for (var a = 0; a < t.data.length; a++) t.data[a].id == e.data.typeid && s.setData({
                                    spflIndex: a
                                });
                            }
                        });
                    }
                }) : t.util.request({
                    url: "entry/wxapp/Getstoretype",
                    cachetime: "0",
                    success: function(t) {
                        s.setData({
                            spfl: t.data
                        });
                    }
                });
            });
        });
    },
    spflChange: function(t) {
        console.log("spflChange 发生选择改变，携带值为", t.detail.value, this.data.spfl[t.detail.value].id), 
        this.setData({
            spflIndex: t.detail.value,
            tyid: this.data.spfl[t.detail.value].id
        });
    },
    bindGetUserInfo: function(t) {
        "openSetting:ok" == t.detail.errMsg ? (this.setData({
            hydl: !1
        }), this.dingwei()) : wx.showModal({
            title: "警告",
            content: "你的手机未开启位置服务，请找到手机 设置-微信-选择使用应用期间即可！",
            showCancel: !1,
            success: function(t) {
                this.dingwei();
            }
        });
    },
    dingwei: function(t) {
        var e = this;
        wx.chooseLocation({
            success: function(t) {
                console.log(t), e.setData({
                    address: t.address,
                    latitude: t.latitude,
                    longitude: t.longitude
                }), e.qqmapsdk.reverseGeocoder({
                    location: {
                        latitude: t.latitude,
                        longitude: t.longitude
                    },
                    coord_type: 1,
                    success: function(t) {
                        console.log("23424", t);
                        var a = t.result.address_component;
                        e.setData({
                            province: a.province,
                            city: a.city,
                            district: a.district
                        });
                    },
                    fail: function(t) {},
                    complete: function(t) {}
                });
            },
            fail: function() {
                e.setData({
                    hydl: !0
                });
            }
        });
    },
    onReady: function() {},
    lookFwxy: function() {
        this.setData({
            fwxy: !1
        });
    },
    queren: function() {
        this.setData({
            fwxy: !0
        });
    },
    onShow: function() {},
    bindPickerChange: function(t) {
        console.log(t), this.setData({
            typeid: t.detail.value
        });
    },
    choose4: function(t) {
        var e = this;
        console.log(a), wx.chooseImage({
            count: 1,
            sizeType: [ "original", "compressed" ],
            sourceType: [ "album", "camera" ],
            success: function(t) {
                console.log(t.tempFilePaths);
                var o = t.tempFilePaths;
                wx.showToast({
                    icon: "loading",
                    title: "正在上传"
                }), wx.uploadFile({
                    url: a.siteroot + "?i=" + a.uniacid + "&c=entry&a=wxapp&do=upload&m=jy_fen",
                    filePath: t.tempFilePaths[0],
                    name: "upfile",
                    success: function(t) {
                        console.log(t), e.setData({
                            yyzz4: t.data
                        }), 200 == t.statusCode ? e.setData({
                            files4: o
                        }) : wx.showModal({
                            title: "提示",
                            content: "上传失败",
                            showCancel: !1
                        }), console.log(t), 200 == t.statusCode && 1 == JSON.parse(t.data).status ? e.setData({
                            yyzz4: JSON.parse(t.data).data,
                            files4: o
                        }) : wx.showModal({
                            title: "提示",
                            content: JSON.parse(t.data).msg,
                            showCancel: !1
                        });
                    },
                    fail: function(t) {
                        console.log(t), wx.showModal({
                            title: "提示",
                            content: "上传失败",
                            showCancel: !1
                        });
                    },
                    complete: function() {
                        wx.hideToast();
                    }
                });
            }
        });
    },
    choose5: function(t) {
        var e = this;
        console.log(a), wx.chooseImage({
            count: 1,
            sizeType: [ "original", "compressed" ],
            sourceType: [ "album", "camera" ],
            success: function(t) {
                console.log(t.tempFilePaths);
                var o = t.tempFilePaths;
                wx.showToast({
                    icon: "loading",
                    title: "正在上传"
                }), wx.uploadFile({
                    url: a.siteroot + "?i=" + a.uniacid + "&c=entry&a=wxapp&do=upload&m=jy_fen",
                    filePath: t.tempFilePaths[0],
                    name: "upfile",
                    success: function(t) {
                        console.log(t), e.setData({
                            yyzz5: t.data
                        }), 200 == t.statusCode ? e.setData({
                            files5: o
                        }) : wx.showModal({
                            title: "提示",
                            content: "上传失败",
                            showCancel: !1
                        }), console.log(t), 200 == t.statusCode && 1 == JSON.parse(t.data).status ? e.setData({
                            yyzz5: JSON.parse(t.data).data,
                            files5: o
                        }) : wx.showModal({
                            title: "提示",
                            content: JSON.parse(t.data).msg,
                            showCancel: !1
                        });
                    },
                    fail: function(t) {
                        console.log(t), wx.showModal({
                            title: "提示",
                            content: "上传失败",
                            showCancel: !1
                        });
                    },
                    complete: function() {
                        wx.hideToast();
                    }
                });
            }
        });
    },
    chooseImage: function() {
        var t = this;
        wx.chooseImage({
            count: 9,
            sizeType: [ "original", "compressed" ],
            sourceType: [ "album", "camera" ],
            success: function(e) {
                var o = e.tempFilePaths;
                wx.showToast({
                    title: "正在上传...",
                    icon: "loading",
                    mask: !0,
                    duration: 6e5
                });
                for (var s = 0, i = 0; i < o.length; i++) wx.uploadFile({
                    url: a.siteroot + "?i=" + a.uniacid + "&c=entry&a=wxapp&do=upload&m=jy_fen",
                    filePath: o[i],
                    name: "upfile",
                    success: function(e) {
                        200 == e.statusCode ? (1 == JSON.parse(e.data).status && (t.data.photos.push({
                            src: o[s],
                            url: JSON.parse(e.data).data
                        }), t.setData({
                            photos: t.data.photos
                        })), s += 1) : (wx.hideToast(), wx.showModal({
                            title: "提示",
                            content: "上传失败",
                            showCancel: !1
                        }));
                    },
                    fail: function(t) {
                        wx.hideToast(), wx.showModal({
                            title: "提示",
                            content: "上传失败",
                            showCancel: !1
                        });
                    },
                    complete: function() {
                        o.length == s && wx.hideToast();
                    }
                });
            }
        });
    },
    previewImage: function(t) {
        for (var e = [], a = 0; a < this.data.photos.length; a++) e.push(this.data.photos[a].src);
        var o = t.target.dataset.src;
        wx.previewImage({
            current: o,
            urls: e
        });
    },
    delImage: function(t) {
        var e = t.target.dataset.id;
        this.data.photos.splice(e, 1), this.setData({
            photos: this.data.photos
        });
    },
    formSubmit: function(e) {
        var a = this;
        console.log("form发生了submit事件，携带数据为：", e.detail.value);
        for (var o = this.uid, s = e.detail.value.store_name, i = e.detail.value.address, n = e.detail.value.store_tel, l = e.detail.value.miaoshu, d = e.detail.value.gonggao, u = this.data.tyid, c = this.data.yyzz4, r = this.data.yyzz5, h = [], p = 0; p < a.data.photos.length; p++) h.push(a.data.photos[p].url);
        if (h.length > 0) var f = h.join(",");
        var g = "", w = !0;
        "" == s ? g = "请填写商家名称！" : "" == n ? g = "请填写联系电话！" : "" != i && "" != a.data.latitude && "" != a.data.longitude && null != a.data.latitude && null != a.data.longitude ? "" == c ? g = "请上传商家logo！" : (w = !1, 
        t.util.request({
            url: "entry/wxapp/storeup",
            cachetime: "0",
            data: {
                id: o,
                store_name: s,
                store_tel: n,
                store_logo: c || "",
                ewm: r || "",
                miaoshu: l,
                gonggao: d,
                address: i,
                qid: a.data.qid,
                typeid: u,
                latitude: a.data.latitude,
                longitude: a.data.longitude,
                goods_pic: f || ""
            },
            success: function(t) {
                console.log("storeup", t), 1 == t.data ? (wx.showToast({
                    title: "保存成功！",
                    icon: "none"
                }), setTimeout(function() {
                    a.data.storeid > 0 ? wx.navigateBack({
                        delta: 1
                    }) : 1 == getCurrentPages().length ? wx.reLaunch({
                        url: "/jy_fen/pages/wifi/wifi"
                    }) : wx.navigateBack({
                        delta: 1
                    });
                }, 2e3)) : wx.showToast({
                    title: "请修改点东西再提交吧亲！",
                    icon: "none"
                });
            }
        })) : g = "请选择商家地址！", 1 == w && wx.showModal({
            title: "提示",
            content: g
        });
    },
    onHide: function() {},
    onUnload: function() {},
    onPullDownRefresh: function() {},
    onReachBottom: function() {},
    onShareAppMessage: function() {}
});