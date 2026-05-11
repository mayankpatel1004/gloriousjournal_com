<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


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
    $new_file_name = time() . "_" . basename($_FILES['manuscript_file']['name']);
    $tmp_name      = $_FILES['manuscript_file']['tmp_name'];

    // Upload Path
    $upload_path = $upload_dir . $new_file_name;

    // Move Uploaded File
    move_uploaded_file($tmp_name, $upload_path);

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

    $admin_email   = "admindfdsfdsfsdaf@gmail.com";
    $website_name  = "Your Website Name";

    $smtp_host     = "smtp.gmail.com";
    $stmp_port     = 587;
    $smtp_user     = "yourgmail@gmail.com";
    $smtp_password = "your_app_password";

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

    // Attachment
    $attachment = $upload_path;


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
        $mail->SMTPAuth   = true;
        $mail->Username   = $smtp_user;
        $mail->Password   = $smtp_password;

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        // Sender & Receiver
        $mail->setFrom($smtp_user, $website_name);
        $mail->addAddress($admin_email);

        // Reply To
        $mail->AddReplyTo($email, $author_name);

        // Email Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->MsgHTML($message);

        // Attachment
        if (isset($attachment) && $attachment != "") {
            $mail->AddAttachment($attachment);
        }

        // Send Email
        $mail->Send();

        // Redirect
        header('Location:' . $url . 'online-submission.php?success=1');
        exit;

    } catch (phpmailerException $e) {

        echo $e->errorMessage();
        exit;

    } catch (Exception $e) {

        echo $e->getMessage();
        exit;
    }
}
?>