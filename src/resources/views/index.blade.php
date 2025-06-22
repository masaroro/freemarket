@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
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
  <div class="product__content">
    <div class="product__tag">
      <a href="">おすすめ</a>
      <a href="">マイリスト</a>
    </div>
    <div class="product__list">
      @for ($i = 0; $i < 8; $i++)
        <div class="product__item">
          <a href="/">
            <img src="{{ asset('storage/images/01_Clock.jpg') }}" alt="商品画像"/>
            <div>商品名</div>
          </a>
        </div>
      @endfor
    </div>
  </div>
@endsection('content')
