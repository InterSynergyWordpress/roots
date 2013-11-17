
        <footer id="footer" role="contentinfo">
            <div class="footer-top"></div>
            <div class="footer-wrapper">
                <div class="container">
                    <div class="row show-grid">
                        <div class="span12">
                            <div class="row show-grid">

                                <div class="span4 footer-address">
                                    <img alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" class="footer-logo" src="/assets/img/logo2.png" />
                                    <?php dynamic_sidebar('sidebar-footer-address'); ?>
                                </div>

                                <div class="span4 footer-center hidden-phone">
                                    <?php dynamic_sidebar('sidebar-footer-about'); ?>
                                </div>

                                <div class="span4 footer-right">
                                    <?php dynamic_sidebar('sidebar-footer-navigation'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row show-grid">
                        <div class="span8 hidden-phone">
                            <p>Copyright &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> - All Rights Reserved.</p>
                        </div>
                        <div class="span4 pagination-right">
                            <p>
                                Designed & made by: &nbsp;
                                <a href="http://www.intersynergy.pl" target="_blank" title="consulting it - łódź">
                                    <img alt="InterSynergy" title="consulting it" width="142px" src="/assets/img/intersynergy-white.png" />
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>


<?php wp_footer(); ?>

    </div>
    </div>
