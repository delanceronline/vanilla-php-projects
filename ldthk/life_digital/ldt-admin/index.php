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

        <div class="page-content">
            <div class="row">

                <?php include_once 'section/main_menu.php'; ?>

                <div class="col-md-10">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="content-box-large">
                                <div class="panel-heading">
                                    <div class="panel-title">主頁 / Main Banner</div>
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
                        <form class="form-horizontal" id="data-form" method="post" enctype="multipart/form-data" role="form" action="ajax/main_banner_create.php">
                            <input type="hidden" id="id" name="id" class="btn btn-default">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Title</label>
                                <div class="col-md-10">
                                    <input type="text" id="title" name="title" class="btn btn-default">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Sorting date*</label>
                                <div class="col-md-10">
                                    <input type="text" id="sort" name="sort" class="btn btn-default date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Show date*</label>
                                <div class="col-md-10">
                                    <input type="text" id="show" name="show" class="btn btn-default date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Banner*</label>
                                <div class="col-md-10">
                                    <input type="file" id="image" name="image" class="btn btn-default">
                                    <p class="help-block">
                                        Max file size: 2mb
                                    </p>
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
        <script type="text/x-kendo-template" id="tool_template">
            <a class="btn btn-sm btn-primary col-md-4 edit" data-id="#:id#" style="margin-right:5px;"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
            <a class="btn btn-sm btn-danger col-md-4 delete" data-id="#:id#"><span class="glyphicon glyphicon-trash"></span> Delete</a>
        </script>
        <script>
            $(document).ready(function() {
                $(".date").datepicker();
                var crudServiceBaseUrl = "http://demos.telerik.com/kendo-ui/service",
                        dataSource = new kendo.data.DataSource({
                            transport: {
                                read: {
                                    url: "json/main_banner_read.php",
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
                        {field: "title", title: "Title"},
                        {field: "sort", title: "Sorting", width: "90px", template: '#= kendo.toString(sort, "yyyy-MM-dd")#'},
                        {field: "show", title: "Show Date", width: "90px", template: '#= kendo.toString(show, "yyyy-MM-dd")#'},
                        {field: "image", title: "Image", width: "100px", template: kendo.template($("#img_template").html())},
                        {/*command: ["edit", "destroy"], */title: "&nbsp;", width: "170px", template: kendo.template($("#tool_template").html())}],
                    sortable: true,
                });

                function hookConfirm() {
                    $('a.delete').click(function() {
                        var id = $(this).attr("data-id");
                        if (confirm("Confirm to delete?") == true) {
                            var dataString = 'id=' + id;
                            $.ajax({
                                url: "ajax/main_banner_destroy.php",
                                type: "POST",
                                data: dataString,
                                success: function(data) {
                                    alert("Item deleted.");
                                    refreshList();
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    console.info("Response: " + jqXHR.responseText);
                                    console.info(textStatus + ": " + errorThrown);
                                },
                            });
                        }
                        ;
                    });

                    $('button.create').click(function() {
                        $('#head-word').html('Create');
                        $('#id').val('');
                        $('#title').val('');
                        $('#sort').val('');
                        $('#show').val('');
                        $('#image').val('');
                        checkOK();
                    });

                    $('a.edit').click(function() {
                        var id = $(this).attr("data-id");
                        var dataString = 'id=' + id;
                        $.ajax({
                            url: "ajax/main_banner_read_1.php",
                            type: "POST",
                            data: dataString,
                            success: function(data) {
                                $('#head-word').html('Update');
                                $('#id').val(data.id);
                                $('#title').val(data.title);
                                $('#sort').val(data.sort);
                                $('#show').val(data.show);
                                $('#image').val('');
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

                $('#sort').change(checkOK);
                $('#show').change(checkOK);
                $('#image').change(checkOK);

                $("#submit").attr("disabled", true);
                function checkOK() {
                    if ($('#sort').val() != "" && $('#show').val() != "" && ($('#id').val() != "" || $('#image').val() != ""))
                        $("#submit").attr("disabled", false);
                    else
                        $("#submit").attr("disabled", true);
                }
            });
        </script>
    </body>
</html>