<div class="container">


    <div>
        <a href="/add/task" class="btn">Добавить задачу</a>

        <?php if (!$data['isAdmin']): ?>
            <a href="/admin/login" class="btn">Авторизация</a>
        <?php elseif ($data['isAdmin']): ?>
            <a href="/admin/logout" class="btn">Выход</a>
        <?php endif; ?>

        <?php if (isset($_SESSION['ADD_TUSK_SUCCESS']) && $_SESSION['ADD_TUSK_SUCCESS'] == true): ?>
            <span class="text-success">Задча добавлена успешно!!!</span>
        <?php endif; ?>
    </div>

    <table id="table" class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Имя</th>
            <th scope="col">email</th>
            <th scope="col">Текст</th>
            <th scope="col">Статус</th>
            <th scope="col">Отр. Администратором</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data['tasks'] as $record): ?>
            <tr>
                <td><?= htmlspecialchars($record['username']) ?></td>
                <td><?= htmlspecialchars($record['email']) ?></td>
                <td><?= htmlspecialchars($record['text']) ?></td>
                <td><?= \App\Models\Task::STATUS[intval($record['status'])] ?></td>
                <td><?= $record['edit_admin'] == 0 ? 'Нет' : 'Да' ?></td>
                <td>
                    <?php if ($data['isAdmin']): ?>
                        <a href="/task/edit/<?= $record['id'] ?>">Редактировать</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>
<script>
    $(document).ready(function () {
        $('#table').dataTable({
            "bFilter": true,
            "bPaginate": true,
            "bLengthChange": false,
            "info": false,  //Turn off table information
            "searching": false, //Turn off table information
            "pageLength": 3
        });
    });
</script>