<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CRIM Modern Header</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Lora:wght@400;700&display=swap">
<style>
:root {
    --header-bg: #1f2937; /* Dark gray/navy header */
    --body-bg: #121212;    /* Dark body */
    --primary-gold: #d4af37;
    --white: #ffffff;
    --transition: all 0.3s ease;
}

body {
    font-family: 'Inter', sans-serif;
    background-color: var(--body-bg);
    color: var(--white);
    margin: 0;
}

/* Header */
header {
    background: var(--header-bg);
    padding: 15px 30px;
    position: sticky;
    top: 0;
    z-index: 1000;
    box-shadow: 0 4px 20px rgba(0,0,0,0.5);
}

.header-container {
    max-width: 1400px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* Logo */
.logo-text {
    font-family: 'Lora', serif;
    font-size: 2rem;
    font-weight: 700;
    color: var(--white);
}
.logo-text span {
    color: var(--primary-gold);
}

/* Navigation */
nav {
    flex: 1;
}
.nav-links {
    display: flex;
    justify-content: center;
    list-style: none;
    margin: 0;
    padding: 0;
}
.nav-item {
    margin: 0 15px;
}
.nav-link {
    color: var(--white);
    font-size: 1.1rem;
    font-weight: 600;
    text-decoration: none;
    padding: 10px 15px;
    border-radius: 8px;
    transition: var(--transition);
}
.nav-link:hover {
    background: var(--primary-gold);
    color: var(--header-bg);
}

/* Account */
.user-section {
    position: relative;
    margin-left: 15px;
}
.user-btn {
    display: flex;
    align-items: center;
    background: transparent;
    border: none;
    cursor: pointer;
    padding: 5px;
}
.user-avatar {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    border: 1px solid var(--primary-gold);
    object-fit: cover;
    transition: var(--transition);
}
.user-btn:hover .user-avatar {
    box-shadow: 0 0 8px var(--primary-gold);
}

/* User Dropdown */
.user-dropdown {
    position: absolute;
    right: 0;
    top: 120%;
    background: var(--header-bg);
    border: 1px solid var(--primary-gold);
    border-radius: 8px;
    min-width: 150px;
    opacity: 0;
    visibility: hidden;
    transition: var(--transition);
    z-index: 1000;
}
.user-dropdown a {
    display: block;
    padding: 10px 15px;
    color: var(--white);
    text-decoration: none;
    transition: var(--transition);
}
.user-dropdown a:hover {
    background: var(--primary-gold);
    color: var(--header-bg);
}

/* Show dropdown on active */
.user-section.active .user-dropdown {
    opacity: 1;
    visibility: visible;
}

/* Responsive */
@media(max-width: 992px){
    .nav-links {
        display: none;
    }
}
</style>
</head>
<body>

<header>
    <div class="header-container">
        <div class="logo">
            <div class="logo-text"><span>CRIM</span></div>
        </div>

        <nav>
            <ul class="nav-links">
                <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="about.php" class="nav-link">About Us</a></li>
                <li class="nav-item"><a href="research.php" class="nav-link">Research Area</a></li>
                <li class="nav-item"><a href="publication.php" class="nav-link">Publication</a></li>
                <li class="nav-item"><a href="innovation.php" class="nav-link">Innovation & Impact</a></li>
                <li class="nav-item"><a href="opportunities.php" class="nav-link">Opportunities</a></li>
            </ul>
        </nav>

        <div class="user-section" id="userDropdown">
            <button class="user-btn" onclick="toggleUserDropdown()">
                <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Account" class="user-avatar">
            </button>
            <div class="user-dropdown">
                <a href="../auth/login.php">Login</a>
                <a href="../auth/register.php">Register</a>
            </div>
        </div>
    </div>
</header>

<script>
function toggleUserDropdown() {
    document.getElementById('userDropdown').classList.toggle('active');
}
window.addEventListener('click', function(e){
    if(!document.getElementById('userDropdown').contains(e.target)){
        document.getElementById('userDropdown').classList.remove('active');
    }
});
</script>

</body>
</html>
