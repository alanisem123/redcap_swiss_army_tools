<?php
/**
 * Hook NAME: menu_merge.php
 * DESCRIPTION: Script for reading the @MENU-MERGE action tag to copy in a dropdown list the option selected in one of dropdown or radio button fields  
 * each of them containing a subset of options (each using different code numbers for different options -but repeated options with the same code are allowed-) 
 * in the target dropdown list where the action tag has been declared.
 * NOTE: This new action tag can be added to the REDCap list of tags using the action_tag_descr included in this module
 *       Name:          @MENU-MERGE
 *       Explanation:   Menu Merge: Sets the value in a global dropdown list from a series of dropdown/radio buttons or sublists. This action tag copies in a dropdown list the option selected 
 *                      in one of the sublists, each of them containing a subset of options in the target dropdown list field where the action tag has been declared. 
 *						The sublists need to be branched logic in such a way that in any given case only one sublist is shown and the global dropdown list is hidden. 
 *						The action tag format must follow the pattern 
 *                      @MENU-MERGE='????' in which it will list the fields acting as sub dropdown lists, declared inside single quotes. - e.g.,  
 *                      @MENU-MERGE='[america],[europe],[africa],[asia],[oceania]' 
 *       To work in a given project, the External Module "Swiss Army Tool" still is needed to be enabled for the corresponding project
 * This version works for fields used in regular or repeatable instruments or in repeatable events
 * Uses REDCap hook/plugin functions.
 * VERSION: 1.0 
 // * Version from original development:     4.0
 * AUTHOR:      Victor Espinosa
 */

// gets field names
$fields = REDCap::getFieldNames();
// gets data dictionary
$dd = REDCap::getDataDictionary($project_id, 'array');

$data = REDCap::getData($project_id, 'array', $record, null, $event_id);

// review all fields in project to see if there is an action tag
foreach($fields as $field) {
	$selection_rep = array();
	$add_selection_rep = array();
	
	$event_instances_used = array();
	$instances_used = array();
	// checks if there is any annotation for that field
	if($dd[$field][field_annotation] != "") {
		// Looking for MENU-MERGE action tag
		$pos = strpos($dd[$field][field_annotation],'@MENU-MERGE');
		if ($pos === false) 
		  continue;
		else if ($pos >= 0) {
			//echo "field with Sublist: " . $field . " </br>";
			// 
			// Gets @MENU-MERGE from the annotation field
			$action_tag_substr = substr($dd[$field][field_annotation],$pos);
			// Gets position of initial and final quotations (')
			$pos_quotation = strpos($action_tag_substr,"'");
			$pos_final_quotation = strpos($action_tag_substr, "'", ($pos_quotation+1));
			// If there is still a final quotation, it takes the list of field names declared between quotations (')
			if($pos_final_quotation > 0) $add_fields = substr($action_tag_substr, $pos_quotation, $pos_final_quotation - $pos_quotation + 1);
			// else takes the rest of the string
			else $add_fields = substr($action_tag_substr, $pos_quotation);

			// NON-REPEATABLE initialization
			$selection = 0;
			// REPEATABLE FORM initialization
			// gets instrument name for field with the action tag
			$instrument_name = $dd[$field]['form_name'];
			// works within each event for each cond-list field separately
			// Gets the keys (record_ids) for existing instances
			$instances_used = $data[$record]["repeat_instances"][$event_id][$instrument_name]; 
			$instances_used_keys = array_keys($instances_used);
			// REPEATABLE EVENT initialization
			$event_instances_used = $data[$record]["repeat_instances"][$event_id]['']; 
			// Gets the keys (record_ids) for existing instances
			$event_instances_used_keys = array_keys($event_instances_used);

			// initial positive value to run the while loop at least once
			$pos_bracket = 999;
			// Loop over list of conditional field names included in the action tag
			while($pos_bracket > 0 ) {
				// Gets limits for a dropdown list field (declared in the action tag between brackets, [])
				$pos_bracket = strpos($add_fields,"[");
				// If there is still a declared sub dropdown list field, it takes its name
				$pos_final_bracket = strpos($add_fields, "]");
				$field_to_add = substr($add_fields,$pos_bracket + 1, $pos_final_bracket - $pos_bracket - 1);
				// Reduces the add_fields list for next iteration on the loop
				$add_fields = substr($add_fields, $pos_final_bracket + 1);
				// adds the values of options selected in each of the conditional dropdown lists (only one will be no null, though)
				// NON-REPEATABLE CASE
				$selection += $data[$record][$event_id][$field_to_add];
				// REPEATABLE FORM CASE
				// works within each instance for each field separately WHEN IT'S a repeatable instrument
				foreach($instances_used_keys as $instance) {
					if($data[$record]["repeat_instances"][$event_id][$instrument_name][$instance][$field_to_add] > 0) {
						// adds the values of options selected in each of the conditional dropdown lists (only one will be no null, though)
						$selection_rep[$instance][$field] += $data[$record]["repeat_instances"][$event_id][$instrument_name][$instance][$field_to_add];
					}
				}
				// REPEATABLE EVENT CASE
				// works within each event for each field separately WHEN IT'S a repeatable event
				foreach($event_instances_used_keys as $instance) {
					if($data[$record]["repeat_instances"][$event_id][''][$instance][$field_to_add] > 0) {
						// adds the values of options selected in each of the conditional dropdown lists (only one will be no null, though)
						$selection_rep[$instance][$field] += $data[$record]["repeat_instances"][$event_id][''][$instance][$field_to_add];
					}
				}
			}
			//echo "loop </br>";
			// NON-REPEATABLE CASE: saves selected option in REDCap global dropdown field
			if($selection == 0)
				$add_selection[$record][$event_id][$field] = "";
			else 
				$add_selection[$record][$event_id][$field] = $selection;
			$response = REDCap::saveData('array', $add_selection, $overwriteBehavior = 'overwrite');
			// REPEATABLE FORM CASE: saves selected option in REDCap global dropdown field
			foreach($instances_used_keys as $instance) {
				if($selection_rep[$instance][$field] == 0)
					$add_selection_rep[$record]["repeat_instances"][$event_id][$instrument_name][$instance][$field] = "";
				else
					$add_selection_rep[$record]["repeat_instances"][$event_id][$instrument_name][$instance][$field] = $selection_rep[$instance][$field];
				$response_rep = REDCap::saveData('array', $add_selection_rep, $overwriteBehavior = 'overwrite');
			}
			// REPEATABLE EVENT CASE: saves selected option in REDCap global dropdown field
			foreach($event_instances_used_keys as $instance) {
				if($selection_rep[$instance][$field] == 0)
					$add_selection_rep[$record]["repeat_instances"][$event_id][''][$instance][$field] = "";
				else
					$add_selection_rep[$record]["repeat_instances"][$event_id][''][$instance][$field] = $selection_rep[$instance][$field];
				$response_rep = REDCap::saveData('array', $add_selection_rep, $overwriteBehavior = 'overwrite');
			}
		}
	}
}
?>
