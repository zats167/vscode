var t = getApp(), n = require("../../../utils/util.js");

Page({
    data: {
        tabs: [ "一级代理", "二级代理" ],
        activeIndex: 0,
        djd: []
    },
    tabClick: function(t) {
        this.setData({
            activeIndex: t.currentTarget.id
        });
    },
    onLoad: function(e) {
        var a = this;
        n.huanfu(a, function(t) {
            a.setData({
                system: t
            });
        }), n.getUrl(a, function(t) {}), n.login(function(n) {
            a.setData({
                usersinfo: n
            }), a.dataIni(), t.util.request({
                url: "entry/wxapp/iserji",
                cachetime: "0",
                data: {
                    user_id: a.data.usersinfo.id
                },
                success: function(t) {
                    console.log(t), a.setData({
                        iserji: t.data.status
                    });
                }
            });
        });
    },
    dataIni: function() {
        var e = this;
        t.util.request({
            url: "entry/wxapp/MyTeam",
            cachetime: "0",
            data: {
                user_id: e.data.usersinfo.id
            },
            success: function(t) {
                console.log(t);
                var a = [];
                a = t.data.one;
                for (var i = 0; i < a.length; i++) a[i].time = n.ormatDate(a[i].time);
                e.setData({
                    yj: a
                });
            }
        });
    },
    spgl2: function(n) {
        var e = this;
        console.log(n.target.id), wx.showModal({
            title: "提示",
            content: "确认通过审核么！",
            success: function(a) {
                a.confirm ? t.util.request({
                    url: "entry/wxapp/disshxiaji",
                    cachetime: "0",
                    data: {
                        id: n.target.id
                    },
                    success: function(t) {
                        console.log(t), wx.showToast({
                            title: "操作成功",
                            duration: 3e3
                        }), e.dataIni();
                    }
                }) : a.cancel && console.log("用户点击取消");
            }
        });
    },
    onReady: function() {},
    onShow: function() {},
    onHide: function() {},
    onUnload: function() {},
    onPullDownRefresh: function() {
        this.dataIni(), setTimeout(function() {
            wx.stopPullDownRefresh();
        }, 1500);
    },
    onReachBottom: function() {},
    onShareAppMessage: function() {}
});