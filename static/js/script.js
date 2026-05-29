// Dark mode
const btnDark = document.getElementById('btn-dark');

const saved = localStorage.getItem('darkMode') !== 'false';
if (saved) {
    document.documentElement.classList.add('dark-mode-active');
    if (btnDark) btnDark.checked = true;
}

if (btnDark) {
    btnDark.addEventListener('change', () => {
        const on = btnDark.checked;
        document.documentElement.classList.toggle('dark-mode-active', on);
        localStorage.setItem('darkMode', on);
    });
}