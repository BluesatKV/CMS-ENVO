<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php if ($page3 == "e") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo $tl["general_error"]["generror1"];?>'
      }, {
        // settings
        type: 'danger',
        delay: 10000
      });
    }, 1000);
  </script>
<?php }
if ($errors) { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php if (isset($errors["e"])) echo $errors["e"];
          if (isset($errors["e1"])) echo $errors["e1"];
          if (isset($errors["e2"])) echo $errors["e2"];
          if (isset($errors["e3"])) echo $errors["e3"];
          if (isset($errors["e4"])) echo $errors["e4"];?>'
      }, {
        // settings
        type: 'danger',
        delay: 10000
      });
    }, 1000);
  </script>
<?php } ?>

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">
    <!-- Fixed Button for save form -->
    <div class="savebutton hidden-xs">

      <?php
      // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
      echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button');
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=newsletter&sp=user', $tl["button"]["btn19"], '', 'btn btn-info button');
      ?>

    </div>

    <!-- Form Content -->
    <div class="row tab-content-singel">
      <div class="col-md-6">
        <div class="box box-success">
          <div class="box-header with-border">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('h3', $tlnl["newsletter_box_title"]["nlbt2"], 'box-title');
            ?>

          </div>
          <div class="box-body">
            <div class="block">
              <div class="block-content">
                <div class="row-form">
                  <div class="col-md-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tlnl["newsletter_box_content"]["nlbc17"]);
                    echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                    ?>

                  </div>
                  <div class="col-md-7">
                    <div class="form-group<?php if (isset($errors["e1"])) echo " has-error"; ?> no-margin">

                      <?php
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('text', 'jak_name', (isset($_REQUEST["jak_name"])) ? $_REQUEST["jak_name"] : '', 'jak_name', 'form-control');
                      ?>

                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tlnl["newsletter_box_content"]["nlbc18"]);
                    echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                    ?>

                  </div>
                  <div class="col-md-7">
                    <div class="form-group<?php if (isset($errors["e2"])) echo " has-error"; ?> no-margin">

                      <?php
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('text', 'jak_email', (isset($_REQUEST["jak_email"])) ? $_REQUEST["jak_email"] : '', '', 'form-control');
                      ?>

                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tlnl["newsletter_box_content"]["nlbc19"]);
                    ?>

                  </div>
                  <div class="col-md-7">
                    <select name="jak_usergroup" class="form-control selectpicker" data-size="5">

                      <?php
                      // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                      if (isset($JAK_USERGROUP_ALL) && is_array($JAK_USERGROUP_ALL)) foreach ($JAK_USERGROUP_ALL as $v) {
                        echo $Html->addOption($v["id"], $v["name"], (isset($_REQUEST["jak_usergroup"]) && $v["id"] == $_REQUEST["jak_usergroup"]) ? TRUE : FALSE);
                      }
                      ?>

                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="box-footer">

            <?php
            // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
            echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right');
            ?>

          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="box box-success">
          <div class="box-header with-border">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('h3', $tlnl["newsletter_box_title"]["nlbt3"], 'box-title');
            ?>

          </div>
          <div class="box-body">
            <div class="block">
              <div class="block-content">
                <div class="row-form">
                  <div class="col-md-5"><strong><?php echo $tlnl["nletter"]["d21"]; ?></strong></div>
                  <div class="col-md-7">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                      <span class="btn btn-default btn-file">
                        <span class="fileinput-new"><?php echo $tlnl["newsletter_box_content"]["nlbc28"]; ?></span>
                        <span class="fileinput-exists"><?php echo $tlnl["newsletter_box_content"]["nlbc29"]; ?></span>
                        <input type="file" name="jak_file" accept=".csv">
                      </span>
                      <span class="fileinput-filename"></span>
                      <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5"><strong><?php echo $tlnl["nletter"]["d22"]; ?></strong></div>
                  <div class="col-md-7">
                    <input type="text" class="form-control" name="jak_delimiter" value="<?php if (isset($_REQUEST["jak_delimiter"])) echo $_REQUEST["jak_delimiter"]; ?>" placeholder=","/>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5"><strong><?php echo $tlnl["nletter"]["d23"]; ?></strong></div>
                  <div class="col-md-7">
                    <input type="text" class="form-control" name="jak_start" value="<?php if (isset($_REQUEST["jak_start"])) echo $_REQUEST["jak_start"]; ?>" placeholder="1"/>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5"><strong><?php echo $tl["submenu"]["sm100"]; ?></strong></div>
                  <div class="col-md-7">
                    <select name="jak_usergroupcsv" class="form-control selectpicker">
                      <?php if (isset($JAK_USERGROUP_ALL) && is_array($JAK_USERGROUP_ALL)) foreach ($JAK_USERGROUP_ALL as $v) { ?>
                        <option value="<?php echo $v["id"]; ?>"<?php if (isset($_REQUEST["jak_usergroupcsv"]) && $v["id"] == $_REQUEST["jak_usergroupcsv"]) { ?> selected="selected"<?php } ?>><?php echo $v["name"]; ?></option><?php } ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="box-footer">

            <?php
            // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
            echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right');
            ?>

          </div>
        </div>
      </div>
    </div>
  </form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>