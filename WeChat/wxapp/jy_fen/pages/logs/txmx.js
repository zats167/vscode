var t = getApp(), a = require("../../utils/util.js");

Page({
    data: {
        tabs: [ "待审核", "已通过", "已拒绝" ],
        activeIndex: 0,
        djd: []
    },
    tabClick: function(t) {
        this.setData({
            activeIndex: t.currentTarget.id
        });
    },
    reLoad: function() {
        var e = this;
        a.huanfu(e, function(t) {
            e.setData({
                system: t
            });
        }), a.login(function(n) {
            console.log(n);
            var o = n.id;
            t.util.request({
                url: "entry/wxapp/yuetxlist",
                cachetime: "0",
                data: {
                    user_id: o
                },
                success: function(t) {
                    console.log(t.data);
                    for (var n = 0; n < t.data.length; n++) t.data[n].time = a.ormatDate(t.data[n].time), 
                    t.data[n].sh_time = a.ormatDate(t.data[n].sh_time);
                    var o = [], i = [], s = [];
                    for (n = 0; n < t.data.length; n++) t.data[n].sxf = (t.data[n].tx_cost - t.data[n].sj_cost).toFixed(2);
                    for (n = 0; n < t.data.length; n++) "1" == t.data[n].state && o.push(t.data[n]), 
                    "2" == t.data[n].state && i.push(t.data[n]), "3" == t.data[n].state && s.push(t.data[n]);
                    console.log(o, i, s), e.setData({
                        dsh: o,
                        ytg: i,
                        yjj: s
                    });
                }
            });
        });
    },
    onLoad: function(t) {
        this.reLoad();
        var e = this;
        a.getUrl(e, function(t) {});
    },
    onReady: function() {},
    onShow: function() {},
    onHide: function() {},
    onUnload: function() {},
    onPullDownRefresh: function() {
        this.reLoad();
    },
    onReachBottom: function() {}
});