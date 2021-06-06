<!DOCTYPE html>
<html lang="cs">
<head>
	<meta charset="utf-8">
	<title>Download Plugin Dokumentace</title>

	<!-- ======= FONTS ======= -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&subset=latin-ext" rel="stylesheet">

	<!-- ======= CSS STYLE ======= -->
	<!-- Main style -->
	<link rel="stylesheet" href="/admin/assets/doc/css/doc.css">

</head>
<body>

<header>
	<h1>Nápověda - Plugin Download</h1>
	<div class="clear"></div>
</header>

<nav id="subnav">
	<h3>Obsah</h3>
	<h3>Aktuální kapitola: <span id="curnav" class="light"> O Pluginu </span></h3>
</nav>

<aside>
	<nav>
		<ul id="sidebar">
			<li class="active">
				<span>O Pluginu</span>
				<ul>
					<li data-deeplink="about-plugin" class="active">O Pluginu</li>
					<li data-deeplink="folders-files">Složky - Soubory</li>
					<li data-deeplink="changelog">Changelog</li>
				</ul>
			</li>
		</ul>
	</nav>
</aside>

<div id="content">
	<div>

		<!-- About Plugin -->
		<section class="active">

			<!-- About Plugin -->
			<article class="active">
				<h4>O Pluginu</h4>

			</article>

			<!-- Folders and Files -->
			<article>
				<h4>Soubory a Složky</h4>

			</article>

			<!-- Changelog -->
			<article>
				<h4>Changelog</h4>
				<h5>v 1.2.1</h5>
				<pre>
// # Seznam nových komponent
// ------------------------------

[nový] Přidána statistika CMS Dashboard -> Plugin
[nový] Přidána možnost vložení jiného obrázku pro FB než je náhledový obrázek

// # Seznam opravených chyb
// ------------------------------

[opraveno] Reformát kódu
[opraveno] Překlad cs.ini
[opraveno] Fix typo

// # Seznam odstraněných komponent
// ------------------------------

[odstraněno] Odstranění zbytečného kódu
				</pre>

				<h5>v 1.2</h5>
				<pre>
// # Seznam nových komponent
// ------------------------------

[nový] Add new value '$DOWNLOAD_CATLIST' and '$DOWNLOAD_CAT' for downloadfile.php ( Category for download file )
[nový] If download file not exist, show notification
[nový] If download file not access, show notification
[nový] If not exist frontend template, load basic download template

// # Seznam opravených chyb
// ------------------------------

[opraveno] Reformát kódu
[opraveno] Překlad cs.ini
[opraveno] Fix typo

// # Seznam odstraněných komponent
// ------------------------------

[odstraněno] Odstranění zbytečného kódu
				</pre>

				<h5>v 1.1</h5>
				<pre>
// # Seznam nových komponent
// ------------------------------

[nový] Better notification
[nový] Use class for create hmtl element
[nový] Add help for plugin
[nový] Better install/unistall wizard
[nový] New design
[nový] Add edit of articles time

// # Seznam opravených chyb
// ------------------------------

[opraveno] Reformát kódu
[opraveno] Překlad cs.ini
[opraveno] Fix typo

// # Seznam odstraněných komponent
// ------------------------------

[odstraněno] Odstranění zbytečného kódu
				</pre>

				<h5>v 1.0</h5>
				<p>Základní inicializace</p>
			</article>

		</section>

	</div>
</div>

<!-- ======= JQUERY SCRIPT ======= -->
<script src="/assets/plugins/jquery/jquery-2.2.4.min.js"></script>
<script src="/admin/assets/doc/js/doc.js"></script>

</body>
</html>