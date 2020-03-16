<div class="container">

    <div class="col-md-12 text-danger text-center">
        <?=$_SESSION['ERRORS']?>
    </div>

    <form action="/admin/login" method="post">

        <div class="form-group">
            <label for="login">Логин</label>
            <input type="text" name="login" class="form-control" id="login" placeholder="Логин">
        </div>

        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Пароль">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>