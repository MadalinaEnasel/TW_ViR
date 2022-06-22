<?php
include("connection.php");
extract($_POST);
if(isset($save)){
    $inputData = [
        'id_video' => validate($id_video),
        'comment_count'=> validate($comm_video)?? "",
        'views'=>validate($views)?? "",
        'category'=>validate($category)?? "",
        'upload_date'=>validate($up_date)?? "",
        'tags'=>validate($tags)?? "",
        'title'=>validate($title)?? "",
        'description'=>validate($title)?? ""
    ];
    $tableName= "video";
    $db = $conn;
    $result= insert_data($db, $tableName, $inputData);
}
function insert_data($db, $tableName, $inputData){
    $data = implode(" ",$inputData);
    if(empty($db)){
        $msg= "Database connection error";
    }elseif(empty($tableName)){
        $msg= "Table Name is empty";
    }elseif(trim( $data ) == ""){
        $msg= "Empty Data not allowed to insert";
    }else{
        $query  = "INSERT INTO ".$tableName." (";
        $query .= implode(",", array_keys($inputData)) . ') VALUES (';
        $query .= "'" . implode("','", array_values($inputData)) . "')";
        $execute= $db->query($query);
        if($execute=== true){
            $msg= "Data was inserted successfully";
        }else{
            $msg= mysqli_error($db);
        }
    }
    return $msg;
}
function validate($value) {
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}

include("connection.php");
$db = $conn;
$tableName = "video";
$columns = ['id_video', 'comment_count', 'views', 'category', 'upload_date', 'tags', 'title', 'description'];
$fetchData = fetch_data($db, $tableName, $columns);
function fetch_data($db, $tableName, $columns)
{
    if (empty($db)) {
        $msg = "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "columns Name must be defined in an indexed array";
    } elseif (empty($tableName)) {
        $msg = "Table Name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT " . $columnName . " FROM $tableName" . " ORDER BY id_video DESC";
        $result = $db->query($query);
        if ($result == true) {
            if ($result->num_rows > 0) {
                $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                $msg = $row;
            } else {
                $msg = "No Data Found";
            }
        } else {
            $msg = mysqli_error($db);
        }
    }
    return $msg;
}
