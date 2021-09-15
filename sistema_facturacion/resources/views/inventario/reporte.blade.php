<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>INVENTARIO</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/reportes.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Empresa "Nombre"</h1>
    </header>
  
        <h2 class="text-center"><strong>Reporte de Inventario</strong></h2>
            <table id="customers">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Fecha de Ingreso</th>
                    <th scope="col">Fecha de Última Revisión</th>
                    <th scope="col">Observación</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach( $inventarios as $inventario)
                  <tr>
                      <td scope="row">{{ $inventario->id_inventario }}</td>
                      <td>{{ $inventario->nombre }}</td>
                      <td>{{ $inventario->descripcion }}</td>
                      <td>{{ $inventario->cantidad }}</td>
                      <td>{{ $inventario->fecha_ingreso }}</td>
                      <td>{{ $inventario->fecha_revision }}</td>
                      <td>{{ $inventario->observacion }}</td>
              
                  </tr>
                  @endforeach
                </tbody>
              </table>
        
    
    <footer>
        <table>
          <tr>
            <td>
                <p class="izq">
                  correo@gmail.com
                </p>
            </td>
            <td>
              <p class="page">
                Página
              </p>
            </td>
          </tr>
        </table>
      </footer>
   

    
</body>
</html>