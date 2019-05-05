<!doctype html>
<html lang="en">

<head>
    <title>coverTemplate</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- jQuery -->
    <script src="Components/jquery/3.3.1/js/jquery.js"></script>
    <script src="Components/jquery/3.3.1/js/jqueryPlus.js"></script>

    <!-- Popper.js -->
    <script src="Components/popper/js/popper.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="Components/bootstrap/4.2/css/bootstrap.css">
    <script src="Components/bootstrap/4.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="Components/css/generalstyles.css">
    <!-- block-selection-->
    <link rel="stylesheet" href="css/util.css">

    <link rel="stylesheet" href="Components/fontAWESOME/css/all.css">

    <!-- minimal Framework (NeedjQueyPlusToWork)-->
    <link rel="stylesheet" href="Components/minimal/css/minimal.css">
    <script type="text/javascript" src="Components/minimal/js/minimal.js"></script>
    <!-- scrollbar -->
    <link rel="stylesheet" href="Components/customScrollbar/css/customScrollbar.css">
    <!-- radio -->
    <link rel="stylesheet" href="Components/radio/css/radio.css">
    <!-- file -->
    <link rel="stylesheet" href="Components/file/css/file.css">
    <!-- waves -->
    <link rel="stylesheet" href="Components/waves/css/waves.css">
    <script src="Components/waves/js/waves.js"></script>
    <!-- customSelect (NeedjQueyPlusToWork)-->
    <link rel="stylesheet" href="Components/customSelect/css/customSelect.css">
    <script src="Components/customSelect/js/customSelect.js"></script>
    <!-- POPUP -->
    <link rel="stylesheet" type="text/css" href="Components/popup/css/popup.css">
    <script src="Components/popup/js/popup.js"></script>


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/cover.css" rel="stylesheet">
</head>

<body class="text-center">
    <!-- Popup loading area -->
    <div id="popup_loader"></div>
    
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
            <div class="inner">
                <h3 class="masthead-brand">Brand</h3>
                <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link active" href="#">Page1</a>
                    <a class="nav-link" href="#">Page2</a>
                    <a class="nav-link" href="#">Page3</a>
                </nav>
            </div>
        </header>

        <main role="main" class="inner cover">
            <!--<h1 class="cover-heading">Cover your page.</h1>
                <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
                <p class="lead">
                <a href="#" class="btn btn-lg btn-secondary">Learn more</a>
            </p>-->
            <p class="lead">
                <h1 class="cover-heading">Ajax load</h1>
            </p>
            <p class="lead">
                <button class="btn btn-lg btn-secondary w200" id="loginModalLoader">
                    Log in
                </button>
            </p>
            <p class="lead">
                <button class="btn btn-lg btn-secondary w200" id="registerModalLoader">
                    Register
                </button>
            </p>
        </main>

        <!-- Modal loading area -->
        <div id="modal_loader"></div>

        <footer class="mastfoot mt-auto ">
            <div class="inner ">
                <p>Cover template example</p>
            </div>
        </footer>
    </div>
    <script>
        $(document).ready(function () {
            $("#loginModalLoader").click(function () {
                $(this).prepend("<span class='spinner-border spinner-border-sm spinner_loader'></span>");
                $(this).attr("disabled", "disabled");//disabling button prevent double press
                $.post("index.php?controller=loginController&action=loadPage",
                    {
                        /*name: "Donald Duck",
                        city: "Duckburg"*/
                    },
                    function (data, status) {
                        $("#modal_loader").html("");
                        $("#modal_loader").html(data);
                        $("#modal").modal('show');
                        $("#loginModalLoader").children(".spinner_loader").remove();
                        $("#loginModalLoader").removeAttr("disabled");
                    });
            });
            $("#registerModalLoader").click(function () {
                $(this).prepend("<span class='spinner-border spinner-border-sm spinner_loader'></span>");
                $(this).attr("disabled", "disabled");//disabling button prevent double press
                $.post("index.php?controller=RegisterController&action=loadPage",
                    {
                        /*name: "Donald Duck",
                        city: "Duckburg"*/
                    },
                    function (data, status) {
                        $("#modal_loader").html("");
                        $("#modal_loader").html(data);
                        $("#modal").modal('show');
                        $("#registerModalLoader").children(".spinner_loader").remove();
                        $("#registerModalLoader").removeAttr("disabled");
                    });
            });
            $.post("index.php?controller=popupController&action=load",{},// da sistemare il sistema di popup
                function (data, status) {
                    $("#popup_loader").html(data);
                });
                
        });
    </script>
</body>

</html>