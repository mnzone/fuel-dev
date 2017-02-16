<div class="widget-box">
    <div class="widget-header widget-header-blue widget-header-flat">
        <h4 class="widget-title lighter">添加职位向导</h4>

        <div class="widget-toolbar">
            <label>
                <small class="green">
                    <b>基本信息</b>
                </small>

                <input id="skip-validation" type="checkbox" class="ace ace-switch ace-switch-4">
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
                        <h3 class="lighter block green">请填写基本信息</h3>

                        <form class="form-horizontal hide" id="frm-base">
                            <!-- #section:elements.form.input-state -->
                            <div class="form-group has-warning hide">
                                <label for="inputWarning" class="col-xs-12 col-sm-3 control-label no-padding-right">职位名称</label>

                                <div class="col-xs-12 col-sm-5">
                                    <span class="block input-icon input-icon-right">
                                        <input type="text" id="inputWarning" class="width-100">
                                        <i class="ace-icon fa fa-leaf"></i>
                                    </span>
                                </div>
                                <div class="help-block col-xs-12 col-sm-reset inline"> 该项为必填项! </div>
                            </div>

                            <!-- /section:elements.form.input-state -->
                            <div class="form-group has-error hide">
                                <label for="inputError" class="col-xs-12 col-sm-3 col-md-3 control-label no-padding-right">职位信息</label>

                                <div class="col-xs-12 col-sm-5">
                                    <span class="block input-icon input-icon-right">
                                        <input type="text" id="inputError" class="width-100">
                                        <i class="ace-icon fa fa-times-circle"></i>
                                    </span>
                                </div>
                                <div class="help-block col-xs-12 col-sm-reset inline"> Error tip help! </div>
                            </div>

                            <div class="form-group has-success hide">
                                <label for="inputSuccess" class="col-xs-12 col-sm-3 control-label no-padding-right">Input with success</label>

                                <div class="col-xs-12 col-sm-5">
																	<span class="block input-icon input-icon-right">
																		<input type="text" id="inputSuccess" class="width-100">
																		<i class="ace-icon fa fa-check-circle"></i>
																	</span>
                                </div>
                                <div class="help-block col-xs-12 col-sm-reset inline"> Success tip help! </div>
                            </div>

                            <div class="form-group has-info hide">
                                <label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Input with info</label>

                                <div class="col-xs-12 col-sm-5">
																	<span class="block input-icon input-icon-right">
																		<input type="text" id="inputInfo" class="width-100">
																		<i class="ace-icon fa fa-info-circle"></i>
																	</span>
                                </div>
                                <div class="help-block col-xs-12 col-sm-reset inline"> Info tip help! </div>
                            </div>

                            <div class="form-group">
                                <label for="inputError2" class="col-xs-12 col-sm-3 control-label no-padding-right">
                                    职位名称
                                </label>

                                <div class="col-xs-12 col-sm-5">
                                    <span class="input-icon block">
                                        <input type="text" id="inputError2" class="width-100">
                                        <i class="ace-icon fa fa-times-circle red"></i>
                                    </span>
                                </div>
                                <div class="help-block col-xs-12 col-sm-reset inline"> 如：Java程序员 </div>
                            </div>

                            <div class="form-group">
                                <label for="inputError2" class="col-xs-12 col-sm-3 control-label no-padding-right">
                                    薪水(月薪)
                                </label>

                                <div class="col-xs-12 col-sm-5">
                                    <span class="input-icon block">
                                        <input type="text" id="inputError2" class="width-100">
                                        <i class="ace-icon fa fa-times-circle red"></i>
                                    </span>
                                </div>
                                <div class="help-block col-xs-12 col-sm-reset inline"> 如：Java程序员 </div>
                            </div>

                            <div class="form-group">
                                <label for="inputError2" class="col-xs-12 col-sm-3 control-label no-padding-right">
                                    工作地点
                                </label>

                                <div class="col-xs-12 col-sm-5">
                                    <span class="input-icon block">
                                        <input type="text" id="inputError2" class="width-100">
                                        <i class="ace-icon fa fa-times-circle red"></i>
                                    </span>
                                </div>
                                <div class="help-block col-xs-12 col-sm-reset inline"> 如：Java程序员 </div>
                            </div>

                            <div class="form-group">
                                <label for="inputError2" class="col-xs-12 col-sm-3 control-label no-padding-right">
                                    工作性质
                                </label>

                                <div class="col-xs-12 col-sm-5">
                                    <span class="input-icon block">
                                        <input type="text" id="inputError2" class="width-100">
                                        <i class="ace-icon fa fa-times-circle red"></i>
                                    </span>
                                </div>
                                <div class="help-block col-xs-12 col-sm-reset inline"> 如：Java程序员 </div>
                            </div>

                            <div class="form-group">
                                <label for="inputError2" class="col-xs-12 col-sm-3 control-label no-padding-right">
                                    招聘人数
                                </label>

                                <div class="col-xs-12 col-sm-5">
                                    <span class="input-icon block">
                                        <input type="text" id="inputError2" class="width-100">
                                        <i class="ace-icon fa fa-times-circle red"></i>
                                    </span>
                                </div>
                                <div class="help-block col-xs-12 col-sm-reset inline"> 如：Java程序员 </div>
                            </div>
                        </form>

                        <form class="form-horizontal hide" id="frm-continue" method="get" novalidate="novalidate">


                            <div class="form-group">
                                <label for="inputError2" class="col-xs-12 col-sm-3 control-label no-padding-right">
                                    经验要求
                                </label>

                                <div class="col-xs-12 col-sm-5">
                                    <span class="input-icon block">
                                        <input type="text" id="inputError2" class="width-100">
                                        <i class="ace-icon fa fa-times-circle red"></i>
                                    </span>
                                </div>
                                <div class="help-block col-xs-12 col-sm-reset inline"> 如：Java程序员 </div>
                            </div>

                            <div class="form-group">
                                <label for="inputError2" class="col-xs-12 col-sm-3 control-label no-padding-right">
                                    最低学历
                                </label>

                                <div class="col-xs-12 col-sm-5">
                                    <span class="input-icon block">
                                        <input type="text" id="inputError2" class="width-100">
                                        <i class="ace-icon fa fa-times-circle red"></i>
                                    </span>
                                </div>
                                <div class="help-block col-xs-12 col-sm-reset inline"> 如：Java程序员 </div>
                            </div>
                        </form>

                        <form class="form-horizontal" id="frm-full" method="get" novalidate="novalidate">

                            <!--<script id="editor" type="text/plain" style="width:1024px;height:500px;"></script>-->

                            <div class="form-group">
                                <label for="inputError2" class="col-xs-12 col-sm-3 control-label no-padding-right">
                                    岗位职责
                                </label>

                                <div class="col-xs-12 col-sm-5">
                                    <textarea id="form-field-11" class="autosize-transition form-control" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 92px;"></textarea>
                                </div>
                                <div class="help-block col-xs-12 col-sm-reset inline"></div>
                            </div>

                            <div class="form-group">
                                <label for="inputError2" class="col-xs-12 col-sm-3 control-label no-padding-right">
                                    职位要求
                                </label>

                                <div class="col-xs-12 col-sm-5">
                                    <textarea id="form-field-12" class="autosize-transition form-control" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 92px;"></textarea>
                                </div>
                                <div class="help-block col-xs-12 col-sm-reset inline"></div>
                            </div>

                            <div class="form-group">
                                <label for="inputError2" class="col-xs-12 col-sm-3 control-label no-padding-right">
                                    福利待遇
                                </label>

                                <div class="col-xs-12 col-sm-5">
                                    <textarea id="form-field-13" class="autosize-transition form-control" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 92px;"></textarea>
                                </div>
                                <div class="help-block col-xs-12 col-sm-reset inline"></div>
                            </div>
                        </form>
                    </div>

                    <div class="step-pane" data-step="2">
                        <div>
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">
                                    <i class="ace-icon fa fa-times"></i>
                                </button>

                                <strong>
                                    <i class="ace-icon fa fa-check"></i>
                                    Well done!
                                </strong>

                                You successfully read this important alert message.
                                <br>
                            </div>

                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">
                                    <i class="ace-icon fa fa-times"></i>
                                </button>

                                <strong>
                                    <i class="ace-icon fa fa-times"></i>
                                    Oh snap!
                                </strong>

                                Change a few things up and try submitting again.
                                <br>
                            </div>

                            <div class="alert alert-warning">
                                <button type="button" class="close" data-dismiss="alert">
                                    <i class="ace-icon fa fa-times"></i>
                                </button>
                                <strong>Warning!</strong>

                                Best check yo self, you're not looking too good.
                                <br>
                            </div>

                            <div class="alert alert-info">
                                <button type="button" class="close" data-dismiss="alert">
                                    <i class="ace-icon fa fa-times"></i>
                                </button>
                                <strong>Heads up!</strong>

                                This alert needs your attention, but it's not super important.
                                <br>
                            </div>
                        </div>
                    </div>

                    <div class="step-pane" data-step="3">
                        <div class="center">
                            <h3 class="blue lighter">This is step 3</h3>
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
    'jquery-tmpl/jquery.tmpl.min.js',
    'jquery-tmpl/jquery.tmplPlus.min.js',
    //'ueditor/ueditor.config.js',
    //'ueditor/ueditor.all.js',
    //'ueditor/lang/zh-cn/zh-cn.js',
    'ea/job/details.js',
], [], 'js-files', false);

?>