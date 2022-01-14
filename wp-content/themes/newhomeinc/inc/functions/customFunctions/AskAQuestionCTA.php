<?php
 // This is a global custom CTA that will be available only on mobile devices

class globalCta{
    public function register_cta(){
	    if(function_exists('wp_footer')){
		    add_action('wp_footer', array($this, 'globalCTA_fields' ));
		    add_action('wp_footer', array($this, 'DesktopCTA' ));
		    add_action('wp_footer', array($this, 'MobileAaqCTA' ));
		    add_action('wp_footer', array($this, 'CtaModal' ));
        }
        return false;
    }
    public static function globalCTA_fields(){
	    return array(
            'phone_number' => get_field('phone_number', 'option'),
             'email' => get_field('email', 'option'),
             'text_message' => get_field('text_message', 'option'),
             'contact-form' => get_field('site_modal_contact_form', 'option'),
        );
    }

	public static function MobileAaqCTA(){
        $field_list = self::globalCTA_fields();
        $phone = $field_list['phone_number'];
        $email = $field_list['email'];
		$text_message = $field_list['text_message'];
		?>
        <div class="ask-a-question-component">
            <div class="">
                <div class="ask-a-question-component-inner">
                    <ul class="ask-a-question-component-inner-element">
                        <li class="aaq-icon-component">
                            <div>
                                <a data-bs-toggle="modal" href="#ctamodal">
                                    <span class="aaq-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"><circle cx="20" cy="20" r="20" fill="#fff"/><path d="M12.922.563A12.922,12.922,0,1,0,25.844,13.485,12.92,12.92,0,0,0,12.922.563Zm4.168,8.754a1.667,1.667,0,1,1-1.667,1.667A1.666,1.666,0,0,1,17.091,9.316Zm-8.337,0a1.667,1.667,0,1,1-1.667,1.667A1.666,1.666,0,0,1,8.754,9.316ZM18.9,18.185a7.784,7.784,0,0,1-11.963,0,.834.834,0,0,1,1.282-1.068,6.122,6.122,0,0,0,9.4,0A.834.834,0,0,1,18.9,18.185Z" transform="translate(7 6.438)" fill="#fc4f00"/></svg>
                                    </span>
                                    <span class="aaq-title">Ask A Question</span>
                                </a>
                            </div>
                        </li>
                        <li class="aaq-talk-options">
                            <ul class="aaq-options-list">
                                <li class="aaq-option-item phone">
	                                <?php if($phone) : ?>
                                        <a href="tel:<?php echo $phone; ?>">
                                            <span class="phone-icon aaq-option-icon"><i class="fas fa-phone-alt"></i></span>
                                            <span class="aaq-text">Call</span>
                                        </a>
                                    <?php endif; ?>

                                </li>
                                <li>
									<?php if($text_message) : ?>
                                        <a href="sms:<?php echo $text_message; ?>">
                                            <span class="phone-icon aaq-option-icon"><i class="fas fa-comment"></i></span>
                                            <span class="aaq-text">Text</span>
                                        </a>
									<?php endif; ?>
                                </li>
                                <li>
									<?php if($email) : ?>
                                        <a data-bs-toggle="modal" href="#ctamodal">
                                            <span class="phone-icon aaq-option-icon"><i class="fas fa-envelope"></i></span>
                                            <span class="aaq-text">Email</span>
                                        </a>
									<?php endif; ?>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
		<?php
	}

    public static function DesktopCTA(){
	    $field_list = self::globalCTA_fields();
	    $phone = $field_list['phone_number'];
        $email = $field_list['email'];
	    $formatted_phone_number = preg_replace("/^(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $phone);
        ?>
            <div id="desktop-cta" class="desktop-cta">
                <ul class="desktop-cta-container">
                    <li class="phone">
                        <a href="tel:<?php echo $phone; ?>">
                            <span><i class="fas fa-phone-alt"></i></span>
                            <span class="title">Call</span>
                        </a>
                    </li>
                    <li class="text">
                        <a href="sms:<?php echo $phone; ?>">
                            <span><i class="fas fa-comment"></i></span>
                            <span class="title">Text</span>
                        </a>
                    </li>
                    <li class="email">
                        <a data-bs-toggle="modal" href="#ctamodal">
                            <span><i class="fas fa-envelope"></i></span>
                            <span class="title">Email</span>
                        </a>
                    </li>
                </ul>
            </div>
        <?php
    }

    public static function CtaModal(){
	    $field_list = self::globalCTA_fields();
	    $phone = $field_list['phone_number'];
        $contact_form = $field_list['contact-form'];
	    $formatted_phone_number = preg_replace("/^(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $phone);
        ?>
            <div class="modal fade" id="ctamodal" aria-hidden="true" aria-labelledby="ctamodalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <button class="modal-close-btn" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>

                        <header class="modal-header-inner">
                            <div class="modal-header-left">
                                   <div class="modal-header-left-content">
                                       <i><svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 40 40"><circle cx="20" cy="20" r="20" fill="#fff"/><path d="M12.922.563A12.922,12.922,0,1,0,25.844,13.485,12.92,12.92,0,0,0,12.922.563Zm4.168,8.754a1.667,1.667,0,1,1-1.667,1.667A1.666,1.666,0,0,1,17.091,9.316Zm-8.337,0a1.667,1.667,0,1,1-1.667,1.667A1.666,1.666,0,0,1,8.754,9.316ZM18.9,18.185a7.784,7.784,0,0,1-11.963,0,.834.834,0,0,1,1.282-1.068,6.122,6.122,0,0,0,9.4,0A.834.834,0,0,1,18.9,18.185Z" transform="translate(7 6.438)" fill="#fc4f00"/></svg></i>
                                       <span class="talk-now-text">Talk Now</span>
                                   </div>
                            </div>

                            <div class="modal-header-right">
                               <div class="call-or-text-area">
                                    <span class="call-or-text">Call or text us anytime!</span>
                               </div>
                               <a class="model-phone-area" href="tel:<?php echo $phone; ?>">
                                   <?php echo $formatted_phone_number; ?>
                               </a>
                            </div>
                        </header>
                        <div class="modal-body">
                           <div class="container">
	                           <?php if($contact_form){
		                           echo $contact_form;
	                           }?>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
}

$globalCta = new globalCta();
$globalCta->register_cta();



