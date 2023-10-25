<?php require_once 'head.php';
    require_once '../../admin/includes/pdo.php';







?>

<style>


    .marks_tb{
        width: 90%;
        padding: 50px;
    }
   
    td input{
        width: 60px;
        background:transparent;
        border: none;
        border-bottom: 2px solid #fff;
        outline: none;
        color: #fff;
        /* border-radius: 10px; */
        height: 20px;
        padding: 3px;
    }
</style>

 <!-- START OF  LARGE FORM-------------------------->
 <form action=""  >
            <table class="marks_tb table-view">
                <tr>
                    <td rowspan="2" style=" font-size:20px; height:25px;width:20px;font-weight: 600; text-align: center;text-transform: uppercase;">subject</td>
                    <td colspan="10" style="padding: 10px;">End of term Progressive assessment Score Indentifiers

                    </td>
                </tr>
                <tr>


                    <!-- <th>subject</th> -->
                    <th>student</th>
                    <th>A1</th>
                    <th>A2</th>
                    <th>A3</th>
                    <th>A4</th>
                    <th>A5</th>
                    <th>Tt pts</th>
                    <th>LOA</th>
                    <th>Descriptor</th>
                    <th>Out of 100</th>

                    <th>TR</th>

                </tr>
                <?php 
                
                $sql = 'select * from marks';

$stmt = $pdo->query($sql);
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)):?>
                <tr>
                    <td class="S_N"><?php echo $row['subject']?></td>
                    <td class="S_N"><?php echo $row['student']?></td>
                    <td><?php echo  $row['activity1']?></td>
                    <td><?php echo  $row['activity2']?></td>
                    <td><?php echo  $row['activity3']?></td>
                    <td><?php echo  $row['activity4']?></td>
                    <td><?php echo  $row['activity5']?></td>

                 

                </tr>
                <?php endwhile;?>
               
                <tr>
                    <td colspan="4">
                        <h4>Total score</h4>
                    </td>
                    <td colspan="3">
                        <h4></h4>
                    </td>
                    <td colspan="2">
                        <h4 id="total_grade_l">TT Avg and Comment</h4>
                    </td>
                    <td>

                    </td>
                    <td>

                    </td>



                </tr>



            </table>
            <div class="buttons">
                <button id="save" type="button">Grade</button>
                
                <button id="next" type="button" onclick="window.print()">Print</button>
                <button id="clear" type="reset" >clear</button>
            </div>
        </form>




<?php require_once 'footer.php'?>