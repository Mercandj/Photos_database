
<?php 
class Carousel {

	private $liste_images;

	function __construct($pliste_images) {
		$this->liste_images = $pliste_images;
	}

  function getHTML_carousel() {
    $res = '';
    if(count($this->liste_images)>=6) {
      $res .='<div class="jcarousel-wrapper">
                <div data-jcarousel="true" class="jcarousel">
                  <ul style="left: -600px; top: 0px;">';
          $i = 1;
          foreach($this->liste_images as $image) {
            $res .= '<li style="height: 200px; width: 200px;"><img src="./../.'.$image->getUrlIcone().'" alt="Image '.$i.'"></li>';
            $i++;
          }
      $res .='    </ul>
                </div>
                <a data-jcarouselcontrol="true" href="#" class="jcarousel-control-prev">‹</a>
                <a data-jcarouselcontrol="true" href="#" class="jcarousel-control-next">›</a>
                <p data-jcarouselpagination="true" class="jcarousel-pagination">';
        $i = 1;
        foreach($this->liste_images as $image) {
          $res .= '<a href="#'.$i.'">'.$i.'</a>';
          $i++;
        }
         $res .='</p>
              </div><br/>';
    }
    return $res;
  }
}
?>