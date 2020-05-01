var t = getApp(), e = require("../../utils/util.js");

Page({
    data: {
        model: null,
        disabled: !1
    },
    onLoad: function(t) {
        var a = this;
        a.id = 0, t.id ? (a.id = t.id, e.huanfu(a, function(t) {
            a.setData({
                system: t
            });
        }), e.getUrl(a, function(t) {}), a.getModel()) : wx.showToast({
            title: "该信息不存在了！",
            icon: "none",
            duration: 2e3,
            success: function() {
                wx.redirectTo({
                    url: "/jy_fen/pages/wifi/wifi"
                });
            }
        });
    },
    getModel: function() {
        var e = this;
        t.util.request({
            url: "entry/wxapp/getonegg",
            cachetime: "0",
            data: {
                id: e.id
            },
            success: function(t) {
                console.log("getonegg", t.data), 1 == t.data.status ? (t.data.details = t.data.details.replace(/\<img/gi, '<img style="max-width:100%;height:auto; " '), 
                e.setData({
                    model: t.data
                }), wx.setNavigationBarTitle({
                    title: t.data.name
                })) : wx.showToast({
                    title: "该信息不存在了！",
                    icon: "none",
                    duration: 2e3,
                    success: function() {
                        wx.redirectTo({
                            url: "/jy_fen/pages/wifi/wifi"
                        });
                    }
                });
            }
        });
    },
    tel_tap: function() {
        wx.makePhoneCall({
            phoneNumber: this.data.model.phone
        });
    },
    formSubmit: function(e) {
        var a = this;
        a.setData({
            disabled: !0
        }), console.log("form发生了submit事件，携带数据为：", e.detail.value);
        var n = e.detail.value.user_name, o = e.detail.value.user_tel, i = e.detail.value.user_desc;
        return "" == n ? (a.setData({
            disabled: !1
        }), wx.showModal({
            title: "提示",
            content: "联系姓名不能为空",
            showCancel: !1
        }), !1) : "" == o ? (a.setData({
            disabled: !1
        }), wx.showModal({
            title: "提示",
            content: "联系方式不能为空",
            showCancel: !1
        }), !1) : /^0?(13[0-9]|15[012356789]|17[013678]|18[0-9]|14[57])[0-9]{8}$/.test(o) ? "" == i ? (a.setData({
            disabled: !1
        }), wx.showModal({
            title: "提示",
            content: "需求描述不能为空",
            showCancel: !1
        }), !1) : void t.util.request({
            url: "entry/wxapp/bdfank",
            cachetime: "0",
            data: {
                name: n,
                phone: o,
                feed: i,
                ggid: a.id
            },
            success: function(t) {
                console.log(t.data.status), 1 == t.data.status ? wx.showModal({
                    title: "提示",
                    content: "提交成功",
                    showCancel: !1,
                    success: function() {
                        wx.navigateBack({
                            delta: 1
                        });
                    }
                }) : (a.setData({
                    disabled: !1
                }), wx.showModal({
                    title: "提示",
                    content: "服务器繁忙，请稍后重试！",
                    showCancel: !1
                }));
            }
        }) : (a.setData({
            disabled: !1
        }), wx.showModal({
            title: "提示",
            content: "联系方式格式不对",
            showCancel: !1
        }), !1);
    },
    onReady: function() {},
    onShow: function() {},
    onHide: function() {},
    onUnload: function() {},
    onPullDownRefresh: function() {
        wx.stopPullDownRefresh();
    },
    onReachBottom: function() {},
    onShareAppMessage: function() {}
});