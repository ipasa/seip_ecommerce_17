<?php
if (isset($_POST['addBtnCategory'])) {
    require 'function_defination.php';
    add_manufacturer($_POST);
}
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
            <form class="form-horizontal" action="" method="post">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Add Manufacturer Name</label>
                        <div class="controls">
                            <input type="text" name="manufacturer_name" class="span6 typeahead" 
                                   id="typeahead"  data-provide="typeahead" data-items="4"
                            >
                        </div>
                    </div>

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea">Manufacturer Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="manufacturer_desc" id="textarea" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="selectError3">Plain Select</label>
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
                                class="btn btn-primary">Save Manufacturer
                        </button>
                    </div>
                </fieldset>
            </form>   
        </div>

    </div><!--/span-->
</div><!--/row-->