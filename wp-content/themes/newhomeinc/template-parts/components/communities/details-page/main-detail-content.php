
<div id="overview"  class="main-detail-spec-area mt-lg-3"   data-aos="fade-up" data-aos-duration="900">
	<div class="container">
		<div class="row d-flex align-content-center align-items-center pt-5">
			<div class="col-lg-6 col-md-6">
				<div class="spec-detail-area">
					<div class="spec-title-price-area">
						<div class="spec-title-location">
							<h5><?php the_title(); ?></h5>
							<span class="location"><?php echo $display_city_state; ?></span>
							<hr class="spec-area-component-hr">
						</div>
						<div class="spec-area-price">
							<?php  if ($average_price) : ?>
								<span class="spec-area-price-label">From</span>
								<span class="spec-area-price"><?php echo $display_average_price; ?></span>
							<?php else : ?>
                                <span class="spec-area-price-label">Price</span>
								<span class="spec-area-price"><?php echo $display_average_price; ?></span>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<hr class="spec-area-hr">
				<div class="spec-area-container-bottom">
					<div class="spec-area-component">
						<span class="spec-area-label"><?php echo esc_html('BEDS') ?></span>
						<span class="spec-area-data"><?php echo $display_min_beds; ?><?php echo $display_max_beds; ?></span>
					</div>
					<div class="spec-area-component">
						<span class="spec-area-label"><?php echo esc_html('BATHS') ?></span>
						<span class="spec-area-data"><?php echo $display_bath;  ?></span>
					</div>
					<div class="spec-area-component">
                        <span class="spec-area-label"><?php echo esc_html('SQ FT') ?></span>
                        <span class="spec-area-data"><?php echo $display_sqft; ?></span>
					</div>
					<div class="spec-area-component">
						<span class="spec-area-label"><?php echo esc_html('GARAGE') ?></span>
						<span class="spec-area-data"><?php echo $display_min_garage; ?><?php echo $display_max_garage; ?></span>
					</div>
				</div>
				<hr class="spec-area-hr">
			</div>
			<div class="col-lg-6 col-md-6">
				<?php
                $coming_soon_content_area_group = get_field('coming_soon_content_area');
                $anticipated_sales_opening = $coming_soon_content_area_group['anticipated_sales_opening'];
             
                ?>
                <?php $coming_soon_community = get_field('coming_soon_community'); ?>
				<div class="detail-page-cta-area">
					<?php if($coming_soon_community == 'yes') :  ?>

					    <div class="detail-page-cta-inner">
						<h6>ANTICIPATED SALES OPENING</h6>
                        <span class="coming-soon-status"><?php echo $anticipated_sales_opening; ?></span>
					</div>
                    <?php else : ?>
                        <div class="detail-page-cta-inner">
<!--                            <h6>SCHEDULE A MEETING</h6>-->
                            <button type="button" class="detail-page-cta-options">
                                CONTACT US
                            </button>
                        </div>
                    <?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>


<?php
global $post;
$post_id = $post->ID;
?>
<div id="detail-page-cta" class="detail-page-cta-slide-out slidemodal-hidden" data-postid="<?php echo get_the_id(); ?>">
    <div class="cta-container">
        <div class="flyout-title">
            <span class="title">Schedule A Meeting</span>
            <div class="cta-close"><span class="icon-close">X</span></div>
        </div>
        <div class="flyout-intro-content">
            <p>Interested in this beautiful community?
                Connect with your NHI Sales Agent to get more details.</p>
        </div>

       <div class="section-content">
           <div class="cta-body-area">
               <div id ="cta-contact-form" class="cta-contact-option"></div>
               <h6 id="cta-title"></h6>
               <div class="cta-location pt-2">
                   <div id="get_direction_text"></div>
                   <a  id="get_direction" href="https://www.google.com/maps?q=40.378580,-75.304110"></a>

               </div>
           </div>
       </div>
    </div>
</div>


<?php
    $community_contact_form = get_field('community_contact_form');
?>

<?php if($community_contact_form) : ?>
<div id="dialog-content" style="display:none;max-width:500px;">
   <header>
       <h6><?php echo the_title(); ?></h6>
   </header>
    <hr>
	<?php echo $community_contact_form; ?>
    <hr>
</div>

<?php endif; ?>
