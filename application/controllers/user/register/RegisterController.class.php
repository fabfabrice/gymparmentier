<?php

class RegisterController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        // var_dump($_POST);

        $userModel = new UserModel();
        $userModel->signUp(
                        $_POST['firstname'],
                        $_POST['lastname'],
                        $_POST['email'],
                        $_POST['password'],
                    );

        $http->redirectTo('/');
    }
}