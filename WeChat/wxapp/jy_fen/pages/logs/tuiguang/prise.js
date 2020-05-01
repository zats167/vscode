var t = getApp(), o = (require("../../../../siteinfo.js"), require("../../../utils/util.js"));

Page({
    data: {
        in1: !1,
        in2: !1,
        in3: !1,
        logg: !1,
        log: !1,
        lo: !1,
        fwxy: !0,
        1000: 3e3
    },
    onLoad: function(t) {
        var n = this;
        o.huanfu(n, function(t) {
            n.setData({
                system: t,
                rzxy: t.ggrzxy,
                xtxx: t
            });
        }), o.getUrl(n, function(t) {}), o.login(function(t) {
            console.log(t), n.uid = t.id;
        });
    },
    dingwei: function(t) {
        console.log(t);
        var o = this;
        wx.chooseLocation({
            success: function(t) {
                console.log(t), o.setData({
                    sjdz: t.address + t.name
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
    formSubmit: function(o) {
        console.log("form发生了submit事件，携带数据为：", o.detail.value);
        var n = this.uid, e = o.detail.value.sjname, i = o.detail.value.sjdz, a = o.detail.value.lxtel, s = o.detail.formId, u = "", l = !0;
        "" == e ? u = "请填写广告主名称！" : "" == a ? u = "请填写联系电话！" : /^0?(13[0-9]|15[012356789]|17[013678]|18[0-9]|14[57])[0-9]{8}$/.test(a) && 11 == a.length ? (l = !1, 
        t.util.request({
            url: "entry/wxapp/ggruZhu",
            cachetime: "0",
            data: {
                user_id: n,
                user_name: e,
                user_tel: a,
                addr: i,
                form_id: s
            },
            success: function(t) {
                console.log(t), 1 == t.data ? (wx.showToast({
                    title: "提交成功"
                }), setTimeout(function() {
                    wx.navigateBack({});
                }, 1e3)) : wx.showToast({
                    title: "请重试！",
                    icon: "loading"
                });
            }
        })) : u = "手机号错误！", 1 == l && wx.showModal({
            title: "提示",
            content: u
        });
    },
    onHide: function() {},
    onUnload: function() {},
    onPullDownRefresh: function() {},
    onReachBottom: function() {},
    onShareAppMessage: function() {}
});