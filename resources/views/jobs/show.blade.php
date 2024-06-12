<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>

    <h2 class="font-bold text-lg">{{$job->title}}</h2>

    {{-- When using the Eloquent ORM you can use both array keys eg $job['salary'] or properties $job->salary --}}
    {{-- Just be consistant with which one you use --}}
    {{-- Currently accessing via properties is the most trendy way to do things --}}
    <p>This job pays {{$job->salary}} per year.</p>

    {{-- Only the job creator can edit the job --}}
    {{-- User Policy "edit" instead of Gate Facade "edit-job" --}}
    {{-- @can('edit-job', $job) --}}
    {{-- Policy is far better to use on larger projects than Gate --}}
    @can('edit', $job)
    <p class="mt-6">
        <x-button href="/jobs/{{$job->id}}/edit">Edit Job</x-button>
    </p>
    @endcan

</x-layout>