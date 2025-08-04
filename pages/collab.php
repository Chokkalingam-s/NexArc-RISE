<?php
global $mentors, $scholarships, $schools;
include_once __DIR__ . "/../assets/collab_data.php";
?>

<section class="grid grid-cols-[68%_2%_30%] h-screen overflow-hidden">
  <!-- Left Scrollable Section -->
  <div class="overflow-y-auto space-y-8 h-full px-4 py-6">

    <!-- Scholarships -->
    <div>
      <h2 class="text-2xl font-bold text-slate-800 mb-6">Scholarships</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <?php foreach ($scholarships as $item): ?>
          <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow overflow-hidden">
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
      <h2 class="text-2xl font-bold text-slate-800 mb-6">Schools</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <?php foreach ($schools as $school): ?>
          <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow overflow-hidden">
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
              ] ?>" class="text-indigo-600 hover:text-indigo-800 font-medium text-sm transition-colors" target="_blank">
                Visit Site →
              </a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Testimonials -->
    <div>
      <h2 class="text-2xl font-bold text-slate-800 mb-6">Student Success Stories</h2>
      <div class="grid sm:grid-cols-2 gap-6">
        <div class="flex items-center gap-4 p-6 bg-white rounded-xl shadow-lg">
          <div class="w-16 h-16 rounded-full bg-gradient-to-r from-indigo-500 to-blue-600"></div>
          <div>
            <p class="font-semibold text-slate-800 text-lg">Student A</p>
            <p class="text-slate-600">Benefited from Kyoto Tech Program</p>
          </div>
        </div>
        <div class="flex items-center gap-4 p-6 bg-white rounded-xl shadow-lg">
          <div class="w-16 h-16 rounded-full bg-gradient-to-r from-purple-500 to-indigo-600"></div>
          <div>
            <p class="font-semibold text-slate-800 text-lg">Student B</p>
            <p class="text-slate-600">Joined Exchange at Berlin Engineering</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Contact Form -->
    <div>
      <h2 class="text-2xl font-bold text-slate-800 mb-6">Contact Us</h2>
      <div class="bg-white rounded-xl shadow-lg p-8 max-w-2xl mx-auto">

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
  <div class="grad w-1 rounded-full"></div>

  <!-- Right Mentors -->
  <div class="p-4 h-screen sticky top-0 flex flex-col">
    <h3 class="text-xl font-bold text-slate-800 mb-4">Project Mentors</h3>

    <div class="flex-1 overflow-hidden relative">
      <div id="mentor-list" class="overflow-y-auto space-y-4 pr-2 h-full pb-8">
        <?php foreach ($mentors as $m): ?>
          <div class="bg-white rounded-lg border border-slate-200 hover:border-indigo-300 hover:shadow-md transition-all p-4">
            <div class="flex gap-3">
              <div class="w-12 h-12 rounded-full bg-gradient-to-r from-indigo-500 to-blue-600 flex-shrink-0"></div>
              <div class="min-w-0">
                <p class="font-semibold text-slate-800 text-sm mb-1"><?= $m[
                  "name"
                ] ?></p>
                <p class="text-indigo-600 text-xs font-medium mb-2"><?= $m[
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

      <div id="scroll-hint" class="absolute bottom-2 left-0 right-4 text-center text-xs text-slate-400 bg-white/80 py-1 rounded">
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
