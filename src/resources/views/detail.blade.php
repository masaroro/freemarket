@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}" />
@endsection

@section('head')
  <input type="text" placeholder="何をお探しですか？">
  <a href="/">ログイン</a>
  <a href="/">マイページ</a>
  <a href="/">出品</a>
@endsection

@section('content')
  <div class="detail__content">
    <div class="detail__img">
      <img src="{{ asset('storage/images/Armani+Mens+Clock.jpg') }}" alt="" />
    </div>
    <div class="detail__item">
      <div class="detail__item__title">
        <h2>商品名がここに入る</h2>
      </div>
      <div class="detail__item-bland">
        <p>ブランド名</p>
      </div>
      <div class="detail__item-price">
        <span>￥</span>
        <span>47,000</span>
        <span>(税込)</span>
      </div>
      <div>
        <div>☆</div>
        <div>コメント</div>
      </div>
      <div>
        <button>購入手続きへ</button>
      </div>
      <div>
        商品説明
      </div>
      <div>
        カラーグレー
      </div>
      <div>
        商品の情報
      </div>
      <div>
        カテゴリー
      </div>
      <div>
        商品の状態
      </div>
      <div>
        <div>コメント</div>
        <div>admin</div>
        <div>ここにコメントが入ります。</div>
        <div>商品へのコメント</div>
        <div>
          <input type="text">
        </div>
      </div>
      <div>
        <button>コメントを送信する</button>
      </div>
    </div>
  </div>
@endsection('content')
