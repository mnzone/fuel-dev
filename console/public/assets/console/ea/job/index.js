/**
 * Created by ray on 17-2-16.
 */
$(function () {

    reload()

});

function reload() {
    var params = '&start=' + _page_index;

    $.ajax({
        url: _api_host + '/ea/job/list.json?access_token=' + _access_token + params,
        type: 'get',
        jsonp: 'callback',
        dataType: 'jsonp',
        success:function (data) {
            console.log(data)
        },
        error: function (data) {
            console.log(data)
            //设置加载异常
        }
    })
    /*$.get(_api_host + '/ea/job/list.json?access_token=' + _access_token + params,
        function (data) {
            $('#btnMore').text('点击加载更多');
            if(data.status == 'err'){
                addEmptyDiv();
                return;
            }

            _totalPage = data.total_page;
            _pageIndex = parseInt(data.current_page) + 1;

            var items = data.data;
            if(items.length < 1){
                return;
            }

            for (var key in items){
                if(isNaN(key)){
                    continue;
                }

                items[key].created_date = timetodate('Y-m-d H:i:s', items[key].created_at);
                $('#items').append(item, items[key], null);
            }

        }, 'json');*/
}