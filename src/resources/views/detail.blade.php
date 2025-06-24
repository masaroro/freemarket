@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}" />
@endsection

@section('head')
  <input type="text" placeholder="何をお探しですか？">
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
        <div>
          <a class="detail__item-favorite" href="/">
            <img src="/images/favorite.png" alt="">
          </a>
          <span>3</span>
        </div>
        <div>
          <a class="detail__item-favorite" href="/">
            <img src="/images/comment.png" alt="">
          </a>
          <span>1</span>
        </div>
      </div>
      <a href="/purchase/{{ $listing->id }}">購入手続きへa</a>
      <form action="/purchase/{{ $listing->id }}" method="get">
        @csrf
        <button type="submit" class="detail__item-button">購入手続きへ</button>
        <input type="hidden" name="item_id" value="{{ $listing->id }}">
      </form>
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
        <div>コメント</div>
        <div>admin</div>
        <div>ここにコメントが入ります。</div>
        <div>商品へのコメント</div>
        <div>
          <input type="text" name="comment"/>
        </div>
      </div>
      <div>
        <button>コメントを送信する</button>
      </div>
    </div>
  </div>
@endsection('content')
