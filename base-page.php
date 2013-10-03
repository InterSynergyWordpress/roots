<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 8]><div class="alert alert-warning"><?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?></div><![endif]-->

  <?php
    do_action('get_header');
    // Use Bootstrap's navbar if enabled in config.php
    if (current_theme_supports('bootstrap-top-navbar')) {
      get_template_part('templates/header-top-navbar');
    } else {
      get_template_part('templates/header');
    }
  ?>

        <div class="main-content <?php echo roots_main_class(); ?>" role="document">
            <div class="container">
                <div class="row show-grid">
                    <div class="span12">

                        <?php bizstrap_breadcrumb(); ?>
                        <div class="row show-grid clear-both">

                            <div id="left-sidebar" class="span3 sidebar <?php echo roots_sidebar_class(); ?>" role="complementary">
                                <div class="side-nav sidebar-block">
                                  <?php if (roots_display_sidebar()) : ?>
                                    <aside>
                                      <?php include roots_sidebar_path(); ?>
                                    </aside>
                                  <?php endif;   ?>
                                </div>
                            </div>

                            <div class="span9 main-column two-columns-left <?php echo roots_main_class(); ?>" role="main">
                                <article>
                                    <?php include roots_template_path(); ?>
                                </article>
                            </div>
                        <div>

                    </div>
                </div>
            </div>
        </div>

  <?php get_template_part('templates/footer'); ?>

</body>
</html>
