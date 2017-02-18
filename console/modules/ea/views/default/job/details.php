<div class="widget-box">
    <div class="widget-header widget-header-blue widget-header-flat">
        <h4 class="widget-title lighter">添加职位向导</h4>

        <div class="widget-toolbar">
            <label>
                <small class="green">
                    <b>发布职位</b>
                </small>

                <!--<input id="skip-validation" type="checkbox" class="ace ace-switch ace-switch-4">-->
                <span class="lbl middle"></span>
            </label>
        </div>
    </div>

    <div class="widget-body">
        <div class="widget-main">
            <!-- #section:plugins/fuelux.wizard -->
            <div id="fuelux-wizard-container">
                <div>
                    <!-- #section:plugins/fuelux.wizard.steps -->
                    <ul class="steps">
                        <li data-step="1" class="active">
                            <span class="step">1</span>
                            <span class="title">基本信息</span>
                        </li>

                        <li data-step="2">
                            <span class="step">2</span>
                            <span class="title">应聘要求</span>
                        </li>

                        <li data-step="3">
                            <span class="step">3</span>
                            <span class="title">补充描述</span>
                        </li>

                        <li data-step="4">
                            <span class="step">4</span>
                            <span class="title">完成</span>
                        </li>
                    </ul>

                    <!-- /section:plugins/fuelux.wizard.steps -->
                </div>

                <hr>

                <!-- #section:plugins/fuelux.wizard.container -->
                <div class="step-content pos-rel">
                    <div class="step-pane active" data-step="1">

                        <form class="form-horizontal" id="frm-base" data-parsley-validate="">

                            <div class="form-group">
                                <label for="txtName" class="col-xs-12 col-sm-3 control-label no-padding-right">
                                    职位名称
                                </label>

                                <div class="col-xs-12 col-sm-5">
                                    <span class="input-icon block">
                                        <input type="text" placeholder="清洁工" id="txtName" name="name" class="width-100">
                                        <i class="ace-icon fa fa-times-circle red hide"></i>
                                    </span>
                                </div>
                                <div class="help-block col-xs-12 col-sm-reset inline"></div>
                            </div>

                            <div class="form-group">
                                <label for="txtBeginSalary" class="col-xs-12 col-sm-3 control-label no-padding-right">
                                    薪水(月薪)
                                </label>

                                <div class="col-xs-12 col-sm-5">
                                    <span class="input-icon block">
                                        <select class="col-xs-6" id="txtBeginSalary" name="salary_begin">
                                            <option value="">起始薪资</option>
                                            <option value="0">面议</option>
                                            <?php for ($salary = 0; $salary < 100000; $salary += 500){ ?>
                                                <option value="<?=$salary ?>"><?=$salary ?>元</option>
                                            <?php } ?>
                                        </select>
                                        <select class="col-xs-6" id="txtEndSalary" name="salary_end">
                                            <option value="">截止薪资</option>
                                            <option value="0">面议</option>
                                            <?php for ($salary = 1000; $salary < 100000; $salary += 500){ ?>
                                                <option value="<?=$salary ?>"><?=$salary ?>元</option>
                                            <?php } ?>
                                        </select>
                                    </span>
                                </div>
                                <div class="help-block col-xs-12 col-sm-reset inline"></div>
                            </div>

                            <div class="form-group">
                                <label for="txtWorkingPlace" class="col-xs-12 col-sm-3 control-label no-padding-right">
                                    工作地点
                                </label>

                                <div class="col-xs-12 col-sm-5">
                                    <span class="input-icon block">
                                        <input type="text" placeholder="安阳东站" id="txtWorkingPlace" name="working_place" class="width-100">
                                        <i class="ace-icon fa fa-times-circle red hide"></i>
                                    </span>
                                </div>
                                <div class="help-block col-xs-12 col-sm-reset inline"></div>
                            </div>

                            <div class="form-group">
                                <label for="txtJobCategory" class="col-xs-12 col-sm-3 control-label no-padding-right">
                                    工作性质
                                </label>

                                <div class="col-xs-12 col-sm-5">
                                    <span class="input-icon block">
                                        <select id="txtJobCategory" name="job_category" class="width-100">
                                            <option value="0">全职</option>
                                            <option value="1">兼职</option>
                                        </select>
                                    </span>
                                </div>
                                <div class="help-block col-xs-12 col-sm-reset inline"></div>
                            </div>

                            <div class="form-group">
                                <label for="txtNumber" class="col-xs-12 col-sm-3 control-label no-padding-right">
                                    招聘人数
                                </label>

                                <div class="col-xs-12 col-sm-5">
                                    <span class="input-icon block">
                                        <input type="number" placeholder="5人" id="txtNumber" name="number" class="width-100">
                                        <i class="ace-icon fa fa-times-circle red hide"></i>
                                    </span>
                                </div>
                                <div class="help-block col-xs-12 col-sm-reset inline"></div>
                            </div>
                        </form>

                    </div>

                    <div class="step-pane" data-step="2">
                        <div>
                            <form class="form-horizontal" id="frm-continue" method="get" novalidate="novalidate">


                                <div class="form-group">
                                    <label for="txtSalary" class="col-xs-12 col-sm-3 control-label no-padding-right">
                                        经验要求
                                    </label>

                                    <div class="col-xs-12 col-sm-5">
                                        <span class="input-icon block">
                                            <select id="txtExperience" name="experience" class="width-100">
                                                <option value="0">不限</option>
                                                <?php for ($i = 1; $i < 11; $i ++) { ?>
                                                    <option value="<?= $i; ?>"><?= $i; ?>年以上</option>
                                                <?php } ?>
                                            </select>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="txtEducation" class="col-xs-12 col-sm-3 control-label no-padding-right">
                                        学历要求
                                    </label>

                                    <div class="col-xs-12 col-sm-5">
                                        <span class="input-icon block">
                                            <select id="txtEducation" name="education" class="width-100">
                                                <option value="0">不限</option>
                                                <?php $items = ['高中/中专/中技及以下', '大专及同等学历', '本科/学士及等同学历', '硕士/研究生及等同学历', '博士及以上', '其他']; ?>
                                                <?php foreach ($items as $item) {?>

                                                    <option value="<?= $item; ?>"><?= $item; ?></option>
                                                <?php } ?>
                                            </select>
                                        </span>
                                    </div>
                                    <div class="help-block col-xs-12 col-sm-reset inline"></div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="step-pane" data-step="3">
                        <div class="center">
                            <form class="form-horizontal" id="frm-full" method="get" novalidate="novalidate">

                                <!--<script id="editor" type="text/plain" style="width:1024px;height:500px;"></script>-->

                                <div class="form-group">
                                    <label for="txtWelfareTreatment" class="col-xs-12 col-sm-3 control-label no-padding-right">
                                        岗位职责
                                    </label>

                                    <div class="col-xs-12 col-sm-5">
                                        <textarea id="txtWelfareTreatment" name="welfare_treatment" class="autosize-transition form-control" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 92px;"></textarea>
                                    </div>
                                    <div class="help-block col-xs-12 col-sm-reset inline"></div>
                                </div>

                                <div class="form-group">
                                    <label for="txtJobRequirement" class="col-xs-12 col-sm-3 control-label no-padding-right">
                                        职位要求
                                    </label>

                                    <div class="col-xs-12 col-sm-5">
                                        <textarea id="txtJobRequirement" name="job_requirement" class="autosize-transition form-control" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 92px;"></textarea>
                                    </div>
                                    <div class="help-block col-xs-12 col-sm-reset inline"></div>
                                </div>

                                <div class="form-group">
                                    <label for="txtJobDuties" class="col-xs-12 col-sm-3 control-label no-padding-right">
                                        福利待遇
                                    </label>

                                    <div class="col-xs-12 col-sm-5">
                                        <textarea id="txtJobDuties" name="job_duties" class="autosize-transition form-control" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 92px;"></textarea>
                                    </div>
                                    <div class="help-block col-xs-12 col-sm-reset inline"></div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="step-pane" data-step="4">
                        <div class="center">
                            <h3 class="green">Congrats!</h3>
                            Your product is ready to ship! Click finish to continue!
                        </div>
                    </div>
                </div>

                <!-- /section:plugins/fuelux.wizard.container -->
            </div>

            <hr>
            <div class="wizard-actions">
                <!-- #section:plugins/fuelux.wizard.buttons -->
                <button class="btn btn-prev" disabled="disabled">
                    <i class="ace-icon fa fa-arrow-left"></i>
                    Prev
                </button>

                <button class="btn btn-success btn-next" data-last="Finish">
                    Next
                    <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                </button>

                <!-- /section:plugins/fuelux.wizard.buttons -->
            </div>

            <!-- /section:plugins/fuelux.wizard -->
        </div><!-- /.widget-main -->
    </div><!-- /.widget-body -->
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
    '//cdn.bootcss.com/parsley.js/2.6.2/parsley.min.js',
    'jquery-tmpl/jquery.tmpl.min.js',
    'jquery-tmpl/jquery.tmplPlus.min.js',
    //'ueditor/ueditor.config.js',
    //'ueditor/ueditor.all.js',
    //'ueditor/lang/zh-cn/zh-cn.js',
    'ea/job/details.js',
], [], 'js-files', false);

?>