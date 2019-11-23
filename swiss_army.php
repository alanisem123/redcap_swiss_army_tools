<?php
namespace Partners\swiss_army;

use \REDCap as REDCap;
use ExternalModules\AbstractExternalModule;
global $Proj;


class swiss_army extends \ExternalModules\AbstractExternalModule
{

    const PATH_TO_HOOKS = 'features/';

    function redcap_add_edit_records_page($project_id, $instrument, $event_id)
    {
        //        Read all files that contain hooks - they are found in folders inside hooks
        $url= __DIR__.'/'.$this::PATH_TO_HOOKS;
        foreach (scandir($url) as $folder){
            if (!in_array($folder,array(".",".."))){
//              Find and read the hook's config.json
                $sub_url= __DIR__.'/'.$this::PATH_TO_HOOKS.'/'.$folder;
                foreach(scandir($sub_url) as $file){
                    if ($file == 'config.json') {
                        $config_ulr =  __DIR__.'/'.$this::PATH_TO_HOOKS.$folder.'/'.$file;
                        $contents = file_get_contents($config_ulr);
                        $contents = utf8_encode($contents);
                        $config = json_decode($contents, true);
//                      Identify its main file
                        $main_ulr =  __DIR__.'/'.$this::PATH_TO_HOOKS.$folder.'/'.$config['main_file_name'];
//                        Include hook if it has been enabled on the Ext-Mod config
//                        - and if the hook is using THIS REDCap Hooks function
//                        - and if file exists ( if(!@include("script.php")))
//                        - and if its configured to be loaded on the current page
//                        - other conditions can be added too.
                        if($this->getProjectSetting($config['name']) == true & $config['redcap_add_edit_records_page'] == 'true'){
                            if(!@include_once($main_ulr));
                        }
                    }
                }
            }
        }
    }

//    em42: do not include this function - leave it for future release
//    function redcap_control_center()
//    {
//        //        Read all files that contain hooks - they are found in folders inside hooks
//        $url= __DIR__.'/'.$this::PATH_TO_HOOKS;
//        foreach (scandir($url) as $folder){
//            if (!in_array($folder,array(".",".."))){
////              Find and read the hook's config.json
//                $sub_url= __DIR__.'/'.$this::PATH_TO_HOOKS.'/'.$folder;
//                foreach(scandir($sub_url) as $file){
//                    if ($file == 'config.json') {
//                        $config_ulr =  __DIR__.'/'.$this::PATH_TO_HOOKS.$folder.'/'.$file;
//                        $contents = file_get_contents($config_ulr);
//                        $contents = utf8_encode($contents);
//                        $config = json_decode($contents, true);
////                      Identify its main file
//                        $main_ulr =  __DIR__.'/'.$this::PATH_TO_HOOKS.$folder.'/'.$config['main_file_name'];
////                        Include hook if it has been enabled on the Ext-Mod config
////                        - and if the hook is using THIS REDCap Hooks function
////                        - and if file exists ( if(!@include("script.php")))
////                        - and if its configured to be loaded on the current page
////                        - other conditions can be added too.
//                        if($this->getProjectSetting($config['name']) == true & $config['redcap_control_center'] == 'true'){
//                            if(!@include_once($main_ulr));
//                        }
//                    }
//                }
//            }
//        }
//    }

//    em42: do not include this function - leave it for future release
//    function redcap_custom_verify_username($username)
//    {
//        //        Read all files that contain hooks - they are found in folders inside hooks
//        $url= __DIR__.'/'.$this::PATH_TO_HOOKS;
//        foreach (scandir($url) as $folder){
//            if (!in_array($folder,array(".",".."))){
////              Find and read the hook's config.json
//                $sub_url= __DIR__.'/'.$this::PATH_TO_HOOKS.'/'.$folder;
//                foreach(scandir($sub_url) as $file){
//                    if ($file == 'config.json') {
//                        $config_ulr =  __DIR__.'/'.$this::PATH_TO_HOOKS.$folder.'/'.$file;
//                        $contents = file_get_contents($config_ulr);
//                        $contents = utf8_encode($contents);
//                        $config = json_decode($contents, true);
////                      Identify its main file
//                        $main_ulr =  __DIR__.'/'.$this::PATH_TO_HOOKS.$folder.'/'.$config['main_file_name'];
////                        Include hook if it has been enabled on the Ext-Mod config
////                        - and if the hook is using THIS REDCap Hooks function
////                        - and if file exists ( if(!@include("script.php")))
////                        - and if its configured to be loaded on the current page
////                        - other conditions can be added too.
//                        if($this->getProjectSetting($config['name']) == true & $config['redcap_custom_verify_username'] == 'true'){
//                            if(!@include_once($main_ulr));
//                        }
//                    }
//                }
//            }
//        }
//    }

