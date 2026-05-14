function showDisclaimer() {
    if (window.location.pathname !== '/') return;
    var o = document.createElement('div');
    o.id = 'disclaimer-overlay';
    o.innerHTML = '<div id="disclaimer-box">' +
        '<h2>⚠️ Disclaimer</h2>' +
        '<p>Website ini dibuat iseng dalam <strong>5 jam</strong> karena gabut. Maaf kalo masih berantakan, hasil gabut 😄</p>' +
        '<button onclick="document.getElementById(\'disclaimer-overlay\').remove()">Oke, lanjut</button>' +
        '</div>';
    document.body.appendChild(o);
}

document.addEventListener('DOMContentLoaded', function () {
    showDisclaimer();
    var toggle = document.getElementById('themeToggle');
    var toggleMobile = document.getElementById('themeToggleMobile');
    var menuToggle = document.getElementById('menuToggle');
    var mobileMenu = document.getElementById('mobileMenu');

    var sun = document.getElementById('sunIcon');
    var moon = document.getElementById('moonIcon');
    var sunM = document.getElementById('sunIconMobile');
    var moonM = document.getElementById('moonIconMobile');

    function setTheme(dark, target) {
        document.body.classList.toggle('dark', dark);
        if (target === 'desktop' || !target) {
            if (sun) sun.classList.toggle('hidden', !dark);
            if (moon) moon.classList.toggle('hidden', dark);
        }
        if (target === 'mobile' || !target) {
            if (sunM) sunM.classList.toggle('hidden', !dark);
            if (moonM) moonM.classList.toggle('hidden', dark);
        }
        localStorage.setItem('theme', dark ? 'dark' : 'light');
    }

    function applyStoredTheme() {
        var dark = localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches);
        setTheme(dark);
    }

    applyStoredTheme();

    if (toggle) {
        toggle.addEventListener('click', function () {
            setTheme(!document.body.classList.contains('dark'), 'desktop');
        });
    }
    if (toggleMobile) {
        toggleMobile.addEventListener('click', function () {
            setTheme(!document.body.classList.contains('dark'), 'mobile');
        });
    }

    if (menuToggle && mobileMenu) {
        menuToggle.addEventListener('click', function () {
            var open = mobileMenu.style.display === 'block';
            mobileMenu.style.display = open ? 'none' : 'block';
            document.getElementById('menuIcon').classList.toggle('hidden', open);
            document.getElementById('closeIcon').classList.toggle('hidden', !open);
        });
    }
});
