<?php
require_once __DIR__ . '/../config/db.php'; // $conn = new PDO(...)

// Fetch Completed Projects grouped by typeOfPublish
$stmt = $conn->prepare("SELECT * FROM Project WHERE status = 'Completed'");
$stmt->execute();
$projects = $stmt->fetchAll(PDO::FETCH_ASSOC);

$conferences = array_filter($projects, fn($p) => strtolower($p['typeOfPublish']) === 'conference');
$journals = array_filter($projects, fn($p) => strtolower($p['typeOfPublish']) === 'journal');
?>

<section class="grid grid-cols-2 gap-4">
  <!-- Conferences Section -->
  <div class="space-y-6 relative z-10">
    <div class="flex items-center gap-4 mb-8">
      <div class="size-12 grad_primary head rounded-xl flex items-center justify-center pulse-glow">
        <svg class="size-6 text-white" fill="currentColor" viewBox="0 0 24 24">
          <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
        </svg>
      </div>
      <h2 class="text-3xl font-bold gradient_text">Conferences</h2>
    </div>

    <div class="space-y-4">
      <?php foreach ($conferences as $conf): ?>
      <div class="bg-white/40 p-6 rounded-2xl hover:scale-105 transition-all duration-500 cursor-pointer group relative overflow-hidden">
        <div class="shimmer absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        <div class="relative z-10">
          <div class="flex justify-between items-start">
            <h3 class="text-lg gradient_text font-bold transition-colors">
              <?= htmlspecialchars($conf["paper_title"] ?: $conf["title"]) ?>
            </h3>
            <div class="flex items-center gap-2">
              <div class="w-2 h-2 grad_primary rounded-full animate-pulse"></div>
              <span class="text-xs text-blue-800 font-medium"><?= $conf["status"] ?></span>
            </div>
          </div>
          <p class="text-sm font-medium mb-2">by <?= htmlspecialchars($conf["authors"]) ?></p>
          <p class="text-sm leading-relaxed mb-4"><?= htmlspecialchars($conf["details"] ?: $conf["description"]) ?></p>
          <div class="flex justify-between items-center">
            <div class="flex items-center gap-2">
              <svg class="w-4 h-4 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
              </svg>
              <span class="text-slate-600 text-sm"><?= $conf["year_of_end"] ?></span>
            </div>
            <?php if (!empty($conf["link"])): ?>
              <a href="<?= $conf["link"] ?>" target="_blank"
                class="bg-gradient-to-r from-amber-500 to-orange-500 text-white px-4 py-2 rounded-lg text-sm font-medium hover:shadow-lg hover:shadow-amber-500/25 transition-all duration-300 group-hover:scale-105">
                View Details
              </a>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Journals Section -->
  <div class="space-y-6 relative z-10">
    <div class="flex items-center gap-4 mb-8">
      <div class="w-12 h-12 grad_primary rounded-xl flex items-center justify-center pulse-glow">
        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
          <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/>
        </svg>
      </div>
      <h2 class="text-3xl font-bold gradient_text">Journals</h2>
    </div>

    <div class="space-y-4">
      <?php foreach ($journals as $journal): ?>
      <div class="bg-white/40 p-6 rounded-2xl hover:scale-105 transition-all duration-500 cursor-pointer group relative overflow-hidden">
        <div class="shimmer absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        <div class="relative z-10">
          <div class="flex justify-between items-start">
            <h3 class="text-lg gradient_text font-bold transition-colors">
              <?= htmlspecialchars($journal["paper_title"] ?: $journal["title"]) ?>
            </h3>
            <div class="flex items-center gap-2">
              <div class="size-2 bg-amber-500 rounded-full animate-pulse"></div>
              <span class="text-xs text-amber-500 font-medium"><?= $journal["status"] ?></span>
            </div>
          </div>
          <p class="text-sm font-medium text-indigo-600"><?= htmlspecialchars($journal["nameOfPublish"]) ?></p>
          <p class="text-sm font-medium mb-2">by <?= htmlspecialchars($journal["authors"]) ?></p>
          <p class="text-sm leading-relaxed mb-4"><?= htmlspecialchars($journal["details"] ?: $journal["description"]) ?></p>
          <div class="flex justify-between items-center">
            <div class="flex items-center gap-2">
              <svg class="w-4 h-4 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
              </svg>
              <span class="text-slate-600 text-sm"><?= $journal["year_of_end"] ?></span>
            </div>
            <?php if (!empty($journal["link"])): ?>
              <a href="<?= $journal["link"] ?>" target="_blank"
                class="bg-gradient-to-r from-amber-500 to-orange-500 text-white px-4 py-2 rounded-lg text-sm font-medium hover:shadow-lg hover:shadow-amber-500/25 transition-all duration-300 group-hover:scale-105">
                View Paper
              </a>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
