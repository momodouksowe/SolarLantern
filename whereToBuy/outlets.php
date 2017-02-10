<?php
 
  $database = "burroDB";
  $username = "burroDB";

  $password = "Burr0555!";
  $server = "burroDB.db.8469586.hostedresource.com";


  $link=mysql_connect($server,$username,$password);
    //if result is false, the connection did not open
    if(!$link){ 
      echo "Failed to connect to mysql.";
      //display error message from mysql
      echo mysql_error(); 
      exit();   //end script
    }
  
    //select the database to work with using the open connection 
    if(!mysql_select_db($database,$link)){
      echo "Failed to select database.";
      //display error message from mysql
      echo mysql_error(); 
      exit(); 
    }


?>
<html>

<head>
<link rel = "stylesheet" href = "jquery/jquery.mobile-1.4.4.min.css">

<link rel = "stylesheet" href = "table.css">

  <title> Where to Buy Burro Products </title>

  <script src = "jquery/jquery-1.11.1.min.js"></script>
  <script src = "jquery/jquery.mobile-1.4.4.min.js"></script>

  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-70605225-1', 'auto');
  ga('send', 'pageview');

</script>


  <meta name="viewport" content="width-device-width, initial-scale=1">

   <style>
.ui-bar-f {
    color: red;
    background-color: yellow;
}

.ui-body-f {
    font-weight: bold;
    color: white;
    background-color: purple;
}

.ui-page-theme-a {
    /*font-weight: bold;*/
    background-color: white;  

}

.ui-page-theme-g {
    /*font-weight: bold;*/
    background-color: black;  
    font-color:yellow;     
}

.color1 .ui-btn{
    background: #00E900;
    font-color:black;
}

.ui-footer {background: #000000;


}


</style>

</head>


<body >


