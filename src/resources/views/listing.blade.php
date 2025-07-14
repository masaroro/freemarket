@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/listing.css') }}" />
@endsection

@section('head')
  <form class="header-search__form" action="/mypage" method="get">
    @csrf
    <input type="search" name="keyword" placeholder="何をお探しですか？" value="{{ request('keyword') }}">
    @if(request('page'))
      <input type="hidden" name="page" value="{{ request('page') }}">
        @endif
  </form>
  <form class="header-nav__form" action="/logout" method="post">
    @csrf
      <input type="submit" class="header-nav__button" value="ログアウト">
  </form>
  <a href="/mypage">マイページ</a>
  <a href="/sell">出品</a>
@endsection

@section('content')
  <div class="listing__content">
    <div class="listing__heading">
      <h2 class="listing__heading-title">
        商品の出品
      </h2>
    </div>
    <div class="listing__detail">
      <form class="listing__form" action="/sell" method="post" enctype="multipart/form-data">
      @csrf
        <div class="listing__item">
          <div class="listing__item-label">
            商品画像
          </div>
          <div class="listing__item-img">
            <input type="file" name="image"/>
              画像を選択する
          </div>
          <div class="error">
            @error('image')
              {{ $message }}
            @enderror
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
          <div class="listing__item-categories">
            @foreach ($categories as $category)
              <div class="listing__item-category-checkbox">
                <input type="checkbox" name="categories[]" value="{{ $category->id }}" id="category-{{ $category->id }}">
                <label for="category-{{ $category->id }}" class="category-label">{{ $category->name }}</label>
            </div>
            @endforeach
            <div class="error">
            @error('categories')
              {{ $message }}
            @enderror
          </div>
          </div>
        </div>
        <div class="listing__item">
          <div class="listing__item-label">
            商品の状態
          </div>
          <select class="listing__item-select" name="status" id="">
            <option value="" selected disabled></option>
            <option value="0">良好</option>
            <option value="1">目立った傷や汚れなし</option>
            <option value="2">やや傷や汚れあり</option>
            <option value="3">状態が悪い</option>
          </select>
          <div class="error">
            @error('status')
              {{ $message }}
            @enderror
          </div>
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
          <div class="error">
            @error('name')
              {{ $message }}
            @enderror
          </div>
        </div>
        <div class="listing__item">
          <div class="listing__item-label">
            ブランド名
          </div>
          <input type="text" name="brand">
          <div class="error">
            @error('brand')
              {{ $message }}
            @enderror
          </div>
        </div>
        <div class="listing__item">
          <div class="listing__item-label">
            商品の説明
          </div>
          <textarea name="description" id=""></textarea>
          <div class="error">
            @error('description')
              {{ $message }}
            @enderror
          </div>
        </div>
        <div class="listing__item">
          <div class="listing__item-label">
            販売価格
          </div>
          <input type="text" name="price" placeholder="¥">
          <div class="error">
            @error('price')
              {{ $message }}
            @enderror
          </div>
        </div>
        <div class="listing__button">
          <button>出品する</button>
        </div>
      </form>
    </div>
  </div>
@endsection('content')
