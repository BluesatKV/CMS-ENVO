<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Bluesat Template Documentation</title>

  <!-- ======= FONTS ======= -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&subset=latin-ext" rel="stylesheet">

  <!-- ======= CSS STYLE ======= -->
  <link rel="stylesheet" href="/admin/doc/css/doc.css">
  <link rel="stylesheet" href="/admin/doc/js/syntaxhighlighter/styles/shCoreKreatura.css">
  <link rel="stylesheet" href="/admin/doc/js/syntaxhighlighter/styles/shThemeKreatura.css">
  <!--[if lt IE 9]>
  <script src="assets/js/html5.js"></script>
  <![endif]-->

</head>
<body>

<header>
  <h1>CMS - Bluesat Help</h1>
  <div class="clear"></div>
</header>

<nav id="subnav">
  <h3>Table of Contents</h3>
  <h3>Current Chapter: <span id="curnav" class="light">About CMS - Bluesat / Requirements</span></h3>
</nav>

<aside>
  <nav>
    <ul id="sidebar">
      <li class="active">
        <span>About CMS - Bluesat</span>
        <ul>
          <li data-deeplink="requirements">Requirements</li>
          <li data-deeplink="about-cms">About CMS</li>
          <li data-deeplink="installation">Installation - First Step</li>
          <li data-deeplink="htaccess">CMS and htaccess (Seo)</li>
        </ul>
      </li>
      <li>
        <span>Plugins</span>
        <ul>
          <li data-deeplink="belowheader">Below Header</li>
          <li data-deeplink="blog">Blog</li>
          <li data-deeplink="download">Download</li>
          <li data-deeplink="faq">FAQ</li>
        </ul>
      </li>
      <li>
        <span>Hooks</span>
        <ul>
          <li data-deeplink="php_search">Hook: php_search</li>
          <li data-deeplink="php_tags">Hook: php_tags</li>
          <li data-deeplink="php_sitemap">Hook: php_sitemap</li>
          <li data-deeplink="php_index_top">Hook: php_index_top</li>
          <li data-deeplink="php_rss">Hook: php_rss</li>
          <li data-deeplink="php_index_bottom">Hook: php_index_bottom</li>
          <li data-deeplink="php_index_page">Hook: php_index_page</li>
          <li data-deeplink="php_lang">Hook: php_lang</li>
          <li data-deeplink="php_pages_news">Hook: php_pages_news</li>
          <li data-deeplink="php_admin_usergroup">Hook: php_admin_usergroup</li>
          <li data-deeplink="php_admin_user_rename">Hook: php_admin_user_rename</li>
          <li data-deeplink="php_admin_user_delete">Hook: php_admin_user_delete</li>
          <li data-deeplink="php_admin_user_delete_mass">Hook: php_admin_user_delete_mass</li>
          <li data-deeplink="php_admin_lang">Hook: php_admin_lang</li>
          <li data-deeplink="php_admin_setting">Hook: php_admin_setting</li>
          <li data-deeplink="php_admin_setting_post">Hook: php_admin_setting_post</li>
          <li data-deeplink="php_admin_user">Hook: php_admin_user</li>
          <li data-deeplink="php_admin_user_edit">Hook: php_admin_user_edit</li>
          <li data-deeplink="php_admin_index">Hook: php_admin_index</li>
          <li data-deeplink="php_admin_fulltext_add">Hook: php_admin_fulltext_add</li>
          <li data-deeplink="php_admin_fulltext_remove">Hook: php_admin_fulltext_remove</li>
          <li data-deeplink="php_admin_pages_sql">Hook: php_admin_pages_sql</li>
          <li data-deeplink="php_admin_news_sql">Hook: php_admin_news_sql</li>
          <li data-deeplink="php_admin_pages_news_info">Hook: php_admin_pages_news_info</li>
          <li data-deeplink="php_admin_widgets_sql">Hook: php_admin_widgets_sql</li>
          <li data-deeplink="tpl_body_top">Hook: tpl_body_top</li>
          <li data-deeplink="tpl_between_head">Hook: tpl_between_head</li>
          <li data-deeplink="tpl_header">Hook: tpl_header</li>
          <li data-deeplink="tpl_below_header">Hook: tpl_below_header</li>
          <li data-deeplink="tpl_sidebar">Hook: tpl_sidebar</li>
          <li data-deeplink="tpl_page">Hook: tpl_page</li>
          <li data-deeplink="tpl_footer">Hook: tpl_footer</li>
          <li data-deeplink="tpl_footer_end">Hook: tpl_footer_end</li>
          <li data-deeplink="tpl_tags">Hook: tpl_tags</li>
          <li data-deeplink="tpl_sitemap">Hook: tpl_sitemap</li>
          <li data-deeplink="tpl_search">Hook: tpl_search</li>
          <li data-deeplink="tpl_page_news_grid">Hook: tpl_page_news_grid</li>
          <li data-deeplink="tpl_admin_usergroup_edit">Hook: tpl_admin_usergroup_edit</li>
          <li data-deeplink="tpl_admin_usergroup">Hook: tpl_admin_usergroup</li>
          <li data-deeplink="tpl_admin_setting">Hook: tpl_admin_setting</li>
          <li data-deeplink="tpl_admin_head">Hook: tpl_admin_head</li>
          <li data-deeplink="tpl_admin_footer">Hook: tpl_admin_footer</li>
          <li data-deeplink="tpl_admin_page_news">Hook: tpl_admin_page_news</li>
          <li data-deeplink="tpl_admin_page_news_new">Hook: tpl_admin_page_news_new</li>
          <li data-deeplink="tpl_admin_user">Hook: tpl_admin_user</li>
          <li data-deeplink="tpl_admin_user_edit">Hook: tpl_admin_user_edit</li>
          <li data-deeplink="tpl_admin_index">Hook: tpl_admin_index</li>
          <li data-deeplink="tpl_footer_widgets">Hook: tpl_footer_widgets</li>
          <li data-deeplink="tpl_below_content">Hook: tpl_below_content</li>
        </ul>
      </li>
      <li>
        <span>Functions</span>
        <ul>
          <li data-deeplink="phpfunctions">Useful PHP Functions</li>
          <li data-deeplink="menubuilder">Menu Builder Function</li>
          <li data-deeplink="member_guest">Content for Members/Guests</li>
        </ul>
      </li>
    </ul>
  </nav>
