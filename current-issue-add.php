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
            $issue = $_POST['issue'];
            $country = $_POST['country'];
            $doi_no = $_POST['doi_no'];
            $doi_link = $_POST['doi_link'];
            $abstract = $_POST['abstract'];
            $keywords = $_POST['keywords'];
            $publish_date = $_POST['publish_date'];
            $display_order = $_POST['display_order'];

            // File Upload
            $attachment = "";
            $upload_dir = $directory_path."uploads/";
            if(isset($_FILES['attachment']) && $_FILES['attachment']['error'] == 0){
                
                if(!is_dir($upload_dir)){mkdir($upload_dir, 0777, true);}
                $file_name = time() . "_" . basename($_FILES['attachment']['name']);
                $target_file = $upload_dir . $file_name;
                
                if(move_uploaded_file($_FILES['attachment']['tmp_name'], $target_file)){
                    $attachment = $file_name;
                }
            }

            $sql = "INSERT INTO current_issue
                (
                    title,
                    author_description,
                    volume,
                    issue,
                    country,
                    doi_no,
                    doi_link,
                    abstract,
                    keywords,
                    publish_date,
                    display_order,
                    attachment
                )
                VALUES
                (
                    :title,
                    :author_description,
                    :volume,
                    :issue,
                    :country,
                    :doi_no,
                    :doi_link,
                    :abstract,
                    :keywords,
                    :publish_date,
                    :display_order,
                    :attachment
                )";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':author_description', $author_description);
        $stmt->bindParam(':volume', $volume);
        $stmt->bindParam(':issue', $issue);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':doi_no', $doi_no);
        $stmt->bindParam(':doi_link', $doi_link);
        $stmt->bindParam(':abstract', $abstract);
        $stmt->bindParam(':keywords', $keywords);
        $stmt->bindParam(':publish_date', $publish_date);
        $stmt->bindParam(':display_order', $display_order);
        $stmt->bindParam(':attachment', $attachment);
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
                        <form name="current-issue-add" method="post" action="" enctype="multipart/form-data">
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
                                    <td>Issue</td>
                                    <td><input type="text" class="form-control" name="issue" /></td>
                                </tr>
                                <tr>
                                    <td>Country</td>
                                    <td><input type="text" class="form-control" name="country" value="India" /></td>
                                </tr>
                                <tr>
                                    <td>DOI No.</td>
                                    <td><input type="text" class="form-control" name="doi_no" /></td>
                                </tr>
                                <tr>
                                    <td>DOI Link</td>
                                    <td><input type="text" class="form-control" name="doi_link" /></td>
                                </tr>
                                <tr>
                                    <td>Abstract</td>
                                    <td><textarea name="abstract" class="form-control" rows="10"></textarea></td>
                                </tr>
                                <tr>
                                    <td>Keywords</td>
                                    <td><input type="text" class="form-control" name="keywords" value="" /></td>
                                </tr>
                                <tr>
                                    <td>Attahment</td>
                                    <td><input type="file" class="form-control" name="attachment" value="" /></td>
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
                            <th>Issue</th>
                            <th>Country</th>
                            <th>DOI No</th>
                            <th>DOI Link</th>
                            <th>Keywords</th>
                            <th>Abstracts</th>
                            <th>Attachment</th>
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
                            <td><?php echo $data['issue'];?></td>
                            <td><?php echo $data['country'];?></td>
                            <td><?php echo $data['doi_no'];?></td>
                            <td><?php echo $data['dot_link'];?></td>
                            <td><?php echo $data['keywords'];?></td>
                            <td>
                                <div onclick="openPopup()" style="cursor:pointer;text-decoration:underline;">View</div>
                                <div class="overlay" id="overlay"></div>
                                <div class="popup" id="popup">
                                    <span class="close-btn" onclick="closePopup()">×</span>
                                    <p><?php echo $data['abstract'];?></p>
                                </div>
                            </td>
                            <td>
                                <?php if($data['attachment'] != ""){?>
                                <a class="text-secondary" href="<?php echo $url."uploads/".$data['attachment'];?>" target="_blank">View</a>
                                <?php }?>
                            </td>
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
        function openPopup() {
            document.getElementById("popup").style.display = "block";
            document.getElementById("overlay").style.display = "block";
        }

        function closePopup() {
            document.getElementById("popup").style.display = "none";
            document.getElementById("overlay").style.display = "none";
        }
    </script>
    <?php include 'include/footer.php';?>
    <?php include 'include/footerscript.php';?>
</body>

</html>