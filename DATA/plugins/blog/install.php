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
if (file_exists(APP_PATH . 'plugins/blog/admin/lang/' . $site_language . '.ini')) {
	$tlblog = parse_ini_file(APP_PATH . 'plugins/blog/admin/lang/' . $site_language . '.ini', TRUE);
} else {
	$tlblog = parse_ini_file(APP_PATH . 'plugins/blog/admin/lang/en.ini', TRUE);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title><?= $tlblog["blog_install"]["bloginst"] ?></title>
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
				<h3 class="semi-bold text-white"><?= $tlblog["blog_install"]["bloginst"] ?></h3>
			</div>
			<hr>
			<div id="notificationcontainer"></div>
			<div class="m-b-30">

				<h4 class="semi-bold"><?= $tlblog["blog_install"]["bloginst1"] ?></h4>

				<div data-pages="card" class="card card-transparent" id="card-basic">
					<div class="card-header separator">
						<div class="card-title"><?= $tlblog["blog_install"]["bloginst2"] ?></div>
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
						<p>Seznam komponent které budou instalovány v průběhu instalačního procesu tohoto pluginu</p>
						<br>
						<h5 class="text-uppercase">Prostudovat postup instalace</h5>
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
			$envodb -> query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Blog"');
			if ($envodb -> affected_rows > 0) { ?>

				<button id="closeModal" class="btn btn-default btn-block" onclick="window.parent.closeModal();">Zavřít</button>
				<script>
          $(document).ready(function () {
            'use strict';
            // Apply the plugin to the body
            $('#notificationcontainer').pgNotification({
              style: 'bar',
              message: '<?=$tlblog["blog_install"]["bloginst3"]?>',
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
			$envodb -> query('INSERT INTO ' . DB_PREFIX . 'plugins (`id`, `name`, `description`, `active`, `access`, `pluginorder`, `pluginpath`, `phpcode`, `phpcodeadmin`, `sidenavhtml`, `usergroup`, `uninstallfile`, `pluginversion`, `time`) VALUES (NULL, "Blog", "Run your own blog.", 1, ' . ENVO_USERID . ', 4, "blog", "require_once APP_PATH.\'plugins/blog/blog.php\';", "if ($page == \'blog\') {
        require_once APP_PATH.\'plugins/blog/admin/blog.php\';
           $ENVO_PROVED = 1;
           $checkp = 1;
        }", "../plugins/blog/admin/template/blog_nav.php", "blog", "uninstall.php", "1.1", NOW())');

			// EN: Now get the plugin 'id' from table 'plugins' for futher use
			// CZ: Nyní zpět získáme 'id' pluginu z tabulky 'plugins' pro další použití
			$results = $envodb -> query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Blog"');
			$rows    = $results -> fetch_assoc();

			if ($rows['id']) {
			// EN: If plugin have 'id' (plugin is installed), install other data for plugin (create tables and write data to tables)
			// CZ: Pokud má plugin 'id' (tzn. plugin je instalován), instalujeme další data pro plugin (vytvoření tabulek a zápis dat do tabulek)

			// EN: Usergroup - Insert php code (get data from plugin setting in usergroup)
			// CZ: Usergroup - Vložení php kódu (získání dat z nastavení pluginu v uživatelské skupině)
			$insertphpcode = 'if (isset($defaults[\'envo_blog\'])) {
	$insert .= \'blog = \"\'.$defaults[\'envo_blog\'].\'\",\'; }';


			// EN: Set admin lang of plugin
			// CZ: Nastavení jazyka pro administrační rozhraní pluginu
			$adminlang = 'if (file_exists(APP_PATH.\'plugins/blog/admin/lang/\'.$site_language.\'.ini\')) {
  $tlblog = parse_ini_file(APP_PATH.\'plugins/blog/admin/lang/\'.$site_language.\'.ini\', true);
} else {
  $tlblog = parse_ini_file(APP_PATH.\'plugins/blog/admin/lang/en.ini\', true);
}';

			// EN: Set site lang of plugin
			// CZ: Nastavení jazyka pro webové rozhraní pluginu
			$sitelang = 'if (file_exists(APP_PATH.\'plugins/blog/lang/\'.$site_language.\'.ini\')) {
  $tlblog = parse_ini_file(APP_PATH.\'plugins/blog/lang/\'.$site_language.\'.ini\', true);
} else {
  $tlblog = parse_ini_file(APP_PATH.\'plugins/blog/lang/en.ini\', true);
}';

			// EN: Php code for search
			// CZ: Php kód pro vyhledávání
			$sitephpsearch = '$blog = new ENVO_search($SearchInput);
        	$blog->envoSetTable(\'blog\',\"\");
        	$blog->envoAndor(\"OR\");
        	$blog->envoFieldActive(\"active\");
        	$blog->envoFieldTitle(\"title\");
        	$blog->envoFieldCut(\"content\");
        	$blog->envoFieldstoSearch(array(\"title\",\"content\"));
        	$blog->envoFieldstoSelect(\"id, title, content\");
        	
        	// Load the array into template
        	$ENVO_SEARCH_RESULT_BLOG = $blog->set_result(ENVO_PLUGIN_VAR_BLOG, \'blog-article\', $setting[\"blogurl\"]);';

			// EN: Php code for rss
			// CZ: Php kód pro rss
			$sitephprss = 'if ($page1 == ENVO_PLUGIN_VAR_BLOG) {
	
	if ($setting[\"blogrss\"]) {
		$sql = \'SELECT id, title, content, time FROM \'.DB_PREFIX.\'blog WHERE active = 1 ORDER BY time DESC LIMIT \'.$setting[\"blogrss\"];
		$sURL = ENVO_PLUGIN_VAR_BLOG;
		$sURL1 = \'blog-article\';
		$what = 1;
		$seowhat = $setting[\"blogurl\"];
		
		$ENVO_RSS_DESCRIPTION = envo_cut_text($setting[\"blogdesc\"], $setting[\"shortmsg\"], \'…\');
		
	} else {
		envo_redirect(BASE_URL);
	}
	
}';

			// EN: Php code for tags
			// CZ: Php kód pro tagy
			$sitephptag = 'if ($row[\'pluginid\'] == ENVO_PLUGIN_ID_BLOG) {
$blogtagData[] = ENVO_tags::envoTagSql(\"blog\", $row[\'itemid\'], \"id, title, content\", \"content\", ENVO_PLUGIN_VAR_BLOG, \"a\", $setting[\"blogurl\"]);
$ENVO_TAG_BLOG_DATA = $blogtagData;
}';

			// EN: Php code for sitemap
			// CZ: Php kód pro mapu sítě
			$sitephpsitemap = 'include_once APP_PATH.\'plugins/blog/functions.php\';

$ENVO_BLOG_ALL = envo_get_blog(\'\', $setting[\"blogorder\"], \'\', \'\', $setting[\"blogurl\"], $tl[\'general\'][\'g56\']);
$PAGE_TITLE = ENVO_PLUGIN_NAME_BLOG;';

			// Fulltext search query
			$sqlfull       = '$envodb->query(\'ALTER TABLE \'.DB_PREFIX.\'blog ADD FULLTEXT(`title`, `content`)\');';
			$sqlfullremove = '$envodb->query(\'ALTER TABLE \'.DB_PREFIX.\'blog DROP INDEX `title`\');';

			// Connect to pages/news
			$pages = 'if ($pg[\'pluginid\'] == ENVO_PLUGIN_BLOG) {

include_once APP_PATH.\'plugins/blog/admin/template/blog_connect.php\';

}';

			// EN: Php code for insert data to DB
			// CZ: Php kód pro vložení dat do DB
			$sqlinsert = 'if (!isset($defaults[\'envo_showblog\'])) {
	$bl = 0;
} else if (in_array(0, $defaults[\'envo_showblog\'])) {
	$bl = 0;
} else {
	$bl = join(\',\', $defaults[\'envo_showblog\']);
}

if (empty($bl) && !empty($defaults[\'envo_showblogmany\'])) {
	$insert .= \'showblog = \"\'.$defaults[\'envo_showblogorder\'].\':\'.$defaults[\'envo_showblogmany\'].\'\",\';
} else if (!empty($bl)) {
	$insert .= \'showblog = \"\'.$bl.\'\",\';
} else {
  $insert .= \'showblog = 0,\';
}';

			//
			$getblog = '$ENVO_GET_BLOG = envo_get_page_info(DB_PREFIX.\'blog\', \'\');

if ($ENVO_FORM_DATA) {

$showblogarray = explode(\":\", $ENVO_FORM_DATA[\'showblog\']);

if (is_array($showblogarray) && in_array(\"ASC\", $showblogarray) || in_array(\"DESC\", $showblogarray)) {

		$ENVO_FORM_DATA[\'showblogorder\'] = $showblogarray[0];
		$ENVO_FORM_DATA[\'showblogmany\'] = $showblogarray[1];
	
} }';
			// EN: Frontend - template for display connect
			// CZ: Frontend - šablona
			$get_blconnect = '
	$pluginbasic_connect = \'plugins/blog/template/pages_news.php\';
	$pluginsite_connect = \'template/\'.$setting[\"sitestyle\"].\'/plugintemplate/blog/pages_news.php\';
	
	if (ENVO_PLUGIN_ACCESS_BLOG && $pg[\'pluginid\'] == ENVO_PLUGIN_ID_BLOG && !empty($row[\'showblog\'])) {
		if (file_exists($pluginsite_connect)) {
			include_once APP_PATH.$pluginsite_connect;
		} else {
			include_once APP_PATH.$pluginbasic_connect;
		}
	}
    ';

			// EN: Frontend - template for display plugin sidebar
			// CZ: Frontend - šablona pro zobrazení postranního panelu pluginu
			$get_blsidebar = '
	$pluginbasic_sidebar = \'plugins/blog/template/blogsidebar.php\';
	$pluginsite_sidebar = \'template/\'.$setting[\"sitestyle\"].\'/plugintemplate/blog/blogsidebar.php\';
	
	if (file_exists($pluginsite_sidebar)) {
		include_once APP_PATH.$pluginsite_sidebar;
	} else {
		include_once APP_PATH.$pluginbasic_sidebar;
	}
    ';

			// EN: Frontend - template for sitemap
			// CZ: Frontend - šablona pro mapu sítě
			$get_blsitemap = '
	$pluginbasic_sitemap = \'plugins/blog/template/sitemap.php\';
	$pluginsite_sitemap = \'template/\'.$setting[\"sitestyle\"].\'/plugintemplate/blog/sitemap.php\';
	
	if (file_exists($pluginsite_sitemap)) {
		include_once APP_PATH.$pluginsite_sitemap;
	} else {
		include_once APP_PATH.$pluginbasic_sitemap;
	}
    ';

			// EN: Frontend - template for search
			// CZ: Frontend - šablona pro vyhledávání
			$get_blsearch = '
	$pluginbasic_search = \'plugins/blog/template/search.php\';
	$pluginsite_search = \'template/\'.$setting[\"sitestyle\"].\'/plugintemplate/blog/search.php\';
	
	if (file_exists($pluginsite_search)) {
		include_once APP_PATH.$pluginsite_search;
	} else {
		include_once APP_PATH.$pluginbasic_search;
	}
    ';

			// EN: Frontend - template for tags
			// CZ: Frontend - šablona pro tagy
			$get_bltag = '
	$pluginbasic_tag = \'plugins/blog/template/tag.php\';
	$pluginsite_tag = \'template/\'.$setting[\"sitestyle\"].\'/plugintemplate/blog/tag.php\';
	
	if (file_exists($pluginsite_tag)) {
		include_once APP_PATH.$pluginsite_tag;
	} else {
		include_once APP_PATH.$pluginbasic_tag;
	}
    ';

			// EN: Frontend - template for display plugin footer widget
			// CZ: Frontend - šablona pro zobrazení widgetu
			$get_blfooter_widgets = '
	$pluginbasic_fwidgets = \'plugins/blog/template/footer_widget.php\';
	$pluginsite_fwidgets = \'template/\'.$setting[\"sitestyle\"].\'/plugintemplate/blog/footer_widget.php\';
	
	if (file_exists($pluginsite_fwidgets)) {
		include_once APP_PATH.$pluginsite_fwidgets;
	} else {
		include_once APP_PATH.$pluginbasic_fwidgets;
	}
    ';

			// EN: Frontend - template for display plugin footer widget
			// CZ: Frontend - šablona pro zobrazení widgetu
			$get_blfooter_widgets1 = '
	$pluginbasic_fwidgets1 = \'plugins/blog/template/footer_widget1.php\';
	$pluginsite_fwidgets1 = \'template/\'.$setting[\"sitestyle\"].\'/plugintemplate/blog/footer_widget1.php\';
	
	if (file_exists($pluginsite_fwidgets1)) {
		include_once APP_PATH.$pluginsite_fwidgets1;
	} else {
		include_once APP_PATH.$pluginbasic_fwidgets1;
	}
    ';

			// EN: Insert data to table 'pluginhooks'
			// CZ: Vložení potřebných dat to tabulky 'pluginhooks'
			$envodb -> query('INSERT INTO ' . DB_PREFIX . 'pluginhooks (`id`, `hook_name`, `name`, `phpcode`, `product`, `active`, `exorder`, `pluginid`, `time`) VALUES
(NULL, "php_admin_lang", "Blog Admin Language", "' . $adminlang . '", "blog", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "php_lang", "Blog Site Language", "' . $sitelang . '", "blog", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_head", "Blog Admin CSS", "plugins/blog/admin/template/blog_css_admin.php", "blog", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "php_admin_usergroup", "Blog Usergroup SQL", "' . $insertphpcode . '", "blog", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "php_search", "Blog Search PHP", "' . $sitephpsearch . '", "blog", 1, 8, "' . $rows['id'] . '", NOW()),
(NULL, "php_rss", "Blog RSS PHP", "' . $sitephprss . '", "blog", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "php_tags", "Blog Tags PHP", "' . $sitephptag . '", "blog", 1, 8, "' . $rows['id'] . '", NOW()),
(NULL, "php_sitemap", "Blog Sitemap PHP", "' . $sitephpsitemap . '", "blog", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_between_head", "Blog CSS", "plugins/blog/tpl_between_head.php", "blog", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_footer_end", "Blog Script", "plugins/blog/tpl_footer_end.php", "blog", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_usergroup", "Blog Usergroup New", "plugins/blog/admin/template/usergroup_new.php", "blog", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_usergroup_edit", "Blog Usergroup Edit", "plugins/blog/admin/template/usergroup_edit.php", "blog", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_tags", "Blog Tags", "' . $get_bltag . '", "blog", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_sitemap", "Blog Sitemap", "' . $get_blsitemap . '", "blog", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_sidebar", "Blog Sidebar Categories", "' . $get_blsidebar . '", "blog", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "php_admin_fulltext_add", "Blog Full Text Search", "' . $sqlfull . '", "blog", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "php_admin_fulltext_remove", "Blog Remove Full Text Search", "' . $sqlfullremove . '", "blog", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_page_news", "Blog Admin - Page/News", "' . $pages . '", "blog", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_page_news_new", "Blog Admin - Page/News - New", "plugins/blog/admin/template/blog_connect_new.php", "blog", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "php_admin_pages_sql", "Blog Pages SQL", "' . $sqlinsert . '", "blog", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "php_admin_news_sql", "Blog News SQL", "' . $sqlinsert . '", "blog", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "php_admin_pages_news_info", "Blog Pages/News Info", "' . $getblog . '", "blog", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_page_news_grid", "Blog Pages/News Display", "' . $get_blconnect . '", "blog", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_search", "Blog Search", "' . $get_blsearch . '", "blog", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_footer_widgets", "Blog - 3 Latest Files", "' . $get_blfooter_widgets . '", "blog", 1, 3, "' . $row['id'] . '", NOW()),
(NULL, "tpl_footer_widgets", "Blog - Show Categories", "' . $get_blfooter_widgets1 . '", "blog", 1, 3, "' . $row['id'] . '", NOW())');

			// EN: Insert data to table 'setting'
			// CZ: Vložení potřebných dat to tabulky 'setting'
			$envodb -> query('INSERT INTO ' . DB_PREFIX . 'setting (`varname`, `groupname`, `value`, `defaultvalue`, `optioncode`, `datatype`, `product`) VALUES
("blogtitle", "blog", "Blog", "Blog", "input", "free", "blog"),
("blogdesc", "blog", "Write something about your Blog", "Write something about your Blog", "textarea", "free", "blog"),
("blogdateformat", "blog", "d.m.Y", "d.m.Y", "input", "free", "blog"),
("blogtimeformat", "blog", NULL, NULL, "input", "free", "blog"),
("blogurl", "blog", 0, 0, "yesno", "boolean", "blog"),
("blogpagemid", "blog", 3, 3, "yesno", "number", "blog"),
("blogpageitem", "blog", 4, 4, "yesno", "number", "blog"),
("blogorder", "blog", "id ASC", "", "input", "free", "blog"),
("blogrss", "blog", 5, 5, "number", "select", "blog"),
("bloghlimit", "blog", 5, 5, "number", "select", "blog"),
("blogshortmsg", "blog", 300, 300, "number", "input", "blog"),
("blog_css", "blog", "", "", "textarea", "free", "blog"),
("blog_javascript", "blog", "", "", "textarea", "free", "blog")');

			// EN: Insert data to table 'usergroup'
			// CZ: Vložení potřebných dat to tabulky 'usergroup'
			$envodb -> query('ALTER TABLE ' . DB_PREFIX . 'usergroup ADD `blog` SMALLINT(1) UNSIGNED NOT NULL DEFAULT 0 AFTER `advsearch`');

			// Pages/News alter Table
			$envodb -> query('ALTER TABLE ' . DB_PREFIX . 'pages ADD showblog varchar(100) DEFAULT NULL AFTER shownews');
			$envodb -> query('ALTER TABLE ' . DB_PREFIX . 'news ADD showblog varchar(100) DEFAULT NULL AFTER shownews');
			$envodb -> query('ALTER TABLE ' . DB_PREFIX . 'pagesgrid ADD blogid INT(11) UNSIGNED NOT NULL DEFAULT 0 AFTER newsid');

			// Backup content from blog
			$envodb -> query('ALTER TABLE ' . DB_PREFIX . 'backup_content ADD blogid INT(11) UNSIGNED NOT NULL DEFAULT 0 AFTER pageid');

			// EN: Insert data to table 'categories' (create category)
			// CZ: Vložení potřebných dat to tabulky 'categories' (vytvoření kategorie)
			$envodb -> query('INSERT INTO ' . DB_PREFIX . 'categories (`id`, `name`, `varname`, `catimg`, `showmenu`, `showfooter`, `catorder`, `catparent`, `pageid`, `activeplugin`, `pluginid`) VALUES
(NULL, "Blog", "blog", NULL, 1, 0, 5, 0, 0, 1, "' . $rows['id'] . '")');

			// EN: Create table for plugin (article)
			// CZ: Vytvoření tabulky pro plugin (články)
			$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'blog (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catid` VARCHAR(100) NOT NULL DEFAULT 0,
  `title` varchar(255) DEFAULT NULL,
  `varname` varchar(255) DEFAULT NULL,
  `content` mediumtext,
  `blog_css` text,
  `blog_javascript` text,
  `sidebar` smallint(1) UNSIGNED NOT NULL DEFAULT 1,
  `previmg` varchar(255) DEFAULT NULL,
  `previmgdesc` mediumtext,
  `showtitle` smallint(1) unsigned NOT NULL DEFAULT 1,
  `active` smallint(1) unsigned NOT NULL DEFAULT 1,
  `showdate` smallint(1) unsigned NOT NULL DEFAULT 0,
  `socialbutton` smallint(1) unsigned NOT NULL DEFAULT 0,
  `hits` int(10) unsigned NOT NULL DEFAULT 0,
  `time` datetime NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  `startdate` INT(10) UNSIGNED NOT NULL DEFAULT 0,
  `enddate` INT(10) UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

			// EN: Create table for plugin (categories)
			// CZ: Vytvoření tabulky pro plugin (kategorie)
			$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'blogcategories (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

			// Full text search is activated we do so for the blog table as well
			if ($setting["fulltextsearch"]) {
				$envodb -> query('ALTER TABLE ' . DB_PREFIX . 'blog ADD FULLTEXT(`title`, `content`)');
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
              message: '<?=$tlblog["blog_install"]["bloginst4"]?>',
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

			$result = $envodb -> query('DELETE FROM ' . DB_PREFIX . 'plugins WHERE name = "Blog"');

			?>
				<div class="alert bg-danger"><?= $tlblog["blog_install"]["bloginst5"] ?></div>
				<form name="company" method="post" action="uninstall.php" enctype="multipart/form-data">
					<button type="submit" name="redirect" class="btn btn-danger btn-block">
						<?= $tlblog["blog_install"]["bloginst6"] ?>
					</button>
				</form>
			<?php }
			} ?>

			<?php if (!$succesfully) { ?>
				<form name="company" method="post" action="install.php" enctype="multipart/form-data">
					<button type="submit" name="install" class="btn btn-complete btn-block">
						<?= $tlblog["blog_install"]["bloginst7"] ?>
					</button>
				</form>
			<?php }
			} ?>

		</div>
	</div>
</div>

</body>
</html>