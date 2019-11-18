<?php
namespace Partners\swiss_army;
// Swiss Army Framework by REDCap Spanish Group - Plugin Template
// Author name:
// Plugin description:

use \REDCap as REDCap;
use \MetaData as MetaData;
use \Project as Project;
use \ExternalModules\AbstractExternalModule as AEM;

require_once "../../redcap_connect.php";
require_once APP_PATH_DOCROOT . 'Design/functions.php';

require_once APP_PATH_DOCROOT . 'ProjectGeneral/header.php';

if (!isset($lang) OR empty($lang)){
    $lang = 'ENG';
}

// Reading framework's config-settings. It is recommended that you leave this in place.
$config_p_ulr =  "../../modules/swiss_army_$module->VERSION/features/advanced_tools/config.json";
$contents = file_get_contents($config_p_ulr);
$contents = utf8_encode($contents);
$config = json_decode($contents, true);
require_once "../../modules/swiss_army_$module->VERSION/features/advanced_tools/base/submenu.php";
// Reading Plugin config-settings. It is recommended that you leave this in place.
$config_p_ulr =  __DIR__.'/config.json';
$contents = file_get_contents($config_p_ulr);
$contents = utf8_encode($contents);
$config_p = json_decode($contents, true);
/////////////////////////////////////////////////////////////////////////////////////////////


print "Plugin Code Goes Here!!!";

	$phiEnglish = array("first name", "last name", "middle name", "middle initial", "street",
	              "street number", "city", "state", "zip", "zip code", "dob", "date of birth",
		          "birthdate", "admission date", "discharge date", "date of death", 
		          "exact age", "telephone", "telephone number", "cell", "cell number",
		          "cell phone number", "fax", "fax number", "email", "email address",
		          "e-mail", "ssn", "social security", "social security number", "mr",
		          "medical record", "medical record number", "health plan beneficiary number",
		          "insurance number", "member number", "group number", "account", "account number",
		          "certificate number", "license number", "account number", "vin", "vin number",
		          "license plate", "license plate number", "ip", "ip address", "ip address number",
				  "domain", "domain name", "url");
	
	$phiSpanish = array("primer nombre", "apellido", "segundo nombre", "inicial", "calle",
				  "numero de calle", "ciudad", "estado", "codigo postal", "fecha de nacimiento",
				  "lugar de nacimiento", "fecha de admision", "fecha de difunsion", "edad exacta",
				  "telefono", "fax", "numero de fax", "correo", "correo electronico", "e-mail",
				  "numero de seguro social", "seguro social", "mr", "record medico", "numero de record medico",
				  "numero de seguro", "numero de seguro medico", "numero de miembro", "numero de grupo",
				  "cuenta", "numero de cuenta", "numero de certificado", "numero de licencia", "cuenta de banco",
				  "numero de cuenta de banco", "vin", "numero vin", "licencia", "ip", "numero de ip",
				  "dominio", "nombre de dominio", "url");

$dd_array = REDCap::getDataDictionary('array');
//print "<pre>";
//var_dump($dd_array);
//print "</pre>";

//	$openFile = fopen("C:\Users\lsanc\Downloads\myDD.csv", "r") or die("Unable to open file!");
//	$writeFile = fopen("C:\Users\lsanc\Downloads\myDD_1.csv", "w") or die("Unable to write file!");
//
    $pointer = 1;
//
foreach	($dd_array as $k => $v) {
//var_dump($v["field_label"]);
	//	while (! feof($openFile)) {
//        if ($pointer < 2) {
//            $line = fgets($openFile);
//			fwrite($writeFile, $line);
//			$pointer++;
//		} else {
//			$line = fgets($openFile);
//			$splitLine = explode(",", $line);
			$string =  $v["field_label"];
			if (in_array($string, $phiEnglish)) {
//				$splitLine[10]="Y";

				print "test";
                var_dump($v["field_label"]);
                var_dump($dd_array[$k][$v]);
                $v["identifier"] = "Y";
                var_dump($v["identifier"]);
                $dd_array[$k] = array($v);
//				$line = implode(",", $splitLine);
//				fwrite($writeFile, $line);
				$pointer++;
			}
//			print "<pre>";
//			var_dump($dd_array);
//			print "</pre>";
//			else {
//				fwrite($writeFile, $line);
//			}
//		}
//	}
}
//if($pointer>1){
//    $csv = fopen('php://temp/maxmemory:'. (5*1024*1024), 'r+');
//    fputcsv($csv, array('blah','blah'));
//
//    foreach ($dd_array as $fields) {
//            fputcsv($csv, $fields) or die("cannot write array");
//    }
////	print "<pre>";
////	var_dump($dd_array);
////    print "</pre>";
//
//    rewind($csv);
//
////    $response = MetaData::save_metadata($dd_array, $appendFields=false, $preventLogging=false);
////    var_dump($response);
//
////    $dd_array = excel_to_array($csv);
////
    print "<pre>";
    var_dump($dd_array);
    print "</pre>";
//
////    list ($errors_array, $warnings_array, $dd_array) = MetaData::error_checking($dd_array);
////    print "<pre>";
////    var_dump($dd_array);
////    print "</pre>";
//
////    db_query("SET AUTOCOMMIT=0");
////    db_query("BEGIN");
//
////    $response = MetaData::save_metadata($dd_array, $appendFields=false, $preventLogging=false);
////    var_dump($response);
//
//}
//	echo "New file has been created";
//	fclose($openFile);
//	fclose($writeFile);


// Generating output file
//$todays_date = date("Ymd");
//header("Content-type: application/csv");
//header("Content-Disposition: attachment; filename=temp_{$todays_date}.csv");
//$out = fopen('php://output', 'w');
////fputcsv($out, $IRB_field_headers) or die("cannot write header");
//foreach ($dd_array as $row) {
//    fputcsv($out, $row) or die("cannot write array");
//}
//fclose($out);
//unset($out);

/////////////////////////////////////////////////////////////////////////////////////////////
require_once APP_PATH_DOCROOT . 'ProjectGeneral/footer.php';
?>
