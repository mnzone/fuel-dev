    <form method="post" action="/service/save" id="form1">
      <div class="aspNetHidden">
      <div class="header">
        <div class="header_l">
          <a class="return_a" href="javascript:history.back();">
          <img class="return_img" src="/images/newver/left_return_03.png">返回</a>
        </div>
        <div class="header_m">填写缴纳信息</div>
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
      <div class="jsb_toubu">
        <p class="left">项目</p>
        <p class="right">社保
          <input type="hidden" name="hidType" id="hidType" value="1"></p></div>
      <div class="yw_jsb_cb">
        <table class="first" border="0" cellspacing="" cellpadding="" width="100%">
          <tbody>
            <tr>
              <td width="30%" class="items">缴纳城市</td>
              <td width="70%" class="selects">
                <span class="shengshi">
                  <select name="ddlPrivece" id="ddlPrivece" class="province" style="color: rgb(153, 153, 153);">
                    <option value="" style="color: rgb(51, 51, 51);">省份</option>
                    <option value="1" style="color: rgb(51, 51, 51);">北京</option>
                    <option value="2" style="color: rgb(51, 51, 51);">天津</option>
                    <option value="3" style="color: rgb(51, 51, 51);">河北</option>
                    <option value="7" style="color: rgb(51, 51, 51);">吉林</option>
                    <option value="9" style="color: rgb(51, 51, 51);">上海</option>
                    <option value="10" style="color: rgb(51, 51, 51);">江苏</option>
                    <option value="11" style="color: rgb(51, 51, 51);">浙江</option>
                    <option value="15" style="color: rgb(51, 51, 51);">山东</option>
                    <option value="16" style="color: rgb(51, 51, 51);">河南</option>
                    <option value="17" style="color: rgb(51, 51, 51);">湖北</option>
                    <option value="18" style="color: rgb(51, 51, 51);">湖南</option>
                    <option value="19" style="color: rgb(51, 51, 51);">广东</option>
                    <option value="23" style="color: rgb(51, 51, 51);">四川</option>
                    <option value="27" style="color: rgb(51, 51, 51);">陕西</option></select>
                  <select name="ddlCity" id="ddlCity" class="citys" style="color: rgb(153, 153, 153);">
                    <option value="" style="color: rgb(51, 51, 51);">城市</option></select>
                </span>
                <input type="hidden" name="hidCity" id="hidCity" value="0"></td>
            </tr>
            <tr id="trrylb">
              <td class="items">户口性质</td>
              <td class="selects">
                <select name="ddlHkxz" id="ddlHkxz" class="xuanze" style="color: rgb(153, 153, 153);">
                  <option value="-1" style="color: rgb(51, 51, 51);">请选择</option>
                  <option value="1" style="color: rgb(51, 51, 51);">非农户口</option>
                  <option value="2" style="color: rgb(51, 51, 51);">农业户口</option>
                </select>
                <input type="hidden" name="hidHkxz" id="hidHkxz" value="0"></td>
            </tr>
            <tr id="housing" style="display: none;">
              <td class="items">公积金比例</td>
              <td class="selects">
                <select name="ddlHousing" id="ddlHousing" class="xuanze" style="color: rgb(153, 153, 153);">
                  <option value="" style="color: rgb(51, 51, 51);">请选择</option></select>
                <input type="hidden" name="hidHousing" id="hidHousing" value="0"></td>
            </tr>
            <tr>
              <td class="items">服务内容</td>
              <input type="hidden" name="hidIsNewCan" id="hidIsNewCan" value="1">
              <td class="selects">
                <select name="ddlIsNew" id="ddlIsNew" class="xuanze" style="color: rgb(153, 153, 153);">
                  <option value="0" style="color: rgb(51, 51, 51);">新参</option>
                  <option selected="selected" value="1" style="color: rgb(51, 51, 51);">已参</option>
                  <option value="2" style="color: rgb(51, 51, 51);">补缴</option></select>
              </td>
            </tr>
            <tr style="color: red; font-size: 1em; display: none;" class="new_shuoming">
              <td colspan="2">北京社保局最新规定：
                <br>首次在北京市缴社保请填写参保人名下的储蓄卡信息</td></tr>
            <tr class="bank" style="display: none;">
              <td class="items">储蓄卡</td>
              <td class="selects">
                <select name="ddlBankName" id="ddlBankName" class="xuanze" style="color: rgb(153, 153, 153);">
                  <option value="北京银行" style="color: rgb(51, 51, 51);">北京银行（限本市）</option>
                  <option value="工商银行" style="color: rgb(51, 51, 51);">工商银行</option>
                  <option value="建设银行" style="color: rgb(51, 51, 51);">建设银行</option>
                  <option value="中国银行" style="color: rgb(51, 51, 51);">中国银行</option>
                  <option value="储蓄银行" style="color: rgb(51, 51, 51);">储蓄银行</option>
                  <option value="农业银行" style="color: rgb(51, 51, 51);">农业银行</option>
                  <option value="农商银行" style="color: rgb(51, 51, 51);">农商银行（限本市）</option>
                  <option value="中信银行" style="color: rgb(51, 51, 51);">中信银行</option>
                  <option value="光大银行" style="color: rgb(51, 51, 51);">光大银行</option>
                  <option value="广发银行" style="color: rgb(51, 51, 51);">广发银行（限本市）</option>
                  <option value="交通银行" style="color: rgb(51, 51, 51);">交通银行</option>
                  <option value="民生银行" style="color: rgb(51, 51, 51);">民生银行</option>
                  <option value="招商银行" style="color: rgb(51, 51, 51);">招商银行</option>
                  <option value="兴业银行" style="color: rgb(51, 51, 51);">兴业银行</option>
                  <option value="华夏银行" style="color: rgb(51, 51, 51);">华夏银行</option>
                  <option value="浦发银行" style="color: rgb(51, 51, 51);">浦发银行</option></select>
              </td>
            </tr>
            <tr class="bank" style="display: none;">
              <td class="items">支行名</td>
              <td class="selects">
                <input name="txtBankSubNameSS" type="text" id="txtBankSubNameSS" class="bank_zhihang" placeholder="请输入支行名称" style="font-size: 0.8em; width: 80%;"></td>
            </tr>
            <tr class="bank_border" style="color: red; font-size: 1em; display: none;">
              <td colspan="2" class="zhihang_tishi"></td>
            </tr>
            <tr class="bank" style="display: none;">
              <td class="items">储蓄卡卡号</td>
              <td class="selects">
                <input name="txtBankCardNoSS" type="text" id="txtBankCardNoSS" placeholder="请输入卡号" style="font-size: 0.8em; width: 80%;"></td>
            </tr>
            <tr class="bank_border1" style="color: red; font-size: 1em; display: none;">
              <td colspan="2" class="bank_tishi"></td>
            </tr>
            <tr id="divHouseCard" style="display: none;">
              <td class="items">公积金卡号</td>
              <td class="selects">
                <input name="txtHousingCard" type="text" id="txtHousingCard" placeholder="公积金卡号"></td>
            </tr>
            <tr>
              <td class="items">付款方式</td>
              <td class="selects">
                <select name="ddlFkfs" id="ddlFkfs" class="xuanze" style="color: rgb(153, 153, 153);">
                  <option value="" style="color: rgb(51, 51, 51);">请选择</option>
                  <option value="4" style="color: rgb(51, 51, 51);">年付</option>
                  <option value="3" style="color: rgb(51, 51, 51);">半年付</option>
                  <option value="2" style="color: rgb(51, 51, 51);">季付</option>
                  <option value="1" style="color: rgb(51, 51, 51);">月付</option></select>
              </td>
            </tr>
            <tr>
              <td class="items">开始月份</td>
              <td class="selects">
                <select name="ddlStartDate" id="ddlStartDate" class="xuanze" style="color: rgb(153, 153, 153);">
                  <option value="" style="color: rgb(51, 51, 51);">请选择</option></select>
                <input type="hidden" name="hidStartDate" id="hidStartDate"></td>
            </tr>
            <tr>
              <td class="items">结束月份</td>
              <td class="selects">
                <select name="ddlEndDate" id="ddlEndDate" disabled="disabled" class="aspNetDisabled xuanze" style="color: rgb(153, 153, 153);">
                  <option selected="selected" value="" style="color: rgb(51, 51, 51);">请选择</option></select>
                <input type="hidden" name="hidEndDate" id="hidEndDate"></td>
            </tr>
            <tr>
              <td class="items">基数</td>
              <td class="selects">
                <input name="txtSbjs" type="text" maxlength="10" id="txtSbjs" class="shurujishu" placeholder="请输入基数">
                <input type="hidden" name="hidSbjs" id="hidSbjs">
                <input type="hidden" id="hidMinLimit" value="0">
                <input type="hidden" id="hidMaxLimit" value="0">
                <span id="span_basenum">2834~19389元</span></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div style="widows: 100%; height: 3em;"></div>
      <div class="yw_jsb_cb">
        <table class="first" border="0" cellspacing="" cellpadding="" width="100%">
          <tbody>
            <tr>
              <td width="30%" class="items">代收费用</td>
              <td width="70%" class="selects2">
                <span id="span_dsfy">0</span>元
                <input type="hidden" name="hidDsfy" id="hidDsfy" value="0">
                <input type="hidden" name="hidMonthFy" id="hidMonthFy" value="0"></td></tr>
            <tr id="trOtherMoney" style="display: none;">
              <td class="items">其他费用</td>
              <td class="selects2">
                <span id="span_othermoney">0</span>
                <input type="hidden" name="hidOtherPrice" id="hidOtherPrice" value="0"></td>
            </tr>
            <tr id="trZhinajin" style="display: none;">
              <input type="hidden" name="HidIsBj" id="HidIsBj" value="0">
              <td class="items">滞纳金</td>
              <td class="selects2">
                <span id="span_zhinajin">0</span>元
                <input type="hidden" name="hidZhinajin" id="hidZhinajin" value="0"></td></tr>
            <tr>
              <td class="items">服务费</td>
              <td class="selects2">
                <span id="span_fwf">0/月</span>
                <input type="hidden" name="hidFwf" id="hidFwf" value="0"></td>
            </tr>
            <tr id="lj" style="display: none">
              <td class="items">新用户立减</td>
              <td class="selects2">
                <span id="span_lj">0/月</span>
                <input type="hidden" name="hidLJ" id="hidLJ" value="0"></td>
            </tr>
          </tbody>
        </table>
      </div>
      <ul class="fwtk">
        <li class="tiaokuan">&nbsp;&nbsp;
          <input type="hidden" id="hidbjmonth" value="0">
          <span class="yw_dd_quan" style="margin: 0 0.3em; width: 1.5em; height: 1.5em"></span>同意
          <a href="/service/Gyrrb">《服务协议》</a></li>
      </ul>
      <div class="yw_dd_zf">
        <b>总计</b>
        <span>
          <span id="lblTotalPrice">0</span>元
          <input type="hidden" name="hidTotalPrice" id="hidTotalPrice" value="0"></span>
        <input type="submit" name="btnSubmit" value="提交" onclick="return onSubmits();" id="btnSubmit" style="-webkit-appearance: none; -moz-appearance: none;"></div>
      <div style="widows: 100%; height: 3em;"></div>
      <!--内容结束-->
      <div class="footer_box"></div>
      <div class="foot">Copyright©2001-2016</div>
    </form>
  <script src="/assets/web/js/common.js"></script>
    <script type="text/javascript">$(function() {
        $(".yw_dd_quan").click(function() {
          if ($(this).attr("class") == "yw_dd_quan yw_dd_quan1") {
            $(this).removeClass("yw_dd_quan1");
          } else {
            $(this).toggleClass("yw_dd_quan1");
          }
        })
      })</script>
    <script>var unSelected = "#999";
      var selected = "#333";
      $(function() {
        if(getQueryString('type') != null && getQueryString('type') != "" && getQueryString('type') != undefined){
            var tVal = getQueryString('type');
            $("#hidType").val(tVal);
            var tName = tVal == 1 ? "社保" :"公积金";
            $(".jsb_toubu").find(".right").text(tName);
        }

        $("select").css("color", unSelected);
        $("option").css("color", selected);
        $("select").change(function() {
          var selItem = $(this).val();
          if (selItem == $(this).find('option:first').val()) {
            $(this).css("color", unSelected);
          } else {
            $(this).css("color", selected);
          }
        });

        //银行信息显示修改shijz 2016-05-25
        if ($("#ddlPrivece").val() != "1" || $("#ddlIsNew").val() != "") {
          $(".new_shuoming").css('display', 'none'); //让他们隐藏
          $(".bank").css('display', 'none');
        }
      })

      //sxx-b0518
      var bxType = $("#hidType").val(); //1社保  2公积金
      if (bxType != 2) {
        $('#ddlPrivece').bind('change',
        function() {
          if ($(this).val() == 1 && $("#ddlIsNew").val() != "1") {
            $(".new_shuoming").css('display', '');
            $(".bank").css('display', '');
          } else if ($(this).val() != 1) {
            $(".new_shuoming").css('display', 'none'); //让他们隐藏
            $(".bank").css('display', 'none');
          }
        })

        $("#ddlIsNew").bind('change',
        function() {
          if ($(this).val() != "1" && $("#ddlPrivece").val() == 1) {
            $(".new_shuoming").css('display', '')
            $(".bank").css('display', '')
          } else {
            $(".new_shuoming").css('display', 'none');
            $(".bank").css('display', 'none');
            $(".bank_border1").css("display", "none");
            $(".bank_border").css("display", "none");
          }
        })
        //支行验证
        $(".bank_zhihang").bind('blur',
        function() {
          if ($.trim($(this).val()) == '') {
            $(".bank_border").css("display", "") 
            $(".zhihang_tishi").html("支行不能为空")
          } else {
            $(".zhihang_tishi").html("");
            $(".bank_border").css("display", "none")
          }
        })
        var isOK = false;
        //银行卡号验证
        $('#txtBankCardNoSS').bind('blur',
        function() {
          var reg19 = new RegExp(/^\d{19}$/);
          var reg16 = new RegExp(/^\d{16}$/);
          if ($.trim($(this).val()) == '') {
            $(".bank_border1").css("display", "")
            $(".bank_tishi").html("储蓄卡号不能为空")
          }
          if (!reg16.test($(this).val().trim())) {
            $(".bank_tishi").html("储蓄卡卡号错误，请重新输入16或19位储蓄卡卡号") 
            $(".bank_border1").css("display", "")
            isOK = false;
          } else {
            $(".bank_border1").css("display", "none");
            isOK = true;
          }
          if (isOK == false) {
            if (!reg19.test($(this).val().trim())) {
              $(".bank_tishi").html("储蓄卡卡号错误，请重新输入16或19位储蓄卡卡号") 
              $(".bank_border1").css("display", "")
            } else {
              $(".bank_border1").css("display", "none");
            }
          }
        })
      }</script>