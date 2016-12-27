<?php include "header.php"; ?>

<?php if ($page2 == "e") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
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
          if (isset($errors["e3"])) echo $errors["e3"];?>',
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
    <ul class="nav nav-tabs" id="settTab">
      <li class="active"><a href="#cmsPage1"><?php echo $tl["title"]["t4"]; ?></a></li>
      <li><a href="#cmsPage2">Meta description and keywords</a></li>
    </ul>

    <div class="tab-content">
      <div id="cmsPage1" class="tab-pane active fade in">
        <div class="row">
          <div class="col-md-8">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["title"]["t11"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <table class="table table-striped first-column v-text-center">
                  <tr>
                    <td><?php echo $tl["cat"]["c4"]; ?></td>
                    <td>
                      <?php include_once "cat_new.php"; ?>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["cat"]["c5"]; ?>
                      <a class="cms-help" data-content="<?php echo $tl["help"]["h2"]; ?>" href="javascript:void(0)" data-original-title="<?php echo $tl["title"]["t21"]; ?>">
                        <i class="fa fa-question-circle"></i>
                      </a>
                    </td>
                    <td>
                      <div class="form-group no-margin<?php if (isset($errors["e2"]) || isset($errors["e3"])) echo " has-error"; ?>">
                        <input type="text" name="jak_varname" id="jak_varname" class="form-control" value="<?php if (isset($_REQUEST["jak_varname"])) echo $_REQUEST["jak_varname"]; ?>"/>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["cat"]["c13"]; ?>
                      <a href="javascript:void(0)" class="cms-help" data-content="<?php echo $tl["help"]["h1"]; ?>" data-original-title="<?php echo $tl["title"]["t21"]; ?>">
                        <i class="fa fa-question-circle"></i>
                      </a>
                    </td>
                    <td><input type="text" name="jak_url" class="form-control" value="<?php if (isset($_REQUEST["jak_url"])) echo $_REQUEST["jak_url"]; ?>"/></td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["site"]["s3"]; ?></td>
                    <td>
                      <textarea name="jak_lcontent" id="content" class="form-control" rows="4"><?php if (isset($_REQUEST["jak_lcontent"])) echo jak_edit_safe_userpost($_REQUEST["jak_lcontent"]); ?></textarea>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["cat"]["c6"]; ?></td>
                    <td>
                      <div class="radio">
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_menu" value="1"<?php if ((isset($_REQUEST["jak_menu"]) && $_REQUEST["jak_menu"] == '1') || !isset($_REQUEST["jak_menu"])) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                        </label>
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_menu" value="0"<?php if (isset($_REQUEST["jak_menu"]) && $_REQUEST["jak_menu"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                        </label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["cat"]["c7"]; ?></td>
                    <td>
                      <div class="radio">
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_footer" value="1"<?php if (isset($_REQUEST["jak_footer"]) && $_REQUEST["jak_footer"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                        </label>
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_footer" value="0"<?php if ((isset($_REQUEST["jak_footer"]) && $_REQUEST["jak_footer"] == '0') || !isset($_REQUEST["jak_footer"])) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                        </label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["general"]["g87"]; ?></td>
                    <td>
                      <div class="input-group">
                        <input type="text" name="jak_img" id="jak_img" class="form-control" value="<?php if (isset($_REQUEST["jak_img"])) echo $_REQUEST["jak_img"]; ?>" />
                        <span class="input-group-btn">
                          <button class="btn btn-default iconpicker" data-placement="top" role="iconpicker"></button>
                        </span>
                      </div>
                    </td>
                  </tr>
                </table>
              </div>
              <div class="box-footer">
                <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["general"]["g88"]; ?>
                  <a href="javascript:void(0)" class="cms-help" data-content="<?php echo $tl["help"]["h"]; ?>" data-original-title="<?php echo $tl["title"]["t21"]; ?>">
                    <i class="fa fa-question-circle"></i>
                  </a>
                </h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <table class="table table-striped">
                  <tr>
                    <td>
                      <select name="jak_permission[]" multiple="multiple" class="form-control">
                        <option value="0"<?php if (isset($_REQUEST["jak_permission"]) && in_array(0, $_REQUEST["jak_permission"])) { ?> selected="selected"<?php } ?>><?php echo $tl["general"]["g84"]; ?></option>
                        <?php if (isset($JAK_USERGROUP) && is_array($JAK_USERGROUP)) foreach ($JAK_USERGROUP as $v) { ?>
                          <option value="<?php echo $v["id"]; ?>"<?php if (isset($_REQUEST["jak_permission"]) && in_array($v["id"], $_REQUEST["jak_permission"])) { ?> selected="selected"<?php } ?>><?php echo $v["name"]; ?></option><?php } ?>
                      </select>
                    </td>
                  </tr>
                </table>
              </div>
              <div class="box-footer">
                <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="cmsPage2" class="tab-pane fade">
        <div class="row">
          <div class="col-md-6">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Meta Description</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <table class="table table-striped first-column v-text-center">
                  <tr>
                    <td>
                      <button id="copy1" class="btn btn-primary btn-xs pull-right margin-bottom-10" type="button">Copy from description</button>
                      <textarea name="jak_lcontent_meta_desc" class="form-control" id="jak_editor_light_meta_desc" rows="4" maxlength="400"><?php if (isset($_REQUEST["jak_lcontent_meta_desc"])) echo jak_edit_safe_userpost(htmlspecialchars($_REQUEST["jak_lcontent_meta_desc"])); ?></textarea>
                    </td>
                  </tr>
                </table>
              </div>
              <div class="box-footer">
                <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Meta Keywords</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <table class="table table-striped first-column v-text-center">
                  <tr>
                    <td>
                      <input type="text" name="jak_lcontent_meta_key" class="form-control" id="jak_editor_light_meta_key" value="<?php echo jak_edit_safe_userpost(htmlspecialchars($JAK_FORM_DATA["metakey"])); ?>"/>
                    </td>
                  </tr>
                </table>
              </div>
              <div class="box-footer">
                <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>

  <script src="js/slug.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(document).ready(function () {

      /* Bootstrap Tab Activation */
      $('#settTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
      });

      $("#jak_name").keyup(function () {
        // Checked, copy values
        $("#jak_varname").val(jakSlug($("#jak_name").val()));
      });

      /* Bootstrap Icon Picker */
      $('.iconpicker').iconpicker({
        iconset: 'fontawesome',
        icon: 'fa-font',
        searchText: '<?php echo $tl["placeholder"]["p4"]; ?>',
        arrowPrevIconClass: 'fa fa-chevron-left',
        arrowNextIconClass: 'fa fa-chevron-right',
        rows: 5,
        cols: 6,
      });
      $('.iconpicker').on('change', function(e) {
        $("#jak_img").val(e.icon);
      });

      /* Copy Value */
      $("#copy1").click(function() {
        $("#jak_editor_light_meta_desc").val($("#content").val());
      });
    });
  </script>

<?php include "footer.php"; ?>