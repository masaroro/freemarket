@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endsection

@section('content')
    <div class="login__content">
        <div class="login__heading">
            <h2 class="login__heading-title">
                ログイン
            </h2>
        </div>
        <div class="login__item">
            <form class="login__form" action="/" method="post">
                @csrf
                <div class="login__item">
                    <div class="login__item-label">
                        メールアドレスで検索
                    </div>
                    <input class="login__item-input" type="email" name="email" placeholder="" value="">
                </div>
                <div class="login__item">
                    <div class="login__item-label">
                        パスワード
                    </div>
                    <input class="login__item-input" type="password" name="password" placeholder="" value="">
                </div>
                <div class="login__button">
                    <button>ログインする</button>
                </div>
                <div class="login__link">
                    <a href="/">会員登録はこちら</a>
                </div>
            </form>
        </div>
    </div>
@endsection('content')
