<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ASSETS ?>css/header.css">
    <link rel="stylesheet" href="<?= ASSETS ?>css/footer.scss">
    <link rel="stylesheet" href="<?= ASSETS ?>css/home.css">
    <link rel="stylesheet" href="<?= ASSETS ?>font/style.css">
    <title><?= $data['page_title'] . " | " . WEBSITE_TITLE ?></title>
</head>
<body>

<div class="front_page">
    <div class="subscription">
        <!-- Header -->
        <div class="front_page_header">
            <?php $this->view("header", $data); ?>
        </div>

        <div class="main">
            <section>
                <div class="description">
                    <!-- Trophy image -->
                    <div class="trophy">
                        <img src="<?= ASSETS ?>img/trophy.svg">
                    </div>
                    <!-- Title -->
                    <h1 class="title">
                        Thanks for subscribing!
                    </h1>
                    <!-- Description -->
                    <p class="text">
                        You have successfully subscribed to our email listing. Check your email for the discount code.
                    </p>
                    <!-- Link to database page -->
                    <a href="<?= ROOT ?>showDatabase">Check the database</a>

                </div>
            </section>
            <!-- Footer -->
            <div class="front_page_footer">
                <?php $this->view("footer", $data); ?>
            </div>

        </div>
    </div>
    <!-- Image -->
    <div class="image">
        <img src="<?= ASSETS ?>img/background.png">
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script src="<?= ASSETS ?>js/validation.js"></script>
</body>
</html>






