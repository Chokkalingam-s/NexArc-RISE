<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

header('Content-Type: application/json');

try {
    require_once __DIR__ . '/../config/db.php';


    function calculateAge($dob) {
        if (!$dob) return null;
        $dobDate = new DateTime($dob);
        $today   = new DateTime();
        return $today->diff($dobDate)->y;
    }

    // Handle file upload
    $id_document_path = null;
    if (!empty($_FILES['id_document']['name'])) {
        $upload_dir = __DIR__ . '/../uploads/membersIdentityImage/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        $filename = time() . "_" . preg_replace("/[^a-zA-Z0-9\._-]/", "_", $_FILES['id_document']['name']);
        $target_file = $upload_dir . $filename;

        if (move_uploaded_file($_FILES['id_document']['tmp_name'], $target_file)) {
            $id_document_path = 'uploads/membersIdentityImage/' . $filename;
        }
    }

    $name         = $_POST['full_name'] ?? '';
    $dob          = $_POST['dob'] ?? null;
    $age          = calculateAge($dob);
    $country      = $_POST['country'] ?? '';
    $gender_input = $_POST['gender'] ?? '';
$gender_map = [
    'male'   => 'Male',
    'female' => 'Female',
    'other'  => 'Other'
];
$gender = $gender_map[strtolower($gender_input)] ?? null;

    $degree       = $_POST['degree'] ?? '';
    $institution  = $_POST['institution'] ?? '';
    $field_of_study = $_POST['field_of_study'] ?? '';
    $address      = $_POST['address'] ?? '';
    $phone        = $_POST['phone'] ?? '';
    $email        = $_POST['email'] ?? '';
    $heard_from   = $_POST['heard_from'] ?? '';
    $notes        = $_POST['notes'] ?? '';
    $date_request = date('Y-m-d');

    $sql = "INSERT INTO Membership 
        (name, country, dob, age, sex, address, phone_no, email, degree, designation, identity_image, howdoyougettoknow, note, membershipStatus, date_of_request)
        VALUES
        (:name, :country, :dob, :age, :sex, :address, :phone_no, :email, :degree, :designation, :identity_image, :howdoyougettoknow, :note, 'Waiting', :date_of_request)";

    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':name'             => $name,
        ':country'          => $country,
        ':dob'              => $dob,
        ':age'              => $age,
        ':sex'              => $gender,
        ':address'          => $address,
        ':phone_no'         => $phone,
        ':email'            => $email,
        ':degree'           => $degree,
        ':designation'      => $field_of_study ?: $institution,
        ':identity_image'   => $id_document_path,
        ':howdoyougettoknow'=> $heard_from,
        ':note'             => $notes,
        ':date_of_request'  => $date_request
    ]);

    // Email notification
    $to      = "nexarcrise@gmail.com";
    $subject = "New Membership Application";
    $body    = "A new membership application has been submitted.\n\n".
               "Name: $name\nEmail: $email\nCountry: $country\nPhone: $phone\nDegree: $degree\n\n".
               "Please review in the admin panel.";
    $headers = "From: nexarcrise@gmail.com\r\nReply-To: $email";

    @mail($to, $subject, $body, $headers);

    echo json_encode(["success" => true]);

} catch (Throwable $e) {
    echo json_encode(["success" => false, "message" => $e->getMessage()]);
}
