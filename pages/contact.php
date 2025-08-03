<section class="max-w-6xl mx-auto px-4 py-8">
  <h2 class="text-center mb-10">Contact Us</h2>
  <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
    <?php for ($i = 1; $i <= 5; $i++): ?>
      <div class="relative aspect-square rounded-2xl overflow-hidden shadow-md bg-gray-100">
        <img src="https://placehold.co/300" alt="Member <?= $i ?>" class="absolute inset-0 w-full h-full object-cover" />
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/70"></div>
        <div class="absolute bottom-0 p-3 text-white">
          <h3 class="font-semibold text-sm">Member <?= $i ?></h3>
          <p class="text-xs opacity-80">Role / Position</p>
          <p class="text-xs opacity-70">email@example.com</p>
        </div>
      </div>
    <?php endfor; ?>
  </div>
</section>
