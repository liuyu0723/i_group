var iGroup = iGroup || {};
iGroup.hotelHotelList = (function ($, ypGlobal) {

    var ajax = YP.ajax, tips = YP.alert, hotelList = new YP.list;

    /**
     * 初始化列表
     */
    function initHotelList() {
        hotelList.init({
            colCount: 7,
            autoLoad: true,
            listUrl: ypGlobal.listUrl,
            listDomObject: $("#dataList"),
            searchButtonDomObject: $("#searchBtn"),
            listTemplate: 'dataList_tpl',
            listSuccess: function (data) {
                hotelList.writeListData(data);
            },
            listFail: function (data) {
                tips.show('数据加载失败！');
            }
        });
    }

    /**
     * 初始化编辑新增
     */
    function initEditor() {
        // 初始化表单保存
        var detailModal = $("#editor");
        // 编辑产品
        $("#dataList").on('click', 'button[op=editDataOne]', function () {
            var $editId = $(this).data('dataid'), $dataDom = $("#dataList").find("[dataId=" + $editId + "]");
            var dataList = {};
            $dataDom.find('td').each(function (key, value) {
                var dataOne = $(value);
                if (dataOne.attr('type')) {
                    dataList[dataOne.attr('type')] = dataOne.data('value');
                }
            });
            $("#listEditor").html(template('hotelEdit_tpl', {dataList: dataList, langList: dataList.langlist}));
            detailModal.modal('show');
        });
    }

    function init() {
        initHotelList();
        initEditor();
    }

    return {
        init: init
    };
})(jQuery, YP_GLOBAL_VARS);

$(function () {
    iGroup.hotelHotelList.init();
})
