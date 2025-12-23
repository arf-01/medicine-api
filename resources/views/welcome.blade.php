<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Medicine API — Healthcare Data Platform</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            * { margin: 0; padding: 0; box-sizing: border-box; }
            
            html, body {
                height: 100%;
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            }
            
            body {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: #fff;
                overflow-x: hidden;
            }
            
            .container {
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 20px;
                position: relative;
            }
            
            .background-animation {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                overflow: hidden;
                z-index: 0;
            }
            
            .pulse {
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.1);
                animation: pulse-animation 3s infinite;
            }
            
            .pulse:nth-child(1) { width: 300px; height: 300px; top: 10%; left: 5%; animation-delay: 0s; }
            .pulse:nth-child(2) { width: 200px; height: 200px; top: 60%; left: 70%; animation-delay: 1s; }
            .pulse:nth-child(3) { width: 150px; height: 150px; top: 30%; right: 10%; animation-delay: 2s; }
            
            @keyframes pulse-animation {
                0%, 100% { transform: scale(1); opacity: 0.3; }
                50% { transform: scale(1.1); opacity: 0.1; }
            }
            
            .card {
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(10px);
                border-radius: 24px;
                padding: 60px 50px;
                max-width: 900px;
                width: 100%;
                box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
                position: relative;
                z-index: 1;
                animation: fadeInUp 0.8s ease-out;
            }
            
            @keyframes fadeInUp {
                from { opacity: 0; transform: translateY(30px); }
                to { opacity: 1; transform: translateY(0); }
            }
            
            .icon-container {
                display: flex;
                justify-content: center;
                margin-bottom: 30px;
            }
            
            .medical-icon {
                width: 80px;
                height: 80px;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                border-radius: 20px;
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
                animation: float 3s ease-in-out infinite;
            }
            
            @keyframes float {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-10px); }
            }
            
            .medical-cross {
                width: 40px;
                height: 40px;
                position: relative;
            }
            
            .medical-cross::before,
            .medical-cross::after {
                content: '';
                position: absolute;
                background: white;
                border-radius: 2px;
            }
            
            .medical-cross::before {
                width: 10px;
                height: 40px;
                left: 15px;
                top: 0;
            }
            
            .medical-cross::after {
                width: 40px;
                height: 10px;
                left: 0;
                top: 15px;
            }
            
            h1 {
                color: #2d3748;
                font-size: 48px;
                font-weight: 800;
                text-align: center;
                margin-bottom: 15px;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }
            
            .subtitle {
                color: #4a5568;
                font-size: 18px;
                text-align: center;
                margin-bottom: 40px;
                line-height: 1.6;
            }
            
            .features {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 20px;
                margin-bottom: 40px;
            }
            
            .feature {
                background: #f7fafc;
                padding: 25px;
                border-radius: 12px;
                text-align: center;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }
            
            .feature:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 25px rgba(102, 126, 234, 0.2);
            }
            
            .feature-icon {
                font-size: 32px;
                margin-bottom: 10px;
            }
            
            .feature-title {
                color: #2d3748;
                font-weight: 600;
                font-size: 16px;
                margin-bottom: 5px;
            }
            
            .feature-desc {
                color: #718096;
                font-size: 13px;
            }
            
            .cta-buttons {
                display: flex;
                gap: 15px;
                justify-content: center;
                flex-wrap: wrap;
                margin-bottom: 30px;
            }
            
            .btn {
                padding: 14px 32px;
                border-radius: 12px;
                text-decoration: none;
                font-weight: 600;
                font-size: 16px;
                transition: all 0.3s ease;
                display: inline-block;
            }
            
            .btn-primary {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
                box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
            }
            
            .btn-primary:hover {
                transform: translateY(-2px);
                box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
            }
            
            .btn-secondary {
                background: white;
                color: #667eea;
                border: 2px solid #667eea;
            }
            
            .btn-secondary:hover {
                background: #667eea;
                color: white;
            }
            
            .footer-links {
                text-align: center;
                padding-top: 30px;
                border-top: 1px solid #e2e8f0;
            }
            
            .footer-links a {
                color: #667eea;
                text-decoration: none;
                font-weight: 500;
                margin: 0 12px;
                transition: color 0.3s ease;
            }
            
            .footer-links a:hover {
                color: #764ba2;
            }
            
            .status-badge {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                background: #48bb78;
                color: white;
                padding: 8px 16px;
                border-radius: 20px;
                font-size: 14px;
                font-weight: 600;
                margin-bottom: 20px;
            }
            
            .status-dot {
                width: 8px;
                height: 8px;
                background: white;
                border-radius: 50%;
                animation: blink 2s infinite;
            }
            
            @keyframes blink {
                0%, 100% { opacity: 1; }
                50% { opacity: 0.3; }
            }
            
            @media (max-width: 768px) {
                .card { padding: 40px 30px; }
                h1 { font-size: 36px; }
                .subtitle { font-size: 16px; }
                .features { grid-template-columns: 1fr; }
            }
            
            @media (prefers-color-scheme: dark) {
                body {
                    background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
                }
                
                .card {
                    background: rgba(45, 55, 72, 0.95);
                }
                
                h1 {
                    color: #e2e8f0;
                    -webkit-text-fill-color: #e2e8f0;
                }
                
                .subtitle {
                    color: #cbd5e0;
                }
                
                .feature {
                    background: #2d3748;
                }
                
                .feature-title {
                    color: #e2e8f0;
                }
                
                .feature-desc {
                    color: #a0aec0;
                }
                
                .footer-links {
                    border-top-color: #4a5568;
                }
            }
        </style>
    @endif
