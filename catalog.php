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
            echo "<div class='card col-md-2 catalog_item'>

                 <a href='https://lubelskiegrody.pl/excavation.php?name=".$names[$j+$n]."'>
                 <img class='card-img-top' src='https://lubelskiegrody.pl/Images/".$names[$j+$n].".jpg' alt='Card image cap'></a>
                 <div class='card-body'>
                 <h5 class='card-title'>".$names[$j+$n]."</h5>
                 <p class='card-text'>This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                 <p class='card-text'><small class='text-muted'>Last updated 3 mins ago</small></p>
                 </div>
                 </div>";
        }
        $n=$n+4;
        echo"</div>";

    }

   

?>
</body>
</html>
