<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

use App\Utils\CommonUtils;

class TestController extends Controller
{
    const DefaultIdsNum = 3;

    public function makeIds($num)
    {
        $lengthNum = strlen((string) $num);

        $numCount =
            $lengthNum > self::DefaultIdsNum ? $lengthNum : self::DefaultIdsNum;

        return str_pad($num, $numCount, "0", STR_PAD_LEFT);
    }

    public function test()
    {
        $ids1 = $this->makeIds(1);
        $ids2 = $this->makeIds(10);
        $ids3 = $this->makeIds(123);
        $ids4 = $this->makeIds(999);
        $ids5 = $this->makeIds(1121);

        $ids6 = $this->makeIds(12345);
        $ids7 = $this->makeIds(112345678);

        // 함수 사용 예시
        // 함수 사용 예시
        $phone1 = "010-1234-5678";
        $phone2 = "01012345678";
        if (CommonUtils::isValidPhoneNumber($phone1)) {
            echo "유효한 휴대폰 번호입니다.";
        } else {
            echo "유효하지 않은 휴대폰 번호입니다.";
        }

        if (CommonUtils::isValidPhoneNumber($phone2)) {
            echo "유효한 휴대폰 번호입니다.";
        } else {
            echo "유효하지 않은 휴대폰 번호입니다.";
        }

        // 함수 사용 예시
        $dateOfBirth = "19900101";
        if (CommonUtils::isValidDateOfBirth($dateOfBirth)) {
            echo "유효한 생년월일 형식입니다.";
        } else {
            echo "유효하지 않은 생년월일 형식입니다.";
        }
    }

    public function menu_1_a()
    {
        View::share("mainMenuCode", "MENU_1");
        View::share("subMenuCode", "MENU_1_A");

        return view("home", ["menuString" => "menu_1_a"]);
    }

    public function menu_1_b()
    {
        View::share("mainMenuCode", "MENU_1");
        View::share("subMenuCode", "MENU_1_B");

        return view("home", ["menuString" => "menu_1_b"]);
    }

    public function menu_2_a()
    {
        View::share("mainMenuCode", "MENU_2");
        View::share("subMenuCode", "MENU_2_A");

        return view("home", ["menuString" => "menu_2_a"]);
    }

    public function menu_2_b()
    {
        View::share("mainMenuCode", "MENU_2");
        View::share("subMenuCode", "MENU_2_B");

        return view("home", ["menuString" => "menu_2_b"]);
    }
}
