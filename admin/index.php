<?php
  session_start();
  if(!isset($_SESSION['kecadmin']))
  {
      header("Location:login.php");
  }
  include_once('../db.php');
  include_once('../assets/notiflix.php');
  include_once('adminnav.php');
?>
<html>
<head>
  <link rel="icon" type="image/png" href="KEC.png">
    <title>
      Staff
    </title>
    <link rel="stylesheet" type="text/css" href="../assets/Semantic/dist/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.semanticui.min.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="  crossorigin="anonymous"></script>
    <script src="../assets/Semantic/dist/semantic.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.semanticui.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <script>
    $(document).ready(function()
    {

         $('#newStaffModal').modal({closable : false,keyboardShortcuts:false});
         $('#editStaffModal').modal({closable : false,keyboardShortcuts:false});
         $('#depart').dropdown();
         $('#design').dropdown();
         $('#design').click(function(){$('#design').dropdown('show');});
         $('#depart').click(function(){$('#depart').dropdown('show');});
         $('#editDepart').dropdown();
         $('#editDesign').dropdown();
         $('#editDesign').click(function(){$('#editDesign').dropdown('show');});
         $('#editDepart').click(function(){$('#editDepart').dropdown('show');});
        $('#editAdv').hide();
      var table=  $('#employeeList').DataTable({"order": [[1,"asc"],[ 2, "asc" ]],"columnDefs":[{"targets":[5,6,10], "orderable":false}]});
        $('#Add').on('click',function(){
            $('#newStaffModal').modal('show');
       });
        $("#closebtn2").on('click',function()
        {
          $("#addform")[0].reset();

          $('#newStaffModal').modal('hide');
        });
        $("#closebtn").click(function(){
            $("#addform")[0].reset();
            $('#newStaffModal').modal('hide');
          }
        );
        $("#editClosebtn2").on('click',function()
        {
          $("#editform")[0].reset();
          $('#editStaffModal').modal('hide');
        });
        $("#editClosebtn").click(function(){
            $("#editform")[0].reset();
            $('#editStaffModal').modal('hide');
          }
        );
    //   $("#newStaff").on('click',function()
    $("#addform").on("submit",function()
        {
          var arr=$("#addform").serializeArray();
          <?php $_SESSION["add"]="yes";?>
          $.ajax({
          url:"handler.php",
          type:"POST",
          data:arr,
          success:function(d)
          {
           alert(d);
            $("#addform")[0].reset();
          $("#employeeList").ajax.reload();

            $('#newStaffModal').hide();
          }
         })
       });

       $("#updateStaff").on('click',function()
        {
          const toSend={
            id:$("#editId").val(),
            name:$("#editName").val(),
            uname:$("#editUname").val(),
            pass:$("#editPass").val(),
            batch:$("#editBatch").val(),
            sec:$("#editSection").val(),
            design:$("#editDesign").val(),
            dept:$("#editDepart").val(),
            mail:$("#editMail").val()
          };
          const jsonString=JSON.stringify(toSend);
          var xmlhttp = new XMLHttpRequest();
           xmlhttp.onreadystatechange = function() {
           if (this.readyState == 4 && this.status == 200)
           {
                $('#editStaffModal').modal('hide');
                $("#editform")[0].reset();
            }
          };
            xmlhttp.open("POST", "handler.php?updatedata=1", true);
            xmlhttp.setRequestHeader("Content-Type", "application/json");
            xmlhttp.send(jsonString);
       });

       $('#addform').form({
           fields: {
             id: {
               identifier: 'id',
               rules: [
                 {
                   type   : 'empty',
                   prompt : 'Please enter Staff ID'
                 }
               ]
             },
             name: {
               identifier: 'name',
               rules: [
                 {
                   type   : 'empty',
                   prompt : 'Please enter the Staff Name'
                 }
               ]
             },
             depart: {
               identifier: 'depart',
               rules: [
                 {
                   type   : 'empty',
                   prompt : 'Please select the department'
                 }
               ]
             },
             username: {
               identifier: 'uname',
               rules: [
                 {
                   type   : 'empty',
                   prompt : 'Please enter a username'
                 }
               ]
             },
             pass: {
               identifier: 'pass',
               rules: [
                 {
                   type   : 'empty',
                   prompt : 'Please enter a password'
                 }
               ]
             },
             mail: {
               identifier: 'mail',
               rules: [
                 {
                   type   : 'email',
                   prompt : 'Please enter a valid Email Address'
                 }
               ]
             },
             design: {
               identifier: 'design',
               rules: [
                 {
                   type   : 'empty',
                   prompt : 'Please select the designation'
                 }
               ]
             }
           }
         });

    $('#editform').form({
        fields: {
          id: {
            identifier: 'editId',
            rules: [
              {
                type   : 'empty',
                prompt : 'Please enter Staff ID'
              }
            ]
          },
          name: {
            identifier: 'editName',
            rules: [
              {
                type   : 'empty',
                prompt : 'Please enter the Staff Name'
              }
            ]
          },
          depart: {
            identifier: 'editDepart',
            rules: [
              {
                type   : 'empty',
                prompt : 'Please select the department'
              }
            ]
          },
          username: {
            identifier: 'editName',
            rules: [
              {
                type   : 'empty',
                prompt : 'Please enter a username'
              }
            ]
          },
          pass: {
            identifier: 'editPass',
            rules: [
              {
                type   : 'empty',
                prompt : 'Please enter a password'
              }
            ]
          },
          mail: {
            identifier: 'editMail',
            rules: [
              {
                type   : 'email',
                prompt : 'Please enter a valid Email Address'
              }
            ]
          },
          design: {
            identifier: 'editDesign',
            rules: [
              {
                type   : 'empty',
                prompt : 'Please select the designation'
              }
            ]
          }
        }
      });
  });

