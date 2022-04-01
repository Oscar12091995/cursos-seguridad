<x-instructor-layout :course="$course">

    <div>
        @livewire('instructor.courses-quiz', ['course' => $course], key('courses-quiz' . $course->id))
    </div>

</x-instructor-layout>