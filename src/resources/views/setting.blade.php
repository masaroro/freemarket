@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/setting.css') }}" />
@endsection

@section('head')
  <input type="text" placeholder="何をお探しですか？">
  <form class="header-nav__form" action="/logout" method="post">
    @csrf
      <input type="submit" class="header-nav__button" value="ログアウト">
  </form>
  <a href="/mypage">マイページ</a>
  <a href="/">出品</a>
@endsection

@section('content')
  <div class="setting__content">
    <div class="setting__heading">
      <h2 class="setting__heading-title">
        プロフィール設定
      </h2>
    </div>
    <div class="setting__item">
      <form class="setting__form" action="/mypage/profile" method="post" enctype="multipart/form-data">
      @csrf
        <div class="setting__item">
          <div class="setting__img">
            <img src="" alt="プロフィール画像">
            <input type="file" name="image"/>
              画像を選択する
          </div>
        </div>
        <div class="setting__item">
          <div class="setting__item-label">
            ユーザー名
          </div>
          <input class="setting__item-input" type="text" name="name" value="{{ Auth::user()->name }}">
        </div>
        <div class="setting__item">
          <div class="setting__item-label">
            郵便番号
          </div>
          <input class="setting__item-input" type="text" name="postal_code" value="{{ Auth::user()->postal_code }}">
        </div>
        <div class="setting__item">
          <div class="setting__item-label">
            住所
          </div>
          <input class="setting__item-input" type="text" name="address" value="{{ Auth::user()->address }}">
        </div>
        <div class="setting__item">
          <div class="setting__item-label">
            建物名
          </div>
          <input class="setting__item-input" type="text" name="building" value="{{ Auth::user()->building }}">
        </div>
        <div class="setting__button">
          <button>更新する</button>
        </div>
      </form>
    </div>
  </div>
@endsection('content')
