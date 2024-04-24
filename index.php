<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>POFFIZADANIE3</title>
    <link rel="stylesheet" href="main.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/icheck-material@1.0.1/icheck-material.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/icheck-material@1.0.1/icheck-material-custom.min.css" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

</head>

<body>
    <div class="osnova">
        <div class="wrap1 lh-lg font-monospace">

            <?php
            if (!empty($messages)) {
                print ('<div id="messages">');
                foreach ($messages as $message) {
                    print ($message);
                }
                print ('</div>');
            }
            ?>
            <form action="db.php" method="POST" id="form" class="row g-3 needs-validation">
                <h3 id="form" class="text-center">Форма</h3>



                <div class="col-auto">
                    <label for="validationCustom01" class="form-label">Фамилия Имя Отчество:</label>
                    <input type="text" placeholder="ФИО" class="form-control rounded-pill" name="fio" <?php if ($errors['fio']) {
                        print 'class="error"';
                    } ?> value="<?php print $values['fio']; ?>" />
                </div>






                <div class="col-auto">
                    <label for="validationCustomUsername" class="form-label">Телефон:
                    </label>
                    <div class="input-group has-validation">
                        <input type="text" class="form-control rounded-pill" placeholder="Введите ваш номер" name="tel"
                            <?php if ($errors['tel']) {
                                print 'class="error"';
                            } ?>
 value="<?php print $values['tel']; ?>" />

                    </div>
                </div>





                <div class="col-auto">
                    <label for="validationCustomUsername" class="form-label">E-mail:
                    </label>
                    <div class="input-group has-validation">
                        <input type="text" class="form-control rounded-pill" placeholder="Введите ваш E-mail"
                            name="email" <?php if ($errors['email']) {
                                print 'class="error"';
                            } ?>
 value="<?php print $values['email']; ?>" />

                    </div>
                </div>





                <div class="col-auto">
                    <label>
                        Дата рождения:<br />
                        <input class="form-control rounded-pill" placeholder="2004-07-14" type="date" name="date" <?php if ($errors['date']) {
                            print 'class="error"';
                        } ?>
     value="<?php print $values['date']; ?>" />
                    </label>
                </div>





                <div class="col-auto">
                    <p>Выберите ваш пол:<br /></p>
                    <div class="form-check icheck-material-orange">
                        <input class="form-check-input" type="radio" value="Женский" id="someRadioId1"
                            name="someGroupName" <?php if ($errors['someGroupName']) {
                                print 'class="error"';
                            } ?>
 value="<?php print $values['someGroupName']; ?>" />
                        <label class="form-check-label" for="someRadioId1">Женский</label>
                    </div>
                    <div class="form-check icheck-material-orange">
                        <input class="form-check-input" type="radio" value="Мужской" id="someRadioId2"
                            name="someGroupName" <?php if ($errors['someGroupName']) {
                                print 'class="error"';
                            } ?>
 value="<?php print $values['someGroupName']; ?>" />
                        <label class="form-check-label" for="someRadioId2">Мужской</label>
                    </div>
                </div>






                <div class="col-auto">
                    <label for="validationCustom04" class="form-label">Любимый язык программирования</label>
                    <select class="form-select rounded-pill" id="validationCustom04" multiple name="language[]">
                        <option selected="" disabled="" value="">Выберете</option>
                        <option value="1">Pascal</option>
                        <option value=" 2">C</option>
                        <option value=" 3">C++</option>
                        <option value=" 4">JavaScript</option>
                        <option value=" 5">PHP</option>
                        <option value=" 6">Python</option>
                        <option value=" 7"> Java</option>
                        <option value=" 8">Haskel</option>
                        <option value=" 9">Clojure</option>
                        <option value=" 10">Prolog</option>
                        <option value=" 11">Scala</option>
                    </select>
                    <div class=" invalid-feedback">
                    </div>
                </div>




                <div class="col-auto">
                    <label>
                        Биография:<br />
                        <textarea class="form-control rounded-pill" placeholder="Напишите свою биографию"
                            name="bio"></textarea>
                    </label>
                </div>





                <div class="col-auto">
                    С контрактом:
                    <div class="form-check icheck-material-orange">
                        <input class="form-check-input" type="checkbox" value="Ознакомлен" id="invalidCheck"
                            name="checkt" <?php if ($errors['checkt']) {
                                print 'class="error"';
                            } ?>
                     value="<?php print $values['checkt']; ?>" />
                        <label class="form-check-label" for="invalidCheck">
                            Ознакомлен (а)
                        </label>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>





                <div class="col-auto">
                    <button class="custom-btn btn-1">Сохранить</button>
                </div>
            </form>
        </div>
        </br>
        </br>
        </br>
        </br>
        </br>
        </br>
        </br>
        </br>
        </br>

        </br>
        </br>
        </br>
        </br>
        </br>
        <div class="wrap2 lh-lg font-monospace">
            <div class="box">
                <ul class="list-unstyled-sm">
                    <h5 id="links" class="text-center">Пункты выполненых скриншотов задания-3</h5>

                    <li>
                        <a>Подключение к общей базе данных;</a>
                        </br>
                        <img src="1.png"></img>
                    </li>

                    <li>
                        <a>Использование личной базы данных</a>
                        </br>
                        <img src="2.png"></img>
                    </li>
                    <li>
                        <a>Создание таблиц в базе данных;
                        </a>
                        </br>
                        <img src="3.png"></img>

                    <li>
                        <a>Список таблиц в базе данных ;
                        </a>
                        </br>
                        <img src="4.png"></img>
                    </li>
                    <li>
                        <a>Результат заполнения формы и сохранения результатов в таблицы базы данных;</a>
                        </br>
                        <img src="6.png"></img>
                    </li>



                </ul>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>