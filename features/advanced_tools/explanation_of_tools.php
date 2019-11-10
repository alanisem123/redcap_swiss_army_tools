<?php
namespace Partners\swiss_army;

//var_dump(APP_PATH_WEBROOT_FULL);

use \REDCap as REDCap;
use \ExternalModules\AbstractExternalModule as AEM;

require_once "../../redcap_connect.php";

require_once APP_PATH_DOCROOT . 'ProjectGeneral/header.php';

if (!isset($lang) OR empty($lang)){
    $lang = 'ENG';
}

// Loading submenu
$config_ulr =  __DIR__.'/config.json';
$contents = file_get_contents($config_ulr);
$contents = utf8_encode($contents);
$config = json_decode($contents, true);
require_once "base/submenu.php";

// Adding top level label
print "<div style=\"max-width:800px;text-align:right;margin:5px 0 15px;\">
<p><b>{$config['explanation-label'][$lang]}</b></p>
</div>";
// Adding one explanation for each hook/plugin
foreach (scandir("../../modules/swiss_army_$module->VERSION/features/") as $folder){
    if (!in_array($folder,array(".",".."))){
//      Find and read the hook's/plugin config.json
        $sub_url= "../../modules/swiss_army_$module->VERSION/features/".$folder;
        foreach(scandir($sub_url) as $file){
            if ($file == 'config.json') {
//              Reading hook/plugin config for getting their explanation
                $config_ulr =  "../../modules/swiss_army_$module->VERSION/features/".$folder.'/'.$file;
                $contents = file_get_contents($config_ulr);
                $contents = utf8_encode($contents);
                $config_x = json_decode($contents, true);
//              Include hook/plugin if it has been enabled on the Ext-Mod config
//              - other conditions can be added too.
                if($module->getProjectSetting($config_x['name']) == true){
//                  Reading the Advanced Tools config for getting UI labels
                    $config_ulr =  __DIR__.'/config.json';
                    $contents = file_get_contents($config_ulr);
                    $contents = utf8_encode($contents);
                    $config= json_decode($contents, true);
                    print "<div style=\"max-width:800px;\">			<div id=\"setupChklist-modify_project\" class=\"round chklist col-12\">
				<table cellspacing=\"0\" width=\"100%\">
					<tbody><tr>
						
						<td valign=\"top\" style=\"padding-left:30px;\">
							<div class=\"chklisthdr\">
								<span><i class=\"fas\"></i>{$config['tool-name'][$lang]} {$config_x['display_name']} | {$config['Type'][$lang]} {$config_x['type']} <br> {$config['Author'][$lang]} {$config_x['author-sign']}</span>
							</div>
							<div class=\"chklisttext\">
								<b>{$config['Description-word'][$lang]}</b> {$config_x['description'][$lang]}<br>
							</div>
						</td>
					</tr>
				</tbody></table>
				</div>";
                }
            }
        }
    }
}

require_once APP_PATH_DOCROOT . 'ProjectGeneral/footer.php';
?>