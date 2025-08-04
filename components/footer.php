<footer class="relative mt-32 grad_primary text-white overflow-hidden">
  <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-50"></div>

  <div class="relative z-10 py-16 px-4">
    <?php include_once "links.php"; ?>

    <div class="max-w-7xl mx-auto mt-16 pt-8 border-t border-white/20">
      <div class="flex flex-col md:flex-row items-center justify-between gap-6">
        <div class="flex items-center gap-4">
          <p class="font-semibold text-lg">&copy; <?= date(
            "Y",
          ) ?> NexArc RISE. All rights reserved.</p>
        </div>
        <div class="flex items-center gap-6">
          <p class="italic text-blue-200">Empowering ideas beyond borders.</p>
          <div class="flex items-center gap-2">
            <div class="w-2 h-2 grad_secondary rounded-full animate-pulse"></div>
            <span class="text-sm text-blue-200">Building the future</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
