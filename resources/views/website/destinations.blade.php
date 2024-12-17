<style>
    textarea:focus, select:focus{
        outline: unset !important;  
        --tw-ring-color: unset !important;
        --tw-ring-shadow: unset !important;
    }
</style>

<x-website-layout>
    @section('title', 'Tour Guide - Destinations')
    <div class="row px-5">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <div class="tabs">
                <ul class="nav nav-tabs" id="destinationsTab" role="tablist">
                    @forelse ($placeTypes as $type)
                        @if( $type->places->count() > 0)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="type-{{$type->id}}-tab" data-bs-toggle="tab" data-bs-target="#type-{{$type->id}}" type="button" role="tab" 
                                aria-controls="type-{{$type->id}}" aria-selected="true"> {{ $type->name }} </button>
                            </li>
                        @else 
                        @endif
                    @empty
                    @endforelse
                  </ul>
            </div>
            <div class="filters d-flex justify-content-end align-items-center">
                <div class="emirates d-flex justify-content-between align-items-center rounded-md px-3 py-2 border border-gray-300 me-md-3">
                        <img src="{{ asset('assets/images/icons/sort.svg') }}" alt="sort-icon" class="sort-icon me-2" />
                        <select id="emirates" name="emirates" class="w-full  border-0">
                            <option value="" class="font-5 displaty-14 color-blue">All Emirate</option>
                            <option value="abu_dhabi" class="font-5 displaty-14 color-blue">Abu Dhabi</option>
                            <option value="dubai" class="font-5 displaty-14 color-blue">Dubai</option>
                            <option value="sharjah" class="font-5 displaty-14 color-blue">Sharjah</option>
                            <option value="umm_al_quwain" class="font-5 displaty-14 color-blue">Umm al Quwain</option>
                            <option value="ajman" class="font-5 displaty-14 color-blue">Ajman</option>
                            <option value="ras_al_khaimah" class="font-5 displaty-14 color-blue">Ras al Khaimah</option>
                        </select>
                </div>
                <div class="sort d-flex justify-content-between align-items-center rounded-md border px-3 py-2 border-gray-300">
                    <img src="{{ asset('assets/images/icons/sort.svg') }}" alt="sort-icon"  class=" sort-icon me-2"/>
                    <select name="sort" class="w-full border-0">
                        <option value="" class="font-5 displaty-14 color-blue">Sort results </option>
                        <option value="asc" class="font-5 displaty-14 color-blue"> Ascending </option>
                        <option value="desc" class="font-5 displaty-14 color-blue"> Descending </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="tab-content" id="destinationsTabContent">
                @forelse ($placeTypes as $type)
                    @forelse ($type->places as $place)
                        @if($place->placetype_id === $type->id)
                            <div class="tab-pane fade show active" id="type-{{$place->placetype_id}}" role="tabpanel" 
                                aria-labelledby="type-{{$place->placetype_id}}-tab"> 
                                
                                {{ $place->name }} 
                            
                            </div>                        
                        @else
                        @endif
                    @empty
                    @endforelse
                @empty
                @endforelse            
            </div>
        </div>
    </div>
</x-website-layout>
