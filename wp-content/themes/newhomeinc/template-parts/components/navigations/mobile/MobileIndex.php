<nav id="mobile-navbar" class="navbar-expand fixed-top mobile-navbar">

        <div class="mobile-navbar-component">
            <div class="navbar-brand mobile-navbar-component-brand">
	            <?php if(function_exists('the_custom_logo')){
		            the_custom_logo();
	            }; ?>
            </div>
            <div class="mobile-navbar-component-toggle">
                <button type="button" class="hamburger hamburger--collapse navbar-toggle navbar-toggle-right open-menu" data-bs-toggle="offcanvas" href="#mobiletoggle" aria-controls="mobiletoggle">
                  <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                  </span>
                </button>
            </div>
        </div>

</nav>

<div  class="offcanvas offcanvas-start" tabindex="-1" id="mobiletoggle" aria-labelledby="mobiletoggle">
    <div class="offcanvas-container">
		<?php
            wp_nav_menu(
                array(
                    'theme_location' => 'menu-1',
                    'menu_id'			=> 'primary-menu',
                    'menu-container'	=> 'div',
                    'container_id'    => 'bs-example-navbar-collapse-1',
                    'container' => false,
                    'menu_class'      => 'navbar-nav mr-auto',
                    'fallback_cb' => '__return_false',
                    'items_wrap' => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
                    'depth' => 2,
                    'walker' => new bootstrap_5_wp_nav_menu_walker()
                )
            );
		?>
    </div>
</div>


