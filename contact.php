<?php 
include './services/connection.php';
 
if(isset($_POST['submit'])) {
 $mailto = "lamanna.mflorencia@gmail.com";  //My email address
 //getting customer data
 $name = $_POST['name']; //getting customer name
 $fromEmail = $_POST['email']; //getting customer email
 $subject = $_POST['subject'];
 $comments = $_POST['comments']; //getting customer message
 $confirmation = "Confirmation: Message was submitted successfully | HMA WebDesign"; // For customer confirmation
 
 //Email body I will receive
 $message = "User Name: " . $name . "\n"
 . "Client Message: " . "\n" . $_POST['comments'];
 
 //Message for client confirmation
 $message2 = "Dear" . $name . "\n"
 . "Thank you for contacting us. We will get back to you shortly!" . "\n\n"
 . "You submitted the following message: " . "\n" . $_POST['comments'] . "\n\n"
 . "Regards," . "\n" . "- Women in Art";
 
 //Email headers
 $headers = "From: " . $fromEmail; // Client email, I will receive
 $headers2 = "From: " . $mailto; // This will receive client
 
 //PHP mailer function
 
  $result1 = mail($mailto, $subject, $comments, $headers); // This email sent to My address
  $result2 = mail($fromEmail, $confirmation, $message2, $headers2); //This confirmation email to client
 
  //Checking if Mails sent successfully
 
  if ($result1 && $result2) {
    $success = "Your Message was sent Successfully!";
  } else {
    $failed = "Sorry! Message was not sent, Try again Later.";
  }
 
}
 
?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
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
  <div class="block lg:hidden">
    <button class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
      <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
    </button>
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
  <div class="relative rounded-2xl bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-lg sm:px-10">
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

<div class="flex items-center justify-center h-auto bg-red-100">
      <div class="bg-white rounded-2xl border shadow-x1 p-10 max-w-lg m-5">
        <div class="flex flex-col items-center space-y-4">
          <h1 class="font-bold text-2xl text-[#3829a6] w-4/6 text-center">
            Contact Us!
          </h1>
    
          <form  action="contact.php" method="post">
          <input
            type="text"
            placeholder="Your Name"
            class="border-2 rounded-lg w-full h-12 px-4 my-3"
            name= "name"
          />
          <input
            type="email"
            placeholder="Your Email"
            class="border-2 rounded-lg w-full h-12 px-4 my-3"
            name= "email"
          />
          <input
            type="text"
            placeholder="Subject"
            class="border-2 rounded-lg w-full h-12 px-4 my-3"
            name= "subject"
          />
          <textarea
            type="text"
            placeholder="Comments"
            class="border-2 rounded-lg w-full h-64 px-4 my-3"
            name= "comments"
          ></textarea>
          
          <button
            class="bg-red-400 text-white rounded-md hover:bg-red-500 font-semibold px-4 py-3 w-full"
            name= "submit"
          >
            Submit
          </button>
          </form>
        </div>
      </div>
    </div>

</main>

  </body>
</html>