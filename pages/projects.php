<?php
// Classname shortcuts
$btnBase =
  "rounded-full py-2.5 px-5 text-sm transition-all duration-300";
$btnAmber = "$btnBase bg-amber-500 text-white font-semibold shadow-md hover:bg-amber-600";
$btnSlate = "$btnBase text-slate-600 font-medium hover:text-slate-800";

$cardBase =
  "group bg-white/40 rounded-2xl overflow-hidden shadow-lg transition-all duration-300 cursor-pointer";
$cardHover = "hover:shadow-xl hover:-translate-y-1";
$cardImage =
  "w-full h-full object-cover group-hover:scale-105 transition-transform duration-300";

// Card rendering function
function renderCard($card, $index, $type = "ongoing")
{
  // Badge styling
  $badgeClass =
    $type === "ongoing"
      ? "bg-amber-500"
      : "bg-gradient-to-r from-blue-600 to-blue-700";

  // Text color logic
  $collabColor =
    $type === "ongoing" ? "text-amber-500" : "text-blue-600";
  $hoverColor =
    $type === "ongoing"
      ? "group-hover:text-amber-500"
      : "group-hover:text-blue-600";

  // Common fields
  $title = $card["title"] ?? "Untitled";
  $bgImage = $card["bgImage"] ?? "";
  $collaborator = $card["collaborator"] ?? "Unknown";
  $year = $card["year"] ?? "";
  $endYear = $card["end_year"] ?? "";

  // Ongoing-specific
  $description = $card["description"] ?? "";
  $participant = $card["participant"] ?? "";

  // Completed-specific
  $summary = $card["summary"] ?? "";
  $participant = $card["participant"] ?? "";
  $paperTitle = $card["paper_title"] ?? "";
  $author = $card["author"] ?? "";
  $details = $card["details"] ?? "";
  $journal = $card["journal"] ?? "";
  $link = $card["link"] ?? "";
  $journalOrConferenceLabel = $card["journal_or_conference"] ?? "";

  return "
  <div class='group bg-white/40 rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 hover:-translate-y-1 cursor-pointer' onclick='openModal($index, \"$type\")'>
    <div class='relative h-32 overflow-hidden'>
      <img src='{$bgImage}' alt='{$title}' class='w-full h-full object-cover group-hover:scale-105 transition-transform duration-300' />
      <div class='absolute inset-0 bg-gradient-to-t from-black/20 to-transparent'></div>
      <span class='absolute top-2 right-2 {$badgeClass} text-white px-2 py-0.5 text-xs font-semibold rounded-full shadow'>
        {$year}–{$endYear}
      </span>
    </div>
    <div class='p-3 space-y-1 text-sm'>
      <h3 class='text-base font-semibold text-slate-800 {$hoverColor} transition-colors'>{$title}</h3>
      <p class='text-slate-700'><span class='font-semibold text-slate-800'>Collaborator:</span> <span class='{$collabColor}'>{$collaborator}</span></p>
      " .
    ($type === "ongoing"
      ? "<p class='text-slate-700'><span class='font-semibold text-slate-800'>Description:</span> {$description}</p>" .
        (!empty($participant)
          ? "<p class='text-slate-700'><span class='font-semibold text-slate-800'>Participant:</span> {$participant}</p>"
          : "")
      : "<p class='text-slate-700'><span class='font-semibold text-slate-800'>Summary:</span> {$summary}</p>" .
        (!empty($participant)
          ? "<p class='text-slate-700'><span class='font-semibold text-slate-800'>Participant's:</span> {$participant}</p>"
          : "") .
        (!empty($paperTitle)
          ? "<p class='text-slate-700'><span class='font-semibold text-slate-800'>Paper:</span> <a href='{$link}' target='_blank' class='text-blue-600 underline'>{$paperTitle}</a></p>"
          : "") .
        (!empty($author)
          ? "<p class='text-slate-700'><span class='font-semibold text-slate-800'>Author(s):</span> {$author}</p>"
          : "") .
        (!empty($journal)
          ? "<p class='text-slate-700'><span class='font-semibold text-slate-800'>{$journalOrConferenceLabel}: </span> {$journal}</p>"
          : "")) .
        (!empty($details)
          ? "<p class='text-slate-700'><span class='font-semibold text-slate-800'>Details:</span> {$details}</p>"
          : "") .
          (!empty($link)
          ? "<p class='text-slate-700'><span class='font-semibold text-slate-800'>Paper Link:</span> <a href='{$link}' target='_blank' class='text-blue-600 underline'>{$link}</a></p>"
          : "") .

          
    "
    </div>
  </div>";
}

