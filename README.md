# PINEAPPLE
## Clone github repo to your local machene
To run this project locally clone this repo: `git clone git@github.com:matiss241/Web-Developer-Test.git`

## Set up MAMP
- To run this application you can download [MAMP](https://www.mamp.info/en/downloads/)
- Once MAMP is downloaded and opened go to > MAMP/PREFERENCES/Web server
- As document root choose pineapple directory
- Apache webserver was used in production

## Prepare database information
- To change database information, go to app/core/config.php
- Set DB_USER (username for database) and DB_PASS (password for database) vareables
- Pres >Start Server
- In browzer you can type in http://localhost/public/ and you will be directed to the Home page
- To access the database go to http://localhost/phpMyAdmin/
Run the website
Start the server with MAMP
In the browser type: `localhost:80/Views/layout.php
If the website is not opening check the port for Apache in MAMP and put it `localhost:(ApachePort)/Views/layout.php
Use of the website
You can type in an email address and submit it with a button
You will be directed to a different page where you can click on the "Check the database here" link
You will be directed to a page where all the emails from the database are displayed
You can press the email provider buttons to filter the emails
