@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-10 col-sm-12">

        <div class="card soft-card shadow-sm">
            <div class="card-header bg-white border-0 fw-bold">
                🤍 SERENICA — {{ $chat->topic }}
            </div>

            <div class="card-body" style="height: 380px; overflow-y: auto;">
                @foreach($messages as $msg)
                    <div class="d-flex mb-3 {{ $msg->sender == 'user' ? 'justify-content-end' : '' }}">
                        <div class="chat-bubble {{ $msg->sender == 'user' ? 'chat-user' : 'chat-bot' }}">
                            {{ $msg->message }}
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="card-footer bg-white border-0">
                <form method="POST" action="{{ route('chat.send') }}">
                    @csrf
                    <input type="hidden" name="chat_id" value="{{ $chat->id }}">

                    <div class="input-group">
                        <input type="text"
                               name="message"
                               class="form-control rounded-pill"
                               placeholder="Ketik ceritamu di sini…"
                               required>
                        <button class="btn btn-primary rounded-pill ms-2">
                            Kirim
                        </button>
                    </div>

                    <p class="muted-text mt-2">
                        SERENICA bukan pengganti profesional 🌱
                    </p>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
