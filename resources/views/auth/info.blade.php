@extends('layouts.default')

@section('title')
{{ config('app.name', 'Laravel') }}
@endsection

@section('main')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">User情報（テスト用）</div>

        <div class="card-body">
          <div class="form-group row">
            <p class="col-md-3">name</p>
            <strong class="col-md-7 ml-3">{{ $Auth->name }}</strong>
          </div>

          <div class="form-group row">
            <p class="col-md-3">E-mail</p>
            <strong class="col-md-7 ml-3">{{ $Auth->email }}</strong>
          </div>

          @isset($user_information)
          <div class="form-group row">
            <p class="col-md-3">誕生日</p>
            <strong class="col-md-7 ml-3">{{ $Auth->user_informations->birthday }}</strong>
          </div>
          <div class="form-group row">
            <p class="col-md-3">性別</p>
            <strong class="col-md-7 ml-3">{{ $Auth->user_informations->gender }}</strong>
          </div>
          <div class="form-group row">
            <p class="col-md-3">コメント</p>
            <strong class="col-md-7 ml-3">{{ $Auth->user_informations->comment }}</strong>
          </div>
          <div class="btns">
            <button class="btn btn-primary">
              <a href="{{ url('/users/{Auth}/show') }}">編集</a>
            </button>
          </div>
          @else
          <p class="text-center">ユーザー情報はありません</p>
            <div class="btns">
              <button class="btn btn-primary">
                <a href="{{ url('/users/{Auth}/create') }}">作成</a>
              </button>
            </div>
          @endisset
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
