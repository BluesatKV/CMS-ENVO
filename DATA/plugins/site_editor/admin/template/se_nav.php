<!-- START SITE EDIT -->
<li class="list-divider"></li>
<li class="nav-item-header">
	<div class="text-uppercase text-master fs-14 bold" style="line-height: 40px;"><?= $tlsedi["siteedit_menu"]["sem0"] ?></div>
</li>
<li class="<?= ($page == 'site-editor') ? 'submenu-active' : '' ?>">

	<?php
	// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
	echo $Html -> addAnchor('index.php?p=site-editor', $tlsedi["siteedit_menu"]["sem"]);
	// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
	echo $Html -> addTag('span', text_clipping_lower($tlsedi["siteedit_menu"]["sem"]), 'icon-thumbnail');
	?>

</li><!-- END SITE EDIT -->