</head>
<body>
    <div class="background-animation">
        <div class="pulse"></div>
        <div class="pulse"></div>
        <div class="pulse"></div>
    </div>
    
    <div class="container">
        <div class="card">
            <div style="text-align: center;">
                <span class="status-badge">
                    <span class="status-dot"></span>
                    API Online
                </span>
            </div>
            
            <div class="icon-container">
                <div class="medical-icon">
                    <div class="medical-cross"></div>
                </div>
            </div>
            
            <h1>Medicine API</h1>
            <p class="subtitle">
                Your comprehensive healthcare data platform. Access medical information, 
                pharmaceutical data, and health records through our secure RESTful API.
            </p>
            
            <div class="features">
                <div class="feature">
                    <div class="feature-icon">🏥</div>
                    <div class="feature-title">Medical Records</div>
                    <div class="feature-desc">Secure patient data management</div>
                </div>
                <div class="feature">
                    <div class="feature-icon">💊</div>
                    <div class="feature-title">Drug Database</div>
                    <div class="feature-desc">Comprehensive medication info</div>
                </div>
                <div class="feature">
                    <div class="feature-icon">🔒</div>
                    <div class="feature-title">HIPAA Compliant</div>
                    <div class="feature-desc">Industry-standard security</div>
                </div>
                <div class="feature">
                    <div class="feature-icon">⚡</div>
                    <div class="feature-title">Real-time Access</div>
                    <div class="feature-desc">Fast and reliable responses</div>
                </div>
            </div>
            
            <div class="cta-buttons">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-primary">Go to Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">Get Started</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-secondary">Create Account</a>
                        @endif
                    @endauth
                @else
                    <a href="#" class="btn btn-primary">View API Docs</a>
                    <a href="#" class="btn btn-secondary">Contact Sales</a>
                @endif
            </div>
            
            <div class="footer-links">
                <a href="https://laravel.com/docs" target="_blank" rel="noopener">Documentation</a>
                <span style="color: #cbd5e0;">•</span>
                <a href="#" target="_blank" rel="noopener">API Reference</a>
                <span style="color: #cbd5e0;">•</span>
                <a href="#" target="_blank" rel="noopener">Support</a>
                <span style="color: #cbd5e0;">•</span>
                <a href="#" target="_blank" rel="noopener">Privacy Policy</a>
            </div>
        </div>
    </div>
</body>
</html>
