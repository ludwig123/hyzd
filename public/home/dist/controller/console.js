/** layuiAdmin.pro-v1.2.1 LPPL License By http://www.layui.com/admin/ */
;layui.define(function (e) {
    layui.use(["admin", "carousel"], function () {
        var e = layui.$, t = (layui.admin, layui.carousel), a = layui.element, i = layui.device();
        e(".layadmin-carousel").each(function () {
            var a = e(this);
            t.render({
                elem: this,
                width: "100%",
                arrow: "none",
                interval: a.data("interval"),
                autoplay: a.data("autoplay") === !0,
                trigger: i.ios || i.android ? "click" : "hover",
                anim: a.data("anim")
            })
        }), a.render("progress")
    }),




        layui.use(["admin", "carousel", "echarts"], function () {
        var pageSelf = layui.$, adminLayui = layui.admin, carousel = layui.carousel, myChart = layui.echarts, chartObjects = [], echats = [{
            // title: {text: "本月现场趋势", x: "center", textStyle: {fontSize: 14}},
            // tooltip: {trigger: "axis"},
            // legend: {data: ["", ""]},
            // xAxis: [{
            //     type: "category",
            //     boundaryGap: !1,
            //     data: data
            // }],
            // yAxis: [{type: "value"}],
            // series: [{
            //     name: "PV",
            //     type: "line",
            //     smooth: !0,
            //     itemStyle: {normal: {areaStyle: {type: "default"}}},
            //     data: []
            // }, {
            //     name: "UV",
            //     type: "line",
            //     smooth: !0,
            //     itemStyle: {normal: {areaStyle: {type: "default"}}},
            //     data: []
            // }]
        }, {
            title: {text: "访客浏览器分布", x: "center", textStyle: {fontSize: 14}},
            tooltip: {trigger: "item", formatter: "{a} <br/>{b} : {c} ({d}%)"},
            legend: {orient: "vertical", x: "left", data: ["Chrome", "Firefox", "IE 8.0", "Safari", "其它浏览器"]},
            series: [{
                name: "访问来源",
                type: "pie",
                radius: "55%",
                center: ["50%", "50%"],
                data: [{value: 9052, name: "Chrome"}, {value: 1610, name: "Firefox"}, {
                    value: 3200,
                    name: "IE 8.0"
                }, {value: 535, name: "Safari"}, {value: 1700, name: "其它浏览器"}]
            }]
        }, {
            title: {text: "最近一周新增的用户量", x: "center", textStyle: {fontSize: 14}},
            tooltip: {trigger: "axis", formatter: "{b}<br>新增用户：{c}"},
            xAxis: [{type: "category", data: ["11-07", "11-08", "11-09", "11-10", "11-11", "11-12", "11-13"]}],
            yAxis: [{type: "value"}],
            series: [{type: "line", data: [200, 300, 400, 610, 150, 270, 380]}]
        }], canvas = pageSelf("#LAY-index-dataview").children("div"), o = function (canvasNum) {
            chartObjects[canvasNum] = myChart.init(canvas[canvasNum], layui.echartsTheme)
                ,pageSelf.get('../index.php/home/statistic/monthDadui').done(function (data){chartObjects[canvasNum].setOption({
                    title: {text: "本月现场趋势", x: "center", textStyle: {fontSize: 14}},
                    tooltip: {trigger: "axis"},
                    legend: {data: ["", ""]},
                    xAxis: [{
                        type: "category",
                        boundaryGap: !1,
                        data: data[0]
                    }],
                    yAxis: [{type: "value"}],
                    series: [{
                        name: "支队",
                        type: "line",
                        smooth: !0,
                        itemStyle: {normal: {areaStyle: {type: "default"}}},
                        data: data[1]
                    }, {
                        name: "UV",
                        type: "line",
                        smooth: !0,
                        itemStyle: {normal: {areaStyle: {type: "default"}}},
                        data: []
                    }]
                }







            )})

                , adminLayui.resize(function () {
                chartObjects[canvasNum].resize()
            })
        };
        if (canvas[0]) {
            o(0);
            var d = 0;
            carousel.on("change(LAY-index-dataview)", function (e) {
                o(d = e.index)
            }), layui.admin.on("side", function () {
                setTimeout(function () {
                    o(d)
                }, 300)
            }), layui.admin.on("hash(tab)", function () {
                layui.router().path.join("") || o(d)
            })
        }
    })





        , layui.use("table", function () {
        var e = (layui.$, layui.table);
        e.render({
            elem: "#LAY-index-topSearch",
            url: "./json/console/top-search.js",
            page: !0,
            cols: [[{type: "numbers", fixed: "left"}, {
                field: "keywords",
                title: "关键词",
                minWidth: 300,
                templet: '<div><a href="https://www.baidu.com/s?wd={{ d.keywords }}" target="_blank" class="layui-table-link">{{ d.keywords }}</div>'
            }, {field: "frequency", title: "搜索次数", minWidth: 120, sort: !0}, {
                field: "userNums",
                title: "用户数",
                sort: !0
            }]],
            skin: "line"
        }), e.render({
            elem: "#LAY-index-topCard",
            url: "./json/console/top-card.js",
            page: !0,
            cellMinWidth: 120,
            cols: [[{type: "numbers", fixed: "left"}, {
                field: "title",
                title: "标题",
                minWidth: 300,
                templet: '<div><a href="{{ d.href }}" target="_blank" class="layui-table-link">{{ d.title }}</div>'
            }, {field: "username", title: "发帖者"}, {field: "channel", title: "类别"}, {
                field: "crt",
                title: "点击率",
                sort: !0
            }]],
            skin: "line"
        })
    }), e("console", {})
});