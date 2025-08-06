<?php global $scholarships, $schools;
include_once __DIR__ . "/../assets/collab_data.php";
?>
  <section class="min-h-screen overflow-hidden">
    <!-- Left Scrollable Section -->
    <div class="overflow-y-auto space-y-8 h-full px-4 py-6">
      <!-- Scholarships -->
      <div>
        <h2 class="gradient_text mb-6">
          Scholarships
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <?php foreach ($scholarships as $item): ?>
            <div class="bg-white/20 rounded-xl shadow-md hover:shadow-lg transition-shadow overflow-hidden">
              <div class="flex h-52">
                <img src="<?= $item[
                  "image"
                ] ?>" alt="Scholarship" class="w-1/3 object-cover">
                <div class="p-4 flex flex-col justify-between w-2/3">
                  <div>
                    <h3 class="font-bold text-slate-800 text-lg mb-1">
                      <?= $item["title"] ?>
                    </h3>
                    <p class="text-indigo-600 text-sm font-medium mb-2">
                      <?= $item["university"] ?>
                    </p>
                    <p class="text-slate-600 text-sm line-clamp-4">
                      <?= $item["description"] ?>
                    </p>
                  </div>
                  <a href="<?= $item[
                    "link"
                  ] ?>" class="text-indigo-600 hover:text-indigo-800 font-medium text-sm transition-colors"
                  target="_blank">
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
        <h2 class="gradient_text mb-6">
          Schools
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
          <?php foreach ($schools as $school): ?>
            <div class="bg-white/20 rounded-xl shadow-md hover:shadow-lg transition-shadow overflow-hidden">
              <img src="<?= $school[
                "image"
              ] ?>" alt="School" class="w-full aspect-[16/9] object-cover">
              <div class="p-4">
                <h3 class="font-bold text-slate-800 text-lg mb-1">
                  <?= $school["title"] ?>
                </h3>
                <p class="text-slate-600 text-sm mb-3">
                  <?= $school["place"] ?>
                </p>
                <a href="<?= $school[
                  "link"
                ] ?>" class="gradient_text font-medium text-sm transition-colors" target="_blank">
                  Visit Site →
                </a>
              </div>
            </div>
            <?php endforeach; ?>
        </div>
      </div>
      <div>
        <h2 class="gradient_text mb-4">
          Student Success Stories
        </h2>
        <div class="grid sm:grid-cols-2 gap-6">
          <?php
          global $students;
          foreach ($students as $student): ?>
            <div class="flex items-center gap-4 p-6 bg-white/40 rounded-xl shadow-md">
              <div class="size-16 px-4 rounded-full <?= $student[
                "bg"
              ] ?>">
              </div>
              <div>
                <p class="font-semibold text-slate-800 text-lg">
                  <?= $student["name"] ?>
                </p>
                <p class="text-slate-600">
                  <?= $student["desc"] ?>
                </p>
              </div>
            </div>
            <?php endforeach;
          ?>
        </div>
      </div>
      <!-- Contact Form -->
      <div>
        <h2 class="gradient_text mb-6 text-center text-2xl font-bold">
          Contact Us
        </h2>
        <div class="bg-white/40 rounded-xl shadow-lg p-8 max-w-3xl mx-auto">
          <form class="space-y-6">
            <!-- Basic Info -->
            <div class="grid md:grid-cols-2 gap-4">
              <label class="block">
                <span class="text-sm font-semibold text-slate-700 mb-1 block">
                  Full Name
                </span>
                <input type="text" name="name" placeholder="Your full name" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                />
              </label>
              <label class="block">
                <span class="text-sm font-semibold text-slate-700 mb-1 block">
                  Date of Birth
                </span>
                <input type="date" name="dob" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                />
              </label>
            </div>
            <!-- Contact Info -->
            <div class="grid md:grid-cols-2 gap-4">
              <label class="block">
                <span class="text-sm font-semibold text-slate-700 mb-1 block">
                  Email
                </span>
                <input type="email" name="email" placeholder="your.email@example.com"
                class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                />
              </label>
              <label class="block">
                <span class="text-sm font-semibold text-slate-700 mb-1 block">
                  Phone
                </span>
                <input type="tel" name="phone" placeholder="+91 98765 43210" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                />
              </label>
            </div>
            <!-- Additional Info -->
            <div class="grid md:grid-cols-2 gap-4">
              <label class="block">
                <span class="text-sm font-semibold text-slate-700 mb-1 block">
                  Degree
                </span>
                <input type="text" name="degree" placeholder="e.g., B.Tech, M.Sc" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                />
              </label>
              <label class="block">
                <span class="text-sm font-semibold text-slate-700 mb-1 block">
                  Country
                </span>
                <input type="text" name="country" placeholder="Your country" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                />
              </label>
            </div>
            <!-- Gender & Address -->
            <div class="grid md:grid-cols-2 gap-4">
              <label class="block">
                <span class="text-sm font-semibold text-slate-700 mb-1 block">
                  Gender
                </span>
                <select name="gender" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                  <option value="">
                    Select
                  </option>
                  <option>
                    Male
                  </option>
                  <option>
                    Female
                  </option>
                  <option>
                    Other
                  </option>
                </select>
              </label>
              <label class="block">
                <span class="text-sm font-semibold text-slate-700 mb-1 block">
                  Address
                </span>
                <input type="text" name="address" placeholder="Street, City, ZIP" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                />
              </label>
            </div>
            <!-- ID Upload -->
            <label class="block">
              <span class="text-sm font-semibold text-slate-700 mb-1 block">
                Upload ID Document
              </span>
              <input type="file" name="id_doc" accept="image/*" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
              />
            </label>
            <!-- Interests -->
            <div>
              <p class="text-sm font-semibold text-slate-700 mb-2">
                I'm interested in:
              </p>
              <div class="flex flex-wrap gap-4">
                <label class="inline-flex items-center gap-2">
                  <input type="checkbox" name="interest[]" value="Japanese Language" class="accent-indigo-600"
                  />
                  <span class="text-slate-700">
                    Japanese Language
                  </span>
                </label>
                <label class="inline-flex items-center gap-2">
                  <input type="checkbox" name="interest[]" value="Scholarships & Schools"
                  class="accent-indigo-600" />
                  <span class="text-slate-700">
                    Scholarships & Schools
                  </span>
                </label>
                <label class="inline-flex items-center gap-2">
                  <input type="checkbox" name="interest[]" value="Higher Studies in Japan"
                  class="accent-indigo-600" />
                  <span class="text-slate-700">
                    Higher Studies in Japan
                  </span>
                </label>
              </div>
            </div>
            <!-- Referral Source -->
            <div>
              <p class="text-sm font-semibold text-slate-700 mb-2">
                How did you hear about us?
              </p>
              <div class="flex flex-wrap gap-6">
                <label class="inline-flex items-center gap-2">
                  <input type="radio" name="referral" value="Social Media" class="accent-indigo-600"
                  />
                  <span class="text-slate-700">
                    Social Media
                  </span>
                </label>
                <label class="inline-flex items-center gap-2">
                  <input type="radio" name="referral" value="Friends" class="accent-indigo-600"
                  />
                  <span class="text-slate-700">
                    Friends
                  </span>
                </label>
                <label class="inline-flex items-center gap-2">
                  <input type="radio" name="referral" value="College" class="accent-indigo-600"
                  />
                  <span class="text-slate-700">
                    College
                  </span>
                </label>
                <label class="inline-flex items-center gap-2">
                  <input type="radio" name="referral" value="Other" class="accent-indigo-600"
                  />
                  <span class="text-slate-700">
                    Other
                  </span>
                </label>
              </div>
            </div>
            <!-- Notes -->
            <label class="block">
              <span class="text-sm font-semibold text-slate-700 mb-1 block">
                Additional Notes
              </span>
              <textarea name="notes" rows="4" placeholder="Any specific questions or comments?"
              class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 resize-none">
              </textarea>
            </label>
            <!-- Submit Button -->
            <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 to-blue-600 text-white py-3 px-6 rounded-lg font-semibold hover:from-indigo-700 hover:to-blue-700 transform hover:scale-[1.02] transition-all duration-200 shadow-lg">
              Send Message
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>
  <script>
    const container = document.getElementById('mentor-list');
    const hint = document.getElementById('scroll-hint');

    function updateScrollHint() {
      const atBottom = container.scrollTop + container.clientHeight >= container.scrollHeight - 10;
      hint.style.opacity = atBottom ? '0': '1';
    }

    container.addEventListener('scroll', updateScrollHint);
    window.addEventListener('load', updateScrollHint);
  </script>
