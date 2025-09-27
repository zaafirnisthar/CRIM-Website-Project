<?php
session_start();
require_once __DIR__ . '/../config/db.php';

// Guard: only admins
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit;
}

$adminName = $_SESSION['user']['fullname'];

// Quick stats
$totalSubmissions   = $conn->query("SELECT COUNT(*) as cnt FROM submissions")->fetch_assoc()['cnt'];
$pendingSubmissions = $conn->query("SELECT COUNT(*) as cnt FROM submissions WHERE status='pending'")->fetch_assoc()['cnt'];
$approvedSubmissions= $conn->query("SELECT COUNT(*) as cnt FROM submissions WHERE status='approved'")->fetch_assoc()['cnt'];

// Recent publications
$publications = $conn->query("SELECT id, title, author, publish_date, link 
                              FROM publications 
                              ORDER BY created_at DESC LIMIT 5");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    :root { --gold:#d4af37; --dark:#0b0b0b; --gray:#1a1a1a; }
    body { font-family: 'Inter', sans-serif; background: var(--dark); color:#eaeaea; }
    .sidebar { background: var(--gray); border-right:1px solid rgba(212,175,55,0.25); }
    .sidebar a { display:block; padding:12px 18px; margin:6px 0; border-radius:10px; color:#aaa; font-weight:600; }
    .sidebar a:hover, .sidebar a.active { background:linear-gradient(90deg,var(--gold),#c19e2e); color:#000; }
    .card { background: linear-gradient(145deg,#1a1a1a,#0f0f0f); border:1px solid rgba(212,175,55,0.25); }
    .card h2 { color: var(--gold); }
    .stat-icon { font-size:32px; color:var(--gold); }
  </style>
</head>
<body class="flex min-h-screen">

<!-- SIDEBAR -->
<aside class="sidebar w-64 p-6 flex flex-col">
  <h1 class="text-2xl font-extrabold text-[var(--gold)] mb-8">⚡ CRIM Admin</h1>
  <nav class="flex-1">
    <a href="admindashboard.php" class="active">📊 Dashboard</a>
    <a href="manage_submissions.php">📑 Manage Submissions</a>
    <a href="manage_announcements.php">📢 Manage Announcements</a>
    <a href="manage_publications.php">📚 Manage Publications</a>
  </nav>
  <div class="mt-auto pt-6 border-t border-gray-700">
    <p class="text-sm text-gray-400 mb-2">👋 <?= htmlspecialchars($adminName) ?></p>
    <a href="../auth/logout.php" class="text-red-400 hover:text-red-500 text-sm">Logout</a>
  </div>
</aside>

<!-- MAIN -->
<main class="flex-1 p-10">

  <!-- WELCOME BANNER -->
  <div class="text-center mb-10">
    <h1 class="text-4xl font-extrabold text-[var(--gold)]">👋 Welcome, <?= htmlspecialchars($adminName) ?></h1>
    <p class="text-gray-400 mt-2">Admin Control Panel</p>
  </div>

  <!-- HEADER -->
  <header class="mb-10">
    <h2 class="text-3xl font-bold text-[var(--gold)]">Dashboard Overview</h2>
    <p class="text-gray-400 mt-1">Control panel & system insights</p>
  </header>

  <!-- STATS -->
  <section class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
    <div class="card p-6 rounded-2xl shadow-lg flex items-center gap-4">
      <div class="stat-icon">📊</div>
      <div>
        <h2 class="text-lg font-bold">Total Submissions</h2>
        <p class="text-3xl font-extrabold"><?= $totalSubmissions ?></p>
      </div>
    </div>
    <div class="card p-6 rounded-2xl shadow-lg flex items-center gap-4">
      <div class="stat-icon">⏳</div>
      <div>
        <h2 class="text-lg font-bold">Pending</h2>
        <p class="text-3xl font-extrabold"><?= $pendingSubmissions ?></p>
      </div>
    </div>
    <div class="card p-6 rounded-2xl shadow-lg flex items-center gap-4">
      <div class="stat-icon">✅</div>
      <div>
        <h2 class="text-lg font-bold">Approved</h2>
        <p class="text-3xl font-extrabold"><?= $approvedSubmissions ?></p>
      </div>
    </div>
  </section>

  <!-- RECENT SUBMISSIONS -->
  <section class="card p-8 rounded-2xl shadow-lg mb-12">
    <h2 class="text-2xl font-bold text-[var(--gold)] mb-6">📝 Recent Submissions</h2>
    <div class="overflow-x-auto">
      <table class="w-full text-left border-collapse">
        <thead>
          <tr class="bg-[var(--gold)]/15 text-[var(--gold)]">
            <th class="px-4 py-3">ID</th>
            <th class="px-4 py-3">Leader Name</th>
            <th class="px-4 py-3">Submitted By</th>
            <th class="px-4 py-3">Status</th>
            <th class="px-4 py-3">Date</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $submissions = $conn->query("SELECT s.id, s.leaderName, s.status, s.created_at, u.fullname AS submitter_name 
                                       FROM submissions s 
                                       JOIN users u ON s.user_id=u.id 
                                       ORDER BY s.created_at DESC LIMIT 6");
          if ($submissions->num_rows > 0):
              while ($row = $submissions->fetch_assoc()):
          ?>
          <tr class="border-t border-gray-700 hover:bg-[var(--gold)]/5 transition">
            <td class="px-4 py-3"><?= $row['id'] ?></td>
            <td class="px-4 py-3"><?= htmlspecialchars($row['leaderName']) ?></td>
            <td class="px-4 py-3"><?= htmlspecialchars($row['submitter_name']) ?></td>
            <td class="px-4 py-3">
              <?php if ($row['status']==='approved'): ?>
                <span class="bg-green-600/20 text-green-400 px-3 py-1 rounded-full text-sm">Approved</span>
              <?php elseif ($row['status']==='pending'): ?>
                <span class="bg-yellow-600/20 text-yellow-400 px-3 py-1 rounded-full text-sm">Pending</span>
              <?php else: ?>
                <span class="bg-red-600/20 text-red-400 px-3 py-1 rounded-full text-sm">Rejected</span>
              <?php endif; ?>
            </td>
            <td class="px-4 py-3 text-gray-400"><?= $row['created_at'] ?></td>
          </tr>
          <?php endwhile; else: ?>
          <tr>
            <td colspan="5" class="text-center text-gray-400 py-6">No submissions yet.</td>
          </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </section>

  <!-- RECENT PUBLICATIONS -->
  <section class="card p-8 rounded-2xl shadow-lg">
    <h2 class="text-2xl font-bold text-[var(--gold)] mb-6">📚 Recent Publications</h2>
    <?php if ($publications->num_rows > 0): ?>
      <ul class="space-y-4">
        <?php while ($pub = $publications->fetch_assoc()): ?>
          <li class="border-b border-gray-700 pb-4">
            <p class="font-semibold"><?= htmlspecialchars($pub['title']) ?></p>
            <p class="text-sm text-gray-400">By <?= htmlspecialchars($pub['author']) ?> • <?= htmlspecialchars($pub['publish_date']) ?></p>
            <a href="<?= htmlspecialchars($pub['link']) ?>" target="_blank" class="text-[var(--gold)] text-sm hover:underline">Read</a>
          </li>
        <?php endwhile; ?>
      </ul>
    <?php else: ?>
      <p class="text-center text-gray-400">No publications uploaded yet.</p>
    <?php endif; ?>
  </section>

</main>

</body>
</html>
