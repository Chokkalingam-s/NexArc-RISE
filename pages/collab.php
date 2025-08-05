<?php
global $mentors, $scholarships, $schools;
include_once __DIR__ . "/../assets/collab_data.php";
?>

<section class="grid grid-cols-[68%_2%_30%] h-screen overflow-hidden">
  <!-- Left Scrollable Section -->
  <div class="overflow-y-auto space-y-8 h-full px-4 py-6">
    <!-- Scholarships -->
    <div>
      <h2 class="gradient_text mb-6">Scholarships</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <?php foreach ($scholarships as $item): ?>
          <div class="bg-white/20 rounded-xl shadow-md hover:shadow-lg transition-shadow overflow-hidden">
            <div class="flex h-52">
              <img src="<?= $item[
                "image"
              ] ?>" alt="Scholarship" class="w-1/3 object-cover">
              <div class="p-4 flex flex-col justify-between w-2/3">
                <div>
                  <h3 class="font-bold text-slate-800 text-lg mb-1"><?= $item[
                    "title"
                  ] ?></h3>
                  <p class="text-indigo-600 text-sm font-medium mb-2"><?= $item[
                    "university"
                  ] ?></p>
                  <p class="text-slate-600 text-sm line-clamp-4"><?= $item[
                    "description"
                  ] ?></p>
                </div>
                <a href="<?= $item[
                  "link"
                ] ?>" class="text-indigo-600 hover:text-indigo-800 font-medium text-sm transition-colors" target="_blank">
                  Learn More →
                </a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Schools -->
    <div>
      <h2 class="gradient_text mb-6">Schools</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <?php foreach ($schools as $school): ?>
          <div class="bg-white/20 rounded-xl shadow-md hover:shadow-lg transition-shadow overflow-hidden">
            <img src="<?= $school[
              "image"
            ] ?>" alt="School" class="w-full aspect-[16/9] object-cover">
            <div class="p-4">
              <h3 class="font-bold text-slate-800 text-lg mb-1"><?= $school[
                "title"
              ] ?></h3>
              <p class="text-slate-600 text-sm mb-3"><?= $school[
                "place"
              ] ?></p>
              <a href="<?= $school[
                "link"
              ] ?>" class="gradient_text font-medium text-sm transition-colors" target="_blank">
                Visit Site →
              </a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Testimonials -->
    <?php $students = [
      [
        "name" => "Student A",
        "desc" => "Benefited from Kyoto Tech Program",
        "bg" => "bg-gradient-to-r from-indigo-500 to-blue-600",
      ],
      [
        "name" => "Student B",
        "desc" => "Joined Exchange at Berlin Engineering",
        "bg" => "bg-gradient-to-r from-purple-500 to-indigo-600",
      ],
    ]; ?>

    <div>
      <h2 class="gradient_text mb-4">Student Success Stories</h2>
      <div class="grid sm:grid-cols-2 gap-6">
        <?php foreach ($students as $student): ?>
          <div class="flex items-center gap-4 p-6 bg-white/40 rounded-xl shadow-md">
            <div class="size-16 px-4 rounded-full <?= $student[
              "bg"
            ] ?>"></div>
            <div>
              <p class="font-semibold text-slate-800 text-lg"><?= $student[
                "name"
              ] ?></p>
              <p class="text-slate-600"><?= $student[
                "desc"
              ] ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <!-- Contact Form -->
    <div>
      <h2 class="gradient_text mb-6">Contact Us</h2>
      <div class="bg-white/40 rounded-xl shadow-lg p-8 max-w-2xl mx-auto">

        <!-- Interest Selection -->
        <div class="mb-6">
          <p class="text-sm font-semibold text-slate-700 mb-3">I'm interested in:</p>
          <div class="flex flex-wrap gap-4">
            <label class="inline-flex items-center gap-2 cursor-pointer">
              <input type="checkbox" class="accent-indigo-600" />
              <span class="text-slate-700">Japanese Language</span>
            </label>
            <label class="inline-flex items-center gap-2 cursor-pointer">
              <input type="checkbox" class="accent-indigo-600" />
              <span class="text-slate-700">Scholarships & Schools</span>
            </label>
            <label class="inline-flex items-center gap-2 cursor-pointer">
              <input type="checkbox" class="accent-indigo-600" />
              <span class="text-slate-700">Higher Studies in Japan</span>
            </label>
          </div>
        </div>

        <!-- Contact Form -->
        <form class="space-y-4">
          <div class="grid md:grid-cols-2 gap-4">
            <label class="block">
              <span class="text-sm font-semibold text-slate-700 mb-2 block">Name</span>
              <input type="text" name="name" placeholder="Your full name"
                     class="w-full px-4 py-3 border border-slate-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none transition-all" />
            </label>

            <label class="block">
              <span class="text-sm font-semibold text-slate-700 mb-2 block">Email</span>
              <input type="email" name="email" placeholder="your.email@example.com"
                     class="w-full px-4 py-3 border border-slate-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none transition-all" />
            </label>
          </div>

          <label class="block">
            <span class="text-sm font-semibold text-slate-700 mb-2 block">Phone</span>
            <input type="tel" name="phone" placeholder="+1 (555) 123-4567"
                   class="w-full px-4 py-3 border border-slate-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none transition-all" />
          </label>

          <label class="block">
            <span class="text-sm font-semibold text-slate-700 mb-2 block">Message</span>
            <textarea name="message" rows="4" placeholder="Tell us about your goals and how we can help..."
                      class="w-full px-4 py-3 border border-slate-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none transition-all resize-none"></textarea>
          </label>

          <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 to-blue-600 text-white py-3 px-6 rounded-lg font-semibold hover:from-indigo-700 hover:to-blue-700 transform hover:scale-[1.02] transition-all duration-200 shadow-lg">
            Send Message
          </button>
        </form>
      </div>
    </div>
  </div>

  <!-- Divider -->
  <div class="grad_primary w-1 rounded-full"></div>

  <!-- Right Mentors -->
  <div class="p-4 w-80 flex flex-col sticky top-0 self-start z-20 h-[calc(100vh-100px)]">
    <h2 class="gradient_text mb-3 text-lg font-semibold">Project Mentors</h2>
    <div class="flex-1 relative rounded-lg backdrop-blur-sm overflow-hidden">
      <div id="mentor-list" class="h-full overflow-y-auto space-y-2 p-3 pr-1">
        <?php foreach ($mentors as $m): ?>
        <div class="rounded-lg bg-white/40 hover:shadow-lg transition-all duration-300 p-5 relative group">
          <div class="w-1.5 h-16 rounded-md absolute left-0 top-1/2 -translate-y-1/2 grad_primary -translate-x-1 shadow-md"></div>
          <div class="flex gap-4 items-start">
            <div class="size-16 rounded-full grad_secondary flex-shrink-0 shadow-inner"></div>
            <div class="min-w-0">
              <p class="font-semibold text-slate-800 text-sm group-hover:text-indigo-700"><?= $m[
                "name"
              ] ?></p>
              <p class="text-indigo-600 text-xs font-medium mb-1"><?= $m[
                "project"
              ] ?></p>
              <p class="text-slate-600 text-xs leading-relaxed"><?= $m[
                "note"
              ] ?></p>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <div id="scroll-hint" class="absolute bottom-0 left-0 right-0 text-center text-sm gradient_text py-1 bg-white/60 backdrop-blur-sm">
        Scroll for more mentors ↓
      </div>
    </div>
  </div>
</section>

<script>
  const container = document.getElementById('mentor-list');
  const hint = document.getElementById('scroll-hint');

  function updateScrollHint() {
    const atBottom = container.scrollTop + container.clientHeight >= container.scrollHeight - 10;
    hint.style.opacity = atBottom ? '0' : '1';
  }

  container.addEventListener('scroll', updateScrollHint);
  window.addEventListener('load', updateScrollHint);
</script>
