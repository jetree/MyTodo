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
        {{ $Auth }}
          <div class="form-group row">
            <p class="col-md-3">name</p>
            <strong class="col-md-7 ml-3">{{ $Auth->name }}</strong>
          </div>
          <div class="form-group row">
            <p class="col-md-3">E-mail</p>
            <strong class="col-md-7 ml-3">{{ $Auth->email }}</strong>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
