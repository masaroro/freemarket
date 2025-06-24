@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/order.css') }}" />
@endsection

@section('head')
  <input type="text" placeholder="何をお探しですか？">
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
  <div class="order__content">
    <form class="order__form" action="/" method="post">
    @csrf
      <div class="order__item-detail">
        <div class="order__item">
          <div class="order__item-img">
            <img src="{{ asset($listing->image) }}" alt="商品画像">
          </div>
          <div class="order__item-label">
            <div class="order__item-name">
              {{ $listing->name }}
            </div>
            <div class="order__item-price">
              <span>￥</span>
              <span>{{ number_format($listing->price) }}</span>
          </div>
        </div>
        <div class="order__item">
          <div class="order__item-label">
            お支払い方法
          </div>
          <select class="order__item-select" name="" id="">
            <option value="">選択してください</option>
            <option value="1">コンビニ支払い</option>
            <option value="2">カード支払い</option>
          </select>
        </div>
        <div class="order__item">
          <div class="order__item-label">
            <span>配送先</span>
            <a href="/purchase/address/{{ $listing->id }}">変更する</a>
          </div>
          <div class="order__item-address">
            <div  class="order__item-postal-code">
              <span>〒</span>
              <span>0000000</span>
            </div class="order__item-address">
            <div>ここには住所と建物が入ります</div>
          </div>
        </div>
      </div>
      <div class="order__item-price">
        <div class="order__item-label">
          <table>
            <tr>
              <th>商品代金</th>
              <td>
                <span>￥</span>
                <span>{{ number_format($listing->price) }}</span>
              </td>
            </tr>
            <tr>
              <th>支払い方法</th>
              <td>コンビニ支払い</td>
            </tr>
          </table>
          <div class="order__button">
            <button type="submit">購入する</button>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection('content')
