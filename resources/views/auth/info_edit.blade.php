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
        <form class="" action="{{ url('/users/{Auth}/edit') }}" method="post">
          {{ csrf_field() }}
          {{ method_field('patch')}}
          <input type="hidden" name="user_id" value="{{ $Auth->id }}">

          <div class="form-group row">
            <p class="col-md-3">name</p>
            <input class="col-md-7 ml-3" type="text" name="name" value="{{ old('name',$Auth->name) }}">
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
              <!-- <input type="date" name="birthday" value="2000-01-01"> -->
              <select id="select_year" class="" name="year">

              </select>年
              <select id="select_month" class="" name="month">

              </select>月
              <select id="select_day" class="" name="day">

              </select>日
            </div>
          </div>

          <div class="form-group row">
            <p class="col-md-3">性別</p>
            <div class="col-md-7 ml-3">
              <input type="radio" name="gender" value="1" @if(old('gender',$Auth->user_informations->gender) =='1')checked="checked"@endif>男
              <input type="radio" name="gender" value="2" @if(old('gender',$Auth->user_informations->gender) =='2')checked="checked"@endif>女
            </div>
          </div>

          <div class="form-group row">
            <p class="col-md-3">自己紹介など</p>
            <textarea name="comment" rows="5" cols="40">{{ old('comment',$Auth->user_informations->comment) }}</textarea>
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

@section('script')
  @if(app('env')=='local')
    <script type="text/javascript" src="{{ asset('js/user_informations.js') }}"></script>
  @endif
  @if(app('env')=='production')
    <script type="text/javascript" src="{{ secure_asset('js/user_informations.js') }}"></script>
  @endif
@endsection
