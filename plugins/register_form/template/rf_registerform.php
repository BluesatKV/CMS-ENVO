<?php if ($setting["rf_active"] && isset($ENVO_SHOW_R_FORM)) { ?>
  <div class="row">
    <div class="col-md-6">
      <?php if (!ENVO_USERID) { ?>
        <div class="basic-login">
        <?php if ($errorsC || $errorsA) { ?>
          <div class="alert bg-danger fade in">
            <button type="button" class="close" data-dismiss="alert">&times;</button>

            <?php if (isset($errorsC["e3"])) echo $errorsC["e3"];
            if (isset($errorsC["e4"])) echo $errorsC["e4"];
            if (isset($errorsC["e5"])) echo $errorsC["e5"];
            if (isset($errorsC["e1"])) echo $errorsC["e1"];
            if (isset($errorsC["e2"])) echo $errorsC["e2"];

            if (isset($errorsA) && is_array($errorsA)) foreach ($errorsA as $i) {
              echo $i;
            }

            ?>
          </div>
        <?php } else if (isset($_SESSION["rf_msg_sent"]) && $_SESSION["rf_msg_sent"] == 1) { ?>
          <div class="alert bg-success fade in">
            <?=$setting["rf_welcome"]?>
          </div>
        <?php }
        if (!isset($_SESSION["rf_msg_sent"]) || isset($_SESSION["rf_msg_sent"]) && $_SESSION["rf_msg_sent"] != 1) { ?>

          <h3><?=$tl["general"]["g57"]?></h3>
          <form method="post" class="cFrom" action="<?=$_SERVER['REQUEST_URI']?>"
            enctype="multipart/form-data">
            <?php if ($setting["rf_simple"]) { ?>
              <div class="form-group<?php if (isset($errorsC["e3"])) echo " has-error"; ?>">
                <label class="control-label" for="username"><?=$tl["login"]["l1"]?> <i class="fa fa-star"></i></label>
                <input type="text" name="username" id="username" class="form-control"
                  value="<?php if (isset($_REQUEST["username"])) echo $_REQUEST["username"]; ?>"
                  placeholder="<?=$tl["login"]["l1"]?>">
              </div>
              <div class="form-group<?php if ($errorsC["e4"]) echo " has-error"; ?>">
                <label class="control-label" for="email"><?=$tl["contact"]["c2"]?> <i class="fa fa-star"></i></label>
                <input type="email" name="email" id="email" class="form-control"
                  value="<?php if (isset($_REQUEST["email"])) echo $_REQUEST["email"]; ?>"
                  placeholder="<?=$tl["contact"]["c2"]?>">
              </div>
            <?php } else {
              echo $ENVO_SHOW_R_FORM;
            } ?>

            <div class="well well-sm">
              <?=$tl["contact"]["n"]?> <?=$tl["contact"]["n1"]?>
              <i class="fa fa-star"></i> <?=$tl["contact"]["n2"]?>
            </div>
            <button type="submit" id="formsubmit" name="registerF" class="btn btn-primary pull-right">
              <?=$tl["contact"]["s"]?>
            </button>
            <div class="clearfix"></div>
          </form>
        <?php } ?></div><?php } ?>

      <?php if (ENVO_USERID) { ?>
        <h3><?=sprintf($tl["general"]["g8"], $ENVO_USERNAME)?></h3>
        <div class="about">
          <!-- Author Photo -->
          <div class="author-photo">
            <img src="<?=BASE_URL . ENVO_FILES_DIRECTORY . '/userfiles' . $envouser->getVar("picture")?>"
              alt="avatar">
          </div>
          <div class="about-bubble">
            <blockquote>
              <!-- Author Info -->
              <cite class="author-info">
                - <?=$tl["contact"]["c1"]?>: <?=$envouser->getVar("name")?><br>
                - <?=$tl["contact"]["c2"]?>: <?=$envouser->getVar("email")?>
              </cite>
            </blockquote>
            <div class="sprite arrow-speech-bubble"></div>
          </div>
        </div>
        <!-- End Testimonial -->
      <?php } ?>
    </div>
    <div class="col-md-6">
      <div class="basic-login">
        <?php if (!ENVO_USERID) { ?>

          <h3><?=$tl["general"]["g146"]?></h3>
          <?php if ($errorlo) { ?>
            <div class="alert bg-danger">
              <?php if (isset($errorlo["e"])) echo $errorlo["e"]; ?>
            </div>
          <?php } ?>
          <form role="form" method="post" action="<?=$_SERVER['REQUEST_URI']?>">
            <div class="form-group<?php if (isset($errorlo)) echo " error"; ?>">
              <label class="control-label" for="username"><?=$tl["login"]["l22"]?></label>
              <input type="text" class="form-control" name="envoU" id="username"
                value="<?php if (isset($_REQUEST["envoU"])) echo $_REQUEST["envoU"]; ?>"
                placeholder="<?=$tl["login"]["l22"]?>">
            </div>
            <div class="form-group<?php if (isset($errorlo)) echo " error"; ?>">
              <label class="control-label" for="password"><?=$tl["login"]["l2"]?></label>
              <input type="password" class="form-control" name="envoP" id="password"
                placeholder="<?=$tl["login"]["l2"]?>">
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="lcookies" value="1"> <?=$tl["notification"]["n7"]?>
              </label>
            </div>
            <button type="submit" name="login"
              class="btn btn-primary btn-block"><?=$tl["general"]["g146"]?></button>
          </form>

          <hr>
          <form role="form" method="post" action="<?=$_SERVER['REQUEST_URI']?>">
            <h3><?=$tl["title"]["t14"]?></h3>
            <?php if (isset($errorfp) && !empty($errorfp)) { ?>
              <div class="alert bg-danger"><?php if (isset($errorfp["e"])) echo $errorfp["e"]; ?></div><?php } ?>
            <div class="form-group<?php if (isset($errorfp)) echo " error"; ?>">
              <label class="control-label" for="email"><?=$tl["login"]["l5"]?></label>
              <input type="email" class="form-control" name="envoE" id="email" class="form-control"
                placeholder="<?=$tl["login"]["l5"]?>">
            </div>
            <button type="submit" name="forgotP"
              class="btn btn-info btn-block"><?=$tl["general"]["g178"]?></button>
          </form>

        <?php } else { ?>
          <p><a href="<?=$P_USR_LOGOUT?>"
              class="btn btn-danger btn-block"><?=$tl["title"]["t6"]?></a></p>
        <?php } ?>
      </div>
    </div>
  </div>

  <?php if (!ENVO_USERID) { ?>
    <script>
      $(document).ready(function () {

        <?php if ($setting["hvm"]) { ?>
        jQuery(document).ready(function () {
          jQuery(".cFrom").append('<input type="hidden" name="<?=$random_name?>" value="<?=$random_value?>" />');
        });
        <?php } ?>

        $('.check_password').keyup(function () {
          passwordStrength($(this).val());
        });
      });
    </script>
  <?php }
} ?>