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

<div class="p-6">
  <h1 class="text-3xl font-bold text-center mb-6">Collaborations</h1>

  <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
    <?php foreach ($collabs as $collab): ?>
      <div class="shadow-md rounded-lg overflow-hidden flex flex-col">
        <img src="<?= $collab[
          "image"
        ] ?>" alt="Collab Image" class="w-full aspect-[16/9] object-cover">
        <div class="p-4 space-y-2">
          <h2 class="text-lg font-semibold"><?= $collab[
            "scholarship_title"
          ] ?></h2>
          <p class="text-sm text-gray-600"><?= $collab[
            "school"
          ] ?></p>
          <p class="text-gray-700"><?= $collab[
            "description"
          ] ?></p>
          <a href="<?= $collab[
            "link"
          ] ?>" class="text-blue-600 hover:underline" target="_blank">Learn More</a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<section class="p-6 space-y-8">
  <h2 class="text-3xl font-bold text-center">Learn Japanese / Study in Japan</h2>

  <!-- Sections -->
  <div class="grid md:grid-cols-3 gap-6">
    <div class="p-4 rounded-xl shadow">Japanese Schools Info</div>
    <div class="p-4 rounded-xl shadow">Scholarship Opportunities</div>
    <div class="p-4 rounded-xl shadow">Learning Japanese Resources</div>
  </div>

  <!-- Student Cards (Placeholder) -->
  <div class="grid md:grid-cols-2 gap-4">
    <div class="bg-blue-50 p-4 rounded shadow">Student A benefited</div>
    <div class="bg-blue-50 p-4 rounded shadow">Student B benefited</div>
  </div>

  <!-- Temporary Contact Form -->
  <form class="p-6 rounded-xl shadow max-w-xl mx-auto space-y-4">
    <h3 class="text-xl font-semibold">Contact Us</h3>
    <div class="flex items-center gap-6">
      <label class="flex items-center gap-2">
        <input type="checkbox" class="accent-blue-600" /> Option 1
      </label>
      <label class="flex items-center gap-2">
        <input type="checkbox" class="accent-blue-600" /> Option 2
      </label>
      <label class="flex items-center gap-2">
        <input type="checkbox" class="accent-blue-600" /> Option 3
      </label>
    </div>
    <button type="submit" class="bg-blue-800 text-white px-4 py-2 rounded">Submit</button>
  </form>
</section>
