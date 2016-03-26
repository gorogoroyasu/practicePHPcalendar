<?php
require 'calendar.php';
 ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>calendar</title>
    </head>
    <body>
        <p>
            知りたいカレンダーの西暦と月を入力
        </p>
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

        <form class="" action="again4.php" method="get">
            <p>西暦<input type="text" name="year" >年</p>
            <p>　　<input type="text" name="month" >月</p>
            <input type="submit" name="submit" value="送信">
        </form>
    </body>
</html>
