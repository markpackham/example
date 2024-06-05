<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>

    <h2 class="font-bold text-lg">{{$job->title}}</h2>

    {{-- When using the Eloquent ORM you can use both array keys eg $job['salary'] or properties $job->salary --}}
    {{-- Just be consistant with which one you use --}}
    {{-- Currently accessing via properties is the most trendy way to do things --}}
    <p>This job pays {{$job->salary}} per year.</p>

    <p class="mt-6">
        <x-button href="/jobs/{{$job->id}}/edit">Edit Job</x-button>
    </p>
</x-layout>