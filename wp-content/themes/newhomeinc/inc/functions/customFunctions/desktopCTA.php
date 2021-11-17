<?php
	function desktop_Cta($phone_number_field){
		$phone_number = get_field($phone_number_field, 'option');
		?>
			<div id="desktop-cta" class="desktop-cta">
				<div class="desktop-cta-container">
					<div class="desktop-cta-icon">
						<i><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"><circle cx="20" cy="20" r="20" fill="#fff"/><path d="M12.922.563A12.922,12.922,0,1,0,25.844,13.485,12.92,12.92,0,0,0,12.922.563Zm4.168,8.754a1.667,1.667,0,1,1-1.667,1.667A1.666,1.666,0,0,1,17.091,9.316Zm-8.337,0a1.667,1.667,0,1,1-1.667,1.667A1.666,1.666,0,0,1,8.754,9.316ZM18.9,18.185a7.784,7.784,0,0,1-11.963,0,.834.834,0,0,1,1.282-1.068,6.122,6.122,0,0,0,9.4,0A.834.834,0,0,1,18.9,18.185Z" transform="translate(7 6.438)" fill="#fc4f00"/></svg>
						</i>
					</div>
					<div class="desktop-cta-elements">
						<ul class="desktop-cta-items">
							<li class="desktop-cta-ask">
								<a href="">
									<span>Ask A Question</span>
								</a>
							</li>
							<li class="desktop-cta-call">
                                <?php if ($phone_number) : ?>
								    <a href="tel:<?php echo $phone_number; ?>">
                                    <?php else : ?>
                                    <a href="#">
                                <?php endif ?>
									<?php echo $phone_number; ?>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		<?php
	}
