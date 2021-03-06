<?php session_start();

header('Content-Type: text/plain; charset=utf-8');
header('Pragma: no-cache');
require_once('configDB.php');


// checking for @actionType
if(isset($_GET['act']) || isset($_POST['act']))
{
    $act = isset($_GET['act'])?$_GET['act']:$_POST['act'];

    switch ($act)
    {
        case 'district'        : listDistrict($DBH);	 break;
        case 'region'          : listRegion($DBH);	     break;
        case 'metro'           : listMetro($DBH);	     break;
        default                :                         break;
    }
}

/*
 * Select districts
 */
function listDistrict($DBH) {

    $cityID = (int) $_GET['cityID'];
    $str = '';
    $i = 0;
    $check = 1;

    $STH = $DBH->query('SELECT name,fk_district FROM s_district WHERE fk_city = "'.$cityID.'" ORDER BY name ASC',PDO::FETCH_OBJ);

    if($STH->rowCount()> 0) {

        while($row = $STH->fetch())
        {
            if($i == 0){
                $firstLine = $row->name;
                $i++;
            }
            $str.='<li onclick="selRegion('.$row->fk_district.')"><span data-value="'.$row->fk_district.'">'.$row->name.'</span></li>';
        }
    } else {
        $firstLine = '- Нет данных -';
        $check = 0;
    }

    $arr = array('response' => $str,'nameDistrict' => $firstLine, 'check' => $check);
    echo json_encode($arr);
}

/*
 * Select regions
 */
function listRegion($DBH) {

    $districtID = (int) $_GET['districtID'];
    $str = '';
    $i = 0;
    $check = 1;

    $STH = $DBH->query('SELECT id,name FROM s_region WHERE fk_district = "'.$districtID.'" ORDER BY name ASC',PDO::FETCH_OBJ);

    if($STH->rowCount()> 0) {

        while($row = $STH->fetch())
        {
            if($i == 0){
                $firstLine = $row->name;
                $i++;
            }
            $str.='<li onclick="selMetro('.$row->id.')"><span data-value="'.$row->id.'">'.$row->name.'</span></li>';
        }
    } else {
        $firstLine = '- Нет данных -';
        $check = 0;
    }

    $arr = array('response' => $str,'nameRegion' => $firstLine, 'check' => $check);
    echo json_encode($arr);
}


/*
 * Select metro
 */
function listMetro($DBH) {

    $metroID = (int) $_GET['metroID'];
    $str = '';
    $i = 0;

    $STH = $DBH->query('SELECT id,name FROM s_undeground WHERE fk_region = "'.$metroID.'" ORDER BY name ASC',PDO::FETCH_OBJ);

    if($STH->rowCount()> 0) {

        while($row = $STH->fetch())
        {
            if($i == 0){
                $firstLine = $row->name;
                $i++;
            }
            $str.='<li><span data-value="'.$row->id.'">'.$row->name.'</span></li>';
        }
    } else {
        $firstLine = '- Нет данных -';
    }

    $arr = array('response' => $str,'nameMetro' => $firstLine);
    echo json_encode($arr);
}











