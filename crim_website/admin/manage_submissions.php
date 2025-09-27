<?php
// /admin/manage_submissions.php
session_start();
require_once __DIR__ . '/../config/db.php';

// 1) Guard: only admins
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit;
}

// 2) CSRF token create (once per session/page load)
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrf = $_SESSION['csrf_token'];

// 3) Handle POST actions (approve/reject)
$flash = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['csrf_token'] ?? '';
    if (!hash_equals($_SESSION['csrf_token'], $token)) {
        $flash = '<div class="bg-red-900 text-red-300 px-4 py-2 rounded-lg mb-4 font-medium">Security token mismatch. Please refresh and try again.</div>';
    } else {
        $id = intval($_POST['id'] ?? 0);
        $action = $_POST['action'] ?? '';
        $newStatus = null;

        if ($action === 'approve') $newStatus = 'approved';
        if ($action === 'reject')  $newStatus = 'rejected';

        if ($id > 0 && $newStatus) {
            $stmt = $conn->prepare("UPDATE submissions SET status = ? WHERE id = ?");
            $stmt->bind_param("si", $newStatus, $id);
            if ($stmt->execute()) {
                $flash = '<div class="bg-green-900 text-green-300 px-4 py-2 rounded-lg mb-4 font-medium">Submission updated successfully.</div>';
            } else {
                $flash = '<div class="bg-red-900 text-red-300 px-4 py-2 rounded-lg mb-4 font-medium">Database error: '.$conn->error.'</div>';
            }
            $stmt->close();
        }
    }
}

// 4) Fetch latest submissions (joined with users for the submitter’s name)
$sql = "
SELECT s.id, s.leaderName, s.email, s.status, s.created_at,
        u.fullname AS submitter_name, u.email AS submitter_email
FROM submissions s
JOIN users u ON s.user_id = u.id
ORDER BY s.created_at DESC
";
$list = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Admin Dashboard</title>
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
        color: #0d0d0d;
    }
    .status-pending { background-color: #d4af3726; color: #d4af37; border: 1px solid rgba(212,175,55,0.25); }
    .status-approved { background-color: #10b98126; color: #10b981; border: 1px solid rgba(16,185,129,0.25); }
    .status-rejected { background-color: #ef444426; color: #ef4444; border: 1px solid rgba(239,68,68,0.25); }
</style>
</head>
<body>
    <header class="bg-card shadow-lg p-4 flex justify-between items-center sticky top-0 z-50 border-b border-dark-border">
        <h1 class="text-xl md:text-2xl font-bold text-light-grey">Admin <span class="text-gold">Dashboard</span></h1>
        <nav class="space-x-2 flex items-center">
            <a href="admin_dashboard.php" class="px-4 py-2 text-sm rounded-lg bg-dark-bg text-grey-text hover:bg-hover-dark transition">Dashboard</a>
            <a href="../auth/logout.php" class="px-4 py-2 text-sm rounded-lg bg-red-600 text-white hover:bg-red-700 transition">Logout</a>
        </nav>
    </header>

    <main class="p-6 max-w-7xl mx-auto">
        <?= $flash ?>

        <div class="bg-card rounded-2xl shadow-xl overflow-hidden mt-6">
            <div class="p-6 border-b border-dark-border">
                <h2 class="text-xl font-bold">All Submissions</h2>
                <p class="text-sm text-grey-text mt-1">Review, approve, or reject CRIM Grant Section B applications.</p>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    <thead class="bg-dark-bg border-b border-dark-border">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-grey-text uppercase tracking-wider">#</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-grey-text uppercase tracking-wider">Submitted By</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-grey-text uppercase tracking-wider">Leader Name</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-grey-text uppercase tracking-wider">Contact (Form)</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-grey-text uppercase tracking-wider">Date</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-grey-text uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-grey-text uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-dark-border">
                        <?php if ($list && $list->num_rows > 0): ?>
                            <?php while($row = $list->fetch_assoc()): ?>
                                <tr class="hover:bg-hover-dark transition">
                                    <td class="px-6 py-4 text-sm text-grey-text font-medium"><?= (int)$row['id'] ?></td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-light-grey"><?= htmlspecialchars($row['submitter_name']) ?></div>
                                        <div class="text-xs text-grey-text"><?= htmlspecialchars($row['submitter_email']) ?></div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-light-grey"><?= htmlspecialchars($row['leaderName']) ?></td>
                                    <td class="px-6 py-4 text-sm">
                                        <span class="text-grey-text"><?= htmlspecialchars($row['email']) ?></span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-grey-text"><?= htmlspecialchars($row['created_at']) ?></td>
                                    <td class="px-6 py-4">
                                        <?php if ($row['status'] === 'pending'): ?>
                                            <span class="px-3 py-1 text-xs font-semibold rounded-full status-pending">Pending</span>
                                        <?php elseif ($row['status'] === 'approved'): ?>
                                            <span class="px-3 py-1 text-xs font-semibold rounded-full status-approved">Approved</span>
                                        <?php else: ?>
                                            <span class="px-3 py-1 text-xs font-semibold rounded-full status-rejected">Rejected</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-6 py-4 space-x-2 flex items-center">
                                        <form method="post" class="inline">
                                            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf) ?>">
                                            <input type="hidden" name="id" value="<?= (int)$row['id'] ?>">
                                            <input type="hidden" name="action" value="approve">
                                            <button class="px-4 py-2 rounded-lg bg-green-600 hover:bg-green-700 text-white text-sm font-semibold transition">Approve</button>
                                        </form>

                                        <form method="post" class="inline">
                                            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf) ?>">
                                            <input type="hidden" name="id" value="<?= (int)$row['id'] ?>">
                                            <input type="hidden" name="action" value="reject">
                                            <button class="px-4 py-2 rounded-lg bg-red-600 hover:bg-red-700 text-white text-sm font-semibold transition">Reject</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="px-6 py-8 text-center text-grey-text">No submissions found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <p class="text-xs text-grey-text mt-4 text-center">Tip: Refresh this page after updating to see the latest statuses.</p>
    </main>
</body>
</html>