// Mentor rendering function
function renderMentor($m)
{
  return "
      <div class='rounded-lg bg-white/40 hover:shadow-lg transition-all duration-300 p-4 relative group'>
        <div class='w-1.5 h-16 rounded-md absolute left-0 top-1/2 -translate-y-1/2 grad_primary -translate-x-1'></div>
        <div class='flex gap-4 items-start'>
          <div class='size-16 rounded-full grad_secondary flex-shrink-0 shadow-inner'></div>
          <div class='min-w-0'>
            <p class='font-semibold text-slate-800 text-sm group-hover:text-indigo-700'>{$m["name"]}</p>
            <p class='text-indigo-600 text-xs font-medium mb-1'>{$m["project"]}</p>
            <p class='text-slate-600 text-xs participanting-relaxed'>{$m["note"]}</p>
          </div>
        </div>
      </div>";
}
?>

<main class="pt-10 md:pt-0 grid grid-cols-[68%_2%_30%] h-screen overflow-hidden">
  <div class="relative">
    <!-- Toggle Projects -->

    <div class="absolute w-fit right-2 top-14 z-20">
      <div class="backdrop-blur-md rounded-full p-1 shadow-lg">
        <div class="flex bg-white/60 rounded-full p-1">
          <button class="<?= $btnAmber ?>" id="ongoingBtn">Ongoing</button>
          <button class="<?= $btnSlate ?>" id="completedBtn">Completed</button>
        </div>
      </div>
    </div>

    <!-- Ongoing Projects Section -->
    <section id="ongoingSection">
      <div class="mb-2">
        <h2 class="ongoing head">Ongoing Projects</h2>
        <h3 class="text-slate-600 font-medium">Current research and collaboration initiatives</h3>
      </div>

      <!-- Scrollable container -->
      <div class="max-h-[80vh] overflow-y-auto pr-2">
 <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<?php
require_once __DIR__ . '/../config/db.php';

// Fetch ongoing projects
$cards = [];
$stmt = $conn->prepare("SELECT * FROM Project WHERE status = 'ongoing' ORDER BY year_of_start DESC");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $row) {
    $image = $row["image"] ?? "assets/default.jpg";
    $imageURL = '../nexarc-rise/' . ltrim($image, '/');

    $card = [
        "title"        => $row["title"],
        "bgImage"      => $imageURL,
        "collaborator" => $row["colloborator"] ?? "",
        "year"         => $row["year_of_start"],
        "end_year"     => " In Progress",
        "description"  => $row["description"],
        "participant"  => $row["participant"],
    ];
    $cards[] = $card;

    // ✅ Render each ongoing project card
    echo renderCard($card, count($cards) - 1, "ongoing");
}

