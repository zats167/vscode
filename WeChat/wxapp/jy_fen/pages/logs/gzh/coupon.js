var t = getApp(), a = require("../../../utils/util.js");

Page({
    data: {
        address_list: []
    },
    onLoad: function(t) {
        var n = this;
        n.setData({
            wxappid: t.wxappid
        }), a.getUrl(n, function(t) {
            a.huanfu(n, function(t) {}), a.login(function(t) {
                n.uid = t.id;
            });
        });
    },
    onReady: function() {},
    onShow: function() {
        var a = this;
        t.util.request({
            url: "entry/wxapp/couponlist",
            cachetime: "0",
            data: {
                wxappid: a.data.wxappid,
                type: 1
            },
            success: function(t) {
                console.log(t), t.data && 0 == t.data.length ? a.setData({
                    address_list: [],
                    show_no_data_tip: !0
                }) : a.setData({
                    address_list: t.data,
                    show_no_data_tip: !1
                });
            }
        });
    },
    deleteAddress: function(a) {
        var n = this, o = a.currentTarget.dataset.id;
        a.currentTarget.dataset.index, wx.showModal({
            title: "提示",
            content: "确认删除该优惠券？",
            success: function(a) {
                a.confirm && (wx.showLoading({
                    title: "正在删除",
                    mask: !0
                }), t.util.request({
                    url: "entry/wxapp/Delacoupon",
                    cachetime: "0",
                    data: {
                        id: o
                    },
                    success: function(t) {
                        console.log(t), 1 == t.data && n.onShow(), 2 == t.data && (wx.hideLoading(), wx.showToast({
                            title: "删除失败！",
                            icon: "none"
                        }));
                    }
                }));
            }
        });
    },
    onHide: function() {},
    onUnload: function() {},
    onPullDownRefresh: function() {},
    onReachBottom: function() {},
    onShareAppMessage: function() {}
});