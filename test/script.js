document.addEventListener('DOMContentLoaded', function() {
    const avatarIcon = document.querySelector('.avatar');
    const popup = document.getElementById('popup');
  
    // Mostra/nascondi il popup quando si clicca sull'icona dell'avatar
    avatarIcon.addEventListener('click', function() {
      popup.style.display = popup.style.display === 'block' ? 'none' : 'block';
    });
  
    // Chiudi il popup se si clicca al di fuori di esso
    document.addEventListener('click', function(event) {
      if (!popup.contains(event.target) && event.target !== avatarIcon) {
        popup.style.display = 'none';
      }
    });
  
    // Funzionalità per il cambio tema
    const themeToggle = document.querySelector('.theme-toggle');
    themeToggle.addEventListener('click', function() {
      document.body.classList.toggle('dark-theme');
    });
  });
  