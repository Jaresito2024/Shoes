const dropdown = document.getElementById('userDropdown');
    if (dropdown) {
        const menu = dropdown.nextElementSibling;
        dropdown.addEventListener('mouseover', () => {
            menu.style.display = 'block';
        });
        dropdown.parentElement.addEventListener('mouseleave', () => {
            menu.style.display = 'none';
        });
    }