<?php
    $items = [
        '2022/Unidad-1.png', '2022/Unidad-2.png', '2022/Unidad-3.png', '2022/Unidad-4.png', '2022/Unidad-5.png', '2022/Unidad-6.png', '2022/Unidad-7.png', '2022/Unidad-8.png', '2022/Unidad-9.png', '2022/Unidad-10.png'
    ];
 ?>
<section class="section-gallery">
    <div class="ed-container main-center full no-padding">
        <div class="ed-item container-gallery"> 
            <div class="slider-gallery">
                <?php foreach($items as $v): ?>
                <div class="item-gallery">
                    <img src="assets/img/<?php echo $v; ?>" alt="" style="width:100%;">
                </div>
                <?php endforeach; ?>
            </div> 
        </div>
        <div class="bg-gallery"></div>
    </div>
</section>