<?php
/*
Template Name: Contact
*/
?>

<div class="clear_both"></div>
<div class="col-wrapper">


    <div class="row">

        <div class="contact-form span7 hidden-phone">
        <?php echo do_shortcode('[contact-form-7 id="202" title="Formularz kontaktowy"]'); ?>
        </div>

        <div class="contact-info span4 offset1">
            <?php dynamic_sidebar('sidebar-address'); ?>
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
            <?php dynamic_sidebar('sidebar-houres'); ?>
        </div>

    </div>

</div>

<?php echo do_shortcode('[google-map-v3 width="100%" height="350" zoom="16" maptype="roadmap" mapalign="center" directionhint="false" language="pl" poweredby="false" maptypecontrol="false" pancontrol="false" zoomcontrol="true" scalecontrol="false" streetviewcontrol="true" scrollwheelcontrol="false" draggable="true" tiltfourtyfive="false" addmarkermashupbubble="true" addmarkermashupbubble="true" addmarkerlist="Wawelska 7, Łódź{}star-3.png" bubbleautopan="true" showbike="false" showtraffic="false" showpanoramio="false"]'); ?>

