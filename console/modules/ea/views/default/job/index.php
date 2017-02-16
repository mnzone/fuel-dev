<div class="container">
    <div class="row">
        <div class="col-xs-12" style="padding-top: 20px;">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>职位名称</th>
                    <th>所属公司</th>
                    <th>月薪</th>
                    <th>工作地点</th>
                    <th>工作性质</th>
                    <th>经验要求</th>
                    <th>最低学历</th>
                    <th>招聘人数</th>
                    <th>发布/更新时间</th>
                    <th style="100px;">操作</th>
                </tr>
                </thead>
                <tbody>
                <? if(isset($items) && $items){ ?>
                    <? foreach($items as $item){ ?>
                        <tr data-id="<?= $item->id?>">
                            <td><?= $item->id;?></td>
                            <td><?= $item->name;?></td>
                            <td><?= $item->compnay;?></td>
                            <td><?= $item->salary;?></td>
                            <td><?= $item->working_place;?></td>
                            <td><?= $item->job_category;?></td>
                            <td><?= $item->experience;?></td>
                            <td><?= $item->education;?></td>
                            <td><?= $item->number;?></td>
                            <td>
                                <?= date('Y-m-d H:i:s', $item->created_at);?>
                                <?= $item->updated_at ? '<br>' . date('Y-m-d H:i:s', $item->created_at) : ''?>
                            </td>
                            <td>
                                <a href="javscript:;" class="btn btn-danger">删除</a>
                                <a href="/ea/job/save/<?= $item->id;?>" class="btn btn-info">编辑</a>
                            </td>
                        </tr>
                    <? } ?>
                <? }else{ ?>
                    <tr>
                        <td colspan="11" style="text-align: center">暂无数据</td>
                    </tr>
                <? } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
$access_token = \Session::get('access_token', '');
$host = \handle\common\CacheTools::get_value('data_api_host', '');
$script = <<<js
var _api_host = '{$host}';
var _page_index = 0;
var _access_token = '{$access_token}';

js;

\Asset::js($script, [], 'before-script', true);
\Asset::js([
    'jquery-tmpl/jquery.tmpl.min.js',
    'jquery-tmpl/jquery.tmplPlus.min.js',
    'ea/job/index.js'
], [], 'js-files', false);

?>

<script type="text/x-jquery-tmpl" id="tr">
<tr data-id="0">
    <td class="center">
        <label class="pos-rel">
            <input type="checkbox" class="ace">
            <span class="lbl"></span>
        </label>
    </td>
    <td>
        <input type="text" name="title" value="" placeholder="活动标题">
    </td>
    <td>
        <input type="text" name="begin_at" value="" placeholder="开始时间">
        至
        <input type="text" name="end_at" value="" placeholder="结束时间">
    </td>
    <td>
        <select name="status">
            <option value="normal">正常</option>
            <option value="stop">停止</option>
        </select>
    </td>
    <td>
        <a class="btn btn-sm btn-success" role="btnSave">
            保存
        </a>
        <a class="btn btn-sm btn-danger" role="btnDel">
            删除
        </a>
    </td>
</tr>
</script>
