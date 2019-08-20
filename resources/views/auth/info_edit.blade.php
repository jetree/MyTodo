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
            <strong class="col-md-7 ml-3">{{ $Auth->email }}</strong>
            <p class="errors">E-mailは変更できません</p>
          </div>
          <div class="btns">
            <input id="btn" class="btn btn-primary" type="submit" value="上書き保存">
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
