<!doctype html>
  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{config('app.name')}}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Source+Sans+Pro:400,600,700" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Main CSS -->
    <link href="{{ asset('front/assets/css/main.css') }}" rel="stylesheet"/>
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    @livewireStyles
  </head>
  <body>

   <livewire:navbar>
    {{ $slot }}
    <!-- FOOTER -->
    <div class="container mt-5">
      <footer class="bg-white border-top p-3 text-muted small">
        <div class="row align-items-center justify-content-between">
          <div>
            <span class="navbar-brand mr-2"><strong>{{config('app.name')}}</strong></span> Copyright &copy; 2021
            . All rights reserved.
          </div>
          <!-- <div>
            Made with <a target="_blank" class="text-secondary font-weight-bold" href="https://www.wowthemes.net/mundana-free-html-bootstrap-template/">Mundana Theme</a> by WowThemes.net.
          </div> -->
        </div>
      </footer>
    </div>
    <!-- End Footer -->
    @livewireScripts
    <!-- <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false"></script> -->
    <script src="{{ asset('livewire-turbolinks.js') }}" data-turbolinks-eval="false"></script>
  </body>
  </html>
