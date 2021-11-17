<?php
if (!defined('ABSPATH'))
    exit;
if(!class_exists('ACCF7_Active_Campaign_Settings')){
	class ACCF7_Active_Campaign_Settings{
		public function __construct(){
	        add_filter( 'wpcf7_editor_panels', array($this, 'hbcf7_tab'),10,1);
	        add_action('save_post_wpcf7_contact_form', array($this, 'save_contact_form_seven_ac_settings'));
		}
		public function hbcf7_tab($panels){
			$panels['wpop-hubspot-panel'] = array( 
	            'title' => __( 'Hubspot', 'wpop-contactform-hubspot' ),
	            'callback' => array($this, 'hbcf7_tab_callback')
	        );
	        return $panels;
		}
		public function save_contact_form_seven_ac_settings($post_id){
			//sanitize and save fields value
			$postdata = $_POST['hbcf7_fields'];
            $fields = array();
            $fields['hbcf7_email'] = sanitize_text_field( $postdata['hbcf7_email'] );
            $fields['hbcf7_first_name'] = sanitize_text_field( $postdata['hbcf7_first_name'] );
            $fields['hbcf7_last_name'] = sanitize_text_field( $postdata['hbcf7_last_name'] );
            $fields['hbcf7_phone'] = sanitize_text_field( $postdata['hbcf7_phone'] );
            $fields['hbcf7_organization'] = sanitize_text_field( $postdata['hbcf7_organization'] );
            
			update_post_meta($post_id,'hbcf7_fields', $fields);
			// enable
			if(isset($_POST['hbcf7_enable'])){
				update_post_meta($post_id,'hbcf7_enable',sanitize_text_field('yes'));
			}else{
				update_post_meta($post_id,'hbcf7_enable',sanitize_text_field('no'));
			}
			
			// Hubspot
			$ac['api_key'] = isset($_POST['hbcf7_api_key']) ? trim(sanitize_text_field($_POST['hbcf7_api_key'])) : '';
			$ac['list_id'] = isset($_POST['hbcf7_list_id']) ? trim(absint($_POST['hbcf7_list_id'])) : '';
			$ac['lifecycle'] = isset($_POST['hbcf7_list_lifecycle_stage']) ? trim(sanitize_text_field($_POST['hbcf7_list_lifecycle_stage'])) : 'subscriber';
			$ac['lead'] = isset($_POST['hbcf7_list_lead_status']) ? trim(sanitize_text_field($_POST['hbcf7_list_lead_status'])) : '';
			update_post_meta($post_id,'hbcf7_credentials',$ac);
		}
		public function hbcf7_tab_callback(){
			global $post;
	        $cf7 = WPCF7_ContactForm::get_instance($_GET['post']); //Sanitize Done in Contact Form 7
	        $tags = '';
	        if(!empty($cf7)){
	        	$tags = $cf7->collect_mail_tags();	
	        }
	        
	        $post_id = isset($_GET['post']) ? absint($_GET['post']) : '';

	        $enable=get_post_meta($post_id,'hbcf7_enable',true);
	        $lyfecycle_stages = array(
	        	'subscriber' => esc_html('Subscriber','wpop-contactform-hubspot'),
	        	'lead' => esc_html('Lead','wpop-contactform-hubspot'),
	        	'marketingqualifiedlead' => esc_html('Marketing qualified lead','wpop-contactform-hubspot'),
	        	'salesqualifiedlead' => esc_html('Sales qualified lead','wpop-contactform-hubspot'),
	        	'opportunity' => esc_html('Opportunity','wpop-contactform-hubspot'),
	        	'customer' => esc_html('Customer','wpop-contactform-hubspot'),
	        	'evangelist' =>  esc_html('Evangelist','wpop-contactform-hubspot'),
	        	'other' => esc_html('Other','wpop-contactform-hubspot'),
	        );
	        $lead_status = array(
	        	'NEW' => esc_html('New','wpop-contactform-hubspot'),
	        	'OPEN' => esc_html('Open','wpop-contactform-hubspot'),
	        	'IN_PROGRESS' => esc_html('In Progress','wpop-contactform-hubspot'),
	        	'OPEN_DEAL' => esc_html('Open Deal','wpop-contactform-hubspot'),
	        	'UNQUALIFIED' => esc_html('Unqualified','wpop-contactform-hubspot'),
	        	'ATTEMPTED_TO_CONTACT' => esc_html('Attempted to Contact','wpop-contactform-hubspot'),
	        	'CONNECTED' => esc_html('Connected','wpop-contactform-hubspot'),
	        	'BAD_TIMING' => esc_html('Bad timing','wpop-contactform-hubspot'),
	        );
	        ?>
	        <div id="hbcf7-settings">
	        <h2><?php echo esc_html__("Hubspot Setttings","wpop-contactform-hubspot"); ?></h2>

	        <h3><label for="hbcf7_enable"><input type="checkbox" name="hbcf7_enable" id="cf7_email_subscription" value="yes" <?php echo (($enable=='yes')?'checked':''); ?> ><?php echo esc_html__("Enable Hubspot for this form.","wpop-contactform-hubspot"); ?></label></h3><hr>
		    <div class="hbcf7-settings-tab clearfix">
		    	<ul class="tab-wrap clearfix">
		    		<li class="tab active" data-id="general">
		    			<?php echo esc_html__('General Settings','wpop-contactform-hubspot'); ?>
		    		</li>
		    		<li class="tab" data-id="form-fields">
		    		    <?php echo esc_html__('Form Fields','wpop-contactform-hubspot'); ?>
		    		</li>
		    		<li class="tab" data-id="form-pro" style="background:#05c305; color:#fff;" >
		    		    <?php echo esc_html__('Pro Version','wpop-contactform-hubspot'); ?>
		    		</li>
		    	</ul>
		    </div>
	        <div id="hbcf7_enable">

            <div class="hbcf7-main-settings tab-pane general general-settings-section">
		        <h1><?php echo __("Hubspot Settings","wpop-contactform-hubspot"); ?></h1>
		        <?php
		        $ac = get_post_meta($post_id,'hbcf7_credentials',true);
		        ?>
		        <p>
		        	<label for="hbcf7_api_key"><?php echo __("Hubspot API KEY","wpop-contactform-hubspot"); ?></label>
		        	<input type="text" name="hbcf7_api_key" class="widefat" id="hbcf7_api_key" value="<?php echo (isset($ac['api_key']) ?  esc_attr($ac['api_key']) : '' ); ?>">
		        	<em><?php echo sprintf(esc_html__( 'You can get API key like %s.', 'wpop-contactform-hubspot' ),'<a href="https://knowledge.hubspot.com/integrations/how-do-i-get-my-hubspot-api-key" target="_blank">this</a>');?></em>
		        </p>

	            <p>
	            	<label for="hbcf7_list_id"><?php echo __("Hubspot Contact List ID","wpop-contactform-hubspot"); ?></label>
            		<input type="number" min="0" name="hbcf7_list_id" class="widefat" id="hbcf7_list_id" value="<?php echo (isset($ac['list_id']) ?  esc_attr($ac['list_id']) : '' ); ?>">
            		<em><?php echo esc_html__( 'You Must Add List Id to add contacts in your Hubspot Lists. Works only for Static Lists.','wpop-contactform-hubspot');?></em>
	            </p>
	            <p>
	            	<label for="hbcf7_lifecycle"><?php echo __("Lifecycle Stage","wpop-contactform-hubspot"); ?></label>
            		<select name="hbcf7_list_lifecycle_stage" class="widefat" id="hbcf7_lifecycle">		
            			<?php 
            			foreach($lyfecycle_stages as $val => $key){
			                $selected='';
			                if(isset($ac['lifecycle']) && $ac['lifecycle']==$val)
			                    $selected='selected';

			                echo '<option value="'.esc_attr($val).'" '.$selected.'>'.esc_attr($key).'</option>';	
            			}
            			?>
            		</select>
	            </p>
	            <p>
	            	<label for="hbcf7_lead"><?php echo __("Lead Status","wpop-contactform-hubspot"); ?></label>
            		<select name="hbcf7_list_lead_status" class="widefat" id="hbcf7_lead">
            	        <option value=""><?php echo __('Choose Status','wpop-contactform-hubspot');?></option>		
            			<?php 
            			foreach($lead_status as $val => $key){
			                $selected='';
			                if(isset($ac['lead']) && $ac['lead']==$val)
			                    $selected='selected';

			                echo '<option value="'.esc_attr($val).'" '.$selected.'>'.esc_attr($key).'</option>';	
            			}
            			?>
            		</select>
	            </p>
			    <div class="contacts-meta-section-wrapper">
					<span class="add-button table-contacts"><a href="javascript:void(0)" class="docopy-table-list button"><?php esc_html_e('Add List ID','wpop-contactform-hubspot'); ?></a></span>
			    </div>
			    <em class="pro"><?php echo __("Available in Premium Version.","wpop-contactform-hubspot"); ?>
			    	<a href="https://wpoperation.com/plugins/hubspot-contactform7-pro/" target="_blank"><?php esc_html_e('Get Pro Version','wpop-contactform-hubspot'); ?></a>
			    </em>
            </div><!--general Settings -->
	        <div class="hbcf7-main-settings tab-pane form-fields clearfix" style="display:none">
	            <?php
		        if(!empty($tags)){
		        	?>
		        	<h1><?php echo __("Select form fields","wpop-contactform-hubspot"); ?></h1>
		            <?php	
		            $fields=get_post_meta($post_id,'hbcf7_fields',true);
		            // email field
		            ?>
		            <div class="form-fields">
			            <label for="hbcf7_email" class="fleft"><?php echo __("Email Field* : ","wpop-contactform-hubspot"); ?></label>
			            <select name="hbcf7_fields[hbcf7_email]" id="hbcf7_email" class="fleft">
			            <option value=""><?php echo __("Select field name for email","wpop-contactform-hubspot"); ?></option>
			            <?php
			            foreach ($tags as $key => $tag) {
			                 $selected='';
			                if(isset($fields['hbcf7_email']) && $fields['hbcf7_email']==$tag)
			                    $selected='selected';

			                echo '<option value="'.esc_attr($tag).'" '.$selected.'>'.esc_attr($tag).'</option>';
			            }
			            ?>
			            </select>
		            </div>
		            <p><em><?php echo __("Following fields are optional select if available in form, otherwise leave unselected. Only email field is required.","wpop-contactform-hubspot"); ?></em></p>
                    <div class="form-fields">
		            	<label for="hbcf7_first_name" class="fleft"><?php echo __("First Name Field : ","wpop-contactform-hubspot"); ?></label>
			            <select name="hbcf7_fields[hbcf7_first_name]" id="hbcf7_first_name" class="fleft">
			            <option value=""><?php echo __("Select field name for first name","wpop-contactform-hubspot"); ?></option>
			            <?php
			            foreach ($tags as $key => $tag) {
			                $selected='';
			                if(isset($fields['hbcf7_first_name']) && $fields['hbcf7_first_name']==$tag)
			                    $selected='selected';

			                echo '<option value="'.esc_attr($tag).'" '.$selected.'>'.esc_attr($tag).'</option>';
			            }
			            ?>
			            </select>
                    </div>
                    <div class="form-fields">
			            <label for="hbcf7_last_name" class="fleft"><?php echo __("Last Name Field : ","wpop-contactform-hubspot"); ?></label>
			            <select name="hbcf7_fields[hbcf7_last_name]" id="hbcf7_last_name" class="fleft">
			            <option value=""><?php echo __("Select field name for last name","wpop-contactform-hubspot"); ?></option>
			            <?php
			            foreach ($tags as $key => $tag) {
			                $selected='';
			                if(isset($fields['hbcf7_last_name']) && $fields['hbcf7_last_name']==$tag)
			                    $selected='selected';

			                echo '<option value="'.esc_attr($tag).'" '.$selected.'>'.esc_attr($tag).'</option>';
			            }
			            ?>
			           </select>
                   </div>
                   <div class="form-fields">
			            <label for="hbcf7_phone" class="fleft"><?php echo __("Phone Number Field : ","wpop-contactform-hubspot"); ?></label>
			            <select name="hbcf7_fields[hbcf7_phone]" id="hbcf7_phone" class="fleft">
			            <option value=""><?php echo __("Select field name for Phone","wpop-contactform-hubspot"); ?></option>
			            <?php
			            foreach ($tags as $key => $tag) {
			                $selected='';
			                if(isset($fields['hbcf7_phone']) && $fields['hbcf7_phone']==$tag)
			                    $selected='selected';

			                echo '<option value="'.esc_attr($tag).'" '.$selected.'>'.esc_attr($tag).'</option>';
			            }
			            ?>
			            </select>
		            </div>
		            <div class="form-fields">
			            <label for="hbcf7_organization" class="fleft"><?php echo __("Company Field : ","wpop-contactform-hubspot"); ?></label>
			            <select name="hbcf7_fields[hbcf7_organization]" id="hbcf7_organization" class="fleft">
			            <option value=""><?php echo __("Select field name for company","wpop-contactform-hubspot"); ?></option>
			            <?php
			            foreach ($tags as $key => $tag) {
			                $selected='';
			                if(isset($fields['hbcf7_organization']) && $fields['hbcf7_organization']==$tag)
			                    $selected='selected';

			                echo '<option value="'.esc_attr($tag).'" '.$selected.'>'.esc_attr($tag).'</option>';
			            }
			            ?>
			            </select>
		            </div>
		            <p><hr></p>
                    <label><?php echo __("Add Custom Properties.","wpop-contactform-hubspot"); ?></label>
                    <div class="form-fields">
				    <div class="contacts-meta-section-wrapper">
				    	<span class="add-button table-contacts"><a href="javascript:void(0)" class="docopy-table-contact button"><?php esc_html_e('Add Field','wpop-contactform-hubspot'); ?></a></span>
				    	<em class="pro"><?php echo __("Available in Premium Version.","wpop-contactform-hubspot"); ?>
				    		<a href="https://wpoperation.com/plugins/hubspot-contactform7-pro/" target="_blank"><?php esc_html_e('Get Pro Version','wpop-contactform-hubspot'); ?></a>
				    	</em>
				    </div>
				    </div>
		           <?php
		        }
		        else{
		            echo __('Please Add Contact Form Tags First!', 'wpop-contactform-hubspot');
		        }
		        ?>
		        <hr>
            </div><!--Form Fields -->
            <div class="hbcf7-main-settings tab-pane form-pro clearfix" style="display:none">
            	<div class="pro-features">
            		<h2><?php esc_html_e('Pro Features','wpop-contactform-hubspot'); ?></h2>
            		<hr>
            		<ul>
            			<li><?php esc_html_e('Adds contacts in “Hubspot” through “Contact Form 7”.','wpop-contactform-hubspot');?></li>
            			
						<li><?php esc_html_e('Adds Contacts to unlimited List ID\'s.','wpop-contactform-hubspot'); ?></li>
						<li><?php esc_html_e('Option to select “Contact Form 7” fields for “Hubspot” list.','wpop-contactform-hubspot'); ?></li>
						<li><?php esc_html_e('Option to add Unlimited Fields.','wpop-contactform-hubspot'); ?></li>
						<li><?php esc_html_e('Life Time Free Updates & Support.'); ?></li>
						
						

            		</ul>
            		<a href="https://wpoperation.com/plugins/hubspot-contactform7-pro/" class="button-secondary" target="_blank">
            			<?php esc_html_e('Get Pro Version','wpop-contactform-hubspot'); ?>
            		</a>
            	</div>
            	<hr>
            	<h2><?php esc_html_e('Please Spread Your Love With 5 Star Rating.','wpop-contactform-hubspot'); ?></h2>
            	<span><?php esc_html_e('If you are loving our plugin please give us nice rating.','wpop-contactform-hubspot'); ?></span>
            	<a href="https://wordpress.org/support/plugin/wpop-contactform-hubspot/reviews/#new-post" class="button-primary" target="_blank">
            			<?php esc_html_e('Rate Now','wpop-contactform-hubspot'); ?>
            		</a>
            </div><!-- Premium Version -->
	        <hr>
	        </div>
	        </div>
	        <?php

		}
	}
	new ACCF7_Active_Campaign_Settings();
}