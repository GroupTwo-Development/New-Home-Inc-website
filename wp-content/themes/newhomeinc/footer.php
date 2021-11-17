<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package New_Home_Inc
 */

?>

<!-- Progress Scroll Circle -->

<?php
    $footer_logo = get_field('footer_logo', 'option');
    $footer_phone_number = get_field('footer_phone_number', 'option');
    $formatted_phone_number = preg_replace("/^(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $footer_phone_number);

    $footer_address_group = get_field('footer_address', 'option');
    $footer_address_one = $footer_address_group['footer_address1'];
    $footer_address_city = $footer_address_group['footer_address_city'];
    $footer_address_state = $footer_address_group['footer_address_state'];
    $footer_address_zipcode = $footer_address_group['footer_address_zipcode'];
     $footer_address_two = $footer_address_city  .' '. $footer_address_state  . ', ' . $footer_address_zipcode;


?>
	<footer id="colophon" class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="site-footer-logo">
                        <img class="lozad"  data-src="<?php echo $footer_logo['url']; ?>" alt="<?php echo $footer_logo['alt']; ?>">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="site-footer-phone-area">
                        <a href="tel:<?php echo $footer_phone_number; ?>"><?php echo $formatted_phone_number; ?></a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="site-footer-address-area">
                        <ul class="address-item">
                            <li class="street-address"><span><?php echo $footer_address_one; ?></span></li>
                            <li class="address-city-state"><span><?php echo esc_html($footer_address_two); ?></span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="site-footer-social-media">
	                    <?php if( have_rows('footer_social_media', 'option') ): ?>
                            <ul class="site-footer-social-item">
			                    <?php while( have_rows('footer_social_media', 'option') ): the_row();
				                    $icon = get_sub_field('social_icon');
				                    $social_media_url = get_sub_field('social_media_url');
				                    ?>
                                    <li>
                                        <a href="<?php echo $social_media_url; ?>"><i class="<?php echo $icon ?>"></i></a>
                                    </li>
			                    <?php endwhile; ?>
                            </ul>
	                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copy-right-area">
            <div class="container">
                <ul class="footer-copy-right-list">
                    <li class="eho-builder">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15.477" viewBox="0 0 15 15.477"><path d="M10.343,6.8H9.3V5.394L15.757,1.5l6.668,3.95L22.4,6.837h-1v4.815H10.376Zm1.331,3.617,8.354-.022V5.605l-4.3-2.563L11.674,5.55Z" transform="translate(-8.79 -1.5)" fill="#fff"/><g transform="translate(0 10.906)"><g transform="translate(0)"><path d="M4.7,101.8v-1.7h.832v.266h-.51v.422H5.5v.266H5.022v.5h.533v.266H4.7Z" transform="translate(-4.7 -100.067)" fill="#fff"/><path d="M14.9,101.387c-.178,0-.2-.189-.2-.61s.022-.621.2-.621.2.189.2.621S15.077,101.387,14.9,101.387Zm.643-.022H15.41a1.345,1.345,0,0,0-.155.055h0a.8.8,0,0,0,.189-.643c0-.444,0-.876-.521-.876s-.521.433-.521.876c0,.588.055.865.533.865.055,0,.133-.011.189-.011h.455v-.266Z" transform="translate(-13.324 -99.889)" fill="#fff"/><path d="M26.843,100.1v1.209a.481.481,0,0,1-.521.521.468.468,0,0,1-.521-.521v-1.2h.322v1.176c0,.211.078.288.2.288.144,0,.2-.1.2-.288v-1.176h.322Z" transform="translate(-23.459 -100.067)" fill="#fff"/><path d="M37.366,101.165h-.3l.144-.732h0Zm-.455.632L37,101.42h.433l.089.377h.333l-.411-1.7h-.422l-.422,1.7Z" transform="translate(-33.061 -100.067)" fill="#fff"/><path d="M49.3,101.8v-1.7h.322v1.42H50.1v.277Z" transform="translate(-44.352 -100.067)" fill="#fff"/><path d="M66.888,100.877V100.2h.322v1.7h-.322v-.754h-.366v.754H66.2v-1.7h.322v.677Z" transform="translate(-59.377 -100.156)" fill="#fff"/><path d="M78.221,101.4c-.178,0-.2-.189-.2-.621s.022-.621.2-.621.2.189.2.621S78.41,101.4,78.221,101.4Zm0,.255c.521,0,.521-.433.521-.876s0-.876-.521-.876-.521.433-.521.876S77.7,101.653,78.221,101.653Z" transform="translate(-69.601 -99.889)" fill="#fff"/><path d="M90.443,100.1v1.209a.481.481,0,0,1-.521.521.468.468,0,0,1-.521-.521v-1.2h.322v1.176c0,.211.078.288.2.288.144,0,.2-.1.2-.288v-1.176h.322Z" transform="translate(-80.003 -100.067)" fill="#fff"/><path d="M101.246,101.653c-.4,0-.466-.255-.455-.555h.322c0,.166.011.3.178.3.111,0,.155-.078.155-.189,0-.311-.643-.322-.643-.832,0-.266.111-.477.5-.477.311,0,.466.155.444.51h-.311c0-.122-.022-.255-.144-.255a.16.16,0,0,0-.166.178c0,.322.643.288.643.832C101.779,101.6,101.49,101.653,101.246,101.653Z" transform="translate(-90.129 -99.889)" fill="#fff"/><path d="M111.7,101.8v-1.7h.322v1.7Z" transform="translate(-99.829 -100.067)" fill="#fff"/><path d="M117.1,101.8v-1.7h.433l.411,1.176h0V100.1h.3v1.7h-.422l-.422-1.243h0V101.8Z" transform="translate(-104.63 -100.067)" fill="#fff"/><path d="M130.221,100.355c0-.155-.022-.3-.189-.3-.2,0-.2.3-.2.632,0,.533.044.621.233.621a.354.354,0,0,0,.155-.033V100.9h-.178v-.266h.488v.865a2.287,2.287,0,0,1-.433.055c-.533,0-.6-.244-.6-.888,0-.433.022-.865.544-.865a.466.466,0,0,1,.488.555Z" transform="translate(-115.654 -99.8)" fill="#fff"/><path d="M5.532,123.986c-.211,0-.244-.222-.244-.743s.022-.743.244-.743.244.222.244.743S5.743,123.986,5.532,123.986Zm0,.3c.632,0,.632-.51.632-1.043s0-1.043-.632-1.043-.632.51-.632,1.043S4.911,124.286,5.532,124.286Z" transform="translate(-4.878 -119.715)" fill="#fff"/><path d="M19.388,122.711h.189c.166,0,.211.144.211.311,0,.133-.078.266-.189.266h-.211ZM19,124.43h.377v-.821h.288c.444,0,.51-.366.51-.6,0-.366-.133-.61-.488-.61H19Z" transform="translate(-17.413 -119.893)" fill="#fff"/><path d="M31.988,122.711h.189c.166,0,.211.144.211.311,0,.133-.078.266-.189.266h-.211Zm-.377,1.72h.377v-.821h.277c.444,0,.51-.366.51-.6,0-.366-.133-.61-.488-.61H31.6v2.03Z" transform="translate(-28.616 -119.893)" fill="#fff"/><path d="M44.732,123.986c-.211,0-.244-.222-.244-.743s.022-.743.244-.743.244.222.244.743S44.943,123.986,44.732,123.986Zm0,.3c.632,0,.632-.51.632-1.043s0-1.043-.632-1.043-.632.51-.632,1.043S44.1,124.286,44.732,124.286Z" transform="translate(-39.729 -119.715)" fill="#fff"/><path d="M58.566,122.533h.166c.122,0,.189.078.189.266,0,.133-.044.3-.189.3h-.166Zm0,.876h.1c.288,0,.277.2.277.444a.914.914,0,0,0,.044.388h.377a3.3,3.3,0,0,1-.044-.6c0-.366-.244-.388-.333-.4v-.011c.244-.044.333-.233.333-.5,0-.344-.166-.533-.422-.533h-.7v2.019h.377v-.81Z" transform="translate(-52.264 -119.715)" fill="#fff"/><path d="M70.82,122.4v.333H70.4v1.686h-.377v-1.686H69.6V122.4Z" transform="translate(-62.4 -119.893)" fill="#fff"/><path d="M83.243,122.4v1.431a.574.574,0,0,1-.621.621.561.561,0,0,1-.621-.621V122.4h.377v1.409c0,.244.1.344.233.344.166,0,.244-.122.244-.344V122.4Z" transform="translate(-73.424 -119.893)" fill="#fff"/><path d="M96,124.519V122.5h.51L97,123.9h0v-1.4h.355v2.019h-.5l-.5-1.476h0v1.476Z" transform="translate(-85.871 -119.982)" fill="#fff"/><path d="M111.2,124.519V122.5h.377v2.019Z" transform="translate(-99.384 -119.982)" fill="#fff"/><path d="M117.432,122.4v.333h-.422v1.686h-.388v-1.686H116.2V122.4Z" transform="translate(-103.829 -119.893)" fill="#fff"/><path d="M128.077,123.82l-.477-1.32h.411l.277.854.288-.854h.388l-.51,1.32v.7h-.377Z" transform="translate(-113.965 -119.982)" fill="#fff"/></g></g><g transform="translate(0 10.906)"><path d="M4.7,101.8v-1.7h.832v.266h-.51v.422H5.5v.266H5.022v.5h.533v.266H4.7Z" transform="translate(-4.7 -100.067)" fill="#fff"/><path d="M14.9,101.387c-.178,0-.2-.189-.2-.61s.022-.621.2-.621.2.189.2.621S15.077,101.387,14.9,101.387Zm.643-.022H15.41a1.345,1.345,0,0,0-.155.055h0a.8.8,0,0,0,.189-.643c0-.444,0-.876-.521-.876s-.521.433-.521.876c0,.588.055.865.533.865.055,0,.133-.011.189-.011h.455v-.266Z" transform="translate(-13.324 -99.889)" fill="#fff"/><path d="M26.843,100.1v1.209a.481.481,0,0,1-.521.521.468.468,0,0,1-.521-.521v-1.2h.322v1.176c0,.211.078.288.2.288.144,0,.2-.1.2-.288v-1.176h.322Z" transform="translate(-23.459 -100.067)" fill="#fff"/><path d="M37.366,101.165h-.3l.144-.732h0Zm-.455.632L37,101.42h.433l.089.377h.333l-.411-1.7h-.422l-.422,1.7Z" transform="translate(-33.061 -100.067)" fill="#fff"/><path d="M49.3,101.8v-1.7h.322v1.42H50.1v.277Z" transform="translate(-44.352 -100.067)" fill="#fff"/><path d="M66.888,100.877V100.2h.322v1.7h-.322v-.754h-.366v.754H66.2v-1.7h.322v.677Z" transform="translate(-59.377 -100.156)" fill="#fff"/><path d="M78.221,101.4c-.178,0-.2-.189-.2-.621s.022-.621.2-.621.2.189.2.621S78.41,101.4,78.221,101.4Zm0,.255c.521,0,.521-.433.521-.876s0-.876-.521-.876-.521.433-.521.876S77.7,101.653,78.221,101.653Z" transform="translate(-69.601 -99.889)" fill="#fff"/><path d="M90.443,100.1v1.209a.481.481,0,0,1-.521.521.468.468,0,0,1-.521-.521v-1.2h.322v1.176c0,.211.078.288.2.288.144,0,.2-.1.2-.288v-1.176h.322Z" transform="translate(-80.003 -100.067)" fill="#fff"/><path d="M101.246,101.653c-.4,0-.466-.255-.455-.555h.322c0,.166.011.3.178.3.111,0,.155-.078.155-.189,0-.311-.643-.322-.643-.832,0-.266.111-.477.5-.477.311,0,.466.155.444.51h-.311c0-.122-.022-.255-.144-.255a.16.16,0,0,0-.166.178c0,.322.643.288.643.832C101.779,101.6,101.49,101.653,101.246,101.653Z" transform="translate(-90.129 -99.889)" fill="#fff"/><path d="M111.7,101.8v-1.7h.322v1.7Z" transform="translate(-99.829 -100.067)" fill="#fff"/><path d="M117.1,101.8v-1.7h.433l.411,1.176h0V100.1h.3v1.7h-.422l-.422-1.243h0V101.8Z" transform="translate(-104.63 -100.067)" fill="#fff"/><path d="M130.221,100.355c0-.155-.022-.3-.189-.3-.2,0-.2.3-.2.632,0,.533.044.621.233.621a.354.354,0,0,0,.155-.033V100.9h-.178v-.266h.488v.865a2.287,2.287,0,0,1-.433.055c-.533,0-.6-.244-.6-.888,0-.433.022-.865.544-.865a.466.466,0,0,1,.488.555Z" transform="translate(-115.654 -99.8)" fill="#fff"/><path d="M5.532,123.986c-.211,0-.244-.222-.244-.743s.022-.743.244-.743.244.222.244.743S5.743,123.986,5.532,123.986Zm0,.3c.632,0,.632-.51.632-1.043s0-1.043-.632-1.043-.632.51-.632,1.043S4.911,124.286,5.532,124.286Z" transform="translate(-4.878 -119.715)" fill="#fff"/><path d="M19.388,122.711h.189c.166,0,.211.144.211.311,0,.133-.078.266-.189.266h-.211ZM19,124.43h.377v-.821h.288c.444,0,.51-.366.51-.6,0-.366-.133-.61-.488-.61H19Z" transform="translate(-17.413 -119.893)" fill="#fff"/><path d="M31.988,122.711h.189c.166,0,.211.144.211.311,0,.133-.078.266-.189.266h-.211Zm-.377,1.72h.377v-.821h.277c.444,0,.51-.366.51-.6,0-.366-.133-.61-.488-.61H31.6v2.03Z" transform="translate(-28.616 -119.893)" fill="#fff"/><path d="M44.732,123.986c-.211,0-.244-.222-.244-.743s.022-.743.244-.743.244.222.244.743S44.943,123.986,44.732,123.986Zm0,.3c.632,0,.632-.51.632-1.043s0-1.043-.632-1.043-.632.51-.632,1.043S44.1,124.286,44.732,124.286Z" transform="translate(-39.729 -119.715)" fill="#fff"/><path d="M58.566,122.533h.166c.122,0,.189.078.189.266,0,.133-.044.3-.189.3h-.166Zm0,.876h.1c.288,0,.277.2.277.444a.914.914,0,0,0,.044.388h.377a3.3,3.3,0,0,1-.044-.6c0-.366-.244-.388-.333-.4v-.011c.244-.044.333-.233.333-.5,0-.344-.166-.533-.422-.533h-.7v2.019h.377v-.81Z" transform="translate(-52.264 -119.715)" fill="#fff"/><path d="M70.82,122.4v.333H70.4v1.686h-.377v-1.686H69.6V122.4Z" transform="translate(-62.4 -119.893)" fill="#fff"/><path d="M83.243,122.4v1.431a.574.574,0,0,1-.621.621.561.561,0,0,1-.621-.621V122.4h.377v1.409c0,.244.1.344.233.344.166,0,.244-.122.244-.344V122.4Z" transform="translate(-73.424 -119.893)" fill="#fff"/><path d="M96,124.519V122.5h.51L97,123.9h0v-1.4h.355v2.019h-.5l-.5-1.476h0v1.476Z" transform="translate(-85.871 -119.982)" fill="#fff"/><path d="M111.2,124.519V122.5h.377v2.019Z" transform="translate(-99.384 -119.982)" fill="#fff"/><path d="M117.432,122.4v.333h-.422v1.686h-.388v-1.686H116.2V122.4Z" transform="translate(-103.829 -119.893)" fill="#fff"/><path d="M128.077,123.82l-.477-1.32h.411l.277.854.288-.854h.388l-.51,1.32v.7h-.377Z" transform="translate(-113.965 -119.982)" fill="#fff"/></g><rect width="4.493" height="1.331" transform="translate(4.814 4.371)" fill="#fff"/><rect width="4.493" height="1.331" transform="translate(4.826 6.402)" fill="#fff"/></svg>
                    </li>
                    <li>
                        <a href="">PRIVACY POLICY </a>
                    </li>
                    <li>
                        <i class="copyright-content"> <?php echo esc_html('©'); ?><?php echo date('Y'); ?> New Home Inc. All Rights Reserved.</i>
                    </li>
                </ul>
            </div>
        </div>
	</footer><!-- #colophon -->



</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
