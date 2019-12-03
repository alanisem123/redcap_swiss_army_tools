<?php
namespace Partners\swiss_army;

use \ExternalModules\AbstractExternalModule as AEM;
use ExternalModules\ExternalModules as EM;

list($prefix, $version) = EM::getParseModuleDirectoryPrefixAndVersion(AEM::getModuleDirectoryName());

// Only run this code if the user has select a theme.
// The users settings are saved on the external module configuration table.
// Either read the css file or adjust the css using PHP arrays
$script = <<<SCRIPT
	<style type='text/css'>
		 body {
	/*background-color: #222;*/
	color: #0c0c0c;
	/*background-image: -webkit-linear-gradient(left, #005e82, #222);*/
	background-image: url('/redcap/modules/swiss_army_{$version}/features/themes_hook/pics/forest.jpg');
	background-repeat:repeat;
}

#center {
    background-image: -webkit-linear-gradient(left, #bf9f43, #a04b01)
    /*background-color: #212529;*/	
	/*background-image: url('/redcap/modules/swiss_army_v0.1/features/themes_hook/pics/forest.jpg');, linear-gradient(#eb01a5, #d13531); */
	/*background-image: -webkit-linear-gradient(top, #005e82, transparent);*/
	/*background-repeat:repeat;*/
}

.chklist_comp a:link, .chklist_comp a:visited, .chklist_comp a:active, .chklist_comp a:hover {
    color: #fff;
    font-size: 10px;
    text-decoration: underline;
}


A:link {
    color: #ffffff;
}

A:visited {
    color: #000000;
}

element.style {
    color: #8cdfff;
}

#subheader {    
    background-image: -webkit-linear-gradient(left, #bf9f43, #a04b01);
}

.menubox {
    /*background-color: #222;*/
	background-image: -webkit-linear-gradient(left, #bf9f43, #a04b01);
}

.menuboxsub {
    color: #ffeb00;
}

.x-panel-header {
    border-top: 1px solid #9877ff;
    color: #97f2fb;
    background: #1d255d;
}

#south table td {
    color: #fff;
	background-image: -webkit-linear-gradient(left, #bf9f43, #a04b01);	
}

#south {
    border-top: 1px solid #6b31b9;
    border-left: 1px solid #6b31b9;
    border-right: 1px solid #6b31b9;
    /*background-color: #222;*/
	background-image: -webkit-linear-gradient(left, #bf9f43, #a04b01);	
}

.darkgreen {
    font: normal 13px "Open Sans",Helvetica,Arial, Helvetica, sans-serif;
    padding: 6px;
    border: 1px solid #A5CC7A;
    color: #da9494;
    max-width: 800px;
    /*background-color: #000000;*/
	background-image: -webkit-linear-gradient(left, #bf9f43, #a04b01);	
}

#formSaveTip {
    display: none;
    background-color: #130808;
    border: 1px solid #bbb;    
    color: #af4242;   
}

.header {
    /*background: #0a0a0a;*/
	background-image: -webkit-linear-gradient(left, #bf9f43, #a04b01);	
    text-align: Left;
    font-family: "Open Sans",Helvetica,Arial,Helvetica,sans-serif;
    font-size: 13px;
    font-weight: bold;
    border: 1px solid #CCCCCC;
    padding: 5px 5px 5px 5px;
}

#questiontable td[class*="col-"], #questiontable th[class*="col-"] {
    position: static;
    display: table-cell;
    float: none;
    /*background-color: black;*/
	background-image: -webkit-linear-gradient(left, #bf9f43, #a04b01);	
	opacity: 0.96;
}

.greenhighlight {
    /*background-color: #0e0e0e !important;*/
	background-image: -webkit-linear-gradient(left, #bf9f43, #a04b01);	
}

.greenhighlight table td {
    /*background-color: #151515 !important;*/
	background-image: -webkit-linear-gradient(left, #bf9f43, #a04b01);	
}

#west {
    background-image: -webkit-linear-gradient(left, #bf9f43, #a04b01);	
}

.x-form-text{
    background-color: #f6ffcc;
}

.chklist {
    background-image: -webkit-linear-gradient(left, #bf9f43, #a04b01);
}
	</style>
SCRIPT;

print $script;

?>