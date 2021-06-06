<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php
// EN: The data was successfully stored in DB
// CZ: Data byla úspěšně uložena do DB
if ($page4 == "s") { ?>
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
if ($page4 == "e") { ?>
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
					if (isset($errors["e4"])) echo $errors["e4"];?>'
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
			echo $Html -> addAnchor('index.php?p=faq&sp=categories', $tl["button"]["btn19"], '', 'btn btn-info button');
			?>

		</div>

		<!-- Form Content -->
		<div class="row tab-content-singel">
			<div class="col-sm-8">
				<div class="box box-success">
					<div class="box-header with-border">

						<?php
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html -> addTag('h3', $tlf["faq_box_title"]["faqbt5"], 'box-title');
						?>

					</div>
					<div class="box-body">
						<div class="block">
							<div class="block-content">
								<div class="row-form">
									<div class="col-sm-5">

										<?php
										// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
										echo $Html -> addTag('strong', $tlf["faq_box_content"]["faqbc14"]);
										echo $Html -> addTag('span', '*', 'star-item text-danger-800 m-l-10');
										?>

									</div>
									<div class="col-sm-7">
										<div class="form-group m-0<?php if (isset($errors["e1"])) echo " has-error"; ?>">

											<?php
											// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
											echo $Html -> addInput('text', 'envo_name', $ENVO_FORM_DATA["name"], 'envo_name', 'form-control');
											?>

										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-sm-5">

										<?php
										// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
										// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
										echo $Html -> addTag('strong', $tlf["faq_box_content"]["faqbc15"]);
										echo $Html -> addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array ('data-content' => $tlf["faq_help"]["faqh3"], 'data-original-title' => $tlf["faq_help"]["faqh"]));
										echo $Html -> addTag('span', '*', 'star-item text-danger-800 m-l-10');
										?>

									</div>
									<div class="col-sm-7">
										<div class="form-group<?php if ($errors["e2"] || $errors["e3"] || $errors["e4"]) echo " has-error"; ?>">

											<?php
											// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
											echo $Html -> addInput('text', 'envo_varname', $ENVO_FORM_DATA["varname"], 'envo_varname', 'form-control');
											?>

										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-sm-5">

										<?php
										// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
										echo $Html -> addTag('strong', $tlf["faq_box_content"]["faqbc16"]);
										?>

									</div>
									<div class="col-sm-7">

										<?php
										// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
										echo $Html -> addTextarea('envo_lcontent', envo_edit_safe_userpost($ENVO_FORM_DATA["content"]), '4', '', array ('id' => 'content', 'class' => 'form-control'));
										?>

									</div>
								</div>
								<div class="row-form">
									<div class="col-sm-5">

										<?php
										// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
										echo $Html -> addTag('strong', $tlf["faq_box_content"]["faqbc17"]);
										?>

									</div>
									<div class="col-sm-7">
										<div class="radio radio-success">

											<?php
											// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
											echo $Html -> addRadio('envo_active', '1', ($ENVO_FORM_DATA["active"] == '1') ? TRUE : FALSE, 'envo_active1');
											// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
											echo $Html -> addLabel('envo_active1', $tl["checkbox"]["chk"]);

											// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
											echo $Html -> addRadio('envo_active', '0', ($ENVO_FORM_DATA["active"] == '0') ? TRUE : FALSE, 'envo_active2');
											// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
											echo $Html -> addLabel('envo_active2', $tl["checkbox"]["chk1"]);
											?>

										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-sm-5">

										<?php
										// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
										echo $Html -> addTag('strong', $tlf["faq_box_content"]["faqbc18"]);
										?>

									</div>
									<div class="col-sm-7">
										<div class="input-group">
                      <span class="input-group-prepend">
                        <button class="btn btn-default iconpicker" data-placement="top"></button>
                      </span>

											<?php
											// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
											echo $Html -> addInput('text', 'envo_img', $ENVO_FORM_DATA["catimg"], 'envo_img', 'form-control text-center');
											?>

											<span class="input-group-append">
                        <button class="btn btn-default iconpicker1" data-placement="top"></button>
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
			<div class="col-sm-4">
				<div class="box box-success">
					<div class="box-header with-border">

						<?php
						// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
						echo $Html -> startTag('h3', array ('class' => 'box-title'));
						echo $tlf["faq_box_title"]["faqbt8"];
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
										<select name="envo_permission[]" multiple="multiple" class="form-control">

											<?php
											// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
											$selected = ($ENVO_FORM_DATA["permission"] == '0') ? TRUE : FALSE;

											echo $Html -> addOption('0', $tlf["faq_box_content"]["faqbc13"], $selected);
											if (isset($ENVO_USERGROUP) && is_array($ENVO_USERGROUP)) foreach ($ENVO_USERGROUP as $v) {

												$selected = (in_array($v["id"], explode(',', $ENVO_FORM_DATA["permission"]))) ? TRUE : FALSE;
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
	</form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>