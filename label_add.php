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
                    <p>Login Area</p>
                </div>  
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <h4>เพิ่มค่ายเพลง</h4>
                    <?php
                        if(isset($_GET['submit'])){
                            $L_name     = $_GET['L_name'];
                            $L_owner    = $_GET['L_owner'];
                            $L_add      = $_GET['L_add'];
                            $L_tel      = $_GET['L_tel'];
                            $sql        = "insert into label";
                            $sql        .= " values (null,'$L_name','$L_owner','$L_add','$L_tel')";
                            include 'connectdb.php';
                            mysqli_query($conn,$sql);
                            mysqli_close($conn);
                            echo "เพิ่มค่ายเพลง $L_name เรียบร้อยแล้ว<br>";
                            echo '<a href="label_list.php">แสดงรายชื่อค่ายเพลงทั้งหมด</a>';
                        }else{
                    ?>
                    <form class="form-horizontal" role="form" name="label_add" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <div class="form-group">
                            <label for="L_name" class="col-md-2 col-lg-2 control-label">ชื่อค่ายเพลง</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="L_name" id="L_name" class="form-control">
                            </div>    
                        </div> 
                        <div class="form-group">
                            <label for="L_owner" class="col-md-2 col-lg-2 control-label">ผู้บริหาร</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="L_owner" id="L_owner" class="form-control">
                            </div>    
                        </div>    
                        <div class="form-group">
                            <label for="L_add" class="col-md-2 col-lg-2 control-label">ที่อยู่</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="L_add" id="L_add" class="form-control">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="L_tel" class="col-md-2 col-lg-2 control-label">เบอร์โทร</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="L_tel" id="L_tel" class="form-control">
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