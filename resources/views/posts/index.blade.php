@extends('layouts.default')

@section('title')
{{ config('app.name', 'Laravel') }}
@endsection

@section('left')
  <header>
    @if($Auth)
    <div id="auth_name" class="member-header" data-id="{{ $Auth->id }}">
      {{ $Auth->name }}
    </div>
    @else
      <div id="auth_name" class="class="member-header"">
        ログインしていません
      </div>
    @endif

  </header>
  <div class="member-list">
      <div class="member">
        user一覧
        <i id="user_list_open" class="fas fa-chevron-up f-right"></i>
      </div>
      <div class="" id="user_list">
        <ul>
          @foreach ($users as $user)
          <li>
            {{ $user->name }}
            @if($follow_friends->contains($user) || $friends->contains($user))
              <a  class="friend-remove" href="#" data-id="{{ $user->id }}">
                <i class="fas fa-user-minus f-right"></i>
              </a>
              <a  class="friend-add hidden" href="#" data-id="{{ $user->id }}">
                <i  class="fas fa-user-plus f-right"></i>
              </a>
            @else
              <a  class="friend-remove hidden" href="#" data-id="{{ $user->id }}">
                <i class="fas fa-user-minus f-right"></i>
              </a>
              <a  class="friend-add" href="#" data-id="{{ $user->id }}">
                <i  class="fas fa-user-plus f-right"></i>
              </a>
            @endif
          </li>
          @endforeach
        </ul>
      </div>
      <div class="member">
        pair一覧
        <i id="friend_list_open" class="fas fa-chevron-up f-right"></i>
      </div>
      <div class="" id="friend_list">
        <ul>
          @foreach ($friends as $friend)
          <li>
            {{ $friend->name }}
            <a  class="friend-remove" href="#" data-id="{{ $friend->id }}">
              <i class="fas fa-user-minus f-right"></i>
            </a>
            <a  class="friend-add hidden" href="#" data-id="{{ $friend->id }}">
              <i  class="fas fa-user-plus f-right"></i>
            </a>
          </li>
          @endforeach
        </ul>
      </div>
      <div class="member">
        pair申請があります
        <i id="follower_list_open" class="fas fa-chevron-up f-right"></i>
      </div>
      <div class="" id="follower_list">
        <ul>
          @foreach ($follower_friends as $follower_friend)
          <li>
            {{ $follower_friend->name }}
            <a  class="friend-add" href="#" data-id="{{ $follower_friend->id }}">
              <i  class="fas fa-user-plus f-right"></i>
            </a>
            <a  class="friend-remove hidden" href="#" data-id="{{ $follower_friend->id }}">
              <i class="fas fa-user-minus f-right"></i>
            </a>
          </li>
          @endforeach
        </ul>
      </div>
      <div class="member">
        pair申請中
        <i id="follow_list_open" class="fas fa-chevron-up f-right"></i>
      </div>
      <div class="" id="follow_list">
        <ul>
          @foreach ($follow_friends as $follow_friend)
          <li>
            {{ $follow_friend->name }}
            <a  class="friend-remove" href="#" data-id="{{ $follow_friend->id }}">
              <i class="fas fa-user-minus f-right"></i>
            </a>
            <a  class="friend-add hidden" href="#" data-id="{{ $follow_friend->id }}">
              <i  class="fas fa-user-plus f-right"></i>
            </a>
          </li>
          @endforeach
        </ul>
      </div>

  </div>

@endsection

@section('main')
  <ul>
    @forelse ($posts as $post)
    <li class="todo" data-status="{{$post->status}}" id="post_{{ $post->id }}">
      @if($post->user_id)
      <h3>{{ $post->user->name }}</h3>
      @else
      <h3>GuestUser</h3>
      @endif
      <h2 id="text_{{ $post->id }}">{!! nl2br(e($post->todo)) !!}</h2>
      <ul class="submenu">
        <li>
          <a href="" class="done" data-id="{{ $post->id }}">
            <i class="far fa-check-square"></i>
          </a>
          </form>
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
          <form class="d-none" mathod="post" action="{{ url('/posts' , $post->id )}}" id="del_{{ $post->id }}">
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
      <div class="form-group row selectbox">
        <div class="col-sm-4">
          共有するpairを選んでください
        </div>
          <select class="col-sm-8 select-success" name="friend_id">
            <option value="" label="共有しない"></option>
            @foreach ($friends as $friend)
            <option value="{{ $friend->id }}" label="{{ $friend->name }}"></option>
            @endforeach
          </select>
      </div>
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

@section('script')
  @if(app('env')=='local')
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/friend.js') }}"></script>
  @endif
  @if(app('env')=='production')
    <script type="text/javascript" src="{{ secure_asset('js/main.js') }}"></script>
    <script type="text/javascript" src="{{ secure_asset('js/friend.js') }}"></script>
@endif
@endsection
