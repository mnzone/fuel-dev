<?php

$call = '';

//是否需要显示提示框
$msg = \Session::get_flash('msg');
if($msg){
    $error_item = '';
    if(isset($msg["data"]) && $msg["data"]){
        foreach($msg["data"] as $key => $value){
            $error_item .= "{$key}{$value}<br>";
        }
    }
    $status = $msg["status"] == "succ" ? 'success' : 'error';
    $call = "showResultMessage('{$msg['msg']}', '{$error_item}', '{$status}');";
}

$script = <<<js
    function showResultMessage(title, text, status){
        $.gritter.add({
            title: (status == 'success' ? '<i class="fa fa-check-circle-o" style="font-size: 2em;"></i>' : '<i class="fa fa-times-circle-o" style="font-size: 2em;"></i>') + '<strong style="font-size: 18px; margin-left: 10px;">' + title + '</strong>',
            text: text,
            class_name: 'gritter-' + status + ' gritter-light'
        }); 
    }
    {$call}
js;

\Asset::js($script, [], 'after-script', true);
\Asset::js(['ace/js/jquery.gritter.js'], [], 'js-files', false);
\Asset::css(['ace/css/jquery.gritter.css'], [], 'css-files', false);
?>
