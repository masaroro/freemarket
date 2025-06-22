@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection

@section('content')
  <div class="register__content">
    <div class="register__heading">
      <h2 class="register__heading-title">
        会員登録
      </h2>
    </div>
    <div class="register__item">
      <form class="register__form" action="/register" method="post">
      @csrf
        <div class="register__item">
          <div class="register__item-label">
            ユーザー名
          </div>
          <input class="register__item-input" type="text" name="name" value="{{ old('name') }}" >
          <div class="error">
            @error('name')
              {{ $message }}
            @enderror
          </div>
        </div>
        <div class="register__item">
          <div class="register__item-label">
            メールアドレスで検索
          </div>
          <input class="register__item-input" type="email"  name="email" value="{{ old('email') }}" >
          <div class="error">
            @error('email')
              {{ $message }}
            @enderror
          </div>
        </div>
        <div class="register__item">
          <div class="register__item-label">
            パスワード
          </div>
          <input class="register__item-input" type="password" name="password">
          <div class="error">
            @error('password')
              {{ $message }}
            @enderror
          </div>
        </div>
        <div class="register__item">
          <div class="register__item-label">
            確認用パスワード
          </div>
          <input class="register__item-input" type="password" name="password_confirmation">
          <div class="error">
            @error('password')
              {{ $message }}
            @enderror
          </div>
        </div>
        <div class="register__button">
          <button>登録する</button>
        </div>
        <div class="register__link">
          <a href="/login">ログインはこちら</a>
        </div>
      </form>
    </div>
  </div>
@endsection('content')
