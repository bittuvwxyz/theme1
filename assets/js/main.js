(() => {
	'use strict';
	const menuButton = document.querySelector('.menu-toggle');
	const navigation = document.querySelector('.primary-nav');
	const searchButton = document.querySelector('.search-toggle');
	const searchPanel = document.querySelector('.search-panel');
	const searchClose = document.querySelector('.search-close');
	const searchInput = searchPanel?.querySelector('input[type="search"]');
	const closeSearch = () => { if (searchPanel) searchPanel.hidden = true; searchButton?.setAttribute('aria-expanded', 'false'); };
	menuButton?.addEventListener('click', () => { const open = navigation?.classList.toggle('is-open'); menuButton.setAttribute('aria-expanded', String(Boolean(open))); });
	searchButton?.addEventListener('click', () => { if (!searchPanel) return; const open = searchPanel.hidden; searchPanel.hidden = !open; searchButton.setAttribute('aria-expanded', String(open)); if (open) searchInput?.focus(); });
	searchClose?.addEventListener('click', () => { closeSearch(); searchButton?.focus(); });
	document.addEventListener('keydown', (event) => { if (event.key === 'Escape') closeSearch(); });
	document.querySelectorAll('.copy-link').forEach((button) => button.addEventListener('click', async () => { const original = button.textContent; try { await navigator.clipboard.writeText(button.dataset.copyUrl || window.location.href); button.textContent = 'Copied'; } catch { button.textContent = 'Copy unavailable'; } window.setTimeout(() => { button.textContent = original; }, 1800); }));
})();
