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
$URI = explode("?",$_SERVER['REQUEST_URI'])[0];
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

$phiEnglish = array("first name", "last name", "middle name", "middle initial", "street",
    "address", "street number", "city", "state", "zip", "zip code", "dob", "date of birth",
    "birthdate", "admission date", "discharge date", "date of death","dod", "age",
    "exact age", "telephone", "telephone number", "cell", "cell number",
    "cell phone number", "fax", "fax number", "email", "email address",
    "e-mail", "email", "ssn", "social security", "social security number", "mr",
    "medical record", "medical record number", "mrn","health plan beneficiary number",
    "insurance number", "member number", "group number", "account", "account number",
    "certificate number", "license number", "account number", "vin", "vin number",
    "license plate", "license plate number", "ip", "ip address", "ip address number",
    "domain", "domain name", "url");

$phiSpanish = array("primer nombre", "apellido", "segundo nombre", "domicilio","inicial", "calle",
    "numero de calle", "ciudad", "estado", "codigo postal", "fecha de nacimiento", "edad",
    "lugar de nacimiento", "fecha de admision", "fecha de difunsion", "edad exacta",
    "telefono", "fax", "numero de fax", "correo", "correo electronico", "e-mail", "email",
    "numero de seguro social", "seguro social", "mr", "record medico", "numero de record medico",
    "numero de seguro", "numero de seguro medico", "numero de miembro", "numero de grupo",
    "cuenta", "numero de cuenta", "numero de certificado", "numero de licencia", "cuenta de banco",
    "numero de cuenta de banco", "vin", "numero vin", "licencia", "ip", "numero de ip",
    "dominio", "nombre de dominio", "url");

$phiPortuguese = array("primeiro nome", "sobrenome", "nome do meio", "inicial do meio", "rua",
    "endereco", "numero da rua", "cidade", "estado", "CEP", "data de nascimento",
    "data de nascimento", "data de admissao", "data de alta", "data de falecimento", "idade",
    "idade exata", "telefone", "numero de telefone", "celula", "numero de celula",
    "numero de telefone celular", "fax", "numero de fax", "email", "endereco de email",
    "email", "previdencia social", "numero de previdencia social",
    "prontuario medico", "numero do prontuario medico", "numero do beneficiario do plano de saude",
    "numero do seguro", "numero do membro", "numero do grupo", "conta", "numero da conta",
    "numero do certificado", "numero da licenca", "número da conta", "vin", "numero do vin",
    "placa", "numero da placa", "ip", "endereco IP", "número do endereço IP",
    "dominio", "nome de domínio", "url");

$phiFrench = array("prenom", "nom", "deuxieme prenom", "initiale", "rue",
    "adresse", "numero de rue", "ville", "etat", "zip", "code postal", "date de naissance", "date de naissance",
    "date de naissance", "date d'admission", "date de sortie", "date du deces", "age",
    "age exact", "telephone", "numero de telephone", "cellule", "numero de cellule",
    "numero de telephone portable", "fax", "numero de fax", "email", "adresse email",
    "e-mail", "securite sociale", "numero de securite sociale",
    "dossier medical", "numero de dossier medical", "numero de beneficiaire du regime de sante",
    "numero d'assurance", "numero de membre", "numero de groupe", "compte", "numero de compte",
    "numero de certificat", "numero de licence", "numero de compte", "vin", "numero de vin",
    "plaque d'immatriculation", "numero de plaque d'immatriculation", "ip", "adresse ip", "numero d'adresse ip",
    "domaine", "nom de domaine", "url");

$phiGerman = array("Vorname", "Nachname", "zweiter Vorname", "zweiter Vorname", "StraBe",
    "Adresse", "Hausnummer", "Ort", "Bundesland", "Postleitzahl", "Postleitzahl", "Geburtsdatum",
    "Geburtsdatum", "Aufnahmedatum", "Entlassungsdatum", "Sterbedatum", "Alter",
    "genaues Alter", "Telefon", "Telefonnummer", "Zelle", "Zellennummer",
    "Handynummer", "Fax", "Faxnummer", "E-Mail", "E-Mail-Adresse",
    "E-Mail", "Sozialversicherung", "Sozialversicherungsnummer",
    "Krankenakte", "Nummer der Krankenakte", "Nummer des Leistungsempfangers des Krankenplans",
    "Versicherungsnummer", "Mitgliedsnummer", "Gruppennummer", "Konto", "Kontonummer",
    "Zertifikatsnummer", "Lizenznummer", "Kontonummer", "Vin", "Vin-Nummer",
    "Kennzeichen", "IP", "IP-Adresse", "IP-Adressnummer",
    "domain", "domain name", "url");

switch ($lang) {
    case "ENG":
        $lang_selected = $phiEnglish;
        break;
    case "ESP":
        $lang_selected = $phiSpanish;
        break;
    case "POR":
        $lang_selected = $phiPortuguese;
        break;
    case "FRN":
        $lang_selected = $phiFrench;
        break;
    case "GRM":
        $lang_selected = $phiGerman;
        break;
}

?>

    <div style="max-width:800px; margin: 100px 0;">
        <div id="setupChklist-modify_project" class="round chklist col-12">
        <table cellspacing="0" width="100%">
            <tbody><tr>

                <td valign="top" style="padding-left:30px;">
                    <div class="chklisthdr">
                        <span><i class="fas"></i> PHI Autochecker</span>
                    </div>
                    <div class="chklisttext">
                        <?php print $config_p['intro'][$lang]?>
                        <br><br>
                        <div class="chklisttext">
                            <center>
                                <i>
                            <?php foreach ($lang_selected as $k =>$v){
                                echo $v.", ";
                            };?>
                                </i>
                            </center>
                        </div>
                        <div class="chklisttext">
                            <?php print $config_p['instructions'][$lang]?>
                        </div><br>
<!--                            <div class="chklistbtn">&nbsp;-->
                            <center>
                            <button class="btn btn-primaryrc" id="save_button" name="submit-btn-saverecord"
                                    style="margin-bottom:2px;font-size:13px !important;padding:6px 8px;" tabindex="0"><?php print $config_p['download-button-label'][$lang]?>
                            </button>
                            </center>
<!--                        </div>-->
                        <br><?php print $config_p['now-what'][$lang]?>
                    </div>
                    <div><br>
                        <?php print $config_p['do-this'][$lang]?>
                    </div>
                </td>
            </tr>
            </tbody></table>
    </div>

        <script>
    $(document).ready(function() {
        $('#save_button').click( function() {
            document.location.href = '/..<?php print htmlspecialchars($URI)?>?prefix=swiss_army&page=features/phi_autochecker/auto_checker_download.php&pid=<?php echo htmlspecialchars($project_id)?>&lang=<?php echo htmlspecialchars($lang)?>';
        } );
    } );
</script>


<!--/////////////////////////////////////////////////////////////////////////////////////////////-->
<?php
require_once APP_PATH_DOCROOT . 'ProjectGeneral/footer.php';
?>
