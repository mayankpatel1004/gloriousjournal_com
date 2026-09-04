<?php
include "connection.php";
if(!isset($_SESSION['user_name'])){
    header('Location:login.html');
}
$date = date('Y-m-d');
$record = [];


$sqlGetRecentRecords = "SELECT * FROM members ORDER BY id DESC";
$stmt = $conn->prepare($sqlGetRecentRecords);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(isset($_GET['id']) && $_GET['id'] > 0){
    $sqlGetRecentRecord = "SELECT * FROM members WHERE id = '".$_GET['id']."'";
    $stmt = $conn->prepare($sqlGetRecentRecord);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
}

if(isset($_GET['action']) && $_GET['action'] == 'delete'){
    $sqlDelete = "DELETE FROM members WHERE id = '".$_GET['id']."'";
    $stmt = $conn->prepare($sqlDelete);
    if($stmt->execute()){
        header('Location:'.$url.'membership.php');
    }
}

if(isset($_POST['ginra_id']) && $_POST['ginra_id'] != ""){
    
    try {

        if(isset($_POST['submit'])){

            $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

            $ginra_id = $_POST['ginra_id'];
            $member_name = $_POST['member_name'];
            $designation = $_POST['designation'];
            $joining_date = $_POST['joining_date'];
            $membership_type = $_POST['membership_type'];
            $display_order = $_POST['display_order'];

            
            // ======================
            // UPDATE
            // ======================
            if($id > 0){
                $sql = "UPDATE members SET
                    ginra_id = :ginra_id,
                    member_name = :member_name,
                    designation = :designation,
                    joining_date = :joining_date,
                    membership_type = :membership_type,
                    display_order = :display_order
                    WHERE id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id', $id);
            }

            // ======================
            // INSERT
            // ======================
            else {

                $sql = "INSERT INTO members
                (
                    ginra_id,
                    member_name,
                    designation,
                    joining_date,
                    membership_type,
                    display_order
                )
                VALUES
                (
                    :ginra_id,
                    :member_name,
                    :designation,
                    :joining_date,
                    :membership_type,
                    :display_order
                )";
                $stmt = $conn->prepare($sql);
            }

            // Common bindings
            $stmt->bindParam(':ginra_id', $ginra_id);
            $stmt->bindParam(':member_name', $member_name);
            $stmt->bindParam(':designation', $designation);
            $stmt->bindParam(':joining_date', $joining_date);
            $stmt->bindParam(':membership_type', $membership_type);
            $stmt->bindParam(':display_order', $display_order);

            // Bind attachment only when needed
           
            // echo "<pre>";
            // echo $sql;
            // print_r([
            //     'ginra_id' => $ginra_id,
            //     'member_name' => $member_name,
            //     'designation' => $designation,
            //     'present_location' => $present_location,
            //     'joining_date' => $joining_date,
            //     'membership_type' => $membership_type,
            //     'display_order' => $display_order,
            //     'id' => $id
            // ]);
            // exit;

            $stmt->execute();

            header('Location:'.$url.'membership.html');
            exit;
        }

    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}



$id = 0;
$ginra_id = "";
$member_name = "";
$designation = "";
$joining_date = "";
$membership_type = "";
$display_order = "";

if(isset($record) && $record > 0){
    $id = $record['id'];
    $ginra_id = $record['ginra_id'];
    $member_name = $record['member_name'];
    $designation = $record['designation'];
    $joining_date = $record['joining_date'];
    $membership_type = $record['membership_type'];
    $display_order = $record['display_order'];
}

if(isset($record) && $record > 0){
    $id = $record['id'];
    $ginra_id = $record['ginra_id'];
    $member_name = $record['member_name'];
    $designation = $record['designation'];
    $joining_date = $record['joining_date'];
    $membership_type = $record['membership_type'];
    $display_order = $record['display_order'];
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
                        <h3 class="text-uppercase sub-header">Add Membership
                            <span class="main_header main_clr sf-heavy"> - <a href="logout.php" class="text-decoration-none">Logout</a></span>
                        </h3>
                        <hr />
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form name="membership" method="post" action="" enctype="multipart/form-data">
                            <table class="table table-striped">
                                <tr>
                                    <td>Ginera ID</td>
                                    <td>
                                        <input type="hidden" class="form-control" name="id" value="<?php echo $id;?>" />
                                        <input type="text" class="form-control" name="ginra_id" value="<?php echo $ginra_id;?>" required />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Member Name</td>
                                    <td><input type="text" class="form-control" name="member_name" value="<?php echo $member_name;?>" required /></td>
                                </tr>
                                <tr>
                                    <td>Designation</td>
                                    <td><input type="text" class="form-control" name="designation" value="<?php echo $designation;?>" /></td>
                                </tr>
                                <tr>
                                    <td>Date of Joining</td>
                                    <td><input type="date" class="form-control" name="joining_date" value="<?php echo $joining_date;?>" required /></td>
                                </tr>
                                <tr>
                                    <td>Membership Type</td>
                                    <td>
                                        <select name="membership_type" class="form-control" required>
                                            <option value="">Select Membership Type</option>
                                            <option value="Faculty" <?php echo ($membership_type == 'Faculty') ? 'selected' : ''; ?>>Faculty</option>
                                            <option value="Achievers" <?php echo ($membership_type == 'Achievers') ? 'selected' : ''; ?>>Achievers</option>
                                        </select>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>Order</td>
                                    <td><input type="text" class="form-control" name="display_order" value="<?php echo $display_order;?>" /></td>
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
                    <h2>List of Members</h2>
                    <table class="table table-striped">
                        <tr>
                            <th>GineraID</th>
                            <th>Member Name</th>
                            <th>Designation</th>
                            <th>Date Of Joining</th>
                            <th>Membership Type</th>
                            <th>Order</th>
                            <th>Action</th>
                        </tr>
                    <?php
                    foreach($result as $data){
                        ?>
                        <tr>
                            <td><?php echo $data['ginra_id'];?></td>
                            <td><?php echo $data['member_name'];?></td>
                            <td><?php echo $data['designation'];?></td>
                            <td><?php echo $data['joining_date'];?></td>
                            <td><?php echo $data['membership_type'];?></td>
                            <td><?php echo $data['display_order'];?></td>
                            <td>
                                <a href="<?php echo $url;?>/membership.html?id=<?php echo $data['id'];?>">Edit</a>
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
                window.location.href = '<?php echo $url;?>/membership.php?action=delete&id='+id;
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