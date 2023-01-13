<?php
//chrome://net-internals/#dns
$eid=@$_GET['eid'];
$qid=@$_GET['qid'];
$sid=@$_GET['sid'];
$qtotal=@$_GET['qtotal'];
$stotal=@$_GET['stotal'];
$i=@$_GET['i'];
$cookie_name = "total";
$cookie_value = $qtotal;
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
exam:
$cookie_name = "check";
$cookie_value = 0;
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
$cookie_name = "counter";
$cookie_value = $i;
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
include("Scripts/session.php");
?>
<html>
<head>
<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->
<link href="bootstrap5/css/bootstrap.min.css" rel="stylesheet">
<link href="font/bootstrap-icons.css" rel="stylesheet">
<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">-->
<link rel="stylesheet" href="CSS/main.css" type="text/css">
<script>
function setCookie(cname,cvalue,exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  let expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function checkCookie(str) {
  let i = getCookie("counter");
  let t= getCookie("total");
  let c=getCookie("check");
  if (i < t) {
    i++;
    setCookie("counter", i, 30);
    setCookie("check", 1, 30);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("hint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","CreateExam.php?q="+str,true);
    xmlhttp.send();
  } else {
       setCookie("check", 0, 30);
  }
}
function next(str)
{
    var s=str;
    var res="hint"+str;
    var text = document.getElementById(res);
    var checkBox = document.getElementById("quiz"+str);
    var t= getCookie("total");
        //if (checkBox.checked == true){it is radio button so no need to check it
            //if it is checkbox then we need to check it whetehr it is checked because when clicked it amy be checked or remove the check.but radio button is always checked if it is clicked
            //alert(res);
          text.style.display = "block";/*block;*/
          if(str!=t)
            document.getElementById("hint2"+str).style.display="block";
          var str2=str;
          
          while(str!=t){
            str++;
            document.getElementById("hint"+str).style.display="none";
            document.getElementById("hint2"+str).style.display="none";
          }
          while(str2!=0){
            str2--;
            document.getElementById("hint"+str2).style.display="none";
            document.getElementById("hint2"+str2).style.display="none";
          } 
         
          
        //}
        /*else{
          text.style.display = "none";
        }*/
}
function check2(){
    document.getElementById("hint"+1).style.display="block";
    document.getElementById("hint2"+1).style.display="block";
}
function buttons(str)
{   
    var t= getCookie("total");
    var s=str;
    var str6=str;
    if(str != t)
       str++;
    var res="hint"+str;
    var res2="hint2"+str;
    //var res3="hint3"+(str);
    var text = document.getElementById(res);
    var text2 = document.getElementById(res2);
    //var text3=document.getElementById(res3);
    text.style.display = "block";
    if(str!=t)
      text2.style.display = "block";
    if(str!=1)
        //text3.style.display = "block";
    var str2=str;
    var str3=str;
    var str4=str;
    var s=str;
    var s1=str;
    var s2=str;
    var s3=str;
   
    while(str!=t){
      str++;
      document.getElementById("hint"+str).style.display="none";
    }
    
    while(str2!=0){
      str2--;
      if(str2!=0)
         document.getElementById("hint"+str2).style.display="none";
    }
    
    while(str3!=t){
      str3++;
      document.getElementById("hint2"+str3).style.display="none";
    }
    while(str4!=0){
      str4--;
      document.getElementById("hint2"+str4).style.display="none";
    }  
    while(s!=t){
      s++;
      //document.getElementById("hint3"+s).style.display="none";
    }
    while(s2!=0){
      s2--;
      //document.getElementById("hint3"+s2).style.display="none";
    }
}
//when prev button2 press next and div 1 should display .button 1 is never displayed
/*function buttons2(str)
{   
    var t= getCookie("total");
    var s=str;
    str--;
    var res="hint"+str;
    var res2="hint2"+str;
    var res3="hint3"+str;
    var text = document.getElementById(res);
    var text2 = document.getElementById(res2);
    var text3=document.getElementById(res3);
    text.style.display = "block";
    if(str!=t)
      text2.style.display = "block";
    if(str!=1)
        text3.style.display = "block";
    var str1,str2,str3,str4,str5,str6,str7,str8;
    str1=str2=str3=str4=str5=str6=str7=str8=str;
    while(str1!=t){
      str1++;
      document.getElementById("hint"+str1).style.display="none";
    }   
    while(str2!=0){ 
        str2--;
        if(str2!=0)
         document.getElementById("hint"+str2).style.display="none";
    }
    while(str3!=t){
      str3++;
      document.getElementById("hint2"+str3).style.display="none";
    }
    while(str4!=0){
      str4--;
      if(str4!=0)
      document.getElementById("hint2"+str4).style.display="none";
    }
    while(str5!=t){  
        document.getElementById("hint3"+str5).style.display="none";
        str5++;
    }
    
    while(str6!=0){
        
      document.getElementById("hint3"+str6).style.display="none";
      str6--;
    }   alert(s);

    
}*/
function checkit(str)
{  
    var text = document.getElementById("just"+str);
    var checkBox = document.getElementsByName("str");
        if (checkBox.checked == true){
          text.style.color = "orange";/*block;*/
        }
}
/*
var checkBox = document.getElementsByName("1");
checkBox.addEventListener("change", fun2); 
function fun2{
    for(var i=1;i<=getCookie("total");i++)
    {
        var checkBox = document.getElementsByName(i);
        var text = document.getElementById("just"+i);
        text.style.color = "orange";/*block;
    }
}*/

</script>
</head>
<body onload="check2()">
    
<div class="container-fluid"><!--main container-fluid div-->
    <div class="header mt-2 mb-2">
        <div class="row mb-3" >
            <div class="col-lg-6">
                <span class="logo">Online Examination System</span>
            </div>
            <div class="col-lg-6">
                <?php 
                    $name=$_SESSION['name'];
                ?>
                <span class="rightfull "><span class="bi bi-person-fill mt-1" style="margin-top:7px !important;"></span>&nbsp;&nbsp;Hello  <?=$name?> &nbsp;&nbsp;|</span>
            </div>
        </div>
    </div>
</div>
    <div class="row">
        <div class="col-lg-12">
            <?php
                include("Scripts/connection.php");
                
    /*            if(@$_GET['q']=='exam' && @$_GET['step']==1)
                {
                    if($qid!=0)
                    {
                        echo '<form class="form-horizontal mt-2" name="examform3" action="CreateExam.php?q=startquiz&eid='.$eid.'&qid='.$qid.'&qtotal='.$qtotal.'&sid='.$sid.'&stotal='.$stotal.'"  method="POST">';
                            $cookie_name = "total";
                            $cookie_value = $qtotal;
                            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
                            exam:
                            $cookie_name = "check";
                            $cookie_value = 0;
                            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
                            $cookie_name = "counter";
                            $cookie_value = $i;
                            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
                            $sql="SELECT * from qquestion where Quiz_Id=$qid and sn=$i";
                            $data=mysqli_query($dbcon,$sql);
                            $row=mysqli_fetch_array($data);
                                /*echo '
                                <div id="hint">
                                    <span class=" title2"><b>Q.No&nbsp;'.$i.'&nbsp;:</b></span>
                                    <div class=" mb-3 mt-3">
                                        <label for="qns'.$i.'">'.$row['Qns'].'</label>
                                    </div>
                                    <div style="height:1px;background-color:white !important"></div>
                                    <div class=" mb-3">
                                      <input type="radio" value="1" name="'.$i.'">
                                      <label for="floatingInput">'.$row['op1'].'</label>
                                    </div>
                                    <div class=" mb-3">
                                      <input type="radio" value="2" name="'.$i.'">
                                      <label for="floatingInput">'.$row['op2'].'</label>
                                    </div>
                                    <div class=" mb-3">
                                      <input type="radio" value="3" name="'.$i.'">
                                      <label for="floatingInput">'.$row['op3'].'</label>
                                    </div>
                                    <div class=" mb-3">
                                      <input type="radio" value="4" name="'.$i.'">
                                      <label for="floatingInput">'.$row['op4'].'</label>
                                    </div>';
                                    /*select an option an submit it using ajax and goto next question
                                    $i=$i+1;
                                    if($i<=$qtotal){
                                        echo '<button id="next" formaction="exampage.php?q=exam&qid='.$qid.'&i='.$i.'&qtotal='.$qtotal.'">next</button>';
                                    }
                                echo '</div>';*/
        /*                    echo '
                            <div class="row mt-5">
                                <div class="col-lg-4" style="margin-left:20px;">';
                                  echo '<div class="row">';
                                    for($i=1;$i<=$qtotal;$i++)
                                    {
                                      echo '
                                      <div class="col-lg-2">
                                        <div class="input-group mb-3">
                                            <div class="input-group-text" style="width: 62px !important;padding-left: 5px;padding-right: 5px;">    
                                                <span class="input-group-text" style="color:yellow;padding-right:5px;" id="just'.$i.'"><input class="form-check-input" style="margin:auto;margin-left:0;margin-right:5px;" type="radio" onclick="next('.$i.')" value="1" id="quiz'.$i.'" name="quiz">'.$i.'</span>
                                            </div>  
                                        </div>
                                      </div>';
                                     
                                    }
                                  echo "</div>";
                                echo '</div>';
                                echo '<div class="col-lg-5">';
                                for($i=1;$i<=$qtotal;$i++)
                                {
                                    $sql="SELECT * from qquestion where Quiz_Id=$qid and sn=$i";
                                    $data=mysqli_query($dbcon,$sql);
                                    $row=mysqli_fetch_array($data);
                                                    //<div class=" mb-3">
                                                      //<input type="radio" value="1" name="'.$i.'">
                                                      //<label for="floatingInput">'.$row['op1'].'</label>
                                                    //</div>
                                    echo '
                                    <div id="hint'.$i.'" style="display:none;">
                                        <span class=" title2" style="background-color:white !important;padding:15px;color:black !important;"><b>Q.No&nbsp;'.$i.'&nbsp;:</b></span>
                                        <div class=" mb-3 mt-3">
                                            <span class="input-group-text " style="height:50px;">'.$row['Qns'].'</span>
                                        </div>
                                        <div style="height:1px;background-color:white !important;margin-bottom:30px;"></div>
                                        <input type="hidden" value="0" name="'.$i.'" selected>
                                        <div class="input-group mb-3">
                                          <div class="input-group-text">
                                            <input class="form-check-input mt-0 larger" type="radio" value="1" name="'.$i.'" onchange="checkit('.$i.')">
                                          </div>
                                          <span class="input-group-text col-md-10" style="height:50px;">'.$row['op1'].'</span>
                                        </div>     
                                        <div class="input-group mb-3">
                                            <div class="input-group-text">
                                              <input class="form-check-input mt-0 larger" type="radio" value="2" name="'.$i.'">
                                            </div>
                                            <span class="input-group-text col-md-10" style="height:50px;">'.$row['op2'].'</span>
                                        </div>
                                        <div class="input-group mb-3">
                                          <div class="input-group-text">
                                            <input class="form-check-input mt-0 larger" type="radio" value="3" name="'.$i.'">
                                          </div>
                                          <span class="input-group-text col-md-10" style="height:50px;">'.$row['op3'].'</span>
                                        </div>
                                        <div class="input-group mb-3">
                                          <div class="input-group-text">
                                            <input class="form-check-input mt-0 larger" type="radio" value="4" name="'.$i.'">
                                          </div>
                                          <span class="input-group-text col-md-10" style="height:50px;">'.$row['op4'].'</span>
                                        </div>
                                        
                                                    ';
                                                    /*echo '<input type="button" id="btn" value="click">
                                                    <p id = "para">helo</p> ';*/
                                        /*select an option an submit it using ajax and goto next question
                                        $i=$i+1;
                                        if($i<=$qtotal){
                                            echo '<button id="next" formaction="exampage.php?q=exam&qid='.$qid.'&i='.$i.'&qtotal='.$qtotal.'">next</button>';
                                        }*/

        /*                        echo '
                                    </div>';?>
                                    
                                    <?php
                                    //echo ' <input class="form-check-input mt-0  btn btn-outline-success" type="checkbox" onclick="next('.$i.')" value="1" id="quiz" name="quiz" style="padding:8px;">';                           
                                }
                                ?>
                                <!--
                                <script>
                                        document.getElementById("btn").addEventListener("click", fun);  
                                        function fun() {  
                                            document.getElementById("para").innerHTML = "Hello World" + "<br>" + "Welcome to the  javaTpoint.com"; 
                                            var res="hint"+str;
                                            var text = document.getElementById(res);
                                            var checkBox = document.getElementById("quiz"+str);
                                                if (checkBox.checked == true){
                                                    //alert(res);
                                                  text.style.display = "block";/*block;*/
            /*                                      var str2=str;
                                                  var t= getCookie("total");
                                                  while(str!=t){
                                                    str++;
                                                    document.getElementById("hint"+str).style.display="none";
                                                  }
                                                  while(str2!=0){
                                                    str2--;
                                                    document.getElementById("hint"+str2).style.display="none";
                                                  } 

                                                }
                                                else{
                                                  text.style.display = "none";
                                                } 
                                        }  
                                </script>-->
                                <?php
                                echo '
                                <div class="mb-3 col-md-6">
                                    <input type="submit" class="form-control btn btn-outline-success " style="margin-left:185px;" id="examname" value="SUBMIT and FINISH">
                                </div>';
                                echo '</div>';
                                echo '<div class="col-lg-1"></div>';
                            echo '</div>';
                            //echo '<button id="next" onclick="next('.$i.')" formaction="">next</button>';
                        echo '</form>';
                    }
                        }
         */       if(@$_GET['q']=='exam' && @$_GET['step']==2)
                {
                    if($sid!=0)
                    {
                        //echo '<form class="form-horizontal mt-2" name="examform3" action="CreateExam.php?q=startsub&eid='.$eid.'&sid='.$sid.'&stotal='.$stotal.'"  method="POST">';
                            //$sql="select * from squestions where Sid=$sid and sn=$i ";
                            //$data=mysqli_query($dbcon,$sql);
                            //$sql="select * from subjective where Exam_Id='$eid'";
                            echo '<div class="row mt-5 ">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-6">';
                                    $sql="select * from squestions where Sid='$sid' and sn='$i' ";
                                    $data=mysqli_query($dbcon,$sql);
                                    $row=mysqli_fetch_array($data);
                                    
                                    $qns=$row['Qns'];
     
                                    $quesid=$row['Question_Id'];
                                    $mark=$row['Mark'];
                                    echo '
                                    <span class=" title2" style="background-color:white !important;padding:15px;color:black !important;"><b>Q.No&nbsp;'.$i.'&nbsp;:</b></span>
                                    <div class=" mb-3 mt-3" style>
                                        <span class="input-group-text " style="height:50px;">'.$qns.'</span>
                                    </div>';
                                    echo '<form action="CreateExam.php?q=startsub&step=2&eid='.$eid.'&sid='.$sid.'&quesid='.$quesid.'&i='.$i.'&stotal='.$stotal.'" method="POST"  class="form-horizontal">
                                    <br />';
                                    echo '
                                    <div class=" form-floating mb-3">
                                      <textarea class="form-control"  name="'.$i.'" placeholder="Enter Answer Here" rows="5"></textarea>
                                      <label >Enter Answer</label>
                                    </div>  
                                    ';
                                    if($i<$stotal){
                                    echo'  
                                    <div class="mb-3 col-md-6">
                                        <input type="submit" class="form-control btn btn-outline-success " style="margin-left:185px;" id="examname" value="NEXT">
                                    </div>';
                                    }
                                    else{
                                        echo'  
                                        <div class="mb-3 col-md-6">
                                            <input type="submit" class="form-control btn btn-outline-success " style="margin-left:185px;" id="examname" value="SUBMIT AND FINISH">
                                        </div>';
                                    }
                                    echo '</form></div>
                                </div>
                            </div>';
                    }
                }
                if(@$_GET['q']=='exam' && @$_GET['step']==1)
                {
                    if($qid!=0)
                    {
                        echo '<form class="form-horizontal mt-2" name="examform3" action="CreateExam.php?q=startquiz&eid='.$eid.'&qid='.$qid.'&qtotal='.$qtotal.'&sid='.$sid.'&stotal='.$stotal.'"  method="POST">';
                           
                            $sql="SELECT * from qquestion where Quiz_Id=$qid and sn=$i";
                            $data=mysqli_query($dbcon,$sql);
                            $row=mysqli_fetch_array($data);
                            echo '
                            <div class="row mt-5">
                                <div class="col-lg-3 " style="margin-left:30px;padding-right:60px;">
                                  <div class="row pt-3" style="background-color:grey !important;border-radius:20px;">';
                                    for($i=1;$i<=$qtotal;$i++)
                                    {
                                      echo '
                                      <div class="col-lg-3 " >
                                        <div class="input-group mb-3" >';
                                           /* <div class="input-group-text" style="width: 62px !important;padding-left: 5px;padding-right: 5px;">    
                                                <span class="input-group-text" style="color:yellow;padding-right:5px;" id="just'.$i.'"><input class="form-check-input" style="margin:auto;margin-left:0;margin-right:5px;" type="radio" onclick="next('.$i.')" value="1" id="quiz'.$i.'" name="quiz">'.$i.'</span>
                                            </div>*/echo ' 
                                            <div  style="width: 62px !important;padding-left: 5px;padding-right: 5px;">    
                                                <span class="btn btn-success" style="color:yellow;padding-right:5px;" onclick="next('.$i.')" id="just'.$i.'">'.$i.'<i class="bi bi-flag"></i>
                                                </span>
                                                
                                            </div> 
                                        </div>
                                      </div>';
                                     
                                    }
                                  echo '
                                  </div>
                                </div>
                                <div class="col-lg-6">';
                                    echo '<div class="row" style="background: #bbd2c5;background: -webkit-linear-gradient(to bottom, #bbd2c5, #536976);background: linear-gradient(to bottom, #bbd2c5, #536976);border-radius:20px;">';
                                    for($i=1;$i<=$qtotal;$i++)
                                    {
                                        $sql="SELECT * from qquestion where Quiz_Id=$qid and sn=$i";
                                        $data=mysqli_query($dbcon,$sql);
                                        $row=mysqli_fetch_array($data);                                               
                                        echo '
                                        <div id="hint'.$i.'" style="display:none;padding-left:30px;" class="col-lg-12 "> 
                                            <span class=" title2" style="visibility:visible hidden;margin-left:300px;background-color:grey !important;padding:15px;color:black !important;border-radius:20px;"><b>Q.No&nbsp;:&nbsp;'.$i.'&nbsp;</b></span>
                                            <div class=" mb-3 mt-3 pt-3">
                                                <span class="input-group-text larger" style="height:60px;">'.$row['Qns'].'</span>
                                            </div>
                                            <div style="height:1px;background-color:white !important;margin-bottom:30px;"></div>
                                            <input type="hidden" value="0" name="'.$i.'" selected>
                                            <div class="input-group mb-3">
                                              <div class="input-group-text">
                                                <input class="form-check-input mt-0 larger" type="radio" value="1" name="'.$i.'" onchange="checkit('.$i.')">
                                              </div>
                                              <span class="input-group-text col-md-10" style="height:50px;">'.$row['op1'].'</span>
                                            </div>     
                                            <div class="input-group mb-3">
                                                <div class="input-group-text">
                                                  <input class="form-check-input mt-0 larger" type="radio" value="2" name="'.$i.'">
                                                </div>
                                                <span class="input-group-text col-md-10" style="height:50px;">'.$row['op2'].'</span>
                                            </div>
                                            <div class="input-group mb-3">
                                              <div class="input-group-text">
                                                <input class="form-check-input mt-0 larger" type="radio" value="3" name="'.$i.'">
                                              </div>
                                              <span class="input-group-text col-md-10" style="height:50px;">'.$row['op3'].'</span>
                                            </div>
                                            <div class="input-group mb-3 pb-3 ">
                                              <div class="input-group-text">
                                                <input class="form-check-input mt-0 larger" type="radio" value="4" name="'.$i.'">
                                              </div>
                                              <span class="input-group-text col-md-10" style="height:50px;">'.$row['op4'].'</span>
                                            </div>
                                        </div>';
                                        
                                    }         
                                    echo '</div>'; 
                                    echo '<div class="row mt-3"">';                          
                                    for($i=1;$i<=$qtotal;$i++)
                                    {
                                        
                                        echo'
                                        <div id="hint3'.$i.'" style="display:none;" class="col-lg-5">
                                            <span onclick="buttons2('.$i.')" class="btn btn-success">PREV</span>
                                        </div>';
                                        echo'
                                        <div id="hint2'.$i.'" style="display:none;" class="col-lg-5">
                                            <span onclick="buttons('.$i.')" class="btn btn-success">NEXT</span>
                                        </div>';
                                    }
                                    echo '</div>
                                    <div class="row mt-3">
                                    <div class="mb-3 col-md-6">
                                        <input type="submit" class="form-control btn btn-outline-success " style="margin-left:185px;" id="examname" value="SUBMIT and FINISH">
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </form>';
                    }
                }
            ?>
        </div>
    </div>
    <script src="bootstrap5/js/bootstrap.bundle.min.js"></script>
</body>