</aside>

<div id="content">
  <div>

    <!-- About Bluesat Template -->
    <section class="active">

      <!-- Requirements -->
      <article class="active">
        <h4>Requirements</h4>
        <p>You need a web server to run CMS.</p>
        <p>The web server must have PHP and MySQL with one available database.</p>
        <p>If your web server is running on Apache you can use the build in URL optimizer and get a slightly better search engine performance.</p>
        <p>Minimum requirements for your web server:</p>
        <ul>
          <li>Minimum PHP 5.3</li>
          <li>Minimum MySQL 5.2</li>
          <li>Session in working order</li>
          <li>GD Library</li>
          <li>$_SERVER vars (standard)</li>
          <li>MySQLi Support</li>
        </ul>
        <p>Optional for better SEO:</p>
        <ul>
          <li>Apache Server</li>
        </ul>
      </article>

      <!-- About CMS -->
      <article>
        <h4>About CMS</h4>
        <p>CMS is a software to build modern websites based on <strong>HTML5 and CSS3 and Bootstrap 3</strong>.</p>
        <p>Basic code is from J&eacute;r&ocirc;me Kaegi by <a href="http://wwww.jakweb.ch" target="_blank">wwww.jakweb.ch</a></p>
        <p>CMS is build on PHP widely used on web servers. MySQL for storing all the necessary data and HTML5/CSS3.</p>
        <p>CMS is using a few third party products like:</p>
        <ul>
          <li>jQuery</li>
          <li>Bootstrap</li>
          <li>tinyMCE - Editor</li>
          <li>Shadowbox</li>
          <li>jQuery Tags - XoXco</li>
        </ul>
        <p>CMS has been tested on many different web servers including windows based server, as long you have the minimum requirements and read the installation manual carefully you should not run into any problems.</p>
        <p>Minimum Requirements:</p>
        <ul>
          <li>PHP 5.3</li>
          <li>MySQL 5.0.7</li>
        </ul>
        <p>Optional, good to have:</p>
        <ul>
          <li>Apache based web server</li>
          <li>MySQLi Support</li>
        </ul>
      </article>

      <!-- Installation - First Step -->
      <article>
        <h4>Installation - First Step</h4>
        <p>When you install CMS the first time, please <strong>read the installation manual very carefully!</strong> Installing CMS is very simple and the installation wizard will guide you thru in only two steps.</p>
        <p>Important information about the db.php file. Please open this file in any text or php editor, the file is located in the include/ directory.</p>
        <p>Database Connection:</p>
        <pre name="code" class="brush: xml;">
define('DB_HOST', 'localhost'); // Database host ## Datenbank Server
define('DB_PORT', 3306); // Enter the database port for your mysql server
define('DB_USER', ''); // Database user ## Datenbank Benutzername
define('DB_PASS', ''); // Database password ## Datenbank Passwort
define('DB_NAME', ''); // Database name ## Datenbank Name
define('DB_PREFIX', ''); // Database prefix use (a-z) and (_)
        </pre>
        <p>This should be clear, important information for PHP to connect to your MySQL database and table. Please choose a strong password when you setup your MySQL table. For example: <strong>4k2+!kSSowk9</strong></p>
        <p>Define a unique key:</p>
        <pre name="code" class="brush: xml;">
define('DB_PASS_HASH', '');
        </pre>
        <p>This unique key will be used to make the password of your members even stronger, do not change this key after setup, otherwise your members cannot login again. Use a very strong key to protect your members password. For example: <strong>%3ko**è,LwlKK</strong></p>
        <p>The rest should be clear...</p>
      </article>

      <!-- CMS and htaccess (Seo) -->
      <article>
        <h4>CMS and htaccess (Seo)</h4>
        <p>If you server is running on Apache you can use the build in optimisation for short url's. This gives you the possibilities to have shorter and cleaner URL's and a better search engine performance.</p>
        <p>To use the build in SEO in CMS you need to do two things, first open the db.php file and set following definition:</p>
        <pre name="code" class="brush: xml;">
define('JAK_USE_APACHE', 1);
        </pre>
        <p>Then upload the .htaccess file provided in the download package or create your own with following content:</p>
        <pre name="code" class="brush: xml;">
# Enable the Rewrite engine
    RewriteEngine On

# SEO Url friendly
	RewriteCond %{REQUEST_FILENAME} !-f
	RewriteCond %{REQUEST_FILENAME} !-d
	RewriteRule . index.php [L]

# URL not found
	ErrorDocument 404 /404/

# URL Canonicalization
	RewriteCond %{HTTP_HOST} !^www.yoursite.cz$ [NC]
	RewriteRule ^(.*)$ http://www.yoursite.cz/$1 [L,R=301]

# Gzip compression
# compress text, html, javascript, css, xml:
	AddOutputFilterByType DEFLATE text/plain
	AddOutputFilterByType DEFLATE text/html
	AddOutputFilterByType DEFLATE text/xml
	AddOutputFilterByType DEFLATE text/css
	AddOutputFilterByType DEFLATE application/xml
	AddOutputFilterByType DEFLATE application/xhtml+xml
	AddOutputFilterByType DEFLATE application/rss+xml
	AddOutputFilterByType DEFLATE application/javascript
	AddOutputFilterByType DEFLATE application/x-javascript

