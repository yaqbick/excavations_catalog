
    <?php require_once('layout.php');?>

      <form action="import.php" method="post" enctype="multipart/form-data">
      <div class="container pt-5">
        <div class="row  justify-content-md-center">
          <div class="form-group col-md-4">
            <label for="name">Masowy import danych(excell):</label>
            <input type="file" name="csv">
          </div>
          <div class="form-group col-md-4">
          <label for="name">Masowy import zdjęć:</label>
            <input type="file" name="images[]" id="images" multiple="" directory="" webkitdirectory="" mozdirectory="">
          </div>
          <div class="form-group col-md-4">
          <input class="btn btn-success" type="submit" value="importuj" name="submit">
          </div>
        </div>
      </div>
      </form>

        <?php
        require_once("objectController.php");
        if(isset($_FILES['csv'])) // jeśli został wczytany plik csv, to jest umieszczany na serwerze
                                 //  a następnie zostaje wykonana funckja saveItems()
        {
            $name = $_FILES['csv']['name'];
            move_uploaded_file($_FILES['csv']['tmp_name'],$name);
            saveItems();

        }

        if(isset($_FILES['images']))   //sprawdzanie czy został wczytany folder z obrazami
        {
            $settl_array=get_all_names();  //tablica z nazwami wszystkich grodów
            $count = 0;
            
                if ($_SERVER['REQUEST_METHOD'] == 'POST')           //zapisywanie po kolei obrazów
                {
                    foreach ($_FILES['images']['name'] as $i => $name)
                    {
                        if (strlen($_FILES['images']['name'][$i]) > 1) 
                        {
                            $import=array();
                            foreach($settl_array as $settl)
                            {
                                $occurance = strpos($name, $settl);
                                validation();                          // walidacja MIME - jeszcze do zrobienia
                                if($occurance >-1)                     // jeżeli nazwa grodu wystąpiła w nazwie 
                                                                       // wczytywanego pliku, plik jest umieszczany
                                                                       //na serwerze, a ścieżka w bazie danych
                                {
                                    move_uploaded_file($_FILES['images']['tmp_name'][$i], 'Images/'.$name);
                                    var_dump($_FILES['images']['tmp_name'][$i]);
                                    $path='/Images/'.$name;
                                    $query = "INSERT INTO 29134484_yaqbick.images(name, path) VALUES('$settl','$path')";
                                    array_push($import, "exist");
                                    $link=connect();
                                    $result=mysqli_query($link, $query)  or die(mysqli_error($link));
                                    mysqli_close($link);
                                }
                            }
                            if (in_array("exist", $import))
                            {
                            }
                            else                                        //jeżeli w nazwie pliku nie wystąpiła nazwa grodu
                            {
                                echo "$name - nie ma takiego grodu. Plik nie został dodany <br>";
                            }
                            $import=null;

                            $count++;
                        }
                    }
                    echo "pomyślnie dodano zdjęcia";

                }
                mysqli_close($link);
        }
        
        function saveItems()     //funkcja czyta plik csv i zapisuje rekordy w bazie danych
        {
            $link = connect();

          if (($handle = fopen($_FILES['csv']['name'], "r")) !== FALSE) {
              while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                  $settl=array();
                  $num = count($data);
                  for ($c=1; $c < $num; $c++) {
                      array_push($settl, $data[$c]);
                  }
                  
                  
                  $query = "INSERT INTO 29134484_yaqbick.objects (name,community,county,latitude,longitude,azp) VALUES ('$settl[0]','$settl[1]','$settl[2]','$settl[3]','$settl[4]','$settl[5]');";
                  $result=mysqli_query($link, $query)  or die(mysqli_error($link));
                  echo"<br>";
                  
                  $settl=null;
              }
              mysqli_close($link);
              fclose($handle);
              echo "Pomyślnie dodano plik csv";
          }
        }

        function validation()
        {
            
        }
        ?>
    </body>
</html>