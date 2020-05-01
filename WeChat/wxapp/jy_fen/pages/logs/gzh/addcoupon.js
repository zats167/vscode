var t = getApp(), a = require("../../../utils/util.js");

require("../../../utils/qqmap-wx-jssdk.js");

Page({
    data: {
        name: "",
        preferential: "",
        conditions: "",
        instruction: ""
    },
    onLoad: function(n) {
        var e = this;
        a.getUrl(e, function(t) {
            a.huanfu(e, function(t) {});
        }), e.setData({
            wxappid: n.wxappid
        }), a.login(function(a) {
            e.uid = a.id, n.id && e.setData({
                address_id: n.id
            }), n.id && (wx.showLoading({
                title: "正在加载",
                mask: !0
            }), t.util.request({
                url: "entry/wxapp/coupondetail",
                data: {
                    id: n.id
                },
                success: function(t) {
                    wx.hideLoading(), t.data && (e.setData(t.data), e.setData({
                        end_time: t.data.end_time,
                        start_time: t.data.start_time
                    }));
                }
            }));
        });
    },
    saveAddress: function() {
        var a = this;
        return console.log(a), a.data.name && "" != a.data.name ? a.data.preferential && "" != a.data.preferential ? a.data.conditions && "" != a.data.conditions ? a.data.instruction && "" != a.data.instruction ? (wx.showLoading({
            title: "正在保存",
            mask: !0
        }), void t.util.request({
            url: "entry/wxapp/addcoupon",
            method: "post",
            data: {
                id: a.data.id || "",
                name: a.data.name,
                wxappid: a.data.wxappid,
                conditions: a.data.conditions,
                instruction: a.data.instruction,
                preferential: a.data.preferential,
                end_time: a.data.end_time,
                type: 1,
                start_time: a.data.start_time
            },
            success: function(t) {
                console.log(t), wx.hideLoading(), 1 == t.data && wx.showModal({
                    title: "提示",
                    content: "保存成功！",
                    showCancel: !1,
                    success: function(t) {
                        wx.navigateBack();
                    }
                }), 2 == t.code && wx.showToast({
                    title: "服务器繁忙，请重试！",
                    icon: "none"
                });
            }
        })) : wx.showToast({
            title: "请填写说明",
            icon: "none"
        }) : wx.showToast({
            title: "请填写可使用金额",
            icon: "none"
        }) : wx.showToast({
            title: "请填写折扣金额",
            icon: "none"
        }) : wx.showToast({
            title: "请填写优惠券名称",
            icon: "none"
        });
    },
    inputBlur: function(t) {
        var a = '{"' + t.currentTarget.dataset.name + '":"' + t.detail.value + '"}';
        this.setData(JSON.parse(a));
    },
    bindDateChange1: function(t) {
        console.log("date 发生 change 事件，携带值为", t.detail.value, this.data.datestart), this.setData({
            start_time: t.detail.value
        });
    },
    bindDateChange2: function(t) {
        console.log("date 发生 change 事件，携带值为", t.detail.value, this.data.datestart), this.setData({
            end_time: t.detail.value
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