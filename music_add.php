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
                <h4>เพิ่มรายชื่อเพลง</h4>    
                <?php
                        if(isset($_GET['submit'])){
                            $M_S_ID     = $_GET['M_S_ID'];
                            $M_name     = $_GET['M_name'];
                            $M_RM       = $_GET['M_RM'];
                            $sql        = "insert into music";
                            $sql        .= " values (null,'$M_S_ID','$M_name','$M_RM')";
                            include 'connectdb.php';
                            mysqli_query($conn,$sql);
                            mysqli_close($conn);
                            echo "เพิ่มเพลง $M_name เรียบร้อยแล้ว<br>";
                            echo '<a href="music_list.php">แสดงรายชื่อเพลงทั้งหมด</a>';
                        }else{
                ?>
                    <form class="form-horizontal" role="form" name="music_add" action="<?php echo $_SERVER['PHP_SELF']?>">
                        <div class="form-group">
                            <label for="M_S_ID" class="col-md-2 col-lg-2 control-label">ชื่อศิลปิน</label>
                            <div class="col-md-10 col-lg-10">
                                <select name="M_S_ID" id="M_S_ID" class="form-control">
                                <?php
                                    include 'connectdb.php';
                                    $sql =  'SELECT * FROM singer order by S_ID';
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['S_ID'] . '">';
                                        echo $row['S_fname'] . $row['S_lname'];
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
                            <label for="M_name" class="col-md-2 col-lg-2 control-label">ชื่อเพลง</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="M_name" id="M_name" class="form-control">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="M_RM" class="col-md-2 col-lg-2 control-label">วันที่ปล่อยเพลง</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="date" name="M_RM" id="M_RM" class="form-control">
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