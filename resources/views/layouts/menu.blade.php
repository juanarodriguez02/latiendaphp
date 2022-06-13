<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('materialize/css/materialize.css')  }}">
</head>
<body>
    <nav class="blue lighten-4">
        <div class="nav-wrapper">
        <a href="#" class="brand-logo">LaTiendaPhp J&N</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="sass.html">Inicio</a></li>
            <li><a href="badges.html">Servicios</a></li>
            <li><a href="collapsible.html">Contactos</a></li>
        </ul>
        </div>
    </nav>
    <h1><marquee behavior="Alternate" bgcolor=#99ccff direction="left">MENÚ SML</marquee></h1>
  <div class="container">
      @yield('contenido')
  </div>
  <script src="{{ asset('materialize/js/materialize.js') }}"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
          var elems = document.querySelectorAll('select');
          var instances = M.FormSelect.init(elems,[] );
        });
  </script>
    
</body>
</html>