<nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
    <div class="container">
        <div class="navbar-main-menu">
            <div class="navbar-brand">
                <?php
                    if(function_exists('the_custom_logo')){
                        the_custom_logo();
                    };
                ?>
            </div>
            <div class="desktop-menu-element" id="navbarNavAltMarkup">
                <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'menu_id'			=> 'primary-menu',
                            'menu-container'	=> 'div',
                            'container_id'    => 'bs-example-navbar-collapse-1',
                            'container' => false,
                            'menu_class'      => 'nav-item mx-0 mx-lg-1',
                            'fallback_cb' => '__return_false',
                            'items_wrap' => '<ul id="%1$s" class="navbar-nav ms-auto %2$s">%3$s</ul>',
                            'depth' => 2,
                            'walker' => new bootstrap_5_wp_nav_menu_walker()
                        )
                    );
                ?>
            </div>
        </div>
    </div>
</nav>
