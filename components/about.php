<style>
  .glow {
    box-shadow: 0 0 40px rgba(102, 126, 234, 0.3);
  }

  .float {
    animation: float 6s ease-in-out infinite;
  }

  @keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
  }

  .slide-in {
    animation: slideIn 1s ease-out;
  }

  @keyframes slideIn {
    from { opacity: 0; transform: translateX(-50px); }
    to { opacity: 1; transform: translateX(0); }
  }

  .tag-hover {
    transition: all 0.3s ease;
  }

  .tag-hover:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.2);
  }

  .glass {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
  }

  .text-shadow {
    text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
  }
  .hero-pattern {
    background-image: radial-gradient(circle at 25px 25px, rgba(102, 126, 234, 0.1) 2px, transparent 2px);
    background-size: 50px 50px;
  }
</style>
<section class="min-h-[70vh] c px-4 relative overflow-hidden">
  <div class="max-w-7xl mx-auto grid md:grid-cols-[60%_40%] items-center gap-x-20 relative z-10">
    <!-- Text Panel -->
    <div class="space-y-8 slide-in">
      <!-- Main Headline -->
      <div class="space-y-4">
        <h2 class="text-4xl md:text-5xl head font-bold leading-tight gradient_text">
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
            <img src="/../assets/icons/v3.png" alt="NexArc RISE Logo" class="size-44 mx-auto">
            <div class="text-3xl gradient_text font-bold">NexArc RISE</div>
            <div class="text-lg text-slate-600 font-light mt-2">Building Tomorrow</div>
          </div>
        </div>

        <!-- Floating Tags -->
        <div class="absolute -top-4 -right-4 about_us_tags_base gradient_text" style="animation-delay: 0s">
          <span>🌍</span> Global Collaboration
        </div>
        <div class="absolute -bottom-4 -left-4 about_us_tags_base gradient_text" style="animation-delay: 1s">
          <span>💡</span> Innovation Focus
        </div>
        <div class="absolute bottom-6 -right-24 about_us_tags_base gradient_text" style="animation-delay: 2s">
          <span>🎯</span> Expert Mentorship
        </div>
      </div>
    </div>
  </div>
</section>
