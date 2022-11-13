<?php
class GetController
{
    public static function getData($table,$select,$orderBy,$orderMode,$limitToEnd){
        return GetModel::getData($table,$select,$orderBy,$orderMode,$limitToEnd);
    }
    //
    public static function getDataFilter($table,$select,$linkTo,$operator,$equalTo,$orderBy,$orderMode,$limitToEnd)
    {
        return GetModel::getDataFilter($table,$select,$linkTo,$operator,$equalTo,$orderBy,$orderMode,$limitToEnd);
    }    
}