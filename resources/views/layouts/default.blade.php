<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/styles.css">
    <script src="https://kit.fontawesome.com/77d57efb85.js"></script>

  </head>
  <body>
    <header>
      <div class="conteiner">
        <h1>@yield('title')</h1>
      </div>
    </header>
    <main>
      <div class="conteiner main">
        @yield('main')
      </div>
    </main>
    <footer>
      <div class="conteiner">
        <h2>おまけ</h2>
      </div>
    </footer>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
  </body>
</html>
