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
					if (isset($errors["e6"])) echo $errors["e6"];?>'
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
					echo $Html -> addTag('span', $tld["downl_section_tab"]["downltab1"], 'text');
					?>

				</a>
			</li>
			<li class="nav-item">
				<a href="#cmsPage3" class="" data-toggle="tab">

					<?php
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('span', $tld["downl_section_tab"]["downltab2"], 'text');
					?>

				</a>
			</li>
			<li class="nav-item">
				<a href="#cmsPage4" class="" data-toggle="tab">

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
					<div class="col-sm-7">
						<div class="box box-success">
							<div class="box-header with-border">

								<?php
								// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
								echo $Html -> addTag('h3', $tld["downl_box_title"]["downlbt"], 'box-title');
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
												?>

											</div>
											<div class="col-sm-7">
												<div class="form-group m-0<?php if (isset($errors["e1"])) echo " has-error"; ?>">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_title', $ENVO_SETTING_VAL["downloadtitle"], '', 'form-control');
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tld["downl_box_content"]["downlbc1"]);
												?>

											</div>
											<div class="col-sm-7">

												<?php
												// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
												echo $Html -> addTextarea('envo_lcontent', envo_edit_safe_userpost($ENVO_SETTING_VAL["downloaddesc"]), '4', '', array ('class' => 'form-control'));
												?>

											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tld["downl_box_content"]["downlbc3"]);
												?>

											</div>
											<div class="col-sm-7">
												<div class="row">
													<div class="col-sm-6">
														<select name="envo_showdlordern" class="form-control selectpicker">

															<?php
															// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
															echo $Html -> addOption('id', $tl["selection"]["sel9"], ($ENVO_SETTING['showdlwhat'] == "id") ? TRUE : FALSE);
															echo $Html -> addOption('name', $tl["selection"]["sel15"], ($ENVO_SETTING['showdlwhat'] == "name") ? TRUE : FALSE);
															echo $Html -> addOption('time', $tl["selection"]["sel11"], ($ENVO_SETTING['showdlwhat'] == "time") ? TRUE : FALSE);
															echo $Html -> addOption('hits', $tl["selection"]["sel12"], ($ENVO_SETTING['showdlwhat'] == "hits") ? TRUE : FALSE);
															echo $Html -> addOption('countdl', $tl["selection"]["sel16"], ($ENVO_SETTING['showdlwhat'] == "countdl") ? TRUE : FALSE);
															?>

														</select>
													</div>
													<div class="col-sm-6">
														<select name="envo_showdlorder" class="form-control selectpicker">

															<?php
															// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
															echo $Html -> addOption('ASC', $tl["selection"]["sel13"], ($ENVO_SETTING['showdlorder'] == "ASC") ? TRUE : FALSE);
															echo $Html -> addOption('DESC', $tl["selection"]["sel14"], ($ENVO_SETTING['showdlorder'] == "DESC") ? TRUE : FALSE);
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
												echo $Html -> addTag('strong', $tld["downl_box_content"]["downlbc6"]);
												echo $Html -> addTag('span', '*', 'star-item text-danger-800 m-l-10');
												?>

											</div>
											<div class="col-sm-7">
												<div class="form-group<?php if (isset($errors["e3"])) echo " has-error"; ?> m-0">
													<select name="envo_date" class="form-control selectpicker">

														<?php
														// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
														echo $Html -> addOption('', $tl["selection"]["sel110"], ($setting['downloaddateformat'] == '') ? TRUE : FALSE);

														echo $Html -> addOption('d.m.Y', 'd.m.Y (01.01.2017)', ($setting['downloaddateformat'] == 'd.m.Y') ? TRUE : FALSE);
														echo $Html -> addOption('d F Y', 'd F Y (01 January 2017)', ($setting['downloaddateformat'] == 'd F Y') ? TRUE : FALSE);
														echo $Html -> addOption('l m.Y', 'l m.Y (Monday 01.2017)', ($setting['downloaddateformat'] == 'l m.Y') ? TRUE : FALSE);
														echo $Html -> addOption('l F Y', 'l F Y (Monday January 2017)', ($setting['downloaddateformat'] == 'l F Y') ? TRUE : FALSE);
														?>

													</select>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tld["downl_box_content"]["downlbc7"]);
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
															echo $Html -> addOption(' - h:i A', ' - h:i A ( - 01:00 PM)', ($setting['downloadtimeformat'] == ' - h:i A') ? TRUE : FALSE);
															echo $Html -> addOption(' - h:i:s A', ' - h:i:s A ( - 01:00:00 PM)', ($setting['downloadtimeformat'] == ' - h:i:s A') ? TRUE : FALSE);
															echo $Html -> addOption(' - g:i A', ' - g:i A ( - 1:00 PM)', ($setting['downloadtimeformat'] == ' - g:i A') ? TRUE : FALSE);
															echo $Html -> addOption(' - g:i:s A', ' - g:i:s A ( - 1:00:00 PM)', ($setting['downloadtimeformat'] == ' - g:i:s A') ? TRUE : FALSE);
															?>

														</optgroup>
														<optgroup label="<?= $tl["selection"]["sel112"] ?>">

															<?php
															// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
															echo $Html -> addOption(' - H:i', ' - H:i ( - 13:00)', ($setting['downloadtimeformat'] == ' - H:i') ? TRUE : FALSE);
															echo $Html -> addOption(' - H:i:s', ' - H:i:s ( - 13:00:00)', ($setting['downloadtimeformat'] == ' - H:i:s') ? TRUE : FALSE);
															echo $Html -> addOption(' - H:i:s T O', ' - H:i:s T O ( - 13:00:00 CEST +0200)', ($setting['downloadtimeformat'] == ' - H:i:s T O') ? TRUE : FALSE);
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
												echo $Html -> addTag('strong', $tld["downl_box_content"]["downlbc8"]);
												?>

											</div>
											<div class="col-sm-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_downloadurl', '1', ($setting["downloadurl"] == '1') ? TRUE : FALSE, 'envo_downloadurl1');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addLabel('envo_downloadurl1', $tl["checkbox"]["chk"]);

													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_downloadurl', '0', ($setting["downloadurl"] == '0') ? TRUE : FALSE, 'envo_downloadurl2');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addLabel('envo_downloadurl2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tld["downl_box_content"]["downlbc9"] . ' / ' . $tld["downl_box_content"]["downlbc10"]);
												?>

											</div>
											<div class="col-sm-7">
												<div class="form-group<?php if (isset($errors["e7"])) echo " has-error"; ?> m-0">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_rssitem', $setting["downloadrss"], '', 'form-control');
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
													echo $Html -> addRadio('envo_downllivesearch', '1', ($setting["downloadlivesearch"] == '1') ? TRUE : FALSE, 'envo_downllivesearch1');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addLabel('envo_downllivesearch1', $tl["checkbox"]["chk"]);

													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_downllivesearch', '0', ($setting["downloadlivesearch"] == '0') ? TRUE : FALSE, 'envo_downllivesearch2');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addLabel('envo_downllivesearch2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
												echo $Html -> addTag('strong', $tld["downl_box_content"]["downlbc11"]);
												echo $Html -> addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array ('data-content' => $tld["downl_help"]["downlh6"], 'data-original-title' => $tld["downl_help"]["downlh"]));
												?>

											</div>
											<div class="col-sm-7">
												<div class="form-group<?php if (isset($errors["e6"])) echo " has-error"; ?> m-0">

													<?php
													/* FUNCTION: showDir
													 * DESCRIPTION: Creates a list options from all files, folders, and recursivly
													 *     found files and subfolders. Echos all the options as they are retrieved
													 * EXAMPLE: showDownloadPath(".") */
													function showDownloadPath ($dir, $subdir = 0)
													{
														if (!is_dir(APP_PATH . $dir)) {
															return FALSE;
														}

														global $setting;
														$scan = scandir(APP_PATH . $dir);

														foreach ($scan as $key => $val) {
															if ($val[0] == ".") {
																continue;
															}

															if (is_dir(APP_PATH . $dir . "/" . $val)) {
																$path = $dir . "/" . $val;
																if ($subdir == 0) {
																	echo '<option value="' . $path . '"' . (($setting["downloadpath"] == $path) ? 'selected' : '') . ' style="font-weight:bold">' . $val . '</span>' . "\n";
																} else {
																	echo '<option value="' . $path . '"' . (($setting["downloadpath"] == $path) ? 'selected' : '') . '>' . str_repeat('--', $subdir) . $val . '</option>' . "\n";
																}

																if ($val[0] != ".") {
																	showDownloadPath($dir . "/" . $val, $subdir + 1);
																}
															}
														}

														return TRUE;
													}

													?>

													<select name="envo_path" class="form-control selectpicker">

														<?php
														showDownloadPath('_files');
														?>

													</select>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tld["downl_box_content"]["downlbc48"]);
												?>

											</div>
											<div class="col-sm-7">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_extension', $setting["downloadpathext"], 'fileextension', 'form-control');
												?>

											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tld["downl_box_content"]["downlbc12"]);
												?>

											</div>
											<div class="col-sm-7">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_twitter', $setting["downloadtwitter"], '', 'form-control');
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
					<div class="col-sm-5">
						<div class="box box-success">
							<div class="box-header with-border">

								<?php
								// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
								echo $Html -> addTag('h3', $tld["downl_box_title"]["downlbt1"], 'box-title');
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
												echo $Html -> addTag('strong', $tld["downl_box_content"]["downlbc13"]);
												echo $Html -> addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array ('data-content' => $tld["downl_help"]["downlh5"], 'data-original-title' => $tld["downl_help"]["downlh"]));
												?>

											</div>
											<div class="col-sm-6">
												<div class="<?php if (isset($errors["e5"])) echo " has-error"; ?>">
													<select name="envo_mid" class="form-control selectpicker">

														<?php
														// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
														echo $Html -> addOption('2', $tl["selection"]["sel1"], ($setting['downloadpagemid'] == 2) ? TRUE : FALSE);
														echo $Html -> addOption('4', $tl["selection"]["sel2"], ($setting['downloadpagemid'] == 4) ? TRUE : FALSE);
														echo $Html -> addOption('6', $tl["selection"]["sel3"], ($setting['downloadpagemid'] == 6) ? TRUE : FALSE);
														echo $Html -> addOption('8', $tl["selection"]["sel4"], ($setting['downloadpagemid'] == 8) ? TRUE : FALSE);
														echo $Html -> addOption('10', $tl["selection"]["sel5"], ($setting['downloadpagemid'] == 10) ? TRUE : FALSE);
														?>

													</select>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-6">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tld["downl_box_content"]["downlbc14"]);
												?>

											</div>
											<div class="col-sm-6">
												<div class="form-group<?php if (isset($errors["e5"])) echo " has-error"; ?> m-0">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_item', $setting["downloadpageitem"], '', 'form-control');
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
								echo $Html -> addTag('h3', $tld["downl_box_title"]["downlbt2"], 'box-title');
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
								echo $Html -> addTextarea('envo_css', $setting["download_css"], '20', '', array ('id' => 'envo_css', 'class' => 'hidden'));
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
								echo $Html -> addTag('h3', $tld["downl_box_title"]["downlbt3"], 'box-title');
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
								echo $Html -> addTextarea('envo_javascript', $setting["download_javascript"], '20', '', array ('id' => 'envo_javascript', 'class' => 'hidden'));
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
	</form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>