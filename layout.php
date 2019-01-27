<!DOCTYPE html>
<html>
  <head>
  <title>Lubelskie Grody</title>
    <meta name="viewport" content="initial-scale=1.0">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=q5zd6y22pfmjen97jr4rfv1s5genmdycoc9t6j30tanjga6z"></script>
    <script>tinymce.init({ selector:'textarea.content' });</script>
    <script src="https://mdbootstrap.com/wp-includes/js/wp-emoji-release.min.js?ver=4.9.9" type="text/javascript" defer=""></script>
    <script src="app.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<!-- <script>
//var name="dupa";

$.ajax({
    url: '/catalog.php',
    type: 'POST',
    data: {name: "name"},
    success: function(data){
    }
});

$.post("/catalog.php", {
    name: "Johny",
    surname: "Bravo"
});

</script> -->
    <style>

    #map 
    {
      height: 100%;
    }
      
    html, body 
    {
      height: 100%;
      background-color: #f0f0f0;
    }
      
    .submit
    {
        padding-top: 120px;
        padding-left: 30px;
    }
    .import
    {
        padding-top: 20px;
        padding-left: 30px;
    }
    table 
    {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th 
    {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    }
    .catalog_item
    {
        margin-left: auto;
        margin-right: auto;
        text-align: center;
    }
    .filter
    {
      border: 1px solid #dddddd;
      text-align: center;
      background-color:white;
    }
    .filter_item
    {
      display: inline;
      padding: 2px;
      text-decoration: none;
    }

    img {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 40%;
    }

   .column {
  float: left;
  width: 25%;
  padding: 10px;
}

/* Style the images inside the grid */
.column img {
  opacity: 0.8; 
  cursor: pointer; 
}

.column img:hover {
  opacity: 1;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* The expanding image container (positioning is needed to position the close button and the text) */


/* Expanding image text */
#imgtext {
  position: absolute;
  bottom: 15px;
  left: 15px;
  color: white;
  font-size: 20px;
}

/* Closable button inside the image */
.closebtn {
  position: absolute;
  top: 10px;
  right: 15px;
  color: white;
  font-size: 35px;
  cursor: pointer;
}

    </style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Grody Lubelszczyzny</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="/catalog.php">Katalog</a>
      <a class="nav-item nav-link" href="/map.php">Mapa</a>
      <a class="nav-item nav-link" href="/create.php">Panel Administratora</a>
    </div>
  </div>
</nav>
    </head>
    <body>