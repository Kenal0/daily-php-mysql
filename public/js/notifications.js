const btn = document.getElementById('notifications-btn');
const dropdown = document.getElementById('notifications-dropdown');

btn.addEventListener('click', () => {
    dropdown.classList.toggle('hidden');
});

document.addEventListener('click', (e) => {
    if (!btn.contains(e.target) && !dropdown.contains(e.target)) {
        dropdown.classList.add('hidden');
    }
});