    function redcap_data_entry_form($project_id, $record, $instrument, $event_id, $group_id, $repeat_instance)
    {
        //        Read all files that contain hooks - they are found in folders inside hooks
        $url= __DIR__.'/'.$this::PATH_TO_HOOKS;
        foreach (scandir($url) as $folder){
            if (!in_array($folder,array(".",".."))){
//              Find and read the hook's config.json
                $sub_url= __DIR__.'/'.$this::PATH_TO_HOOKS.'/'.$folder;
                foreach(scandir($sub_url) as $file){
                    if ($file == 'config.json') {
                        $config_ulr =  __DIR__.'/'.$this::PATH_TO_HOOKS.$folder.'/'.$file;
                        $contents = file_get_contents($config_ulr);
                        $contents = utf8_encode($contents);
                        $config = json_decode($contents, true);
//                      Identify its main file
                        $main_ulr =  __DIR__.'/'.$this::PATH_TO_HOOKS.$folder.'/'.$config['main_file_name'];
//                        Include hook if it has been enabled on the Ext-Mod config
//                        - and if the hook is using THIS REDCap Hooks function
//                        - and if file exists ( if(!@include("script.php")))
//                        - and if its configured to be loaded on the current page
//                        - other conditions can be added too.
                        if($this->getProjectSetting($config['name']) == true & $config['redcap_data_entry_form'] == 'true'){
                            if(!@include_once($main_ulr));
                        }
                    }
                }
            }
        }
    }

    function redcap_data_entry_form_top($project_id, $record, $instrument, $event_id, $group_id, $repeat_instance)
    {
        //        Read all files that contain hooks - they are found in folders inside hooks
        $url= __DIR__.'/'.$this::PATH_TO_HOOKS;
        foreach (scandir($url) as $folder){
            if (!in_array($folder,array(".",".."))){
//              Find and read the hook's config.json
                $sub_url= __DIR__.'/'.$this::PATH_TO_HOOKS.'/'.$folder;
                foreach(scandir($sub_url) as $file){
                    if ($file == 'config.json') {
                        $config_ulr =  __DIR__.'/'.$this::PATH_TO_HOOKS.$folder.'/'.$file;
                        $contents = file_get_contents($config_ulr);
                        $contents = utf8_encode($contents);
                        $config = json_decode($contents, true);
//                      Identify its main file
                        $main_ulr =  __DIR__.'/'.$this::PATH_TO_HOOKS.$folder.'/'.$config['main_file_name'];
//                        Include hook if it has been enabled on the Ext-Mod config
//                        - and if the hook is using THIS REDCap Hooks function
//                        - and if file exists ( if(!@include("script.php")))
//                        - and if its configured to be loaded on the current page
//                        - other conditions can be added too.
                        if($this->getProjectSetting($config['name']) == true & $config['redcap_data_entry_form_top'] == 'true'){
                            if(!@include_once($main_ulr));
                        }
                    }
                }
            }
        }
    }



//    em42: do not include this function - leave it for future release
//    function redcap_every_page_before_render($project_id)
//    {
//        //        Read all files that contain hooks - they are found in folders inside hooks
//        $url= __DIR__.'/'.$this::PATH_TO_HOOKS;
//        foreach (scandir($url) as $folder){
//            if (!in_array($folder,array(".",".."))){
////              Find and read the hook's config.json
//                $sub_url= __DIR__.'/'.$this::PATH_TO_HOOKS.'/'.$folder;
//                foreach(scandir($sub_url) as $file){
//                    if ($file == 'config.json') {
//                        $config_ulr =  __DIR__.'/'.$this::PATH_TO_HOOKS.$folder.'/'.$file;
//                        $contents = file_get_contents($config_ulr);
//                        $contents = utf8_encode($contents);
//                        $config = json_decode($contents, true);
////                      Identify its main file
//                        $main_ulr =  __DIR__.'/'.$this::PATH_TO_HOOKS.$folder.'/'.$config['main_file_name'];
////                        Include hook if it has been enabled on the Ext-Mod config
////                        - and if the hook is using THIS REDCap Hooks function
////                        - and if file exists ( if(!@include("script.php")))
////                        - and if its configured to be loaded on the current page
////                        - other conditions can be added too.
//                        if($this->getProjectSetting($config['name']) == true & $config['redcap_every_page_top'] == 'true'){
//                            if(!@include_once($main_ulr));
//                        }
//                    }
//                }
//            }
//        }
//    }


