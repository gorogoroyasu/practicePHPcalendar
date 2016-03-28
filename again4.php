<?php
require 'calendar.php';
 ?>

<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <title>calendar</title>
      <link href="calendar.css" media="all" rel="stylesheet" />
    </head>
    <body>
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
                while($whatDayIsItToday <= $numOfDaysInThisMonth){
                    // 今日が何日かを示す変数。　今月何日まであるかを示す変数

                    if ($whatDayIsItToday < 1){
                        ?><td><?php
                    }else if($whatDayIsItToday == $cal->idHoliday($chkholiday)){
                        ?><td class="holiday"><?php
                        echo $whatDayIsItToday;
                        $chkholiday++;
                    }else{
                        ?><td><?php echo $whatDayIsItToday;
                    }
                $whatDayIsItToday++;
                $foldingWhile++;


                if($foldingWhile%8 == 0){
                 // カレンダーの折り返しを記述。
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

        <p>
            知りたいカレンダーの西暦と月を入力
        </p>

        <form class="" action="again4.php" method="get">
            <p>西暦<input type="text" name="year" >年</p>
            <p>　　<input type="text" name="month" >月</p>
            <input type="submit" name="submit" value="送信">
        </form>
    </body>
</html>
