<?php
    require 'function_defination.php';
    $categories  =   show_category();    
?>

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a> 
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
                        if (mysqli_num_rows($categories) > 0) { 
                        while($row = mysqli_fetch_assoc($categories)) {
                    ?>
                    <tr>
                        <td class="span3"><?php echo $row["category_name"]; ?></td>
                        <td class="center span6"><?php echo $row["category_desc"];?></td>
                        <?php if ($row["publicationStatus"] == 1){ ?>
                            <td class="center">
                                <span class="label label-success">Active</span>
                            </td>
                        <?php }else{?>
                            <td class="center">
                                <span class="label label-warning">Pending</span>
                            </td>
                        <?php }?>
                        
                        <td class="center">
                            <a class="btn btn-success" href="#">
                                <i class="halflings-icon white zoom-in"></i>  
                            </a>
                            <a class="btn btn-info" href="#">
                                <i class="halflings-icon white edit"></i>  
                            </a>
                            <a class="btn btn-danger" 
                               href="delete_category.php?id=<?php echo $row["category_id"]; ?>">
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