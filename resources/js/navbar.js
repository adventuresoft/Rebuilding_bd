export function initNavbar() {
    const nav = document.querySelector('[data-jf-nav]');

    if (!nav) {
        return;
    }

    const toggle = nav.querySelector('[data-jf-nav-toggle]');

    if (!toggle) {
        return;
    }

    toggle.addEventListener('click', () => {
        const isOpen = nav.classList.toggle('is-open');
        toggle.setAttribute('aria-expanded', String(isOpen));
    });
}
