<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Music Station</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="bootstrap/js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap/js/bootstrap.min.js"></script>        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="bootstrap/js/html5shiv.min.js"></script>
            <script src="bootstrap/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body style="background-color: antiquewhite;">        
        <div class="container">
            <div class="row"> 
                <div class="jumbotron" style="background-color: aquamarine;">
                    <?php include 'topbanner.php';?>
                </div>
            </div>
            <div class="row">
                <?php include 'menu.php';?>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <p>Music Station</p>
                </div>  
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <h2>รายการเพลง</h2>
                    <a href="music_add.php" class="btn btn-link">เพิ่มรายชื่อเพลง</a>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>รหัส</th>
                                <th>ชื่อศิลปิน</th>
                                <th>ชื่อเพลง</th>
                                <th colspan="2">วันที่ปล่อยเพลง</th>
                            </tr>                
                        </thead>
                        <tbody>
                            <?php
                                include 'connectdb.php';
                                $sql =  'SELECT * FROM music_detail order by M_ID';
                                $result = mysqli_query($conn,$sql);
                                while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                    echo '<tr>';
                                    echo '<td>' . $row['M_ID'] . '</td>';
                                    echo '<td>' . $row['S_fname'] . $row['S_lname'] . '</td>';
                                    echo '<td>' . $row['M_name'] . '</td>';
                                    echo '<td>' . $row['M_RM'] . '</td>';
                                    echo '<td>';
                            ?>
                                <a href="music_edit.php?M_ID=<?php echo $row['M_ID'];?>" class="btn btn-warning">แก้ไข</a>
                                <a href="JavaScript:if(confirm('ยืนยันการลบ')==true){window.location='music_delete.php?M_ID=<?php echo $row["M_ID"];?>'}" class="btn btn-danger">ลบ</a>
                            <?php
                                    echo '</td>';
                                    echo '</tr>';
                                }
                                mysqli_free_result($result);
                                mysqli_close($conn);
                            ?>
                        </tbody>    
                    </table>
                </div>    
            </div>
            <div class="row">
            <marquee behavior="scroll" direction="right" scrollamount="8" onmouseOver="this.stop()" onmouseOut="this.start()"> <font size="3" color="red">Project Term </font> </marquee>
            </div>
        </div>    
    </body>
</html>