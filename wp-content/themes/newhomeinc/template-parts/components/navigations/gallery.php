<div id="smart-tech-menu-area" class="smart-tech-menu-area">
	<div class="container">
		<div class="smart-tech-inner">
			<?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'gallery',
                        'menu_id'			=> 'smart-tech',
                        'menu-container'	=> 'div',
                        'container_id'    => 'smart-tech-menu',
                        'container' => false,
                        'menu_class'      => 'smart-tech',
                        'fallback_cb' => '',
                        'depth' => 1,
                    )
                );
			?>
		</div>
	</div>
</div>