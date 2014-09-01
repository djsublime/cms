{{Form::open(URL::to_action('site@login'), 'POST', $options)}}
	
	{{Form::hidden('back_url', Session::get('back_url', SLUG_FULL))}}

	@if(Session::has('login_error_msg'))
		<p class="text-error">
			{{Session::get('login_error_msg')}}
		</p>
	@endif

	{{Form::text('username', Input::old('username'),array('class' => 'span2','placeholder' => LL('cms::form.user_username', SITE_LANG)))}}
	&nbsp;
	{{Form::password('password',array('class' => 'span2','placeholder' => LL('cms::form.password', SITE_LANG)))}}
	&nbsp;
	{{Form::submit(LL('cms::button.enter', SITE_LANG), array('class' => 'btn'))}}

{{Form::close()}}