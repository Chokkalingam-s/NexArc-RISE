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
        <div class="relative w-full h-60 rounded-2xl overflow-hidden shadow-lg"
             style="background-image: url('<?= htmlspecialchars(
               $card["bgImage"],
             ) ?>'); background-size: cover; background-position: center;">
          <div class="absolute inset-0 bg-gradient-to-b from-transparent via-black/60 to-black"></div>
          <div class="absolute bottom-0 p-4 text-white z-10">
            <h2 class="font-bold text-lg"><?= $card[
              "title"
            ] ?></h2>
            <p><span class="font-medium">Description:</span> <?= $card[
              "description"
            ] ?></p>
            <p><span class="font-medium">Collaborator:</span> <?= $card[
              "collaborator"
            ] ?></p>
            <?php if (!empty($card["participant"])): ?>
              <p><span class="font-medium">Participant:</span> <?= $card[
                "participant"
              ] ?></p>
            <?php endif; ?>
            <p><span class="font-medium">Year:</span> <?= $card[
              "year"
            ] ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
    <?php endforeach;
  ?>
</main>
