<?php
# const PI = 3.14;  // 변하지 않는 값
// 위의 PI는 3.14만 사용하는 고정값임

if (defined("PI")) {
    // 있을 경우
} else {
    // 없을 경우

    # const PI = 3.141592;
    // 위의 PI는 3.141592만 사용하는 고정값임

    define("PI", 3.14);

    // 실행 결과는 3.14
    // 상수는 하나의 값만 가질 수 있기 때문에 2번 정의할 수 없음
}

echo PI;