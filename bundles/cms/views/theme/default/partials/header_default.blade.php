<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="brand" href="/">{{(Config::get('cms::theme.project_name'))}}</a>
			<div class="nav-collapse collapse">
				{{MARKER('[$MENU[{"name":"nav","class":"nav"}]]')}}

				{{MARKER('[$LANG[{"id":"lang","class":"nav pull-right"}]]')}}

				@if(Auth::check())
				<ul class="nav pull-right">
					<li class="dropdown" data-dorpdown="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<span class="label">{{SITE_USERNAME}}</span><b class="caret"></b>
						</a>
						<ul class="dropdown-menu">

							<li class="nav-header">{{SITE_USERNAME}} | User Panel</li>
							
							<li class="divider"></li>

							<li><a href="/user">User Info</a></li>

							<li><a href="{{URL::to_action('site@logout')}}">{{LL('cms::title.logout', SITE_LANG)}}</a></li>

						</ul>		
					</li>
				</ul>
				@else
				{{MARKER('[$LOGIN[{"class":"navbar-form pull-right"}]]')}}
				@endif

			</div><!--/.nav-collapse -->
		</div>
	</div>
</div>