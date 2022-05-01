<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: "Roboto", sans-serif;
        }
        .btn {
            display: inline-block;
            font-weight: 700;
            color: #212529;
            text-align: center;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-color: transparent;
            border: 2px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 0.875rem;
            line-height: 1.5;
            border-radius: 3px;
            -webkit-transition: background-color 0.3s ease-in-out, border-color 0.3s ease-in-out, -webkit-box-shadow 0.3s cubic-bezier(0.35, 0, 0.25, 1), -webkit-transform 0.2s cubic-bezier(0.35, 0, 0.25, 1);
            transition: background-color 0.3s ease-in-out, border-color 0.3s ease-in-out, -webkit-box-shadow 0.3s cubic-bezier(0.35, 0, 0.25, 1), -webkit-transform 0.2s cubic-bezier(0.35, 0, 0.25, 1);
            -o-transition: box-shadow 0.3s cubic-bezier(0.35, 0, 0.25, 1), transform 0.2s cubic-bezier(0.35, 0, 0.25, 1), background-color 0.3s ease-in-out, border-color 0.3s ease-in-out;
            transition: box-shadow 0.3s cubic-bezier(0.35, 0, 0.25, 1), transform 0.2s cubic-bezier(0.35, 0, 0.25, 1), background-color 0.3s ease-in-out, border-color 0.3s ease-in-out;
            transition: box-shadow 0.3s cubic-bezier(0.35, 0, 0.25, 1), transform 0.2s cubic-bezier(0.35, 0, 0.25, 1), background-color 0.3s ease-in-out, border-color 0.3s ease-in-out, -webkit-box-shadow 0.3s cubic-bezier(0.35, 0, 0.25, 1), -webkit-transform 0.2s cubic-bezier(0.35, 0, 0.25, 1);
        }
        .btn {
            color: #FFF;
            text-decoration: none;
            background-color: rgba(241, 196, 15);
            border-color:  rgba(220, 196, 15);
            cursor: pointer;
        }
        .btn:hover{
            color: #FFF;
            background-color: rgba(310, 200, 20);
            border-color:  rgba(220, 196, 15);
        }
        img{
            width: 800px;
            height: 600px;
        }
    </style>
</head>

<body>
    <center>
    <div class="MainContainer">
        <div class="container">
            <div class="row">
                <div class="col">
                    <img src="<?=media();?>images/uploads/404error.png" alt="">
                </div>
            <div class="row">
                <div class="col">
                    <a class="btn" href="javascript: history.go(-1)">Regresar</a>
                </div>
            </div>
            </div>
        </div>
    </div>
    </center>
</body>

</html>