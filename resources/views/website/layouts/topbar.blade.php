<div class="flex justify-between items-center auto sm:px-6 _topbar py-3">
  <div>
    <select class="border rounded">
      <option value="option1" class="font-5 display-16 color-blue">  {{ __('website.TOPBAR.CUSTOMER_SERVICE') }} </option>
    </select>
  </div>
 <div class="_more_than">
    <h2 class="font-2 display-16 color-blue">
      {{ __('website.TOPBAR.MORE_THAN_HEADING') }}
    </h2>
  </div>
  <div class="flex">
    {{-- <div class="langugae d-flex justify-content-start  align-items-center me-4">
      <img src="{{ asset('assets/images/icons/language.svg') }}" alt="Language" />
      <select class="border rounded">
        <option value="en"  class="font-5 display-16 color-blue">English</option>
        <option value="ar" class="font-5 display-16 color-blue">Arabic</option>
      </select>
    </div> --}}
    <div class="language d-flex justify-content-start align-items-center me-4">
      <img src="{{ asset('assets/images/icons/language.svg') }}" alt="Language" />
      <select class="border rounded" onchange="location = this.value;">
          <option value="{{ route('language.switch', 'en') }}" 
                  class="font-5 display-16 color-blue" 
                  {{ Session::get('locale') === 'en' ? 'selected' : '' }}>{{ __('website.TOPBAR.ENGLISH') }}</option>
          <option value="{{ route('language.switch', 'ar') }}" 
                  class="font-5 display-16 color-blue" 
                  {{ Session::get('locale') === 'ar' ? 'selected' : '' }}>{{ __('website.TOPBAR.ARABIC') }}</option>
      </select>
  </div>
  <div class="currency d-flex justify-content-start align-items-center me-2">
    <img src="{{ asset('assets/images/icons/currency.svg') }}" alt="currency" />
    <select class="border rounded" id="currency-select">
        <option value="USD" class="font-5 display-16 color-blue" {{ session('currency') === 'USD' ? 'selected' : '' }}>USD</option>
        <option value="AED" class="font-5 display-16 color-blue" {{ session('currency') === 'AED' ? 'selected' : '' }}>AED</option>
    </select>
</div>
  </div>
</div>
<hr  class="m-0 p-0"/>

@push('scripts')

<script>
  document.getElementById('currency-select').addEventListener('change', function() {
      let selectedCurrency = this.value;

      fetch('/set-currency', {
          method: 'POST',
          headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          body: JSON.stringify({ currency: selectedCurrency })
      })
      .then(response => {
          if (!response.ok) {
              throw new Error('Network response was not ok');
          }
          return response.json();
      })
      .then(data => {
          console.log(data); 
          if (data.success) {
              location.reload();
          } else {
              console.error('Failed to set currency:', data.message);
          }
      })
      .catch(error => {
          console.error('Error:', error);
      });
  });
  </script>
    
@endpush