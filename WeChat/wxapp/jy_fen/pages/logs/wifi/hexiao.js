var a = getApp(), t = require("../../../utils/util.js");

Page({
    data: {
        symx: [],
        pagenum: 0,
        pagesize: 15
    },
    onLoad: function(e) {
        var s = this;
        console.log(s), t.huanfu(s, function(a) {
            s.setData({
                link_logo: a.link_logo,
                pt_name: a.pt_name,
                system: a
            });
        }), a.util.request({
            url: "entry/wxapp/Url",
            cachetime: "0",
            success: function(a) {
                s.setData({
                    url: a.data
                });
            }
        }), a.util.request({
            url: "entry/wxapp/Url3",
            cachetime: "0",
            success: function(a) {
                s.setData({
                    url3: a.data
                });
            }
        }), t.login(function(a) {
            s.usersinfo = a, s.uid = a.id, s.dataIni();
        });
    },
    dataIni: function() {
        var a = this;
        a.data.pagenum = 1, a.data.score = [], a.data.isload = !0, a.data.isloadtis = !0, 
        a.setData({
            v: new Date().getTime(),
            loadstaue: !1
        }), a.getscoreList();
    },
    getscoreList: function() {
        var e = this;
        e.data.isload ? (console.log("user_id", e.uid), a.util.request({
            url: "entry/wxapp/wxapphexiao",
            cachetime: "0",
            data: {
                id: e.uid,
                pagesize: e.data.pagesize,
                type: 2,
                page: e.data.pagenum
            },
            success: function(a) {
                console.log("wxapphexiao", a.data), a.data.length < e.data.pagesize ? e.data.isload = !1 : e.data.pagenum += 1;
                for (var s = 0; s < a.data.length; s++) a.data[s].time = t.ormatDate(a.data[s].time);
                e.data.score = e.data.score.concat(a.data), e.setData({
                    loadstaue: !0,
                    symx: e.data.score
                });
            }
        })) : e.setData({
            loadstaue: !0,
            isloadtis: !1,
            loadtis: "- 我也是有底线的亲 -"
        });
    },
    deletes: function(t) {
        var e = this;
        console.log(e), console.log(t), a.util.request({
            url: "entry/wxapp/delwxapphexiao",
            cachetime: "0",
            data: {
                id: t.target.id
            },
            success: function(a) {
                1 == a.data.status ? (wx.showToast({
                    title: "删除成功"
                }), e.dataIni()) : 2 == a.data.status && wx.showToast({
                    title: "删除失败，请重新刷新！"
                });
            }
        });
    },
    shareModalClose: function() {
        this.setData({
            share_modal_active: !1,
            no_scroll: !1
        });
    },
    onReady: function() {},
    onShow: function() {},
    onHide: function() {},
    onUnload: function() {},
    onPullDownRefresh: function() {
        this.dataIni(), setTimeout(function() {
            wx.stopPullDownRefresh();
        }, 500);
    },
    onReachBottom: function() {
        this.setData({
            loadstaue: !1
        }), this.getscoreList();
    },
    onShareAppMessage: function() {
        return {
            title: " 审核人员邀请绑定",
            path: "/jy_fen/pages/logs/logs?souserid=" + this.uid,
            success: function(a) {},
            fail: function(a) {}
        };
    }
});