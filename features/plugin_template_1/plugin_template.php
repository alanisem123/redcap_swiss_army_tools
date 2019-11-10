<?php
namespace Partners\swiss_army;
// Swiss Army Framework by REDCap Spanish Group - Plugin Template
// Author name:
// Plugin description:

use \REDCap as REDCap;
use \Project as Project;
use \ExternalModules\AbstractExternalModule as AEM;

require_once "../../redcap_connect.php";

require_once APP_PATH_DOCROOT . 'ProjectGeneral/header.php';

if (!isset($lang) OR empty($lang)){
    $lang = 'ENG';
}

// Reading framework's config-settings. It is recommended that you leave this in place.
$config_p_ulr =  "../../modules/swiss_army_$module->VERSION/features/advanced_tools/config.json";
$contents = file_get_contents($config_p_ulr);
$contents = utf8_encode($contents);
$config = json_decode($contents, true);
require_once "../../modules/swiss_army_$module->VERSION/features/advanced_tools/base/submenu.php";
// Reading Plugin config-settings. It is recommended that you leave this in place.
$config_p_ulr =  __DIR__.'/config.json';
$contents = file_get_contents($config_p_ulr);
$contents = utf8_encode($contents);
$config_p = json_decode($contents, true);
/////////////////////////////////////////////////////////////////////////////////////////////


print "Plugin Code Goes Here!!!";

print "<pre>";
var_dump($Proj->project["status"]); // status = 0 (Development) ; status = 1 (Production)
print "</pre>";

print "<br><br>Example of Using language settings for labels: <br><br>";

print "{$config_p['description'][$lang]}";

// Note: uncomment to see what's inside of your config.json file
//print "<pre>";
//var_dump($config_p);
//print "</pre>";



$data = REDCap::getData('array');
echo "<pre>";
var_dump($data);
echo "</pre>";


var_dump(REDCap::getEventIdFromUniqueEvent('event_1_arm_1'));
var_dump($Proj->getEventIdUsingUniqueEventName('event_1_arm_1'));
var_dump($Proj->getUniqueEventNames());
$event_id = $Proj->getEventIdUsingUniqueEventName('event_1_arm_1');
$record_num = 10;
$dataX = array(
    $record_num => array(
//        REDCap::getEventIdFromUniqueEvent('ct_ae_log_arm_4') => array(
//            'adverse_event_type' => $sub_array[$event_id_ct]['ae_type_source_ws'],
//            'assessment_type' => $sub_array[$event_id_ct]['assessment_type_source_ws'],
//            'additional_description' => $sub_array[$event_id_ct]['additional_desc_source_ws'],
//            'organ_system_name' => $sub_array[$event_id_ct]['organ_system_source_ws'],
//            'source_vocabulary' => $sub_array[$event_id_ct]['source_vocab_source_ws'],
//            'ae_term' => $sub_array[$event_id_ct]['ae_term_source_ws']
//        ),
        'repeat_instances' => array(
            $event_id => array(
                'form_1' => array(
                    "1" => array(
                    "record_id" => $record_num,
                    "tf1" => "Text Field 1: $record_num-1",
                    "tf2" => "Text Field 2: $record_num-1",
                    "form_1_complete" => "2"
                    ),
                    "2" => array(
                    "record_id" => $record_num,
                    "tf1" => "Text Field 1: $record_num-2",
                    "tf2" => "Text Field 2: $record_num-2",
                    "form_1_complete"=>"2")
                )
            )
        )
    ));


echo "<pre>";
var_dump($event_id);
var_dump($dataX);
echo "</pre>";


$response = REDCap::saveData($project_id, 'array', $dataX);

/////////////////////////////////////////////////////////////////////////////////////////////
require_once APP_PATH_DOCROOT . 'ProjectGeneral/footer.php';
?>