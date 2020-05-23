<script> 
        $(function(){
          $.ajaxSetup ({
              cache: false
          });
          //var ajax_load = "<img src='../images/giphy3.svg' alt='Loading...' style='position: absolute;top: 0;left: 0;width: 100%;height: 100%;z-index: 9999;'/>";
         // var ajax_load=Notiflix.Loading.Dots();Notiflix.Loading.Remove();
          var ajax_load='<body><div class="ui active dimmer"><div class="ui loader"></div></div></body>';
       
          var loadUrl = "./PreOdForm.php";
          var loadUrl1 = "./OdSubmission.php";
          var loadUrl2 = "./Status.php";
          var loadUrl3 = "./OtherCert.php";
          var loadUrl4 = "./CertRepos.php";
          $("#PreOdForm").click(function(){
            let stateObj = { id: "100" }; 
            window.history.pushState(stateObj,"OD Permission", "./PreOdForm");
              $("body").html(ajax_load).load(loadUrl);
          });
          $("#OdSubmission").click(function(){
            let stateObj = { id: "100" }; 
            window.history.pushState(stateObj,"OD Submission", "./OdSubmission");
            $("body").html(ajax_load).load(loadUrl1);
          });
         
          $("#Status").click(function(){
            let stateObj = { id: "100" }; 
            window.history.pushState(stateObj,"OD Status", "./Status");
              $("body").html(ajax_load).load(loadUrl2);
          });
  
          $("#OtherCert").click(function(){
            let stateObj = { id: "100" }; 
            window.history.pushState(stateObj,"Certificate Registration", "./OtherCert");
              $("body").html(ajax_load).load(loadUrl3);
          });
          $("#CertRepos").click(function(){
            let stateObj = { id: "100" }; 
            window.history.pushState(stateObj,"Certificate Repository", "./CertRepos");
              $("body").html(ajax_load).load(loadUrl4);
          });
        
      });
    </script> 