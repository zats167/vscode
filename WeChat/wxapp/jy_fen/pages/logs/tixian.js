var t = getApp(), e = require("../../utils/util.js");

Page({
    data: {
        open: !0,
        disabled: !1,
        logintext: "提现",
        fwxy: !0,
        1000: 3e3
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
    tradeinfo: function() {
        this.setData({
            open: !this.data.open
        });
    },
    formSubmit: function(e) {
        var a = this;
        console.log("form发生了submit事件，携带数据为：", e.detail.value);
        var s = a.uid, o = parseFloat(this.data.userinfo.wallet), i = this.data.system.txservice, n = parseFloat(a.tx), l = e.detail.value.je, u = e.detail.value.zh, r = e.detail.value.user_tel, c = e.detail.formId, d = e.detail.value.checkbox.length, f = e.detail.value.radiogroup;
        if (console.log(s, o, i, n, l, u, d, f), "" == f) return wx.showModal({
            title: "提示",
            content: "请选择提现方式"
        }), !1;
        var x = parseFloat(e.detail.value.je) * parseFloat(100 - i) / 100;
        console.log(x);
        var h = "", g = !0;
        o < n ? h = "金额满" + n + "才能申请提现" : "" == l ? h = "请填写提现金额！" : parseFloat(l) < n ? h = "提现金额未满足提现要求" : parseFloat(l) > o ? h = "提现金额超出您的实际金额" : 1 == a.data.system.is_zfb && "" == u ? h = "请填写账号" : "" == r ? h = "请填写联系方式！" : 0 == d ? h = "请阅读并同意用户提现协议" : (a.setData({
            disabled: !0,
            logintext: "提交中..."
        }), g = !1, t.util.request({
            url: "entry/wxapp/yuetx",
            cachetime: "0",
            data: {
                user_id: s,
                type: a.data.system.is_zfb,
                account: u,
                tx_cost: l,
                sj_cost: x,
                user_tel: r,
                form_id: c
            },
            success: function(t) {
                console.log(t), 1 == t.data ? (wx.showToast({
                    title: "提交成功"
                }), setTimeout(function() {
                    wx.redirectTo({
                        url: "txmx"
                    });
                }, 1e3)) : (wx.showToast({
                    title: "请重试！",
                    icon: "loading"
                }), a.setData({
                    disabled: !1,
                    logintext: "提现"
                }));
            }
        })), 1 == g && wx.showModal({
            title: "提示",
            content: h
        });
    },
    onLoad: function(a) {
        var s = this, o = this;
        e.huanfu(o, function(t) {
            o.setData({
                system: t
            });
        }), e.getUrl(o, function(t) {}), e.login(function(e) {
            console.log(e);
            var a = e.id;
            s.uid = e.id, t.util.request({
                url: "entry/wxapp/UserInfo",
                cachetime: "0",
                data: {
                    user_id: a
                },
                success: function(t) {
                    console.log(t), o.setData({
                        userinfo: t.data
                    });
                }
            }), t.util.request({
                url: "entry/wxapp/cktx",
                cachetime: "0",
                data: {
                    user_id: a
                },
                success: function(t) {
                    console.log(t), o.setData({
                        wdyj: t.data
                    });
                }
            }), t.util.request({
                url: "entry/wxapp/system",
                cachetime: "0",
                success: function(t) {
                    console.log("e.data.userinfo.isfrist_tx:", o.data.userinfo.isfrist_tx), 1 == o.data.userinfo.isfrist_tx ? o.tx = t.data.onetx : o.tx = t.data.ggtx, 
                    0 == t.data.is_wx && 1 == t.data.is_zfb && o.setData({
                        txtype: 1,
                        zhtext: "支付宝帐号",
                        zhtstext: "请输入支付宝帐号"
                    }), console.log(t.data), o.setData({
                        iswx: t.data.is_wx,
                        iszfb: t.data.is_zfb,
                        isyhk: t.data.is_yhk,
                        ggtx: o.tx,
                        txservice: t.data.txservice,
                        txagreement: t.data.txagreement,
                        system: t.data
                    });
                }
            });
        });
    },
    onReady: function() {},
    onShow: function() {},
    onHide: function() {},
    onUnload: function() {},
    onPullDownRefresh: function() {
        this.onLoad(), wx.stopPullDownRefresh();
    },
    onReachBottom: function() {}
});