<?php
class Std {
    public function getAllStd() {
        $students = getAllStudents();
        echo $students;
    }

    public function getStdById($id) {
        $student = getStudentById($id);
        echo $student;
    }

    public function insertStd($data) {
        $studentId = insertStudent($data);
        if ($studentId) {
            echo json_encode(['studentId' => $studentId]);
        } else {
            echo json_encode(['message' => 'error'], 500);
        }
    }

    public function updateStd($id, $data) {
        $isUpdated = updateStudent($id, $data);
        if ($isUpdated) {
            echo json_encode(['message' => 'Student updated successfully']);
        } else {
            echo json_encode(['message' => 'Failed to update student'], 500);
        }
    }

    public function deleteStd($id) {
        $isDeleted = deleteStudent($id);
        if ($isDeleted) {
            echo json_encode(['message' => 'Student deleted successfully']);
        } else {
            echo json_encode(['message' => 'Failed to delete student'], 500);
        }
    }
}

?>
