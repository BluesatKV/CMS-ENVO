<?php include "header.php"; ?>

<?php if ($page1 == "s") { ?>
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
if ($page1 == "e") { ?>
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
<?php } ?>

<?php if ($page2 == "s") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        icon: 'fa fa-info-circle',
        message: '<?php echo $tl["notification"]["n2"]; ?>',
      }, {
        // settings
        type: 'info',
        delay: 5000,
        timer: 3000,
      });
    }, 2000);
  </script>
<?php } ?>

<?php if ($page2 == "s1") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        icon: 'fa fa-info-circle',
        message: '<?php echo $tl["notification"]["n3"]; ?>',
      }, {
        // settings
        type: 'info',
        delay: 5000,
        timer: 3000,
      });
    }, 2000);
  </script>
<?php } ?>

  <?php if (isset($JAK_LOGINLOG_ALL) && is_array($JAK_LOGINLOG_ALL)) { ?>

    <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
      <div class="box">
        <div class="box-body no-padding">
          <div class="table-responsive">
            <table class="table table-hover table-expandable">
              <thead>
              <tr>
                <th>#</th>
                <th><input type="checkbox" id="jak_delete_all"/></th>
                <th><?php echo $tl["logs_box_table"]["logstb"]; ?></th>
                <th><?php echo $tl["logs_box_table"]["logstb1"]; ?></th>
                <th><?php echo $tl["logs_box_table"]["logstb2"]; ?></th>
                <th><?php echo $tl["logs_box_table"]["logstb3"]; ?></th>
                <th><?php echo $tl["logs_box_table"]["logstb4"]; ?></th>
                <th class="text-center"><?php echo $tl["logs_box_table"]["logstb5"]; ?></th>
                <th>
                  <a href="index.php?p=logs&amp;sp=truncate&amp;ssp=go" id="button_truncate" class="btn btn-warning btn-xs" data-confirm-trunc="<?php echo $tl["notification"]["n4"]; ?>">
                    <i class="fa fa-exclamation-triangle"></i>
                  </a>
                </th>
                <th>
                  <button type="submit" name="delete" id="button_delete" class="btn btn-danger btn-xs" data-confirm-del="<?php echo $tl["notification"]["n5"]; ?>" disabled="disabled">
                    <i class="fa fa-trash-o"></i>
                  </button>
                </th>
              </tr>
              </thead>
              <?php foreach ($JAK_LOGINLOG_ALL as $v) { ?>
                <tr>
                  <td><?php echo $v["id"]; ?></td>
                  <td>
                    <input type="checkbox" name="jak_delete_log[]" class="highlight" value="<?php echo $v["id"]; ?>"/>
                  </td>
                  <td><?php echo jak_cut_text($v["name"], 8, '...'); ?></td>
                  <td><?php echo $v["fromwhere"]; ?></td>
                  <td><?php echo $v["ip"]; ?></td>
                  <td><?php echo jak_cut_text($v["usragent"], 20, '...'); ?></td>
                  <td><?php echo $v["time"]; ?></td>
                  <td class="text-center">
                    <?php if ($v["access"] == '1') { ?>
                      <i class="fa fa-check"></i>
                    <?php } else { ?>
                      <i class="fa fa-exclamation"></i>
                    <?php } ?>
                  </td>
                  <td></td>
                  <td class="call-button">
                    <a class="btn btn-default btn-xs" href="index.php?p=logs&amp;sp=delete&amp;ssp=<?php echo $v["id"]; ?>" data-confirm="<?php echo $tl["notification"]["n6"]; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i1"]; ?>">
                      <i class="fa fa-trash-o"></i>
                    </a>
                  </td>
                </tr>
                <!-- Detail of login user -->
                <tr>
                  <td colspan="11" style="background: #edf7ee; border-top: 1px solid #cccccc; border-bottom: 1px solid #cccccc;">
                    <table style="width: 100%;">
                      <tbody>
                      <tr>
                        <td style="padding: 5px;">
                          <table style="width: 70%;">
                            <tr>
                              <!-- Name of user -->
                              <td><strong><?php echo $tl["logs_box_table"]["logstb"]; ?>: </strong> <?php echo $v["name"]; ?></td>
                              <!-- Login page -->
                              <td><strong><?php echo $tl["logs_box_table"]["logstb1"]; ?>
                                  : </strong> <?php echo rtrim(BASE_URL_ORIG, "/") . $v["fromwhere"]; ?></td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                      <!-- User Agent -->
                      <tr>
                        <td style="padding: 5px;"><strong><?php echo $tl["logs_box_table"]["logstb3"]; ?>
                            : </strong> <?php echo $v["usragent"]; ?></td>
                      </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
    </form>

    <div class="icon_legend">
      <h3><?php echo $tl["icons"]["i"]; ?></h3>
      <i title="<?php echo $tl["icons"]["i16"]; ?>" class="fa fa-check"></i>
      <i title="<?php echo $tl["icons"]["i17"]; ?>" class="fa fa-exclamation"></i>
      <i title="<?php echo $tl["icons"]["i15"]; ?>" class="fa fa-warning-sign"></i>
      <i title="<?php echo $tl["icons"]["i1"]; ?>" class="fa fa-trash-o"></i>
    </div>

    <?php if ($JAK_PAGINATE) {
      echo $JAK_PAGINATE;
    }
  } else { ?>

    <div class="alert bg-info">
      <?php echo $tl["errorpage"]["data"]; ?>
    </div>

  <?php } ?>

  <script type="text/javascript">
    $(document).ready(function () {

      /* Check all checkbox */
      $("#jak_delete_all").click(function () {
        var checkedStatus = this.checked;
        $(".highlight").each(function () {
          $(this).prop('checked', checkedStatus);
        });
        $('#button_delete').prop('disabled', function(i, v) { return !v; });
      });

      /* Disable submit button if checkbox is not checked */
      $(".highlight").change(function() {
        if(this.checked) {
          $("#button_delete").removeAttr("disabled");
        } else {
          $("#button_delete").attr("disabled", "disabled");
        }
      });

    });
  </script>

<?php include "footer.php"; ?>