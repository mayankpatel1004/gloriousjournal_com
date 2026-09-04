<?php
include "connection.php";

session_start();

if (!isset($_SESSION['user_name'])) {
    header('Content-Type: application/json');
    echo json_encode([
        "status" => "error",
        "message" => "Unauthorized access"
    ]);
    exit;
}

header('Content-Type: application/json');

try {
    $filter_string = "";
    $params = [];

    if (isset($_GET['data']) && $_GET['data'] != "") {
        $filter_string .= " AND membership_type = :membership_type ";
        $params[':membership_type'] = $_GET['data'];
    }

    $sql = "SELECT id, ginra_id, member_name, designation, joining_date, membership_type 
            FROM members 
            WHERE 1=1 $filter_string 
            ORDER BY id DESC";

    $stmt = $conn->prepare($sql);
    $stmt->execute($params);

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        "status" => "success",
        "count" => count($result),
        "data" => $result
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

} catch (PDOException $e) {
    echo json_encode([
        "status" => "error",
        "message" => $e->getMessage()
    ]);
}
exit;
?>