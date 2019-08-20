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
        <form class="" action="index.html" method="post">

          <div class="form-group row">
            <p class="col-md-3">name</p>
            <!-- <strong class="col-md-7 ml-3">{{ $Auth->name }}</strong> -->
            <input class="col-md-7 ml-3" type="text" name="" placeholder="{{ $Auth->name }}"  value="{{ old($Auth->name) }}">
          </div>

          <div class="form-group row">
            <p class="col-md-3">E-mail</p>
            <strong class="col-md-7 ml-3">{{ $Auth->email }}
              <span class="errors">E-mailは変更できません</span>
            </strong>
          </div>

          <div class="form-group row">
              <p class="col-md-3">誕生日</p>
            <div class="col-md-7 ml-3">
              <select class="" name="年">

              </select>
              <select class="" name="月">

              </select>
              <select class="" name="日">

              </select>
            </div>
          </div>

          <div class="form-group row">
            <p class="col-md-3">性別</p>
            <div class="col-md-7 ml-3 text-center">
              <input type="radio" name="gender" value="1">男
              <input type="radio" name="gender" value="2">女
            </div>
          </div>

          <div class="form-group row">
            <p class="col-md-3">自己紹介など</p>
            <textarea name="name" rows="8" cols="80"></textarea>
          </div>

          <div class="btns">
            <input id="btn" class="btn btn-primary" type="submit" value="上書き保存">
            <button class="btn btn-primary">
              <a href="{{ url('/users/{Auth}') }}">キャンセル</a>
            </button>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
