const systemTheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
const userTheme = localStorage.getItem('theme') || systemTheme;
const authStylesheet = document.querySelector('[data-bs-theme]');
const stylesheet = document.querySelectorAll('.theme-stylesheet');

// Function to apply a theme
function applyTheme(theme) {

    if (theme === 'system') {
        theme = systemTheme;
    }

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
        }
    });
    // Update the auth theme if applicable
    document.documentElement.setAttribute('data-bs-theme', theme);

    // Save the selected theme to localStorage
    localStorage.setItem('theme', theme);
}
// Apply the user's preferred theme on page load
applyTheme(userTheme);


// 



