<?php
namespace Partners\swiss_army;
use ExternalModules\AbstractExternalModule as AEM;
global $Proj;

if(PAGE == 'Design/online_designer.php') {

    $lang = $this->getProjectSetting('language');

    $config_ulr = __DIR__ . '/config.json';
    $contents = file_get_contents($config_ulr);
    $contents = utf8_encode($contents);
    $config = json_decode($contents, true);

    $url_foo = AEM::getUrl('advanced_tools_ui.php');
    $url_bar = explode("&page=", $url_foo);
    $url = $url_bar[0] . '&page=features/advanced_tools/advanced_tools_ui.php&pid=' . $Proj->project_id;
    $url_im = $url_bar[0] . '&page=features/advanced_tools/icons/idea16x16.png';
    
    $script = <<<SCRIPT
<script type="text/javascript"> 
                    $(document).ready(function() {
                        $("#sub-nav ul li").last().after("<li><a href={$url} style=font-size:13px;color:#393733;padding:7px 9px;> <img src={$url_im} style=height:16px;width:16px;margin-bottom:-1px;> {$config['tab-label'][$lang]}</a></li>");
                        });
            </script>
SCRIPT;
}
print $script;
?>