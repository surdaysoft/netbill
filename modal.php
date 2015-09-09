<html>
    <head>
        <title>CariKode.Com</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <a class="navbar-brand" style="font-size: 20pt;color: #e74c3c;" href="index.html">
                    CariKode.Com
                </a>
                <button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
                    <span class = "icon-bar"></span>
                    <span class = "icon-bar"></span>
                    <span class = "icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse navHeaderCollapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a class="glyphicon glyphicon-home" href="index.html"></a></li>
                        <li><a href="blog.html">Blog</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tutorial <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">PHP</a></li>
                                <li><a href="#">CSS</a></li>
                                <li><a href="#">JAVA</a></li>
                                <li><a href="#">CODEIGNTER</a></li>
                                <li><a href="#">JAVASCRIPT</a></li>
                            </ul>
                        </li>
                        <li><a href="about-us.html">Tentang Kami</a></li>
                        <li><a href="#contact" data-toggle="modal">Kontak</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <footer>
            <nav class="navbar navbar-default navbar-fixed-bottom" style="margin-bottom: 0;">
                <div class="container-fluid">
                    <p class="navbar-text pull-left">&#169; Copyright by Ryzal Fahmy, Powered by <a href="http://www.carikodecom">CariKode.Com</a></p>
                    <div class="navbar-text pull-right">
                        <a href="#"><i class="fa fa-facebook-square fa-2x"></i></a>
                        <a href="#"><i class="fa fa-twitter-square fa-2x"></i></a>
                        <a href="#"><i class="fa fa-google-plus-square fa-2x"></i></a>
                    </div>
                </div>
            </nav>
        </footer>

        <div class="modal fade" id="contact" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form class="form-horizontal">
                        <div class="modal-header">
                            <h4>Form Kontak</h4>
                        </div>

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="contact-name" class="col-lg-2 control-label">Nama :</label>
                                <div class="col-lg-10">
                                    <input type = "text" class = "form-control" id = "contact-name" placeholder = "Full Name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="contact-email" class="col-lg-2 control-label">Email :</label>
                                <div class="col-lg-10">
                                    <input type = "text" class = "form-control" id = "contact-email" placeholder = "Email">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="contact-msg" class="col-lg-2 control-label">Pesan :</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" rows="8"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <h5 class="pull-left">Developed by : <a href="http://www.carikode.com">CariKode.Com</a></h5>
                            <a class="btn btn-danger" data-dismiss="modal">Close</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src = "js/bootstrap.js"></script>
    </body>
</html>