# 1 WEEK
  <FilesMatch "\.(jpg|jpeg|png|gif|swf)$">
	Header set Cache-Control "max-age=604800, public"
  </FilesMatch>
        </pre>
        <p>Upload both files into the correct location .htaccess needs to be in the root directory and enjoy the apache version of CMS.</p>
      </article>

    </section>

    <!-- Plugins -->
    <section>

      <!-- Below Header -->
      <article>
        <h4>Below Header</h4>

      </article>

      <!-- Blog -->
      <article>
        <h4>Blog</h4>

      </article>

      <!-- Download -->
      <article>
        <h4>Download</h4>

      </article>

      <!-- FAQ -->
      <article>
        <h4>FAQ</h4>

      </article>

    </section>

    <!-- Hooks -->
    <section>

      <!-- Hook: php_search -->
      <article>
        <h4>Hook: php_search</h4>
        <p>Use this hook to execute PHP code in the search.php file.</p>

        <p>For example:</p>
        <pre name="code" class="brush: php;">
if ($SearchInput) { echo "Your search term: ".$SearchInput; }
        </pre>

        <p>If you like to include a file:</p>
        <pre name="code" class="brush: php;">
APP_PATH.'plugins/yourplugin/file_to_include.php';
        </pre>


      </article>

      <!-- Hook: php_tags -->
      <article>
        <h4>Hook: php_tags</h4>
        <p>Use this hook to execute PHP code in the tags.php file.</p>

        <p>For example:</p>
        <pre name="code" class="brush: php;">
if ($cleanTag) { echo "Your tag: ".$cleanTag; }
        </pre>

        <p>If you like to include a file:</p>
        <pre name="code" class="brush: php;">
APP_PATH.'plugins/yourplugin/file_to_include.php';
        </pre>


      </article>

      <!-- Hook: php_sitemap -->
      <article>
        <h4>Hook: php_sitemap</h4>
        <p>Use this hook to execute PHP code in the sitemap.php file.</p>

        <p>For example:</p>
        <pre name="code" class="brush: php;">
if ($cat) { echo "Categories: ".$cat; }
        </pre>

        <p>If you like to include a file:</p>
        <pre name="code" class="brush: php;">
APP_PATH.'plugins/yourplugin/file_to_include.php';
        </pre>


      </article>

      <!-- Hook: php_index_top -->
      <article>
        <h4>Hook: php_index_top</h4>
        <p>Use this hook to execute PHP code in the index.php file before anything else.</p>

        <p>For example:</p>
        <pre name="code" class="brush: php;">
define('MY_VAR', "cool");
        </pre>

        <p>If you like to include a file:</p>
        <pre name="code" class="brush: php;">
APP_PATH.'plugins/yourplugin/file_to_include.php';
        </pre>


      </article>

      <!-- Hook: php_rss -->
      <article>
        <h4>Hook: php_rss</h4>
        <p>Use this hook to execute PHP code in the rss.php file.</p>

        <p>For example:</p>
        <pre name="code" class="brush: php;">
if ($displayRSS) { echo "My RSS: ".$displayRSS; }
        </pre>

        <p>If you like to include a file:</p>
        <pre name="code" class="brush: php;">
APP_PATH.'plugins/yourplugin/file_to_include.php';
        </pre>


      </article>

      <!-- Hook: php_index_bottom -->
      <article>
        <h4>Hook: php_index_bottom</h4>
        <p>Use this hook to execute PHP code at the very end in the index.php file.</p>

        <p>For example:</p>
        <pre name="code" class="brush: php;">
if (isset($page3)) { echo "CMS is ready..."; } else { echo "CMS is always ready..."; }
        </pre>

        <p>If you like to include a file:</p>
        <pre name="code" class="brush: php;">
APP_PATH.'plugins/yourplugin/file_to_include.php';
        </pre>


      </article>

      <!-- Hook: php_index_page -->
      <article>
        <h4>Hook: php_index_page</h4>
        <p>Use this hook to execute PHP code in the index.php file between the page.</p>

        <p>For example:</p>
        <pre name="code" class="brush: php;">
// Confirm user
   	if ($page == 'rf_ual') {
   	if (is_numeric($page1) && is_numeric($page2) && jak_row_exist($page1, DB_PREFIX.'user') && jak_field_not_exist($page2, DB_PREFIX.'user', 'activatenr')) {

   			$result = $jakdb->query('UPDATE '.DB_PREFIX.'user SET access = access - 1, activatenr = 0 WHERE id = "'.smartsql($page1).'" AND activatenr = "'.smartsql($page2).'"');

   	if (!$result) {
   		jak_redirect(JAK_PARSE_ERROR);
   		exit;
   	} else {

   		$userlink = BASE_URL.'admin/index.php?p=user&sp=edit&ssp='.$page1;

   		$admail = new PHPMailer();
   		$adlinkmessage = $tl['login']['l16'].$userlink;
   		$adbody = str_ireplace("[]",'',$adlinkmessage);
   		$admail->SetFrom(JAK_EMAIL, JAK_TITLE);
   		$admail->AddAddress(JAK_EMAIL, JAK_TITLE);
   		$admail->Subject = JAK_TITLE.' - '.$tl['login']['l11'];
   		$admail->MsgHTML($adbody);
   		$admail->Send(); // Send email without any warnings

   		jak_redirect(JAK_PARSE_SUCCESS);
   		exit;
   	}

   	} else {
   		jak_redirect(BASE_URL);
   		exit;
   	}
   	}
        </pre>


      </article>

      <!-- Hook: php_lang -->
      <article>
        <h4>Hook: php_lang</h4>
        <p>Use this hook to execute PHP language code in the index.php file.</p>

        <p>For example:</p>
        <pre name="code" class="brush: php;">
