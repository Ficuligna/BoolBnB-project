<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Boolbnb</title>

    <!-- Fonts -->
    <link rel = 'stylesheet' type = 'text / css' href = 'https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.58.0/maps/maps.css ' >
    <script src = "https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.58.0/maps/maps-web.min.js" > </script>
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.41.0/maps/maps.css'>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.41.0/maps/maps-web.min.js"></script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.41.0/services/services-web.min.js"></script>
    <script src='https://npmcdn.com/@turf/turf/turf.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2/dist/Chart.min.js"></script>
    <script src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c3050381a5.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/handlebars@latest/dist/handlebars.js"></script>
    <link rel="stylesheet" href="/css/app.css">
    <script type="text/javascript" src="/js/app.js"></script>

    </script>

  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="header">
            @include('components.header')
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="content">
            @yield('content')
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="footer">
          @include('components.footer')
        </div>
      </div>
    </div>
  </body>
</html>
