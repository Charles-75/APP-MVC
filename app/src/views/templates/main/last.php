    <footer>
        <div class= "infoSite">
            <?php

            if (!empty($_SESSION['id'])) {
                echo '<div><a href="/cgu" class="footerLinks">CGU</a></div>
                      <div><a href="/faq" class="footerLinks">FAQ</a></div>
                      <div><a href="/contact"  class="footerLinks">Contact</a></div>
                      <div><a href="/about"  class="footerLinks">À propos de Domisep</a></div>
                      <div><a href="#"  class="footerLinks">S\'inscrire à la Newsletter</a></div>';
            }
            else{
                echo '<div><a href="/login" class="footerLinks">CGU</a></div>
                      <div><a href="/login" class="footerLinks">FAQ</a></div>
                      <div><a href="/login"  class="footerLinks">Contact</a></div>
                      <div><a href="/login"  class="footerLinks">À propos de Domisep</a></div>
                      <div><a href="/login"  class="footerLinks">S\'inscrire à la Newsletter</a></div>';
            }
            ?>

        </div>
    </footer>
</div>
</body>
</html>
