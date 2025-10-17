<?php
header('Content-Type: application/json');
$dir = __DIR__ . "/uploads/";
$files = [];

if (file_exists($dir)) {
    $list = scandir($dir);
    foreach ($list as $file) {
        if ($file != "." && $file != "..") {
            $files[] = ["name" => $file];
        }
    }
}

echo json_encode(array_reverse($files));
?>