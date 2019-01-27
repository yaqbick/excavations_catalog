<?php 
    if(isset($_POST['name']))
    {
        echo "<div id='status'></div>";
    }
    else
    {
    require_once('layout.php');
    require_once('objectController.php');
    

    $names=get_all_names();
    $communities = get_all_communities();
    $counties=get_all_counties();
    


    echo "<div  class = 'row justify-content-md-center pt-5'>
         <div class='col-md-4'></div><div class='col-md-4 filter'>
         <form name ='myForm' id='filter' action='catalog.php' method='post' onsubmit='filter()'>
         ";

         foreach($communities as $community)
         {
             echo "<input type='checkbox' class='community' name='community' value='$community'><label  for='$community'>$community</label>";
         }
    echo "<br>";
        foreach($counties as $county)
        {
            echo "<input type='checkbox' class='county' name='county' value='$county'><label  for='$county'>$county</label>";
        }
    echo "</div><div class='col-md-4'><button class='btn btn-info' type='submit'>szukaj</button></form></div></div>";
    // echo "<button onclick='ajax()'>test</button>";

    
        $n=0;
        for($i=0; $i<1; $i++)
        {
            echo "<div id='status' class='row justify-content-md-center pt-5'>";
            for($j=0;$j<4;$j++)
            {
                echo "<div class='card col-md-2 catalog_item'>

                    <a href='/excavation.php?name=".$names[$j+$n]."'>
                    <img class='card-img-top' src='/Images/".$names[$j+$n].".jpg' alt='Card image cap'></a>
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
    }

       

?>
</body>
</html>
