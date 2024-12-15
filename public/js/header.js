window.addEventListener('scroll', function() {
    var header = document.querySelector('.header_container');
    if (window.scrollY < 80) {
        header.classList.remove('scrolled');
        // Cuộn xuống
    } else {
        header.classList.add('scrolled');
        // Cuộn lên
    }
});