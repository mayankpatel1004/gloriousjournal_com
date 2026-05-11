<?php include "connection.php";
if(!isset($_SESSION['user_name'])){
    header('Location:login.html');
}
$date = date('Y-m-d');

$sqlGetRecentRecords = "SELECT * FROM current_issue ORDER BY id DESC LIMIT 0,10";
$stmt = $conn->prepare($sqlGetRecentRecords);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                        <h3 class="text-uppercase sub-header">Current Issue
                            <span class="main_header main_clr sf-heavy"> - <a href="<?php echo $url;?>current-issue-add.php" class="text-decoration-none">Add New Current Issue</a></span>
                        </h3>
                        <hr />
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <?php
                        if($result && $result != false){
                            ?>
                            <h2>List of Current Issues</h2>
                            <table class="table table-striped">
                                <tr>
                                    <th>Post Date</th>
                                    <th>Post Title</th>
                                    <th>Author Name</th>
                                    <th>Volume</th>
                                    <th>Country</th>
                                    <th>Dot Link</th>
                                </tr>
                            <?php
                            foreach($result as $data){
                                ?>
                                <tr>
                                    <td><?php echo date('d/m/Y',strtotime($data['publish_date']));?></td>
                                    <td><?php echo $data['title'];?></td>
                                    <td><?php echo $data['author_description'];?></td>
                                    <td><?php echo $data['volume'];?></td>
                                    <td><?php echo $data['country'];?></td>
                                    <td><?php echo $data['dot_link'];?></td>
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

            </div>
        </div>
    </section>

    <?php include 'include/footer.php';?>
    <?php include 'include/footerscript.php';?>
</body>

</html>