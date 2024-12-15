
<div class="card p-1">
    <div class="row d-flex justify-content-between align-items-center _text_image_wrapper position-relative" 
        style="background-image: url({{ asset('assets/images/icons/box-before.png') }})">
        <div class="col-md-1"></div>
        <div class="col-md-5">
            <h1 class="font-2 display-20 color-blue">{{ $heading }}</h1>
            <p class="font-4 display-12 color-black"> {{ $text }} </p>
        </div>
        <div class="col-md-6 p-4">
            <img src="{{ $imageUrl }}" alt="image" class="mx-auto"  style="height: 124px"/>
        </div>
    </div>
</div>