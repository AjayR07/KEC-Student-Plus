
<?php require 'header.php'; ?>
<script>
            var myNestedVals = {
        'I': {
            
            'II': []
        },
        'II': {
            
            'III': []
        },
        'III': {
            
            'IV': []
        }
    }
        function createOption(ddl, text, value) {
        var opt = document.createElement('option');
        opt.value = value;
        opt.text = text;
        ddl.options.add(opt);
    }

    function createOptions(optionsArray, ddl) {
        for (i = 0; i < optionsArray.length; i++) {
            createOption(ddl, optionsArray[i], optionsArray[i]);
        }
    }

    function configureDDL2(ddl1, ddl2, ddl3) {
        ddl2.options.length = 0;
        ddl3.options.length = 0;
        createOption(ddl2, "Pick New Year", "");
        var ddl2keys = Object.keys(myNestedVals[ddl1.value]);
        createOptions(ddl2keys, ddl2)
    }

    function configureDDL3(ddl1, ddl2, ddl3) {
        ddl3.options.length = 0;
        createOption(ddl3, "Pick 3rd Option", "");
        var ddl3keys = myNestedVals[ddl1.value][ddl2.value];
        createOptions(ddl3keys, ddl3);
    }
        </script>
<script  src="function.js"></script>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if(isset($_POST['new'])&&isset($_POST['old']))
    {
        $old=$_POST['old'];
        $new=$_POST['new'];
        $con= new mysqli("localhost","root","","regist");
         if ($con->connect_error) 
        {
        die("Connection failed: " . $con->connect_error);
        }
        $ins="UPDATE `registration` SET `Year`='$new' WHERE `Year`='$old' ";  
        $data1=$con->query($ins);
        if($data1==false)
        {
            echo '<script>alert("Error Updating year....Please try again later.");</script>';
            echo '<script>location.href=yearupgrade.php</script>';
        }
        else{
            echo '<script>alert("Year updated Successfully");</script>';

        }
    }
}
?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Year Upgrade</h2>
    </div>
    <div class="card-body">
  
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <table class="table" id="myTable">
    <tr>
    <th>Old year</th>
    <th>New year</th>
    </tr>
    <tr>
    <td>

  
    <select name="old" class="form-control" id="ddl1" onchange="configureDDL2(this, document.getElementById('ddl2'), document.getElementById('ddl3'))">
              <option value="">Pick Old Year</option>
              <option value="I">I</option>
              <option value="II">II</option>
              <option value="III">III</option>
            </select></td>
          <td>  <select name="new" class="form-control" id="ddl2" onchange="configureDDL3(document.getElementById('ddl1'), this, document.getElementById('ddl3'))">
            </select>
            <select id="ddl3" hidden>
            </select></td>
</div></tr>
    </table>
    <div  align="center">
    <div class="col-4" align="center" style="text-align: center">
            <button type="submit" class="btn btn-lg btn-info" value="Update">Update</button>
        </div>
    </div>
    </form>
    </div>
    </div>
    <?php require('footer.php');?>
    </body>
    </html>

