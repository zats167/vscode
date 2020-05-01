var t = getApp(), n = require("../../../utils/util.js");

Page({
    data: {
        tabs: [ "我的区长列表", "二级代理区长列表" ],
        activeIndex: 0,
        djd: []
    },
    tabClick: function(t) {
        this.setData({
            activeIndex: t.currentTarget.id
        });
    },
    onLoad: function(a) {
        var e = this;
        n.huanfu(e, function(t) {
            e.setData({
                system: t
            });
        }), n.getUrl(e, function(t) {}), n.login(function(n) {
            e.setData({
                usersinfo: n
            }), e.dataIni(), t.util.request({
                url: "entry/wxapp/iserji",
                cachetime: "0",
                data: {
                    user_id: e.data.usersinfo.id
                },
                success: function(t) {
                    console.log(t), e.setData({
                        iserji: t.data.status
                    });
                }
            });
        });
    },
    dataIni: function() {
        var a = this;
        t.util.request({
            url: "entry/wxapp/myitquzhanglist",
            cachetime: "0",
            data: {
                user_id: a.data.usersinfo.id
            },
            success: function(t) {
                console.log(t);
                var e = [], i = [];
                e = t.data.one, i = t.data.two;
                for (var o = 0; o < e.length; o++) e[o].addtime = n.ormatDate(e[o].addtime);
                for (o = 0; o < i.length; o++) i[o].addtime = n.ormatDate(i[o].addtime);
                a.setData({
                    yj: e,
                    ej: i
                });
            }
        });
    },
    spgl2: function(n) {
        var a = this;
        console.log(n.target.id), wx.showModal({
            title: "提示",
            content: "确认通过审核么！",
            success: function(e) {
                e.confirm ? t.util.request({
                    url: "entry/wxapp/disquzhang",
                    cachetime: "0",
                    data: {
                        id: n.target.id
                    },
                    success: function(t) {
                        console.log(t), wx.showToast({
                            title: "操作成功",
                            duration: 3e3
                        }), a.dataIni();
                    }
                }) : e.cancel && console.log("用户点击取消");
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