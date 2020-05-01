var t = getApp(), e = require("../../../utils/util.js");

Page({
    data: {
        fwxy: !0,
        disabled: !1,
        logintext: "申请成为代理商",
        1000: 3e3,
        multiIndex: [ 0, 0, 0 ],
        region: [ "北京市", "北京市", "东城区" ],
        customItem: "全部"
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
    bindRegionChange: function(t) {
        console.log("picker发送选择改变，携带值为", t), this.setData({
            region: t.detail.value
        });
    },
    onLoad: function(a) {
        var n = this;
        e.huanfu(n, function(t) {
            n.setData({
                system: t,
                pt_name: t.pt_name
            });
        }), t.util.request({
            url: "entry/wxapp/FxSet",
            cachetime: "0",
            success: function(t) {
                console.log(t.data), n.setData({
                    img: t.data.img2,
                    fx_details: t.data.fx_details,
                    fxset: t.data
                });
            }
        }), e.login(function(t) {
            console.log(t), n.usersinfo = t;
        });
    },
    formSubmit: function(e) {
        console.log("form发生了submit事件，携带数据为：", e.detail.value);
        var a = this, n = wx.getStorageSync("users").id, o = e.detail.value.name, i = e.detail.value.tel, s = e.detail.formId, l = e.detail.value.checkbox.length;
        console.log(n, o, i, l, a);
        var u = "", c = !0;
        "" == o ? u = "请填写姓名！" : "" == i ? u = "请填写联系电话！" : /^0?(13[0-9]|15[012356789]|17[013678]|18[0-9]|14[57])[0-9]{8}$/.test(i) && 11 == i.length ? 0 == l ? u = "阅读并同意代理商申请协议" : (a.setData({
            disabled: !0,
            logintext: "提交中..."
        }), c = !1, t.util.request({
            url: "entry/wxapp/Distribution",
            cachetime: "0",
            data: {
                user_id: n,
                user_name: o,
                is_fx: a.data.fxset.is_fx,
                user_tel: i,
                form_id: s,
                province: a.data.region[0],
                city: a.data.region[1],
                area: a.data.region[2]
            },
            success: function(t) {
                console.log(t), 1 == t.data ? (wx.showToast({
                    title: "提交成功"
                }), setTimeout(function() {
                    wx.navigateBack({});
                }, 1e3)) : (wx.showToast({
                    title: "请重试！",
                    icon: "loading"
                }), a.setData({
                    disabled: !1,
                    logintext: "申请成为代理商"
                }));
            }
        })) : u = "手机号错误！", 1 == c && wx.showModal({
            title: "提示",
            content: u
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