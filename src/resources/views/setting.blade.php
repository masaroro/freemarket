@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/setting.css') }}" />
@endsection

@section('content')
  <div class="setting__content">
    <div class="setting__heading">
      <h2 class="setting__heading-title">
        プロフィール設定
      </h2>
    </div>
    <div class="setting__item">
      <form class="setting__form" action="/mypage/profile" method="post" enctype="multipart/form-data">
      @csrf
        <div class="setting__item">
          <div class="setting__img">
            <img src="" alt="プロフィール画像">
            <input type="file" name="image"/>
              画像を選択する
          </div>
        </div>
        <div class="setting__item">
          <div class="setting__item-label">
            ユーザー名
          </div>
          <input class="setting__item-input" type="text" name="name" placeholder="" value="">
        </div>
        <div class="setting__item">
          <div class="setting__item-label">
            郵便番号
          </div>
          <input class="setting__item-input" type="text" name="postal_code" placeholder="" value="">
        </div>
        <div class="setting__item">
          <div class="setting__item-label">
            住所
          </div>
          <input class="setting__item-input" type="text" name="address" placeholder="" value="">
        </div>
        <div class="setting__item">
          <div class="setting__item-label">
            建物名
          </div>
          <input class="setting__item-input" type="text" name="building" placeholder="" value="">
        </div>
        <div class="setting__button">
          <button>更新する</button>
        </div>
      </form>
    </div>
  </div>
@endsection('content')
