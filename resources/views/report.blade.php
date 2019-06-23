<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') - Relatório</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >

        <!-- Styles -->
    </head>
    <body>
      <div class='container-body'>
          <div class="container-fluid">
              @yield('content')
          </div>
      </div>
    </body>
</html>