if (file_exists(APP_PATH.'plugins/yourplugin/lang/'.$jkv["lang"].'.ini')) {
    $tlt = parse_ini_file(APP_PATH.'plugins/yourplugin/lang/'.$jkv["lang"].'.ini', true);
} else {
    $tlt = parse_ini_file(APP_PATH.'plugins/yourplugin/lang/en.ini', true);
}
        </pre>


      </article>

      <!-- Hook: php_pages_news -->
      <article>
        <h4>Hook: php_pages_news</h4>
        <p>Use this hook to execute PHP code in the index.php and news.php file. This hook is used in pages and news, the same php code will be executed.</p>

        <p>For example:</p>
        <pre name="code" class="brush: php;">
if (!empty($PAGE_ACTIVE)) { $myplugin = 1; }
        </pre>

        <p>If you like to include a file:</p>
        <pre name="code" class="brush: php;">
APP_PATH.'plugins/yourplugin/file_to_include.php';
        </pre>


      </article>

      <!-- Hook: php_admin_usergroup -->
      <article>
        <h4>Hook: php_admin_usergroup</h4>
        <p>Use this hook to execute PHP code in the admin/usergroup.php file.</p>

        <p>For example:</p>
        <pre name="code" class="brush: php;">
if (isset($defaults['jak_download'])) {
	$insert .= 'download = "'.$defaults['jak_download'].'", downloadpost = "'.$defaults['jak_downloadpost'].'", downloadpostapprove = "'.$defaults['jak_downloadpostapprove'].'", downloadpostdelete = "'.$defaults['jak_downloadpostdelete'].'", downloadrate = "'.$defaults['jak_downloadrate'].'", downloadmoderate = "'.$defaults['jak_downloadmoderate'].'",'; }
        </pre>

        <p>If you like to include a file:</p>
        <pre name="code" class="brush: php;">
APP_PATH.'plugins/yourplugin/file_to_include.php';
        </pre>


      </article>

      <!-- Hook: php_admin_user_rename -->
      <article>
        <h4>Hook: php_admin_user_rename</h4>
        <p>Use this hook to execute PHP code in the admin/user.php file.</p>

        <p>For example:</p>
        <pre name="code" class="brush: php;">
$jakdb->query('UPDATE '.DB_PREFIX.'faqcomments SET username = "'.smartsql($defaults['jak_username']).'" WHERE userid = '.smartsql($page2).'');
        </pre>

        <p>If you like to include a file:</p>
        <pre name="code" class="brush: php;">
APP_PATH.'plugins/yourplugin/file_to_include.php';
        </pre>


      </article>

      <!-- Hook: php_admin_user_delete -->
      <article>
        <h4>Hook: php_admin_user_delete</h4>
        <p>Use this hook to execute PHP code in the admin/user.php file.</p>

        <p>For example:</p>
        <pre name="code" class="brush: php;">
$jakdb->query('UPDATE '.DB_PREFIX.'faqcomments SET userid = 0 WHERE userid = '.$page2.'');
        </pre>

        <p>If you like to include a file:</p>
        <pre name="code" class="brush: php;">
APP_PATH.'plugins/yourplugin/file_to_include.php';
        </pre>


      </article>

      <!-- Hook: php_admin_user_delete_mass -->
      <article>
        <h4>Hook: php_admin_user_delete_mass</h4>
        <p>Use this hook to execute PHP code in the admin/user.php file.</p>

        <p>For example:</p>
        <pre name="code" class="brush: php;">
$jakdb->query('UPDATE '.DB_PREFIX.'faqcomments SET userid = 0 WHERE userid = '.$page2.'');
        </pre>

        <p>If you like to include a file:</p>
        <pre name="code" class="brush: php;">
APP_PATH.'plugins/yourplugin/file_to_include.php';
        </pre>


      </article>

      <!-- Hook: php_admin_lang -->
      <article>
        <h4>Hook: php_admin_lang</h4>
        <p>Use this hook to execute PHP language code in the admin/index.php file.</p>

        <p>For example:</p>
        <pre name="code" class="brush: php;">
if (file_exists(APP_PATH.'plugins/yourplugin/admin/lang/'.$jkv["lang"].'.ini')) {
    $tld = parse_ini_file(APP_PATH.'plugins/yourplugin/admin/lang/'.$jkv["lang"].'.ini', true);
} else {
    $tld = parse_ini_file(APP_PATH.'plugins/yourplugin/admin/lang/en.ini', true);
}
        </pre>

      </article>

      <!-- Hook: php_admin_setting -->
      <article>
        <h4>Hook: php_admin_setting</h4>
        <p>Use this hook to execute PHP code in the admin/setting.php file.</p>

        <p>For example:</p>
        <pre name="code" class="brush: php;">
$plugin_setting = "working...";
        </pre>

        <p>If you like to include a file:</p>
        <pre name="code" class="brush: php;">
APP_PATH.'plugins/yourplugin/file_to_include.php';
        </pre>

      </article>

      <!-- Hook: php_admin_setting_post -->
      <article>
        <h4>Hook: php_admin_setting_post</h4>
        <p>Use this hook to execute PHP code in the admin/setting.php file.</p>

        <p>For example:</p>
        <pre name="code" class="brush: php;">
if ($defaults['jak_lang'] == '') { $errors['e6'] = $tl['error']['e29']; }
        </pre>

      </article>

      <!-- Hook: php_admin_user -->
      <article>
        <h4>Hook: php_admin_user</h4>
        <p>Use this hook to execute PHP code in the admin/user.php file.</p>

        <p>For example:</p>
        <pre name="code" class="brush: php;">
$plugin_user = "Display stuff when showing user in admin";
        </pre>

        <p>If you like to include a file:</p>
        <pre name="code" class="brush: php;">
APP_PATH.'plugins/yourplugin/file_to_include.php';
        </pre>


      </article>

      <!-- Hook: php_admin_user_edit -->
      <article>
        <h4>Hook: php_admin_user_edit</h4>
        <p>Use this hook to execute PHP code in the admin/user.php file.</p>

        <p>For example:</p>
        <pre name="code" class="brush: php;">
$plugin_user_edit = "Display stuff when edit user";
        </pre>

        <p>If you like to include a file:</p>
        <pre name="code" class="brush: php;">
