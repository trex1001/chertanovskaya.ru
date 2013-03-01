<?php
/* @var $this renderAvatar */
?>
<script type="text/javascript">
    $(document).ready(function() {
        $("a#make_avatar").fancybox({
            'transitionIn'	: 'elastic',
            'transitionOut'	: 'elastic',
            'overlayColor'		: '#004',
            'overlayOpacity'	: 0.1,
            'showCloseButton'	: false,
            'scrolling' 		: 'none',
            'centerOnScroll'	: 'true',
            'showCloseButton'	: 'true',
            'titleShow'	:	'true',
            'titlePosition'	:	'float',
            'onComplete'	:	function() {
                $("#fancybox-wrap").hover(function() {
                    $("#fancybox-title").show();
                }, function() {
                    $("#fancybox-title").hide();
                });
            }
        });
    });
</script>
<div style="width:300px; float:left;"><a class="make_avatar" href="<?php echo $this->user->avatar->urlToImage()?>"><img border="0" class="image_third_size" src="/user/RenderAvatar/<?=$this->userId?>"" /></a></div><div style="width:30px; height:100px; padding-top: 40px; float:left;"><a href="/usr/views/avatar.php?a=delete"></a></div>
