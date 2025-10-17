<?php
header('Content-Type: application/json');
$targetDir = __DIR__ . "/uploads/";

if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true);
}

if (!empty($_FILES["apk"]["name"])) {
    $fileName = basename($_FILES["apk"]["name"]);
    $targetFile = $targetDir . $fileName;

    if (move_uploaded_file($_FILES["apk"]["tmp_name"], $targetFile)) {
        echo json_encode(["success" => true, "name" => $fileName]);
    } else {
        echo json_encode(["success" => false, "error" => "Failed to save file."]);
    }
} else {
    echo json_encode(["success" => false, "error" => "No file uploaded."]);
}
?>