    function redcap_every_page_top($project_id)
    {
        //        Read all files that contain hooks - they are found in folders inside hooks
        $url= __DIR__.'/'.$this::PATH_TO_HOOKS;
        foreach (scandir($url) as $folder){
            if (!in_array($folder,array(".",".."))){
//              Find and read the hook's config.json
                $sub_url= __DIR__.'/'.$this::PATH_TO_HOOKS.'/'.$folder;
                foreach(scandir($sub_url) as $file){
                    if ($file == 'config.json') {
                        $config_ulr =  __DIR__.'/'.$this::PATH_TO_HOOKS.$folder.'/'.$file;
                        $contents = file_get_contents($config_ulr);
                        $contents = utf8_encode($contents);
                        $config = json_decode($contents, true);
//                      Identify its main file
                        $main_ulr =  __DIR__.'/'.$this::PATH_TO_HOOKS.$folder.'/'.$config['main_file_name'];
//                        Include hook if it has been enabled on the Ext-Mod config
//                        - and if the hook is using THIS REDCap Hooks function
//                        - and if file exists ( if(!@include("script.php")))
//                        - and if its configured to be loaded on the current page
//                        - other conditions can be added too.
                        if($this->getProjectSetting($config['name']) == true & $config['redcap_every_page_top'] == 'true'
                            & PAGE == $config['page']){
                            if(!@include_once($main_ulr));
                        }
                    }
                }
            }
        }
    }



    function redcap_project_home_page($project_id) {
//        Read all files that contain hooks - they are found in folders inside hooks/
        $url= __DIR__.'/'.$this::PATH_TO_HOOKS;
        foreach (scandir($url) as $folder){
            if (!in_array($folder,array(".",".."))){
//              Find and read the hook's config.json
                $sub_url= __DIR__.'/'.$this::PATH_TO_HOOKS.'/'.$folder;
                foreach(scandir($sub_url) as $file){
                    if ($file == 'config.json') {
                        $config_ulr =  __DIR__.'/'.$this::PATH_TO_HOOKS.$folder.'/'.$file;
                        $contents = file_get_contents($config_ulr);
                        $contents = utf8_encode($contents);
                        $config = json_decode($contents, true);
//                      Identify its main file
                        $main_ulr =  __DIR__.'/'.$this::PATH_TO_HOOKS.$folder.'/'.$config['main_file_name'];
//                        Include hook if it has been enabled on the Ext-Mod config
//                        - and if the hook is using THIS REDCap Hooks function
//                        - and if file exists ( if(!@include("script.php")))
//                        - other conditions can be added too.
                        if($this->getProjectSetting($config['name']) == true & $config['redcap_project_home_page'] == 'true' & isset($project_id)){
                            if(!@include_once($main_ulr));
                        }
                    }
                }
            }
        }
    }

    function redcap_save_record($project_id, $record, $instrument, $event_id, $group_id, $survey_hash, $response_id, $repeat_instance) {
//        Read all files that contain hooks - they are found in folders inside hooks/
        $url= __DIR__.'/'.$this::PATH_TO_HOOKS;
        foreach (scandir($url) as $folder){
            if (!in_array($folder,array(".",".."))){
//              Find and read the hook's config.json
                $sub_url= __DIR__.'/'.$this::PATH_TO_HOOKS.'/'.$folder;
                foreach(scandir($sub_url) as $file){
                    if ($file == 'config.json') {
                        $config_ulr =  __DIR__.'/'.$this::PATH_TO_HOOKS.$folder.'/'.$file;
                        $contents = file_get_contents($config_ulr);
                        $contents = utf8_encode($contents);
                        $config = json_decode($contents, true);
//                      Identify its main file
                        $main_ulr =  __DIR__.'/'.$this::PATH_TO_HOOKS.$folder.'/'.$config['main_file_name'];
//                        Include hook if it has been enabled on the Ext-Mod config
//                        - and if the hook is using THIS REDCap Hooks function
//                        - and if file exists ( if(!@include("script.php")))
//                        - other conditions can be added too.
                        if($this->getProjectSetting($config['name']) == true & $config['redcap_save_record'] == 'true' & isset($project_id)){
                            if(!@include_once($main_ulr));
                        }
                    }
                }
            }
        }
    }

    function redcap_survey_complete($project_id, $record, $instrument, $event_id, $group_id, $survey_hash, $response_id, $repeat_instance) {
//        Read all files that contain hooks - they are found in folders inside hooks/
        $url= __DIR__.'/'.$this::PATH_TO_HOOKS;
        foreach (scandir($url) as $folder){
            if (!in_array($folder,array(".",".."))){
//              Find and read the hook's config.json
                $sub_url= __DIR__.'/'.$this::PATH_TO_HOOKS.'/'.$folder;
                foreach(scandir($sub_url) as $file){
                    if ($file == 'config.json') {
                        $config_ulr =  __DIR__.'/'.$this::PATH_TO_HOOKS.$folder.'/'.$file;
                        $contents = file_get_contents($config_ulr);
                        $contents = utf8_encode($contents);
                        $config = json_decode($contents, true);
//                      Identify its main file
                        $main_ulr =  __DIR__.'/'.$this::PATH_TO_HOOKS.$folder.'/'.$config['main_file_name'];
//                        Include hook if it has been enabled on the Ext-Mod config
//                        - and if the hook is using THIS REDCap Hooks function
//                        - and if file exists ( if(!@include("script.php")))
//                        - other conditions can be added too.
                        if($this->getProjectSetting($config['name']) == true & $config['redcap_survey_complete'] == 'true' & isset($project_id)){
                            if(!@include_once($main_ulr));
                        }
                    }
                }
            }
        }
    }

