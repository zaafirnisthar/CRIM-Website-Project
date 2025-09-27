<?php
// public/publication.php
require_once __DIR__ . '/../config/db.php';

$validSchools = ['SCI','SBSS','SEHS','CFGS'];
$school = strtoupper($_GET['school'] ?? 'ALL');
if (!in_array($school, $validSchools)) {
    $school = 'ALL';
}

// Map school to building image and label
$schoolMeta = [
    'ALL'  => ['label' => 'All Schools', 'img' => '../images/aiubuilding.jpg'],
    'SCI'  => ['label' => 'School of Computing & Informatics (SCI)', 'img' => '../images/sci.jpg'],
    'SBSS' => ['label' => 'School of Business & Social Sciences (SBSS)', 'img' => '../images/sbss.jpg'],
    'SEHS' => ['label' => 'School of Education, Humanities & Social Sciences (SEHS)', 'img' => '../images/sehs.jpg'],
    'CFGS' => ['label' => 'Centre for Foundation & General Studies (CFGS)', 'img' => '../images/cfgs.jpg'],
];

// Fetch publications
if ($school === 'ALL') {
    $sql = "SELECT id, department, title, author, publish_date, link, created_at 
            FROM publications 
            ORDER BY COALESCE(publish_date, created_at) DESC";
    $stmt = $conn->prepare($sql);
} else {
    $sql = "SELECT id, department, title, author, publish_date, link, created_at 
            FROM publications 
            WHERE department = ?
            ORDER BY COALESCE(publish_date, created_at) DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $school);
}
$stmt->execute();
$result = $stmt->get_result();

// Count per school
$countBySchool = [];
$cntRes = $conn->query("SELECT department, COUNT(*) AS cnt FROM publications GROUP BY department");
while ($row = $cntRes->fetch_assoc()) {
    $countBySchool[$row['department']] = (int)$row['cnt'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Publications <?= $school==='ALL' ? '' : '— '.$schoolMeta[$school]['label'] ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap">
<script src="https://cdn.tailwindcss.com"></script>
<style>
    :root {
        --dark-bg: #0d0d0d;
        --dark-card: #171717;
        --grey-text: #bdbdbd;
        --light-grey: #eaeaea;
        --gold: #d4af37;
        --gold-light: #f5e4b2;
    }
    html {
        scroll-behavior: smooth;
    }
    body {
        font-family: 'Inter', sans-serif;
        background-color: var(--dark-bg);
        color: var(--light-grey);
    }
    .text-gold {
        color: var(--gold);
    }
    .bg-gradient-gold {
        background: linear-gradient(90deg, #d4af37, #b9922b);
    }
    .bg-card {
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.03), rgba(0, 0, 0, 0.25));
        border: 1px solid rgba(255, 255, 255, 0.05);
    }
    .chip {
        background-color: rgba(212, 175, 55, 0.1);
        color: var(--gold-light);
        border: 1px solid rgba(212, 175, 55, 0.2);
    }
    .tab {
        border: 1px solid rgba(255, 255, 255, 0.08);
        transition: all 0.2s ease-in-out;
    }
    .tab-active {
        border-color: rgba(212, 175, 55, 0.4);
        background: rgba(212, 175, 55, 0.1);
        color: var(--gold-light);
    }
    .tab:not(.tab-active):hover {
        background: rgba(255, 255, 255, 0.03);
    }
    .shadow-professional {
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.4);
    }
    .link-underline {
        text-decoration-color: var(--gold);
        text-underline-offset: 4px;
    }
