<!DOCTYPE html>
<html class="no-js" lang="zh-CN" dir="ltr">                        
<head>
    <title><?php echo $title ? $title: '';?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=9" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <!-- 通用 -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <link href="/assets/web/css/index.css" rel="stylesheet">
    <script src="/assets/js/jquery.min.js" type="text/javascript"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="/assets/web/js/html5shiv.min.js" type="text/javascript"></script>
      <script src="/assets/web/js/respond.js" type="text/javascript"></script>
    <![endif]-->
    <meta name="description" content="公司介绍-一家24小时在线社保代缴平台,上市企业,服务于世界500强客户,,包括全国社保代理,社保代缴,社保补缴,代缴公积金,社保挂靠,社保转移,五险一金代办等,彻底拒绝社保中断!">
    <meta name="keywords" content="五险一金，社保代理，社保代缴，代办社保，代缴社保，社保补缴，社保代办，社保挂靠，个人社保代理，个人社保代缴，个人社保代办，社保代理公司，社保代缴公司，社保代办公司，代理社保公司,代缴社保公司，代办社保公司">
</head>              
<body>
    <?php echo isset($content) ? $content : ""; ?>

    <script type="text/javascript" language="javascript">
    function iFrameHeight() {

        var ifm = document.getElementById("iframepage");

        var subWeb = document.frames ? document.frames["iframepage"].document : ifm.contentDocument;

        if(ifm != null && subWeb != null) {

            ifm.height = subWeb.body.scrollHeight;

        }

    }
    </script>
</body>
<!--footer结束-->
<script>
$(document).ready(function(){
  $(window).resize(function(){
     //console.log('屏幕变化');
     autoHeight();
  });
  $('.carousel-inner .item img').load(function(){
    autoHeight();
  });
});

var autoHeight=function(){
  var h1=$('#banners').height();
  var h2=$('#the_reg').height();
  var w=$(window).width();
  $('#the_reg .apply_bg').css('height',(h1+5)+'px');
  //  $('#the_reg .apply_bg .right_bg').css('',(w/1280));
  if(h1 == null || h1 == undefined){
    $('#the_reg .apply_bg').css('height',h2+'px');

  }
  //console.log('height=='+h1+"  "+h2);
}
window.onload=autoHeight();
</script>
</html>