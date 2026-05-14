document.addEventListener('DOMContentLoaded', function () {
    var toggle = document.getElementById('themeToggle');
    if (!toggle) return;

    var sun = document.getElementById('sunIcon');
    var moon = document.getElementById('moonIcon');

    function setTheme(dark) {
        document.body.classList.toggle('dark', dark);
        if (sun) sun.classList.toggle('hidden', !dark);
        if (moon) moon.classList.toggle('hidden', dark);
        localStorage.setItem('theme', dark ? 'dark' : 'light');
    }

    if (localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        setTheme(true);
    }

    toggle.addEventListener('click', function () {
        setTheme(!document.body.classList.contains('dark'));
    });
});