function myFunction(val)
{
  var ID=val;
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function()
  {

    if (this.readyState == 4 && this.status == 200)
    {

        staf= JSON.parse(this.responseText);
        $("#editId").val(staf.staffid);
        $("#editName").val(staf.name);
        $("#editUname").val(staf.userid);
        $("#editPass").val(staf.pass);
        $("#editMail").val(staf.mail);
        $("#editSection").val(staf.sec);
        $("#editBatch").val(staf.batch);
      //  $("#editDepart option[value=EIE]").attr('selected', 'selected');
        //$("#editDepart").replaceWith($('<input/>',{'type':'text','value':staff.dept}));
//$('#editDepart').val(staff.dept);

        //$("#editDesign").val(staf.designation);

    }
    $('#editStaffModal').modal('show');
  };
  xmlhttp.open("GET", "handler.php?edit=1&id="+ID, true);
  xmlhttp.send();
}

function mydelete(val)
{
  var ID=val;
  alert(ID);
  var xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200)
    {
      alert(this.responseText);
    }
    };
  xmlhttp.open("GET", "handler.php?delete=1&id="+ID, true);
  xmlhttp.send();
  table.ajax.reload();
}


    function desig(val)
    {
     if(val=='Advisor')
       $('#Adv').show();
     else
      $('#Adv').hide();
    }



    function editDesig(val)
    {
     if(val=='Advisor')
       $('#editAdv').show();
     else
      $('#editAdv').hide();
    }

    </script>
    <?php include_once('../assets/notiflix.php');?>
</head>
<body>
  <?php  include_once('adminnav.php'); ?>
<style>
  body{font-family: 'Open Sans', sans-serif;
    background-image: url('../bgpic.jpg');}
