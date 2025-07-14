@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/address.css') }}" />
@endsection

@section('head')
  <form class="header-search__form" action="/" method="get">
    @csrf
    <input type="search" name="keyword" placeholder="何をお探しですか？" value="{{ request('keyword') }}">
    @if(request('page'))
      <input type="hidden" name="page" value="{{ request('page') }}">
        @endif
  </form>
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
      <form class="address__form" action="/purchase/address/{{ $listing->id }}" method="post">
      @csrf
        <div class="address__item">
          <div class="address__item-label">
            郵便番号
          </div>
          <input class="address__item-input" type="text" name="shopping_postal_code" placeholder="" value="{{ $profile->postal_code ?? '' }}">
          <div class="error">
            @error('postal_code')
              {{ $message }}
            @enderror
          </div>
        </div>
        <div class="address__item">
          <div class="address__item-label">
            住所
          </div>
          <input class="address__item-input" type="text" name="shopping_address" placeholder="" value="{{ $profile->address ?? '' }}">
          <div class="error">
            @error('address')
              {{ $message }}
            @enderror
          </div>
        </div>
        <div class="address__item">
          <div class="address__item-label">
            建物名
          </div>
          <input class="address__item-input" type="text" name="shopping_building" placeholder="" value="{{ $profile->building ?? '' }}">
          <div class="error">
            @error('building')
              {{ $message }}
            @enderror
          </div>
        </div>
        <div class="address__button">
          <button type="submit">更新する</button>
          <input type="hidden" name="item_id" value="{{ $listing->id }}">
        </div>
      </form>
    </div>
  </div>
@endsection('content')
