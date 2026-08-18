<?php
include "connection.php";
if(!isset($_SESSION['user_name'])){
    header('Location:login.html');
}
$date = date('Y-m-d');
$record = [];


$sqlGetRecentRecords = "SELECT * FROM current_issue ORDER BY id DESC LIMIT 0,10";
$stmt = $conn->prepare($sqlGetRecentRecords);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(isset($_GET['id']) && $_GET['id'] > 0){
    $sqlGetRecentRecord = "SELECT * FROM current_issue WHERE id = '".$_GET['id']."'";
    $stmt = $conn->prepare($sqlGetRecentRecord);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
}

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

            $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

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

            // ======================
            // FILE UPLOAD
            // ======================
            $attachment = "";
            $upload_dir = $directory_path . "uploads/";

            if(isset($_FILES['attachment'])){

                // Debug error
                if($_FILES['attachment']['error'] != 0){
                    // Uncomment for debugging
                    // echo "Upload Error: " . $_FILES['attachment']['error']; exit;
                }

                if($_FILES['attachment']['error'] == 0 && $_FILES['attachment']['name'] != ""){

                    if(!is_dir($upload_dir)){
                        mkdir($upload_dir, 0777, true);
                    }

                    $file_name = time() . "_" . basename($_FILES['attachment']['name']);
                    $target_file = $upload_dir . $file_name;

                    if(move_uploaded_file($_FILES['attachment']['tmp_name'], $target_file)){
                        $attachment = $file_name;
                    } else {
                        echo "Failed to move uploaded file"; exit;
                    }
                }
            }

            // ======================
            // UPDATE
            // ======================
            if($id > 0){

                if($attachment != ""){
                    $sql = "UPDATE current_issue SET
                        title = :title,
                        author_description = :author_description,
                        volume = :volume,
                        issue = :issue,
                        country = :country,
                        doi_no = :doi_no,
                        doi_link = :doi_link,
                        abstract = :abstract,
                        keywords = :keywords,
                        publish_date = :publish_date,
                        display_order = :display_order,
                        attachment = :attachment
                        WHERE id = :id";
                } else {
                    $sql = "UPDATE current_issue SET
                        title = :title,
                        author_description = :author_description,
                        volume = :volume,
                        issue = :issue,
                        country = :country,
                        doi_no = :doi_no,
                        doi_link = :doi_link,
                        abstract = :abstract,
                        keywords = :keywords,
                        publish_date = :publish_date,
                        display_order = :display_order
                        WHERE id = :id";
                }

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id', $id);
            }

            // ======================
            // INSERT
            // ======================
            else {

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
                $stmt->bindParam(':attachment', $attachment);
            }

            // Common bindings
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

            // Bind attachment only when needed
            if($attachment != "" && $id > 0){
                $stmt->bindParam(':attachment', $attachment);
            }

            $stmt->execute();

            header('Location:'.$url.'current-issue-add.html');
            exit;
        }

    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}



$id = 0;
$title = "";
$author = "";
$volume = "";
$issue = "";
$country = "India";
$doi_no = "";
$doi_link = "";
$abstract = "";
$keyword = "";
$attachment = "";
$publish_date = $date;
$order = 0;

if(isset($record) && $record > 0){
    $id = $record['id'];
    $title = $record['title'];
    $author = $record['author_description'];
    $volume = $record['volume'];
    $issue = $record['issue'];
    $country = $record['country'];
    $doi_no = $record['doi_no'];
    $doi_link = $record['doi_link'];
    $abstract = $record['abstract'];
    $keyword = $record['keywords'];
    $attachment = $record['attachment'];
    $publish_date = $record['publish_date'];
    $order = $record['display_order'];
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
                                    <td>
                                        <input type="hidden" class="form-control" name="id" value="<?php echo $id;?>" />
                                        <input type="text" class="form-control" name="title" value="<?php echo $title;?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Author</td>
                                    <td><input type="text" class="form-control" name="author_description" value="<?php echo $author;?>" /></td>
                                </tr>
                                <tr>
                                    <td>Volume</td>
                                    <td><input type="text" class="form-control" name="volume" value="<?php echo $volume;?>" /></td>
                                </tr>
                                <tr>
                                    <td>Issue</td>
                                    <td><input type="text" class="form-control" name="issue" value="<?php echo $issue;?>" /></td>
                                </tr>
                                <tr>
                                    <td>Country</td>
                                    <td><input type="text" class="form-control" name="country" value="<?php echo $country;?>" /></td>
                                </tr>
                                <tr>
                                    <td>DOI No.</td>
                                    <td><input type="text" class="form-control" name="doi_no" value="<?php echo $doi_no;?>" /></td>
                                </tr>
                                <tr>
                                    <td>DOI Link</td>
                                    <td><input type="text" class="form-control" name="doi_link" value="<?php echo $doi_link;?>" /></td>
                                </tr>
                                <tr>
                                    <td>Abstract</td>
                                    <td><textarea name="abstract" class="form-control" rows="10"><?php echo $abstract;?></textarea></td>
                                </tr>
                                <tr>
                                    <td>Keywords</td>
                                    <td><input type="text" class="form-control" name="keywords" value="<?php echo $keyword;?>" /></td>
                                </tr>
                                <tr>
                                    <td>Attahment</td>
                                    <td><input type="file" class="form-control" name="attachment" value="<?php echo $attachment;?>" />
                                    <?php if($attachment != ""):?>
                                    <a href="<?php echo $url."uploads/".$attachment;?>" target="_blank">View</a>
                                    <?php endif;?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Publish Date</td>
                                    <td><input type="date" class="form-control" name="publish_date" value="<?php echo $publish_date;?>" /></td>
                                </tr>
                                <tr>
                                    <td>Order</td>
                                    <td><input type="text" class="form-control" name="display_order" value="<?php echo $order;?>" /></td>
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
                            <th>Title / Author / DOI No</th>
                            <th>Vol. / Issue</th>
                            <th>Country</th>
                            <th>DOI Link</th>
                            <th style="width:15%;">Keywords</th>
                            <th>Abstracts</th>
                            <th>Attachment</th>
                            <th>Published</th>
                            <th>Action</th>
                        </tr>
                    <?php
                    foreach($result as $data){
                        ?>
                        <tr>
                            <td><?php echo $data['title'];?><br /><span class="text-info"><?php echo $data['author_description'];?></span><br /><span class="text-warning"><?php echo $data['doi_no'];?></span></td>
                            <td><?php echo $data['volume'];?>/<?php echo $data['issue'];?></td>
                            <td><?php echo $data['country'];?></td>
                            <td><a href="<?php echo $data['doi_link'];?>" target="_blank">View</a></td>
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
                            <td>
                                <a href="<?php echo $url;?>/current-issue-add.html?id=<?php echo $data['id'];?>">Edit</a>
                                <a href="javascript:void(0)" onclick="return fnDeleteConfirm(<?php echo $data['id'];?>)">Delete</a>
                            </td>
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