<main>
  <section class="max-w-5xl mx-auto">
    <h2 class="text-3xl font-bold text-center mb-6">Contact Us</h2>
    <div class="grid sm:grid-cols-2 lg:grid-cols-5 gap-4">
      <?php for ($i = 1; $i <= 5; $i++): ?>
        <div class="p-4 rounded-2xl shadow-md flex flex-col items-center img w-40 aspect-square relative overflow-hidden" style="background-image:url('https://placehold.co/100')">
          <div class="bg-gradient-to-b from-transparent to-black/70 absolute inset-0"></div>
          <div class="absolute bottom-0">
            <h3 class="text-gray-800">Member <?= $i ?></h3>
            <p class="text-sm text-gray-500">Role / Position</p>
            <p class="text-sm text-gray-500">email@example.com</p>
          </div>
        </div>
      <?php endfor; ?>
    </div>
  </section>
</main>