<!--Page One-->
<div data-role = "page" id = "pageone" data-theme="a">
  <div data-role = "header" >
    <!--<h1>  </h1>   put header here if needed -->

    
    <div data-role = "navbar" >
       
       <img  width="100%" height="20%" src="img/header-center.png">  </img> 

     <!--  <table> <tr ><td width="20%"> <img width="100%"  src="img/header-margin.png"> </td> <td width="60%"> <img width="100%" height ="100%" src="img/header-center.png"> </img> </td> <td width="20%"> <img width="100%"  src="img/header-margin.png"> </td></tr> </table> -->

    </div>
  </div>
    





  <div data-role ="content"  >

      <!-- <label> Search based on location </label> -->
      <p> Click your region and town to find a Burro reseller near you.</p>
                
        
        <div data-role="collapsible" class="color1"  >
       
            <h3 >Ashanti Region</h3>
             
                <?php

              $datasetR=  mysql_query(" SELECT * FROM cleanData WHERE region LIKE 'Ashanti' ORDER BY cityTown ",$link);

              if(!$datasetR){
                 echo "Error";
                 echo mysql_error();
                  exit();
              }
              
              $city='bluestamps';

              
               while ($R=mysql_fetch_assoc($datasetR) ){  //begining of while loop for Region


                        //prevent doublling city
                            while (strcmp($city, $R["cityTown"] ) ==0){ 

                              $R=mysql_fetch_assoc($datasetR);

                            }
                                $city = $R["cityTown"]; //to show area


              

                                if($city !=Null) { //eliminate empty redundant div 

         echo  '<div   data-role="collapsible" class="color1" data-content-theme="b" > ' ; 

              


                 echo ' <h2>'; echo $city; echo '</h2> ';

                    
                 
                   

                         //Achiase
                         
                         $datasetT=mysql_query(" SELECT * FROM cleanData WHERE region LIKE 'Ashanti' and cityTown LIKE '{$city}' ORDER BY cityTown,area ",$link);

                       if(!$datasetT){
                           echo "Error";
                           echo mysql_error();
                           exit();
                         }

                        $area = 'bluestamps';

                         while ($intro=mysql_fetch_assoc($datasetT) ){  //begining of while loop for town


                                 //prevent doublling areas
                            while (strcmp($area, $intro["area"] ) ==0){ 

                              $intro=mysql_fetch_assoc($datasetT);

                            }
                                $area = $intro["area"]; //to show area


                                              echo "<Table>";

                              ?><!-- change font color  to something readable --><font color = "#00E900"><?php
                            echo "<B><u>";  echo $intro["area"];  echo"</u></B>";

                      
                          
                              
                                ?> </font>  <?php
                          

                $dataset=mysql_query(" SELECT * FROM cleanData WHERE region LIKE 'Ashanti' and cityTown LIKE '{$city}' and area like '{$area}' ORDER BY cityTown,area  ",$link);
                            
                             $count= mysql_num_rows($dataset);
                     

                            while($row=mysql_fetch_assoc($dataset)){
                              //$count = $count +1;

                                if ( $count >1){  
                                echo "<tr>";
                              echo "<td>"; echo"<B>"; ?><!-- change font color  to something readable --><font color = "white"><?php

                               echo $row["companyName"]; echo"</B>"; echo"&nbsp;&nbsp;&nbsp" ; echo"<br>" ;   echo $row["landmark"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone1"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone2"] ;
                       
                                      echo"  "; echo "<p>"; ?> </font>  <?php

                                    echo "</td>"; 

                                

                                  $row=mysql_fetch_assoc($dataset);

                                  echo "<td>"; echo"<B>"; ?><!-- change font color  to something readable --><font color = "white"><?php

                               echo $row["companyName"]; echo"</B>"; echo"&nbsp;&nbsp;&nbsp" ; echo"<br>" ;   echo $row["landmark"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone1"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone2"] ;
                       
                                      echo"  "; echo "<p>"; ?> </font>  <?php

                                    echo "</td>"; 


                                  echo "</tr>";

                                  $count= $count -2;
                               }
                         


                              else {

                                  echo "<tr>";
                              echo "<td>"; echo"<B>"; ?><!-- change font color  to something readable --><font color = "white"><?php

                               echo $row["companyName"]; echo"</B>"; echo"&nbsp;&nbsp;&nbsp" ; echo"<br>" ;   echo $row["landmark"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone1"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone2"] ;
                       
                                      echo"  "; echo "<p>"; ?> </font>  <?php

                                    echo "</td>"; 

                                    echo "</tr>";

                                      $count =$count -1;
                              }

                            

                    
                          }

                            
        
                           echo "</Table>";





                     } // end of Town while loop



              
                 echo '</div>'; //city


                   }    // ending of empty redundant div
                
             } // end of Region while loop



                                   
                ?>
                      


         </div>      




               <!--- Brong Ahafo --> 


            <div data-role="collapsible" class="color1"  >
       
            <h3 >Brong Ahafo</h3>


             
                <?php

                $begin='Brong Ahafo' ;
              $datasetR=  mysql_query(" SELECT * FROM cleanData WHERE region LIKE '{$begin}' ORDER BY cityTown ",$link);

              if(!$datasetR){
                 echo "Error";
                 echo mysql_error();
                  exit();
              }

        //      $R=mysql_fetch_assoc($datasetR);
              
             

               $city= 'sdfaljsdflkjw4234';

               while ($R=mysql_fetch_assoc($datasetR) ){  //begining of while loop for Region

                       

                        //prevent doublling city
                            while ( $city== $R["cityTown"] ){ 

                             $R=mysql_fetch_assoc($datasetR);


                            }


                                $city = $R["cityTown"]; //to show area


              

                                if($city !=Null) { //eliminate empty redundant div  



         echo  '<div   data-role="collapsible" class="color1" data-content-theme="b" > ' ; 

              


                 echo ' <h2>'; echo $city; echo '</h2> ';

                    
                 
                         
                         $datasetT=mysql_query(" SELECT * FROM cleanData WHERE region LIKE '{$begin}' and cityTown LIKE '{$city}' ORDER BY cityTown,area ",$link);

                       if(!$datasetT){
                           echo "Error";
                           echo mysql_error();
                           exit();
                         }

                       $area = $city;

                         while ($intro=mysql_fetch_assoc($datasetT) ){  //begining of while loop for town


                          
                                 //prevent doubling areas
                           while ($area == $intro["cityTown"] ){ 

                            $intro= mysql_fetch_assoc($datasetT);

                     

                           }


                         
                                $area = $intro["area"]; //to show area

                                echo $area;

                                              echo "<Table>";

                              ?><!-- change font color  to something readable --><font color = "#00E900"><?php
                            echo "<B><u>";  echo $intro["area"];  echo"</u></B>";

                      
                          
                              
                                ?> </font>  <?php
                          


                $dataset=mysql_query(" SELECT * FROM cleanData WHERE region LIKE '{$begin}' and cityTown LIKE '{$city}' ORDER BY cityTown,area ",$link);
                            
                             $count= mysql_num_rows($dataset);
                     
                   

                            while($row=mysql_fetch_assoc($dataset)){
                              //$count = $count +1;
                             

                                if ( $count >1){  
                                echo "<tr>";
                              echo "<td>"; echo"<B>"; ?><!-- change font color  to something readable --><font color = "white"><?php

                               echo $row["companyName"]; echo"</B>"; echo"&nbsp;&nbsp;&nbsp" ; echo"<br>" ;   echo $row["landmark"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone1"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone2"] ;
                       
                                      echo"  "; echo "<p>"; ?> </font>  <?php

                                    echo "</td>"; 

                                

                                  $row=mysql_fetch_assoc($dataset);

                                  echo "<td>"; echo"<B>"; ?><!-- change font color  to something readable --><font color = "white"><?php

                               echo $row["companyName"]; echo"</B>"; echo"&nbsp;&nbsp;&nbsp" ; echo"<br>" ;   echo $row["landmark"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone1"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone2"] ;
                       
                                      echo"  "; echo "<p>"; ?> </font>  <?php

                                    echo "</td>"; 


                                  echo "</tr>";

                                  $count= $count -2;
                               }
                         


                              else if ($count ==1){

                                  echo "<tr>";
                              echo "<td>"; echo"<B>"; ?><!-- change font color  to something readable --><font color = "white"><?php

                               echo $row["companyName"]; echo"</B>"; echo"&nbsp;&nbsp;&nbsp" ; echo"<br>" ;   echo $row["landmark"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone1"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone2"] ;
                       
                                      echo"  "; echo "<p>"; ?> </font>  <?php

                                    echo "</td>"; 

                                    echo "</tr>";

                                      $count =$count -1;
                              }

                            

                    
                          }

                            
        
                           echo "</Table>";





                     } // end of Town while loop



              
                 echo '</div>'; //city


                   }    // ending of empty redundant div
                
             } // end of Region while loop



                   
              
                  
                ?>
                      


         </div>      



