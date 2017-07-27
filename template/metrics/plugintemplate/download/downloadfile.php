<?php
/*
 * PLUGIN DOWNLOAD - POPIS SOUBORU downloadfile.php
 * ----------------------------------------------
 *
 * Soubor slouží pro generovaní (zobrazení) jednotlivého vybraného článku
 *
 * Použitelné hodnoty s daty pro FRONTEND - downloadfile.php
 * ------------------------------------------------------
 *
 * $PAGE_ID               číslo    |  - id souboru
 * $PAGE_TITLE            text        - Titulek souboru
 * $PAGE_CONTENT          text        - Celý popis souboru
 * $SHOWTITLE             ano/ne      - Zobrazení nadpisu
 * $SHOWDATE              ano/ne      - Zobrazení datumu
 * $FT_SHARE              ano/ne      - Sdílení souboru na sociální sítě
 * $SHOWSOCIALBUTTON      ano/ne      - Zobrazení sociálních tlačítek
 * $DL_HITS               číslo       - Počet Zobrazení
 * $DL_DOWNLOADS          číslo       - Počet stažení
 * $DL_PASSWORD           text        - Heslo stránky (hash)
 * $PAGE_PASSWORD         text        - Heslo stránky (hash) - tato proměná se používá pro template
 * $SHOWIMG               url         - Relativní url adresa obrázku
 * $DL_LINK
 * $PAGE_TIME             date        - Datum vytvoření souboru
 * $PAGE_TIME_HTML5
 * $JAK_COMMENT_FORM      ano/ne      - Zobrazení komentářů
 * $DOWNLOAD_CATLIST      text        - Seznam kategorií
 *
 */
?>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php
if (JAK_ASACCESS) $apedit = BASE_URL . 'admin/index.php?p=download&amp;sp=edit&amp;id=' . $PAGE_ID;
if ($jkv["printme"]) $printme = 1;
$qapedit = BASE_URL . 'admin/index.php?p=download&amp;sp=quickedit&amp;id=' . $PAGE_ID;

