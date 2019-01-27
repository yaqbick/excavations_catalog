
  function myFunction(imgs) 
  {
    // Get the expanded image
    document.getElementById("default_img").style.display = "none";

    var expandImg = document.getElementById("expandedImg");
    // Get the image text
    var imgText = document.getElementById("imgtext");
    // Use the same src in the expanded image as the image being clicked on from the grid
    expandImg.src = imgs.src;
    // Use the value of the alt attribute of the clickable image as text inside the expanded image
    imgText.innerHTML = imgs.alt;
    // Show the container element (hidden with CSS)
    expandImg.parentElement.style.display = "block";
  }

  function filter()
  {
    var filter = document.getElementById("filter");
    var category = ["community", "county"];
    for(var i=0; i<category.length;i++)
    {
      var check = filter.getElementsByClassName(category[i]);

      for(var j=0; j<check.length; j++)
      {
        if(check[j].checked==true)
        {
          //alert(check[j].value);
          ajax(check[j].value)

        }
      }
    }
  }
  function ajax(check_value)
  {
    var value = 
    {
      'value': check_value
    };
    // var x=JSON.stringify(value);
    $.ajax({
      type: "POST",
      url: 'catalog.php',
      data: {value : "dupa"},
      success: function(data)
      {
          alert("success!");
      },
      error: function(xhr, textStatus, error) {
        console.log(xhr.responseText);
        console.log(xhr.statusText);
        console.log(textStatus);
        console.log(error);

      }
  });
  }




