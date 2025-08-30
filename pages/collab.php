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

<section class="min-h-screen overflow-hidden grid md:grid-cols-2 grid-cols-1">
  <div class="space-y-8 h-full px-4 py-6">

  <!-- Scholarships -->
  <div>
    <h2 class="gradient_text mb-6">Scholarships</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <?php foreach ($scholarships as $item): ?>
        <?php
          $image = $item['image'] ?? 'assets/default.jpg';
          $imageURL = '../nexarc-rise/uploads/' . ltrim($image);
        ?>
        <div class="bg-white/20 rounded-xl shadow-md hover:shadow-lg transition-shadow overflow-hidden">
          <div class="flex h-52">
            <img src="<?= htmlspecialchars($imageURL) ?>" alt="Scholarship" class="w-1/3 object-cover">
            <div class="p-4 flex flex-col justify-between w-2/3">
              <div>
                <h3 class="font-bold text-slate-800 text-lg mb-1"><?= htmlspecialchars($item['title']) ?></h3>
                <p class="text-indigo-600 text-sm font-medium mb-2"><?= htmlspecialchars($item['university']) ?></p>
                <p class="text-slate-600 text-sm line-clamp-4"><?= htmlspecialchars($item['description']) ?></p>
              </div>
              <?php if (!empty($item['link'])): ?>
                <a href="<?= htmlspecialchars($item['link']) ?>" target="_blank" class="text-indigo-600 hover:text-indigo-800 font-medium text-sm transition-colors">
                  Learn More →
                </a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Schools -->
  <div>
    <h2 class="gradient_text mb-6">Schools</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      <?php foreach ($schools as $school): ?>
        <?php
          $image = $school['image'] ?? 'assets/default.jpg';
          $imageURL = '../nexarc-rise/uploads/' . ltrim($image);
        ?>
        <div class="bg-white/20 rounded-xl shadow-md hover:shadow-lg transition-shadow overflow-hidden">
          <img src="<?= htmlspecialchars($imageURL) ?>" alt="School" class="w-full aspect-[16/9] object-cover">
          <div class="p-4">
            <h3 class="font-bold text-slate-800 text-lg mb-1"><?= htmlspecialchars($school['schoolname']) ?></h3>
            <p class="text-slate-600 text-sm mb-3"><?= htmlspecialchars($school['place']) ?></p>
            <?php if (!empty($school['link'])): ?>
              <a href="<?= htmlspecialchars($school['link']) ?>" target="_blank" class="gradient_text font-medium text-sm transition-colors">
                Visit Site →
              </a>
            <?php endif; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <style>
  .bar::-webkit-scrollbar {
    display: none;
  }</style>

  <div class="w-full">
    <h2 class="gradient_text mb-4">
      Student Success Stories
    </h2>
    <!-- Fixed-width parent (doesn't scroll) -->
    <div class="w-full">
      <!-- This flex row scrolls -->
      <div class="flex gap-6 overflow-y-auto pb-4 bar">
        <?php foreach ($students as $student): ?>
          <div class="flex items-center gap-4 p-6 bg-white/40 rounded-xl shadow-md flex-shrink-0 w-96">
            <div class="size-16 px-4 rounded-full <?= $student["bg"] ?>"></div>
            <div>
              <p class="font-semibold text-slate-800 text-lg"><?= $student["name"] ?></p>
              <p class="text-slate-600"><?= $student["desc"] ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  </div>
  <div>
  <?php include_once __DIR__."/../components/collab_contact_us.php" ?>
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
