<?php


class BDD{

    private $Connexion;

    function __construct($Server,$DBName,$User,$Mdp)
    {
        try{
            $this->connexion = new PDO("mysql:host=".$Server.";dbname=".$DBName,$User,$Mdp);
        }catch(PDOException $e){
            Log::directlyWriteLog("./Logs/LogPDO.txt",$e->getMessage(),null,  null);
            die();
        }catch(Exception $e){
            Log::directlyWriteLog("./Logs/LogStandard.txt",$e->getMessage(),  null, null);
            die();
        }
    }
	   
	function __destruct()
    {
        $this->connexion = null;
    }
	
	function nonSelectQuery($text,$param){
    $conn = $this->connexion;
    try{
        $res = $conn->prepare($text);
        $res->execute($param);
        $this->NBLines=$res->rowCount();
    }catch(PDOException $e){
        Log::directlyWriteLog("./logs/LogPDO.txt",$e->getMessage());
        die();
    }catch(Exception $e){
        Log::directlyWriteLog("./logs/LogStandard.txt",$e->getMessage());
        die();
    }
    }

    function selectQuery($text,$param){
        $conn = $this->connexion;
        try{
            $res = $conn->prepare($text);
            $res->execute($param);
            $data=$res->fetchAll(PDO::FETCH_ASSOC);
            return $data;    
        }catch(PDOException $e){
            Log::directlyWriteLog("./logs/LogPDO.txt",$e->getMessage());
            die();
        }catch(Exception $e){
            Log::directlyWriteLog("./logs/LogStandard.txt",$e->getMessage());
            die();
        }
    }

}

?>