<!-- Central -->

      <div data-role="collapsible" class="color1"  >
       
            <h3 >Central</h3>


             
                <?php

                $begin='Central' ;
              $datasetR=  mysql_query(" SELECT * FROM cleanData WHERE region LIKE '{$begin}' ORDER BY cityTown ",$link);

              if(!$datasetR){
                 echo "Error";
                 echo mysql_error();
                  exit();
              }

        //      $R=mysql_fetch_assoc($datasetR);
              
             

               $city= 'sdfaljsdflkjw4234';

               while ($R=mysql_fetch_assoc($datasetR) ){  //begining of while loop for Region

                       

                        //prevent doublling city
                            while ( $city== $R["cityTown"] ){ 

                             $R=mysql_fetch_assoc($datasetR);


                            }


                                $city = $R["cityTown"]; //to show area


              

                                if($city !=Null) { //eliminate empty redundant div  



         echo  '<div   data-role="collapsible" class="color1" data-content-theme="b" > ' ; 

              


                 echo ' <h2>'; echo $city; echo '</h2> ';

                    
                 
                         
                         $datasetT=mysql_query(" SELECT * FROM cleanData WHERE region LIKE '{$begin}' and cityTown LIKE '{$city}' ORDER BY cityTown,area ",$link);

                       if(!$datasetT){
                           echo "Error";
                           echo mysql_error();
                           exit();
                         }

                       $area = $city;

                         while ($intro=mysql_fetch_assoc($datasetT) ){  //begining of while loop for town


                          
                                 //prevent doubling areas
                           while ($area == $intro["cityTown"] ){ 

                            $intro= mysql_fetch_assoc($datasetT);

                     

                           }


                         
                                $area = $intro["area"]; //to show area

                                echo $area;

                                              echo "<Table>";

                              ?><!-- change font color  to something readable --><font color = "#00E900"><?php
                            echo "<B><u>";  echo $intro["area"];  echo"</u></B>";

                      
                          
                              
                                ?> </font>  <?php
                          


                $dataset=mysql_query(" SELECT * FROM cleanData WHERE region LIKE '{$begin}' and cityTown LIKE '{$city}' ORDER BY cityTown,area ",$link);
                            
                             $count= mysql_num_rows($dataset);
                     
                   

                            while($row=mysql_fetch_assoc($dataset)){
                              //$count = $count +1;
                             

                                if ( $count >1){  
                                echo "<tr>";
                              echo "<td>"; echo"<B>"; ?><!-- change font color  to something readable --><font color = "white"><?php

                               echo $row["companyName"]; echo"</B>"; echo"&nbsp;&nbsp;&nbsp" ; echo"<br>" ;   echo $row["landmark"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone1"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone2"] ;
                       
                                      echo"  "; echo "<p>"; ?> </font>  <?php

                                    echo "</td>"; 

                                

                                  $row=mysql_fetch_assoc($dataset);

                                  echo "<td>"; echo"<B>"; ?><!-- change font color  to something readable --><font color = "white"><?php

                               echo $row["companyName"]; echo"</B>"; echo"&nbsp;&nbsp;&nbsp" ; echo"<br>" ;   echo $row["landmark"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone1"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone2"] ;
                       
                                      echo"  "; echo "<p>"; ?> </font>  <?php

                                    echo "</td>"; 


                                  echo "</tr>";

                                  $count= $count -2;
                               }
                         


                              else if ($count ==1){

                                  echo "<tr>";
                              echo "<td>"; echo"<B>"; ?><!-- change font color  to something readable --><font color = "white"><?php

                               echo $row["companyName"]; echo"</B>"; echo"&nbsp;&nbsp;&nbsp" ; echo"<br>" ;   echo $row["landmark"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone1"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone2"] ;
                       
                                      echo"  "; echo "<p>"; ?> </font>  <?php

                                    echo "</td>"; 

                                    echo "</tr>";

                                      $count =$count -1;
                              }

                            

                    
                          }

                            
        
                           echo "</Table>";





                     } // end of Town while loop



              
                 echo '</div>'; //city


                   }    // ending of empty redundant div
                
             } // end of Region while loop



                   
              
                  
                ?>
                      


         </div>      




