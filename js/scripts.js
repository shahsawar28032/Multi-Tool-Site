// Theme Toggle Functionality
document.addEventListener('DOMContentLoaded', function() {
    const themeToggle = document.getElementById('themeToggle');
    const sunIcon = themeToggle.querySelector('.bi-sun-fill');
    const moonIcon = themeToggle.querySelector('.bi-moon-fill');
    const themeLabel = themeToggle.querySelector('.theme-label');
    
    // Initialize from localStorage
    const currentTheme = localStorage.getItem('theme') || 'light';
    document.body.setAttribute('data-theme', currentTheme);
    
    // Set initial icons
    if (currentTheme === 'dark') {
        moonIcon.classList.add('d-none');
        sunIcon.classList.remove('d-none');
        themeLabel.textContent = 'Light Mode';
    } else {
        sunIcon.classList.add('d-none');
        moonIcon.classList.remove('d-none');
        themeLabel.textContent = 'Dark Mode';
    }
    
    // Toggle theme
    themeToggle.addEventListener('click', function() {
        const currentTheme = document.body.getAttribute('data-theme');
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
        
        // Update UI
        document.body.setAttribute('data-theme', newTheme);
        if (newTheme === 'dark') {
            moonIcon.classList.add('d-none');
            sunIcon.classList.remove('d-none');
            themeLabel.textContent = 'Light Mode';
        } else {
            sunIcon.classList.add('d-none');
            moonIcon.classList.remove('d-none');
            themeLabel.textContent = 'Dark Mode';
        }
        
        // Save to localStorage and cookie
        localStorage.setItem('theme', newTheme);
        document.cookie = `site_theme=${newTheme}; path=/; max-age=${60*60*24*365}`;
    });
});

// Offline Download Functionality
function downloadTool() {
    // Get the current page's HTML
    const htmlContent = document.documentElement.outerHTML;
    
    // Create a Blob with the HTML content
    const blob = new Blob([htmlContent], { type: 'text/html' });
    
    // Create download link
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = `${document.title.replace(/\s+/g, '-').toLowerCase()}-offline.html`;
    
    // Trigger download
    document.body.appendChild(a);
    a.click();
    
    // Cleanup
    setTimeout(() => {
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    }, 100);
}