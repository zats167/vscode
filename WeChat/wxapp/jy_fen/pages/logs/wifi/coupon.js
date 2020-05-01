var t = getApp(), n = require("../../../utils/util.js");

Page({
    data: {
        address_list: []
    },
    onLoad: function(t) {
        var a = this;
        a.setData({
            storeid: t.storeid
        }), n.getUrl(a, function(t) {
            n.huanfu(a, function(t) {}), n.login(function(t) {
                a.uid = t.id;
            });
        });
    },
    onReady: function() {},
    onShow: function() {
        var n = this;
        t.util.request({
            url: "entry/wxapp/couponlist",
            cachetime: "0",
            data: {
                wxappid: n.data.storeid,
                type: 2
            },
            success: function(t) {
                console.log(t), t.data && 0 == t.data.length ? n.setData({
                    address_list: [],
                    show_no_data_tip: !0
                }) : n.setData({
                    address_list: t.data,
                    show_no_data_tip: !1
                });
            }
        });
    },
    deleteAddress: function(n) {
        var a = this, o = n.currentTarget.dataset.id;
        n.currentTarget.dataset.index, wx.showModal({
            title: "提示",
            content: "确认删除该优惠券？",
            success: function(n) {
                n.confirm && (wx.showLoading({
                    title: "正在删除",
                    mask: !0
                }), t.util.request({
                    url: "entry/wxapp/Delacoupon",
                    cachetime: "0",
                    data: {
                        id: o
                    },
                    success: function(t) {
                        console.log(t), 1 == t.data && a.onShow(), 2 == t.data && (wx.hideLoading(), wx.showToast({
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