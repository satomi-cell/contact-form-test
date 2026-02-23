@extends('layouts.app')

@section('content')

<div class="admin-container">

    <h1 class="admin-title">Admin</h1>

@if($detail)
<div class="modal-area">
    <div class="modal-content">

        <h2 class="modal-title">お問い合わせ詳細</h2>

        <div class="modal-row">
            <span>お名前</span>
            <p>{{ $detail->name }}</p>
        </div>

        <div class="modal-row">
            <span>性別</span>
            <p>{{ $detail->gender }}</p>
        </div>

        <div class="modal-row">
            <span>メール</span>
            <p>{{ $detail->email }}</p>
        </div>

        <div class="modal-row">
            <span>お問い合わせ内容</span>
            <p class="message">{{ $detail->subject }}</p>
        </div>

        <form method="POST" action="{{ route('admin.destroy', $detail->id) }}">
            @csrf
            @method('DELETE')
            <button class="delete-btn">削除</button>
        </form>

        <a href="{{ route('admin.index') }}" class="close-btn">
            ← 閉じる
        </a>

    </div>
</div>
@endif

<form method="GET"
      action="{{ route('admin.index') }}"
      class="search-form flex flex-wrap gap-4 items-center">

    <input type="text"
        name="keyword"
        value="{{ request('keyword') }}"
        placeholder="名前やメールアドレスを入力してください"
        class="w-[500px] border px-3 py-2 rounded">
        
    <!-- 性別 -->
    <select name="gender">
        <option value="">性別</option>
        <option value="男性" {{ request('gender') == '男性' ? 'selected' : '' }}>男性</option>
        <option value="女性" {{ request('gender') == '女性' ? 'selected' : '' }}>女性</option>
    </select>

    <!-- お問い合わせ種類 -->
    <select name="subject">
        <option value="">お問い合わせ種類</option>
        <option value="商品のお届けについて" {{ request('subject') == '商品のお届けについて' ? 'selected' : '' }}>商品のお届けについて</option>
        <option value="商品の交換について" {{ request('subject') == '商品の交換について' ? 'selected' : '' }}>商品の交換について</option>
        <option value="商品トラブル" {{ request('subject') == '商品トラブル' ? 'selected' : '' }}>商品トラブル</option>
        <option value="ショップへのお問い合わせ" {{ request('subject') == 'ショップへのお問い合わせ' ? 'selected' : '' }}>ショップへのお問い合わせ</option>
        <option value="その他" {{ request('subject') == 'その他' ? 'selected' : '' }}>その他</option>
    </select>
    
    <!-- 日付検索 -->
    <div class="date-wrapper">
        <input type="date"
               name="date"
               value="{{ request('date') }}">
        <span class="date-format">年 / 月 / 日</span>
    </div>

    <button type="submit" class="btn-search">
        検索
    </button>

    <a href="{{ route('admin.index') }}">
        <button type="button" class="btn-reset">
            リセット
        </button>
    </a>
  </form>

    <table class="admin-table">
        <thead>
            <tr class="bg-[#8b7969] text-white">
                <th class="w-1/6">お名前</th>
                <th class="w-1/12">性別</th>
                <th class="w-1/4">メールアドレス</th>
                <th class="w-1/3">お問い合わせ内容</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
               <td>{{ $contact->name }}</td>
               <td class="w-20 text-center">
                  {{ $contact->gender }}
               </td>
               <td>{{ $contact->email }}</td>
               <td>
                  <div class="message-wrapper">
                      <span class="message-text">
                        {{ $contact->subject }}
                      </span>

                    <a href="{{ route('admin.index', ['detail' => $contact->id]) }}" class="btn-detail">
                       詳細
                    </a>
                  </div>
                </td>
           </tr>
        @endforeach
         </tbody>
    </table>

    {{ $contacts->links() }}

</div>
@endsection
