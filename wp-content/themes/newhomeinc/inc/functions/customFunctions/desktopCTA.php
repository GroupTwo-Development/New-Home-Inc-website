<?php
	function desktop_Cta($phone_number_field){
		$phone_number = get_field($phone_number_field, 'option');
		?>
			<div id="desktop-cta" class="desktop-cta">
				<div class="desktop-cta-container">
					<div class="desktop-cta-elements">
<!--						<ul class="desktop-cta-items">-->
<!---->
<!--							<li class="desktop-cta-call">-->
<!--                                --><?php //if ($phone_number) : ?>
<!--								    <a href="tel:--><?php //echo $phone_number; ?><!--">-->
<!--                                    --><?php //else : ?>
<!--                                    <a href="#">-->
<!--                                --><?php //endif ?>
<!--									--><?php //echo $phone_number; ?>
<!--								</a>-->
<!--							</li>-->
<!--						</ul>-->
					</div>
				</div>
			</div>
		<?php
	}
