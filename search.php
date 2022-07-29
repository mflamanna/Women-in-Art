<?php
include "./services/connection.php";

$sql = "SELECT * FROM worksofart";

$result = $mysqli->query($sql);


include 'connect_test_db.php';
$searchErr = '';
$art_details='';
if(isset($_POST['search']))
{
    if(!empty($_POST['search']))
    {
        $search = $_POST['search'];
        $stmt = $con->prepare("SELECT * from worksofart WHERE name like '%$search%' or artist like '%$search%' or location like '%$search%'");
        $stmt->execute();
        $art_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //print_r($art_details);
        
    }
    else
    {
        $searchErr = "Please enter the information";
    }
    
}


$mysqli->close();
?>    

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>Women in Art - Search results</title>
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

  <body>
  <div class="min-w-screen min-h-screen bg-[#eae9f7] p-5 lg:p-10 overflow-hidden relative">

                <?php
                 if(!$art_details)
                 {
                    echo '<tr>No data found</tr>';
                 }
                 else{
                    foreach($art_details as $key=>$value)
                    {
                        ?>
                        
                        <div class="mb-5 w-full max-w-6xl rounded bg-white shadow-xl p-10 lg:p-20 mx-auto text-gray-800 relative md:text-left">
                            <div class="md:flex items-center -mx-10">
                                <div class="w-full md:w-1/2 px-10 mb-10 md:mb-0">
                                    <div class="relative">
                                        <img src=<?php echo $value['img']?> class="w-full relative z-10" alt="">
                                    </div>
                                </div>
                                <div class="w-full md:w-1/2 px-10">
                                    <div class="fontmanrope mb-10">
                                        <h1 class="font-bold text-3xl mb-5"><?php echo $value['name'];?></h1>
                                        <h2 class="font-bold text-1xl mb-5"><?php echo $value['artist'];?></h2>
                                        <p class="text-sm"><?php echo $value['year'];?></p>
                                        <p class="text-sm"><?php echo $value['location'];?></p>
                                        <p class="text-sm"><?php echo $value['technique'];?></p>
                                        <br>
                                        <p class="text-sm"><?php echo $value['description'];?></p>
                                        <br>
                                        <div class="flex">
                                        <cite class="m-1">
                                          <p>Escrito por:
                                          <a class="font-bold" href=<?php echo $value['rights'] ?>> <?php echo $value['author'] ?></a>
                                          </p>
                                        </cite>
                                        <p class="m-1">
                                          <a href="https://creativecommons.org/licenses/by/4.0/">(CC)</a>
                                        </p>
                               
                                        </div>
                                        <div class="flex">
                                        <a class="flex items-center flex-wrap" href="./edit.php?id=<?php echo $value['id']?>">
                                          <button class="my-4 mr-4 bg-gradient-to-r from-[#fddfe1] to-[#f34a47] hover:scale-105 drop-shadow-md  shadow-cla-blue px-4 py-1 rounded-lg text-[#3829a6] font-bold">Edit</button>
                                        </a>
                                        <a class="flex items-center flex-wrap" href="./delete.php?delete=<?php echo $value['id']?>">
                                          <button class="my-4 bg-gradient-to-r from-[#fddfe1] to-[#f34a47] hover:scale-105 drop-shadow-md  shadow-cla-blue px-4 py-1 rounded-lg text-[#3829a6] font-bold">Delete</button>
                                        </a>
                                        </div>
                                    </div>
                                    <div>
                    </div>
                    </div>
                    </div>
                    </div>
                               
                        <?php
                    }
                     
                 }
                ?>
          