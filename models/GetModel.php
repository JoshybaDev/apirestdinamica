<?php
require_once "Connection.php";
class GetModel{
    public static function getData($table,$select,$orderBy,$orderMode,$limitToEnd)
    {
        $sql ="select $select from  $table ";
        //con ordenamiento
        if($orderBy!=null && $orderMode!=null)
        {
            $sql.=" ORDER BY $orderBy $orderMode";
        }
        //con limite
        if($limitToEnd!=null)
        {
            $sql.= " LIMIT $limitToEnd";
        }
        //dd($sql);
        $stmt = Connection::connect('dBapi')->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
    public static function getDataFilter($table,$select,$linkTo,$operator,$equalTo,$orderBy,$orderMode,$limitToEnd)
    {
        $sql ="SELECT $select FROM  $table WHERE ";
        $linkToArray = explode(",",$linkTo);
        $operatorArray = explode(",",$operator);
        $equalToArray = explode(";",$equalTo);
        $wheres="";
        if(self::sizeequals($linkToArray,$operatorArray,$equalToArray))
        {
            for ($i=0; $i < count($linkToArray); $i++) 
            { 
                $stringOperator=self::operatores($operatorArray[$i]);
                $wheres .="$linkToArray[$i] $stringOperator :equalTo$i";
    
                if($i+1<count($linkToArray))
                $wheres.=" AND ";
            }
            $sql=$sql.$wheres;
            //Con ordenamiento
            if($orderBy!=null && $orderMode!=null)
            {
                $sql.=" ORDER BY $orderBy $orderMode";
            }
            //con limite
            if($limitToEnd!=null)
            {
                $sql.= " LIMIT $limitToEnd";
            }
            //dd($sql);
            $stmt = Connection::connect('dBapi')->prepare($sql);
            for ($i=0; $i < count($linkToArray); $i++) 
            { 
                $stmt->bindParam(":equalTo$i",$equalToArray[$i]);
            }            
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS);
        }
        else{
            
            return [];
        }
    } 
    static function sizeequals(...$array)
    {
        $result=true;
        $tamanio=count($array[0]);
        foreach ($array as $key => $value) 
        {
            if($tamanio!=count($value))
            {
                echo "item $key Incompleto\n";
                echo "tamanio principal $tamanio\n";
                echo "tamanio comparar ".count($value)."\n";
                dd($value);
                $result=false;
                break;
                
            }
        }
        return $result;
    }
    static function operatores($data)
    {
        if($data==='NOTLIKE' || $data==='notlike')
        {
            return ' NOT LIKE ';
        }
        elseif($data==='BETWEEN' || $data==='between')
        {
            //(d20200101-20200131) 
            //(n1000.25-5000.5)
            if(self::betweenvaluesisvalid($data))
            return ' BETWEEN ';
            else
            return '';
        }
        elseif($data==='=' || $data==='LIKE' || $data==='like' || $data==='>' || $data==='<' || $data==='>=' || $data==='<=' || $data==='!=')
        {
            return $data;
        }
        else{
            return "=";
        }
    }
    static function betweenvaluesisvalid($value)
    {
        $caracterbase=substr($value,0,2);
        if($caracterbase==='(d' || $caracterbase==='(n')
        {
            return true;
        }
        else{
            return false;
        }
    }
    static function betweenvalues($value)
    {

    }
}