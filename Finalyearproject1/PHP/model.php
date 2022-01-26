<?php

include('server.php');

class Model
{
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "registration";
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
        } catch (\Throwable $th) {
            //throw $th;
            echo "Connection error " . $th->getMessage();
        }
    }

    public function fetch()
    {
        $data = [];
        $user_id = $_SESSION['user_id'];
        $query = "SELECT * FROM alarmstatus INNER JOIN alarmdetails ON alarmstatus.aid=alarmdetails.aid where user_id='$user_id'";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function date_range($start_date, $end_date)
    {
        $data = [];
        $username = $_SESSION['username'];
        if (isset($start_date) && isset($end_date)) {
            $query = "SELECT * FROM `alarmstatus`INNER JOIN alarmdetails ON alarmstatus.aid=alarmdetails.aid where username='$username' AND( `zonetime` > '$start_date' AND `zonetime` < '$end_date')";
            if ($sql = $this->conn->query($query)) {
                while ($row = mysqli_fetch_assoc($sql)) {
                    $data[] = $row;
                }
            }
        }

        return $data;
    }

    public function fetch1()
    {
        $data = [];
        $user_id = $_SESSION['user_id'];
        $query = "SELECT * FROM alarmdetails where user_id='$user_id'";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function fetch2()
    {
        $data = [];
        $user_id = $_SESSION['user_id'];
        $query = "SELECT * FROM zone INNER JOIN alarmdetails ON zone.aid=alarmdetails.aid where user_id='$user_id'";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function fetch3()
    {
        $data = [];
        $user_id = $_SESSION['user_id'];
        $query = "SELECT * FROM calendar where user_id='$user_id'";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        return $data;
    }

}
?>