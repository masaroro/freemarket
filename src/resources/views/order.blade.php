@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/order.css') }}" />
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
          <form class="order__item-form" action="/purchase/{{ $listing->id }}" method="get">
            @csrf
            <input type="hidden" name="item_id" value="{{ $listing->id }}">
            <input type="hidden" name="shopping_postal_code" value="{{ request('shopping_postal_code') ?? $profile->postal_code ?? '' }}">
            <input type="hidden" name="shopping_address" value="{{ request('shopping_address') ?? $profile->address ?? '' }}">
            <input type="hidden" name="shopping_building" value="{{ request('shopping_building') ?? $profile->building ?? '' }}">
            <select class="order__item-select" name="pay" onchange="this.form.submit()">
              <option value="">選択してください</option>
              <option value="1" {{ (request('pay') == '1' || (!request('pay') && $selectedPay == '1')) ? 'selected' : '' }}>コンビニ支払い</option>
              <option value="2" {{ (request('pay') == '2' || (!request('pay') && $selectedPay == '2')) ? 'selected' : '' }}>カード支払い</option>
            </select>
          </form>
        </div>
      <div class="order__item">
        <div class="order__item-label">
          <span>配送先</span>
          <a href="/purchase/address/{{ $listing->id }}">変更する</a>
        </div>
        <div class="order__item-shipping">
          <div  class="order__item-postal-code">
            <span>〒</span>
            <input type="text" name="shopping_postal_code" value="{{ request('shopping_postal_code') ?? $profile->postal_code ?? '' }}">
          </div>
          <div class="order__item-address">
            <input type="text" name="shopping_address" value="{{ request('shopping_address') ?? $profile->address ?? '' }}">
            <input type="text" name="shopping_building" value="{{ request('shopping_building') ?? $profile->building ?? '' }}">
          </div>
        </div>
      </div>
    </div>
    <form class="order__form" action="/purchase/{{ $listing->id }}" method="post">
      @csrf
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
              <td>
                @if ($selectedPay == 1)
                  コンビニ支払い
                @elseif ($selectedPay == 2)
                  カード支払い
                @else
                  選択してください
                @endif
              </td>
            </tr>
          </table>
          <input type="hidden" name="item_id" value="{{ $listing->id }}">
          <input type="hidden" name="shopping_postal_code" value="{{ request('shopping_postal_code') ?? $profile->postal_code ?? '' }}">
          <input type="hidden" name="shopping_address" value="{{ request('shopping_address') ?? $profile->address ?? '' }}">
          <input type="hidden" name="shopping_building" value="{{ request('shopping_building') ?? $profile->building ?? '' }}">
          <input type="hidden" name="pay" value="{{ $selectedPay }}">
          <div class="order__button">
            <button type="submit">購入する</button>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection('content')
