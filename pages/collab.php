<?php
$collabs = [
  [
    "title" => "Internship & Scholarships",
    "image" => "https://placehold.co/200",
    "scholarship_title" => "AI Research Fellowship",
    "school" => "Kyoto Tech University",
    "link" => "https://kyototech.edu/scholarships",
    "description" =>
      "A funded internship focused on AI and Machine Learning for undergraduates.",
  ],
  [
    "title" => "International Collaboration",
    "image" => "https://placehold.co/200",
    "scholarship_title" => "Global Innovators Exchange",
    "school" => "Berlin School of Engineering",
    "link" => "https://bse.edu/collab",
    "description" =>
      "A semester abroad program combining academics and real-world projects.",
  ],
]; ?>

<section class="grid grid-cols-[66%_4%_30%] h-screen overflow-hidden">
  <!-- Left Scrollable Section -->
  <div class="overflow-y-auto p-6 space-y-10 h-full">
    <!-- Scholarships Section -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      <?php foreach ($collabs as $collab): ?>
        <div class="rounded-xl shadow overflow-hidden bg-white flex flex-col">
          <img src="<?= $collab[
            "image"
          ] ?>" alt="Collab Image" class="w-full aspect-[16/9] object-cover">
          <div class="bg-blue-50 p-4 space-y-1">
            <h2 class="text-base font-bold text-blue-900"><?= $collab[
              "scholarship_title"
            ] ?></h2>
            <p class="text-sm text-gray-700"><?= $collab[
              "school"
            ] ?></p>
            <p class="text-sm text-gray-600 line-clamp-3"><?= $collab[
              "description"
            ] ?></p>
            <a href="<?= $collab[
              "link"
            ] ?>" class="text-sm text-blue-700 hover:underline" target="_blank">Learn More</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Info Cards -->
    <div class="grid md:grid-cols-3 gap-6">
      <div class="p-6 rounded-xl shadow bg-white text-center">Japanese Schools Info</div>
      <div class="p-6 rounded-xl shadow bg-white text-center">Scholarship Opportunities</div>
      <div class="p-6 rounded-xl shadow bg-white text-center">Learning Japanese Resources</div>
    </div>

    <!-- Testimonials -->
    <div class="grid sm:grid-cols-2 gap-6">
      <div class="flex items-center gap-4 p-4 bg-blue-50 rounded-lg shadow">
        <div class="w-16 h-16 rounded-full bg-blue-200"></div>
        <div>
          <p class="font-semibold text-blue-900">Student A</p>
          <p class="text-sm text-gray-600">Benefited from Kyoto Tech Program</p>
        </div>
      </div>
      <div class="flex items-center gap-4 p-4 bg-blue-50 rounded-lg shadow">
        <div class="w-16 h-16 rounded-full bg-blue-200"></div>
        <div>
          <p class="font-semibold text-blue-900">Student B</p>
          <p class="text-sm text-gray-600">Joined Exchange at Berlin Engineering</p>
        </div>
      </div>
    </div>

    <!-- Contact Form -->
    <form class="p-6 rounded-xl shadow max-w-2xl mx-auto space-y-4 bg-white">
      <h3 class="text-xl font-semibold">Contact Us</h3>
      <div class="flex gap-6 overflow-x-auto whitespace-nowrap py-2">
        <label class="inline-flex items-center gap-2 shrink-0">
          <input type="checkbox" class="accent-blue-600" />
          <span>Japanese Language</span>
        </label>
        <label class="inline-flex items-center gap-2 shrink-0">
          <input type="checkbox" class="accent-blue-600" />
          <span>Scholarship And Schools</span>
        </label>
        <label class="inline-flex items-center gap-2 shrink-0">
          <input type="checkbox" class="accent-blue-600" />
          <span>Higher studies in Japanese</span>
        </label>
      </div>
      <?php include_once __DIR__ . "/form.php"; ?>
    </form>
  </div>

  <!-- Divider -->
  <div class="h-full w-1 grad rounded-full"></div>

  <!-- Right Mentors - Fixed Title, Scrollable List -->
  <?php
  global $mentors;
  include_once __DIR__ . "/../collab_data.php";
  ?>
  <div class="p-4 h-[80vh] sticky top-10 flex flex-col bg-white rounded-xl shadow-md">
    <h3 class="text-lg font-semibold text-blue-800 mb-4">Project Mentors</h3>
    <div class="relative flex-1 overflow-hidden">
      <div id="scroll-hint" class="absolute bottom-1 left-0 w-full text-center text-xs text-gray-400 animate-pulse">
        Scroll to see more ↓
      </div>
      <div id="mentor-list" class="overflow-y-auto space-y-4 pr-2 h-full pb-8">
        <?php foreach ($mentors as $m): ?>
          <div class="flex gap-3 p-3 rounded-lg border bg-white">
            <div class="w-10 h-10 rounded-full bg-blue-100"></div>
            <div>
              <p class="font-medium text-blue-900"><?= $m[
                "name"
              ] ?> – <?= $m["project"] ?></p>
              <p class="text-sm text-gray-600"><?= $m[
                "note"
              ] ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <script>
    const container = document.getElementById('mentor-list');
    const hint = document.getElementById('scroll-hint');

    const updateHint = () => {
      const atBottom = container.scrollTop + container.clientHeight >= container.scrollHeight - 1;
      hint.textContent = atBottom ? 'End of list' : 'Scroll to see more ↓';
    };

    container.addEventListener('scroll', updateHint);
    window.addEventListener('load', updateHint);
  </script>
</section>
