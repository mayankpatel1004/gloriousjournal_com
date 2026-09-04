
<?php
include "connection.php";
$allowed_domains = [
    'https://gloriousjournal.com',
    'https://gloriousfoundation.org'
];

if (!isset($_SERVER['HTTP_REFERER'])) {
    die(json_encode(["status"=>"error","message"=>"Unauthorized access"]));
}

$referer = $_SERVER['HTTP_REFERER'];

$allowed = false;
foreach ($allowed_domains as $domain) {
    if (strpos($referer, $domain) !== false) {
        $allowed = true;
        break;
    }
}

if (!$allowed) {
    die(json_encode(["status"=>"error","message"=>"Unauthorized access"]));
}
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