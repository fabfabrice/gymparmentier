<?php

class SessionController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

    }

    public function httpPostMethod(Http $http, array $formFields)
    {

			$SessionModel = new SessionModel();
			$SessionModel->addSession(
											$_POST['activity'],
									);

			$http->redirectTo('/user/profil');
    }
}