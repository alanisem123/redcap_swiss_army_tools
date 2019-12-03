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

//var_dump($module->VERSION);

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
$URI = explode("?", $_SERVER['REQUEST_URI'])[0];
// Next Steps: Consider making thumbnails of backgrounds
// Make a thumbnail of Dark Mode theme
// Add Save button with ajax to a php code that saves the selected theme's name in the user's settings
// Add the REDCap theme thumbnail

//var_dump($project_id);

?>

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

    <center>
        <div>
            <p>
                <?php print $config_p['description'][$lang]?>
            </p>
        </div>
        <div>
            <label>
                <input type="radio" class="theme" name="theme" id="theme_selected" value="dark_mode">
                <img class="responsive"
                     src="/redcap/redcap_v<?php print $redcap_version[0]; ?>/ExternalModules/?prefix=swiss_army&page=features/themes_hook/pics/darkmode.png"
                     title="Dark Mode">
            </label>
            <label>
                <input type="radio" class="theme" name="theme" id="theme_selected" value="forest">
                <img class="responsive"
                     src="/redcap/redcap_v<?php print $redcap_version[0]; ?>/ExternalModules/?prefix=swiss_army&page=features/themes_hook/pics/forest.jpg"
                     title="Forest">
            </label>
        </div>
        <div>
            <label>
                <input type="radio" class="theme" name="theme" id="theme_selected" value="stars">
                <img class="responsive"
                     src="/redcap/redcap_v<?php print $redcap_version[0]; ?>/ExternalModules/?prefix=swiss_army&page=features/themes_hook/pics/stars.jpg"
                     title="Stars">
            </label>
            <label>
                <input type="radio" class="theme" name="theme" id="theme_selected" value="aquarium">
                <img class="responsive"
                     src="/redcap/redcap_v<?php print $redcap_version[0]; ?>/ExternalModules/?prefix=swiss_army&page=features/themes_hook/pics/aquarium.jpg"
                     title="Aquarium">
            </label>
        </div>
        <div>
            <label>
                <input type="radio" class="theme" name="theme" id="theme_selected" value="sunset">
                <img class="responsive"
                     src="/redcap/redcap_v<?php print $redcap_version[0]; ?>/ExternalModules/?prefix=swiss_army&page=features/themes_hook/pics/sunset2x2.jpg"
                     title="Sunset">
            </label>
            <label>
                <input type="radio" class="theme" name="theme" id="theme_selected" value="tulips">
                <img class="responsive"
                     src="/redcap/redcap_v<?php print $redcap_version[0]; ?>/ExternalModules/?prefix=swiss_army&page=features/themes_hook/pics/tulips2x2.jpg"
                     title="Tulips">
            </label>
        </div>
        <div>
            <label>
                <input type="radio" class="theme" name="theme" id="theme_selected" value="skulls">
                <img class="responsive"
                     src="/redcap/redcap_v<?php print $redcap_version[0]; ?>/ExternalModules/?prefix=swiss_army&page=features/themes_hook/pics/skullline3x3.jpg"
                     title="Skulls">
            </label>
            <label>
                <input type="radio" class="theme" name="theme" id="theme_selected" value="redcap">
                <img class="responsive"
                     src="/redcap/redcap_v<?php print $redcap_version[0]; ?>/ExternalModules/?prefix=swiss_army&page=features/themes_hook/pics/redcap.jpg"
                     title="REDCap">
            </label>
        </div>


        <div>
            <button class="btn btn-primaryrc" id="save_button" name="submit-btn-saverecord"
                    style="margin-bottom:2px;font-size:13px !important;padding:6px 8px;" tabindex="0"><?php print $config_p['save-button-label'][$lang]?>
            </button>
        </div>
    </center>

    <script>

        $(document).ready(function () {
            $('#save_button').click(function () {
                $.ajax({
                    type: "POST",
                    data: "pid=<?php echo htmlspecialchars($project_id)?>"
                        + "&theme_selected=" + $(".theme:checked").val(),
                    url: '/..<?php print htmlspecialchars($URI)?>?prefix=swiss_army&page=features/themes_ui/save_settings.php&pid=<?php echo htmlspecialchars($project_id)?>',
                    success: function (result) {
                        location.reload();
                    }, error: function (XMLHttpRequest, textStatus, errorThrown) {
                        $('#loadingDiv').hide();
                        alert("some error \n" +
                            "XMLHttpRequest: " + XMLHttpRequest +
                            "\ntextStatus: " + textStatus +
                            "\nerrorThrown: " + errorThrown);
                    }
                });
                return false;
            });
        });
    </script>

    </body>


    <?php
require_once APP_PATH_DOCROOT . 'ProjectGeneral/footer.php';
?>