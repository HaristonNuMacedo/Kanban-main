<!DOCTYPE html>
<html>
<head>
    <title>Carregando...</title>
    <link rel="sorcut icon" href="img/Logo-removebg-preview.png" type="image/png" style="width: 16px; height: 16px; transform: rotate(-1deg);">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    body{
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #0e1538;
    }

    label {
       position: relative; 
    }

    #loader {
        position: absolute;
        top: 45%;
        border: 8px solid #f3f3f3;
        border-radius: 50%;
        border-top: 8px solid #00b2f0;
        width: 60px;
        height: 60px;
        -webkit-animation: spin .8s linear infinite; /* Safari */
        animation: spin .8s linear infinite;
    }

    /* Safari */
    @-webkit-keyframes spin {
    0% { -webkit-transform: rotate(0deg); }
    100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
    }
</style>
</head>
<body onload="myFunction()" style="margin:0;">

<div id="loader"></div>

<script>
    var myVar;
    
    function myFunction() {
      myVar = setTimeout(showPage, 2000);
    }
    
    function showPage() {
      document.getElementById("loader").style.display = "none";
      window.location.href = "login.php";
    }
</script>

</body>
</html>