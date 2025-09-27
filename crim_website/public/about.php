<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us - CRIM | AIU</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #000; /* Black background */
      color: #fff; /* White text */
    }
    header {
      background-color: #111;
      padding: 15px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 3px solid gold;
    }
    header h1 {
      color: gold;
      font-size: 1.5rem;
    }
    nav ul {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
      gap: 20px;
    }
    nav ul li a {
      text-decoration: none;
      color: white;
      font-weight: bold;
    }
    nav ul li a:hover {
      color: gold;
    }

    /* Hero */
    .hero {
      background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.7)), url('library.jpg') center/cover no-repeat;
      text-align: center;
      padding: 80px 20px;
    }
    .hero h1 {
      font-size: 2.8em;
      margin-bottom: 10px;
      color: gold;
    }
    .hero p {
      font-size: 1.2em;
      max-width: 800px;
      margin: auto;
    }

    /* Container */
    .container {
      max-width: 1200px;
      margin: auto;
      padding: 40px 20px;
    }

    /* Section Title */
    h2 {
      color: gold;
      margin-bottom: 10px;
      position: relative;
      text-align: center;
    }
    h2::after {
      content: "";
      display: block;
      width: 80px;
      height: 3px;
      background: gold;
      margin: 10px auto 0 auto;
      border-radius: 2px;
    }

    /* Info Cards */
    .cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 25px;
      margin-top: 40px;
    }
    .card {
      background: #111;
      padding: 25px;
      border-radius: 12px;
      text-align: center;
      transition: transform 0.3s, box-shadow 0.3s;
      box-shadow: 0 0 15px rgba(255, 215, 0, 0.15);
    }
    .card:hover {
      transform: translateY(-10px);
      box-shadow: 0 0 25px rgba(255, 215, 0, 0.5);
    }
    .card h3 {
      color: gold;
      margin-bottom: 10px;
      text-align: center;
    }
    .card p, .card ul {
      color: #ddd;
      text-align: left;
      text-align: center;
    }

    /* People Section */
    .people {
      margin-top: 60px;
    }
    .person {
      display: flex;
      align-items: center;
      margin-bottom: 50px;
      gap: 20px;
    }
    .person:nth-child(even) {
      flex-direction: row-reverse;
    }
    .person img {
      width: 170px;
      height: 170px;
      border-radius: 50%;
      border: 4px solid gold;
      box-shadow: 0 0 20px rgba(255, 215, 0, 0.7);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .person img:hover {
      transform: scale(1.08);
      box-shadow: 0 0 30px rgba(255, 215, 0, 1);
    }
    .person div {
      flex: 1;
    }
    .person h3 {
      color: gold;
      margin-bottom: 5px;
      text-align: center;
    }

    /* Executives */
    .executives {
      display: flex;
      justify-content: center;
      gap: 40px;
      flex-wrap: wrap;
      margin-top: 40px;
    }
    .executive {
      text-align: center;
      background: #111;
      padding: 20px;
      border-radius: 12px;
      width: 200px;
      transition: transform 0.3s, box-shadow 0.3s;
    }
    .executive img {
      width: 140px;
      height: 140px;
      border-radius: 50%;
      border: 4px solid gold;
      box-shadow: 0 0 15px rgba(255, 215, 0, 0.6);
      margin-bottom: 10px;
      transition: transform 0.3s, box-shadow 0.3s;
    }
    .executive:hover {
      transform: translateY(-8px);
      box-shadow: 0 0 25px rgba(255, 215, 0, 0.5);
    }
    .executive img:hover {
      transform: scale(1.05);
      box-shadow: 0 0 25px rgba(255, 215, 0, 0.9);
    }
    
    .org-structure {
      text-align: center;
      padding: 40px; 
    }

    .org-structure h2 {
      font-size: 28px;
      margin-bottom: 10px;
      color: #FFD700;
    }

    .org-structure .subtitle {
      max-width: 800px;
      margin: 0 auto 40px;
      font-size: 16px;
      color: #ccc;
    }

    .row {
      display: flex;
      justify-content: center;
      gap: 25px;
      margin-bottom: 40px;
    }

    .row.single {
      justify-content: center;
    }

    .org-card {
      background: #111;
      border: 2px solid #FFD700;
      border-radius: 15px;
      padding: 20px;
      width: 260px;
      text-align: center;
      box-shadow: 0px 5px 15px rgba(255, 215, 0, 0.2);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      cursor: pointer;
    }

    .org-card img {
      width: 130px;
      height: 130px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 15px;
      border: 3px solid #FFD700;
    }

    .org-card h3 {
      font-size: 18px;
      margin: 10px 0 5px;
      color: #FFD700;
    }

    .org-card p {
      font-size: 14px;
      color: #eee;
    }

    .org-card:hover {
      transform: translateY(-12px) scale(1.05);
      box-shadow: 0px 12px 25px rgba(255, 215, 0, 0.6);
    }
    
    footer {
      background-color: #111;
      color: #ccc;
      text-align: center;
      padding: 20px;
      border-top: 2px solid gold;
      margin-top: 40px;
    }
    
    footer a {
      color: gold;
      text-decoration: none;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .person {
        flex-direction: column !important;
        text-align: center;
      }
      .executives {
        flex-direction: column;
        gap: 20px;
      }
      .row {
        flex-direction: column;
        align-items: center;
      }
    }
  </style>
</head>
<body>
 


<?php include __DIR__ . '/../includes/header.php'; ?>



  <!-- Hero -->
  <div class="hero">
    <h1>About Us</h1>
    <p>Centre for Research and Innovation Management (CRIM) – Driving Change Towards Zero Poverty, Zero Unemployment, and Zero Carbon Emissions</p>
  </div>

  <!-- Who We Are -->
  <div class="container">
    <h2>Who We Are</h2>
    <p style="text-align:center; max-width:800px; margin:auto;">
      The Centre for Research and Innovation Management (CRIM) is a department in AIU committed to transforming society through inclusive, sustainable, and purpose-driven innovation. Inspired by the principles of Social Business and the vision of achieving Three Zeros: Zero Poverty, Zero Unemployment, and Zero Carbon Emissions. We serve as a catalyst for change, empowering communities and reshaping economies.
    </p>

    <!-- Vision, Mission, Strategic Pillars, Values -->
    <div class="cards">
      <div class="card">
        <h3>Our Vision</h3>
        <p>To be a global leader in social innovation, driving systemic change through research, entrepreneurship, and collaboration toward a world free from poverty, unemployment, and environmental degradation.</p>
      </div>
      <div class="card">
        <h3>Our Mission</h3>
        <ul>
          <li>Promote and support social business models that prioritize human and environmental well-being over profit.</li>
          <li>Conduct interdisciplinary research addressing root causes of poverty, joblessness, and climate change.</li>
          <li>Foster inclusive innovation ecosystems that empower marginalized communities and youth.</li>
          <li>Collaborate with academia, industry, government, and civil society to scale impactful solutions.</li>
        </ul>
      </div>
      <div class="card">
        <h3>Our Strategic Pillars</h3>
        <ul>
          <li><strong>Zero Poverty:</strong> Education access, financial inclusion, community empowerment.</li>
          <li><strong>Zero Unemployment:</strong> Entrepreneurship, skills training, social enterprises.</li>
          <li><strong>Zero Carbon:</strong> Sustainability, smart tech, blockchain for social change.</li>
        </ul>
      </div>
      <div class="card">
        <h3>Our Values</h3>
        <ul>
          <li><strong>Empowerment:</strong> Enable individuals to lead change.</li>
          <li><strong>Sustainability:</strong> Long-term social and environmental responsibility.</li>
          <li><strong>Equity:</strong> Fair access to opportunities and resources.</li>
          <li><strong>Collaboration:</strong> Building bridges across disciplines.</li>
          <li><strong>Integrity:</strong> Transparency, ethics, accountability.</li>
        </ul>
      </div>
    </div>

    <!-- Organization Structure -->
    <div class="org-structure">
      <h2>Organization Structure</h2>
      <p class="subtitle">
        CRIM operates with a collaborative structure that promotes interdisciplinary research and innovation. 
        Our organizational framework supports the integration of our 11 research clusters while maintaining focus on our Three Zeros mission.
      </p>

      <!-- Top Row: DVCRI -->
      <div class="row single">
        <div class="org-card">
          <img src="../images/org4.jpg" alt="DVCRI Photo">
          <h3>Deputy Vice-Chancellor<br>(Research & Innovation)</h3>
          <p>PROFESSOR DATO' IR. DR. Mohd Saleh Bin Jaffar</p>
        </div>
      </div>

      <!-- Second Row: Director -->
      <div class="row single">
        <div class="org-card">
          <img src="../images/org3.jpg" alt="Director Photo">
          <h3>Director</h3>
          <p>PROFESSOR DR. Salfarina Binti Abdul Gapore</p>
        </div>
      </div>

      <!-- Third Row: Executives -->
      <div class="row">
        <div class="org-card">
          <img src="../images/org2.jpg" alt="Executive 1">
          <h3>Executive</h3>
          <p>Nur Ilani Rusli</p>
        </div>
        <div class="org-card">
          <img src="../images/org1.jpg" alt="Executive 2">
          <h3>Executive</h3>
          <p>Anis Roslan</p>
        </div>
      </div>
    </div>
  </div>

 <?php include __DIR__ . '/../includes/footer.php'; ?>
</html>
