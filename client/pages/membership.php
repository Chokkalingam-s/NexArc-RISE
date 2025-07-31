<section class="p-6 max-w-2xl mx-auto">
  <h2 class="text-3xl font-bold mb-4 text-center">Become a Member</h2>

  <form class="bg-white p-6 rounded-xl shadow space-y-6" oninput="document.getElementById('heard_other_wrap').classList.toggle('hidden', this.heard_from.value !== 'Other')">
    <!-- Name & DOB -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <label class="flex flex-col gap-1">
        <span class="text-sm font-medium">Full Name</span>
        <input name="full_name" type="text" required placeholder="Jane Doe" class="w-full border rounded px-3 py-2">
      </label>
      <label class="flex flex-col gap-1">
        <span class="text-sm font-medium">Date of Birth</span>
        <input name="dob" type="date" required class="w-full border rounded px-3 py-2">
      </label>
    </div>

    <!-- Degree & Country -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <label class="flex flex-col gap-1">
        <span class="text-sm font-medium">Degree</span>
        <select name="degree" required class="w-full border rounded px-3 py-2">
          <option value="" disabled selected>Select degree</option>
          <option>Bachelor's</option>
          <option>Master's</option>
          <option>PhD</option>
          <option>Diploma</option>
          <option>Other</option>
        </select>
      </label>
      <label class="flex flex-col gap-1">
        <span class="text-sm font-medium">Country</span>
        <input name="country" type="text" autocomplete="country-name" required placeholder="India" class="w-full border rounded px-3 py-2">
      </label>
    </div>

    <!-- Sex -->
    <fieldset class="space-y-2">
      <legend class="text-sm font-medium">Sex</legend>
      <div class="flex flex-wrap gap-6">
        <label class="inline-flex items-center gap-2">
          <input type="radio" name="sex" value="Male" class="accent-blue-600" required> Male
        </label>
        <label class="inline-flex items-center gap-2">
          <input type="radio" name="sex" value="Female" class="accent-blue-600"> Female
        </label>
        <label class="inline-flex items-center gap-2">
          <input type="radio" name="sex" value="Other" class="accent-blue-600"> Other
        </label>
      </div>
    </fieldset>

    <!-- Address -->
    <label class="flex flex-col gap-1">
      <span class="text-sm font-medium">Address</span>
      <textarea name="address" rows="3" required placeholder="Street, City, State, ZIP" class="w-full border rounded px-3 py-2"></textarea>
    </label>

    <!-- Phone & Email -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <label class="flex flex-col gap-1">
        <span class="text-sm font-medium">Phone Number</span>
        <input name="phone" type="tel" inputmode="tel" placeholder="+91 98765 43210" class="w-full border rounded px-3 py-2" required>
      </label>
      <label class="flex flex-col gap-1">
        <span class="text-sm font-medium">Email</span>
        <input name="email" type="email" placeholder="you@example.com" class="w-full border rounded px-3 py-2" required>
      </label>
    </div>

    <!-- ID Image Upload -->
    <label class="flex flex-col gap-1">
      <span class="text-sm font-medium">ID (Image)</span>
      <input name="id_image" type="file" accept="image/*" class="w-full border rounded px-3 py-2" required>
      <span class="text-xs text-gray-500">Accepted: JPG, PNG, HEIC</span>
    </label>

    <!-- How did you get to know -->
    <fieldset class="space-y-2">
      <legend class="text-sm font-medium">How did you get to know about us?</legend>
      <div class="flex flex-wrap gap-6">
        <label class="inline-flex items-center gap-2">
          <input type="radio" name="heard_from" value="Social Media" class="accent-blue-600" required> Social Media
        </label>
        <label class="inline-flex items-center gap-2">
          <input type="radio" name="heard_from" value="Friends" class="accent-blue-600"> Friends
        </label>
        <label class="inline-flex items-center gap-2">
          <input type="radio" name="heard_from" value="College" class="accent-blue-600"> College
        </label>
        <label class="inline-flex items-center gap-2">
          <input type="radio" name="heard_from" value="Research" class="accent-blue-600"> Research
        </label>
        <label class="inline-flex items-center gap-2">
          <input type="radio" name="heard_from" value="School" class="accent-blue-600"> School
        </label>
        <label class="inline-flex items-center gap-2">
          <input type="radio" name="heard_from" value="Other" class="accent-blue-600"> Other
        </label>
      </div>

      <!-- Show only when 'Other' is selected -->
      <div id="heard_other_wrap" class="hidden">
        <textarea name="heard_other_details" rows="3" placeholder="Please specify..." class="w-full border rounded px-3 py-2 mt-2"></textarea>
      </div>
    </fieldset>

    <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded">Apply Now</button>
  </form>
</section>
