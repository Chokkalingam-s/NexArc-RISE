<main class="pt-10 md:pt-0">
  <!-- Toggle Projects -->
  <div class="fixed top-12 md:top-14 md:right-2 right-0 z-20">
    <div class="backdrop-blur-md rounded-full p-1 shadow-lg">
      <div class="flex bg-white/60 rounded-full p-1">
        <button class="bg-amber-500 text-white rounded-full py-2.5 px-5 text-sm font-semibold shadow-md transition-all duration-300 hover:bg-amber-600" id="ongoingBtn">
          Ongoing
        </button>
        <button class="text-slate-600 rounded-full py-2.5 px-5 text-sm font-medium hover:text-slate-800 transition-all duration-300" id="completedBtn">
          Completed
        </button>
      </div>
    </div>
  </div>
  <!-- Ongoing Projects Section -->
  <section id="ongoingSection" class="px-2">
    <div class="mb-8">
      <h2 class="ongoing head">Ongoing Projects</h2>
      <h3 class="text-slate-600 font-medium">Current research and collaboration initiatives</h3>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
      <?php
      global $cards;
      include_once "assets/data.php";
      foreach ($cards as $index => $card): ?>
        <div
          class="group bg-white/40 rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 cursor-pointer flex flex-col"
          onclick="openModal(<?= $index ?>, 'ongoing')">

          <!-- Image Header -->
          <div class="relative h-40 overflow-hidden">
            <img src="<?= $card["bgImage"] ?>" alt="<?= $card[
  "title"
] ?? "Project image" ?>"
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
            <span class="absolute top-2 right-2 bg-amber-500 text-white px-3 py-1 text-xs font-semibold rounded-full shadow-lg">
              <?= $card["year"] ?> - <?= $card["end_year"] ?>
            </span>
          </div>

          <!-- Content -->
          <div class="flex flex-col justify-between flex-1 p-4">
            <div>
              <h3 class="text-xl font-bold text-slate-800 mb-2 group-hover:text-amber-500 transition-colors">
                <?= $card["title"] ?>
              </h3>

              <div class="space-y-1 text-sm">
                <p class="text-slate-700 line-clamp-2">
                  <span class="font-semibold text-slate-800">Description:</span>
                  <?= $card["description"] ?>
                </p>

                <p class="text-slate-700">
                  <span class="font-semibold text-slate-800">Collaborator:</span>
                  <span class="text-amber-500"><?= $card[
                    "collaborator"
                  ] ?></span>
                </p>

                <?php if (!empty($card["participant"])): ?>
                  <p class="text-slate-700">
                    <span class="font-semibold text-slate-800">Participant:</span>
                    <?= $card["participant"] ?>
                  </p>
                <?php endif; ?>
              </div>
            </div>

            <!-- View More Button -->
            <div class="mt-4 pt-2 border-t border-amber-500 w-full flex items-center justify-end">
              <button class="text-amber-500 font-medium text-sm group-hover:text-amber-500 transition-colors">
                View Details →
              </button>
            </div>
          </div>
        </div>
      <?php endforeach;
      ?>
    </div>
  </section>

  <!-- Completed Projects Section -->
  <section id="completedSection" class="mx-auto px-6 hidden">
    <div class="mb-8">
      <h1 class="text-2xl font-medium gradient_text">Completed Projects</h1>
      <p class="text-slate-600">Published research and finished collaborations</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
      <?php
      global $completedCards;
      foreach ($completedCards as $index => $card): ?>
      <div class="group bg-white/40 rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2 cursor-pointer" onclick="openModal(<?= $index ?>, 'completed')">

        <!-- Image Header -->
        <div class="relative h-48 overflow-hidden">
          <img src="<?= $card["bgImage"] ?>" alt="<?= $card[
  "title"
] ?? "Project image" ?>"
               class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
          <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
          <span class="absolute top-4 right-4 bg-gradient-to-r from-blue-600 to-blue-700 text-white px-3 py-1 text-xs font-semibold rounded-full shadow-lg">
            <?= $card["year"] ?> - <?= $card["end_year"] ?>
          </span>
        </div>

        <!-- Content -->
        <div class="p-6">
          <h3 class="text-xl font-bold text-slate-800 mb-3 group-hover:text-blue-600 transition-colors">
            <?= $card["title"] ?>
          </h3>

          <div class="space-y-2 text-sm">
            <p class="text-slate-700">
              <span class="font-semibold text-slate-800">Collaborator:</span>
              <span class="text-blue-600"><?= $card[
                "collaborator"
              ] ?></span>
            </p>

            <?php if (!empty($card["participant"])): ?>
              <p class="text-slate-700">
                <span class="font-semibold text-slate-800">Participant:</span>
                <?= $card["participant"] ?>
              </p>
            <?php endif; ?>
          </div>

          <!-- Publication Status -->
          <div class="mt-4 pt-4 border-t border-slate-100">
            <div class="flex items-center justify-between">
              <span class="gradient_text font-medium text-sm">
                ✓ Published
              </span>
              <span class="text-blue-600 font-medium text-sm group-hover:text-blue-700 transition-colors">
                View Details →
              </span>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach;
      ?>
    </div>
  </section>

  <!-- Modal -->
  <div id="modal" class="fixed inset-0 bg-black/60 backdrop-blur-sm hidden items-center justify-center z-50 p-4">
    <div class="bg-white/80 rounded-2xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-hidden">

      <!-- Modal Header -->
      <div class="relative">
        <div id="modalImage" class="h-64 bg-gradient-to-br from-slate-200 to-slate-300"></div>
        <button onclick="closeModal()" class="absolute top-4 right-4 bg-white/90 hover:bg-white text-slate-600 hover:text-slate-800 w-10 h-10 rounded-full flex items-center justify-center transition-all shadow-lg">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>

      <!-- Modal Content -->
      <div class="p-8 overflow-y-auto max-h-96">
        <div id="modalContent" class="space-y-4"></div>
      </div>
    </div>
  </div>
