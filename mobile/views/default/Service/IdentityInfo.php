
<style>
    td .label{
        display: block;
        margin-top: 2px;
    }
</style>
<link rel="stylesheet" type="text/css" href="/assets/web/css/index.css" />
  <div class="header">
    <div class="header_l">
      <a class="return_a" href="javascript:history.back();">
        <img class="return_img" src="/images/newver/left_return_03.png">返回</a></div>
    <div class="header_m">填写个人信息</div>
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
  <!--内容开始-->
  <div class="yw_dd_gr">
    <ul>
      <li>
        <span style="">姓名</span>
        <input id="txtName" name="txtName" type="text" value="杨春" placeholder="请输入您的姓名"></li>
      <li>
        <span>身份证号</span>
        <input id="txtCard" name="txtCard" type="text" value="612322198601255612" placeholder="请输入您的身份证号">
        <input id="hidbodyCode" type="hidden" value="612322198601255612"></li>
    </ul>
  </div>
  <div class="alert" id="divmsg"></div>
  <div class="dd_gr_next2" style="cursor:pointer;" onclick="return onsubmits()">下一步</div>
  <!--内容结束-->
  <div class="footer_box"></div>
  <div class="foot">Copyright©2001-2016</div>
  <script src="/assets/web/js/common.js"></script>
  <script src="/assets/web/js/IDCardVerify.js"></script>
  <script src="/assets/web/js/identityinfo.js"></script>
<?php
$access_token = \Session::get('access_token', '');
$host = "";//\handle\common\CacheTools::get_value('data_api_host', '');
$script = <<<js
var _api_host = '{$host}';
var _page_index = 1;
var _total_page = 1;
var _access_token = '{$access_token}';

js;

\Asset::js($script, [], 'before-script', true);
\Asset::js([
    '//cdn.bootcss.com/Base64/1.0.0/base64.min.js',
    'ace/js/bootbox.js',
    'jquery-tmpl/jquery.tmpl.min.js',
    'jquery-tmpl/jquery.tmplPlus.min.js',
    'tools.js',
    'mobile_nb.js',
    'common.js',
    'jquery.simplesidebar.js'
], [], 'js-files', false);
?>

<script type="text/x-jquery-tmpl" id="tr">
<tr data-id="${id}">
    <td class="center">
        <label class="pos-rel">
            <input type="checkbox" class="ace" name="id" value="${id}">
            <span class="lbl"></span>
        </label>
    </td>
    <td>
        ${name}
    </td>
    <td>
        ${company}
    </td>
    <td>
        ${salary}
    </td>
    <td>
        ${working_place}
    </td>
    <td>
        ${job_category}
    </td>
    <td>
        ${experience}
    </td>
    <td>
        ${education}
    </td>
    <td>
        ${number}
    </td>
    <td>
        <span class="label label-success">${created_date}</span>
        {{if updated_at > 0}}
            <span class="label label-warning">${updated_date}</span>
        {{/if}}
    </td>
    <td>
        <a href="/ea/job/save/${id}" class="btn btn-sm btn-primary" role="btnSave">
            <i class="fa fa-edit"></i> 编辑
        </a>
        <a class="btn btn-sm btn-success" role="btnRefresh">
            <i class="fa fa-refresh"></i> 更新
        </a>
        <a class="btn btn-sm btn-danger" role="btnDel">
            <i class="fa fa-trash"></i> 删除
        </a>
    </td>
</tr>
</script>

<script type="application/x-jquery-tmpl" id="empty">
    <tr>
        <td colspan="11" style="text-align: center">
            {{if text != '未找到相关数据'}}
            <i class="fa fa-spinner fa-spin"></i>
            {{/if}}
            ${text}
        </td>
    </tr>
</script>
