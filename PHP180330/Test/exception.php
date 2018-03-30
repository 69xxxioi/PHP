<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table border=2>
        <?php
        for ($i=1; $i <= 12; $i++) {             
            echo ("<tr>");//打印12行
            for ($j=1; $j <= 12; $j++) { 
                printf("<td align=right>%d",$i*$j);//每行打印12个<tr>标签
            }
            echo ("\n");//用于HTML代码的换行
        }

        ?>
    </table>
</body>
</html>