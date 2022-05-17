@if (!isset($_COOKIE[Config::get('cookie-law::cookie-law.cookie_name')]))
	<div class="cookie-law js-cookie-law-dialog">
		<div class="cookie-law__inner">
			<div class="cookie-law__message">
				{{ trans('cookie-law::lang.message') }}
			</div>

			<a href="{{ Config::get('cookie-law::cookie-law.cookie_url') }}" class="cookie-law__button js-cookie-law-customise">
					{{ trans('cookie-law::lang.customise-button') }}
			</a>

			<button class="cookie-law__button js-cookie-law-reject" type="button">
				{{ trans('cookie-law::lang.reject-button') }}
			</button>

			<button class="cookie-law__button js-cookie-law-accept" type="button">
				{{ trans('cookie-law::lang.accept-button') }}
			</button>
		</div>
	</div>

	<script>
		window.cookieLaw = (function() {
			function acceptCookies() {
				var date = new Date();
				date.setTime(date.getTime() + ({{ Config::get('cookie-law::cookie-law.cookie_lifetime') }} * 24 * 60 * 60 * 1000));
				document.cookie = '{{ Config::get('cookie-law::cookie-law.cookie_name') }}=1; ' + 'expires=' + date.toUTCString() +'; path="/";';

				var dialog = document.querySelector('.js-cookie-law-dialog');
				dialog.classList.add('cookie-law--accepted')

				location.reload();
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
@endif
