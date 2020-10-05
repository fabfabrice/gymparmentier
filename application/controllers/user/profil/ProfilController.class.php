<?php

class ProfilController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        
        $bookingModel = new BookingModel();
        $bookings = $bookingModel->listAllBookings();
        if(array_key_exists('id', $_GET) AND ctype_digit($_GET['id'])){

            $delete_booking = $bookingModel->deleteBooking($_GET['id']);

        }
        
        $sessionModel = new SessionModel();
        $session = $sessionModel->listAllSessions();
        if(array_key_exists('id', $_GET) AND ctype_digit($_GET['id'])){
       
            $delete_session = $sessionModel->deleteSession($_GET['id']);

        }

        $coachingModel = new CoachingModel();
        $coachings = $coachingModel->listAllCoachings();
        if(array_key_exists('id', $_GET) AND ctype_digit($_GET['id'])){
       
            $delete_coaching = $coachingModel->deleteCoaching($_GET['id']);

        }
        
        
        
        return [
            'coachings'=>$coachings,
            'sessions'=>$session,
            'bookings'=>$bookings
        ];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {

    }
}