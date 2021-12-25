<?php
class Database{
    public $que;
    private $servername='localhost';
    private $username='root';
    private $password='';
    private $dbname='magazin';
    private $result=array();
    private $mysqli='';

    public function __construct(){
        $this->mysqli = new mysqli($this->servername,$this->username,$this->password,$this->dbname);
    }

    public function insert($table,$para=array()){
        $table_columns = implode(',', array_keys($para));
        $table_value = implode("','", $para);

        $sql="INSERT INTO $table($table_columns) VALUES('$table_value')";

        $result = $this->mysqli->query($sql);
    }

    public function update($table,$para=array(),$id){
        $args = array();

        foreach ($para as $key => $value) {
            $args[] = "$key = '$value'";
        }

        $sql="UPDATE  $table SET " . implode(',', $args);

        $sql .=" WHERE $id";

        $result = $this->mysqli->query($sql);
    }

    public function delete($table,$id){
        $sql="DELETE FROM $table";
        $sql .=" WHERE $id ";
        $sql;
        $result = $this->mysqli->query($sql);
    }

    public $sql;

    public function select($table,$rows="*",$where = null){
        if ($where != null) {
            $sql="SELECT $rows FROM $table WHERE $where";
        }else{
            $sql="SELECT $rows FROM $table";
        }

        $this->sql = $result = $this->mysqli->query($sql);
    }

    public function __destruct(){
        $this->mysqli->close();
    }
    public function getProduse($id) {
        $query= "SELECT cos_id,cos_clientID,cos_cantitate,produse.produs_nume AS nume, produse.produs_pret AS pret, produse.produs_id AS id
        FROM cos
        INNER JOIN produse ON produse.produs_id = cos.cos_produsID 
            WHERE
            cos.cos_clientID='$id'";
        $result=$this->mysqli->query($query);
        if ($result->num_rows>0) {
            while($row=$result->fetch_assoc()) {
                $arr[]=$row;
            }
            return $arr;
        }
    }
    public function getCos($produsID,$id) {
        $query = "SELECT cos.cos_clientID as clientID,cos.cos_produsID as produsID, cos.cos_id as cos_id, cos.cos_cantitate as cantitate
        FROM cos
        INNER JOIN produse ON produse.produs_id = cos.cos_produsID
        WHERE cos.cos_clientID = '$id' AND cos.cos_produsID = '$produsID'";
        $result=$this->mysqli->query($query);
        if ($result->num_rows>0) {
            while($row=$result->fetch_assoc()) {
                $arr[]=$row;
            }
            return $arr;
        }
    }
    public function getProdusComenzi($id) {
        $query = "SELECT produse.produs_id,produse.produs_nume
        FROM produse
        WHERE produse.produs_id ='$id'";
        $result=$this->mysqli->query($query);
        return $result->fetch_row()[1];


    }
}
?>