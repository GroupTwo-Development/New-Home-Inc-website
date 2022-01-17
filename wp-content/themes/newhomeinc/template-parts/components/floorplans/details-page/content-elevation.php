
<?php $elevation_image = get_field('elevation_image'); ?>

<div id="elevation" class="accordion-item location elevation-gallery">
	<h2 class="accordion-header" id="headingseven">
		<button class="accordion-button collapsed btn-text" type="button" data-bs-toggle="collapse" data-bs-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
			<span class="accordion-title">Elevation</span>
		</button>
	</h2>
	<div id="collapseseven" class="accordion-collapse collapse" aria-labelledby="headingseven" data-bs-parent="#mainDetailAccordionComponent">
		<div class="accordion-body">
			<header class="accord-header-area">
				<h2> Elevation</h2>
			</header>
			<div class="elevation-component">
				<div class="row">
					<div class="col-lg-12">
						<div class="elevation-gallery-area pt-2 pb-3 text-center">
							<div class="flex flex-wrap gap-5 justify-center max-w-5xl mx-auto px-6 elevation-gallery-item">
								<?php  foreach ($elevation_image as $single_image) : ?>
									<a data-fancybox="gallery" href="<?php echo esc_url($single_image['url']); ?>">
										<img class="img-fluid" src="<?php echo esc_url($single_image['sizes']['thumbnail']); ?>"  alt="<?php echo $single_image['alt']; ?>"/>
									</a>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>