var t = getApp(), e = require("../../../utils/util.js");

Page({
    data: {
        model: null,
        v: new Date().getTime()
    },
    onLoad: function(n) {
        var i = this;
        e.huanfu(i, function(t) {
            i.setData({
                system: t
            });
        }), i.id = 0, n.id ? (i.id = n.id, t.util.request({
            url: "entry/wxapp/Url",
            cachetime: "0",
            success: function(t) {
                i.setData({
                    url: t.data
                });
            }
        }), t.util.request({
            url: "entry/wxapp/Url3",
            cachetime: "0",
            success: function(t) {
                i.setData({
                    url3: t.data
                });
            }
        }), i.getWifiModel()) : wx.showToast({
            title: "账号不存在！",
            icon: "none",
            duration: 2e3,
            success: function() {
                1 == getCurrentPages().length ? wx.reLaunch({
                    url: "wifi"
                }) : wx.navigateBack({
                    delta: 1
                });
            }
        });
    },
    getWifiModel: function() {
        var e = this;
        t.util.request({
            url: "entry/wxapp/wifi",
            cachetime: "0",
            data: {
                id: e.id
            },
            success: function(t) {
                console.log("wifi", t.data), 1 == t.data.status ? e.setData({
                    model: t.data.data
                }) : wx.showToast({
                    title: "账号不存在！",
                    icon: "none",
                    duration: 2e3,
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
    onReady: function() {},
    onShow: function() {
        this.setData({
            v: new Date().getTime()
        });
    },
    onHide: function() {},
    onUnload: function() {},
    onPullDownRefresh: function() {
        wx.stopPullDownRefresh();
    },
    onReachBottom: function() {},
    onShareAppMessage: function() {
        return {
            title: "免费连接WIFI",
            path: "/jy_fen/pages/wifi/wifi?scene=" + this.id
        };
    },
    bianji_tap: function() {
        wx.navigateTo({
            url: "bainji?id=" + this.id
        });
    },
    del_tap: function() {
        var e = this;
        wx.showModal({
            title: "提示",
            confirmText: "确定",
            content: "确定删除该WIFI么？",
            success: function(n) {
                n.confirm && t.util.request({
                    url: "entry/wxapp/delwifi",
                    cachetime: "0",
                    data: {
                        id: e.id
                    },
                    success: function(t) {
                        console.log("delwifi", t.data), 1 == t.data.status && wx.showToast({
                            title: "删除成功!",
                            icon: "success",
                            duration: 2e3,
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
            }
        });
    },
    xiazai_tap: function() {
        var t = this;
        wx.saveImageToPhotosAlbum ? (wx.showLoading({
            title: "正在保存图片",
            mask: !1
        }), wx.downloadFile({
            url: t.data.url3 + "template/qrcode/myyaoqing_" + t.data.model.id + ".png",
            success: function(e) {
                console.log(e), wx.showLoading({
                    title: "正在保存图片",
                    mask: !1
                }), wx.saveImageToPhotosAlbum({
                    filePath: e.tempFilePath,
                    success: function() {
                        wx.showModal({
                            title: "提示",
                            content: "保存成功",
                            showCancel: !1
                        });
                    },
                    fail: function(e) {
                        console.log(e), wx.showModal({
                            title: "警告",
                            content: "您点击了拒绝授权,无法正常保存图片,点击确定重新获取授权。",
                            showCancel: !1,
                            success: function(n) {
                                n.confirm ? wx.openSetting({
                                    success: function(e) {
                                        e.authSetting["scope.writePhotosAlbum"] && t.xiazai_tap();
                                    },
                                    fail: function(t) {}
                                }) : wx.showModal({
                                    title: "图片保存失败",
                                    content: e.errMsg,
                                    showCancel: !1
                                });
                            }
                        });
                    },
                    complete: function(t) {
                        console.log(t), wx.hideLoading();
                    }
                });
            },
            fail: function(t) {
                wx.showModal({
                    title: "图片下载失败",
                    content: t.errMsg,
                    showCancel: !1
                });
            },
            complete: function(t) {
                console.log(t), wx.hideLoading();
            }
        })) : wx.showModal({
            title: "提示",
            content: "当前微信版本过低，无法使用该功能，请升级到最新微信版本后重试。",
            showCancel: !1
        });
    }
});