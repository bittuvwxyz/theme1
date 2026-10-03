(() => {
	'use strict';

	const menuButton = document.querySelector('.menu-toggle');
	const navigation = document.querySelector('.primary-nav');
	const searchButton = document.querySelector('.search-toggle');
	const searchPanel = document.querySelector('.search-panel');
	const searchClose = document.querySelector('.search-close');
	const searchInput = searchPanel?.querySelector('input[type="search"]');

	const closeMenu = () => {
		navigation?.classList.remove('is-open');
		menuButton?.setAttribute('aria-expanded', 'false');
	};

	const closeSearch = () => {
		if (searchPanel) {
			searchPanel.hidden = true;
		}
		searchButton?.setAttribute('aria-expanded', 'false');
	};

	menuButton?.addEventListener('click', () => {
		closeSearch();
		const isOpen = navigation?.classList.toggle('is-open');
		menuButton.setAttribute('aria-expanded', String(Boolean(isOpen)));
	});

	searchButton?.addEventListener('click', () => {
		if (!searchPanel) {
			return;
		}

		closeMenu();
		const isOpening = searchPanel.hidden;
		searchPanel.hidden = !isOpening;
		searchButton.setAttribute('aria-expanded', String(isOpening));

		if (isOpening) {
			searchInput?.focus();
		}
	});

	searchClose?.addEventListener('click', () => {
		closeSearch();
		searchButton?.focus();
	});

	document.addEventListener('keydown', (event) => {
		if (event.key === 'Escape') {
			closeMenu();
			closeSearch();
		}
	});

	document.querySelectorAll('.copy-link').forEach((button) => {
		button.addEventListener('click', async () => {
			const originalLabel = button.textContent;

			try {
				await navigator.clipboard.writeText(button.dataset.copyUrl || window.location.href);
				button.textContent = 'Copied';
			} catch (error) {
				button.textContent = 'Copy unavailable';
			}

			window.setTimeout(() => {
				button.textContent = originalLabel;
			}, 1800);
		});
	});
})();
