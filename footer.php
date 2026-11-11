
<footer>
    <div class="container">
        <p>
            &copy; <?php echo date('Y'); ?>
            Four Member Portfolio. All Rights Reserved.
        </p>
    </div>
</footer>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const menuToggle = document.getElementById("menuToggle");
    const navigation = document.getElementById("navigation");

    menuToggle.addEventListener("click", function () {
        navigation.classList.toggle("active");
    });

    const navLinks = navigation.querySelectorAll("a");

    navLinks.forEach(function (link) {
        link.addEventListener("click", function () {
            navigation.classList.remove("active");
        });
    });
});
</script>

<?php wp_footer(); ?>
</body>
</html>
