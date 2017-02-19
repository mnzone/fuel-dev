<style>
    td .label{
        display: block;
        margin-top: 2px;
    }
</style>
<script src="/assets/web/js/common.js"></script>
<script src="/assets/web/js/jquery.simplesidebar.js"></script>
<script src="/assets/web/js/mobile_nb.js" charset="UTF-8"></script>
<link rel="stylesheet" type="text/css" href="/assets/web/css/main.css" />
<!--banner-->
    <div class="wrapper" style="margin-top:0;">
        <div class="main">
            <div class="pro-switch">
                <div class="slider">
                    <div class="flexslider">
                        
                        <div class="flex-viewport" style="overflow: hidden; position: relative;">
                            <ul class="slides" style="width: 1200%; transition-duration: 0.4s; transform: translate3d(-1500px, 0px, 0px);">
                                <li class="clone" style="width: 375px; float: left; display: block;">
                                    <div class="img">
                                        <a class="banner_a" href="http://m.rrb365.com/" title="领先互联网社保代缴平台">
                                            <img src="/uploads/testimage/201610251838382.jpg" height="200" width="460">
                                        </a>
                                    </div>
                                </li>
                                <li class="" style="width: 375px; float: left; display: block;">
                                    <div class="img">
                                        <a class="banner_a" href="http://m.rrb365.com/u/mNewsDetail.aspx?nid=4566" title="人人保与您“约惠”元宵节、情人节">
                                            <img src="/uploads/testimage/201702130945182.jpg" height="200" width="460">
                                        </a>
                                    </div>
                                </li>
                                <li class="" style="width: 375px; float: left; display: block;">
                                  <div class="img">
                                    <a class="banner_a" href="http://m.rrb365.com/" title="五险一金代缴首选人人保">
                                      <img src="/uploads/testimage/201610111652042.png" height="200" width="460"></a>
                                  </div>
                                </li>
                                <li class="" style="width: 375px; float: left; display: block;">
                                  <div class="img">
                                    <a class="banner_a" href="http://m.rrb365.com/" title="客户心声">
                                      <img src="/uploads/testimage/201603090957541.jpg" height="200" width="460"></a>
                                  </div>
                                </li>
                                <li class="flex-active-slide" style="width: 375px; float: left; display: block;">
                                  <div class="img">
                                    <a class="banner_a" href="http://m.rrb365.com/" title="领先互联网社保代缴平台">
                                      <img src="/uploads/testimage/201610251838382.jpg" height="200" width="460"></a>
                                  </div>
                                </li>
                                <li class="clone" style="width: 375px; float: left; display: block;">
                                  <div class="img">
                                    <a class="banner_a" href="http://m.rrb365.com/u/mNewsDetail.aspx?nid=4566" title="人人保与您“约惠”元宵节、情人节">
                                      <img src="/uploads/testimage/201702130945182.jpg" height="200" width="460"></a>
                                  </div>
                                </li>
                            </ul>
                        </div>
                        <ol class="flex-control-nav flex-control-paging">
                          <li>
                            <a class="">1</a></li>
                          <li>
                            <a class="">2</a></li>
                          <li>
                            <a class="">3</a></li>
                          <li>
                            <a class="flex-active">4</a></li>
                        </ol>
                        <ul class="flex-direction-nav">
                          <li>
                            <a class="flex-prev" href="http://m.rrb365.com/#">Previous</a></li>
                          <li>
                            <a class="flex-next" href="http://m.rrb365.com/#">Next</a></li>
                        </ul>
                    </div>
                </div>
        </div>

    </div>
    <div class="new_header" style="display:none;">
        <div class="rrb_logo">
            <img src="/images/newver/logo_02.png">
        </div>
        <div class="user_box" id="userBox" style="display: block;">
            <a class="log_in pointer" href="http://m.rrb365.com/login.aspx">
                <img src="/images/newver/a_button_03.png">
            </a>
            <a class="regist pointer" href="http://m.rrb365.com/registered.aspx">
                <img src="/images/newver/a_button_05.png">
            </a>
        </div>
        <div class="logined" id="logined" style="display: none;">
           <a class="lv_geren" href="http://m.rrb365.com/u/PersonalCenter.aspx" style="color:#666;">
          你好,
          <span style="color:#39c987;" id="relName">name</span>
       </a>
        </div>
    </div>

