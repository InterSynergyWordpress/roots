
        <div id="over">
        <div id="out_container" class="boxed">

        <div class="top_line"></div>

        <header>

            <div class="container">
                <div class="row">

                    <div class="span4 logo">
                        <a class="logo" href="<?php echo home_url(); ?>">
                            <img alt="logo" title="<?php bloginfo('name'); ?>" src="/assets/img/logo.png">
                        </a>
                    </div>
                    <div class="span4 offset4">

                        <p class="head_phone"><a href="tel:555-555-5555">(800) 655-7800</a></p>
                    </div>

                    <ul class="socials unstyled">
                        <li><a class="flickr" href="#"></a></li>
                        <li><a class="twitter" href="#"></a></li>
                        <li><a class="facebook" href="#"></a></li>
                        <li><a class="youtube" href="#"></a></li>
                        <li><a class="dribbble" href="#"></a></li>
                        <li><a class="pinterest" href="#"></a></li>
                        <li><a class="linkedin" href="#"></a></li>
                        <li><a class="google_plus" href="#"></a></li>
                    </ul>
                </div>
            </div>

            <div class="container">
                <div class="navbar" role="navigation">
                    <div class="navbar-inner">
                        <div class="container">
                            <div class="buttons-container">
                            </div>
                            <nav class="nav-collapse">
                              <?php
                                if (has_nav_menu('primary_navigation')) :
                                  wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav nav-pills'));
                                endif;
                              ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
