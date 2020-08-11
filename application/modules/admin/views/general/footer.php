</section>
</div>
        <!--/ Application Content -->














        <!-- ============================================
        ============== Vendor JavaScripts ===============
        ============================================= -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>
        <script type="text/javascript" src="<?php echo base_url().'component/assets/js/vendor/jquery/jquery-1.11.2.min.js'?>"></script>
        <script src="<?php echo base_url().'component/assets/js/vendor/bootstrap/bootstrap.min.js'?>"></script>

        <script src="<?php echo base_url().'component/assets/js/vendor/jRespond/jRespond.min.js'?>"></script>

        <script src="<?php echo base_url().'component/assets/js/vendor/sparkline/jquery.sparkline.min.js'?>"></script>

        <script src="<?php echo base_url().'component/assets/js/vendor/slimscroll/jquery.slimscroll.min.js'?>"></script>

        <script src="<?php echo base_url().'component/assets/js/vendor/animsition/js/jquery.animsition.min.js'?>"></script>

        <script src="<?php echo base_url().'component/summernote/summernote.min.js'?>"></script>

        <script src="<?php echo base_url().'component/assets/js/vendor/filestyle/bootstrap-filestyle.min.js'?>"></script>


        <!--/ vendor javascripts -->


        <script src="<?php echo base_url() . 'component/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js '?>" type="text/javascript"></script>

        <!-- ============================================
        ============== Custom JavaScripts ===============
        ============================================= -->
        <script src="<?php echo base_url().'component/assets/js/main.js'?>"></script>
        <!--/ custom javascripts -->







        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            $('.textarea').wysihtml5({
                "blockquote": false,
                "color": true,
            });
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>

    </body>
</html>