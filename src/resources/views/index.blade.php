@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('head')
  <input type="text" placeholder="何をお探しですか？">
  <a href="/">ログイン</a>
  <a href="/">マイページ</a>
  <a href="/">出品</a>
@endsection

@section('content')
  <div class="product__content">
    <div class="product__tag">
      <a href="">おすすめ</a>
      <a href="">マイリスト</a>
    </div>
    <div class="product__list">
      @for ($i = 0; $i < 8; $i++)
        <div class="product__item">
          <a href="/">
            <img src="{{ asset('storage/images/Armani+Mens+Clock.jpg') }}" alt="" />
            <div>商品名</div>
          </a>
        </div>
      @endfor
    </div>
  </div>
@endsection('content')
