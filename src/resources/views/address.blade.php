@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/address.css') }}" />
@endsection

@section('head')
  <input type="text" placeholder="何をお探しですか？">
  @if (Auth::check())
    <form class="header-nav__form" action="/logout" method="post">
    @csrf
      <input type="submit" class="header-nav__button" value="ログアウト">
    </form>
  @else
    <a href="/login">ログイン</a>
  @endif
  <a href="/mypage">マイページ</a>
  <a href="/sell">出品</a>
@endsection

@section('content')
  <div class="address__content">
    <div class="address__heading">
      <h2 class="address__heading-title">
        住所の変更
      </h2>
    </div>
    <div class="address__item">
      <form class="address__form" action="/" method="post">
      @csrf
        <div class="address__item">
          <div class="address__item-label">
            郵便番号
          </div>
          <input class="address__item-input" type="text" name="postal_code" placeholder="" value="">
        </div>
        <div class="address__item">
          <div class="address__item-label">
            住所
          </div>
          <input class="address__item-input" type="text" name="address" placeholder="" value="">
        </div>
        <div class="address__item">
          <div class="address__item-label">
            建物名
          </div>
          <input class="address__item-input" type="text" name="building" placeholder="" value="">
        </div>
        <div class="address__button">
          <button>更新する</button>
        </div>
      </form>
    </div>
  </div>
@endsection('content')
