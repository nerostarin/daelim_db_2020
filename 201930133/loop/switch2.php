<?php
$age = 10;
$fee = 1250;
// 지하철 요금표
// 일반     : 1250원
// 청소년   : 720원
// 어린이   : 450원
// 노인     : 무료

if ($age >= 65) {
    //노인
    $fee = 0;
} else
// 노인이 아님
if ($age <= 18) {
    // 청소년
    $fee = 720;
} else
// 청소년이 아님
if ($age <= 9) {
    // 어린이
    $fee = 450;
} else {
    // 어린이 아님
    $fee = 1250;
}

echo $age . "세의 지하철 요금은 " . $fee . "원 입니다."; 