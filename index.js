
      /*  function showLoginForm() {
          document.getElementById("loginContainer").style.display = "block";
        }

        function hideLoginForm() {
            document.getElementById("loginContainer").style.display = "none";
        }*/
        
    // Initially, hide the login form
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("loginContainer").style.display = "none";
    });

    function showLoginForm() {
        var loginContainer = document.getElementById("loginContainer");
        if (loginContainer.style.display === "block") {
            loginContainer.style.display = "none";
        } else {
            loginContainer.style.display = "block";
        }
    }

    function hideLoginForm() {
        document.getElementById("loginContainer").style.display = "none";
    }
