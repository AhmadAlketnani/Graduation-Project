const authTheme = document.querySelector('[data-bs-theme]');
const themeSwitcher = document.querySelectorAll('[data-theme]');
const stylesheet = document.querySelectorAll('.theme-stylesheet');
const userTheme = localStorage.getItem('theme') || 'system';

// Function to apply a theme
function applyTheme(theme) {
    stylesheet.forEach(item => {
        let currentHref = item.getAttribute('href');

        if (theme === 'dark') {
            if (!currentHref.includes('-dark')) {
                currentHref = currentHref.replace('.css', '-dark.css');
                item.setAttribute('href', currentHref);
            }
        } else if (theme === 'light') {
            if (currentHref.includes('-dark')) {
                currentHref = currentHref.replace('-dark.css', '.css');
                item.setAttribute('href', currentHref);
            }
        } else if (theme === 'system') {
            applyTheme(window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
        }
    });

    // Update the auth theme if applicable
    authTheme.setAttribute('data-bs-theme', theme);

    // Save the selected theme to localStorage
    localStorage.setItem('theme', theme);
}
// Apply the user's preferred theme on page load
applyTheme(userTheme);

// Add event listeners to theme switcher buttons
themeSwitcher.forEach(item => {
    item.addEventListener('click', function () {
        const theme = this.getAttribute('data-theme');
        applyTheme(theme);
    });
});

