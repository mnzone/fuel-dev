
  <script src="/assets/web/js/common.js"></script>    
  <style>.xuanze { /*width: 75%;*/ background-color: #fff; border: 1px solid rgba(255,255,255,1); text-align: left; font-size: 1em; line-height: 2em; -webkit-appearance: none; /*background: url(/images/newver/jt6.png) no-repeat 90% center;*/ padding-left: 20px; margin-left: 1em; font-size: 1.3em; }</style></head>
  <!--头部开始-->
  <div class="header">
    <div class="header_l">
      <a class="return_a" href="javascript:history.back();">
        <img class="return_img" src="/images/newver/left_return_03.png">返回</a></div>
    <div class="header_m">个人资料</div>
    <script type="text/javascript">$(function() {
        $(".header_r a").click(function() {
          if ($(".nav_box").css("display") == "none") {
            $(".nav_box").show();
          } else {
            $(".nav_box").hide();
          }
        });
      })</script>
  </div>
  <!--头部结束-->
  <form method="post" action="mMyData.aspx" id="form1">
    <!--内容开始-->
    <div class="mine_pic">
      <div class="touxiang1">
        <img class="zhao" src="/images/newver/zhao.png">
        <input type="file" id="file1" name="file1" style="width: 100%; height: 100%; opacity: 0; z-index: 2; position: absolute;" onchange="return uploadFiles()">
        <img src="/images/newver/touxiang.png"></div>
      <div class="rrb">18622632021</div></div>
    <div class="mine_wdzl">
      <ul class="gywm_list">
        <li class="fist_line">
          <span style="color: red">*</span>
          <span class="title">姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名</span>
          <input name="UName" type="text" value="杨春" id="UName"></li>
        <li class="fist_line">
          <span style="color: red">*</span>
          <span class="title">身份证号</span>
          <input name="IdentityCard" type="text" value="612322198601255612" id="IdentityCard"></li>
        <li class="fist_line">
          <span style="color: red">*</span>
          <span class="title">手&nbsp;&nbsp;机&nbsp;号</span>
          <input name="mPhone" type="text" value="18622632021" readonly="readonly" id="mPhone"></li>
        <li class="fist_line" style="display: none;">
          <span class="title">户口性质</span>
          <input name="HKType" type="text" value="0" id="HKType"></li>
        <li class="fist_line">
          <span class="title">联系邮箱</span>
          <input name="mEmail" type="text" id="mEmail"></li>
        <li class="fist_line">
          <span class="title">联系地址</span>
          <input name="mAddress" type="text" id="mAddress"></li>
        <li class="fist_line">
          <span class="title">储蓄卡&nbsp;&nbsp;&nbsp;</span>
          <select name="ddlBankName" id="ddlBankName" class="xuanze">
            <option value="0">请选择银行</option>
            <option value="中国农业银行">中国农业银行</option>
            <option value="中国银行">中国银行</option>
            <option value="中信银行">中信银行</option>
            <option value="广州银行">广州银行</option>
            <option value="上海银行">上海银行</option>
            <option value="中国建设银行">中国建设银行</option>
            <option value="中国光大银行">中国光大银行</option>
            <option value="广发银行">广发银行</option>
            <option value="兴业银行">兴业银行</option>
            <option value="招商银行">招商银行</option>
            <option value="中国民生银行">中国民生银行</option>
            <option value="中国工商银行">中国工商银行</option>
            <option value="平安银行">平安银行</option>
            <option value="中国邮政储蓄银行">中国邮政储蓄银行</option>
            <option value="浦发银行">浦发银行</option>
            <option value="宁波银行">宁波银行</option>
            <option value="交通银行">交通银行</option>
            <option value="广州银行">广州银行</option>
            <option value="北京银行">北京银行</option></select>
        </li>
        <li class="fist_line">
          <span class="title">支行名&nbsp;&nbsp;&nbsp;</span>
          <input name="mBankSubNameSS" type="text" id="mBankSubNameSS"></li>
        <li class="fist_line">
          <span class="title">银行卡号</span>
          <input name="mBankCardNoSS" type="text" id="mBankCardNoSS"></li>
      </ul>
      <div class="dd_gr_next2">
        <input type="submit" name="saveBtn" value="保存" onclick="return validate();" id="saveBtn" class="next"></div>
    </div>
    <!--内容结束-->
    <!--内容结束--></form>
  <!--尾部开始-->
  <div class="footer_box"></div>
  <div class="foot">Copyright©2001-2016</div>
  <!--尾部开始-->
  <script src="/assets/web/js/fileUpLoad.js"></script>
  <script>function uploadFiles() {
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
    }

    function validate() {

      var regStr = new RegExp("^[\u4E00-\u9FA5]{1,6}$");
      var regIdCard = /^(^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$)|(^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])((\d{4})|\d{3}[Xx])$)$/;
      var regEmail = new RegExp("^(([0-9a-zA-Z]+)|([0-9a-zA-Z]+[_.0-9a-zA-Z-]*[0-9a-zA-Z]+))@([a-zA-Z0-9-]+[.])+([a-zA-Z]{2}|net|NET|com|COM|gov|GOV|mil|MIL|org|ORG|edu|EDU|int|INT)$");
      var regBankNO = new RegExp("^[0-9]{16,19}$");
      var pattern = new RegExp("[`~!@#$^&*()=|{}':;',\\[\\].<>/?~！@#￥……&*（）——|{}【】‘；：”“'。，、？]")

      if ($('#UName').val() == "") {
        alert("请输入姓名");
        return false;
      }
      if (!regStr.test($('#UName').val())) {
        alert("姓名只能输入中文");
        return false;
      }
      if ($('#IdentityCard').val() == "") {
        alert("请输入身份证号");
        return false;
      }
      if (!regIdCard.test($.trim($("#IdentityCard").val()))) {
        alert("你输入的身份证格式不正确，请重新输入");
        return false;
      }
      if ($("#mEmail").val() != "" && !regEmail.test($("#mEmail").val())) {
        alert("请输入正确的邮箱");
        return false;
      }
      if ($("#mAddress").val() != "" && pattern.test($("#mAddress").val())) {
        alert("你输入的地址包含特殊字符，请重新填写");
        return false;
      }
      if ($("#mBankSubNameSS").val() != "" && !regStr.test($("#mBankSubNameSS").val())) {
        alert("银行支行名称只能输入中文");
        return false;
      }
      if ($("#mBankCardNoSS").val() != "" && !regBankNO.test($.trim($("#mBankCardNoSS").val()))) {
        alert("银行卡号输入错误，请确认后重新输入");
        return false;
      }
      return true;
    }</script>
