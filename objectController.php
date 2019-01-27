<?php
            require_once('items.php');

            function connect() // nawiązywanie połączenia z bazą danych
            {
                $link = mysqli_connect('serwer1813397.home.pl', '29134484_yaqbick', 'Jakubiki7!');
                if (!$link) 
                {
                    die('brak polaczenia z baza danych: ' . mysql_error());
                }

                return $link;
            }
            function get_all() //funkcja zwraca zawartość bazy danych w formie
            {
                $link=connect();
                $objects=array();
                $query="SELECT distinct * from 29134484_yaqbick.objects";
                $result=mysqli_query($link, $query)  or die(mysqli_error($link));
                while($row =(mysqli_fetch_assoc($result)))
                {
                    $item=new items($row['id'],$row['name'],$row['community'],$row['county'],$row['latitude'],$row['longitude'],$row['azp'],$row['chronology']);                
                    array_push($objects,$item);
                }
                return $objects;
                mysqli_close($link);
            }
            

            function get_items_by_name($name) //funkcja zwraca obiekt items o danej nazwie
            {
                $link=connect();
                $query="SELECT distinct * from 29134484_yaqbick.objects WHERE name='$name'";
                $result=mysqli_query($link, $query)  or die(mysqli_error($link));
                $result =(mysqli_fetch_assoc($result));
                mysqli_close($link);

                $item=new items($result['id'],$result['name'],$result['community'],$result['county'],$result['longitude'],$result['latitude'],$result['azp'],$result['chronology']);
                return $item;
            }

            function get_all_names() //funkcja zwraca tablicę ze wszystkimi nazwami grodów
            {
                $link=connect();
                $names=array();
                $query="SELECT distinct name from 29134484_yaqbick.objects";
                $result=mysqli_query($link, $query)  or die(mysqli_error($link));
                while($row =(mysqli_fetch_assoc($result)))
                {
                    array_push($names,$row['name']);
                }

                return $names;

                mysqli_close($link);
            }
            function get_images_by_name($name)  //funkcja zwraca tablicę ze ścieżkami obrazków o danej nazwie
            {
                $images=array();
                $link=connect();
                $query="SELECT distinct * from 29134484_yaqbick.images WHERE name='$name'";
                $result=mysqli_query($link, $query)  or die(mysqli_error($link));
                //$result =(mysqli_fetch_assoc($result));
                while($row =(mysqli_fetch_assoc($result)))
                {
                    array_push($images,$row['path']);
                }
                return $images;
                mysqli_close($link);
            }
            function get_all_counties() //funkcja zwraca tablicę ze wszystkimi nazwami powiatów
            {
                $link=connect();
                $counties=array();
                $query="SELECT distinct county from 29134484_yaqbick.objects";
                $result=mysqli_query($link, $query)  or die(mysqli_error($link));
                while($row =(mysqli_fetch_assoc($result)))
                {
                    array_push($counties,$row['county']);
                }

                return $counties;

                mysqli_close($link);
            }
            function get_all_communities() //funkcja zwraca tablicę ze wszystkimi nazwami powiatów
            {
                $link=connect();
                $communities=array();
                $query="SELECT distinct community from 29134484_yaqbick.objects";
                $result=mysqli_query($link, $query)  or die(mysqli_error($link));
                while($row =(mysqli_fetch_assoc($result)))
                {
                    array_push($communities,$row['community']);
                }

                return $communities;

                mysqli_close($link);
            }
        





        ?>