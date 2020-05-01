getApp();

var n = require("../../utils/util.js");

Page({
    data: {},
    tel: function() {
        wx.makePhoneCall({
            phoneNumber: this.data.tel
        });
    },
    onLoad: function(t) {
        var o = this;
        n.huanfu(o, function(n) {
            o.setData({
                system: n,
                tel: n.tel
            });
        }), n.getUrl(o, function(n) {});
    },
    onReady: function() {},
    onShow: function() {},
    onHide: function() {},
    onUnload: function() {},
    onPullDownRefresh: function() {},
    onReachBottom: function() {}
});