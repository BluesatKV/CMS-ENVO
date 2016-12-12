<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php if ($page2 == "s") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo $tl["general"]["g7"];?>',
      }, {
        // settings
        type: 'success',
        delay: 5000,
      });
    }, 1000);
  </script>
<?php }
if ($page2 == "e") { ?>
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
          if (isset($errors["e3"])) echo $errors["e3"];
          if (isset($errors["e4"])) echo $errors["e4"];
          if (isset($errors["e5"])) echo $errors["e5"];
          if (isset($errors["e6"])) echo $errors["e6"];?>',
      }, {
        // settings
        type: 'danger',
        delay: 5000,
      });
    }, 1000);
  </script>
<?php } ?>

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">

    <ul class="nav nav-tabs" id="cmsTab">
      <li class="active"><a href="#dlSett1"><?php echo $tl["menu"]["m2"]; ?></a></li>
      <li><a href="#dlSett2"><?php echo $tl["general"]["g53"]; ?></a></li>
      <li><a href="#dlSett3"><?php echo $tl["general"]["g100"]; ?></a></li>
      <li><a href="#dlSett4"><?php echo $tl["general"]["g89"]; ?></a></li>
    </ul>

    <div class="tab-content">
      <div class="tab-pane active" id="dlSett1">

        <div class="row">
          <div class="col-md-7">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["title"]["t4"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table class="table table-striped first-column v-text-center">
                  <tr>
                    <td><?php echo $tl["page"]["p"]; ?></td>
                    <td>
                      <?php include_once APP_PATH . "admin/template/title_edit.php"; ?>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["page"]["p5"]; ?></td>
                    <td>
                      <textarea name="jak_lcontent" class="form-control" rows="4"><?php echo jak_edit_safe_userpost($JAK_FORM_DATA["content"]); ?></textarea>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tld["dload"]["d16"]; ?></td>
                    <td>
                      <div class="form-group<?php if (isset($errors["e2"])) echo " has-error"; ?> no-margin">
                        <input class="form-control" type="text" name="jak_email" value="<?php echo $jkv["downloademail"]; ?>"/>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tld["dload"]["d15"]; ?></td>
                    <td>
                      <div class="row">
                        <div class="col-md-6">
                          <select name="jak_showdlordern" class="form-control selectpicker">
                            <option value="id"<?php if ($JAK_SETTING['showdlwhat'] == "id") { ?> selected="selected"<?php } else { ?> selected="selected"<?php } ?>><?php echo $tld["dload"]["d22"]; ?></option>
                            <option value="name"<?php if ($JAK_SETTING['showdlwhat'] == "name") { ?> selected="selected"<?php } ?>><?php echo $tld["dload"]["d23"]; ?></option>
                            <option value="time"<?php if ($JAK_SETTING['showdlwhat'] == "time") { ?> selected="selected"<?php } ?>><?php echo $tld["dload"]["d24"]; ?></option>
                            <option value="hits"<?php if ($JAK_SETTING['showdlwhat'] == "hits") { ?> selected="selected"<?php } ?>><?php echo $tld["dload"]["d25"]; ?></option>
                            <option value="countdl"<?php if ($JAK_SETTING['showdlwhat'] == "countdl") { ?> selected="selected"<?php } ?>><?php echo $tld["dload"]["d9"]; ?></option>
                          </select>
                        </div>
                        <div class="col-md-6">
                          <select name="jak_showdlorder" class="form-control selectpicker">
                            <option value="ASC"<?php if ($JAK_SETTING['showdlorder'] == "ASC") { ?> selected="selected"<?php } else { ?> selected="selected"<?php } ?>><?php echo $tl["general"]["g90"]; ?></option>
                            <option value="DESC"<?php if ($JAK_SETTING['showdlorder'] == "DESC") { ?> selected="selected"<?php } ?>><?php echo $tl["general"]["g91"]; ?></option>
                          </select>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tld["dload"]["d14"]; ?></td>
                    <td>
                      <input type="text" name="jak_maxpost" class="form-control" value="<?php echo $jkv["downloadmaxpost"]; ?>"/>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["setting"]["s4"]; ?></td>
                    <td>
                      <div class="form-group<?php if (isset($errors["e3"])) echo " has-error"; ?> no-margin">
                        <input type="text" name="jak_date" class="form-control" value="<?php echo $jkv["downloaddateformat"]; ?>"/>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["setting"]["s5"]; ?></td>
                    <td>
                      <div class="form-group<?php if (isset($errors["e4"])) echo " has-error"; ?> no-margin">
                        <input type="text" name="jak_time" class="form-control" value="<?php echo $jkv["downloadtimeformat"]; ?>"/>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tld["dload"]["d7"]; ?></td>
                    <td>
                      <div class="radio">
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_downloadurl" value="1"<?php if ($jkv["downloadurl"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                        </label>
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_downloadurl" value="0"<?php if ($jkv["downloadurl"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                        </label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["general"]["g40"]; ?> / <?php echo $tl["general"]["g41"]; ?></td>
                    <td>
                      <div class="form-group<?php if (isset($errors["e7"])) echo " has-error"; ?> no-margin">
                        <input type="text" name="jak_rssitem" class="form-control" value="<?php echo $jkv["downloadrss"]; ?>"/>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["setting"]["s7"]; ?></td>
                    <td>
                      <div class="form-group<?php if (isset($errors["e6"])) echo " has-error"; ?> no-margin">
                        <input type="text" class="form-control" name="jak_path" value="<?php echo $jkv["downloadpath"]; ?>"/>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tld["dload"]["d30"]; ?></td>
                    <td>
                      <input type="text" name="jak_twitter" class="form-control" value="<?php echo $jkv["downloadtwitter"]; ?>"/></td>
                  </tr>
                </table>
              </div>
              <div class="box-footer">
                <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["title"]["t29"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table class="table table-striped">
                  <tr>
                    <td><?php echo $tl["setting"]["s11"]; ?></td>
                    <td>
                      <div class="<?php if (isset($errors["e5"])) echo " has-error"; ?>">
                        <select name="jak_mid" class="form-control selectpicker">
                          <option value="2"<?php if ($jkv["downloadpagemid"] == 2) { ?> selected="selected"<?php } ?>>
                            <?php echo $tl["option"]["o1"]; ?>
                          </option>
                          <option value="4"<?php if ($jkv["downloadpagemid"] == 4) { ?> selected="selected"<?php } ?>>
                            <?php echo $tl["option"]["o2"]; ?>
                          </option>
                          <option value="6"<?php if ($jkv["downloadpagemid"] == 6) { ?> selected="selected"<?php } ?>>
                            <?php echo $tl["option"]["o3"]; ?>
                          </option>
                          <option value="8"<?php if ($jkv["downloadpagemid"] == 8) { ?> selected="selected"<?php } ?>>
                            <?php echo $tl["option"]["o4"]; ?>
                          </option>
                          <option value="10"<?php if ($jkv["downloadpagemid"] == 10) { ?> selected="selected"<?php } ?>>
                            <?php echo $tl["option"]["o5"]; ?>
                          </option>
                        </select>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["setting"]["s12"]; ?></td>
                    <td>
                      <div class="form-group<?php if (isset($errors["e5"])) echo " has-error"; ?> no-margin">
                        <input type="text" name="jak_item" class="form-control" value="<?php echo $jkv["downloadpageitem"]; ?>"/>
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
        </div>

      </div>

      <div class="tab-pane" id="dlSett2">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $tl["general"]["g53"]; ?></h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <a href="../js/editor/plugins/filemanager/dialog.php?type=2&editor=mce_0&lang=eng&fldr=&field_id=csseditor" class="ifManager"><?php echo $tl["general"]["g69"]; ?></a>
            <a href="javascript:;" id="addCssBlock"><?php echo $tl["general"]["g101"]; ?></a><br/>
            <div id="csseditor"></div>
            <textarea name="jak_css" class="form-control hidden" id="jak_css" rows="20"><?php echo $jkv["download_css"]; ?></textarea>
          </div>
          <div class="box-footer">
            <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
          </div>
        </div>
      </div>

      <div class="tab-pane" id="dlSett3">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $tl["general"]["g100"]; ?></h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <a href="../js/editor/plugins/filemanager/dialog.php?type=2&editor=mce_0&lang=eng&fldr=&field_id=javaeditor" class="ifManager"><?php echo $tl["general"]["g69"]; ?></a>
            <a href="javascript:;" id="addJavascriptBlock"><?php echo $tl["general"]["g102"]; ?></a><br/>
            <div id="javaeditor"></div>
            <textarea name="jak_javascript" class="form-control hidden" id="jak_javascript" rows="20"><?php echo $jkv["download_javascript"]; ?></textarea>
          </div>
          <div class="box-footer">
            <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
          </div>
        </div>
      </div>

      <div class="tab-pane" id="dlSett4">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $tl["general"]["g89"]; ?></h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <?php include APP_PATH . "admin/template/sidebar_widget.php"; ?>
          </div>
          <div class="box-footer">
            <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
          </div>
        </div>
      </div>
    </div>
  </form>

  <script src="js/ace/ace.js" type="text/javascript"></script>
  <script type="text/javascript">

    /* ACE Editor
     ========================================= */
    var jsACE = ace.edit("javaeditor");
    jsACE.setTheme("ace/theme/chrome");
    jsACE.session.setMode("ace/mode/html");
    textjs = $("#jak_javascript").val();
    jsACE.session.setValue(textjs);

    var cssACE = ace.edit("csseditor");
    cssACE.setTheme("ace/theme/chrome");
    cssACE.session.setMode("ace/mode/html");
    textcss = $("#jak_css").val();
    cssACE.session.setValue(textcss);

    /* Other config
     ========================================= */
    $(document).ready(function () {

      /* Bootstrap Tab Activation */
      $('#cmsTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
      });

      $("#addCssBlock").click(function () {

        cssACE.insert(insert_cssblock());

      });
      $("#addJavascriptBlock").click(function () {

        jsACE.insert(insert_javascript());

      });
    });

    /* Responsive Filemanager
     ========================================= */
    function responsive_filemanager_callback(field_id) {

      if (field_id == "csseditor" || field_id == "javaeditor") {

        // get the path for the ace file
        var acefile = jQuery('#' + field_id).val();

        if (field_id == "csseditor") {
          cssACE.insert('<link rel="stylesheet" href="' + acefile + '" type="text/css" />');
        } else if (field_id == "javaeditor") {
          jsACE.insert('<script src="' + acefile + '"><\/script>');
        }
      }
    }

    /* Submit Form
     ========================================= */
    $('form').submit(function () {
      $("#jak_css").val(cssACE.getValue());
      $("#jak_javascript").val(jsACE.getValue());
    });
  </script>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>