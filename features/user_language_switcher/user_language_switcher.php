<?php

namespace Partners\swiss_army;

use ExternalModules\ExternalModules as EM;

//global $Proj;
use \Language;

switch($swiss_army_hook_name) {
	case "redcap_every_page_before_render":
		$lang = $this->getUserSetting("UserLanguageSwitcher_lang");
		if (!$lang) {
			$lang = isset($_SESSION["UserLanguageSwitcher_lang"]) ? $_SESSION["UserLanguageSwitcher_lang"] : $GLOBALS['language_global'];
		}
		if (array_key_exists($lang,Language::getLanguageList())) {
			$this->setUserSetting("UserLanguageSwitcher_lang", $lang);
			if ($GLOBALS['language_global']!=$lang) {
				$GLOBALS['language_global'] = $lang;
				$GLOBALS['lang'] = Language::getLanguage($lang);
			}
			$_SESSION["UserLanguageSwitcher_lang"] = $lang;			
		}
	break;
	case "redcap_every_page_top":
		if(count($_POST)==0) {
			$currentLanguage = trim($GLOBALS['language_global']);
			$languages = Language::getLanguageList();
			$additionalLangues = $languages;
			unset($additionalLangues[$currentLanguage]);
						
			if (count($additionalLangues)>0) {
				$botones = "<div class='btn-group nowrap' style='float:right;'>
				<button id='lang_switch-btn-placeholder' data-trigger='click' data-toggle='popover' data-placement='top' data-content='' title='' class='btn btn-primary btn-saveand' onclick='return false;' style='margin-bottom:2px;font-size:13px !important;padding:6px 8px;' tabindex='0' data-original-title='<b>Click the down arrow button to view more languages.</b>'>$currentLanguage</button>
				<button id='lang_switch-btn-dropdown' title='More languages' class='btn btn-primary btn-savedropdown dropdown-toggle' style='margin-bottom:2px;font-size:13px !important;padding:6px 8px;' tabindex='0' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' onclick='openSaveBtnDropDown(this,event);return false;'>
					<span class='caret'></span> <span class='sr-only'></span>
				</button>
				<ul class='dropdown-menu'>";
			
				foreach($additionalLangues as $code => $name) {
					$url = $this->getUrl("features/user_language_switcher/language_switch",false,true);
					$url = str_replace("api/?type=module&","redcap_v" . $GLOBALS["redcap_version"] . "/ExternalModules/?", $url);
					$url = $url . "&lang=" . $code . "&pid=" . $project_id ;
					$botones.="<li><a href='$url'>$name</a></li>";
				}
				$botones .= "		</ul>
									</div>
						";		

				$boton_listo = "\"" . str_replace("\n","",$botones) . "\"";
			$script = <<<SCRIPT
				<script>
				$(document).ready( function() {
					$("#subheaderDiv2").append({$boton_listo});
				});
				</script>
SCRIPT;

			print $script;

			}
		}
	break;
}