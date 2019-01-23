<?php 
    require_once('layout.php');
    require_once('objectController.php');
    $names=get_all_names();
    $n=0;


    for($i=0; $i<1; $i++)
    {
        echo "<div class='row justify-content-md-center pt-5'>";
        for($j=0;$j<4;$j++)
        {
            echo "<div class='card col-md-2 catalog_item'>"
                 .$names[$j+$n].
                 "<a href='https://lubelskiegrody.pl/excavation.php?name=".$names[$j+$n]."'><img width='100' heigh='100' src='https://lubelskiegrody.pl/Images/".$names[$j+$n].".jpg'></a>
                 </div>";
        }
        $n=$n+4;
        echo"</div>";

    }


?>
</body>
</html>
