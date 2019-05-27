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
                    <p>Music Ststion</p>
                </div>  
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <h4>เพิ่มข้อมูลศิลปิน</h4>
                    <?php
                        if(isset($_GET['submit'])){
                            $S_fname = $_GET['S_fname'];
                            $S_lname = $_GET['S_lname'];
                            $S_BD = $_GET['S_BD'];
                            $S_enter = $_GET['S_enter'];
                            $S_L_ID = $_GET['S_L_ID'];
                            $sql = "insert into singer";
                            $sql .= " values (null,'$S_fname','$S_lname','$S_BD','$S_enter','$S_L_ID')";
                            include 'connectdb.php';
                            mysqli_query($conn,$sql);
                            mysqli_close($conn);
                            echo "เพิ่มศิลปิน $S_fname $S_lname เรียบร้อยแล้ว<br>";
                            echo '<a href="singer_list.php">แสดงรายชื่อศิลปินทั้งหมด</a>';
                        }else{
                    ?>
                    <form class="form-horizontal" role="form" name="lecturer_add" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <div class="form-group">
                            <label for="S_fname" class="col-md-2 col-lg-2 control-label">ชื่อ</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="S_fname" id="S_fname" class="form-control">
                            </div>    
                        </div>    
                        <div class="form-group">
                            <label for="S_lname" class="col-md-2 col-lg-2 control-label">นามสกุล</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="S_lname" id="S_lname" class="form-control">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="S_BD" class="col-md-2 col-lg-2 control-label">วันเกิด</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="date" name="S_BD" id="S_BD" class="form-control">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="S_enter" class="col-md-2 col-lg-2 control-label">วันเข้าค่ายเพลง</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="date" name="S_enter" id="S_enter" class="form-control">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="S_L_ID" class="col-md-2 col-lg-2 control-label">ค่ายเพลง</label>
                            <div class="col-md-10 col-lg-10">
                                <select name="S_L_ID" id="S_L_ID" class="form-control">
                                <?php
                                    include 'connectdb.php';
                                    $sql =  'SELECT * FROM label order by L_ID';
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['L_ID'] . '">';
                                        echo $row['L_name'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result);
                                    echo '</table>';
                                    mysqli_close($conn);
                                ?>
                                </select>
                           </div>    
                        </div> 
                        <div class="form-group">
                            <div class="col-md-10 col-lg-10">
                                <input type="submit" name="submit" value="ตกลง" class="btn btn-default">
                            </div>    
                        </div>
                     </form>
                    <?php
                        }
                    ?>
                </div>    
            </div>
            <div class="row">
            <marquee behavior="scroll" direction="right" scrollamount="8" onmouseOver="this.stop()" onmouseOut="this.start()"> <font size="3" color="red">Project Term </font> </marquee>
            </div>
        </div>    
    </body>
</html>