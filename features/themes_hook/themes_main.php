<?php
namespace Partners\swiss_army;

use \REDCap as REDCap;
use \Project as Project;
use \ExternalModules\AbstractExternalModule as AEM;
use ExternalModules\ExternalModules as EM;
// Only run this code if the user has select a theme.
// The users settings are saved on the external module configuration table.
// Save the user settings with name of the css-theme so that it can be read from the
// configuration table nd added straight to the required file.
// If there is not setting saved, no css-theme should be included.
// In turn, this will show the REDCap theme.

$valid_themes = array("dark_mode","terra_mode","stars","sunset","skulls");
$theme = AEM::getUserSetting('theme_selected');

//var_dump(list($prefix, $version) = EM::getParseModuleDirectoryPrefixAndVersion(AEM::getModuleDirectoryName()));

if (isset($theme) & in_array($theme, $valid_themes)) {
    $full_theme =  "themes_css/{$theme}.php";
    require_once $full_theme;
}

?>