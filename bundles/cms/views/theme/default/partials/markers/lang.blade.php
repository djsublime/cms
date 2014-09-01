<ul{{$options}}>

	<?php

		if(!empty($exclude)) {

			$exclude_list = explode('-', $exclude);

			foreach ($exclude_list as $excl) {
				unset($langs[$excl]);
			}

		}

	?>
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{LL('cms::form.select_lang', SITE_LANG)}} <b class="caret"></b></a>
		<ul class="dropdown-menu">
			@foreach($langs as $code => $lang)
			<li{{CmsUtility::link_lang($code)}}>
				<a href="{{action('site@lang', array($code))}}">
					{{substr($lang, 0, 3)}}
				</a>
			</li>
			@endforeach
		</ul>
	</li>

</ul>