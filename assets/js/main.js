document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.read-more-btn').forEach(function (button) {
        button.addEventListener('click', function () {
            const wrapper = button.closest('.agenda-description-wrap');
            const isExpanded = wrapper.classList.toggle('is-expanded');

            button.textContent = isExpanded ? 'Read Less' : 'Read More';
            button.setAttribute('aria-expanded', isExpanded ? 'true' : 'false');
        });
    });
});
