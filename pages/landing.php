<main>
 <?php
 include_once __DIR__ . "/../components/navbar.php";
 include_once __DIR__ . "/../components/about.php";
 include_once __DIR__ . "/../components/carousel.php";
 include_once __DIR__ . "/../components/tiny.php";
 ?>

<?php
require_once __DIR__ . "/../config/db.php"; // $conn = PDO

// Fetch ongoing projects
$stmt = $conn->prepare(
  "SELECT * FROM Project WHERE status = 'Ongoing' ORDER BY year_of_start DESC LIMIT 6",
);
$stmt->execute();
$ongoingProjects = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch completed projects
$stmt = $conn->prepare(
  "SELECT * FROM Project WHERE status = 'Completed' ORDER BY year_of_end DESC LIMIT 6",
);
$stmt->execute();
$completedProjects = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Ongoing Projects -->
<section class="px-4 max-w-7xl mx-auto">
  <div class="flex justify-between items-center mb-10 gap-4">
    <div>
      <h2 class="ongoing head">Ongoing Projects</h2>
      <p class="text-slate-600 mt-1">Innovation in progress</p>
    </div>
    <a href="/NexArc-rise/projects" class="flex items-center gap-x-2 bg-amber-500 text-white font-medium rounded-full transition-all duration-300 hover:scale-105 px-4 py-2">
      View More
    </a>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    <?php if ($ongoingProjects): ?>
      <?php foreach ($ongoingProjects as $project): ?>
        <a href="/NexArc-rise/projects" class="block group">
          <div class="bg-white/50 rounded-2xl shadow-md hover:shadow-lg transition-all duration-500 group-hover:-translate-y-2">
            <div class="aspect-[4/2] rounded-t-2xl overflow-hidden">
              <img src="<?= htmlspecialchars(
                $project["image"] ?:
                "https://placehold.co/400x200",
              ) ?>"
                   alt="<?= htmlspecialchars(
                     $project["title"],
                   ) ?>"
                   class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
            </div>
            <div class="p-4">
              <h3 class="text-lg font-semibold text-amber-600 mb-1">
                <?= htmlspecialchars($project["title"]) ?>
              </h3>
              <p class="text-slate-700 text-sm mb-4 line-clamp-3">
                <?= htmlspecialchars(
                  $project["description"] ?:
                  "Revolutionary solution in development",
                ) ?>
              </p>
              <div class="flex items-center justify-between text-sm">
                <span class="inline-block px-3 py-1 bg-amber-100 text-amber-600 font-medium rounded-full">
                  In Progress
                </span>
                <div class="flex items-center gap-2 text-amber-600">
                  <span class="size-2 bg-amber-500 rounded-full animate-pulse"></span>
                  Active
                </div>
              </div>
            </div>
          </div>
        </a>
      <?php endforeach; ?>
    <?php else: ?>
      <p class="text-slate-500">No ongoing projects found.</p>
    <?php endif; ?>
  </div>
</section>


<!-- Completed Projects -->
<section class="px-4 max-w-7xl mx-auto">
  <div class="flex justify-between items-center mb-8 gap-4">
    <div>
      <h2 class="text-2xl head font-medium gradient_text">Completed Projects</h2>
      <p class="text-slate-600 mt-1">Success stories delivered</p>
    </div>
    <a href="/NexArc-rise/projects" class="flex items-center gap-x-2 bg-blue-600 text-amber-50 font-medium rounded-full transition-all duration-300 hover:scale-105 px-4 py-2">
      View More
    </a>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-20">
    <?php if ($completedProjects): ?>
      <?php foreach ($completedProjects as $project): ?>
      <a href="/NexArc-rise/projects" class="block group">
        <div class="relative overflow-hidden rounded-2xl bg-white/40 shadow-lg hover:shadow-xl transition-all duration-500 hover:-translate-y-2">
          <div class="aspect-[4/1.8] relative overflow-hidden">
            <img src="<?= htmlspecialchars(
              $project["image"] ?:
              "https://placehold.co/400x200",
            ) ?>"
                 alt="<?= htmlspecialchars($project["title"]) ?>"
                 class="w-full h-full object-cover">
          </div>
          <div class="p-4">
            <h3 class="text-lg font-semibold text-blue-600 mb-1">
              <?= htmlspecialchars($project["title"]) ?>
            </h3>
            <p class="text-slate-600 text-sm mb-4 line-clamp-3">
              <?= htmlspecialchars(
                $project["description"] ?:
                "Successfully delivered solution",
              ) ?>
            </p>
            <div class="flex items-center justify-between">
              <span class="inline-flex items-center px-3 py-1 rf text-xs font-medium bg-blue-200 text-blue-800">
                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
                Completed
              </span>
              <div class="flex items-center text-slate-400">
                <div class="dot"></div>
                <span class="text-xs">Done</span>
              </div>
            </div>
          </div>
        </div>
      </a>
      <?php endforeach; ?>
    <?php else: ?>
      <p class="text-slate-500">No completed projects found.</p>
    <?php endif; ?>
  </div>
</section>


 <script>
 let index = 0;
 function nextCard() {
   index = Math.min(index + 1, 7 - 3);
   document.getElementById('cards').style.transform = `translateX(-${index * 7.5}rem)`;
 }
 function prevCard() {
   index = Math.max(index - 1, 0);
   document.getElementById('cards').style.transform = `translateX(-${index * 7.5}rem)`;
 }
 </script>
</main>
