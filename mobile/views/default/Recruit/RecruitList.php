	<meta name="format-detection" content="address=no;">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="format-detection" content="telephone=no">
	<!--<link href="/assets/web/css/index.css" rel="stylesheet">-->
	<link href="/assets/web/css/recruitlist.css" rel="stylesheet">
	<script src="/assets/web/js/common.js"></script>
	<style></style>
    <div class="header">
      <div class="header_l">
        <a class="return_a" href="/PersonalCenter/index">
          <img class="return_img" src="/images/newver/left_return_03.png">个人中心</a></div>
      <div class="header_m">招聘列表</div></div>
	<div class="tab_list">
		<ul class="infoList"></ul>
	</div>
    <div id="noinfo" class="dingdan_box dd_box2" style="display:none;">暂无发布信息！</div>
	<div id="tpl-content" style="display: none">
        <ul>
            <li class="item">
                <input type="hidden" value="-1" name="">
                <div class="item-shenqing-style item-shenqing">
                    <div class="shenqing-btn">申请</div></div>
                <div class="item-type">今天</div>
                <a href="/Recruit/RecruitView?" class="item-content">
                    <dl class="item-content-up">
                        <dt class="item-title"><strong></strong></dt>
                        <dd class="item-desc">
                            <span class="item-salary">8000-12000</span>
                            <span class="item-unit">元</span>
                            <span class="item-cate">普工</span></dd>
                        <dd class="item-welfare"></dd>
                    </dl>
                    <div class="item-content-down">
                        <div class="item-company content-down">
                            <i class="company-type huiyuan"></i>
                            <span class="item-companyname""></span></div>
                        <div class="item-addr content-down"></div>
                    </div>
                </a>
            </li>
        </ul>
    </div>
    <!--内容结束-->
    <div class="footer_box"></div>
    <div class="foot">Copyright©2017-2018</div>
    <script type="text/javascript">
        <?php $host = \handle\common\CacheTools::get_value('data_api_host', '');
                $token = \Session::get('access_token',null);
        ?>
        var _api_host = "<?= $host ?>";
        var _access_token = "<?= $token ?>";
    $(function(){
        NoneData();
        loadData();
    })
    function NoneData() {
        if($(".tab_list").find("li").length <1){
            $("#noinfo").show();
        }
    }

        function loadData() {
            var remote = _api_host + '/ea/job.json?access_token=' + _access_token;
            remote = window.btoa(remote);
            $.ajax({
                url: '/crossdomainproxy?remote=' + remote,
                type: 'get',
                dataType: 'json',
                success:function (data) {
                    if(data.status == 'err'){
                        return
                    }
                    var list = data.data;
                    if(list.length <=0){
                        return;
                    }
                    $("#noinfo").hide();
                    $.each(list,function (index,item) {
                        var $temp_li = $("#tpl-content").find("ul").children().clone();
                        var salary_val = item.salary_begin == item.salary_end ? item.salary_begin: item.salary_begin+" - "+item.salary_end;
                        var newDate = new Date();
                        newDate.setTime(item.created_at * 1000);
                        var date_val = newDate.getDate() == new Date().getDate() ? "今天" : newDate.format('yyyy-MM-dd');
                        var welfare_val = item.welfare_treatment == "" ? [] : item.welfare_treatment.split(',');
                        $temp_li.find(".item-type").text(date_val);
                        $temp_li.find(".item-salary").text(salary_val);
                        $temp_li.find(".item-title").find("strong").text(item.name);
                        $temp_li.find(".item-cate").text(item.job_category);
                        $temp_li.find(".item-companyname").text(item.company);
                        $temp_li.find(".item-addr").text(item.working_place);
                        $temp_li.find("a").attr("href","/Recruit/RecruitView?id="+item.id);
                        for(var i =0;i< welfare_val.length;i++){
                            $temp_li.find(".item-welfare").append('<span class="tag">'+welfare_val[i]+'</span>');
                        }
                        $(".infoList").append($temp_li);
                    });
                }
            })
        }
    </script>