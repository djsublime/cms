<?php

class CustomMarker {

	/* Create your own Marker methods here */

	/*public static function MY_MARKER($vars = array())
	{
		//Get variables from array $vars
		if( ! empty($vars)) extract($vars);

		// ....

		$_id = 'my_marker';
		if(isset($id) and !empty($id)) $_id = $id;

		$_class = 'my_marker';
		if(isset($class) and !empty($class)) $_class = $class;

		$_tpl = 'my_marker_template';
		if(isset($tpl) and !empty($tpl)) $_tpl = $tpl;

		$options = array(
			'id' => $_id,
			'class' => $_class,
		);

		$view = LOAD_VIEW($_tpl);
		$view['options'] = $options;

		return $view;
	}*/

	public static function CMS_SETTINGS($vars = array())
	{

		if( ! empty($vars)) extract($vars);

		$_id = 'cms_settings';
		if(isset($id) and !empty($id)) $_id = $id;

		$_class = 'cms_settings';
		if(isset($class) and !empty($class)) $_class = $class;

		$_tpl = 'cms_settings';
		if(isset($tpl) and !empty($tpl)) $_tpl = $tpl;

		$options = array(
			'id' => $_id,
			'class' => $_class,
		);

		$view = LOAD_VIEW($_tpl);
		$view['options'] = $options;

		if(Auth::check() and (SITE_ROLE == Config::get('cms::settings.roles.admin'))){

			$view['data'] = Config::get('cms::settings');

		}else{

			$view['data'] = array('Access Restriction' => 'To view current CMS SETTINGS you will need to login and to have administrator permission.');

		}


		return $view;
	}

	public static function USER_INFO($vars = array()){

		if( ! empty($vars)) extract($vars);

		$_id = 'user_info';
		if(isset($id) and !empty($id)) $_id = $id;

		$_class = 'user_info';
		if(isset($class) and !empty($class)) $_class = $class;

		$_tpl = 'user_info';
		if(isset($tpl) and !empty($tpl)) $_tpl = $tpl;

		$options = array(
			'id' => $_id,
			'class' => $_class,
		);

		if(!Auth::check()){

			return 'restricted access!!!';

		}

		$uid = SITE_USERID;
		
		$user = CmsUser::find($uid);

		$has_details = !is_null($user->details);

		$view = LOAD_VIEW($_tpl);

		$view['data'] = array('user_id' => $uid,
						'user_username' => $user->username,
						'user_email' => $user->email,
						'user_role' => CmsRole::select_user_roles(),
						'user_role_selected', $user->role_id,
						'user_lang' => Config::get('cms::settings.interface'),
						'user_lang_selected' => $user->lang,
						'user_editor' => Config::get('cms::settings.editor'),
						'user_editor_selected' => $user->editor,
						'user_is_valid' => (bool) $user->is_valid,

						// USER DETAILS
						'detail_id' => $has_details ? $user->details->id : '',
						'user_name' => $has_details ? $user->details->name : '',
						'user_surname' => $has_details ? $user->details->surname : '',
						'user_address' => $has_details ? $user->details->address : '',
						'user_info' => $has_details ? $user->details->info : '',
						'user_number' => $has_details ? $user->details->number : '',
						'user_city' => $has_details ? $user->details->city : '',
						'user_zip' => $has_details ? $user->details->zip : '',
						'user_state' => $has_details ? $user->details->state : '',
						'user_country' => $has_details ? $user->details->country : '',
						'user_tel' => $has_details ? $user->details->tel : '',
						'user_cel' => $has_details ? $user->details->cel : ''
						);

		$view['options'] = $options;

		return $view;
	}


}