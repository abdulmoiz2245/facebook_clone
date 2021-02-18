<?php


 require_once('../../private/initialize.php'); 
 require_login(); 
 $retval = find_all_posts();

?>



<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edmin</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'> </head>

    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse"> <i class="icon-reorder shaded"></i></a><a class="brand" href="index.html">Edmin </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav nav-icons">
                            <li class="active"><a href="#"><i class="icon-envelope"></i></a></li>
                            <li><a href="#"><i class="icon-eye-open"></i></a></li>
                            <li><a href="#"><i class="icon-bar-chart"></i></a></li>
                        </ul>
                        <form class="navbar-search pull-left input-append" action="#">
                            <input type="text" class="span3">
                            <button class="btn" type="button"> <i class="icon-search"></i> </button>
                        </form>
                        <ul class="nav pull-right">
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Item No. 1</a></li>
                                    <li><a href="#">Don't Click</a></li>
                                    <li class="divider"></li>
                                    <li class="nav-header">Example Header</li>
                                    <li><a href="#">A Separated link</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Support </a></li>
                            <li class="nav-user dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="images/user.png" class="nav-avatar"> <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Your Profile</a></li>
                                    <li><a href="#">Edit Profile</a></li>
                                    <li><a href="#">Account Settings</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                	
                    <?php include(SHARED_PATH . '/sidebar.php'); ?>

                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                            <div class="btn-controls">
                                <div class="btn-box-row row-fluid">
                                    <!--Likes--><a href="#" class="btn-box big span4"><i class=" icon-random"></i><b>23</b>
                                        <p class="text-muted">Like</p>
                                    </a><a href="#" class="btn-box big span4"><i class="icon-user"></i><b>15</b>
                                        <!--Views -->
                                        <p class="text-muted">Number of Views</p>
                                    </a><a href="#" class="btn-box big span4"><i class="icon-money"></i><b>6</b>
                                        <!--posts -->
                                        <p class="text-muted">Number Of Posts</p>
                                    </a> </div>
                                <div class="btn-box-row row-fluid">
                                    <div class="span8">
                                        <div class="row-fluid">
                                            <div class="span12"> <a href="#" class="btn-box small span4"><i class="icon-envelope"></i><b>Messages</b>
                                                </a><a href="#" class="btn-box small span4"><i class="icon-group"></i><b>Clients</b>
                                                </a><a href="#" class="btn-box small span4"><i class="icon-exchange"></i><b>Expenses</b>
                                                </a> </div>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span12"> <a href="#" class="btn-box small span4"><i class="icon-save"></i><b>Total Sales</b>
                                                </a><a href="#" class="btn-box small span4"><i class="icon-bullhorn"></i><b>Social Feed</b>
                                                </a><a href="#" class="btn-box small span4"><i class="icon-sort-down"></i><b>Bounce
                                                    Rate</b> </a> </div>
                                        </div>
                                    </div>
                                    <ul class="widget widget-usage unstyled span4">
                                        <li>
                                            <p> <strong>Windows 8</strong> <span class="pull-right small muted">78%</span> </p>                                          
                                            <div class="progress tight">
                                                <div class="bar" style="width: 78%;"> </div>
                                            </div>
                                        </li>
                                        <li>
                                            <p> <strong>Mac</strong> <span class="pull-right small muted">56%</span> </p>
                                            <div class="progress tight">
                                                <div class="bar bar-success" style="width: 56%;"> </div>
                                            </div>
                                        </li>
                                        <li>
                                            <p> <strong>Linux</strong> <span class="pull-right small muted">44%</span> </p>
                                            <div class="progress tight">
                                                <div class="bar bar-warning" style="width: 44%;"> </div>
                                            </div>
                                        </li>
                                        <li>
                                            <p> <strong>iPhone</strong> <span class="pull-right small muted">67%</span> </p>
                                            <div class="progress tight">
                                                <div class="bar bar-danger" style="width: 67%;"> </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--/#btn-controls-->
                            <!-- <div class="module">
                                <div class="module-head">
                                    <h3>
                                        Profit Chart</h3>
                                </div>
                                <div class="module-body">
                                    <div class="chart inline-legend grid">
                                        <div id="placeholder2" class="graph" style="height: 500px">
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!--/.module-->
                            <div class="module hide">
                                <div class="module-head">
                                    <h3>
                                        Adjust Budget Range</h3> </div>
                                <div class="module-body">
                                    <div class="form-inline clearfix"> <a href="#" class="btn pull-right">Update</a>
                                        <label for="amount"> Price range:</label> &nbsp;
                                        <input type="text" id="amount" class="input-"> </div>
                                    <hr>
                                    <div class="slider-range ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" aria-disabled="false">
                                        <div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 15%; width: 45%;"></div>
                                        <a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 15%;"></a>
                                        <a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 60%;"></a>
                                    </div>
                                </div>
                            </div>
                            <!--table -->
                            <div class="module">
                                <div class="module-head">
                                    <h3>
                                        DataTables</h3> </div>
                                <div class="module-body table">
                                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
                                        <div id="DataTables_Table_0_length" class="dataTables_length">
                                            <label>Show
                                                <select size="1" name="DataTables_Table_0_length" aria-controls="DataTables_Table_0">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select> entries</label>
                                        </div>
                                        <div class="dataTables_filter" id="DataTables_Table_0_filter">
                                            <label>Search:
                                                <input type="text" aria-controls="DataTables_Table_0">
                                            </label>
                                        </div>
                                        <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped  display dataTable" width="100%" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="
                                                    Rendering engine
                                                : activate to sort column descending" style="width: 136px;"> Id </th>
                                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="
                                                    Browser
                                                : activate to sort column ascending" style="width: 202px;"> Admin Id  </th>
                                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="
                                                    Platform(s)
                                                : activate to sort column ascending" style="width: 183px;"> Views </th>
                                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="
                                                    Engine version
                                                : activate to sort column ascending" style="width: 114px;"> Likes</th>
                                                </tr>
                                            </thead>
                                            <!-- <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">  </th>
                                                    <th rowspan="1" colspan="1"> Browser </th>
                                                    <th rowspan="1" colspan="1"> Platform(s) </th>
                                                    <th rowspan="1" colspan="1"> Engine version </th>
                                                    <th rowspan="1" colspan="1"> CSS grade </th>
                                                </tr>
                                            </tfoot> -->
                                            <tbody role="alert" aria-live="polite" aria-relevant="all">
                                            <!-- 4 step desplay data -->
                                                <?php  while($row = mysqli_fetch_assoc($retval)) {

                                                    echo '<tr class="gradeU odd">';
                                                        echo '<td class="sorting_1">' .$row["id"]. '</td>';
                                                    echo '<td class=" ">' .$row["admin_id"]. '</td>';
                                                    echo' <td class=" ">' .$row["views"]. '</td>';
                                                        echo '<td class="center ">'  .$row["likes"]. '</td>';
                                                    echo "</tr>";
                                                } ?>                                   
                                
                                           </tbody>
                                        </table>
                                        <div class="dataTables_info" id="DataTables_Table_0_info">Showing 31 to 40 of 57 entries</div>
                                        <div class="dataTables_paginate paging_two_button btn-group datatable-pagination" id="DataTables_Table_0_paginate"><a class="paginate_enabled_previous" tabindex="0" role="button" id="DataTables_Table_0_previous" aria-controls="DataTables_Table_0"><span>Previous</span><i class="icon-chevron-left shaded"></i></a><a class="paginate_enabled_next" tabindex="0" role="button" id="DataTables_Table_0_next" aria-controls="DataTables_Table_0"><span>Next</span><i class="icon-chevron-right shaded"></i></a></div>
                                    </div>
                                </div>
                            </div>
                            <!-- table ends-->
                            <!--/.module-->
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
        <div class="footer">
            <div class="container"> <b class="copyright">© 2014 Edmin - EGrappler.com </b>All rights reserved. </div>

                <?php 
                    //fifth step colse connection
                    mysqli_close($conn);

                ?>
        </div>


        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>
        <gdiv class="ginger-extension-writer" style="display: none;">
            <gdiv class="ginger-extension-writer-frame">
                <iframe src="chrome-extension://kdfieneakcjfaiglcfcgkidlkmlijjnh/writer/index.html" __idm_frm__="425"></iframe>
            </gdiv>
        </gdiv>
    </body>