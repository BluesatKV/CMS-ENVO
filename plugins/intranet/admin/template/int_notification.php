<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php
// EN: Checking of some page was successful
// CZ: Kontrola některé stránky byla úspěšná
if ($page1 == "s") { ?>
  <script type="text/javascript">
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
<?php } ?>

<?php
// EN: Remove records from DB was successful
// CZ: Odstranění záznamu z DB bylo úspěšné
if ($page2 == "s1") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        icon: 'fa fa-info-circle',
        message: '<?php echo $tl["notification"]["n2"]; ?>'
      }, {
        // settings
        type: 'info',
        delay: 5000,
        timer: 3000
      });
    }, 2000);
  </script>
<?php } ?>

<?php
// EN: Checking of some page was unsuccessful
// CZ: Kontrola některé stránky byla neúspěšná
if ($page2 == "e" || $page2 == "ene") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo($page2 == "e" ? $tl["general_error"]["generror1"] : $tl["general_error"]["generror2"]);?>'
      }, {
        // settings
        type: 'success',
        delay: 5000
      });
    }, 1000);
  </script>
<?php } ?>

  <!-- Fixed Button for save form -->
  <div class="savebutton-medium hidden-xs">

    <?php
    // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
    echo $Html->addAnchor('index.php?p=intranet&amp;sp=notification&amp;ssp=newnotification', 'Nový notifikace', '', 'btn btn-info button');
    ?>

  </div>

<?php if (!empty($ENVO_NOTIFICATION_ALL) && is_array($ENVO_NOTIFICATION_ALL)) { ?>

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <div class="box box-success">
      <div class="box-body no-padding">
        <table id="int_table" class="table table-striped table-hover">
          <thead>
          <tr>
            <th class="col-md-1 no-sort">#</th>
            <th class="col-md-1 no-sort">
              <div class="checkbox-singel check-success">

                <?php
                // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                echo $Html->addCheckbox('', '', FALSE, 'jak_delete_all');
                echo $Html->addLabel('jak_delete_all', '');
                ?>

              </div>
            </th>
            <th class="col-md-2">Název</th>
            <th class="col-md-1">Typ</th>
            <th class="col-md-3">Uživatelská skupina</th>
            <th class="col-md-2 no-sort">Datum vytvoření</th>
            <th class="col-md-2 no-sort"></th>
          </tr>
          </thead>
          <tbody>
          <?php foreach ($ENVO_NOTIFICATION_ALL as $n) { ?>
            <tr>
              <td><?php echo $n["id"]; ?></td>
              <td>
                <div class="checkbox-singel check-success">

                  <?php
                  // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                  // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                  echo $Html->addCheckbox('envo_delete_notification[]', $n["id"], FALSE, 'envo_delete_notification' . $n["id"], 'highlight');
                  echo $Html->addLabel('envo_delete_notification' . $n["id"], '');
                  ?>

                </div>
              </td>
              <td>

                <?php
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('index.php?p=intranet&amp;sp=notification&amp;ssp=editnotification&amp;id=' . $n["id"], $n["name"]);
                ?>

              </td>
              <td>
                <?php echo $n["type"];?>
              </td>
              <td>
                <?php echo $n["permission"];?>
              </td>
              <td>
                <?php echo $n["created"];?>
              </td>
              <td class="text-center">

                <?php
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                // EDIT
                echo $Html->addAnchor('index.php?p=intranet&amp;sp=notification&amp;ssp=editnotification&amp;id=' . $n["id"], '<i class="fa fa-edit"></i>', '', 'btn btn-default btn-xs m-r-20', array('data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i2"]));
                // DELETE
                echo $Html->addAnchor('index.php?p=intranet&amp;sp=notification&amp;ssp=delete&amp;id=' . $n["id"], '<i class="fa fa-trash-o"></i>', '', 'btn btn-danger btn-xs', array('data-confirm' => sprintf('Jste si jistý, že chcete odstranit notifikaci <strong>%s</strong>', $n["name"]), 'data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i1"]));
                ?>

              </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </form>

  <div class="col-md-12 m-b-30">
    <div class="icon_legend">

      <?php
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('h3', $tl["icons"]["i"]);
      echo $Html->addTag('i', '', 'fa fa-edit', array('data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i2"]));
      echo $Html->addTag('i', '', 'fa fa-trash-o', array('data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i1"]));
      ?>

    </div>
  </div>

<?php } else { ?>

  <div class="col-md-12">

    <?php
    // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
    echo $Html->addDiv($tl["general_error"]["generror3"], '', array('class' => 'alert bg-info text-white'));
    ?>

  </div>

<?php } ?>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>