<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php if ($page2 == "e") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function() {
      $.notify({
        // options
        message: '<?php echo $tl["errorpage"]["sql"];?>',
      }, {
        // settings
        type: 'danger',
        delay: 5000,
      });
    }, 1000);
  </script>
<?php } if ($errors) { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function() {
      $.notify({
        // options
        message: '<?php if (isset($errors["e"])) echo $errors["e"];
          if (isset($errors["e1"])) echo $errors["e1"];?>',
      }, {
        // settings
        type: 'danger',
        delay: 5000,
      });
    }, 1000);
  </script>
<?php } ?>

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <!-- Fixed Button for save form -->
    <div class="savebutton">
      <button type="submit" name="save" class="btn btn-primary button">
        <i class="fa fa-save margin-right-5"></i>
        <?php echo $tl["general"]["g20"]; ?> !!
      </button>
    </div>

    <!-- Form Content -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo $tl["title"]["t18"]; ?></h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <table class="table table-striped first-column v-text-center">
          <tr>
            <td><?php echo $tl["user"]["u"]; ?></td>
            <td>
              <div class="form-group<?php if (isset($errors["e1"])) echo " has-error"; ?> no-margin">
                <input type="text" name="jak_name" class="form-control" value="<?php if (!isset($JAK_FORM_DATA["name"]) && isset($_REQUEST["jak_name"])) {
                   echo $_REQUEST["jak_name"];
                 } elseif (isset($JAK_FORM_DATA["name"])) { ?><?php echo $JAK_FORM_DATA["name"];
                 } ?>"/>
              </div>
            </td>
          </tr>
          <tr>
            <td><?php echo $tl["user"]["u6"]; ?></td>
            <td>
              <textarea class="jakEditorLight" id="jakEditor" rows="4" name="jak_desc"><?php if (!isset($JAK_FORM_DATA["description"]) && isset($_REQUEST["jak_desc"])) {
                echo $_REQUEST["jak_desc"];
              } elseif (isset($JAK_FORM_DATA["description"])) { ?><?php echo $JAK_FORM_DATA["description"];
              } ?></textarea>
            </td>
          </tr>
        </table>
      </div>
      <div class="box-footer">
        <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
      </div>
    </div>
  </form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>