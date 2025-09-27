<?php
session_start();
require_once __DIR__ . '/../config/db.php';

// Redirect if not logged in
if (!isset($_SESSION['user'])) {
    header("Location: ../auth/login.php");
    exit;
}

$userId = $_SESSION['user']['id'];
$userName = $_SESSION['user']['fullname'];

// Fetch announcements (latest 5)
$announcements = $conn->query("SELECT * FROM announcements ORDER BY created_at DESC LIMIT 5");

// Fetch submissions for this user
$submissionsStmt = $conn->prepare("
    SELECT id, leaderName, status, created_at 
    FROM submissions 
    WHERE user_id = ? 
    ORDER BY created_at DESC
");
$submissionsStmt->bind_param("i", $userId);
$submissionsStmt->execute();
$submissions = $submissionsStmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0d0f17;
            color: #e2e8f0;
        }
        .header-bg {
            background-image: radial-gradient(at 50% 100%, #2c2f3a, #0d0f17);
        }
        .card {
            background-color: #1a1e26;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 0.75rem;
            border: 1px solid rgba(255, 215, 0, 0.1);
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(255, 215, 0, 0.15);
        }
        .button-gold {
            background-color: #ffd700;
            color: #0d0f17;
            font-weight: 600;
            transition: all 0.3s ease-in-out;
            border-radius: 9999px;
            box-shadow: 0 4px 15px rgba(255, 215, 0, 0.2);
        }
        .button-gold:hover {
            background-color: #e6c200;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 215, 0, 0.3);
        }
        .status-badge {
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.25rem 0.75rem;
            text-transform: uppercase;
        }
        .status-badge-approved {
            background-color: #10b981;
            color: #064e3b;
        }
        .status-badge-pending {
            background-color: #f59e0b;
            color: #78350f;
        }
        .status-badge-other {
            background-color: #4b5563;
            color: #d1d5db;
        }
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #1a1e26;
        }
        ::-webkit-scrollbar-thumb {
            background: #2c2f3a;
            border-radius: 10px;
        }
    </style>
