
        <?php
        require_once('layout.php');
        if(isset($_GET['name']))
        {
            $name=$_GET['name'];
            require_once("objectController.php");
            $item= get_items_by_name($name);                  //pobieranie i wyświetlanie obiektu
            echo 
            "<h1>".$item->getName()."</h1><table><tr><td>Powiat:   ". $item->getCounty()."</td></tr>
             <tr><td>Gmina:   ". $item->getCommunity()."</td></tr>
             <tr><td>Współrzędne:   ". $item->getLongitude().",".$item->getLatitude()."</td></tr>
             <tr><td>AZP:   ". $item->getAzp()."</td></tr>
             <tr><td>Chronologia:   ". $item->getChronology()."</td></tr></table>
            ";

            $images= get_images_by_name($name);

            foreach($images as $image)
            {
                echo "<img src='".$image."'>"; //pobieranie i wyświetlanie obrazów
            }
        }
        ?>

    </body>
    </html>