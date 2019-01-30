<?php 
    if(isset($_POST['community'])|| isset($_POST['county']) || isset($_POST['chronology'])|| isset($_POST['azp']) )
    {
        require_once('objectController.php');
        require_once('items.php');

        // $communities = array($_POST['community']);
        // $counties = array($_POST['county']);
        // $com = "";
        // $coun= "";
        // foreach($communities as $community)
        // {
        //     $community =implode(" ", $community);

        //     $com=$community;
                
        // }
        // $string= str_replace("","OR",$com);
        $categories= array("community", "county", "chronology");
        $selected_categories=array();
        $query = str_replace("&"," 'OR ", $_SERVER['QUERY_STRING']);
        $query = str_replace("=","='",$query);
        foreach($categories as $category)
        {
            $how_many =substr_count($query,$category);
            if($how_many>0)
            {
                array_push($selected_categories, $category);
            }
        }
        $selected_categories_length= count($selected_categories);
        if($selected_categories_length > 1)
        {
            $parts=array();
            for($c=0;$c<$selected_categories_length;$c++)
            {
                if($c==0)
                {
                    $current_cat_pos=0;
                }
                else
                {
                    $current_cat_pos = strpos($query,$selected_categories[$c]);
                }
                $next_cat_pos= strpos($query,$selected_categories[$c+1])-3;
                $query_part= substr_replace($query,") AND ",$next_cat_pos);
                $query_part = "(".substr($query_part, $current_cat_pos);
                array_push($parts,$query_part);
    

            }
            $parts= implode(" ",$parts);
            $parts= substr($parts,0,-4);
            $query= urldecode("SELECT * from 29134484_yaqbick.objects WHERE ".$parts);

        }
        else
        {       
            $query = urldecode("SELECT * from 29134484_yaqbick.objects WHERE " .substr($query,0,-3));
        }
        
        $result= get_objects_by_query($query);
        if($result==null)
        {
            echo "brak wyników";
        }
        else
        {
            for($i=0; $i<1; $i++)
            {
                echo "<div id='status' class='row justify-content-md-center pt-5'>";
                foreach($result as $res)
                {
                    echo "<div class='card col-md-2 catalog_item'>
    
                        <a href='/excavation.php?name=".$res->getName()."'>
                        <img class='card-img-top' src='".$res->getImage()."' alt='Card image cap'></a>
                        <div class='card-body'>
                        <h5 class='card-title'>".$res->getName()."</h5>
                        <p class='card-text'>This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class='card-text'><small class='text-muted'>Last updated 3 mins ago</small></p>
                        </div>
                        </div>";
                }
                echo"</div>";
            }
        }
        



    }
    else
    {
    require_once('layout.php');
    require_once('objectController.php');
    

    $result=get_all();
    $communities = get_all_communities();
    $counties=get_all_counties();
    


    echo "<div  class = 'row justify-content-md-center pt-5'>
         <div class='col-md-4'></div><div class='col-md-4 filter'>
         <form name ='myForm' id='filter'>
         ";
    echo "Gmina:   ";
         foreach($communities as $community)
         {
             echo "<input type='checkbox' class='community' name='community' value='$community'><label  for='$community'>$community</label>";
         }
    echo "<br>";
    echo "Powiat:   ";
        foreach($counties as $county)
        {
            echo "<input type='checkbox' class='county' name='county' value='$county'><label  for='$county'>$county</label>";
        }
    echo "<br>";
    echo "Chronologia:   ";
    echo "<input type='checkbox' class='chronology' name='chronology' value='prehistoria'><label  for='prehistoria'>prehistoria</label>";
    echo "<input type='checkbox' class='chronology' name='chronology' value='wczesne średniowiecze'><label  for='wczesne średniowiecze'>wczesne śrendiowiecze</label>";
    echo "<br>";
    echo "</div><div class='col-md-4'><button class='btn btn-info' type='button' onclick='filter()'>szukaj</button></form></div></div>";
    // echo "<button onclick='ajax()'>test</button>";

    
        for($i=0; $i<1; $i++)
        {
            echo "<div id='status' class='row justify-content-md-center pt-5'>";
            foreach($result as $res)
            {
                echo "<div class='card col-md-2 catalog_item'>

                    <a href='/excavation.php?name=".$res->getName()."'>
                    <img class='card-img-top' src='".$res->getImage()."' alt='Card image cap'></a>
                    <div class='card-body'>
                    <h5 class='card-title'>".$res->getName()."</h5>
                    <p class='card-text'>This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class='card-text'><small class='text-muted'>Last updated 3 mins ago</small></p>
                    </div>
                    </div>";
            }
            echo"</div>";
        }
     }

       

?>
</body>
</html>
