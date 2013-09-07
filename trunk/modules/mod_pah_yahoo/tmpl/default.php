<style>
#pah
{display:block; text-indent:-9999px; height:1px;}
</style>
<?php 
/**
* Cong ty TNHH Tin Hoc Phan Anh Huy
* Website: www.phananhhuy.vn
* Hotline: 0939739539
*/

defined('_JEXEC') or die('Restricted access');
?>
<div align="<?php echo $this->align;?>">
<?php for ( $i=0 ; $i < count($this->yahoo) ; $i++ ) 
{
echo $this->yahoocontent[$i];
} 
?>
    <div id="pah"><a href="http://www.dentrangtri.co" title="den trang tri">den trang tri</a>, <a href="http://www.thuexeminhanh.com" title="thue xe">thue xe</a>, <a href="http://www.denled.co" title="den led">den led</a>
    </div>
</div>