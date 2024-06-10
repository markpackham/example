<x-layout>
    <x-slot:heading>
      Create Job
    </x-slot:heading>
  
    <form method="POST" action="/jobs">
      @csrf
  
      <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12"> 
          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
  
            <x-form-field>
              <x-form-label for="first_name">First Name</x-form-label>
              <div class="mt-2">
                <x-form-input name="first_name" id="first_name" required></x-form-input>
                <x-form-error name="first_name" />
              </div>
            </x-form-field>
  
            <x-form-field>
              <x-form-label for="title">Last Name</x-form-label>
              <div class="mt-2">
                <x-form-input name="last_name" id="last_name" required></x-form-input>
                <x-form-error name="last_name" />
              </div>
            </x-form-field>

            <x-form-field>
                <x-form-label for="title">Email</x-form-label>
                <div class="mt-2">
                  <x-form-input name="email" id="email" type="email" required></x-form-input>
                  <x-form-error name="email" />
                </div>
              </x-form-field>
  
          </div>
  
          <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <x-form-button>Register</x-form-button>
          </div>
    </form>
  
  </x-layout>