</style>
<div class="ui raised segment" style="width:96% ;margin: 0 auto;padding: 2%;margin-top:3%;margin-bottom:3%" >
  <table class="ui selectable striped  table" style="width:100%;" id="employeeList">
    <thead>
      <tr>
      <th colspan="10"><p style="font-size:24px">Staff List</p></th>
      <th><button class="circular ui right floated icon primary button"  name="Add" id="Add" ><i class="user plus icon"></i></button></th>
      </tr>
      <tr>
        <th>S.No</th>
        <th>Department</th>
        <th>Staff ID</th>
        <th>Name</th>
        <th>User ID</th>
        <th>Password</th>  
        <th>E-mail ID</th>
        <th>Designation</th>
        <th>Batch</th>
        <th>Section</th>
        <th style="text-align:center;">Actions</th>
      </tr>
    </thead>
    <?php
    $sql="SELECT * FROM staff";
    $result=$con->query($sql);
    $i=1;

    while ($row = mysqli_fetch_array($result))
    {
      echo '<tr>
      <td>'.$i++.'</td>
      <td>'.$row['dept'].'</td>
      <td>'.$row['staffid'].'</td>
      <td>'.$row['name'].'</td>
      <td>'.$row['userid'].'</td>
      <td style="text-align:center">'."****".'</td>
      <td>'.$row['mail'].'</td>
      <td>'.$row['designation'].'</td>
      <td>'.$row['batch'].'</td>
      <td >'.$row['sec'].'</td>
      <td style="position:right;"><div class="ui icon buttons">
  <button class="ui icon button" name="update" id="'.$row["userid"].'" onclick="myFunction(this.id)"><i class="edit icon" style="color:blue" ></i></button><div class="or"></div>
  <button class="ui icon button"  name="delete" id="'.$row["userid"].'" onclick="mydelete(this.id)"><i class="close icon" style="color:red"></i></button><div class="or"></div>
  <button class="ui positive icon button" name="Activate" id="'.$row["userid"].'" ><i class="check icon"></i></button>
</div></td>
      </tr>';
    }
     ?>
</table>
</div>


<!--Modals-->
<div class="ui small  modal" id="newStaffModal">
    <div class="header">
      Add Staff
      <button class="ui right floated inverted icon button"  id="closebtn" ><i class="close icon" style="color:red"></i></button>
    </div>
    <form class="ui form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" style="width:97% ;margin: 0 auto;padding: 2%;margin-top:3%" id="addform" >
    <div class="field">
      <div class="two fields">
        <div class="field">
          <label>Staff ID</label>
          <input type="text" name="id" id="id" placeholder="Staff ID">
        </div>
        <div class="field">
          <label>Staff Name</label>
          <input type="text" name="name" id="name" placeholder="Name">
        </div>
      </div>
    </div>
    <div class="field">
      <div class="fields">
        <div class="ten wide field">
          <label>Email ID</label>
          <input type="text" name="mail"id="mail" placeholder="Email Address">
        </div>

        <div class="six wide field">
        <label>Department</label>
        <select class="ui fluid search selection dropdown" name="depart" id="depart">
          <option value="">Select Department</option>
          <option value="CSE"><i class=""></i>Computer Science And Engineering</option>
          <option  value="IT"><i class=""></i>Information Technology</option>
          <option value="EEE"><i class=""></i>Electrical And Electronics Engineering </option>
          <option value="ECE"><i class=""></i>Electronics And Communication Engineering</option>
          <option value="EIE"><i class=""></i>Electronics And Instrumentation Engineering</option>
          <option value="CHEM"><i class=""></i>Chemical Engineering</option>

          <option value="CIVIL"><i class=""></i>Civil Engineering</option>
          <option value="MECH"><i class=""></i>Mechanical Engineering</option>
          <option value="MER"><i class=""></i>Mechatronics Engineering</option>
          <option value="AUTO"><i class=""></i>Automobile Engineering</option>
          <option value="MCA"><i class=""></i>MCA</option>
          <option value="MBA"><i class=""></i>MBA</option>
        </select>
        </div>
      </div>
    </div>

    <h4 class="ui dividing header">Account Informations</h4>
    <div class="field">
      <label>Designation</label>
      <select class="ui selection dropdown" name="design" id="design" onchange='desig(this.value);'>
        <option value="">Select Designation</option>
          <option  value="HOD">Head of the Department</option>
          <option  value="Year Incharge">Year Incharge</option>
          <option  value="Advisor">Advisor</option>
          <option  value="Non Teaching Faculty">Non Teaching Faculty</option>
        </select>
    </div>

    <div class="two fields" id="Adv">
      <div class="field">
          <label>Batch</label>
        <input type="text" name="batch" id="batch" placeholder="Batch">
      </div>
      <div class="field">
          <label>Section</label>
        <input type="text" name="section" id="sec" placeholder="Section">
      </div>
    </div>

    <div class="field">

      <div class="two fields">
        <div class="field">
            <label>User Name</label>
          <input type="text" name="uname" id="uname" placeholder="User ID" >
        </div>
        <div class="field">
            <label>Password</label>
          <input type="password" name="pass" id="pass" placeholder="Password">
        </div>
      </div>
    </div>
    <br>
    <div class="ui error message"></div>
    <br>
    <div>
      <button type="button" class="ui left floated negative button" id="closebtn2">Close</button>
      <button type="submit" class="ui right floated primary button" name="newStaff" id="newStaff">Submit</button></div><br></br><br>
  </form>
