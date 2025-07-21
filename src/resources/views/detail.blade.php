@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}" />
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
  <div class="detail__content">
    <div class="detail__img">
      <img src="{{ asset($listing->image) }}" alt="商品画像" />
    </div>
    <div class="detail__item">
      <div class="detail__item__title">
        <h2>{{ $listing->name }}</h2>
      </div>
      <div class="detail__item-bland">
        <p>{{ $listing->brand }}</p>
      </div>
      <div class="detail__item-price">
        <span>￥</span><!--
      --><span>{{ number_format($listing->price) }}</span><!--
      --><span>(税込)</span>
      </div>
      <div class="detail__item-assessment">
        <form class="detail__item-like" action="/item/{{ $listing->id }}/like" method="post">
          @csrf
          <button type="submit" class="detail__item-favorite-star">
            <img src="/images/favorite.png" alt="いいねボタン">
          </button>
          <span>{{ $listing->likes->count() ?? 0}}</span>
        </form>
        <div class="detail__item-favorite-comment">
          <img src="/images/comment.png" alt="コメント画像">
          <span>{{ $listing->reviews->count() }}</span>
        </div>
      </div>
      <div class="detail__item-button">
        <a href="/purchase/{{ $listing->id }}" class="purchase-button">購入手続きへ</a>
      </div>
      <div class="detail__item-description">
        <h2>商品説明</h2>
      </div>
      <div class="detail__item-text">
        <textarea class="detail__item-description" name="description" readonly>{{ $listing->description }}</textarea>
      </div>
      <div class="detail__item-info">
        <h2>商品の情報</h2>
      </div>
      <div class="detail__item-info">
        <table>
          <tr>
            <th>カテゴリー</th>
            <td class="detail__item-category">
              @foreach ($listing->categories as $category)
                <span>{{ $category->name }}</span>
              @endforeach
            </td>
          </tr>
          <tr>
            <th>商品の状態</th>
            <td class="detail__item-status">
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
        <h2>コメント({{ $listing->reviews->count() }})</h2>
        @foreach ($reviews as $review)
          <div class="detail__item-comment__user">
            <div class="detail__item-comment__user-info">
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
            </div>
            <div class="detail__item-comment__user-text">
              {{ $review->comment }}
            </div>
          </div>
        @endforeach
        <div class="detail__comment-title">商品へのコメント</div>
        <form class="detail__comment" action="/item/{{$listing->id}}/comment" method="post">
          @csrf
          <div class="detail__comment-input">
            <textarea name="comment"></textarea>
            <div class="error">
              @error('comment')
                {{ $message }}
              @enderror
            </div>
          </div>
          <button type="submit" class="detail__button-submit">コメントを送信する</button>
        </form>
      </div>
    </div>
  </div>
@endsection('content')
