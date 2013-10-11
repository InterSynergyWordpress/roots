
        <div id="over">
        <div id="out_container" class="boxed">

        <div class="top_line"></div>

        <header>

            <div class="container">
                <div class="row">

                    <div class="span6 logo">
                        <a class="logo pull-left" href="<?php echo home_url(); ?>">
                            <img alt="logo" title="<?php bloginfo('name'); ?>" src="/assets/img/logo.png">
                        </a>
                        <div class="visible-desktop logo-tagline">
                            <p>MSGlass - SZKŁO W ARCHITEKTURZE<br /><i class="muted">Rok zał. 1983 r. - firma z tradycjami</i></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="span3 offset3">
                        <p class="head_phone"><a href="tel:+48 660 45 44 47">+48 660 45 44 47</a></p>
                    </div>

                    <ul class="socials unstyled">
                    <?php if(class_exists(Simple_Social_Icons_Widget)) :
                                dynamic_sidebar('sidebar-social');
                        else: ?>
                        <li><a class="flickr" href="#"></a></li>
                        <li><a class="twitter" href="#"></a></li>
                        <li><a class="facebook" href="#"></a></li>
                        <li><a class="youtube" href="#"></a></li>
                        <li><a class="dribbble" href="#"></a></li>
                        <li><a class="pinterest" href="#"></a></li>
                        <li><a class="linkedin" href="#"></a></li>
                        <li><a class="google_plus" href="#"></a></li>
                    <?php endif; ?>
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
