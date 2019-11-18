<?php

namespace Partners\swiss_army;

// Swiss Army Framework by REDCap Spanish Group - Plugin Template
// Author name:
// Plugin description:
use \REDCap as REDCap;
use \Project as Project;
use \ExternalModules\AbstractExternalModule as AEM;
use ExternalModules\ExternalModules;

require_once "../../redcap_connect.php";

require_once APP_PATH_DOCROOT . 'ProjectGeneral/header.php';

if (!isset($lang) OR empty($lang)) {
    $lang = 'ENG';
}

// Reading framework's config-settings. It is recommended that you leave this in place.
$config_p_ulr = "../../modules/swiss_army_$module->VERSION/features/advanced_tools/config.json";
$contents = file_get_contents($config_p_ulr);
$contents = utf8_encode($contents);
$config = json_decode($contents, true);
require_once "../../modules/swiss_army_$module->VERSION/features/advanced_tools/base/submenu.php";
// Reading Plugin config-settings. It is recommended that you leave this in place.
$config_p_ulr = __DIR__ . '/config.json';
$contents = file_get_contents($config_p_ulr);
$contents = utf8_encode($contents);
$config_p = json_decode($contents, true);

$redcap_version = explode("_v", APP_PATH_DOCROOT);
$redcap_version = explode("/", $redcap_version[1]);
$URI = explode("?",$_SERVER['REQUEST_URI'])[0];
// Next Steps: Consider making thumbnails of backgrounds
// Make a thumbnail of Dark Mode theme
// Add Save button with ajax to a php code that saves the selected theme's name in the user's settings
// Add the REDCap theme thumbnail

//var_dump($project_id);
//
//$module->setUserSetting("theme_selected", "forest123");
//$module->getUserSetting('theme_selected');
//var_dump($module->getUserSetting('theme_selected'));
?>
    /////////////////////////////////////////////////////////////////////////////////////////////

    <style>

        .responsive {
            width: 100%;
            max-width: 200px;
            height: auto;
        }

        [type=radio] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* IMAGE STYLES */
        [type=radio] + img {
            cursor: pointer;
        }

        /* CHECKED STYLES */
        [type=radio]:checked + img {
            -webkit-transition: all 0.30s ease-in-out;
            -moz-transition: all 0.30s ease-in-out;
            -ms-transition: all 0.30s ease-in-out;
            -o-transition: all 0.30s ease-in-out;
            outline: none;
            padding: 3px 0px 3px 3px;
            margin: 5px 1px 3px 0px;
            border: 5px solid rgba(81, 203, 238, 1);
        }

    </style>
    <body>

    <div>
        <label>
            <input type="radio" class = "theme" name="theme" id="theme_selected" value="dark_mode">
            <img class="responsive"
                 src="/redcap/redcap_v<?php print $redcap_version[0]; ?>/ExternalModules/?prefix=swiss_army&page=features/themes_hook/pics/aquarium.jpg">
        </label>
        <label>
            <input type="radio" class = "theme" name="theme" id="theme_selected" value="forest">
            <img class="responsive"
                 src="/redcap/redcap_v<?php print $redcap_version[0]; ?>/ExternalModules/?prefix=swiss_army&page=features/themes_hook/pics/forest.jpg">
        </label>
    </div>
    <div>
        <label>
            <input type="radio" class = "theme" name="theme" id="theme_selected" value="stars">
            <img class="responsive"
                 src="/redcap/redcap_v<?php print $redcap_version[0]; ?>/ExternalModules/?prefix=swiss_army&page=features/themes_hook/pics/stars.jpg">
        </label>
        <label>
            <input type="radio" class = "theme" name="theme" id="theme_selected" value="aquarium">
            <img class="responsive"
                 src="/redcap/redcap_v<?php print $redcap_version[0]; ?>/ExternalModules/?prefix=swiss_army&page=features/themes_hook/pics/aquarium.jpg">
        </label>
    </div>
    <div>
        <label>
            <input type="radio" class = "theme" name="theme" id="theme_selected" value="sunset">
            <img class="responsive"
                 src="/redcap/redcap_v<?php print $redcap_version[0]; ?>/ExternalModules/?prefix=swiss_army&page=features/themes_hook/pics/sunset2x2.jpg">
        </label>
        <label>
            <input type="radio" class = "theme" name="theme" id="theme_selected" value="tulips">
            <img class="responsive"
                 src="/redcap/redcap_v<?php print $redcap_version[0]; ?>/ExternalModules/?prefix=swiss_army&page=features/themes_hook/pics/tulips2x2.jpg">
        </label>
    </div>
    <div>
        <label>
            <input type="radio" class = "theme" name="theme" id="theme_selected" value="skulls">
            <img class="responsive"
                 src="/redcap/redcap_v<?php print $redcap_version[0]; ?>/ExternalModules/?prefix=swiss_army&page=features/themes_hook/pics/skullline3x3.jpg">
        </label>
        <label>
            <input type="radio" class = "theme" name="theme" id="theme_selected" value="redcap">
            <img class="responsive"
                 src="/redcap/redcap_v<?php print $redcap_version[0]; ?>/ExternalModules/?prefix=swiss_army&page=features/themes_hook/pics/skullline3x3.jpg">
        </label>
    </div>


    <div>
        <button class="btn btn-primaryrc" id="save_button" name="submit-btn-saverecord" style="margin-bottom:2px;font-size:13px !important;padding:6px 8px;" tabindex="0">Save Selection</button>
    </div>


    <script>
        // the save button must refesh after saving the settings
        $(document).ready(function() {
            $('#save_button').click( function() {
                $.ajax({type: "POST",
                    data: "pid=<?php echo htmlspecialchars($project_id)?>"
                        +"&theme_selected=" + $(".theme:checked").val() ,
                url:'/..<?php print htmlspecialchars($URI)?>?prefix=swiss_army&page=features/themes_ui/save_settings.php&pid=<?php echo htmlspecialchars($project_id)?>',
                    success: function (result){
                    location.reload();
                }, error: function(XMLHttpRequest, textStatus, errorThrown) {
                    $('#loadingDiv').hide();
                    alert("some error \n"  +
                        "XMLHttpRequest: "  + XMLHttpRequest +
                        "\ntextStatus: " + textStatus +
                        "\nerrorThrown: " + errorThrown);
                }
            });
                return false;
            } );
        } );
    </script>

    </body>


    <?php

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
                        "form_1_complete" => "2")
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