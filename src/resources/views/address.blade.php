@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/address.css') }}" />
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
  <div class="address__content">
    <div class="address__heading">
      <h2 class="address__heading-title">
        住所の変更
      </h2>
    </div>
    <div class="address__item">
      <form class="address__form" action="/purchase/address/{{ $listing->id }}" method="post">
      @csrf
        <div class="address__item">
          <div class="address__item-label">
            郵便番号
          </div>
          <input class="address__item-input" type="text" name="shopping_postal_code" placeholder="" value="{{ $profile->postal_code ?? '' }}">
        </div>
        <div class="address__item">
          <div class="address__item-label">
            住所
          </div>
          <input class="address__item-input" type="text" name="shopping_address" placeholder="" value="{{ $profile->address ?? '' }}">
        </div>
        <div class="address__item">
          <div class="address__item-label">
            建物名
          </div>
          <input class="address__item-input" type="text" name="shopping_building" placeholder="" value="{{ $profile->building ?? '' }}">
        </div>
        <div class="address__button">
          <button type="submit" class="address__button-submit">更新する</button>
          <input type="hidden" name="item_id" value="{{ $listing->id }}">
          <input type="hidden" name="name" value="{{ $profile->id }}">
        </div>
      </form>
    </div>
  </div>
@endsection('content')
