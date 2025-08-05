<footer class="relative mt-32 grad_primary text-white overflow-hidden rounded-t-sm">
  <div class="absolute inset-0 opacity-50"></div>
  <div class="relative z-10 pb-4 px-4">
    <?php include_once "links.php"; ?>

    <div class="max-w-7xl mx-auto pt-4 border-t-2 border-white/40">
      <div class="flex flex-col md:flex-row items-center justify-between gap-6 text-sm">
        <div class="flex items-center gap-4">
          <p class="font-semibold">&copy; <?= date(
            "Y",
          ) ?> NexArc RISE. All rights reserved.</p>
        </div>
        <div class="flex items-center gap-6">
          <em>Empowering ideas beyond borders.</em>
          <div class="flex items-center gap-2">
            <div class="dot"></div>
            <span class="text-sm">Building the future</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
