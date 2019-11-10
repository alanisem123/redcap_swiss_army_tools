<?php
namespace Partners\swiss_army;
global $Proj;
$lang = $module->getProjectSetting('language');
$url_foo = $module -> getUrl('advanced_tools_ui.php');
$url_bar = explode("&page=", $url_foo);
$url = $url_bar[0] . '&page=features/advanced_tools/advanced_tools_ui.php&pid='.$Proj->project_id;

$redcap_version = explode("_v", APP_PATH_DOCROOT);
$redcap_version = explode("/",$redcap_version[1]);

// Recreating submenu tabs
$page_tabs = "
 <div id=\"sub-nav\" class=\"project_setup_tabs d-none d-sm-block\">
	<ul>
				<li>
			<a href=\"/redcap/redcap_v{$redcap_version[0]}/index.php?pid={$Proj->project_id}\" style=\"font-size:13px;color:#393733;padding:7px 9px;\">
									<i class=\"fas fa-home\"></i>
								Project Home			</a>
		</li>
				<li>
			<a href=\"/redcap/redcap_v{$redcap_version[0]}/ProjectSetup/index.php?pid={$Proj->project_id}\" style=\"font-size:13px;color:#393733;padding:7px 9px;\">
									<img src=\"/redcap/redcap_v{$redcap_version[0]}/Resources/images/checklist_flat.png\" style=\"height:16px;width:16px;margin-bottom:-1px;\">
								Project Setup			</a>
		</li>
				<li >
			<a href=\"/redcap/redcap_v{$redcap_version[0]}/Design/online_designer.php?pid={$Proj->project_id}\" style=\"font-size:13px;color:#393733;padding:7px 9px;\">
									<img src=\"/redcap/redcap_v{$redcap_version[0]}/Resources/images/blog_pencil.png\" style=\"height:16px;width:16px;margin-bottom:-1px;\">
								Online Designer			</a>
		</li>
				<li>
			<a href=\"/redcap/redcap_v{$redcap_version[0]}/Design/data_dictionary_upload.php?pid={$Proj->project_id}\" style=\"font-size:13px;color:#393733;padding:7px 9px;\">
									<img src=\"/redcap/redcap_v{$redcap_version[0]}/Resources/images/xlsup.gif\" style=\"height:16px;width:16px;margin-bottom:-1px;\">
								Data Dictionary			</a>
		</li>
		        <li class=\"active\">
		    <a href=\"{$url}\" style=\"font-size:13px;color:#393733;padding:7px 9px;\">
		                            <img src=\"/redcap/redcap_v{$redcap_version[0]}/ExternalModules/?prefix=swiss_army&page=features/advanced_tools/icons/idea16x16.png\" style=height:16px;width:16px;margin-bottom:-1px;\"> {$config['tab-label'][$lang]}</a></li>

	</ul>
</div>
";

print "$page_tabs";
?>