</div>
    <script src="/assets/web/js/lanrenzhijia.js"></script>
    <script>
        $(document).ready(function () {
            //判断是否登陆  登陆显示“你好 XXX” 
            document.getElementById("userBox").style.display = "block";
            document.getElementById("logined").style.display = "none";
            var u = $("#hfUserId").val();
            if (u != "-1") {
                document.getElementById("userBox").style.display = "none";
                document.getElementById("logined").style.display = "block";
                $("#relName").text($("#hfUserId").val());
            } else {
                document.getElementById("userBox").style.display = "block";
                document.getElementById("logined").style.display = "none";
            }
            //end

            $.ajaxSetup({
                cache: false
            });
            $('.sidebar').simpleSidebar({
                settings: {
                    opener: '#open-sb',
                    wrapper: '.wrapper',
                    animation: {
                        duration: 500,
                        easing: 'easeOutQuint'
                    }
                },
                sidebar: {
                    align: 'right',
                    width: "35vw",
                    closingLinks: 'a',
                }
            });
        });
        $(function () {
            $('.flexslider').flexslider({
                animation: "slide",
                start: function (slider) {
                    $('body').removeClass('loading');
                }
            });
        });
        $(function () {
            var speed = 400;//滚动速度
            var h = document.documentElement.clientWidth;
            //回到顶部
            $(".topp").click(function () {
                $('html,body').animate({
                    scrollTop: '0px'
                }, speed);
            });
        });
    </script>
    <!--banner_end-->

    <!--new_business-->
    <ul class="new_business">
        <li>
            <a class="lianjie" href="/service/identityinfo?type=1">
                <img src="/images/newver/new_ico1_04.png">
                <span>缴社保</span>
            </a>
        </li>
        <li>
            <a class="lianjie" href="/service/identityinfo?type=2">
                <img src="/images/newver/new_ico1_06.png">
                <span>缴公积金</span>
            </a>
        </li>
        <li>
            <a class="lianjie" href="/service/AgencyService">
                <img src="/images/newver/new_ico1_08.png">
                <span>代办服务</span>
            </a>
        </li>
        
    </ul>
    <!--new_zixun-->
    <div class="new_zixun" style="display:none;">
        <div class="new_contain">
            <img src="/images/newver/new_phone_09.png">
            <span>400-862-0588</span>
        </div>
        <div class="youwenti">有问题还在问度娘？专家在线为您解答</div>
        <a class="zixun_btn" href="tel:4008620588">立即咨询</a>
    </div>
    <!--fuwufei-->
    <ul class="new_fuwufei" style="border-top:5px solid #dddddd;">
        <li class="border_t_no border_l_no">
            <img class="tuijian" src="/images/newver/tuijian_02.png">
            <a href="/Articcle/CustomArticle?type=1" class="jiaoshebao">
                <span class="neirong">
                    <img src="/images/newver/tuijian_05.png">
                    <span>医疗保险</span>
                </span>
                <span class="feiyong_btn">￥0</span>
            </a>
        </li>
        <li class="border_t_no border_r_no border_l_no">
            <a href="/Articcle/CustomArticle?type=2" class="jiaoshebao">
                <span class="neirong" style="width: 60%;">
                    <img src="/images/newver/tuijian_07.png">
                    <span>养老保险</span>
                </span>
                <span class="feiyong_btn">￥0</span>
            </a>
        </li>
        <li class="border_t_no border_b_no border_l_no">
            <a href="/Articcle/CustomArticle?type=3" class="jiaoshebao">
                <span class="neirong">
                    <img src="/images/newver/tuijian_13.png">
                    <span>工商保险</span>
                </span>
                <span class="feiyong_btn">￥0</span>
            </a>
        </li>
        <li class="border_t_no border_b_no border_r_no border_l_no">
            <a href="/Articcle/CustomArticle?type=4" class="jiaoshebao">
                <span class="neirong">
                    <img src="/images/newver/tuijian_16.png">
                    <span>失业保险</span>
                </span>
                <span class="feiyong_btn">￥0</span>
            </a>
        </li>
    </ul>


    <div class="sbcs_box">

        <ul class="new_changshi_box">
            <li class="changshi">
<a href="http://m.rrb365.com/u/mNewsDetail.aspx?nid=4566" class="shebao">
 <span class="text_a">【超强福利】元宵节&amp;情人节,别只顾自己</span>
   <img class="changshi_arrow" src="/images/newver/right_arrow2.png">
</a></li>
<li class="changshi">
<a href="http://m.rrb365.com/u/mNewsDetail.aspx?nid=4554" class="shebao">
 <span class="text_a">外地缴纳住房公积金可以在北京购房吗？</span>
   <img class="changshi_arrow" src="/images/newver/right_arrow2.png">
</a></li>
<li class="changshi">
<a href="http://m.rrb365.com/u/mNewsDetail.aspx?nid=4553" class="shebao">
 <span class="text_a">医疗保险断缴怎么办？断缴有什么影响？</span>
   <img class="changshi_arrow" src="/images/newver/right_arrow2.png">
