$(document).ready(function() {

    $('.popular-destinations').slick({
        dots: false,
        infinite: true,
        autoplay: true,
        arrows: false,
        centerMode: false,
        centerPadding: '0px',
        autoplaySpeed: 3000,
        slidesToShow: 6,
        slidesToScroll: 6,
        responsive: [
            {
                breakpoint: 1455,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 1
                }
            },
            
            {
                breakpoint: 1040,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
           
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.top-destinations-slider').slick({
        infinite: true,
        autoplay: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1455,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 1040,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
           

            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });


    $('.recent-reviews-slider').slick({
        dots: false,
        infinite: true,
        autoplay: true,
        arrows: false,
        centerMode: false,
        centerPadding: '0px',
        autoplaySpeed: 3000,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1290,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.vipservices-slider').slick({
        dots: false,
        infinite: true,
        autoplay: false,
        arrows: false,
        autoplaySpeed: 3000,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 1290,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.tourguide-slider').slick({
        dots: false,
        infinite: true,
        autoplay: false,
        arrows: false,
        autoplaySpeed: 3000,
        slidesToShow: 6,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1455,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 1
                }
            },
            
            {
                breakpoint: 1040,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
           
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });


    $(function() {
        $(".date").datepicker({
            dateFormat: "dd-mm-yy",
            duration: "fast"
        });
    });

});

function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

window.addEventListener('scroll', () => {
    const scrollButton = document.querySelector('#scrollToTopButton');
    if (window.scrollY > 300) {
        scrollButton.style.display = 'block';
    } else {
        scrollButton.style.display = 'none';
    }
});

const resetBtn = document.getElementById('resetBtn');
if (resetBtn) {
    resetBtn.addEventListener('click', function() {
        var form = document.getElementById('tour-guide-form');
        form.reset();
    });
}

$(document).on('click', '.toggle-favorite', function (e) {
    e.preventDefault();
    
    const placeId = $(this).data('place-id') || null;
    const guideId = $(this).data('guide-id') || null;
    const $icon = $(this).find('img');
    const favoriteIcon = $(this).data('favorite-icon');
    const unfavoriteIcon = $(this).data('unfavorite-icon');

    $.ajax({
        url: '/toggle-favorite',
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            place_id: placeId,
            guide_id: guideId,
        },
        success: function (response) {
            Swal.fire({
                title: 'Success!',
                text: response.message,
                icon: 'success',
                confirmButtonText: 'OK',
            });

            if ($icon.attr('src') === favoriteIcon) {
                $icon.attr('src', unfavoriteIcon);
            } else {
                $icon.attr('src', favoriteIcon);
            }
        },
        error: function (xhr) {
            if (xhr.status === 401) {
                window.location.href = '/login';
            } else {
                Swal.fire({
                    title: 'Error!',
                    text: xhr.responseJSON?.message || 'Something went wrong',
                    icon: 'error',
                    confirmButtonText: 'Cancel',
                });
            }
        },
    });
});

$('.slick-prev-custom').on('click', function() {
    const sliderId = $(this).data('slider');
    $('#' + sliderId).slick('slickPrev');
});

$('.slick-next-custom').on('click', function() {
    const sliderId = $(this).data('slider');
    $('#' + sliderId).slick('slickNext');
});

const toggleButtons = document.querySelectorAll('.toggle-btn');
toggleButtons.forEach(button => {
    button.addEventListener('click', () => {
        if (button.classList.contains('active')) {} else {
            toggleButtons.forEach(btn => {
                btn.classList.remove('active');
            });
            button.classList.add('active');
        }
    });
});

document.querySelectorAll('.share-button').forEach(button => {
    button.addEventListener('click', function() {
        const profileUrl = window.location.href;

        if (navigator.share) {
            navigator.share({
                title: 'Check out this Tour Guide Profile!',
                text: 'Check out this amazing tour guide profile:',
                url: profileUrl,
            })
            .then(() => console.log('Profile shared successfully!'))
            .catch((error) => console.error('Error sharing profile:', error));
        } else {
            copyToClipboard(profileUrl);
            alert('Profile URL copied to clipboard: ' + profileUrl);
        }
    });
});

function copyToClipboard(text) {
    const tempInput = document.createElement('input');
    tempInput.style.position = 'absolute';
    tempInput.style.left = '-9999px';
    tempInput.value = text;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand('copy');
    document.body.removeChild(tempInput);
}