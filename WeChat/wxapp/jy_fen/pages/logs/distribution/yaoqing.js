var t = getApp(), a = require("../../../utils/util.js");

Page({
    data: {
        havecode: 0,
        fwxy: !0,
        todayD: 0,
        wdtd: 0,
        todayM: 0,
        allM: 0,
        todayW: 0,
        allW: 0,
        todayQ: 0,
        allQ: 0,
        fxset: 1,
        ifdianji: !0,
        btntxt: "申请成为代理商"
    },
    ljyq: function() {
        var a = this;
        a.type = 1;
        var e = a.data.fxset, s = a.data.wdsq;
        "2" == s.state && t.util.request({
            url: "entry/wxapp/MyCode",
            cachetime: "0",
            data: {
                user_id: a.usersinfo.id,
                type: a.type
            },
            success: function(t) {
                a.setData({
                    code: t.data
                });
            }
        }), "1" == e.is_open ? s ? ("1" == s.state && wx.showModal({
            title: "提示",
            content: "您的申请正在审核中，请耐心等待"
        }), "2" == s.state && this.setData({
            share_modal_active: !0
        }), "3" == s.state && wx.navigateTo({
            url: "distribution"
        })) : wx.navigateTo({
            url: "distribution"
        }) : (console.log("未开启入驻"), this.setData({
            share_modal_active: !1
        }));
    },
    ljyq2: function() {
        var a = this;
        a.type = 4, t.util.request({
            url: "entry/wxapp/MyCode",
            cachetime: "0",
            data: {
                user_id: a.usersinfo.id,
                type: a.type
            },
            success: function(t) {
                console.log("MyCode", t), a.setData({
                    code: t.data,
                    share_modal_active: !0
                });
            }
        });
    },
    qzyq: function() {
        var a = this;
        a.type = 2, t.util.request({
            url: "entry/wxapp/MyCode",
            cachetime: "0",
            data: {
                user_id: a.usersinfo.id,
                type: a.type
            },
            success: function(t) {
                console.log("MyCode", t), a.setData({
                    code: t.data,
                    share_modal_active: !0
                });
            }
        });
    },
    onLoad: function(e) {
        var s = this;
        s.type = 0, a.huanfu(s, function(a) {
            t.util.request({
                url: "entry/wxapp/FxSet",
                cachetime: "0",
                success: function(t) {
                    console.log(t.data), s.setData({
                        img: t.data.img,
                        fxset: t.data
                    });
                }
            });
        });
    },
    onReady: function() {},
    onShow: function() {
        var e = this;
        a.login(function(s) {
            console.log("123", s), e.usersinfo = s, e.setData({
                usersinfo: s
            });
            var o = s.id, i = s.name;
            console.log(o), t.util.request({
                url: "entry/wxapp/MyDistribution",
                cachetime: "0",
                data: {
                    user_id: o
                },
                success: function(t) {
                    console.log("MyDistribution", t.data), e.setData({
                        wdsq: t.data
                    }), t.data ? "2" == t.data.state ? e.setData({
                        havecode: 1
                    }) : "1" == t.data.state ? e.setData({
                        btntxt: "您的申请正在审核中，请耐心等待",
                        havecode: 2,
                        ifdianji: !0
                    }) : "3" == t.data.state && e.setData({
                        btntxt: "您的申请已被拒绝，重新申请",
                        ifdianji: !1,
                        havecode: 2
                    }) : e.setData({
                        btntxt: "申请成为代理",
                        havecode: 2,
                        ifdianji: !1
                    });
                }
            }), t.util.request({
                url: "entry/wxapp/myitwifi",
                cachetime: "0",
                data: {
                    user_id: o
                },
                success: function(t) {
                    console.log("myitwifi", t), e.setData({
                        todayW: t.data.jrwifi,
                        allW: t.data.zongwifi
                    });
                }
            }), t.util.request({
                url: "entry/wxapp/myprofit",
                cachetime: "0",
                data: {
                    user_id: o
                },
                success: function(t) {
                    console.log("myprofit", t), e.setData({
                        todayM: t.data.jrprofit.money,
                        allM: t.data.zongprofit.money
                    });
                }
            }), t.util.request({
                url: "entry/wxapp/system",
                cachetime: "0",
                success: function(t) {
                    console.log(t), e.setData({
                        link_logo: t.data.link_logo,
                        pt_name: t.data.pt_name,
                        userid: o,
                        username: i
                    });
                }
            }), t.util.request({
                url: "entry/wxapp/UserInfo",
                cachetime: "0",
                data: {
                    user_id: o
                },
                success: function(t) {
                    console.log(t), e.setData({
                        userinfo: t.data
                    });
                }
            }), t.util.request({
                url: "entry/wxapp/YjtxList",
                cachetime: "0",
                data: {
                    user_id: o
                },
                success: function(t) {
                    console.log(t), e.setData({
                        txmx: t.data
                    });
                }
            }), t.util.request({
                url: "entry/wxapp/Earnings",
                cachetime: "0",
                data: {
                    user_id: o
                },
                success: function(t) {
                    console.log(t);
                    for (var s = 0; s < t.data.length; s++) t.data[s].time = a.ormatDate(t.data[s].time);
                    e.setData({
                        symx: t.data
                    });
                }
            });
        });
    },
    showShareModal: function() {
        this.setData({
            share_modal_active: !0,
            no_scroll: !0
        });
    },
    shareModalClose: function() {
        this.setData({
            share_modal_active: !1,
            no_scroll: !1
        });
    },
    mdmfx: function() {
        this.setData({
            share_modal_active: !1,
            no_scroll: !1,
            fwxy: !1
        });
    },
    yczz: function() {
        this.setData({
            fwxy: !0
        });
    },
    onHide: function() {},
    onUnload: function() {},
    onPullDownRefresh: function() {
        this.setData({
            havecode: 0
        }), this.onShow(), setTimeout(function() {
            wx.stopPullDownRefresh();
        }, 1500);
    },
    onReachBottom: function() {},
    onShareAppMessage: function(t) {
        return console.log(this.type), console.log(this.data.pt_name, this.data.userid, this.data.username), 
        console.log(t), "menu" !== t.from && {
            title: this.data.pt_name + "平台代理商入驻邀请",
            path: "/jy_fen/pages/fxjs/fxjs?userid=" + this.data.userid + "&type=" + this.type,
            success: function(t) {},
            fail: function(t) {}
        };
    }
});