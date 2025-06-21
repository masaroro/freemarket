@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/order.css') }}" />
@endsection

@section('head')
  <input type="text" placeholder="何をお探しですか？">
  <a href="/">ログイン</a>
  <a href="/">マイページ</a>
  <a href="/">出品</a>
@endsection

@section('content')
  <div class="order__content">
    <form class="order__form" action="/" method="post">
    @csrf
      <div class="order__item-detail">
        <div class="order__item">
          <div class="order__item-img">
            <img src="" alt="商品画像">
          </div>
          <div class="order__item-label">
            商品名
          </div>
          <div>
            <input type="file" name="image"/>
              画像を選択する
          </div>
        </div>
        <div class="order__item">
          <div class="order__item-label">
            お支払い方法
          </div>
          <select name="" id="">
            <option value="">選択してください</option>
            <option value="1">コンビニ支払い</option>
            <option value="2">カード支払い</option>
          </select>
        </div>
        <div class="order__item">
          <div class="order__item-label">
            <span>配送先</span>
            <a href="/">変更する</a>
          </div>
          <div class="order__item-address">
            <div>〒</div>
            <div>ここには住所と建物が入ります</div>
          </div>
        </div>
      </div>
      <div class="order__item-price">
        <div>
          <table>
            <tr>
              <th>商品名</th>
              <td>￥47,000</td>
            </tr>
            <tr>
              <th>支払い方法</th>
              <td>コンビニ支払い</td>
            </tr>
          </table>
          <div class="order__button">
            <button>購入する</button>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection('content')
