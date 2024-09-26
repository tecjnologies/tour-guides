<div class="slider-container">    
    {{ $slot }}
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.slick-slider').slick(@json($options));
        });

        // Bind custom buttons to the respective slick sliders
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