<?php

class CoachingController
{
	public function httpGetMethod(Http $http, array $queryFields)
	{


	}

	public function httpPostMethod(Http $http, array $formFields)
	{
		$CoachingModel = new CoachingModel();
		$CoachingModel->addCoaching(
										$_POST['date'],
										$_POST['slot'],
										$_POST['coach'],
									);
		$http->redirectTo('/user/profil');
	}
}