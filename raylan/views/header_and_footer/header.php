<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/template/font-awesome/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="/template/css/bootstrap-4.4.1-dist/css/bootstrap.min.css" type="text/css">



    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link href="/template/css/fonts/ionicons.css" rel="stylesheet">
    <link rel="stylesheet" href="/template/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/template/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="/template/css/style.css">
    <link rel="stylesheet" href="/template/css/main.css"/>

    <title>СНТ"Дружба"</title>

</head>
<body>
<header class="header-section">
    <?if(User::isAdmin()){?>
        <div class="container-fluid menu_admin">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-sm max-w-400x mlr-auto">
                        <h6><a href="/admin/ch" class="plr-20 btn-b-sm btn-fill-primary dplay-block" type="submit"><b>Выставление счетов</b></a></h6>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-sm max-w-400x mlr-auto">
                        <h6><a href="/admin/new" class="plr-20 btn-b-sm btn-fill-primary dplay-block" type="submit"><b>Добавить новость</b></a></h6>
                    </div>
                </div>
            </div>
        </div>
    <?}?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
            <div class="site-logo">
            <img class="logo" src="/template/img/logo.png">
            <a href="/" class="p-2">
                <h3 class="text-center">СНТ "Дружба"</h3>
            </a>
        </div>
        <ul class="main-menu d-none d-lg-block">
            <li class="<?if ($act==1){?>active<?}?>"><a href="/">Главная</a></li>
            <li class="<?if ($act==2){?>active<?}?>"><a href="/about">О нашем снт</a></li>
            <li class="<?if ($act==3){?>active<?}?>"><a href="/news">Новости</a></li>
            <li class="<?if ($act==5){?>active<?}?>"><a href="/contacts">Контакты</a></li>
        </ul>
            </div>
            <div class="col-sm-2 main-menu d-none d-lg-block">
                <div class="float-right">
                    <?php if (User::isGuest()):?>
                        <a class="<?if ($act==6){?>active_us<?}?>" href="/user/register">Регистрация</a>
                        <a class="<?if ($act==7){?>active_us<?}?>" href="/user/login">Вход</a>
                    <?php else:?>
                        <a class="<?if ($act==8){?>active_us<?}?>" href="/user"><?echo $_SESSION['userLogin'];?></a>/<a href="/user/logout/">Выйти</a>
                    <?php endif;?>

                </div>
            </div>
        </div>
    </div>

</header>
