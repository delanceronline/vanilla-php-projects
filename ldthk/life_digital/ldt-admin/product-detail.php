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
                                    <div class="panel-title">主頁 / 產品</div>
                                </div>
                                <div class="panel-body">
                                    <button type="button" class="btn btn-sm btn-default create" data-toggle="modal" data-target="#createModal"><span class="glyphicon glyphicon-plus"></span> Upload Photo</button><br/><br/>
                                    <?php
                                    $product_id = $_REQUEST['product_id'];
                                    include_once 'config.inc.php';
                                    $link = mysql_connect($db_location, $db_login_id, $db_password);
                                    if ($link) {
                                        $db_selected = mysql_select_db($db_name, $link);
                                        if ($db_selected) {
                                            mysql_query("SET NAMES 'utf8';");
                                            $result = mysql_query("SELECT id, image from product_detail WHERE product_id = '$product_id'");
                                            while ($row = mysql_fetch_array($result)) {
                                                if ($row != null) {
                                                    echo '<div class="col-xs-5 col-md-3" style="text-align: center;height:300px;margin: 1% 0;">';
                                                    echo '<div class="thumbnail" style="height:300px;margin: 0;">';
                                                    echo '<a class="btn btn-sm btn-danger col-md-12 delete" data-id="' . $row['id'] . '" style="margin: 5px 0;"><span class="glyphicon glyphicon-trash"></span> Delete</a>';
                                                    echo '<img src="../upload/' . $row['image'] . '" width="100%">';
                                                    echo '</div></div>';
                                                }
                                            }
                                        }
                                        mysql_close($link);
                                    }
                                    ?>
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
                        Upload Photo
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    </div>
                    <div class="modal-body">
                        <div id="uploader">
                            <p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Create -->

        <!-- jQuery UI -->
        <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed 
        <script src="bootstrap/js/bootstrap.min.js"></script>-->

        <script src="js/custom.js"></script>
        <script src="bootstrap/js/modal.js"></script>

        <!-- Load plupload and all it's runtimes and finally the UI widget -->
        <link rel="stylesheet" href="src/plupload-2.1.2/js/jquery.ui.plupload/css/jquery.ui.plupload.css" type="text/css" />

        <script type="text/javascript" src="src/plupload-2.1.2/js/plupload.full.min.js"></script>
        <script type="text/javascript" src="src/plupload-2.1.2/js/jquery.ui.plupload/jquery.ui.plupload.js"></script>

        <script>
            $(document).ready(function() {
                $('a.delete').click(function() {
                    var id = $(this).attr("data-id");
                    if (confirm("Confirm to delete?") == true) {
                        var dataString = 'id=' + id;
                        $.ajax({
                            url: "ajax/product_detail_destroy.php",
                            type: "POST",
                            data: dataString,
                            success: function(data) {
                                alert("Item deleted.");
                                window.location = "product-detail.php?product_id=<?php echo $product_id; ?>";
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                console.info("Response: " + jqXHR.responseText);
                                console.info(textStatus + ": " + errorThrown);
                            },
                        });
                    }
                });
            });
        </script>
        <script type="text/javascript">
            // Initialize the widget when the DOM is ready
            $(function() {
                var error = false;
                $("#uploader").plupload({
                    // General settings
                    runtimes: 'html5,flash,silverlight,html4',
                    url: "ajax/product_detail_upload.php?product_id=<?php echo $product_id; ?>",
                    // Maximum file size
                    max_file_size: '2mb',
                    chunk_size: '1mb',
                    filters: [
                        {title: "Image files", extensions: "jpg,png"},
                    ],
                    // Rename files by clicking on their titles
                    rename: true,
                    // Sort files
                    sortable: true,
                    // Enable ability to drag'n'drop files onto the widget (currently only HTML5 supports that)
                    dragdrop: true,
                    // Views to activate
                    views: {
                        list: true,
                        thumbs: true, // Show thumbs
                        active: 'thumbs'
                    },
                    // Flash settings
                    flash_swf_url: '/src/plupload-2.1.2/js/Moxie.swf',
                    // Silverlight settings
                    silverlight_xap_url: '/src/plupload-2.1.2/js/Moxie.xap'
                });

                $('#uploader').on("error", function(uploader, err) {
                    error = true;
                    alert("Error: " + err.code + " Message: " + err.message);
                });

                $('#uploader').on("complete", function(uploader, file) {
                    if (error) {
                        error = false;
                    } else {
                        window.location = "product-detail.php?product_id=<?php echo $product_id; ?>";
                    }
                });
            });
        </script>
    </body>
</html>