<?PHP

$user = 'u67307';
$pass = '2532509';
$db = new PDO(
    'mysql:host=localhost;dbname=u67307',
    $user,
    $pass,
    [PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);

try {
    function isValidRussianFullName($login)
    {
        return preg_match('/^[\p{Cyrillic}\s]+$/u', $login);
    }

    function isValidPhone($tel)
    {
        return preg_match('/^\+7\d{10}$/', $tel);
    }

    function isValidEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    // function isAdult($date)
    // {
    //     $dob = DateTime::createFromFormat('d-m-Y', $date);
    //     $today = new DateTime();
    //     $age = $today->diff($dob)->y;

    //     return $age >= 18;
    // }

    header('Content-Type: text/html; charset=UTF-8');
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $messages = array();
        if (!empty($_COOKIE['save'])) {
            setcookie('save', '', 100000);
            $messages[] = 'Спасибо, результаты сохранены.';
        }
        $errors = array();
        $errors['fio'] = !empty($_COOKIE['fio_error']);
        $errors['tel'] = !empty($_COOKIE['tel_error']);
        $errors['email'] = !empty($_COOKIE['email_error']);
        $errors['date'] = !empty($_COOKIE['date_error']);
        $errors['someGroupName'] = !empty($_COOKIE['someGroupName_error']);
        $errors['bio'] = !empty($_COOKIE['bio_error']);
        $errors['checkt'] = !empty($_COOKIE['checkt_error']);
        if ($errors['fio']) {
            setcookie('fio_error', '', 100000);
            setcookie('fio_value', '', 100000);
            $messages[] = '<div class="error">Заполните имя(Использовать только русские буквы).</div>';
        }
        if ($errors['tel']) {
            setcookie('tel_error', '', 100000);
            setcookie('tel_value', '', 100000);
            $messages[] = '<div class="error">Введите номер телефона(Начиная с +7).</div>';
        }
        if ($errors['email']) {
            setcookie('email_error', '', 100000);
            setcookie('email_value', '', 100000);
            $messages[] = '<div class="error">Введите почту.</div>';
        }
        if ($errors['date']) {
            setcookie('date_error', '', 100000);
            setcookie('date_value', '', 100000);
            $messages[] = '<div class="error">Выберите дату(Вам нет 18 лет).</div>';
        }
        if ($errors['someGroupName']) {
            setcookie('someGroupName_error', '', 100000);
            setcookie('someGroupName_value', '', 100000);
            $messages[] = '<div class="error">Выберите пол.</div>';
        }
        if ($errors['bio']) {
            setcookie('bio_error', '', 100000);
            setcookie('bio_value', '', 100000);
            $messages[] = '<div class="error">Напишите о себе.</div>';
        }
        if ($errors['checkt']) {
            setcookie('checkt_error', '', 100000);
            setcookie('checkt_value', '', 100000);
            $messages[] = '<div class="error">Вы не ознакомились с правилами.</div>';
        }
        $values = array();
        $values['fio'] = empty($_COOKIE['fio_value']) ? '' : $_COOKIE['fio_value'];
        $values['tel'] = empty($_COOKIE['tel_value']) ? '' : $_COOKIE['tel_value'];
        $values['email'] = empty($_COOKIE['email_value']) ? '' : $_COOKIE['email_value'];
        $values['date'] = empty($_COOKIE['date_value']) ? '' : $_COOKIE['date_value'];
        $values['someGroupName'] = empty($_COOKIE['someGroupName_value']) ? '' : $_COOKIE['someGroupName_value'];
        $values['bio'] = empty($_COOKIE['bio_value']) ? '' : $_COOKIE['bio_value'];
        $values['checkt'] = empty($_COOKIE['checkt_value']) ? '' : $_COOKIE['checkt_value'];
        include ('index.php');
    } else {
        $errors = FALSE;

        if (empty($_POST['fio']) || !isValidRussianFullName($_POST['fio'])) {
            setcookie('fio_error', '1', time() + 24 * 60 * 60);
            $errors = TRUE;
        }
        setcookie('fio_value', $_POST['fio'], time() + 12 * 30 * 24 * 60 * 60);

        if (empty($_POST['tel']) || !isValidPhone($_POST['tel'])) {
            setcookie('tel_error', '1', time() + 24 * 60 * 60);
            $errors = TRUE;
        }
        setcookie('tel_value', $_POST['tel'], time() + 12 * 30 * 24 * 60 * 60);

        if (empty($_POST['email']) || !isValidEmail($_POST['email'])) {
            setcookie('email_error', '1', time() + 24 * 60 * 60);
            $errors = TRUE;
        }
        setcookie('email_value', $_POST['email'], time() + 12 * 30 * 24 * 60 * 60);

        if (empty($_POST['date'])) {
            setcookie('date_error', '1', time() + 24 * 60 * 60);
            $errors = TRUE;
        }
        setcookie('date_value', $_POST['date'], time() + 12 * 30 * 24 * 60 * 60);
        if (empty($_POST['someGroupName'])) {
            setcookie('someGroupName_error', '1', time() + 24 * 60 * 60);
            $errors = TRUE;
        }
        setcookie('someGroupName_value', $_POST['someGroupName'], time() + 12 * 30 * 24 * 60 * 60);
        if (empty($_POST['bio'])) {
            setcookie('bio_error', '1', time() + 24 * 60 * 60);
            $errors = TRUE;
        }
        setcookie('bio_value', $_POST['bio'], time() + 12 * 30 * 24 * 60 * 60);
        if (empty($_POST['checkt'])) {
            setcookie('checkt_error', '1', time() + 24 * 60 * 60);
            $errors = TRUE;
        }
        setcookie('checkt_value', $_POST['checkt'], time() + 12 * 30 * 24 * 60 * 60);
        if ($errors) {
            header('Location: db.php');
            exit();
        } else {
            setcookie('fio_error', '', 100000);
            setcookie('tel_error', '', 100000);
            setcookie('email_error', '', 100000);
            setcookie('date_error', '', 100000);
            setcookie('someGroupName_error', '', 100000);
            setcookie('bio_error', '', 100000);
            setcookie('checkt_error', '', 100000);
        }

        $stmt = $db->prepare("INSERT INTO users (full_name, phone,email,birth_date,gender,bio,contract_agreed) VALUES (:full_name, :phone,:email,:birth_date,:gender,:bio,:contract_agreed)");
        $login = $_POST['fio'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $date = $_POST['date'];
        $someGroupName = $_POST['someGroupName'];
        $bio = $_POST['bio'];
        $checkt = $_POST['checkt'];
        $stmt->bindParam(':full_name', $login);
        $stmt->bindParam(':phone', $tel);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':birth_date', $date);
        $stmt->bindParam(':gender', $someGroupName);
        $stmt->bindParam(':bio', $bio);
        $stmt->bindParam(':contract_agreed', $checkt);
        $stmt->execute();
        $user_id = $db->lastInsertId();
        $Languages = $_POST['language'];
        foreach ($Languages as $language_name) {
            $stmt = $db->prepare("INSERT INTO user_languages (user_id, language_name) VALUES (:user_id,:language_name)");
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':language_name', $language_name);
            $stmt->execute();
        }
        setcookie('save', '1');
        header('Location: db.php');
    }





    // $login = $_POST['login'];
    // $tel = $_POST['tel'];
    // $email = $_POST['email'];
    // $date = $_POST['date'];
    // $date = date_diff(date_create($date), date_create('today'))->y;
    // if (!preg_match('/^[А-ЯЁёа-я\s]+$/u', $login)) {
    //     echo " <p style='color: red;'>Ошибка: поле login должно содержать только русские буквы</p>";
    //     $login = '';
    // } elseif (substr($tel, 0, 2) !== '+7') {
    //     echo " <p style='color: red;'>Ошибка: номер телефона должен начинаться с +7</p>";
    //     $tel = '';
    // } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //     echo "<p style='color: red;'>Ошибка: неправильный формат email</p>";
    //     $email = '';
    // } elseif ($date < 18) {
    //     echo "<p style='color: red;'>Ошибка: пользователь должен быть совершеннолетним</p>";
    // } else {







    //     $stmt = $db->prepare("INSERT INTO users (full_name, phone,email,birth_date,gender,bio,contract_agreed) VALUES (:full_name, :phone,:email,:birth_date,:gender,:bio,:contract_agreed)");
    // $login = $_POST['fio'];
    // $email = $_POST['email'];
    // $tel = $_POST['tel'];
    // $date = $_POST['date'];
    // $someGroupName = $_POST['someGroupName'];
    // $bio = $_POST['bio'];
    // $checkt = $_POST['checkt'];
    // $stmt->bindParam(':full_name', $login);
    // $stmt->bindParam(':phone', $tel);
    // $stmt->bindParam(':email', $email);
    // $stmt->bindParam(':birth_date', $date);
    // $stmt->bindParam(':gender', $someGroupName);
    // $stmt->bindParam(':bio', $bio);
    // $stmt->bindParam(':contract_agreed', $checkt);
    // $stmt->execute();
    // $user_id = $db->lastInsertId();
    // $Languages = $_POST['language'];

    //     foreach ($Languages as $language_name) {
    //     $stmt = $db->prepare("INSERT INTO user_languages (user_id, language_name) VALUES (:user_id,:language_name)");
    //     $stmt->bindParam(':user_id', $user_id);
    //     $stmt->bindParam(':language_name', $language_name);
    //     $stmt->execute();
    // }
//     echo "<h5 style='color: green;'>Форма успешно сохранена</h5>";
} catch (PDOException $e) {
    print ('Error : ' . $e->getMessage());
    exit();
}


?>