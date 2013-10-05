<?php
/**
 * Custom functions
 */


function bizstrap_scripts() {
  wp_deregister_style('roots_main');
  wp_deregister_script('roots_scripts');

  // wp_enqueue_style('bizstrap_rs_responsive', get_template_directory_uri() . '/assets/bizstrap/css/rs-responsive.css');
  wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/bizstrap/css/bootstrap.css');
  wp_enqueue_style('bizstrap_custom', get_template_directory_uri() . '/assets/bizstrap/css/custom.css');
  wp_enqueue_style('bizstrap_styler', get_template_directory_uri() . '/assets/bizstrap/css/styler.css');
  wp_enqueue_style('isotope', get_template_directory_uri() . '/assets/bizstrap/css/isotope.css');
  wp_enqueue_style('bizstrap_color_scheme', get_template_directory_uri() . '/assets/bizstrap/css/color_scheme.css');
  wp_enqueue_style('bizstrap_fontapis', 'http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700,700italic');
  wp_enqueue_style('bizstrap_font_awsome', get_template_directory_uri() . '/assets/bizstrap/css/font-awesome.css');
  wp_enqueue_style('bizstrap_font_awsome_ie7', get_template_directory_uri() . '/assets/bizstrap/css/font-awesome-ie7.css');
  // wp_enqueue_style('flexslider', get_template_directory_uri() . '/assets/bizstrap/css/flexslider.css');
  // wp_enqueue_style('fancybox', get_template_directory_uri() . '/assets/bizstrap/css/jquery.fancybox.css');

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


  wp_register_script('bizstrap_custom', get_template_directory_uri() . '/assets/bizstrap/js/custom.js', false, null, false);
  wp_enqueue_script('bizstrap_custom');

}
add_action('wp_enqueue_scripts', 'bizstrap_scripts', 200);


function bizstrap_sidebar_footer_path() {
  return new Roots_Wrapping('templates/sidebar-footer.php');
}

function bizstrap_widgets_init() {
  // Sidebars

  register_sidebar(array(
    'name'          => __('Footer', 'roots'),
    'id'            => 'sidebar-footer',
    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => __('Footer - address', 'roots'),
    'id'            => 'sidebar-footer-address',
    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => __('Footer - about', 'roots'),
    'id'            => 'sidebar-footer-about',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h4 class="content-title">',
    'after_title'   => '</h4>',
  ));

  register_sidebar(array(
    'name'          => __('Footer - navigation', 'roots'),
    'id'            => 'sidebar-footer-navigation',
    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner footer-navigate">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<h4 class="content-title">',
    'after_title'   => '</h4>',
  ));

  // Widgets
  register_widget('Bizstrap_Vcard_Widget');

}
add_action('widgets_init', 'bizstrap_widgets_init');


class Bizstrap_Vcard_Widget extends WP_Widget {
  private $fields = array(
    'title'          => 'Title (optional)',
    'street_address' => 'Street Address',
    'city'           => 'City',
    'postal_code'    => 'Zipcode/Postal Code',
    'country'        => 'Country',
    'phone'          => 'Telephone',
    'fax'            => 'Fax',
    'email'          => 'Email'
  );

  function __construct() {
    $widget_ops = array('classname' => 'widget_bizstrap_vcard', 'description' => __('Użyj widgetu aby wprowadzić adres', 'bizstrap'));

    $this->WP_Widget('widget_bizstrap_vcard', __('Bizstrap vCard', 'bizstrap'), $widget_ops);
    $this->alt_option_name = 'widget_bizstrap_vcard';

    add_action('save_post', array(&$this, 'flush_widget_cache'));
    add_action('deleted_post', array(&$this, 'flush_widget_cache'));
    add_action('switch_theme', array(&$this, 'flush_widget_cache'));
  }

  function widget($args, $instance) {
    $cache = wp_cache_get('widget_bizstrap_vcard', 'widget');

    if (!is_array($cache)) {
      $cache = array();
    }

    if (!isset($args['widget_id'])) {
      $args['widget_id'] = null;
    }

    if (isset($cache[$args['widget_id']])) {
      echo $cache[$args['widget_id']];
      return;
    }

    ob_start();
    extract($args, EXTR_SKIP);

    $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);

    foreach($this->fields as $name => $label) {
      if (!isset($instance[$name])) { $instance[$name] = ''; }
    }

    echo $before_widget;

    if ($title) {
      echo $before_title, $title, $after_title;
    }
  ?>
    <address class="address">
        <p><i class="icon-map-marker icon-large"></i><?php echo $instance['street_address']; ?></p>
        <p><i>&nbsp;</i>
            <?php echo $instance['postal_code']; ?>, <?php echo $instance['city']; ?>
            - <?php echo $instance['country']; ?>
        </p>
        <p><i class="icon-phone icon-large"></i><?php echo $instance['phone']; ?></p>
        <p><i class="icon-print icon-large"></i><?php echo $instance['fax']; ?></p>
        <p>
            <i class="icon-envelope-alt icon-large"></i>
             <a class="email" href="mailto:<?php echo $instance['email']; ?>"><?php echo $instance['email']; ?></a>
        </p>
    </address>
  <?php
    echo $after_widget;

    $cache[$args['widget_id']] = ob_get_flush();
    wp_cache_set('widget_bizstrap_vcard', $cache, 'widget');
  }

  function update($new_instance, $old_instance) {
    $instance = array_map('strip_tags', $new_instance);

    $this->flush_widget_cache();

    $alloptions = wp_cache_get('alloptions', 'options');

    if (isset($alloptions['widget_bizstrap_vcard'])) {
      delete_option('widget_bizstrap_vcard');
    }

    return $instance;
  }

  function flush_widget_cache() {
    wp_cache_delete('widget_bizstrap_vcard', 'widget');
  }

  function form($instance) {
    foreach($this->fields as $name => $label) {
      ${$name} = isset($instance[$name]) ? esc_attr($instance[$name]) : '';
    ?>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id($name)); ?>"><?php _e("{$label}:", 'bizstrap'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id($name)); ?>" name="<?php echo esc_attr($this->get_field_name($name)); ?>" type="text" value="<?php echo ${$name}; ?>">
    </p>
    <?php
    }
  }
}


function bizstrap_breadcrumb() {
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
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
};
