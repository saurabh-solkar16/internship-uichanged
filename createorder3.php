
<?php 
session_start();
if (isset($_SESSION['id'])) {
$id=$_SESSION['id'];
include 'connection.php'; 
  

?>


<!DOCTYPE html>
<html>
<head>
    <title></title>
     <script src="libs/jquery.js"></script>
        <script src="dist/clayfy.min.js"></script>
        <link rel="stylesheet" href="dist/clayfy.min.css" type="text/css">
  
<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">

        <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">

       <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <link rel="stylesheet" href="css/jquery.popup.css" type="text/css">

  <script type="text/javascript" src="js/jquery.popup.js"></script>
  
  <script type="text/javascript">
    $(function() {
      $(".js__p_start, .js__p_another_start").simplePopup();
    });
  </script>
        <style type="text/css">
             #logo{
                height: 100px;
                width : 150px;
                background : #ccc;
                position: absolute;
                top: 10px;
                left: 10px;

            }
            #main{
                margin-bottom: 20px;
                height: 300px;
               width: 300px;
                position: relative;
            }
            
        </style>

         <script type="text/javascript">
                     var v1=0;
                var mainproductid=0;
                var pcategory=0;
                var pmodel=0;
                var logoid1=0;
                var mainid1=null;
                var zone=null;
                var selectedcustomer=0;
                var mainproductprice=0;
                var zonep=0;
                var  paymentmode=null;

 $(document).ready(function(){

              var v=$("#main").position();
              var marginl=$("#main").css("margin-left");
              var margint=$("#main").css("margin-top");
              var paddingt=$("#main").css("padding-top");
              var paddingl=$("#main").css("padding-left");
              var width=$("#main").outerWidth();
              var height=$("#main").outerHeight();
              var width1=$("#logo").outerWidth();
              var height1=$("#logo").outerHeight();
              var totalp;


 $("body").on("click",".logoc", function(){
    logoid1=$(this).attr('id');
var g= $(this).attr('src');
$('#logo').attr('src',g);
  });

            
   $("body").on("click","#searchbutton", function(){
  var id=$("#search").val();
$('#myicons').load('mylogo.php?id='+id);
});


                $('#category').change(function(){
                var id=$(this).attr('id');
                var cat=$(this).val();
                //alert(cat);
                $('#'+id).attr('onkeyup',cat);
                $(location).attr('href', 'createorder3.php?category='+cat);
                //$('#'+id).attr('onkeyup',cat);
                $('#bb').text(cat);
                });
$('#grab').click(function(){
 category=$('#category').val();
 var name1=$('#m1').text();
  var name2=$('#m2').text();
 brand=$('#i1').val();
 model=$('#i2').val();
//alert(category+" "+brand+" "+model);
$.getJSON( "loadproduct.php?category="+category+"&brand="+brand+"&model="+model+"&name1="+name1+"&name2="+name2, function( data ) {
  pcategory=category;
  var items = [];
  $.each( data, function( key, val ) {

mainproductid=val.id;
zone=val.zone;

//alert(mainproductid+zone);
pmodel=val.model;

mainproductprice=val.price;
$('#main').attr('src',val.imagepath);

$('#open-preview').css('background-image','url('+val.imagepath+')');
$('.img2').attr('src',val.img2);
$('.img3').attr('src',val.img3);
  });
});



  
$('#main').css('background-image','url('+val.imagepath+')');
$('.img2').attr('src',val.img2);
$('.img3').attr('src',val.img3);
$('#displayarea').css('height',val.lheight);
$('#displayarea').css('width',val.lwidth);


$('#logo').css('height',val.lheight);
$("#displayarea").css("margin-top",val.y1);
$('#logo').css('width',val.lwidth);
$('#logo').css('left',val.x1);
$('#logo').css('top',val.y1);
//var zonep;

 $.post("zone.php",
    {
      zone:zone
    }, function(data, status){
        $('#zonepp').text(data);
    var    zonep=data;
        //alert("parsed"+zonep+1000);
    }).then(function(){

      zonep=parseInt($('#zonepp').text());
      // alert(parseInt(zonep)+400);

      //  var ff=zonep;

//zonep=$('#zonepp').text();
 //lert(parseInt(ff)+80);
var m=quantity*mainproductprice;
//alert('m='+m);
var x11=zonep+m;
//alert('x11'+x11);
//alert('zonep'+ff);
//alert(x11);
totalp=x11;
$('#total').text(x11);


    });

$('.selection1').show(500);



  });

$('#open-preview').click(function(){
  //  alert($("#hideid").text());
 var id1=$("#hideid").text();
//alert(id1);
$('#myicons').load('mylogo.php?id1='+id1);
$('.selection12').show(500);
});



$('.kk').hide();

    });
    </script>

