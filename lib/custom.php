<?php
/**
 * Custom functions
 */


function bizstrap_scripts() {
  wp_deregister_style('roots_main');
  wp_deregister_script('roots_scripts');

  wp_enqueue_style('rs-plugin', get_template_directory_uri() . '/assets/bizstrap/plugins/rs-plugin/css/settings.css');
  wp_enqueue_style('bizstrap_rs_responsive', get_template_directory_uri() . '/assets/bizstrap/css/rs-responsive.css');
  wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/bizstrap/css/bootstrap.css');
  wp_enqueue_style('bizstrap_custom', get_template_directory_uri() . '/assets/bizstrap/css/custom.css');
  wp_enqueue_style('bizstrap_styler', get_template_directory_uri() . '/assets/bizstrap/css/styler.css');
  wp_enqueue_style('isotope', get_template_directory_uri() . '/assets/bizstrap/css/isotope.css');
  wp_enqueue_style('bizstrap_color_scheme', get_template_directory_uri() . '/assets/bizstrap/css/color_scheme.css');
  wp_enqueue_style('bizstrap_fontapis', 'http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700,700italic');
  wp_enqueue_style('bizstrap_font_awsome', get_template_directory_uri() . '/assets/bizstrap/css/font-awesome.css');
  wp_enqueue_style('bizstrap_font_awsome_ie7', get_template_directory_uri() . '/assets/bizstrap/css/font-awesome-ie7.css');
  wp_enqueue_style('flexslider', get_template_directory_uri() . '/assets/bizstrap/css/flexslider.css');
  wp_enqueue_style('fancybox', get_template_directory_uri() . '/assets/bizstrap/css/jquery.fancybox.css');

  wp_enqueue_style('intersynergy', get_template_directory_uri() . '/assets/css/intersynergy.css');

  wp_deregister_script('jquery');
  wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js', false, null, false);

  wp_register_script('jquery_ui', get_template_directory_uri() . '/assets/bizstrap/js/jquery-ui.min.js', false, null, false);
  wp_enqueue_script('jquery_ui');

  wp_register_script('bootstrap', get_template_directory_uri() . '/assets/bizstrap/js/bootstrap.js', false, null, false);
  wp_enqueue_script('bootstrap');

  wp_register_script('style_switcher', get_template_directory_uri() . '/assets/bizstrap/js/style-switcher/style-switcher.js', false, null, false);
  wp_enqueue_script('style_switcher');

  wp_register_script('flexslider', get_template_directory_uri() . '/assets/bizstrap/js/jquery.flexslider-min.js', false, null, false);
  wp_enqueue_script('flexslider');

  wp_register_script('isotope', get_template_directory_uri() . '/assets/bizstrap/js/jquery.isotope.js', false, null, false);
  wp_enqueue_script('isotope');

  wp_register_script('fancybox', get_template_directory_uri() . '/assets/bizstrap/js/jquery.fancybox.pack.js', false, null, false);
  wp_enqueue_script('fancybox');

  wp_register_script('rs-plugin', get_template_directory_uri() . '/assets/bizstrap/plugins/rs-plugin/js/jquery.themepunch.plugins.min.js', false, null, false);
  wp_enqueue_script('rs-plugin');


  wp_register_script('rs-plugin-revolution', get_template_directory_uri() . '/assets/bizstrap/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js', false, null, false);
  wp_enqueue_script('rs-plugin-revolution');

  wp_register_script('rs-plugin-revolution-c', get_template_directory_uri() . '/assets/bizstrap/js/revolution.custom.js', false, null, false);
  wp_enqueue_script('rs-plugin-revolution-c');

  wp_register_script('bizstrap_custom', get_template_directory_uri() . '/assets/bizstrap/js/custom.js', false, null, false);
  wp_enqueue_script('bizstrap_custom');

}
add_action('wp_enqueue_scripts', 'bizstrap_scripts', 200);


function bizstrap_widgets_init() {
  // Sidebars
  register_sidebar(array(
    'name'          => __('Primary', 'roots'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
  ));

  register_sidebar(array(
    'name'          => __('Footer', 'roots'),
    'id'            => 'sidebar-footer',
    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
  ));

  // Widgets
  register_widget('Roots_Vcard_Widget');
}
add_action('widgets_init', 'bizstrap_widgets_init');


function bizstrap_breadcrumb() {
    echo '<div id="breadcrumb"><ul>';
    if (!is_home()) {
        echo '<li class="home"><a href="';
        echo get_option('home');
        echo '">';
        echo 'Home';
        echo "</a></li>";

        if (is_category() || is_single()) {
            echo '<li>';
            the_category(' </li><li> ');
            if (is_single()) {
                echo "</li><li>";
                the_title();
                echo '</li>';
            }
        } elseif (is_page()) {
            echo '<li>';
            echo the_title();
            echo '</li>';
        }
    }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog                 Archives"; echo'</li>';}
    elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
    echo '</ul></div>';
};
