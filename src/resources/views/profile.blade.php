@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}" />
@endsection

@section('head')
  <form class="header-search__form" action="/mypage" method="get">
    @csrf
    <input type="search" name="keyword" placeholder="何をお探しですか？" value="{{ request('keyword') }}">
    @if(request('page'))
      <input type="hidden" name="page" value="{{ request('page') }}">
        @endif
  </form>
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
      <a href="/mypage">出品した商品</a>
      <a href="/mypage/?page=purchase">購入した商品</a>
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
    <div class="profile__pagination">
      {{ $listings->links() }}
    </div>
  </div>
@endsection('content')
