<?php
if(is_page('realizacje') || '15' == $post->post_parent) :

    dynamic_sidebar('sidebar-realizacje');

elseif(is_page('asortyment') || '13' == $post->post_parent):

    dynamic_sidebar('sidebar-asortyment');

elseif(is_page() && !is_page_template('template-blog.php')):

    dynamic_sidebar('sidebar-secondary');

else:

    dynamic_sidebar('sidebar-primary');

endif;
?>