<!-- Eastern -->

      <div data-role="collapsible" class="color1"  >
       
            <h3 >Eastern</h3>


             
                <?php

                $begin='Eastern' ;
              $datasetR=  mysql_query(" SELECT * FROM cleanData WHERE region LIKE '{$begin}' ORDER BY cityTown",$link);

              if(!$datasetR){
                 echo "Error";
                 echo mysql_error();
                  exit();
              }

        //      $R=mysql_fetch_assoc($datasetR);
              
             

               $city= 'sdfaljsdflkjw4234';

               while ($R=mysql_fetch_assoc($datasetR) ){  //begining of while loop for Region

                       

                        //prevent doublling city
                            while ( $city== $R["cityTown"] ){ 

                             $R=mysql_fetch_assoc($datasetR);


                            }


                                $city = $R["cityTown"]; //to show area


              

                                if($city !=Null) { //eliminate empty redundant div  



         echo  '<div   data-role="collapsible" class="color1" data-content-theme="b" > ' ; 

              


                 echo ' <h2>'; echo $city; echo '</h2> ';

                    
                 
                         
                         $datasetT=mysql_query(" SELECT * FROM cleanData WHERE region LIKE '{$begin}' and cityTown LIKE '{$city}' ORDER BY cityTown,area ",$link);

                       if(!$datasetT){
                           echo "Error";
                           echo mysql_error();
                           exit();
                         }

                       $area = $city;

                         while ($intro=mysql_fetch_assoc($datasetT) ){  //begining of while loop for town


                          
                                 //prevent doubling areas
                           while ($area == $intro["cityTown"] ){ 

                            $intro= mysql_fetch_assoc($datasetT);

                     

                           }


                         
                                $area = $intro["area"]; //to show area

                                echo $area;

                                              echo "<Table>";

                              ?><!-- change font color  to something readable --><font color = "#00E900"><?php
                            echo "<B><u>";  echo $intro["area"];  echo"</u></B>";

                      
                          
                              
                                ?> </font>  <?php
                          


                $dataset=mysql_query(" SELECT * FROM cleanData WHERE region LIKE '{$begin}' and cityTown LIKE '{$city}' ORDER BY cityTown,area  ",$link);
                            
                             $count= mysql_num_rows($dataset);
                     
                   

                            while($row=mysql_fetch_assoc($dataset)){
                              //$count = $count +1;
                             

                                if ( $count >1){  
                                echo "<tr>";
                              echo "<td>"; echo"<B>"; ?><!-- change font color  to something readable --><font color = "white"><?php

                               echo $row["companyName"]; echo"</B>"; echo"&nbsp;&nbsp;&nbsp" ; echo"<br>" ;   echo $row["landmark"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone1"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone2"] ;
                       
                                      echo"  "; echo "<p>"; ?> </font>  <?php

                                    echo "</td>"; 

                                

                                  $row=mysql_fetch_assoc($dataset);

                                  echo "<td>"; echo"<B>"; ?><!-- change font color  to something readable --><font color = "white"><?php

                               echo $row["companyName"]; echo"</B>"; echo"&nbsp;&nbsp;&nbsp" ; echo"<br>" ;   echo $row["landmark"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone1"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone2"] ;
                       
                                      echo"  "; echo "<p>"; ?> </font>  <?php

                                    echo "</td>"; 


                                  echo "</tr>";

                                  $count= $count -2;
                               }
                         


                              else if ($count ==1){

                                  echo "<tr>";
                              echo "<td>"; echo"<B>"; ?><!-- change font color  to something readable --><font color = "white"><?php

                               echo $row["companyName"]; echo"</B>"; echo"&nbsp;&nbsp;&nbsp" ; echo"<br>" ;   echo $row["landmark"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone1"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone2"] ;
                       
                                      echo"  "; echo "<p>"; ?> </font>  <?php

                                    echo "</td>"; 

                                    echo "</tr>";

                                      $count =$count -1;
                              }

                            

                    
                          }

                            
        
                           echo "</Table>";





                     } // end of Town while loop



              
                 echo '</div>'; //city


                   }    // ending of empty redundant div
                
             } // end of Region while loop



                   
              
                  
                ?>
                      


         </div>      


