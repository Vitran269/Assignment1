<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  
  <div class="row justify-content-center">
    <table class="table m-3">
      <thead>
        <tr>       
          <th>Id</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Address</th>
          <th>Phone</th>
          <th>Age</th>
          <th>Gender</th>
        </tr>
      </thead>
      <tbody>
      <?php
          $file = @fopen('gs://assignment1-269702.appspot.com/Employees.csv', 'r');
          $employees = file_get_contents('gs://assignment1-269702.appspot.com/Employees.csv');
          if (!empty($file)) {
            while (!feof($file)) { // hàm feof sẽ trả về true nếu ở vị trí cuối cùng của file
              $employee = fgets($file);
              $employee = explode(',', $employee);
              echo "<tr>";
              echo"<td>".$employee[0]."</td>";
              echo"<td>".$employee[1]."</td>";
              echo"<td>".$employee[2]."</td>";
              echo"<td>".$employee[3]."</td>";
              echo"<td>".$employee[4]."</td>";
              echo"<td>".$employee[5]."</td>";
              echo"<td>".$employee[6]."</td>";
              echo "</tr>\n";
            }
          }
          ?>
      </tbody>
    </table>
  </div>
  <div class="card">
    <div class="card-body">
      <div class="row justify-content-center">
        <form action="" method="POST">
          <div class="form-group row">
            <label for="id" class="col-6">Id</label>
            <input type="text" name="id" placeholder="Enter your Id" class="col-6">
          </div>
          <div class="form-group row">
            <label for="first_name" class="col-6">First Name</label>
            <input type="text" name="first_name" placeholder="Enter your first name" class="col-6">
          </div>
          <div class="form-group row">
            <label for="last_name" class="col-6">Last Name</label>
            <input type="text" name="last_name" placeholder="Enter your last name" class="col-6">
          </div>
          <div class="form-group row">
            <label for="gender" class="col-6">Gender</label>
            <input type="text" name="gender" placeholder="Enter" class="col-6">
          </div>
          <div class="form-group row">
            <label for="age" class="col-6">Age</label>
            <input type="int" name="age" placeholder="Enter" class="col-6">
          </div>
          <div class="form-group row">
            <label for="address" class="col-6">Address</label>
            <input type="text" name="address" placeholder="Enter" class="col-6">
          </div>
          <div class="form-group row">
            <label for="phone" class="col-6">Phone</label>
            <input type="text" name="phone" placeholder="Enter" class="col-6">
          </div>
          <div class="form-group row">
            <button type="submit" name="Add" class="btn btn-primary">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php
  $id = $_POST['id'];
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $employees = file_get_contents('gs://assignment1-269702.appspot.com/Employees.csv');
  if (empty($id) && empty($first_name) && empty($last_name) && empty($age) && empty($gender) && empty($phone) && empty($address)) {
    echo "ahihi";
  } else {
    $file = fopen('gs://assignment1-269702.appspot.com/Employees.csv', 'w');
    if (!empty($employees)) {
      fwrite($file, $employees);
    }
    fwrite($file, "{$id},{$first_name},{$last_name},{$age},{$gender},{$phone},{$address}\n");
    fclose($file);
    echo 'Data written';
    $s = file_get_contents('gs://assignment1-269702.appspot.com/Employees.csv');
    echo $s;
    
  }
  header("Location: index.php");
  ?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>