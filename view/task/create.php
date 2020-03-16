<div class="container">
    <form action="/store/task" method="post">

        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" class="form-control" name="username" id="name" value="<?=@$_SESSION['ERRORS_DATA']['username']?>" placeholder="Имя">
            <?php if (isset($_SESSION['ERRORS']['errors']['username']) && $_SESSION['ERRORS']['errors']['username'] == false): ?>
            <small class="form-text text-danger">Заполните поле!</small>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="email">email</label>
            <input type="text" name="email" value="<?=@$_SESSION['ERRORS_DATA']['email']?>" class="form-control" id="email" placeholder="email">
            <?php if (isset($_SESSION['ERRORS']['errors']['email']) && $_SESSION['ERRORS']['errors']['email'] == false): ?>
                <small class="form-text text-danger">Заполните поле!</small>
            <?php elseif (isset($_SESSION['ERRORS']['errors']['email']) &&  $_SESSION['ERRORS']['errors']['email'] == 'email'): ?>
                <small class="form-text text-danger">Некорректно ввели email!</small>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="text">Текст</label>
            <input type="text" name="text" class="form-control" value="<?=@$_SESSION['ERRORS_DATA']['text']?>" id="text" placeholder="Текст">
            <?php if (isset($_SESSION['ERRORS']['errors']['text']) && $_SESSION['ERRORS']['errors']['text'] == false): ?>
                <small class="form-text text-danger">Заполните поле!</small>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>