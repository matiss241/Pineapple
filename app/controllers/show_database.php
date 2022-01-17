<?php

class Show_database extends Controller
{
    function index()
    {
        $data['page_title'] = "show database";

        /*Sorting by date or email*/

        if (isset($_POST['parameters'])) {
            $applicants = $this->loadModel("applicants");
            $result = $applicants->get_all($_POST['parameters']);
            $data['applicants'] = $result;
        }

        /*Delete checked elements*/

        elseif (isset($_POST['delete_items'])) {
            $applicants = $this->loadModel("applicants");
            $result = $applicants->deleteRecords($_POST['delete_items']);
            $data['applicants'] = $result;
        }

        /*Find emails by search*/

        elseif (isset($_POST['get_email'])) {
            $applicants = $this->loadModel("applicants");
            $result = $applicants->getEmail($_POST['get_email'], 'false');
            $data['applicants'] = $result;
        }

        /*Find emails by email provider buttons*/

        elseif (isset($_POST['sort_emails'])) {
            $applicants = $this->loadModel("applicants");
            $result = $applicants->specificEmails($_POST['sort_emails']);
            $data['applicants'] = $result;

        }

        /*Load whole database*/

        else {
            $applicants = $this->loadModel("applicants");
            $result = $applicants->get_all('date');
            $data['applicants'] = $result;
        }

        /*Get all email providers for buttons*/

        $email_providers = $this->loadModel("email_providers");
        $result = $email_providers->emailProviders();
        $data['email_providers'] = $result;
        $this->view("show_database", $data);
    }
}
