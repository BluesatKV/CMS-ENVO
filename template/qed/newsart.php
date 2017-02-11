<?php include_once APP_PATH . 'template/' . $jkv["sitestyle"] . '/header.php'; ?>

<?php if (!$PAGE_ACTIVE) { ?>
	<div class="alert bg-danger">
		<?php echo $tl["errorpage"]["ep"]; ?>
	</div>
<?php }
if (JAK_ASACCESS) {
	$apedit  = BASE_URL . 'admin/index.php?p=news&amp;sp=edit&amp;id=' . $PAGE_ID;
	$qapedit = BASE_URL . 'admin/index.php?p=news&amp;sp=quickedit&amp;id=' . $PAGE_ID;
} ?>

	<section>
		<div class="container-fluid">
			<div class="row">
				<article class="post box mb">
					<div class="feature-box media-left">
						<?php if ($SHOWDATE) { ?>
							<div class="post-date">
								<?php
								//set locale,
								setlocale(LC_ALL,$site_locale);
								//set the date to be converted
								$mydate = $DATE_TIME;
								//convert date to month name
								$month_name =  ucfirst(strftime("%B", strtotime($mydate)));
								?>
								<span class="date-day"><?php echo date("d",strtotime($mydate)); ?></span>
								<span class="date-month"><?php echo $month_name; ?></span>
							</div>
						<?php } ?>
						<div class="feature-box-content">
							<?php if ($SHOWTITLE) { ?>
								<h3><?php echo $PAGE_TITLE; ?></h3>
							<?php } ?>
							<?php if ($SHOWDATE || $SHOWHITS) { ?>
								<ul class="list-unstyled list-inline">
									<!-- Show Date -->
									<?php if ($SHOWDATE) { ?>
										<li style="font-size: 80%; font-weight: 700"><i class="icon-calendar"></i>
											<time datetime="<?php echo $PAGE_TIME_HTML5; ?>"><?php echo $PAGE_TIME; ?></time>
										</li>
									<?php } ?>
									<!-- Show Hits -->
									<?php if ($SHOWHITS) { ?>
										<li style="font-size: 80%; font-weight: 700"><i class="icon-eye"></i> <?php echo $tl["news"]["news2"] . ' ' . $PAGE_HITS; ?></li>
									<?php } ?>
								</ul><!-- .entry-meta end -->
							<?php } ?>

							<?php if ($JAK_TAGLIST) { ?>
								<ul class="entry-meta">
									<?php echo JAK_tags::jakGettaglist_class ($page2, JAK_PLUGIN_ID_NEWS, JAK_PLUGIN_VAR_TAGS, 'tips'); ?>
								</ul>
							<?php } ?>

							<?php echo $PAGE_CONTENT; ?>

							<?php if ($SHOWSOCIALBUTTON) { ?>
								<div class="col-md-12">
									<hr>
									<div class="pull-right" style="display: table;">
										<div style="display: table-cell;vertical-align: middle;/*! margin-right: 20px; */padding-right: 20px;">
											<strong><?php echo $tl["share"]["share1"] . ' '; ?></strong>
										</div>
										<div id="sollist-sharing"></div>
									</div>
								</div>
							<?php } ?>

							<?php if (isset($JAK_HOOK_PAGE) && is_array ($JAK_HOOK_PAGE)) foreach ($JAK_HOOK_PAGE as $hpage) {
								include_once APP_PATH . $hpage["phpcode"];
							}

							if (isset($JAK_PAGE_GRID) && is_array ($JAK_PAGE_GRID)) foreach ($JAK_PAGE_GRID as $pg) {
								// Load contact form
								if ($pg["pluginid"] == '9997' && $JAK_SHOW_C_FORM) {
									include_once APP_PATH . 'template/' . $jkv["sitestyle"] . '/contact.php';
								}

								// Load News Grid
								if (isset($JAK_HOOK_NEWS_GRID) && is_array ($JAK_HOOK_NEWS_GRID)) foreach ($JAK_HOOK_NEWS_GRID as $hpagegrid) {
									eval($hpagegrid["phpcode"]);
								}
							} ?>
						</div>
					</div>

				</article>
			</div>
		</div>
	</section>

	<section class="pt-small pb-small">
		<div class="container-fluid">
			<div class="row">
				<ul class="pager">
					<?php if ($JAK_NAV_PREV) { ?>
						<li class="previous">
							<a href="<?php echo $JAK_NAV_PREV; ?>">
								<i class="fa fa-arrow-left"></i> <?php echo $JAK_NAV_PREV_TITLE; ?>
							</a>
						</li>
					<?php }
					if ($JAK_NAV_NEXT) { ?>
						<li class="next">
							<a href="<?php echo $JAK_NAV_NEXT; ?>">
								<?php echo $JAK_NAV_NEXT_TITLE; ?> <i class="fa fa-arrow-right"></i>
							</a>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</section>

<?php include_once APP_PATH . 'template/' . $jkv["sitestyle"] . '/footer.php'; ?>