</head>

<body>
 

    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.html">vendorboat</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                               
                            </div>
                        </li>
                        <li class="nav-item dropdown notification">
                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span class="indicator"></span></a>
                           
                        </li>
                       
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo $_SESSION['fname'].' '.$_SESSION['lname'] ; ?></h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
                                <a class="dropdown-item" href="main.php?logout=true"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
                                                           </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-rocket"></i>Orders</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/createorder3.php">Create New<span class="badge badge-secondary">New</span></a>
                                        </li>
                                       
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/carousel.html">My Orders</a>
                                        </li>
                                         <li class="nav-item">
                                            <a class="nav-link" href="pages/general.html">Track Order</a>
                                        </li>
                                    
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-fw fa-chart-pie"></i>Update </a>
                                <div id="submenu-3" class="collapse submenu" style="">
                              <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Update Details</a>
                                        </li>
                                    </ul>
</div>
                            </li>
                            
                           
                           
                          
                           
                          
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <center><h2 class="pageheader-title">Orders</h2></center>
                               
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                          
                                            <li class="breadcrumb-item active" aria-current="page"> Dashboard </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">

                        <div class="row">


                            <div class="col-6">
                                <div class="card" style="padding:5%;">
                                    
                                        <h5 class="text-muted">Create product</h5>
                                        
                                         <select class="form-control" name="category" id="category" >
  
                                                        <?php
                                                         if (isset($_GET['category']))
                                                          { 
                                                            ?>
                                                                <option value="<?php  echo $_GET['category']; ?>"><?php  echo $_GET['category']; ?></option>
                                                            <?php
                                                         
                                                          } 
                                                          ?>
                                                           <option>--select--</option>

                                                               <?php 
                                                        $sql="select * from category";
                                                        $arr=array();
                                                          $result=mysqli_query($conn,$sql);
                                                        while ($row=mysqli_fetch_assoc($result)) {

                                                               ?>
                                                              <option value="<?php echo $row['category'] ;?>"><?php echo $row['category'] ;?></option>
                                                            <?php } ?>
                                                           
                                                            </select>
                                             

                                    <?php
                                    if (isset($_GET['category'])) {

                                    $cat=$_GET['category'];
                                    $sql="select * from category where category='$cat'";
                                      $result=mysqli_query($conn,$sql);
                                    while ($row=mysqli_fetch_assoc($result)) {
                                    for ($i=1; $i <3 ; $i++) { 
                                      if ($row['c'.$i]!='imagepath'&&$row['c'.$i]!='zone'&&$row['c'.$i]!='price') {
                                       $arr[$i]=$row['c'.$i];
                                     }
                                    }

                                    }
                                    ?>
                                        
                                              <?php
                                    for($j=1;$j<3;$j++){


                                    if($row['c'.$j]!='N/A'){
                                    //echo $arr[$j];
                                    ?>

                                    <?php
                                    //if ($arr[$j]!='imagepath'&&$arr[$j]!='zone'&&$arr[$j]!='price') {
                                       
                                      // print_r($arr);
                                     ?>
   <span id="<?php echo 'm'.$j;?>" class="kk"><?php echo $arr[$j];?></span>
                                       <h5><?php echo $arr[$j];?><span style="color:red;font-size: 20px;">*</span></h5>
                                    
                                     <select class="form-control" id="<?php echo 'i'.$j;?>">

                                     <?php
                                  
                                     $sql="SELECT DISTINCT $arr[$j] FROM $cat ";
                               
                                      $result=mysqli_query($conn,$sql);
                                    while ($row=mysqli_fetch_assoc($result)) {
                                    ?>  <option>
                                    <?php echo  $row[$arr[$j]]; ?>
                                    </option>
                                    <?php
                                    }
                                    ?>

                                    </select>

                                    <?php
                                    //} 

                                    }
                                    }

                                    }
                                              ?>
        


    <div style="width: 100%;margin-top: 10px;" id="grab"  class="form-control btn btn-primary"><b style="color:white;">Load</b></div>
  


                                       
                                  
                                </div>
                            </div>
                             <div class="col-6">

        
 <p id="hideid"><?php echo $_SESSION['id']; ?></p>

                                                     <div class="card" style="align-self: center;padding: 2%;">


                                   <!-- Large modal -->
                                   <center>
