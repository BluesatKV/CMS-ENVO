<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php
// EN: An error occurred while saving to DB
// CZ: Při ukládání do DB došlo k chybě
if ($page2 == "e") { ?>
	<script>
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
			echo $Html -> addAnchor('index.php?p=belowheader', $tl["button"]["btn19"], '', 'btn btn-info button');
			?>

		</div>

		<!-- Form Content -->
		<ul class="nav nav-tabs nav-tabs-responsive" role="tablist">
			<li class="nav-item">
				<a href="#cmsPage1" class="active" data-toggle="tab">

					<?php
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('span', $tlbh["bh_section_tab"]["bhtab"], 'text');
					?>

				</a>
			</li>
			<li class="nav-item next">
				<a href="#cmsPage2" class="" data-toggle="tab">

					<?php
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('span', $tlbh["bh_section_tab"]["bhtab1"], 'text');
					?>

				</a>
			</li>
			<li class="nav-item">
				<a href="#cmsPage3" class="" data-toggle="tab">

					<?php
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('span', $tlbh["bh_section_tab"]["bhtab2"], 'text');
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
								echo $Html -> addTag('h3', $tlbh["bh_box_title"]["bhbt"], 'box-title');
								?>

							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tlbh["bh_box_content"]["bhbc"]);
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
								echo $Html -> addTag('h3', $tlbh["bh_box_title"]["bhbt6"], 'box-title');
								?>

							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-sm-7">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tlbh["bh_box_content"]["bhbc11"]);
												?>

											</div>
											<div class="col-sm-5">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_allpage', '1', ((isset($_REQUEST["envo_allpage"]) && $_REQUEST["envo_allpage"] == '1')) ? TRUE : FALSE, 'envo_allpage1');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addLabel('envo_allpage1', $tl["checkbox"]["chk"]);

													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_allpage', '0', ((isset($_REQUEST["envo_allpage"]) && $_REQUEST["envo_allpage"] == '0') || !isset($_REQUEST["envo_allpage"])) ? TRUE : FALSE, 'envo_allpage2');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addLabel('envo_allpage2', $tl["checkbox"]["chk1"]);
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
					<div class="col-sm-6">
						<div class="box box-success">
							<div class="box-header with-border">

								<?php
								// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
								echo $Html -> startTag('h3', array ('class' => 'box-title'));
								echo $tlbh["bh_box_title"]["bhbt2"];
								// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
								echo $Html -> addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array ('data-content' => $tlbh["bh_help"]["bhh1"], 'data-original-title' => $tlbh["bh_help"]["bhh"]));
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
													$selected = ((isset($_REQUEST["envo_permission"]) && ($_REQUEST["envo_permission"] == '0' || (in_array('0', $_REQUEST["envo_permission"]))) || !isset($_REQUEST["envo_permission"]))) ? TRUE : FALSE;

													echo $Html -> addOption('0', $tl["news_box_content"]["newsbc22"], $selected);
													if (isset($ENVO_USERGROUP) && is_array($ENVO_USERGROUP)) foreach ($ENVO_USERGROUP as $v) {

														if (isset($_REQUEST["envo_permission"]) && (in_array($v["id"], $_REQUEST["envo_permission"]))) {
															if (isset($_REQUEST["envo_permission"]) && (in_array('0', $_REQUEST["envo_permission"]))) {
																$selected = FALSE;
															} else {
																$selected = TRUE;
															}
														} else {
															$selected = FALSE;
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
					</div>
				</div>
				<div class="row">
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html -> addTag('h3', $tlbh["bh_box_title"]["bhbt3"], 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row">
										<div class="col-sm-6">
											<div>

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												echo $Html -> startTag('h6', array ('class' => 'box-title'));
												echo $tlbh["bh_box_title"]["bhbt1"];
												// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
												echo $Html -> addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array ('data-content' => $tlbh["bh_help"]["bhh1"], 'data-original-title' => $tlbh["bh_help"]["bhh"]));
												// Add Html Element -> endTag (Arguments: tag)
												echo $Html -> endTag('h6');
												?>

											</div>
											<div class="row-form">
												<div class="col-sm-12">
													<select name="envo_pageid[]" multiple="multiple" class="form-control" style="min-height: 330px;">

														<?php
														// Add Html Element -> addInput (Arguments: value, text, selected, id, class, optional assoc. array)
														$selected = ((isset($_REQUEST["envo_pageid"]) && ($_REQUEST["envo_pageid"] == '0' || (in_array('0', $_REQUEST["envo_pageid"]))) || !isset($_REQUEST["envo_pageid"]))) ? TRUE : FALSE;

														echo $Html -> addOption('0', $tlbh["bh_box_content"]["bhbc1"], $selected);
														if (isset($ENVO_PAGES) && is_array($ENVO_PAGES)) foreach ($ENVO_PAGES as $v) {

															if (isset($_REQUEST["envo_pageid"]) && (in_array($v["id"], $_REQUEST["envo_pageid"]))) {
																if (isset($_REQUEST["envo_pageid"]) && (in_array('0', $_REQUEST["envo_pageid"]))) {
																	$selected = FALSE;
																} else {
																	$selected = TRUE;
																}
															} else {
																$selected = FALSE;
															}

															echo $Html -> addOption($v["id"], $v["title"], $selected);

														}
														?>

													</select>
												</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div>

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('h6', $tlbh["bh_box_title"]["bhbt3"], 'box-title');
												?>

											</div>
											<div class="row-form">
												<div class="col-sm-5">

													<?php
													// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
													echo $Html -> addTag('strong', $tlbh["bh_box_content"]["bhbc3"]);
													?>

												</div>
												<div class="col-sm-7">
													<select name="envo_newsid[]" multiple="multiple" class="form-control">

														<?php
														// Add Html Element -> addInput (Arguments: value, text, selected, id, class, optional assoc. array)
														$selected = ((isset($_REQUEST["envo_newsid"]) && ($_REQUEST["envo_newsid"] == '0' || (in_array('0', $_REQUEST["envo_newsid"]))) || !isset($_REQUEST["envo_newsid"]))) ? TRUE : FALSE;

														echo $Html -> addOption('0', $tlbh["bh_box_content"]["bhbc1"], $selected);
														if (isset($ENVO_NEWS) && is_array($ENVO_NEWS)) foreach ($ENVO_NEWS as $n) {

															if (isset($_REQUEST["envo_newsid"]) && (in_array($n["id"], $_REQUEST["envo_newsid"]))) {
																if (isset($_REQUEST["envo_newsid"]) && (in_array('0', $_REQUEST["envo_newsid"]))) {
																	$selected = FALSE;
																} else {
																	$selected = TRUE;
																}
															} else {
																$selected = FALSE;
															}

															echo $Html -> addOption($n["id"], $n["title"], $selected);

														}
														?>

													</select>
												</div>
											</div>
											<div class="row-form">
												<div class="col-sm-7">

													<?php
													// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
													echo $Html -> addTag('strong', $tlbh["bh_box_content"]["bhbc4"]);
													?>

												</div>
												<div class="col-sm-5">
													<div class="radio radio-success">

														<?php
														// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
														echo $Html -> addRadio('envo_mainnews', '1', ((isset($_REQUEST["envo_mainnews"]) && $_REQUEST["envo_mainnews"] == '1')) ? TRUE : FALSE, 'envo_mainnews1');
														// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
														echo $Html -> addLabel('envo_mainnews1', $tl["checkbox"]["chk"]);

														// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
														echo $Html -> addRadio('envo_mainnews', '0', ((isset($_REQUEST["envo_mainnews"]) && $_REQUEST["envo_mainnews"] == '0') || !isset($_REQUEST["envo_mainnews"])) ? TRUE : FALSE, 'envo_mainnews2');
														// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
														echo $Html -> addLabel('envo_mainnews2', $tl["checkbox"]["chk1"]);
														?>

													</div>
												</div>
											</div>
											<?php if (ENVO_TAGS) { ?>
												<div class="row-form">
													<div class="col-sm-7">

														<?php
														// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
														echo $Html -> addTag('strong', $tlbh["bh_box_content"]["bhbc5"]);
														?>

													</div>
													<div class="col-sm-5">
														<div class="radio radio-success">

															<?php
															// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
															echo $Html -> addRadio('envo_tags', '1', ((isset($_REQUEST["envo_tags"]) && $_REQUEST["envo_tags"] == '1')) ? TRUE : FALSE, 'envo_tags1');
															// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
															echo $Html -> addLabel('envo_tags1', $tl["checkbox"]["chk"]);

															// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
															echo $Html -> addRadio('envo_tags', '0', ((isset($_REQUEST["envo_tags"]) && $_REQUEST["envo_tags"] == '0') || !isset($_REQUEST["envo_tags"])) ? TRUE : FALSE, 'envo_tags2');
															// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
															echo $Html -> addLabel('envo_tags2', $tl["checkbox"]["chk1"]);
															?>

														</div>
													</div>
												</div>
											<?php } ?>
											<div class="row-form">
												<div class="col-sm-7">

													<?php
													// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
													echo $Html -> addTag('strong', $tlbh["bh_box_content"]["bhbc6"]);
													?>

												</div>
												<div class="col-sm-5">
													<div class="radio radio-success">

														<?php
														// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
														echo $Html -> addRadio('envo_search', '1', ((isset($_REQUEST["envo_search"]) && $_REQUEST["envo_search"] == '1')) ? TRUE : FALSE, 'envo_search1');
														// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
														echo $Html -> addLabel('envo_search1', $tl["checkbox"]["chk"]);

														// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
														echo $Html -> addRadio('envo_search', '0', ((isset($_REQUEST["envo_search"]) && $_REQUEST["envo_search"] == '0') || !isset($_REQUEST["envo_search"])) ? TRUE : FALSE, 'envo_search2');
														// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
														echo $Html -> addLabel('envo_search2', $tl["checkbox"]["chk1"]);
														?>

													</div>
												</div>
											</div>
											<div class="row-form">
												<div class="col-sm-7">

													<?php
													// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
													echo $Html -> addTag('strong', $tlbh["bh_box_content"]["bhbc7"]);
													?>

												</div>
												<div class="col-sm-5">
													<div class="radio radio-success">

														<?php
														// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
														echo $Html -> addRadio('envo_sitemap', '1', ((isset($_REQUEST["envo_sitemap"]) && $_REQUEST["envo_sitemap"] == '1')) ? TRUE : FALSE, 'envo_sitemap1');
														// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
														echo $Html -> addLabel('envo_sitemap1', $tl["checkbox"]["chk"]);

														// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
														echo $Html -> addRadio('envo_sitemap', '0', ((isset($_REQUEST["envo_sitemap"]) && $_REQUEST["envo_sitemap"] == '0') || !isset($_REQUEST["envo_sitemap"])) ? TRUE : FALSE, 'envo_sitemap2');
														// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
														echo $Html -> addLabel('envo_sitemap2', $tl["checkbox"]["chk1"]);
														?>

													</div>
												</div>
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
			<div class="tab-pane fade" id="cmsPage2" role="tabpanel">
				<?php $tl["title"]["t14"] = $tlbh["bh_box_title"]["bhbt4"]; ?>

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
								echo $Html -> addTag('h3', $tlbh["bh_box_title"]["bhbt5"], 'box-title');
								?>

							</div>
							<div class="box-body">
								<table class="table table-striped">
									<tr>
										<td>
											<?php if ($setting["adv_editor"]) { ?>
												<div id="cover2">
													<div class="cover-header">

														<?php
														// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
														echo $Html -> addAnchor('../assets/plugins/tinymce/5.3.1/plugins/filemanager/dialog.php?type=2&lang=' . $managerlangTiny . '&fldr=&field_id=htmleditor2', '<i class="fa fa-files-o"></i>', '', 'btn btn-primary btn-xs m-r-10 ifManager', array ('title' => 'Show Filemanager'));
														?>

													</div>
													<div id="editorContainer2">

														<?php
														// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
														echo $Html -> addDiv('', 'htmleditor2');
														?>

													</div>
												</div>

												<?php
												// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
												echo $Html -> addTextarea('envo_contentb', (isset($_REQUEST["envo_contentb"])) ? envo_edit_safe_userpost($_REQUEST["envo_contentb"]) : '', '', '', array ('id' => 'envo_editor2', 'class' => 'form-control hidden'));

											} else {

												// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
												echo $Html -> addTextarea('envo_contentb', (isset($_REQUEST["envo_contentb"])) ? envo_edit_safe_userpost($_REQUEST["envo_contentb"]) : '', '40', '', array ('id' => 'envoEditor2', 'class' => 'form-control envoEditor'));

											} ?>

										</td>
									</tr>
								</table>
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