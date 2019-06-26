<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{アプリタイトル}</title>
    <link rel="stylesheet" href="/css/styles.css">
    <script src="https://kit.fontawesome.com/77d57efb85.js"></script>
  </head>
  <body>
    <header>
      <div class="conteiner">
        <h1>{アプリタイトル}</h1>
      </div>
    </header>
    <main>
      <div class="conteiner">
        <ul>
          @foreach ($posts as $post)
          <li class="todo">
            <h2>
              {{ $post->title }}
            </h2>
            <p>
              {!! nl2br(e($post->body)) !!}
            </p>
          </li>
          @endforeach
        </ul>
      </div>
      <div class="" id="todo-add">
        <i class="fas fa-edit"></i>
      </div>
      <div class="" id="todo-add-area">
        <form action="{{ url('/') }}" method="post">
          {{ csrf_field() }}
          <p>
            <input type="text" name="title" placeholder="enter title">
          </p>
          <p>
            <textarea name="body" placeholder="enter body"></textarea>
          </p>
          <p>
            <input type="submit" value="登録">
          </p>
        </form>
      </div>
    </main>
    <footer>
      <div class="conteiner">
        <h2>おまけ</h2>
      </div>
    </footer>
  </body>
</html>
