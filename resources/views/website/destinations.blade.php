<style>
    textarea:focus, select:focus {
        outline: unset !important;  
        --tw-ring-color: unset !important;
        --tw-ring-shadow: unset !important;
    }
</style>

<x-website-layout>
    @section('title', 'Tour Guide - Destinations')
    <div class="row px-5">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            {{-- Tabs --}}
            <div class="tabs">
                <ul class="nav nav-tabs" id="destinationsTab" role="tablist">
                    @php $activeTabSet = false; @endphp
                    @foreach ($placeTypes as $type)
                        @if ($type->places->isNotEmpty())
                            <li class="nav-item" role="presentation">
                                <button class="nav-link {{ !$activeTabSet ? 'active' : '' }}" 
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
                    <select id="emirates" name="emirates" class="w-full border-0">
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
                                <div>{{ $place->name }}</div>
                            @endforeach
                        </div>
                        @php $activePaneSet = true; @endphp
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</x-website-layout>