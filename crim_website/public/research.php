<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIU Research Focus Areas</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Playfair+Display:wght@400;600&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
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
        }

        .page-header h1 {
            font-family: 'Cinzel', serif;
            font-size: 2.8rem;
            color: var(--gold-primary);
            margin-bottom: 10px;
            letter-spacing: 1px;
        }

        .page-header p {
            font-family: 'Playfair Display', serif;
            color: var(--text-muted);
            font-size: 1.2rem;
            max-width: 800px;
            margin: 0 auto;
        }

        /* Sub-navbar */
        .sub-navbar {
            display: flex;
            justify-content: center;
            margin: 30px 0;
            flex-wrap: wrap;
            gap: 15px;
        }

        .sub-navbar a {
            color: var(--gold-primary);
            text-decoration: none;
            padding: 10px 20px;
            border: 1px solid var(--gold-primary);
            border-radius: 30px;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
            font-weight: 500;
        }

        .sub-navbar a:hover {
            background-color: var(--gold-primary);
            color: var(--bg-dark);
        }

        /* Section styles */
        section {
            margin-bottom: 50px;
            padding: 30px;
            background-color: rgba(26, 26, 26, 0.8);
            border-radius: 10px;
            border-left: 4px solid var(--gold-primary);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        h2 {
            font-family: 'Cinzel', serif;
            color: var(--gold-primary);
            font-size: 2rem;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(212, 175, 55, 0.3);
        }

        h3 {
            font-family: 'Playfair Display', serif;
            color: var(--gold-primary);
            font-size: 1.5rem;
            margin: 20px 0 15px;
        }

        p {
            margin-bottom: 20px;
            color: var(--text-light);
            line-height: 1.7;
        }

        /* Research clusters grid */
        .cluster-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .cluster-card {
            background-color: var(--card-bg);
            border-radius: 10px;
            padding: 25px;
            transition: all 0.3s ease;
            cursor: pointer;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(212, 175, 55, 0.2);
            position: relative;
            overflow: hidden;
        }

        .cluster-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--gold-primary), var(--gold-accent));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
        }

        .cluster-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
            background-color: var(--card-hover);
        }

        .cluster-card:hover::before {
            transform: scaleX(1);
        }

        .cluster-card h3 {
            font-family: 'Playfair Display', serif;
            color: var(--gold-primary);
            margin-top: 0;
            font-size: 1.4rem;
            margin-bottom: 15px;
        }

        .cluster-card p {
            color: var(--text-muted);
            font-size: 0.95rem;
        }

        /* Research that matters section */
        #research-matters {
            text-align: center;
            padding: 50px 30px;
            background: linear-gradient(rgba(10, 10, 10, 0.9), rgba(10, 10, 10, 0.9)), 
                        url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><rect fill="%231a1a1a" width="100" height="100"/><path fill="%23D4AF37" opacity="0.2" d="M0 0L100 100M100 0L0 100"/></svg>');
            border: none;
        }

        #research-matters h2 {
            font-size: 2.5rem;
            margin-bottom: 30px;
            border: none;
        }

        .research-image {
            max-width: 600px;
            margin: 0 auto;
            border: 2px solid var(--gold-primary);
            padding: 10px;
            background-color: var(--card-bg);
            box-shadow: 0 0 30px rgba(255, 215, 0, 0.2);
        }

        .research-image img {
            width: 100%;
            height: auto;
            display: block;
        }

        /* Slider and toggle styles */
        .slider-container, .toggle-container {
            background-color: var(--card-bg);
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            border: 1px solid rgba(212, 175, 55, 0.2);
        }

        .slider-nav button {
            background-color: transparent;
            color: var(--gold-primary);
            border: 1px solid var(--gold-primary);
            padding: 8px 20px;
            margin: 0 10px;
            cursor: pointer;
            border-radius: 30px;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
        }

        .slider-nav button:hover {
            background-color: var(--gold-primary);
            color: var(--bg-dark);
        }

        .toggle-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            font-family: 'Playfair Display', serif;
            color: var(--gold-primary);
            font-size: 1.2rem;
            padding: 15px 0;
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
        }

        .toggle-content {
            padding: 20px 0;
            display: none;
        }

        .toggle-container.active .toggle-content {
            display: block;
        }

        /* Accordion styles */
        .accordion {
            background-color: var(--card-bg);
            color: var(--gold-primary);
            cursor: pointer;
            padding: 18px;
            width: 100%;
            text-align: left;
            border: none;
            outline: none;
            transition: 0.4s;
            font-family: 'Playfair Display', serif;
            font-size: 1.1rem;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid rgba(212, 175, 55, 0.2);
        }

        .active, .accordion:hover {
            background-color: rgba(212, 175, 55, 0.1);
        }

        .accordion-panel {
            padding: 0 18px;
            background-color: var(--card-bg);
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.2s ease-out;
            margin-bottom: 10px;
            border-radius: 0 0 5px 5px;
        }

        /* List styles */
        ul {
            padding-left: 20px;
            margin: 15px 0;
        }

        ul.research-topics li, ul.research-list li {
            background-color: rgba(212, 175, 55, 0.05);
            border-left: 3px solid var(--gold-accent);
            margin-bottom: 10px;
            padding: 12px 15px;
            border-radius: 5px;
            color: var(--text-light);
        }

        /* Modal for card details */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 1000;
            overflow: auto;
            padding: 20px;
        }

        .modal-content {
            background-color: var(--card-bg);
            margin: 5% auto;
            padding: 30px;
            border-radius: 10px;
            max-width: 700px;
            position: relative;
            border: 2px solid var(--gold-primary);
            box-shadow: 0 0 30px rgba(255, 215, 0, 0.3);
        }

        .close-modal {
            position: absolute;
            top: 15px;
            right: 15px;
            color: var(--gold-primary);
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.3s;
        }

        .close-modal:hover {
            color: var(--text-light);
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 2rem;
            }
            
            .cluster-grid {
                grid-template-columns: 1fr;
            }
            
            section {
                padding: 20px;
            }
            
            .sub-navbar {
                flex-direction: column;
                align-items: center;
            }
            
            .sub-navbar a {
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
            <h1>AIU Research Cluster Framework</h1>
            <p>Advancing knowledge for impact through interdisciplinary research and innovation</p>
        </header>

        <nav class="sub-navbar">
            <a href="#overview">Overview</a>
            <a href="#clusters">Clusters</a>
            <a href="#research-matters">Research That Matters</a>
        </nav>

        <section id="overview">
            <h2>Research Focus Areas</h2>
            <p><strong>Overview of key research domains</strong></p>
            <p><strong>advancing knowledge for impact: AIU Research Cluster</strong></p>
            <p>At Albukhary International University (AIU), research is more than academic inquiry.<br> It's a commitment to social transformation, sustainability, and inclusive development. Through its dynamic Research Cluster Framework, AIU fosters interdisciplinary collaboration that aligns with the university's core mission of achieving the Three Zeros: Zero Poverty, Zero Unemployment, and Zero Carbon Emissions, alongside the promotion of Social Business. In total there are 11 research clusters as below:</p>
            
            <div class="cluster-grid" id="clusters">
                <div class="cluster-card" onclick="openModal('esd-modal')">
                    <h3>Education for Sustainable Development (ESD)</h3>
                    <p>Empowering learners to make informed decisions for a sustainable future, this cluster integrates environmental, social, and economic dimensions into education.</p>
                </div>
                <div class="cluster-card" onclick="openModal('inclusive-modal')">
                    <h3>Inclusive Education and Lifelong Learning</h3>
                    <p>Focused on equitable access to education across all demographics, this cluster supports lifelong learning as a tool for empowerment and social inclusion.</p>
                </div>
                <div class="cluster-card" onclick="openModal('innovative-modal')">
                    <h3>Innovative Teaching and Learning</h3>
                    <p>This cluster explores pedagogical innovation through STEAM, digital tools, and values-based education. It supports employability, entrepreneurship, and climate-conscious learning environments.</p>
                </div>
                <div class="cluster-card" onclick="openModal('media-modal')">
                    <h3>Media and Communication for Social Change</h3>
                    <p>Harnessing media for advocacy and empowerment, this cluster amplifies marginalized voices and promotes awareness on issues like poverty, sustainability, and human rights.</p>
                </div>
                <div class="cluster-card" onclick="openModal('iot-modal')">
                    <h3>Internet of Things (IoT) and Artificial Intelligence (AI)</h3>
                    <p>Driving smart solutions for agriculture, education, and community development, this cluster explores machine learning, robotics, and natural language processing.</p>
                </div>
                <div class="cluster-card" onclick="openModal('emerging-modal')">
                    <h3>Emerging Technologies</h3>
                    <p>With a focus on blockchain and decentralized systems, this cluster promotes transparency, trust, and innovation in sectors like halal food assurance and digital finance.</p>
                </div>
                <div class="cluster-card" onclick="openModal('data-modal')">
                    <h3>Data Science</h3>
                    <p>Empowering communities through data literacy and informed decision-making, this cluster supports digital inclusion and sustainability initiatives.</p>
                </div>
                <div class="cluster-card" onclick="openModal('cyber-modal')">
                    <h3>Cybersecurity</h3>
                    <p>Ensuring safe digital transformation, this cluster addresses cyber threat detection, data privacy, and secure systems—critical for education, social enterprises, and green technologies.</p>
                </div>
                <div class="cluster-card" onclick="openModal('inclusive-dev-modal')">
                    <h3>Inclusive Development Cluster</h3>
                    <p>Promoting equitable economic growth, this cluster focuses on youth empowerment, microfinance, and community-driven initiatives.</p>
                </div>
                <div class="cluster-card" onclick="openModal('env-modal')">
                    <h3>Environmental Sustainability Cluster</h3>
                    <p>Championing green practices and ecological balance, this cluster supports research in green HRM, climate change, and sustainable product development.</p>
                </div>
                <div class="cluster-card" onclick="openModal('social-modal')">
                    <h3>Social Business & Financial Inclusivity Cluster</h3>
                    <p>Combining entrepreneurship with financial access, this cluster explores Islamic social finance, CSR, and digital transformation to uplift underserved communities.</p>
                </div>
            </div>
        </section>

        <!-- Research That Matters -->
        <section id="research-matters">
            <h2>Research That Matters</h2>
            <div class="research-image">
                <img src="../images/research.jpg" alt="Research That Matters">
            </div>
        </section>

        <p>AIU's research clusters are designed to address real-world challenges through interdisciplinary collaboration and community engagement. Each cluster aligns with the university's mission to foster sustainable development, social equity, and economic empowerment. By integrating cutting-edge technology with inclusive practices, AIU aims to create impactful solutions that resonate locally and globally.</p>
        <section id="esd-cluster">
            <h2>Education for Sustainable Development (ESD)</h2>
            <p><strong>Education for Sustainable Development (ESD)</strong> is an approach to teaching and learning that empowers individuals and communities to make informed decisions for a sustainable future. It integrates principles of environmental stewardship, social equity, and economic viability into education, encouraging learners to think critically, act responsibly, and engage actively in solving global and local challenges. ESD promotes lifelong learning and equips people with the knowledge, skills, values, and attitudes needed to contribute to a more just, inclusive, and environmentally conscious society.</p>
            
            <div class="slider-container">
                <div class="slideshow" id="esd-slider">
                    <div class="slide active">
                        <h3>Core Focus</h3>
                        <ul>
                            <li>Promotes sustainability in education, integrating environmental, economic, and social dimensions.</li>
                            <li>Encourages critical thinking, problem-solving, and community engagement.</li>
                        </ul>
                    </div>
                    <div class="slide">
                        <h3>Alignment</h3>
                        <ul>
                            <li>Zero Carbon: Educates on climate action and sustainable living.</li>
                            <li>Social Business: Fosters innovation for community development.</li>
                            <li>Zero Poverty & Unemployment: Builds capacity for sustainable livelihoods.</li>
                        </ul>
                    </div>
                    <div class="slide">
                        <h3>Key Existing Research</h3>
                        <ul>
                            <li>Matching Grant with UUM: Collaborative research on sustainability education.</li>
                            <li>Social Innovation Grant: Projects involving community-based solutions.</li>
                            <li>International Collaboration: Partnership with Okayama University, Japan, focusing on global sustainability practices.</li>
                        </ul>
                    </div>
                </div>
                <div class="slider-nav">
                    <button onclick="changeSlide('esd-slider', -1)">Previous</button>
                    <button onclick="changeSlide('esd-slider', 1)">Next</button>
                </div>
            </div>
        </section>

        <section id="inclusive-edu-cluster">
            <h2>Inclusive Education and Lifelong Learning</h2>
            <p><strong>Inclusive Education and Lifelong Learning</strong> is an educational approach that ensures all individuals—regardless of age, ability, background, or circumstance—have equitable access to learning opportunities throughout their lives. It promotes diversity, equity, and participation by removing barriers to education and fostering environments where everyone can thrive. Lifelong learning emphasizes continuous skill development, personal growth, and adaptability, enabling individuals to remain active contributors to society and the workforce. Together, these principles support social inclusion, reduce inequalities, and empower communities toward sustainable development.</p>
            
            <div class="slider-container">
                <div class="slideshow" id="inclusive-edu-slider">
                    <div class="slide active">
                        <h3>Core Focus</h3>
                        <ul>
                            <li>Ensures education access for all, regardless of age, ability, or background.</li>
                            <li>Promotes lifelong learning as a tool for empowerment and economic participation.</li>
                        </ul>
                    </div>
                    <div class="slide">
                        <h3>Alignment</h3>
                        <ul>
                            <li>Zero Unemployment & Poverty: Equips individuals with skills for employment and entrepreneurship.</li>
                            <li>Social Business: Encourages inclusive participation in economic activities.</li>
                            <li>Zero Carbon: Can integrate environmental education into lifelong learning.</li>
                        </ul>
                    </div>
                    <div class="slide">
                        <h3>Key Existing Research</h3>
                        <ul>
                            <li>High Impact Community Engagement Grant: Focused on inclusive learning environments and community outreach.</li>
                        </ul>
                        <h3>Existing Postgraduate research topics</h3>
                        <ul class="research-topics">
                            <li>Impact of Life Satisfaction on Academic Optimism Among Economically Underprivilege Undergraduate Students in Malaysia Universities: Testing Mediating Influence of Parental Religiosity.</li>
                            <li>The ASD Parent Experience in Malaysia: Stress Factors and Perceptions of Support and Understanding</li>
                            <li>The Role of International Organization in Supporting Social Business Model in Education</li>
                            <li>Impacts of Cybersecurity Incidents on Educational Institution</li>
                        </ul>
                    </div>
                </div>
                <div class="slider-nav">
                    <button onclick="changeSlide('inclusive-edu-slider', -1)">Previous</button>
                    <button onclick="changeSlide('inclusive-edu-slider', 1)">Next</button>
                </div>
            </div>
        </section>

        <section id="innovative-teaching-cluster">
            <h2>Innovative teaching and learning</h2>
            <p><strong>Innovative teaching and learning</strong> refer to the use of new, creative, and effective methods to enhance the educational experience. These approaches aim to improve student engagement, understanding, and outcomes by moving beyond traditional lecture-based instruction.</p>
            
            <div class="toggle-container">
                <div class="toggle-header" onclick="toggleContent(this)">
                    Key Information <span>></span>
                </div>
                <div class="toggle-content">
                    <h3>Core Focus</h3>
                    <ul>
                        <li>Pedagogical innovation using digital tools and emerging technologies.</li>
                        <li>Interdisciplinary learning through STEAM approaches.</li>
                        <li>Ethical and values-driven education that nurtures responsible global citizens.</li>
                        <li>Developmentally appropriate methods that support holistic child growth.</li>
                    </ul>
                    <h3>Alignment with the Three Zeros & Social Business</h3>
                    <ul>
                        <li><strong>Zero Poverty:</strong> Empowering learners with skills for employability and entrepreneurship through STEAM and lifelong learning.</li>
                        <li><strong>Zero Unemployment:</strong> Encouraging social business models in education that create jobs (e.g., edupreneurs, community educators). Developing digital and soft skills through innovative teaching to prepare students for future workforces.</li>
                        <li><strong>Zero Carbon Emissions:</strong> Promoting green technologies and practices in teaching (e.g., paperless classrooms, virtual labs). Encouraging research on climate-conscious pedagogy and eco-friendly learning environments.</li>
                        <li><strong>Social Business Integration:</strong> Designing education-based social enterprises that provide affordable learning solutions. Creating community learning hubs that serve both educational and social development goals. Partnering with NGOs and local businesses to co-create learning programs that address social and environmental challenges.</li>
                    </ul>
                    <h3>Key Existing Research</h3>
                    <ul>
                        <li><strong>Values-based Education:</strong> Matching Grant with UUM, Social Innovation Grant</li>
                        <li><strong>STEAM education:</strong> Publication Grant, Social Innovation Grant</li>
                    </ul>
                    <h3>Existing Postgraduate research topic:</h3>
                    <ul class="research-topics">
                        <li>The Implementation of Health Module to Explore Preschool Children's Knowledge, Attitude and Practice (KAP) in Rural Areas</li>
                        <li>Teachers’ Perception of Problem-Based Learning in Mathematics Teaching: A Comparative Study in Primary School in Kota Setar</li>
                        <li>Exploring the Impact of Leadership Approaches on Students’ Disruptive Behaviour in Rural Primary Schools in Malaysia</li>
                        <li>A Framework for Transforming Traditional Games Using Gamification Elements to Enhance Mathematics Motivation Among Rural Primary School Students</li>
                        <li>Examining the Relationship Between Pedagogical Approaches and Student Engagement in Entrepreneurship and Innovation University Compulsory Course in Albukhary International University</li>
                        <li>The Influence of Instagram Educational Influencers on Digital Learning Engagement: A Quantitative Study Among Secondary School Students in Sik, Kedah</li>
                        <li>Assessing Teachers’ Self-Efficiency in Educating Refugee Students: A Study in Classroom in Sungai Petani, Kedah.</li>
                        <li>Enhancing Student Engagement through Digital Learning Tools in Secondary Education</li>
                        <li>Enhancing Learning Experiences through Augmented Reality (AR) Integration in Rural Classroom Instruction</li>
                        <li>The Role of WhatsApp In enhancing collaborative learning among University Students in Nigerian</li>
                    </ul>
                </div>
            </div>
        </section>

        <section id="media-comms-cluster">
            <h2>Media and Communication for Social Change</h2>
            <p><strong>Media and Communication for Social Change</strong> is a research and practice area that explores how media tools—such as journalism, digital platforms, storytelling, and public campaigns—can be used to promote awareness, influence behaviour, and drive positive social transformation. It emphasizes participatory communication, giving voice to marginalized communities and fostering inclusive dialogue around issues like poverty, inequality, sustainability, and human rights. This approach supports community empowerment and policy advocacy, making it a powerful tool for achieving social business goals and sustainable development.</p>
            
            <div class="toggle-container">
                <div class="toggle-header" onclick="toggleContent(this)">
                    Key Information <span>></span>
                </div>
                <div class="toggle-content">
                    <h3>Core Focus:</h3>
                    <ul>
                        <li>Uses media as a tool for advocacy, education, and behavioural change.</li>
                        <li>Supports campaigns and narratives that promote equity, sustainability, and empowerment.</li>
                    </ul>
                    <h3>Alignment:</h3>
                    <ul>
                        <li>Social Business: Promotes awareness and mobilization for social enterprises.</li>
                        <li>Zero Poverty & Unemployment: Advocates for marginalized groups and policy change.</li>
                        <li>Zero Carbon: Supports environmental campaigns and public education.</li>
                    </ul>
                    <h3>Existing Postgraduate research topic:</h3>
                    <ul class="research-list">
                        <li>The impact of Digital Media on Student Engagement and Learning Outcomes in Higher Education: A case Study of Malaysian Universities</li>
                        <li>Integrating media literacy to education in Myanmar</li>
                    </ul>
                </div>
            </div>
        </section>

        <section id="iot-ai-cluster">
            <h2>Internet of Things (IoT) and AI</h2>
            <p><strong>Internet of Things (IoT)</strong> refers to a network of interconnected physical devices—such as sensors, appliances, vehicles, and machinery—that collect and exchange data through the internet. These devices are embedded with software and technologies that enable them to monitor, analyze, and respond to real-world conditions in real time. IoT enhances automation, efficiency, and decision-making across various sectors including healthcare, agriculture, manufacturing, and smart cities, making it a key driver of innovation and sustainability in modern society.</p>
            <p><strong>Artificial Intelligence (AI)</strong> is the field of computer science focused on creating systems that can perform tasks typically requiring human intelligence. These tasks include learning, reasoning, problem-solving, understanding language, and recognizing patterns.</p>

            <button class="accordion">Focus Areas</button>
            <div class="accordion-panel">
                <ul>
                    <li>Smart monitoring systems</li>
                    <li>Community-based technology solutions</li>
                    <li>Environmental and agricultural applications</li>
                    <li>Machine Learning: Systems that learn from data to improve performance.</li>
                    <li>Natural Language Processing (NLP): Understanding and generating human language.</li>
                    <li>Computer Vision: Interpreting visual information from the world.</li>
                    <li>Robotics: AI-driven machines that interact with the physical environment.</li>
                </ul>
            </div>
            
            <button class="accordion">Alignment</button>
            <div class="accordion-panel">
                <ul>
                    <li>Zero Carbon: Promotes eco-friendly tech for sustainable practices.</li>
                    <li>Social Business: Empowers local communities through smart farming. AI research can enhance efficiency, decision-making, and innovation for social business.</li>
                    <li>Zero Poverty & Unemployment: Creates tech-based job opportunities in rural areas.</li>
                </ul>
            </div>
            
            <button class="accordion">Key Existing Research</button>
            <div class="accordion-panel">
                <ul>
                    <li>Smart Seaweed Monitoring System Using IoT Technologies, Funded by Social Innovation Grant - Supports sustainable aquaculture and environmental monitoring.</li>
                </ul>
                <p><strong>Existing Postgraduate research topic:</strong></p>
                <ul class="research-list">
                    <li>Personalized Learning Paths: The Role of AI in tailoring Industry ready graduates</li>
                    <li>The Role of Artificial Intelligent in Resolving Industrial Dispute</li>
                </ul>
            </div>
        </section>

        <section id="emerging-tech-cluster">
            <h2>Emerging Technologies</h2>
            <p>Emerging technologies are reshaping industries, and <strong>blockchain</strong> is one of the most transformative among them. <strong>Blockchain</strong> is a decentralized and secure digital ledger technology that records transactions across a network of computers in a way that ensures transparency, immutability, and trust. Each block contains a set of transactions, and once added to the chain, it cannot be altered without consensus from the network. Originally developed for cryptocurrencies like Bitcoin, blockchain is now used in various sectors including finance, supply chain, healthcare, and governance to enhance data integrity, reduce fraud, and enable peer-to-peer interactions without intermediaries.</p>

            <button class="accordion">Focus Areas</button>
            <div class="accordion-panel">
                <ul>
                    <li>Digital trust and transparency</li>
                    <li>Food assurance systems</li>
                    <li>Decentralized applications</li>
                </ul>
            </div>
            
            <button class="accordion">Alignment</button>
            <div class="accordion-panel">
                <ul>
                    <li>Social Business: Builds trust in halal supply chains.</li>
                    <li>Zero Poverty & Unemployment: Opens new markets and tech jobs.</li>
                    <li>Zero Carbon: Potential for reducing paper-based systems and waste.</li>
                </ul>
            </div>
            
            <button class="accordion">Key Existing Research</button>
            <div class="accordion-panel">
                <ul>
                    <li>Blockchain System for Halal Food Assurance, Funded by Social Innovation Grant - Enhances food traceability and supports ethical business models.</li>
                </ul>
            </div>
        </section>

        <section id="data-science-cluster">
            <h2>Data Science</h2>
            <p><strong>Data Science</strong> is a multidisciplinary field that involves extracting meaningful insights and knowledge from data using techniques from statistics, computer science, and machine learning. It encompasses the entire data lifecycle—from collection and cleaning to analysis, visualization, and interpretation—to support decision-making and solve complex problems. Data science is widely applied in areas such as business intelligence, healthcare, education, and public policy, helping organizations optimize operations, predict trends, and personalize services.</p>

            <button class="accordion">Focus Areas</button>
            <div class="accordion-panel">
                <ul>
                    <li>Digital literacy</li>
                    <li>Data-driven decision making</li>
                    <li>Educational empowerment</li>
                </ul>
            </div>
            
            <button class="accordion">Alignment</button>
            <div class="accordion-panel">
                <ul>
                    <li>Zero Unemployment & Poverty: Enhances employability through data skills.</li>
                    <li>Social Business: Supports informed community development.</li>
                    <li>Zero Carbon: Enables data-driven sustainability initiatives.</li>
                </ul>
            </div>
            
            <button class="accordion">Key Projects</button>
            <div class="accordion-panel">
                <ul>
                    <li>Empowering Secondary School Teachers with Data Science Literacy in Kedah, Funded by High Impact Community Engagement Grant - Builds capacity in underserved communities.</li>
                </ul>
                <p><strong>Existing Postgraduate research topic:</strong></p>
                <ul class="research-list">
                    <li>Digital Inclusion and Access: A Case Study of Baling and Sik Districts in Kedah, Malaysia</li>
                </ul>
            </div>
        </section>
        
        <section id="cybersecurity-cluster">
            <h2>Cybersecurity</h2>
            <p><strong>Cybersecurity</strong> is the practice of protecting systems, networks, and data from digital attacks, unauthorized access, and damage. It involves technologies, processes, and policies designed to safeguard information and ensure the integrity, confidentiality, and availability of digital assets. It plays a crucial role in enabling safe digital transformation, supporting economic resilience, and protecting individuals and organizations in an increasingly connected world.</p>
            
            <button class="accordion">Core Focus</button>
            <div class="accordion-panel">
                <p>The Cybersecurity focuses on:</p>
                <ul>
                    <li>Cyber threat detection and prevention</li>
                    <li>Data privacy and protection</li>
                    <li>Secure systems and networks</li>
                    <li>Cybersecurity awareness and education</li>
                    <li>Policy and governance in digital security</li>
                </ul>
            </div>

            <button class="accordion">Alignment with the Three Zeros & Social Business</button>
            <div class="accordion-panel">
                <ul>
                    <li><strong>Zero Poverty:</strong> Digital Inclusion: By securing digital platforms, cybersecurity enables safe access to online education, banking, and services for underserved communities. Protection of Social Enterprises: Many social businesses operate online; cybersecurity ensures their sustainability by protecting them from fraud and data breaches. Trust in Digital Economy: Secure systems encourage participation in e-commerce and digital entrepreneurship, helping lift communities out of poverty.</li>
                    <li><strong>Zero Unemployment:</strong> Job Creation: Cybersecurity is a rapidly growing field with high demand for skilled professionals. Training programs can equip youth and marginalized groups with employable skills. Entrepreneurship: Encouraging cybersecurity startups or consultancies as social businesses can generate employment while addressing local security needs. Capacity Building: Community-based training in digital safety can empower individuals to become trainers or digital safety advocates.</li>
                    <li><strong>Zero Carbon Emissions:</strong> Secure Digital Transformation: Cybersecurity supports the shift to digital platforms (e.g., remote work, e-learning), reducing the need for physical infrastructure and travel. Protection of Green Technologies: As smart grids and IoT-based environmental systems grow, cybersecurity ensures their resilience and reliability. Paperless and Secure Systems: Promoting secure digital documentation and communication reduces paper use and carbon footprint.</li>
                    <li><strong>Cybersecurity & Social Business:</strong> Cybersecurity can be embedded into social business models by: Offering affordable cybersecurity services to NGOs, schools, and small enterprises. Developing community-based digital safety programs. Creating cyber awareness campaigns that empower vulnerable populations to navigate the digital world safely.</li>
                </ul>
            </div>

            <button class="accordion">Existing Postgraduate research topic</button>
            <div class="accordion-panel">
                <ul class="research-list">
                    <li>Impacts of Cybersecurity Incidents on Educational Institution</li>
                </ul>
            </div>
        </section>

        <section id="inclusive-dev-cluster">
            <h2>Inclusive Development Cluster</h2>
            <p>Inclusive development is an approach to economic growth that ensures all individuals benefit equitably from development efforts, regardless of their background or circumstances. It emphasizes reducing inequalities by fairly distributing the gains of economic progress across society and actively involving diverse voices in planning and implementation. This participatory model supports the goals of zero unemployment and zero poverty by fostering a more just and balanced society where everyone can thrive.</p>

            <button class="accordion">Key Themes</button>
            <div class="accordion-panel">
                <ul>
                    <li>Labour economics, microfinance, inclusive hiring, community development, education, and gender equality.</li>
                </ul>
            </div>

            <button class="accordion">Aligned Goals</button>
            <div class="accordion-panel">
                <ul>
                    <li>Social Business: Empowers communities through entrepreneurship and inclusive economic models.</li>
                    <li>Zero Unemployment: Focuses on skill development, youth enterprise, and job creation.</li>
                    <li>Zero Poverty: Addresses inequality through education, financial inclusion, and social protection.</li>
                </ul>
            </div>

            <button class="accordion">Existing Research Examples</button>
            <div class="accordion-panel">
                <ul>
                    <li>Empowering Youths through a Community-Driven Initiative Addressing Zero Unemployment in Rural Communities in Kedah — AP Dr Norizan Azizan</li>
                    <li>Digital Literacy and Entrepreneurship for Youth Leaders among Sabah's Undocumented Community — Mohamad Mokhlis Ahmad Fuad</li>
                    <li>Social Harmony and the Rohingya Community in Sungai Petani — Assoc. Prof. Dr. Mikio Oishi</li>
                </ul>
                <p><strong>Existing Postgraduate research topic:</strong></p>
                <ul class="research-list">
                    <li>Digital Inclusion and Access: A Case Study of Baling and Sik Districts in Kedah, Malaysia</li>
                    <li>An Empirical Analysis of E-HRM Practices and Their Organizational impact on Social Service Providers.</li>
                    <li>Net Zero employment opportunities: Investigation into the role of awareness and its antecedents among undergraduates students in Nigeria</li>
                    <li>Examining HR Professionals’ Experiences with the Adoption of AI-Based in Human Resource Functions in Tanzania’s Private Sector.</li>
                    <li>Assessing Aquaponics Farming as a Strategic Solution for Food Insecurity in Kedah, Malaysia</li>
                    <li>Personalized Learning Paths: The Role of AI in tailoring Industry ready graduates</li>
                    <li>To what Extend do Large Corporation influence the Political Culture of Democratic Society</li>
                    <li>The Challenges of Human Resource Management Practices in the Informal Sector in North Eastern Nigeria</li>
                    <li>Customer Satisfaction with Online Food Ordering Services in Alor Setar</li>
                    <li>Empowering Refugees and Immigrants through a Centralized Employment and Payment Platform</li>
                    <li>The Role of Artificial Intelligent in Resolving Industrial Dispute</li>
                </ul>
            </div>
        </section>
        
        <section id="env-sustainability-cluster">
            <h2>Environmental Sustainability Cluster</h2>
            <p>Environmental sustainability is a core pillar of sustainable development, emphasizing the responsible management and conservation of natural resources to meet present needs without compromising future generations. It focuses on maintaining ecological balance, protecting biodiversity, and reducing carbon emissions by shifting from non-renewable to renewable resources. Uncontrolled development can lead to pollution and irreversible environmental damage, making sustainable practices—such as green technology, recycling, and waste minimization—essential. These efforts aim to create closed-loop systems that preserve natural ecosystems while supporting long-term human and environmental well-being.</p>

            <button class="accordion">Key Themes</button>
            <div class="accordion-panel">
                <ul>
                    <li>Green HRM, green finance, ecological economics, sustainable product development, and climate change.</li>
                </ul>
            </div>

            <button class="accordion">Aligned Goals</button>
            <div class="accordion-panel">
                <ul>
                    <li>Zero Carbon: Promotes green technology, renewable energy, and sustainable practices.</li>
                    <li>Social Business: Encourages eco-entrepreneurship and community-led environmental solutions.</li>
                </ul>
            </div>

            <button class="accordion">Existing Research Examples</button>
            <div class="accordion-panel">
                <ul>
                    <li>Promoting Sustainable Waste Management in KEDA Villages, Pokok Sena</li>
                    <li>Project Eco-Passport: Building Sustainable Habits for a Greener Tomorrow</li>
                    <li>Zero Waste Lifestyle Leaders Project</li>
                </ul>
            </div>
        </section>
        
        <section id="social-business-cluster">
            <h2>Social Business & Financial Inclusivity Cluster</h2>
            <p><strong>Social Business & Financial Inclusivity</strong> focuses on creating economic models that prioritize social impact over profit, while ensuring that financial services are accessible to all, especially underserved communities. Social business empowers individuals through entrepreneurship and community-driven initiatives, addressing issues like unemployment and poverty. Financial inclusivity supports this by providing access to microfinance, digital financial tools, and Islamic social finance mechanisms such as zakat and waqf. Together, they promote equitable economic participation, sustainable livelihoods, and a more resilient society.</p>

            <button class="accordion">Key Themes</button>
            <div class="accordion-panel">
                <ul>
                    <li>Islamic social finance, zakat, wakaf, CSR, ESG, transformative marketing, and inclusive business models.</li>
                </ul>
            </div>

            <button class="accordion">Aligned Goals</button>
            <div class="accordion-panel">
                <ul>
                    <li>Social Business: Develops models for youth enterprise and community entrepreneurship.</li>
                    <li>Zero Unemployment & Poverty: Bridges skill gaps and promotes financial empowerment.</li>
                    <li>Zero Carbon: Supports sustainable business practices and green innovation.</li>
                </ul>
            </div>

            <button class="accordion">Potential Research Examples</button>
            <div class="accordion-panel">
                <ul>
                    <li>Social Business Incubation Model – Youth Enterprise — Operational strategy under SBSS</li>
                    <li>Islamic Social Finance and Zakat for Employment — Integrated into policy ecosystem and research planning</li>
                </ul>
                <p><strong>Existing Postgraduate research topic:</strong></p>
                <ul class="research-list">
                    <li>Cultural Alignment and Success of Social Enterprises in Malaysia.</li>
                    <li>Harnessing social media for the sustainability of Malaysia Social Enterprises: A study of strategies and impact</li>
                    <li>Performance of Social Entrepreneurs in Achieving Social Business Sustainability in Kedah, Malaysia</li>
                    <li>Impact of Digital Transformation in Promoting Sustainable Business Practices within Social Enterprises in Malaysia</li>
                    <li>Measuring the Readiness of Investors to Participate in Malaysia’s Social Stock Exchange</li>
                    <li>Sustainable Social Business Models in Malaysia: A Path to Achieving the 3Zeros</li>
                    <li>Assessing the Impact of Free Trade Agreements (FTAs) on Export-Oriented Micro, Small, and Medium Enterprises (MSMEs) in Malaysia and Vietnam.</li>
                    <li>Building Leadership Capacity in Social Enterprises: HR’s Role in Developing Purpose-Driven Leaders</li>
                    <li>Exploring the Impact of Social Entrepreneurship on Poverty Alleviation in Malaysia’s Socio-Economic Landscape</li>
                    <li>Examining the Impact of WhatsApp Business Marketing by Micro and Small Enterprises on Consumer Purchase Intentions in Kedah</li>
                    <li>Exploring the Role of Effective Communication on Pedagogical Approaches to Social Business: A Case Study of Albukhary International University</li>
                    <li>The Impact of Customer Relationship Approach on Social Media Marketing Performance Among Entrepreneurs in Keda</li>
                    <li>The Multi-Faceted Influence on Initial Product Trial: A Cross-Channel Exploration of Marketing, Design, and Social Proof</li>
                    <li>Digitalization in Zakat: Enhancing Collection and Distribution Efficiency</li>
                    <li>The Role of International Organization in Supporting Social Business Model in Education</li>
                </ul>
            </div>
        </section>

    </div>

   <?php include __DIR__ . '/../includes/footer.php'; ?>
  <script>
        // JavaScript for the modal functionality
        function openModal(modalId) {
            document.getElementById(modalId).style.display = 'block';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        // Close modal when clicking outside of it
        window.onclick = function(event) {
            var modals = document.getElementsByClassName('modal');
            for (var i = 0; i < modals.length; i++) {
                if (event.target == modals[i]) {
                    modals[i].style.display = 'none';
                }
            }
        }

        // JavaScript for the accordion functionality
        document.addEventListener('DOMContentLoaded', function() {
            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    if (panel.style.maxHeight) {
                        panel.style.maxHeight = null;
                    } else {
                        panel.style.maxHeight = panel.scrollHeight + "px";
                    }
                });
            }
        });

        // JavaScript for the slideshow functionality
        function changeSlide(sliderId, direction) {
            const slider = document.getElementById(sliderId);
            const slides = slider.querySelectorAll('.slide');
            let currentSlideIndex = Array.from(slides).findIndex(slide => slide.classList.contains('active'));
            
            slides[currentSlideIndex].classList.remove('active');
            
            currentSlideIndex += direction;
            
            if (currentSlideIndex >= slides.length) {
                currentSlideIndex = 0;
            } else if (currentSlideIndex < 0) {
                currentSlideIndex = slides.length - 1;
            }
            
            slides[currentSlideIndex].classList.add('active');
        }

        // JavaScript for the "Click-to-reveal" functionality
        function toggleContent(element) {
            element.parentElement.classList.toggle('active');
        }
    </script>
</body>
</html>