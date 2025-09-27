<?php
session_start();
require_once __DIR__ . '/../config/db.php';

// Only allow admin
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit;
}

// Handle Add Publication
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_publication'])) {
    $department = $_POST['department'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publish_date = $_POST['publish_date'];
    $link = $_POST['link'];

    $stmt = $conn->prepare("INSERT INTO publications (department, title, author, publish_date, link) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $department, $title, $author, $publish_date, $link);
    $stmt->execute();
    $stmt->close();

    header("Location: manage_publications.php?success=1");
    exit;
}

// Handle Delete
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM publications WHERE id = $id");
    header("Location: manage_publications.php?deleted=1");
    exit;
}

// Fetch Publications
$result = $conn->query("SELECT * FROM publications ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Publications</title>
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
        input, select, textarea {
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
        <?php if (isset($_GET['success'])): ?>
            <div class="bg-green-900 text-green-300 px-4 py-2 rounded-lg mb-4 font-medium">Publication added successfully!</div>
        <?php endif; ?>
        <?php if (isset($_GET['deleted'])): ?>
            <div class="bg-red-900 text-red-300 px-4 py-2 rounded-lg mb-4 font-medium">Publication deleted successfully!</div>
        <?php endif; ?>

        <div class="bg-card rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <h2 class="text-xl font-bold mb-4">➕ Add New Publication</h2>
            <form method="POST" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <input type="hidden" name="add_publication" value="1">

                <div class="md:col-span-1">
                    <label for="department" class="block text-sm font-medium text-grey-text mb-1">Department</label>
                    <select name="department" id="department" required class="p-3 rounded-lg text-sm w-full focus:outline-none focus:ring-2 focus:ring-gold">
                        <option value="SCI">SCI</option>
                        <option value="SBSS">SBSS</option>
                        <option value="SEHS">SEHS</option>
                        <option value="CFGS">CFGS</option>
                    </select>
                </div>

                <div class="md:col-span-2 lg:col-span-3">
                    <label for="title" class="block text-sm font-medium text-grey-text mb-1">Title</label>
                    <input type="text" name="title" id="title" placeholder="Publication Title" required class="p-3 rounded-lg text-sm w-full focus:outline-none focus:ring-2 focus:ring-gold">
                </div>

                <div class="md:col-span-1">
                    <label for="author" class="block text-sm font-medium text-grey-text mb-1">Author(s)</label>
                    <input type="text" name="author" id="author" placeholder="Author(s)" required class="p-3 rounded-lg text-sm w-full focus:outline-none focus:ring-2 focus:ring-gold">
                </div>

                <div class="md:col-span-1">
                    <label for="publish_date" class="block text-sm font-medium text-grey-text mb-1">Publish Date</label>
                    <input type="date" name="publish_date" id="publish_date" required class="p-3 rounded-lg text-sm w-full focus:outline-none focus:ring-2 focus:ring-gold">
                </div>

                <div class="md:col-span-1">
                    <label for="link" class="block text-sm font-medium text-grey-text mb-1">Link</label>
                    <input type="url" name="link" id="link" placeholder="Publication Link" required class="p-3 rounded-lg text-sm w-full focus:outline-none focus:ring-2 focus:ring-gold">
                </div>

                <div class="md:col-span-3 mt-4">
                    <button type="submit" class="w-full px-6 py-2.5 rounded-xl font-semibold btn-gold hover:opacity-90 transition">Upload Publication</button>
                </div>
            </form>
        </div>

        <div class="bg-card rounded-2xl shadow-xl overflow-hidden">
            <h2 class="text-xl font-bold p-6 border-b border-dark-border">📑 All Publications</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-dark-bg">
                            <th class="px-6 py-4 text-left text-xs font-semibold text-grey-text uppercase tracking-wider border-b border-dark-border">ID</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-grey-text uppercase tracking-wider border-b border-dark-border">Department</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-grey-text uppercase tracking-wider border-b border-dark-border">Title</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-grey-text uppercase tracking-wider border-b border-dark-border">Author</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-grey-text uppercase tracking-wider border-b border-dark-border">Publish Date</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-grey-text uppercase tracking-wider border-b border-dark-border">Link</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-grey-text uppercase tracking-wider border-b border-dark-border">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-dark-border">
                        <?php if ($result->num_rows > 0): ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr class="hover:bg-hover-dark transition">
                                    <td class="px-6 py-4 text-sm text-grey-text"><?= (int)$row['id'] ?></td>
                                    <td class="px-6 py-4 text-sm font-semibold text-light-grey"><?= htmlspecialchars($row['department']) ?></td>
                                    <td class="px-6 py-4 text-sm text-grey-text"><?= htmlspecialchars($row['title']) ?></td>
                                    <td class="px-6 py-4 text-sm text-grey-text"><?= htmlspecialchars($row['author']) ?></td>
                                    <td class="px-6 py-4 text-sm text-grey-text"><?= htmlspecialchars(date('M d, Y', strtotime($row['publish_date']))) ?></td>
                                    <td class="px-6 py-4">
                                        <a href="<?= htmlspecialchars($row['link']) ?>" target="_blank" class="text-gold hover:underline transition">View Link</a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="manage_publications.php?delete=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this publication? This action cannot be undone.')" class="text-red-500 hover:text-red-400 font-semibold transition">Delete</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="px-6 py-8 text-center text-grey-text">No publications found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>