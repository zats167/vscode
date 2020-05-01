var o = getApp(), e = require("../../utils/util.js");

Page({
    data: {
        id: 0,
        type: 1
    },
    onLoad: function(t) {
        var n = this;
        console.log(t.scene);
        var a = decodeURIComponent(t.scene);
        if (console.log("e", a), "undefined" != a) {
            var s = a.split(",");
            n.setData({
                id: s[0],
                ty: s[1]
            }), o.util.request({
                url: "entry/wxapp/Url",
                cachetime: "0",
                success: function(o) {
                    n.setData({
                        url: o.data
                    });
                }
            }), e.huanfu(n, function(o) {});
        }
    },
    onShow: function() {
        var t = this;
        console.log(t), e.login(function(e) {
            t.uid = e.id, t.setData({
                usersinfo: e
            }), o.util.request({
                url: "entry/wxapp/MyHexiao",
                cachetime: "0",
                data: {
                    user_id: t.uid,
                    coupon_id: t.data.id,
                    type: t.data.ty
                },
                success: function(e) {
                    console.log("MyHexiao", e), 1 == e.data.status ? (t.setData({
                        sjinfo: e.data.data
                    }), o.util.request({
                        url: "entry/wxapp/hxcoupon",
                        cachetime: "0",
                        data: {
                            id: t.data.id
                        },
                        success: function(o) {
                            console.log("hxcoupon", o), console.log("hxcoupon2", t), t.data.sjinfo.wxapp_id != o.data.wxapp_id ? wx.showModal({
                                title: "提示",
                                confirmText: "确定",
                                showCancel: !1,
                                content: "商家身份不明，请核实！",
                                success: function(o) {
                                    wx.reLaunch({
                                        url: "/jy_fen/pages/logs/logs"
                                    });
                                }
                            }) : 2 != o.data.state ? wx.showModal({
                                content: "已经核销过了，继续核销么",
                                confirmText: "是的",
                                cancelText: "不了",
                                confirmColor: t.data.system.color,
                                cancelColor: "#666666",
                                success: function(o) {
                                    o.confirm ? wx.scanCode({
                                        onlyFromCamera: !0,
                                        success: function(o) {
                                            console.log(o), wx.redirectTo({
                                                url: "/" + o.path
                                            });
                                        }
                                    }) : wx.reLaunch({
                                        url: "/jy_fen/pages/logs/logs"
                                    });
                                }
                            }) : t.setData({
                                orderinfo: o.data
                            });
                        }
                    })) : wx.showModal({
                        title: "提示",
                        confirmText: "确定",
                        showCancel: !1,
                        content: e.data.msg,
                        success: function(o) {
                            wx.reLaunch({
                                url: "/jy_fen/pages/logs/logs"
                            });
                        }
                    });
                }
            });
        });
    },
    clerk: function(e) {
        var t = this;
        wx.showModal({
            content: "是否确认核销？",
            success: function(e) {
                e.confirm && (wx.showLoading({
                    title: "正在加载"
                }), o.util.request({
                    url: "entry/wxapp/qdhexiao",
                    cachetime: "0",
                    data: {
                        id: t.data.id,
                        hxname: t.data.usersinfo.name,
                        hxid: t.data.usersinfo.id
                    },
                    success: function(o) {
                        console.log("12", o), 1 == o.data ? wx.showModal({
                            content: "核销成功，继续核销么",
                            confirmText: "是的",
                            cancelText: "不了",
                            confirmColor: t.data.system.color,
                            cancelColor: "#666666",
                            success: function(o) {
                                o.confirm ? wx.scanCode({
                                    onlyFromCamera: !0,
                                    success: function(o) {
                                        console.log(o), wx.redirectTo({
                                            url: "/" + o.path
                                        });
                                    }
                                }) : wx.reLaunch({
                                    url: "/jy_fen/pages/logs/logs"
                                });
                            }
                        }) : wx.showModal({
                            title: "提示",
                            confirmText: "确定",
                            showCancel: !1,
                            content: "核销失败，请核实",
                            success: function(o) {}
                        });
                    }
                }));
            }
        });
    }
});