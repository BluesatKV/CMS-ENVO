<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php
// EN: The data was successfully stored in DB
// CZ: Data byla úspěšně uložena do DB
if ($page2 == "s") { ?>
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
					if (isset($errors["e3"])) echo $errors["e3"];
					if (isset($errors["e4"])) echo $errors["e4"];
					if (isset($errors["e5"])) echo $errors["e5"];
					if (isset($errors["e6"])) echo $errors["e6"];
					if (isset($errors["e7"])) echo $errors["e7"];?>'
      }, {
        // settings
        type: 'success',
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
					echo $Html -> addTag('span', $tlf["faq_section_tab"]["faqtab3"], 'text');
					?>

				</a>
			</li>
			<li class="nav-item">
				<a href="#cmsPage3" class="" data-toggle="tab">

					<?php
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('span', $tlf["faq_section_tab"]["faqtab4"], 'text');
					?>

				</a>
			</li>
			<li class="nav-item">
				<a href="#cmsPage4" class="" data-toggle="tab">

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
					<div class="col-sm-7">
						<div class="box box-success">
							<div class="box-header with-border">

								<?php
								// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
								echo $Html -> addTag('h3', $tlf["faq_box_title"]["faqbt"], 'box-title');
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
												?>

											</div>
											<div class="col-sm-7">
												<div class="form-group m-0">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_title', $ENVO_SETTING_VAL["faqtitle"], '', 'form-control');
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tlf["faq_box_content"]["faqbc1"]);
												?>

											</div>
											<div class="col-sm-7">

												<?php
												// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
												echo $Html -> addTextarea('envo_lcontent', envo_edit_safe_userpost($ENVO_SETTING_VAL["faqdesc"]), '4', '', array ('class' => 'form-control'));
												?>

											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tlf["faq_box_content"]["faqbc3"]);
												?>

											</div>
											<div class="col-sm-7">
												<div class="row">
													<div class="col-sm-6">
														<select name="envo_showfaqordern" class="form-control selectpicker">

															<?php
															// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
															echo $Html -> addOption('id', $tl["selection"]["sel9"], ($ENVO_SETTING['showfaqwhat'] == "id") ? TRUE : FALSE);
															echo $Html -> addOption('title', $tl["selection"]["sel10"], ($ENVO_SETTING['showfaqwhat'] == "title") ? TRUE : FALSE);
															echo $Html -> addOption('time', $tl["selection"]["sel11"], ($ENVO_SETTING['showfaqwhat'] == "time") ? TRUE : FALSE);
															echo $Html -> addOption('hits', $tl["selection"]["sel12"], ($ENVO_SETTING['showfaqwhat'] == "hits") ? TRUE : FALSE);
															?>

														</select>
													</div>
													<div class="col-sm-6">
														<select name="envo_showfaqorder" class="form-control selectpicker">

															<?php
															// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
															echo $Html -> addOption('ASC', $tl["selection"]["sel13"], ($ENVO_SETTING['showfaqorder'] == "ASC") ? TRUE : FALSE);
															echo $Html -> addOption('DESC', $tl["selection"]["sel14"], ($ENVO_SETTING['showfaqorder'] == "DESC") ? TRUE : FALSE);
															?>

														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tlf["faq_box_content"]["faqbc6"]);
												echo $Html -> addTag('span', '*', 'star-item text-danger-800 m-l-10');
												?>

											</div>
											<div class="col-sm-7">
												<div class="form-group<?php if (isset($errors["e3"])) echo " has-error"; ?> m-0">
													<select name="envo_date" class="form-control selectpicker">

														<?php
														// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
														echo $Html -> addOption('', $tl["selection"]["sel110"], ($setting['faqdateformat'] == '') ? TRUE : FALSE);

														echo $Html -> addOption('d.m.Y', 'd.m.Y (01.01.2017)', ($setting['faqdateformat'] == 'd.m.Y') ? TRUE : FALSE);
														echo $Html -> addOption('d F Y', 'd F Y (01 January 2017)', ($setting['faqdateformat'] == 'd F Y') ? TRUE : FALSE);
														echo $Html -> addOption('l m.Y', 'l m.Y (Monday 01.2017)', ($setting['faqdateformat'] == 'l m.Y') ? TRUE : FALSE);
														echo $Html -> addOption('l F Y', 'l F Y (Monday January 2017)', ($setting['faqdateformat'] == 'l F Y') ? TRUE : FALSE);
														?>

													</select>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tlf["faq_box_content"]["faqbc7"]);
												?>

											</div>
											<div class="col-sm-7">
												<div class="form-group m-0">
													<select name="envo_time" class="form-control selectpicker">

														<?php
														// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
														echo $Html -> addOption('', $tl["selection"]["sel110"], ($setting['downloadtimeformat'] == '') ? TRUE : FALSE);
														?>

														<optgroup label="<?= $tl["selection"]["sel111"] ?>">

															<?php
															// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
															echo $Html -> addOption(' - h:i A', ' - h:i A ( - 01:00 PM)', ($setting['faqtimeformat'] == ' - h:i A') ? TRUE : FALSE);
															echo $Html -> addOption(' - h:i:s A', ' - h:i:s A ( - 01:00:00 PM)', ($setting['faqtimeformat'] == ' - h:i:s A') ? TRUE : FALSE);
															echo $Html -> addOption(' - g:i A', ' - g:i A ( - 1:00 PM)', ($setting['faqtimeformat'] == ' - g:i A') ? TRUE : FALSE);
															echo $Html -> addOption(' - g:i:s A', ' - g:i:s A ( - 1:00:00 PM)', ($setting['faqtimeformat'] == ' - g:i:s A') ? TRUE : FALSE);
															?>

														</optgroup>
														<optgroup label="<?= $tl["selection"]["sel112"] ?>">

															<?php
															// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
															echo $Html -> addOption(' - H:i', ' - H:i ( - 13:00)', ($setting['faqtimeformat'] == ' - H:i') ? TRUE : FALSE);
															echo $Html -> addOption(' - H:i:s', ' - H:i:s ( - 13:00:00)', ($setting['faqtimeformat'] == ' - H:i:s') ? TRUE : FALSE);
															echo $Html -> addOption(' - H:i:s T O', ' - H:i:s T O ( - 13:00:00 CEST +0200)', ($setting['faqtimeformat'] == ' - H:i:s T O') ? TRUE : FALSE);
															?>

														</optgroup>

													</select>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tlf["faq_box_content"]["faqbc8"]);
												?>

											</div>
											<div class="col-sm-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_faqurl', '1', ($setting["faqurl"] == '1') ? TRUE : FALSE, 'envo_faqurl1');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addLabel('envo_faqurl1', $tl["checkbox"]["chk"]);

													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_faqurl', '0', ($setting["faqurl"] == '0') ? TRUE : FALSE, 'envo_faqurl2');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addLabel('envo_faqurl2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tlf["faq_box_content"]["faqbc9"] . ' / ' . $tlf["faq_box_content"]["faqbc10"]);
												?>

											</div>
											<div class="col-sm-7">
												<div class="form-group<?php if (isset($errors["e7"])) echo " has-error"; ?> m-0">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_rssitem', $setting["faqrss"], '', 'form-control');
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tlf["faq_box_content"]["faqbc38"]);
												?>

											</div>
											<div class="col-sm-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_faqlivesearch', '1', ($setting["faqlivesearch"] == '1') ? TRUE : FALSE, 'envo_faqlivesearch1');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addLabel('envo_faqlivesearch1', $tl["checkbox"]["chk"]);

													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_faqlivesearch', '0', ($setting["faqlivesearch"] == '0') ? TRUE : FALSE, 'envo_faqlivesearch2');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addLabel('envo_faqlivesearch2', $tl["checkbox"]["chk1"]);
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
					<div class="col-sm-5">
						<div class="box box-success">
							<div class="box-header with-border">

								<?php
								// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
								echo $Html -> addTag('h3', $tlf["faq_box_title"]["faqbt1"], 'box-title');
								?>

							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-sm-6">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
												echo $Html -> addTag('strong', $tlf["faq_box_content"]["faqbc11"]);
												echo $Html -> addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array ('data-content' => $tlf["faq_help"]["faqh1"], 'data-original-title' => $tlf["faq_help"]["faqh"]));
												?>

											</div>
											<div class="col-sm-6">
												<div class="<?php if (isset($errors["e6"])) echo " has-error"; ?>">
													<select name="envo_mid" class="form-control selectpicker">

														<?php
														// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
														echo $Html -> addOption('2', $tl["selection"]["sel1"], ($setting['faqpagemid'] == 2) ? TRUE : FALSE);
														echo $Html -> addOption('4', $tl["selection"]["sel2"], ($setting['faqpagemid'] == 4) ? TRUE : FALSE);
														echo $Html -> addOption('6', $tl["selection"]["sel3"], ($setting['faqpagemid'] == 6) ? TRUE : FALSE);
														echo $Html -> addOption('8', $tl["selection"]["sel4"], ($setting['faqpagemid'] == 8) ? TRUE : FALSE);
														echo $Html -> addOption('10', $tl["selection"]["sel5"], ($setting['faqpagemid'] == 10) ? TRUE : FALSE);
														?>

													</select>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-6">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tlf["faq_box_content"]["faqbc12"]);
												?>

											</div>
											<div class="col-sm-6">
												<div class="form-group<?php if (isset($errors["e5"])) echo " has-error"; ?> m-0">
													<input type="text" name="envo_item" class="form-control" value="<?= $setting["faqpageitem"] ?>"/>
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
								echo $Html -> addTag('h3', $tlf["faq_box_title"]["faqbt10"], 'box-title');
								echo $Html -> addTag('span', '*', 'star-item text-danger-800 m-l-10');
								?>

							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-sm-12">
												<div class="form-group m-0<?php if (isset($errors["e4"])) echo " has-error"; ?>">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_shortmsg', $setting["faqshortmsg"], '', 'form-control');
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
			</div>
			<div class="tab-pane fade" id="cmsPage2" role="tabpanel">
				<div class="row">
					<div class="col-sm-12">
						<div class="box box-success">
							<div class="box-header with-border">

								<?php
								// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
								echo $Html -> addTag('h3', $tlf["faq_box_title"]["faqbt2"], 'box-title');
								?>

							</div>
							<div class="box-body">

								<?php
								echo '<div class="m-b-10">';
								// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
								echo $Html -> addAnchor('../../../../assets/plugins/tinymce/5.3.1/plugins/filemanager/dialog.php?type=2&lang=' . $managerlangTiny . '&fldr=&field_id=csseditor', $tl["global_text"]["globaltxt8"], '', 'ifManager m-r-20');
								echo $Html -> addAnchor('javascript:;', $tl["global_text"]["globaltxt6"], 'addCssBlock');
								echo '</div>';
								// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
								echo $Html -> addDiv('', 'csseditor');
								// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
								echo $Html -> addTextarea('envo_css', $setting["faq_css"], '20', '', array ('id' => 'envo_css', 'class' => 'hidden'));
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
			<div class="tab-pane fade" id="cmsPage3" role="tabpanel">
				<div class="row">
					<div class="col-sm-12">
						<div class="box box-success">
							<div class="box-header with-border">

								<?php
								// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
								echo $Html -> addTag('h3', $tlf["faq_box_title"]["faqbt3"], 'box-title');
								?>

							</div>
							<div class="box-body">

								<?php
								echo '<div class="m-b-10">';
								// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
								echo $Html -> addAnchor('../../../../assets/plugins/tinymce/5.3.1/plugins/filemanager/dialog.php?type=2&lang=' . $managerlangTiny . '&fldr=&field_id=javaeditor', $tl["global_text"]["globaltxt8"], '', 'ifManager m-r-20');
								echo $Html -> addAnchor('javascript:;', $tl["global_text"]["globaltxt7"], 'addJavascriptBlock');
								echo '</div>';
								// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
								echo $Html -> addDiv('', 'javaeditor');
								// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
								echo $Html -> addTextarea('envo_javascript', $setting["faq_javascript"], '20', '', array ('id' => 'envo_javascript', 'class' => 'hidden'));
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
								echo $Html -> addTag('h3', $tlf["faq_box_title"]["faqbt4"], 'box-title');
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
	</form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>