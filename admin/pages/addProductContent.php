<?php
require 'function_defination.php';
if (isset($_POST['addBtnCategory'])) {
    add_product($_POST);
}
$categories     =   show_category(); 
$manufacturer   =   show_manufacturer(); 
?>

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a>
        <i class="icon-angle-right"></i> 
    </li>
    <li>
        <i class="icon-edit"></i>
        <a href="#">Forms</a>
    </li>
</ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2>
                <i class="halflings-icon edit"></i>
                <span class="break"></span>Add Category
            </h2>
            <div class="box-icon">
                <a href="#" class="btn-setting">
                    <i class="halflings-icon wrench"></i>
                </a>
                <a href="#" class="btn-minimize">
                    <i class="halflings-icon chevron-up"></i>
                </a>
                <a href="#" class="btn-close">
                    <i class="halflings-icon remove"></i>
                </a>
            </div>
        </div>

        <div class="box-content"> 
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <fieldset>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Add Product Name</label>
                        <div class="controls">
                            <input type="text" name="product_name" class="span6 typeahead" 
                                   id="typeahead"  data-provide="typeahead" data-items="4"
                                   >
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="selectError3">Category Name</label>
                        <div class="controls">
                            <select id="selectError3" name="category_name">
                                <option>-- Select Publication Status --</option>
                                <?php 
                                    if (mysqli_num_rows($categories) > 0) { 
                                    while($row = mysqli_fetch_assoc($categories)) {
                                ?>
                                <option value="<?php echo $row["category_id"]; ?>">
                                    <?php echo $row["category_name"]; ?>
                                </option>
                                <?php }}?>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="selectError3">Manufacturer Name</label>
                        <div class="controls">
                            <select id="selectError3" name="manufacturer_name">
                                <option>-- Select Publication Status --</option>
                                <?php 
                                    if (mysqli_num_rows($manufacturer) > 0) { 
                                    while($row = mysqli_fetch_assoc($manufacturer)) {
                                ?>
                                <option value="<?php echo $row["manufacturer_id"]; ?>">
                                    <?php echo $row["manufacturer_name"]; ?>
                                </option>
                                <?php }}?>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Add Product Price</label>
                        <div class="controls">
                            <input type="number" name="product_price" class="span6 typeahead" 
                                   id="typeahead"  data-provide="typeahead" data-items="4"
                                   >
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Add Product Quantity</label>
                        <div class="controls">
                            <input type="number" name="product_quantity" class="span6 typeahead" 
                                   id="typeahead"  data-provide="typeahead" data-items="4"
                                   >
                        </div>
                    </div>

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea">Product Short Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="product_short_desc" id="textarea" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea">Product Long Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="product_long_desc" id="textarea" rows="3"></textarea>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="fileInput">File input</label>
                        <div class="controls">
                            <div class="uploader" id="uniform-fileInput">
                                <input class="input-file uniform_on" name="fileToUpload" id="fileInput" type="file">
                                <span class="filename" style="-webkit-user-select: none;">No file selected</span>
                                <span class="action" style="-webkit-user-select: none;">Choose File</span>
                            </div>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="selectError3">Publication Status</label>
                        <div class="controls">
                            <select id="selectError3" name="publicationStatus">
                                <option>-- Select Publication Status --</option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" name="addBtnCategory" 
                                value="submit"
                                class="btn btn-primary">Save Product
                        </button>
                    </div>
                </fieldset>
            </form>   
        </div>

    </div><!--/span-->
</div><!--/row-->