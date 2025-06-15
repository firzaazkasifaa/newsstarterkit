@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #0f172a !important;
        color: #f1f5f9 !important;
        font-family: 'Segoe UI', sans-serif;
        margin: 0;
        padding: 0;
    }

    .page-wrapper {
        min-height: 100vh;
        background-color: #0f172a;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .hero-section {
        padding: 80px 20px 40px;
        text-align: center;
    }

    .hero-section h1 {
        font-size: 2.5rem;
        font-weight: bold;
        background: linear-gradient(to right, #9333ea, #f59e0b);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .hero-section p {
        color: #cbd5e1;
        margin-top: 10px;
    }

    .hero-buttons {
        margin-top: 30px;
    }

    .btn-purple {
        background-color: #6366f1;
        border: none;
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
        margin-right: 10px;
        transition: background 0.3s;
    }

    .btn-purple:hover {
        background-color: #4f46e5;
    }

    .btn-outline-light {
        border: 1px solid #94a3b8;
        background: transparent;
        color: #f8fafc;
        padding: 10px 20px;
        border-radius: 8px;
    }

    .features {
        margin-top: 50px;
    }

    .feature-box {
        background-color: #1e293b;
        border-radius: 12px;
        padding: 30px 20px;
        text-align: center;
        box-shadow: 0 4px 12px rgba(0,0,0,0.3);
        color: #f8fafc;
        transition: 0.3s;
        height: 100%;
    }

    .feature-box:hover {
        transform: translateY(-4px);
    }

    .feature-box i {
        font-size: 2rem;
        margin-bottom: 15px;
    }

    .feature-box h5 {
        font-size: 1.2rem;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .feature-box p {
        font-size: 0.95rem;
        color: #cbd5e1;
    }

    footer {
        text-align: center;
        color: #94a3b8;
        padding: 30px 0;
    }
</style>

<div class="page-wrapper">
    <div class="container">
        <div class="hero-section">
            <h1>Temukan <span>Berita Terkini</span></h1>
            <p>Akses informasi terpercaya dari seluruh dunia dengan analisis mendalam dan update real-time.</p>
            <div class="hero-buttons">
                <a href="#" class="btn btn-purple">Berita Populer</a>
                <a href="#" class="btn btn-outline-light">Login untuk Berlangganan</a>
            </div>
        </div>

        <div class="row features g-4">
            <div class="col-md-4">
                <div class="feature-box">
                    <i class="fas fa-bolt text-primary"></i>
                    <h5>Update Real-time</h5>
                    <p>Informasi terbaru langsung ke genggaman Anda.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-box">
                    <i class="fas fa-check-circle text-warning"></i>
                    <h5>Fakta Terverifikasi</h5>
                    <p>Setiap berita melalui proses verifikasi ketat.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-box">
                    <i class="fas fa-globe text-success"></i>
                    <h5>Liputan Global</h5>
                    <p>Dari lokal hingga internasional dalam satu platform.</p>
                </div>
            </div>
        </div>
    </div>

    <footer>
        &copy; 2025 PortalBerita. All rights reserved.
    </footer>
</div>
@endsection
