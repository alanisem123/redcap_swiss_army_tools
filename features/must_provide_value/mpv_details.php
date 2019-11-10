<?php
namespace Partners\swiss_army;
//global $Proj;
//        em42: apply the hook to only the fields with the specified action tag

foreach($fields as $k => $v){

    $segments = explode("=", $v);
    $value = $segments[1];
    $inputs = trim(substr($value, 1, strlen($value) - 2));
    $inputs = explode(",", $inputs);
//    var_dump($inputs);
    // EM42: Only one input setting is expected , i.e. $inputs[0]
    $required = $config['required'][$inputs[0]];
//var_dump($required);

    $script = <<<SCRIPT
<style type='text/css'>
    .requiredlabel {
        display: none;
    }
    #label-{$k}:after {
                   content: '({$required})';
                   color: #ff0000;
                   font-size: 12px;
                   padding-left: 60px;
               }
</style>
SCRIPT;

    if($required) {
        print $script;
    }
}