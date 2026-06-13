<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="EcoJac — Plataforma inteligente para descarte correto de lixo seletivo. Encontre pontos de coleta, aprenda a separar resíduos e contribua com o meio ambiente.">
    <title>EcoJac — Descarte Inteligente de Resíduos</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        /* ========================================
           DESIGN SYSTEM — TOKENS
        ======================================== */
        :root {
            /* Paleta principal — tons orgânicos e naturais */
            --color-primary: #16a34a;
            --color-primary-light: #22c55e;
            --color-primary-dark: #15803d;
            --color-accent: #facc15;
            --color-accent-dark: #eab308;

            /* Superfícies */
            --surface-dark: #0c1117;
            --surface-card: rgba(255, 255, 255, 0.04);
            --surface-card-hover: rgba(255, 255, 255, 0.08);
            --border-subtle: rgba(255, 255, 255, 0.08);

            /* Texto */
            --text-primary: #f0fdf4;
            --text-secondary: #a3a3a3;
            --text-muted: #737373;

            /* Cor por tipo de resíduo */
            --red-bin: #ef4444;
            --blue-bin: #3b82f6;
            --yellow-bin: #facc15;
            --green-bin: #22c55e;

            /* Tipografia */
            --font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;

            /* Espaçamento */
            --section-gap: 7rem;
            --container-max: 1120px;
            --radius-md: 14px;
            --radius-lg: 20px;
        }

        /* ========================================
           RESET & BASE
        ======================================== */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        html { scroll-behavior: smooth; }

        body {
            font-family: var(--font-family);
            background: var(--surface-dark);
            color: var(--text-primary);
            line-height: 1.7;
            -webkit-font-smoothing: antialiased;
            overflow-x: hidden;
        }

        a { color: inherit; text-decoration: none; }
        img { max-width: 100%; display: block; }

        /* ========================================
           UTILITY
        ======================================== */
        .container {
            max-width: var(--container-max);
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        .section { padding: var(--section-gap) 0; }

        .section-label {
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            color: var(--color-primary-light);
            margin-bottom: 0.75rem;
        }

        .section-title {
            font-size: clamp(1.75rem, 4vw, 2.5rem);
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 1rem;
        }

        .section-subtitle {
            color: var(--text-secondary);
            font-size: 1.05rem;
            max-width: 600px;
        }

        .section-header {
            text-align: center;
            margin-bottom: 3.5rem;
        }
        .section-header .section-subtitle {
            margin: 0 auto;
        }

        /* ========================================
           ANIMATED BACKGROUND — FLOATING ORBS
        ======================================== */
        .bg-orbs {
            position: fixed;
            inset: 0;
            z-index: 0;
            pointer-events: none;
            overflow: hidden;
        }

        .bg-orbs span {
            position: absolute;
            border-radius: 50%;
            filter: blur(100px);
            opacity: 0.15;
            animation: float 20s ease-in-out infinite alternate;
        }

        .bg-orbs span:nth-child(1) {
            width: 500px; height: 500px;
            background: var(--color-primary);
            top: -10%; left: -5%;
        }
        .bg-orbs span:nth-child(2) {
            width: 400px; height: 400px;
            background: var(--color-accent);
            bottom: 10%; right: -5%;
            animation-delay: -7s;
        }
        .bg-orbs span:nth-child(3) {
            width: 350px; height: 350px;
            background: var(--blue-bin);
            top: 50%; left: 40%;
            animation-delay: -14s;
        }

        @keyframes float {
            0%   { transform: translateY(0) scale(1); }
            100% { transform: translateY(-60px) scale(1.08); }
        }

        /* ========================================
           NAVBAR
        ======================================== */
        .navbar {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 100;
            padding: 1rem 0;
            transition: background 0.4s, backdrop-filter 0.4s;
        }

        .navbar.scrolled {
            background: rgba(12, 17, 23, 0.8);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid var(--border-subtle);
        }

        .navbar .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            font-weight: 800;
            font-size: 1.35rem;
        }

        .navbar-brand .logo-icon {
            width: 36px; height: 36px;
            background: linear-gradient(135deg, var(--color-primary), var(--color-accent));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
        }

        .navbar-links {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        .navbar-links a {
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--text-secondary);
            transition: color 0.25s;
        }

        .navbar-links a:hover { color: var(--text-primary); }

        .navbar-cta {
            padding: 0.55rem 1.4rem;
            background: var(--color-primary);
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.85rem;
            color: #fff;
            transition: background 0.25s, transform 0.2s;
            border: none;
            cursor: pointer;
        }

        .navbar-cta:hover {
            background: var(--color-primary-light);
            transform: translateY(-1px);
        }

        /* Hamburger */
        .navbar-toggle {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            flex-direction: column;
            gap: 5px;
        }
        .navbar-toggle span {
            display: block;
            width: 24px;
            height: 2px;
            background: var(--text-primary);
            border-radius: 2px;
            transition: transform 0.3s;
        }

        /* ========================================
           HERO
        ======================================== */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            z-index: 1;
            padding-top: 5rem;
        }

        .hero .container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .hero-content { max-width: 560px; }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.4rem 1rem;
            background: rgba(22, 163, 74, 0.15);
            border: 1px solid rgba(22, 163, 74, 0.3);
            border-radius: 50px;
            font-size: 0.78rem;
            font-weight: 600;
            color: var(--color-primary-light);
            margin-bottom: 1.5rem;
        }

        .hero-badge .pulse {
            width: 8px; height: 8px;
            background: var(--color-primary-light);
            border-radius: 50%;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(1.4); }
        }

        .hero h1 {
            font-size: clamp(2.2rem, 5vw, 3.5rem);
            font-weight: 900;
            line-height: 1.1;
            margin-bottom: 1.25rem;
        }

        .hero h1 .highlight {
            background: linear-gradient(135deg, var(--color-primary-light), var(--color-accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero p {
            font-size: 1.1rem;
            color: var(--text-secondary);
            margin-bottom: 2rem;
            max-width: 480px;
        }

        .hero-actions {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.8rem 1.8rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--color-primary), var(--color-primary-dark));
            color: #fff;
            box-shadow: 0 4px 24px rgba(22, 163, 74, 0.3);
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 32px rgba(22, 163, 74, 0.45);
        }

        .btn-outline {
            background: transparent;
            color: var(--text-primary);
            border: 1px solid var(--border-subtle);
        }
        .btn-outline:hover {
            background: var(--surface-card-hover);
            border-color: var(--color-primary);
        }

        /* Hero visual — mockup de terminal */
        .hero-visual {
            display: flex;
            justify-content: center;
        }

        .terminal-card {
            background: rgba(15, 23, 32, 0.9);
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-lg);
            overflow: hidden;
            width: 100%;
            max-width: 480px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.4);
            animation: slideUp 0.8s ease-out;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(40px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .terminal-header {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.8rem 1rem;
            background: rgba(255,255,255,0.03);
            border-bottom: 1px solid var(--border-subtle);
        }

        .terminal-dot {
            width: 10px; height: 10px;
            border-radius: 50%;
        }
        .terminal-dot.red   { background: #ef4444; }
        .terminal-dot.amber { background: #f59e0b; }
        .terminal-dot.green { background: #22c55e; }

        .terminal-header span:last-child {
            margin-left: auto;
            font-size: 0.72rem;
            color: var(--text-muted);
            font-weight: 500;
        }

        .terminal-body {
            padding: 1.25rem;
            font-family: 'Courier New', monospace;
            font-size: 0.82rem;
            line-height: 1.8;
            color: var(--text-secondary);
        }

        .terminal-body .prompt { color: var(--color-primary-light); }
        .terminal-body .key   { color: var(--color-accent); }
        .terminal-body .str   { color: #a78bfa; }
        .terminal-body .ok    { color: var(--color-primary-light); }

        /* ========================================
           PROBLEMA
        ======================================== */
        .problem { position: relative; z-index: 1; }

        .problem-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }

        .stat-row {
            display: flex;
            gap: 2rem;
            margin-top: 2rem;
        }

        .stat {
            text-align: center;
        }

        .stat-value {
            font-size: 2.2rem;
            font-weight: 900;
            background: linear-gradient(135deg, var(--color-primary-light), var(--color-accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stat-label {
            font-size: 0.8rem;
            color: var(--text-muted);
            margin-top: 0.25rem;
        }

        .problem-visual {
            display: flex;
            justify-content: center;
        }

        .color-bins {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            max-width: 380px;
            width: 100%;
        }

        .bin-card {
            padding: 1.25rem;
            border-radius: var(--radius-md);
            background: var(--surface-card);
            border: 1px solid var(--border-subtle);
            text-align: center;
            transition: transform 0.3s, border-color 0.3s;
        }

        .bin-card:hover {
            transform: translateY(-4px);
        }

        .bin-card .icon {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .bin-card .label {
            font-weight: 700;
            font-size: 0.9rem;
            margin-bottom: 0.2rem;
        }

        .bin-card .desc {
            font-size: 0.75rem;
            color: var(--text-muted);
        }

        .bin-card.red   { border-color: rgba(239, 68, 68, 0.3); }
        .bin-card.red:hover { border-color: var(--red-bin); }
        .bin-card.red .label { color: var(--red-bin); }

        .bin-card.blue  { border-color: rgba(59, 130, 246, 0.3); }
        .bin-card.blue:hover { border-color: var(--blue-bin); }
        .bin-card.blue .label { color: var(--blue-bin); }

        .bin-card.yellow { border-color: rgba(250, 204, 21, 0.3); }
        .bin-card.yellow:hover { border-color: var(--yellow-bin); }
        .bin-card.yellow .label { color: var(--yellow-bin); }

        .bin-card.green { border-color: rgba(34, 197, 94, 0.3); }
        .bin-card.green:hover { border-color: var(--green-bin); }
        .bin-card.green .label { color: var(--green-bin); }

        /* ========================================
           FEATURES
        ======================================== */
        .features { position: relative; z-index: 1; }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
        }

        .feature-card {
            background: var(--surface-card);
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-lg);
            padding: 2rem;
            transition: transform 0.35s, border-color 0.35s, background 0.35s;
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(22, 163, 74, 0.06), transparent);
            opacity: 0;
            transition: opacity 0.35s;
        }

        .feature-card:hover {
            transform: translateY(-6px);
            border-color: rgba(22, 163, 74, 0.3);
            background: var(--surface-card-hover);
        }

        .feature-card:hover::before { opacity: 1; }

        .feature-icon {
            width: 52px; height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1.25rem;
            background: rgba(22, 163, 74, 0.12);
            border: 1px solid rgba(22, 163, 74, 0.2);
        }

        .feature-card h3 {
            font-size: 1.15rem;
            font-weight: 700;
            margin-bottom: 0.6rem;
        }

        .feature-card p {
            font-size: 0.9rem;
            color: var(--text-secondary);
            line-height: 1.6;
        }

        /* ========================================
           AUDIENCE
        ======================================== */
        .audience { position: relative; z-index: 1; }

        .audience-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
        }

        .audience-card {
            background: var(--surface-card);
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-lg);
            padding: 2rem;
            text-align: center;
            transition: transform 0.3s, border-color 0.3s;
        }

        .audience-card:hover {
            transform: translateY(-4px);
            border-color: rgba(250, 204, 21, 0.3);
        }

        .audience-card .emoji {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .audience-card h3 {
            font-size: 1.05rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .audience-card p {
            font-size: 0.85rem;
            color: var(--text-secondary);
        }

        /* ========================================
           ENDPOINTS
        ======================================== */
        .endpoints { position: relative; z-index: 1; }

        .endpoints-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            max-width: 800px;
            margin: 0 auto;
        }

        .endpoint-item {
            display: flex;
            align-items: center;
            gap: 1.25rem;
            padding: 1.25rem 1.5rem;
            background: var(--surface-card);
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-md);
            transition: border-color 0.3s, background 0.3s, transform 0.3s;
            cursor: pointer;
        }

        .endpoint-item:hover {
            border-color: rgba(22, 163, 74, 0.4);
            background: var(--surface-card-hover);
            transform: translateX(6px);
        }

        .method-badge {
            padding: 0.3rem 0.75rem;
            border-radius: 8px;
            font-size: 0.72rem;
            font-weight: 800;
            letter-spacing: 0.05em;
            background: rgba(22, 163, 74, 0.15);
            color: var(--color-primary-light);
            border: 1px solid rgba(22, 163, 74, 0.3);
            flex-shrink: 0;
        }

        .endpoint-info { flex: 1; }

        .endpoint-path {
            font-family: 'Courier New', monospace;
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--text-primary);
        }

        .endpoint-desc {
            font-size: 0.8rem;
            color: var(--text-muted);
            margin-top: 0.2rem;
        }

        .endpoint-arrow {
            font-size: 1.2rem;
            color: var(--text-muted);
            transition: color 0.3s, transform 0.3s;
        }

        .endpoint-item:hover .endpoint-arrow {
            color: var(--color-primary-light);
            transform: translateX(4px);
        }

        /* ========================================
           FOOTER
        ======================================== */
        footer {
            position: relative;
            z-index: 1;
            border-top: 1px solid var(--border-subtle);
            padding: 3rem 0;
            text-align: center;
        }

        footer p {
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        footer .heart { color: var(--red-bin); }

        /* ========================================
           ANIMATIONS — SCROLL REVEAL
        ======================================== */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.7s ease, transform 0.7s ease;
        }
        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ========================================
           RESPONSIVE
        ======================================== */
        @media (max-width: 900px) {
            .hero .container {
                grid-template-columns: 1fr;
                text-align: center;
            }
            .hero-content { max-width: 100%; }
            .hero p { max-width: 100%; }
            .hero-actions { justify-content: center; }
            .hero-visual { margin-top: 2rem; }

            .problem-grid {
                grid-template-columns: 1fr;
            }

            .features-grid,
            .audience-grid {
                grid-template-columns: 1fr;
            }

            .stat-row { justify-content: center; }
        }

        @media (max-width: 640px) {
            :root { --section-gap: 4.5rem; }

            .navbar-links { display: none; }
            .navbar-toggle { display: flex; }

            .navbar-links.open {
                display: flex;
                flex-direction: column;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: rgba(12, 17, 23, 0.95);
                backdrop-filter: blur(16px);
                padding: 1.5rem;
                gap: 1rem;
                border-bottom: 1px solid var(--border-subtle);
            }

            .terminal-card { max-width: 100%; }

            .stat-row { flex-direction: column; align-items: center; }
        }
    </style>
</head>

<body>

    {{-- Animated background orbs --}}
    <div class="bg-orbs" aria-hidden="true">
        <span></span>
        <span></span>
        <span></span>
    </div>

    {{-- ===== NAVBAR ===== --}}
    <nav class="navbar" id="navbar">
        <div class="container">
            <a href="#" class="navbar-brand">
                <span class="logo-icon">♻️</span>
                EcoJac
            </a>
            <ul class="navbar-links" id="navLinks">
                <li><a href="#problema">O Problema</a></li>
                <li><a href="#funcionalidades">Funcionalidades</a></li>
                <li><a href="#publico">Público-alvo</a></li>
                <li><a href="#endpoints">API</a></li>
            </ul>
            <a href="#endpoints" class="navbar-cta">Testar API</a>
            <button class="navbar-toggle" id="navToggle" aria-label="Abrir menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </nav>

    <main>
        {{-- ===== HERO ===== --}}
        <section class="hero" id="hero">
            <div class="container">
                <div class="hero-content">
                    <div class="hero-badge">
                        <span class="pulse"></span>
                        Projeto de TCC — EcoJac v1.0
                    </div>

                    <h1>Descarte seus resíduos de forma <span class="highlight">inteligente.</span></h1>

                    <p>
                        O EcoJac é uma plataforma que conecta cidadãos a pontos de coleta seletiva,
                        ensinando a separar corretamente cada tipo de resíduo e promovendo a sustentabilidade.
                    </p>

                    <div class="hero-actions">
                        <a href="#funcionalidades" class="btn btn-primary">Conhecer o Projeto</a>
                        <a href="#endpoints" class="btn btn-outline">Ver Endpoints →</a>
                    </div>
                </div>

                <div class="hero-visual">
                    <div class="terminal-card">
                        <div class="terminal-header">
                            <span class="terminal-dot red"></span>
                            <span class="terminal-dot amber"></span>
                            <span class="terminal-dot green"></span>
                            <span>GET /api/status</span>
                        </div>
                        <div class="terminal-body">
                            <span class="prompt">$</span> curl /api/status<br><br>
                            {<br>
                            &nbsp;&nbsp;<span class="key">"projeto"</span>: <span class="str">"EcoJac API"</span>,<br>
                            &nbsp;&nbsp;<span class="key">"status"</span>: <span class="ok">"Online"</span>,<br>
                            &nbsp;&nbsp;<span class="key">"versao"</span>: <span class="str">"1.0.0"</span><br>
                            }
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ===== PROBLEMA ===== --}}
        <section class="section problem" id="problema">
            <div class="container">
                <div class="problem-grid">
                    <div class="reveal">
                        <span class="section-label">O Problema</span>
                        <h2 class="section-title">O Brasil recicla menos de 4% do lixo que produz.</h2>
                        <p class="section-subtitle">
                            Milhões de toneladas de resíduos recicláveis acabam em aterros sanitários por falta de informação.
                            A maioria das pessoas não sabe onde descartar corretamente ou como separar os materiais.
                            O EcoJac nasce para preencher essa lacuna com tecnologia acessível.
                        </p>

                        <div class="stat-row">
                            <div class="stat">
                                <div class="stat-value">80M</div>
                                <div class="stat-label">Toneladas/ano de lixo</div>
                            </div>
                            <div class="stat">
                                <div class="stat-value">~4%</div>
                                <div class="stat-label">Taxa de reciclagem</div>
                            </div>
                            <div class="stat">
                                <div class="stat-value">30%</div>
                                <div class="stat-label">Potencial reciclável</div>
                            </div>
                        </div>
                    </div>

                    <div class="problem-visual reveal">
                        <div class="color-bins">
                            <div class="bin-card red">
                                <div class="icon">🔴</div>
                                <div class="label">Plástico</div>
                                <div class="desc">Garrafas, embalagens</div>
                            </div>
                            <div class="bin-card blue">
                                <div class="icon">🔵</div>
                                <div class="label">Papel</div>
                                <div class="desc">Jornais, papelão</div>
                            </div>
                            <div class="bin-card yellow">
                                <div class="icon">🟡</div>
                                <div class="label">Metal</div>
                                <div class="desc">Latas, tampinhas</div>
                            </div>
                            <div class="bin-card green">
                                <div class="icon">🟢</div>
                                <div class="label">Vidro</div>
                                <div class="desc">Garrafas, potes</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ===== FUNCIONALIDADES ===== --}}
        <section class="section features" id="funcionalidades">
            <div class="container">
                <div class="section-header reveal">
                    <span class="section-label">Funcionalidades</span>
                    <h2 class="section-title">Tudo que você precisa para reciclar certo.</h2>
                    <p class="section-subtitle">
                        O EcoJac oferece ferramentas práticas para facilitar o descarte seletivo no dia a dia.
                    </p>
                </div>

                <div class="features-grid">
                    <div class="feature-card reveal">
                        <div class="feature-icon">📍</div>
                        <h3>Mapa de Pontos de Coleta</h3>
                        <p>
                            Encontre ecopontos e postos de coleta seletiva próximos a você,
                            com informações sobre os tipos de resíduos aceitos em cada local.
                        </p>
                    </div>

                    <div class="feature-card reveal">
                        <div class="feature-icon">📚</div>
                        <h3>Guia de Separação</h3>
                        <p>
                            Aprenda a identificar cada tipo de material pelas cores padrão
                            e descubra o que pode ou não ser reciclado de forma simples e visual.
                        </p>
                    </div>

                    <div class="feature-card reveal">
                        <div class="feature-icon">💡</div>
                        <h3>Dicas Inteligentes</h3>
                        <p>
                            Receba dicas práticas sobre como preparar seus resíduos para a coleta,
                            evitando contaminação e otimizando o espaço de armazenamento.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        {{-- ===== PÚBLICO-ALVO ===== --}}
        <section class="section audience" id="publico">
            <div class="container">
                <div class="section-header reveal">
                    <span class="section-label">Público-alvo</span>
                    <h2 class="section-title">Para quem o EcoJac foi feito?</h2>
                    <p class="section-subtitle">
                        Qualquer pessoa que deseja contribuir com a sustentabilidade urbana.
                    </p>
                </div>

                <div class="audience-grid">
                    <div class="audience-card reveal">
                        <div class="emoji">🏠</div>
                        <h3>Moradores</h3>
                        <p>Famílias que querem organizar a coleta seletiva em casa e encontrar ecopontos próximos.</p>
                    </div>
                    <div class="audience-card reveal">
                        <div class="emoji">🏫</div>
                        <h3>Escolas e Universidades</h3>
                        <p>Instituições de ensino que desejam integrar a educação ambiental nas atividades acadêmicas.</p>
                    </div>
                    <div class="audience-card reveal">
                        <div class="emoji">🏢</div>
                        <h3>Empresas e Comércios</h3>
                        <p>Negócios que precisam descartar resíduos corretamente e cumprir normas ambientais.</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- ===== ENDPOINTS ===== --}}
        <section class="section endpoints" id="endpoints">
            <div class="container">
                <div class="section-header reveal">
                    <span class="section-label">API REST</span>
                    <h2 class="section-title">Endpoints da API</h2>
                    <p class="section-subtitle">
                        Explore os recursos disponíveis na API do EcoJac. Clique em qualquer endpoint para testar ao vivo.
                    </p>
                </div>

                <div class="endpoints-list">
                    <a href="/api/status" target="_blank" class="endpoint-item reveal" id="endpoint-status">
                        <span class="method-badge">GET</span>
                        <div class="endpoint-info">
                            <div class="endpoint-path">/api/status</div>
                            <div class="endpoint-desc">Verifica se a API está online e retorna a versão atual.</div>
                        </div>
                        <span class="endpoint-arrow">→</span>
                    </a>

                    <a href="/api/pontos-coleta" target="_blank" class="endpoint-item reveal" id="endpoint-pontos-coleta">
                        <span class="method-badge">GET</span>
                        <div class="endpoint-info">
                            <div class="endpoint-path">/api/pontos-coleta</div>
                            <div class="endpoint-desc">Lista os pontos de coleta seletiva com endereços e tipos aceitos.</div>
                        </div>
                        <span class="endpoint-arrow">→</span>
                    </a>

                    <a href="/api/tipos-residuos" target="_blank" class="endpoint-item reveal" id="endpoint-tipos-residuos">
                        <span class="method-badge">GET</span>
                        <div class="endpoint-info">
                            <div class="endpoint-path">/api/tipos-residuos</div>
                            <div class="endpoint-desc">Retorna as categorias de resíduos com as cores padrão de cada lixeira.</div>
                        </div>
                        <span class="endpoint-arrow">→</span>
                    </a>

                    <a href="/api/dicas" target="_blank" class="endpoint-item reveal" id="endpoint-dicas">
                        <span class="method-badge">GET</span>
                        <div class="endpoint-info">
                            <div class="endpoint-path">/api/dicas</div>
                            <div class="endpoint-desc">Traz dicas práticas para um descarte mais eficiente no dia a dia.</div>
                        </div>
                        <span class="endpoint-arrow">→</span>
                    </a>
                </div>
            </div>
        </section>
    </main>

    {{-- ===== FOOTER ===== --}}
    <footer>
        <div class="container">
            <p>♻️ EcoJac — Projeto de TCC · Feito com <span class="heart">❤️</span> para um futuro mais sustentável.</p>
        </div>
    </footer>

    {{-- ===== SCRIPTS ===== --}}
    <script>
        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            navbar.classList.toggle('scrolled', window.scrollY > 60);
        });

        // Mobile menu toggle
        const navToggle = document.getElementById('navToggle');
        const navLinks = document.getElementById('navLinks');
        navToggle.addEventListener('click', () => {
            navLinks.classList.toggle('open');
        });

        // Close menu on link click (mobile)
        navLinks.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => navLinks.classList.remove('open'));
        });

        // Scroll reveal animation
        const revealElements = document.querySelectorAll('.reveal');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, i) => {
                if (entry.isIntersecting) {
                    // Stagger the animation for sibling elements
                    const siblings = entry.target.parentElement.querySelectorAll('.reveal');
                    const index = Array.from(siblings).indexOf(entry.target);
                    setTimeout(() => {
                        entry.target.classList.add('visible');
                    }, index * 120);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15 });

        revealElements.forEach(el => observer.observe(el));
    </script>

</body>
</html>
