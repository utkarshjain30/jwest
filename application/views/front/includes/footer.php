
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <?php if($this->lib->get_settings('twitter')!=NULL):?>
                        <li>
                            <a target="_blank" href="http://twitter.com/<?php echo $this->lib->get_settings('twitter'); ?>">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if($this->lib->get_settings('facebook')!=NULL):?>
                        <li>
                            <a target="_blank" href="http://facebook.com/<?php echo $this->lib->get_settings('facebook'); ?>">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if($this->lib->get_settings('github')!=NULL):?>
                        <li>
                            <a target="_blank" href="http://github.com/<?php echo $this->lib->get_settings('github'); ?>">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    <?php endif; ?>
                    </ul>
                    <p class="copyright text-muted">Copyright &copy; <?php echo $this->lib->get_settings('sitename')?> <?php echo date('Y');?></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="<?php echo base_url('static/front/js')?>/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('static/front/js')?>/bootstrap.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="<?php echo base_url('static/front/js')?>/jqBootstrapValidation.js"></script>
    <script src="<?php echo base_url('static/front/js')?>/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="<?php echo base_url('static/front/js')?>/clean-blog.min.js"></script>

</body>

</html>
