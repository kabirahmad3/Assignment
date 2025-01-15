<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic UI with PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
      <h2>Demo</h2>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="hero">
            <h1>Welcome to Our Website</h1>
            <p>Explore our features and offerings.</p>
            <button id="learnMore">Learn More</button>
        </section>

        <section id="features">
          <div class="feature">
              <h2>Feature 1</h2>
              <p>Details about this feature.</p>
          </div>
          <div class="feature">
              <h2>Feature 2</h2>
              <p>Details about this feature.</p>
          </div>
      </section>

        <section id="form-section">
            <h2>Contact Us</h2>
            <form action="index.php" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>

                <button type="submit">Submit</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Dynamic UI with PHP. All rights reserved.</p>
    </footer>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true;
        $mail->Username = 'aa7715984@gmail.com'; 
        $mail->Password = 'twvvapxaqvrgtygq'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;


        $mail->setFrom('aa7715984@gmail.com', 'Your Website'); 
        $mail->addAddress('kabirahmad985@gmail.com', 'KABIR AHMAD'); 
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body = "You have received a new message from $name ($email):\n\n$message";

        if ($mail->send()) {
            echo "<script>
                    Swal.fire({
                        title: 'Thank you, $name!',
                        text: 'Your message has been sent successfully.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.href = '/';
                    });
                  </script>";
        } else {
            throw new Exception('Mail could not be sent.');
        }
    } catch (Exception $e) {
        echo "<script>
                Swal.fire({
                    title: 'Oops, $name!',
                    text: 'There was an error sending your message: {$mail->ErrorInfo}',
                    icon: 'error',
                    confirmButtonText: 'Try Again'
                }).then(() => {
                    window.history.back();
                });
              </script>";
    }
}
?>
