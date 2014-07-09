<!-- Jssor Slider Begin -->
<div class="">
    <!-- You can move inline styles to css file or css block. -->
    <div id="slider1_container" >

        <!-- Loading Screen -->
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div id="loading-1">
            </div>
            <div id="loading-2">
            </div>
        </div>

        <!-- Slides Container -->
        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 600px; height: 300px; overflow: hidden;">
            <div>
                <img u="image" src="<?php echo base_url(); ?>application/views/resources/products/device-1.jpg" />
            </div>
            <div>
                <img u="image" src="<?php echo base_url(); ?>application/views/resources/products/device-2.jpg" />
            </div>
            <div>
                <img u="image" src="<?php echo base_url(); ?>application/views/resources/products/device-3.jpg" />
            </div>
            <div>
                <img u="image" src="<?php echo base_url(); ?>application/views/resources/products/device-4.jpg" />
            </div>
        </div>

        <!-- Bullet Navigator Skin Begin -->

        <!-- bullet navigator container -->
        <div u="navigator" class="jssorb05" style="position: absolute; bottom: 16px; right: 6px;">
            <!-- bullet navigator item prototype -->
            <div u="prototype" style="POSITION: absolute; WIDTH: 16px; HEIGHT: 16px;"></div>
        </div>
        <!-- Bullet Navigator Skin End -->

        <!-- Arrow Left -->
            <span u="arrowleft" class="jssora12l" style="width: 30px; height: 46px; top: 123px; left: 0px;">
            </span>
        <!-- Arrow Right -->
            <span u="arrowright" class="jssora12r" style="width: 30px; height: 46px; top: 123px; right: 0px">
            </span>
    </div>
    <!-- Jssor Slider End -->

</div>


<div class="row">
    <div class="col-md-3">Sample information about product</div>
    <div class="col-md-3">Sample information</div>
    <div class="col-md-3">Sample information</div>
    <div class="col-md-3">
        <?php echo anchor('/product/order/', 'Order', 'class="btn btn-primary" '); ?>
    </div>
</div>