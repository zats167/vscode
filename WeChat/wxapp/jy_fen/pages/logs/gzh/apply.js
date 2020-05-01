var a = getApp(), t = require("../../../utils/util.js"), e = require("../../../../siteinfo.js"), o = require("../../../utils/qqmap-wx-jssdk.js");

Page({
    data: {
        appname: "",
        appid: "",
        appsecret: "",
        appgh: "",
        realname: "",
        utel: "",
        gonggao: "",
        miaoshu: "",
        fwxy: !0,
        is_gg: !1,
        yyzz4: "",
        yyzz5: "",
        photos: [],
        latitude: "",
        longitude: "",
        wxs: "wuwu"
    },
    lookck: function() {
        this.setData({
            fwxy: !1
        });
    },
    queren: function() {
        this.setData({
            fwxy: !0
        });
    },
    bindGetUserInfo: function(a) {
        "openSetting:ok" == a.detail.errMsg ? (this.setData({
            hydl: !1
        }), this.dingwei()) : wx.showModal({
            title: "警告",
            content: "你的手机未开启位置服务，请找到手机 设置-微信-选择使用应用期间即可！",
            showCancel: !1,
            success: function(a) {
                this.dingwei();
            }
        });
    },
    dingwei: function(a) {
        console.log(a);
        var t = this;
        console.log(t), wx.chooseLocation({
            success: function(a) {
                console.log(a), t.setData({
                    address: a.address,
                    latitude: a.latitude,
                    longitude: a.longitude
                }), t.qqmapsdk.reverseGeocoder({
                    location: {
                        latitude: a.latitude,
                        longitude: a.longitude
                    },
                    coord_type: 1,
                    success: function(a) {
                        console.log("23424", a);
                        var e = a.result.address_component;
                        t.setData({
                            province: e.province,
                            city: e.city,
                            district: e.district
                        });
                    },
                    fail: function(a) {},
                    complete: function(a) {}
                });
            },
            fail: function() {
                t.setData({
                    hydl: !0
                });
            }
        });
    },
    onLoad: function(e) {
        var s = this;
        t.huanfu(s, function(a) {
            s.setData({
                system: a
            });
        }), t.login(function(a) {
            s.userinfo = a, s.setData({
                userinfo: a
            });
        }), t.huanfu(s, function(a) {
            s.qqmapsdk = new o({
                key: a.map_key
            });
        }), a.util.request({
            url: "entry/wxapp/Url2",
            cachetime: "0",
            success: function(a) {
                s.setData({
                    url2: a.data
                });
            }
        }), console.log(s), s.options.wxappid && s.setData({
            wxs: "none"
        }), a.util.request({
            url: "entry/wxapp/Url3",
            cachetime: "0",
            success: function(a) {
                s.setData({
                    url3: a.data
                });
            }
        }), a.util.request({
            url: "entry/wxapp/Url",
            cachetime: "0",
            success: function(t) {
                s.setData({
                    url: t.data
                }), a.util.request({
                    url: "entry/wxapp/Mygzh",
                    data: {
                        user_id: s.data.userinfo.id
                    },
                    success: function(a) {
                        if (console.log("qwe", a), a.data) {
                            1 == a.data.is_gg ? a.data.is_gg = !0 : a.data.is_gg = !1;
                            var e = [];
                            if (null != a.data.goods_pic && "" != a.data.goods_pic) {
                                console.log(66);
                                for (var o = a.data.goods_pic.split(","), n = 0; n < o.length; n++) e.push({
                                    src: t.data + o[n],
                                    url: o[n]
                                });
                            }
                            s.setData({
                                mygzh: a.data,
                                appname: a.data.appname,
                                id: a.data.id,
                                is_gg: a.data.is_gg,
                                appsecret: a.data.appsecret,
                                appgh: a.data.appgh,
                                realname: a.data.realname,
                                utel: a.data.utel,
                                gonggao: a.data.gonggao,
                                miaoshu: a.data.miaoshu,
                                files4: t.data + a.data.logo,
                                files5: t.data + a.data.ewm,
                                photos: e,
                                address: a.data.address,
                                appid: a.data.appid
                            }), a.data.logo && s.setData({
                                yyzz4: a.data.logo
                            }), a.data.ewm && s.setData({
                                yyzz5: a.data.ewm
                            });
                        }
                    }
                });
            }
        });
    },
    choose4: function(a) {
        var t = this;
        console.log(e), wx.chooseImage({
            count: 1,
            sizeType: [ "original", "compressed" ],
            sourceType: [ "album", "camera" ],
            success: function(a) {
                console.log(a.tempFilePaths);
                var o = a.tempFilePaths;
                wx.showToast({
                    icon: "loading",
                    title: "正在上传"
                }), wx.uploadFile({
                    url: e.siteroot + "?i=" + e.uniacid + "&c=entry&a=wxapp&do=upload&m=jy_fen",
                    filePath: a.tempFilePaths[0],
                    name: "upfile",
                    success: function(a) {
                        console.log(a), t.setData({
                            yyzz4: a.data
                        }), 200 == a.statusCode ? t.setData({
                            files4: o
                        }) : wx.showModal({
                            title: "提示",
                            content: "上传失败",
                            showCancel: !1
                        }), console.log(a), 200 == a.statusCode && 1 == JSON.parse(a.data).status ? t.setData({
                            yyzz4: JSON.parse(a.data).data,
                            files4: o
                        }) : wx.showModal({
                            title: "提示",
                            content: JSON.parse(a.data).msg,
                            showCancel: !1
                        });
                    },
                    fail: function(a) {
                        console.log(a), wx.showModal({
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
    choose5: function(a) {
        var t = this;
        console.log(e), wx.chooseImage({
            count: 1,
            sizeType: [ "original", "compressed" ],
            sourceType: [ "album", "camera" ],
            success: function(a) {
                console.log(a.tempFilePaths);
                var o = a.tempFilePaths;
                wx.showToast({
                    icon: "loading",
                    title: "正在上传"
                }), wx.uploadFile({
                    url: e.siteroot + "?i=" + e.uniacid + "&c=entry&a=wxapp&do=upload&m=jy_fen",
                    filePath: a.tempFilePaths[0],
                    name: "upfile",
                    success: function(a) {
                        console.log(a), t.setData({
                            yyzz5: a.data
                        }), 200 == a.statusCode ? t.setData({
                            files5: o
                        }) : wx.showModal({
                            title: "提示",
                            content: "上传失败",
                            showCancel: !1
                        }), console.log(a), 200 == a.statusCode && 1 == JSON.parse(a.data).status ? t.setData({
                            yyzz5: JSON.parse(a.data).data,
                            files5: o
                        }) : wx.showModal({
                            title: "提示",
                            content: JSON.parse(a.data).msg,
                            showCancel: !1
                        });
                    },
                    fail: function(a) {
                        console.log(a), wx.showModal({
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
        var a = this;
        wx.chooseImage({
            count: 9,
            sizeType: [ "original", "compressed" ],
            sourceType: [ "album", "camera" ],
            success: function(t) {
                var o = t.tempFilePaths;
                wx.showToast({
                    title: "正在上传...",
                    icon: "loading",
                    mask: !0,
                    duration: 6e5
                });
                for (var s = 0, n = 0; n < o.length; n++) wx.uploadFile({
                    url: e.siteroot + "?i=" + e.uniacid + "&c=entry&a=wxapp&do=upload&m=jy_fen",
                    filePath: o[n],
                    name: "upfile",
                    success: function(t) {
                        200 == t.statusCode ? (1 == JSON.parse(t.data).status && (a.data.photos.push({
                            src: o[s],
                            url: JSON.parse(t.data).data
                        }), a.setData({
                            photos: a.data.photos
                        })), s += 1) : (wx.hideToast(), wx.showModal({
                            title: "提示",
                            content: "上传失败",
                            showCancel: !1
                        }));
                    },
                    fail: function(a) {
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
    previewImage: function(a) {
        for (var t = [], e = 0; e < this.data.photos.length; e++) t.push(this.data.photos[e].src);
        var o = a.target.dataset.src;
        wx.previewImage({
            current: o,
            urls: t
        });
    },
    delImage: function(a) {
        var t = a.target.dataset.id;
        this.data.photos.splice(t, 1), this.setData({
            photos: this.data.photos
        });
    },
    typeChange: function(a) {
        console.log("typeChange 发生选择改变，携带值为", a.detail.value, this.data.type[a.detail.value]), 
        this.setData({
            typeIndex: a.detail.value
        });
    },
    saveAddress: function() {
        var e = this;
        t.login(function(t) {
            console.log("123", t), e.userinfo = t, e.setData({
                userinfo: t
            }), 0 == e.data.is_gg ? e.setData({
                nearby: 2
            }) : e.setData({
                nearby: 1
            });
            for (var o = [], s = 0; s < e.data.photos.length; s++) o.push(e.data.photos[s].url);
            if (o.length > 0) var n = o.join(",");
            return e.data.appname && "" != e.data.appname ? e.data.appid && "" != e.data.appid ? e.data.appsecret && "" != e.data.appsecret ? e.data.appgh && "" != e.data.appgh ? e.data.realname && "" != e.data.realname ? e.data.utel && "" != e.data.utel ? e.data.yyzz4 && "" != e.data.yyzz4 ? (e.data.latitude || (e.data.latitude = e.data.mygzh.latitude, 
            e.data.longitude = e.data.mygzh.longitude), wx.showLoading({
                title: "正在保存",
                mask: !0
            }), void a.util.request({
                url: "entry/wxapp/gzhruzhu",
                method: "post",
                data: {
                    type: e.data.wxs,
                    create_uid: e.userinfo.id,
                    id: e.data.id || "",
                    appname: e.data.appname,
                    appgh: e.data.appgh,
                    appid: e.data.appid,
                    realname: e.data.realname,
                    utel: e.data.utel,
                    gonggao: e.data.gonggao,
                    miaoshu: e.data.miaoshu,
                    logo: e.data.yyzz4 || "",
                    ewm: e.data.yyzz5 || "",
                    appsecret: e.data.appsecret,
                    is_gg: e.data.nearby,
                    longitude: e.data.longitude || "",
                    latitude: e.data.latitude || "",
                    address: e.data.address || "",
                    goods_pic: n || ""
                },
                success: function(a) {
                    console.log(a), wx.hideLoading(), 1 == a.data && wx.showModal({
                        title: "提示",
                        content: "保存成功！",
                        showCancel: !1,
                        success: function(a) {
                            wx.navigateBack();
                        }
                    }), 2 == a.code && wx.showToast({
                        title: "服务器繁忙，请重试！",
                        icon: "none"
                    });
                }
            })) : wx.showToast({
                title: "请上传门店Logo",
                icon: "none"
            }) : wx.showToast({
                title: "请填写联系电话",
                icon: "none"
            }) : wx.showToast({
                title: "请填写联系人"
            }) : wx.showToast({
                title: "请填写公众号原始ID",
                icon: "none"
            }) : wx.showToast({
                title: "请填写公众号appsecret",
                icon: "none"
            }) : wx.showToast({
                title: "请填写公众号Appid",
                icon: "none"
            }) : wx.showToast({
                title: "请填写公众号名称",
                icon: "none"
            });
        });
    },
    inputBlur: function(a) {
        var t = '{"' + a.currentTarget.dataset.name + '":"' + a.detail.value + '"}';
        this.setData(JSON.parse(t));
    },
    radioChange: function(a) {
        var t = this;
        console.log(a), 1 == a.detail.value ? t.setData({
            is_gg: !0,
            nearby: a.detail.value
        }) : t.setData({
            is_gg: !1,
            nearby: a.detail.value
        });
    },
    fz_tap: function(a) {
        console.log(a);
        var t = a.target.dataset.kl;
        t && wx.setClipboardData({
            data: t,
            success: function(a) {
                wx.getClipboardData({
                    success: function(a) {
                        wx.showToast({
                            title: "复制成功！",
                            icon: "none",
                            duration: 5e3,
                            success: function() {}
                        });
                    }
                });
            }
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