</style>
</head>
<body class="min-h-screen">

    <?php include __DIR__ . '/../includes/header.php'; ?>

    <section class="relative overflow-hidden py-16 md:py-24">
        <div class="absolute inset-0">
            <div class="absolute inset-0 z-0">
                <img src="<?= htmlspecialchars($schoolMeta[$school]['img']) ?>" alt="Building Background"
                    class="w-full h-full object-cover opacity-20 transition-opacity duration-500">
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-[var(--dark-bg)] via-transparent to-transparent z-10"></div>
        </div>
        <div class="relative z-20 max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight leading-tight mb-2">
                Research <span class="text-gold">Publications</span>
            </h1>
            <p class="text-[var(--grey-text)] max-w-2xl mx-auto text-lg md:text-xl">
                A curated collection of peer-reviewed articles, books, and chapters from our academic community.
            </p>
            <?php if ($school !== 'ALL'): ?>
                <div class="mt-4 flex flex-col sm:flex-row items-center justify-center gap-2 text-sm font-medium">
                    <span class="chip px-3 py-1 rounded-full shadow-professional">
                        <?= htmlspecialchars($schoolMeta[$school]['label']) ?>
                    </span>
                    <a href="publication.php" class="text-gold text-sm hover:underline hover:text-gold-light transition-colors">
                        View All Publications
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 -mt-8 relative z-20">
        <div class="grid grid-cols-2 md:grid-cols-5 gap-3 bg-card rounded-2xl p-3 shadow-professional">
            <?php
            function tabLink($code, $label, $active, $count) {
                $href = 'publication.php'.($code==='ALL' ? '' : '?school='.$code);
                $cls = 'tab px-4 py-2 rounded-xl text-sm font-medium transition-all duration-200 ';
                $countClass = ($active || $count > 0) ? '' : 'hidden'; // Hide count if not active and 0
                if ($active) $cls .= 'tab-active';
                echo '<a class="'.$cls.'" href="'.$href.'">';
                echo '<div class="flex items-center justify-between gap-3">';
                echo '<span>'.htmlspecialchars($label).'</span>';
                echo '<span class="text-xs chip px-2 py-0.5 rounded-full '.$countClass.'">'.(int)$count.'</span>';
                echo '</div></a>';
            }
            tabLink('ALL','All', $school==='ALL', array_sum($countBySchool));
            tabLink('SCI','SCI', $school==='SCI', $countBySchool['SCI'] ?? 0);
            tabLink('SBSS','SBSS',$school==='SBSS',$countBySchool['SBSS'] ?? 0);
            tabLink('SEHS','SEHS',$school==='SEHS',$countBySchool['SEHS'] ?? 0);
            tabLink('CFGS','CFGS',$school==='CFGS',$countBySchool['CFGS'] ?? 0);
            ?>
        </div>
    </section>

    <main class="max-w-7xl mx-auto px-4 mt-8 mb-14">
        <?php if ($result->num_rows === 0): ?>
            <div class="bg-card rounded-2xl p-10 text-center shadow-professional">
                <div class="text-2xl font-extrabold text-gold mb-2">No publications found</div>
                <p class="text-gray-400">Please check back later or try a different filter.</p>
            </div>
        <?php else: ?>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php while ($row = $result->fetch_assoc()): 
                    $date = $row['publish_date'] ? date('F Y', strtotime($row['publish_date'])) 
                                                 : ($row['created_at'] ? date('F Y', strtotime($row['created_at'])) : '—');
                    $dept = htmlspecialchars($row['department']);
                ?>
                    <article class="bg-card rounded-2xl p-6 shadow-professional hover:shadow-2xl hover:-translate-y-1 transition-all duration-300">
                        <div class="flex items-center justify-between mb-4">
                            <span class="chip text-xs font-bold px-3 py-1 rounded-full"><?= $dept ?></span>
                            <time class="text-xs text-[var(--grey-text)]"><?= htmlspecialchars($date) ?></time>
                        </div>
                        <h3 class="text-xl font-semibold leading-snug mb-2"><?= htmlspecialchars($row['title']) ?></h3>
                        <p class="text-sm text-[var(--grey-text)]">
                            Author(s): <span class="font-medium text-gold"><?= htmlspecialchars($row['author']) ?></span>
                        </p>
                        <div class="mt-6 flex flex-wrap items-center gap-4">
                            <a class="bg-gradient-gold inline-flex items-center gap-2 px-5 py-2.5 rounded-xl font-bold text-sm text-black hover:opacity-90 transition"
                               href="<?= htmlspecialchars($row['link']) ?>" target="_blank" rel="noopener">
                                Read More
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h6m0 0v6m0-6L10 16" />
                                </svg>
                            </a>
                            <?php if ($row['department'] && in_array($row['department'],$validSchools)): ?>
                                <a class="text-xs text-[var(--grey-text)] hover:text-gold hover:underline link-underline transition-colors"
                                   href="publication.php?school=<?= $dept ?>">More from <?= $dept ?></a>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </main>

    <?php include __DIR__ . '/../includes/footer.php'; ?>

</body>
</html>