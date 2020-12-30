<?php
class getLatestQoutation
{
    public static $Qoutationid;
    public static $RequestorName;
    public static $RequestorEmail;
    public static $RequestorPhone;
    public static $QoutationDate;
    public static $QoutationStatus;
    public static $QoutationType;
    private $error = [];
    public function __construct()
    {
        include('api/utility/connection.php');
        $selectSql = "SELECT * FROM orders ORDER BY orderdate DESC LIMIT 1;";
        $selectSqlAction = mysqli_query($conn,$selectSql);
        if($selectSqlAction){
            if(mysqli_num_rows($selectSqlAction) > 0){
                while ($row = mysqli_fetch_assoc($selectSqlAction)) {
                    self::$Qoutationid = $row['orderid'];
                    self::$RequestorName = $row['orderername'];
                    self::$RequestorEmail = $row['ordereremail'];
                    self::$RequestorPhone = $row['ordererphone'];
                    self::$QoutationDate = $row['orderdate'];
                    self::$QoutationStatus = $row['orderstatus'];
                    self::$QoutationType = $row['ordertype'];
                }
            }
        }else{
            array_push($this->error,mysqli_error($selectSqlAction));
            return $this->error;
            die();
        }
    }
}