<?php
require_once 'dbHandler.php';

function show_menu()
{
    $conn = connect();

    $menus = generate_multilevel_menus($conn);

    if (isset($_SESSION['user'])){
        $user = $_SESSION['user'];
        if (isset($user['isAdmin']) && $user['isAdmin'] === '1') {
            $menus .= generate_admin_menu();
        }
    }

    return $menus;
}

function generate_admin_menu()
{
    $menu = '<li class="dropdown-submenu"><a href="administratorPage.php">Admin</a></li>';
    return $menu;
}

function generate_multilevel_menus($conn, $parent_id = NULL)
{

    $menu = "";
    $sql = "";
    if (is_null($parent_id)) {
        $sql = "SELECT * FROM menu WHERE parent_id IS NULL AND menu_status = 1";
    } else {
        $sql = "SELECT * FROM menu WHERE parent_id = $parent_id AND menu_status= 1";
    }
    $result = mysqli_query($conn, $sql);


    while ($row = mysqli_fetch_assoc($result)) {

        if ($row['page']) {
            $menu .= '<li class="dropdown-submenu"><a href="' . $row['page'] . '">' . $row['menu_name'] . '</a>';

        } else {
            $menu .= '<li class="dropdown-submenu"><a href="#">' . $row['menu_name'] . '</a>';
        }
        $submenu = generate_multilevel_menus($conn, $row['menu_id']);
        if (!empty($submenu)) {
            $menu .= '<ul class="dropdown-menu">' . $submenu . '</ul>';
        }

        $menu .= '</li>';
    }
    return $menu;
}

?>