</a></li>
<li class="changshi">
<a href="http://m.rrb365.com/u/mNewsDetail.aspx?nid=4552" class="shebao">
 <span class="text_a">干货！换工作养老保险怎么办？</span>
   <img class="changshi_arrow" src="/images/newver/right_arrow2.png">
</a></li>
<li class="changshi">
<a href="http://m.rrb365.com/u/mNewsDetail.aspx?nid=4551" class="shebao">
 <span class="text_a">人人保新年给力狂欢，优惠券抵现金啦！</span>
   <img class="changshi_arrow" src="/images/newver/right_arrow2.png">
</a></li>
<li class="changshi">
<a href="http://m.rrb365.com/u/mNewsDetail.aspx?nid=4545" class="shebao">
 <span class="text_a">公司不缴纳失业保险怎么办？</span>
   <img class="changshi_arrow" src="/images/newver/right_arrow2.png">
</a></li>
<li class="changshi">
<a href="http://m.rrb365.com/u/mNewsDetail.aspx?nid=4544" class="shebao">
 <span class="text_a">男职工缴纳生育保险，能享受生育保险待</span>
   <img class="changshi_arrow" src="/images/newver/right_arrow2.png">
</a></li>

        </ul>
        <input name="hfUserId" type="hidden" id="hfUserId" value="-1">
    </div>

    <link rel="stylesheet" href="/assets/web/css/iconfont.css">
<div class="top_bar" style="-webkit-transform:translate3d(0,0,0);z-index:0">
    <nav>
        <ul id="top_menu" class="top_menu">
            <li>
                <a href="/Index/index" style="color:#39C987;">
                    <i class="icon iconfont"></i>
                    <div class="top_wenzi">首页</div>
                </a>
            </li>
            <li onclick="jQuery(&#39;.box&#39;).show()">
                <i class="icon iconfont "></i>
                <div class="top_wenzi">电话咨询</div>
            </li>
            <li>
                <a href="#"><i class="icon iconfont "></i></a>
                <div class="top_wenzi">在线咨询</div>
            </li>
            <li>
                <a href="/PersonalCenter/index">
                    <i class="icon iconfont"></i>
                    <div class="top_wenzi">个人中心</div>
                </a>
            </li>
        </ul>
    </nav>

</div>
<!--<div id="light">
    <ul id="menu_list2" class="menu_font" style=" display:block">
        <li class="list-1">
            <label>工作时间：每天8:00-24:00</label>
        </li>
        <li class="list-1" style="color: #646464;border-bottom: none;">
            <a href="tel:400-862-0588" style="text-decoration: none">呼叫:400-862-0588</a>
        </li>
        <li href="javascript:void(0)" id="closebt" class="list-1" style="margin-top: 8px">
            <label>取消</label>
        </li>
    </ul>
</div>-->
<!--<div id="fade"></div>-->
<div class="box">
    <div class="box1">
        <ul class="otherWay">
            <li><a style="color:#666666;" href="tel:400-862-0588">呼叫: <span style="color:black;">400-862-0588</span> </a></li>
            <li style="color:#999999;">工作时间：每天8:00-24:00</li>
            <li onclick="jQuery(&#39;.box&#39;).hide()">取消</li>
        </ul>
    </div>
</div>


<!-- 引流功能 -->
<div class="yinliubox" style="display:none;">
    <div style="position:relative;">
        <img class="yinliu_close" onclick="closeclick()" src="/images/newver/close.png">
        <div class="yinliu">
            <img src="/images/newver/logo-footer.jpg">
            <span>3分钟手机缴社保</span>
            <div class="yinliu-nowdown">立即下载</div>
        </div>
    </div>
    
</div>

<!-- 引流功能通过cookie 来操作 -->
<script>
    //window.onload = clickclose();
    //设置cookie
    function cookiesave(n, v, mins, dn, path) {
        if (n) {
            if (!mins) mins =1;
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
   

    //$('.yinliu_close').click(function () {
    //    $('.yinliubox').css('display', 'none');
    //    $('.top_bar').css('display', 'block');
    //})
</script>

<script>
    $(function () {
        
        var url = location.href.toString().toLocaleLowerCase();
        if (url.indexOf("personalcenter") > 0) {
            $(".top_menu li a").eq(0).css('color', '#999999');
            $(".top_menu li a").eq(1).css('color', '#39C987');
        } else if (url.indexOf("index") > 0) {
            $(".top_menu li a").eq(0).css('color', '#39C987');
        }

    })
</script>
<div data-ssbplugin="mask" style="background-color: black; opacity: 0.5; position: fixed; overflow: hidden; top: -200px; right: -200px; left: -200px; bottom: -200px; z-index: 2999; display: none;"></div>