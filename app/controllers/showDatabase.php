<?php

class ShowDatabase extends Controller
{
    function index()
    {
        $data['page_title'] = "Show database";

        if (isset($_POST['parameters'])) {
            /*Sorting by date or email*/
            $applicants = $this->loadModel("applicants");
            $result = $applicants->get_all($_POST['parameters']);
            $data['applicants'] = $result;
        } elseif (isset($_POST['delete_items'])) {
            /*Delete checked elements*/
            $applicants = $this->loadModel("applicants");
            $result = $applicants->deleteRecords($_POST['delete_items']);
            $data['applicants'] = $result;
        } elseif (isset($_POST['get_email'])) {
            /*Find emails by search*/
            $applicants = $this->loadModel("applicants");
            $result = $applicants->getEmail($_POST['get_email'], 'false');
            $data['applicants'] = $result;
        } elseif (isset($_POST['sort_emails'])) {
            /*Find emails by email provider buttons*/
            $applicants = $this->loadModel("applicants");
            $result = $applicants->specificEmails($_POST['sort_emails']);
            $data['applicants'] = $result;
        } else {
            /*Load whole database*/
            $applicants = $this->loadModel("applicants");
            $result = $applicants->get_all('date');
            $data['applicants'] = $result;
        }

        /*Get all email providers for buttons*/
        $email_providers = $this->loadModel("emailProviders");
        $result = $email_providers->emailProviders();
        $data['email_providers'] = $result;
        $this->view("showDatabase", $data);
    }
}
