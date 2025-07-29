<?php
$collabs = [
  [
    "title" => "Internship & Scholarships",
    "image" => "internship.jpg",
    "scholarship_title" => "AI Research Fellowship",
    "school" => "Kyoto Tech University",
    "link" => "https://kyototech.edu/scholarships",
    "description" =>
      "A funded internship focused on AI and Machine Learning for undergraduates.",
  ],
  [
    "title" => "International Collaboration",
    "image" => "exchange.jpg",
    "scholarship_title" => "Global Innovators Exchange",
    "school" => "Berlin School of Engineering",
    "link" => "https://bse.edu/collab",
    "description" =>
      "A semester abroad program combining academics and real-world projects.",
  ],
]; ?>

<div class="p-6 space-y-6">
  <h1 class="text-3xl font-bold text-center">Collaborations</h1>

  <?php foreach ($collabs as $collab): ?>
    <div class="bg-white shadow-md rounded-lg overflow-hidden flex flex-col md:flex-row gap-4 p-4">
      <img src="<?= $collab[
        "image"
      ] ?>" alt="Collab Image" class="w-full md:w-1/3 object-cover rounded">
      <div class="flex flex-col gap-2">
        <h2 class="text-xl font-semibold"><?= $collab[
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