</div>




<div class="ui small  modal" id="editStaffModal">
    <div class="header">
      Edit Staff
      <button class="ui right floated inverted icon button"  id="editClosebtn" ><i class="close icon" style="color:red"></i></button>
    </div>
    <form class="ui form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" style="width:97% ;margin: 0 auto;padding: 2%;margin-top:3%" id="editform" >
    <div class="field">
      <div class="two fields">
        <div class="field">
          <label>Staff ID</label>
          <input type="text" name="editId" id="editId" placeholder="Staff ID">
        </div>
        <div class="field">
          <label>Staff Name</label>
          <input type="text" name="editName" id="editName" value="" placeholder="Name">
        </div>
      </div>
    </div>
    <div class="field">
      <div class="fields">
        <div class="ten wide field">
          <label>Email ID</label>
          <input type="text" name="editMail"id="editMail" placeholder="Email Address">
        </div>

        <div class="six wide field">
        <label>Department</label>
        <select class="ui fluid search selection dropdown" name="editDepart" id="editDepart">
          <option selected disabled>Select Department</option>
          <option value="CSE"><i class=""></i>Computer Science And Engineering</option>
          <option  value="IT"><i class=""></i>Information Technology</option>
          <option value="EEE"><i class=""></i>Electrical And Electronics Engineering </option>
          <option value="ECE"><i class=""></i>Electronics And Communication Engineering</option>
          <option value="EIE"><i class=""></i>Electronics And Instrumentation Engineering</option>
          <option value="CHEM"><i class=""></i>Chemical Engineering</option>

          <option value="CIVIL"><i class=""></i>Civil Engineering</option>
          <option value="MECH"><i class=""></i>Mechanical Engineering</option>
          <option value="MER"><i class=""></i>Mechatronics Engineering</option>
          <option value="AUTO"><i class=""></i>Automobile Engineering</option>
          <option value="MCA"><i class=""></i>MCA</option>
          <option value="MBA"><i class=""></i>MBA</option>
        </select>
        </div>
      </div>
    </div>

    <h4 class="ui dividing header">Account Informations</h4>
    <div class="field">
      <label>Designation</label>
      <select class="ui selection dropdown" name="editDesign" id="editDesign" onchange='editDesig(this.value);'>
        <option selected disabled>Select Designation</option>
          <option  value="HOD">Head of the Department</option>
          <option  value="Year Incharge">Year Incharge</option>
          <option  value="Advisor">Advisor</option>
          <option  value="Non Teaching Faculty">Non Teaching Faculty</option>
        </select>
    </div>

    <div class="two fields" id="editAdv">
      <div class="field">
          <label>Batch</label>
        <input type="text" name="editBatch" id="editBatch" placeholder="Batch">
      </div>
      <div class="field">
          <label>Section</label>
        <input type="text" name="editSection" id="editSection" placeholder="Section">
      </div>
    </div>

    <div class="field">

      <div class="two fields">
        <div class="field">
            <label>User Name</label>
          <input type="text" name="editUname" id="editUname" placeholder="User ID" readonly>
        </div>
        <div class="field">
            <label>Password</label>
          <input type="password" name="editPass" id="editPass" placeholder="Password">
        </div>
      </div>
    </div>
    <br>
    <div>
      <button type="button" class="ui left floated negative button" id="editClosebtn2">Close</button>
      <button type="submit" class="ui right floated primary button" name="updateStaff" id="updateStaff" >Update</button></div><br></br><br>
  </form>
</div>
</body>
</html>
