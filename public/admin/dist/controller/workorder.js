/** layuiAdmin.pro-v1.2.1 LPPL License By http://www.layui.com/admin/ */
;layui.define(["table", "form", "element"], function (e) {
    var t = (layui.$, layui.admin), i = layui.view, r = layui.table, l = layui.form, o = layui.element;
    r.render({
        elem: "#LAY-app-workorder",
        url: "./json/workorder/demo.js",
        cols: [[{type: "numbers", fixed: "left"}, {
            field: "orderid",
            width: 100,
            title: "工单号",
            sort: !0
        }, {field: "attr", width: 100, title: "业务性质"}, {
            field: "title",
            width: 100,
            title: "工单标题",
            width: 300
        }, {field: "progress", title: "进度", width: 200, align: "center", templet: "#progressTpl"}, {
            field: "submit",
            width: 100,
            title: "提交者"
        }, {field: "accept", width: 100, title: "受理人员"}, {
            field: "state",
            title: "工单状态",
            templet: "#buttonTpl",
            minWidth: 80,
            align: "center"
        }, {title: "操作", align: "center", fixed: "right", toolbar: "#table-system-order"}]],
        page: !0,
        limit: 10,
        limits: [10, 15, 20, 25, 30],
        text: "对不起，加载出现异常！",
        done: function () {
            o.render("progress")
        }
    }), r.on("tool(LAY-app-workorder)", function (e) {
        e.data;
        "edit" === e.event && t.popup({
            title: "编辑工单",
            area: ["450px", "450px"],
            id: "LAY-popup-workorder-add",
            success: function (e, t) {
                i(this.id).render("app/workorder/listform").done(function () {
                    l.render(null, "layuiadmin-form-workorder"), l.on("submit(LAY-app-workorder-submit)", function (e) {
                        e.field;
                        layui.table.reload("LAY-app-workorder"), layer.close(t)
                    })
                })
            }
        })
    }), e("workorder", {})
});