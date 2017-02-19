/**
 * Created by ray on 17-2-16.
 */
$(function () {

    $("tbody").delegate('a[role="btnDel"]', 'click', function() {

        var btn = $(this);

        bootbox.confirm({
            message: "您确定要删除这个职位?",
            buttons: {
                confirm: {
                    label: "确定",
                    className: "btn-primary btn-sm",
                },
                cancel: {
                    label: "取消",
                    className: "btn-sm",
                }
            },
            callback: function(result) {
                if( ! result) {
                    return;
                }

                btn.html('<i class="fa fa-spinner fa-spin"></i> 处理中...');
                var remote = _api_host + '/ea/job.json?access_token=' + _access_token;
                remote = window.btoa(remote);

                $.ajax({
                    url: '/crossdomainproxy?remote=' + remote,
                    data:{
                        id: btn.parents('tr').attr('data-id')
                    },
                    type: 'delete',
                    dataType: 'json',
                    success:function (data) {

                        if(data.status == 'err'){
                            return
                        }

                        btn.parents('tr').remove();

                        if($('tbody tr').length < 1){
                            $('a[role=btnPrevious]').trigger('click');
                        }
                    },
                    complete: function (xhr, ts) {
                        btn.html('<i class="fa fa-trash"></i> 删除');
                    }
                })
            }
        });
    });

    $('#ckbAll').change(function () {

        var selected = $(this).is(':checked');

        $('input[name=id]').each(function () {
            $(this).prop('checked', selected);
        });
    });

    $('a[role=btnSendToWechat]').click(function () {

        var msg = '';
        var ids = get_ids('');
        if(ids == ''){
            msg = '请选择要推送的职位';
        }else if(ids.split(',').length > 9){
            msg = '由于微信限制，一次最多可以推送9个职位';
        }

        if(msg != ''){
            alert(msg);
            return;
        }

        var remote = _api_host + '/ea/job.json?access_token=' + _access_token;
        remote = window.btoa(remote);

        $.ajax({
            url: '/crossdomainproxy?remote=' + remote,
            type: 'put',
            data: {
                ids: ids
            },
            dataType: 'json',
            success:function (data) {

                if(data.status == 'err'){
                    return
                }

                $('input[name=id]:checked').each(function () {
                    $(this).parents('tr').remove();
                });

                if($('tbody tr').length < 1){
                    $('a[role=btnPrevious]').trigger('click');
                }
            }
        })
    });

    $('a[role=btnBatchDelete]').click(function () {

        var ids = get_ids('btnDel');
        if(ids == ''){
            alert('请选择要删除的职位');
            return;
        }

        var remote = _api_host + '/ea/job.json?access_token=' + _access_token;
        remote = window.btoa(remote);

        $.ajax({
            url: '/crossdomainproxy?remote=' + remote,
            type: 'delete',
            data: {
                ids: ids
            },
            dataType: 'json',
            success:function (data) {

                if(data.status == 'err'){
                    return
                }

                $('input[name=id]:checked').each(function () {
                    $(this).parents('tr').remove();
                });

                if($('tbody tr').length < 1){
                    $('a[role=btnPrevious]').trigger('click');
                }
            }
        })
    });

    $('a[role=btnBatchUpdate]').click(function () {
        var ids = get_ids('btnRefresh');
        if(ids == ''){
            alert('请选择要更新的职位');
            return;
        }

        var remote = _api_host + '/ea/job.json?access_token=' + _access_token + '&ids=' + ids;
        remote = window.btoa(remote);
        $.ajax({
            url: '/crossdomainproxy?remote=' + remote,
            data: {
                updated_at: 0
            },
            type: 'put',
            dataType: 'json',
            success:function (data) {

                if(data.status == 'err'){
                    return
                }

                $('input[name=id]:checked').each(function () {
                    $(this).parents('tr').find('a[role=btnRefresh]').html('<i class="fa fa-refresh"></i> 更新');
                });
            }
        })
    });
    
    $('a[role=txtCurrentPage]').keyup(function () {
        var val = $(this).val();
        if(isNaN(val)
           || parseInt(val) <= 1 || parseInt(val) > _total_page){
            return false;
        }

        _page_index = parseInt(val);
    });

    $('a[role=btnPrevious]').click(function () {
        if(_page_index <= 1){
            return;
        }
        _page_index --;
        reload();
    });

    $('a[role=btnNext]').click(function () {
        if(_page_index >= _total_page){
            return;
        }
        _page_index ++;
        reload();
    });

    $('a[role=btnGo]').click(function () {

        var element = $(this).parents('tr').find('input[role=txtCurrentPage]');
        //　判断输入的页码是否合法
        if(element.val() > _total_page){
            element.attr('placeholder', _total_page);
        }else if(element.val() < 1){
            element.attr('placeholder', 1);
        }else{
            element.attr('placeholder', element.val());
        }

        _page_index = parseInt(element.attr('placeholder'));
        element.val('');
        reload();
    });

    reload();
});

function reload() {

    var table = $('#items');
    table.empty().append(empty, {text: '数据加载中...'}, null);

    var params = '&start=' + _page_index;

    var remote = _api_host + '/ea/job/list.json?access_token=' + _access_token + params;
    remote = window.btoa(remote);

    $.ajax({
        url: '/crossdomainproxy?remote=' + remote,
        type: 'get',
        dataType: 'json',
        success:function (data) {

            if(data.status == 'err'){
                return;
            }

            _total_page = data.total_page;
            $('span[role=page_index]').text(data.current_page);
            $('span[role=page_total]').text(_total_page);
            $('input[role=txtCurrentPage]').attr('placeholder', data.current_page);

            table.empty();
            var items = data.data;
            if(items.length < 1){
                table.append(empty, {text: '未找到相关数据'}, null);
                return;
            }


            for(var i = 0; i < items.length; i ++){
                items[i].created_date = timetodate('Y-m-d H:i:s', items[i].created_at);
                items[i].updated_date = timetodate('Y-m-d H:i:s', items[i].updated_at);
                table.append(tr, items[i], null);
            }
        },
        complete: function (xhr, ts) {
            console.log('complate');
        },
        error: function (xhr, msg) {
            console.log('error:' + msg);
        }
    });
}

function get_ids(action) {
    if($('input[name=id]:checked').length < 1){
        return '';
    }

    var ids = '';
    $('input[name=id]:checked').each(function () {
        if(action != ''){
            $(this).parents('tr').find('a[role=' + action + ']').html('<i class="fa fa-spinner fa-spin"></i> 处理中...');
        }

        ids += $(this).val() + ',';
    });

    return ids.substr(0, ids.length - 1);
}