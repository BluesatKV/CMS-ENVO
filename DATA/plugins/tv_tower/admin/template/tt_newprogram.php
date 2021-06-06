<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php
// EN: An error occurred while saving to DB
// CZ: Při ukládání do DB došlo k chybě
if ($page3 == "e") { ?>
	<script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?=$tl["general_error"]["generror1"]?>'
      }, {
        // settings
        type: 'danger',
        delay: 10000
      });
    }, 1000);
	</script>
<?php } ?>

<?php
// EN: Checking the saved elements in the page was not successful
// CZ: Kontrola ukládaných prvků ve stránce nebyla úšpěšná
if ($errors) { ?>
	<script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php if (isset($errors["e"])) echo $errors["e"];
					if (isset($errors["e1"])) echo $errors["e1"];?>'
      }, {
        // settings
        type: 'danger',
        delay: 10000
      });
    }, 1000);
	</script>
<?php } ?>

<form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
	<!-- Action button block -->
	<div class="actionbtn-block d-none d-sm-block">

		<?php
		// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
		echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button');
		// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
		echo $Html -> addAnchor('index.php?p=tv-tower&amp;sp=tvprogram', $tl["button"]["btn19"], '', 'btn btn-info button');
		?>

	</div>

	<!-- Form Content -->
	<div class="row tab-content-singel">
		<div class="col-sm-6">
			<div class="box box-success">
				<div class="box-header with-border">

					<?php
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('h3', 'Obecná nastavení programu', 'box-title');
					?>

				</div>
				<div class="box-body">
					<div class="block">
						<div class="block-content">
							<div class="row-form">
								<div class="col-sm-5">

									<?php
									// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
									echo $Html -> addTag('strong', 'Vysílač / Kanál');
									?>

								</div>
								<div class="col-sm-7">
									<div class="">
										<select name="envo_tvchannel" class="form-control selectpicker" data-search-select2="true">

											<?php
											// Add Html Element -> addInput (Arguments: value, text, selected, id, class, optional assoc. array)
											$selected = ((isset($_REQUEST["envo_tvchannel"]) && $_REQUEST["envo_tvchannel"] == '0')) ? TRUE : FALSE;

											echo $Html -> addOption('0', 'Archiv', $selected);


											if (isset($ENVO_TVTOWER_ALL) && is_array($ENVO_TVTOWER_ALL)) foreach ($ENVO_TVTOWER_ALL as $tt) {

												echo '<optgroup label="' . $tt["name"] . '">';

												if (isset($ENVO_TVCHANNEL_ALL) && is_array($ENVO_TVCHANNEL_ALL)) foreach ($ENVO_TVCHANNEL_ALL as $tc) {

													if ($tt["id"] == $tc["towerid"]) {
														$optvalue = $tt["id"] . '-' . $tc["id"] . '-' . $tc["number"];

														if (isset($_REQUEST["envo_tvchannel"]) && ($_REQUEST["envo_tvchannel"] != '0')) {
															if ($_REQUEST["envo_tvchannel"] == $tt["id"] . ',' . $tc["id"] . ',' . $tc["number"]) {
																$selected = TRUE;
															} else {
																$selected = FALSE;
															}
														} else {
															if ($page3 == $optvalue) {
																$selected = TRUE;
															} else {
																$selected = FALSE;
															}
														}
														// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
														echo $Html -> addOption($tt["id"] . ',' . $tc["id"] . ',' . $tc["number"], $tc["number"] . ' K', $selected);
													}

												}

												echo '</optgroup>';

											}
											?>

										</select>
									</div>

								</div>
							</div>
							<div class="row-form">
								<div class="col-sm-5">

									<?php
									// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
									echo $Html -> addTag('strong', 'Program je vysílán');
									?>

								</div>
								<div class="col-sm-7">
									<div class="radio radio-success">

										<?php
										// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
										echo $Html -> addRadio('envo_programonline', '1', ((isset($_REQUEST["envo_programonline"]) && $_REQUEST["envo_programonline"] == '1') || !isset($_REQUEST["envo_programonline"])) ? TRUE : FALSE, 'envo_programonline1');
										// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
										echo $Html -> addLabel('envo_programonline1', $tl["checkbox"]["chk"]);

										// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
										echo $Html -> addRadio('envo_programonline', '0', ((isset($_REQUEST["envo_programonline"]) && $_REQUEST["envo_programonline"] == '0')) ? TRUE : FALSE, 'envo_programonline2');
										// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
										echo $Html -> addLabel('envo_programonline2', $tl["checkbox"]["chk1"]);
										?>

									</div>
								</div>
							</div>
							<div class="row-form">
								<div class="col-sm-5">

									<?php
									// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
									echo $Html -> addTag('strong', 'TV / Radio / Stream');
									?>

								</div>
								<div class="col-sm-7">
									<div class="radio radio-success">

										<?php
										// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
										echo $Html -> addRadio('envo_programtvr', '1', ((isset($_REQUEST["envo_programtvr"]) && $_REQUEST["envo_programtvr"] == '1') || !isset($_REQUEST["envo_programtvr"])) ? TRUE : FALSE, 'envo_programtvr1');
										// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
										echo $Html -> addLabel('envo_programtvr1', 'TV');

										// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
										echo $Html -> addRadio('envo_programtvr', '0', ((isset($_REQUEST["envo_programtvr"]) && $_REQUEST["envo_programtvr"] == '0')) ? TRUE : FALSE, 'envo_programtvr2');
										// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
										echo $Html -> addLabel('envo_programtvr2', 'Radio');

										// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
										echo $Html -> addRadio('envo_programtvr', '2', ($ENVO_FORM_DATA["tvr"] == '2') ? TRUE : FALSE, 'envo_programtvr3');
										// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
										echo $Html -> addLabel('envo_programtvr3', 'Stream TV');
										?>

									</div>
								</div>
							</div>
							<div class="row-form">
								<div class="col-sm-5">

									<?php
									// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
									echo $Html -> addTag('strong', 'Název Programu');
									?>

								</div>
								<div class="col-sm-7">
									<div class="input-group<?php if (isset($errors["e1"])) echo " has-error"; ?>">

										<?php
										// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
										echo $Html -> addInput('text', 'envo_programname', (isset($_REQUEST["envo_programname"])) ? $_REQUEST["envo_programname"] : '', 'envo_programname', 'form-control');
										?>

										<span class="input-group-append">

                      <?php
											// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
											echo $Html -> addAnchor('', '<i class="pg-menu_justify"></i>', 'programSelect', 'btn btn-info', array ('type' => 'button', 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => 'Vybrat program'));
											?>

                    </span>

									</div>
								</div>
							</div>
							<div class="row-form">
								<div class="col-sm-5">

									<?php
									// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
									echo $Html -> addTag('strong', 'Ikona programu');
									?>

								</div>
								<div class="col-sm-7">
									<div class="input-group">

										<?php
										// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
										echo $Html -> addInput('text', 'envo_programicons', (isset($_REQUEST["envo_programicons"])) ? $_REQUEST["envo_programicons"] : '', 'envo_programicons', 'form-control');
										?>

										<span class="input-group-append">

														<?php
														// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
														echo $Html -> addAnchor('../assets/plugins/tinymce/plugins/filemanager/dialog.php?type=1&lang=' . $managerlangTiny . '&fldr=&field_id=envo_programicons', '<i class="pg-image"></i>', '', 'btn btn-info ifManager', array ('type' => 'button', 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i22"]));
														?>

                    </span>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="box-footer">

					<?php
					// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
					echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right');
					?>

				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="box box-success">
				<div class="box-header with-border">

					<?php
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('h3', 'Rozšířená nastavení programu', 'box-title');
					?>

				</div>
				<div class="box-body">
					<div class="block">
						<div class="block-content">
							<div class="row-form">
								<div class="col-sm-5">

									<?php
									// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
									// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
									echo $Html -> addTag('strong', 'Service ID');
									echo $Html -> addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array ('data-content' => 'Unikátní identifikátor konkrétní služby <br> přenášené transportním tokem', 'data-original-title' => 'Nápověda'));
									?>

								</div>
								<div class="col-sm-7">
									<div class="form-group m-0">

										<?php
										// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
										echo $Html -> addInput('text', 'envo_serviceid', (isset($_REQUEST["envo_serviceid"])) ? $_REQUEST["envo_serviceid"] : '', '', 'form-control');
										?>

									</div>
								</div>
							</div>
							<div class="row-form">
								<div class="col-sm-5">

									<?php
									// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
									echo $Html -> addTag('strong', 'Kódování Obrazu');
									?>

								</div>
								<div class="col-sm-7">
									<select name="envo_videoencoding" class="form-control selectpicker">

										<?php
										// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
										echo $Html -> addOption('', 'Žádné', (isset($_REQUEST["envo_videoencoding"]) && $_REQUEST["envo_videoencoding"] == '') ? TRUE : FALSE);
										echo $Html -> addOption('MPEG-2', 'MPEG-2', (isset($_REQUEST["envo_videoencoding"]) && $_REQUEST["envo_videoencoding"] == 'MPEG-2') ? TRUE : FALSE);
										echo $Html -> addOption('MPEG-2 MP@ML', 'MPEG-2 MP@ML', (isset($_REQUEST["envo_videoencoding"]) && $_REQUEST["envo_videoencoding"] == 'MPEG-2 MP@ML') ? TRUE : FALSE);
										echo $Html -> addOption('MPEG-4', 'MPEG-4', (isset($_REQUEST["envo_videoencoding"]) && $_REQUEST["envo_videoencoding"] == 'MPEG-4') ? TRUE : FALSE);
										?>

									</select>
								</div>
							</div>
							<div class="row-form">
								<div class="col-sm-5">

									<?php
									// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
									echo $Html -> addTag('strong', 'Kódování Zvuku');
									?>

								</div>
								<div class="col-sm-7">
									<select name="envo_audioencoding" class="form-control selectpicker">

										<?php
										// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
										echo $Html -> addOption('', 'Žádné', (isset($_REQUEST["envo_audioencoding"]) && $_REQUEST["envo_audioencoding"] == '') ? TRUE : FALSE);
										echo $Html -> addOption('MPEG-1', 'MPEG-1', (isset($_REQUEST["envo_audioencoding"]) && $_REQUEST["envo_audioencoding"] == 'MPEG-1') ? TRUE : FALSE);
										echo $Html -> addOption('MPEG-1 Layer II', 'MPEG-1 Layer II', (isset($_REQUEST["envo_audioencoding"]) && $_REQUEST["envo_audioencoding"] == 'MPEG-1 Layer II') ? TRUE : FALSE);
										?>

									</select>
								</div>
							</div>
							<div class="row-form">
								<div class="col-sm-5">

									<?php
									// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
									echo $Html -> addTag('strong', 'Formát Obrazu');
									?>

								</div>
								<div class="col-sm-7">
									<select name="envo_videoformat" class="form-control selectpicker">

										<?php
										// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
										echo $Html -> addOption('', 'Žádný', (isset($_REQUEST["envo_videoformat"]) && $_REQUEST["envo_videoformat"] == '') ? TRUE : FALSE);
										echo $Html -> addOption('16:9', '16:9', (isset($_REQUEST["envo_videoformat"]) && $_REQUEST["envo_videoformat"] == '16:9') ? TRUE : FALSE);
										echo $Html -> addOption('4:3', '4:3', (isset($_REQUEST["envo_videoformat"]) && $_REQUEST["envo_videoformat"] == '4:3') ? TRUE : FALSE);
										?>

									</select>
								</div>
							</div>
							<div class="row-form">
								<div class="col-sm-5">

									<?php
									// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
									echo $Html -> addTag('strong', 'Rozlišení Obrazu');
									?>

								</div>
								<div class="col-sm-7">
									<select name="envo_videosize" class="form-control selectpicker">

										<?php
										// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
										echo $Html -> addOption('', 'Žádné', ((isset($_REQUEST["envo_videosize"]) && ($_REQUEST["envo_videosize"] == '')) || !isset($_REQUEST["envo_videosize"])) ? TRUE : FALSE);
										echo $Html -> addOption('704 x 576i', '704 x 576i', (isset($_REQUEST["envo_videosize"]) && $_REQUEST["envo_videosize"] == '704 x 576i') ? TRUE : FALSE);
										echo $Html -> addOption('DVBT-T SD (MPEG2) => 720 x 576 => 576i', 'DVBT-T SD (MPEG2) => 720 x 576 => 576i', (isset($_REQUEST["envo_videosize"]) && $_REQUEST["envo_videosize"] == 'DVBT-T SD (MPEG2) => 720 x 576 => 576i') ? TRUE : FALSE);
										echo $Html -> addOption('DVBT-T HD (MPEG4) => 1440 x 1080 => 1080i', 'DVBT-T HD (MPEG4) => 1440 x 1080 => 1080i', (isset($_REQUEST["envo_videosize"]) && $_REQUEST["envo_videosize"] == 'DVBT-T HD (MPEG4) => 1440 x 1080 => 1080i') ? TRUE : FALSE);
										?>

									</select>
								</div>
							</div>
							<div class="row-form">
								<div class="col-sm-5">

									<?php
									// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
									echo $Html -> addTag('strong', 'Datový Tok Programu (Mbit/s)');
									?>

								</div>
								<div class="col-sm-7">
									<div class="form-group m-0">

										<?php
										// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
										echo $Html -> addInput('text', 'envo_bitrate', (isset($_REQUEST["envo_bitrate"])) ? $_REQUEST["envo_bitrate"] : '', '', 'form-control');
										?>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="box-footer">

					<?php
					// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
					echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right');
					?>

				</div>
			</div>
			<div class="box box-success">
				<div class="box-header with-border">

					<?php
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('h3', 'Doplňkové služby programu', 'box-title');
					?>

				</div>
				<div class="box-body">
					<div class="block">
						<div class="block-content">
							<div class="row-form">
								<div class="col-sm-5">

									<?php
									// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
									echo $Html -> addTag('strong', 'Teletext');
									?>

								</div>
								<div class="col-sm-7">
									<div class="radio radio-success">

										<?php
										// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
										echo $Html -> addRadio('envo_teletext', '1', ((isset($_REQUEST["envo_teletext"]) && $_REQUEST["envo_teletext"] == '1')) ? TRUE : FALSE, 'envo_teletext1');
										// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
										echo $Html -> addLabel('envo_teletext1', $tl["checkbox"]["chk"]);

										// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
										echo $Html -> addRadio('envo_teletext', '0', ((isset($_REQUEST["envo_teletext"]) && $_REQUEST["envo_teletext"] == '1') || !isset($_REQUEST["envo_teletext"])) ? TRUE : FALSE, 'envo_teletext2');
										// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
										echo $Html -> addLabel('envo_teletext2', $tl["checkbox"]["chk1"]);
										?>

									</div>
								</div>
							</div>
							<div class="row-form">
								<div class="col-sm-5">

									<?php
									// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
									echo $Html -> addTag('strong', 'VPS');
									?>

								</div>
								<div class="col-sm-7">
									<div class="radio radio-success">

										<?php
										// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
										echo $Html -> addRadio('envo_vps', '1', ((isset($_REQUEST["envo_vps"]) && $_REQUEST["envo_vps"] == '1')) ? TRUE : FALSE, 'envo_vps1');
										// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
										echo $Html -> addLabel('envo_vps1', $tl["checkbox"]["chk"]);

										// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
										echo $Html -> addRadio('envo_vps', '0', ((isset($_REQUEST["envo_vps"]) && $_REQUEST["envo_vps"] == '1') || !isset($_REQUEST["envo_vps"])) ? TRUE : FALSE, 'envo_vps2');
										// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
										echo $Html -> addLabel('envo_vps2', $tl["checkbox"]["chk1"]);
										?>

									</div>
								</div>
							</div>
							<div class="row-form">
								<div class="col-sm-5">

									<?php
									// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
									echo $Html -> addTag('strong', 'EPG');
									?>

								</div>
								<div class="col-sm-7">
									<div class="radio radio-success">

										<?php
										// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
										echo $Html -> addRadio('envo_epg', '1', ((isset($_REQUEST["envo_epg"]) && $_REQUEST["envo_epg"] == '1')) ? TRUE : FALSE, 'envo_epg1');
										// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
										echo $Html -> addLabel('envo_epg1', $tl["checkbox"]["chk"]);

										// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
										echo $Html -> addRadio('envo_epg', '0', ((isset($_REQUEST["envo_epg"]) && $_REQUEST["envo_epg"] == '1') || !isset($_REQUEST["envo_epg"])) ? TRUE : FALSE, 'envo_epg2');
										// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
										echo $Html -> addLabel('envo_epg2', $tl["checkbox"]["chk1"]);
										?>

									</div>
								</div>
							</div>
							<div class="row-form">
								<div class="col-sm-5">

									<?php
									// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
									echo $Html -> addTag('strong', 'HbbTV');
									?>

								</div>
								<div class="col-sm-7">
									<div class="radio radio-success">

										<?php
										// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
										echo $Html -> addRadio('envo_hbbtv', '1', ((isset($_REQUEST["envo_hbbtv"]) && $_REQUEST["envo_hbbtv"] == '1')) ? TRUE : FALSE, 'envo_hbbtv1');
										// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
										echo $Html -> addLabel('envo_hbbtv1', $tl["checkbox"]["chk"]);

										// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
										echo $Html -> addRadio('envo_hbbtv', '0', ((isset($_REQUEST["envo_hbbtv"]) && $_REQUEST["envo_hbbtv"] == '1') || !isset($_REQUEST["envo_hbbtv"])) ? TRUE : FALSE, 'envo_hbbtv2');
										// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
										echo $Html -> addLabel('envo_hbbtv2', $tl["checkbox"]["chk1"]);
										?>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="box-footer">

					<?php
					// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
					echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right');
					?>

				</div>
			</div>
		</div>
	</div>
</form>

<?php
include_once APP_PATH . 'plugins/tv_tower/admin/ajax/tt_selectprogram_modal.php';
include_once APP_PATH . 'admin/template/footer.php';
?>
