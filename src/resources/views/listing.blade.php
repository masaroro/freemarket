@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/listing.css') }}" />
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
            <input type="file" name="image" id="image-upload-button" class="hidden-file-input"/>
            <label for="image-upload-button" class="custom-file-upload">
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
            <h3>商品の詳細</h3>
          </div>
        </div>
        <div class="listing__item">
          <div class="listing__item-label">
            カテゴリー
          </div>
          <div class="listing__item-categories">
            @foreach ($categories as $category)
              <div class="listing__item-category-checkbox">
                <input type="checkbox" name="categories[]" value="{{ $category->id }}" id="category-{{ $category->id }}" {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}>
                <label for="category-{{ $category->id }}" class="category-label">{{ $category->name }}</label>
              </div>
            @endforeach
          </div>
          <div class="error">
            @error('categories')
              {{ $message }}
            @enderror
          </div>
        </div>
        <div class="listing__item">
          <div class="listing__item-label">
            商品の状態
          </div>
          <select class="listing__item-select" name="status" id="">
            <option value="" selected disabled>選択してください</option>
            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>良好</option>
            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>目立った傷や汚れなし</option>
            <option value="2" {{ old('status') == '2' ? 'selected' : '' }}>やや傷や汚れあり</option>
            <option value="3" {{ old('status') == '3' ? 'selected' : '' }}>状態が悪い</option>
          </select>
          <div class="error">
            @error('status')
              {{ $message }}
            @enderror
          </div>
        </div>
        <div class="listing__item">
          <div class="listing__item-label">
            <h3>商品名と説明</h3>
          </div>
        </div>
        <div class="listing__item">
          <div class="listing__item-label">
            商品名
          </div>
          <input class="listing__item-input" type="text" name="name" value="{{ old('name') }}">
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
          <input class="listing__item-input" type="text" name="brand" value="{{ old('brand') }}">
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
          <textarea class="listing__item-description" name="description" id="">{{ old('description') }}</textarea>
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
          <input class="listing__item-input" type="text" name="price" placeholder="¥" value="{{ old('price') }}">
          <div class="error">
            @error('price')
              {{ $message }}
            @enderror
          </div>
        </div>
        <div class="listing__button">
          <button type="submit" class="listing__button-submit">出品する</button>
        </div>
      </form>
    </div>
  </div>
@endsection('content')
