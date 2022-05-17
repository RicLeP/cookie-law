
@extends('site.structural.layout')

@section('javascript')
@stop

@section('title')
	{{trans('app.company-name')}} - {{$page->title}}
@stop

@section('hero')
	@include('site.blocks.page-heroes', ['class' => 'hero--tall'])
@stop

@section('content')
	<section>
		{{ trans('cookie-law::lang.details') }}
	</section>
@stop

<script>
	window.cookieLaw = (function() {
		function acceptCookies() {
			var date = new Date();
			date.setTime(date.getTime() + ({{ Config::get('cookie-law::cookie-law.cookie_lifetime') }} * 24 * 60 * 60 * 1000));
			document.cookie = '{{ Config::get('cookie-law::cookie-law.cookie_name') }}=1; ' + 'expires=' + date.toUTCString() +'; path="/";';

			var dialog = document.querySelector('.js-cookie-law-dialog');
			dialog.classList.add('cookie-law--accepted')

			dataLayer.push({
				'event': 'Pageview',
			});
		}

		function rejectCookies() {
			var date = new Date();
			date.setTime(date.getTime() + ({{ Config::get('cookie-law::cookie-law.cookie_lifetime') }} * 24 * 60 * 60 * 1000));
			document.cookie = '{{ Config::get('cookie-law::cookie-law.cookie_name') }}=0; ' + 'expires=' + date.toUTCString() +'; path="/";';

			var dialog = document.querySelector('.js-cookie-law-dialog');
			dialog.classList.add('cookie-law--accepted')
		}

		var acceptButton = document.querySelector('.js-cookie-law-accept');
		acceptButton.addEventListener('click', acceptCookies);

		var rejectButton = document.querySelector('.js-cookie-law-reject');
		rejectButton.addEventListener('click', rejectCookies);
	})();
</script>
