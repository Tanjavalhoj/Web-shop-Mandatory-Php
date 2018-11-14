<?php

// Function to get database
function connect() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mandatory_webshop";
    $port = 3306;

// Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname, $port);

// Check connection
    if (!$conn) {
        die("Connection failed to database mandatory_webshop: " . mysqli_connect_error());
    }
    return $conn;
}



function debug($arg){
    echo '<pre>';
    print_r($arg);
    echo '</pre>';
    exit;
}


// Function to get the prodcts
function get_menus(){
    $conn = connect();
    $sql = "SELECT * FROM ( product_type INNER JOIN products ON product_type.type_Id = products.typeId )";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) ){
        $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
        $menus = array();

        foreach ( $rows as $index=>$row){
            if($row['typeId']){
                $id = $row['typeId'];

                $menus['type'.$id]['submenu'][] = [
                    'proId' => $row['proId'],
                    'proName' => $row['proName'],
                    'proPrice' => $row['proPrice'],
                    'proImage' => $row['proImage']
                ];

            } else {
                $id = $row['type_Id'];

                $menus['type'.$id] = [
                    'type_Id' => $row['type_Id'],
                    'typeName' => $row['typeName'],
                    'page' => $row['page']
                ];
            }
        }
    }
    return $menus;
}

function display_menu(){
    $menus = get_menus();

    if(!$menus){
        return "Not menu exixts in database";
    }

    $html = '';
    $html .= '<ul class="dropdown">';
    foreach( $menus as $menu){
        if(isset ($menu['submenu'])){

        }/*else{
            if($menu['page']){
                $html .= '';
            }

        }*/

    }
    $html .= '</ul>';
    return $html;
}
