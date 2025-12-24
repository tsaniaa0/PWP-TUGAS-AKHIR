@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6 col-md-8 col-sm-12">

        <div class="card soft-card shadow-sm">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-1">Halo 👋</h5>
                <p class="muted-text mb-3">
                    Kamu aman di sini. Cerita pelan-pelan aja 🤍
                </p>

                <form method="POST" action="{{ route('chat.start') }}">
                    @csrf

                    <label class="form-label small">Lagi pengen bahas apa?</label>
                    <select class="form-select mb-3" name="topic" required>
                        <option value="Stres Akademik">📚 Stres Akademik</option>
                        <option value="Kecemasan">😟 Kecemasan</option>
                        <option value="Motivasi Diri">🌱 Motivasi Diri</option>
                        <option value="Masalah Sosial">🧑‍🤝‍🧑 Masalah Sosial</option>
                    </select>

                    <button class="btn btn-primary w-100 rounded-pill">
                        Mulai ngobrol 💬
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
