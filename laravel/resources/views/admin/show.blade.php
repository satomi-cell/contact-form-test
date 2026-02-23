@extends('layouts.app')

@section('content')

<div class="detail-wrapper">

    <h2 class="detail-title">お問い合わせ詳細</h2>

    <div class="detail-card">

        <div class="detail-row">
            <div class="detail-label">お名前</div>
            <div class="detail-value">{{ $contact->name }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">性別</div>
            <div class="detail-value">{{ $contact->gender }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">メール</div>
            <div class="detail-value">{{ $contact->email }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">お問い合わせ種類</div>
            <div class="detail-value">{{ $contact->subject }}</div>
        </div>

        <div class="detail-row column">
            <div class="detail-label">お問い合わせ内容</div>
            <div class="detail-value message">
                {{ $contact->message }}
            </div>
        </div>

        <div class="detail-actions">
            <form action="{{ route('admin.destroy', $contact->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-btn">
                    削除
                </button>
            </form>

            <a href="{{ route('admin.index') }}" class="back-link">
                ← 戻る
            </a>
        </div>

    </div>

</div>

@endsection
