<?php
namespace wolfpac\Controller;
class Database {
    
    private $table;
    private $method;
    private $data;
    private $format;
    public function __construct(){
      
    }
    public function table($tablename){
        //Verify if table exist
        $this->table = $tablename;
        return $this;
    }
     public function getTable(){
    return $this->table;
    } 
    public function getMethod(){
    return $this->method;
    }
    public function setMethod($method){
        $this->method = $method;
        return $this;
    }
    public function getData($data = []){
        return $this->$data;
    }
    public function get($data = []){
        $this->setMethod("get");
        $this->makeQuery($data);
        return $this;
    }
    public function post($data = []){
        $this->setMethod("post");
        $this->makeQuery($data);
        return $this;
    }
    public function update($data = []){
        $this->setMethod("update");
        $this->makeQuery($data);
        return $this;
    }
    public function delete($data =[],$force = false){
        //$this->setMethod("delete");
        if($force){
            $this->setMethod("delete");
        } else {
            $this->setMethod("soft-delete");
        }
        $this->makeQuery($data);
        return $this;
    }
    private function makeQuery($data) {
      $this->data = $data;  
      $this->setFormat();
      $this->build();
    }
    private function setFormat(){
        $format = "";
        switch($this->getMethod()){
            case 'post':
                $format = "INSERT INTO %s %s VALUES %s";
                break;
            case 'soft-delete' :
            case 'update':
                $format = "UPDATE %s SET %s WHERE %s";
                break;
                case 'delete':
                    $format = "DELETE FROM %s WHERE %s";
                    break;
                case 'get' : 
                default : 
                    $format = "SELECT %s FROM %s WHERE %s";
                    break;
            
        }
        $this->format = $format;
    }
    public function getFormat(){
        return $this->format;
    }
    //make listing with separator


    //Parse parameter
    public function parseParams($dataKey = 'filters'){
        $res = "";
        if(isset($this->getData()['filters'])){
            $res = "";
            $this->setParams($dataKey,$this->getData()[$dataKey]);
            $params = [];
            foreach ($this->getParams($dataKey) as $key => $param) {
                $params[] = "$key = $param";
            }
            $res .= $this->makeListing($params);
            return $res;
        }
    }

    public function makeListing($list = []){
        $res = "";
        $index = 0;
        foreach ($list as $value) {
            $res .= $value;
            if (!(count($list) == ($index + 1))) {
                $res .= " , ";
            }
            $index++;
        }
        return $res;
    }

    private function setParams($key, $data){
        $this->$key = $data;
        return $this;
    }
    public function getParams($key){
        return $this->$key;
    }
    private function build() {
        switch ($this->getMethod()){
            case 'update' :
                //code
                break;
            default :
            //code
            break;
        }
    }
    private function setQuery($query){
        $this->query = $query;
        return $this;
    }
    public function getQuery(){
        return $this->query;
    }
}
/*
class MariaDB extends Database {

}
echo "PAGE TEST BDD";
echo "<br/>";
$instance_of_Database_Bdd_de_production = new Database("production");
$instance_of_Database_Bdd_de_developpement = new Database("developpement");

$instance_MariaDB = new MariaDB("maria");
$instance_MariaDB->setLevel(3500);
echo $instance_MariaDB->getLevel();
//$toto = getLevel;

//echo $instance_of_Database_Bdd_de_production->table;

//$toto = "test";

$instance_of_Database_Bdd_de_production->table = "Faux nom";
$instance_of_Database_Bdd_de_production->test();
$instance_of_Database_Bdd_de_developpement->test();

$toto = "getLevel";
//echo $instance_of_Database_Bdd_de_production->$toto;
$instance_of_Database_Bdd_de_production->setLevel(3500);
$instance_of_Database_Bdd_de_developpement->setLevel(3500);
echo $instance_of_Database_Bdd_de_production->$toto();
echo "<br/>";
echo $instance_of_Database_Bdd_de_developpement->$toto();*/
