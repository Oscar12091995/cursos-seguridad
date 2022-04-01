<x-instructor-layout :course="$course">
    <h1 class="text-2xl font-bold">Observaciones sobre este curso</h1>
    <hr class="mb-6 mt-2">

    <div class="text-gray-500">
        {!!$course->observation->body!!}
    </div>
</x-instructor-layout>
    