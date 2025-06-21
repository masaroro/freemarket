@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/listing.css') }}" />
@endsection

@section('head')
  <input type="text" placeholder="何をお探しですか？">
  <a href="/">ログイン</a>
  <a href="/">マイページ</a>
  <a href="/">出品</a>
@endsection

@section('content')
  <div class="listing__content">
    <div class="listing__heading">
      <h2 class="listing__heading-title">
        商品の出品
      </h2>
    </div>
    <div class="listing__item">
      <form class="listing__form" action="/" method="post">
      @csrf
        <div class="listing__item">
          <div class="listing__item-label">
            商品画像
          </div>
          <div>
            <input type="file" name="image"/>
              画像を選択する
          </div>
        </div>
        <div class="listing__item">
          <div class="listing__item-label">
            商品の詳細
          </div>
        </div>
        <div class="listing__item">
          <div class="listing__item-label">
            カテゴリー
          </div>
          <div class="listing__item-category">
            <span>ファッション</span>
            <span>家電</span>            <span>インテリア</span>
            <span>レディース</span>
            <span>メンズ</span>
            <span>コスメ</span>
            <span>本</span>
            <span>ゲーム</span>
            <span>スポーツ</span>
          </div>
        </div>
        <div class="listing__item">
          <div class="listing__item-label">
            商品の状態
          </div>
          <select name="" id="">
            <option value=""></option>
            <option value="0">良好</option>
            <option value="1">目立った傷や汚れなし</option>
            <option value="2">やや傷や汚れあり</option>
            <option value="3">状態が悪い</option>
          </select>
        </div>
        <div class="listing__item">
          <div class="listing__item-label">
            商品名と説明
          </div>
        </div>
        <div class="listing__item">
          <div class="listing__item-label">
            商品名
          </div>
          <input type="text" name="name">
        </div>
        <div class="listing__item">
          <div class="listing__item-label">
            ブランド名
          </div>
          <input type="text" name="brand">
        </div>
        <div class="listing__item">
          <div class="listing__item-label">
            商品の説明
          </div>
          <textarea name="description" id=""></textarea>
        </div>
        <div class="listing__item">
          <div class="listing__item-label">
            販売価格
          </div>
          <input type="text" name="price" placeholder="¥">
        </div>
        <div class="listing__button">
          <button>出品する</button>
        </div>
      </form>
    </div>
  </div>
@endsection('content')
