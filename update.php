<?php
require_once 'dbHandler.php';

$conn = connect();
$id = $_GET['id'];

$SelSql = "SELECT * FROM products WHERE proId = $id";
$update = mysqli_query($conn, $SelSql);

$r = mysqli_fetch_assoc($update);

?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Update</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
        <link rel="stylesheet" href="styles.css" >
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
    <div class="container">
        <div class="row">
            <form method="post" class="form-horizontal col-md-6 col-md-offset-3">
                <h2>Update a product</h2>

                <div class="form-group">
                    <label for="input1" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="proName"  class="form-control" id="input1" value="<?php echo $r['proName']; ?>"/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="input1" class="col-sm-2 control-label">Price</label>
                    <div class="col-sm-10">
                        <input type="text" name="proPrice"  class="form-control" id="input1" value="<?php echo $r['proPrice']; ?>"/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="input1" class="col-sm-2 control-label">Image</label>
                    <div class="col-sm-10">
                        <input type="text" name="proImage"  class="form-control" id="input1" value="<?php echo $r['proImage']; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="input1" class="col-sm-2 control-label">Type</label>
                    <div class="col-sm-10">
                        <select name="typeId" class="form-control">
                            <option>Select Type</option>
                            <option value="1" <?php if($r['typeId'] == '1'){ echo "selected";} ?> >Phone</option>
                            <option value="2" <?php if($r['typeId'] == '2'){ echo "selected";} ?> >Tablet</option>
                            <option value="3" <?php if($r['typeId'] == '3'){ echo "selected";} ?> >Computer</option>
                            <option value="4" <?php if($r['typeId'] == '4'){ echo "selected";} ?> >Mouse</option>
                            <option value="6" <?php if($r['typeId'] == '5'){ echo "selected";} ?> >Kayboard</option>
                            <option value="6" <?php if($r['typeId'] == '6'){ echo "selected";} ?> >Headset</option>
                        </select>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="submit" />
            </form>
        </div>
    </div>
    </body>
    </html>

<?php
$id = $_GET['id'];

if(isset($_POST) & !empty($_POST)){
    $name = $_POST['proName'];
    $price = $_POST['proPrice'];
    $image = $_POST['proImage'];
    $type = $_POST['typeId'];

    $UpdateSql = "UPDATE products SET proName='$name', proPrice=$price ,proImage = '$image',typeId=$type WHERE proId = $id";
    var_dump($UpdateSql);
    $update = mysqli_query($conn, $UpdateSql);

    if($update){
        header('location: administratorPage.php');
    }else{
        $fmsgUpdate = "Failed to update data.";
    }
}

?>