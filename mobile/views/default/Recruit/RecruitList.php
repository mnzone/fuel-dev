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
		<ul class="infoList">
			<li class="item">
			  <input type="hidden" value="-1" name="kuaizhaohuodong">
			  <div class="item-shenqing-style item-shenqing">
				<div class="shenqing-btn">申请</div></div>
			  <div class="item-type">今天</div>
			  <a href="RecruitView.html" class="item-content">
				<dl class="item-content-up">
				  <dt class="item-title">
					<strong>一月8800一外地人优先</strong></dt>
				  <dd class="item-desc">
					<span class="item-salary">8000-12000</span>
					<span class="item-unit">元</span>
					<span class="item-cate">普工</span></dd>
				  <dd class="item-welfare">
					<span class="tag">五险一金</span>
					<span class="tag">包住</span>
					<span class="tag">年底双薪</span></dd>
				</dl>
				<div class="item-content-down">
				  <div class="item-company content-down">
					<i class="company-type huiyuan"></i>
					<span>上海我爱我家房地产经纪有限公司</span></div>
				  <div class="item-addr content-down">徐汇-徐家汇</div></div>
			  </a>
			</li>
			<li class="item">
			  <input type="hidden" value="-1" name="kuaizhaohuodong">
			  <div class="item-shenqing-style item-shenqing">
				<div class="shenqing-btn">申请</div></div>
			  <div class="item-type">今天</div>
			  <a href="RecruitView" class="item-content">
				<dl class="item-content-up">
				  <dt class="item-title">
					<strong>一月8800一外地人优先</strong></dt>
				  <dd class="item-desc">
					<span class="item-salary">8000-12000</span>
					<span class="item-unit">元</span>
					<span class="item-cate">普工</span></dd>
				  <dd class="item-welfare">
					<span class="tag">五险一金</span>
					<span class="tag">包住</span>
					<span class="tag">年底双薪</span></dd>
				</dl>
				<div class="item-content-down">
				  <div class="item-company content-down">
					<i class="company-type huiyuan"></i>
					<span>上海我爱我家房地产经纪有限公司</span></div>
				  <div class="item-addr content-down">徐汇-徐家汇</div></div>
			  </a>
			</li>
		</ul>
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
                        <dd class="item-welfare">
                            <span class="tag">五险一金</span>
                            <span class="tag">包住</span>
                            <span class="tag">年底双薪</span></dd>
                    </dl>
                    <div class="item-content-down">
                        <div class="item-company content-down">
                            <i class="company-type huiyuan"></i>
                            <span>上海我爱我家房地产经纪有限公司</span></div>
                        <div class="item-addr content-down">徐汇-徐家汇</div></div>
                </a>
            </li>
        </ul>
    </div>
    <!--内容结束-->
    <div class="footer_box"></div>
    <div class="foot">Copyright©2001-2016</div>
    <script type="text/javascript">
        <?php $host = \handle\common\CacheTools::get_value('data_api_host', '');
                $token = \Session::get('access_token',null);
        ?>
        var _api_host = "<?= $host ?>";
        var _access_token = "<?= $token ?>";
    $(function(){
    	if($(".tab_list").find("li").length <1){
    		$("#noinfo").show();
    	}

        loadData();
    })

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


                    console.log(data.data);
                }
            })
        }
    </script>