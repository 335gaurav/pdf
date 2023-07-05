<?php

// if (!empty($_POST['submit'])) {


// }

// require "./fpdf/fpdf.php";

// $pdf = new FPDF();
// $pdf->AddPage();

// $pdf->SetFont("Arial", "I", 14);
// // $pdf->Cell(0, 10, "Registration Details", 1, 1, 'C');
// // $pdf->Cell(45, 10, "Fisrt Name", 1, 0, 'C');
// // $pdf->Cell(45, 10, "Last Name", 1, 0, 'C');
// // $pdf->Cell(65, 10, "Email", 1, 0, 'C');
// // $pdf->Cell(0, 10, "Image", 1, 1, 'C');

// // $pdf->Cell(45, 10, "$fname", 1, 0, 'C');
// // $pdf->Cell(45, 10, "$lname", 1, 0, 'C');
// // $pdf->Cell(65, 10, "$email", 1, 0, 'C');
// $pdf->Image("$image", 10, 10, 50, 50);

// $pdf->output('./temp/output.pdf', 'F');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="practice1css.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alkatra&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./login.css">
  <title>Sign-Up-Form</title>
</head>

<body>
  <?php
  include "./phpqrcode/qrlib.php";

  $PNG_TEMP_DIR = 'temp/';
  if (!file_exists($PNG_TEMP_DIR)) {
    mkdir($PNG_TEMP_DIR);
  }

  $filename = $PNG_TEMP_DIR . 'qr.png';

  if (!empty($_POST['submit'])) {

    $codestring = $_POST['fname'] . "\n";
    $codestring .= $_POST['lname'] . "\n";
    $codestring .= $_POST['email'] . "\n";
    $codestring .= $_FILES['image']['name']. "\n";

    $filename = $PNG_TEMP_DIR . 'qr' . md5($codestring) . '.png';

    //

    QRcode::png($codestring, $filename);

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "../pdf/$image");


    require "./fpdf/fpdf.php";

    $pdf = new FPDF();
    $pdf->AddPage();

    $pdf->SetFont("Arial", "I", 14);

    $pdf->Image("$image", 10, 10, 50, 50);

    $pdf->output('./temp/output.pdf', 'F');

  }
  ?>
  <div class="container">
    <form action="#" method="post" class="sign-form" id="sign-form" autocomplete="on" enctype="multipart/form-data">
      <h1 class="form-title">Student Detail's</h1>
      <p class="form-caption">See your growth and get consulting support!</p>
      <button class="google-sign-btn"><i class="fa fa-google"></i> Sign up with Google</button>

      <br>

      <div class="google-guide-container">
        <div class="hr-left"></div>
        <p class="guide-google">or fill your details with Email</p>
        <div class="hr-right"></div>
      </div>

      <label for="fname">First Name<span class="star-required">*</span></label>
      <input type="text" name="fname" placeholder="First Name" autofocus required>

      <label for="lname">Last Name<span class="star-required">*</span></label>
      <input type="text" name="lname" placeholder="Last Name" autofocus required>

      <label for="email">Email<span class="star-required">*</span></label>
      <input type="email" name="email" placeholder="mail@website.com" required>

      <label for="file">Upload your image<span class="star-required">*</span></label>
      <input type="file" name="image" placeholder="upload your image here" required>

      <br>

      <input type="checkbox" name="terms-agree" id="terms-agree" required>
      <p class="sentence-agree">I agree to the <a href="">Terms & Conditions</a></p>

      <input type="submit" value="SUBMIT" name="submit" id="submit">

      <!-- <p class="have-account-line">Already have an Account? <a href="">Sign in</a></p> -->
      <br>
      <p align="center" class="info">&copy;2023 Felix All rights reserved.</p>
      <br>

    <div align="center">
      <hr>
      <br>
      <!-- <p> Scan your QR code :</p>
      <img src=" <?php // echo $PNG_TEMP_DIR . basename($filename); ?>" style="height:200px; width:200px;" /> -->
    </div>
    </form>
  </div>
</body>

</html>

<?php
  // require_once('./fpdf186/fpdf.php');
  // require_once("./phpqrcode/qrlib.php");
  // $imagePath = 'img.png'; // Replace with the actual image path
  // $qrContent = "http://localhost/deepak/Projects/imgToQr/$imagePath"; // Replace with the content you want to encode
  
  
  // // Set error correction level and matrix point size
  // $matrixPointSize = 5; // You can adjust this value as needed
  // $errorCorrectionLevel = 'L'; // L - Low, M - Medium, Q - Quartile, H - High

  // // Generate QR code image
  // QRcode::png($qrContent, $imagePath, $errorCorrectionLevel, $matrixPointSize);




  // $pdf = new FPDF();
  // $pdf->AddPage();
  
  // $pdf->Image('img.png', 10, 10, 50, 50);
  
  // $pdf->Output('output.pdf', 'F');
?>