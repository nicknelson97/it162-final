<?php
ob_start();
define('DEBUG', 'TRUE');

define('THIS_PAGE', basename($_SERVER['PHP_SELF']));

switch(THIS_PAGE){
        case 'index.php';
        $title = 'Home';
        $mainHeadline = 'Welcome';
        $center = 'center';
        break;
        
        case 'blog1.php';
        $title = 'blog1';
        $mainHeadline = 'blog1';
        $center = 'center';
        break;
       
        case 'blog2.php';
        $title = 'blog2';
        $mainHeadline = 'blog2';
        $center = 'center';
        break;

        case 'resume.php';
        $title = 'Resume';
        $mainHeadline = 'Resume';
        $center = 'center';
        break;
        
        case 'disclaimer.php';
        $title = 'Disclaimer';
        $mainHeadline = 'Disclaimer';
        $center = 'center';
        break;

        case 'contact.php';
        $title = 'Contact me';
        $mainHeadline = 'Welcome to the contact page';
        $center = 'center';
        break;
}//end switch

$nav['index.php'] = 'Home';
$nav['<span>Blog</span>'] = '<ul>
                    <li><a href="blog1.php">SQL Injection Prevention with Dynamic Table Names in Java</a></li>
                    <li><a href="">blog2.php</a>Thoughts on Grace Hopper</li>
                </ul>';
$nav['resume.php'] = 'resume';
$nav['contact.php'] = 'Contact';
$nav['disclaimer.php'] = 'Disclaimer';

function makeLinks($nav){
    $myReturn = '';
    foreach($nav as $key => $value) {
        if(THIS_PAGE == $key){
            $myReturn .= '<li><a href=" '.$key.' "  class="selected">'.$value.'</a></li>';
        } else if($key == '<span>Blog</span>'){
            $myReturn .= '<li class="topfirst"><a href="#" style="height:18px;line-height:18px;">'.$key.'</a>'.$value.'</li>';
        } else{
            $myReturn .= '<li><a href=" '.$key.' ">'.$value.'</a></li>';
        }
    }
    return $myReturn;
}//end func

function myerror($myFile, $myLine, $errorMsg){
    if(defined('DEBUG') && DEBUG){
        echo 'Error in file: <b> '.$myLine.' </b> on line: <b>'.$myLine.' </b>';
        echo 'Error message: <b> '.$errorMsg.'</b>';
        die();
    } else {
        echo 'issue';
        die();
    }
}



?>