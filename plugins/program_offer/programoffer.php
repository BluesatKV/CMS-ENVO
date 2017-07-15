<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('JAK_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// Functions we need for this plugin
include_once 'functions.php';

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable  = DB_PREFIX . 'programoffertvchannel';
$envotable1 = DB_PREFIX . 'programoffertvtower';
$envotable2 = DB_PREFIX . 'programoffertvprogram';

$CHECK_USR_SESSION = session_id();


// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
  case 'wizard':

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $pluginbasic_template = 'plugins/program_offer/template/programoffer_wizard.php';
    $pluginsite_template  = 'template/' . ENVO_TEMPLATE . '/plugintemplate/program_offer/programoffer_wizard.php';

    if (file_exists($pluginsite_template)) {
      $plugin_template = $pluginsite_template;
    } else {
      $plugin_template = $pluginbasic_template;
    }

    break;
  case 'list':

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $pluginbasic_template = 'plugins/program_offer/template/programoffer_list.php';
    $pluginsite_template  = 'template/' . ENVO_TEMPLATE . '/plugintemplate/program_offer/programoffer_list.php';

    if (file_exists($pluginsite_template)) {
      $plugin_template = $pluginsite_template;
    } else {
      $plugin_template = $pluginbasic_template;
    }

    break;
  default:

    // EN: If not exist value in 'case', redirect page to 404
    // CZ: Pokud neexistuje 'case', dochází k přesměrování stránek na 404
    if (isset($page1)) {
      if ($page1 != 'wizard' || $page1 != 'list') {
        envo_redirect(JAK_rewrite::jakParseurl('404', '', '', '', ''));
      }
    }

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $pluginbasic_template = 'plugins/program_offer/template/programoffer.php';
    $pluginsite_template  = 'template/' . ENVO_TEMPLATE . '/plugintemplate/program_offer/programoffer.php';

    if (file_exists($pluginsite_template)) {
      $plugin_template = $pluginsite_template;
    } else {
      $plugin_template = $pluginbasic_template;
    }

}

// -------- DATA FOR ALL FRONTEND PAGES --------

// EN: Getting the data about the TV Tower
// CZ: Získání dat o televizním vysílači
$result      = $jakdb->query('SELECT * FROM ' . $envotable1  . ' ORDER BY id ASC');
while ($row = $result->fetch_assoc()) {
  // EN: Insert each record into array
  // CZ: Vložení získaných dat do pole
  $JAK_TVTOWER[] = array('id' => $row['id'], 'active' => $row['active'], 'name' => $row['name'], 'varname' => $row['varname'], 'station' => $row['station']);
}

// EN: Getting the data about the channel of TV Tower
// CZ: Získání dat o kanálu televizního vysílače
$JAK_TVCHANNEL_ALL = envo_get_tvchannel_info($envotable);

// EN: Getting the data about the programs of channel
// CZ: Získání dat o programech z kanálu
$JAK_TVPROGRAM_ALL = envo_get_tvprogram_info($envotable2);

// EN: Getting count of active programs ( if not save in archiv )
// CZ: Získání počtu aktivních programů ( pokud není program uložen v archivu )
$result = $jakdb->query('SELECT COUNT(*) as totalAll FROM ' . $envotable2 . ' WHERE towerid > 0 AND channelid > 0');
$row    = $result->fetch_assoc();

$COUNT_TVPROGRAM_ALL = $row['totalAll'];

// EN: Getting date of last update of programs
// CZ: Získání data poslední aktualizace programů
$result1 = $jakdb->query('SELECT  MAX(time) AS MaxTime FROM ' . $envotable2);
$row1    = $result1->fetch_assoc();

$TIME_TVPROGRAM_ALL = date( 'd.m.Y', strtotime($row1['MaxTime']));

// Check if we have a language and display the right stuff
$PAGE_TITLE              = $jkv["programoffertitle"];
$MAIN_PLUGIN_DESCRIPTION = $ca['metadesc'];
$MAIN_SITE_DESCRIPTION   = $jkv['metadesc'];

$PAGE_KEYWORDS = str_replace(" ", " ", JAK_Base::jakCleanurl($PAGE_TITLE) . ($keylist ? "," . $keylist : "") . ($ca["metakey"] ? "," . $ca["metakey"] : ""));

// SEO from the category content if available
if (!empty($MAIN_PLUGIN_DESCRIPTION)) {
  $PAGE_DESCRIPTION = envo_cut_text($MAIN_PLUGIN_DESCRIPTION, 155, '');
} else {
  $PAGE_DESCRIPTION = envo_cut_text($MAIN_SITE_DESCRIPTION, 155, '');
}

?>   