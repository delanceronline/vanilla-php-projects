<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>LDT Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- jQuery UI -->
        <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">


        <!-- styles -->
        <link href="css/styles.css" rel="stylesheet">

        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="kendoUI/styles/kendo.common.min.css" />
        <link rel="stylesheet" href="kendoUI/styles/kendo.default.min.css" />
        <link rel="stylesheet" href="kendoUI/styles/kendo.dataviz.min.css" />
        <link rel="stylesheet" href="kendoUI/styles/kendo.dataviz.default.min.css" />

        <script src="kendoUI/js/jquery.min.js"></script>
        <script src="kendoUI/js/kendo.all.min.js"></script>
        <script src="kendoUI/js/kendo.web.min.js"></script>
        <script src="ckeditor/ckeditor.js"></script>

        <link href="css/forms.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <?php include_once 'section/header.php'; ?>
        <?php include_once 'config.inc.php'; ?>

        <div class="page-content">
            <div class="row">

                <?php include_once 'section/main_menu.php'; ?>

                <div class="col-md-10">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="content-box-large">
                                <div class="panel-heading">
                                    <div class="panel-title">主頁 / 產品</div>
                                </div>
                                <div class="panel-body">
                                    <button type="button" class="btn btn-sm btn-default create" data-toggle="modal" data-target="#createModal"><span class="glyphicon glyphicon-plus"></span> Create</button><br/>
                                    <div id="grid"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--  Page content -->
                </div>
            </div>
        </div>

        <?php include_once 'section/footer.php'; ?>

        <!-- Modal Create -->
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" id="head-word">
                        Create
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" id="data-form" method="post" enctype="multipart/form-data" role="form" action="ajax/product_create.php">
                            <input type="hidden" id="id" name="id" class="btn btn-default">
                            <div class="form-group">
                                <label class="col-md-2 control-label">名稱*</label>
                                <div class="col-md-10">
                                    <input type="text" id="title" name="title" class="btn btn-default">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">分類*</label>
                                <div class="col-md-10">
                                    <select name="category" id="category">
                                        <?php
                                        $link = mysql_connect($db_location, $db_login_id, $db_password);
                                        if ($link) {
                                            $db_selected = mysql_select_db($db_name, $link);
                                            if ($db_selected) {
                                                mysql_query("SET NAMES 'utf8';");
                                                $result = mysql_query("SELECT * from product_cat");
                                                while ($row = mysql_fetch_array($result)) {
                                                    if ($row != null) {
                                                        echo '<option value="' . $row['id'] . '">' . $row['title'] . '</option>';
                                                    }
                                                }
                                            }
                                            mysql_close($link);
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">品牌*</label>
                                <div class="col-md-10">
                                    <select name="brand" id="brand">
                                        <?php
                                        $link = mysql_connect($db_location, $db_login_id, $db_password);
                                        if ($link) {
                                            $db_selected = mysql_select_db($db_name, $link);
                                            if ($db_selected) {
                                                mysql_query("SET NAMES 'utf8';");
                                                $result = mysql_query("SELECT * from product_brand");
                                                while ($row = mysql_fetch_array($result)) {
                                                    if ($row != null) {
                                                        echo '<option value="' . $row['id'] . '">' . $row['title'] . '</option>';
                                                    }
                                                }
                                            }
                                            mysql_close($link);
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">排序日期*</label>
                                <div class="col-md-10">
                                    <input type="text" id="sort" name="sort" class="btn btn-default date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">顯示日期*</label>
                                <div class="col-md-10">
                                    <input type="text" id="show" name="show" class="btn btn-default date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">最新產品</label>
                                <div class="col-md-10">
                                    <input type="checkbox" name="new_product" value="new_product" id="new_product">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">型號*</label>
                                <div class="col-md-10">
                                    <input type="text" id="model" name="model" class="btn btn-default">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">功能</label>
                                <div class="col-md-10">
                                    <input type="text" id="function" name="function" class="btn btn-default">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">規格</label>
                                <div class="col-md-10">
                                    <input type="text" id="description" name="description" class="btn btn-default">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">呎吋</label>
                                <div class="col-md-10">
                                    <input type="text" id="size" name="size" class="btn btn-default">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">售價</label>
                                <div class="col-md-10">
                                    <input type="text" id="prodprice" name="prodprice" class="btn btn-default">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Image*</label>
                                <div class="col-md-10">
                                    <input type="file" id="image" name="image" class="btn btn-default">
                                    <p class="help-block">
                                        Max file size: 2mb
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Link</label>
                                <div class="col-md-10">
                                    <input type="text" id="link" name="link" class="btn btn-default">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button class="btn btn-info" data-dismiss="modal" aria-hidden="true" style="margin-right:5px;">Cancel</button>
                                    <button class="btn btn-primary" id="submit" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Create -->

        <!-- jQuery UI -->
        <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap/js/bootstrap.min.js"></script>

        <script src="js/custom.js"></script>

        <script type="text/x-kendo-template" id="img_template">
            <img src="../upload/#:image#" height="40px">
        </script>
        <script type="text/x-kendo-template" id="new_template">
            #if(new_product==1){#
                <span class="glyphicon glyphicon-ok"></span>
            #}else{#
                <span class="glyphicon glyphicon-remove"></span>
            #}#
        </script>
        <script type="text/x-kendo-template" id="tool_template">
            <a class="btn btn-sm btn-info detail" data-id="#:id#" style="margin-right:5px;"><span class="glyphicon glyphicon-list-alt"></span> Detail</a>
            <a class="btn btn-sm btn-primary edit" data-id="#:id#" style="margin-right:5px;"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
            <a class="btn btn-sm btn-danger delete" data-id="#:id#"><span class="glyphicon glyphicon-trash"></span> Delete</a>
        </script>
        <script>
            $(document).ready(function() {
                $(".date").datepicker();
                //CKEDITOR.replace('description');
                var crudServiceBaseUrl = "http://demos.telerik.com/kendo-ui/service",
                        dataSource = new kendo.data.DataSource({
                            transport: {
                                read: {
                                    url: "json/product_read.php",
                                    dataType: "json"
                                },
                                parameterMap: function(options, operation) {
                                    if (operation !== "read" && options.models) {
                                        return {models: kendo.stringify(options.models)};
                                    }
                                }
                            },
                            batch: true,
                            pageSize: 10,
                        });

                $("#grid").kendoGrid({
                    dataSource: dataSource,
                    dataBound: hookConfirm,
                    pageable: true,
                    height: 550,
                    columns: [
                        {field: "title", title: "Name"},
                        {field: "cat_title", title: "Category", width: "80px"},
                        {field: "brand_title", title: "Brand", width: "80px"},
                        {field: "new_product", title: "New", width: "50px", template: kendo.template($("#new_template").html())},
                        {field: "sort", title: "Sorting", width: "90px", template: '#= kendo.toString(sort, "yyyy-MM-dd")#'},
                        {field: "show", title: "Show Date", width: "90px", template: '#= kendo.toString(show, "yyyy-MM-dd")#'},
                        {field: "image", title: "Image", width: "60px", template: kendo.template($("#img_template").html())},
                        {/*command: ["edit", "destroy"], */title: "&nbsp;", width: "240px", template: kendo.template($("#tool_template").html())}],
                    sortable: true,
                });

                function hookConfirm() {
                    $('a.delete').click(function() {
                        var id = $(this).attr("data-id");
                        if (confirm("Confirm to delete?") == true) {
                            var dataString = 'id=' + id;
                            $.ajax({
                                url: "ajax/product_destroy.php",
                                type: "POST",
                                data: dataString,
                                success: function(data) {
                                    alert("Item deleted.");
                                    refreshList();
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    console.info("Response: " + jqXHR.responseText);
                                    console.info(textStatus + ": " + errorThrown);
                                }
                            });
                        }
                        ;
                    });

                    $('button.create').click(function() {
                        $('#head-word').html('Create');
                        $('#id').val('');
                        $('#title').val('');
                        $('#category').val('');
                        $('#brand').val('');
                        $('#model').val('');
                        $('#sort').val('');
                        $('#show').val('');
                        $('#new_product').attr('checked', false);
                        $('#function').val('');
                        $('#description').val('');
                        $('#size').val('');
                        $('#prodprice').val('');
						$('#image').val('');
                        $('#link').val('');
                        checkOK();
                    });

                    $('a.detail').click(function() {
                        window.location = "product-detail.php?product_id=" + $(this).attr("data-id");
                    });

                    $('a.edit').click(function() {
                        var id = $(this).attr("data-id");
                        var dataString = 'id=' + id;
                        $.ajax({
                            url: "ajax/product_read_1.php",
                            type: "POST",
                            data: dataString,
                            success: function(data) {
                                $('#head-word').html('Update');
                                $('#id').val(data.id);
                                $('#title').val(data.title);
                                $('#category').val(data.category);
                                $('#brand').val(data.brand);
                                $('#model').val(data.model);
                                $('#sort').val(data.sort);
                                $('#show').val(data.show);
                                if (data.new_product == 1)
                                    $('#new_product').attr('checked', true);
                                else
                                    $('#new_product').attr('checked', false);
                                $('#function').val(data.function);
                                $('#description').val(data.description);
                                $('#size').val(data.size);
								$('#prodprice').val(data.prodprice);
                                $('#image').val('');
                                $('#link').val(data.link);
                                $('#createModal').modal('show');
                                checkOK();
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                console.info("Response: " + jqXHR.responseText);
                                console.info(textStatus + ": " + errorThrown);
                            },
                        });
                    });
                }

                function refreshList() {
                    $("#grid").data("kendoGrid").dataSource.read();
                    $("#grid").data("kendoGrid").refresh();
                }

                $('#title').change(checkOK);
                $('#category').change(checkOK);
                $('#brand').change(checkOK);
                $('#model').on('keyup change paste cut click', checkOK);
                $('#sort').change(checkOK);
                $('#show').change(checkOK);
                $('#image').change(checkOK);
                //$('#description').on('keyup change paste cut click', checkOK);

                $("#submit").attr("disabled", true);
                function checkOK() {
                    if ($('#title').val() != "" && $('#model').val() != "" && $('#sort').val() != "" && $('#show').val() != "" /*&& $('#description').val() != ""*/ && ($('#id').val() != "" || $('#image').val() != ""))
                        $("#submit").attr("disabled", false);
                    else
                        $("#submit").attr("disabled", true);
                }
            });
        </script>
    </body>
</html>