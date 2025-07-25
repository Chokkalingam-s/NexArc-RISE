<main class="relative top-12">
  <h2 class="text-2xl font-semibold">Projects</h2>
  <?php
  include "assets/data.php";
  global $cards;
  foreach ($cards as $card): ?>
  <div class="relative w-80 h-60 rounded-2xl overflow-hidden shadow-lg"
       style="background-image: url('<?php echo htmlspecialchars(
         $card["bgImage"],
       ); ?>');">
        <div class="absolute w-full h-full bg-gradient-to-b from-transparent via-black/60 to-black"></div>
        <div class="absolute bottom-0 p-4 text-white z-10">
          <h2 class="font-bold"><?php echo $card[
            "title"
          ]; ?></h2>
          <p><span class="font-semibold">Description:</span> <?php echo $card[
            "description"
          ]; ?></p>
          <p><span class="font-semibold">Collaborator:</span> <?php echo $card[
            "collaborator"
          ]; ?></p>
          <?php if (!empty($card["participant"])): ?>
            <p><span class="font-semibold">Participant:</span> <?php echo $card[
              "participant"
            ]; ?></p>
          <?php endif; ?>
          <p><span class="font-semibold">Year:</span> <?php echo $card[
            "year"
          ]; ?></p>
        </div>
      </div>
    <?php endforeach;
  ?>
</main>
