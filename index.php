<?php
include 'connection.php';
include 'std_app.php';
include 'std_view.php';
include 'std_class.php';

$requestMethod = $_SERVER['REQUEST_METHOD'];

$studentController = new StudentController();

if ($requestMethod === 'GET' && empty($_GET['id'])) {
    $studentController->getAllStd();
}

if ($requestMethod === 'GET' && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $studentController->getStdById($id);
}

if ($requestMethod === 'POST') {
    $jsonData = file_get_contents('php://input');

   
    if (!empty($jsonData)) {
        $data = json_decode($jsonData, true);

        if ($data !== null) {
            $studentController->insertStd($data);
        } else {
            echo json_encode(['message' => 'Invalid data'], 400);
        }
    } else {
        echo json_encode(['message' => 'No data provided'], 400);
    }
}

if ($requestMethod === 'PUT' && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $jsonData = file_get_contents('php://input');
    $data = json_decode($jsonData, true);

    if (!empty($data) && is_array($data)) {
        $studentController->updateStd($id, $data);
    } else {
    }
}

if ($requestMethod === 'DELETE' && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $studentController->deleteStd($id);
}
?>
