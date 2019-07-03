<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
?>
<section id="footer">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4 footer-menu-col">
                <h3>Links</h3>
                <?php wp_nav_menu(
                    array(
                        'theme_location'  => 'footer-menu',
                        'container_class' => 'footer-menu-wrapper',
                        'container_id'    => '',
                        'menu_class'      => '',
                        'fallback_cb'     => '',
                        'menu_id'         => 'footer-menu',
                    )
                ); ?>
            </div>
            <div class="col-12 col-sm-6 col-md-4 contact-details-col">
                <h3>Contact Us</h3>
                <ul class="contacts">
                    <li><span class="fa fa-phone"></span><a href="tel:<?=formatPhoneNumber(get_option('phone'))?>"><?=get_option('phone')?></a></li>
                    <li><span class="fa fa-mobile"></span><a href="tel:<?=formatPhoneNumber(get_option('mobile'))?>"><?=get_option('mobile')?></a></li>
                    <li><span class="fa fa-envelope"></span><a href="mailto:<?=get_option('email')?>"><?=get_option('email')?></a></li>
                </ul>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <h3>Follow Us</h3>
                <?=socialMediaMenu()?>
            </div>
        </div>
    </div>
</section>
<section id="copyright">
    <div class="container">
        <div class="col-12">
            <p>Copyright <?=get_bloginfo('name')?>. <span>Website by <a href="https://www.designgarage.co.nz/" target="_blank">Design Garage</a></span></p>
        </div>
    </div>
</section>
<?php wp_footer(); ?>
</body>
</html>

