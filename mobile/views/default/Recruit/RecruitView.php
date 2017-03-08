
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">    
	<meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width">
	<meta name="format-detection" content="telephone=no">
	<meta name="format-detection" content="email=no">
	<meta name="format-detection" content="address=no;">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="format-detection" content="telephone=no">
	<link href="/assets/web/css/index.css" rel="stylesheet">
	<link href="/assets/web/css/recruitview.css" rel="stylesheet">
	<script src="/assets/web/js/common.js"></script>    
    <div class="header">
      <div class="header_l">
        <a class="return_a" href="/PersonalCenter/index">
          <img class="return_img" src="/images/newver/left_return_03.png">个人中心</a></div>
      <div class="header_m">招聘详情</div></div>
    <!--内容开始-->
    <div class="tab_list infoList">
			<div class="detail_w" id="nav1">
              <section class="tit_area job_q bbOnepx">
                <h1>
                  <span id="d_title" class="d_title"></span>
                  <span class="d_titico">名企</span>
                </h1>
                <div class="price">
                  <span class="pay" ismoney="true"></span>
                  <span class="pay_yy">元/月</span></div>
                <div class="stats_bar">
                  <div class="pub_date">
                    <span>发布：</span>
                    <span></span>
                  </div>
                  <div class="browse_num">
                    <span>浏览：</span>
                    <span id="totalcount"></span>
                    <span>人</span>
                  </div>
                </div>
                <a onclick="Favorites()" class="collect btn_Favorite" tongji_tag="m_detail_job_full_favourite">
                  <span>收藏</span></a>
              </section>
		  <section class="job_con">
			<ul><li class="postion_">
				<span class="attrName">职位：</span>
				<span class="attrValue"><a target="_blank">普工</a></span>
			  </li>
			  <li class="req">
				<span class="attrName">要求：</span>
				<span class="attrValue">招999人/学历不限/经验不限,可接受应届生</span></li>
			  <li class="addr_">
				<span class="attrName">地点：</span>
				<span class="attrValue dizhiValue">
				  <a>上海</a>
				  <a class="position"></a>
				</span>
			  </li>
			  <li class="fuli attrName">
				<span class="fuliname">福利：</span>
				<div class="fulivalue attrValue">
				</div>
			  </li>
			</ul>
			<div style="text-align: center;">
				<a href="javascript:;" class="apply" id="contact_apply2">申请职位</a>
				<!-- <a href="javascript:;" class="share" tongji_tag="m_detail_job_full_share">分享</a></section>-->
			</div>
		</div>
	</div>
    <!--  联系人 -->
	<section class="company">
	  <div class="com">
	    <div class="comWrap">
	      <h2 class="c_tit">
	        <a onclick="TargetWeb()" class="company-name">昌硕科技（上海）有限公司</a></h2>
	      <div class="renzheng">
	        <span class="tip_01">营业执照已认证</span>
	        <span class="tip_01">实名已认证</span></div>
	      <div class="contact">
	        <span>联系人：</span>
	        <span>DL管理部</span></div>
	    </div>
	    <div class="phoneWrap">
	      <a href="javascript:;" id="contact_phone" class="phone num_protect">
	        <span>电话</span></a>
	    </div>
	  </div>
	  <a href="javascript:;" class="open_mes btOnepx btOneOpenpx" id="companyShow">展开信息</a>
	</section>
    <!-- 招聘单位信息简介 -->
	<section class="dcompany_open" id="openCom" style="display: none;">
	  <div class="com">
	    <div class="comWrap">
	      <h2 class="c_tit">
	        <a class="company-name"></a></h2>
	      <div class="renzheng">
	        <span class="tip_01">营业执照已认证</span>
	        <span class="tip_01">实名已认证</span></div>
	      <div class="contact">
	        <span>联系人：</span>
	        <span>DL管理部</span></div>
	    </div>
	    <div class="phoneWrap">
	      <a href="javascript:;" id="contact_phone" class="phone num_protect">
	        <span>电话</span></a>
	    </div>
	  </div>
	  <div class="company_con btOnepx">
	    <ul></ul>
	  </div>
	  <a href="javascript:;" class="close_mes btOnepx btOneClosepx" id="companyHide">收起信息</a>
	</section>
	<!-- 岗位信息介绍 -->
	<section class="pos">
		<div class="position_dis">
		  	<div class="tit bbOnepx"><h2>职位简介</h2></div>
            <!--自定义职位简介-->
			<div class="dis_con" style="max-height: 89px;"></div>
		</div>
	    <div class="more_wrap">
		  <a href="javascript:;" class="see_more_pos open_mes">展开信息</a>
		</div>
	</section>
    <!-- 招聘信息结束end -->
    <div id="noinfo" class="dingdan_box dd_box2" style="display:none;">暂无发布信息！</div>
    <!--内容结束-->
    <div class="footer_box"></div>
    <div class="foot">Copyright©2017-2018</div>
    <script type="text/javascript">
        <?php $host = \handle\common\CacheTools::get_value('data_api_host', '');
        $token = \Session::get('access_token',null);
        ?>
        var _api_host = "<?= $host ?>";
        var _access_token = "<?= $token ?>";
        var _id = "<?= \Input::get("id",0) ?>";
        var _glData = {};
    $(function(){
        loaddata();
    	//if($(".tab_list").find("li").length <1){
    	//	$("#noinfo").show();
    	//}
        $('#contact_apply2').click(function(){
            var remote = _api_host + '/ea/candidate?access_token=' + _access_token;
            remote = window.btoa(remote);
            var param = {
                name : _glData.name,
                gender: 'NONE',
                education: 0,//我的学历
                job_id : _id,//
                identity:'410527199111097759',//身份证
                cellphone:'188622632021',//电话号码
                nickname:'mmm',//昵称
                portrait:''//头像
            };
            $.ajax({
                url: '/crossdomainproxy?remote=' + remote,
                type: 'post',
                data: param,
                dataType: 'json',
                success: function (data) {
                    if (data.status == 'err' || data.status == 'error') {
                    }
                }
            });
        });

    	$('.btOneOpenpx').click(function(){
    		tabArea("#openCom",".company");
    	})
    	$('.btOneClosepx').click(function(){
    		tabArea(".company","#openCom");
    	})
    	$('.see_more_pos').click(function(){
    		if($(this).text() == "展开信息"){
    			$(".dis_con").attr("style","min-height:none;")
    			$(this).text("收起信息");
    		}else{
    			$(".dis_con").attr("style","max-height:89px;")
    			$(this).text("展开信息");
    		}
    	})
    })
    function tabArea(showSeleter,hideSeleter){
    	$(showSeleter).show();
    	$(hideSeleter).hide();
    }
    function loaddata(id_) {
        var remote = _api_host + '/ea/job/item.json?access_token=' + _access_token+'&id='+_id;
        remote = window.btoa(remote);
        $.ajax({
            url: '/crossdomainproxy?remote=' + remote,
            type: 'get',
            dataType: 'json',
            success:function (data) {
                if(data.status == 'err' || data.status == 'error'){
                    //隐藏页面
                    return
                }
                if(data.data == null){
                    //隐藏页面
                    return;
                }
                var item = data.data;
                _glData = data.data;
                var salary_val = item.salary_begin == item.salary_end ? item.salary_begin: item.salary_begin+" - "+item.salary_end;
                var newDate = new Date();
                newDate.setTime(item.created_at * 1000);
                var date_val = newDate.getDate() == new Date().getDate() ? "今天" : newDate.format('yyyy-MM-dd');
                var welfare_val = item.welfare_treatment == "" ? [] : item.welfare_treatment.split(',');
                $("#d_title").text(item.name);
                $('#nav1').find(".d_titico").text('名企');
                $('#nav1').find(".price").text(salary_val);
                //$(".pay_yy").text('元/月');
                $('#nav1').find(".pub_date").find('span').eq(1).text(date_val);
                $('#nav1').find('.browse_num').find("#totalcount").text(item.number);
                $('.job_con').find(".attrValue").find("a").text('普工')
                $('.job_con').find('.postion_').find('.attrValue').text(item.name)
                $('.job_con').find('.req').find('.attrValue').text('招'+item.number+'人/'+item.education+'/'+item.experience)
                $('.job_con').find('.addr_').find('.attrValue').text(item.working_place);
                var $li = $('.job_con').find('.fuli').find('.fulivalue');
                for(var i =0;i< welfare_val.length;i++){
                    $li.append('<span><i></i>'+welfare_val[i]+'</span>')//福利Tag
                }
                companyInfo('company',item);//收缩信息
                companyInfo('company_open',item);//展开信息
                $('.pos').find('.dis_con').html('<p>公司薪资直发，保证自身利益<br>大年初四招聘，直接找好工作<br>公司地址：<br>上海市浦东新区康桥镇秀沿路3668号（5号门）—昌硕科技（上海）有限公司<br>面试时间：08：00—14：00<br>面试方法：到达昌硕5号门（秀沿路3668号）“昌硕免费直招处-面试通道”找穿着印有PEGATRON招募红色马甲工作人员面试<br>薪资待遇<br>1、综合工资：4000—4500<br>2、薪资架构：岗位工资（2320元）+其他福利（80—210元）+综合绩效奖金（100—300元）+加班费；<br>&zwj;3、平时加班20.00元/小时；周末加班26.67元/小时；国定假日加班40.00元/小时；<br>4、夜班津贴9元/天；<br>5、年终奖金——每年春节前按当年度工作绩效及整体贡献发放年终奖。<br>注：综合绩效奖金（100—300元）仅在线员工享有！<br>线路一：上海南站或上海火车站<br>乘坐地铁1号线到徐家汇-转11号线到康新公路站下车<br>线路二：上海虹桥火车站<br>乘坐地铁2号线到江苏路-转11号线到康新公路站下车<br>路线1：11号地铁康新公路地铁站1号出口向东直行100米到昌硕2号门，请电话联系我们接待！<br>路线2：11号地铁康新公路地铁站1号出口向西直行100米右转，直行800米右转直行100米到达昌硕3668大门“昌硕免费直招处-面试通道”找穿着印有PEGATRON招募红色马甲工作人员面试<br>温馨提示: 来公司路途中工作人员不办理任何接待手续，谨防上当受骗！<br>福利待遇<br>1、保险：公司依法为公司正式员工缴纳社会保险；<br>2、休假：员工享受法定节假日、婚假、丧假、产假、带薪年休假；<br>3、贴心的福利：生日礼券；<br>4、活动：球类比赛、艺文表演；<br>5、便利设施：室内篮(羽)球场、网吧、图书馆、便利商店、邮局、各式美食餐厅等。<br>招聘条件<br>1、男女：年满18周岁(含)以上，初中以上学历；<br>2、认真学习、遵守企业规章制度，可尽快融入企业氛围；<br>3、持二代有效身份证件。<br>岗位工作职责<br>工作内容：主要从事高科技电子产品的生产；<br>工作时间：每周工作5天，每天8小时工作制，超出部分以加班计算<br>其他说明：公司设有夜班，部分岗位为站立式作业<br>餐饮住宿<br>餐饮：公司园区设有八大菜系，如：鲁、川、粤、闽、苏、浙、湘、徽等菜系；(另有：德克士，超级鸡车，拉面，烩面，烧烤，煎饼，麻辣烫，沙县小吃等美食小吃街)<br>宿舍环境：员工当天面试安排住宿，宿舍8人间，宿舍区设有空调、风扇、24小时饮用水、独立卫浴、衣柜、影视厅、自动售卖机等方便员工生活。<br>友情提示！<br>车站旁边，行骗之人较多，请注意保管自己的财物！不要随便跟陌生人交谈。到站后，请按照我们指定的路线到达公司<br>祝您：一路顺风、工作愉快！<br>请勿听信中介忽悠，以免上当受骗！</p>')
            }});


    }
    //绑定公司信息
    function companyInfo(className,value){
        $('.'+className).find('.company-name').text(value.company)
        $('.'+className).find('.renzheng').append('<span class="tip_01">营业执照已认证</span>')
        $('.'+className).find('.renzheng').append('<span class="tip_01">实名已认证</span>')
        $('.'+className).find('.contact').append('<span>DL管理部</span>')
        $('.'+className).find('#contact_phone').attr('data-phone',"18622632021")

        if(className == "company_open"){
            var $p_ul = $('company_open').find('.company_con').find('ul');
            $p_ul.append('<li><span class="attrName">规模：</span><span class="attrValue">1000人以上</span></li>');
            $p_ul.append('<li><span class="attrName">性质：</span><span class="attrValue">上市公司</span></li>');
            $p_ul.append('<li><span class="attrName">行业：</span><span class="attrValue"><a>计算机硬件+电子技术/半导体/集成电路+多元化集团</a></span></li>');
            $p_ul.append('<li><span class="attrName">地址：</span><span class="attrValue">海市浦东新区康桥镇秀沿路3668号昌硕科技上海有限公司</span></li>');
            $p_ul.append('')//自定义公司简介
            //<a><img class="c_logo" src="http://pic.58.com/enterprise/mingqi/n_v1bkuymc4to2ufkjmdhqoa_160_120.jpg"></a>
            //<p>昌硕科技（上海）有限公司座落于上海浦东新区康桥工业园,占地面积3200 亩。于2004年9月于2004年9月投资成立，总投资6.27亿美元，母公司和硕联合科技股份有限公司。昌硕科技（上海）有限公司主要从事平板计算机、手机等高科技电子产品的研发与制造业务。昌硕科技自2006年正式投产以来，呈现稳步发展之态，产值及出口额逐年上升。2012年出口额153亿美金，产值966亿人民币，位居全国出口200强企业第4位，上海市排名第2位，浦东新区排名第1位，2014年位居《财富》全球500强第375位。
            //<br>昌硕科技（上海）有限公司本着培育、珍惜、关怀员工、让同仁尽情地发挥最高潜力的人才理念，坚守诚信、勤俭、崇本、务实的正道，无止境地追求世界第一的品质、速度、服务、创新、成本，跻身世界级的高科技领导群。
            //<br>我们相信人才是企业发展最核心的因素，我们欢迎崇本务实的有识之士加入昌硕，我们愿意成为您职业生涯的起跑线，在上海这个国际化的大都市，让和硕与您的梦想共同启航！</p>
        }
    }

    //收藏
    function Favorites(){

    }
    </script>