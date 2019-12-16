<?php
namespace Partners\swiss_army;

use \REDCap as REDCap;
use ExternalModules\AbstractExternalModule;
global $Proj;


class swiss_army extends \ExternalModules\AbstractExternalModule
{

    const PATH_TO_HOOKS = 'features/';

	function getFunctionArgsAndValues($function, $values=[]) {
		$result = array();
		if ($function!="") {
			$f = new \ReflectionMethod(get_class($this),$function);
			if($f && property_exists($f,'name') && $f->name!='') {
				$parameters = $f->getParameters();		
				for($i=0; $i < count($parameters); $i++) {
					$result[$parameters[$i]->name] = isset($values[$i]) ? $values[$i] : null;
				}
			}
		}
		return($result);
	}	

    function swiss_army_include_hook_files($swiss_army_hook_name, $args, $check_pid = false)
    {
		$callerArgs = $this->getFunctionArgsAndValues(debug_backtrace()[1]['function'], $args);

		// create local variables from $args parameter
		foreach($callerArgs as $arg => $value) {
			$$arg = $value;
		}

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
                        if($this->getProjectSetting($config['name']) == true && $config[$swiss_army_hook_name] == 'true' && (!$check_pid || isset($project_id))){
                            if(!@include($main_ulr));
                        }
                    }
                }
            }
        }
    }
	
    function redcap_add_edit_records_page($project_id, $instrument, $event_id)
    {
		$args = func_get_args();
		$this->swiss_army_include_hook_files('redcap_add_edit_records_page', $args);
    }

//    em42: do not include this function - leave it for future release
//    function redcap_control_center()
//    {
//        $this->swiss_army_include_hook_files(__FUNCTION__, func_get_args());
//    }


//    em42: do not include this function - leave it for future release
//    function redcap_custom_verify_username($username)
//    {
//        $this->swiss_army_include_hook_files(__FUNCTION__, func_get_args());
//    }


    function redcap_data_entry_form($project_id, $record, $instrument, $event_id, $group_id, $repeat_instance)
    {
        $this->swiss_army_include_hook_files(__FUNCTION__, func_get_args());
    }


    function redcap_data_entry_form_top($project_id, $record, $instrument, $event_id, $group_id, $repeat_instance)
    {
        $this->swiss_army_include_hook_files(__FUNCTION__, func_get_args());
    }


    function redcap_every_page_before_render($project_id)
    {
        $this->swiss_army_include_hook_files(__FUNCTION__, func_get_args());
    }


    function redcap_every_page_top($project_id)
    {
		$this->swiss_army_include_hook_files(__FUNCTION__, func_get_args());
    }


    function redcap_project_home_page($project_id) {
		$this->swiss_army_include_hook_files(__FUNCTION__, func_get_args(), true);
    }


    function redcap_save_record($project_id, $record, $instrument, $event_id, $group_id, $survey_hash, $response_id, $repeat_instance) {
		$this->swiss_army_include_hook_files(__FUNCTION__, func_get_args(), true);
    }


    function redcap_survey_complete($project_id, $record, $instrument, $event_id, $group_id, $survey_hash, $response_id, $repeat_instance) {
        $this->swiss_army_include_hook_files(__FUNCTION__, func_get_args(),true);
    }


    function redcap_survey_page($project_id, $record, $instrument, $event_id, $group_id, $survey_hash, $response_id, $repeat_instance) {
        $this->swiss_army_include_hook_files(__FUNCTION__, func_get_args(),true);
    }


    function redcap_survey_page_top($project_id, $record, $instrument, $event_id, $group_id, $survey_hash, $response_id, $repeat_instance) {
        $this->swiss_army_include_hook_files(__FUNCTION__, func_get_args(),true);
    }


    function redcap_user_rights($project_id) {
        $this->swiss_army_include_hook_files(__FUNCTION__, func_get_args(),true);
	}
	
	
}