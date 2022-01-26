<?php

    $coming_soon_community = get_field('coming_soon_community');
    $coming_soon_content_area_group = get_field('coming_soon_content_area');

    $coming_soon_headline = $coming_soon_content_area_group['coming_soon_headline'];

    $coming_soon_announcements = $coming_soon_content_area_group['coming_soon_announcements'];

    $coming_soon_contact_form = $coming_soon_content_area_group['coming_soon_contact_form'];

?>
<?php if($coming_soon_community == 'yes' && $coming_soon_announcements) :  ?>
<section id="coming-soon-area" class="coming-soon-area">
    <header class="coming-soon-header">
        <span class="coming-soon-title"><?php echo $coming_soon_headline; ?></span>
    </header>
	<div class="coming-soon-main-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-content pt-5">
                        <p><?php echo $coming_soon_announcements; ?> </p>
                        <div class="contact-form-area">
                            <?php echo $coming_soon_contact_form; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>