    function redcap_survey_page($project_id, $record, $instrument, $event_id, $group_id, $survey_hash, $response_id, $repeat_instance) {
//        Read all files that contain hooks - they are found in folders inside hooks/
        $url= __DIR__.'/'.$this::PATH_TO_HOOKS;
        foreach (scandir($url) as $folder){
            if (!in_array($folder,array(".",".."))){
//              Find and read the hook's config.json
                $sub_url= __DIR__.'/'.$this::PATH_TO_HOOKS.'/'.$folder;
                foreach(scandir($sub_url) as $file){
                    if ($file == 'config.json') {
                        $config_ulr =  __DIR__.'/'.$this::PATH_TO_HOOKS.$folder.'/'.$file;
                        $contents = file_get_contents($config_ulr);
                        $contents = utf8_encode($contents);
                        $config = json_decode($contents, true);
//                      Identify its main file
                        $main_ulr =  __DIR__.'/'.$this::PATH_TO_HOOKS.$folder.'/'.$config['main_file_name'];
//                        Include hook if it has been enabled on the Ext-Mod config
//                        - and if the hook is using THIS REDCap Hooks function
//                        - and if file exists ( if(!@include("script.php")))
//                        - other conditions can be added too.
                        if($this->getProjectSetting($config['name']) == true & $config['redcap_survey_page'] == 'true' & isset($project_id)){
                            if(!@include_once($main_ulr));
                        }
                    }
                }
            }
        }
    }

    function redcap_survey_page_top($project_id, $record, $instrument, $event_id, $group_id, $survey_hash, $response_id, $repeat_instance) {
//        Read all files that contain hooks - they are found in folders inside hooks/
        $url= __DIR__.'/'.$this::PATH_TO_HOOKS;
        foreach (scandir($url) as $folder){
            if (!in_array($folder,array(".",".."))){
//              Find and read the hook's config.json
                $sub_url= __DIR__.'/'.$this::PATH_TO_HOOKS.'/'.$folder;
                foreach(scandir($sub_url) as $file){
                    if ($file == 'config.json') {
                        $config_ulr =  __DIR__.'/'.$this::PATH_TO_HOOKS.$folder.'/'.$file;
                        $contents = file_get_contents($config_ulr);
                        $contents = utf8_encode($contents);
                        $config = json_decode($contents, true);
//                      Identify its main file
                        $main_ulr =  __DIR__.'/'.$this::PATH_TO_HOOKS.$folder.'/'.$config['main_file_name'];
//                        Include hook if it has been enabled on the Ext-Mod config
//                        - and if the hook is using THIS REDCap Hooks function
//                        - and if file exists ( if(!@include("script.php")))
//                        - other conditions can be added too.
                        if($this->getProjectSetting($config['name']) == true & $config['redcap_survey_page_top'] == 'true' & isset($project_id)){
                            if(!@include_once($main_ulr));
                        }
                    }
                }
            }
        }
    }

    function redcap_user_rights($project_id) {
//        Read all files that contain hooks - they are found in folders inside hooks/
        $url= __DIR__.'/'.$this::PATH_TO_HOOKS;
        foreach (scandir($url) as $folder){
            if (!in_array($folder,array(".",".."))){
//              Find and read the hook's config.json
                $sub_url= __DIR__.'/'.$this::PATH_TO_HOOKS.'/'.$folder;
                foreach(scandir($sub_url) as $file){
                    if ($file == 'config.json') {
                        $config_ulr =  __DIR__.'/'.$this::PATH_TO_HOOKS.$folder.'/'.$file;
                        $contents = file_get_contents($config_ulr);
                        $contents = utf8_encode($contents);
                        $config = json_decode($contents, true);
//                      Identify its main file
                        $main_ulr =  __DIR__.'/'.$this::PATH_TO_HOOKS.$folder.'/'.$config['main_file_name'];
//                        Include hook if it has been enabled on the Ext-Mod config
//                        - and if the hook is using THIS REDCap Hooks function
//                        - and if file exists ( if(!@include("script.php")))
//                        - other conditions can be added too.
                        if($this->getProjectSetting($config['name']) == true & $config['redcap_user_rights'] == 'true' & isset($project_id)){
                            if(!@include_once($main_ulr));
                        }
                    }
                }
            }
        }
    }

}
