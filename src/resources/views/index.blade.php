@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
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
  <div class="item__content">
    <div class="item__tag">
      <a href="/">おすすめ</a>
      <a href="/?page=mylist">マイリスト</a>
    </div>
    <div class="item__list">
      @foreach ($listings as $listing)
        <div class="item__item">
          <a href="/item/{{$listing->id}}" class="item__link">
            <img src="{{ asset($listing->image) }}" alt="商品画像"/>
            <div>{{$listing->name}}</div>
          </a>
          <div class="item_sold-status">
            @if ($listing->is_sold === 1)
              <span class="item_status__sold">Sold</span>
            @endif
          </div>
        </div>
      @endforeach
    </div>
    <div class="item__pagination">
      {{ $listings->links() }}
    </div>
  </div>
@endsection('content')
