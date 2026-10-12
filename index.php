<?php declare(strict_types=1);

require_once __DIR__ . '/inc/bootstrap.php';

$stmt = $pdo->query('SELECT `id`, `name`, `location`, `age`, `tech_stack` FROM `employees` ORDER BY `location` ASC');
$results = $stmt->fetchAll();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h1>Employee list</h1>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Full name</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Location</th>
            <th>Age</th>
            <th>Tech Stack</th>
            <th>Tech Stack list</th>
        </tr>
    </thead>

    <tbody>
        
    
        <?php foreach($results as $index => $result): ?>

            <?php
            
                $name_explode = explode(' ', $result['name']);
                $tech_stack_explode = explode(', ', $result['tech_stack']);
            
            ?>

            <tr>
                <td><?= $index + 1 ?>.</td>
                <td><?= e($result['name']) ?></td>
                <td><?= e(end($name_explode)) ?></td>
                <td><?= e($name_explode[0]) ?></td>
                <td><?= e($result['location']) ?></td>
                <td><?= e($result['age']) ?></td>
                <td><?= e($result['tech_stack']) ?></td>
                <td>
                    <!-- <ol> -->
                        <?php foreach($tech_stack_explode as $count => $list): ?>
                            
                            <span><?= e($count + 1) . ') ' . $list . '<br>' ?></span>
                        
                        <?php endforeach; ?>
                    <!-- </ol> -->
                </td>
            </tr>
            
        <?php endforeach; ?>

    </tbody>
</table>

</body>
</html>