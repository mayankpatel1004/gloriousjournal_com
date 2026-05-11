<?php
include "connection.php";
if(!isset($_SESSION['user_name'])){
    header('Location:login.html');
}
$date = date('Y-m-d');

$sqlGetRecentRecords = "SELECT * FROM current_issue ORDER BY id DESC LIMIT 0,10";
$stmt = $conn->prepare($sqlGetRecentRecords);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(isset($_GET['action']) && $_GET['action'] == 'delete'){
    $sqlDelete = "DELETE FROM current_issue WHERE id = '".$_GET['id']."'";
    $stmt = $conn->prepare($sqlDelete);
    if($stmt->execute()){
        header('Location:'.$url.'current-issue-add.php');
    }
    
}
if(isset($_POST['title']) && $_POST['title'] != ""){
    try {
        if(isset($_POST['submit'])){
            $title = $_POST['title'];
            $author_description = $_POST['author_description'];
            $volume = $_POST['volume'];
            $country = $_POST['country'];
            $dot_link = $_POST['dot_link'];
            $publish_date = $_POST['publish_date'];
            $display_order = $_POST['display_order'];

            $sql = "INSERT INTO current_issue
                    (
                        title,
                        author_description,
                        volume,
                        country,
                        dot_link,
                        publish_date,
                        display_order
                    )
                    VALUES
                    (
                        :title,
                        :author_description,
                        :volume,
                        :country,
                        :dot_link,
                        :publish_date,
                        :display_order
                    )";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':author_description', $author_description);
            $stmt->bindParam(':volume', $volume);
            $stmt->bindParam(':country', $country);
            $stmt->bindParam(':dot_link', $dot_link);
            $stmt->bindParam(':publish_date', $publish_date);
            $stmt->bindParam(':display_order', $display_order);
            $stmt->execute();
            header('Location:'.$url.'current-issue-add.php');
        }

    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "include/head.php";?>
</head>

<body>
    <?php include "include/header.php";?>
    <section class="hero1">
        <div class="container custom-container-width">
            <div class="row">
                <div class="col-lg-12 align-items-center section-padding">
                    <div class="hero-body" data-aos="fade-up">
                        <h3 class="text-uppercase sub-header">Add Current Issue
                            <span class="main_header main_clr sf-heavy"> - <a href="logout.php" class="text-decoration-none">Logout</a></span>
                        </h3>
                        <hr />
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form name="current-issue-add" method="post" action="">
                            <table class="table table-striped">
                                <tr>
                                    <td>Title</td>
                                    <td><input type="text" class="form-control" name="title" /></td>
                                </tr>
                                <tr>
                                    <td>Author</td>
                                    <td><input type="text" class="form-control" name="author_description" /></td>
                                </tr>
                                <tr>
                                    <td>Volume</td>
                                    <td><input type="text" class="form-control" name="volume" /></td>
                                </tr>
                                <tr>
                                    <td>Country</td>
                                    <td><input type="text" class="form-control" name="country" value="India" /></td>
                                </tr>
                                <tr>
                                    <td>DOILink</td>
                                    <td><input type="text" class="form-control" name="dot_link" /></td>
                                </tr>
                                <tr>
                                    <td>Publish Date</td>
                                    <td><input type="date" class="form-control" name="publish_date" value="<?php echo $date;?>" /></td>
                                </tr>
                                <tr>
                                    <td>Order</td>
                                    <td><input type="text" class="form-control" name="display_order" value="0" /></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" name="submit" value="Submit" class="btn btn-primary" /></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
                <?php
                if($result && $result != false){
                    ?>
                    <h2>List of Current Issues</h2>
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Volume</th>
                            <th>Country</th>
                            <th>Dot Link</th>
                            <th>Published</th>
                            <th>Action</th>
                        </tr>
                    <?php
                    foreach($result as $data){
                        ?>
                        <tr>
                            <td><?php echo $data['title'];?></td>
                            <td><?php echo $data['author_description'];?></td>
                            <td><?php echo $data['volume'];?></td>
                            <td><?php echo $data['country'];?></td>
                            <td><?php echo $data['dot_link'];?></td>
                            <td><?php echo date('d/m/Y',strtotime($data['publish_date']));?></td>
                            <td><a href="javascript:void(0)" onclick="return fnDeleteConfirm(<?php echo $data['id'];?>)">Delete</a></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </table>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        function fnDeleteConfirm(id){
            if(!confirm("Are you sure?")){
                return false;
            } else {
                window.location.href = '<?php echo $url;?>/current-issue-add.php?action=delete&id='+id;
            }
        }
    </script>
    <?php include 'include/footer.php';?>
    <?php include 'include/footerscript.php';?>
</body>

</html>