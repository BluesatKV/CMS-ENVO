<?php
/*
 * AKP Categories - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site footer:
 *      - javascript code
 *      - external javascript files
 *      - the file 'assets/js/script.categories.js'
 * CZ: Soubor vkládá další soubory do zápatí webu:
 *      - javascript kód
 *      - externí javascript soubory
 *      - soubor 'assets/js/script.categories.js'
 *
 */

if ($page == 'categories') {

	echo PHP_EOL . '<!-- Start JS AKP Categories -->';

	// Setting variable for Jquery external script
	if (isset($ENVO_FORM_DATA["catimg"])) {
		$str = $ENVO_FORM_DATA["catimg"];

		if (strpos($str, 'glyphicons ') !== FALSE) {
			$categoryimg = str_replace('glyphicons ', '', $ENVO_FORM_DATA["catimg"]);
		} else {
			$categoryimg = str_replace('fa ', '', $ENVO_FORM_DATA["catimg"]);
		}
	} else {
		$categoryimg = 'fa-font';
	}
	?>

	<script>
		// Add to Global settings javascript object
		iconPicker['icon'] = <?=json_encode($categoryimg)?>;
		globalSettings['pageID2'] = <?=(!empty($page2) && is_numeric($page2) ? $page2 : '""')?>;
	</script>

	<?php

	// Add Html Element -> addScript (Arguments: src, optional assoc. array)
	// Plugin Slug
	echo $Html -> addScript('assets/js/global_js/slug.min.js');
	// Categories plugin and script
	echo $Html -> addScript('assets/plugins/jquery-nestedsortable/jquery.mjs.nestedSortable.min.js');
	echo $Html -> addScript('assets/js/global_js/catorder.min.js');
	// Plugin Javascript
	echo $Html -> addScript('assets/js/script.categories.min.js');

	echo PHP_EOL . '<!-- End JS AKP Categories -->' . PHP_EOL;

}

// New line in source code
echo PHP_EOL;
?>
