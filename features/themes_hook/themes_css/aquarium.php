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
	color: #45c5e2;
	/*background-image: -webkit-linear-gradient(left, #005e82, #222);*/
	background-image: url('/redcap/modules/swiss_army_{$version}/features/themes_hook/pics/aquarium.jpg');
	/*background-repeat:repeat;*/
}

#center {
    /*background-image: -webkit-linear-gradient(left, #005e82, #222);*/
    /*background-color: #212529;*/	
	background-image: url('/redcap/modules/swiss_army_{$version}/features/themes_hook/pics/aquarium.jpg');, linear-gradient(#eb01a5, #d13531); 
	/*background-image: -webkit-linear-gradient(top, #005e82, transparent);*/
	/*background-repeat:repeat;*/
}
a{
color: unset;
color: #5ea1c1;
}
A:link {
    color: #5ea1c1;
}

A:visited {
    color: #d1c3ec; d1c3ec
}

element.style {
    color: #8cdfff;
}

#subheader {    
    background-image: -webkit-linear-gradient(left, #005e82, #222);
}

.menubox {
    /*background-color: #222;*/
	background-image: -webkit-linear-gradient(left, #005e82, #222);
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
    /*color: #bbd23b;*/
	background-image: -webkit-linear-gradient(left, #005e82, #222);	
}

#south {
    border-top: 1px solid #6b31b9;
    border-left: 1px solid #6b31b9;
    border-right: 1px solid #6b31b9;
    /*background-color: #222;*/
	background-image: -webkit-linear-gradient(left, #005e82, #222);	
}

.darkgreen {
    font: normal 13px "Open Sans",Helvetica,Arial, Helvetica, sans-serif;
    padding: 6px;
    border: 1px solid #A5CC7A;
    color: #da9494;
    max-width: 800px;
    /*background-color: #000000;*/
	background-image: -webkit-linear-gradient(left, #005e82, #222);	
}

#formSaveTip {
    display: none;
    background-color: #130808;
    border: 1px solid #bbb;    
    color: #af4242;   
}

.header {
    /*background: #0a0a0a;*/
	background-image: -webkit-linear-gradient(left, #005e82, #222);	
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
	background-image: -webkit-linear-gradient(left, #005e82, #222);	
	opacity: 0.96;
}

.greenhighlight {
    /*background-color: #0e0e0e !important;*/
	background-image: -webkit-linear-gradient(left, #005e82, #222);	
}

.greenhighlight table td {
    /*background-color: #151515 !important;*/
	background-image: -webkit-linear-gradient(left, #005e82, #222);	
}

#west {
    background-image: -webkit-linear-gradient(left, #005e82, #222);	
}

.x-form-text{
    background-color: #f6ffcc;
}

.chklist {
    background-image: -webkit-linear-gradient(left, #005e82, #222);
    color: #bbb6b6;
}
.ui-widget-content {
     color: #a07b7b;
}
	</style>
SCRIPT;

print $script;

?>