<!--  Greater Accra  -->

      
 <div data-role="collapsible" class="color1"  >
       
            <h3 >Greater Accra</h3>


             
                <?php

                $begin='Greater Accra' ;
              $datasetR=  mysql_query(" SELECT * FROM cleanData WHERE region LIKE '{$begin}' ORDER BY cityTown ",$link);

              if(!$datasetR){
                 echo "Error";
                 echo mysql_error();
                  exit();
              }

        //      $R=mysql_fetch_assoc($datasetR);
              
             

               $city= 'sdfaljsdflkjw4234';

               while ($R=mysql_fetch_assoc($datasetR) ){  //begining of while loop for Region

                       

                        //prevent doublling city
                            while ( $city== $R["cityTown"] ){ 

                             $R=mysql_fetch_assoc($datasetR);


                            }


                                $city = $R["cityTown"]; //to show area


              

                                if($city !=Null) { //eliminate empty redundant div  



         echo  '<div   data-role="collapsible" class="color1" data-content-theme="b" > ' ; 

              


                 echo ' <h2>'; echo $city; echo '</h2> ';

                    
                 
                         
                         $datasetT=mysql_query(" SELECT * FROM cleanData WHERE region LIKE '{$begin}' and cityTown LIKE '{$city}' ORDER BY cityTown,area",$link);

                       if(!$datasetT){
                           echo "Error";
                           echo mysql_error();
                           exit();
                         }

                       $area = 'dsfadfasd23';

                       $trap=$city;
                         while ($intro=mysql_fetch_assoc($datasetT) ){  //begining of while loop for town


                          
        /*                   while ($trap == $intro["cityTown"] ){ 

                             $intro= mysql_fetch_assoc($datasetT);

                            }*/                          


                               if($area !=NULL) {   //for ignoring empty areas


                               
                                 //prevent doubling areas
                            while ($area == $intro["area"] ){ 

                             $intro= mysql_fetch_assoc($datasetT);

                            }

                         
                                $area = $intro["area"]; //to show area




                                              echo "<Table>";

                              ?><!-- change font color  to something readable --><font color = "#00E900"><?php
                            echo "<B><u>";  echo $intro["area"];  echo"</u></B>";

                      
                          
                              
                                ?> </font>  <?php
                          


                $dataset=mysql_query(" SELECT * FROM cleanData WHERE region LIKE '{$begin}' and cityTown LIKE '{$city}' and area LIKE '{$area}'  ORDER BY cityTown,area ",$link);
                            
                             $count= mysql_num_rows($dataset);
                     
                   

                            while($row=mysql_fetch_assoc($dataset)){
                              //$count = $count +1;
                             

                                if ( $count >1){  
                                echo "<tr>";
                              echo "<td>"; echo"<B>"; ?><!-- change font color  to something readable --><font color = "white"><?php

                               echo $row["companyName"]; echo"</B>"; echo"&nbsp;&nbsp;&nbsp" ; echo"<br>" ;   echo $row["landmark"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone1"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone2"] ;
                       
                                      echo"  "; echo "<p>"; ?> </font>  <?php

                                    echo "</td>"; 

                                

                                  $row=mysql_fetch_assoc($dataset);

                                  echo "<td>"; echo"<B>"; ?><!-- change font color  to something readable --><font color = "white"><?php

                               echo $row["companyName"]; echo"</B>"; echo"&nbsp;&nbsp;&nbsp" ; echo"<br>" ;   echo $row["landmark"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone1"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone2"] ;
                       
                                      echo"  "; echo "<p>"; ?> </font>  <?php

                                    echo "</td>"; 


                                  echo "</tr>";

                                  $count= $count -2;
                               }
                         


                              else if ($count ==1){

                                  echo "<tr>";
                              echo "<td>"; echo"<B>"; ?><!-- change font color  to something readable --><font color = "white"><?php

                               echo $row["companyName"]; echo"</B>"; echo"&nbsp;&nbsp;&nbsp" ; echo"<br>" ;   echo $row["landmark"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone1"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone2"] ;
                       
                                      echo"  "; echo "<p>"; ?> </font>  <?php

                                    echo "</td>"; 

                                    echo "</tr>";

                                      $count =$count -1;
                              }

                            

                    
                          }

                            
        
                           echo "</Table>";



                         } //new if for area !=NULL

                     } // end of Town while loop



              
                 echo '</div>'; //city


                   }    // ending of empty redundant div
                
             } // end of Region while loop



                   
              
                  
                ?>
                      


         </div>    








<!--   Northern     -->

        <div data-role="collapsible" class="color1"  >
       
            <h3 >Northern</h3>


             
                <?php

                $begin='Northern' ;
              $datasetR=  mysql_query(" SELECT * FROM cleanData WHERE region LIKE '{$begin}' ORDER BY cityTown",$link);

              if(!$datasetR){
                 echo "Error";
                 echo mysql_error();
                  exit();
              }

        //      $R=mysql_fetch_assoc($datasetR);
              
             

               $city= 'sdfaljsdflkjw4234';

               while ($R=mysql_fetch_assoc($datasetR) ){  //begining of while loop for Region

                       

                        //prevent doublling city
                            while ( $city== $R["cityTown"] ){ 

                             $R=mysql_fetch_assoc($datasetR);


                            }


                                $city = $R["cityTown"]; //to show area


              

                                if($city !=Null) { //eliminate empty redundant div  



         echo  '<div   data-role="collapsible" class="color1" data-content-theme="b" > ' ; 

              


                 echo ' <h2>'; echo $city; echo '</h2> ';

                    
                 
                         
                         $datasetT=mysql_query(" SELECT * FROM cleanData WHERE region LIKE '{$begin}' and cityTown LIKE '{$city}' ORDER BY cityTown,area ",$link);

                       if(!$datasetT){
                           echo "Error";
                           echo mysql_error();
                           exit();
                         }

                       $area = $city;

                         while ($intro=mysql_fetch_assoc($datasetT) ){  //begining of while loop for town


                          
                                 //prevent doubling areas
                           while ($area == $intro["cityTown"] ){ 

                            $intro= mysql_fetch_assoc($datasetT);

                     

                           }


                         
                                $area = $intro["area"]; //to show area

                                echo $area;

                                              echo "<Table>";

                              ?><!-- change font color  to something readable --><font color = "#00E900"><?php
                            echo "<B><u>";  echo $intro["area"];  echo"</u></B>";

                      
                          
                              
                                ?> </font>  <?php
                          


                $dataset=mysql_query(" SELECT * FROM cleanData WHERE region LIKE '{$begin}' and cityTown LIKE '{$city}' ORDER BY cityTown,area ",$link);
                            
                             $count= mysql_num_rows($dataset);
                     
                   

                            while($row=mysql_fetch_assoc($dataset)){
                              //$count = $count +1;
                             

                                if ( $count >1){  
                                echo "<tr>";
                              echo "<td>"; echo"<B>"; ?><!-- change font color  to something readable --><font color = "white"><?php

                               echo $row["companyName"]; echo"</B>"; echo"&nbsp;&nbsp;&nbsp" ; echo"<br>" ;   echo $row["landmark"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone1"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone2"] ;
                       
                                      echo"  "; echo "<p>"; ?> </font>  <?php

                                    echo "</td>"; 

                                

                                  $row=mysql_fetch_assoc($dataset);

                                  echo "<td>"; echo"<B>"; ?><!-- change font color  to something readable --><font color = "white"><?php

                               echo $row["companyName"]; echo"</B>"; echo"&nbsp;&nbsp;&nbsp" ; echo"<br>" ;   echo $row["landmark"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone1"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone2"] ;
                       
                                      echo"  "; echo "<p>"; ?> </font>  <?php

                                    echo "</td>"; 


                                  echo "</tr>";

                                  $count= $count -2;
                               }
                         


                              else if ($count ==1){

                                  echo "<tr>";
                              echo "<td>"; echo"<B>"; ?><!-- change font color  to something readable --><font color = "white"><?php

                               echo $row["companyName"]; echo"</B>"; echo"&nbsp;&nbsp;&nbsp" ; echo"<br>" ;   echo $row["landmark"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone1"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone2"] ;
                       
                                      echo"  "; echo "<p>"; ?> </font>  <?php

                                    echo "</td>"; 

                                    echo "</tr>";

                                      $count =$count -1;
                              }

                            

                    
                          }

                            
        
                           echo "</Table>";





                     } // end of Town while loop



              
                 echo '</div>'; //city


                   }    // ending of empty redundant div
                
             } // end of Region while loop



                   
              
                  
                ?>
                      


         </div>      





