<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php
// EN: An error occurred while saving to DB
// CZ: Při ukládání do DB došlo k chybě
if ($page2 == "e") { ?>
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
					if (isset($errors["e1"])) echo $errors["e1"];
					if (isset($errors["e2"])) echo $errors["e2"];
					if (isset($errors["e3"])) echo $errors["e3"]; ?>'
      }, {
        // settings
        type: 'danger',
        delay: 5000
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
			echo $Html -> addAnchor('index.php?p=faq', $tl["button"]["btn19"], '', 'btn btn-info button');
			?>

		</div>

		<!-- Form Content -->
		<ul class="nav nav-tabs nav-tabs-responsive" role="tablist">
			<li class="nav-item">
				<a href="#cmsPage1" class="active" data-toggle="tab">

					<?php
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('span', $tlf["faq_section_tab"]["faqtab"], 'text');
					?>

				</a>
			</li>
			<li class="nav-item next">
				<a href="#cmsPage2" class="" data-toggle="tab">

					<?php
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('span', $tlf["faq_section_tab"]["faqtab2"], 'text');
					?>

				</a>
			</li>
			<li class="nav-item">
				<a href="#cmsPage3" class="" data-toggle="tab">

					<?php
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('span', $tlf["faq_section_tab"]["faqtab1"], 'text');
					?>

				</a>
			</li>
			<li class='nav-item dropdown collapsed-menu hidden'>
				<a class="dropdown-toggle" data-toggle='dropdown' href='#' role='button' aria-haspopup="true" aria-expanded="false">
					...

					<?php
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('span', '', 'glyphicon glyphicon-chevron-right');
					?>

				</a>
				<div class="dropdown-menu dropdown-menu-right collapsed-tabs" aria-labelledby="dropdownMenuButton"></div>
			</li>
		</ul>

		<div class="tab-content">
			<div class="tab-pane fade active show" id="cmsPage1" role="tabpanel">
				<div class="row">
					<div class="col-sm-6">
						<div class="box box-success">
							<div class="box-header with-border">

								<?php
								// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
								echo $Html -> addTag('h3', $tlf["faq_box_title"]["faqbt6"], 'box-title');
								?>

							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tlf["faq_box_content"]["faqbc"]);
												echo $Html -> addTag('span', '*', 'star-item text-danger-800 m-l-10');
												?>

											</div>
											<div class="col-sm-7">
												<div class="form-group m-0<?php if (isset($errors["e1"])) echo " has-error"; ?>">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_title', '', '', 'form-control');
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tlf["faq_box_content"]["faqbc24"]);
												?>

											</div>
											<div class="col-sm-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_showtitle', '1', ((isset($_REQUEST["envo_showtitle"]) && $_REQUEST["envo_showtitle"] == '1') || !isset($_REQUEST["envo_showtitle"])) ? TRUE : FALSE, 'envo_showtitle1');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addLabel('envo_showtitle1', $tl["checkbox"]["chk"]);

													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_showtitle', '0', ((isset($_REQUEST["envo_showtitle"]) && $_REQUEST["envo_showtitle"] == '0')) ? TRUE : FALSE, 'envo_showtitle2');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addLabel('envo_showtitle2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tlf["faq_box_content"]["faqbc27"]);
												?>

											</div>
											<div class="col-sm-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_showdate', '1', ((isset($_REQUEST["envo_showdate"]) && $_REQUEST["envo_showdate"] == '1') || !isset($_REQUEST["envo_showdate"])) ? TRUE : FALSE, 'envo_showdate1');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addLabel('envo_showdate1', $tl["checkbox"]["chk"]);

													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_showdate', '0', ((isset($_REQUEST["envo_showdate"]) && $_REQUEST["envo_showdate"] == '0')) ? TRUE : FALSE, 'envo_showdate2');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addLabel('envo_showdate2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tlf["faq_box_content"]["faqbc28"]);
												?>

											</div>
											<div class="col-sm-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_showcat', '1', ((isset($_REQUEST["envo_showcat"]) && $_REQUEST["envo_showcat"] == '1') || !isset($_REQUEST["envo_showcat"])) ? TRUE : FALSE, 'envo_showcat1');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addLabel('envo_showcat1', $tl["checkbox"]["chk"]);

													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_showcat', '0', ((isset($_REQUEST["envo_showcat"]) && $_REQUEST["envo_showcat"] == '0')) ? TRUE : FALSE, 'envo_showcat2');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addLabel('envo_showcat2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tlf["faq_box_content"]["faqbc31"]);
												?>

											</div>
											<div class="col-sm-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_showhits', '1', ((isset($_REQUEST["envo_showhits"]) && $_REQUEST["envo_showhits"] == '1') || !isset($_REQUEST["envo_showhits"])) ? TRUE : FALSE, 'envo_showhits1');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addLabel('envo_showhits1', $tl["checkbox"]["chk"]);

													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_showhits', '0', ((isset($_REQUEST["envo_showhits"]) && $_REQUEST["envo_showhits"] == '0')) ? TRUE : FALSE, 'envo_showhits2');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addLabel('envo_showhits2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tlf["faq_box_content"]["faqbc29"]);
												?>

											</div>
											<div class="col-sm-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_social', '1', ((isset($_REQUEST["envo_social"]) && $_REQUEST["envo_social"] == '1')) ? TRUE : FALSE, 'envo_social1');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addLabel('envo_social1', $tl["checkbox"]["chk"]);

													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_social', '0', ((isset($_REQUEST["envo_social"]) && $_REQUEST["envo_social"] == '0') || !isset($_REQUEST["envo_social"])) ? TRUE : FALSE, 'envo_social2');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addLabel('envo_social2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tlf["faq_box_content"]["faqbc30"]);
												?>

											</div>
											<div class="col-sm-7">
												<div class="input-group">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_img', (isset($_REQUEST["envo_img"])) ? $_REQUEST["envo_img"] : '', 'envo_img', 'form-control');
													?>

													<span class="input-group-append">

														<?php
														// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
														echo $Html -> addAnchor('../assets/plugins/tinymce/5.3.1/plugins/filemanager/dialog.php?type=1&lang=' . $managerlangTiny . '&fldr=&field_id=envo_img', '<i class="pg-image"></i>', '', 'btn btn-info ifManager', array ('type' => 'button', 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i22"]));
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
								// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
								echo $Html -> startTag('h3', array ('class' => 'box-title'));
								echo $tlf["faq_box_title"]["faqbt7"];
								// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
								echo $Html -> addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array ('data-content' => $tlf["faq_help"]["faqh2"], 'data-original-title' => $tlf["faq_help"]["faqh"]));
								// Add Html Element -> endTag (Arguments: tag)
								echo $Html -> endTag('h3');
								?>

							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-sm-12">
												<select name="envo_catid[]" multiple="multiple" class="form-control">

													<?php
													// Add Html Element -> addInput (Arguments: value, text, selected, id, class, optional assoc. array)
													$selected = ((isset($_REQUEST["envo_catid"]) && ($_REQUEST["envo_catid"] == '0' || (in_array('0', $_REQUEST["envo_catid"]))) || (!isset($_REQUEST["envo_catid"]) && !isset($ENVO_CAT_SELECTED)))) ? TRUE : FALSE;

													echo $Html -> addOption('0', $tlf["faq_box_content"]["faqbc35"], $selected);
													if (isset($ENVO_CAT) && is_array($ENVO_CAT)) foreach ($ENVO_CAT as $v) {

														if (isset($ENVO_CAT_SELECTED)) {
															if ($v["id"] == $ENVO_CAT_SELECTED) {
																$selected = TRUE;
															} else {
																$selected = FALSE;
															}
														} else {
															if (isset($_REQUEST["envo_catid"]) && (in_array($v["id"], $_REQUEST["envo_catid"]))) {
																if (isset($_REQUEST["envo_catid"]) && (in_array('0', $_REQUEST["envo_catid"]))) {
																	$selected = FALSE;
																} else {
																	$selected = TRUE;
																}
															} else {
																$selected = FALSE;
															}
														}

														echo $Html -> addOption($v["id"], $v["name"], $selected);
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
								echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right');
								?>

							</div>
						</div>
						<?php if (ENVO_TAGS) { ?>
							<div class="box box-success">
								<div class="box-header with-border">

									<?php
									// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
									echo $Html -> addTag('h3', $tlf["faq_box_title"]["faqbt9"], 'box-title');
									?>

								</div>
								<div class="box-body">
									<div class="block">
										<div class="block-content">
											<div class="row-form">
												<div class="col-sm-5">

													<?php
													// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
													echo $Html -> addTag('strong', 'Choose tags from predefined list');
													?>

												</div>
												<div class="col-sm-7">
													<select name="" id="selecttags1" class="form-control selectpicker">
														<optgroup label="Poskytovatelé TV">

															<?php
															// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
															echo $Html -> addOption('skylink', 'Skylink');
															echo $Html -> addOption('freesat', 'freeSAT');
															echo $Html -> addOption('digi-tv', 'Digi TV');
															?>

														</optgroup>
														<optgroup label="Vysílací technologie">

															<?php
															// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
															echo $Html -> addOption('dvb-t/t2', 'DVB-T/T2');
															echo $Html -> addOption('dvb-s/s2', 'DVB-S/S2');
															echo $Html -> addOption('dvb-c', 'DVB-C');
															echo $Html -> addOption('dvb-h', 'DVB-H');
															?>

														</optgroup>
													</select>
												</div>
											</div>
											<div class="row-form">
												<div class="col-sm-5">

													<?php
													// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
													echo $Html -> addTag('strong', 'Choose tags from list');
													?>

												</div>
												<div class="col-sm-7">

													<?php $ENVO_TAG_ALL = envo_tag_name_admin();
													if ($ENVO_TAG_ALL) { ?>
														<select name="" id="selecttags2" class="form-control selectpicker">
															<?php
															foreach ($ENVO_TAG_ALL as $v) {

																echo $Html -> addOption($v["tag"], $v["tag"]);

															}
															?>

														</select>
													<?php } else { ?>
														<div>Tags cloud is empty!</div>
													<?php } ?>

												</div>
											</div>
											<div class="row-form">
												<div class="col-sm-12">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_tags', (isset($_REQUEST["envo_tags"])) ? $_REQUEST["envo_tags"] : '', 'envo_tags', 'form-control tags', array ('data-role' => 'tagsinput'));
													?>

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
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="cmsPage2" role="tabpanel">
				<div class="row">
					<div class="col-sm-12">
						<?php include_once APP_PATH . "admin/template/editor_new.php"; ?>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="cmsPage3" role="tabpanel">
				<div class="row">
					<div class="col-sm-12">
						<div class="box box-success">
							<div class="box-header with-border">

								<?php
								// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
								echo $Html -> addTag('h3', $tlf["faq_box_title"]["faqbt4"], 'box-title');
								?>

							</div>
							<div class="box-body">
								<?php include APP_PATH . 'admin/template/sidebar_widget_new.php'; ?>
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
			</div>
		</div>
	</form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>