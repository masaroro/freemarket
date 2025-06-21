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
      <img src="{{ asset('storage/images/Armani+Mens+Clock.jpg') }}" alt="商品画像" />
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
      <div class="detail__item-assessment">
        <div>
          ☆
          <span>3</span>
        </div>
        <div>
          ○
          <span>1</span>
        </div>
      </div>
      <div class="detail__item-button">
        <button>購入手続きへ</button>
      </div>
      <div class="detail__item-description">
        商品説明
      </div>
      <div class="detail__item-text">
        <textarea name="description" readonly>カラーグレー</textarea>
      </div>
      <div class="detail__item-info">
        商品の情報
      </div>
      <div class="detail__item-info">
        <table>
          <tr>
            <th>カテゴリー</th>
            <td>
              <span>洋服</span>
              <span>メンズ</span>
            </td>
          </tr>
          <tr>
            <th>商品の状態</th>
            <td>良好</td>
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