</head>
<body class="min-h-screen p-4 sm:p-6 lg:p-12">

    <!-- Header & User Info Section -->
    <header class="header-bg relative rounded-3xl p-8 sm:p-12 mb-12 shadow-lg overflow-hidden">
        <div class="flex flex-col items-center justify-center text-center">
            <h1 class="text-3xl sm:text-4xl font-extrabold text-white mb-2">
                Welcome back, <?= htmlspecialchars($userName) ?>
            </h1>
            <p class="text-lg text-gray-400">Your professional hub for announcements, forms, and submissions.</p>
        </div>
        <a href="../auth/logout.php" class="absolute top-8 right-8 flex items-center space-x-2 px-4 py-2 rounded-full text-sm font-semibold text-gray-300 bg-gray-800 hover:bg-gray-700 transition">
            <span>🚪</span>
            <span>Log Out</span>
        </a>
    </header>

    <main class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">

        <!-- Left Column: Announcements & Submissions -->
        <div class="md:col-span-2 space-y-8">

            <!-- Announcements Section -->
            <section class="card p-6 shadow-xl">
                <h2 class="flex items-center text-2xl font-bold text-yellow-400 mb-6">
                    <span class="mr-3">📢</span> Latest Announcements
                </h2>
                <div class="space-y-4">
                    <?php if ($announcements->num_rows > 0): ?>
                        <?php while ($a = $announcements->fetch_assoc()): ?>
                            <div class="card p-5 border border-gray-700 hover:border-yellow-400">
                                <h3 class="text-xl font-semibold text-yellow-400 mb-1"><?= htmlspecialchars($a['title']) ?></h3>
                                <p class="text-xs text-gray-500 mb-2">Posted: <?= $a['created_at'] ?></p>
                                <p class="text-gray-300 text-sm"><?= htmlspecialchars($a['message']) ?></p>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p class="text-gray-500 text-center py-4">No announcements available.</p>
                    <?php endif; ?>
                </div>
            </section>

            <!-- My Submissions Section -->
            <section class="card p-6 shadow-xl">
                <h2 class="flex items-center text-2xl font-bold text-yellow-400 mb-6">
                    <span class="mr-3">📄</span> My Submissions
                </h2>
                <div class="max-h-96 overflow-y-auto pr-2 -mr-2">
                    <?php if ($submissions->num_rows > 0): ?>
                        <ul class="divide-y divide-gray-700">
                            <?php while ($s = $submissions->fetch_assoc()): ?>
                                <li class="p-4 flex flex-col sm:flex-row justify-between items-start sm:items-center hover:bg-gray-800 transition rounded-lg">
                                    <div>
                                        <h3 class="text-lg font-medium text-white"><?= htmlspecialchars($s['leaderName']) ?></h3>
                                        <p class="text-xs text-gray-500 mt-1">Submitted on: <?= $s['created_at'] ?></p>
                                    </div>
                                    <?php if ($s['status'] === 'approved'): ?>
                                        <span class="status-badge status-badge-approved mt-2 sm:mt-0">Approved</span>
                                    <?php elseif ($s['status'] === 'pending'): ?>
                                        <span class="status-badge status-badge-pending mt-2 sm:mt-0">Pending</span>
                                    <?php else: ?>
                                        <span class="status-badge status-badge-other mt-2 sm:mt-0"><?= ucfirst($s['status']) ?></span>
                                    <?php endif; ?>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php else: ?>
                        <p class="p-4 text-gray-500 text-center">You have no submissions yet.</p>
                    <?php endif; ?>
                </div>
            </section>
        </div>

        <!-- Right Column: Forms Section -->
        <div class="md:col-span-1 space-y-8">

            <!-- Primary Form CTA -->
            <section class="card p-6 text-center shadow-xl">
                <h2 class="flex items-center justify-center text-2xl font-bold text-yellow-400 mb-6">
                    <span class="mr-3">📝</span> Grant Application Form
                </h2>
                <p class="text-gray-400 mb-6">
                    Ready to submit your grant application? Click the button below to get started.
                </p>
                <a href="section_b_form.php" class="button-gold px-8 py-3 text-lg">
                    Apply Now
                </a>
            </section>

            <!-- Downloadable Forms Section -->
            <section class="card p-6 shadow-xl">
                <h2 class="flex items-center text-2xl font-bold text-yellow-400 mb-6">
                    <span class="mr-3">📥</span> Downloadable Forms
                </h2>
                <div class="space-y-3">
                    <a target="_blank" href="https://docs.google.com/spreadsheets/d/1NMqGONDbKdowJOLJaYeZS_93VmO6iDVU/edit?usp=drive_link" class="block text-blue-400 hover:text-blue-300 hover:underline transition">
                        1. AIU - General Advance & Claim Form
                    </a>
                    <a target="_blank" href="https://drive.google.com/file/d/1Du9JHo1a6ac_sisPgRXXgpXZAjpDK2Mt/view?usp=drive_link" class="block text-blue-400 hover:text-blue-300 hover:underline transition">
                        2. AIU Business Travel Request Form (BTR)
                    </a>
                    <a target="_blank" href="https://drive.google.com/file/d/1PO3bGmjspg-BcFNWd-dHD5-XaOB-LkUm/view?usp=drive_link" class="block text-blue-400 hover:text-blue-300 hover:underline transition">
                        3. AIU Engagement & Attendance Form
                    </a>
                    <a target="_blank" href="https://drive.google.com/file/d/1jmccCq5tKRRg7UiU0kD5zLf3-xgswuG-/view?usp=drive_link" class="block text-blue-400 hover:text-blue-300 hover:underline transition">
                        4. AIU Nomination Form (Training/Conference)
                    </a>
                    <a target="_blank" href="https://docs.google.com/document/d/15ZFOBgAa5YQvpcHFhyg8Jz2SXq8PtOgE/edit?usp=drive_link" class="block text-blue-400 hover:text-blue-300 hover:underline transition">
                        5. CRIM – Exemption Form (new)
                    </a>
                    <a target="_blank" href="https://docs.google.com/document/d/14BbC9AGVgoLQwmvZDck6qGHl-wXa8ECV/edit?usp=drive_link" class="block text-blue-400 hover:text-blue-300 hover:underline transition">
                        6. CRIM – Memo (Research Grant Allocation via Claim)
                    </a>
                    <a target="_blank" href="https://docs.google.com/document/d/10dUmy4_LZsdYMb6FAgOqEeKYMLuNigHe/edit?usp=drive_link" class="block text-blue-400 hover:text-blue-300 hover:underline transition">
                        7. CRIM – Payment for Professional Service / Enumerator Form
                    </a>
                    <a target="_blank" href="https://docs.google.com/document/d/1qDtEBnPnEkITZA0sXb5pF5r78OE78jqA/edit?usp=drive_link" class="block text-blue-400 hover:text-blue-300 hover:underline transition">
                        8. CRIM – Application Form for Conference / Publication Fee Scheme
                    </a>
                    <a target="_blank" href="https://docs.google.com/document/d/1W0RiQVaDoWu2fL2FM3mTtAxupzWGz7FO/edit?usp=drive_link" class="block text-blue-400 hover:text-blue-300 hover:underline transition">
                        9. CRIM – Enumerator / Research Assistant Application Form
                    </a>
                    <a target="_blank" href="https://docs.google.com/document/d/1SDrTcqX0MoUM-FMAuBWmz3--w9wyfgGU/edit?usp=drive_link" class="block text-blue-400 hover:text-blue-300 hover:underline transition">
                        10. CRIM – Grant Amendment Form
                    </a>
                    <a target="_blank" href="https://docs.google.com/document/d/1HNWDg-JVb6GXCPITAey2N9Kb5W0U_XQm/edit?usp=drive_link" class="block text-blue-400 hover:text-blue-300 hover:underline transition">
                        11. CRIM – Grant Application Form 2024_V3_July 2025
                    </a>
                    <a target="_blank" href="https://docs.google.com/document/d/1l5vhNuWCRioInnI4kA18XAKyy_iM1kG_/edit?usp=drive_link" class="block text-blue-400 hover:text-blue-300 hover:underline transition">
                        12. CRIM – Progress Report Form V2 (Jan 2025)
                    </a>
                    <a target="_blank" href="https://drive.google.com/file/d/1zjACa85mHmbOaS1e2oXTEUq_tLJROoS0/view?usp=drive_link" class="block text-blue-400 hover:text-blue-300 hover:underline transition">
                        13. Purchase Requisition Form (PRF)
                    </a>
                </div>
            </section>
        </div>
    </main>
</body>
</html>
