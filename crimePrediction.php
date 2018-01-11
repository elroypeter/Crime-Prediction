<?php 




//process probability of crimes
if (isset($_POST['check']) ) {
	//clear previous knowledge generated message 
	session_start();
	session_destroy();

$division=trim($_POST['division']);

if(empty($division) || $division!='Dhaka'){
      

echo"<script>alert('Data not available .Please select Dhaka division only')</script>";
                        
echo"<script>window.open('index.php','_self')</script>";
            exit;
  }  
     


  $sql = "SELECT SUM(totalcrime)  as getc FROM crime_data_dmp where division ='$division'";
      $result = @mysqli_query($conn,$sql);
      $row = @mysqli_fetch_array($result,MYSQLI_ASSOC);
    $totalcrime = $row['getc'];
    


    //dacoity  
      $sql = "SELECT SUM(dacoity)  as getc FROM crime_data_dmp where division ='$division'";
      $result = @mysqli_query($conn,$sql);
      $row = @mysqli_fetch_array($result,MYSQLI_ASSOC);
      $totaldacoity = $row['getc'];
      @$pdacoity=($totaldacoity/$totalcrime)*100;
      $pdacoity=round($pdacoity);

      //robbery

      $sql = "SELECT SUM(robbery)  as getc FROM crime_data_dmp where division ='$division'";
      $result = @mysqli_query($conn,$sql);
      $row = @mysqli_fetch_array($result,MYSQLI_ASSOC);
      $totalrobbery = $row['getc'];
      @$probbery=($totalrobbery/$totalcrime)*100;
      $probbery=round($probbery);

      //murder

            $sql = "SELECT SUM(murder)  as getc FROM crime_data_dmp where division ='$division'";
      $result = @mysqli_query($conn,$sql);
      $row = @mysqli_fetch_array($result,MYSQLI_ASSOC);
      $totalmurder = $row['getc'];
      @$pmurder=($totalmurder/$totalcrime)*100;
      $pmurder=round($pmurder);

      //kidnapping
            $sql = "SELECT SUM(kidnapping) as getc FROM crime_data_dmp where division ='$division'";
      $result = @mysqli_query($conn,$sql);
      $row = @mysqli_fetch_array($result,MYSQLI_ASSOC);
      $totalkidnapping = $row['getc'];
      @$pkidnapping=($totalkidnapping/$totalcrime)*100;
      $pkidnapping=round($pkidnapping);

      //vehicletheft
            $sql = "SELECT SUM(vehicletheft) as getc FROM crime_data_dmp where division ='$division'";
      $result = @mysqli_query($conn,$sql);
      $row = @mysqli_fetch_array($result,MYSQLI_ASSOC);
      $totalvehicletheft = $row['getc'];
      @$pvehicletheft=($totalvehicletheft/$totalcrime)*100;
      $pvehicletheft=round($pvehicletheft);

      //speedytrial
            $sql = "SELECT SUM(speedytrial) as getc FROM crime_data_dmp where division ='$division'";
      $result = @mysqli_query($conn,$sql);
      $row = @mysqli_fetch_array($result,MYSQLI_ASSOC);
      $totalspeedytrial = $row['getc'];
      @$pspeedytrial=($totalspeedytrial/$totalcrime)*100;
      $pspeedytrial=round($pspeedytrial);

      //narcotics
            $sql = "SELECT SUM(narcotics) as getc FROM crime_data_dmp where division ='$division'";
      $result = @mysqli_query($conn,$sql);
      $row = @mysqli_fetch_array($result,MYSQLI_ASSOC);
      $totalnarcotics = $row['getc'];
      @$pnarcotics=($totalnarcotics/$totalcrime)*100;
      $pnarcotics=round($pnarcotics);

      //wr
            $sql = "SELECT SUM(wr) as getc FROM crime_data_dmp where division ='$division'";
      $result = @mysqli_query($conn,$sql);
      $row = @mysqli_fetch_array($result,MYSQLI_ASSOC);
      $totalwr = $row['getc'];
      @$pwr=($totalwr/$totalcrime)*100;
      $pwr=round($pwr);

      //cr
            $sql = "SELECT SUM(cr) as getc FROM crime_data_dmp where division ='$division'";
      $result = @mysqli_query($conn,$sql);
      $row = @mysqli_fetch_array($result,MYSQLI_ASSOC);
      $totalcr = $row['getc'];
      @$pcr=($totalcr/$totalcrime)*100;
      $pcr=round($pcr);

      //molomparty
            $sql = "SELECT SUM(molomparty) as getc FROM crime_data_dmp where division ='$division'";
      $result = @mysqli_query($conn,$sql);
      $row = @mysqli_fetch_array($result,MYSQLI_ASSOC);
      $totalmolomparty = $row['getc'];
      @$pmolomparty=($totalmolomparty/$totalcrime)*100;
      $pmolomparty=round($pmolomparty);

      //ogganparty
            $sql = "SELECT SUM(ogganparty) as getc FROM crime_data_dmp where division ='$division'";
      $result = @mysqli_query($conn,$sql);
      $row = @mysqli_fetch_array($result,MYSQLI_ASSOC);
      $totalogganparty = $row['getc'];
      @$pogganparty=($totalogganparty/$totalcrime)*100;
      $pogganparty=round($pogganparty);


      //information generation
      session_start();

      if($pogganparty >30 || $pmolomparty >30 || $pcr> 30 || $pwr>30 || $pnarcotics>30 || $pspeedytrial>30 || $pvehicletheft>30 || $pkidnapping>30 || $pmurder>30 || $probbery>30 || $pdacoity>30 )


      {

      	$_SESSION['crimeprediction']= "highly insecure";

      } else if($pogganparty >25 || $pmolomparty >25 || $pcr> 25 || $pwr>25 || $pnarcotics>25 || $pspeedytrial>25 || $pvehicletheft>25 || $pkidnapping>25 || $pmurder>25 || $probbery>25 || $pdacoity>25 ){

      	$_SESSION['crimeprediction']= "insecure";
      }else if($pogganparty >20 || $pmolomparty >20 || $pcr> 20 || $pwr>20 || $pnarcotics>20 || $pspeedytrial>20 || $pvehicletheft>20 || $pkidnapping>20 || $pmurder>20 || $probbery>20 || $pdacoity>20 ){

      	$_SESSION['crimeprediction']= " less secure";
      }else{
      	$_SESSION['crimeprediction']= "Secure";


      }
   

   //display the information
     ?>


                        <div class="col-md-2" id="resize" > 


                              <div class="pie-title-center"  id="crime1" data-percent="<?php echo $pdacoity;?>">
                                     <span class="pie-value"><b><?php echo $pdacoity;?>% </b></span>
                                     <p><strong>dacoity</strong> :<?php echo $totaldacoity;?></p>
                                     <p><strong>Total Crime:</strong><?php echo $totalcrime;?></p>
                                     
                              </div><br><br> 
                        </div> 


                        <div class="col-md-2" id="resize" > 


                              <div class="pie-title-center"  id="crime2" data-percent="<?php echo $probbery;?>">
                                     <span class="pie-value"><b><?php echo $probbery;?>% </b></span>
                                     <p><strong>robbery</strong> :<?php echo $totalrobbery;?></p>
                                     <p><strong>Total Crime:</strong><?php echo $totalcrime;?></p>
                                     
                              </div><br><br> 
                        </div>


                        <div class="col-md-2" id="resize" > 


                              <div class="pie-title-center"  id="crime3" data-percent="<?php echo $pmurder;?>">
                                     <span class="pie-value"><b><?php echo $pmurder;?>% </b></span>
                                     <p><strong>murder</strong> :<?php echo $totalmurder;?></p>
                                     <p><strong>Total Crime:</strong><?php echo $totalcrime;?></p>
                                     
                              </div><br><br> 
                        </div>

                        <div class="col-md-2" id="resize" > 


                              <div class="pie-title-center"  id="crime4" data-percent="<?php echo $pkidnapping;?>">
                                     <span class="pie-value"><b><?php echo $pkidnapping;?>% </b></span>
                                     <p><strong>kidnapping</strong> :<?php echo $totalkidnapping;?></p>
                                     <p><strong>Total Crime:</strong><?php echo $totalcrime;?></p>
                                     
                              </div><br><br> 
                        </div>


                        <div class="col-md-2" id="resize" > 


                              <div class="pie-title-center"  id="crime5" data-percent="<?php echo $pvehicletheft;?>">
                                     <span class="pie-value"><b><?php echo $pvehicletheft;?>% </b></span>
                                     <p><strong>vehicletheft</strong> :<?php echo $totalvehicletheft;?></p>
                                     <p><strong>Total Crime:</strong><?php echo $totalcrime;?></p>
                                     
                              </div><br><br> 
                        </div>



<div class="col-md-2" id="resize" > 


                              <div class="pie-title-center"  id="crime6" data-percent="<?php echo $pspeedytrial;?>">
                                     <span class="pie-value"><b><?php echo $pspeedytrial;?>% </b></span>
                                     <p><strong>speedytrial</strong> :<?php echo $totalspeedytrial;?></p>
                                     <p><strong>Total Crime:</strong><?php echo $totalcrime;?></p>
                                     
                              </div><br><br> 
                        </div>




<div class="col-md-2" id="resize" > 


                              <div class="pie-title-center"  id="crime7" data-percent="<?php echo $pnarcotics;?>">
                                     <span class="pie-value"><b><?php echo $pnarcotics;?>% </b></span>
                                     <p><strong>narcotics</strong> :<?php echo $totalnarcotics;?></p>
                                     <p><strong>Total Crime:</strong><?php echo $totalcrime;?></p>
                                     
                              </div><br><br> 
                        </div>




<div class="col-md-2" id="resize" > 


                              <div class="pie-title-center"  id="crime8" data-percent="<?php echo $pwr;?>">
                                     <span class="pie-value"><b><?php echo $pwr;?>% </b></span>
                                     <p><strong>Women Repression</strong> :<?php echo $totalwr;?></p>
                                     <p><strong>Total Crime:</strong><?php echo $totalcrime;?></p>
                                     
                              </div><br><br> 
                        </div>





<div class="col-md-2" id="resize" > 


                              <div class="pie-title-center"  id="crime9" data-percent="<?php echo $pcr;?>">
                                     <span class="pie-value"><b><?php echo $pcr;?>% </b></span>
                                     <p><strong>Child Repression</strong> :<?php echo $totalcr;?></p>
                                     <p><strong>Total Crime:</strong><?php echo $totalcrime;?></p>
                                     
                              </div><br><br> 
                        </div>




<div class="col-md-2" id="resize" > 


                              <div class="pie-title-center"  id="crime10" data-percent="<?php echo $pmolomparty;?>">
                                     <span class="pie-value"><b><?php echo $pmolomparty;?>% </b></span>
                                     <p><strong>molomparty</strong> :<?php echo $totalmolomparty;?></p>
                                     <p><strong>Total Crime:</strong><?php echo $totalcrime;?></p>
                                     
                              </div><br><br> 
                        </div>




<div class="col-md-2" id="resize" > 


                              <div class="pie-title-center"  id="crime11" data-percent="<?php echo $pogganparty;?>">
                                     <span class="pie-value"><b><?php echo $pogganparty;?>% </b></span>
                                     <p><strong>ogganparty</strong> :<?php echo $totalogganparty;?></p>
                                     <p><strong>Total Crime:</strong><?php echo $totalcrime;?></p>
                                     
                              </div><br><br> 
                        </div>









                        </div><div class="col-md-2" id="resize" > 
                         
                                     <h3 id="predict"><b><?php echo $_SESSION['crimeprediction'];?></b></h3>
                                     <div class="alert alert-danger">
  <strong>&copy;<?php echo date('Y');?></strong>       All rights Reserved by CPT.
                        
</div>
                              </div><br><br></div>
                        
                        </div>

                        <?php }

                        ?>