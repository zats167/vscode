App({
    onLaunch: function() {},
    onShow: function() {
        console.log(getCurrentPages());
    },
    onHide: function() {
        console.log(getCurrentPages());
    },
    onError: function(e) {
        console.log(e);
    },
    util: require("we7/resource/js/util.js"),
    editTabBar: function() {
        var e = this.globalData.tabbar, t = getCurrentPages(), o = t[t.length - 1], n = o.__route__;
        for (var r in 0 != n.indexOf("/") && (n = "/" + n), e.list) e.list[r].selected = !1, 
        e.list[r].pagePath == n && (e.list[r].selected = !0);
        o.setData({
            tabbar: e
        });
    },
    tabBar: {
        color: "#123",
        selectedColor: "#1ba9ba",
        borderStyle: "#1ba9ba",
        backgroundColor: "#fff",
        list: [ {
            pagePath: "/we7/pages/index/index",
            iconPath: "/we7/resource/icon/home.png",
            selectedIconPath: "/we7/resource/icon/homeselect.png",
            text: "首页"
        }, {
            pagePath: "/we7/pages/user/index/index",
            iconPath: "/we7/resource/icon/user.png",
            selectedIconPath: "/we7/resource/icon/userselect.png",
            text: "我的"
        } ]
    },
    siteInfo: require("siteinfo.js"),
    keywifiid: 0
});