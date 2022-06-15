@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h1>Administración</h1>
@stop


@section('content')
<div class="row">        
    <div class="col-lg-3 col-6">
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{ $users_count }}</h3>
                <p>Usuarios Registrados</p>
            </div>
            <div class="icon">
                <i class="fas fa-user text-light"></i>
            </div>
            <a href="{{route('admin.users.index')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $courses_count}}</h3>
                <p>Cursos Totales</p>
            </div>
            <div class="icon">
                <i class="fas fa-laptop text-light"></i>
            </div>
            <a href="{{route('admin.courses-list.index')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>

        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{ $coursespend_count }}</h3>
                <p>Cursos por aprobar</p>
            </div>
            <div class="icon text-blue-700">
                <i class="fas fa-check text-light"></i>
            </div>
            <a href="{{route('admin.courses.index')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $exams_count }}</h3>
                <p>Exámenes totales</p>
            </div>
            <div class="icon text-blue-700">
                <i class="fas fa-award text-dark"></i>
            </div>
            <a href="{{route('quizzes.index')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

<h2>Información instructores</h2>
   
<div class="row">
    @foreach ($teachers_count as $teacher)
        <div class="col-md-4">
            <div class="card card-widget widget-user-2">
    
                <div class="widget-user-header bg-purple">
                    <div class="widget-user-image">
                        <img class="img-circle elevation-2" src="{{$teacher->profile_photo_url}}" alt="User Avatar">
                    </div>
                
                    <h3 class="widget-user-username font-bold">{{$teacher->name}}</h3>
                    <h5 class="widget-user-desc">{{$teacher->apellidos}}</h5>
                </div>
                <div class="card-footer p-0">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link text-dark">
                            Número de telefono <span class="float-right badge bg-primary">{{$teacher->telefono}}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark">
                            Correo <span class="float-right badge bg-danger">{{$teacher->email}}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark">
                            Cursos totales <span class="float-right badge bg-success">{{$teacher->courses_dictated()->count()}}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
</div>
   
  {{-- <canvas id="myChart" width="400" height="100"></canvas> --}}
@stop

@section('js')

{{-- <script>
    var cursados=[];
    var valor =[];
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script> --}}

@stop