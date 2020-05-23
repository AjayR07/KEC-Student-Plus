
<?php
require 'db.php';
$sql = 'SELECT * FROM staff';
$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header.php'; ?>
<script  src="function.js"></script>
<style>
th,td {
  text-align: center;
  vertical-align: center;
}
</style>


<!-- Modal -->
<?php
if(isset($_POST['submit'])) {
  $con= new mysqli("localhost","root","","regist");
  if ($con->connect_error)
  {
      die("Connection failed: " . $con->connect_error);
  }
     if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != "") {
        $allowedExtensions = array("xls","xlsx");
        $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        if(in_array($ext, $allowedExtensions)) {
           $file_size = $_FILES['file']['size'] / 1024;
           if($file_size < 50) {
               $file = "uploads/".$_FILES['file']['name'];
               $isUploaded = copy($_FILES['file']['tmp_name'], $file);
               if($isUploaded) {

                    include("../PHPExcel/Classes/PHPExcel/IOFactory.php");
                    try {
                        //Load the excel(.xls/.xlsx) file
                        $objPHPExcel = PHPExcel_IOFactory::load($file);
                    } catch (Exception $e) {
                         die('Error loading file "' . pathinfo($file, PATHINFO_BASENAME). '": ' . $e->getMessage());
                    }

                    //An excel file may contains many sheets, so you have to specify which one you need to read or work with.
                    $sheet = $objPHPExcel->getSheet(0);
                    //It returns the highest number of rows
                    $total_rows = $sheet->getHighestRow();
                    //It returns the highest number of columns
                    $total_columns = $sheet->getHighestColumn();

                    echo '<h4>Data from excel file</h4>';
                    echo '<table cellpadding="5" cellspacing="1" border="1" class="responsive">';

                    $query = "INSERT INTO `staff` (`StaffID`, `Name`, `User`, `Pass`, `Mail`, `Dep`, `Year`, `Sec`) VALUES ";
                    //Loop through each row of the worksheet
                    for($row =2; $row <= $total_rows; $row++) {
                        //Read a single row of data and store it as a array.
                        //This line of code selects range of the cells like A1:D1
                        $single_row = $sheet->rangeToArray('A' . $row . ':' . $total_columns . $row, NULL, TRUE, FALSE);
                        echo "<tr>";
                        //Creating a dynamic query based on the rows from the excel file
                        $query .= "(";
                        //Print each cell of the current row
                        foreach($single_row[0] as $key=>$value) {
                            echo "<td>".$value."</td>";
                            $query .= "'".mysqli_real_escape_string($con, $value)."',";
                        }
                        $query = substr($query, 0, -1);
                        $query .= "),";
                        echo "</tr>";
                    }
                    $query = substr($query, 0, -1);
                    echo '</table>';

                    // At last we will execute the dynamically created query an save it into the database
                    $con->query($query);
                    if(mysqli_affected_rows($con) > 0) {
                        echo '<span class="msg">Database table updated!</span>';
                    } else {
                        echo '<span class="msg">Can\'t update database table! try again.</span>';
                    }
                    // Finally we will remove the file from the uploads folder (optional)
                    unlink($file);
                } else {
                    echo '<span class="msg">File not uploaded!</span>';
                }
            } else {
                echo '<span class="msg">Maximum file size should not cross 50 KB on size!</span>';
            }
        } else {
            echo '<span class="msg">This type of file not allowed!</span>';
        }
    } else {
        echo '<span class="msg">Select an excel file first!</span>';
    }
}


    require_once 'phpexcel/PHPExcel/IOFactory.php';
    if(isset($_POST['upload_excel']))
    {
        $file_info = $_FILES["result_file"]["name"];
        $file_directory = "uploads/excel_mail/";
        $new_file_name = date("dmY").".". $file_info["extension"];
        move_uploaded_file($_FILES["result_file"]["tmp_name"], $file_directory . $new_file_name);
        $file_type	= PHPExcel_IOFactory::identify($file_directory . $new_file_name);
        $objReader	= PHPExcel_IOFactory::createReader($file_type);
        $objPHPExcel = $objReader->load($file_directory . $new_file_name);
        $sheet_data	= $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

        foreach ($sheet_data as $row)
        {
            if(!empty($row['C']))
            {
                $checkemail = mysqli_query($conn,'SELECT * FROM `wo_emaillist` WHERE email = "'.$row['C'].'" ');
                if(mysqli_num_rows($checkemail) == '0')
                {
                    mysqli_query($conn,'INSERT INTO `wo_emaillist` (firstname,gender,email) VALUES ("'.$row['A'].'","'.$row['B'].'","'.$row['C'].'") ');
                }
            }

        }
        $updatemsg = "File Successfully Imported!";
        $updatemsgtype = 1;
    }
?>
?>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Import Staff</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <h2>Import Excel or CSV file here</h2><br>
       <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
  <div class="custom-file">
    <input type="file" name="file" class="custom-file-input" id="file" size="150">
    <label class="custom-file-label" for="customFile">Choose file</label>
  </div>
  <script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Import</button></form>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Staff List</h2>
    </div>
    <div class="card-body">
    <div class="row">
    <div align="left">Filter Department:
    <input type="text" style="width: 150px;
    border-radius: 6px;
    text-align: center;
    border: 1px solid #212121;
    height: 35px;" id="myInput" data-table="table-info" placeholder="Search" onkeyup="myFunction()"></div>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <div algin="right">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Import</button>
    </div></div>
    <br>
      <table class="table" id="myTable">
        <tr>
        <th>S.No.</th>
        <th>Department</th>
          <th>Staff ID</th>
          <th>Name</th>
          <th>User ID</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
        <?php $sno=0;?>
        <?php foreach($people as $person): ?>
          <tr>
          <td><?php echo ++$sno;?></td>
          <td><?=$person->Dep;?></td>
            <td><?= $person->StaffID; ?></td>
            <td><?= $person->Name; ?></td>
            <td><?= $person->User; ?></td>
            <td>
              <a href="edit.php?id=<?= $person->StaffID ?>" class="btn btn-info"><span class="fa fa-edit"> Edit</span></a></td>
              <td><a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?= $person->StaffID ?>" class='btn btn-danger'><span class="fa fa-trash-o"> Delete</span></a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>

    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
