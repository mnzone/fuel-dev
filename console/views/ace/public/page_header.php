<style>
	.page-header .popover-content p{
		font-size: 12pt;
	}
</style>
<div class="page-header">
	<h1>
		<?php echo isset($controller_name) ? $controller_name : '';?>
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			<?php echo isset($action_name) ? $action_name : ''?>
		</small>
<!--		<a class="pull-right popover-info" style="padding-right: 40px;"-->
<!--		   data-rel="popover" data-placement="left" title=""-->
<!--		   data-content="<p>点击查看如何设置公众号？</p><p>点击查看如何接入平台？</p>" data-original-title="帮助信息"-->
<!--		   aria-describedby="popover834705">-->
<!--			<i class="fa fa-question-circle-o"></i>-->
<!--		</a>-->
	</h1>
</div><!-- /.page-header -->


<?php
$script = <<<js
    $('[data-rel=popover]').popover({html:true});
js;

\Asset::js($script, [], 'after-script', true);
?>