<x-layout>
    <x-slot:heading>
      Log In
    </x-slot:heading>
  
    <p class="mb-2">Demo user for login & password - z@email.com</p>

    <form method="POST" action="/login">
      @csrf
  
      <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12"> 
          <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
  
            <x-form-field>
                <x-form-label for="title">Email</x-form-label>
                <div class="mt-2">
                  {{-- The "old" attribute function provided by Laravel does what's expected but you must have
                  ":" on value so :value otherwise you just end up with a string literally called "old('email')" --}}
                  <x-form-input name="email" id="email" type="email" :value="old('email')" required></x-form-input>
                  <x-form-error name="email" />
                </div>
              </x-form-field>

              <x-form-field>
                <x-form-label for="password">Password</x-form-label>
                <div class="mt-2">
                  <x-form-input name="password" id="password" type="password" required></x-form-input>
                  <x-form-error name="password" />
                </div>
              </x-form-field>
  
          </div>
  
          <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <x-form-button>Log In</x-form-button>
          </div>
    </form>
  
  </x-layout>