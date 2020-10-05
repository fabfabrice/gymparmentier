<?php

class CoachingModel
{
	public function listAllCoachings()
    {
        $database = new Database();

        $sql = 'SELECT
                    id,
                    date, 
                    slot, 
                    coach,
                    user_id
                FROM coaching
                -- INNER JOIN 
                --     users 
                -- ON coaching.user_id = users.id
                -- ';

        return $database->query($sql, []);
    }

    public function findOneCoaching($id)
    {
    	$database = new Database();

        $sql = 'SELECT
                    date, 
                    slot, 
                    coach
                FROM coaching
                WHERE id = ?';

        return $database->queryOne($sql, [ $id ]);

    }

    public function addCoaching(
        $date,
		$slot,
        $coach
    ) {

        $sql = 'INSERT INTO coaching
            (
        date, 
        slot, 
        coach
    ) VALUES (?, ?, ?)';

        $database = new Database();
        $database->executeSql($sql, 
            [
                $date,
                $slot,
                $coach
            ]);    
    }

    public function deleteCoaching($id) {

        $database = new Database();

        $sql = 'DELETE FROM coaching WHERE id=?';

        $database->executeSql($sql, [ $id ]);

        
    }

    public function updateCoaching(
        $id,
        $date,
        $slot,
        $coach
    ) {
        $database = new Database();

        $sql = 'UPDATE bookings SET date=?, slot=?, coach=?, WHERE id = ?';

        $database->executeSql($sql, 
            [
                $id,
                $date,
                $slot,
                $coach
            ]);
    }

}