<!--   Upper EAst         -->

      <div data-role="collapsible" class="color1"  >
       
            <h3 >Upper East</h3>


             
                <?php

                $begin='Upper East' ;
              $datasetR=  mysql_query(" SELECT * FROM cleanData WHERE region LIKE '{$begin}' ORDER BY cityTown",$link);

              if(!$datasetR){
                 echo "Error";
                 echo mysql_error();
                  exit();
              }

        //      $R=mysql_fetch_assoc($datasetR);
              
             

               $city= 'sdfaljsdflkjw4234';

               while ($R=mysql_fetch_assoc($datasetR) ){  //begining of while loop for Region

                       

                        //prevent doublling city
                            while ( $city== $R["cityTown"] ){ 

                             $R=mysql_fetch_assoc($datasetR);


                            }


                                $city = $R["cityTown"]; //to show area


              

                                if($city !=Null) { //eliminate empty redundant div  



         echo  '<div   data-role="collapsible" class="color1" data-content-theme="b" > ' ; 

              


                 echo ' <h2>'; echo $city; echo '</h2> ';

                    
                 
                         
                         $datasetT=mysql_query(" SELECT * FROM cleanData WHERE region LIKE '{$begin}' and cityTown LIKE '{$city}' ORDER BY cityTown,area",$link);

                       if(!$datasetT){
                           echo "Error";
                           echo mysql_error();
                           exit();
                         }

                       $area = $city;

                         while ($intro=mysql_fetch_assoc($datasetT) ){  //begining of while loop for town


                          
                                 //prevent doubling areas
                           while ($area == $intro["cityTown"] ){ 

                            $intro= mysql_fetch_assoc($datasetT);

                     

                           }


                         
                                $area = $intro["area"]; //to show area

                                echo $area;

                                              echo "<Table>";

                              ?><!-- change font color  to something readable --><font color = "#00E900"><?php
                            echo "<B><u>";  echo $intro["area"];  echo"</u></B>";

                      
                          
                              
                                ?> </font>  <?php
                          


                $dataset=mysql_query(" SELECT * FROM cleanData WHERE region LIKE '{$begin}' and cityTown LIKE '{$city}' ORDER BY cityTown,area  ",$link);
                            
                             $count= mysql_num_rows($dataset);
                     
                   

                            while($row=mysql_fetch_assoc($dataset)){
                              //$count = $count +1;
                             

                                if ( $count >1){  
                                echo "<tr>";
                              echo "<td>"; echo"<B>"; ?><!-- change font color  to something readable --><font color = "white"><?php

                               echo $row["companyName"]; echo"</B>"; echo"&nbsp;&nbsp;&nbsp" ; echo"<br>" ;   echo $row["landmark"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone1"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone2"] ;
                       
                                      echo"  "; echo "<p>"; ?> </font>  <?php

                                    echo "</td>"; 

                                

                                  $row=mysql_fetch_assoc($dataset);

                                  echo "<td>"; echo"<B>"; ?><!-- change font color  to something readable --><font color = "white"><?php

                               echo $row["companyName"]; echo"</B>"; echo"&nbsp;&nbsp;&nbsp" ; echo"<br>" ;   echo $row["landmark"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone1"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone2"] ;
                       
                                      echo"  "; echo "<p>"; ?> </font>  <?php

                                    echo "</td>"; 


                                  echo "</tr>";

                                  $count= $count -2;
                               }
                         


                              else if ($count ==1){

                                  echo "<tr>";
                              echo "<td>"; echo"<B>"; ?><!-- change font color  to something readable --><font color = "white"><?php

                               echo $row["companyName"]; echo"</B>"; echo"&nbsp;&nbsp;&nbsp" ; echo"<br>" ;   echo $row["landmark"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone1"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone2"] ;
                       
                                      echo"  "; echo "<p>"; ?> </font>  <?php

                                    echo "</td>"; 

                                    echo "</tr>";

                                      $count =$count -1;
                              }

                            

                    
                          }

                            
        
                           echo "</Table>";





                     } // end of Town while loop



              
                 echo '</div>'; //city


                   }    // ending of empty redundant div
                
             } // end of Region while loop



                   
              
                  
                ?>
                      


         </div>      




