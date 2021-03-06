<?php
/* @var $entity \backend\entities\Page */

use \yii\helpers\Html;

$this->title = $entity->title;
?>

<h1><?= $this->title ?></h1>

<?= Html::decode($entity->text) ?>

    <div id="portfoliowrap">
        <div class="portfolio-centered">
            <div class="recentitems portfolio">
                <?php foreach ($entity->getBehavior('galleryBehavior')->getImages() as $image): ?>
                <div class="portfolio-item graphic-design">
                    <div class="he-wrap tpl6">
                        <?= Html::img($image->getUrl('medium')); ?>
                        <div class="he-view">
                            <div class="bg a0" data-animate="fadeIn">
                                <h3 class="a1" data-animate="fadeInDown"><?= $image->name ?></h3>
                                <a data-rel="prettyPhoto" href="<?= $image->getUrl('original') ?>" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>
                            </div><!-- he bg -->
                        </div><!-- he view -->
                    </div><!-- he wrap -->
                </div><!-- end col-12 -->
                <?php endforeach; ?>


            </div><!-- portfolio -->
        </div><!-- portfolio container -->
    </div><!--/Portfoliowrap -->
<?php

$script = <<< JS
   (function($) {
	"use strict";
	var container = $('.portfolio'),
		items = container.find('.portfolio-item'),
		portfolioLayout = 'fitRows';
		if( container.hasClass('portfolio-centered') ) {
			portfolioLayout = 'masonry';
		}
		container.isotope({
			filter: '*',
			animationEngine: 'best-available',
			layoutMode: portfolioLayout,
			animationOptions: {
			duration: 750,
			easing: 'linear',
			queue: false
		},
		masonry: {
		}
		}, refreshWaypoints());
		
		function refreshWaypoints() {
			setTimeout(function() {
			}, 1000);   
		}
				
		$('nav.portfolio-filter ul a').on('click', function() {
				var selector = $(this).attr('data-filter');
				container.isotope({ filter: selector }, refreshWaypoints());
				$('nav.portfolio-filter ul a').removeClass('active');
				$(this).addClass('active');
				return false;
		});
		
		function getColumnNumber() { 
			var winWidth = $(window).width(), 
			columnNumber = 1;
		
			if (winWidth > 1200) {
				columnNumber = 5;
			} else if (winWidth > 950) {
				columnNumber = 4;
			} else if (winWidth > 600) {
				columnNumber = 3;
			} else if (winWidth > 400) {
				columnNumber = 2;
			} else if (winWidth > 250) {
				columnNumber = 1;
			}
				return columnNumber;
			}       
			
			function setColumns() {
				var winWidth = $(window).width(), 
				columnNumber = getColumnNumber(), 
				itemWidth = Math.floor(winWidth / columnNumber);
				
				container.find('.portfolio-item').each(function() { 
					$(this).css( { 
					width : itemWidth + 'px' 
				});
			});
		}
		
		function setPortfolio() { 
			setColumns();
			container.isotope('reLayout');
		}
			
		container.imagesLoaded(function () { 
			setPortfolio();
		});
		
		$(window).on('resize', function () { 
		setPortfolio();          
	});
})(jQuery);
JS;

$this->registerJs(
    $script
);
