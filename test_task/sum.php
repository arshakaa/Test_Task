<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Test_Task</title>
</head>
<body>
<?php

$x = "90.9955555555555555559";
$y = "499999999999999.88";

function mySum(string $a, $b) {
    $sum = "";
    $bool = false;
    $ra = strlen($a) - strpos($a,".") - 1;
    $rb = strlen($b) - strpos($b,".") - 1;
    $la = strlen($a) - $ra - 1;
    $lb = strlen($b) - $rb - 1;

    if ($la > $lb) {
        for ($i = 1; $i <= $la - $lb; $i++) {
            $b = substr_replace($b, "0", 0, 0);
        }
    } elseif ($la < $lb){
        for ($i = 1; $i <= $lb - $la; $i++) {
            $a = substr_replace($a, "0", 0, 0);
        }
    }

    if ($ra > $rb) {
        for ($i = 1; $i <= $ra - $rb; $i++) {
            $b = substr_replace($b, "0", strlen($b), 0);
        }
    } elseif ($ra < $rb){
        for ($i = 1; $i <= $rb - $ra; $i++) {
            $a = substr_replace($a, "0", strlen($a), 0);
        }
    }

    for ($i = strlen($a) - 1; $i >= 0; $i--) {
        if(substr($a, $i, 1) == ".") {
            $sum = substr_replace($sum, ".", 0, 0);
        } else {
            $item = (string)((int)substr($a, $i, 1) + (int)substr($b, $i, 1));

            if (strlen($item) > 1) {
                if ($bool) {
                    $item = (string)((int)$item + 1);
                   a: $sum = substr_replace($sum, substr($item, -1), 0, 0);
                    if($i == 0) {
                        $sum = substr_replace($sum, "1", 0, 0);
                    }
                    $bool = true;
                } else {
                    $sum = substr_replace($sum, substr($item, -1), 0, 0);
                    $bool = true;
                }
            } else {
                if ($bool) {
                    $item = (string)((int)$item + 1);
                    if (strlen($item) > 1) {
                        goto a;
                    }
                    $sum = substr_replace($sum, $item, 0, 0);
                    $bool = false;
                } else {
                    $sum = substr_replace($sum, $item, 0, 0);
                }
            }
        }
    }

    return $sum;
}

echo mySum($x, $y);

?>

</body>
</html>