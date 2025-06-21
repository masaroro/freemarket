@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}" />
@endsection

@section('head')
  <input type="text" placeholder="何をお探しですか？">
  <a href="/">ログイン</a>
  <a href="/">マイページ</a>
  <a href="/">出品</a>
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
      <a href="/" class="profile__user-edit">プロフィールを編集</a>
    </div>
    <div class="profile__tag">
      <a href="">出品した商品</a>
      <a href="">購入した商品</a>
    </div>
    <div class="profile__list">
      @for ($i = 0; $i < 8; $i++)
        <div class="profile__item">
          <a href="/">
            <img src="{{ asset('storage/images/Armani+Mens+Clock.jpg') }}" alt="" />
            <div>商品名</div>
          </a>
        </div>
      @endfor
    </div>
  </div>
@endsection('content')
