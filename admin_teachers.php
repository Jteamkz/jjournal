<?php 

include 'php/session.php';
include 'php/db/connect_db.php';
include 'php/db/get_all_data.php';
include 'php/db/get.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Учетеля</title>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Thousand - Admin Page</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <!-- <link href="css/sb-admin.css" rel="stylesheet"> -->

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="css/rwd-table.css">

</head>
<body>
	<section id="demo">
            <div class="container">
                <div class="page-header">
                    <h2>Demo</h2>
                </div>

                <div class="table-responsive" data-pattern="priority-columns">
                    <table cellspacing="0" id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Company</th>
                                <th data-priority="1">Last Trade</th>
                                <th data-priority="3">Trade Time</th>
                                <th data-priority="1">Change</th>
                                <th data-priority="3">Prev Close</th>
                                <th data-priority="3">Open</th>
                                <th data-priority="6">Bid</th>
                                <th data-priority="6">Ask</th>
                                <th data-priority="6">1y Target Est</th>
                                <th data-priority="6">Lorem</th>
                                <th data-priority="6">Ipsum</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>GOOG <span class="co-name">Google Inc.</span></th>
                                <td>597.74</td>
                                <td>12:12PM</td>
                                <td>14.81 (2.54%)</td>
                                <td>582.93</td>
                                <td>597.95</td>
                                <td>597.73 x 100</td>
                                <td>597.91 x 300</td>
                                <td>731.10</td>
                                <td colspan="2">Spanning cell</td>
                            </tr>
                            <tr>
                                <th>AAPL <span class="co-name">Apple Inc.</span></th>
                                <td>378.94</td>
                                <td>12:22PM</td>
                                <td>5.74 (1.54%)</td>
                                <td>373.20</td>
                                <td>381.02</td>
                                <td>378.92 x 300</td>
                                <td>378.99 x 100</td>
                                <td>505.94</td>
                                <td colspan="2">Spanning cell</td>
                            </tr>
                            <tr>
                                <th>AMZN <span class="co-name">Amazon.com Inc.</span></th>
                                <td>191.55</td>
                                <td>12:23PM</td>
                                <td>3.16 (1.68%)</td>
                                <td>188.39</td>
                                <td>194.99</td>
                                <td>191.52 x 300</td>
                                <td>191.58 x 100</td>
                                <td>240.32</td>
                                <td colspan="2">Spanning cell</td>
                            </tr>
                            <tr>
                                <th>ORCL <span class="co-name">Oracle Corporation</span></th>
                                <td>31.15</td>
                                <td>12:44PM</td>
                                <td>1.41 (4.72%)</td>
                                <td>29.74</td>
                                <td>30.67</td>
                                <td>31.14 x 6500</td>
                                <td>31.15 x 3200</td>
                                <td>36.11</td>
                                <td colspan="2">Spanning cell</td>
                            </tr>
                            <tr>
                                <th>MSFT <span class="co-name">Microsoft Corporation</span></th>
                                <td>25.50</td>
                                <td>12:27PM</td>
                                <td>0.66 (2.67%)</td>
                                <td>24.84</td>
                                <td>25.37</td>
                                <td>25.50 x 71100</td>
                                <td>25.51 x 17800</td>
                                <td>31.50</td>
                                <td>Non-spanning</td>
                                <td>Non-spanning</td>
                            </tr>
                            <tr>
                                <th>CSCO <span class="co-name">Cisco Systems, Inc.</span></th>
                                <td>18.65</td>
                                <td>12:45PM</td>
                                <td>0.97 (5.49%)</td>
                                <td>17.68</td>
                                <td>18.23</td>
                                <td>18.65 x 10300</td>
                                <td>18.66 x 24000</td>
                                <td>21.12</td>
                                <td>Non-spanning</td>
                                <td>Non-spanning</td>
                            </tr>
                            <tr>
                                <th>YHOO <span class="co-name">Yahoo! Inc.</span></th>
                                <td>15.81</td>
                                <td>12:25PM</td>
                                <td>0.11 (0.67%)</td>
                                <td>15.70</td>
                                <td>15.94</td>
                                <td>15.79 x 6100</td>
                                <td>15.80 x 17000</td>
                                <td>18.16</td>
                                <td>Non-spanning</td>
                                <td>Non-spanning</td>
                            </tr>
                            <!-- Repeat -->
                            <tr>
                                <th>GOOG <span class="co-name">Google Inc.</span></th>
                                <td>597.74</td>
                                <td>12:12PM</td>
                                <td>14.81 (2.54%)</td>
                                <td>582.93</td>
                                <td>597.95</td>
                                <td>597.73 x 100</td>
                                <td>597.91 x 300</td>
                                <td>731.10</td>
                                <td colspan="2">Spanning cell</td>
                            </tr>
                            <tr>
                                <th>AAPL <span class="co-name">Apple Inc.</span></th>
                                <td>378.94</td>
                                <td>12:22PM</td>
                                <td>5.74 (1.54%)</td>
                                <td>373.20</td>
                                <td>381.02</td>
                                <td>378.92 x 300</td>
                                <td>378.99 x 100</td>
                                <td>505.94</td>
                                <td colspan="2">Spanning cell</td>
                            </tr>
                            <tr>
                                <th>AMZN <span class="co-name">Amazon.com Inc.</span></th>
                                <td>191.55</td>
                                <td>12:23PM</td>
                                <td>3.16 (1.68%)</td>
                                <td>188.39</td>
                                <td>194.99</td>
                                <td>191.52 x 300</td>
                                <td>191.58 x 100</td>
                                <td>240.32</td>
                                <td colspan="2">Spanning cell</td>
                            </tr>
                            <tr>
                                <th>ORCL <span class="co-name">Oracle Corporation</span></th>
                                <td>31.15</td>
                                <td>12:44PM</td>
                                <td>1.41 (4.72%)</td>
                                <td>29.74</td>
                                <td>30.67</td>
                                <td>31.14 x 6500</td>
                                <td>31.15 x 3200</td>
                                <td>36.11</td>
                                <td colspan="2">Spanning cell</td>
                            </tr>
                            <tr>
                                <th>MSFT <span class="co-name">Microsoft Corporation</span></th>
                                <td>25.50</td>
                                <td>12:27PM</td>
                                <td>0.66 (2.67%)</td>
                                <td>24.84</td>
                                <td>25.37</td>
                                <td>25.50 x 71100</td>
                                <td>25.51 x 17800</td>
                                <td>31.50</td>
                                <td>Non-spanning</td>
                                <td>Non-spanning</td>
                            </tr>
                            <tr>
                                <th>CSCO <span class="co-name">Cisco Systems, Inc.</span></th>
                                <td>18.65</td>
                                <td>12:45PM</td>
                                <td>0.97 (5.49%)</td>
                                <td>17.68</td>
                                <td>18.23</td>
                                <td>18.65 x 10300</td>
                                <td>18.66 x 24000</td>
                                <td>21.12</td>
                                <td>Non-spanning</td>
                                <td>Non-spanning</td>
                            </tr>
                            <tr>
                                <th>YHOO <span class="co-name">Yahoo! Inc.</span></th>
                                <td>15.81</td>
                                <td>12:25PM</td>
                                <td>0.11 (0.67%)</td>
                                <td>15.70</td>
                                <td>15.94</td>
                                <td>15.79 x 6100</td>
                                <td>15.80 x 17000</td>
                                <td>18.16</td>
                                <td>Non-spanning</td>
                                <td>Non-spanning</td>
                            </tr>
                            <!-- Repeat -->
                            
                        </tbody>
                    </table>
                </div>
                <br>
                <br>
            </div> <!-- end container -->
        </section>



    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript" src="js/rwd-table.js"></script>

</body>
</html>