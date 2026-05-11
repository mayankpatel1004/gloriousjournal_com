<?php 
include "connection.php";
require_once 'phpmailer/class.phpmailer.php';
require_once 'phpmailer/class.smtp.php';

    $upload_dir = $directory_path."uploads/";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Form Data
    $author_name      = $_POST['author_name'];
    $email            = $_POST['email'];
    $contact_no       = $_POST['contact_no'];
    $institute        = $_POST['institute'];
    $country          = $_POST['country'];
    $co_authors       = $_POST['co_authors'];
    $manuscript_title = $_POST['manuscript_title'];

    // File Upload
    $new_file_name = "";
    $attachment = "";
    if(isset($_FILES['manuscript_file']['name']) && $_FILES['manuscript_file']['name'] != ""){
        $new_file_name = time() . "_" . basename($_FILES['manuscript_file']['name']);
        $tmp_name      = $_FILES['manuscript_file']['tmp_name'];

        // Upload Path
        $upload_path = $upload_dir . $new_file_name;

        // Move Uploaded File
        move_uploaded_file($tmp_name, $upload_path);
    }
    

    /*
    |--------------------------------------------------------------------------
    | INSERT INTO DATABASE
    |--------------------------------------------------------------------------
    */

    $sql = "INSERT INTO manuscript_submissions
    (
        author_name,
        email,
        contact_no,
        institute,
        country,
        co_authors,
        manuscript_title,
        manuscript_file
    )
    VALUES
    (
        :author_name,
        :email,
        :contact_no,
        :institute,
        :country,
        :co_authors,
        :manuscript_title,
        :manuscript_file
    )";

    $stmt = $conn->prepare($sql);

    $stmt->execute([
        ':author_name'      => $author_name,
        ':email'            => $email,
        ':contact_no'       => $contact_no,
        ':institute'        => $institute,
        ':country'          => $country,
        ':co_authors'       => $co_authors,
        ':manuscript_title' => $manuscript_title,
        ':manuscript_file'  => $new_file_name
    ]);


    /*
    |--------------------------------------------------------------------------
    | EMAIL VARIABLES
    |--------------------------------------------------------------------------
    */
    if(isset($_FILES['manuscript_file']['name']) && $_FILES['manuscript_file']['name'] != ""){
        
        $attachment = $upload_path;
    }

    $admin_email   = "mayank.patel104@gmail.com";
        $website_name  = "Your Website Name";

        $subject = "New Manuscript Submission";

        $message = '
        <h2>New Manuscript Submission</h2>

        <table border="1" cellpadding="10" cellspacing="0" width="100%">
            <tr>
                <td><strong>Author Name</strong></td>
                <td>'.$author_name.'</td>
            </tr>

            <tr>
                <td><strong>Email</strong></td>
                <td>'.$email.'</td>
            </tr>

            <tr>
                <td><strong>Contact No.</strong></td>
                <td>'.$contact_no.'</td>
            </tr>

            <tr>
                <td><strong>Institute/College</strong></td>
                <td>'.$institute.'</td>
            </tr>

            <tr>
                <td><strong>Country</strong></td>
                <td>'.$country.'</td>
            </tr>

            <tr>
                <td><strong>Co-authors</strong></td>
                <td>'.$co_authors.'</td>
            </tr>

            <tr>
                <td><strong>Manuscript Title</strong></td>
                <td>'.$manuscript_title.'</td>
            </tr>
        </table>
        ';

    /*
    |--------------------------------------------------------------------------
    | SEND EMAIL
    |--------------------------------------------------------------------------
    */

    try {

        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host       = $smtp_host;
        $mail->Port       = $stmp_port;
        $mail->SMTPDebug  = 0;
        $mail->SMTPAuth   = false;
        $mail->Username   = $smtp_user;
        $mail->Password   = $smtp_password;

        $mail->SMTPSecure = false;

        // Sender & Receiver
        $mail->setFrom($smtp_user, $website_name);
        $mail->addAddress($admin_email);

        // Reply To
        $mail->AddReplyTo($email, $author_name);

        // Email Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->MsgHTML($message);
        if (isset($attachment) && $attachment != "") {
            $mail->AddAttachment($attachment);
        }
        $mail->Send();
        header('Location:' . $url . 'online-submission.php?success=1');
        exit;

    } catch (phpmailerException $e) {
        echo $e->errorMessage();
    } catch (Exception $e) {
        echo $e->getMessage();
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
                <div class="col-lg-9 align-items-center section-padding">
                    <div class="hero-body" data-aos="fade-up">
                        <h3 class="text-uppercase sub-header">Online Submission<span
                                class="main_header main_clr sf-heavy"> <?php echo $tagline;?></span></h3>
                        <hr />
                        <div>
                            <p>Submit Your Manuscript Online Via Below Form</p>
                            
                            <div class="container-fluid mt-5 mb-5">
                                <div class="card shadow border-0">
                                    <div class="card-header bg-primary text-white">
                                        <h4 class="mb-0">Manuscript Submission Form</h4>
                                    </div>

                                    <div class="card-body">

                                        <form action="" method="post" enctype="multipart/form-data">

                                            <div class="row">

                                                <!-- Author Name -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Author's Full Name <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="author_name" class="form-control"
                                                        value="mayank"
                                                            required>
                                                    </div>
                                                </div>

                                                <!-- Email -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Email Address <span class="text-danger">*</span></label>
                                                        <input type="email" name="email"
                                                        value="mayankp@yopmail.com" class="form-control" required>
                                                    </div>
                                                </div>

                                                <!-- Contact -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Contact No. <span class="text-danger">*</span></label>
                                                        <input type="text" name="contact_no" class="form-control"
                                                        value="9898989898"
                                                            required>
                                                    </div>
                                                </div>

                                                <!-- Institute -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Institute/College <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="institute" 
                                                        value="test inst." class="form-control"
                                                            required>
                                                    </div>
                                                </div>

                                                <!-- Country -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Country <span class="text-danger">*</span></label>
                                                        <input type="text" name="country" 
                                                        value="IN" class="form-control" required>
                                                    </div>
                                                </div>

                                                <!-- Co-authors -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Co-authors Name <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="co_authors" class="form-control"
                                                        value="author"
                                                            required>
                                                    </div>
                                                </div>

                                                <!-- Manuscript Title Full Width -->
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Manuscript Title <span
                                                                class="text-danger">*</span></label>
                                                        <textarea name="manuscript_title" 
                                                        class="form-control" rows="3"
                                                            required>mstitle</textarea>
                                                    </div>
                                                </div>

                                                <!-- File Upload Full Width -->
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>
                                                            Upload your Manuscript
                                                            <span class="text-danger">*</span>
                                                        </label>

                                                        <input type="file" name="manuscript_file"
                                                            class="form-control-file">

                                                        <small class="text-muted">
                                                            Attach your file only in Word format (.doc / .docx)
                                                        </small>
                                                    </div>
                                                </div>

                                                <!-- Checkbox Full Width -->
                                                <div class="col-md-12">
                                                    <div class="form-group form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="copyrightCheck" required>

                                                        <label class="form-check-label" for="copyrightCheck">
                                                            I/we agree to all terms of the Copyright and declare that
                                                            the article is original,
                                                            has not been previously published and is not under
                                                            consideration for publication elsewhere.
                                                        </label>
                                                    </div>
                                                </div>

                                                <!-- Submit Button Full Width -->
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                                        Submit Manuscript
                                                    </button>
                                                </div>

                                            </div>

                                        </form>

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <?php include 'include/sidebar.php';?>
                </div>
            </div>

        </div>
    </section>

    <?php include 'include/footer.php';?>
    <?php include 'include/footerscript.php';?>
</body>

</html>