APP_PATH.'plugins/yourplugin/file_to_include.php';
        </pre>


      </article>

      <!-- Hook: php_admin_index -->
      <article>
        <h4>Hook: php_admin_index</h4>
        <p>Use this hook to execute PHP code in the admin/index.php file. This hook is located when you open the administration panel.</p>

        <p>For example:</p>
        <pre name="code" class="brush: php;">
$JAK_CMS_VERSION = $jaknewversion;
$JAK_CMS_NEWS = $jaknewnews;
        </pre>

        <p>If you like to include a file:</p>
        <pre name="code" class="brush: php;">
APP_PATH.'plugins/yourplugin/file_to_include.php';
        </pre>


      </article>

      <!-- Hook: php_admin_fulltext_add -->
      <article>
        <h4>Hook: php_admin_fulltext_add</h4>
        <p>Use this hook to execute PHP code in the admin/setting.php file.</p>

        <p>For example:</p>
        <pre name="code" class="brush: php;">
$jakdb->query('ALTER TABLE '.DB_PREFIX.'pages ADD FULLTEXT(`title`, `content`)');
        </pre>

      </article>

      <!-- Hook: php_admin_fulltext_remove -->
      <article>
        <h4>Hook: php_admin_fulltext_remove</h4>
        <p>Use this hook to execute PHP code in the admin/setting.php file.</p>

        <p>For example:</p>
        <pre name="code" class="brush: php;">
$jakdb->query('ALTER TABLE '.DB_PREFIX.'pages DROP INDEX `title`');
        </pre>

      </article>

      <!-- Hook: php_admin_pages_sql -->
      <article>
        <h4>Hook: php_admin_pages_sql</h4>
        <p>Use this hook to execute PHP code in the admin/page.php file on two locations. This hook is located when edit or create a new page.</p>

        <p>For example:</p>
        <pre name="code" class="brush: php;">
if (empty($news) && !empty($defaults['jak_shownewsmany'])) {
  $insert .= $defaults['jak_showorder'];
}
        </pre>

      </article>

      <!-- Hook: php_admin_news_sql -->
      <article>
        <h4>Hook: php_admin_news_sql</h4>
        <p>Use this hook to execute PHP code in the admin/news.php file on two locations. This hook is located when edit or create a new news.</p>

        <p>For example:</p>
        <pre name="code" class="brush: php;">
if (empty($news) && !empty($defaults['jak_shownewsmany'])) {
  $insert .= $defaults['jak_showorder'];
}
        </pre>

      </article>

      <!-- Hook: php_admin_pages_news_info -->
      <article>
        <h4>Hook: php_admin_pages_news_info</h4>
        <p>Use this hook to execute PHP code in the admin/page.php and admin/news.php file.</p>

        <p>For example:</p>
        <pre name="code" class="brush: php;">
$JAK_GET_TICKETING = jak_get_page_info(DB_PREFIX.'tickets', '');
        </pre>

        <p>If you like to include a file:</p>
        <pre name="code" class="brush: php;">
APP_PATH.'plugins/yourplugin/file_to_include.php';
        </pre>


      </article>

      <!-- Hook: php_admin_widgets_sql -->
      <article>
        <h4>Hook: php_admin_widgets_sql</h4>
        <p>This hook enables to fire some sql in the admin widgets section.</p>

        <p>For example:</p>
        <pre name="code" class="brush: php;">
$getpoll = $JAK_GET_POLL = jak_get_page_info(DB_PREFIX.'polls', '');
        </pre>

        <p>If you like to include a file:</p>
        <pre name="code" class="brush: php;">
APP_PATH.'plugins/yourplugin/file_to_include.php';
        </pre>


      </article>

      <!-- Hook: tpl_body_top -->
      <article>
        <h4>Hook: tpl_body_top</h4>
        <p>Template Hook: tpl_body_top</p>
        <p>You can include a file on the very top in the template. This hook is located between theand the very first</p>

        <p>You can include a file, for example:</p>
        <pre name="code" class="brush: php;">
plugins/yourplugin/template/body_top.php
        </pre>

      </article>

      <!-- Hook: tpl_between_head -->
      <article>
        <h4>Hook: tpl_between_head</h4>
        <p>Template Hook: tpl_between_head</p>
        <p>This hook is located between thetag.</p>

        <p>You can include a file, for example:</p>
        <pre name="code" class="brush: php;">
plugins/yourplugin/template/css.php
        </pre>

      </article>

      <!-- Hook: tpl_header -->
      <article>
        <h4>Hook: tpl_header</h4>
        <p>Template Hook: tpl_header</p>
        <p>This hook is located in between the header, display advertising, buttons or whatever you like next to the logo.</p>

        <p>You can include a file, for example:</p>
        <pre name="code" class="brush: php;">
plugins/yourplugin/template/css.php
        </pre>

      </article>

      <!-- Hook: tpl_below_header -->
      <article>
        <h4>Hook: tpl_below_header</h4>
        <p>Template Hook: tpl_below_header</p>
        <p>This hook is located below the header, display advertising, buttons or whatever you like below the navigation and logo.</p>

        <p>You can include a file, for example:</p>
        <pre name="code" class="brush: php;">
plugins/yourplugin/template/advert.php
        </pre>

      </article>

      <!-- Hook: tpl_sidebar -->
      <article>
        <h4>Hook: tpl_sidebar</h4>
        <p>Template Hook: tpl_sidebar</p>
        <p>This hook is in the sidebar and does work together with the grid/widget system, display advertising, buttons or whatever you like in the sidebar.</p>

        <p>You can include a file, for example:</p>
        <pre name="code" class="brush: php;">
plugins/yourplugin/template/sidebar_paypal.php
        </pre>

      </article>

      <!-- Hook: tpl_page -->
      <article>
        <h4>Hook: tpl_page</h4>
        <p>Template Hook: tpl_page</p>
        <p>This hook is located in template/yourtemplate/page.php and will be executed between title and content.</p>

        <p>You can include a file, for example:</p>
        <pre name="code" class="brush: php;">
