<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2, user-scalable=no" />
    <link rel="icon" type="image/png" href="../KEC.png">

    <link rel="stylesheet" href="../assets/Semantic/dist/semantic.min.css" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <?php include_once('../assets/notiflix.php'); ?>
    <style type="text/css">
    body {
        -webkit-font-smoothing: antialiased;
        -moz-font-smoothing: grayscale;
        font-family: 'Open Sans', sans-serif;
    }

    .ui.center.aligned.container {
        margin-top: 4em;
    }


    p.lead {
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-size: 1.3em;
        color: #333333;
        line-height: 1.4;
        font-weight: 300;
    }

    .ui.huge.header {
        font-size: 36px;
    }

    .ui.inverted.menu {
        border-radius: 0;
        flex-wrap: wrap;
        border: none;
        padding-left: 0;
        padding-right: 0;
    }

    .ui.mobile.only.grid .ui.menu .ui.vertical.menu {
        display: none;
    }

    .ui.inverted.menu .item {
        color: rgb(157, 157, 157);
        font-size: 16px;
    }

    .ui.inverted.menu .active.item {
        background-color: #080808;
    }

    .dimmed.dimmable>.ui.animating.dimmer,
    .dimmed.dimmable>.ui.visible.dimmer,
    .ui.active.dimmer {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .ui.modal,
    .ui.active.modal {
        position: fixed;
        margin: auto auto !important;
        top: 23%;
        left: 18%;
        right: 18%;
        transform-origin: center !important;
        transition: all ease .5s;
    }

    .modal {
        height: auto;
        top: auto;
        left: auto;
        bottom: auto;
        right: auto;

    }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../assets/Semantic/dist/semantic.min.js"></script>
    <script>
    $(function() {
        $.ajaxSetup({
            cache: false
        });
        //var ajax_load = "<img src='../images/giphy3.svg' alt='Loading...' style='position: absolute;top: 0;left: 0;width: 100%;height: 100%;z-index: 9999;'/>";
        // var ajax_load=Notiflix.Loading.Dots();Notiflix.Loading.Remove();
        var ajax_load = '<body><div class="ui active dimmer"><div class="ui loader"></div></div></body>';
        var loadUrl = "./index.php";
        var loadUrl1 = "./studentedit.php";
        var loadUrl2 = "./dropbatch.php";
        var loadUrl3 = "./ClassInfo.php";
        var loadUrl4 = "../Logout.php";
        $("#index").click(function() {
            $("body").html(ajax_load).load(loadUrl);
        });
        $("#studentedit").click(function() {
            $("body").html(ajax_load).load(loadUrl1);
        });
        var loadUrl2 = "./dropbatch.php";
        $("#dropbatch").click(function() {
            $("body").html(ajax_load).load(loadUrl2);
        });
        var loadUrl3 = "./ClassInfo.php";
        $("#classinfo").click(function() {
            $("body").html(ajax_load).load(loadUrl3);
        });
        var loadUrl4 = "../Logout.php";
        $("#logout").click(function() {
            $("body").html(ajax_load).load(loadUrl4);
        });
    });
    </script>

</head>

<body id="root">
    <div class="ui tablet computer only padded grid">
        <div class="ui borderless fluid huge inverted menu">
            <a class="active teal item" href="#root">KEC Student+</a>
            <a class="item" id="index" href="index.php">Home</a>
            <a class="item" id="studentedit">Edit Student</a>
            <a class="item" id="dropbatch">Drop Batch</a>
            <a class="item" id="classinfo">Class Info</a>
            <a class="right item" id="logout" href="../Logout.php"><i class="share square outline icon"></i>Logout</a>
        </div>
    </div>
    <div class="ui mobile only padded grid">
        <div class="ui borderless fluid huge inverted menu">
            <a class="header item" href="#root">KEC Student+</a>
            <div class="right menu">
                <div class="item">
                    <button class="ui icon toggle basic inverted button">
                        <i class="content icon"></i>
                    </button>
                </div>
            </div>
            <div class="ui vertical borderless fluid inverted menu">
                <a class="item" id="index">Home</a>
                <a class="item" id="studentedit">Edit Student</a>
                <a class="item" id="dropbatch">Drop Batch</a>
                <a class="item" id="classinfo.php">Class Info</a>
                <a class="right item" id="logout"><i class="share square outline icon"></i>Logout</a>
            </div>
        </div>
    </div>


    <script>
    $(document).ready(function() {
        $(".ui.toggle.button").click(function() {
            $(".mobile.only.grid .ui.vertical.menu").toggle(100);
        });
    });
    </script>


    <!--Modal Box Open-->
</body>

</html>