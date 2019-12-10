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

print "<br><br>Example of Using language settings for labels: <br><br>";

print "{$config_p['description'][$lang]}";

/////////////////////////////////////////////////////////////////////////////////////////////
require_once APP_PATH_DOCROOT . 'ProjectGeneral/footer.php';
?>