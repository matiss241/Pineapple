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
                <!-- Title and description -->
                <div class="description">
                    <h1 class="title">
                        Subscribe to newsletter
                    </h1>
                    <p class="text">
                        Subscribe to our newsletter and get 10% discount on pineapple glasses.
                    </p>
                </div>

                <div id="app">
                    <!-- Email input -->
                    <div class="email_input">
                        <form method="post">
                            <input type="email" name="email" placeholder="Type your email address here..." required
                                   v-model="email" @input="validateEmail"/>
                            <button type="submit" class="arrow" :disabled="isDisabled">
                                <i class="icon icon-arrow"></i>
                            </button>
                        </form>
                    </div>
                    <!-- JavaScript validation -->
                    <span class="message" name="validation_message">{{ message.email }}</span>
                    <!-- PHP validation -->
                    <span class="message" name="validation_message" v-show="false"><?php check_message() ?></span>
                    <!-- Terms of services -->
                    <div class="terms_of_services">
                        <input type="checkbox" class="checkbox" v-model="checkbox" @input="checked">
                        <label for="tos">I agree to <a href="#">terms of service</a></label>
                    </div>
                </div>
            </section>
            <!-- Footer -->
            <div class="front_page_footer">
                <?php $this->view("footer", $data); ?>
            </div>

        </div>
    </div>
    <!-- Desktop image -->
    <div class="image">
        <img src="<?= ASSETS ?>img/background.png">
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script src="<?= ASSETS ?>js/validation.js"></script>
</body>
</html>






