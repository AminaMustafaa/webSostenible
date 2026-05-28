//Dark mode
const btnDark = document.getElementById('btn-dark');

if (btnDark) {
    const saved = localStorage.getItem('darkMode') !== 'false';
    if (saved) {
        document.body.classList.add('dark-mode-active');
        btnDark.checked = true;
    }

    btnDark.addEventListener('change', () => {
        const on = btnDark.checked;
        document.body.classList.toggle('dark-mode-active', on);
        localStorage.setItem('darkMode', on);
    });
}