<div  id="open-preview" data-toggle="modal" data-target=".bd-example-modal-lg" style="height: 100px;width: 100px;background-color: gray;"></div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="padding: 2%;">
     
                       <table>     
                       <tbody>    
                               <tr><td>     
          <h4 style="color: #1c6704;">Preview</h4>

      
        
                     <br><br>
                          <img  id="img2" class="img2 mainc" style="background-color:#c7c7c7; width: 70px;  height: 70px;"  >
                                <img  id="img3" class="img3 mainc" style="background-color:#c7c7c7;width: 70px;  height: 70px;"   >
                               
                      </td> <td>waiting</td></tr>  
                      <tr><td>
                     <input type="text" name="" id="search" placeholder="search by sqa number"> <input type="button" value="Search" name="" id="searchbutton">

                  <div  id="myicons">    
                  </div>
                      </td></tr>
                      </tbody>    
                      </table>   
              
    </div>
  </div>
</div>

                                       
                                  
                                </div>

                            </div>
                         

                         <!-- Large modal -->


                        </div>
                       









     <div class="row">

 <div class="col-6">
          <div class="card" style="align-self: center;padding: 2%;">              
                                       




         
        <div  id="main" style="height: 300px;width: 300px; border: 2px solid #444;background-image: url('cart.png'); ">
          <div id="displayarea" style="height: 200px;width: 200px; border: 2px solid #444;top:30;left: 40" >
            <img src="g3.png" id="logo"  >
            </div>
        </div>


          
        <script>
            var $demo6 = $('#logo');
            $demo6.clayfy({
                type : 'resizable',
                container : '#displayarea',
                minSize : [100,50],
                maxSize : [190,190],
                className : 'custom-handlers',
                callbacks : {
                    resize : function(){
                     
                   var p=$demo6.position();
                      console.log('inner: ' + $demo6.width() +'  '+p.top+'  '+p.left);
//document.getElementById("here").innerHTML=$demo6.width()*20 ;

                    }

                    
                },
                drag:function(){
                    var p=$demo6.position();
                        console.log('inner: ' + $demo6.width() +'  '+p.top+'  '+p.left);
                //        document.getElementById("here").innerHTML=$demo6.width() ;
                    }
            });
           
        </script>
         
                                  
                                </div>
                            </div>


                         
                        </div>
                       


    <script>
            var $demo6 = $('#logo');
            $demo6.clayfy({
                type : 'resizable',
                container : '#displayarea',
                minSize : [100,50],
                maxSize : [190,190],
                className : 'custom-handlers',
                callbacks : {
                    resize : function(){
                     
                   var p=$demo6.position();
                      console.log('inner: ' + $demo6.width() +'  '+p.top+'  '+p.left);
//document.getElementById("here").innerHTML=$demo6.width()*20 ;

                    }

                    
                },
                drag:function(){
                    var p=$demo6.position();
                        console.log('inner: ' + $demo6.width() +'  '+p.top+'  '+p.left);
                //        document.getElementById("here").innerHTML=$demo6.width() ;
                    }
            });
           
        </script>



</body>
</html>

<?php
}else{
 echo "<h1 class='alert alert-danger'>Please login</h1>";
    header('Location:login.html');
}


 if (isset($_GET['logout'])){
if($_GET['logout']=='true'){
    session_destroy();
header('Location:login.html');
}

} 
?>