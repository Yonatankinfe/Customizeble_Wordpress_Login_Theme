<?php


get_header(); ?>

<div class="login-container" style="background-image: url('<?php echo esc_url(get_theme_mod('background_image', 'default-image.jpg')); ?>');">
<style>
	body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-size: cover;
}

.login-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-card {
    background: rgba(255, 255, 255, 0.8);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.login-card h2 {
    text-align: center;
    margin-bottom: 20px;
}

.login-card input[type="text"],
.login-card input[type="password"],
.login-card button {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.login-card button {
    background-color: <?php echo get_theme_mod('button_color','#0056b3');?>;
    color: #fff;
    cursor: pointer;
}

.login-card button:hover {
    background-color: #0056b3;
}

	</style>
    <div class="login-card">
    <h2><?php echo get_theme_mod('login_heading_text', 'Login'); ?></h2>

        <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
            <input type="hidden" name="action" value="custom_login">
            <input type="text" name="username" placeholder="Enter Username or Email">
            <input type="password" name="password" placeholder="Password">
            <button type="submit">Login</button>
        </form>
    </div>
</div>

<?php get_footer(); ?>
