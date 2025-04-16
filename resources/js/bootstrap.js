import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true,
    encrypted: true,
});
window.Echo.channel('document.' + documentId)
    .listen('.comment.posted', (e) => {
        showToast(`${e.user_name} a commenté`);
        // Insère dynamiquement le commentaire
    });
    window.Echo.private('App.Models.User.' + {{ auth()->id() }})
    .notification((notification) => {
        let list = document.getElementById('notif-list');
        let badge = document.getElementById('notif-count');

        let item = `<li class="dropdown-item">${notification.message}</li>`;
        list.innerHTML = item + list.innerHTML;
        badge.textContent = parseInt(badge.textContent) + 1;

        showToast(notification.message, 'info'); // si tu as le toast visuel
    });

