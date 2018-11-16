<?php
require_once 'dbHandler.php';

function get_menu_tree($parent_id){

    $conn = connect();
    $menu = "";
    $sql = "SELECT * FROM menu WHERE menu_status = '1' AND parent_id ='" . $parent_id . "' ";

    var_dump($sql);

    $result = mysqli_query($conn,$sql);

    var_dump($result);

    while ($row = mysqli_fetch_all($result,MYSQLI_ASSOC)){

        $menu .= "<li><a href='" . $row['link'] . "'>" . $menu['menu_name'] . "</a>";
        $menu .= "<ul>". get_menu_tree($row['menu_id']) ."</ul>";
        $menu .= "</li>";
    }

    return $menu;
}
?>

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Menu</title>
    <meta charset="utf-8">
    <style>
        ul {
            list-style: none;
            padding: 0;
            margin: 0;
            background: #1bc2a2;
        }
        ul li {
            display: block;
            position: relative;
            float: left;
            background: #1bc2a2;
        }

        /* This hides the dropdowns */
        li ul { display: none; }
        ul li a {
            display: block;
            padding: 1em;
            text-decoration: none;
            white-space: nowrap;
            color: #fff;
        }
        ul li a:hover { background: #2c3e50; }

        /* Display the dropdown */
        li:hover > ul {
            display: block;
            position: absolute;
        }
        li:hover li { float: none; }
        li:hover a { background: #1bc2a2; }
        li:hover li a:hover { background: #2c3e50; }
        .main-navigation li ul li { border-top: 0; }

        /* Displays second level dropdowns to the right of the first level dropdown */
        ul ul ul {
            left: 100%;
            top: 0;
        }

        /* Simple clearfix */
        ul:before,
        ul:after {
            content: " "; /* 1 */
            display: table; /* 2 */
        }
        ul:after { clear: both; }

    </style>

</head>
<body>
<ul>
    <?php echo get_menu_tree(0); ?>
</ul>



</body>
</html>
<?php mysqli_close($conn) ?>