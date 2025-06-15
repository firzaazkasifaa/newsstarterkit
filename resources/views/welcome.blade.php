<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal Berita - Informasi Terkini</title>
    <meta name="description" content="Dapatkan berita terkini dan terpercaya dari seluruh dunia">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* ========== VARIABLES ========== */
        :root {
            /* Colors */
            --primary: #4f46e5;
            --primary-dark: #4338ca;
            --primary-light: #6366f1;
            --accent: #f59e0b;
            --accent-dark: #d97706;
            
            /* Dark Mode */
            --text: #f3f4f6;
            --text-light: #d1d5db;
            --bg: #111827;
            --card: #1f2937;
            --border: #374151;
            
            /* Light Mode */
            --light-text: #1f2937;
            --light-text-light: #6b7280;
            --light-bg: #f9fafb;
            --light-card: #ffffff;
            --light-border: #e5e7eb;
        }

        /* ========== BASE STYLES ========== */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg);
            color: var(--text);
            line-height: 1.6;
            margin: 0;
            padding: 0;
            transition: all 0.3s ease;
        }

        h1, h2, h3, h4 {
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 700;
            line-height: 1.3;
            margin-top: 0;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        .container {
            width: 100%;
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        /* ========== UTILITY CLASSES ========== */
        .text-center { text-align: center; }
        .gradient-text {
            background: linear-gradient(90deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        /* ========== DARK/LIGHT MODE ========== */
        .light-mode {
            background-color: var(--light-bg);
            color: var(--light-text);
            --text: var(--light-text);
            --text-light: var(--light-text-light);
            --bg: var(--light-bg);
            --card: var(--light-card);
            --border: var(--light-border);
        }

        /* ========== COMPONENTS ========== */
        /* Buttons */
        .btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 500;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-primary {
            background: linear-gradient(90deg, var(--primary), var(--primary-light));
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.2);
        }

        .btn-outline {
            border: 1px solid var(--border);
            color: var(--text);
            background-color: transparent;
        }

        .btn-outline:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        /* Theme Toggle Button */
        .theme-toggle {
            background: rgba(255, 255, 255, 0.1);
            color: var(--text);
            border: 1px solid var(--border);
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }

        .theme-toggle:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .light-mode .theme-toggle {
            background: rgba(0, 0, 0, 0.05);
            color: var(--light-text);
            border-color: var(--light-border);
        }

        .light-mode .theme-toggle:hover {
            background: rgba(0, 0, 0, 0.1);
        }

        /* Cards */
        .card {
            background-color: var(--card);
            border-radius: 0.75rem;
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid var(--border);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        /* ========== LAYOUT ========== */
        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 2rem;
            background-color: var(--card);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 1.5rem;
            font-weight: 700;
        }

        .logo-tag {
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
            border-radius: 9999px;
            background-color: var(--primary);
            color: white;
        }

        .nav {
            display: flex;
            gap: 1.5rem;
        }

        .nav-link {
            color: var(--text-light);
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: var(--text);
        }

        /* Hero Section */
        .hero {
            position: relative;
            padding: 5rem 0;
            background-color: var(--bg);
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }

        /* Features */
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin: 3rem 0;
        }

        .feature-card {
            padding: 2rem;
            background-color: var(--card);
            border-radius: 1rem;
            transition: all 0.3s ease;
        }

        .feature-icon {
            width: 3.5rem;
            height: 3.5rem;
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }

        /* News Section */
        .news-section {
            padding: 4rem 0;
            background-color: var(--card);
        }

        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .news-img {
            height: 200px;
            width: 100%;
            object-fit: cover;
        }

        .news-tag {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
            background-color: var(--primary);
            color: white;
            position: absolute;
            top: 1rem;
            left: 1rem;
        }

        /* Footer */
        .footer {
            padding: 4rem 0 2rem;
            background-color: var(--card);
            border-top: 1px solid var(--border);
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-link {
            margin-bottom: 0.5rem;
            color: var(--text-light);
            transition: color 0.3s ease;
        }

        .footer-link:hover {
            color: var(--text);
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                padding: 1rem;
            }
            
            .nav {
                margin-top: 1rem;
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .hero-content {
                padding: 0 1rem;
            }
            
            .features {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body class="dark-mode">
    <!-- Header -->
    <header class="header">
        <div class="logo">
            <span class="gradient-text">PortalBerita</span>
            <span class="logo-tag">TERPERCAYA</span>
        </div>
        
        <nav class="nav">
            <a href="#" class="nav-link">Beranda</a>
            <a href="#trending" class="nav-link">Trending</a>
            <a href="#" class="nav-link">Kategori</a>
            <a href="#" class="nav-link">Tentang</a>
            <a href="#" class="nav-link">Kontak</a>
        </nav>
        
        <div class="nav">
            <button id="theme-toggle" class="theme-toggle">
                <i id="theme-icon" class="fas fa-moon"></i>
                <span id="theme-text">Mode Gelap</span>
            </button>
            <a href="{{ route('login') }}" class="btn btn-outline">Masuk</a>
            <a href="{{ route('register') }}" class="btn btn-primary">Daftar</a>

        </div>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="hero">
            <div class="container">
                <div class="hero-content">
                    <h1>Temukan <span class="gradient-text">Berita Terkini</span></h1>
                    <p class="text-large">Akses informasi terpercaya dari seluruh dunia dengan analisis mendalam dan update real-time.</p>
                    
                    <div style="margin-top: 2rem; display: flex; gap: 1rem; justify-content: center;">
                        <a href="#trending" class="btn btn-primary">Berita Populer</a>
                        <a href="login.html" class="btn btn-outline">Login untuk Berlangganan</a>
                    </div>
                </div>
                
                <div class="features">
                    <div class="feature-card">
                        <div class="feature-icon" style="background-color: rgba(99, 102, 241, 0.1);">
                            <i class="fas fa-bolt" style="color: #6366f1; font-size: 1.5rem;"></i>
                        </div>
                        <h3>Update Real-time</h3>
                        <p>Informasi terbaru langsung ke genggaman Anda.</p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon" style="background-color: rgba(245, 158, 11, 0.1);">
                            <i class="fas fa-check-circle" style="color: #f59e0b; font-size: 1.5rem;"></i>
                        </div>
                        <h3>Fakta Terverifikasi</h3>
                        <p>Setiap berita melalui proses verifikasi ketat.</p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon" style="background-color: rgba(16, 185, 129, 0.1);">
                            <i class="fas fa-globe" style="color: #10b981; font-size: 1.5rem;"></i>
                        </div>
                        <h3>Liputan Global</h3>
                        <p>Dari lokal hingga internasional dalam satu platform.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Trending News -->
        <section id="trending" class="news-section">
            <div class="container">
                <div class="text-center">
                    <h2>Berita <span class="gradient-text">Trending</span></h2>
                    <p>Topik yang sedang banyak dibicarakan hari ini</p>
                </div>
                
                <div class="news-grid">
                    <div class="card">
                        <div style="position: relative;">
                            <img src="https://images.unsplash.com/photo-1586339949916-3e9457bef6d3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                                 alt="News" class="news-img">
                            <span class="news-tag">POLITIK</span>
                        </div>
                        <div style="padding: 1.5rem;">
                            <h3 style="margin-bottom: 0.5rem;">Pertemuan Puncak G20 Hasilkan Kesepakatan Baru</h3>
                            <p style="color: var(--text-light); margin-bottom: 1rem;">Para pemimpin dunia menyepakati pakta baru untuk mengatasi krisis ekonomi global.</p>
                            <div style="display: flex; align-items: center; color: var(--text-light); font-size: 0.875rem;">
                                <span>2 jam lalu</span>
                                <span style="margin: 0 0.5rem;">•</span>
                                <span>1.2k dilihat</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div style="position: relative;">
                            <img src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                                 alt="News" class="news-img">
                            <span class="news-tag">TEKNOLOGI</span>
                        </div>
                        <div style="padding: 1.5rem;">
                            <h3 style="margin-bottom: 0.5rem;">Inovasi Terbaru AI Ubah Cara Kerja Perusahaan</h3>
                            <p style="color: var(--text-light); margin-bottom: 1rem;">Teknologi kecerdasan artifisial generasi berikutnya meningkatkan produktivitas.</p>
                            <div style="display: flex; align-items: center; color: var(--text-light); font-size: 0.875rem;">
                                <span>5 jam lalu</span>
                                <span style="margin: 0 0.5rem;">•</span>
                                <span>3.4k dilihat</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div style="position: relative;">
                            <img src="https://images.unsplash.com/photo-1575505586569-646b2ca898fc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1465&q=80" 
                                 alt="News" class="news-img">
                            <span class="news-tag">KESEHATAN</span>
                        </div>
                        <div style="padding: 1.5rem;">
                            <h3 style="margin-bottom: 0.5rem;">Penemuan Vaksin Baru untuk Penyakit Langka</h3>
                            <p style="color: var(--text-light); margin-bottom: 1rem;">Para peneliti berhasil mengembangkan vaksin untuk penyakit genetik langka.</p>
                            <div style="display: flex; align-items: center; color: var(--text-light); font-size: 0.875rem;">
                                <span>1 hari lalu</span>
                                <span style="margin: 0 0.5rem;">•</span>
                                <span>5.7k dilihat</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div style="text-align: center; margin-top: 3rem;">
                    <a href="login.html" class="btn btn-accent" style="background: linear-gradient(90deg, var(--accent), #fbbf24); color: white;">
                        Lihat Semua Berita <i class="fas fa-arrow-right" style="margin-left: 0.5rem;"></i>
                    </a>
                </div>
            </div>
        </section>

        <!-- Newsletter -->
        <section style="padding: 4rem 0; background: linear-gradient(90deg, var(--primary), var(--primary-light)); color: white;">
            <div class="container">
                <div style="max-width: 600px; margin: 0 auto; text-align: center;">
                    <h2 style="margin-bottom: 1rem;">Berlangganan Newsletter Kami</h2>
                    <p style="margin-bottom: 2rem; opacity: 0.9;">Dapatkan update berita terbaru langsung ke inbox email Anda setiap hari</p>
                    
                    <form style="display: flex; gap: 1rem;">
                        <input type="email" placeholder="Alamat email Anda" 
                               style="flex: 1; padding: 0.75rem 1rem; border-radius: 0.5rem; border: none;">
                        <button type="submit" class="btn" style="background-color: white; color: var(--primary);">
                            Berlangganan
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div>
                    <h3 style="margin-bottom: 1rem;" class="gradient-text">PortalBerita</h3>
                    <p style="color: var(--text-light);">Sumber informasi terkini dan terpercaya untuk pembaca Indonesia.</p>
                </div>
                
                <div>
                    <h4 style="margin-bottom: 1rem; font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.05em; color: var(--text-light);">Perusahaan</h4>
                    <ul class="footer-links">
                        <li><a href="#" class="footer-link">Tentang Kami</a></li>
                        <li><a href="#" class="footer-link">Tim Redaksi</a></li>
                        <li><a href="#" class="footer-link">Karier</a></li>
                        <li><a href="#" class="footer-link">Kontak</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 style="margin-bottom: 1rem; font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.05em; color: var(--text-light);">Kategori</h4>
                    <ul class="footer-links">
                        <li><a href="#" class="footer-link">Politik</a></li>
                        <li><a href="#" class="footer-link">Bisnis</a></li>
                        <li><a href="#" class="footer-link">Teknologi</a></li>
                        <li><a href="#" class="footer-link">Kesehatan</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 style="margin-bottom: 1rem; font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.05em; color: var(--text-light);">Legal</h4>
                    <ul class="footer-links">
                        <li><a href="#" class="footer-link">Kebijakan Privasi</a></li>
                        <li><a href="#" class="footer-link">Syarat & Ketentuan</a></li>
                        <li><a href="#" class="footer-link">Kebijakan Konten</a></li>
                        <li><a href="#" class="footer-link">Pedoman Media Siber</a></li>
                    </ul>
                </div>
            </div>
            
            <div style="padding-top: 2rem; border-top: 1px solid var(--border); display: flex; flex-direction: column; gap: 1rem; align-items: center; justify-content: space-between;">
                <div style="color: var(--text-light); font-size: 0.875rem;">
                    © 2023 PortalBerita. Hak Cipta Dilindungi.
                </div>
                
                <div style="display: flex; gap: 1.5rem;">
                    <a href="#" style="color: var(--text-light); transition: color 0.3s ease;">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" style="color: var(--text-light); transition: color 0.3s ease;">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" style="color: var(--text-light); transition: color 0.3s ease;">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" style="color: var(--text-light); transition: color 0.3s ease;">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Dark/Light Mode Toggle
        const themeToggle = document.getElementById('theme-toggle');
        const themeIcon = document.getElementById('theme-icon');
        const themeText = document.getElementById('theme-text');

        themeToggle.addEventListener('click', function() {
            document.body.classList.toggle('light-mode');
            
            if (document.body.classList.contains('light-mode')) {
                themeIcon.classList.replace('fa-moon', 'fa-sun');
                themeText.textContent = 'Mode Terang';
                localStorage.setItem('theme', 'light');
            } else {
                themeIcon.classList.replace('fa-sun', 'fa-moon');
                themeText.textContent = 'Mode Gelap';
                localStorage.setItem('theme', 'dark');
            }
        });

        // Check for saved theme preference
        if (localStorage.getItem('theme') === 'light') {
            document.body.classList.add('light-mode');
            themeIcon.classList.replace('fa-moon', 'fa-sun');
            themeText.textContent = 'Mode Terang';
        }

        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>