<!DOCTYPE html>

<?php include 'db.php';


if(isset($_POST['search'])){

$name =htmlspecialchars($_POST['search']);

$sql = "select * from tasks where name like '%$name%' ";

$rows=$db->query($sql);


}

?>


<html lang="en">
<head>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/d3js/5.12.0/d3.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To Do list</title>
</head>
<body>
<div class="container" >
<h1 align="center">To Do List</h1>

<div class="row" style="margin-top: 70px;">
        <div class="col-md-10 col-md-offset-1">
        <button type="button" data-target="#myModal" data-toggle="modal" class="btn btn-success">Add Task</button>
        <button type="button" class="btn btn-default" text="right" onclick="print()">Print</button>
        <hr><br>

        <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="add.php" >
            <div class="form-group">
            <label>Task Name</label>
            <input type="text" required name="task" class="form-control">
            </div>
            <input type="submit" name="send" value="Add Task" class="btn btn-success" >
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="col-md-12 text-center">
  <p>Search</p>
  <form action="search.php" method="post" class="form-group">

    <input type="text" placeholder="Search"
    name="search" class="form-control">
  </form>
</div>
    <?php if(mysqli_num_rows($rows) < 1): ?>
    <h2 class="text-danger text-center">Nothing Found </h2>
    <a href="index.php" class="btn btn-warning">Back</a>
<?php else: ?>
    <table  class="table table-hover">
        <thead>
            <tr>
            <th scope="col">ID.</th>
            <th scope="col">Task</th>
            </tr>
        </thead>
        <tbody>
            <tr>


        <?php while($row = $rows->fetch_assoc()): ?>
      
      <th scope="row"><?php echo $row['id'] ?></th>
      <td class="col-md-10"><?php echo $row['name'] ?></td>
      <td><a href="update.php?id=<?php echo $row['id'];?>"  class="btn btn-success">Edit</a></td>
      <td><a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a></td>
    </tr>
      <?php endwhile; ?>
  </tbody>
</table>
<?php endif;?> 

        </div>
</div>
</div>
    
</body>
</html>