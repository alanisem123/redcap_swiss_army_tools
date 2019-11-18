<?php
namespace Partners\swiss_army;

global $Proj;
$metadata = $Proj->metadata;

//      em42: get all fields with a not null entry in the Action Tag / Annotation field (called 'misc' in the back-end).
$annotations =[];
foreach($metadata as $k => $v){
    if(!is_null($v['misc'])){
        $annotations[$k]=$v['misc'];
    }
}

//        em42: find the fields with the specified action tag
$tag = '@MPV';
foreach($annotations as $k => $v) {
//  em42: in case there are more than one action tag in the annotation field, separate all entries into an array
//    and check each entry for the action tag being processed.
    foreach (explode(" ", $v) as $item) {

//  em42: double check for input arguments of the from @action_tag={input1, input2, etc.}
//  em42: we're only looking for the field name containing the action tag. Select the first argument only.
        if (strstr($item, '=', true)) {
            $segments = explode("=", $item);
            $value = $segments[0];
        } else {
            $value = $item;
        }

        if ($value == $tag) {
            $fields[$k] = $item;
        }
    }
}

// Include details file only if needed.
if(!empty($fields)) {
    include_once 'mpv_details.php';
}

?>