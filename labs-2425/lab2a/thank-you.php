<?php

require "helpers/helper-functions.php";

session_start();

$fullname = $_SESSION['fullname'];
$birthdate = $_SESSION['birthdate'];
$contact_number = $_SESSION['contact_number'];
$sex = $_SESSION['sex'];
$program = $_SESSION['program'];
$address = $_SESSION['address'];
$password = md5($_POST['password']);
$email = $_POST['email'];
$agree = $_POST['agree'];

// Convert birthdate to DateTime object
$birthdateObject = new DateTime($birthdate);

// Current date
$now = new DateTime();

// Compute age
$age = $now->diff($birthdateObject)->y;


$_SESSION['email'] = $email;
$_SESSION['password'] = $password;
$_SESSION['agree'] = $agree;

$form_data = $_SESSION;

dump_session();

$csvFilePath = 'registrations.csv';


$file = fopen($csvFilePath, 'a');

fputcsv($file, [
  $fullname,
  $birthdate,
  $age,
  $contact_number,
  $sex,
  $program,
  $address,
  $email
]);

fclose($file);

session_destroy();
?>
<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #2</title>
    <link rel="icon" href="https://phpsandbox.io/assets/img/brand/phpsandbox.png">
    <link rel="stylesheet" href="https://assets.ubuntu.com/v1/vanilla-framework-version-4.15.0.min.css" />   
</head>
<body>

<section class="p-section--hero">
  <div class="row--50-50-on-large">
    <div class="col">
      <div class="p-section--shallow">
        <h1>
          Thank You Page
        </h1>
      </div>
      <div class="p-section--shallow">
      
        <table aria-label="Session Data">
            <thead>
                <tr>
                    <th></th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($form_data as $key => $val):
            ?>
                <tr>
                    <th><?php echo $key; ?></th>
                    <td>
                      <?php echo $val; ?>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
            <tr>
                <th>Age</th>
                <td>
                  <?php echo $age; ?>
                </td>
            </tr>
            </tbody>
        </table>
      

      </div>
    </div>
  </div>
</section>

</body>
</html>