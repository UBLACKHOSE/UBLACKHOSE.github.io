<?php
require_once(ROOT . '/views/header_and_footer/header.php');
?>
    <section class="ptb-30">
        <div class="container">
            <div class="row">

                <div class="order-1 order-lg-0 col-md-12 col-lg-8">



                    <div class="ptb-0">
                        <h2 class="mtb-20"><b>Оплаченные счета</b></h2>
                    </div>
                    <?if(isset($errors2)){
                        echo $errors2;
                    }?>
                    <?if(isset($errors)){
                        echo $errors;
                    }else{?>
                    <? foreach ($InvoicesList as $item) { ?>
                        <div>
                            <div class="row">
                                <div class="col-sm-7">
                                    <h4>Счет №<?= $item['number'] ?></h4>
                                    <p><b>Тип </b>: <?= $item['type'] ?></p>
                                </div>
                                <div class="col-lg-5">
                                    <h3 class="float-right ml-4"><?= $item['price'] ?>р</h3>
                                </div>
                            </div>
                            <div class="p-30 mb-30 card-view">
                                <h4 class="p-title"><b>Иформация</b></h4>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p><b>Дата выставления счета:</b> <?= $item['date_start'] ?></p>
                                        <p><b>Категория:</b> <?= $item['category'] ?></p>
                                        <p><b>База расчета:</b> <?= $item['base'] ?></p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p><b>Дата просрачивания счета:</b><?= $item['date_stop'] ?></p>
                                        <p><b>Основания:</b> <?= $item['reason'] ?></p>
                                        <p><b>Наиминование услуги:</b> <?= $item['name'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-20 brdr-grey-1 opacty-6"></div>
                        </div>
                    <? }} ?>
                </div><!-- col-sm-8 -->

                <div class="order-0  order-lg-1 col-md-12 col-lg-4">
                    <div class="mt-30 p-30 plr-40 card-view text-center">
                        <h4><b><?= $_SESSION['userLogin'] ?></b></h4>
                        <img class="mtb-20 max-w-100x mlr-auto" src="/template/img/img_user/<?= $_SESSION['userImg'] ?>"
                             alt="">

                        <div class="form-sm max-w-400x mlr-auto">
                            <h6><a href="/user/edit" class="mt-15 plr-20 btn-b-sm btn-fill-primary dplay-block" type="submit"><b>Изменить
                                        профиль</b></a></h6>
                        </div>
                        <div class="form-sm max-w-400x mlr-auto">
                            <h6><a href="/user/history" class="mt-15 plr-20 btn-b-sm btn-fill-primary dplay-block" type="submit"><b>История платежей</b></a></h6>
                        </div>
                        <div class="ptb-0">
                            <h4 class="mtb-20"><b>Ваш адрес:</b><?if($street != null){?> <?=$street['street'] ?> улица, <?=$street['house'] ?> дом<?}else{echo '                    
                        <div class="form-sm max-w-400x mlr-auto">
                        <h6><a href="/user/edit" class="mt-15 plr-20 btn-b-sm btn-fill-primary dplay-block" type="submit"><b>Указать</b></a></h6>
                    </div>';}?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php require_once(ROOT . '/views/header_and_footer/footer.php');