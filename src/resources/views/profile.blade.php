@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}" />
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
  <div class="profile__content">
    <div class="profile__user">
      <div class="profile__user-img">
        @if ($profile && $profile->image)
          <img src="{{ asset($profile->image) }}" alt="プロフィール画像">
        @else
          <img src="{{ asset('images/default_gray.png') }}" alt="デフォルトプロフィール画像">
        @endif
      </div>
      <div class="profile__user-name">
        {{ $user->name }}
      </div>
      <a href="/mypage/profile" class="profile__user-edit">プロフィールを編集</a>
    </div>
    <div class="profile__tag">
      @if ( request('page') === 'purchase' )
        <a href="/mypage" class="profile__tag-black">出品した商品</a>
        <a href="/mypage/?page=purchase" class="profile__tag-red">購入した商品</a>
      @else
        <a href="/mypage" class="profile__tag-red">出品した商品</a>
        <a href="/mypage/?page=purchase" class="profile__tag-black">購入した商品</a>
      @endif
    </div>
    <div class="profile__list">
      @foreach ($listings as $listing)
        <div class="profile__item">
          <a href="/item/{{$listing->id}}" class="profile__item-link">
            <img class="profile__item-img" src="{{ asset($listing->image) }}" alt="商品画像" />
            <div class="profile__item-label">{{$listing->name}}</div>
          </a>
          @if ( $listing->is_sold === 1 && !request('page') === 'purchase' )
            <div class="profile__item-status">
                <span class="profile__item-status-sold">Sold</span>
            </div>
          @endif
        </div>
      @endforeach
    </div>
    <div class="profile__pagination">
      {{ $listings->links() }}
    </div>
  </div>
@endsection('content')
