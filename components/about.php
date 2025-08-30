<style>.slide-in{animation:slideIn 1s ease-out}@keyframes slideIn{from{opacity:0;transform:translateX(-50px)}to{opacity:1;transform:translateX(0)}}</style>
<?php include_once __DIR__ . "/helpers.php"; ?>

<section class="min-h-[70vh] c px-4 relative overflow-hidden">
  <div class="max-w-7xl mx-auto grid md:grid-cols-[60%_40%] items-center gap-x-20 relative z-10">
    <!-- Text Panel -->
    <div class="space-y-8 slide-in">
      <!-- Main Headline -->
      <div class="space-y-4">
        <h2 class="text-2xl md:text-5xl head font-bold leading-tight gradient_text">
          We don’t follow the future.<br />
          <span class="block mt-1">We build it.</span>
        </h2>
      </div>

      <!-- Description -->
      <div class="space-y-6">
        <p class="text-lg text-slate-700 leading-relaxed">
          <span class="font-bold gradient_text">NexArc RISE</span>
          is a nonprofit innovation hub that unites brilliant minds across the globe to transform ambitious ideas into world-changing reality.
        </p>

        <!-- Quote -->
        <div class="relative">
          <blockquote>
          <p class="text-2xl font-medium text-slate-700 italic leading-relaxed">
              "What if?" becomes
              <span class="gradient_text font-semibold">"Watch us make it real."</span>
            </p>
          </blockquote>
        </div>

        <p class="text-slate-600 leading-relaxed">
          Through student-driven research, expert mentorship, and seamless global collaboration, we spark groundbreaking innovations without borders —
          <span class="font-bold gradient_text">from Japan to the world.</span>
        </p>
      </div>
    </div>
    <!-- Visual Panel -->
    <div class="relative w-fit">
      <!-- Main Visual -->
      <div class="w-80 aspect-square rounded-3xl p-1 relative">
        <div class="w-full h-full rounded-3xl flex items-center justify-center overflow-hidden">
          <!-- Central Logo/Icon -->
          <div class="relative z-10 text-center">
            <img src="/nexarc-rise/assets/icons/v3.png" alt="NexArc RISE Logo" class="size-44 mx-auto">
            <div class="text-3xl gradient_text font-bold">NexArc RISE</div>
            <div class="text-lg text-slate-600 font-light mt-2">Building Tomorrow</div>
          </div>
        </div>

        <!-- Floating Tags -->
        <div class="absolute -top-4 -right-4 about_us_tags_base gradient_text [animation:float_3s_ease-in-out_infinite]" style="animation-delay:0s">
  <span><?= inline_svg("assets/icons/globe-solid-full.svg") ?></span> Global Collaboration
</div>
<div class="absolute -bottom-4 -left-8 about_us_tags_base gradient_text [animation:float_3s_ease-in-out_infinite]" style="animation-delay:1s">
  <span><?= inline_svg("assets/icons/lightbulb-solid-full.svg") ?></span> Innovation Focus
</div>
<div class="absolute bottom-5 -right-32 about_us_tags_base gradient_text [animation:float_3s_ease-in-out_infinite]" style="animation-delay:2s">
  <span><?= inline_svg("assets/icons/bullseye-solid-full.svg") ?></span> Expert Mentorship
</div>
  <style>
    @keyframes float {
      0%, 100% { translate: 0 0; }
      50% { translate: 0 -10px; }
    }
  </style>
      </div>
    </div>
  </div>
</section>
