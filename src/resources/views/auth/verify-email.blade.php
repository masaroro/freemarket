@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/verify-email.css') }}" />
@endsection

@section('content')
  <div class="verify-email__content">
    <div class="verify-email__item">
      <p class="verify-email__message">
        登録していただいたメールアドレスに認証メールを送信しました。<br>
        メール認証を完了してください。
      </p>

      @if (session('status') == 'verification-link-sent')
        <div class="verify-email__status">
          新しい認証リンクが、ご登録いただいたメールアドレスに送信されました。
        </div>
      @endif

      <div>
        <button>認証はこちらから</button>
      </div>

      <form action="" method="post">
        @csrf
        <div class="verify-email__actions">
          <button type="submit" class="verify-email__button">
            認証メールを再送する
          </button>
        </div>
      </form>

    </div>
  </div>
@endsection('content')
