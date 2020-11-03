<?php
// 객체를 생성
// () <== 값을 전달해 주는 역할
// 객체를 생성을 하는데..(객체를 만드는 과정 중)
// 인자값을 전달.

include "./dbinfo.php";

/*$dbinfo['master'] = [
    'dbhost' => "localhost",
    'dbuser' => "daelim5",
    'dbpass' => "123456",
    'dbschema' => "phpdaelim5", 
    'dbport' => "3306"
];*/

//$dbhost = "localhost";
//$dbuser = "daelim5";
//$dbpass = "123456";
//$dbschema = "phpdaelim5";
//$dbport = "3306";
 //$db = new mysqli($dbhost,$dbuser,$dbpass,$dbschema, $dbport);
 $db0 = new mysqli(
     $dbinfo['master']['dbhost'],
     $dbinfo['master']['dbuser'],
     $dbinfo['master']['dbpass'],
     $dbinfo['master']['dbschema'],
     $dbinfo['master']['dbport']
 );

 if ($db0) {
     echo "DB 접속 성공!"."<BR>";
    $tablename = "instagram";
    /*
    $query = "SELECT * FROM phpdaelim5.". $tablename .";"; //SQL 쿼리문
    
    //쿼리 정보를 전송해서
    //결과값.
    $result = mysqli_query($db0, $query); // DB서버로 전송
    if ($result) {
        $rows = getRowData($result); // 데이터 읽어오기
        viewTable($rows); // 테이블로 출력
    } else {
        echo "데이터 읽기 실패!";
    } 
    */

    $title = $_GET['title'];
    $query = "INSERT INTO `phpdaelim5`.".$tablename." (`title`) VALUES ('".$title."')";
    echo $query;
    $result = mysqli_query($db0, $query); // DB서버로 전송
    //페이지를 이동합니다
    $url = "insta.php";
    //header("HTTP/1.1 301 Moved Parmanently"); // post redirection
    header("location:" . $url);


} else {
     echo "DB 접속 실패!";
}

function getRowData($result) {
    //데이터 갯수
    $cnt = mysqli_num_rows($result);
    echo "데이터의 갯수는 ".$cnt. "<BR>";
    
    $rows = []; //배열 변수 초기화
    for($i=0; $i<$cnt; $i++) {
        $rows []= mysqli_fetch_object($result);
    
    }
    echo "<pre>";
    print_r($rows);
    return $rows;
}
//2차원 배열 => 테이블로 출력
 function viewTable($rows) {
    echo "<table border=1>";
    // index 배열의 갯수를 확인해서 반복함.
        for($i=0;$i<count($rows);$i++){
            // 열을 출력 <tr>
            echo "<tr>";
            
            //각각의 index 배열을 선택
            // 안에 있는 연상 배열을 반복 루프 반복문.
            foreach($rows[$i] as $value) {
                // 행 출력
                echo "<td>".$value."</td>";
            }
            
            echo "</tr>";
        }
    echo "</table>";
 }