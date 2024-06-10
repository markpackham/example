<x-layout>
  <x-slot:heading>
    Create Job
  </x-slot:heading>

  <form method="POST" action="/jobs">
    {{-- Cross-Site Request Forgery (CSRF) token generation for Post requests otherwise we get an HTTP 419--}}
    {{-- "HTTP response status code 419 Page Expired is an unofficial client error that is Laravel-specific 
    and returned by the server to indicate that the Cross-Site Request Forgery (CSRF) validation has failed."
    https://http.dev/419 --}}
    @csrf

    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Create a new job</h2>
        <p class="mt-1 text-sm leading-6 text-gray-600">Please fill in your details.</p>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

          <x-form-field>
            <x-form-label for="title">Title</x-form-label>
            <div class="mt-2">
              <x-form-input name="title" id="title" placeholder="CEO" required></x-form-input>
              <x-form-error name="title" />
            </div>
          </x-form-field>

          <x-form-field>
            <x-form-label for="title">Salary</x-form-label>
            <div class="mt-2">
              <x-form-input name="salary" id="salary" placeholder="$10 USD" required></x-form-input>
              <x-form-error name="salary" />
            </div>
          </x-form-field>

        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
          <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
          <x-form-button>Save</x-form-button>
        </div>
  </form>

</x-layout>