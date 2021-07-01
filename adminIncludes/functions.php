<script>
function del_cat_btn(id){
    if(confirm('Do you really want to delete this category? It will also delete all the items in this category.')){
        location.href = 'admin_panel.php?del='+id;
    }else{
        
    }
}
</script>
<?php session_start(); ?>
<?php 

    function confirmQuery($result){
        global $connection;
        if(!$connection){
            die("QUERY FAILED. " . mysqli_error($connection));
        }
    }

    function showAllCategories(){
        global $connection;
        $query = "SELECT * FROM categories";
        $select_cat = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($select_cat)){
            $cat_id = $row['cat_id'];
            $cat_name = $row['cat_name'];
            $cat_image = $row['cat_image'];
            echo "<tr>";
            echo "<th><button style='border:none; background:none;' onclick='del_cat_btn({$cat_id})'><img src='images/negative.svg'></button></th>";
            echo "<td>{$cat_id}</td>";
            echo "<td><img width = '100' src = './images/$cat_image' alt='images'</td>";
            echo "<td>{$cat_name}</td>";
            echo "</tr>";
        }
    }

    function insert_categories(){
        global $connection;

        if(isset($_POST['submit'])){
            $cat_name = $_POST['cat_name'];
            
            $cat_image = $_FILES['cat_image']['name'];
            $cat_image_temp = $_FILES['cat_image']['tmp_name'];

            $target_dir = "./images/";
            move_uploaded_file($cat_image_temp, $target_dir . $cat_image);
            echo "<script>alert($target_dir . $cat_image)</script>";

            if($cat_name == "" || empty($cat_name)){
                echo "<h4 style='color:red'>Please Fill the Field. It should not be empty</h4>";
            }
            else{
                $query = "INSERT INTO categories(cat_name, cat_image)";
                $query .= " VALUES('{$cat_name}','{$cat_image}')";

                $create_cat_query = mysqli_query($connection,$query);
                if(!$create_cat_query){
                    die('QUERY FAILED' . mysqli_error($connection));
                }
            }
            header("Location: admin_panel.php");
        }
    }


    function addSalesToDatabase(){

        echo "<script>alert('function Call')</script>";
        global $connection;

        foreach($_SESSION['cartDetails'] as $key => $value){
            $pid = $value['product_id'];
            $pSelect = $value['itemSelect'];

            $query = "SELECT * FROM products WHERE product_id = $pid";
            $sel_query = mysqli_query($connection,$query);
            $row = mysqli_fetch_array($sel_query);
            echo "<script>alert('totalsales from db')</script>";

            $oldCount = $row['total_sales'];
            $newCount = $oldCount + $pSelect;

            $query2 = "UPDATE products SET total_sales = $newCount WHERE product_id = $pid";
            $update_query = mysqli_query($connection,$query2);
            echo "<script>alert('added to db')</script>";

        }
        header("Location: receipt.php");

    }

    function deleteCategories(){
        global $connection;
        if(isset($_GET['del'])){
            $del_cat_id = $_GET['del'];
            $query = "DELETE FROM categories WHERE cat_id = {$del_cat_id}";
            $del_query = mysqli_query($connection,$query);
            header("Location: admin_panel.php");
        }
    }


















?>