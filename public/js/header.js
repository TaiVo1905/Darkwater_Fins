let lastScrollY = window.scrollY;
window.addEventListener('scroll', function() {
    var header = document.querySelector('.header_container');
    if (window.scrollY > lastScrollY) {
        // Cuộn xuống
        header.classList.add('scrolled');
    } else {
        // Cuộn lên
        header.classList.remove('scrolled');
    }
    lastScrollY = window.scrollY;
});