// Fetch completed projects
$completedCards = [];
$stmt = $conn->prepare("SELECT * FROM Project WHERE status = 'completed' ORDER BY year_of_end DESC");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC); // ✅ Works in PDO
foreach ($result as $row) {
  $image = $row["image"] ?? "assets/default.jpg";
  $imageURL = '../nexarc-rise/' . ltrim($image, '/'); // web URL for use in HTML
      $journalOrConferenceLabel = '';
    if (isset($row["typeOfPublish"])) {
        if (strtolower($row["typeOfPublish"]) === "journal") {
            $journalOrConferenceLabel = "Journal";
        } elseif (strtolower($row["typeOfPublish"]) === "conference") {
            $journalOrConferenceLabel = "Conference";
        }
    }
    $completedCards[] = [
        "title"        => $row["title"],
        "bgImage"      => $imageURL,
        "collaborator" => $row["colloborator"] ?? "",
        "year"         => $row["year_of_start"],
        "end_year"     => $row["year_of_end"],
        "summary"      => $row["description"], // mapping summary to details
        "participant"  => $row["participant"], // mapping participant if needed
        "paper_title"  => $row["paper_title"],
        "author"       => $row["authors"],
        "details"      => $row["details"] ?? "", // assuming details is the volume or other info
        "journal"      => $row["nameOfPublish"],
        "link"         => $row["link"],
        "journal_or_conference" => $journalOrConferenceLabel,
    ];
}

// Fetch mentors (still from collab_data.php for now)
include_once __DIR__ . "/../assets/collab_data.php";
?>

        </div>
      </div>
    </section>

    <!-- Completed Projects Section -->
    <section id="completedSection" class="mx-auto px-6 hidden">
      <div class="mb-8">
        <h1 class="text-2xl font-medium gradient_text">Completed Projects</h1>
        <p class="text-slate-600">Published research and finished collaborations</p>
      </div>
      <div class="max-h-[80vh] overflow-y-auto pr-2">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <?php
        global $completedCards;
        foreach ($completedCards as $index => $card) {
          echo renderCard($card, $index, "completed");
        }
        ?>
      </div>
      </div>
    </section>
  </div>

  <div class="grad_primary w-1 rounded-full"></div>

  <!-- Right Mentors -->
  <div class="p-2 w-80 flex flex-col sticky top-10 self-start z-20 h-[calc(100vh-50px)]">
    <?php
    global $mentors;
    include_once __DIR__ . "/../assets/collab_data.php";
    ?>
    <h2 class="gradient_text">Project Mentors</h2>
    <div class="flex-1 relative rounded-lg overflow-hidden">
      <div id="mentor-list" class="h-full overflow-y-auto space-y-2 p-2">
        <?php foreach ($mentors as $m) {
          echo renderMentor($m);
        } ?>
      </div>
      <div id="scroll-hint" class="absolute bottom-0 w-full text-center text-sm py-1 bg-white/60 backdrop-blur-sm">
        Scroll for more mentors ↓
      </div>
    </div>
  </div>
</main>

<script>
  const ongoingBtn = document.getElementById('ongoingBtn');
  const completedBtn = document.getElementById('completedBtn');
  const ongoingSection = document.getElementById('ongoingSection');
  const completedSection = document.getElementById('completedSection');

  const ongoingData = <?php echo json_encode($cards); ?>;
  const completedData = <?php echo json_encode(
    $completedCards,
  ); ?>;

  // Button styling classes
  const ongoingActive = 'bg-amber-500 text-white rounded-full py-2.5 px-5 text-sm font-semibold shadow-md transition-all duration-300 hover:bg-amber-600';
  const completedActive = 'bg-blue-600 text-white rounded-full py-2.5 px-5 text-sm font-semibold shadow-md transition-all duration-300 hover:bg-blue-700';
  const inactive = 'text-slate-600 rounded-full py-2.5 px-5 text-sm font-medium hover:text-slate-800 transition-all duration-300';

  function switchToOngoing() {
    ongoingBtn.className = ongoingActive;
    completedBtn.className = inactive;
    ongoingSection.classList.remove('hidden');
    completedSection.classList.add('hidden');
  }

  function switchToCompleted() {
    completedBtn.className = completedActive;
    ongoingBtn.className = inactive;
    completedSection.classList.remove('hidden');
    ongoingSection.classList.add('hidden');
  }

  ongoingBtn.addEventListener('click', switchToOngoing);
  completedBtn.addEventListener('click', switchToCompleted);
</script>
