@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}" />
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
      <button class="header-nav__button">ログアウト</button>
    </form>
  @else
    <a href="/login">ログイン</a>
  @endif
  <a href="/mypage">マイページ</a>
  <a href="/sell">出品</a>
@endsection

@section('content')
  <div class="detail__content">
    <div class="detail__img">
      <img src="{{ asset($listing->image) }}" alt="商品画像" />
    </div>
    <div class="detail__item">
      <div class="detail__item__title">
        <h2>{{ $listing->name }}</h2>
      </div>
      <div class="detail_ _item-bland">
        <p>{{ $listing->brand }}</p>
      </div>
      <div class="detail__item-price">
        <span>￥</span>
        <span>{{ number_format($listing->price) }}</span>
        <span>(税込)</span>
      </div>
      <div class="detail__item-assessment">
        <form class="detail__item-like" action="/item/{{$listing->id}}/like" method="post">
          @csrf
            <button type="submit" class="detail__item-favorite">
              <img src="/images/favorite.png" alt="いいねボタン">
            </button>
          <span>{{ $listing->likes->count() ?? 0}}</span>
        </form>
        <div class="detail__item-favorite">
          <img src="/images/comment.png" alt="コメント画像">
          <span>{{ $listing->reviews->count() }}</span>
        </div>
      </div>
      <div class="detail__item-button">
        <a href="/purchase/{{ $listing->id }}">購入手続きへa</a>
      </div>
      </div>
      <div class="detail__item-description">
        商品説明
      </div>
      <div class="detail__item-text">
        <textarea name="description" readonly>{{ $listing->description }}</textarea>
      </div>
      <div class="detail__item-info">
        商品の情報
      </div>
      <div class="detail__item-info">
        <table>
          <tr>
            <th>カテゴリー</th>
            <td>
              @foreach ($listing->categories as $category)
                <span>{{ $category->name }}</span>
              @endforeach
            </td>
          </tr>
          <tr>
            <th>商品の状態</th>
            <td>
              @if( $listing->status === 0 )
                <span>良好</span>
              @elseif( $listing->status === 1 )
                <span>目立った傷や汚れなし</span>
              @elseif( $listing->status === 2 )
                <span>やや傷や汚れあり</span>
              @elseif( $listing->status === 3 )
                <span>状態が悪い</span>
              @endif
            </td>
          </tr>
        </table>
      </div>
      <div class="detail__item-comment">
        <div>コメント({{ $listing->reviews->count() }})</div>
        @foreach ($reviews as $review)
          <div class="detail__item-comment__user">
            <div class="detail__item-comment__user-image">
              @if ($review->user && $review->user->profile && $review->user->profile->image)
                <img src="{{ asset($review->user->profile->image) }}" alt="ユーザー画像" />
              @else
                <img src="{{ asset('images/default_gray.png') }}" alt="ユーザー画像（default）">
              @endif
            </div>
            <div class="detail__item-comment__user-name">
              {{ $review->user->name }}
            </div>
            <div class="detail__item-comment__user-text">
              {{ $review->comment }}
            </div>
          </div>
        @endforeach
        <div>商品へのコメント</div>
        <form class="detail__comment" action="/item/{{$listing->id}}/comment" method="post">
          @csrf
          <div class="detail__comment-input">
            <input type="text" name="comment"/>
          </div>
          <button type="submit">コメントを送信する</button>
        </form>
      </div>
    </div>
  </div>
@endsection('content')
