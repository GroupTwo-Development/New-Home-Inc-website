<?php
if (!defined('ABSPATH'))
    exit;
if(!class_exists('HBCF7_Hubspot_Subscribe')){
	class HBCF7_Hubspot_Subscribe{
		public function __construct(){
			add_action( 'wpcf7_before_send_mail', array($this, 'wphbcf7_subscribe' ),10,1); 
		}
		public function wphbcf7_subscribe($contact_form ){
			
			$submission = WPCF7_Submission::get_instance();
		   	$posted_data = $submission->get_posted_data(); //Sanitize Done in Contact Form 7
		    $wpcf7 = WPCF7_ContactForm::get_current();
			$form_id = $wpcf7->id;

			if(get_post_meta($form_id,'hbcf7_enable',true)=='yes'){

				$fields=get_post_meta($form_id,'hbcf7_fields',true);
				$emailkey=isset($fields['hbcf7_email']) ? $fields['hbcf7_email'] : '';
				$fnamekey=isset($fields['hbcf7_first_name']) ? $fields['hbcf7_first_name'] : '';
				$lnamekey=isset($fields['hbcf7_last_name']) ? $fields['hbcf7_last_name'] : '';
				$phonekey=isset($fields['hbcf7_phone']) ? $fields['hbcf7_phone'] : '';
				$orgkey=isset($fields['hbcf7_organization']) ? $fields['hbcf7_organization'] : '';

				$email='';
				if(!empty($emailkey))
				$email=isset($posted_data[$emailkey]) ? $posted_data[$emailkey] : '';

				$fname='GUEST';
				if(!empty($fnamekey))
				$fname=isset($posted_data[$fnamekey]) ? $posted_data[$fnamekey] : '';

				$lname='';
				if(!empty($lnamekey))
				$lname=isset($posted_data[$lnamekey]) ? $posted_data[$lnamekey] : '';

				$phone='';
				if(!empty($phonekey))
				$phone=isset($posted_data[$phonekey]) ? $posted_data[$phonekey] : '';

				$company='';
				if(!empty($orgkey))
				$company=isset($posted_data[$orgkey]) ? $posted_data[$orgkey] : '';

				$ac = get_post_meta($form_id,'hbcf7_credentials',true);

			    $user_info = [
			    	'user_email' => $email,
			    	'first_name' => $fname,
			    	'last_name' => $lname,
			    	'phone' => $phone,
			    	'company' => $company,
			    	'lifecycle' => $ac['lifecycle'],
			    	'lead' => $ac['lead']
			    ];

				//Hubspot starts
				if(!empty($email)){
					if( isset($ac['api_key']) && !empty($ac['api_key']) ){
						$url = $ac['url'];
						$api_key = $ac['api_key'];
						$list_id = isset($ac['list_id']) ? $ac['list_id'] : '';

						//print_r($user_info);
						//die();
                        
                        //create contact
						$this->contact_create($user_info,$api_key);
						//assign contact to list
						if($list_id){
							$this->list_assign_contact($list_id, $user_info['user_email'],$api_key);
						}
					}
				}
				// Hubspot ends
			}
		}
		

		public function contact_create($user_info,$api_key){

			$arr = array('properties' => array(

				array(
					'property' => 'email',
					'value' => $user_info['user_email']
				),
				array(
					'property' => 'lastname',
					'value' => $user_info['last_name']
				),
				array(
					'property' => 'firstname',
					'value' => $user_info['first_name']
				),
				array(
					'property' => 'phone',
					'value' => $user_info['phone']
				),
				array(
					'property' => 'company',
					'value' => $user_info['company']
				),
				array(
					'property' => 'lifecyclestage',
					'value' => $user_info['lifecycle']
				),
				array(
					'property' => 'hs_lead_status',
					'value' => $user_info['lead']
				),
			));

			$post_json = json_encode($arr);
			$endpoint = 'https://api.hubapi.com/contacts/v1/contact?hapikey=' . $api_key;
			$this->http($endpoint,$post_json);
		}

		public function list_assign_contact($lid, $email,$api_key){
			(object)$arr = array(
				"emails" => array($email)
			);
			$post_json = json_encode($arr);
			$endpoint = 'https://api.hubapi.com/contacts/v1/lists/'.(int)$lid.'/add?hapikey=' . $api_key;
			$this->http($endpoint,$post_json);
			//die();
		} 

		public function http($endpoint,$post_json){

			$args = array(
        		'method' => 'POST',
        		'timeout'     => 15,
        		'redirection' => 15,
        		'headers'     => "Content-Type: application/json",
        		'body' => $post_json,
        	);
        	$response = wp_remote_request( $endpoint, $args);
           	if( is_wp_error( $response ) ) {
            	echo 'error!';
        	}

		}
	}
	new HBCF7_Hubspot_Subscribe();
}