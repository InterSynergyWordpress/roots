
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
                            <p><span style="color:red; font-size:1.3em;">SZKŁO W ARCHITEKTURZE</span><br /><i class="muted">Rok zał. 1983 r. - firma z doświadczeniem</i></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="span3">
                        <a  class="visible-desktop" style="-webkit-background-size: 100%; -moz-background-size: 100%; background-size: 100%; background-image:url(http://www.msglass.pl/wp/../content/media/2013/10/spsb.jpg); background-repeat: no-repeat; width: 110px; height: 95px; display: block; margin-top: 40px; margin-left:120px;" href="http://www.polskieszyby.pl" target="_blank" rel="nofollow"></a>
                    </div>
                    <div class="span3" id="header-phone-info">
                        <?php dynamic_sidebar('sidebar-header-info'); ?>
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
