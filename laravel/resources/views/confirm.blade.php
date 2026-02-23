@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Confirm</h2>

    <table class="confirm-table">
        <tr>
            <th>お名前</th>
            <td>{{ $contact['last_name'] }} {{ $contact['first_name'] }}</td>
        </tr>

        <tr>
            <th>性別</th>
            <td>{{ $contact['gender'] }}</td>
        </tr>

        <tr>
            <th>メールアドレス</th>
            <td>{{ $contact['email'] }}</td>
        </tr>

        <tr>
            <th>電話番号</th>
            <td>
                {{ $contact['tel1'] }}
                {{ $contact['tel2'] }}
                {{ $contact['tel3'] }}
            </td>
        </tr>

        <tr>
            <th>住所</th>
            <td>{{ $contact['address'] }}</td>
        </tr>

        <tr>
            <th>建物名</th>
            <td>{{ $contact['building'] ?? '' }}</td>
        </tr>

        <tr>
            <th>お問い合わせの種類</th>
            <td>{{ $contact['category'] }}</td>
        </tr>

        <tr>
            <th>お問い合わせ内容</th>
            <td>{!! nl2br(e($contact['message'])) !!}</td>
        </tr>
    </table>

    <div class="button-area">
      <form action="{{ route('contact.store') }}" method="POST">
        @csrf

        @foreach($contact as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach

        <button type="submit">送信</button>
      </form>

      <form action="{{ route('contact.create') }}" method="GET">
        @foreach($contact as $key => $value)
             <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach
        
        <button type="submit">修正</button>
      </form>
    </div>
</div>
@endsection
