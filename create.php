
    <?php require_once('layout.php');?>
    <form method="post">
    <div class="container pt-5 pl-5">
        <div class="row">
            <div class="form-group col-md-4">
                <label for="name">nazwa:</label>
                <input type="text" class="form-control" name="name">
                <label class="pt-2" for="name">gmina:</label>
                <input type="text" class="form-control" name="community">
                <label class="pt-2" for="name">powiat:</label>
                <input type="text" class="form-control" name="county">
                <label class="pt-2" for="name">długość geograficzna:</label>
                <input type="text" class="form-control" name="longitude">
                <label class="pt-2" for="name">szerokość geograficzna:</label>
                <input type="text" class="form-control" name="latitude">
                <label  class="pt-2" for="name">AZP:</label>
                <input type="text" class="form-control" name="azp">
                <label class="pt-2" for="name">chronologia:</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group col-md-4">
                <label for="name">Opis:</label>
                <textarea class="form-control content" name="description"></textarea>
                <label for="name" class="pt-5">Badania:</label>
                <textarea class="form-control content " name="research"></textarea>
            </div>
            <div class="form-group col-md-4 ">
                <label for="name">Literatura:</label>
                <textarea class="form-control content" name="literature"></textarea>
                    <div class="submit">                  
                        <button type="submit" class=" btn btn-success">DODAJ OBIEKT <img width="100" height="100" src ="https://www.freeiconspng.com/uploads/green-checkmark-png-1.png"></button>
        </form>
                    </div>
                    <div class="import">
                        <form action="/import.php" method="POST">
                            <button class="btn btn-info">Masowy import plików</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
    </body>
</html>