</main>

<script>
  const ongoingBtn = document.getElementById('ongoingBtn');
  const completedBtn = document.getElementById('completedBtn');
  const ongoingSection = document.getElementById('ongoingSection');
  const completedSection = document.getElementById('completedSection');
  const modal = document.getElementById('modal');
  const modalContent = document.getElementById('modalContent');
  const modalImage = document.getElementById('modalImage');

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

  function openModal(index, type) {
    const data = type === 'ongoing' ? ongoingData : completedData;
    const card = data[index];
    const isCompleted = type === 'completed';

    // Set modal image
    modalImage.style.backgroundImage = `url('${card.bgImage}')`;
    modalImage.style.backgroundSize = 'cover';
    modalImage.style.backgroundPosition = 'center';

    modalContent.innerHTML = `
      <div class="mb-6">
        <h2 class="text-2xl font-bold text-slate-800 mb-2">${card.title}</h2>
        <div class="flex items-center gap-2">
          <span class="px-3 py-1 text-xs font-semibold rounded-full ${isCompleted ? 'bg-blue-200 text-blue-700' : 'bg-amber-100 text-amber-500'}">
            ${card.year} - ${card.end_year}
          </span>
          ${isCompleted ? '<span class="px-3 py-1 text-xs font-semibold rounded-full bg-blue-200 text-blue-700">Published</span>' : '<span class="px-3 py-1 text-xs font-semibold rounded-full bg-amber-200 text-amber-600">In Progress</span>'}
        </div>
      </div>

      <div class="space-y-4">
        ${card.description ? `
          <div>
            <h4 class="font-semibold text-slate-800 mb-1">Description</h4>
            <p class="text-slate-600">${card.description}</p>
          </div>
        ` : ''}

        <div>
          <h4 class="font-semibold text-slate-800 mb-1">Collaborator</h4>
          <p class="text-${isCompleted ? 'blue' : 'amber'}-600 font-medium">${card.collaborator}</p>
        </div>

        ${card.participant ? `
          <div>
            <h4 class="font-semibold text-slate-800 mb-1">Participant</h4>
            <p class="text-slate-600">${card.participant}</p>
          </div>
        ` : ''}

        ${isCompleted ? `
          <div class="border-t border-slate-200 pt-4 mt-6">
            <h4 class="font-semibold text-slate-800 mb-3">Publication Details</h4>
            <div class="space-y-2 text-sm">
              ${card.paper_title ? `<p><span class="font-medium text-slate-700">Paper:</span> ${card.paper_title}</p>` : ''}
              ${card.author ? `<p><span class="font-medium text-slate-700">Author:</span> ${card.author}</p>` : ''}
              ${card.journal ? `<p><span class="font-medium text-slate-700">Journal:</span> ${card.journal}</p>` : ''}
              ${card.vol_pages ? `<p><span class="font-medium text-slate-700">Volume/Pages:</span> ${card.vol_pages}</p>` : ''}
              ${card.link ? `
                <p class="pt-2">
                  <a href="${card.link}" target="_blank" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-700 font-medium transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                    </svg>
                    View Publication
                  </a>
                </p>
              ` : ''}
            </div>
          </div>
        ` : ''}
      </div>
    `;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.style.overflow = 'hidden';
  }

  function closeModal() {
    modal.classList.remove('flex');
    modal.classList.add('hidden');
    document.body.style.overflow = 'auto';
  }

  modal.addEventListener('click', (e) => {
    if (e.target === modal)
      closeModal()
  });

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && !modal.classList.contains('hidden'))
      closeModal()
  });
</script>
