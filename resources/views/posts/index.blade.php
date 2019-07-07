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
      <div class="conteiner main">
        <ul>
          @foreach ($posts as $post)
          <li class="todo">
            <h2>
              {{ $post->id}}
              {!! nl2br(e($post->todo)) !!}
            </h2>
            <ul class="submenu">
              <li>
                <a href="">
                  <i class="far fa-check-square"></i>
                </a>
              </li>
              <li>
                <a href="">
                  <i class="far fa-comment"></i>
                </a>
              </li>
              <li>
                <a href="" class="edit" data-id="{{ $post->id }}">
                  <label for="trigger" id="edit_{{ $post->id }}">
                    <i class="fas fa-pen"></i>
                  </label>
                </a>
              </li>
              <li>
                <a href="" class="del" data-id="{{ $post->id }}">
                  <i class="fas fa-trash-alt"></i>
                </a>
                <form mathod="post" action="{{ url('posts' , $post->id )}}" id="form_{{ $post->id }}">
                  {{ csrf_field() }}
                  {{ method_field('delete')}}
                </form>
              </li>
            </ul>
          </li>
          @endforeach
        </ul>

      </div>
      <input id="trigger" type="checkbox">
      <div class="" id="todo-add">
        <label for="trigger" >
          <i class="fas fa-edit"></i>
        </label>
      </div>

      <div class="" id="todo-add-area">
        <form action="{{ url('/') }}" method="post">
          {{ csrf_field() }}
          @if ($errors->has('todo'))
          <span class="errors">{{ $errors->first('todo') }}</span>
          @endif
          <p></p>
          <p>
            <textarea name="todo" placeholder="enter todo" value="{{ old('$todo') }}"></textarea>
          </p>
          <p>
            <input class="btn" type="submit" value="登録">
          </p>
        </form>
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
