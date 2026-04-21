const btnDark = document.getElementById('btn-dark');

btnDark.addEventListener('change', () => {
    document.body.classList.toggle('dark-mode-active', btnDark.checked);
});