<div>
     {{-- vista de cursos --}}
    <div class="mx-12 max-w-8xl ">
        <div class="p-2 rounded">
            <div class="flex flex-col md:flex-row">
                  <div class="md:w-1/4 border-r-2 border-gray-700 p-4">
                        <div class="sticky inset-x-0 top-0 left-0 py-8 mr-2">
                            <div class="text-3xl text-green-400 mb-8">Cursos de seguridad</div>
                            <div class="text-xl text-gray-600">Buscar cursos </div>
                            <div class="relative text-gray-600 mt-4 lg:mr-16">
                                @livewire('course-search')
                            </div>
                            <div class="text-xl text-gray-600 mt-4">Filtrado de cursos</div>
                             <!-- filtrado de todos los cursos -->
                            <button name="cursos" id="cursos" class="bg-white shadow my-4 h-12 px-4 rounded-full mr-4 bg-transparent border-2 border-blue-500 text-black text-lg hover:bg-blue-500 hover:text-gray-100 focus:border-4 focus:border-blue-300" wire:click="resetFilters">
                              <i class="fas fa-globe text-xl  mr-1"></i>
                              Todos los cursos
                            </button>
                            <!-- fin filtrado de todos los cursos -->

                            <!-- radio categorias -->
                            <div class="transition">
                              <div class="accordion-header cursor-pointer transition flex space-x-5 px-5 items-center h-16">
                                  <i class="fas fa-plus"></i>
                                  <h3>Categorias</h3>
                              </div>
                              <div class="accordion-content px-5 pt-0 overflow-hidden max-h-0">
                                @foreach($categories as $category)
                                <div class="">
                                    <label class="text-base space-y-2">
                                      <input type="radio" class="focus:ring-2 focus:ring-blue-300 space-y-2" name="cursos" value="{{$category->id}}" wire:click="$set('category_id', {{$category->id}})">
                                        {{$category->name}}
                                    </label>
                                </div>
                                @endforeach
                              </div>
                            </div>
                             <!-- fin radio categorias -->
                             
                              <!-- Accordion Niveles -->
                              <div class="transition">
                                <div class="accordion-header cursor-pointer transition flex space-x-5 px-5 items-center h-16">
                                    <i class="fas fa-plus"></i>
                                    <h3>Niveles</h3>
                                </div>
                                <div class="accordion-content px-5 pt-0 overflow-hidden max-h-0">
                                  @foreach($levels as $level)
                                  <div class="">
                                      <label class="text-base space-y-2">
                                        <input type="radio" class="focus:ring-2 focus:ring-blue-300 space-y-2" value="{{$level->id}}" wire:click="$set('level_id', {{$level->id}})">
                                          {{$level->name}}
                                      </label>
                                  </div>
                                  @endforeach
                                </div>
                              </div>
                              <!--Fin Accordion Niveles -->
    
                             <!--radio precios -->
                              <div class="transition">
                                  <div class="accordion-header cursor-pointer transition flex space-x-5 px-5 items-center h-16">
                                      <i class="fas fa-plus"></i>
                                      <h3>Precios</h3>
                                  </div>
                                  <div class="accordion-content px-5 pt-0 overflow-hidden max-h-0">
                                    @foreach($prices as $price)
                                    <div class="text-base">
                                      <input type="radio" class="focus:ring-2 focus:ring-blue-300" id="precio" name="precio" value="{{$price->id}}" wire:click="$set('price_id', {{$price->id}})">
                                        <label>                                        
                                            {{$price->name}}
                                        </label>
                                    </div>
                                  @endforeach
                                  </div>
                                </div>
                            <!-- fin radio precios -->
                        </div>
                  </div>
                  <div class="md:w-3/4 py-12 md:pl-8 items-center">
    
                      <div class="max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
                        {{ $courses->links() }}
                      </div>                
                      <div class="bg-white py-10 pb-50">
                        <div class="max-w-7xl mx-auto px-2 sm:px-2 grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-8 mb-16">
                          @foreach ($courses as $course)
                            <x-course-card :course="$course"/>
                          @endforeach
                        </div>
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                            {{ $courses->links() }}
                        </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
</div>

