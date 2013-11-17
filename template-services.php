<?php
/*
Template Name: Services
*/
?>

<?php get_template_part('templates/page', 'header'); ?>
<?php while (have_posts()) : the_post(); ?>
<div class="row-fluid">
    <div class="span6">
        <?php the_content(); ?>
    </div>
    <div class="span5 offset1">
        <?php dynamic_sidebar('sidebar-quality'); ?>
    </div>
</div>
<?php endwhile; ?>
