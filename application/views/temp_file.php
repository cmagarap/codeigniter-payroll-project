<?php
$at = $this->input->post('at');
        $bt = $this->input->post('bt');
        $pl = $this->input->post('pl');
        $process = count($at);
        
        for ($i = 0; $i < $process; $i++) {
            $letter[$i] = chr($i + 65);
        } 
        ?>
<br><br>
  <font color="white">
<div class="row">
     <div class="col-sm-4"></div>
        <div class="col-sm-4">
       <div class="col-sm-2">
                <div class="form-group">
                    Process
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                   Arrival Time
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">

                 Burst time
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">

                   Priority Level
                </div>
            </div>
        </div>
</div>
  </font>
<div class="row">
    <?php
    for ($i = 0; $i < $process; $i++) {
        ?>
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <div class="col-sm-2">
                <div class="form-group" style="color:#0000FF">
                 <font color="white">     <?= $letter[$i] ?>   </font>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                   <font color="white">   <?= $at[$i] ?>   </font>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                   <font color="white">   <?= $bt[$i] ?>   </font>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                     <font color="white"> <?= $pl[$i] ?>   </font>
                </div>
            </div>
            
       </div>
        <div class="col-sm-4"></div>


    <?php }echo "<br><br><br><br><br><br>";
    ?>
</div>

 

     <div class="col-sm-4"></div>
        <div class="col-sm-4">
    
 <?php
    //populates the inital queue
    for($x = 0; $x < $process; $x++)
        $job[] = $x;
    $CT[] = 0;
    //rearranges the queue by AT
    for($x = 1; $x < $process; $x++)
    {
        for ($y = 1; $y < $process; $y++)
        {
            if ($at[$job[$y]] < $at[$job[$y - 1]])
            {
                $temp = $job[$y];
                $job[$y] = $job[$y - 1];
                $job[$y - 1] = $temp;
            }
        }
    }
    //arranges the queue by BT
    for($x = 1; $x < $process; $x++)
    {
        for ($y = 1; $y < $process; $y++)
        {
            if ($y != (count($job) - 1) && $bt[$job[$y]] > $bt[$job[$y + 1]])
            {
                $temp = $job[$y];
                $job[$y] = $job[$y + 1];
                $job[$y + 1] = $temp;
            }
        }
    }
    $time = 0;
    for($x = 0; $x < $process; $x++)
    {
        $time += $bt[$job[$x]];
        $CT[$job[$x]] = $time;
    }
    
//calculates the TT, WT
    for($x = 0; $x < $process; $x++)
    {
        $TT[] = $CT[$x] - $at[$x];
        $WT[] = $TT[$x] - $bt[$x];
    }
?>

       <center>
         
        <table border="2" cellspacing="10">
            <thead>
                <tr>
                    <th> <font color="white" >Process </font></th>
                    <th> <font color="white" >AT </font></th>
                    <th><font color="white" >BT</font></th>
                    <th><font color="white" >Priority</font></th>
                    <th><font color="white" >WT</font></th>
                    <th><font color="white" >TT</font></th>
                   
                </tr>
            </thead>

            <tbody>
                <?php
                    for($x = 0; $x < $process; $x++)
                    {
                        print
                        ("
                            <tr>
                                <td>P" ."<font color='white' > ".($x + 1) .'</font>'. "</td>
                                <td>" ."<font color='white' > ". $at[$x] . '</font>'."</td>
                                <td>" ."<font color='white' > ". $bt[$x] . '</font>'."</td>
                                <td>" ."<font color='white' > ". $pl[$x] . '</font>'."</td>
                                <td>" ."<font color='white' > ". $WT[$x] . '</font>'."</td>
                                <td>" ."<font color='white' > ". $TT[$x] . '</font>'."</td>
                                
                            </tr>
                        ");
                    }
                ?>
            </tbody>
        </table>
           
           </font>
        </center>
            
            <br><?php
             $twt=0;
             $ttat=0;
             for ($x= 0; $x < $process; $x++) {
                 $twt +=$WT[$x];
                  $ttat +=$TT[$x];
             }
              echo "<br><br>";
                   echo "<font color='white'>Average waiting time: ". $twt/$process.'</font>';
                   echo "<font color='white'>Average turn around time: ". $ttat/$process.'</font>';