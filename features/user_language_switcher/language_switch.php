<?php
use ExternalModules\AbstractExternalModule;
use ExternalModules\ExternalModules;

use \Language;

$next_page = $module->getUrl("languages_list",false,true);
$next_page = str_replace("api/?type=module&","redcap_v" . $GLOBALS["redcap_version"] . "/ExternalModules/?", $next_page);
$next_page = $next_page . "&lang=" . $code . "&pid=" . @$_GET['pid'] ;
								
$preferred_language = isset($_GET["lang"]) ? $_GET["lang"] : trim($GLOBALS['language_global']);

if ($preferred_language!=trim($GLOBALS['language_global'])) {
	
	if (array_key_exists($preferred_language,Language::getLanguageList())) {
		$module->setUserSetting("UserLanguageSwitcher_lang", $preferred_language);
		$GLOBALS['language_global'] = $preferred_language;
		$GLOBALS['lang'] = Language::getLanguage($preferred_language);
		$_SESSION["UserLanguageSwitcher_lang"] = $preferred_language;
		
		if (isset($_SERVER["HTTP_REFERER"])) {
			$next_page = $_SERVER["HTTP_REFERER"];
		}
	}
}
header("location:" . $next_page );
?>
