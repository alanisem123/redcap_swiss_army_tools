<?php
namespace Partners\swiss_army;

use \REDCap as REDCap;
use \Project as Project;
use \ExternalModules\AbstractExternalModule as AEM;
use ExternalModules\ExternalModules;

$project_id = $_POST["pid"];
$theme = $_POST["theme_selected"];
var_dump("test");
var_dump($theme);
//if (!isset($project_id)) {
//    die('Project ID is a required field');
//}
$module->setUserSetting("theme_selected", $theme);
?>