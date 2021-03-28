<?php include('includes/config.php'); ?>
<?php include('includes/header.php'); ?>

    	<?php
        /*
         * Below are 2 different forms to be re-used       
         * 
         * Only use one at a time, comment out the other!       
         *
         */

        include 'includes/contact_include.php'; #site keys & code here
    
        $toAddress = "contourdeto@gmail.com";  //place your/your client's email address here
        $toName = "Wendy Hsia"; //place your client's name here
        $website = "wendyhsia.xyz";  //place NAME of your client's website

        //echo loadContact('simple.php');#demonstrates a simple contact form
        echo loadContact('multiple.php');#demonstrates multiple form elements

	?>
       <h3>Other Contacts</h3>
        <p>LinkedIn: <a href="#">Wendy Hsia </a> [No Link Yet]<br />
           Github: <a href="#">hsiaw</a> [No Link Yet]</p>

<?php include('includes/footer.php'); ?>
  </main>
 </body>
</html>