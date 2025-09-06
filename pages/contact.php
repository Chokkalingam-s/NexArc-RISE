<style>
  @keyframes float { 0%, 100% { transform: translateY(0px) rotate(0deg);
  } 50% { transform: translateY(-15px) rotate(2deg); } } @keyframes glow
  { 0%, 100% { box-shadow: 0 0 20px rgba(59, 130, 246, 0.4); } 50% { box-shadow:
  0 0 40px rgba(59, 130, 246, 0.8), 0 0 60px rgba(147, 51, 234, 0.4); } }
  @keyframes shimmer { 0% { transform: translateX(-100%); } 100% { transform:
  translateX(100%); } } @keyframes pulse-border { 0%, 100% { border-color:
  rgba(59, 130, 246, 0.5); } 50% { border-color: rgba(147, 51, 234, 0.8);
  } } .float-animation { animation: float 6s ease-in-out infinite; } .glow-effect
  { animation: glow 3s ease-in-out infinite; } .glass-card { backdrop-filter: blur(16px);
  background: rgba(255, 255, 255, 0.1); border: 1px solid rgba(255, 255,
  255, 0.2); } .hover-lift { transition: all 0.5s cubic-bezier(0.175,
  0.885, 0.32, 1.275); } .hover-lift:hover { transform: translateY(-20px)
  scale(1.05); }
</style>
<?php
require_once __DIR__ . '/../config/db.php'; // $conn is PDO

include_once __DIR__ . "/../assets/collab_data.php";

// Fetch Scholarships
$stmt = $conn->query("SELECT * FROM Scholorship ORDER BY scholorshipId DESC");
$scholarships = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch Schools
$stmt = $conn->query("SELECT * FROM School ORDER BY schoolId DESC");
$schools = $stmt->fetchAll(PDO::FETCH_ASSOC);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input
    $name = trim($_POST['name'] ?? '');
    $dob = $_POST['dob'] ?? '';
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $degree = trim($_POST['degree'] ?? '');
    $country = trim($_POST['country'] ?? '');
    $gender = $_POST['gender'] ?? '';
    $address = trim($_POST['address'] ?? '');
    $referral = $_POST['referral'] ?? '';
    $notes = trim($_POST['notes'] ?? '');
    $interests = $_POST['interest'] ?? [];

    // Calculate age from DOB
    $age = null;
    if (!empty($dob)) {
        $birthDate = new DateTime($dob);
        $today = new DateTime();
        $age = $today->diff($birthDate)->y;
    }

    // Combine interests as comma-separated string
    $formType = implode(',', $interests);

    // Handle ID document upload
    $identity_image = null;
    if (isset($_FILES['id_doc']) && $_FILES['id_doc']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . '/../uploads/ids/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        $fileTmp = $_FILES['id_doc']['tmp_name'];
        $fileName = time() . '_' . basename($_FILES['id_doc']['name']);
        $filePath = $uploadDir . $fileName;

        if (move_uploaded_file($fileTmp, $filePath)) {
            $identity_image = 'uploads/ids/' . $fileName;
        }
    }

    // Insert into database
    $sql = "INSERT INTO form
        (name, country, dob, age, sex, address, phone_no, email, degree, identity_image, howdoyougettoknow, note, formType)
        VALUES
        (:name, :country, :dob, :age, :sex, :address, :phone_no, :email, :degree, :identity_image, :howdoyougettoknow, :note, :formType)";

    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':name' => $name,
        ':country' => $country,
        ':dob' => $dob,
        ':age' => $age,
        ':sex' => $gender,
        ':address' => $address,
        ':phone_no' => $phone,
        ':email' => $email,
        ':degree' => $degree,
        ':identity_image' => $identity_image,
        ':howdoyougettoknow' => $referral,
        ':note' => $notes,
        ':formType' => $formType
    ]);

    // Redirect or success message
    echo "<script>alert('Form submitted successfully!'); window.location.href=window.location.href;</script>";
    exit;
}
?>
<section class="max-w-6xl mx-auto px-4 py-16 relative overflow-hidden">
  <!-- Header -->
  <div class="text-center mb-8 relative z-10">
    <div class="inline-flex items-center gap-4 mb-6">
      <div class="w-16 h-16 grad_primary rounded-2xl flex items-center justify-center glow-effect">
        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
          />
        </svg>
      </div>
    </div>
    <h2 class="text-5xl font-bold gradient_text bg-clip-text text-transparent mb-2">
      Our Team
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
    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 relative z-10">
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
<div class="mt-10">
  <?php include_once __DIR__."/../components/collab_contact_us.php" ?>
</div>

</section>
