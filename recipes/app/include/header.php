    <header class="container">
        <img src="./assets/img/logo1.png" alt="">
        <nav>
            <ul>
                <li><a href="index.php">Головна</a></li>
                <li><a href="recipes.php">Рецепти</a></li>
                <li><a href="categories.php">Категорії</a></li>
                <li><a href="aboutus.php">Про нас</a></li>
                <li><a href="#footer">Зворотній зв'язок</a></li>
            </ul>
        </nav>
        <ul class="menu">
            <li>
                <?php if (isset($_SESSION['id'])): ?>
                    <a href="#"><?php echo $_SESSION['login']; ?></a>
                <?php else: ?>
                    <a href="">Меню</a>
                <?php endif; ?>
                <ul>
                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 2): ?>
                        <li><a href="myrecipes.php">Мої рецепти</a></li>
                        <li><a href="adminmenu.php">Адмін меню</a></li>
                    <?php elseif (isset($_SESSION['role']) && $_SESSION['role'] == 1): ?>
                        <li><a href="myrecipes.php">Мої рецепти</a></li>
                    <?php elseif (isset($_SESSION['role']) && $_SESSION['role'] == 0): ?>
                        <li><a href="request.php">Подати заявку</a></li>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['id'])): ?>
                        <li><a href="liked.php">Збережені</a></li>
                        <li><a href="logout.php">Вихід</a></li>
                    <?php else: ?>
                        <li><a href="login.php">Вхід</a></li>
                        <li><a href="registration.php">Реєстрація</a></li>
                    <?php endif; ?>
                </ul>
            </li>
        </ul>
    </header>