<!--   Volta       -->

      <div data-role="collapsible" class="color1"  >
       
            <h3 >Volta</h3>


             
                <?php

                $begin='Volta' ;
              $datasetR=  mysql_query(" SELECT * FROM cleanData WHERE region LIKE '{$begin}' ORDER BY cityTown ",$link);

              if(!$datasetR){
                 echo "Error";
                 echo mysql_error();
                  exit();
              }

        //      $R=mysql_fetch_assoc($datasetR);
              
             

               $city= 'sdfaljsdflkjw4234';

               while ($R=mysql_fetch_assoc($datasetR) ){  //begining of while loop for Region

                       

                        //prevent doublling city
                            while ( $city== $R["cityTown"] ){ 

                             $R=mysql_fetch_assoc($datasetR);


                            }


                                $city = $R["cityTown"]; //to show area


              

                                if($city !=Null) { //eliminate empty redundant div  



         echo  '<div   data-role="collapsible" class="color1" data-content-theme="b" > ' ; 

              


                 echo ' <h2>'; echo $city; echo '</h2> ';

                    
                 
                         
                         $datasetT=mysql_query(" SELECT * FROM cleanData WHERE region LIKE '{$begin}' and cityTown LIKE '{$city}' ORDER BY cityTown,area ",$link);

                       if(!$datasetT){
                           echo "Error";
                           echo mysql_error();
                           exit();
                         }

                       $area = $city;

                         while ($intro=mysql_fetch_assoc($datasetT) ){  //begining of while loop for town


                          
                                 //prevent doubling areas
                           while ($area == $intro["cityTown"] ){ 

                            $intro= mysql_fetch_assoc($datasetT);

                     

                           }


                         
                                $area = $intro["area"]; //to show area

                                echo $area;

                                              echo "<Table>";

                              ?><!-- change font color  to something readable --><font color = "#00E900"><?php
                            echo "<B><u>";  echo $intro["area"];  echo"</u></B>";

                      
                          
                              
                                ?> </font>  <?php
                          


                $dataset=mysql_query(" SELECT * FROM cleanData WHERE region LIKE '{$begin}' and cityTown LIKE '{$city}' ORDER BY cityTown,area ",$link);
                            
                             $count= mysql_num_rows($dataset);
                     
                   

                            while($row=mysql_fetch_assoc($dataset)){
                              //$count = $count +1;
                             

                                if ( $count >1){  
                                echo "<tr>";
                              echo "<td>"; echo"<B>"; ?><!-- change font color  to something readable --><font color = "white"><?php

                               echo $row["companyName"]; echo"</B>"; echo"&nbsp;&nbsp;&nbsp" ; echo"<br>" ;   echo $row["landmark"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone1"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone2"] ;
                       
                                      echo"  "; echo "<p>"; ?> </font>  <?php

                                    echo "</td>"; 

                                

                                  $row=mysql_fetch_assoc($dataset);

                                  echo "<td>"; echo"<B>"; ?><!-- change font color  to something readable --><font color = "white"><?php

                               echo $row["companyName"]; echo"</B>"; echo"&nbsp;&nbsp;&nbsp" ; echo"<br>" ;   echo $row["landmark"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone1"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone2"] ;
                       
                                      echo"  "; echo "<p>"; ?> </font>  <?php

                                    echo "</td>"; 


                                  echo "</tr>";

                                  $count= $count -2;
                               }
                         


                              else if ($count ==1){

                                  echo "<tr>";
                              echo "<td>"; echo"<B>"; ?><!-- change font color  to something readable --><font color = "white"><?php

                               echo $row["companyName"]; echo"</B>"; echo"&nbsp;&nbsp;&nbsp" ; echo"<br>" ;   echo $row["landmark"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone1"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone2"] ;
                       
                                      echo"  "; echo "<p>"; ?> </font>  <?php

                                    echo "</td>"; 

                                    echo "</tr>";

                                      $count =$count -1;
                              }

                            

                    
                          }

                            
        
                           echo "</Table>";





                     } // end of Town while loop



              
                 echo '</div>'; //city


                   }    // ending of empty redundant div
                
             } // end of Region while loop



                   
              
                  
                ?>
                      


         </div>      



