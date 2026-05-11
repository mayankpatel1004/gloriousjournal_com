<?php include "connection.php";
$date = date('Y-m-d');

$sqlGetDistinctRecords = "SELECT DISTINCT(volume),issue FROM current_issue WHERE volume != (SELECT MAX(volume) FROM current_issue)";
$stmt = $conn->prepare($sqlGetDistinctRecords);
$stmt->execute();
$resultDistinct = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sqlGetRecentRecords = "SELECT * FROM current_issue WHERE volume != (SELECT MAX(volume) FROM current_issue)";
if(isset($_GET['volume']) && $_GET['volume'] != ""){
    $sqlGetRecentRecords = "SELECT * FROM current_issue WHERE volume = ".$_GET['volume'];
}
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
                        <h3 class="text-uppercase sub-header">Archive<span class="main_header main_clr sf-heavy"> - <?php echo $tagline;?></span>
                        </h3>
                        <hr />
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-9">
                        <?php
                        if($result && $result != false){
                            ?>
                            <div><center class="text-warning">VOLUME - <?php echo $result[0]['volume'];?> & ISSUE - <?php echo $result[0]['issue'];?></center></div>
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
                                    <td>
                                        <div onclick="openPopup('<?php echo $data['id'];?>')" style="cursor:pointer;text-decoration:underline;"><?php echo $data['title'];?></div>
                                        <div class="overlay" id="overlay<?php echo $data['id'];?>"></div>
                                        <div class="popup" id="popup<?php echo $data['id'];?>">
                                            <span class="close-btn" onclick="closePopup(<?php echo $data['id'];?>)">×</span>
                                            
                                            <p class="text-primary"><?php echo $data['title'];?></p>
                                            <p><span class="text-warning">Author : </span><?php echo $data['author_description'];?></p>
                                            <p><span class="text-warning">Volume : </span><?php echo $data['volume'];?></p>
                                            <p><span class="text-warning">Country : </span><?php echo $data['country'];?></p>
                                            <p><span class="text-warning">DOI No. : </span><?php echo $data['doi_no'];?></p>
                                            <p><span class="text-warning">DOI Link : </span><?php echo $data['dot_link'];?></p>
                                            <p><b class="text-warning">Abstract</b></p>
                                            <p><?php echo $data['abstract'];?></p>
                                            <p><b class="text-warning">Keywords</b></p>
                                            <p><?php echo $data['keywords'];?></p>
                                            <?php if($data['attachment'] != ""){?>
                                            <p><b class="text-warning">Click Here to Download Full Article:</b></p>
                                            <a class="text-secondary" href="<?php echo $url."uploads/".$data['attachment'];?>" target="_blank">View</a>
                                            <?php }?>
                                        </div>
                                        </td>
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
                    <div class="col-3">
                        <?php
                        if($resultDistinct && $resultDistinct != false){
                            ?>
                            <h3 class="text-warning">Archives</h3>
                            <table class="table table-striped">                               
                            <?php
                            foreach($resultDistinct as $data){
                                ?>
                                <tr>
                                    <td><a href="<?php echo $url."archive.php?volume=".$data['volume'];?>" class="text-secondary text-decoration-none">Volume -<?php echo $data['volume']." & Issue - ".$data['issue'];?></a></td>
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
    <script type="text/javascript">
        function openPopup(id) {
            document.getElementById("popup"+id).style.display = "block";
            document.getElementById("overlay"+id).style.display = "block";
        }
        function closePopup(id) {
            document.getElementById("popup"+id).style.display = "none";
            document.getElementById("overlay"+id).style.display = "none";
        }
    </script>
    <?php include 'include/footer.php';?>
    <?php include 'include/footerscript.php';?>
</body>
</html>