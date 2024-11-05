<div class="slider-container">    
    {{ $slot }}
</div>

@push('scripts')
    <script>
        
        $(window.onload = function() {
            $('.slick-slider').slick(@json($options));
        });
        
        $('.slick-prev-custom').on('click', function() {
                const sliderId = $(this).data('slider');
        $('#' + sliderId).slick('slickPrev');
        });

        $('.slick-next-custom').on('click', function() {
            const sliderId = $(this).data('slider');
            $('#' + sliderId).slick('slickNext');
        });

    </script>
@endpush