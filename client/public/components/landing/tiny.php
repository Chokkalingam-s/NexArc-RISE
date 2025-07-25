<!-- carousel small -->

<div class="relative overflow-hidden w-full py-10">
  <div class="flex animate-scroll" id="carousel-track">
    <!-- Wrapper 1 -->
    <div class="flex shrink-0 gap-x-10" id="original">
      <?php for ($i = 1; $i <= 7; $i++) {
        echo "<div class='min-w-[150px] h-24 bg-blue-300 rounded-xl flex items-center justify-center text-xl font-bold px-2'>$i</div>";
      } ?>
    </div>
    <!-- Wrapper 2: Clone -->
    <div class="flex shrink-0" id="clone">
      <?php for ($i = 1; $i <= 7; $i++) {
        echo "<div class='min-w-[150px] h-24 bg-blue-300 rounded-xl flex items-center justify-center text-xl font-bold px-2 ml-10'>$i</div>";
      } ?>
    </div>
  </div>
</div>
<style>
@keyframes scroll {
  0% { transform: translateX(0); }
  100% { transform: translateX(-50%); }
}

.animate-scroll {
  animation: scroll 20s linear infinite;
  width: max-content;
}
</style>

<!-- carousel small end-->
