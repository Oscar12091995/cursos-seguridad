<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
{{-- <div class="mt-12 flex bg-white rounded-lg shadow-lg overflow-hidden mx-auto max-w-sm lg:max-w-4xl ">
    <div class="hidden lg:block lg:w-1/2 bg-cover" style="background: url('images/inicio/security-element-1582318_640.jpg')"></div>
      <div class="w-full p-8 lg:w-1/2">
        <div>
            {{ $logo }}
        </div>

        <div>
            {{ $slot }}
        </div>
      </div>
</div>
 --}}