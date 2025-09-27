<?php
session_start();
require_once __DIR__ . '/../config/db.php';

// Ensure only admin can access
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit;
}

// Handle adding announcement
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title'], $_POST['message'])) {
    $title = trim($_POST['title']);
    $message = trim($_POST['message']);

    if ($title !== '' && $message !== '') {
        $stmt = $conn->prepare("INSERT INTO announcements (title, message) VALUES (?, ?)");
        $stmt->bind_param("ss", $title, $message);
        $stmt->execute();
        $stmt->close();
    }
    header("Location: manage_announcements.php");
    exit;
}

// Handle delete announcement
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $stmt = $conn->prepare("DELETE FROM announcements WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    header("Location: manage_announcements.php");
    exit;
}

// Fetch all announcements
$result = $conn->query("SELECT * FROM announcements ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Announcements</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --dark-bg: #0d0d0d;
            --dark-card: #171717;
            --dark-border: #262626;
            --grey-text: #bdbdbd;
            --light-grey: #eaeaea;
            --gold: #d4af37;
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--dark-bg);
            color: var(--light-grey);
        }
        .text-gold {
            color: var(--gold);
        }
        .bg-card {
            background-color: var(--dark-card);
            border: 1px solid var(--dark-border);
        }
        .bg-hover-dark:hover {
            background-color: #242424;
        }
        .btn-gold {
            background-color: var(--gold);
            color: var(--dark-bg);
            transition: background-color 0.2s;
        }
        .btn-gold:hover {
            background-color: #b9922b;
        }
        input, textarea {
            background-color: #262626;
            border: 1px solid var(--dark-border);
            color: var(--light-grey);
        }
        input::placeholder, textarea::placeholder {
            color: #737373;
        }
    </style>
</head>
<body class="min-h-screen">
    <header class="bg-card shadow-lg p-4 flex justify-between items-center sticky top-0 z-50 border-b border-dark-border">
        <h1 class="text-xl md:text-2xl font-bold text-light-grey">Admin <span class="text-gold">Dashboard</span></h1>
        <nav class="space-x-2 flex items-center">
            <a href="admin_dashboard.php" class="px-4 py-2 text-sm rounded-lg bg-dark-bg text-grey-text hover:bg-hover-dark transition">Dashboard</a>
            <a href="../auth/logout.php" class="px-4 py-2 text-sm rounded-lg bg-red-600 text-white hover:bg-red-700 transition">Logout</a>
        </nav>
    </header>

    <main class="p-6 max-w-7xl mx-auto">
        <div class="bg-card rounded-2xl shadow-xl border border-dark-border p-6 md:p-8 mb-8">
            <h2 class="text-xl font-bold mb-4">Add New Announcement</h2>
            <form method="POST">
                <input type="text" name="title" placeholder="Announcement Title" required class="w-full p-3 rounded-lg text-sm mb-4 focus:outline-none focus:ring-2 focus:ring-gold">
                <textarea name="message" placeholder="Announcement Message" rows="4" required class="w-full p-3 rounded-lg text-sm mb-4 focus:outline-none focus:ring-2 focus:ring-gold"></textarea>
                <button type="submit" class="w-full md:w-auto px-6 py-2.5 rounded-xl font-semibold btn-gold hover:opacity-90 transition">Publish Announcement</button>
            </form>
        </div>

        <div class="bg-card rounded-2xl shadow-xl overflow-hidden">
            <h2 class="text-xl font-bold p-6 border-b border-dark-border">Existing Announcements</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-dark-bg">
                            <th class="px-6 py-4 text-left text-xs font-semibold text-grey-text uppercase tracking-wider border-b border-dark-border">Title</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-grey-text uppercase tracking-wider border-b border-dark-border">Message</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-grey-text uppercase tracking-wider border-b border-dark-border">Date</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-grey-text uppercase tracking-wider border-b border-dark-border">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-dark-border">
                        <?php if ($result->num_rows > 0): ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr class="hover:bg-hover-dark transition">
                                    <td class="px-6 py-4 text-sm font-semibold text-light-grey"><?= htmlspecialchars($row['title']) ?></td>
                                    <td class="px-6 py-4 text-sm text-grey-text"><?= htmlspecialchars($row['message']) ?></td>
                                    <td class="px-6 py-4 text-sm text-grey-text"><?= htmlspecialchars(date('M d, Y', strtotime($row['created_at']))) ?></td>
                                    <td class="px-6 py-4">
                                        <a class="text-red-500 hover:text-red-400 font-semibold transition"
                                           href="?delete=<?= $row['id'] ?>"
                                           onclick="return confirm('Are you sure you want to delete this announcement? This action cannot be undone.')">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="px-6 py-8 text-center text-grey-text">No announcements have been created yet.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>
</html>