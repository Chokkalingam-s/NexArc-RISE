<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<section class="max-w-6xl mx-auto py-10 px-4">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-10">
        <!-- Left Panel - Stepper -->
        <div class="lg:col-span-1">
            <h2 class="text-2xl sm:text-3xl font-bold text-center mb-8 gradient_text relative w-fit mx-auto">
                Become a Member
                <span class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-14 h-1 grad_primary rounded-full"></span>
            </h2>

            <div class="space-y-6">
                <div class="step-item flex items-center gap-4" data-step="1">
                    <div class="w-0.5 h-6 bg-slate-300 step-connector hidden"></div>
                    <div class="step-circle size-12 rounded-full flex items-center justify-center text-white shadow-lg">
                        <i class="fas fa-user text-sm"></i>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-indigo-700">Personal Info</p>
                        <p class="text-xs text-slate-500">Step 1 of 4</p>
                    </div>
                </div>

                <div class="step-item flex items-center gap-4" data-step="2">
                    <div class="w-0.5 h-6 bg-slate-300 step-connector"></div>
                    <div class="step-circle size-12 rounded-full flex items-center justify-center text-white bg-slate-400 shadow-lg">
                        <i class="fas fa-graduation-cap text-sm"></i>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-slate-600">Education</p>
                        <p class="text-xs text-slate-400">Step 2 of 4</p>
                    </div>
                </div>

                <div class="step-item flex items-center gap-4" data-step="3">
                    <div class="w-0.5 h-6 bg-slate-300 step-connector"></div>
                    <div class="step-circle size-12 rounded-full flex items-center justify-center text-white bg-slate-400 shadow-lg">
                        <i class="fas fa-address-book text-sm"></i>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-slate-600">Contact</p>
                        <p class="text-xs text-slate-400">Step 3 of 4</p>
                    </div>
                </div>

                <div class="step-item flex items-center gap-4" data-step="4">
                    <div class="w-0.5 h-6 bg-slate-300 step-connector"></div>
                    <div class="step-circle size-12 rounded-full flex items-center justify-center text-white bg-slate-400 shadow-lg">
                        <i class="fas fa-check-circle text-sm"></i>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-slate-600">Final</p>
                        <p class="text-xs text-slate-400">Step 4 of 4</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Panel - Form -->
        <div class="lg:col-span-3">
            <div class="max-w-2xl mx-auto bg-white rounded-3xl shadow-2xl overflow-hidden">

                <!-- Progress Bar -->
                <div class="w-full h-1.5 bg-slate-200">
                    <div id="progress-bar" class="h-full bg-gradient-to-r from-indigo-500 to-indigo-700 transition-all duration-500" style="width: 25%;"></div>
                </div>

                <!-- Form Content -->
                <div class="p-8 min-h-[600px] flex flex-col">

                    <div class="mb-8">
                        <h3 id="step-title" class="text-2xl font-bold text-slate-800 mb-2">Personal Information</h3>
                        <p class="text-slate-600">Step 1 of 4 - Please fill in all required fields</p>
                    </div>

                    <form class="flex-1 flex flex-col">

                        <!-- Step 1 -->
                        <div id="step-1" class="form-step flex-1">
                            <div class="grid md:grid-cols-2 gap-6">
                                <label class="block">
                                    <span class="flex items-center gap-2 text-sm font-semibold text-slate-700 mb-2">
                                        <i class="fas fa-user text-indigo-500"></i>
                                        Full Name
                                    </span>
                                    <input type="text" name="full_name" placeholder="Enter your full name"
                                           class="w-full px-4 py-3 border border-slate-300 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none transition-all" />
                                </label>

                                <label class="block">
                                    <span class="flex items-center gap-2 text-sm font-semibold text-slate-700 mb-2">
                                        <i class="fas fa-calendar text-indigo-500"></i>
                                        Date of Birth
                                    </span>
                                    <input type="date" name="dob"
                                           class="w-full px-4 py-3 border border-slate-300 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none transition-all" />
                                </label>
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div id="step-2" class="form-step flex-1 hidden">
                            <div class="space-y-6">
                                <div class="grid md:grid-cols-2 gap-6">
                                    <label class="block">
                                        <span class="flex items-center gap-2 text-sm font-semibold text-slate-700 mb-2">
                                            <i class="fas fa-graduation-cap text-indigo-500"></i>
                                            Degree
                                        </span>
                                        <select name="degree" class="w-full px-4 py-3 border border-slate-300 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none transition-all">
                                            <option value="">Select your degree</option>
                                            <option value="High School">High School</option>
                                            <option value="Bachelor's">Bachelor's</option>
                                            <option value="Master's">Master's</option>
                                            <option value="PhD">PhD</option>
                                        </select>
                                    </label>

                                    <label class="block">
                                        <span class="flex items-center gap-2 text-sm font-semibold text-slate-700 mb-2">
                                            <i class="fas fa-globe text-indigo-500"></i>
                                            Country
                                        </span>
                                        <input type="text" name="country" placeholder="Enter your country"
                                               class="w-full px-4 py-3 border border-slate-300 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none transition-all" />
                                    </label>
                                </div>

                                <fieldset class="space-y-3">
                                    <legend class="flex items-center gap-2 text-sm font-semibold text-slate-700">
                                        <i class="fas fa-venus-mars text-indigo-500"></i>
                                        Gender
                                    </legend>
                                    <div class="flex gap-6">
                                        <label class="inline-flex items-center gap-2">
                                            <input type="radio" name="gender" value="Male" class="accent-indigo-600">
                                            <span>Male</span>
                                        </label>
                                        <label class="inline-flex items-center gap-2">
                                            <input type="radio" name="gender" value="Female" class="accent-indigo-600">
                                            <span>Female</span>
                                        </label>
                                        <label class="inline-flex items-center gap-2">
                                            <input type="radio" name="gender" value="Other" class="accent-indigo-600">
                                            <span>Other</span>
                                        </label>
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                        <!-- Step 3 -->
                        <div id="step-3" class="form-step flex-1 hidden">
                            <div class="space-y-6">
                                <label class="block">
                                    <span class="flex items-center gap-2 text-sm font-semibold text-slate-700 mb-2">
                                        <i class="fas fa-home text-indigo-500"></i>
                                        Address
                                    </span>
                                    <textarea name="address" rows="3" placeholder="Enter your complete address"
                                              class="w-full px-4 py-3 border border-slate-300 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none transition-all resize-none"></textarea>
                                </label>

                                <div class="grid md:grid-cols-2 gap-6">
                                    <label class="block">
                                        <span class="flex items-center gap-2 text-sm font-semibold text-slate-700 mb-2">
                                            <i class="fas fa-phone text-indigo-500"></i>
                                            Phone
                                        </span>
                                        <input type="tel" name="phone" placeholder="+1 (555) 123-4567"
                                               class="w-full px-4 py-3 border border-slate-300 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none transition-all" />
                                    </label>

                                    <label class="block">
                                        <span class="flex items-center gap-2 text-sm font-semibold text-slate-700 mb-2">
                                            <i class="fas fa-envelope text-indigo-500"></i>
                                            Email
                                        </span>
                                        <input type="email" name="email" placeholder="your.email@example.com"
                                               class="w-full px-4 py-3 border border-slate-300 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none transition-all" />
                                    </label>
                                </div>

                                <label class="block">
                                    <span class="flex items-center gap-2 text-sm font-semibold text-slate-700 mb-2">
                                        <i class="fas fa-id-card text-indigo-500"></i>
                                        ID Document
                                    </span>
                                    <input type="file" name="id_document" accept="image/*"
                                           class="w-full px-4 py-3 border border-slate-300 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none transition-all file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" />
                                </label>
                            </div>
                        </div>

                        <!-- Step 4 -->
                        <div id="step-4" class="form-step flex-1 hidden">
                            <div class="space-y-6">
                                <fieldset class="space-y-4">
                                    <legend class="flex items-center gap-2 text-sm font-semibold text-slate-700">
                                        <i class="fas fa-bullhorn text-indigo-500"></i>
                                        How did you hear about us?
                                    </legend>
                                    <div class="grid grid-cols-2 gap-4">
                                        <label class="inline-flex items-center gap-2">
                                            <input type="radio" name="heard_from" value="Social Media" class="accent-indigo-600">
                                            <span>Social Media</span>
                                        </label>
                                        <label class="inline-flex items-center gap-2">
                                            <input type="radio" name="heard_from" value="Friends" class="accent-indigo-600">
                                            <span>Friends</span>
                                        </label>
                                        <label class="inline-flex items-center gap-2">
                                            <input type="radio" name="heard_from" value="College" class="accent-indigo-600">
                                            <span>College</span>
                                        </label>
                                        <label class="inline-flex items-center gap-2">
                                            <input type="radio" name="heard_from" value="Other" class="accent-indigo-600">
                                            <span>Other</span>
                                        </label>
                                    </div>
                                </fieldset>

                                <label class="block">
                                    <span class="flex items-center gap-2 text-sm font-semibold text-slate-700 mb-2">
                                        <i class="fas fa-sticky-note text-indigo-500"></i>
                                        Notes
                                    </span>
                                    <textarea name="notes" rows="4" placeholder="Any additional information..."
                                              class="w-full px-4 py-3 border border-slate-300 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none transition-all resize-none"></textarea>
                                </label>
                            </div>
                        </div>

                        <!-- Navigation Buttons -->
                        <div class="flex justify-between items-center pt-8 mt-8 border-t border-slate-200">
                            <button type="button" id="back-btn" class="inline-flex items-center gap-2 px-6 py-3 text-indigo-600 font-semibold hover:text-indigo-800 transition-colors">
                                <i class="fas fa-arrow-left"></i>
                                Back
                            </button>
                            <div id="back-spacer"></div>

                            <button type="button" id="next-btn" class="inline-flex items-center gap-2 bg-gradient-to-r from-indigo-600 to-indigo-700 text-white px-8 py-3 rounded-xl shadow-lg hover:from-indigo-700 hover:to-indigo-800 hover:shadow-xl transform hover:scale-105 transition-all duration-200 font-semibold">
                                Next
                                <i class="fas fa-arrow-right"></i>
                            </button>

                            <button type="submit" id="submit-btn" class="inline-flex items-center gap-2 bg-gradient-to-r from-green-600 to-green-700 text-white px-8 py-3 rounded-xl shadow-lg hover:from-green-700 hover:to-green-800 hover:shadow-xl transform hover:scale-105 transition-all duration-200 font-semibold">
                                <i class="fas fa-paper-plane"></i>
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
  const steps = ['Personal Information', 'Education & Demographics', 'Contact Information', 'Final Details'];
  let currentStep = 1;
  const totalSteps = 4;

  function updateUI() {
      // Update progress bar
      document.getElementById('progress-bar').style.width = `${(currentStep / totalSteps) * 100}%`;

      // Update title
      document.getElementById('step-title').textContent = steps[currentStep - 1];

      // Show/hide form steps
      document.querySelectorAll('.form-step').forEach((step, index) => {
          step.classList.toggle('hidden', index !== currentStep - 1);
      });

      // Update stepper UI
      document.querySelectorAll('.step-item').forEach((item, index) => {
          const stepNum = index + 1;
          const circle = item.querySelector('.step-circle');
          const label = item.querySelector('p:first-child');
          const subLabel = item.querySelector('p:last-child');
          const connector = item.querySelector('.step-connector');

          if (stepNum < currentStep) {
              // Completed
              circle.className = 'step-circle size-12 rounded-full flex items-center justify-center text-white grad_primary shadow-lg';
              circle.innerHTML = '<i class="fas fa-check text-sm"></i>';
              label.className = 'text-sm font-semibold text-blue-800';
              subLabel.className = 'text-xs text-slate-500';
              if (connector) connector.className = 'w-0.5 h-6 grad_primary step-connector';
          } else if (stepNum === currentStep) {
              // Active
              circle.className = 'step-circle size-12 rounded-full flex items-center justify-center text-white grad_secondary shadow-lg transform scale-110';
              label.className = 'text-sm font-semibold text-amber-600';
              subLabel.className = 'text-xs text-slate-500';
              if (connector) connector.className = 'w-0.5 h-6 bg-amber-500 step-connector';
          } else {
              // Pending
              circle.className = 'step-circle size-12 rounded-full flex items-center justify-center text-white bg-slate-400 shadow-lg';
              label.className = 'text-sm font-semibold text-slate-600';
              subLabel.className = 'text-xs text-slate-400';
              if (connector) connector.className = 'w-0.5 h-6 bg-slate-300 step-connector';
          }
      });

      // Update buttons
      document.getElementById('back-btn').classList.toggle('hidden', currentStep === 1);
      document.getElementById('back-spacer').classList.toggle('hidden', currentStep !== 1);
      document.getElementById('next-btn').classList.toggle('hidden', currentStep === totalSteps);
      document.getElementById('submit-btn').classList.toggle('hidden', currentStep !== totalSteps);
  }

  document.getElementById('next-btn').addEventListener('click', () => {
      if (currentStep < totalSteps) {
          currentStep++;
          updateUI();
      }
  });

  document.getElementById('back-btn').addEventListener('click', () => {
      if (currentStep > 1) {
          currentStep--;
          updateUI();
      }
  });
  updateUI();
</script>