plugins/yourplugin/template/page.php
        </pre>

      </article>

      <!-- Hook: tpl_footer -->
      <article>
        <h4>Hook: tpl_footer</h4>
        <p>Template Hook: tpl_footer</p>
        <p>This hook is located in template/yourtemplate/footer.php and will be executed at the very beginning in the footer template.</p>

        <p>You can include a file, for example:</p>
        <pre name="code" class="brush: php;">
plugins/yourplugin/template/footer.php
        </pre>

      </article>

      <!-- Hook: tpl_footer_end -->
      <article>
        <h4>Hook: tpl_footer_end</h4>
        <p>Template Hook: tpl_footer_end</p>
        <p>This hook is located in template/yourtemplate/footer.php and will be executed at the very end just before the tag.</p>

        <p>You can include a file, for example:</p>
        <pre name="code" class="brush: php;">
plugins/yourplugin/template/end.php
        </pre>

      </article>

      <!-- Hook: tpl_tags -->
      <article>
        <h4>Hook: tpl_tags</h4>
        <p>Template Hook: tpl_tags</p>
        <p>This hook is located in template/yourtemplate/tags.php and will be executed to display your plugin tags.</p>

        <p>You can include a file, for example:</p>
        <pre name="code" class="brush: php;">
plugins/yourplugin/template/tags.php
        </pre>

      </article>

      <!-- Hook: tpl_sitemap -->
      <article>
        <h4>Hook: tpl_sitemap</h4>
        <p>Template Hook: tpl_sitemap</p>
        <p>This hook is located in template/yourtemplate/sitemap.php and will be executed to display your plugin sitemap list.</p>

        <p>You can include a file, for example:</p>
        <pre name="code" class="brush: php;">
plugins/yourplugin/template/sitemap.php
        </pre>

      </article>

      <!-- Hook: tpl_search -->
      <article>
        <h4>Hook: tpl_search</h4>
        <p>Template Hook: tpl_search</p>
        <p>This hook is located in template/yourtemplate/search.php and will be executed to display your plugin search result.</p>

        <p>You can include a file, for example:</p>
        <pre name="code" class="brush: php;">
plugins/yourplugin/template/mysearchresult.php
        </pre>

      </article>

      <!-- Hook: tpl_page_news_grid -->
      <article>
        <h4>Hook: tpl_page_news_grid</h4>
        <p>Template Hook: tpl_page_news_grid</p>
        <p>This hook is located in template/yourtemplate/page.php / template/yourtemplate/newsart.php and will be executed to display your plugin grid result.</p>

        <p>You can include a file, for example:</p>
        <pre name="code" class="brush: php;">
if ($pg['pluginid'] == JAK_PLUGIN_ID_FAQ && JAK_PLUGIN_ID_FAQ && !empty($row['showfaq'])) {

  include_once APP_PATH.'plugins/faq/functions.php';

  $showfaqarray = explode(":", $row['showfaq']);

  if (is_array($showfaqarray) && in_array("ASC", $showfaqarray) || in_array("DESC", $showfaqarray)) {
    $JAK_FAQ = jak_get_faq('LIMIT '.$showfaqarray[1], 't1.id '.$showfaqarray[0], '', 't1.id');
  } else {
    $JAK_FAQ = jak_get_faq('', 't1.id ASC', $row['showfaq'], 't1.id');
  }

}
        </pre>

      </article>

      <!-- Hook: tpl_admin_usergroup_edit -->
      <article>
        <h4>Hook: tpl_admin_usergroup_edit</h4>
        <p>Template Hook: tpl_admin_usergroup_edit</p>
        <p>This hook is located in admin/template/editusergroup.php and will be executed to display your plugin user-group permission.</p>

        <p>You can include a file, for example:</p>
        <pre name="code" class="brush: php;">
plugins/yourplugin/template/usergroup_edit.php
        </pre>

      </article>

      <!-- Hook: tpl_admin_usergroup -->
      <article>
        <h4>Hook: tpl_admin_usergroup</h4>
        <p>Template Hook: tpl_admin_usergroup</p>
        <p>This hook is located in admin/template/editusergroup.php and will be executed to display your plugin user-group permission.</p>

        <p>You can include a file, for example:</p>
        <pre name="code" class="brush: php;">
plugins/yourplugin/template/usergroup_new.php
        </pre>

      </article>

      <!-- Hook: tpl_admin_setting -->
      <article>
        <h4>Hook: tpl_admin_setting</h4>
        <p>Template Hook: tpl_admin_setting</p>
        <p>This hook is located in admin/template/setting.php and will be executed to display your plugin settings.</p>

        <p>You can include a file, for example:</p>
        <pre name="code" class="brush: php;">
plugins/yourplugin/template/my_setting.php
        </pre>

      </article>

      <!-- Hook: tpl_admin_head -->
      <article>
        <h4>Hook: tpl_admin_head</h4>
        <p>Template Hook: tpl_admin_head</p>
        <p>This hook is located in admin/template/header.php and will be executed for your css or javascript files needed for your plugin.</p>

        <p>You can include a file, for example:</p>
        <pre name="code" class="brush: php;">
plugins/yourplugin/template/my_css_javascript.php
        </pre>

      </article>

      <!-- Hook: tpl_admin_footer -->
      <article>
        <h4>Hook: tpl_admin_footer</h4>
        <p>Template Hook: tpl_admin_footer</p>
        <p>This hook is located in admin/template/footer.php and will be executed at the very end just before the tag.</p>

        <p>You can include a file, for example:</p>
        <pre name="code" class="brush: php;">
