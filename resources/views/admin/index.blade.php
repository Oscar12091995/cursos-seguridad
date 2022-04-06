@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h1>Administracion</h1>
@stop


@section('content')
<div class="row">
          
    <div class="col-lg-3 col-6">
        <div class="small-box bg-light">
            <div class="inner">
                <h3>{{ $users_count }}</h3>
                <p>Usuarios Registrados</p>
            </div>
            <div class="icon">
                <i class="fas fa-user text-dark"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-light">
            <div class="inner">
                <h3>{{ $courses_count}}</h3>
                <p>Cursos Totales</p>
            </div>
            <div class="icon">
                <i class="fas fa-laptop text-dark"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-light">
            <div class="inner">
                <h3>{{ $coursespend_count }}</h3>
                <p>Cursos por aprobar</p>
            </div>
            <div class="icon text-blue-700">
                <i class="fas fa-check text-dark"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-light">
            <div class="inner">
                <h3>{{ $exams_count }}</h3>
                <p>Exámenes totales</p>
            </div>
            <div class="icon text-blue-700">
                <i class="fas fa-award text-dark"></i>
            </div>
        </div>
    </div>
    
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