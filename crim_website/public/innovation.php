<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIU Documentaries & Short Films</title>
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

        .copyright-badge {
            display: inline-block;
            background: linear-gradient(135deg, var(--gold-primary), var(--gold-accent));
            color: var(--bg-dark);
            padding: 8px 20px;
            border-radius: 30px;
            font-weight: bold;
            margin-top: 15px;
            font-size: 0.9rem;
            animation: pulse 2s infinite;
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

        /* Grid layout for videos */
        .video-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 30px;
            margin-top: 30px;
        }

        .video-card {
            background-color: var(--card-bg);
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.4s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(212, 175, 55, 0.2);
            animation: fadeInUp 0.8s ease-out;
            animation-fill-mode: both;
        }

        .video-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3), 0 0 20px rgba(255, 215, 0, 0.2);
            border-color: var(--gold-primary);
        }

        .video-card:nth-child(1) { animation-delay: 0.1s; }
        .video-card:nth-child(2) { animation-delay: 0.2s; }
        .video-card:nth-child(3) { animation-delay: 0.3s; }
        .video-card:nth-child(4) { animation-delay: 0.4s; }
        .video-card:nth-child(5) { animation-delay: 0.5s; }
        .video-card:nth-child(6) { animation-delay: 0.6s; }

        .video-thumbnail {
            height: 200px;
            background: linear-gradient(45deg, #2c2c2c, #1a1a1a);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .video-thumbnail::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(212, 175, 55, 0.1), rgba(255, 215, 0, 0.05));
            z-index: 1;
        }

        .play-icon {
            color: var(--gold-primary);
            font-size: 3rem;
            z-index: 2;
            text-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            transition: all 0.3s ease;
        }

        .video-card:hover .play-icon {
            transform: scale(1.2);
            color: var(--text-light);
        }

        .video-info {
            padding: 20px;
        }

        .video-number {
            font-family: 'Cinzel', serif;
            color: var(--gold-primary);
            font-size: 0.9rem;
            margin-bottom: 5px;
        }

        .video-title {
            font-family: 'Playfair Display', serif;
            color: var(--text-light);
            font-size: 1.4rem;
            margin-bottom: 15px;
            line-height: 1.3;
        }

        .video-content {
            color: var(--text-muted);
            font-size: 0.95rem;
            line-height: 1.6;
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

        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(255, 215, 0, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(255, 215, 0, 0); }
            100% { box-shadow: 0 0 0 0 rgba(255, 215, 0, 0); }
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 2.2rem;
            }
            
            .video-grid {
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
            <h1>AIU Documentaries & Short Films</h1>
            <p>Showcasing innovation and impact through the art of storytelling</p>
            <div class="copyright-badge">
                <i class="fas fa-copyright"></i> Registered Copyright - Updated July 2025
            </div>
        </header>

        <div class="tabs">
            <button class="tab-btn active" data-tab="documentaries">Documentaries</button>
            <button class="tab-btn" data-tab="shortfilms">Short Films</button>
        </div>

        <section id="documentaries" class="content-section active">
            <h2 class="section-title">AIU Documentaries Collection</h2>
            
            <div class="video-grid">
                <!-- Documentary 1 -->
                <div class="video-card">
                    <div class="video-thumbnail">
                        <i class="fas fa-play-circle play-icon"></i>
                    </div>
                    <div class="video-info">
                        <div class="video-number">Documentary #1</div>
                        <h3 class="video-title">The Landmark of AOR</h3>
                        <p class="video-content">Discover the Kedah Digital Library—a modern oasis for learning and productivity, where knowledge meets innovation.</p>
                    </div>
                </div>
                
                <!-- Documentary 2 -->
                <div class="video-card">
                    <div class="video-thumbnail">
                        <i class="fas fa-play-circle play-icon"></i>
                    </div>
                    <div class="video-info">
                        <div class="video-number">Documentary #2</div>
                        <h3 class="video-title">Old Cafe In Alor Star - Caffe Diem</h3>
                        <p class="video-content">Caffe diem built in a heritage building in Pekan China. It is a unique cafe and one of the oldest cafe in Alor Setar.</p>
                    </div>
                </div>
                
                <!-- Documentary 3 -->
                <div class="video-card">
                    <div class="video-thumbnail">
                        <i class="fas fa-play-circle play-icon"></i>
                    </div>
                    <div class="video-info">
                        <div class="video-number">Documentary #3</div>
                        <h3 class="video-title">The Heart of Alor Setar - Masjid Zahir</h3>
                        <p class="video-content">This historic building is located in the middle of Alor Setar city. It is also known as the King's Mosque.</p>
                    </div>
                </div>
                
                <!-- Documentary 4 -->
                <div class="video-card">
                    <div class="video-thumbnail">
                        <i class="fas fa-play-circle play-icon"></i>
                    </div>
                    <div class="video-info">
                        <div class="video-number">Documentary #4</div>
                        <h3 class="video-title">Men Don't Cry</h3>
                        <p class="video-content">This documentary sheds light on the importance of vulnerability and mental health for young men in schools.</p>
                    </div>
                </div>
                
                <!-- Documentary 5 -->
                <div class="video-card">
                    <div class="video-thumbnail">
                        <i class="fas fa-play-circle play-icon"></i>
                    </div>
                    <div class="video-info">
                        <div class="video-number">Documentary #5</div>
                        <h3 class="video-title">The Most Impressive Landmark - Masjid Albukhary</h3>
                        <p class="video-content">The history and building concept of the Albukhary mosque, one of the iconic mosques in Kedah.</p>
                    </div>
                </div>
                
                <!-- Documentary 6 -->
                <div class="video-card">
                    <div class="video-thumbnail">
                        <i class="fas fa-play-circle play-icon"></i>
                    </div>
                    <div class="video-info">
                        <div class="video-number">Documentary #6</div>
                        <h3 class="video-title">Explore, Discover and Learn More - Albukhary International School</h3>
                        <p class="video-content">AIU International School is located at the prestigious Complex of Sharifah Rokiah, Center for Knowledge in Alor Setar.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="shortfilms" class="content-section">
            <h2 class="section-title">AIU Short Films Collection</h2>
            
            <div class="video-grid">
                <!-- Short Film 1 -->
                <div class="video-card">
                    <div class="video-thumbnail">
                        <i class="fas fa-play-circle play-icon"></i>
                    </div>
                    <div class="video-info">
                        <div class="video-number">Short Film #1</div>
                        <h3 class="video-title">MONITOR</h3>
                        <p class="video-content">A 24-hour convenience store employee who works the night shift is trying to remain awake.</p>
                    </div>
                </div>
                
                <!-- Short Film 2 -->
                <div class="video-card">
                    <div class="video-thumbnail">
                        <i class="fas fa-play-circle play-icon"></i>
                    </div>
                    <div class="video-info">
                        <div class="video-number">Short Film #2</div>
                        <h3 class="video-title">Shadow of Control</h3>
                        <p class="video-content">A mother who raises her child by putting too much pressure on the child to the point of depression.</p>
                    </div>
                </div>
                
                <!-- Short Film 3 -->
                <div class="video-card">
                    <div class="video-thumbnail">
                        <i class="fas fa-play-circle play-icon"></i>
                    </div>
                    <div class="video-info">
                        <div class="video-number">Short Film #3</div>
                        <h3 class="video-title">Don't Judge a Book by Its Cover</h3>
                        <p class="video-content">Follows a young woman who, disguised as someone from a humble background, faces prejudice.</p>
                    </div>
                </div>
                
                <!-- Short Film 4 -->
                <div class="video-card">
                    <div class="video-thumbnail">
                        <i class="fas fa-play-circle play-icon"></i>
                    </div>
                    <div class="video-info">
                        <div class="video-number">Short Film #4</div>
                        <h3 class="video-title">The Wake-Up Call</h3>
                        <p class="video-content">Follows Ethan, a diligent student overwhelmed by self-doubt and stress at a prestigious university.</p>
                    </div>
                </div>
                
                <!-- Short Film 5 -->
                <div class="video-card">
                    <div class="video-thumbnail">
                        <i class="fas fa-play-circle play-icon"></i>
                    </div>
                    <div class="video-info">
                        <div class="video-number">Short Film #5</div>
                        <h3 class="video-title">Syukur</h3>
                        <p class="video-content">A young boy from a poor family, tormented by bullying, discovers the power of storytelling.</p>
                    </div>
                </div>
                
                <!-- Short Film 6 -->
                <div class="video-card">
                    <div class="video-thumbnail">
                        <i class="fas fa-play-circle play-icon"></i>
                    </div>
                    <div class="video-info">
                        <div class="video-number">Short Film #6</div>
                        <h3 class="video-title">Always</h3>
                        <p class="video-content">A young man learns the value of time with his father and the importance of not taking life for granted.</p>
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
            
            // Add hover effect to video cards
            const videoCards = document.querySelectorAll('.video-card');
            videoCards.forEach(card => {
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