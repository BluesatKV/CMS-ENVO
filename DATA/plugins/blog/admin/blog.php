<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('ENVO_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!ENVO_USERID || !$envouser -> envoModuleAccess(ENVO_USERID, ENVO_ACCESS_BLOG)) envo_redirect(BASE_URL);

// -------- DATA FOR ALL ADMIN PAGES --------
// -------- DATA PRO VŠECHNY ADMIN STRÁNKY --------

// EN: Set base plugin folder - template
// CZ: Nastavení základní složky pluginu - šablony
$BASE_PLUGIN_URL_TEMPLATE  = APP_PATH . 'plugins/blog/admin/template/';
$SHORT_PLUGIN_URL_TEMPLATE = '/plugins/blog/admin/template/';

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable  = DB_PREFIX . 'blog';
$envotable1 = DB_PREFIX . 'blogcategories';
$envotable2 = DB_PREFIX . 'pagesgrid';
$envotable3 = DB_PREFIX . 'pluginhooks';
$envotable4 = DB_PREFIX . 'backup_content';

// EN: Default Variable
// CZ: Hlavní proměnné
$httpRef = $_SERVER['HTTP_REFERER'];
unset($parsed_url);
$parsed_url = parse_url($httpRef);
parse_str($parsed_url['query'], $httpRefArr);

// EN: Include the functions
// CZ: Vložené funkce
include_once("../plugins/blog/admin/include/functions.php");

// -------- DATA FOR SELECTED ADMIN PAGES --------
// -------- DATA PRO VYBRANÉ ADMIN STRÁNKY --------

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
	case 'new':
		// BLOG NEW ARTICLE

		// EN: Default Variable
		// CZ: Hlavní proměnné
		$catsID = $page2;

		// EN: POST REQUEST
		// CZ: POST REQUEST
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// EN: Default Variable
			// CZ: Hlavní proměnné
			$defaults = $_POST;

			if (isset($_POST['btnSave'])) {
				// EN: If button "Save Changes" clicked
				// CZ: Pokud bylo stisknuto tlačítko "Uložit"

				if (empty($defaults['envo_title'])) {
					$errors['e1'] = $tl['general_error']['generror18'] . '<br>';
				}

				if (!empty($defaults['envo_datetime'])) {
					$finaltime = $defaults['envo_datetime'];
				}

				if (!empty($defaults['envo_datefrom'])) {
					$finalfrom = strtotime($defaults['envo_datefrom']);
				}

				if (!empty($defaults['envo_dateto'])) {
					$finalto = strtotime($defaults['envo_dateto']);
				}

				if (isset($finalto) && isset($finalfrom) && $finalto < $finalfrom) {
					$errors['e3'] = $tl['general_error']['generror25'] . '<br>';
				}

				if (isset($defaults['envo_showdate'])) {
					$showdate = $defaults['envo_showdate'];
				} else {
					$showdate = 0;
				}

				if (count($errors) == 0) {

					// Save the time if available of article
					if (!empty($finaltime)) {
						$insert .= 'time = "' . smartsql($finaltime) . '"';
					} else {
						$insert .= 'time = NOW()';
					}

					// EN: Preview Image of file
					// CZ: Náhledový obrázek souboru
					if (!empty($defaults['envo_img'])) {
						$insert .= ',previmg = "' . smartsql($defaults['envo_img']) . '"';
					} else {
						$insert .= ',previmg = NULL';
					}

					// Save the time range if available of article
					if (isset($finalfrom)) {
						$insert .= ',startdate = "' . smartsql($finalfrom) . '",';
					}

					if (isset($finalto)) {
						$insert .= 'enddate = "' . smartsql($finalto) . '"';
					}

					// Save category
					if (!isset($defaults['envo_catid'])) {
						$catid = 0;
					} else {
						$catid = join(',', $defaults['envo_catid']);
					}

					if (!isset($defaults['envo_social'])) $defaults['envo_social'] = 0;

					/* EN: Convert value
					 * smartsql - secure method to insert form data into a MySQL DB
					 * ------------------
					 * CZ: Převod hodnot
					 * smartsql - secure method to insert form data into a MySQL DB
					 * url_slug  - friendly URL slug from a string
					*/
					$result = $envodb -> query('INSERT INTO ' . $envotable . ' SET
                    catid = "' . smartsql($catid) . '",
                    title = "' . smartsql($defaults['envo_title']) . '",
                    varname = "' . url_slug($defaults['envo_title'], array ('transliterate' => TRUE)) . '",
                    content = "' . smartsql($defaults['envo_content']) . '",
                    blog_css = "' . smartsql($defaults['envo_css']) . '",
                    blog_javascript = "' . smartsql($defaults['envo_javascript']) . '",
                    sidebar = "' . smartsql($defaults['envo_sidebar']) . '",
                    showtitle = "' . smartsql($defaults['envo_showtitle']) . '",
                    showdate = "' . smartsql($showdate) . '",
                    socialbutton = "' . smartsql($defaults['envo_social']) . '",
                    previmgdesc = "' . smartsql($defaults['envo_imgdesc']) . '",
                    ' . $insert);

					$rowid = $envodb -> envo_last_id();

					// Set tag active to zero
					$tagactive = 0;

					$catarray = explode(',', $catid);

					if (is_array($catarray)) {
						foreach ($catarray as $c) {

							$envodb -> query('UPDATE ' . $envotable1 . ' SET count = count + 1 WHERE id = "' . smartsql($c) . '"');
						}

						// Set tag active, well to active
						$tagactive = 1;

					}

					// Save order for sidebar widget
					if (isset($defaults['envo_hookshow']) && is_array($defaults['envo_hookshow'])) {

						$exorder = $defaults['horder'];
						$hookid  = $defaults['real_hook_id'];
						$plugind = $defaults['sreal_plugin_id'];
						$doith   = array_combine($hookid, $exorder);
						$pdoith  = array_combine($hookid, $plugind);

						foreach ($doith as $key => $exorder) {

							if (in_array($key, $defaults['envo_hookshow'])) {

								// Get the real what id
								$whatid = 0;
								if (isset($defaults['whatid_' . $pdoith[$key]])) $whatid = $defaults['whatid_' . $pdoith[$key]];

								$envodb -> query('INSERT INTO ' . $envotable2 . ' SET blogid = "' . smartsql($rowid) . '", hookid = "' . smartsql($key) . '", orderid = "' . smartsql($exorder) . '", pluginid = "' . smartsql($pdoith[$key]) . '", whatid = "' . smartsql($whatid) . '", plugin = "' . smartsql(ENVO_PLUGIN_BLOG) . '"');

							}

						}

					}

					if (!$result) {
						// EN: Redirect page
						// CZ: Přesměrování stránky
						envo_redirect(BASE_URL . 'index.php?p=blog&sp=new&status=e');
					} else {

						// Create Tags if the module is active
						if (!empty($defaults['envo_tags'])) {
							// check if tag does not exist and insert in cloud
							ENVO_tags ::envoBuildCloud($defaults['envo_tags'], $rowid, ENVO_PLUGIN_BLOG);
							// insert tag for normal use
							ENVO_tags ::envoInserTags($defaults['envo_tags'], $rowid, ENVO_PLUGIN_BLOG, $tagactive);

						}

						// EN: Redirect page
						// CZ: Přesměrování stránky
						envo_redirect(BASE_URL . 'index.php?p=blog&sp=edit&id=' . $rowid . '&status=s');
					}

				} else {

					$errors['e'] = $tl['general_error']['generror'] . '<br>';
					$errors      = $errors;
				}
			} else {
				// EN: If no button pressed
				// CZ: Pokud nebylo stisknuto žádné tlačítko

			}
		}

		// Get the important template stuff
		$ENVO_CAT = envo_get_cat_info($envotable1, 0);

		// EN: Select category by "Add article" in "Categories"
		// CZ: Výběr kategorie pro "Přidat článek" v "Kategoriích"
		if (is_numeric($catsID)) {
			$ENVO_CAT_SELECTED = $catsID;
		}

		// Get the sidebar templates
		$result = $envodb -> query('SELECT id, name, widgetcode, exorder, pluginid FROM ' . $envotable3 . ' WHERE hook_name = "tpl_sidebar" AND active = 1 ORDER BY exorder ASC');
		while ($row = $result -> fetch_assoc()) {
			$ENVO_HOOKS[] = $row;
		}

		// Get active sidebar widgets
		$grid = $envodb -> query('SELECT hookid FROM ' . $envotable2 . ' WHERE plugin = ' . ENVO_PLUGIN_BLOG . '  AND blogid = 0 ORDER BY orderid ASC');
		while ($grow = $grid -> fetch_assoc()) {
			// EN: Insert each record into array
			// CZ: Vložení získaných dat do pole
			$ENVO_ACTIVE_GRID[] = $grow;
		}

		// EN: Title and Description
		// CZ: Titulek a Popis
		$SECTION_TITLE = $tlblog["blog_sec_title"]["blogt1"];
		$SECTION_DESC  = $tlblog["blog_sec_desc"]["blogd1"];

		// EN: Load the php template
		// CZ: Načtení php template (šablony)
		$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'blog_new.php';

		break;
	case 'edit':
		// BLOG EDIT ARTICLE

		// EN: Default Variable
		// CZ: Hlavní proměnné
		$pageID = $page2;

		if (is_numeric($pageID) && envo_row_exist($pageID, $envotable)) {

			// EN: POST REQUEST
			// CZ: POST REQUEST
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				// EN: Default Variable
				// CZ: Hlavní proměnné
				$defaults = $_POST;

				// Delete the tags
				if (!empty($defaults['envo_tagdelete'])) {
					$tags = $defaults['envo_tagdelete'];

					for ($i = 0; $i < count($tags); $i++) {
						$tag = $tags[$i];

						ENVO_tags ::envoDeleteOneTag($tag);

					}
				}

				// Delete the hits
				if (!empty($defaults['envo_delete_hits'])) {
					$envodb -> query('UPDATE ' . $envotable . ' SET hits = 1 WHERE id = "' . smartsql($pageID) . '"');
				}

				if (empty($defaults['envo_title'])) {
					$errors['e1'] = $tl['general_error']['generror18'] . '<br>';
				}

				if (!empty($defaults['envo_datetime'])) {
					$finaltime = $defaults['envo_datetime'];
				}

				if (!empty($defaults['envo_datefrom'])) {
					$finalfrom = strtotime($defaults['envo_datefrom']);
				} else {
					$finalfrom = '0';
				}

				if (!empty($defaults['envo_dateto'])) {
					$finalto = strtotime($defaults['envo_dateto']);
				} else {
					$finalto = '0';
				}

				if (isset($finalto) && isset($finalfrom) && $finalto < $finalfrom) {
					$errors['e2'] = $tl['general_error']['generror25'] . '<br>';
				}

				if (count($errors) == 0) {
					// Save or update time of article
					if (empty($defaults['envo_update_time'])) {
						$insert .= 'time = "' . smartsql($finaltime) . '",';
					} else {
						$insert .= 'time = NOW(),';
					}

					// EN: Preview Image of file
					// CZ: Náhledový obrázek souboru
					if (!empty($defaults['envo_img'])) {
						$insert .= 'previmg = "' . smartsql($defaults['envo_img']) . '",';
					} else {
						$insert .= 'previmg = NULL,';
					}

					// Save the time range if available of article
					if (isset($finalfrom)) {
						$insert .= 'startdate = "' . smartsql($finalfrom) . '",';
					}

					if (isset($finalto)) {
						$insert .= 'enddate = "' . smartsql($finalto) . '",';
					}

					// Show Social Button
					if (!isset($defaults['envo_social'])) $defaults['envo_social'] = 0;

					// Save category
					if (!isset($defaults['envo_catid'])) {
						$catid = 0;
					} else {
						$catid = join(',', $defaults['envo_catid']);
					}

					// Get the old content first
					$rowsb = $envodb -> queryRow('SELECT content FROM ' . $envotable . ' WHERE id = "' . smartsql($pageID) . '"');

					// Insert the content into the backup table
					$envodb -> query('INSERT INTO ' . $envotable4 . ' SET
              blogid = "' . smartsql($pageID) . '",
              content = "' . smartsql($rowsb['content']) . '",
              time = NOW()');

					/* EN: Convert value
					 * smartsql - secure method to insert form data into a MySQL DB
					 * ------------------
					 * CZ: Převod hodnot
					 * smartsql - secure method to insert form data into a MySQL DB
					 * url_slug  - friendly URL slug from a string
					*/
					$result = $envodb -> query('UPDATE ' . $envotable . ' SET
                        catid = "' . smartsql($catid) . '",
                        title = "' . smartsql($defaults['envo_title']) . '",
                        varname = "' . url_slug($defaults['envo_title'], array ('transliterate' => TRUE)) . '",
                        content = "' . smartsql($defaults['envo_content']) . '",
                        blog_css = "' . smartsql($defaults['envo_css']) . '",
                        blog_javascript = "' . smartsql($defaults['envo_javascript']) . '",
                        sidebar = "' . smartsql($defaults['envo_sidebar']) . '",
                        showtitle = "' . smartsql($defaults['envo_showtitle']) . '",
                        showdate = "' . smartsql($defaults['envo_showdate']) . '",
                        ' . $insert . '
                        socialbutton = "' . smartsql($defaults['envo_social']) . '",
                        previmgdesc = "' . smartsql($defaults['envo_imgdesc']) . '"
                        WHERE id = "' . smartsql($pageID) . '"');

					// Set tag active to zero
					$tagactive = 0;

					if ($defaults['envo_oldcatid'] != 0) {
						// Set tag active, well to active
						$tagactive = 1;
					}

					$catoarray = explode(',', $defaults['envo_oldcatid']);

					if (is_array($catoarray)) {

						foreach ($catoarray as $co) {
							$envodb -> query('UPDATE ' . $envotable1 . ' SET count = count - 1 WHERE id = "' . smartsql($co) . '"');
						}
					}

					$catarray = explode(',', $catid);

					if (is_array($catarray)) {
						foreach ($catarray as $c) {

							$envodb -> query('UPDATE ' . $envotable1 . ' SET count = count + 1 WHERE id = "' . smartsql($c) . '"');
						}

						// Set tag active, well to active
						$tagactive = 1;

					}

					// Save order for sidebar widget
					if (isset($defaults['envo_hookshow_new']) && is_array($defaults['envo_hookshow_new'])) {

						$exorder = $defaults['horder_new'];
						$hookid  = $defaults['real_hook_id_new'];
						$plugind = $defaults['sreal_plugin_id_new'];
						$doith   = array_combine($hookid, $exorder);
						$pdoith  = array_combine($hookid, $plugind);

						foreach ($doith as $key => $exorder) {

							if (in_array($key, $defaults['envo_hookshow_new'])) {

								// Get the real what id
								$whatid = 0;
								if (isset($defaults['whatid_' . $pdoith[$key]])) $whatid = $defaults['whatid_' . $pdoith[$key]];

								$envodb -> query('INSERT INTO ' . $envotable2 . ' SET blogid = "' . smartsql($pageID) . '", hookid = "' . smartsql($key) . '", orderid = "' . smartsql($exorder) . '", pluginid = "' . smartsql($pdoith[$key]) . '", whatid = "' . smartsql($whatid) . '", plugin = "' . smartsql(ENVO_PLUGIN_BLOG) . '"');

							}

						}

					}

					// Now check if all the sidebar a deselct and hooks exist, if so delete all associated to this page
					if (!isset($defaults['envo_hookshow_new']) && !isset($defaults['envo_hookshow'])) {

						// Now check if all the sidebar a deselected and hooks exist, if so delete all associated to this page
						$row = $envodb -> queryRow('SELECT id FROM ' . $envotable2 . ' WHERE blogid = "' . smartsql($pageID) . '" AND hookid != 0');

						// We have something to delete
						if ($row["id"]) {
							$envodb -> query('DELETE FROM ' . $envotable2 . ' WHERE blogid = "' . smartsql($pageID) . '" AND hookid != 0');
						}

					}

					// Save order or delete for extra sidebar widget
					if (isset($defaults['envo_hookshow']) && is_array($defaults['envo_hookshow'])) {

						$exorder    = $defaults['horder'];
						$hookid     = $defaults['real_hook_id'];
						$hookrealid = implode(',', $defaults['real_hook_id']);
						$doith      = array_combine($hookid, $exorder);

						foreach ($doith as $key => $exorder) {

							// Get the real what id
							$row = $envodb -> queryRow('SELECT pluginid FROM ' . $envotable2 . ' WHERE id = "' . smartsql($key) . '" AND hookid != 0');

							$whatid = 0;
							if (isset($defaults['whatid_' . $row["pluginid"]])) $whatid = $defaults['whatid_' . $row["pluginid"]];

							if (in_array($key, $defaults['envo_hookshow'])) {
								$updatesql  .= sprintf("WHEN %d THEN %d ", $key, $exorder);
								$updatesql1 .= sprintf("WHEN %d THEN %d ", $key, $whatid);

							} else {
								$envodb -> query('DELETE FROM ' . $envotable2 . ' WHERE id = "' . smartsql($key) . '"');
							}
						}

						$envodb -> query('UPDATE ' . $envotable2 . ' SET orderid = CASE id ' . $updatesql . ' END WHERE id IN (' . $hookrealid . ')');

						$envodb -> query('UPDATE ' . $envotable2 . ' SET whatid = CASE id ' . $updatesql1 . ' END WHERE id IN (' . $hookrealid . ')');

					}

					if (!$result) {
						// EN: Redirect page
						// CZ: Přesměrování stránky
						envo_redirect(BASE_URL . 'index.php?p=blog&sp=edit&id=' . $pageID . '&status=e');
					} else {

						// Create Tags if the module is active
						if (!empty($defaults['envo_tags'])) {
							// Check if tag does not exist and insert in cloud
							ENVO_tags ::envoBuildCloud($defaults['envo_tags'], smartsql($pageID), ENVO_PLUGIN_BLOG);
							// Insert tag for normal use
							ENVO_tags ::envoInserTags($defaults['envo_tags'], smartsql($pageID), ENVO_PLUGIN_BLOG, $tagactive);

						}

						// EN: Redirect page
						// CZ: Přesměrování stránky
						envo_redirect(BASE_URL . 'index.php?p=blog&sp=edit&id=' . $pageID . '&status=s');
					}

				} else {
					$errors['e'] = $tl['general_error']['generror'] . '<br>';
					$errors      = $errors;
				}
			}

			// Get the important template stuff
			$ENVO_CAT = envo_get_cat_info($envotable1, 0);

			// EN:
			// CZ:
			$ENVO_FORM_DATA = envo_get_data($pageID, $envotable);
			if (ENVO_TAGS) {
				$ENVO_TAGLIST = envo_get_tags($pageID, ENVO_PLUGIN_BLOG);
			}

			// EN: Getting data from DB for the grid of page
			// CZ: Získání dat z DB pro mřížku stránky
			$grid = $envodb -> query('SELECT id, pluginid, hookid, whatid, orderid FROM ' . $envotable2 . ' WHERE blogid = "' . smartsql($pageID) . '" ORDER BY orderid ASC');
			while ($grow = $grid -> fetch_assoc()) {
				// EN: Insert each record into array
				// CZ: Vložení získaných dat do pole
				$ENVO_PAGE_GRID[] = $grow;
			}

			// Get the sidebar templates
			$result = $envodb -> query('SELECT id, name, widgetcode, exorder, pluginid FROM ' . $envotable3 . ' WHERE hook_name = "tpl_sidebar" AND active = 1 ORDER BY exorder ASC');
			while ($row = $result -> fetch_assoc()) {
				$ENVO_HOOKS[] = $row;
			}

			// First we delete the old records, older then 30 days
			$envodb -> query('DELETE FROM ' . $envotable4 . ' WHERE blogid = "' . smartsql($pageID) . '" AND DATEDIFF(CURDATE(), time) > 30');

			// Get the backup content
			$resultbp = $envodb -> query('SELECT id, time FROM ' . $envotable4 . ' WHERE blogid = "' . smartsql($pageID) . '" ORDER BY id DESC LIMIT 10');
			while ($rowbp = $resultbp -> fetch_assoc()) {
				// EN: Insert each record into array
				// CZ: Vložení získaných dat do pole
				$ENVO_PAGE_BACKUP[] = $rowbp;
			}

			// EN: Title and Description
			// CZ: Titulek a Popis
			$SECTION_TITLE = $tlblog["blog_sec_title"]["blogt3"];
			$SECTION_DESC  = $tlblog["blog_sec_desc"]["blogd3"];

			// EN: Load the php template
			// CZ: Načtení php template (šablony)
			$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'blog_edit.php';

		} else {
			// EN: Redirect page
			// CZ: Přesměrování stránky
			envo_redirect(BASE_URL . 'index.php?p=blog&status=ene');
		}
		break;
	case 'lock':
		// BLOG LOCK ARTICLE

		$result2 = $envodb -> query('SELECT catid, active FROM ' . $envotable . ' WHERE id = "' . smartsql($page2) . '"');
		$row2    = $result2 -> fetch_assoc();

		if (is_numeric($row2['catid'])) {

			if ($row2['active'] == 1) {
				$envodb -> query('UPDATE ' . $envotable1 . ' SET count = count - 1 WHERE id = "' . smartsql($row2['catid']) . '"');
			} else {
				$envodb -> query('UPDATE ' . $envotable1 . ' SET count = count + 1 WHERE id = "' . smartsql($row2['catid']) . '"');
			}

		} else {

			$catarray = explode(',', $row2['catid']);

			if (is_array($catarray)) foreach ($catarray as $c) {

				if ($row2['active'] == 1) {
					$envodb -> query('UPDATE ' . $envotable1 . ' SET count = count - 1 WHERE id = "' . smartsql($c) . '"');
				} else {
					$envodb -> query('UPDATE ' . $envotable1 . ' SET count = count + 1 WHERE id = "' . smartsql($c) . '"');
				}
			}

		}

		$result = $envodb -> query('UPDATE ' . $envotable . ' SET active = IF (active = 1, 0, 1) WHERE id = "' . smartsql($page2) . '"');

		ENVO_tags ::envoLockTags($page2, ENVO_PLUGIN_BLOG);

		if (!$result) {
			// EN: Redirect page
			// CZ: Přesměrování stránky s notifikací - chybné
			envo_redirect(http_ref_nostatus($parsed_url, $httpRefArr) . '&status=e');
		} else {
			// EN: Redirect page
			// CZ: Přesměrování stránky s notifikací - úspěšné
			/*
			NOTIFIKACE:
			'status=s'    - Záznam úspěšně uložen
			*/
			envo_redirect(http_ref_nostatus($parsed_url, $httpRefArr) . '&status=s');
		}


		break;
	case 'delete':
		// BLOG DELETE ARTICLE

		// EN: Default Variable
		// CZ: Hlavní proměnné
		$pageID = $page2;

		if (is_numeric($pageID) && envo_row_exist($pageID, $envotable)) {

			$result2 = $envodb -> query('SELECT catid FROM ' . $envotable . ' WHERE id = "' . smartsql($pageID) . '"');
			$row2    = $result2 -> fetch_assoc();

			if (is_numeric($row2['catid'])) {

				$envodb -> query('UPDATE ' . $envotable1 . ' SET count = count - 1 WHERE id = "' . smartsql($row2['catid']) . '"');


			} else {

				$catarray = explode(',', $row2['catid']);

				if (is_array($catarray)) foreach ($catarray as $c) {

					$envodb -> query('UPDATE ' . $envotable1 . ' SET count = count - 1 WHERE id = "' . smartsql($c) . '"');

				}

			}

			$result = $envodb -> query('DELETE FROM ' . $envotable . ' WHERE id = "' . smartsql($pageID) . '"');

			if (!$result) {
				// EN: Redirect page
				// CZ: Přesměrování stránky s notifikací - chybné
				envo_redirect(http_ref_nostatus($parsed_url, $httpRefArr) . '&status=e');
			} else {

				// EN: Delete the Tags from DB
				// CZ: Odstranění Tagů (Štítků) z DB
				ENVO_tags ::envoDeleteTags($pageID, ENVO_PLUGIN_BLOG);

				// EN: Redirect page
				// CZ: Přesměrování stránky s notifikací - úspěšné
				/*
				NOTIFIKACE:
				'status=s'    - Záznam úspěšně uložen
				'status1=s1'  - Záznam úspěšně odstraněn
				*/
				envo_redirect(http_ref_nostatus($parsed_url, $httpRefArr) . '&status=s&status1=s1');
			}

		} else {
			// EN: Redirect page
			// CZ: Přesměrování stránky
			envo_redirect(BASE_URL . 'index.php?p=blog&status=ene');
		}
		break;
	case 'showcat':
		// BLOG SHOW ARTICLE BY CATEGORY

		// EN: Default Variable
		// CZ: Hlavní proměnné
		$catID = $page2;

		// Important Smarty stuff
		$ENVO_CAT = envo_get_cat_info($envotable1, 0);

		$result   = $envodb -> query('SELECT name FROM ' . $envotable1 . ' WHERE id = ' . $catID . ' LIMIT 1');
		$row = $result -> fetch_assoc();
		$catname = $row['name'];

		// EN: Check data
		// CZ: Kontrola dat
		$row = $envodb -> queryRow('SELECT COUNT(*) as totalAll FROM ' . $envotable . ' WHERE FIND_IN_SET(' . $catID . ', catid)');
		$getTotal = $row['totalAll'];

		if ($getTotal != 0) {

			// EN: Get all data from DB
			// CZ: Získání všech dat z DB
			$ENVO_BLOG_SORT = envo_get_blogs('', $catID, $envotable);

			// EN: Title and Description
			// CZ: Titulek a Popis
			$SECTION_TITLE = $tlblog["blog_sec_title"]["blogt2"];
			$SECTION_DESC  = str_replace("%s", $catname, $tlblog["blog_sec_desc"]["blogd10"]);

			// EN: Load the php template
			// CZ: Načtení php template (šablony)
			$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'blog_cat_sort.php';

		} else {
			// EN: Redirect page
			// CZ: Přesměrování stránky
			envo_redirect(BASE_URL . 'index.php?p=blog&status=ene');
		}

		break;
	case 'categories':
		// BLOG CATEGORIES

		// Additional DB field information
		$envofield  = 'catparent';
		$envofield1 = 'varname';

		switch ($page2) {
			case 'lock':

				$result = $envodb -> query('UPDATE ' . $envotable1 . ' SET active = IF (active = 1, 0, 1) WHERE id = "' . smartsql($page3) . '"');

				if (!$result) {
					// EN: Redirect page
					// CZ: Přesměrování stránky
					envo_redirect(BASE_URL . 'index.php?p=blog&sp=categories&status=e');
				} else {
					// EN: Redirect page
					// CZ: Přesměrování stránky
					envo_redirect(BASE_URL . 'index.php?p=blog&sp=categories&status=s');
				}

				break;
			case 'delete':

				// EN: Default Variable
				// CZ: Hlavní proměnné
				$catID = $page3;

				if (envo_row_exist($catID, $envotable1) && !envo_field_not_exist($catID, $envotable1, $envofield)) {

					// EN: Check data
					// CZ: Kontrola dat
					$row      = $envodb -> queryRow('SELECT COUNT(*) as totalAll FROM ' . $envotable . ' WHERE catid LIKE "%' . $catID . '%"');
					$getTotal = $row['totalAll'];

					if ($getTotal != 0) {

						// EN: Redirect page
						// CZ: Přesměrování stránky s notifikací - chybné
						envo_redirect(BASE_URL . 'index.php?p=blog&sp=categories&status=epc');

					} else {

						// EN: Delete category from DB
						// CZ: Odstranění kategorie z DB
						$result = $envodb -> query('DELETE FROM ' . $envotable1 . ' WHERE id = "' . smartsql($catID) . '"');

						if (!$result) {

							// EN: Redirect page
							// CZ: Přesměrování stránky s notifikací - chybné
							envo_redirect(BASE_URL . 'index.php?p=blog&sp=categories&status=e');
						} else {
							// EN: Redirect page
							// CZ: Přesměrování stránky s notifikací - úspěšné
							/*
							NOTIFIKACE:
							'status=s'   - Záznam úspěšně uložen
							'status1=s1'  - Záznam úspěšně odstraněn
							*/
							envo_redirect(BASE_URL . 'index.php?p=blog&sp=categories&status=s&status1=s1');
						}

					}

				} else {
					// EN: Redirect page
					// CZ: Přesměrování stránky
					envo_redirect(BASE_URL . 'index.php?p=blog&sp=categories&status=ech');
				}

				break;
			case 'edit':

				if (envo_row_exist($page3, $envotable1)) {

					if ($_SERVER['REQUEST_METHOD'] == 'POST') {
						// EN: Default Variable
						// CZ: Hlavní proměnné
						$defaults = $_POST;

						if (empty($defaults['envo_name'])) {
							$errors['e1'] = $tl['general_error']['generror4'] . '<br>';
						}

						if (envo_field_not_exist_id($defaults['envo_varname'], $page3, $envotable1, $envofield1)) {
							$errors['e2'] = $tl['general_error']['generror21'] . '<br>';
						}

						if (empty($defaults['envo_varname'])) {
							$errors['e3'] = $tl['general_error']['generror22'] . '<br>';
						}

						if (!empty($defaults['envo_varname']) && !preg_match('/^([a-z-_0-9]||[-_])+$/', $defaults['envo_varname'])) {
							$errors['e4'] = $tl['general_error']['generror23'] . '<br>';
						}

						if (!isset($defaults['envo_permission'])) {
							$permission = 0;
						} elseif (in_array(0, $defaults['envo_permission'])) {
							$permission = 0;
						} else {
							$permission = join(',', $defaults['envo_permission']);
						}


						if (count($errors) == 0) {

							if (!empty($defaults['envo_img'])) {
								$insert .= 'catimg = "' . smartsql($defaults['envo_img']) . '",';
							} else {
								$insert .= 'catimg = NULL,';
							}

							/* EN: Convert value
							 * smartsql - secure method to insert form data into a MySQL DB
							 * ------------------
							 * CZ: Převod hodnot
							 * smartsql - secure method to insert form data into a MySQL DB
							*/
							$result = $envodb -> query('UPDATE ' . $envotable1 . ' SET
                        name = "' . smartsql($defaults['envo_name']) . '",
                        varname = "' . smartsql($defaults['envo_varname']) . '",
                        content = "' . smartsql($defaults['envo_lcontent']) . '",
                        permission = "' . smartsql($permission) . '",
                        ' . $insert . '
                        active = "' . smartsql($defaults['envo_active']) . '"
                        WHERE id = ' . smartsql($page3));

							if (!$result) {
								// EN: Redirect page
								// CZ: Přesměrování stránky
								envo_redirect(BASE_URL . 'index.php?p=blog&sp=categories&ssp=edit&id=' . $page3 . '&status=e');
							} else {
								// EN: Redirect page
								// CZ: Přesměrování stránky
								envo_redirect(BASE_URL . 'index.php?p=blog&sp=categories&ssp=edit&id=' . $page3 . '&status=s');
							}

						} else {

							$errors['e'] = $tl['general_error']['generror'] . '<br>';
							$errors      = $errors;
						}
					}

					$ENVO_FORM_DATA = envo_get_data($page3, $envotable1);
					$ENVO_USERGROUP = envo_get_usergroup_all('usergroup');

					// EN: Title and Description
					// CZ: Titulek a Popis
					$SECTION_TITLE = $tlblog["blog_sec_title"]["blogt5"];
					$SECTION_DESC  = $tlblog["blog_sec_desc"]["blogd5"];

					// EN: Load the php template
					// CZ: Načtení php template (šablony)
					$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'blog_edit_cat.php';

				} else {
					// EN: Redirect page
					// CZ: Přesměrování stránky
					envo_redirect(BASE_URL . 'index.php?p=blog&sp=categories&status=ene');
				}
				break;
			default:

				if ($_SERVER['REQUEST_METHOD'] == 'POST') {

					$count = 1;

					foreach ($_POST['menuItem'] as $k => $v) {

						if (!is_numeric($v)) $v = 0;

						$result = $envodb -> query('UPDATE ' . $envotable1 . ' SET catparent = "' . smartsql($v) . '", catorder = "' . smartsql($count) . '" WHERE id = "' . smartsql($k) . '"');

						$count++;

					}

					if ($result) {
						/* Outputtng the success messages */
						if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
							header('Cache-Control: no-cache');
							die(json_encode(array ("status" => 1, "html" => $tl["notification"]["n7"])));
						} else {
							// EN: Redirect page
							// CZ: Přesměrování stránky
							$_SESSION["successmsg"] = $tl["notification"]["n7"];
							envo_redirect(BASE_URL . 'index.php?p=b2b&sp=categories');
						}
					} else {
						/* Outputtng the success messages */
						if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
							header('Cache-Control: no-cache');
							die(json_encode(array ("status" => 0, "html" => $tl["general_error"]["generror1"])));
						} else {
							// EN: Redirect page
							// CZ: Přesměrování stránky
							$_SESSION["errormsg"] = $tl["general_error"]["generror1"];
							envo_redirect(BASE_URL . 'index.php?p=b2b&sp=categories');
						}
					}

				}

				// Get the menu
				$result = $envodb -> query('SELECT * FROM ' . $envotable1 . ' ORDER BY catparent, catorder, name');

				// Create a multidimensional array to conatin a list of items and parents
				$mheader = array (
					'items'   => array (),
					'parents' => array ()
				);
				// Builds the array lists with data from the menu table
				while ($items = $result -> fetch_assoc()) {
					// Creates entry into items array with current menu item id ie. $menu['items'][1]
					$mheader['items'][$items['id']] = $items;
					// Creates entry into parents array. Parents array contains a list of all items with children
					$mheader['parents'][$items['catparent']][] = $items['id'];
				}

				// EN: Check if some categories exist
				// CZ: Kontrola jestli existuje nějaká kategorie
				if (!empty($mheader['items'])) {
					$ENVO_BLOG_CAT_EXIST = '1';
				}

				// EN: Title and Description
				// CZ: Titulek a Popis
				$SECTION_TITLE = $tlblog["blog_sec_title"]["blogt4"];
				$SECTION_DESC  = $tlblog["blog_sec_desc"]["blogd4"];

				// EN: Load the php template
				// CZ: Načtení php template (šablony)
				$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'blog_cat.php';
		}
		break;
	case 'newcategory':
		// WIKI NEW CATEGORY

		// Additional DB Stuff
		$envofield = 'varname';

		// EN: POST REQUEST
		// CZ: POST REQUEST
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// EN: Default Variable
			// CZ: Hlavní proměnné
			$defaults = $_POST;

			if (empty($defaults['envo_name'])) {
				$errors['e1'] = $tl['general_error']['generror4'] . '<br>';
			}

			if (envo_field_not_exist($defaults['envo_varname'], $envotable1, $envofield)) {
				$errors['e2'] = $tl['general_error']['generror21'] . '<br>';
			}

			if (empty($defaults['envo_varname'])) {
				$errors['e3'] = $tl['general_error']['generror22'] . '<br>';
			}

			if (!empty($defaults['envo_varname']) && !preg_match('/^([a-z-_0-9]||[-_])+$/', $defaults['envo_varname'])) {
				$errors['e4'] = $tl['general_error']['generror23'] . '<br>';
			}

			if (count($errors) == 0) {

				if (!isset($defaults['envo_active'])) {
					$catactive = 1;
				} else {
					$catactive = $defaults['envo_active'];
				}

				if (!isset($defaults['envo_permission'])) {
					$permission = 0;
				} elseif (in_array(0, $defaults['envo_permission'])) {
					$permission = 0;
				} else {
					$permission = join(',', $defaults['envo_permission']);
				}

				if (!empty($defaults['envo_img'])) {
					$insert = 'catimg = "' . smartsql($defaults['envo_img']) . '",';
				}

				/* EN: Convert value
				 * smartsql - secure method to insert form data into a MySQL DB
				 * ------------------
				 * CZ: Převod hodnot
				 * smartsql - secure method to insert form data into a MySQL DB
				*/
				$result = $envodb -> query('INSERT INTO ' . $envotable1 . ' SET
                  name = "' . smartsql($defaults['envo_name']) . '",
                  varname = "' . smartsql($defaults['envo_varname']) . '",
                  content = "' . smartsql($defaults['envo_lcontent']) . '",
                  permission = "' . smartsql($permission) . '",
                  active = "' . smartsql($catactive) . '",
                  ' . $insert . '
                  catparent = 0');

				$rowid = $envodb -> envo_last_id();

				if (!$result) {
					// EN: Redirect page
					// CZ: Přesměrování stránky
					envo_redirect(BASE_URL . 'index.php?p=blog&sp=newcategory&status=e');
				} else {
					// EN: Redirect page
					// CZ: Přesměrování stránky
					envo_redirect(BASE_URL . 'index.php?p=blog&sp=categories&ssp=edit&id=' . $rowid . '&status=s');
				}
			} else {

				$errors['e'] = $tl['general_error']['generror'] . '<br>';
				$errors      = $errors;
			}
		}

		// Load all cats and get the usergroup information
		$ENVO_USERGROUP = envo_get_usergroup_all('usergroup');

		// EN: Title and Description
		// CZ: Titulek a Popis
		$SECTION_TITLE = $tlblog["blog_sec_title"]["blogt6"];
		$SECTION_DESC  = $tlblog["blog_sec_desc"]["blogd6"];

		// EN: Load the php template
		// CZ: Načtení php template (šablony)
		$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'blog_new_cat.php';

		break;
	case 'setting':
		// BLOG SETTING

		// EN: POST REQUEST
		// CZ: POST REQUEST
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// EN: Default Variable
			// CZ: Hlavní proměnné
			$defaults = $_POST;

			if (empty($defaults['envo_date'])) {
				$errors['e3'] = $tl['general_error']['generror26'] . '<br>';
			}

			if (!is_numeric($defaults['envo_blogshortmsg'])) {
				$errors['e4'] = $tl['general_error']['generror27'] . '<br>';
			}

			if (!is_numeric($defaults['envo_item'])) {
				$errors['e5'] = $tl['general_error']['generror27'] . '<br>';
			}

			if (!is_numeric($defaults['envo_mid'])) {
				$errors['e6'] = $tl['general_error']['generror27'] . '<br>';
			}

			if (!is_numeric($defaults['envo_rssitem'])) {
				$errors['e7'] = $tl['general_error']['generror27'] . '<br>';
			}

			if (count($errors) == 0) {

				// Get the order into the right format
				$blogorder = $defaults['envo_showblogordern'] . ' ' . $defaults['envo_showblogorder'];

				/* EN: Convert value
				 * smartsql - secure method to insert form data into a MySQL DB
				 * ------------------
				 * CZ: Převod hodnot
				 * smartsql - secure method to insert form data into a MySQL DB
				*/
				$result = $envodb -> query('UPDATE ' . DB_PREFIX . 'setting SET value = CASE varname
                    WHEN "blogtitle" THEN "' . smartsql($defaults['envo_title']) . '"
                    WHEN "blogdesc" THEN "' . smartsql($defaults['envo_lcontent']) . '"
                    WHEN "blogorder" THEN "' . $blogorder . '"
                    WHEN "bloghlimit" THEN "' . smartsql($defaults['envo_bloglimit']) . '"
                    WHEN "blogdateformat" THEN "' . smartsql($defaults['envo_date']) . '"
                    WHEN "blogtimeformat" THEN "' . smartsql($defaults['envo_time']) . '"
                    WHEN "blogurl" THEN "' . smartsql($defaults['envo_blogurl']) . '"
                    WHEN "blogrss" THEN "' . smartsql($defaults['envo_rssitem']) . '"
                    WHEN "blogpagemid" THEN "' . smartsql($defaults['envo_mid']) . '"
                    WHEN "blogpageitem" THEN "' . smartsql($defaults['envo_item']) . '"
                    WHEN "blogshortmsg" THEN "' . smartsql($defaults['envo_blogshortmsg']) . '"
                    WHEN "blog_css" THEN "' . smartsql($defaults['envo_css']) . '"
                    WHEN "blog_javascript" THEN "' . smartsql($defaults['envo_javascript']) . '"
                  END
                  WHERE varname IN ("blogtitle", "blogdesc", "blogorder", "bloghlimit", "blogdateformat", "blogtimeformat", "blogurl", "blogpagemid", "blogpageitem", "blogshortmsg", "blogrss", "blog_css", "blog_javascript")');

				// Save order for sidebar widget
				if (isset($defaults['envo_hookshow_new']) && !empty($defaults['envo_hookshow_new'])) {

					$exorder = $defaults['horder_new'];
					$hookid  = $defaults['real_hook_id_new'];
					$plugind = $defaults['sreal_plugin_id_new'];
					$doith   = array_combine($hookid, $exorder);
					$pdoith  = array_combine($hookid, $plugind);

					foreach ($doith as $key => $exorder) {

						if (in_array($key, $defaults['envo_hookshow_new'])) {

							// Get the real what id
							$whatid = 0;
							if (isset($defaults['whatid_' . $pdoith[$key]])) $whatid = $defaults['whatid_' . $pdoith[$key]];

							$envodb -> query('INSERT INTO ' . $envotable2 . ' SET plugin = "' . smartsql(ENVO_PLUGIN_BLOG) . '", hookid = "' . smartsql($key) . '", pluginid = "' . smartsql($pdoith[$key]) . '", whatid = "' . smartsql($whatid) . '", orderid = "' . smartsql($exorder) . '"');

						}

					}

				}

				// Now check if all the sidebar a deselct and hooks exist, if so delete all associated to this page
				if (!isset($defaults['envo_hookshow_new']) && !isset($defaults['envo_hookshow'])) {

					// Now check if all the sidebar a deselected and hooks exist, if so delete all associated to this page
					$row = $envodb -> queryRow('SELECT id FROM ' . $envotable2 . ' WHERE plugin = "' . smartsql(ENVO_PLUGIN_BLOG) . '" AND blogid = 0 AND hookid != 0');

					// We have something to delete
					if ($row["id"]) {
						$envodb -> query('DELETE FROM ' . $envotable2 . ' WHERE plugin = "' . smartsql(ENVO_PLUGIN_BLOG) . '" AND blogid = 0 AND hookid != 0');
					}

				}

				// Save order or delete for extra sidebar widget
				if (isset($defaults['envo_hookshow']) && is_array($defaults['envo_hookshow'])) {

					$exorder    = $defaults['horder'];
					$hookid     = $defaults['real_hook_id'];
					$hookrealid = implode(',', $defaults['real_hook_id']);
					$doith      = array_combine($hookid, $exorder);

					// Reset update
					$updatesql = $updatesql1 = "";

					// Run the foreach for the hooks
					foreach ($doith as $key => $exorder) {

						// Get the real what id
						$row = $envodb -> queryRow('SELECT pluginid FROM ' . $envotable2 . ' WHERE id = "' . smartsql($key) . '" AND hookid != 0');

						// Get the whatid
						$whatid = 0;
						if (isset($defaults['whatid_' . $row["pluginid"]])) $whatid = $defaults['whatid_' . $row["pluginid"]];

						if (in_array($key, $defaults['envo_hookshow'])) {
							$updatesql  .= sprintf("WHEN %d THEN %d ", $key, $exorder);
							$updatesql1 .= sprintf("WHEN %d THEN %d ", $key, $whatid);

						} else {
							$envodb -> query('DELETE FROM ' . $envotable2 . ' WHERE id = "' . smartsql($key) . '"');
						}
					}

					$envodb -> query('UPDATE ' . $envotable2 . ' SET orderid = CASE id
					' . $updatesql . '
					END
					WHERE id IN (' . $hookrealid . ')');

					$envodb -> query('UPDATE ' . $envotable2 . ' SET whatid = CASE id
					' . $updatesql1 . '
					END
					WHERE id IN (' . $hookrealid . ')');

				}

				if (!$result) {
					// EN: Redirect page
					// CZ: Přesměrování stránky
					envo_redirect(BASE_URL . 'index.php?p=blog&sp=setting&status=e');
				} else {
					// EN: Redirect page
					// CZ: Přesměrování stránky
					envo_redirect(BASE_URL . 'index.php?p=blog&sp=setting&status=s');
				}
			} else {
				$errors['e'] = $tl['general_error']['generror'] . '<br>';
				$errors      = $errors;
			}
		}

		// EN: Import important settings for the template from the DB
		// CZ: Importuj důležité nastavení pro šablonu z DB
		$ENVO_SETTING = envo_get_setting('blog');

		// EN: Import important settings for the template from the DB (only VALUE)
		// CZ: Importuj důležité nastavení pro šablonu z DB (HODNOTY)
		$ENVO_SETTING_VAL = envo_get_setting_val('blog');

		// EN: Getting data from DB for the grid of page
		// CZ: Získání dat z DB pro mřížku stránky
		$ENVO_PAGE_GRID = array ();
		$grid           = $envodb -> query('SELECT id, hookid, whatid, orderid FROM ' . $envotable2 . ' WHERE plugin = "' . smartsql(ENVO_PLUGIN_BLOG) . '" AND blogid = 0 ORDER BY orderid ASC');
		while ($grow = $grid -> fetch_assoc()) {
			// EN: Insert each record into array
			// CZ: Vložení získaných dat do pole
			$ENVO_PAGE_GRID[] = $grow;
		}

		// Get the sidebar templates
		$ENVO_HOOKS = array ();
		$result     = $envodb -> query('SELECT id, name, widgetcode, exorder, pluginid FROM ' . $envotable3 . ' WHERE hook_name = "tpl_sidebar" AND active = 1 ORDER BY exorder ASC');
		while ($row = $result -> fetch_assoc()) {
			$ENVO_HOOKS[] = $row;
		}

		// Now let's check how to display the order
		$showblogarray = explode(" ", $setting["blogorder"]);

		if (is_array($showblogarray) && in_array("ASC", $showblogarray) || in_array("DESC", $showblogarray)) {

			$ENVO_SETTING['showblogwhat']  = $showblogarray[0];
			$ENVO_SETTING['showblogorder'] = $showblogarray[1];

		}

		// EN: Title and Description
		// CZ: Titulek a Popis
		$SECTION_TITLE = $tlblog["blog_sec_title"]["blogt9"];
		$SECTION_DESC  = $tlblog["blog_sec_desc"]["blogd9"];

		// EN: Load the php template
		// CZ: Načtení php template (šablony)
		$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'blog_setting.php';

		break;
	case 'quickedit':
		// BLOG QUICKEDIT IN FRONTEND

		// EN: Default Variable
		// CZ: Hlavní proměnné
		$pageID = $page2;

		if (envo_row_exist($pageID, $envotable)) {

			// EN: POST REQUEST
			// CZ: POST REQUEST
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				// EN: Default Variable
				// CZ: Hlavní proměnné
				$defaults = $_POST;

				if (empty($defaults['envo_title'])) {
					$errors['e1'] = $tl['general_error']['generror18'] . '<br>';
				}

				// Now do the dirty stuff in mysql
				if (count($errors) == 0) {

					/* EN: Convert value
					 * smartsql - secure method to insert form data into a MySQL DB
					 * ------------------
					 * CZ: Převod hodnot
					 * smartsql - secure method to insert form data into a MySQL DB
					*/
					$result = $envodb -> query('UPDATE ' . $envotable . ' SET
                    title = "' . smartsql($defaults['envo_title']) . '",
                    content = "' . smartsql($defaults['envo_lcontent']) . '"
                    WHERE id = "' . smartsql($pageID) . '"');

					if (!$result) {
						// EN: Redirect page
						// CZ: Přesměrování stránky
						envo_redirect(BASE_URL . 'index.php?p=blog&sp=quickedit&id=' . $pageID . '&status=e');
					} else {
						// EN: Redirect page
						// CZ: Přesměrování stránky
						envo_redirect(BASE_URL . 'index.php?p=blog&sp=quickedit&id=' . $pageID . '&status=s');
					}
				} else {

					$errors['e'] = $tl['general_error']['generror'] . '<br>';
					$errors      = $errors;
				}
			}

			// EN: Get all data from DB
			// CZ: Získání všech dat z DB
			$ENVO_FORM_DATA = envo_get_data($pageID, $envotable);

			// EN: Load the php template
			// CZ: Načtení php template (šablony)
			$template = 'quickedit.php';

		} else {
			// EN: Redirect page
			// CZ: Přesměrování stránky
			envo_redirect(BASE_URL . 'index.php?p=blog&status=ene');
		}
		break;
	default:
		// MAIN PAGE OF PLUGIN - LIST OF BLOG ARTICLE

		// ----------- ERROR: REDIRECT PAGE ------------
		// -------- CHYBA: PŘESMĚROVÁNÍ STRÁNKY --------

		// EN: If not exist value in 'case', redirect page to 404
		// CZ: Pokud neexistuje 'case', dochází k přesměrování stránek na 404
		$pagearray = array ('new', 'edit', 'lock', 'delete', 'showcat', 'categories', 'newcategory', 'setting', 'quickedit');
		if (!empty($page1) && !is_numeric($page1)) {
			if (in_array($page1, $pagearray)) {
				envo_redirect(ENVO_rewrite ::envoParseurl('admin', 'index.php?p=404'));
			}
		}

		// ----------- SUCCESS: CODE FOR MAIN PAGE ------------
		// -------- VŠE V POŘÁDKU: KÓD PRO HLAVNÍ STRÁNKU --------

		// EN: POST REQUEST
		// CZ: POST REQUEST
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['envo_delete_blog'])) {
			// EN: Default Variable
			// CZ: Hlavní proměnné
			$defaults = $_POST;

			if (isset($defaults['lock'])) {

				$lockuser = $defaults['envo_delete_blog'];

				for ($i = 0; $i < count($lockuser); $i++) {
					$locked = $lockuser[$i];

					$result2 = $envodb -> query('SELECT catid, active FROM ' . $envotable . ' WHERE id = "' . smartsql($locked) . '"');
					$row2    = $result2 -> fetch_assoc();

					if (is_numeric($row2['catid'])) {

						if ($row2['active'] == 1) {
							$envodb -> query('UPDATE ' . $envotable1 . ' SET count = count - 1 WHERE id = "' . smartsql($row2['catid']) . '"');
						} else {
							$envodb -> query('UPDATE ' . $envotable1 . ' SET count = count + 1 WHERE id = "' . smartsql($row2['catid']) . '"');
						}

					} else {

						$catarray = explode(',', $row2['catid']);

						if (is_array($catarray)) foreach ($catarray as $c) {

							if ($row2['active'] == 1) {
								$envodb -> query('UPDATE ' . $envotable1 . ' SET count = count - 1 WHERE id = "' . smartsql($c) . '"');
							} else {
								$envodb -> query('UPDATE ' . $envotable1 . ' SET count = count + 1 WHERE id = "' . smartsql($c) . '"');
							}
						}

					}

					$result = $envodb -> query('UPDATE ' . $envotable . ' SET active = IF (active = 1, 0, 1) WHERE id = "' . smartsql($locked) . '"');

					ENVO_tags ::envoLockTags($locked, ENVO_PLUGIN_BLOG);
				}

				if (!$result) {
					// EN: Redirect page
					// CZ: Přesměrování stránky s notifikací - chybné
					envo_redirect(BASE_URL . 'index.php?p=blog&status=e');
				} else {
					// EN: Redirect page
					// CZ: Přesměrování stránky s notifikací - úspěšné
					/*
					NOTIFIKACE:
					'status=s'    - Záznam úspěšně uložen
					*/
					envo_redirect(BASE_URL . 'index.php?p=blog&status=s');
				}

			}

			if (isset($defaults['delete'])) {

				$deleteuser = $defaults['envo_delete_blog'];

				for ($i = 0; $i < count($deleteuser); $i++) {
					$deleted = $deleteuser[$i];

					$result2 = $envodb -> query('SELECT catid FROM ' . $envotable . ' WHERE id = "' . smartsql($deleted) . '"');
					$row2    = $result2 -> fetch_assoc();

					if (is_numeric($row2['catid'])) {

						$envodb -> query('UPDATE ' . $envotable1 . ' SET count = count - 1 WHERE id = "' . smartsql($row2['catid']) . '"');


					} else {

						$catarray = explode(',', $row2['catid']);

						if (is_array($catarray)) foreach ($catarray as $c) {

							$envodb -> query('UPDATE ' . $envotable1 . ' SET count = count - 1 WHERE id = "' . smartsql($c) . '"');

						}

					}

					$result = $envodb -> query('DELETE FROM ' . $envotable . ' WHERE id = "' . smartsql($deleted) . '"');

					ENVO_tags ::envoDeleteTags($deleted, ENVO_PLUGIN_BLOG);
				}

				if (!$result) {
					// EN: Redirect page
					// CZ: Přesměrování stránky s notifikací - chybné
					envo_redirect(BASE_URL . 'index.php?p=blog&status=e');
				} else {
					// EN: Redirect page
					// CZ: Přesměrování stránky s notifikací - úspěšné
					/*
					NOTIFIKACE:
					'status=s'    - Záznam úspěšně uložen
					'status1=s1'  - Záznam úspěšně odstraněn
					*/
					envo_redirect(BASE_URL . 'index.php?p=blog&status=s&status1=s1');
				}

			}

		}

		// Important Smarty stuff
		$ENVO_CAT = envo_get_cat_info($envotable1, 0);

		// EN: Check data
		// CZ: Kontrola dat
		$row = $envodb -> queryRow('SELECT COUNT(*) as totalAll FROM ' . $envotable);
		$getTotal = $row['totalAll'];

		if ($getTotal != 0) {

			// EN: Get all data from DB
			// CZ: Získání všech dat z DB
			$ENVO_BLOG_ALL = envo_get_blogs('', '', $envotable);

			// EN: Statistics
			// CZ: Statistika
			// Stats - Count of all
			$result              = $envodb -> query('SELECT COUNT(id) AS total FROM ' . $envotable);
			$data                = $result -> fetch_assoc();
			$ENVO_STATS_COUNTALL = $data['total'];

			// Stats - Count of active
			$result                 = $envodb -> query('SELECT COUNT(id) AS totalactive FROM ' . $envotable . ' WHERE catid > 0 AND active = 1');
			$data                   = $result -> fetch_assoc();
			$ENVO_STATS_COUNTACTIVE = $data['totalactive'];

			// Stats - Count of not active
			$result                    = $envodb -> query('SELECT COUNT(id) AS totalnotactive FROM ' . $envotable . ' WHERE (catid = 0 AND active = 0) OR (catid = 0 AND active = 1) OR (catid > 0 AND active = 0)');
			$data                      = $result -> fetch_assoc();
			$ENVO_STATS_COUNTNOTACTIVE = $data['totalnotactive'];

			// EN: Title and Description
			// CZ: Titulek a Popis
			$SECTION_TITLE = $tlblog["blog_sec_title"]["blogt"];
			$SECTION_DESC  = $tlblog["blog_sec_desc"]["blogd"];

			// EN: Load the php template
			// CZ: Načtení php template (šablony)
			$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'blog.php';

		} else {
			// EN: Redirect page
			// CZ: Přesměrování stránky
			envo_redirect(BASE_URL . 'index.php?p=blog&status=ene');
		}


}

?>