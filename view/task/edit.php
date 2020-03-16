<div class="container">
    <h3>#<?=$data['id']?></h3>
    <form action="/task/update" method="post">

        <input type="hidden" name="id" value="<?=$data['id']?>">

        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" class="form-control" name="username" id="name" value="<?=$data['username']?>" placeholder="Имя">
            <?php if (isset($_SESSION['ERRORS']['errors']['username']) && $_SESSION['ERRORS']['errors']['username'] == false): ?>
                <small class="form-text text-danger">Заполните поле!</small>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="email">email</label>
            <input type="text" name="email" value="<?=$data['email']?>" class="form-control" id="email" placeholder="email">
            <?php if (isset($_SESSION['ERRORS']['errors']['email']) && $_SESSION['ERRORS']['errors']['email'] == false): ?>
                <small class="form-text text-danger">Заполните поле!</small>
            <?php elseif (isset($_SESSION['ERRORS']['errors']['email']) &&  $_SESSION['ERRORS']['errors']['email'] == 'email'): ?>
                <small class="form-text text-danger">Некорректно ввели email!</small>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="text">Текст</label>
            <input type="hidden" name="old_text" value="<?=$data['text']?>">
            <input type="text" name="text" class="form-control" value="<?=$data['text']?>" id="text" placeholder="Текст">
            <?php if (isset($_SESSION['ERRORS']['errors']['text']) && $_SESSION['ERRORS']['errors']['text'] == false): ?>
                <small class="form-text text-danger">Заполните поле!</small>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Статус</label>
            <select class="form-control" name="status">
                <option value="0" <?=$data['status'] == 0 ? 'selected="selected"' : ''; ?> >Не выполнено</option>
                <option value="1" <?= $data['status'] == 1 ? 'selected="selected"' : ''; ?> >Выполнено</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>