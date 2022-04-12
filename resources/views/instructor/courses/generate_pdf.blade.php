<!DOCTYPE html>
<html>
  
<head>
    <title>Generate Pdf</title>
    <style>
      body{
        margin: 10% 15% 10% 15%;
      }
      .titulo{
        text-align: center;
        font-size: 12pt;
        font: bold;
        font-family: 'Times New Roman', Times, serif;
        margin: auto;
        color: black;
        padding-top: 2px;
        padding-bottom: 2px;
        margin: 10 0 10 0;
      }
      .encabezados{
        text-align: center;
        font-size: 14pt;
        font: bold;
        font-family: 'Times New Roman', Times, serif;
        margin: auto;
        color: black;
        padding-top: 2px;
        padding-bottom: 2px;
        margin: 10 0 10 0;
      }
      .subtitulo{
        text-align: center;
        font-size: 14pt;
        font-family: 'Times New Roman', Times, serif;
        margin: auto;
        color: black;
        padding-top: 2px;
        padding-bottom: 2px;
        margin: 10 0 10 0;
      }
      .curso{
        text-align: center;
        font-size: 16pt;
        font: bold;
        font-family: 'Times New Roman', Times, serif;
        margin: auto;
        color: black;
        padding-top: 2px;
        padding-bottom: 2px;
        margin: 10 0 10 0;
      }
      .parrafo{
        text-align: center;
        font-size: 10pt;
        font-family: 'Times New Roman', Times, serif;
        margin: auto;
        color: black;
        padding-top: 2px;
        padding-bottom: 2px;
        margin: 10 0 10 0;
      }
      .letras{
        text-align: center;
        font-size: 8pt;
        font-family: 'Times New Roman', Times, serif;
        margin: auto;
        color: black;
        padding-top: 2px;
        padding-bottom: 2px;
        margin: 10 0 10 0;
      }
    </style>
    
</head>
<body>
  <section style="margin-bottom: 40px">
      {{-- seccion de arriba --}}
      {{-- <img src="{!!asset('storage/'.$course->image->url)!!}" style="width: 4.29cm; height: 1.26cm; display:fill; margin: 0 0 10 0; float: left;" alt=""> --}}
    <img src="{!! asset('images/Islander JPG.jpg') !!}" style="width: 4.29cm; height: 1.26cm; display:fill; margin: 0 0 10 0; float: right;" alt="">
    <br>
  </section>

      <div>
        <div class="titulo">
          CONSTANCIA DE COMPETENCIAS O DE HABILIDADES LABORALES
        </div>
      </div>
      <div class="encabezados">
        {{$student->empresa}}
      </div>
      <div class="subtitulo">
        RFC: <b>{{$student->rfc}}</b>
      </div>

      <div class="subtitulo">
        Se otorga la presente a:
      </div>  

      <div class="encabezados">
        {{$student->name}} {{$student->apellidos}}
      </div>  

      <div class="subtitulo">
        CURP: <b>{{$student->curp}}</b>
      </div>

      <div class="subtitulo">
        Ocupación: {{$student->ocupacion}}
      </div>

      <div class="subtitulo">
        Puesto: {{$student->puesto}}
      </div>

      <div class="titulo">
        Por haber aprobado el curso:
      </div>

      <div class="curso">
        {{$course->title}}
      </div>
      <div class="parrafo">
        creado con la fecha {{$course->created_at->format('d-m-Y')}} con una duración de {{$course->hcourse}} 
        horas, dentro del Área temática de {{$course->atematic}}.
      </div>
      <div class="letras">
        Los datos se asientan en esta constancia bajo protesta de decir verdad, apercibido de la responsabilidad de que incurre todo aquel 
        que no se conduce con verdad
      </div>

      <div class="letras">
        Agente Capacitador: DGC Representantes de la Comisión Mixta de Capacitación, Adiestramiento y Productividad
      </div>

      <div style="margin-top: 30%; font-size: 10pt;">
        <div style="float: left">
          Patrón o representante legal
        </div>
        <div style="float: right">
          Representate de los trabajadores
        </div>
      </div>

      <div style="margin-top: 20%; font-size: 10pt; text-align: center;">
        Capacitador
      </div>
 
</body>
</html>