plugins/yourplugin/template/my_copyright.php
        </pre>

      </article>

      <!-- Hook: tpl_admin_page_news -->
      <article>
        <h4>Hook: tpl_admin_page_news</h4>
        <p>Template Hook: tpl_admin_page_news</p>
        <p>This hook is located in admin/template/footer.php and will work together with the grid system, you can use PHP and HTML code.</p>

        <p>You can include a file, for example:</p>
        <pre name="code" class="brush: php;">
if ($pg['pluginid'] == JAK_PLUGIN_FAQ) {
  include_once APP_PATH.'plugins/faq/admin/template/faq_connect.php';
}
        </pre>

      </article>

      <!-- Hook: tpl_admin_page_news_new -->
      <article>
        <h4>Hook: tpl_admin_page_news_new</h4>
        <p>Template Hook: tpl_admin_page_news_new</p>
        <p>This hook is located in admin/template/footer.php and will be executed to display new plugin stuff in the grid system.</p>

        <p>You can include a file, for example:</p>
        <pre name="code" class="brush: php;">
plugins/faq/admin/template/connect_new.php
        </pre>

      </article>

      <!-- Hook: tpl_admin_user -->
      <article>
        <h4>Hook: tpl_admin_user</h4>
        <p>Template Hook: tpl_admin_user</p>
        <p>This hook is located in admin/template/newuser.php.</p>

        <p>You can include a file, for example:</p>
        <pre name="code" class="brush: php;">
plugins/yourplugin/template/more_user_information.php
        </pre>

      </article>

      <!-- Hook: tpl_admin_user_edit -->
      <article>
        <h4>Hook: tpl_admin_user_edit</h4>
        <p>Template Hook: tpl_admin_user_edit</p>
        <p>This hook is located in admin/template/edituser.php.</p>

        <p>You can include a file, for example:</p>
        <pre name="code" class="brush: php;">
plugins/yourplugin/template/more_user_information_edit.php
        </pre>

      </article>

      <!-- Hook: tpl_admin_index -->
      <article>
        <h4>Hook: tpl_admin_index</h4>
        <p>Template Hook: tpl_admin_index</p>
        <p>This hook is located in admin/template/index.php and is made for displaying news about your plugin.</p>

        <p>You can include a file, for example:</p>
        <pre name="code" class="brush: php;">
plugins/yourplugin/template/news_on_index.php
        </pre>

      </article>

      <!-- Hook: tpl_footer_widgets -->
      <article>
        <h4>Hook: tpl_footer_widgets</h4>
        <p>Template Hook: tpl_footer_widgets</p>
        <p>Place some widgets dynamically in the footer. This is an example how igrid used this hook:</p>

        <p>For example:</p>
        <pre name="code" class="brush: php;">
if (is_numeric(JAK_BCONTENT1_IGRID_TPL)) {
  if (isset($JAK_HOOK_FOOTER_WIDGET) && is_array($JAK_HOOK_FOOTER_WIDGET)) foreach($JAK_HOOK_FOOTER_WIDGET as $hfw) {
    if ($hfw["id"] == JAK_BCONTENT1_IGRID_TPL) {
      include_once $hfw["phpcode"];
    }
  }
} else { echo JAK_BCONTENT1_IGRID_TPL;}
        </pre>

      </article>

      <!-- Hook: tpl_below_content -->
      <article>
        <h4>Hook: tpl_below_content</h4>
        <p>Template Hook: tpl_below_content</p>
        <p>This is the brother from the below_header hook. You can close some divs or add some extra stuff that doesn't fit in the main section.</p>

      </article>

    </section>

    <!-- Functions -->
    <section>

      <!-- Useful PHP Functions -->
      <article>
        <h4>Useful PHP Functions</h4>
        <p>PHP functions are great to reduce and simplify your code. As soon you use a code more then once, make a class for it. Very simple and very practical.</p>

        <h5>Redirect your visitor to another page.</h5>
        <pre name="code" class="brush: php;">
function redirect($url, $code = 302) {
    header('Location: '.$url, true, $code);
    exit();
}
        </pre>
        <p>To use this function and redirect your visitor to another page you will only need to use:</p>
        <pre name="code" class="brush: php;">
redirect("new_page.php");
        </pre>
        <p>How simple is that? Plus you can use it as many times you want for all your redirection calls, but hang on why no second parameter? You can but because we set a default parameter you don't have to if you use 302 anyway.</p>

        <h5>Filter User Input</h5>
        <pre name="code" class="brush: php;">
function input_filter($value) {
	$value = filter_var($value, FILTER_SANITIZE_STRING);
	return preg_replace("/[^0-9 _,.@-p{L}]/u", '', $value);
}
        </pre>
        <p>This small function will filter the content from input fields for example:</p>
        <pre name="code" class="brush: php;">
