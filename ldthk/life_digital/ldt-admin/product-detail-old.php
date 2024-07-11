<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>LDT Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- jQuery UI -->
        <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- styles -->
        <link href="css/styles.css" rel="stylesheet">

        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <link href="vendors/form-helpers/css/bootstrap-formhelpers.min.css" rel="stylesheet">
        <link href="vendors/select/bootstrap-select.min.css" rel="stylesheet">
        <link href="vendors/tags/css/bootstrap-tags.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css"></link>

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
                                    <div class="panel-title">主頁 / Product detail</div>

                                    <div class="panel-options">
                                        <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                                        <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div id="rootwizard">
                                        <!--<div class="navbar">
                                          <div class="navbar-inner">
                                            <div class="container">
                                        <ul class="nav nav-pills">
                                            <li class="active"><a href="#tab1" data-toggle="tab">First</a></li>
                                            <li><a href="#tab2" data-toggle="tab">Second</a></li>
                                            <li><a href="#tab3" data-toggle="tab">Third</a></li>
                                        </ul>
                                         </div>
                                          </div>
                                        </div>-->

                                        <form class="form-horizontal" role="form">

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">&nbsp;</label>
                                                <div class="col-md-10">
                                                    <textarea id="ckeditor_standard"></textarea>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-md-2 control-label">圖片 1</label>
                                                <div class="col-md-10">
                                                    <input type="file" id="exampleInputFile1" class="btn btn-default">
                                                    <p class="help-block">
                                                        some help text here.
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">圖片 2</label>
                                                <div class="col-md-10">
                                                    <input type="file" id="exampleInputFile1" class="btn btn-default">
                                                    <p class="help-block">
                                                        some help text here.
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">圖片3</label>
                                                <div class="col-md-10">
                                                    <input type="file" id="exampleInputFile1" class="btn btn-default">
                                                    <p class="help-block">
                                                        some help text here.
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">圖片 4</label>
                                                <div class="col-md-10">
                                                    <input type="file" id="exampleInputFile1" class="btn btn-default">
                                                    <p class="help-block">
                                                        some help text here.
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">圖片 5</label>
                                                <div class="col-md-10">
                                                    <input type="file" id="exampleInputFile1" class="btn btn-default">
                                                    <p class="help-block">
                                                        some help text here.
                                                    </p>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" for="inputEmail3">產品類別:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" placeholder="text" id="inputEmail3" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" for="inputEmail3">品牌:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" placeholder="text" id="inputEmail3" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" for="inputEmail3">型號:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" placeholder="text" id="inputEmail3" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" for="inputEmail3">功能:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" placeholder="text" id="inputEmail3" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" for="inputEmail3">規格:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" placeholder="text" id="inputEmail3" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" for="inputEmail3">呎寸:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" placeholder="text" id="inputEmail3" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" for="inputEmail3">產品網頁:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" placeholder="text" id="inputEmail3" class="form-control">
                                                </div>
                                            </div>

                                            <fieldset>
                                                <legend>產品規格</legend>
                                                <div class="form-group">
                                                    <label for="text-field" class="col-md-2 control-label">如欲查詢產品詳細資料請按此瀏覽官方網頁</label>
                                                    <div class="col-md-10">
                                                        <input type="text" placeholder="Default Text Field" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="text-field" class="col-md-2 control-label">訂購及查詢熱線</label>
                                                    <div class="col-md-10">
                                                        <input type="text" placeholder="Default Text Field" class="form-control">
                                                    </div>
                                                </div>

                                            </fieldset>

                                            <hr>


                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button class="btn btn-primary" type="submit">Confirm</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!--<ul class="pager wizard">
                                            <li class="previous first disabled" style="display:none;"><a href="javascript:void(0);">First</a></li>
                                            <li class="previous disabled"><a href="javascript:void(0);">Previous</a></li>
                                            <li class="next last" style="display:none;"><a href="javascript:void(0);">Last</a></li>
                                            <li class="next"><a href="javascript:void(0);">Next</a></li>
                                        </ul>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!--  Page content -->
            </div>
        </div>
    </div>

    <?php include_once 'section/footer.php'; ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="vendors/form-helpers/js/bootstrap-formhelpers.min.js"></script>

    <script src="vendors/select/bootstrap-select.min.js"></script>

    <script src="vendors/tags/js/bootstrap-tags.min.js"></script>

    <script src="vendors/mask/jquery.maskedinput.min.js"></script>

    <script src="vendors/moment/moment.min.js"></script>

    <script src="vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

    <!-- bootstrap-datetimepicker -->
    <link href="vendors/bootstrap-datetimepicker/datetimepicker.css" rel="stylesheet">
    <script src="vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script>


    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

    <script src="vendors/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
    <script src="vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>

    <script src="vendors/ckeditor/ckeditor.js"></script>
    <script src="vendors/ckeditor/adapters/jquery.js"></script>

    <script src="js/custom.js"></script>
    <script src="js/editors.js"></script>
</body>
</html>