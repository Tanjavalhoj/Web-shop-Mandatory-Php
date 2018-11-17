<?php
require_once 'administrator.php';
require_once 'menu.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Administrator</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
    <link rel="stylesheet" href="styles.css" >
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<!--Navigation bar-->
<div class="container">
    <nav class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <?php echo show_menu() ?>
        </ul>
    </nav>
</div>

<br><br>

<div class="container">
    <div class="row">
        <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
        <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>

        <?php if(isset($fmsgUpdate)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsgUpdate; ?> </div><?php } ?>

        <form method="post" class="form-horizontal col-md-6 col-md-offset-3">
            <legend>Add a Product</legend>
            <div class="form-group">
                <label for="input1" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="proName"  class="form-control" id="input1"/>
                </div>
            </div>

            <div class="form-group">
                <label for="input1" class="col-sm-2 control-label">Price</label>
                <div class="col-sm-10">
                    <input type="text" name="proPrice"  class="form-control" id="input1"/>
                </div>
            </div>

            <div class="form-group">
                <label for="input1" class="col-sm-2 control-label">Image</label>
                <div class="col-sm-10">
                    <input type="text" name="proImage"  class="form-control" id="input1"/>
                </div>
            </div>

            <div class="form-group">
                <label for="input1" class="col-sm-2 control-label">Type</label>
                <div class="col-sm-10">
                    <select name="typeId" class="form-control">
                        <option>Select Your Age</option>
                        <option value="1">Phone</option>
                        <option value="2">Tablet</option>
                        <option value="3">Computer</option>
                        <option value="4">Mouse</option>
                        <option value="5">Kayboard</option>
                    </select>
                </div>
            </div>
            <input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="submit" />
        </form>
    </div>

    <!--READ-->
    <div class="row">
        <legend>View, edit or delete the products here</legend>
        <table class="table ">
            <thead>
            <tr>
                <th>#</th>
                <th>Type id</th>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Edit / Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while($r = mysqli_fetch_assoc($read)){
                ?>
                <tr>
                    <th scope="row"><?php echo $r['proId']; ?></th>
                    <td><?php echo $r['typeId']; ?></td>
                    <td><?php echo $r['proName']; ?></td>
                    <td><?php echo $r['proPrice']; ?></td>
                    <td><?php echo $r['proImage']; ?></td>
                    <td>
                        <a href="../Mandatory_1/update.php?id=<?php echo $r['proId']; ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                        <a href="../Mandatory_1/delete.php?id=<?php echo $r['proId']; ?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>