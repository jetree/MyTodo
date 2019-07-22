@extends('layouts.default')

@section('title')
pairTodo
@endsection

@section('left')
  <header>
    <div class="member-header">
      <span>メンバー一覧</span>
      <i class="fas fa-user-plus user-plus"></i>
    </div>

  </header>
  <div class="member-list">
    @if($Auth)
    {{ $Auth->name }}
    @else
    ログインしていません
    @endif
  </div>

@endsection

@section('main')
  <ul>
    @forelse ($posts as $post)
    <li class="todo">
      @if($post->user_id)
      <h3>{{ $post->user->name }}</h3>
      @else
      <h3>GuestUser</h3>
      @endif
      <h2 id="text_{{ $post->id }}">{!! nl2br(e($post->todo)) !!}</h2>
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
            <i class="fas fa-pen"></i>
          </a>
        </li>
        <li>
          <a href="" class="del" data-id="{{ $post->id }}">
            <i class="fas fa-trash-alt"></i>
          </a>
          <form class="d-none" mathod="post" action="{{ url('/posts' , $post->id )}}" id="form_{{ $post->id }}">
            {{ csrf_field() }}
            {{ method_field('delete')}}
          </form>
        </li>
      </ul>
    </li>
    @empty
    <li class="todo">
      <h2>
        投稿がありません</li>
      </h2>
    @endforelse
  </ul>

  <div id="mask" class="mask hidden"></div>

  </div>
  <input id="add_trigger" type="checkbox">
  <input id="edit_trigger" type="checkbox">


    <div class="btn" id="todo_add_btn">
      <i class="fas fa-edit"></i>
    </div>
    <div class="btn" id="member_btn">
      <i class="fas fa-user-friends"></i>
    </div>

  <div class="form-area" id="todo-add-area">
    <form action="{{ url('/') }}" method="post" id="form_add" ?>
      {{ csrf_field() }}
      @if ($errors->has('todo'))
      <span id="errors" class="errors">{{ $errors->first('todo') }}</span>
      @endif
      <p>
        <textarea id="add_textarea" name="todo" placeholder="enter todo" value="{{ old('$todo') }}"></textarea>
      </p>
      @if($Auth)
        <input type="hidden" name="user_id" value="{{ $Auth->id }}">
      @else
        <input type="hidden" name="user_id" value="">
      @endif
      <div class="btns">
        <input id="btn" class="btn btn-primary" type="submit" value="登録">
      </div>
    </form>
  </div>
  <div class="form-area" id="todo-edit-area">
    <form action="" method="post" id="form_edit">
      {{ csrf_field() }}
      {{ method_field('patch')}}
      @if ($errors->has('todo'))
      <span id="errors" class="errors">{{ $errors->first('todo') }}</span>
      @endif
      <p>
        <textarea id="edit_textarea" name="todo" value="{{ old('posts->$id') }}"></textarea>
      </p>
      <div class="btns">
        <input id="edit_btn" class="btn btn-primary" type="submit" value="更新">
      </div>
    </form>
  </div>
@endsection
