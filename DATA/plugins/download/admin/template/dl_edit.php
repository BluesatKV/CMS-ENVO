<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php
// EN: The data was successfully stored in DB
// CZ: Data byla úspěšně uložena do DB
if ($page3 == "s") { ?>
	<script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?=$tl["notification"]["n7"]?>'
      }, {
        // settings
        type: 'success',
        delay: 5000
      });
    }, 1000);
	</script>
<?php } ?>

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
					if (isset($errors["e1"])) echo $errors["e1"];
					if (isset($errors["e2"])) echo $errors["e2"];?>'
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
			echo $Html -> addAnchor('index.php?p=download', $tl["button"]["btn19"], '', 'btn btn-info button');
			?>

		</div>

		<!-- Form Content -->
		<ul class="nav nav-tabs nav-tabs-responsive" role="tablist">
			<li class="nav-item">
				<a href="#cmsPage1" class="active" data-toggle="tab">

					<?php
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('span', $tld["downl_section_tab"]["downltab"], 'text');
					?>

				</a>
			</li>
			<li class="nav-item next">
				<a href="#cmsPage2" class="" data-toggle="tab">

					<?php
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('span', $tld["downl_section_tab"]["downltab4"], 'text');
					?>

				</a>
			</li>
			<li class="nav-item">
				<a href="#cmsPage3" class="" data-toggle="tab">

					<?php
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('span', $tld["downl_section_tab"]["downltab1"], 'text');
					?>

				</a>
			</li>
			<li class="nav-item">
				<a href="#cmsPage4" class="" data-toggle="tab">

					<?php
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('span', $tld["downl_section_tab"]["downltab2"], 'text');
					?>

				</a>
			</li>
			<li class="nav-item">
				<a href="#cmsPage5" class="" data-toggle="tab">

					<?php
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('span', $tld["downl_section_tab"]["downltab3"], 'text');
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
								echo $Html -> addTag('h3', $tld["downl_box_title"]["downlbt6"], 'box-title');
								?>

							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tld["downl_box_content"]["downlbc"]);
												echo $Html -> addTag('span', '*', 'star-item text-danger-800 m-l-10');
												?>

											</div>
											<div class="col-sm-7">
												<div class="form-group m-0<?php if (isset($errors["e1"])) echo " has-error"; ?>">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_title', $ENVO_FORM_DATA["title"], '', 'form-control');
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tld["downl_box_content"]["downlbc20"]);
												?>

											</div>
											<div class="col-sm-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_showtitle', '1', ($ENVO_FORM_DATA["showtitle"] == '1') ? TRUE : FALSE, 'envo_showtitle1');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addLabel('envo_showtitle1', $tl["checkbox"]["chk"]);

													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_showtitle', '0', ($ENVO_FORM_DATA["showtitle"] == '0') ? TRUE : FALSE, 'envo_showtitle2');
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
												echo $Html -> addTag('strong', $tld["downl_box_content"]["downlbc23"]);
												?>

											</div>
											<div class="col-sm-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_showdate', '1', ($ENVO_FORM_DATA["showdate"] == '1') ? TRUE : FALSE, 'envo_showdate1');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addLabel('envo_showdate1', $tl["checkbox"]["chk"]);

													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_showdate', '0', ($ENVO_FORM_DATA["showdate"] == '0') ? TRUE : FALSE, 'envo_showdate2');
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
												echo $Html -> addTag('strong', $tld["downl_box_content"]["downlbc24"]);
												?>

											</div>
											<div class="col-sm-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_showcat', '1', ($ENVO_FORM_DATA["showcat"] == '1') ? TRUE : FALSE, 'envo_showcat1');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addLabel('envo_showcat1', $tl["checkbox"]["chk"]);

													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_showcat', '0', ($ENVO_FORM_DATA["showcat"] == '0') ? TRUE : FALSE, 'envo_showcat2');
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
												echo $Html -> addTag('strong', $tld["downl_box_content"]["downlbc31"]);
												?>

											</div>
											<div class="col-sm-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_showdl', '1', ($ENVO_FORM_DATA["showdl"] == '1') ? TRUE : FALSE, 'envo_showdl1');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addLabel('envo_showdl1', $tl["checkbox"]["chk"]);

													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_showdl', '0', ($ENVO_FORM_DATA["showdl"] == '0') ? TRUE : FALSE, 'envo_showdl2');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addLabel('envo_showdl2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
												echo $Html -> addTag('strong', $tld["downl_box_content"]["downlbc25"]);
												echo $Html -> addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array ('data-content' => $tld["downl_help"]["downlh4"], 'data-original-title' => $tld["downl_help"]["downlh"]));
												?>

											</div>
											<div class="col-sm-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_ftshare', '1', ($ENVO_FORM_DATA["ftshare"] == '1') ? TRUE : FALSE, 'envo_ftshare1');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addLabel('envo_ftshare1', $tl["checkbox"]["chk"]);

													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_ftshare', '0', ($ENVO_FORM_DATA["ftshare"] == '0') ? TRUE : FALSE, 'envo_ftshare2');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addLabel('envo_ftshare2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tld["downl_box_content"]["downlbc26"]);
												?>

											</div>
											<div class="col-sm-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_social', '1', ($ENVO_FORM_DATA["socialbutton"] == '1') ? TRUE : FALSE, 'envo_social1');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addLabel('envo_social1', $tl["checkbox"]["chk"]);

													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_social', '0', ($ENVO_FORM_DATA["socialbutton"] == '0') ? TRUE : FALSE, 'envo_social2');
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
												echo $Html -> addTag('strong', $tld["downl_box_content"]["downlbc27"]);
												?>

											</div>
											<div class="col-sm-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_sidebar', '1', ($ENVO_FORM_DATA["sidebar"] == '1') ? TRUE : FALSE, 'envo_sidebar1');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addLabel('envo_sidebar1', $tl["checkbox"]["chk2"]);

													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_sidebar', '0', ($ENVO_FORM_DATA["sidebar"] == '0') ? TRUE : FALSE, 'envo_sidebar2');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addLabel('envo_sidebar2', $tl["checkbox"]["chk3"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tld["downl_box_content"]["downlbc28"]);
												?>

											</div>
											<div class="col-sm-7">
												<div class="input-group">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_img', $ENVO_FORM_DATA["previmg"], 'envo_img', 'form-control');
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
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tld["downl_box_content"]["downlbc29"]);
												echo $Html -> addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array ('data-content' => $tld["downl_help"]["downlh7"], 'data-original-title' => $tld["downl_help"]["downlh"]));
												?>

											</div>
											<div class="col-sm-7">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_password', $ENVO_FORM_DATA["password"], '', 'form-control');
												?>

											</div>
										</div>
										<?php if ($ENVO_FORM_DATA["password"]) { ?>
											<div class="row-form p-t-10 p-b-10">
												<div class="col-sm-5">

													<?php
													// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
													echo $Html -> addTag('strong', $tld["downl_box_content"]["downlbc30"]);
													?>

												</div>
												<div class="col-sm-7">
													<div class="checkbox-singel check-success">

														<?php
														// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
														// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
														echo $Html -> addCheckbox('envo_delete_password', '', FALSE, 'envo_delete_password');
														echo $Html -> addLabel('envo_delete_password', '');
														?>

													</div>
												</div>
											</div>
										<?php } ?>
										<div class="row-form p-t-10 p-b-10">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tld["downl_box_content"]["downlbc33"]);
												?>

											</div>
											<div class="col-sm-7">
												<div class="checkbox-singel check-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addCheckbox('envo_delete_hits', '', FALSE, 'envo_delete_hits');
													echo $Html -> addLabel('envo_delete_hits', '');
													?>

												</div>
											</div>
										</div>
										<div class="row-form p-t-10 p-b-10">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tld["downl_box_content"]["downlbc34"]);
												?>

											</div>
											<div class="col-sm-7">
												<div class="checkbox-singel check-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addCheckbox('envo_update_time', '', FALSE, 'envo_update_time');
													echo $Html -> addLabel('envo_update_time', '');
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
								echo $Html -> addTag('h3', $tld["downl_box_title"]["downlbt13"], 'box-title');
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
												echo $Html -> addTag('strong', $tld["downl_box_content"]["downlbc51"]);
												echo $Html -> addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array ('data-content' => $tld["downl_help"]["downlh8"], 'data-original-title' => $tld["downl_help"]["downlh"]));
												?>

											</div>
											<div class="col-sm-7">
												<div class="input-group">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_img_facebooksm', $ENVO_FORM_DATA["previmgfbsm"], 'envo_img_facebooksm', 'form-control');
													?>

													<span class="input-group-append">

														<?php
														// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
														echo $Html -> addAnchor('../assets/plugins/tinymce/5.3.1/plugins/filemanager/dialog.php?type=1&lang=' . $managerlangTiny . '&fldr=&field_id=envo_img_facebooksm', '<i class="pg-image"></i>', '', 'btn btn-info ifManager', array ('type' => 'button', 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i22"]));
														?>

                          </span>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
												echo $Html -> addTag('strong', $tld["downl_box_content"]["downlbc52"]);
												echo $Html -> addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array ('data-content' => $tld["downl_help"]["downlh9"], 'data-original-title' => $tld["downl_help"]["downlh"]));
												?>

											</div>
											<div class="col-sm-7">
												<div class="input-group">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_img_facebooklg', $ENVO_FORM_DATA["previmgfblg"], 'envo_img_facebooklg', 'form-control');
													?>

													<span class="input-group-append">

														<?php
														// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
														echo $Html -> addAnchor('../assets/plugins/tinymce/5.3.1/plugins/filemanager/dialog.php?type=1&lang=' . $managerlangTiny . '&fldr=&field_id=envo_img_facebooklg', '<i class="pg-image"></i>', '', 'btn btn-info ifManager', array ('type' => 'button', 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i22"]));
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
								echo $tld["downl_box_title"]["downlbt7"];
								// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
								echo $Html -> addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array ('data-content' => $tld["downl_help"]["downlh1"], 'data-original-title' => $tld["downl_help"]["downlh"]));
								// Add Html Element -> endTag (Arguments: tag)
								echo $Html -> endTag('h3');
								?>

							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-sm-12">
												<select name="envo_catid[]" multiple="multiple" class="form-control" size="10">

													<?php
													// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
													$selected = ($ENVO_FORM_DATA["catid"] == '0') ? TRUE : FALSE;

													echo $Html -> addOption('0', $tld["downl_box_content"]["downlbc35"], $selected);
													if (isset($ENVO_CAT) && is_array($ENVO_CAT)) foreach ($ENVO_CAT as $z) {

														$selected = (in_array($z["id"], explode(',', $ENVO_FORM_DATA["catid"]))) ? TRUE : FALSE;

														if ($z["catparent"] > 0) {
															echo $Html -> addOption($z["id"], '-- ' . $z["name"], $selected);
														} else {
															echo $Html -> addOption($z["id"], $z["name"], $selected, '', '', array ('style' => 'font-weight: bold;padding: 5px 0;'));
														}


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
						<div class="box box-success">
							<div class="box-header with-border">

								<?php
								// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
								echo $Html -> startTag('h3', array ('class' => 'box-title'));
								echo $tld["downl_box_title"]["downlbt8"];
								// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
								echo $Html -> addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array ('data-content' => $tld["downl_help"]["downlh1"], 'data-original-title' => $tld["downl_help"]["downlh"]));
								// Add Html Element -> endTag (Arguments: tag)
								echo $Html -> endTag('h3');
								?>

							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-sm-12">
												<select name="envo_permission[]" multiple="multiple" class="form-control">

													<?php
													// Add Html Element -> addInput (Arguments: value, text, selected, id, class, optional assoc. array)
													$selected = ($ENVO_FORM_DATA["candownload"] == '0') ? TRUE : FALSE;

													echo $Html -> addOption('0', $tld["downl_box_content"]["downlbc36"], $selected);
													if (isset($ENVO_USERGROUP) && is_array($ENVO_USERGROUP)) foreach ($ENVO_USERGROUP as $v) {

														$selected = (in_array($v["id"], explode(',', $ENVO_FORM_DATA["candownload"]))) ? TRUE : FALSE;
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
						<div class="box box-success">
							<div class="box-header with-border">

								<?php
								// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
								echo $Html -> addTag('h3', $tld["downl_box_title"]["downlbt12"], 'box-title');
								?>

							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-sm-12">
												<div class="form-group<?php if (isset($errors["e2"])) echo " has-error"; ?> m-0">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_datetime', ($ENVO_FORM_DATA["time"]) ? $ENVO_FORM_DATA["time"] : '', 'datepickerTime', 'form-control', array ('readonly' => 'readonly'));
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
								// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
								echo $Html -> startTag('h3', array ('class' => 'box-title'));
								echo $tld["downl_box_title"]["downlbt9"];
								// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
								echo $Html -> addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array ('data-content' => $tld["downl_help"]["downlh3"], 'data-original-title' => $tld["downl_help"]["downlh"]));
								// Add Html Element -> endTag (Arguments: tag)
								echo $Html -> endTag('h3');
								?>

							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tld["downl_box_content"]["downlbc37"]);
												?>

											</div>
											<div class="col-sm-7">
												<select name="envo_file" class="form-control selectpicker">

													<?php
													// Add Html Element -> addInput (Arguments: value, text, selected, id, class, optional assoc. array)
													$selected = ($ENVO_FORM_DATA["file"] == '0') ? TRUE : FALSE;

													echo $Html -> addOption('0', $tld["downl_box_content"]["downlbc38"], $selected);
													if (isset($site_dload_files) && is_array($site_dload_files)) foreach ($site_dload_files as $l) {

														$selected = ($ENVO_FORM_DATA["file"] == $l) ? TRUE : FALSE;
														echo $Html -> addOption($l, $setting["downloadpath"] . "/" . $l, $selected);

													}
													?>

												</select>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tld["downl_box_content"]["downlbc39"]);
												?>

											</div>
											<div class="col-sm-7">
												<div class="input-group">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_extfile', $ENVO_FORM_DATA["extfile"], 'ext_file', 'form-control');
													?>

													<span class="input-group-append">

														<?php
														// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
														echo $Html -> addAnchor('../assets/plugins/tinymce/5.3.1/plugins/filemanager/dialog.php?type=2&lang=' . $managerlangTiny . '&fldr=&field_id=ext_file', '<i class="fa fa-folder-open"></i>', '', 'btn btn-info ifManager', array ('type' => 'button', 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i23"]));
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
						<?php if (ENVO_TAGS) { ?>
							<div class="box box-success">
								<div class="box-header with-border">

									<?php
									// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
									echo $Html -> addTag('h3', $tld["downl_box_title"]["downlbt10"], 'box-title');
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
													echo $Html -> addInput('text', 'envo_tags', '', '', 'form-control tags', array ('data-role' => 'tagsinput'));
													?>

												</div>
											</div>
											<?php if ($ENVO_TAGLIST) { ?>
												<div class="row-form">
													<div class="col-sm-12">
														<div class="form-group">
															<label for="tags"><?= $tld["downl_box_content"]["downlbc50"] ?></label>
															<div class="controls">
																<?= $ENVO_TAGLIST ?>
															</div>
														</div>
													</div>
												</div>
											<?php } ?>
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
						<div class="box box-success">
							<div class="box-header with-border">

								<?php
								// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
								echo $Html -> addTag('h3', $tld["downl_box_title"]["downlbt11"], 'box-title');
								?>

							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tld["downl_box_content"]["downlbc40"]);
												?>

											</div>
											<div class="col-sm-7">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_hitstotal', $ENVO_FORM_DATA["hits"], '', 'form-control');
												?>

											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tld["downl_box_content"]["downlbc41"]);
												?>

											</div>
											<div class="col-sm-7">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_dltotal', $ENVO_FORM_DATA["countdl"], '', 'form-control');
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
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="cmsPage2" role="tabpanel">
				<div class="row">
					<div class="col-sm-12">
						<?php include_once APP_PATH . "admin/template/editor_edit.php"; ?>
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
								echo $Html -> addTag('h3', $tld["downl_box_title"]["downlbt2"], 'box-title');
								?>

							</div>
							<div class="box-body">

								<?php
								echo '<div class="m-b-10">';
								// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
								echo $Html -> addAnchor('../assets/plugins/tinymce/5.3.1/plugins/filemanager/dialog.php?type=2&lang=' . $managerlangTiny . '&fldr=&field_id=csseditor', $tl["global_text"]["globaltxt8"], '', 'ifManager m-r-20');
								echo $Html -> addAnchor('javascript:;', $tl["global_text"]["globaltxt6"], 'addCssBlock');
								echo '</div>';
								// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
								echo $Html -> addDiv('', 'csseditor');
								// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
								echo $Html -> addTextarea('envo_css', $ENVO_FORM_DATA["dl_css"], '', '', array ('id' => 'envo_css', 'class' => 'hidden'));
								?>

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
			<div class="tab-pane fade" id="cmsPage4" role="tabpanel">
				<div class="row">
					<div class="col-sm-12">
						<div class="box box-success">
							<div class="box-header with-border">

								<?php
								// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
								echo $Html -> addTag('h3', $tld["downl_box_title"]["downlbt3"], 'box-title');
								?>

							</div>
							<div class="box-body">

								<?php
								echo '<div class="m-b-10">';
								// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
								echo $Html -> addAnchor('../assets/plugins/tinymce/5.3.1/plugins/filemanager/dialog.php?type=2&lang=' . $managerlangTiny . '&fldr=&field_id=javaeditor', $tl["global_text"]["globaltxt8"], '', 'ifManager m-r-20');
								echo $Html -> addAnchor('javascript:;', $tl["global_text"]["globaltxt7"], 'addJavascriptBlock');
								echo '</div>';
								// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
								echo $Html -> addDiv('', 'javaeditor');
								// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
								echo $Html -> addTextarea('envo_javascript', $ENVO_FORM_DATA["dl_javascript"], '', '', array ('id' => 'envo_javascript', 'class' => 'hidden'));
								?>

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
			<div class="tab-pane fade" id="cmsPage5" role="tabpanel">
				<div class="row">
					<div class="col-sm-12">
						<div class="box box-success">
							<div class="box-header with-border">

								<?php
								// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
								echo $Html -> addTag('h3', $tld["downl_box_title"]["downlbt4"], 'box-title');
								?>

							</div>
							<div class="box-body">
								<?php include APP_PATH . "admin/template/sidebar_widget.php"; ?>
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

		<?php
		// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
		echo $Html -> addInput('hidden', 'envo_oldcatid', $ENVO_FORM_DATA["catid"]);
		?>

	</form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>