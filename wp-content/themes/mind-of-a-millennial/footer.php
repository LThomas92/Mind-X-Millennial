<footer class="footer-container">
    <div class="footer-margins">
    <img src="<?php echo get_template_directory_uri(); ?>/img/Millennial_Logo.png" alt="Mind of A Millennial" class="logo footer-logo"/>
    <div class="footer-share-icons">
      <a target="_blank" href="https://twitter.com/mofmillennial"><img src="<?php echo get_template_directory_uri(); ?>/img/twitter.svg" alt="Twitter Icon" class="footer-share-icons__item"></a>
      <a target="_blank" href="https://www.instagram.com/mindofamillennial/"><img src="<?php echo get_template_directory_uri(); ?>/img/instagram.svg" alt="Instagram Icon" class="footer-share-icons__item"></a>
    </div>
    <div class="footer-links">
        <ul class="footer-links-list">
            <a href="<?php echo site_url('about-us')?>"><li class="footer-links-list__item">About Us</li></a>
            <?php if(is_user_logged_in()) { ?>
              <div></div>
                <?php } else { ?>
            <a style="text-decoration: none; color: black;" href="<?php echo site_url('registration') ?>"><li class="footer-links-list__item">Sign Up</li></a>
                <?php } ?>
        </ul>
    </div>
    <div class="privacy-policy-copyright-container">
        <p class="copyright-text">Copyright &copy;2020</p>
        <a class="privacy-policy-text" href="<?php echo get_privacy_policy_url() ?>">Privacy Policy</a>
    </div>
    <p class="developer-text"><a target="_blank"
 style="text-decoration: none; color: white; text-align: center; margin: 2rem 0"; href="https://www.lawthomas.com"> Designed By Lawrence Thomas </p></a>
    </div><!-- FOOTER MARGINS -->
</footer>



<?php wp_footer();?>
</body>
</html>