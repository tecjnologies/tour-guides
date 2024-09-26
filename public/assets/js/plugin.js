function loadSlickCSS() {
    var link = document.createElement('link');
    link.href = '{{ asset("assets/plugins/slick/slick.css") }}';
    link.rel = 'stylesheet';
    document.head.appendChild(link);

    var themeLink = document.createElement('link');
    themeLink.href = '{{ asset("assets/plugins/slick/slick-theme.css") }}'; 
    themeLink.rel = 'stylesheet';
    document.head.appendChild(themeLink);
}

function loadSlickJS() {
    var script = document.createElement('script');
    script.src = '{{ asset("assets/plugins/slick/slick.js") }}';
    script.onload = function () {
        $('.your-slider-class').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            dots: true,
            arrows: true,
            centerMode: true
        });
    };
    document.body.appendChild(script);
}

loadSlickCSS();
loadSlickJS();