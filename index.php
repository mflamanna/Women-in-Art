<?php
 include './services/connection.php';

$sql = "SELECT * FROM worksOfArt";

$result = $mysqli->query($sql);

$mysqli->close();

?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Women in Art</title>
    <link rel="stylesheet" href="output.css">
    
    
  </head>
  <body>
    
    
<header>

 
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
        <input type="text" 
              name = "search"
              class="peer cursor-pointer relative z-10 h-10 w-12 rounded-full border bg-transparent pl-12 outline-none focus:w-full focus:cursor-text focus:border-[#3829a6] focus:pl-16 focus:pr-4"/>
        <svg xmlns="http://www.w3.org/2000/svg" class="absolute inset-y-0 my-auto h-8 w-12 border-r border-transparent stroke-gray-500 px-3.5 peer-focus:border-[#3829a6] peer-focus:stroke-[#3829a6]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
      </form>


    </div>
  </div>
</nav>

</header>

<main>


<section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
          <div class="flex flex-wrap -m-4">
<?php while($row = $result->fetch_assoc()){ ?>
          <div class="fontmanrope p-4 md:w-1/3">
                        <div class="h-full rounded-xl shadow-cla-blue bg-gradient-to-r from-[#fddfe1] to-[#eae9f7] overflow-hidden">
                          <img class="lg:h-96 md:h-36 w-full object-cover object-center scale-110 transition-all duration-400 hover:scale-100" src=<?php echo $row['img'] ?> alt="Work of art">
                          <div class="p-6">
                            <h2 class="tracking-widest text-xs title-font font-medium text-gray-600 mb-1"><?php echo $row['artist'] ?></h2>
                            <h1 class="title-font text-lg text-gray-600 mb-3 font-bold"><?php echo $row['name'] ?></h1>
                            <p class="leading-relaxed mb-3"><?php echo $row['year'] ?></p>
                            <p class="leading-relaxed mb-3"><?php echo $row['location'] ?></p>
                            <div class="flex items-center flex-wrap ">
                            <a class="flex items-center flex-wrap " href="./detail.php?id=<?php echo $row['id']?>">
                              <button class="bg-gradient-to-r from-[#fddfe1] to-[#f34a47] hover:scale-105 drop-shadow-md  shadow-cla-blue px-4 py-1 rounded-lg text-[#3829a6] font-bold marginright">Learn more</button>
                            </a>
                            <a class="flex items-center flex-wrap " href="./delete.php?delete=<?php echo $row['id']?>">
                            <button class="bg-gradient-to-r from-[#fddfe1] to-[#f34a47] hover:scale-105 drop-shadow-md  shadow-cla-blue px-4 py-1 rounded-lg">
                                <img class= "h-6 w-6" src="./images/bin.png" alt="Delete">
                              </button>
                            </a>
                            <a class="flex items-center flex-wrap " href="./edit.php?id=<?php echo $row['id']?>">
                            <button class="bg-gradient-to-r from-[#fddfe1] to-[#f34a47] hover:scale-105 drop-shadow-md  shadow-cla-blue px-4 py-1 rounded-lg">
                                <img class= "h-6 w-6" src="./images/editar.png" alt="Edit">
                              </button>
                            </a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php }?>
        </div>
        </div>
      </section>


</main>

  </body>
</html>

<!-- <div class="container">
    <br/><br/>
    <form class="form-horizontal" action="search.php" method="post">
    <div class="row">
        <div class="form-group">
            <label class="control-label col-sm-4" for="email"><b>Search your book</b>:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="search" placeholder="Search here">
            </div>
            <div class="col-sm-2 m-2">
              <button type="submit" name="save" class="btn btn-success btn-sm">Submit</button>
            </div>
        </div>
    </div>
    </form>
    <div class="col-sm-2 m-2">
              <a href="./create.php">
              <button name="create" class="btn btn-success btn-sm">Create a New book</button>
              </a>
            </div>
</div> -->
