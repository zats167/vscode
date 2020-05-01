var a = getApp(), t = require("../../../utils/util.js");

Page({
    data: {
        is_rz: 0,
        list: [],
        pagenum: 1,
        pagesize: 5
    },
    onLoad: function(e) {
        var s = this;
        t.huanfu(s, function(a) {
            s.setData({
                system: a,
                ggcjwt: a.ggcjwt
            });
        }), a.util.request({
            url: "entry/wxapp/Url3",
            cachetime: "0",
            success: function(a) {
                s.setData({
                    url3: a.data
                });
            }
        });
    },
    dataIni: function() {
        var a = this;
        a.data.pagenum = 1, a.data.list = [], a.data.isload = !0, a.data.isloadtis = !0, 
        a.setData({
            loadstaue: !1
        }), a.getmx();
    },
    reload: function(t) {
        var e = this;
        e.data.pagenum = 1, e.data.list = [], e.data.isload = !0, e.data.isloadtis = !0, 
        e.setData({
            loadstaue: !1
        }), a.util.request({
            url: "entry/wxapp/MyggruZhu",
            cachetime: "0",
            data: {
                user_id: e.uid
            },
            success: function(t) {
                console.log("MyggruZhu", t), t.data ? "1" == t.data.state ? e.setData({
                    is_rz: 1
                }) : "2" == t.data.state ? e.setData({
                    is_rz: 2
                }) : "3" == t.data.state && e.setData({
                    is_rz: 3
                }) : e.setData({
                    is_rz: 4
                }), 2 == t.data.state && (e.setData({
                    ggmodel: t.data
                }), a.util.request({
                    url: "entry/wxapp/userggfknum",
                    cachetime: "0",
                    data: {
                        ggzid: t.data.id
                    },
                    success: function(a) {
                        console.log("234", a.data), e.setData({
                            ufk: a.data.count
                        });
                    }
                }), a.util.request({
                    url: "entry/wxapp/myggnum",
                    cachetime: "0",
                    data: {
                        ggzid: t.data.id
                    },
                    success: function(a) {
                        console.log("234", a.data), e.setData({
                            mygg: a.data.count
                        });
                    }
                }), a.util.request({
                    url: "entry/wxapp/userdjggsum",
                    cachetime: "0",
                    data: {
                        ggzid: t.data.id
                    },
                    success: function(a) {
                        console.log("234", a.data), e.setData({
                            udj: a.data.count
                        });
                    }
                }), e.ggid = t.data.id, e.getmx());
            }
        });
    },
    getmx: function() {
        var e = this;
        e.data.isload ? a.util.request({
            url: "entry/wxapp/userdjgglist",
            cachetime: "0",
            data: {
                ggzid: e.ggid,
                pagesize: e.data.pagesize,
                page: e.data.pagenum
            },
            success: function(a) {
                a.data.length < e.data.pagesize ? e.data.isload = !1 : e.data.pagenum += 1;
                for (var s = 0; s < a.data.length; s++) a.data[s].time = t.ormatDate(a.data[s].time);
                0 != a.data && (e.data.list = e.data.list.concat(a.data)), e.setData({
                    loadstaue: !0,
                    list: e.data.list
                });
            }
        }) : e.setData({
            loadstaue: !0,
            isloadtis: !1,
            loadtis: "下拉到底啦"
        });
    },
    tel_tap: function() {
        wx.makePhoneCall({
            phoneNumber: this.data.system.tel
        });
    },
    select: function(a) {
        wx.navigateTo({
            url: "prise"
        });
    },
    onReady: function() {},
    onShow: function() {
        var a = this;
        t.login(function(t) {
            console.log(t), a.uid = t.id, a.setData({
                usersinfo: t
            }), a.reload();
        });
    },
    onHide: function() {},
    onUnload: function() {},
    onPullDownRefresh: function() {
        this.dataIni(), setTimeout(function() {
            wx.stopPullDownRefresh();
        }, 1500);
    },
    onReachBottom: function() {
        this.setData({
            loadstaue: !1
        }), this.getmx();
    },
    onShareAppMessage: function() {}
});