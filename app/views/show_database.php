<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['page_title'] . " | " . WEBSITE_TITLE ?></title>

    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>

</head>
<body>

<!-- Sort by date or email -->
<h3>Sort by:
    <span>
        <form method="post">
            <select name="parameters">
                <option value="email">Email</option>
                <option value="date">Date</option>
            </select>
            <button type="submit">Sort</button>
        </form>
    </span>
</h3>

<!-- Find email -->
<h3>Find email:
    <span>
        <form method="post">
            <input type="text" name="get_email" placeholder="Email" value="<?php $email ?>">
            <button type="submit">Search</button>
        </form>
    </span>
</h3>

<form method="post">
    <table>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Date</th>
            <th>
                <button type="submit" name="delete">Delete</button>
            </th>
        </tr>

        <!-- Print database data in table -->
        <?php foreach ($data['applicants'] as $row): ?>
            <tr>
                <td><?= $row->id ?></td>
                <td><?= $row->email ?></td>
                <td><?= $row->date ?></td>
                <!-- Checkboxes for deleting data from database -->
                <td><input name="delete_items[]" value="<?= $row->id ?>" type="checkbox"></td>
            </tr>
        <?php endforeach; ?>

    </table>
</form>

<!-- Email provider buttons for selecting emails with specific email provider -->
<form method="post">
    <?php foreach ($data['email_providers'] as $row): ?>
        <input type="submit" name="sort_emails" value="<?= $row ?>">
    <?php endforeach; ?>
</form>

</body>
</html>
