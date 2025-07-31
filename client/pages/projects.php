<main class="relative top-12">
  <h2 class="text-2xl font-medium">Projects</h2>
  <?php
  include "assets/data.php";
  global $cards;
  foreach ($cards as $card): ?>
  <section class="p-8">
    <div class="flex justify-between items-center mb-4">
      <h2 class="text-3xl font-bold">Ongoing Projects</h2>
      <a href="/projects" class="text-blue-700 font-medium hover:underline">View More</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php foreach ($cards as $card): ?>
        <div class="group relative rounded-2xl overflow-hidden shadow-lg border border-blue-500/10 bg-white/90 dark:bg-neutral-900/90 backdrop-blur transition-transform hover:-translate-y-1">
          <!-- subtle pattern -->
          <div class="absolute inset-0 opacity-60 pointer-events-none"
               style="background-image: radial-gradient(rgba(59,130,246,0.08) 1px, transparent 1px); background-size: 12px 12px;"></div>
          <!-- gradient accent blob -->
          <div class="absolute -top-10 -right-10 w-48 h-48 rounded-full blur-3xl pointer-events-none bg-gradient-to-br from-blue-500/20 via-indigo-500/20 to-purple-500/20"></div>

          <!-- year badge -->
          <span class="absolute top-3 right-3 z-10 inline-flex items-center px-2 py-1 text-xs font-medium rounded-full text-white bg-gradient-to-r from-blue-600 to-indigo-600 shadow">
            <?= htmlspecialchars($card["year"]) ?>
          </span>

          <div class="relative p-5 space-y-2 z-10">
            <h2 class="font-semibold text-lg text-gray-900 dark:text-gray-100"><?= htmlspecialchars(
              $card["title"],
            ) ?></h2>
            <p class="text-sm text-gray-700 dark:text-gray-300">
              <span class="font-medium">Description:</span> <?= htmlspecialchars(
                $card["description"],
              ) ?>
            </p>
            <p class="text-sm text-gray-700 dark:text-gray-300">
              <span class="font-medium">Collaborator:</span> <?= htmlspecialchars(
                $card["collaborator"],
              ) ?>
            </p>
            <?php if (!empty($card["participant"])): ?>
              <p class="text-sm text-gray-700 dark:text-gray-300">
                <span class="font-medium">Participant:</span> <?= htmlspecialchars(
                  $card["participant"],
                ) ?>
              </p>
            <?php endif; ?>

            <!-- CTA -->
            <div class="pt-2">
              <a href="#" class="inline-flex items-center text-sm font-medium text-blue-700 hover:text-indigo-700">View details →</a>
            </div>
          </div>

          <!-- bottom gradient bar -->
          <div class="h-1 w-full bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600"></div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
    <?php endforeach;
  ?>
</main>
