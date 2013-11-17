<?php if (!is_page('klienci')) : ?>
<div class="hidden-phone">
        <hr>
                <div class="main-block clients">
                    <div class="title-wrapper">
                        <h2>Nasi klienci</h2>
                    </div>

<?php
        if (function_exists('mc_clients_show')) :
                mc_clients_show('5', 'transparent', 'responsive', '-1', 7, 'date', 'asc');
        else:
?>
                    <div class="row show-grid">
                        <div class="span12">
                            <div id="clients" class="row show-grid">
                                <div class="span2 clear-both hp-wrapper">
                                    <img alt="" src="/assets/bizstrap/img/client1.jpg" />
                                </div>
                                <div class="span2 hp-wrapper">
                                    <img alt="" src="/assets/bizstrap/img/client2.jpg" />
                                </div>
                                <div class="span2 hp-wrapper">
                                    <img alt="" src="/assets/bizstrap/img/client3.jpg" />
                                </div>
                                <div class="span2 hp-wrapper">
                                    <img alt="" src="/assets/bizstrap/img/client4.jpg" />
                                </div>
                                <div class="span2 hp-wrapper">
                                    <img alt="" src="/assets/bizstrap/img/client5.jpg" />
                                </div>
                                <div class="span2 hp-wrapper">
                                    <img alt="" src="/assets/bizstrap/img/client6.jpg" />
                                </div>
                            </div>
                        </div>
                    </div>
<?php endif; ?>
                </div>

<?php dynamic_sidebar('sidebar-footer'); ?>

</div>
<?php endif; ?>
