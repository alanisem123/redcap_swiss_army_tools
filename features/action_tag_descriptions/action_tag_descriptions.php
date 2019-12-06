<?php

namespace Partners\swiss_army;

use ExternalModules\ExternalModules as EM;

global $Proj;

if (PAGE == 'Design/online_designer.php') {

    $lang = $this->getProjectSetting('language');

    $Version = EM::getModuleVersionByPrefix('swiss_army');

// Reading hooks config-settings. It is recommended that you leave this in place.
    $config_h_ulr = __DIR__ . '/config.json';
    $contents = file_get_contents($config_h_ulr);
    $contents = utf8_encode($contents);
    $config_h = json_decode($contents, true);

// Generating list of action-tags and their descriptions
    foreach (scandir("../../modules/swiss_army_$Version/features/") as $folder) {
        if (!in_array($folder, array(".", ".."))) {
//      Find and read the action-tags' config.json
            $sub_url = "../../modules/swiss_army_$Version/features/" . $folder; // @here
            foreach (scandir($sub_url) as $file) {
                if ($file == 'config.json') {
                    $config_ulr = "../../modules/swiss_army_$Version/features/" . $folder . '/' . $file;
                    $contents = file_get_contents($config_ulr);
                    $contents = utf8_encode($contents);
                    $config_x = json_decode($contents, true);
//              Include actiong tags that have been enabled on the Ext-Mod config
//              - other conditions can be added too.
                    if ($config_x['name'] != 'advanced-tools' and $this->getProjectSetting($config_x['name']) == true and $config_x['type'] == 'action-tag') {
                        $desc = $config_x['description'][$lang];
                        $author = $config_x['author-sign'];
                        $ATD = $desc . "<br> <b>Author: </b>" . $author;
                        $ATName = "@" . $config_x['display_name'];
                        $add = $config_h['add'][$lang];
                        $AT_default = $config_x['default'];

                        $script = <<<SCRIPT
<script type="text/javascript">

 document.addEventListener("DOMNodeInserted", function(event){
    var element = event.target;
    if (element.tagName == 'DIV') {
        if (element.id == 'action_tag_explain_popup') {
            // alert("My Element Is Ready!");
            $("#action_tag_explain_popup tr").last().after("<tr>" +
             "<td class='nowrap' style='text-align:center;background-color:#f5f5f5;color:#912B2B;padding:7px 15px 7px 12px;font-weight:bold;border:1px solid #ccc;border-bottom:0;border-right:0;'>" +
              "<button class='btn btn-xs btn-rcred' style='' " +
               "onclick=$('#field_annotation').val(('" +
                '$AT_default' +
                 "&nbsp;'+$('#field_annotation').val())); " +
                "highlightTableRowOb($(this).parentsUntil('tr').parent(),2500);'>" +
                 '$add' +
                  "</button></td>" +
                   "<td class='nowrap' style='background-color:#f5f5f5;color:#912B2B;padding:7px;font-weight:bold;border:1px solid #ccc;border-bottom:0;border-left:0;border-right:0;'>" +
                    '$ATName' +
                     "</td>" +
                     "<td style='font-size:12px;background-color:#f5f5f5;padding:7px;border:1px solid #ccc;border-bottom:0;border-left:0;'>" +
                      '$ATD' +
                       "</td>" +
                        "</tr>");
        }
    }
});
            </script>
SCRIPT;
//                    Adding only action tags to the Action Tag Description Window
                        print $script;
                    }
                }
            }
        }
    }
}
?>