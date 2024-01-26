// theme-switch.js
document.addEventListener('DOMContentLoaded', function () {
    const themeToggleBtn = document.getElementById('themeToggleBtn');
    const body = document.body;
    let currentTheme = localStorage.getItem('theme') || 'light';

    // Apply the current theme on page load
    applyTheme(currentTheme);

    // Event listener for theme toggle button
    themeToggleBtn.addEventListener('click', function () {
        currentTheme = currentTheme === 'light' ? 'dark' : 'light';
        applyTheme(currentTheme);
        localStorage.setItem('theme', currentTheme);
    });

    // Function to apply the selected theme
    function applyTheme(theme) {
        // Remove existing theme classes
        body.classList.remove('theme-light', 'theme-dark');

        // Add the class for the selected theme
        body.classList.add('theme-' + theme);
    }
});
