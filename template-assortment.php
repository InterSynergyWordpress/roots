<?php
/*
Template Name: Assortment
*/
?>

<?php get_template_part('templates/page', 'header'); ?>
<?php while (have_posts()) : the_post(); ?>
<div class="row-fluid">
<?php
    if ( has_post_thumbnail() ) {
        echo '<span class="span4">';
        $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');
        echo '<a href="' . $large_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" class="thumbnail">';
        echo get_the_post_thumbnail($post->ID, 'assortment');
        echo '</a>';
        echo '</span>';
        echo '<span class="span8 text-justify">';
    } else {
        echo '<span>';
    }
?>
  <?php the_content(); ?>
    </span>
  <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
</div>
<?php endwhile; ?>
