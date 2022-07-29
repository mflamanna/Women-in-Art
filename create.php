<?php

 include './services/connection.php';


 if (isset($_POST['name'])){
 $name= $_POST['name'];
 $artist= $_POST['artist'];
 $year= $_POST['year'];
 $technique= $_POST['technique'];
 $location= $_POST['location'];
 $description= $_POST['description'];
 $img= $_POST['img'];
 $rights= $_POST['rights'];
 $author= $_POST['author'];
 

 $sql = "INSERT INTO worksofart (name, artist, year, technique, location, description, img, rights, author) VALUES ('$name', '$artist', '$year', '$technique', '$location', '$description', '$img', '$rights', '$author')";

$result = $mysqli->query($sql);

echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Created');
    window.location.href='index.php';
    </script>");

$mysqli->close();
}
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Women in Art - Create</title>
    <link rel="stylesheet" href="output.css">
    
    
  </head>
  <body>
    
    
<header>

 

</header>

<main>

<nav class="flex items-center justify-between flex-wrap bg-[#f34a47] p-6">
  <div class="flex items-center flex-shrink-0 text-white mr-6">
  <a href="./">
    <span class="fontdancing text-6xl tracking-tight">Women in Art</span>
  </>
  </div>
  <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
    <div class="ml-8 fontmanrope lg:flex-grow">
      <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-[#fddfe1] hover:text-white mr-4">
        Artists
      </a>
      <a href="create.php" class="block mt-4 lg:inline-block lg:mt-0 text-[#fddfe1] hover:text-white mr-4">
        Upload Artwork
      </a>
      <a href="./contact.php" class="block mt-4 lg:inline-block lg:mt-0 text-[#fddfe1] hover:text-white">
        Contact
      </a>
    </div>
  </div>
  <div class="relative rounded-2xl bg-white px-4 pt-5 pb-4 shadow-xl ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-lg sm:px-10">
    <div class="mx-auto max-w-md">


      <form action="search.php" method="post" class="relative mx-auto w-max">
        <input type="search" 
              class="peer cursor-pointer relative z-10 h-10 w-12 rounded-full border bg-transparent pl-12 outline-none focus:w-full focus:cursor-text focus:border-[#3829a6] focus:pl-16 focus:pr-4" />
        <svg xmlns="http://www.w3.org/2000/svg" class="absolute inset-y-0 my-auto h-8 w-12 border-r border-transparent stroke-gray-500 px-3.5 peer-focus:border-[#3829a6] peer-focus:stroke-[#3829a6]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
      </form>


    </div>
  </div>
</nav>

<div class="flex items-center justify-center h-auto bg-red-100">
      <div class="bg-white rounded-2xl border shadow-x1 p-10 max-w-lg m-5">
        <div class="flex flex-col items-center space-y-4">
          <h1 class="font-bold text-2xl text-gray-700 w-4/6 text-center">
            Upload Artwork
          </h1>
          <p class="text-sm text-gray-500 text-center w-5/6">
            Hello, please enter the information about the work of art.
          </p>
          <form action="create.php" method="post">
          <input
            type="text"
            placeholder="Name"
            class="border-2 rounded-lg w-full h-12 px-4 my-3"
            name= "name"
          />
          <input
            type="text"
            placeholder="Artist"
            class="border-2 rounded-lg w-full h-12 px-4 my-3"
            name= "artist"
          />
          <input
            type="text"
            placeholder="Year"
            class="border-2 rounded-lg w-full h-12 px-4 my-3"
            name= "year"
          />
          <input 
            type="text"
            placeholder="Technique"
            class="border-2 rounded-lg w-full h-12 px-4 my-3"
            name= "technique"
          />
          <input
            type="text"
            placeholder="Location"
            class="border-2 rounded-lg w-full h-12 px-4 my-3"
            name= "location"
          />
          <input
            type="text"
            placeholder="Description"
            class="border-2 rounded-lg w-full h-12 px-4 my-3"
            name= "description"
          />
          <input
            type="text"
            placeholder="Image URL"
            class="border-2 rounded-lg w-full h-12 px-4 my-3"
            name= "img"
          />
          <input
            type="text"
            placeholder="Rights"
            class="border-2 rounded-lg w-full h-12 px-4 my-3"
            name= "rights"
          />
          <input
            type="text"
            placeholder="Author"
            class="border-2 rounded-lg w-full h-12 px-4 my-3"
            name= "author"
          />
          <a href="/">
          <button
            class="bg-red-400 text-white rounded-md hover:bg-red-500 font-semibold px-4 py-3 w-full"
          >
            Submit
          </button>
          </a>
          </form>
        </div>
      </div>
    </div>


</main>

  </body>
</html>