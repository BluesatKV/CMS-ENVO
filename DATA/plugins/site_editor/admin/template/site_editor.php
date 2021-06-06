<?php include_once APP_PATH . 'admin/template/header.php'; ?>

	<div class="row">
		<div class="col-sm-12">
			<div class="box box-success">
				<div class="box-header with-border">

					<?php
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('h3', $tlsedi["siteedit_sec_title"]["set"], 'box-title');
					?>

				</div>
				<form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
					<div class="box-body">

						<?php
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html -> addTag('p', $tlsedi["siteedit_sec_desc"]["sed"]);
						?>

						<?php
						// Content of file
						$file = APP_PATH . "robots.txt";
						if (file_exists($file)) {
							// File exist, get content
							$content = file_get_contents($file);
						} else {
							// File not exist, create new file
							file_put_contents($file, '');
						}
						?>
						<div class="form-group">

							<?php
							// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
							echo $Html -> addTextarea('envo_file', htmlspecialchars($content), '25', '', array ('id' => 'envo_file', 'class' => 'form-control', 'style' => 'resize: none;', 'placeholder' => $tlsedi["siteedit_placeholder"]["sep"], 'readonly' => 'readonly'));
							?>

						</div>
					</div>
					<div class="box-footer">
						<div class="float-right">

							<?php
							// Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
							echo $Html -> addButton('button', '', $tl["button"]["btn12"], '', 'editfile', 'btn btn-primary', array ('style' => 'margin-right: 10px'));
							// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
							echo $Html -> addButtonSubmit('reset', $tl["button"]["btn11"], '', 'btn btn-primary hidden', array ('style' => 'margin-right: 10px'));
							echo $Html -> addButtonSubmit('save', $tl["button"]["btn1"], '', 'btn btn-success float-right', array ('disabled' => 'disabled'));
							?>

						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>