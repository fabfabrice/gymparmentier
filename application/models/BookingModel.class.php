<?php

class BookingModel
{
	public function listAllBookings()
    {
        $database = new Database();

        $sql = 'SELECT
                    id,
                    duration, 
                    payment,
                    user_id,
                FROM bookings 
                INNER JOIN 
                    users 
                ON bookings.user_id = users.id
                ';

        return $database->query($sql, []);
    }

    public function findOneBooking($id)
    {
    	$database = new Database();

        $sql = 'SELECT
                    duration, 
                    payment
                FROM bookings
                WHERE id = ?';

        return $database->queryOne($sql, [ $id ]);

    }

    public function addBooking(
        $duration, $payment) {

            $sql = 'INSERT INTO bookings(duration, payment) VALUES (?, ?)';

            $database = new Database();
            $database->executeSql($sql, 
                [ 
                    $duration,
                    $payment
                ]);
        }

    public function deleteBooking($id) {

        $database = new Database();

        $sql = 'DELETE FROM bookings WHERE id=?';

        $database->executeSql($sql, [ $id ]);

        
    }

    public function updateBooking(
        $id,
        $duration,
        $payment) {

        $sql = 'UPDATE bookings SET date=?, duration=?, status=?, WHERE id = ?';

                    
        $database = new Database();
        $database->executeSql($sql, 
            [ 
                $id,
                $duration,
                $payment
            ]);
        }
}