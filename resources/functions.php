<?php 

// helper function
function set_message($msg){
    if (!empty($msg)) {
        $_SESSION['message'] = $msg;
    } else {
        $msg = "";
    }
}
function display_message(){
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

function redirect($location) {
    header("Location: $location");
}

function query($sql) {

    global $connection;

    return mysqli_query($connection, $sql);

}

function confirm($result){

    global $connection;

    if (!$result) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
}

function escape_string($string)
{
    global $connection;

    return mysqli_real_escape_string($connection, $string);
}

function fetch_array($result)
{
    return mysqli_fetch_array($result);
}


// ***********************FRONT END FUNCTION********************
// get products

function get_product() {
    $query = query(" SELECT * FROM products");
    confirm($query);

    while ($row = fetch_array($query)) {

        // heredoc
$product = <<<DELIMETER

        <a href="preview.php?id={$row['product_id']}">
          <div class="box9">
            <img src="{$row['product_image']}" style="width: 300px; height: 300px;" />
            <p>{$row['product_title']}<br />&#36;{$row['product_price']}</p>
            
          </div>
        </a>

DELIMETER;

echo $product;

    }
}

function get_categories() {
        $query = query("SELECT * FROM categories ");
        confirm($query);

        while ($row = fetch_array($query)) {
$category_links = <<<DELIMETER

<a href='category.php?id={$row['cat_id']}'>{$row['cat_title']}</a> <br> 

DELIMETER;
         
echo $category_links;
        }
}


function get_specific_categories() {
    $query = query(" SELECT * FROM categories WHERE cat_id = " .  escape_string($_GET['id']) . " ");
    confirm($query);

    while ($row = fetch_array($query)) {

        // heredoc
$product = <<<DELIMETER

<h4>Home > Shop > {$row['cat_title']}</h4>

DELIMETER;

echo $product;

    }
}

function get_specific_product() {
    $query = query(" SELECT * FROM products WHERE product_id = " .  escape_string($_GET['id']) . " ");
    confirm($query);

    while ($row = fetch_array($query)) {

        // heredoc
$product = <<<DELIMETER

<h4>Home > Shop > {$row['product_title']}</h4>

DELIMETER;

echo $product;

    }
}


function get_product_in_cat_page() {
    $query = query(" SELECT * FROM products WHERE product_category_id = " .  escape_string($_GET['id']) . " ");
    confirm($query);

    while ($row = fetch_array($query)) {

        // heredoc
$product = <<<DELIMETER

        <a href="preview.php?id={$row['product_id']}">
          <div class="box9">
            <img src="{$row['product_image']}" style="width: 300px; height: 300px;" />
            <p>{$row['product_title']}<br />&#36;{$row['product_price']}</p>
          </div>
        </a>

DELIMETER;

echo $product;

    }
}

// ***********************BACK END FUNCTION********************

function login_user(){
    if (isset($_POST['submit'])) {
        $username = escape_string($_POST['username']);
        $password = escape_string($_POST['password']);

        $query = query("SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}' ");
        confirm($query);

    if (mysqli_num_rows($query) == 0) {
        set_message("Your Password or Username are wrong");
        redirect("login.php");
    } else {
        $_SESSION['username'] = $username;
        redirect("admin");
    }

    }
}







?>