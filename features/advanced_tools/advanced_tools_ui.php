<?php
namespace Partners\swiss_army;

use \REDCap as REDCap;
use \ExternalModules\AbstractExternalModule as AEM;
//
global $Proj;
require_once "../../redcap_connect.php";

require_once APP_PATH_DOCROOT . 'ProjectGeneral/header.php';

// Loading submenu
$config_ulr =  __DIR__.'/config.json';
$contents = file_get_contents($config_ulr);
$contents = utf8_encode($contents);
$config = json_decode($contents, true);
require_once "base/submenu.php";

// Getting actual plugin link
$url_foo = $module -> getUrl('explanation_of_tools.php');
$url_bar = explode("&page=", $url_foo);
$url_t = $url_bar[0] . '&page=features/advanced_tools/explanation_of_tools.php&pid='.$Proj->project_id;

// Plugin description
print "<div style=\"max-width:800px;text-align:right;margin:5px 0 15px;\">
<p> {$config['description'][$lang]}</p>
</div>";

// Explanation of Tools
print "<div style=\"max-width:800px;\">			<div id=\"setupChklist-modify_project\" class=\"round chklist col-12\">
				<table cellspacing=\"0\" width=\"100%\">
					<tbody><tr>

						<td valign=\"top\" style=\"padding-left:30px;\">
							<div class=\"chklisthdr\">
								<span><i class=\"fas\"></i> {$config['explanation-label'][$lang]}</span>
							</div>
							<div class=\"chklisttext\">
								{$config['explanation'][$lang]}
				<div class=\"chklistbtn\">
					{$config['goto'][$lang]}&nbsp;
					<button class=\"btn btn-defaultrc btn-xs fs13\" onclick=\"window.location.href='{$url_t}';\">{$config['goto-link'][$lang]}</button>
				</div>							</div>
						</td>
					</tr>
				</tbody></table>
				</div>";

// Advanced Tools: Plugin section
print "	<div id=\"setupChklist-modules\" class=\"round chklist col-12\">
				<table cellspacing=\"0\" width=\"100%\">
					<tbody><tr>
						<td valign=\"top\" style=\"padding-left:30px;\">
							<div class=\"chklisthdr\">
								<span><i class=\"fas fa-wrench fs14\"></i> {$config['pluings-label'][$lang]}</span>
							</div>
							";

// Generating list of Plugins and their short descriptions
foreach (scandir("../../modules/swiss_army_$module->VERSION/features/") as $folder){
    if (!in_array($folder,array(".",".."))){
//      Find and read the hook's config.json
        $sub_url= "../../modules/swiss_army_$module->VERSION/features/".$folder; // @here
        foreach(scandir($sub_url) as $file){
            if ($file == 'config.json') {
                $config_ulr =  "../../modules/swiss_army_$module->VERSION/features/".$folder.'/'.$file;
                $contents = file_get_contents($config_ulr);
                $contents = utf8_encode($contents);
                $config_x = json_decode($contents, true);
//              Include hook if it has been enabled on the Ext-Mod config
//              - other conditions can be added too.
                if($config_x['name'] != 'advanced-tools' and $module->getProjectSetting($config_x['name']) == true and $config_x['type'] == 'plugin'){
                    $url_p = $url_bar[0] . '&page=features/'.$config_x['main_folder_name'] .'/'. $config_x['main_file_name'].'&pid='.$Proj->project_id;
                    print "<div class=\"chklisttext\">
                            <button class=\"btn btn-defaultrc btn-xs fs13\" onclick=\"window.location.href='{$url_p}';\">{$config['goto'][$lang]} UI</button>
	                           <i class=\"ml-1 fas\" style=\"text-indent:0;\"></i> {$config_x['short-description'][$lang]}<a href=\"\" class=\"help\" title=\"{$config_x['help-tool-tip'][$lang]}\" >?</a>
	                        </div>";
                }
            }
        }
    }
}

print "</div>							
		</td>
		</tr>
	    </tbody></table>
		</div>";

require_once APP_PATH_DOCROOT . 'ProjectGeneral/footer.php';

?>