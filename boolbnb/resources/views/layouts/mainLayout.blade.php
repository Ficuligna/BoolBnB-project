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
    {{-- bootstrap --}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/handlebars@latest/dist/handlebars.js"></script>
    <link rel="stylesheet" href="/css/app.css">
    <script type="text/javascript" src="/js/app.js"></script>

    </script>
    <script type="text/javascript" src='http://maps.google.it/maps/api/js?sensor=false&libraries=places'></script>

  </head>
  <body>

    @yield('content')

    @include('components.footer')

  </body>
</html>
