<?php
$product_id = $_GET['product_id'];
require 'function_defination.php';
$result = show_view_details($product_id);
?>

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.php">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Category</a></li>
</ul>

<div class="row-fluid">		
    <div class="box span12">
        <div class="box-content">
            <h3 style="color: green;text-align: center">Product Detail's View</h3>
            <table class="table table-striped table-bordered">
                <tbody>
                    <?php
                        $row = mysqli_fetch_assoc($result);
                    ?>
                    <tr>
                        <th class="span4">Product id</th>
                        <td><?php echo $row['product_id'];?></td>
                    </tr>
                    <tr>
                        <th>Product Name</th>
                        <td><?php echo $row['product_name'];?></td>
                    </tr>
                    <tr>
                        <th>Category Name</th>
                        <td><?php echo $row['category_name'];?></td>
                    </tr>
                    <tr>
                        <th>Manufacturer Name</th>
                        <td><?php echo $row['manufacturer_name'];?></td>
                    </tr>
                    <tr>
                        <th>Product Price</th>
                        <td><?php echo $row['product_price'];?></td>
                    </tr>
                    <tr>
                        <th>Product Quantity</th>
                        <td><?php echo $row['product_quantity'];?></td>
                    </tr>
                    <tr>
                        <th>Product Short Description</th>
                        <td><?php echo $row['product_short_description'];?></td>
                    </tr>
                    <tr>
                        <th>Product Long description</th>
                        <td><?php echo $row['product_long_description'];?></td>
                    </tr>
                    <tr>
                        <th>Image</th>
                        <td>
                            <img src="<?php echo $row['product_image'];?>">
                        </td>
                    </tr>
                    <tr>
                        <th>Publication Status</th>
                        
                        <?php if ($row["publication_status"] == 1){ ?>
                        <td class="center">
                            <span class="label label-success">Active</span>
                        </td>
                        <?php }else{?>
                            <td class="center">
                                <span class="label label-warning">Pending</span>
                            </td>
                        <?php }?>
                        
                    </tr>
                    <tr>
                        <th>Action</th>
                        <td class="center">
                            <a class="btn btn-info" 
                               href="view_product.php?p_status=view&product_id=<?php echo $row["product_id"]; ?>" 
                               title="Publish">
                               <i class="halflings-icon white zoom-in"></i>  
                            </a>
                            <?php if ($row["publication_status"] == 0){ ?>
                                <a class="btn btn-success" 
                                   href="?p_status=published&category_id=<?php echo $row["category_id"]; ?>" 
                                   title="Publish">
                                    <i class="halflings-icon white thumbs-up"></i>  
                                </a>
                            <?php }  else { ?>
                                <a class="btn btn-warning" 
                                   href="?p_status=unpublished&category_id=<?php echo $row["category_id"]; ?>"
                                   title="Unpublish">
                                    <i class="halflings-icon white thumbs-down"></i>  
                                </a>
                            <?php } ?>
                            <a class="btn btn-info" href="#" title="Edit">
                                <i class="halflings-icon white edit"></i>  
                            </a>
                            <a class="btn btn-danger" 
                               href="delete_category.php?id=<?php echo $row["category_id"]; ?>" 
                               title="Delete">
                                <i class="halflings-icon white trash"></i> 
                            </a>
                        </td>
                    </tr>
                </tbody>  
            </table>            
        </div>
    </div><!--/span-->
</div><!--/row-->