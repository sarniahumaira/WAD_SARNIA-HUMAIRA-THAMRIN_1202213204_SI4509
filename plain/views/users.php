Users - <a href="/">Home</a><br/><br/>
<h1>Welcome</h1>
<?php foreach($users as $user): ?>
    <p>User ID: <?php echo $user->getId(); ?>, Name: <?php echo $user->getUsername(); ?></p>
    <?php if ($user->getPhoto() == "data:photo/jpeg;base64,") { ?>
        <p>No photo</p>
        <br>
    <?php } else { ?>
        <p>Photo:</p>
        <img src=<?php echo $user->getPhoto(); ?> alt="User Photo" width="300">    
    <?php } ?>
<?php endforeach; ?>