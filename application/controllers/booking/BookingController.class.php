<?php

class BookingController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

		}

    public function httpPostMethod(Http $http, array $formFields)
    {

			$bookingModel = new BookingModel();
			$bookingModel->addBooking(
											$_POST['duration'],
											$_POST['payment'],
									);

			$http->redirectTo('/user/profil');
			
    }
}