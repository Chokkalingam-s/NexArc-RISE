<main class="text-blue-800">
  <div class="inline-block shadow-lg rounded-full fixed top-16 right-4 z-40 backdrop-blur-sm bg-white/80">
    <div class="rounded-full p-1 shadow-inner">
      <div class="grid grid-cols-2 gap-1">
        <button class="text-white rounded-full py-2 px-4 text-sm font-medium shadow-sm bg-amber-500 transition-all duration-100" id="ongoingBtn2">Ongoing</button>
        <button class="text-gray-500 rounded-full py-2 px-4 text-sm font-medium hover:text-gray-700 transition-all duration-200" id="completedBtn2">Completed</button>
      </div>
    </div>
  </div>

  <section id="ongoingSection" class="pb-10">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php
      global $cards;
      include_once "assets/data.php";
      foreach ($cards as $index => $card): ?>
      <div class="group relative rounded-2xl overflow-hidden shadow-xl transition-transform hover:-translate-y-1 text-white cursor-pointer" onclick="openModal(<?= $index ?>, 'ongoing')">
        <div class="h-40 w-full overflow-hidden">
          <img src="<?= $card["bgImage"] ?>" alt="<?= $card[
  "title"
] ?? "Card image" ?>" class="w-full h-full object-cover" />
        </div>
        <span class="absolute top-2 right-2 px-2 py-1 text-xs font-medium rounded-full bg-amber-500 shadow z-20">
          <?= $card["year"] ?> - <?= $card["end_year"] ?>
        </span>
        <div class="p-2 space-y-1 z-10 relative bg-amber-500">
          <h2 class="head font-semibold leading-snug text-lg"><?= $card[
            "title"
          ] ?></h2>
          <p><span class="font-medium">Description:</span> <?= $card[
            "description"
          ] ?></p>
          <p><span class="font-medium">Collaborator:</span> <?= $card[
            "collaborator"
          ] ?></p>
          <?php if (!empty($card["participant"])): ?>
            <p><span class="font-medium">Participant:</span> <?= $card[
              "participant"
            ] ?></p>
          <?php endif; ?>
        </div>
      </div>
      <?php endforeach;
      ?>
    </div>
  </section>

  <section id="completedSection" class="hidden p-4 md:p-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php
      global $completedCards;
      foreach ($completedCards as $index => $card): ?>
      <div class="group relative rounded-2xl overflow-hidden shadow-xl transition-transform hover:-translate-y-1 text-white cursor-pointer" onclick="openModal(<?= $index ?>, 'completed')">
        <div class="h-40 w-full overflow-hidden">
          <img src="<?= $card["bgImage"] ?>" alt="<?= $card[
  "title"
] ?? "Card image" ?>" class="w-full h-full object-cover" />
        </div>
        <span class="absolute top-2 right-2 px-2 py-1 text-xs font-medium rounded-full grad shadow z-20">
          <?= $card["year"] ?> - <?= $card["end_year"] ?>
        </span>
        <div class="p-2 space-y-1 z-10 relative grad">
          <h2 class="head font-semibold leading-snug text-lg"><?= $card[
            "title"
          ] ?></h2>
          <p><span class="font-medium">Collaborator:</span> <?= $card[
            "collaborator"
          ] ?></p>
          <?php if (!empty($card["participant"])): ?>
            <p><span class="font-medium">Participant:</span> <?= $card[
              "participant"
            ] ?></p>
          <?php endif; ?>
        </div>
      </div>
      <?php endforeach;
      ?>
    </div>
  </section>

  <div id="modal" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center z-50">
    <div class="bg-white rounded-xl shadow-lg max-w-md w-full p-6 relative">
      <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-600 hover:text-black">&times;</button>
        <img src="<?= $card[
          "bgImage"
        ] ?>" class="w-full h-48 object-cover rounded-t-lg" />
      <div id="modalContent">
      </div>
    </div>
  </div>
</main>

<script>
const ongoingBtn = document.getElementById('ongoingBtn2');
const completedBtn = document.getElementById('completedBtn2');
const ongoingSection = document.getElementById('ongoingSection');
const completedSection = document.getElementById('completedSection');
const modal = document.getElementById('modal');
const modalContent = document.getElementById('modalContent');

const ongoingData = <?php echo json_encode($cards); ?>;
const completedData = <?php echo json_encode(
  $completedCards,
); ?>;

const ongoingActiveClasses = 'bg-amber-500 text-white rounded-full py-2 px-4 text-sm font-medium shadow-sm transition-all duration-200';
const completedActiveClasses = 'bg-blue-800 text-white rounded-full py-2 px-4 text-sm font-medium shadow-sm transition-all duration-200';
const inactiveClasses = 'text-gray-500 rounded-full py-2 px-4 text-sm font-medium hover:text-gray-700 transition-all duration-200';

const setOngoingActive = () => ongoingBtn.className = ongoingActiveClasses;
const setCompletedActive = () => completedBtn.className = completedActiveClasses;
const setInactive = (btn) => btn.className = inactiveClasses;
const showSection = (section) => section?.classList.remove('hidden');
const hideSection = (section) => section?.classList.add('hidden');

ongoingBtn.addEventListener('click', () => {
  setOngoingActive();
  setInactive(completedBtn);
  showSection(ongoingSection);
  hideSection(completedSection);
});

completedBtn.addEventListener('click', () => {
  setCompletedActive();
  setInactive(ongoingBtn);
  showSection(completedSection);
  hideSection(ongoingSection);
});

function openModal(index, type) {
  const data = type === 'ongoing' ? ongoingData : completedData;
  const card = data[index];
  modalContent.innerHTML = `
    <h2 class="text-xl font-bold mb-2">${card.title}</h2>
    <p><strong>Year:</strong> ${card.year} - ${card.end_year}</p>
    <p><strong>Description:</strong> ${card.description || ''}</p>
    <p><strong>Collaborator:</strong> ${card.collaborator || ''}</p>
    <p><strong>Participant:</strong> ${card.participant || ''}</p>
    ${type === 'completed' ? `
      <p><strong>Paper Title:</strong> ${card.paper_title || ''}</p>
      <p><strong>Author:</strong> ${card.author || ''}</p>
      <p><strong>Vol/Pages:</strong> ${card.vol_pages || ''}</p>
      <p><strong>Journal:</strong> ${card.journal || ''}</p>
      <p><strong>Link:</strong> <a href="${card.link}" target="_blank" class="text-blue-600 underline">${card.link}</a></p>
    ` : ''}
  `;
  modal.classList.remove('hidden');
  modal.classList.add('flex');
}

function closeModal() {
  modal.classList.remove('flex');
  modal.classList.add('hidden');
}
</script>
