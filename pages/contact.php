<style>
  @keyframes float { 0%, 100% { transform: translateY(0px) rotate(0deg);
  } 50% { transform: translateY(-15px) rotate(2deg); } } @keyframes glow
  { 0%, 100% { box-shadow: 0 0 20px rgba(59, 130, 246, 0.4); } 50% { box-shadow:
  0 0 40px rgba(59, 130, 246, 0.8), 0 0 60px rgba(147, 51, 234, 0.4); } }
  @keyframes shimmer { 0% { transform: translateX(-100%); } 100% { transform:
  translateX(100%); } } @keyframes pulse-border { 0%, 100% { border-color:
  rgba(59, 130, 246, 0.5); } 50% { border-color: rgba(147, 51, 234, 0.8);
  } } .float-animation { animation: float 6s ease-in-out infinite; } .glow-effect
  { animation: glow 3s ease-in-out infinite; } .shimmer-overlay { position:
  relative; overflow: hidden; } .shimmer-overlay::before { content: ''; position:
  absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(90deg,
  transparent, rgba(255,255,255,0.2), transparent); transform: translateX(-100%);
  transition: transform 0.6s; } .shimmer-overlay:hover::before { animation:
  shimmer 1.5s ease-in-out; } .glass-card { backdrop-filter: blur(16px);
  background: rgba(255, 255, 255, 0.1); border: 1px solid rgba(255, 255,
  255, 0.2); } .grad_primary p-4 { background: linear-gradient(135deg, #3b82f6,
  #8b5cf6, #ec4899); padding: 2px; border-radius: 20px; animation: pulse-border
  2s ease-in-out infinite; } .hover-lift { transition: all 0.5s cubic-bezier(0.175,
  0.885, 0.32, 1.275); } .hover-lift:hover { transform: translateY(-20px)
  scale(1.05); }
</style>
<section class="max-w-6xl mx-auto px-4 py-16 relative overflow-hidden">
  <!-- Header -->
  <div class="text-center mb-16 relative z-10">
    <div class="inline-flex items-center gap-4 mb-6">
      <div class="w-16 h-16 grad_primary rounded-2xl flex items-center justify-center glow-effect">
        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
          />
        </svg>
      </div>
    </div>
    <h2 class="text-5xl font-bold gradient_text bg-clip-text text-transparent mb-4">
      Contact Us
    </h2>
    <p class="text-slate-700 text-lg max-w-2xl mx-auto">
      Meet our exceptional team of innovators and leaders
    </p>
  </div>
  <?php $team = [
    [
      "name" => "Member 1",
      "email" => "email@example.com",
      "role" => "Role / Position",
      "img" => "https://placehold.co/300",
      "color" => "blue",
    ],
    [
      "name" => "Member 2",
      "email" => "email@example.com",
      "role" => "Role / Position",
      "img" => "https://placehold.co/300",
      "color" => "purple",
    ],
    [
      "name" => "Member 3",
      "email" => "email@example.com",
      "role" => "Role / Position",
      "img" => "https://placehold.co/300",
      "color" => "pink",
    ],
    [
      "name" => "Member 4",
      "email" => "email@example.com",
      "role" => "Role / Position",
      "img" => "https://placehold.co/300",
      "color" => "indigo",
    ],

  ]; ?>
    <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 relative z-10">
      <?php foreach ($team as $member): ?>
        <div class="grad_primary p-1 rounded-xl hover-lift shimmer-overlay group cursor-pointer">
          <div class="grad_primary p-2 rounded-xl relative aspect-square bg-white/40">
            <img src="<?= $member["img"] ?>" alt="<?= $member[
  "name"
] ?>" class="absolute inset-0 w-full h-full object-cover rounded-xl" />
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-black/90">
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-<?= $member[
              "color"
            ] ?>-900/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500">
            </div>
            <div class="absolute bottom-0 left-0 right-0 p-4 text-white transform translate-y-12 group-hover:translate-y-0 transition-transform duration-300">
              <h3 class="font-bold text-lg mb-1 group-hover:text-<?= $member[
                "color"
              ] ?>-300 transition-colors">
                <?= $member["name"] ?>
              </h3>
              <p class="text-sm opacity-90 mb-1 text-<?= $member[
                "color"
              ] ?>-200">
                <?= $member["role"] ?>
              </p>
              <p class="text-xs opacity-75 group-hover:text-amber-500 transition-colors">
                <?= $member["email"] ?>
              </p>
              <div class="flex gap-2 mt-3 opacity-0 group-hover:opacity-100 transition-all duration-300 delay-100">
                <div class="size-8 p-2 rounded-full flex items-center justify-center hover:bg-blue-500 transition-colors cursor-pointer">
                  <img src="/../assets/icons/instagram-brands.svg" alt="">
                </div>
                <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center hover:bg-blue-500 transition-colors cursor-pointer">
                  <img src="/../assets/icons/linkedin-brands-solid.svg" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
    </div>

<!-- Contact Form -->
      <div class="mt-10">
        <h2 class="gradient_text mb-6 text-center text-2xl font-bold">
          Contact Us
        </h2>
        <div class="bg-white/40 rounded-xl shadow-lg p-8 max-w-3xl mx-auto">
          <form class="space-y-6" method="POST" enctype="multipart/form-data">
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
                  Degree and Institution
                </span>
                <input type="text" name="degree" placeholder="e.g., B.Tech, M.Sc - University" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
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
</section>
