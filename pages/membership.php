<div class="max-w-6xl mx-auto my-10 grid grid-cols-1 md:grid-cols-3 gap-10 items-start">
  <!-- Left Panel -->
  <div class="flex items-center justify-between w-full max-w-xl mx-auto mb-8 flex-col">
    <h2 class="text-2xl sm:text-3xl font-bold text-center mb-8 text-indigo-900 relative w-fit mx-auto">
      Become a Member
      <span class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-14 h-1 bg-indigo-600 rounded-full"></span>
    </h2>

    <div class="flex items-center w-full justify-center">
      <!-- Step 1 -->
      <div class="step-circle text-center">
        <div class="w-10 h-10 rounded-full flex items-center justify-center text-white bg-gradient-to-r from-blue-500 to-blue-800 shadow-md">1</div>
        <p class="text-sm mt-2 text-slate-700 font-medium">Info</p>
      </div>

      <div class="h-0.5 flex-1 bg-slate-300 mx-2"></div>

      <!-- Step 2 -->
      <div class="step-circle text-center">
        <div class="w-10 h-10 rounded-full flex items-center justify-center text-white bg-slate-300 shadow-md">2</div>
        <p class="text-sm mt-2 text-slate-700 font-medium">Education</p>
      </div>

      <div class="h-0.5 flex-1 bg-slate-300 mx-2"></div>

      <!-- Step 3 -->
      <div class="step-circle text-center">
        <div class="w-10 h-10 rounded-full flex items-center justify-center text-white bg-slate-300 shadow-md">3</div>
        <p class="text-sm mt-2 text-slate-700 font-medium">Contact</p>
      </div>

      <div class="h-0.5 flex-1 bg-slate-300 mx-2"></div>

      <!-- Step 4 -->
      <div class="step-circle text-center">
        <div class="w-10 h-10 rounded-full flex items-center justify-center text-white bg-slate-300 shadow-md">4</div>
        <p class="text-sm mt-2 text-slate-700 font-medium">Finish</p>
      </div>
    </div>
  </div>

  <!-- Right Panel -->
  <div class="md:col-span-2">
    <section>
      <div id="form-step-wrapper" class="max-w-xl mx-auto min-h-[70vh] my-10 p-8 rounded-3xl shadow-2xl relative overflow-hidden flex items-center justify-center flex-col">
        <!-- Progress Bar -->
        <div class="w-full h-2 rounded-full bg-blue-100 overflow-hidden absolute bottom-0 left-0">
          <div class="progress-bar h-full bg-gradient-to-r from-blue-500 to-blue-800 transition-all duration-500 rounded-full" style="width: 0%;"></div>
        </div>

        <form id="memberForm" class="space-y-12 w-full">
          <!-- Step 1 -->
          <div class="form-step" data-step="0">
            <div class="grid gap-6">
              <label class="block">
                <span class="block text-sm font-semibold text-slate-800 mb-1">👤 Full Name</span>
                <input type="text" name="full_name" required placeholder="Jane Doe" class="w-full px-4 py-2 border border-slate-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none" />
              </label>
              <label class="block">
                <span class="block text-sm font-semibold text-slate-800 mb-1">🎂 Date of Birth</span>
                <input type="date" name="dob" required class="w-full px-4 py-2 border border-slate-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none" />
              </label>
            </div>
            <div class="w-24 mt-6">
              <button type="button" class="bg-gradient-to-r from-blue-500 to-blue-800 text-white px-6 py-2 rounded-full shadow-lg hover:scale-105 transition">Next</button>
            </div>
          </div>

          <!-- Step 2 -->
          <div class="form-step hidden" data-step="1">
            <div class="grid md:grid-cols-2 gap-6">
              <label>
                <span class="block text-sm font-semibold text-slate-800 mb-1">🎓 Degree</span>
                <select name="degree" required class="w-full px-4 py-2 border border-slate-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                  <option disabled selected>Select degree</option>
                  <option>Bachelor's</option>
                  <option>Master's</option>
                  <option>PhD</option>
                  <option>Diploma</option>
                  <option>Other</option>
                </select>
              </label>
              <label>
                <span class="block text-sm font-semibold text-slate-800 mb-1">🌍 Country</span>
                <input type="text" name="country" required placeholder="India" class="w-full px-4 py-2 border border-slate-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none" />
              </label>
            </div>

            <fieldset class="mt-8">
              <legend class="text-sm font-semibold text-slate-800 mb-3">⚧ Sex</legend>
              <div class="flex gap-6">
                <label class="inline-flex items-center gap-2">
                  <input type="radio" name="sex" value="Male" required class="accent-indigo-600"> Male
                </label>
                <label class="inline-flex items-center gap-2">
                  <input type="radio" name="sex" value="Female" class="accent-indigo-600"> Female
                </label>
                <label class="inline-flex items-center gap-2">
                  <input type="radio" name="sex" value="Other" class="accent-indigo-600"> Other
                </label>
              </div>
            </fieldset>

            <div class="flex justify-between mt-6">
              <button type="button" class="text-indigo-600 hover:underline">Back</button>
              <button type="button" class="bg-gradient-to-r from-blue-500 to-blue-800 text-white px-6 py-2 rounded-full shadow-lg hover:scale-105 transition">Next</button>
            </div>
          </div>

          <!-- Step 3 -->
          <div class="form-step hidden" data-step="2">
            <label class="block">
              <span class="block text-sm font-semibold text-slate-800 mb-1">🏠 Address</span>
              <textarea name="address" rows="3" required placeholder="Street, City, State, ZIP" class="w-full px-4 py-2 border border-slate-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none"></textarea>
            </label>

            <div class="grid md:grid-cols-2 gap-6 mt-6">
              <label>
                <span class="block text-sm font-semibold text-slate-800 mb-1">📞 Phone Number</span>
                <input type="tel" name="phone" required placeholder="+91 98765 43210" class="w-full px-4 py-2 border border-slate-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none" />
              </label>
              <label>
                <span class="block text-sm font-semibold text-slate-800 mb-1">📧 Email</span>
                <input type="email" name="email" required placeholder="you@example.com" class="w-full px-4 py-2 border border-slate-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none" />
              </label>
            </div>

            <label class="block mt-6">
              <span class="block text-sm font-semibold text-slate-800 mb-1">🆔 ID (Image)</span>
              <input type="file" name="id_image" accept="image/*" required class="w-full px-4 py-2 border border-slate-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none" />
              <span class="text-xs text-slate-500 mt-1 block">Accepted formats: JPG, PNG, HEIC</span>
            </label>

            <div class="flex justify-between mt-6">
              <button type="button" class="text-indigo-600 hover:underline">Back</button>
              <button type="button" class="bg-gradient-to-r from-blue-500 to-blue-800 text-white px-6 py-2 rounded-full shadow-lg hover:scale-105 transition">Next</button>
            </div>
          </div>

          <!-- Step 4 -->
          <div class="form-step hidden" data-step="3">
            <fieldset>
              <legend class="text-sm font-semibold text-slate-800 mb-3">📣 How did you get to know about us?</legend>
              <div class="flex flex-wrap gap-4">
                <label class="inline-flex items-center gap-2">
                  <input type="radio" name="heard_from" value="Social Media" required class="accent-indigo-600"> Social Media
                </label>
                <label class="inline-flex items-center gap-2">
                  <input type="radio" name="heard_from" value="Friends" class="accent-indigo-600"> Friends
                </label>
                <label class="inline-flex items-center gap-2">
                  <input type="radio" name="heard_from" value="College" class="accent-indigo-600"> College
                </label>
                <label class="inline-flex items-center gap-2">
                  <input type="radio" name="heard_from" value="Research" class="accent-indigo-600"> Research
                </label>
                <label class="inline-flex items-center gap-2">
                  <input type="radio" name="heard_from" value="School" class="accent-indigo-600"> School
                </label>
                <label class="inline-flex items-center gap-2">
                  <input type="radio" name="heard_from" value="Other" class="accent-indigo-600"> Other
                </label>
              </div>

              <!-- Optional details for "Other" -->
              <textarea id="heard_other_wrap" name="heard_other_details" rows="2" class="hidden w-full mt-4 px-4 py-2 border border-slate-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none" placeholder="Please specify..."></textarea>
            </fieldset>

            <!-- Notes Section -->
            <label class="block mt-6">
              <span class="block text-sm font-semibold text-slate-800 mb-1">📝 Note</span>
              <textarea name="notes" rows="3" placeholder="Any additional notes..." class="w-full px-4 py-2 border border-slate-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none"></textarea>
            </label>

            <!-- Navigation Buttons -->
            <div class="flex justify-between mt-8">
              <button type="button" class="text-indigo-600 hover:underline">Back</button>
              <button type="submit" class="bg-gradient-to-r from-indigo-600 to-blue-600 text-white px-6 py-2 rounded-full shadow-lg hover:scale-105 transition">Apply Now</button>
            </div>
          </div>
      </div>
    </section>
  </div>
</div>

<script>
  const steps = document.querySelectorAll('.form-step');
  const progressBar = document.querySelector('.progress-bar');
  let currentStep = 0;

  function showStep(index) {
    steps.forEach((step, i) => {
      step.classList.toggle('hidden', i !== index);
    });

    // Update progress bar
    const progress = ((index + 1) / steps.length) * 100;
    progressBar.style.width = `${progress}%`;
  }

  // Initial display
  showStep(currentStep);

  // Navigation buttons
  document.querySelectorAll('.next-step').forEach(btn => {
    btn.addEventListener('click', () => {
      if (currentStep < steps.length - 1) {
        currentStep++;
        showStep(currentStep);
      }
    });
  });

  document.querySelectorAll('.prev-step').forEach(btn => {
    btn.addEventListener('click', () => {
      if (currentStep > 0) {
        currentStep--;
        showStep(currentStep);
      }
    });
  });
</script>
