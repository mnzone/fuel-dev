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
                    <th colspan="11">
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
                    <th>职位名称</th>
                    <th>所属公司</th>
                    <th>月薪</th>
                    <th>工作地点</th>
                    <th>工作性质</th>
                    <th>经验要求</th>
                    <th>最低学历</th>
                    <th>招聘人数</th>
                    <th style="width: 100px;">发布/更新时间</th>
                    <th style="100px;">操作</th>
                </tr>
                </thead>
                <tbody id="items">

                    <tr>
                        <td colspan="11" style="text-align: center">
                            <i class="fa fa-spinner fa-spin"></i>
                            数据加载中...
                        </td>
                    </tr>

                </tbody>
                <tfoot id="handle">
                    <tr>
                        <th colspan="11">
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
