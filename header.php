<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap5/css/bootstrap.css">
    <link rel="shortcut icon" href="téléchargement (3).png" type="image/png">
    <title><?=$titre?? "Acceuil" ?></title>


    <style>
    *{
        margin:0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Alconica', sans-serif;
    }
    body{
        height: 100%;
        width: 100%;
        background: url("img/2.jpg");
        color: white;
        background-size: cover;
        background-repeat: no-repeat;
    }
    body h1{
            font-size: 70px;
            line-height: 120px;
            color: transparent;
            -webkit-text-stroke: 1px #fff;
            background: url('img/11.png');
            -webkit-background-clip: text;
            background-position: 0 0;
            animation: animate 30s linear 2s infinite alternate;
        }
        @keyframes animate{
            100%{
                background-position: -500px 0;
            }            
        }
      
</style>
<script>
                
                var images=[
                   "url('img/1.jpg')",
                    "url('img/2.jpg')",
                   "url('img/3.jpg')",
                   "url('img/4.png')",
                   "url('img/5.jpg')",
                   "url('img/6.jpg')",
                   "url('img/7.jpg')",
                   "url('img/9.jpg')"
                ];

                setInterval(function (){
                    var bg= images[Math.floor(Math.random()*images.length)]

                    //console.log(bg);
                    var body= document.querySelector("body");
                    body.style.background = bg;
                },10000)
</script>
</head>

    
<body class="prp">
    <div class="ent">
        <div class="container-fluid">
            <header>
                <div class="mt-4 p-5 bg-primary text-white rounded text-center">
                    <h1><img src="téléchargement (3).png" alt="Driver" style="height:40px;width:40px; border-radius:10px;"> Bienvenu sur HintelDriver</h1>
                    <p>Plateforme de sauvegarde des données.</p>
                </div>
            </header>
           