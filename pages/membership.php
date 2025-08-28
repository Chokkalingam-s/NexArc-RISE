<section class="max-w-6xl mx-auto py-10 px-4">
  <div class="grid grid-cols-1 lg:grid-cols-4 gap-10">
    <!-- Left Panel - Stepper -->
    <div class="lg:col-span-1">
      <h2 class="text-2xl sm:text-3xl font-bold text-center mb-8 gradient_text relative w-fit mx-auto">
        Become a Member
        <span class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-14 h-1 grad_primary rounded-full"></span>
      </h2>

      <div class="space-y-4">
        <div class="step-item flex items-center gap-3" data-step="1">
          <div class="step-circle w-10 h-10 rounded-full flex items-center justify-center text-white text-sm font-semibold grad_primary">
            1
          </div>
          <div>
            <p class="text-sm font-semibold text-blue-700">Personal Info</p>
            <p class="text-xs text-slate-500">Step 1 of 4</p>
          </div>
        </div>

        <div class="step-item flex items-center gap-3" data-step="2">
          <div class="step-circle w-10 h-10 rounded-full flex items-center justify-center text-white text-sm font-semibold bg-slate-400">
            2
          </div>
          <div>
            <p class="text-sm font-semibold text-slate-600">Education</p>
            <p class="text-xs text-slate-400">Step 2 of 4</p>
          </div>
        </div>

        <div class="step-item flex items-center gap-3" data-step="3">
          <div class="step-circle w-10 h-10 rounded-full flex items-center justify-center text-white text-sm font-semibold bg-slate-400">
            3
          </div>
          <div>
            <p class="text-sm font-semibold text-slate-600">Contact</p>
            <p class="text-xs text-slate-400">Step 3 of 4</p>
          </div>
        </div>

        <div class="step-item flex items-center gap-3" data-step="4">
          <div class="step-circle w-10 h-10 rounded-full flex items-center justify-center text-white text-sm font-semibold bg-slate-400">
            4
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
      <div class="max-w-2xl mx-auto bg-white/40 backdrop-blur-sm rounded-3xl shadow-2xl overflow-hidden">
        <!-- Progress Bar -->
        <div class="w-full h-1.5 bg-slate-200">
          <div id="progress-bar" class="h-full bg-gradient-to-r from-blue-500 to-blue-700 transition-all duration-500" style="width: 25%;"></div>
        </div>

        <!-- Form Content -->
        <div class="p-8 min-h-[600px] flex flex-col">
          <div class="mb-8">
            <h3 id="step-title" class="text-2xl font-bold text-slate-800 mb-2">Personal Information</h3>
            <p id="step-description" class="text-slate-600">Step 1 of 4 - Please fill in all required fields</p>
          </div>

          <form class="flex-1 flex flex-col">
            <!-- Step 1 - Personal Information -->
            <div id="step-1" class="form-step flex-1">
              <div class="space-y-6">
                <div class="grid md:grid-cols-2 gap-6">
                  <label class="block">
                    <span class="text-sm font-semibold text-slate-700 mb-2 block">Full Name</span>
                    <input type="text" name="full_name" placeholder="Enter your full name"
                    class="w-full px-4 py-3 border border-slate-300 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-all"/>
                  </label>
                  <label class="block">
                    <span class="text-sm font-semibold text-slate-700 mb-2 block">Date of Birth</span>
                    <input type="date" name="dob" class="w-full px-4 py-3 border border-slate-300 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-all"/>
                  </label>
                </div>
                <div class="grid md:grid-cols-2 gap-6">
                  <label class="block">
                    <span class="text-sm font-semibold text-slate-700 mb-2 block">Country</span>
                    <input type="text" name="country" placeholder="Enter your country" class="w-full px-4 py-3 border border-slate-300 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-all"/>
                  </label>
                  <fieldset class="space-y-3">
                    <legend class="text-sm font-semibold text-slate-700">Gender</legend>
                    <div class="flex gap-4">
                      <label class="inline-flex items-center gap-2">
                        <input type="radio" name="gender" value="Male" class="accent-blue-600">
                        <span>Male</span>
                      </label>
                      <label class="inline-flex items-center gap-2">
                        <input type="radio" name="gender" value="Female" class="accent-blue-600">
                        <span>Female</span>
                      </label>
                      <label class="inline-flex items-center gap-2">
                        <input type="radio" name="gender" value="Other" class="accent-blue-600">
                        <span>Other</span>
                      </label>
                    </div>
                  </fieldset>
                </div>
              </div>
            </div>

            <!-- Step 2 - Education -->
            <div id="step-2" class="form-step flex-1 hidden">
              <div class="space-y-6">
                <label class="block">
                  <span class="text-sm font-semibold text-slate-700 mb-2 block">Highest Education Level</span>
                  <select name="degree" class="w-full px-4 py-3 border border-slate-300 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-all">
                    <option value="">Select your highest degree</option>
                    <option value="High School">High School</option>
                    <option value="Associate Degree">Associate Degree</option>
                    <option value="Bachelor's">Bachelor's</option>
                    <option value="Master's">Master's</option>
                    <option value="PhD">PhD</option>
                    <option value="Other">Other</option>
                  </select>
                </label>
                <label class="block">
                  <span class="text-sm font-semibold text-slate-700 mb-2 block">Institution Name</span>
                  <input type="text" name="institution" placeholder="Enter your school/university name"
                  class="w-full px-4 py-3 border border-slate-300 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-all"/>
                </label>
                <label class="block">
                  <span class="text-sm font-semibold text-slate-700 mb-2 block">Field of Study</span>
                  <input type="text" name="field_of_study" placeholder="Enter your major/field of study"
                  class="w-full px-4 py-3 border border-slate-300 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-all"/>
                </label>
              </div>
            </div>

            <!-- Step 3 - Contact Information -->
            <div id="step-3" class="form-step flex-1 hidden">
              <div class="space-y-6">
                <label class="block">
                  <span class="text-sm font-semibold text-slate-700 mb-2 block">Address</span>
                  <textarea name="address" rows="3" placeholder="Enter your complete address"
                  class="w-full px-4 py-3 border border-slate-300 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-all resize-none"></textarea>
                </label>
                <div class="grid md:grid-cols-2 gap-6">
                  <label class="block">
                    <span class="text-sm font-semibold text-slate-700 mb-2 block">Phone Number</span>
                    <input type="tel" name="phone" placeholder="+1 (555) 123-4567" class="w-full px-4 py-3 border border-slate-300 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-all"/>
                  </label>
                  <label class="block">
                    <span class="text-sm font-semibold text-slate-700 mb-2 block">Email Address</span>
                    <input type="email" name="email" placeholder="your.email@example.com"
                    class="w-full px-4 py-3 border border-slate-300 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-all"/>
                  </label>
                </div>
                <div class="grid grid-cols-[70%_30%] gap-4">
                  <div>
                    <span class="text-sm font-semibold text-slate-700 mb-2 block">ID Document Upload</span>
                    <input type="file" name="id_document" accept="image/*" id="file-input"
                    class="w-full px-4 py-3 border border-slate-300 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-all file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"/>
                  </div>
                  <div id="image-preview-container" class="hidden">
                    <p class="text-sm text-slate-600 mb-2">Preview:</p>
                    <img id="image-preview" class="image-preview" alt="ID Document Preview"/>
                  </div>
                </div>
              </div>
            </div>

            <!-- Step 4 - Final Details -->
            <div id="step-4" class="form-step flex-1 hidden">
              <div class="space-y-6">
                <fieldset class="space-y-3">
                  <legend class="text-sm font-semibold text-slate-700">How did you hear about us?</legend>
                  <div class="grid grid-cols-2 gap-2">
                    <label class="inline-flex items-center gap-2">
                      <input type="radio" name="heard_from" value="Social Media" class="accent-blue-600">
                      <span>Social Media</span>
                    </label>
                    <label class="inline-flex items-center gap-2">
                      <input type="radio" name="heard_from" value="Friends" class="accent-blue-600">
                      <span>Friends/Family</span>
                    </label>
                    <label class="inline-flex items-center gap-2">
                      <input type="radio" name="heard_from" value="College" class="accent-blue-600">
                      <span>College/University</span>
                    </label>
                    <label class="inline-flex items-center gap-2">
                      <input type="radio" name="heard_from" value="Online Search" class="accent-blue-600">
                      <span>Online Search</span>
                    </label>
                    <label class="inline-flex items-center gap-2">
                      <input type="radio" name="heard_from" value="Advertisement" class="accent-blue-600">
                      <span>Advertisement</span>
                    </label>
                    <label class="inline-flex items-center gap-2">
                      <input type="radio" name="heard_from" value="Other" class="accent-blue-600">
                      <span>Other</span>
                    </label>
                  </div>
                </fieldset>
                <label class="block">
                  <span class="text-sm font-semibold text-slate-700 mb-2 block">Additional Notes (Optional)</span>
                  <textarea name="notes" rows="4" placeholder="Any additional information you'd like to share..."
                  class="w-full px-4 py-3 border border-slate-300 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-all resize-none"></textarea>
                </label>
                <div class="bg-green-50 border border-green-200 rounded-xl p-4">
                  <div class="text-green-800 font-semibold mb-2">✓ Ready to Submit</div>
                  <p class="text-green-700 text-sm">Please review all your information before submitting your membership application.</p>
                </div>
              </div>
            </div>

            <!-- Navigation Buttons -->
            <div class="flex justify-between items-center pt-8 mt-8 border-t border-slate-200">
              <button type="button" id="back-btn" class="hidden inline-flex items-center gap-2 px-6 py-3 text-blue-600 font-semibold hover:text-blue-800 transition-colors">
                ← Back
              </button>
              <div id="back-spacer"></div>
              <button type="button" id="next-btn" class="inline-flex items-center gap-2 grad_primary text-white px-8 py-3 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 font-semibold">
                Next →
              </button>
              <button type="submit" id="submit-btn" class="hidden inline-flex items-center gap-2 bg-gradient-to-r from-green-600 to-green-700 text-white px-8 py-3 rounded-xl shadow-lg hover:from-green-700 hover:to-green-800 hover:shadow-xl transform hover:scale-105 transition-all duration-200 font-semibold">
                ✈ Submit Application
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
const steps = ['Personal Information', 'Education Details', 'Contact Information', 'Final Details'];
let currentStep = 1;
const totalSteps = 4;

