<?php
class Calendar{
    private $year;
    private $month;
    private $date = 1;
    private $leapYear;
    // うるう年なら 1 うるう年じゃないなら 0
    private $jd;
    // 月のはじめの曜日を返す(文字列)
    private $firstDayStatus;
    // 月のはじめの曜日のStatus を返す。

    private $maxDay;
    private $dayOfTheWeek = array(
                     "Sunday" => 0,
                     "Monday" => 1,
                     "Tuesday" => 2,
                     "Wednesday" => 3,
                     "Thursday" => 4,
                     "Friday" => 5,
                     "Saturday" => 6
                    );


    public function __construct( $year , $month){
        $this->year = $year;
        $this->month = $month;
        $this->leapYearCheaker();
        $this->daysInTheMonth();
        $this->whatDayOfTheWeek();
        echo $this->year ."年\n";
        echo $this->month. "月\n";
        $this->firstDayStatus = $this->dayOfTheWeek["$this->jd"];
        //曜日IDを返す。
    }



    //うるう年かどうかを判定する。
    public function leapYearCheaker(){
        if($this->year%400 === 0){
            $this->leapYear = true;
        }else if($this->year%100 == 0 ){
            $this->leapYear = false;
        }
        else if($this->year%4 === 0){
            $this->leapYear = true;
        }else{
            $this->leapYear = false;
        }
    }
        // $this->maxDay にその月の最終日を格納
    public function daysInTheMonth(){
        //31日まである月
        if($this->month == 01 ||
           $this->month == 03 ||
           $this->month == 05 ||
           $this->month == 07 ||
           $this->month == 08 ||
           $this->month == 10 ||
           $this->month == 12
        ){
            $this->maxDay = 31;
        }else if(
        //30日までの月
                 $this->month == 04 ||
                 $this->month == 06 ||
                 $this->month == 09 ||
                 $this->month == 11
        ){
            $this->maxDay = 30;
        }else if (
        //28日までの月　ここでうるう年判定関数を使う。
            $this->month === 2 && $this->leapYear == 0){
            $this->maxDay = 28;
        }else{
        //上記条件に当てはまらない-> うるう年の2月で29日まである
            $this->maxDay = 29;
        }
    }

    //その月のはじめの日の値を返す。
    public function whatDayOfTheWeek(){
        $jd=cal_to_jd(CAL_GREGORIAN,$this->month,$this->date,$this->year);
        $this->jd=jddayofweek($jd,1);

    }

    public function drawCalendar(){
        $startLoop = 1 - $this->firstDayStatus;
        return $startLoop;
    }

}

$year = $_GET['year'];
$month = $_GET['month'];

if($year == Null){
    $year = 2016;
}
if($month == Null){
    $month = 4;
}

$hi = new Calendar($year,$month);
$hi->whatDayOfTheWeek();
echo $hi->$startLoop;


// echo $hi->setDate(date("Y"));
// $hi->leapYearCheaker();
// $hi->currentYear();



















 ?>
