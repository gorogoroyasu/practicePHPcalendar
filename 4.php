<?php
    //タイムゾーンの設定
    date_default_timezone_set('Asia/Tokyo');

    //何曜日か？を数字で
    $dayOfTheWeek = array(
                     "Sun" => 0,
                     "Mon" => 1,
                     "Tue" => 2,
                     "Wed" => 3,
                     "Thu" => 4,
                     "Fri" => 5,
                     "Sat" => 6
                    );
    //数字を何曜日か？へ
    $dayOfTheWeekReverse = array_flip($dayOfTheWeek);

    //うるう年判定関数　ほとんど出番なし。。。
    function leapYear($year){
        if($year%400 === 0){
            return 1;
        }else if($year%100 == 0 ){
            return 0;
        }
        else if($year%4 === 0){
            return 1;
        }else{
            return 0;
        }
    }

    function calendar($year,$month){
        //31日まである月
        if($month == 01 ||
           $month == 03 ||
           $month == 05 ||
           $month == 07 ||
           $month == 08 ||
           $month == 10 ||
           $month == 12
        ){
            $max_day = 31;
        }else if(
        //30日までの月
                 $month == 04 ||
                 $month == 06 ||
                 $month == 09 ||
                 $month == 11
        ){
            $max_day = 30;
        }else if (
        //28日までの月　ここでうるう年判定関数を使う。
                $month === 2 && leapYear($year) === 0){
            $max_day = 28;
        }else{
        //上記条件に当てはまらない-> うるう年の2月で29日まである
            $max_day = 29;
        }
        return $max_day;
    }

    echo $thisMonth = date("m");
    echo $thisYear = date("Y");

    // 今月が何日まであるかを調べる。
    $numOfDaysInThisMonth = calendar($thisYear,$thisMonth);

    $today = date("d");

    // 今日の曜日は、最初の週では何日だったか？
    $findTheFirstDayFromToday = $today%7;

    // 1日が何曜日かを探すための前処理　
    // $findTheFirstDayFromToday から何日前が 1日かを探す。
    $findTheFirstDayFromToday=$findTheFirstDayFromToday-1;

    $theDayOfToday = date("D");

    //今月の1日が何曜日か？　1日の曜日を表す値が渡される。
    $dayOfTheFirstDayOfThisMonth = (int)$dayOfTheWeek[$theDayOfToday] - $findTheFirstDayFromToday;

    //もし $dayOfTheFirstDayOfThisMonth が日曜日なら、 $startLoop == 1 -> 日曜日の欄から記入が始まる。
    // もし $dayOfTheFirstDayOfThisMonth が月曜日なら、$startLoop == 0 -> 月曜日の欄から記入が始まる。
    $startLoop = 1-$dayOfTheFirstDayOfThisMonth;

    //テーブル折り返しのステータスを管理する数値。
    //1からカウントを初めて、7かいカウントしたら折り返しの処理をする。
    $foldingWhile = 1;


 ?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>calendar</title>
        <link href="calendar.css" media="all" rel="stylesheet" />
    </head>
    <body>
        <?php echo date("Y"); ?><br>
        <?php echo date("F"); ?>
        <table>
            <tr>
                <th>
                    Sun
                </th>
                <th>
                    Mon
                </th>
                <th>
                    Tue
                </th>
                <th>
                    Wed
                </th>
                <th>
                    Thu
                </th>
                <th>
                    Fri
                </th>
                <th>
                    Sat
                </th>
            </tr>
            <tr>
            <?php
                while($startLoop < $numOfDaysInThisMonth){
                ?><td><?php
                    if ($startLoop < 1){
                        echo Null;
                    }else{
                        echo $startLoop;
                    }
                $startLoop++;
                $foldingWhile++;


                if($foldingWhile%8 == 0){
                    $foldingWhile=1;
                ?></td>
                </tr>
                <tr>
                <?php
                }else{
                ?> </td><?php
                }
            }

             ?>
        </table>

    </body>
</html>
