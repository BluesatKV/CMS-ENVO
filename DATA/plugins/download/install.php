<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/install.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// Check if the file is accessed only from a admin if not stop the script from running
$php_errormsg  = 'To edit the file, you must be logged in as an ADMINISTRATOR !!! You cannot access this file directly.';
$php_errormsg1 = 'Only ADMINISTRATOR privileges allow you to edit the file !!! You cannot access this file directly.';
if (!ENVO_USERID) die($php_errormsg);

if (!$envouser -> envoAdminAccess($envouser -> getVar("usergroupid"))) die($php_errormsg1);

// Set successfully to zero
$succesfully = 0;

// EN: Load the language file for plugin
// CZ: Načtení jazykového souboru pro plugin
if (file_exists(APP_PATH . 'plugins/download/admin/lang/' . $site_language . '.ini')) {
	$tld = parse_ini_file(APP_PATH . 'plugins/download/admin/lang/' . $site_language . '.ini', TRUE);
} else {
	$tld = parse_ini_file(APP_PATH . 'plugins/download/admin/lang/en.ini', TRUE);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title><?= $tld["downl_install"]["downlinst"] ?></title>
	<meta charset="utf-8">
	<!-- BEGIN Vendor CSS-->
	<?php
	// Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
	echo $Html -> addStylesheet('/assets/plugins/bootstrap/bootstrapv4/4.0.0/css/bootstrap.min.css');
	echo $Html -> addStylesheet('/assets/plugins/font-awesome/4.7.0/css/font-awesome.css');
	?>
	<!-- BEGIN Pages CSS-->
	<?php
	// Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
	echo $Html -> addStylesheet('/admin/pages/css/pages-icons.css?=v3.0.0');
	echo $Html -> addStylesheet('/admin/pages/css/pages.min.css?=v3.0.2', '', array ('class' => 'main-stylesheet'));
	?>
	<!-- BEGIN CUSTOM MODIFICATION -->
	<style type="text/css">
		/* Fix 'jumping scrollbar' issue */
		@media screen and (min-width: 960px) {
			html {
				margin-left: calc(100vw - 100%);
				margin-right: 0;
			}
		}

		/* Main body */
		body {
			background: transparent;
		}

		/* Notification */
		#notificationcontainer {
			position: relative;
			z-index: 1000;
			top: -21px;
		}

		.pgn-wrapper {
			position: absolute;
			z-index: 1000;
		}

		/* Button, input, checkbox ... */
		input[type="text"]:hover {
			background: #fafafa;
			border-color: #c6c6c6;
			color: #384343;
		}

		/* Card */
		.card-collapse i {
			font-size: 17px;
			font-weight: bold;
		}

		/* Table */
		.table-transparent tbody tr td {
			background: transparent;
		}
	</style>
	<!-- BEGIN VENDOR JS -->
	<?php
	// Add Html Element -> addScript (Arguments: src, optional assoc. array)
	echo $Html -> addScript('/assets/plugins/jquery/jquery-1.11.1.min.js');
	echo $Html -> addScript('/admin/assets/plugins/modernizr.custom.js?=v2.8.3');
	echo $Html -> addScript('/assets/plugins/popper/1.14.1/popper.min.js');
	echo $Html -> addScript('/assets/plugins/bootstrap/bootstrapv4/4.0.0/js/bootstrap.min.js');
	?>
	<!-- BEGIN CORE TEMPLATE JS -->
	<?php
	// Add Html Element -> addScript (Arguments: src, optional assoc. array)
	echo $Html -> addScript('/admin/pages/js/pages.min.js');
	?>
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-sm-12 m-t-20">
			<div class="jumbotron bg-master pt-1 pl-3 pb-1 pr-3">
				<h3 class="semi-bold text-white"><?= $tld["downl_install"]["downlinst"] ?></h3>
			</div>
			<hr>
			<div id="notificationcontainer"></div>
			<div class="m-b-30">

				<h4 class="semi-bold"><?= $tld["downl_install"]["downlinst1"] ?></h4>
				<p>Plugin umožní přesměrování stránek se zadáním typu přesměrování.</p>

				<div data-pages="card" class="card card-transparent" id="card-basic">
					<div class="card-header separator">
						<div class="card-title"><?= $tld["downl_install"]["downlinst2"] ?></div>
						<div class="card-controls">
							<ul>
								<li>
									<a data-toggle="collapse" class="card-collapse" href="#">
										<i class="card-icon card-icon-collapse"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="card-block">
						<h3><span class="semi-bold">Výpis</span> Komponentů</h3>
						<p>Seznam komponent které budou instalovány v průběhu instalačního procesu tohoto pluginu</p><br>
						<div>
							<table class="table table-transparent">
								<thead>
								<tr class="bg-complete-lighter">
									<th>Koponenta</th>
									<th class="text-center">Ano</th>
									<th class="text-center">Ne</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>Tabulky DB pro práci s pluginem</td>
									<td class="text-center"><i class="fa fa-check"></i></td>
									<td></td>
								</tr>
								<tr>
									<td>Datové záznamy</td>
									<td></td>
									<td class="text-center"><i class="fa fa-check"></i></td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>

				</div>
				<hr>

				<?php
				/* English
				 * -------
				 * Check if the plugin is already installed
				 * If plugin is installed - show Notification
				 *
				 * Czech
				 * -------
				 * Kontrola zda je plugin instalován
				 * Pokud není plugin instalován, zobrazit Notifikaci s chybovou hláškou
				*/
				$envodb -> query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Download"');
				if ($envodb -> affected_rows > 0) { ?>

					<button id="closeModal" class="btn btn-default btn-block" onclick="window.parent.closeModal();">Zavřít</button>
					<script>
            $(document).ready(function () {
              'use strict';
              // Apply the plugin to the body
              $('#notificationcontainer').pgNotification({
                style: 'bar',
                message: '<?=$tld["downl_install"]["downlinst3"]?>',
                position: 'top',
                timeout: 0,
                type: 'warning'
              }).show();

              e.preventDefault();
            });
					</script>

				<?php
				} else {
				// EN: If plugin is not installed - install plugin
				// CZ: Pokud není plugin instalován, spustit instalaci pluginu

				// MAIN PLUGIN INSTALLATION
				if (isset($_POST['install'])) {

				// EN: Insert data to table 'plugins' about this plugin
				// CZ: Zápis dat do tabulky 'plugins' o tomto pluginu
				$envodb -> query('INSERT INTO ' . DB_PREFIX . 'plugins (`id`, `name`, `description`, `active`, `access`, `pluginorder`, `pluginpath`, `phpcode`, `phpcodeadmin`, `sidenavhtml`, `usergroup`, `uninstallfile`, `pluginversion`, `time`) VALUES (NULL, "Download", "Run your own download database, let user download direct from your server or link.", 1, ' . ENVO_USERID . ', 4, "download", "require_once APP_PATH.\'plugins/download/download.php\';", "if ($page == \'download\') {
        require_once APP_PATH.\'plugins/download/admin/download.php\';
           $ENVO_PROVED = 1;
           $checkp = 1;
        }", "../plugins/download/admin/template/dl_nav.php", "download", "uninstall.php", "1.2.1", NOW())');

				// EN: Now get the plugin 'id' from table 'plugins' for futher use
				// CZ: Nyní zpět získáme 'id' pluginu z tabulky 'plugins' pro další použití
				$results = $envodb -> query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Download"');
				$rows    = $results -> fetch_assoc();

				if ($rows['id']) {
				// EN: If plugin have 'id' (plugin is installed), install other data for plugin (create tables and write data to tables)
				// CZ: Pokud má plugin 'id' (tzn. plugin je instalován), instalujeme další data pro plugin (vytvoření tabulek a zápis dat do tabulek)

				// EN: Usergroup - Insert php code (get data from plugin setting in usergroup)
				// CZ: Usergroup - Vložení php kódu (získání dat z nastavení pluginu v uživatelské skupině)
				$insertphpcode = 'if (isset($defaults[\'envo_download\'])) {
	$insert .= \'download = \"\'.$defaults[\'envo_download\'].\'\", downloadcan = \"\'.$defaults[\'envo_candownload\'].\'\",\'; }';

				// EN: Set admin lang of plugin
				// CZ: Nastavení jazyka pro administrační rozhraní pluginu
				$adminlang = 'if (file_exists(APP_PATH.\'plugins/download/admin/lang/\'.$site_language.\'.ini\')) {
	$tld = parse_ini_file(APP_PATH.\'plugins/download/admin/lang/\'.$site_language.\'.ini\', true);
} else {
  $tld = parse_ini_file(APP_PATH.\'plugins/download/admin/lang/en.ini\', true);
}';

				// EN: Set site lang of plugin
				// CZ: Nastavení jazyka pro webové rozhraní pluginu
				$sitelang = 'if (file_exists(APP_PATH.\'plugins/download/lang/\'.$site_language.\'.ini\')) {
  $tld = parse_ini_file(APP_PATH.\'plugins/download/lang/\'.$site_language.\'.ini\', true);
} else {
  $tld = parse_ini_file(APP_PATH.\'plugins/download/lang/en.ini\', true);
}';

				// EN: Php code for search
				// CZ: Php kód pro vyhledávání
				$sitephpsearch = '$download = new ENVO_search($SearchInput);
        	$download->envoSetTable(\'download\',\"\");
        	$download->envoAndor(\"OR\");
        	$download->envoFieldActive(\"active\");
        	$download->envoFieldTitle(\"title\");
        	$download->envoFieldCut(\"content\");
        	$download->envoFieldstoSearch(array(\"title\",\"content\"));
        	$download->envoFieldstoSelect(\"id, title, content\");
        	
        	// Load the array into template
        	$ENVO_SEARCH_RESULT_DOWNLOAD = $download->set_result(ENVO_PLUGIN_VAR_DOWNLOAD, \'f\', $setting[\"downloadurl\"]);';

				// EN: Php code for rss
				// CZ: Php kód pro rss
				$sitephprss = 'if ($page1 == ENVO_PLUGIN_VAR_DOWNLOAD) {
	
	if ($setting[\"downloadrss\"]) {
		$sql = \'SELECT id, title, content, time FROM \'.DB_PREFIX.\'download WHERE active = 1 ORDER BY time DESC LIMIT \'.$setting[\"downloadrss\"];
		$sURL = ENVO_PLUGIN_VAR_DOWNLOAD;
		$sURL1 = \'download-article\';
		$what = 1;
		$seowhat = $setting[\"downloadurl\"];
		
		$ENVO_RSS_DESCRIPTION = envo_cut_text($setting[\"downloaddesc\"], $setting[\"shortmsg\"], \'…\');
		
	} else {
		envo_redirect(BASE_URL);
	}
	
}';

				// EN: Php code for tags
				// CZ: Php kód pro tagy
				$sitephptag = 'if ($row[\'pluginid\'] == ENVO_PLUGIN_ID_DOWNLOAD) {
$downloadtagData[] = ENVO_tags::envoTagSql(\"download\", $row[\'itemid\'], \"id, title, content\", \"content\", ENVO_PLUGIN_VAR_DOWNLOAD, \"f\", $setting[\"downloadurl\"]);
$ENVO_TAG_DOWNLOAD_DATA = $downloadtagData;
}';

				// EN: Php code for sitemap
				// CZ: Php kód pro mapu sítě
				$sitephpsitemap = 'include_once APP_PATH.\'plugins/download/functions.php\';

$ENVO_DOWNLOAD_ALL = envo_get_download(\'\', $setting[\"downloadorder\"], \'\', \'\', $setting[\"downloadrss\"], $setting[\"downloadurl\"], $tl[\'general\'][\'g56\']);
$PAGE_TITLE = ENVO_PLUGIN_NAME_DOWNLOAD;';

				// Fulltext search query
				$sqlfull       = '$envodb->query(\'ALTER TABLE \'.DB_PREFIX.\'download ADD FULLTEXT(`title`, `content`)\');';
				$sqlfullremove = '$envodb->query(\'ALTER TABLE \'.DB_PREFIX.\'download DROP INDEX `title`\');';

				// Connect to pages/news
				$pages = 'if ($pg[\'pluginid\'] == ENVO_PLUGIN_DOWNLOAD) {
include_once APP_PATH.\'plugins/download/admin/template/dl_connect.php\';
}';

				// EN: Php code for insert data to DB
				// CZ: Php kód pro vložení dat do DB
				$sqlinsert = 'if (!isset($defaults[\'envo_showdl\'])) {
	$dl = 0;
} else if (in_array(0, $defaults[\'envo_showdl\'])) {
	$dl = 0;
} else {
	$dl = join(\',\', $defaults[\'envo_showdl\']);
}

if (empty($dl) && !empty($defaults[\'envo_showdlmany\'])) {
	$insert .= \'showdownload = \"\'.$defaults[\'envo_showdlorder\'].\':\'.$defaults[\'envo_showdlmany\'].\'\",\';
} else if (!empty($dl)) {
	$insert .= \'showdownload = \"\'.$dl.\'\",\';
} else {
  	$insert .= \'showdownload = NULL,\';
}';

				//
				$getdl = '$ENVO_GET_DOWNLOAD = envo_get_page_info(DB_PREFIX.\'download\', \'\');

if ($ENVO_FORM_DATA) {

$showdlarray = explode(\":\", $ENVO_FORM_DATA[\'showdownload\']);

if (is_array($showdlarray) && in_array(\"ASC\", $showdlarray) || in_array(\"DESC\", $showdlarray)) {

		$ENVO_FORM_DATA[\'showdlorder\'] = $showdlarray[0];
		$ENVO_FORM_DATA[\'showdlmany\'] = $showdlarray[1];
	
} }';

				// EN: Insert code into admin/index.php
				// CZ: Vložení kódu do admin/index.php
				$insertadminindex = 'plugins/download/admin/template/dl_stat.php';

				// EN: Frontend - template for display connect
				// CZ: Frontend - šablona
				$get_dlconnect = '
	$pluginbasic_connect = \'plugins/download/template/pages_news.php\';
	$pluginsite_connect = \'template/\'.$setting[\"sitestyle\"].\'/plugintemplate/download/pages_news.php\';
	
	if (ENVO_PLUGIN_ACCESS_DOWNLOAD && $pg[\'pluginid\'] == ENVO_PLUGIN_ID_DOWNLOAD && !empty($row[\'showdownload\'])) {
		if (file_exists($pluginsite_connect)) {
			include_once APP_PATH.$pluginsite_connect;
		} else {
			include_once APP_PATH.$pluginbasic_connect;
		}
	}
    ';

				// EN: Frontend - template for display plugin sidebar
				// CZ: Frontend - šablona pro zobrazení postranního panelu pluginu
				$get_dlsidebar = '
	$pluginbasic_sidebar = \'plugins/download/template/downloadsidebar.php\';
	$pluginsite_sidebar = \'template/\'.$setting[\"sitestyle\"].\'/plugintemplate/download/downloadsidebar.php\';
	
	if (file_exists($pluginsite_sidebar)) {
		include_once APP_PATH.$pluginsite_sidebar;
	} else {
		include_once APP_PATH.$pluginbasic_sidebar;
	}
    ';

				// EN: Frontend - template for sitemap
				// CZ: Frontend - šablona pro mapu sítě
				$get_dlsitemap = '
	$pluginbasic_sitemap = \'plugins/download/template/sitemap.php\';
	$pluginsite_sitemap = \'template/\'.$setting[\"sitestyle\"].\'/plugintemplate/download/sitemap.php\';
	
	if (file_exists($pluginsite_sitemap)) {
		include_once APP_PATH.$pluginsite_sitemap;
	} else {
		include_once APP_PATH.$pluginbasic_sitemap;
	}
    ';

				// EN: Frontend - template for search
				// CZ: Frontend - šablona pro vyhledávání
				$get_dlsearch = '
	$pluginbasic_search = \'plugins/download/template/search.php\';
	$pluginsite_search = \'template/\'.$setting[\"sitestyle\"].\'/plugintemplate/download/search.php\';
	
	if (file_exists($pluginsite_search)) {
		include_once APP_PATH.$pluginsite_search;
	} else {
		include_once APP_PATH.$pluginbasic_search;
	}
    ';

				// EN: Frontend - template for tags
				// CZ: Frontend - šablona pro tagy
				$get_dltag = '
	$pluginbasic_tag = \'plugins/download/template/tag.php\';
	$pluginsite_tag = \'template/\'.$setting[\"sitestyle\"].\'/plugintemplate/download/tag.php\';
	
	if (file_exists($pluginsite_tag)) {
		include_once APP_PATH.$pluginsite_tag;
	} else {
		include_once APP_PATH.$pluginbasic_tag;
	}
    ';

				// EN: Frontend - template for display plugin footer widget
				// CZ: Frontend - šablona pro zobrazení widgetu
				$get_dlfooter_widgets = '
	$pluginbasic_fwidgets = \'plugins/download/template/footer_widget.php\';
	$pluginsite_fwidgets = \'template/\'.$setting[\"sitestyle\"].\'/plugintemplate/download/footer_widget.php\';
	
	if (file_exists($pluginsite_fwidgets)) {
		include_once APP_PATH.$pluginsite_fwidgets;
	} else {
		include_once APP_PATH.$pluginbasic_fwidgets;
	}
    ';

				// EN: Frontend - template for display plugin footer widget
				// CZ: Frontend - šablona pro zobrazení widgetu
				$get_dlfooter_widgets1 = '
	$pluginbasic_fwidgets1 = \'plugins/download/template/footer_widget1.php\';
	$pluginsite_fwidgets1 = \'template/\'.$setting[\"sitestyle\"].\'/plugintemplate/download/footer_widget1.php\';
	
	if (file_exists($pluginsite_fwidgets1)) {
		include_once APP_PATH.$pluginsite_fwidgets1;
	} else {
		include_once APP_PATH.$pluginbasic_fwidgets1;
	}
    ';

				// EN: Insert data to table 'pluginhooks'
				// CZ: Vložení potřebných dat to tabulky 'pluginhooks'
				$envodb -> query('INSERT INTO ' . DB_PREFIX . 'pluginhooks (`id`, `hook_name`, `name`, `phpcode`, `product`, `active`, `exorder`, `pluginid`, `time`) VALUES
(NULL, "php_admin_lang", "Download Admin Language", "' . $adminlang . '", "download", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "php_lang", "Download Site Language", "' . $sitelang . '", "download", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_head", "Download Admin CSS", "plugins/download/admin/template/dl_css_admin.php", "download", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "php_admin_usergroup", "Download Usergroup SQL", "' . $insertphpcode . '", "download", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_index", "Download Statistics Admin", "' . $insertadminindex . '", "download", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "php_search", "Download Search PHP", "' . $sitephpsearch . '", "download", 1, 8, "' . $rows['id'] . '", NOW()),
(NULL, "php_rss", "Download RSS PHP", "' . $sitephprss . '", "download", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "php_tags", "Download Tags PHP", "' . $sitephptag . '", "download", 1, 8, "' . $rows['id'] . '", NOW()),
(NULL, "php_sitemap", "Download Sitemap PHP", "' . $sitephpsitemap . '", "download", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_between_head", "Download CSS", "plugins/download/tpl_between_head.php", "download", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_footer_end", "Download Script", "plugins/download/tpl_footer_end.php", "download", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_usergroup", "Download Usergroup New", "plugins/download/admin/template/usergroup_new.php", "download", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_usergroup_edit", "Download Usergroup Edit", "plugins/download/admin/template/usergroup_edit.php", "download", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_tags", "Download Tags", "' . $get_dltag . '", "download", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_sitemap", "Download Sitemap", "' . $get_dlsitemap . '", "download", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_sidebar", "Download Sidebar Categories", "' . $get_dlsidebar . '", "download", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "php_admin_fulltext_add", "Download Full Text Search", "' . $sqlfull . '", "download", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "php_admin_fulltext_remove", "Download Remove Full Text Search", "' . $sqlfullremove . '", "download", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_page_news", "Download Admin - Page/News", "' . $pages . '", "download", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_page_news_new", "Download Admin - Page/News - New", "plugins/download/admin/template/dl_connect_new.php", "download", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "php_admin_pages_sql", "Download Pages SQL", "' . $sqlinsert . '", "download", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "php_admin_news_sql", "Download News SQL", "' . $sqlinsert . '", "download", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "php_admin_pages_news_info", "Download Pages/News Info", "' . $getdl . '", "download", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_page_news_grid", "Download Pages/News Display", "' . $get_dlconnect . '", "download", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_search", "Download Search", "' . $get_dlsearch . '", "download", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_footer_widgets", "Download - 3 Latest Files", "' . $get_dlfooter_widgets . '", "download", 1, 3, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_footer_widgets", "Download - Show Categories", "' . $get_dlfooter_widgets1 . '", "download", 1, 3, "' . $rows['id'] . '", NOW())');

				// EN: Insert data to table 'setting'
				// CZ: Vložení potřebných dat to tabulky 'setting'
				$envodb -> query('INSERT INTO ' . DB_PREFIX . 'setting (`varname`, `groupname`, `value`, `defaultvalue`, `optioncode`, `datatype`, `product`) VALUES
("downloadtitle", "download", "Download", "Download", "input", "free", "download"),
("downloaddesc", "download", "Write something about your Download", "Write something about your Download", "textarea", "free", "download"),
("downloademail", "download", NULL, NULL, "input", "free", "download"),
("downloaddateformat", "download", "d.m.Y", "d.m.Y", "input", "free", "download"),
("downloadtimeformat", "download", NULL, NULL, "input", "free", "download"),
("downloadurl", "download", 0, 0, "yesno", "boolean", "download"),
("downloadmaxpost", "download", 2000, 2000, "input", "boolean", "download"),
("downloadpagemid", "download", 3, 3, "yesno", "number", "download"),
("downloadpageitem", "download", 4, 4, "yesno", "number", "download"),
("downloadpath", "download", NULL, NULL, "input", "free", "download"),
("downloadpathext", "download", "zip,rar,jpg,png,bmp,pdf,doc,xml", "zip,rar,jpg,png,bmp,pdf,doc,xml", "textarea", "free", "download"),
("downloadorder", "download", "id ASC", "", "input", "free", "download"),
("downloadrss", "download", 5, 5, "select", "number", "download"),
("downloadlivesearch", "download", 0, 0, "yesno", "boolean", "download"),
("download_css", "download", "", "", "textarea", "free", "download"),
("download_javascript", "download", "", "", "textarea", "free", "download"),
("downloadtwitter", "download", "", "", "input", "free", "download")');

				// EN: Insert data to table 'usergroup'
				// CZ: Vložení potřebných dat to tabulky 'usergroup'
				$envodb -> query('ALTER TABLE ' . DB_PREFIX . 'usergroup ADD `download` SMALLINT(1) UNSIGNED NOT NULL DEFAULT 0 AFTER `advsearch`, ADD `downloadcan` SMALLINT(1) UNSIGNED NOT NULL DEFAULT 0 AFTER `download`');

				// Pages/News alter Table
				$envodb -> query('ALTER TABLE ' . DB_PREFIX . 'pages ADD showdownload varchar(100) DEFAULT NULL AFTER shownews');
				$envodb -> query('ALTER TABLE ' . DB_PREFIX . 'news ADD showdownload varchar(100) DEFAULT NULL AFTER shownews');
				$envodb -> query('ALTER TABLE ' . DB_PREFIX . 'pagesgrid ADD fileid INT(11) UNSIGNED NOT NULL DEFAULT 0 AFTER newsid');

				// EN: Insert data to table 'categories' (create category)
				// CZ: Vložení potřebných dat to tabulky 'categories' (vytvoření kategorie)
				$envodb -> query('INSERT INTO ' . DB_PREFIX . 'categories (`id`, `name`, `varname`, `catimg`, `showmenu`, `showfooter`, `catorder`, `catparent`, `pageid`, `activeplugin`, `pluginid`) VALUES (NULL, "Download", "download", NULL, 1, 0, 5, 0, 0, 1, "' . $rows['id'] . '")');

				// EN: Create table for plugin (download)
				// CZ: Vytvoření tabulky pro plugin (soubory)
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'download (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catid` VARCHAR(100) NOT NULL DEFAULT 0,
  `candownload` VARCHAR(100) NOT NULL DEFAULT 0,
  `title` varchar(255) DEFAULT NULL,
  `varname` varchar(255) DEFAULT NULL,
  `content` mediumtext,
  `dl_css` text,
  `dl_javascript` text,
  `sidebar` smallint(1) UNSIGNED NOT NULL DEFAULT 1,
  `file` varchar(255) DEFAULT NULL,
  `extfile` varchar(255) DEFAULT NULL,
  `countdl` int(10) unsigned NOT NULL DEFAULT 0,
  `previmg` varchar(255) DEFAULT NULL,
  `previmgfbsm` varchar(255) DEFAULT NULL,
  `previmgfblg` varchar(255) DEFAULT NULL,
  `showtitle` smallint(1) unsigned NOT NULL DEFAULT 1,
  `active` smallint(1) unsigned NOT NULL DEFAULT 1,
  `showdate` smallint(1) unsigned NOT NULL DEFAULT 0,
  `showcat` smallint(1) unsigned NOT NULL DEFAULT 0,
  `showdl` smallint(1) unsigned NOT NULL DEFAULT 0,
  `ftshare` smallint(1) unsigned NOT NULL DEFAULT 0,
  `socialbutton` smallint(1) unsigned NOT NULL DEFAULT 0,
  `hits` int(10) unsigned NOT NULL DEFAULT 0,
  `password` char(64) DEFAULT NULL,
  `time` datetime NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

				/// EN: Create table for plugin (categories)
				// CZ: Vytvoření tabulky pro plugin (kategorie)
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'downloadcategories (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `varname` varchar(100) DEFAULT NULL,
  `catimg` varchar(255) DEFAULT NULL,
  `content` mediumtext,
  `permission` mediumtext,
  `catorder` int(11) unsigned NOT NULL DEFAULT 1,
  `catparent` int(11) unsigned NOT NULL DEFAULT 0,
  `active` smallint(1) unsigned NOT NULL DEFAULT 1,
  `count` int(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `catorder` (`catorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

				// EN: Create table for plugin (downloadhistory)
				// CZ: Vytvoření tabulky pro plugin (historie stahování)
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'downloadhistory (
	`id` BIGINT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`fileid` INT(11) UNSIGNED NOT NULL DEFAULT 0,
	`userid` INT(11) UNSIGNED NOT NULL DEFAULT 0,
	`email` VARCHAR(255) NOT NULL,
	`filename` VARCHAR(255) NOT NULL,
	`ip` CHAR(15) NOT NULL,
	`time` DATETIME NOT NULL DEFAULT \'0000-00-00 00:00:00\',
	PRIMARY KEY (`id`),
	KEY `fileid` (`fileid`)
) ENGINE = MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1');

				// Full text search is activated we do so for the download table as well
				if ($setting["fulltextsearch"]) {
					$envodb -> query('ALTER TABLE ' . DB_PREFIX . 'download ADD FULLTEXT(`title`, `content`)');
				}

				$succesfully = 1;

				?>

					<button id="closeModal" class="btn btn-default btn-block" onclick="window.parent.closeModal();">Zavřít</button>
					<script>
            $(document).ready(function () {
              'use strict';
              // Apply the plugin to the body
              $('#notificationcontainer').pgNotification({
                style: 'bar',
                message: '<?=$tld["downl_install"]["downlinst4"]?>',
                position: 'top',
                timeout: 0,
                type: 'success'
              }).show();

              e.preventDefault();
            });
					</script>

				<?php } else {
				// EN: If plugin have 'id' (plugin is not installed), uninstall
				// CZ: Pokud nemá plugin 'id' (tzn. plugin není instalován - došlo k chybě při zápisu do tabulky 'plugins'), odinstalujeme plugin

				$result = $envodb -> query('DELETE FROM ' . DB_PREFIX . 'plugins WHERE name = "Download"');

				?>

					<div class="alert bg-danger"><?= $tld["downl_install"]["downlinst5"] ?></div>
					<form name="company" method="post" action="uninstall.php" enctype="multipart/form-data">
						<button type="submit" name="redirect" class="btn btn-danger btn-block">
							<?= $tld["downl_install"]["downlinst6"] ?>
						</button>
					</form>

				<?php }
				} ?>

				<?php if (!$succesfully) { ?>
					<form name="company" method="post" action="install.php" enctype="multipart/form-data">
						<button type="submit" name="install" class="btn btn-complete btn-block">
							<?= $tld["downl_install"]["downlinst7"] ?>
						</button>
					</form>
				<?php }
				} ?>

			</div>
		</div>
	</div>

</body>
</html>