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
  <div class="item__content">
    <div class="item__tag">
      <a href="">おすすめ</a>
      <a href="">マイリスト</a>
    </div>
    <div class="item__list">
      @foreach ($listings as $listing)
        <div class="item__item">
          <a href="/item/{{$listing->id}}" class="item__link">
            <img src="{{ asset($listing->image) }}" alt="商品画像"/>
            <div>{{$listing->name}}</div>
          </a>
        </div>
      @endforeach
    </div>
  </div>
@endsection('content')
