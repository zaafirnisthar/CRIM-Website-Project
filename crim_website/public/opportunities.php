<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Research Grants & Opportunities - AIU</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Playfair+Display:wght@400;600&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --bg-dark: #0a0a0a;
            --gold-primary: #FFD700;
            --gold-secondary: #D4AF37;
            --gold-accent: #B8860B;
            --text-light: #ffffff;
            --text-muted: #cccccc;
            --card-bg: #1a1a1a;
            --card-hover: #222222;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-dark);
            color: var(--text-light);
            line-height: 1.6;
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(212, 175, 55, 0.05) 0%, transparent 20%),
                radial-gradient(circle at 90% 80%, rgba(212, 175, 55, 0.05) 0%, transparent 20%);
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header styles */
        .page-header {
            text-align: center;
            margin-bottom: 40px;
            padding: 20px;
            border-bottom: 1px solid rgba(212, 175, 55, 0.3);
            animation: fadeIn 1s ease-out;
        }

        .page-header h1 {
            font-family: 'Cinzel', serif;
            font-size: 3rem;
            color: var(--gold-primary);
            margin-bottom: 10px;
            letter-spacing: 2px;
            text-shadow: 0 0 10px rgba(255, 215, 0, 0.3);
        }

        .page-header p {
            font-family: 'Playfair Display', serif;
            color: var(--text-muted);
            font-size: 1.2rem;
            max-width: 800px;
            margin: 0 auto;
        }

        .badge {
            display: inline-block;
            background: linear-gradient(135deg, var(--gold-primary), var(--gold-accent));
            color: var(--bg-dark);
            padding: 8px 20px;
            border-radius: 30px;
            font-weight: bold;
            margin-top: 15px;
            font-size: 0.9rem;
        }

        /* Tabs navigation */
        .tabs {
            display: flex;
            justify-content: center;
            margin: 30px 0;
            flex-wrap: wrap;
            gap: 15px;
            animation: slideInDown 0.8s ease-out;
        }

        .tab-btn {
            background-color: transparent;
            color: var(--gold-primary);
            border: 1px solid var(--gold-primary);
            padding: 12px 25px;
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
            font-weight: 500;
            font-size: 1rem;
        }

        .tab-btn:hover {
            background-color: rgba(255, 215, 0, 0.1);
        }

        .tab-btn.active {
            background-color: var(--gold-primary);
            color: var(--bg-dark);
            box-shadow: 0 0 15px rgba(255, 215, 0, 0.5);
        }

        /* Content sections */
        .content-section {
            display: none;
            animation: fadeIn 0.8s ease-out;
        }

        .content-section.active {
            display: block;
        }

        .section-title {
            font-family: 'Cinzel', serif;
            color: var(--gold-primary);
            font-size: 2.2rem;
            margin-bottom: 30px;
            text-align: center;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(212, 175, 55, 0.3);
            animation: slideInLeft 0.8s ease-out;
        }

        /* Grid layout for grants */
        .grants-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 30px;
            margin-top: 30px;
        }

        .grant-card {
            background-color: var(--card-bg);
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.4s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(212, 175, 55, 0.2);
            animation: fadeInUp 0.8s ease-out;
            animation-fill-mode: both;
            position: relative;
        }

        .grant-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3), 0 0 20px rgba(255, 215, 0, 0.2);
            border-color: var(--gold-primary);
        }

        .grant-card:nth-child(1) { animation-delay: 0.1s; }
        .grant-card:nth-child(2) { animation-delay: 0.2s; }
        .grant-card:nth-child(3) { animation-delay: 0.3s; }
        .grant-card:nth-child(4) { animation-delay: 0.4s; }
        .grant-card:nth-child(5) { animation-delay: 0.5s; }
        .grant-card:nth-child(6) { animation-delay: 0.6s; }

        .grant-header {
            background: linear-gradient(90deg, var(--gold-primary), var(--gold-accent));
            color: var(--bg-dark);
            padding: 15px 20px;
            font-family: 'Playfair Display', serif;
            font-weight: 600;
            font-size: 1.2rem;
        }

        .grant-body {
            padding: 20px;
        }

        .grant-funder {
            color: var(--gold-primary);
            font-size: 0.9rem;
            margin-bottom: 10px;
            font-weight: 500;
        }

        .grant-name {
            font-family: 'Playfair Display', serif;
            color: var(--text-light);
            font-size: 1.4rem;
            margin-bottom: 15px;
            line-height: 1.3;
        }

        .grant-details {
            color: var(--text-muted);
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .grant-status {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-top: 10px;
        }

        .status-open {
            background-color: rgba(46, 204, 113, 0.2);
            color: #2ecc71;
            border: 1px solid #2ecc71;
        }

        .status-closed {
            background-color: rgba(231, 76, 60, 0.2);
            color: #e74c3c;
            border: 1px solid #e74c3c;
        }

        .status-ongoing {
            background-color: rgba(241, 196, 15, 0.2);
            color: #f1c40f;
            border: 1px solid #f1c40f;
        }

        .grant-link {
            display: inline-block;
            margin-top: 15px;
            color: var(--gold-primary);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .grant-link:hover {
            text-decoration: underline;
            color: var(--text-light);
        }

        /* Footer */
        .footer {
            text-align: center;
            margin-top: 60px;
            padding: 30px 0;
            border-top: 1px solid rgba(212, 175, 55, 0.3);
            color: var(--text-muted);
            font-size: 0.9rem;
            animation: fadeIn 1s ease-out;
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes fadeInUp {
            from { 
                opacity: 0;
                transform: translateY(30px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInDown {
            from { 
                opacity: 0;
                transform: translateY(-30px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            from { 
                opacity: 0;
                transform: translateX(-30px);
            }
            to { 
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 2.2rem;
            }
            
            .grants-grid {
                grid-template-columns: 1fr;
            }
            
            .tab-btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>

<?php include __DIR__ . '/../includes/header.php'; ?>


    <div class="container">
        <header class="page-header">
            <h1>Research Grants & Opportunities</h1>
            <p>Discover available funding opportunities for your research projects</p>
            <div class="badge">
                <i class="fas fa-database"></i> DATABASE RESEARCH GRANTS IN MALAYSIA 2025
            </div>
        </header>

        <div class="tabs">
            <button class="tab-btn active" data-tab="national">National Grants</button>
            <button class="tab-btn" data-tab="mohe">MOHE Grants</button>
            <button class="tab-btn" data-tab="mosti">MOSTI Grants</button>
            <button class="tab-btn" data-tab="other">Other Grants</button>
        </div>

        <section id="national" class="content-section active">
            <h2 class="section-title">National Research Grants</h2>
            
            <div class="grants-grid">
                <!-- Grant 1 -->
                <div class="grant-card">
                    <div class="grant-header">
                        FRGS
                    </div>
                    <div class="grant-body">
                        <div class="grant-funder">Ministry of Higher Education</div>
                        <h3 class="grant-name">Fundamental Research Grant Scheme</h3>
                        <p class="grant-details">Supports fundamental research in various fields of study.</p>
                        <div class="grant-status status-closed">Closed: 28 Jan 2025</div>
                        <a href="#" class="grant-link">View Requirements <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                
                <!-- Grant 2 -->
                <div class="grant-card">
                    <div class="grant-header">
                        PRGS
                    </div>
                    <div class="grant-body">
                        <div class="grant-funder">Ministry of Higher Education</div>
                        <h3 class="grant-name">Prototype Research Grant Scheme</h3>
                        <p class="grant-details">Funding for research prototype development and commercialization.</p>
                        <div class="grant-status status-closed">Closed: 15 Apr 2025</div>
                        <a href="#" class="grant-link">View Requirements <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                
                <!-- Grant 3 -->
                <div class="grant-card">
                    <div class="grant-header">
                        TRGS
                    </div>
                    <div class="grant-body">
                        <div class="grant-funder">Ministry of Higher Education</div>
                        <h3 class="grant-name">Trans-disciplinary Research Grant Scheme</h3>
                        <p class="grant-details">Promotes interdisciplinary research collaboration.</p>
                        <div class="grant-status status-closed">Closed: 19 Mar 2025</div>
                        <a href="#" class="grant-link">View Requirements <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                
                <!-- Grant 4 -->
                <div class="grant-card">
                    <div class="grant-header">
                        LRGS
                    </div>
                    <div class="grant-body">
                        <div class="grant-funder">Ministry of Higher Education</div>
                        <h3 class="grant-name">Long Term Research Grant Scheme</h3>
                        <p class="grant-details">Supports long-term, high-impact research initiatives.</p>
                        <div class="grant-status status-closed">Closed: 16 Jan 2025</div>
                        <a href="#" class="grant-link">View Requirements <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                
                <!-- Grant 5 -->
                <div class="grant-card">
                    <div class="grant-header">
                        KKP 2025
                    </div>
                    <div class="grant-body">
                        <div class="grant-funder">Ministry of Higher Education</div>
                        <h3 class="grant-name">Geran Konsortium Recemerlangan Penyelidikan</h3>
                        <p class="grant-details">Research consortium grants for collaborative projects.</p>
                        <div class="grant-status status-closed">Closed: 3 Apr 2025</div>
                        <a href="#" class="grant-link">View Requirements <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                
                <!-- Grant 6 -->
                <div class="grant-card">
                    <div class="grant-header">
                        FRGS - EC
                    </div>
                    <div class="grant-body">
                        <div class="grant-funder">Ministry of Higher Education</div>
                        <h3 class="grant-name">Fundamental Research Grant - Early Career Researcher</h3>
                        <p class="grant-details">Designed specifically for early career researchers.</p>
                        <div class="grant-status status-closed">Closed: 11 Apr 2025</div>
                        <a href="#" class="grant-link">View Requirements <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>

        <section id="mohe" class="content-section">
            <h2 class="section-title">MOHE Research Grants</h2>
            
            <div class="grants-grid">
                <!-- Grant 1 -->
                <div class="grant-card">
                    <div class="grant-header">
                        TRGS - SF
                    </div>
                    <div class="grant-body">
                        <div class="grant-funder">Ministry of Higher Education</div>
                        <h3 class="grant-name">Trans-disciplinary Research Grant Scheme - Strategic & Focused</h3>
                        <p class="grant-details">Strategic and focused interdisciplinary research funding.</p>
                        <div class="grant-status status-closed">Closed: 15 Jun 2025</div>
                        <a href="#" class="grant-link">View Requirements <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                
                <!-- Grant 2 -->
                <div class="grant-card">
                    <div class="grant-header">
                        PPRN
                    </div>
                    <div class="grant-body">
                        <div class="grant-funder">Ministry of Higher Education</div>
                        <h3 class="grant-name">Public Private Research Network</h3>
                        <p class="grant-details">Facilitates collaboration between public and private research entities.</p>
                        <div class="grant-status status-ongoing">Phase 2 Ongoing</div>
                        <a href="#" class="grant-link">View Requirements <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>

        <section id="mosti" class="content-section">
            <h2 class="section-title">MOSTI Research Grants</h2>
            
            <div class="grants-grid">
                <!-- Grant 1 -->
                <div class="grant-card">
                    <div class="grant-header">
                        TeD 1
                    </div>
                    <div class="grant-body">
                        <div class="grant-funder">Ministry of Science, Technology & Innovation</div>
                        <h3 class="grant-name">Technology Development Fund 1</h3>
                        <p class="grant-details">Supports early-stage technology development projects.</p>
                        <div class="grant-status status-closed">Closed: 9 Feb 2025</div>
                        <a href="#" class="grant-link">View Requirements <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                
                <!-- Grant 2 -->
                <div class="grant-card">
                    <div class="grant-header">
                        TeD 2
                    </div>
                    <div class="grant-body">
                        <div class="grant-funder">Ministry of Science, Technology & Innovation</div>
                        <h3 class="grant-name">Technology Development Fund 2</h3>
                        <p class="grant-details">Funding for advanced technology development and commercialization.</p>
                        <div class="grant-status status-closed">Closed: 24 Aug 2025</div>
                        <a href="#" class="grant-link">View Requirements <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                
                <!-- Grant 3 -->
                <div class="grant-card">
                    <div class="grant-header">
                        BGF
                    </div>
                    <div class="grant-body">
                        <div class="grant-funder">Ministry of Science, Technology & Innovation</div>
                        <h3 class="grant-name">Dana Bridging</h3>
                        <p class="grant-details">Bridging fund for research projects between development phases.</p>
                        <div class="grant-status status-closed">Closed: 6 Jun 2025</div>
                        <a href="#" class="grant-link">View Requirements <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>

        <section id="other" class="content-section">
            <h2 class="section-title">Other Research Grants</h2>
            
            <div class="grants-grid">
                <!-- Grant 1 -->
                <div class="grant-card">
                    <div class="grant-header">
                        SRF
                    </div>
                    <div class="grant-body">
                        <div class="grant-funder">Various Funders</div>
                        <h3 class="grant-name">Strategic Research Fund</h3>
                        <p class="grant-details">Strategic research initiatives with national impact.</p>
                        <div class="grant-status status-closed">Closed: 24 Jul 2025</div>
                        <a href="#" class="grant-link">View Requirements <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                
                <!-- Grant 2 -->
                <div class="grant-card">
                    <div class="grant-header">
                        NCTF
                    </div>
                    <div class="grant-body">
                        <div class="grant-funder">Ministry of Natural Resources, Environment & Climate Change</div>
                        <h3 class="grant-name">National Conservation Trust Fund</h3>
                        <p class="grant-details">Supports natural resources conservation research.</p>
                        <div class="grant-status status-open">Open until 30 Sep 2025</div>
                        <a href="#" class="grant-link">View Requirements <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                
                <!-- Grant 3 -->
                <div class="grant-card">
                    <div class="grant-header">
                        DSRG
                    </div>
                    <div class="grant-body">
                        <div class="grant-funder">Malaysian Communications & Multimedia Commission</div>
                        <h3 class="grant-name">Digital Society Research Grant</h3>
                        <p class="grant-details">Research on digital society and communication technologies.</p>
                        <div class="grant-status status-closed">Cycle 1 Closed</div>
                        <a href="#" class="grant-link">View Requirements <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                
                <!-- Grant 4 -->
                <div class="grant-card">
                    <div class="grant-header">
                        NAPREC
                    </div>
                    <div class="grant-body">
                        <div class="grant-funder">National Institute of Valuation</div>
                        <h3 class="grant-name">Dana Penyelidikan Harta Tanah Negara</h3>
                        <p class="grant-details">Research on national property and land valuation.</p>
                        <div class="grant-status status-closed">Closed: 11 Apr 2025</div>
                        <a href="#" class="grant-link">View Requirements <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>

       
    </div>


  
<?php include __DIR__ . '/../includes/footer.php'; ?>


    
    <script>
        // Tab functionality
        document.addEventListener('DOMContentLoaded', function() {
            const tabBtns = document.querySelectorAll('.tab-btn');
            const contentSections = document.querySelectorAll('.content-section');
            
            tabBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    // Remove active class from all buttons and sections
                    tabBtns.forEach(b => b.classList.remove('active'));
                    contentSections.forEach(section => section.classList.remove('active'));
                    
                    // Add active class to clicked button
                    btn.classList.add('active');
                    
                    // Show corresponding section
                    const tabId = btn.getAttribute('data-tab');
                    document.getElementById(tabId).classList.add('active');
                });
            });
            
            // Add hover effect to grant cards
            const grantCards = document.querySelectorAll('.grant-card');
            grantCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.zIndex = '10';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.zIndex = '1';
                });
            });
        });
    </script>
</body>
</html>