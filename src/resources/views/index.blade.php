@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
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
  <div class="item__content">
    <div class="item__tag">
      @if ( request('page') === 'mylist' )
        <a href="/" class="item__tag-black">おすすめ</a>
        <a href="/?page=mylist" class="item__tag-red">マイリスト</a>
      @else
        <a href="/" class="item__tag-red">おすすめ</a>
        <a href="/?page=mylist" class="item__tag-black">マイリスト</a>
      @endif
    </div>
    <div class="item__list">
      @foreach ($listings as $listing)
        <div class="item__item">
          <a href="/item/{{$listing->id}}" class="item__link">
            <img class="item__img" src="{{ asset($listing->image) }}" alt="商品画像"/>
          </a>
          <div class="item__label">{{$listing->name}}</div>
          @if ($listing->is_sold === 1)
            <div class="item__status">
                <span class="item__status-sold">Sold</span>
            </div>
          @endif
        </div>
      @endforeach
    </div>
    <div class="item__pagination">
      {{ $listings->links() }}
    </div>
  </div>
@endsection('content')
