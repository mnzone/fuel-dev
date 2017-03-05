<style>
    td .label{
        display: block;
        margin-top: 2px;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-xs-12" style="padding-top: 20px;">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th colspan="13">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="btn-group">
                                    <button data-toggle="dropdown" class="btn btn-primary btn-white dropdown-toggle" aria-expanded="false">
                                        批量
                                        <i class="ace-icon fa fa-angle-down icon-on-right"></i>
                                    </button>

                                    <ul class="dropdown-menu">
                                        <li>
                                            <a role="btnBatchUpdate">更新</a>
                                        </li>
                                        <li>
                                            <a role="btnSendToWechat">微信推送</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a role="btnBatchDelete">删除</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xs-6 text-right">
                                当前第 <span role="page_index">0</span> 页, 共 <span role="page_total">0</span> 页
                                &nbsp;&nbsp;&nbsp;
                                跳转至
                                <input role="txtCurrentPage" type="text" value="" placeholder="" class="form-control text-center" style="display: inline; width: 50px;"/>
                                <a class="btn btn-sm btn-primary" role="btnGo">Go</a>
                                <a class="btn btn-sm btn-info" role="btnPrevious">Previous</a>
                                <a class="btn btn-sm btn-info" role="btnNext">Next</a>
                            </div>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th class="center">
                        <label class="pos-rel">
                            <input type="checkbox" id="ckbAll" class="ace">
                            <span class="lbl"></span>
                        </label>
                    </th>
                    <th>申请人</th>
                    <th>手机号</th>
                    <th>身份证</th>
                    <th>参保项目</th>
                    <th>参保城市</th>
                    <th>人员类别</th>
                    <th>服务内容</th>
                    <th>付费方式</th>
                    <th>缴费月份</th>
                    <th>社保基数</th>
                    <th style="width: 100px;">申请时间</th>
                    <th style="100px;">操作</th>
                </tr>
                </thead>
                <tbody id="items">

                <tr>
                    <td colspan="13" style="text-align: center">
                        <i class="fa fa-spinner fa-spin"></i>
                        数据加载中...
                    </td>
                </tr>

                </tbody>
                <tfoot id="handle">
                <tr>
                    <th colspan="13">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="btn-group">
                                    <button data-toggle="dropdown" class="btn btn-primary btn-white dropdown-toggle" aria-expanded="false">
                                        批量
                                        <i class="ace-icon fa fa-angle-down icon-on-right"></i>
                                    </button>

                                    <ul class="dropdown-menu">
                                        <li>
                                            <a role="btnBatchUpdate">更新</a>
                                        </li>
                                        <li>
                                            <a role="btnSendToWechat">微信推送</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a role="btnBatchDelete">删除</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xs-6 text-right">
                                当前第 <span role="page_index">0</span> 页, 共 <span role="page_total">0</span> 页
                                &nbsp;&nbsp;&nbsp;
                                跳转至
                                <input role="txtCurrentPage" type="text" value="" placeholder="" class="form-control text-center" style="display: inline; width: 50px;"/>
                                <a class="btn btn-sm btn-primary" role="btnGo">Go</a>
                                <a class="btn btn-sm btn-info" role="btnPrevious">Previous</a>
                                <a class="btn btn-sm btn-info" role="btnNext">Next</a>
                            </div>
                        </div>
                    </th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<?php
$access_token = \Session::get('access_token', '');
$host = \handle\common\CacheTools::get_value('data_api_host', '');
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
    'ea/job/index.js'
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
        ${cellphone}
    </td>
    <td>
        ${identity}
    </td>
    <td>
        ${item}
    </td>
    <td>
        ${city}
    </td>
    <td>
        ${type}
    </td>
    <td>
        ${service}
    </td>
    <td>
        ${payment_method}
    </td>
    <td>
        ${month}
    </td>
    <td>
        ${base_fee}
    </td>
    <td>
        {{if created_at > 0}}
            <span class="label label-success">${created_date}</span>
           {{/if}}
        {{if updated_at > 0}}
            <span class="label label-warning">${updated_date}</span>
        {{/if}}
    </td>
    <td>
        <a href="/ea/job/save/${id}" class="btn btn-sm btn-primary hide" role="btnSave">
            <i class="fa fa-edit"></i> 编辑
        </a>
        <a class="btn btn-sm btn-success hide" role="btnRefresh">
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
        <td colspan="13" style="text-align: center">
            {{if text != '未找到相关数据'}}
            <i class="fa fa-spinner fa-spin"></i>
            {{/if}}
            ${text}
        </td>
    </tr>
</script>
