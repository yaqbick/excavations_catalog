
        <?php
        require_once('layout.php');
        if(isset($_GET['name']))
        {
            $name=$_GET['name'];
            require_once("objectController.php");
            $item= get_items_by_name($name);                  //pobieranie i wyświetlanie obiektu
            echo 
            "<div class = 'row justify-content-md-center pt-5'>
             <div class = ' card col-md-4'>
            <h1>".$item->getName()."</h1><table><tr><th>Powiat:</th><td>". $item->getCounty()."</td></tr>
             <tr><th>Gmina:</th><td>". $item->getCommunity()."</td></tr>
             <tr><th>Współrzędne:</th><td>". $item->getLongitude().",".$item->getLatitude()."</td></tr>
             <tr><th>AZP:</th><td>AZP:   ". $item->getAzp()."</td></tr>
             <tr><th>Chronologia:</th><td>Chronologia:   ". $item->getChronology()."</td></tr></table>
             </div>
            ";

            $images= get_images_by_name($name);

            echo "<div class = 'col-md-4'>
            <span onclick='"."this.parentElement.style.display='none'"."' class='closebtn'>&times;</span>

            <img id='default_img' src='".$images[0]."' style='width:100%'>
            <img id='expandedImg' style='width:100%'>
            </div>
            </div>";
                                    
            echo "<div class='row pt-5'>";
            foreach($images as $image)
            {
                echo "<div class='column'>
                      <img src='".$image."'onclick='myFunction(this);'>
                      </div>";
            }
            echo "</div>";
        }
        ?>
    </body>
    </html>