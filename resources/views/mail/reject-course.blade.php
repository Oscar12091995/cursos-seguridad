  <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
      <h1>Rechazo de Curso!</h1>
        <p>El curso <strong>{{$course->title}}</strong> no se ha aprobado</p>
        <h2>Motivo:</h2>
        {!!$course->observation->body!!}
    </body>
    </html>