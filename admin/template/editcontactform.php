<?php include "header.php"; ?>

<?php if ($page3 == "s") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo $tl["notification"]["n7"];?>'
      }, {
        // settings
        type: 'success',
        delay: 5000
      });
    }, 1000);
  </script>
<?php }
if ($page3 == "e") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo $tl["general_error"]["generror1"];?>'
      }, {
        // settings
        type: 'success',
        delay: 5000
      });
    }, 1000);
  </script>
<?php } ?>

<?php if ($errors) { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php if (isset($errors["e"])) echo $errors["e"];
          if (isset($errors["e1"])) echo $errors["e1"];
          if (isset($errors["e2"])) echo $errors["e2"];
          if (isset($errors["e3"])) echo $errors["e3"];?>'
      }, {
        // settings
        type: 'danger',
        delay: 10000
      });
    }, 1000);
  </script>
<?php } ?>

  <form role="form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <!-- Fixed Button for save form -->
    <div class="savebutton hidden-xs">

      <?php
      // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
      echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button', array('data-loading-text' => $tl["button"]["btn41"]));
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=contactform', $tl["button"]["btn19"], '', 'btn btn-info button');
      ?>

    </div>

    <!-- Form Content -->
    <div class="row tab-content-singel">
      <div class="col-md-12">
        <div class="box box-success">
          <div class="box-header with-border">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('h3', $tl["cf_box_title"]["cfbt"], 'box-title');
            ?>

          </div>
          <div class="box-body">
            <div class="block">
              <div class="block-content">
                <div class="row-form">
                  <div class="col-md-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tl["cf_box_content"]["cfbc"]);
                    echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                    ?>

                  </div>
                  <div class="col-md-7">
                    <div class="form-group no-margin<?php if (isset($errors["e1"])) echo " has-error"; ?>">

                      <?php
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('text', 'jak_title', $JAK_FORM_DATA["title"], '', 'form-control');
                      ?>

                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tl["cf_box_content"]["cfbc1"]);
                    ?>

                  </div>
                  <div class="col-md-7">
                    <div class="radio radio-success">

                      <?php
                      // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                      echo $Html->addRadio('jak_showtitle', '1', ($JAK_FORM_DATA["showtitle"] == '1') ? TRUE : FALSE, 'jak_showtitle1');
                      // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                      echo $Html->addLabel('jak_showtitle1', $tl["checkbox"]["chk"]);

                      // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                      echo $Html->addRadio('jak_showtitle', '0', ($JAK_FORM_DATA["showtitle"] == '0') ? TRUE : FALSE, 'jak_showtitle2');
                      // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                      echo $Html->addLabel('jak_showtitle2', $tl["checkbox"]["chk1"]);
                      ?>

                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tl["cf_box_content"]["cfbc2"]);
                    ?>

                  </div>
                  <div class="col-md-7">
                    <div class="form-group no-margin">

                      <?php
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('text', 'jak_email', $JAK_FORM_DATA["email"], '', 'form-control', array('placeholder' => $tl["placeholder"]["p14"]));
                      ?>

                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tl["cf_box_content"]["cfbc3"]);
                    echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                    ?>

                  </div>
                  <div class="col-md-7 <?php if (isset($errors["e2"])) echo " has-error"; ?>">

                    <?php
                    // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                    echo $Html->addTextarea('jak_lcontent', envo_edit_safe_userpost($JAK_FORM_DATA["content"]), '4', '', array('id' => 'jakEditor', 'class' => 'jakEditorLight form-control', 'style' => 'width:100%;'));
                    ?>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="box-footer">

            <?php
            // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
            echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
            ?>

          </div>
        </div>

        <div class="box box-success">
          <div class="box-header with-border">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('i', '', 'fa fa-plus-square');
            echo $Html->addTag('h3', $tl["cf_box_title"]["cfbt2"], 'box-title');
            ?>

          </div>
          <div class="box-body">

            <ul class="cform_drag">
              <li id="cform_drag">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">

                      <?php
                      echo $tl["cf_box_content"]["cfbc4"];
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('text', 'jak_option[]', '', '', 'form-control jakread', array('readonly' => 'readonly'));
                      ?>

                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <?php echo $tl["cf_box_content"]["cfbc5"]; ?>
                      <select name="jak_optionmandatory[]" class="form-control">

                        <?php
                        // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                        echo $Html->addOption('0', $tl["checkbox"]["chk1"]);
                        echo $Html->addOption('1', $tl["checkbox"]["chk"]);
                        echo $Html->addOption('2', $tl["cf_box_content"]["cfbc9"]);
                        echo $Html->addOption('3', $tl["cf_box_content"]["cfbc10"]);
                        ?>

                      </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <?php echo $tl["cf_box_content"]["cfbc6"]; ?>
                      <select name="jak_optiontype[]" class="form-control">

                        <?php
                        // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                        echo $Html->addOption('1', $tl["cf_box_content"]["cfbc11"]);
                        echo $Html->addOption('2', $tl["cf_box_content"]["cfbc12"]);
                        echo $Html->addOption('3', $tl["cf_box_content"]["cfbc13"]);
                        echo $Html->addOption('4', $tl["cf_box_content"]["cfbc14"]);
                        echo $Html->addOption('5', $tl["cf_box_content"]["cfbc15"]);
                        echo $Html->addOption('6', $tl["cf_box_content"]["cfbc16"]);
                        echo $Html->addOption('7', $tl["cf_box_content"]["cfbc17"]);
                        ?>

                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">

                    <?php
                    echo $tl["cf_box_content"]["cfbc7"];
                    // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                    echo $Html->addInput('text', 'jak_options[]', 'female,male', '', 'form-control jakread', array('readonly' => 'readonly'));
                    ?>

                  </div>

                  <?php
                  // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                  echo $Html->addInput('hidden', 'jak_optionsort[]', '', '', 'cforder-orig');
                  ?>

                </div>
              </li>
            </ul>

            <div class="callout callout-info">

              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('i', '', 'fa fa-arrow-up m-r-5');
              echo $tl["cf_box_content"]["cfbc8"];
              echo $Html->addTag('i', '', 'fa fa-arrow-down m-l-5');
              ?>

            </div>

            <ul id="cform_sort">

              <?php if (isset($JAK_CONTACTOPTION_ALL) && is_array($JAK_CONTACTOPTION_ALL)) foreach ($JAK_CONTACTOPTION_ALL as $o) { ?>

                <li class="jakcform">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">

                        <?php
                        echo $tl["cf_box_content"]["cfbc4"];
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'jak_option_old[]', $o["name"], '', 'form-control');
                        ?>

                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <?php echo $tl["cf_box_content"]["cfbc5"]; ?>
                        <select name="jak_optionmandatory_old[]" class="form-control">

                          <?php
                          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                          echo $Html->addOption('0', $tl["checkbox"]["chk1"], ($o["mandatory"] == 0) ? TRUE : FALSE);
                          echo $Html->addOption('1', $tl["checkbox"]["chk"], ($o["mandatory"] == 1) ? TRUE : FALSE);
                          echo $Html->addOption('2', $tl["cf_box_content"]["cfbc9"], ($o["mandatory"] == 2) ? TRUE : FALSE);
                          echo $Html->addOption('3', $tl["cf_box_content"]["cfbc10"], ($o["mandatory"] == 3) ? TRUE : FALSE);
                          ?>

                        </select>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <?php echo $tl["cf_box_content"]["cfbc6"]; ?>
                        <select name="jak_optiontype_old[]" class="form-control">

                          <?php
                          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                          echo $Html->addOption('1', $tl["cf_box_content"]["cfbc11"], ($o["typeid"] == 1) ? TRUE : FALSE);
                          echo $Html->addOption('2', $tl["cf_box_content"]["cfbc12"], ($o["typeid"] == 2) ? TRUE : FALSE);
                          echo $Html->addOption('3', $tl["cf_box_content"]["cfbc13"], ($o["typeid"] == 3) ? TRUE : FALSE);
                          echo $Html->addOption('4', $tl["cf_box_content"]["cfbc14"], ($o["typeid"] == 4) ? TRUE : FALSE);
                          echo $Html->addOption('5', $tl["cf_box_content"]["cfbc15"], ($o["typeid"] == 5) ? TRUE : FALSE);
                          echo $Html->addOption('6', $tl["cf_box_content"]["cfbc16"], ($o["typeid"] == 6) ? TRUE : FALSE);
                          echo $Html->addOption('7', $tl["cf_box_content"]["cfbc17"], ($o["typeid"] == 7) ? TRUE : FALSE);
                          ?>

                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">

                      <?php
                      echo $tl["cf_box_content"]["cfbc7"];
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('text', 'jak_options_old[]', $o["options"], '', 'form-control');
                      ?>

                    </div>
                    <div class="col-md-1">
                      <div class="checkbox check-success">
                        <input type="checkbox" id="jak_sod<?php echo $o["id"]; ?>" name="jak_sod[]" value="<?php echo $o["id"]; ?>"/>
                        <label for="jak_sod<?php echo $o["id"]; ?>"><i class="fa fa-trash-o"></i></label>
                      </div>
                    </div>

                    <?php
                    // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                    echo $Html->addInput('hidden', 'jak_optionsort_old[]', $o["forder"], '', 'cforder');
                    echo $Html->addInput('hidden', 'jak_optionid[]', $o["id"]);
                    ?>

                  </div>
                </li>

              <?php } ?>

            </ul>

          </div>
          <div class="box-footer">

            <?php
            // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
            echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
            ?>

          </div>
        </div>
      </div>
    </div>
  </form>

<?php include "footer.php"; ?>