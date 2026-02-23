@extends('layouts.thanks')

@section('content')
 <div class="thanks-container">
    <h2>お問い合わせありがとうございました</h2>

    <a href="{{ route('contact.create') }}" class="home-btn">
       HOME
    </a>
</div>

@endsection
