@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}" />
@endsection

@section('head')
  <input type="text" placeholder="何をお探しですか？">
  <form class="header-nav__form" action="/logout" method="post">
    @csrf
      <input type="submit" class="header-nav__button" value="ログアウト">
  </form>
  <a href="/mypage">マイページ</a>
  <a href="/sell">出品</a>
@endsection

@section('content')
  <div class="profile__content">
    <div class="profile__user">
      <div class="profile__user-img">
        <img src="" alt="ユーザー画像">
      </div>
      <div class="profile__user-name">
        ユーザー名
      </div>
      <a href="/mypage/profile" class="profile__user-edit">プロフィールを編集</a>
    </div>
    <div class="profile__tag">
      <a href="">出品した商品</a>
      <a href="">購入した商品</a>
    </div>
    <div class="profile__list">
      @foreach ($listings as $listing)
        <div class="profile__item">
          <a href="/item/{{$listing->id}}" class="profile__item-link">
            <img src="{{ asset($listing->image) }}" alt="商品画像" />
            <div>{{$listing->name}}</div>
          </a>
        </div>
      @endforeach
    </div>
  </div>
@endsection('content')
