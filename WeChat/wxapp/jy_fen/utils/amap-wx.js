function t(t) {
    this.key = t.key, this.requestConfig = {
        key: t.key,
        s: "rsx",
        platform: "WXJS",
        appname: t.key,
        sdkversion: "1.2.0",
        logversion: "2.0"
    };
}

t.prototype.getWxLocation = function(t, e) {
    wx.getLocation({
        type: "gcj02",
        success: function(t) {
            var a = t.longitude + "," + t.latitude;
            wx.setStorage({
                key: "userLocation",
                data: a
            }), e(a);
        },
        fail: function(a) {
            wx.getStorage({
                key: "userLocation",
                success: function(t) {
                    t.data && e(t.data);
                }
            }), t.fail({
                errCode: "0",
                errMsg: a.errMsg || ""
            });
        }
    });
}, t.prototype.getRegeo = function(t) {
    function e(e) {
        var s = a.requestConfig;
        wx.request({
            url: "https://restapi.amap.com/v3/geocode/regeo",
            data: {
                key: a.key,
                location: e,
                extensions: "all",
                s: s.s,
                platform: s.platform,
                appname: a.key,
                sdkversion: s.sdkversion,
                logversion: s.logversion
            },
            method: "GET",
            header: {
                "content-type": "application/json"
            },
            success: function(a) {
                var s, o, i, r, n, p, c, d, u;
                a.data.status && "1" == a.data.status ? (o = (s = a.data.regeocode).addressComponent, 
                i = [], r = "", s && s.roads[0] && s.roads[0].name && (r = s.roads[0].name + "附近"), 
                n = e.split(",")[0], p = e.split(",")[1], s.pois && s.pois[0] && (r = s.pois[0].name + "附近", 
                (c = s.pois[0].location) && (n = parseFloat(c.split(",")[0]), p = parseFloat(c.split(",")[1]))), 
                o.provice && i.push(o.provice), o.city && i.push(o.city), o.district && i.push(o.district), 
                o.streetNumber && o.streetNumber.street && o.streetNumber.number ? (i.push(o.streetNumber.street), 
                i.push(o.streetNumber.number)) : (d = "", s && s.roads[0] && s.roads[0].name && (d = s.roads[0].name), 
                i.push(d)), i = i.join(""), u = [ {
                    iconPath: t.iconPath,
                    width: t.iconWidth,
                    height: t.iconHeight,
                    name: i,
                    desc: r,
                    longitude: n,
                    latitude: p,
                    id: 0,
                    regeocodeData: s
                } ], t.success(u)) : t.fail({
                    errCode: a.data.infocode,
                    errMsg: a.data.info
                });
            },
            fail: function(e) {
                t.fail({
                    errCode: "0",
                    errMsg: e.errMsg || ""
                });
            }
        });
    }
    var a = this;
    t.location ? e(t.location) : a.getWxLocation(t, function(t) {
        e(t);
    });
}, t.prototype.getWeather = function(t) {
    function e(e) {
        var o = "base";
        t.type && "forecast" == t.type && (o = "all"), wx.request({
            url: "https://restapi.amap.com/v3/weather/weatherInfo",
            data: {
                key: a.key,
                city: e,
                extensions: o,
                s: s.s,
                platform: s.platform,
                appname: a.key,
                sdkversion: s.sdkversion,
                logversion: s.logversion
            },
            method: "GET",
            header: {
                "content-type": "application/json"
            },
            success: function(e) {
                var a, s, o;
                e.data.status && "1" == e.data.status ? e.data.lives ? (a = e.data.lives) && 0 < a.length && (a = a[0], 
                (s = {
                    city: {
                        text: "城市",
                        data: (o = a).city
                    },
                    weather: {
                        text: "天气",
                        data: o.weather
                    },
                    temperature: {
                        text: "温度",
                        data: o.temperature
                    },
                    winddirection: {
                        text: "风向",
                        data: o.winddirection + "风"
                    },
                    windpower: {
                        text: "风力",
                        data: o.windpower + "级"
                    },
                    humidity: {
                        text: "湿度",
                        data: o.humidity + "%"
                    }
                }).liveData = a, t.success(s)) : e.data.forecasts && e.data.forecasts[0] && t.success({
                    forecast: e.data.forecasts[0]
                }) : t.fail({
                    errCode: e.data.infocode,
                    errMsg: e.data.info
                });
            },
            fail: function(e) {
                t.fail({
                    errCode: "0",
                    errMsg: e.errMsg || ""
                });
            }
        });
    }
    var a = this, s = a.requestConfig;
    t.city ? e(t.city) : a.getWxLocation(t, function(o) {
        var i;
        i = o, wx.request({
            url: "https://restapi.amap.com/v3/geocode/regeo",
            data: {
                key: a.key,
                location: i,
                extensions: "all",
                s: s.s,
                platform: s.platform,
                appname: a.key,
                sdkversion: s.sdkversion,
                logversion: s.logversion
            },
            method: "GET",
            header: {
                "content-type": "application/json"
            },
            success: function(a) {
                var s, o;
                a.data.status && "1" == a.data.status ? ((o = a.data.regeocode).addressComponent ? s = o.addressComponent.adcode : o.aois && 0 < o.aois.length && (s = o.aois[0].adcode), 
                e(s)) : t.fail({
                    errCode: a.data.infocode,
                    errMsg: a.data.info
                });
            },
            fail: function(e) {
                t.fail({
                    errCode: "0",
                    errMsg: e.errMsg || ""
                });
            }
        });
    });
}, t.prototype.getPoiAround = function(t) {
    function e(e) {
        var o = {
            key: a.key,
            location: e,
            s: s.s,
            platform: s.platform,
            appname: a.key,
            sdkversion: s.sdkversion,
            logversion: s.logversion
        };
        t.querytypes && (o.types = t.querytypes), t.querykeywords && (o.keywords = t.querykeywords), 
        wx.request({
            url: "https://restapi.amap.com/v3/place/around",
            data: o,
            method: "GET",
            header: {
                "content-type": "application/json"
            },
            success: function(e) {
                var a, s, o, i;
                if (e.data.status && "1" == e.data.status) {
                    if ((e = e.data) && e.pois) {
                        for (a = [], s = 0; s < e.pois.length; s++) o = 0 == s ? t.iconPathSelected : t.iconPath, 
                        a.push({
                            latitude: parseFloat(e.pois[s].location.split(",")[1]),
                            longitude: parseFloat(e.pois[s].location.split(",")[0]),
                            iconPath: o,
                            width: 22,
                            height: 32,
                            id: s,
                            name: e.pois[s].name,
                            address: e.pois[s].address
                        });
                        i = {
                            markers: a,
                            poisData: e.pois
                        }, t.success(i);
                    }
                } else t.fail({
                    errCode: e.data.infocode,
                    errMsg: e.data.info
                });
            },
            fail: function(e) {
                t.fail({
                    errCode: "0",
                    errMsg: e.errMsg || ""
                });
            }
        });
    }
    var a = this, s = a.requestConfig;
    t.location ? e(t.location) : a.getWxLocation(t, function(t) {
        e(t);
    });
}, t.prototype.getStaticmap = function(t) {
    function e(e) {
        s.push("location=" + e), t.zoom && s.push("zoom=" + t.zoom), t.size && s.push("size=" + t.size), 
        t.scale && s.push("scale=" + t.scale), t.markers && s.push("markers=" + t.markers), 
        t.labels && s.push("labels=" + t.labels), t.paths && s.push("paths=" + t.paths), 
        t.traffic && s.push("traffic=" + t.traffic);
        var a = o + s.join("&");
        t.success({
            url: a
        });
    }
    var a, s = [], o = "https://restapi.amap.com/v3/staticmap?";
    s.push("key=" + this.key), a = this.requestConfig, s.push("s=" + a.s), s.push("platform=" + a.platform), 
    s.push("appname=" + a.appname), s.push("sdkversion=" + a.sdkversion), s.push("logversion=" + a.logversion), 
    t.location ? e(t.location) : this.getWxLocation(t, function(t) {
        e(t);
    });
}, t.prototype.getInputtips = function(t) {
    var e = this.requestConfig, a = {
        key: this.key,
        s: e.s,
        platform: e.platform,
        appname: this.key,
        sdkversion: e.sdkversion,
        logversion: e.logversion
    };
    t.location && (a.location = t.location), t.keywords && (a.keywords = t.keywords), 
    t.type && (a.type = t.type), t.city && (a.city = t.city), t.citylimit && (a.citylimit = t.citylimit), 
    wx.request({
        url: "https://restapi.amap.com/v3/assistant/inputtips",
        data: a,
        method: "GET",
        header: {
            "content-type": "application/json"
        },
        success: function(e) {
            e && e.data && e.data.tips && t.success({
                tips: e.data.tips
            });
        },
        fail: function(e) {
            t.fail({
                errCode: "0",
                errMsg: e.errMsg || ""
            });
        }
    });
}, t.prototype.getDrivingRoute = function(t) {
    var e = this.requestConfig, a = {
        key: this.key,
        s: e.s,
        platform: e.platform,
        appname: this.key,
        sdkversion: e.sdkversion,
        logversion: e.logversion
    };
    t.origin && (a.origin = t.origin), t.destination && (a.destination = t.destination), 
    t.strategy && (a.strategy = t.strategy), t.waypoints && (a.waypoints = t.waypoints), 
    t.avoidpolygons && (a.avoidpolygons = t.avoidpolygons), t.avoidroad && (a.avoidroad = t.avoidroad), 
    wx.request({
        url: "https://restapi.amap.com/v3/direction/driving",
        data: a,
        method: "GET",
        header: {
            "content-type": "application/json"
        },
        success: function(e) {
            e && e.data && e.data.route && t.success({
                paths: e.data.route.paths,
                taxi_cost: e.data.route.taxi_cost || ""
            });
        },
        fail: function(e) {
            t.fail({
                errCode: "0",
                errMsg: e.errMsg || ""
            });
        }
    });
}, t.prototype.getWalkingRoute = function(t) {
    var e = this.requestConfig, a = {
        key: this.key,
        s: e.s,
        platform: e.platform,
        appname: this.key,
        sdkversion: e.sdkversion,
        logversion: e.logversion
    };
    t.origin && (a.origin = t.origin), t.destination && (a.destination = t.destination), 
    wx.request({
        url: "https://restapi.amap.com/v3/direction/walking",
        data: a,
        method: "GET",
        header: {
            "content-type": "application/json"
        },
        success: function(e) {
            e && e.data && e.data.route && t.success({
                paths: e.data.route.paths
            });
        },
        fail: function(e) {
            t.fail({
                errCode: "0",
                errMsg: e.errMsg || ""
            });
        }
    });
}, t.prototype.getTransitRoute = function(t) {
    var e = this.requestConfig, a = {
        key: this.key,
        s: e.s,
        platform: e.platform,
        appname: this.key,
        sdkversion: e.sdkversion,
        logversion: e.logversion
    };
    t.origin && (a.origin = t.origin), t.destination && (a.destination = t.destination), 
    t.strategy && (a.strategy = t.strategy), t.city && (a.city = t.city), t.cityd && (a.cityd = t.cityd), 
    wx.request({
        url: "https://restapi.amap.com/v3/direction/transit/integrated",
        data: a,
        method: "GET",
        header: {
            "content-type": "application/json"
        },
        success: function(e) {
            if (e && e.data && e.data.route) {
                var a = e.data.route;
                t.success({
                    distance: a.distance || "",
                    taxi_cost: a.taxi_cost || "",
                    transits: a.transits
                });
            }
        },
        fail: function(e) {
            t.fail({
                errCode: "0",
                errMsg: e.errMsg || ""
            });
        }
    });
}, t.prototype.getRidingRoute = function(t) {
    var e = this.requestConfig, a = {
        key: this.key,
        s: e.s,
        platform: e.platform,
        appname: this.key,
        sdkversion: e.sdkversion,
        logversion: e.logversion
    };
    t.origin && (a.origin = t.origin), t.destination && (a.destination = t.destination), 
    wx.request({
        url: "https://restapi.amap.com/v4/direction/bicycling",
        data: a,
        method: "GET",
        header: {
            "content-type": "application/json"
        },
        success: function(e) {
            e && e.data && e.data.data && t.success({
                paths: e.data.data.paths
            });
        },
        fail: function(e) {
            t.fail({
                errCode: "0",
                errMsg: e.errMsg || ""
            });
        }
    });
}, module.exports.AMapWX = t;