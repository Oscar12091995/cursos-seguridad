<div>

    <h1 class="font-bold text-2xl mb-4">Estudiantes del Curso</h1>
    <x-table-responsive>
        <div class="px-6 py-4 flex">
          <input wire:model="search" type="search" name="search" placeholder="Search" class="w-full  bg-white h-10 px-5 pr-10 rounded-full text-sm focus:outline-none">          
          
        </div>
        @if ($students->count())
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Nombre
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Puesto
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Email
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Telefono
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Constancia
                    </th>                 
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">

                @foreach ($students as $student)
                    
                
              <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                          <div class="">
                            <div class="text-sm font-medium text-gray-900">
                                {{$student->name}} <br> {{$student->apellidos}}
                            </div>
                          </div>
                      </div>
                    </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900 text-center">{{$student->puesto}}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900 text-center">{{$student->email}}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900 flex item-center ml-2">{{$student->telefono}}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{route('instructor.generate-pdf', ['course' => $course->id, 'student' => $student->id] )}}" class="text-indigo-600 hover:text-indigo-900">Constancia</a>
                </td>
              </tr>
              @endforeach
              <!-- More people... -->
            </tbody>
          </table>

          <div class="px-6 py-4">
            {{$students->links()}}
          </div>

            
        @else
            <div class="px-6 py-4">
                No hay ningun registro
            </div>
        
        @endif
    </x-table-responsive>
</div>