<?php include('../config/constants.php'); ?>
<?php
if(isset($_GET['id'])and isset($_GET['image_name']))
{
    $id=$_GET['id'];
    $image_name=$_GET['image_name'];
    if($image_name!="")
    {
        $path="../images/food/".$image_name;
        $remove=unlink($path);
        if($remove==false)
        {
            $_SESSION['upload']="<div class='error'>failed to renove the image</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
            die();
        }
    }

    $sql="DELETE FROM tbl_food where id=$id";
    $res=mysqli_query($con,$sql);
    if($res)
    {
        $_SESSION['delete'] = "<div class='success'>Food Deleted Successfully.</div>";
        header('location:'.SITEURL.'admin/manage-food.php');

    }
    else{
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Food.</div>";
        header('location:'.SITEURL.'admin/manage-food.php');


    }

}
else{
    $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access.</div>";
    header('location:'.SITEURL.'admin/manage-food.php');
}
?>