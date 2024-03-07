<!DOCTYPE html>
<html lang="en">
<?php 
    require_once "vendor/autoload.php"; // Include PHPMailer autoload.php file
    $msg = "";
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;
    
    if (!empty($_POST)) {
        // Initialize PHPMailer object
        $mail = new PHPMailer(true); // true enables exceptions

        try {
            // SMTP configuration
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "mailtester2250@gmail.com"; 
            $mail->Password = "hqey yxia oxga zpsx"; // Your Gmail password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            // Sender and recipient details
            $sendersName = $_POST['firstNameInput'] . " " . $_POST['lastNameInput'];
            $sendersEmail = $_POST['emailInput'];
            $sendersPosition = $_POST['positionInput'];
            $sendersPhone = $_POST['phoneInput'];
            $sendersQuantity = $_POST['quantity'];
            
            $mail->setFrom("contact@website.com", $sendersName); // Set From and FromName
            $mail->addAddress("wchoi888@live.com"); // Recipient email address
            $mail->addReplyTo($sendersEmail, "Reply");

            // Email content
            $mail->isHTML(true);
            $mail->Subject = "Enquiry from contact form on website";
            $mail->Body = "Sender's Name: " . $sendersName . "<br>";
            $mail->Body .= "Sender's Email: " . $sendersEmail . "<br>";
            $mail->Body .= "Sender's Best Phone Number: " . $sendersPhone . "<br>";
            $mail->Body .= "Sender's Best Position: " . $sendersPosition . "<br>";
            $mail->Body .= "Required Quantity: " . $sendersQuantity . "<br>";
            $mail->AltBody = 'This is a plain-text message body';

            // Send the email
            $mail->send();
            $msg = "Message has been sent successfully";
        } catch (Exception $e) {
            $msg = "Mailer Error: " . $mail->ErrorInfo;
        }
    }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/heroes/hero-1/assets/css/hero-1.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Sweetners</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-light rounded" aria-label="navbar">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
                aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse p-3 navbar-collapse d-lg-flex" id="navbar">
                <a class="navbar-brand col-lg-3 me-0" href="#"> </a>
                <ul class="navbar-nav col-lg-6 justify-content-lg-center">
                    <li class="nav-item"><a href="index.html" class="nav-link px-3 link-secondary">Home</a></li>
                    <li class="nav-item dropdown"><a href="#" class="nav-link link-secondary px-3 dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">Products</a>
                        <ul class="dropdown-menu">

                            <li><a class="dropdown-item border-bottom" href="./allulose.html">Allulose</a></li>
                            <li><a class="dropdown-item border-bottom" href="./erythritol.html">Erythritol</a></li>
                            <li><a class="dropdown-item border-bottom" href="./maltitol.html">Maltitol</a></li>
                            <li><a class="dropdown-item border-bottom" href="./monk-fruit.html">Monk Fruit Sweetener</a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item dropdown"><a href="#" class="nav-link link-secondary px-3 dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">Market Analysis</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item border-bottom" href="./market-analysis.html">Breakdown of
                                    industry
                                    segmentation</a></li>
                            <li><a class="dropdown-item border-bottom" href="./market-analysis2.html">Breakdown of
                                    customer
                                    segmentation</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="./contact.php" class="nav-link link-secondary px-3 active" aria-current="page">Contact</a></li>
                </ul>
                <div class="d-lg-flex col-lg-3 justify-content-lg-end">
                   
                </div>
            </div>
        </div>
    </nav>
    <section class="bsb-hero-1 px-3  bsb-overlay mb-5" style="background-image: url('./images/hero-image2.jpg');" aria-label="Hero Image">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-11 col-lg-9 col-xl-7 col-xxl-6 text-center text-white">
                    <h1 class="display-3 fw-bold mb-3">Contact Us</h1>
                </div>
            </div>
        </div>
        </div>
    </section>
    <main class="container col-md-7 mx-auto mb-5 ">
    <form class=" row g-3 p-5 border" action="contact.php" method="post" aria-label="Contact form">
            <h3>Please fill the form below and we would respond in less than 48hrs</h3>
            <p class="text-danger"><?php echo $msg ?>
            <div class="col-md-6 mb-3">
                <label for="firstNameInput" class="form-label">First Name</label>
                <input type="text" class="form-control" name="firstNameInput" id="firstNameInput" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="lastNameInput" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="lastNameInput" id="lastNameInput" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="emailInput " class="form-label">Work Email</label>
                <input type="email" class="form-control" name="emailInput" id="emailInput" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="phoneInput" class="form-label">Best Phone Number</label>
                <input type="tel" class="form-control" name="phoneInput" id="phoneInput" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="positionInput" class="form-label">Position</label>
                <input type="text" class="form-control" name="positionInput" id="positionInput" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="quantity" class="form-label">Required Quantity</label>
                <select class="form-select" name="quantity" id="quantity" required>
                    <option selected>Choose an option</option>
                    <option value="Truckloads">Truckloads</option>
                    <option value="Tankers">Tankers</option>
                    <option value="Pallets">Pallets(Min, 2000lbs)</option>
                    <option value="Scheduled Truckloads">Scheduled Truckloads</option>
                </select>
            </div>
            <div class="col-12">
            <button type="submit" class="btn btn-dark">Submit</button>
            </div>
        </form>
    </main>

    <footer class="py-3 bg-black text-white">
        <p class="text-center" aria-label="Copyright statement">© 2024 All rights reserved</p>
    </footer>
</body>
</html>