if ($DL_PASSWORD && !JAK_ASACCESS && $DL_PASSWORD != $_SESSION['pagesecurehash' . $PAGE_ID]) { ?>

  <div class="row" style="margin-top: 30px;">
    <div class="container">

      <?php if ($errorpp) { ?>

        <div class="alert bg-danger fade in">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <?php echo $errorpp["e"]; ?>
        </div>

      <?php } ?>

      <div class="col-md-12" style="margin: 20px 0 50px 0">
        <div class="text-center">
          <h1 class="large"><?php echo $tl["global_text"]["gtxt1"]; ?></h1>
          <p class="lead"><?php echo $tl["global_text"]["gtxt2"]; ?></p>
          <!-- Show password form -->
          <form class="form-inline" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">

            <div class="input-group">
              <input type="password" name="dlpass" class="form-control" value="" placeholder="<?php echo $tld["downl_frontend_ph"]["downlph1"]; ?>"/>
              <span class="input-group-btn">
						<button type="submit" name="dlprotect" class="btn btn-primary"><?php echo $tl["button"]["btn3"]; ?></button>
					</span>
            </div>
            <input type="hidden" name="dlsec" value="<?php echo $PAGE_ID; ?>"/>

          </form>
        </div>
      </div>
    </div>
  </div>

<?php } else { ?>

  <div id="printdiv">

    <!-- =========================
      START DOWNLOAD SECTION
    ============================== -->
    <section class="download-content-area">
      <div class="container-fluid">
        <div class="row">

          <!-- Image Column -->
          <div class="col-sm-4">

            <?php
            // Image is available so display it or go standard image
            if ($SHOWIMG) {
              echo '<img src="' . $SHOWIMG . '" alt="Download" class="img-thumbnail img-responsive">';
            } else { ?>

              <div class="thumb-download text-center">
                <img src="/plugins/download/img/file-for-download.png" alt="<?php echo $PAGE_TITLE; ?>" class="img-thumbnail img-responsive">
                <div class="caption text-center">
                  <span class="color1"><?php echo $tld["downl_frontend"]["downl14"]; ?></span>
                  <span class="color2"><?php echo $tld["downl_frontend"]["downl15"]; ?></span>
                </div>
              </div>

            <?php } ?>

          </div>
          <!-- Project Info Column -->
          <div class="col-sm-8">
            <div class="full-intro-head">
              <h3><?php echo $PAGE_TITLE; ?></h3>
              <p>

                <?php
                if ($SHOWDATE) {
                  echo $tld["downl_frontend"]["downl30"] . ' : <span>' . $PAGE_TIME . '</span>';
                }
                echo $tld["downl_frontend"]["downl31"] . ' : <span>' . $DL_DOWNLOADS . '</span>';
                echo $tld["downl_frontend"]["downl32"] . ' : ' . $DOWNLOAD_CATLIST;

                ?>

              </p>
              <hr>
            </div>

            <div class="full-intro-content">
              <?php echo $PAGE_CONTENT; ?>
            </div>

          </div>

        </div>
        <div class="row mt-medium">
          <!-- Download Button -->
          <?php if ($DL_FILE_BUTTON) { ?>
            <div class="well">
              <div class="row-height">

                <?php if ($FT_SHARE && $JAK_FACEBOOK_SDK_CONNECTION) { // With Share on Social Sites, with Facebook SDK Connection ?>

                  <div class="col-sm-8 col-height">
                    <p>
                      <?php echo $tld["downl_frontend"]["downl3"]; ?> <br>
                      <?php echo $tld["downl_frontend"]["downl4"]; ?>
                    </p>
                    <div>
                      <button class="btn btn-primary" onclick="shareOnFB();">Facebook</button>
                    </div>
                  </div>
                  <div id="results" class="col-sm-4 col-height col-middle text-center">
                    <a href="#" class="dclick btn" disabled="disabled"><?php echo $tld["downl_frontend"]["downl6"]; ?></a>
                  </div>

                <?php } elseif ($FT_SHARE && !$JAK_FACEBOOK_SDK_CONNECTION) { // With Share on Social Sites, without Facebook SDK Connection ?>

                  <div class="col-sm-8 col-height">
                    <p>
                      <?php echo $tld["downl_frontend"]["downl3"]; ?> <br>
                      <?php echo $tld["downl_frontend"]["downl4"]; ?>
                    </p>
                    <p>
                      <a href="javascript:void(0)" id="tweetLink" class="btn">
                        Twitter
                      </a>
                      <a href="javascript:void(0)" id="faceLink" class="btn btn-primary">
                        Facebook
                      </a>
                    </p>
                  </div>
                  <div class="col-sm-4 col-height col-middle text-center">
                    <a href="#" class="dclick btn" disabled="disabled"><?php echo $tld["downl_frontend"]["downl6"]; ?></a>
                  </div>

                <?php } else { // Without Share on Social Sites ?>

                  <div class="col-sm-8 col-height">
                    <p><strong><?php echo $tld["downl_frontend"]["downl2"]; ?></strong></p>
                    <p><?php echo $tld["downl_frontend"]["downl5"]; ?></p>
                  </div>
                  <div class="col-sm-4 col-height col-middle text-center">
                    <p>
                      <a class="dclick btn" href="<?php echo $DL_LINK; ?>"><?php echo $tld["downl_frontend"]["downl7"]; ?></a>
                    </p>
                  </div>

                <?php } ?>

              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </section>
    <!-- =========================
      END DOWNLOAD SECTION
    ============================== -->

  </div>

  <?php if ($JAK_SHOW_C_FORM) {
    include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/contact.php';
  } ?>

  <!-- Show Social Buttons -->
  <?php if ($SHOWSOCIALBUTTON) { ?>
    <div class="col-md-12">
      <div class=" pull-right" style="display: table;">
        <div style="display: table-cell;vertical-align: middle;/*! margin-right: 20px; */padding-right: 20px;">
          <strong><?php echo $tl["share"]["share"] . ' '; ?></strong>
        </div>
        <div id="sollist-sharing"></div>
      </div>
    </div>
  <?php } ?>

  <div class="col-md-12">
    <ul class="pager">
      <?php if ($JAK_NAV_PREV) { ?>
        <li class="previous">
          <a href="<?php echo $JAK_NAV_PREV; ?>">
            <i class="fa fa-caret-left"></i>
            <span class="nav_text_left"><?php echo $JAK_NAV_PREV_TITLE; ?></span>
          </a>
        </li>
      <?php }
      if ($JAK_NAV_NEXT) { ?>
        <li class="next">
          <a href="<?php echo $JAK_NAV_NEXT; ?>">
            <span class="nav_text_right"><?php echo $JAK_NAV_NEXT_TITLE; ?></span>
            <i class="fa fa-caret-right"></i>
          </a>
        </li>
      <?php } ?>
    </ul>
  </div>

<?php } ?>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>