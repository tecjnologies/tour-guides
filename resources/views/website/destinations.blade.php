<style>
    textarea:focus, select:focus {
        outline: unset !important;  
        --tw-ring-color: unset !important;
        --tw-ring-shadow: unset !important;
    }

    .place img.place-image {
        width: 100%;
        aspect-ratio: 3 / 2;
        object-fit: contain;
    }


    .tab-content>.active{
        display: flex !important;
        flex-wrap: wrap;
        row-gap: 112px;
    }

</style>

<x-website-layout>
    @section('title', 'Tour Guide - Destinations')
    <div class="row px-5 _popular_destinations">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            {{-- Tabs --}}
            <div class="tabs">
                <ul class="nav nav-tabs" id="destinationsTab" role="tablist">
                    @php $activeTabSet = false; @endphp
                    @foreach ($placeTypes as $type)
                        @if ($type->places->isNotEmpty())
                            <li class="nav-item" role="presentation">
                                <button class="nav-link font-4 display-16 color-black {{ !$activeTabSet ? 'active' : '' }}" 
                                    id="type-{{ $type->id }}-tab" 
                                    data-bs-toggle="tab" 
                                    data-bs-target="#type-{{ $type->id }}" 
                                    type="button" 
                                    role="tab" 
                                    aria-controls="type-{{ $type->id }}" 
                                    aria-selected="{{ !$activeTabSet ? 'true' : 'false' }}">
                                    {{ $type->name }}
                                </button>
                                @php $activeTabSet = true; @endphp
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>

            {{-- Filters --}}
            <div class="filters d-flex justify-content-end align-items-center">
                {{-- Emirates Filter --}}
                <div class="emirates d-flex justify-content-between align-items-center rounded-md px-3 py-2 border border-gray-300 me-md-3">
                    <img src="{{ asset('assets/images/icons/sort.svg') }}" alt="sort-icon" class="sort-icon me-2" />
                    <select id="emirates" name="emirates" class="w-full border-0 font-4 display-16 color-black">
                        <option value="">All Emirate</option>
                        <option value="abu_dhabi">Abu Dhabi</option>
                        <option value="dubai">Dubai</option>
                        <option value="sharjah">Sharjah</option>
                        <option value="umm_al_quwain">Umm al Quwain</option>
                        <option value="ajman">Ajman</option>
                        <option value="ras_al_khaimah">Ras al Khaimah</option>
                    </select>
                </div>

                {{-- Sort Filter --}}
                <div class="sort d-flex justify-content-between align-items-center rounded-md px-3 py-2 border border-gray-300">
                    <img src="{{ asset('assets/images/icons/sort.svg') }}" alt="sort-icon" class="sort-icon me-2" />
                    <select name="sort" class="w-full border-0">
                        <option value="">Sort results</option>
                        <option value="asc">Ascending</option>
                        <option value="desc">Descending</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="spcaer my-4"></div>
        {{-- Tab Content --}}
        <div class="col-md-12">
            <div class="tab-content" id="destinationsTabContent">
                @php $activePaneSet = false; @endphp
                @foreach ($placeTypes as $type)
                    @if ($type->places->isNotEmpty())
                        <div class="tab-pane fade {{ !$activePaneSet ? 'show active' : '' }}" 
                             id="type-{{ $type->id }}" 
                             role="tabpanel" 
                             aria-labelledby="type-{{ $type->id }}-tab">
                            @foreach ($type->places as $place)
                                <div class="col-md-3 mb-5">
                                    <a href="{{ route('show.destination', $place->id) }}">
                                        <div class="place image">
                                            <img src="{{ $place->image }}" alt="{{ $place->name }}" class="_place_image" />
                                            <a href="javascript:void(0);" class="toggle-favorite"
                                                data-place-id="{{ $place->id }}">
                                                @if ($place->is_favorite)
                                                    <img src="{{ asset('assets/images/icons/favourites.svg') }}"
                                                        alt="like-dislike" class="_like_dislike" />
                                                @else
                                                    <img src="{{ asset('assets/images/icons/favourites-gray.svg') }}"
                                                        alt="like-dislike" class="_like_dislike" />
                                                @endif
                                            </a> 
                                            <div class="spacer my-3"></div>
                                            <h3 class="font-2 display-20 {{ $loop->first ? '' :  'ps-4'}}"> {{ $place->name }} </h3>
                                            <p class="{{ $loop->first ? '' :  'ps-4'}}"> {{ $place?->district?->name }} </p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        @php $activePaneSet = true; @endphp
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    
    @push('scripts')
        <script>
            $(document).on('click', '.toggle-favorite', function(e) {
                e.preventDefault();
                const placeId = $(this).data('place-id') || null;
                const guideId = $(this).data('guide-id') || null;
                const $icon = $(this).find('img');
                $.ajax({
                    url: "{{ route('toggle-favorite') }}",
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        place_id: placeId,
                        guide_id: guideId
                    },
                    success: function(response) {
                        Swal.fire({
                            title: 'Success!',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
    
                        if ($icon.attr('src') === '{{ asset('assets/images/icons/favourites.svg') }}') {
                            $icon.attr('src', '{{ asset('assets/images/icons/favourites-gray.svg') }}');
                        } else {
                            $icon.attr('src', '{{ asset('assets/images/icons/favourites.svg') }}');
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 401) {
                            window.location.href = "{{ route('login') }}";
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: xhr.responseJSON?.message || 'Something went wrong',
                                icon: 'error',
                                confirmButtonText: 'Cancel'
                            });
                        }
                    }
                });
            });
        </script>
    @endpush
</x-website-layout>
