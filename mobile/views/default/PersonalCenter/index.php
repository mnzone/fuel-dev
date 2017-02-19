
    <link href="/assets/web/css/index.css" rel="stylesheet">
	  <script src="/assets/web/js/common.js"></script>
    <script src="/assets/web/js/fileUpLoad.js"></script>
    <title>个人中心</title>
    <script>
    $(function() {
        $(".anan").toggle(function() {
          $(this).next().show();
        },
        function() {
          $(this).next().hide();
        })
      })
    </script>
    <script>
    $(function() {
        $(".xin").toggle(function() {
          $(this).next().show();
        },
        function() {
          $(this).next().hide();
        })
      })

      function redrectUrl() {
        location.href = "/Index.aspx";
      }
    </script>
    <style type="text/css">/*.main table .yu1 a { font-size: 14px; font-weight: bold; height: 45px; line-height: 45px; display: block; width: 100%; } .main table .yu1 td { text-align: center; }*/</style>
    <script src="/assets/web/js/mobile_nb.js" charset="UTF-8"></script>
    <link rel="stylesheet" type="text/css" href="/assets/web/css/main.css"></head>
  
  <body>
    <div class="header">
      <div class="header_l">
        <a class="return_a" href="/Index/index">
          <img class="return_img" src="/images/newver/left_return_03.png">首页</a></div>
      <div class="header_m">个人中心</div>
      <!--<a href="/">
      <span class="get_back">退出</span>
      <span class="right_name">卢女士</span></a>  -->
    </div>
    <div class="personal_touxiang">
      <div class="kong"></div>
      <div class="touxiang_box">
        <span class="touxiang">
          <input type="file" id="file1" name="file1" style="width: 100%; height: 100%; opacity: 0; z-index: 2; position: absolute;" onchange="return uploadFiles()">
          <img src="/images/newver/touxiang.png"></span>
        <span class="customers">18622632021</span></div>
    </div>
    <!-- 
    <div class="tgfx-box" style="box-shadow: 3px 3px 3px #f18570">
      <a class="a_link" href="http://m.rrb365.com/u/tgfx/tgfx.aspx">
        <span class="nmbox_pic">
          <img src="/images/newver/personal_ico0.png"></span>
        <span class="nmbox_text">推&nbsp;广&nbsp;返&nbsp;现</span>
        <img class="changshi_arrow" src="/images/newver/right_arrow0.png">
        <span class="nmbox_text nmbox_text1" style="margin-right: .5em;">我要赚钱</span></a>
    </div>
    -->
    <ul class="mine_nmbox">
      <li>
        <a class="a_link" href="/Recruit/RecruitList">
          <span class="nmbox_pic">
            <img src="/images/newver/personal_ico1.png"></span>
          <span class="nmbox_text">招&nbsp;聘&nbsp;列&nbsp;表</span></a>
      </li>
      <li>
        <a class="a_link" href="/PersonalCenter/MyProfile">
          <span class="nmbox_pic">
            <img src="/images/newver/personal_ico3.png"></span>
          <span class="nmbox_text">我&nbsp;的&nbsp;资&nbsp;料</span></a>
      </li>
    </ul>
    <!-- <ul class="mine_nmbox">
      <li>
        <a class="a_link" href="http://m.rrb365.com/u/mInsuredUploadData.aspx">
          <span class="nmbox_pic">
            <img src="/images/newver/personal_ico4.png"></span>
          <span class="nmbox_text">上传参保资料（新参保）</span></a>
      </li>
      <li>
        <a class="a_link" href="http://m.rrb365.com/u/InsuredData.aspx">
          <span class="nmbox_pic">
            <img src="/images/newver/personal_ico5.png"></span>
          <span class="nmbox_text">填写定点医院（新参保）</span></a>
      </li>
    </ul>-->
    <ul class="mine_nmbox">
      <li>
        <a class="a_link" href="/service/identityinfo?type=1">
          <span class="nmbox_pic">
            <img src="/images/newver/personal_ico6.png"></span>
          <span class="nmbox_text">缴&nbsp;&nbsp;&nbsp;社&nbsp;&nbsp;&nbsp;保</span></a>
      </li>
      <li>
        <a class="a_link" href="/service/identityinfo?type=2">
          <span class="nmbox_pic">
            <img src="/images/newver/personal_ico7.png"></span>
          <span class="nmbox_text">缴&nbsp;公&nbsp;积&nbsp;金</span></a>
      </li>
      <!-- <li>
        <a class="a_link" href="http://m.rrb365.com/u/couponmanager/MyCoupon.aspx">
          <span class="nmbox_pic">
            <img src="/images/newver/personal_ico8.png"></span>
          <span class="nmbox_text">我的优惠券</span></a>
      </li>-->
    </ul>
    <ul class="mine_nmbox">
      <li>
        <a class="a_link" href="tel:18622632021">
          <span class="nmbox_pic">
            <img src="/images/newver/personal_ico9.png"></span>
          <span class="nmbox_text">联&nbsp;系&nbsp;客&nbsp;服</span></a>
      </li>
      <li>
        <a class="a_link" href="/PersonalCenter/ChangePassword">
          <span class="nmbox_pic">
            <img src="/images/newver/personal_ico10.png"></span>
          <span class="nmbox_text">修&nbsp;改&nbsp;密&nbsp;码</span></a>
      </li>
      <li>
        <a class="a_link" href="/PersonalCenter/mFeedback">
          <span class="nmbox_pic">
            <img src="/images/newver/personal_ico11.png"></span>
          <span class="nmbox_text">意&nbsp;见&nbsp;反&nbsp;馈</span></a>
      </li>
      <li>
        <a class="a_link" href="http://m.rrb365.com/u/AboutUs.aspx">
          <span class="nmbox_pic">
            <img src="/images/newver/personal_ico12.png"></span>
          <span class="nmbox_text">关&nbsp;于&nbsp;我&nbsp;们</span></a>
      </li>
    </ul>
    <div class="under_footer">
      <a class="tuichu" href="">退出</a></div>
    <!--尾部开始-->
    <link rel="stylesheet" href="/assets/web/css/iconfont.css">
    <div class="top_bar" style="-webkit-transform:translate3d(0,0,0);z-index:0">
      <nav>
        <ul id="top_menu" class="top_menu">
          <li>
            <a href="/Index/index" style="color: rgb(153, 153, 153);">
              <i class="icon iconfont"></i>
              <div class="top_wenzi">首页</div></a>
          </li>
          <li onclick="jQuery(&#39;.box&#39;).show()">
            <i class="icon iconfont "></i>
            <div class="top_wenzi">电话咨询</div></li>
          <li>
            <a href="#">
              <i class="icon iconfont "></i></a>
            <div class="top_wenzi">在线咨询</div></li>
          <li>
            <a href="/PersonalCenter/index" style="color: rgb(57, 201, 135);">
              <i class="icon iconfont"></i>
              <div class="top_wenzi">个人中心</div></a>
          </li>
        </ul>
      </nav>
    </div>
    <!--<div id="light">
    <ul id="menu_list2" class="menu_font" style=" display:block">
    <li class="list-1">
    <label>工作时间：每天8:00-24:00</label></li>
    <li class="list-1" style="color: #646464;border-bottom: none;">
    <a href="tel:400-862-0588" style="text-decoration: none">呼叫:400-862-0588</a></li>
    <li href="javascript:void(0)" id="closebt" class="list-1" style="margin-top: 8px">
    <label>取消</label></li>
    </ul>
    </div>-->
    <!--<div id="fade"></div>-->
    <div class="box">
      <div class="box1">
        <ul class="otherWay">
          <li>
            <a style="color:#666666;" href="tel:400-862-0588">呼叫:
              <span style="color:black;">400-862-0588</span></a>
          </li>
          <li style="color:#999999;">工作时间：每天8:00-24:00</li>
          <li onclick="jQuery(&#39;.box&#39;).hide()">取消</li></ul>
      </div>
    </div>
    <!-- 引流功能 -->
    <div class="yinliubox" style="display:none;">
      <div style="position:relative;">
        <img class="yinliu_close" onclick="closeclick()" src="/images/newver/close.png">
        <div class="yinliu">
          <img src="/images/newver/logo-footer.jpg">
          <span>3分钟手机缴社保</span>
          <div class="yinliu-nowdown">立即下载</div></div>
      </div>
    </div>
    <!-- 引流功能通过cookie 来操作 -->    
    <script>//window.onload = clickclose();
      //设置cookie
      function cookiesave(n, v, mins, dn, path) {
        if (n) {
          if (!mins) mins = 1;
          if (!path) path = "/";
          var date = new Date();
          date.setTime(date.getTime() + (mins * 60 * 1000));
          var expires = "; expires=" + date.toGMTString();
          if (dn) dn = "domain=" + dn + "; ";
          document.cookie = n + "=" + v + expires + "; " + dn + "path=" + path;
        }
      }
      //获取cookie
      function cookieget(n) {
        var name = n + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
          var c = ca[i];
          while (c.charAt(0) == ' ') c = c.substring(1, c.length);
          if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
        }
        return "";
      }
      function closeclick() {
        $('.yinliubox').css('display', 'none');
        cookiesave('closeclick', 'closeclick', '', '', '');
      }
      function clickclose() {
        if (cookieget('closeclick') == 'closeclick') {
          $('.yinliubox').css('display', 'none');
        } else {
          $('.yinliubox').css('display', 'block');
        }
      }
      </script>
    <script>$(function() {

        var url = location.href.toString().toLocaleLowerCase();
        if (url.indexOf("personalcenter") > 0) {
          $(".top_menu li a").eq(0).css('color', '#999999');
          $(".top_menu li a").eq(1).css('color', '#39C987');
        } else if (url.indexOf("index") > 0) {
          $(".top_menu li a").eq(0).css('color', '#39C987');
        }

      })</script>
   
    <!--尾部开始-->
    <script>$(function() {
        $(".xin").toggle(function() {
          $(this).find(".yu b").css('backgroundImage', 'url(/images/xxia.png)');
        },
        function() {
          $(this).find(".yu b").css('backgroundImage', 'url(/images/xyou.png)')
        })
      });

      function uploadFiles() {
        $.ajaxFileUpload({
          url: '/ajax/UploadHandler.ashx',
          secureuri: false,
          fileElementId: 'file1',
          dataType: 'text',
          data: {
            'Action': 'headportrait',
            'Type': 6,
            'UserId': '37850'
          },
          success: function(data, status) {
            if (data.indexOf("ok") > -1) {
              alert("上传成功");
              location.reload();
            } else {
              alert("上传失败");
            }
          }
        });
      }</script>
  </body>

</html>