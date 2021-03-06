<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('ENVO_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

$CHECK_USR_SESSION = session_id();

// -------- DATA FOR ALL FRONTEND PAGES --------
// -------- DATA PRO VŠECHNY FRONTEND STRÁNKY --------

// EN: Set base plugin folder - template
// CZ: Nastavení základní složky pluginu - šablony
$BASE_PLUGIN_URL_TEMPLATE  = APP_PATH . 'plugins/tv_tower/template/';
$SHORT_PLUGIN_URL_TEMPLATE = '/plugins/tv_tower/template/';

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable  = DB_PREFIX . 'tvtowertvchannel';
$envotable1 = DB_PREFIX . 'tvtowertvtower';
$envotable2 = DB_PREFIX . 'tvtowertvprogram';

// EN: Include the functions
// CZ: Vložené funkce
include_once("functions.php");

// EN: Lang data for Javascript file
// CZ: Jazyková data pro javascript soubor
$jslangdata = array ();

$jslangdata["btnplaceholder1"]  = $tltt["tt_frontend_sumoselect"]["ttss"];
$jslangdata["btnplaceholder2"]  = $tltt["tt_frontend_sumoselect"]["ttss1"];
$jslangdata["captionformat"]    = $tltt["tt_frontend_sumoselect"]["ttss2"];
$jslangdata["captionformatall"] = $tltt["tt_frontend_sumoselect"]["ttss3"];
$jslangdata["locale1"]          = $tltt["tt_frontend_sumoselect"]["ttss4"];
$jslangdata["locale2"]          = $tltt["tt_frontend_sumoselect"]["ttss5"];
$jslangdata["locale3"]          = $tltt["tt_frontend_sumoselect"]["ttss6"];

// Convert array data to a json string
$jslangdata_output = json_encode($jslangdata);

// EN: Import important settings for the template from the DB (only VALUE)
// CZ: Importuj důležité nastavení pro šablonu z DB (HODNOTY)
$ENVO_SETTING_VAL = envo_get_setting_val('tvtower');

// EN: Getting the data about the TV Tower
// CZ: Získání dat o televizním vysílači
$result = $envodb -> query('SELECT * FROM ' . $envotable1 . ' ORDER BY id ASC');
while ($row = $result -> fetch_assoc()) {
	// EN: Insert each record into array
	// CZ: Vložení získaných dat do pole
	$ENVO_TVTOWER[] = array ('id' => $row['id'], 'active' => $row['active'], 'name' => $row['name'], 'varname' => $row['varname'], 'station' => $row['station']);
}

// EN: Getting count of active TV Tower
// CZ: Získání počtu aktivních vysílačů
$result1 = $envodb -> query('SELECT COUNT(*) as totalAll FROM ' . $envotable1 . ' WHERE active > 0');
$row1    = $result1 -> fetch_assoc();

$COUNT_TVTOWER_ALL = $row1['totalAll'];

// EN: Getting the data about the channel of TV Tower
// CZ: Získání dat o kanálu televizního vysílače
$ENVO_TVCHANNEL_ALL = envo_get_tvchannel_info($envotable);

// EN: Getting the data about the programs of channel
// CZ: Získání dat o programech z kanálu
$ENVO_TVPROGRAM_ALL = envo_get_tvprogram_info($envotable2);

// EN: Getting count of active programs ( if not save in archiv )
// CZ: Získání počtu aktivních programů ( pokud není program uložen v archivu )
$result2 = $envodb -> query('SELECT COUNT(*) as totalAll FROM ' . $envotable2 . ' WHERE towerid > 0 AND channelid > 0');
$row2    = $result2 -> fetch_assoc();

$COUNT_TVPROGRAM_ALL = $row2['totalAll'];

// EN: Getting date of last update of programs
// CZ: Získání data poslední aktualizace programů
$result3 = $envodb -> query('SELECT  MAX(time) AS maxTime FROM ' . $envotable2);
$row3    = $result3 -> fetch_assoc();

if ($COUNT_TVPROGRAM_ALL > 0) {
	$TIME_TVPROGRAM_ALL = date('d.m.Y', strtotime($row3['maxTime']));
} else {
	$TIME_TVPROGRAM_ALL = '';
}


// EN: Set data for the frontend page - Title, Description, Keywords and other ...
// CZ: Nastavení dat pro frontend stránku - Titulek, Popis, Klíčová slova a další ...
$MAIN_PLUGIN_DESCRIPTION = $ca['metadesc'];
$MAIN_SITE_DESCRIPTION   = $setting['metadesc'];

$PAGE_KEYWORDS = str_replace(" ", " ", ENVO_base ::envoCleanurl($PAGE_TITLE) . ($keylist ? "," . $keylist : "") . ($ca["metakey"] ? "," . $ca["metakey"] : ""));

// SEO from the category content if available
if (!empty($MAIN_PLUGIN_DESCRIPTION)) {
	$PAGE_DESCRIPTION = envo_cut_text($MAIN_PLUGIN_DESCRIPTION, 155, '');
} else {
	$PAGE_DESCRIPTION = envo_cut_text($MAIN_SITE_DESCRIPTION, 155, '');
}

// -------- DATA FOR SELECTED FRONTEND PAGES --------
// -------- DATA PRO VYBRANÉ FRONTEND STRÁNKY --------

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
	case 'wizard':
		// WIZARD

		// EN: Set data for the frontend page - Title and other ...
		// CZ: Nastavení dat pro frontend stránku - Titulek a další ...
		$PAGE_TITLE = $ENVO_SETTING_VAL["tvtowerwizardtitle"];

		// EN: Load the php template
		// CZ: Načtení php template (šablony)
		$pluginbasic_template = $SHORT_PLUGIN_URL_TEMPLATE . 'tvtower_wizard.php';
		$pluginsite_template  = 'template/' . ENVO_TEMPLATE . '/plugintemplate/tv_tower/tvtower_wizard.php';

		if (file_exists($pluginsite_template)) {
			$plugin_template = $pluginsite_template;
		} else {
			$plugin_template = $pluginbasic_template;
		}

		break;
	case 'list':
		// LIST OF PROGRAMS

		// EN: Set data for the frontend page - Title and other ...
		// CZ: Nastavení dat pro frontend stránku - Titulek a další ...
		$PAGE_TITLE = $ENVO_SETTING_VAL["tvtowerlisttitle"];

		// EN: Load the php template
		// CZ: Načtení php template (šablony)
		$pluginbasic_template = $SHORT_PLUGIN_URL_TEMPLATE . 'tvtower_list.php';
		$pluginsite_template  = 'template/' . ENVO_TEMPLATE . '/plugintemplate/tv_tower/tvtower_list.php';

		if (file_exists($pluginsite_template)) {
			$plugin_template = $pluginsite_template;
		} else {
			$plugin_template = $pluginbasic_template;
		}

		break;
	case 'export':
		// EXPORT

		// EN: Set data for the frontend page - Title and other ...
		// CZ: Nastavení dat pro frontend stránku - Titulek a další ...
		$PAGE_TITLE = $ENVO_SETTING_VAL["tvtowerexporttitle"];

		// EN: Load the php template
		// CZ: Načtení php template (šablony)
		$pluginbasic_template = $SHORT_PLUGIN_URL_TEMPLATE . 'tvtower_export.php';
		$pluginsite_template  = 'template/' . ENVO_TEMPLATE . '/plugintemplate/tv_tower/tvtower_export.php';

		if (file_exists($pluginsite_template)) {
			$plugin_template = $pluginsite_template;
		} else {
			$plugin_template = $pluginbasic_template;
		}

		break;
	default:
		// MAIN PAGE OF PLUGIN

		// ----------- ERROR: REDIRECT PAGE ------------
		// -------- CHYBA: PŘESMĚROVÁNÍ STRÁNKY --------

		// EN: If not exist value in 'case', redirect page to 404
		// CZ: Pokud neexistuje 'case', dochází k přesměrování stránek na 404
		if (!empty($page1) && !is_numeric($page1)) {
			if ($page1 != 'wizard' || $page1 != 'list' || $page1 != 'export') {
				envo_redirect(ENVO_rewrite ::envoParseurl('404', '', '', '', ''));
			}
		}

		// ----------- SUCCESS: CODE FOR MAIN PAGE ------------
		// -------- VŠE V POŘÁDKU: KÓD PRO HLAVNÍ STRÁNKU --------

		// EN: Set data for the frontend page - Title and other ...
		// CZ: Nastavení dat pro frontend stránku - Titulek a další ...
		$PAGE_TITLE = $ENVO_SETTING_VAL["tvtowertitle"];

		// EN: Load the php template
		// CZ: Načtení php template (šablony)
		$pluginbasic_template = $SHORT_PLUGIN_URL_TEMPLATE . 'tvtower.php';
		$pluginsite_template  = 'template/' . ENVO_TEMPLATE . '/plugintemplate/tv_tower/tvtower.php';

		if (file_exists($pluginsite_template)) {
			$plugin_template = $pluginsite_template;
		} else {
			$plugin_template = $pluginbasic_template;
		}

}

?>   