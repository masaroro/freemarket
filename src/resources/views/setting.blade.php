@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/setting.css') }}" />
@endsection

@section('head')
  <form class="header-search__form" action="/" method="get">
    @csrf
    <input type="search" name="keyword" placeholder="なにをお探しですか？" value="{{ request('keyword') }}" class="header-search__input">
    @if(request('page'))
      <input type="hidden" name="page" value="{{ request('page') }}">
    @endif
  </form>
  <div class="header-nav">
    @if (Auth::check())
      <form class="header-nav__form" action="/logout" method="post">
      @csrf
        <input type="submit" class="header-nav__logout" value="ログアウト">
      </form>
    @else
      <a href="/login" class="header-nav__login">ログイン</a>
    @endif
    <a href="/mypage" class="header-nav__mypage">マイページ</a>
    <a href="/sell" class="header-nav__listing">出品</a>
  </div>
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
            @if ($profile && $profile->image)
              <img src="{{ asset($profile->image) }}" alt="プロフィール画像">
            @else
              <img src="{{ asset('images/default_gray.png') }}" alt="デフォルトプロフィール画像">
            @endif
            <input type="file" name="image" id="image-upload-button" class="hidden-file-input"/>
            <label for="image-upload-button" class="custom-file-upload">
              画像を選択する
          </div>
        </div>
        <div class="setting__item">
          <div class="setting__item-label">
            ユーザー名
          </div>
          <input class="setting__item-input" type="text" name="name" value="{{ Auth::user()->name }}">
          <div class="error">
            @error('name')
              {{ $message }}
            @enderror
          </div>
        </div>
        <div class="setting__item">
          <div class="setting__item-label">
            郵便番号
          </div>
          <input class="setting__item-input" type="text" name="postal_code" value="{{ $profile->postal_code ?? ''}}">
          <div class="error">
            @error('postal_code')
              {{ $message }}
            @enderror
          </div>
        </div>
        <div class="setting__item">
          <div class="setting__item-label">
            住所
          </div>
          <input class="setting__item-input" type="text" name="address" value="{{ $profile->address ?? ''}}">
          <div class="error">
            @error('address')
              {{ $message }}
            @enderror
          </div>
        </div>
        <div class="setting__item">
          <div class="setting__item-label">
            建物名
          </div>
          <input class="setting__item-input" type="text" name="building" value="{{ $profile->building ?? ''}}">
          <div class="error">
            @error('building')
              {{ $message }}
            @enderror
          </div>
        </div>
        <div class="setting__button">
          <button type="submit" class="setting__button-submit">更新する</button>
        </div>
      </form>
    </div>
  </div>
@endsection('content')
