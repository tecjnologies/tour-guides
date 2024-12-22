<x-website-layout>
    @section('title', 'Tour Guide - Terms and Conditions')
    <x-website.footer.footer-section>
        <div class="row">
            <div class="col-md-12 px-5 _terms_and_conditions {{ $about->content ?? 'no-content' }}">
                <div class="p-6 text-gray-900">
                    {!! $about->content ??  '<span> No content found </span>' !!}
                </div>
            </div>
        </div>
    </x-website.footer.footer-section>  
</x-website-layout>