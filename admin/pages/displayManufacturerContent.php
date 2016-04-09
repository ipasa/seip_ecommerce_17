<?php
    require 'function_defination.php';
    
    if (isset($_GET['p_status'])){
        $manufacturer_id    =   $_GET['manufacturer_id'];
        
        if ($_GET['p_status']=='published'){
            $message =   unpublished_a_manufactuter($manufacturer_id);
        }
        if ($_GET['p_status']=='unpublished'){
            $message =   published_a_manufactuter($manufacturer_id);
        }
    }
    
    $manufactureres  =   show_manufacturer();    
?>

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.php">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Category</a></li>
</ul>

<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Categories</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <h3 style="color: green;text-align: center">
                <?php
                if (isset($message)){
                    echo $message;
                    unset($message);
                }
                ?>
            </h3>
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Category Name</th>
                        <th>Category Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>  
                
                <tbody>
                    <?php 
                        if (mysqli_num_rows($manufactureres) > 0) { 
                        while($row = mysqli_fetch_assoc($manufactureres)) {
                    ?>
                    <tr>
                        <td class="span3"><?php echo $row["manufacturer_name"]; ?></td>
                        <td class="center span6"><?php echo $row["manufacturer_description"];?></td>
                        <?php if ($row["publication_status"] == 1){ ?>
                            <td class="center">
                                <span class="label label-success">Active</span>
                            </td>
                        <?php }else{?>
                            <td class="center">
                                <span class="label label-warning">Pending</span>
                            </td>
                        <?php }?>
                        
                        <td class="center">
                            <?php if ($row["publication_status"] == 0){ ?>
                                <a class="btn btn-success" 
                                   href="?p_status=published&manufacturer_id=<?php echo $row["manufacturer_id"]; ?>" 
                                   title="Publish">
                                    <i class="halflings-icon white thumbs-up"></i>  
                                </a>
                            <?php }  else { ?>
                                <a class="btn btn-warning" 
                                   href="?p_status=unpublished&manufacturer_id=<?php echo $row["manufacturer_id"]; ?>"
                                   title="Unpublish">
                                    <i class="halflings-icon white thumbs-down"></i>  
                                </a>
                            <?php } ?>
                            <a class="btn btn-info" href="#" title="Edit">
                                <i class="halflings-icon white edit"></i>  
                            </a>
                            <a class="btn btn-danger" 
                               href="delete_category.php?id=<?php echo $row["manufacturer_id"]; ?>" 
                               title="Delete">
                                <i class="halflings-icon white trash"></i> 
                            </a>
                        </td>
                    </tr>
                    <?php 
                        }
                        } else {
                                echo "0 results";
                        }
                    ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->
</div><!--/row-->