// File input preview functionality
document.getElementById('file-input').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const previewContainer = document.getElementById('image-preview-container');
    const preview = document.getElementById('image-preview');

    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            previewContainer.classList.remove('hidden');
        };
        reader.readAsDataURL(file);
    } else {
        previewContainer.classList.add('hidden');
    }
});

function updateUI() {
    // Update progress bar
    const progressWidth = (currentStep / totalSteps) * 100;
    document.getElementById('progress-bar').style.width = `${progressWidth}%`;

    // Update step title and description
    document.getElementById('step-title').textContent = steps[currentStep - 1];
    document.getElementById('step-description').textContent = `Step ${currentStep} of ${totalSteps} - Please fill in all required fields`;

    // Show/hide form steps
    document.querySelectorAll('.form-step').forEach((step, index) => {
        step.classList.toggle('hidden', index !== currentStep - 1);
    });

    // Update left panel steps
    document.querySelectorAll('.step-item').forEach((item, index) => {
        const stepNum = index + 1;
        const circle = item.querySelector('.step-circle');
        const label = item.querySelector('p:first-child');
        const subLabel = item.querySelector('p:last-child');

        if (stepNum < currentStep) {
            // Completed step
            circle.className = 'step-circle w-10 h-10 rounded-full flex items-center justify-center text-white text-sm font-semibold grad_primary';
            circle.textContent = '✓';
            label.className = 'text-sm font-semibold text-blue-700';
            subLabel.className = 'text-xs text-slate-500';
        } else if (stepNum === currentStep) {
            // Current step
            circle.className = 'step-circle w-10 h-10 rounded-full flex items-center justify-center text-white text-sm font-semibold grad_secondary';
            circle.textContent = stepNum;
            label.className = 'text-sm font-semibold text-orange-600';
            subLabel.className = 'text-xs text-slate-500';
        } else {
            // Future step
            circle.className = 'step-circle w-10 h-10 rounded-full flex items-center justify-center text-white text-sm font-semibold bg-slate-400';
            circle.textContent = stepNum;
            label.className = 'text-sm font-semibold text-slate-600';
            subLabel.className = 'text-xs text-slate-400';
        }
    });

    // Update navigation buttons
    const backBtn = document.getElementById('back-btn');
    const backSpacer = document.getElementById('back-spacer');
    const nextBtn = document.getElementById('next-btn');
    const submitBtn = document.getElementById('submit-btn');

    // Back button logic - show only from step 2 onwards
    if (currentStep === 1) {
        backBtn.classList.add('hidden');
        backSpacer.classList.remove('hidden');
    } else {
        backBtn.classList.remove('hidden');
        backSpacer.classList.add('hidden');
    }

    // Next/Submit button logic
    if (currentStep === totalSteps) {
        // Last step - show submit, hide next
        nextBtn.classList.add('hidden');
        submitBtn.classList.remove('hidden');
    } else {
        // Not last step - show next, hide submit
        nextBtn.classList.remove('hidden');
        submitBtn.classList.add('hidden');
    }
}

// Next button event listener
document.getElementById('next-btn').addEventListener('click', () => {
    if (currentStep < totalSteps) {
        currentStep++;
        updateUI();
    }
});

// Back button event listener
document.getElementById('back-btn').addEventListener('click', () => {
    if (currentStep > 1) {
        currentStep--;
        updateUI();
    }
});

// Form submission
document.querySelector('form').addEventListener('submit', function(e) {
    e.preventDefault();

    // Simulate form submission
    alert('✅ Membership application submitted successfully!');

    // Reset form
    this.reset();
    currentStep = 1;
    updateUI();

});
updateUI();
</script>
