var iGroup = iGroup || {};
iGroup.groupUserList = (function ($, ypGlobal) {

    var ajax = YP.ajax, tips = YP.alert, userList = new YP.list, ypForm = new YP.form, ypRecord = YP.record;
    var searchButton = $("#searchBtn");

    /**
     * 初始化列表
     */
    function initList() {
        userList.init({
            colCount: 9,
            autoLoad: true,
            listUrl: ypGlobal.listUrl,
            listDomObject: $("#dataList"),
            searchButtonDomObject: searchButton,
            listTemplate: 'dataList_tpl',
            listSuccess: function (data) {
                userList.writeListData(data);
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
        ypForm.init({
            editorDom: $("#listEditor"),
            saveButtonDom: $("#saveListData"),
            checkParams: eval(ypGlobal.checkParams),
            modelDom: detailModal,
            saveBefore: function (saveParams) {
                ypForm.updateParams({
                    saveUrl: saveParams.id > 0 ? ypGlobal.updateBaseUrl : ypGlobal.createBaseUrl
                });
                saveParams = ypForm.makeRecord(saveParams, saveParams.id, saveParams.username);
                return saveParams;
            },
            saveSuccess: function (data) {
                userList.reLoadList();
            },
            saveFail: function (data) {
                tips.show(data.msg);
            }
        });
        // 新建产品
        $("#createData").on('click', function () {
            ypForm.writeEditor({
                editorDom: $("#listEditor")
            });
            $("#passwordEdit").show();
        });
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
            ypForm.writeEditor({
                editorDom: $("#listEditor"),
                writeData: dataList
            });
            $("#passwordEdit").hide();
            detailModal.modal('show');
        });
    }

    function initPermission() {
        var permissionModal = $("#permissionEditor"), permissionEditorList = $("#permissionEditorList"), savePermission = $("#savePermission");
        $("#dataList").on('click', 'button[op=editStaffPermission]', function () {
            var $editId = $(this).data('dataid'), $dataDom = $("#dataList").find("[dataId=" + $editId + "]");
            var permissionList = [];
            $.each($dataDom.find('td[type=hotelList]').data('value').toString().split(','), function (key, value) {
                if (value) {
                    permissionList.push(parseInt(value));
                }
            });
            permissionEditorList.find('[op=edit_permission]').each(function (key, value) {
                var permissionOne = $(value), permissionKey = parseInt(permissionOne.attr('value'));
                if ($.inArray(permissionKey, permissionList) >= 0) {
                    permissionOne.prop('checked', true).data('old', 1);
                } else {
                    permissionOne.prop('checked', false).data('old', 0);
                }
            });
            savePermission.data('userid', $editId);
            permissionModal.modal('show');
        });

        savePermission.on('click', function () {
            savePermission.button('loading');
            var statusInsert = [];
            var statusDelete = [];
            var permission = [];
            permissionEditorList.find('[op=edit_permission]').each(function (key, value) {
                var permissionOne = $(value);
                if (permissionOne.prop('checked')) {
                    permission.push(permissionOne.attr('value'));
                }
                if (permissionOne.prop('checked') && permissionOne.data('old') == 0) {
                    statusInsert.push(permissionOne.data('title'));
                }
                if (!permissionOne.prop('checked') && permissionOne.data('old') == 1) {
                    statusDelete.push(permissionOne.data('title'));
                }
            });
            var statusRecord = '';
            if (statusInsert.length > 0) {
                statusRecord += '增加了' + statusInsert.join(",") + ';';
            }
            if (statusDelete.length > 0) {
                statusRecord += '减少了' + statusDelete.join(",") + ';';
            }
            if (statusInsert.length == 0 && statusDelete.length == 0) {
                savePermission.button('reset');
                permissionModal.modal('hide');
                return false;
            }
            var saveParams = {};
            saveParams.id = savePermission.data('userid');
            saveParams.hotelList = permission.join(',');
            recordLog = ypRecord.getCreateLog({
                modelName: '管理员权限',
                value: statusRecord
            });
            saveParams[YP_RECORD_VARS.recordPostId] = saveParams.id;
            saveParams[YP_RECORD_VARS.recordPostVar] = recordLog;

            var xhr = ajax.ajax({
                url: YP_GLOBAL_VARS.updateUrl,
                type: "POST",
                data: saveParams,
                cache: false,
                dataType: "json",
                timeout: 10000
            });
            xhr.done(function (data) {
                savePermission.button('reset');
                permissionModal.modal('hide');
                userList.reLoadList();
            }).fail(function (data) {
                tips.show(data.msg);
                savePermission.button('reset');
            });
        });
    }

    function init() {
        initList();
        initEditor();
        initPermission();
    }

    return {
        init: init
    };
})(jQuery, YP_GLOBAL_VARS);

$(function () {
    iGroup.groupUserList.init();
})