$filtered = $input_filter($_POST["title"];
        </pre>

        <h5>Escape for MySQL</h5>
        <pre name="code" class="brush: php;">
function smartsql($value) {

    // To your database
	global $jakdb;
	// Check Magic Quotes
	if (get_magic_quotes_gpc()) {
		$value = stripslashes($value);
	}
	// Not integer
    if (!is_int($value)) {
        $value = $jakdb->real_escape_string($value);
    }

    return $value;
}
        </pre>
        <p>This function does a few things, it will check if magic_quotes are enabled, if so it will strip off backslashes. The next step is to check if the value is not integer, if not it will escape the string and make it secure for your database. Again to use the function in your database updates or inserts only use:</p>
        <pre name="code" class="brush: php;">
smartsql($filtered);
        </pre>

        <h5>Cut some long text</h5>
        <pre name="code" class="brush: php;">
function cut_text($text,$limit,$ending) {

	// empty limit
	if (empty($limit)) $limit = 160;
    $text = trim($text);
    $text = strip_tags($text);
    $text = str_replace(array("r","n",'"'), "", $text);
    $txtl = strlen($text);
    if($txtl > $limit) {
        for($i=1;$text[$limit-$i]!=" ";$i++) {
            if($i == $limit) {
                return substr($text,0,$limit).$ending;
            }
        }
        $jakdata = substr($text,0,$limit-$i+1).$ending;
    } else {
    	$jakdata = $text;
    }
    return $jakdata;
}
        </pre>
        <p>Let's say you code a blog and you want to preview the article instead of showing the whole content, easily use the cut_text function. The function will cut to the length you set and does not cut off words, so your preview text always looks nice. You know how to use it now, don't you?!</p>

        <h5>Create a random password</h5>
        <pre name="code" class="brush: php;">
// Password generator
function password_creator($length = 8) {
	return substr(md5(rand().rand()), 0, $length);
}
        </pre>
        <p>That should be self explained, the function will return a password with the length of your choice (8 characters are standard).</p>

        <h5>Encode email address</h5>
        <pre name="code" class="brush: php;">
// encrypt email address (prevent spam)
function encode_email($e) {
	for ($i = 0; $i < strlen($e); $i++) { $output .= '&#'.ord($e[$i]).';'; }
	return $output;
}
        </pre>
        <p>Very useful function to prevent spam on your displayed email addresses. Simply encode your email address with this function before you display the email address.</p>

        <h5>Get IP Address</h5>
        <pre name="code" class="brush: php;">
function get_ip_address() {
    foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
        if (array_key_exists($key, $_SERVER) === true) {
            foreach (explode(',', $_SERVER[$key]) as $ip) {
                if (filter_var($ip, FILTER_VALIDATE_IP) !== false) {
                    return $ip;
                }
            }
        }
    }

    return 0;
}
        </pre>

      </article>

      <!-- Menu Builder Function -->
      <article>
        <h4>Menu Builder Function</h4>
        <p>In case you building a new template for CMS this is how you use the new menu builder.</p>
        <p>All modern menus are based on lists, classes and sub classes. With CMS it is super easy to use the automatic menu builder.</p>
        <p>With one line of code your menu, sub menu, sub sub menu and so on up to five levels will be build automatically.</p>
        <pre name="code" class="brush: php;">
jak_build_menu(0, $mheader, $page, 'nav nav-main navbar-nav navbar-right', 'dropdown', 'dropdown-menu', 'dropdown-submenu', false);
        </pre>
        <p>Let's pull apart the function:</p>
        <ul>
          <li>0 = root</li>
          <li>$mheader = Header Menu / $mfooter = Footer Menu</li>
          <li>$page = The page we are on for the active class, so we can mark the menu we are currently on</li>
          <li>nav nav-main navbar-nav navbar-right = the main class for the menu</li>
          <li>dropdown = To mark the list that there is a dropdown</li>
          <li>dropdown-menu = the sub menu class for the first list</li>
          <li>dropdown-submenu = the sub menu class for the sub menu</li>
          <li>false = should we show the admin link (when logged in and have access)</li>
        </ul>
        <p>This will produce a menu like this:</p>
        <pre name="code" class="brush: html;">
<ul class="nav nav-main navbar-nav navbar-right">
  <li><a href="#">Main Item 1</a></li>
  <li class="dropdown">
    <a href="#">Main Item 2</a>
    <ul class="dropdown-menu">
      <li class="dropdown-submenu">
        <a href="#">SubMenu Item 1</a>
        <ul class="dropdown-menu">
          <li><a href="#">SubSubMenu Item 1</a></li>
          <li><a href="#">SubSubMenu Item 2</a></li>
        </ul>
      </li>
      <li><a href="#">SubMenu Item 2</a></li>
      <li><a href="#">SubMenu Item 3</a></li>
    </ul>
  </li>
  <li><a href="#">Main Item 3</a></li>
  <li><a href="#">Main Item 4</a></li>
  <li><a href="#">Main Item 5</a></li>
</ul>
        </pre>

      </article>

      <!-- Content for Members/Guests -->
      <article>
        <h4>Content for Members/Guests</h4>
        <p>With CMS you can display content for members only, with a simple if statement you can display code only for guests or members.</p>
        <pre name="code" class="brush: php;">
{{if notmembers}}
  <a href="#" class="btn btn-primary btn-lg">Start Now it is Free</a>
{{endif}}

{{if members}}
  <a href="#" class="btn btn-primary btn-lg">Download Now</a>
{{endif}}
        </pre>
        <p>Following line above will show content to the register page for guests and when the user is logged in it will show the link to the download area. Of course that is only an example you can place all content between the if statement.</p>
        <p>Guests only:</p>
        <pre name="code" class="brush: php;">
{{if notmembers}}
  <a href="#" class="btn btn-primary btn-lg">Start Now it is Free</a>
{{endif}}
        </pre>
        <p>Members only:</p>
        <pre name="code" class="brush: php;">
{{if members}}
  <a href="#" class="btn btn-primary btn-lg">Download Now</a>
{{endif}}
        </pre>

      </article>

    </section>

  </div>
</div>

<!-- ======= JQUERY SCRIPT ======= -->
<script src="/js/jquery.js"></script>
<script src="/admin/doc/js/syntaxhighlighter/scripts/shCore.js" type="text/javascript"></script>
<script src="/admin/doc/js/syntaxhighlighter/scripts/shBrushJScript.js" type="text/javascript"></script>
<script src="/admin/doc/js/syntaxhighlighter/scripts/shBrushXml.js" type="text/javascript"></script>
<script src="/admin/doc/js/syntaxhighlighter/scripts/shBrushCss.js" type="text/javascript"></script>
<script src="/admin/doc/js/syntaxhighlighter/scripts/shBrushPhp.js" type="text/javascript"></script>
<script src="/admin/doc/js/syntaxhighlighter/scripts/shBrushPlain.js" type="text/javascript"></script>
<script src="/admin/doc/js/gallery.js"></script>
<script src="/admin/doc/js/doc.js"></script>
<script type="text/javascript">
    // Init syntax highlighter
    SyntaxHighlighter.defaults['toolbar'] = false;
    SyntaxHighlighter.all();
</script>

</body>
</html>