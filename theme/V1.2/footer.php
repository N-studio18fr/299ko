<?php defined('ROOT') OR exit('No direct script access allowed'); ?>
            </div>
        </main>
        <footer>
            <div id="footer_content">
                <?php $core->callHook('footer'); ?>
                <p>
                    <a target='_blank' href='https://github.com/299ko/'>Just using 299ko</a> - Thème <?php show::theme(); ?> - <a rel="nofollow" href="<?php echo ADMIN_PATH ?>">Administration</a>
                </p>
                <?php $core->callHook('endFooter'); ?>
            </div>
        </footer>
    </div>
<?php $core->callHook('endFrontBody'); ?>
</body>
</html>