window.addEventListener('scroll', function() {
    if (window.scrollY > 50) {
        document.getElementById('navbar_top').classList.add('fixed');
        // add padding top to show content behind navbar
        navbar_height = document.querySelector('.navbar').offsetHeight;
        document.body.style.paddingTop = navbar_height + 'px';
    } else {
        document.getElementById('navbar_top').classList.remove('fixed');
        // remove padding top from body
        document.body.style.paddingTop = '0';
    }
});