<!--  Western      -->

      <div data-role="collapsible" class="color1"  >
       
            <h3 >Western</h3>


             
                <?php

                $begin='Western' ;
              $datasetR=  mysql_query(" SELECT * FROM cleanData WHERE region LIKE '{$begin}' ORDER BY cityTown",$link);

              if(!$datasetR){
                 echo "Error";
                 echo mysql_error();
                  exit();
              }

        //      $R=mysql_fetch_assoc($datasetR);
              
             

               $city= 'sdfaljsdflkjw4234';

               while ($R=mysql_fetch_assoc($datasetR) ){  //begining of while loop for Region

                       

                        //prevent doublling city
                            while ( $city== $R["cityTown"] ){ 

                             $R=mysql_fetch_assoc($datasetR);


                            }


                                $city = $R["cityTown"]; //to show area


              

                                if($city !=Null) { //eliminate empty redundant div  



         echo  '<div   data-role="collapsible" class="color1" data-content-theme="b" > ' ; 

              


                 echo ' <h2>'; echo $city; echo '</h2> ';

                    
                 
                         
                         $datasetT=mysql_query(" SELECT * FROM cleanData WHERE region LIKE '{$begin}' and cityTown LIKE '{$city}' ORDER BY cityTown,area ",$link);

                       if(!$datasetT){
                           echo "Error";
                           echo mysql_error();
                           exit();
                         }

                       $area = $city;

                         while ($intro=mysql_fetch_assoc($datasetT) ){  //begining of while loop for town


                          
                                 //prevent doubling areas
                           while ($area == $intro["cityTown"] ){ 

                            $intro= mysql_fetch_assoc($datasetT);

                     

                           }


                         
                                $area = $intro["area"]; //to show area

                                echo $area;

                                              echo "<Table>";

                              ?><!-- change font color  to something readable --><font color = "#00E900"><?php
                            echo "<B><u>";  echo $intro["area"];  echo"</u></B>";

                      
                          
                              
                                ?> </font>  <?php
                          


                $dataset=mysql_query(" SELECT * FROM cleanData WHERE region LIKE '{$begin}' and cityTown LIKE '{$city}' ORDER BY cityTown,area ",$link);
                            
                             $count= mysql_num_rows($dataset);
                     
                   

                            while($row=mysql_fetch_assoc($dataset)){
                              //$count = $count +1;
                             

                                if ( $count >1){  
                                echo "<tr>";
                              echo "<td>"; echo"<B>"; ?><!-- change font color  to something readable --><font color = "white"><?php

                               echo $row["companyName"]; echo"</B>"; echo"&nbsp;&nbsp;&nbsp" ; echo"<br>" ;   echo $row["landmark"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone1"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone2"] ;
                       
                                      echo"  "; echo "<p>"; ?> </font>  <?php

                                    echo "</td>"; 

                                

                                  $row=mysql_fetch_assoc($dataset);

                                  echo "<td>"; echo"<B>"; ?><!-- change font color  to something readable --><font color = "white"><?php

                               echo $row["companyName"]; echo"</B>"; echo"&nbsp;&nbsp;&nbsp" ; echo"<br>" ;   echo $row["landmark"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone1"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone2"] ;
                       
                                      echo"  "; echo "<p>"; ?> </font>  <?php

                                    echo "</td>"; 


                                  echo "</tr>";

                                  $count= $count -2;
                               }
                         


                              else if ($count ==1){

                                  echo "<tr>";
                              echo "<td>"; echo"<B>"; ?><!-- change font color  to something readable --><font color = "white"><?php

                               echo $row["companyName"]; echo"</B>"; echo"&nbsp;&nbsp;&nbsp" ; echo"<br>" ;   echo $row["landmark"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone1"] ; echo"&nbsp;&nbsp;&nbsp"; echo"<br>" ; echo $row["phone2"] ;
                       
                                      echo"  "; echo "<p>"; ?> </font>  <?php

                                    echo "</td>"; 

                                    echo "</tr>";

                                      $count =$count -1;
                              }

                            

                    
                          }

                            
        
                           echo "</Table>";





                     } // end of Town while loop



              
                 echo '</div>'; //city


                   }    // ending of empty redundant div
                
             } // end of Region while loop



                   
              
                  
                ?>
                      


         </div>      

    

<!-- end of content   -->
    
  </div>
      

  <br> <br>

      
    


    <div data-theme="b" data-role = "footer" >


         <div  >  <a href="tel:+233506070555"><img src="img/mob/icons-phone.png"></img> </a> <a href="https://burrobrand.biz/"><img  src="img/mob/icons-site.png"></img></a> <a href="http://www.facebook.com/BurroBrand"> <img src="img/mob/icons-FB.png"></img></a></div>
    
        

        <div style=" " >  <a href="https://burrobrand.biz/catalogue/Burro_Catalogue.pdf" target="_blank"><img src="img/mob/icons-download.png"></img></a>  <a href="mailto:info@burrobrand.biz"><img src="img/mob/icons-email.png"></img></a>  </div>


  
    </div>

</div>



</body>
 <?php
    mysql_close($link);
  
  ?>

</html>
