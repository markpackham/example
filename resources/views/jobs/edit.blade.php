<x-layout>
  <x-slot:heading>
    Edit Job: {{$job->title}}
  </x-slot:heading>

  <form method="POST" action="/jobs/{{$job->id}}">
    @csrf
    {{-- How we signal to Laravel this is really a PATCH rather than a POST request --}}
    {{-- so it will get routed as a PATCH and not a POST (browsers can only understand POST & GET) --}}
    @method('PATCH')

    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-4">
            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
            <div class="mt-2">
              <div
                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                <input type="text" name="title" id="title" autocomplete="title"
                  class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                  placeholder="Engineer" value="{{$job->title}}" required>
              </div>

              {{-- Only concerns itself with title errors and no other ones --}}
              @error('title')
              <p class="text-red-500 font-semibold mt-1">{{$message}}
              </p>
              @enderror

            </div>
          </div>

          <div class="sm:col-span-4">
            <label for="salary" class="block text-sm font-medium leading-6 text-gray-900">Salary</label>
            <div class="mt-2">
              <div
                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                <input type="text" name="salary" id="salary"
                  class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                  value="{{$job->salary}}" placeholder="$20,000 Per Year" required>
              </div>

              @error('salary')
              <p class="text-red-500 font-semibold mt-1">{{$message}}
              </p>
              @enderror

            </div>
          </div>

          <div class="mt-6 flex items-center justify-between gap-x-6">
            <div class="flex-items-center">
              {{-- We must reference the id of which form we want to respond
              Since you can't have a form that both does Edits & Deletes thus need 2 forms 
              by default a form with no idea provided uses the nearest parent form
              so we don't need to supply a form id for Edit
              --}}
              <button form="delete-form" class="text-red-500 text-sm font-bold">Delete</button>
            </div>

            <div class="flex items-center gap-x-6">
              <a href="/jobs/{{$job->id}}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
              <button type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
            </div>
          </div>
  </form>

 {{-- This form is hidden since it only handles deletes, you don't need to fill it --}}
  <form method="POST" action="/jobs/{{$job->id}}" id="delete-form" class="hidden">
    @csrf
    @method('DELETE')
  </form>
</x-layout>