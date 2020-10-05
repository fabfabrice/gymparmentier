<?php

class SessionModel
{
	public function listAllSessions()
    {
        $database = new Database();

        $sql = 'SELECT
                    id,
                    activity, 
                FROM sessions
                INNER JOIN 
                    users 
                ON sessions.user_id = users.id
                ';

        return $database->query($sql, []);
    }

    public function findOneSession($id)
    {
    	$database = new Database();

        $sql = 'SELECT
                    activity, 
                FROM sessions
                WHERE id = ?';

        return $database->queryOne($sql, [ $id ]);

    }

    public function addSession($activity) {

        $sql = 'INSERT INTO sessions(activity) VALUES (?)';

        $database = new Database();
        $database->executeSql($activity);   
    }

    public function deleteSession($id) {

        $database = new Database();

        $sql = 'DELETE FROM sessions WHERE id=?';

        $database->executeSql($sql, [ $id ]);
    }

    public function updateSession(
        $id,
        $activity) {

        $sql = 'UPDATE bookings SET activity=? WHERE id = ?';

        $database = new Database();
        $database->executeSql($sql, 
            [
                $id,
                $activity,
            ]);
        }
    }