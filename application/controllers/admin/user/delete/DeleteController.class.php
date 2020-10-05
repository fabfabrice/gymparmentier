<?php

class DeleteController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	if(empty($_SESSION) == true || $_SESSION['user']['role'] != "admin" ) {
            $http->redirectTo('/');
        }
    	
    	$id= $_GET['id'];

    	$bookingModel = new BookingModel();
    	$booking = $bookingModel->findOneBooking($id);

        $http->redirectTo('/admin');
        
        $bookingModel->deleteBooking($id);
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        
    }
}