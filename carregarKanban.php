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
        background-color: #fff;
    }

    label {
       position: relative; 
    }

    p {
        position: absolute;
        top: 36%;
        font-size: 20px;
        font-weight: 600;
        color: rgba(16, 36, 138, 0.7);
    }

    #loader {
        position: absolute;
        top: 45%;
        border: 8px solid #ddd;
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
<p>Carregando...</p>
<div id="loader"></div>

<script>
    var myVar;
    
    function myFunction() {
      myVar = setTimeout(showPage, 500);
    }
    
    function showPage() {
      document.getElementById("loader").style.display = "none";
      window.location.href = "painel.php#";
    }
</script>

</body>
</html>