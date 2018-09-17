
@if (!isset($_COOKIE[Config::get('cookie-law::cookie-law.cookie_name')]))
	<div class="cookie-law js-cookie-law-dialog">
		<div class="cookie-law__inner">
			<div class="cookie-law__message">
				{{ trans('cookie-law::lang.message') }}
			</div>

			<button class="cookie-law__button js-cookie-law-accept" type="button">
				{{ trans('cookie-law::lang.accept-button') }}
			</button>
		</div>
	</div>
@endif

<script>
	window.cookieLaw = (function() {
		function acceptCookies() {
			var date = new Date();
			date.setTime(date.getTime() + ({{ Config::get('cookie-law::cookie-law.cookie_lifetime') }} * 24 * 60 * 60 * 1000));
			document.cookie = '{{ Config::get('cookie-law::cookie-law.cookie_name') }}=1; ' + 'expires=' + date.toUTCString() +';';

			var dialog = document.querySelector('.js-cookie-law-dialog');
			dialog.classList.add('cookie-law--accepted')
		}

		var acceptButton = document.querySelector('.js-cookie-law-accept');
		acceptButton.addEventListener('click', acceptCookies);
	})();
</script>