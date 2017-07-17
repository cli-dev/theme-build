<?php 
  $myoptions = get_option( 'themesettings_'); 
  $loader_class = ($myoptions['page_loader_icon'] == 0) ? 'no-custom-icon' : 'custom-icon';
  if ($myoptions['page_loader'] == 1) {
?>

<style type="text/css">
  #wrapper{
    opacity: 0;
  }
  .loaded #wrapper{
    opacity: 1;
  }
  #loader-wrapper {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
  }
  #loader {
    display: block;
    position: absolute;
    left: 50%;
    top: 50%;
    width: 20vw;
    height: 20vw;
    z-index: 1001;
    -webkit-transform: translate(-50%, -50%);
    -moz-transform: translate(-50%, -50%);
    -o-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
  }

  #loader.custom-icon {
    -webkit-animation: fade 2s ease-in-out infinite; /* Chrome, Opera 15+, Safari 5+ */
    animation: fade 2s ease-in-out infinite; /* Chrome, Firefox 16+, IE 10+, Opera */
  }

  #loader.no-custom-icon{
    border-radius: 50%;
    border: 3px solid transparent;
    border-top-color: <?php echo $myoptions['page_loader_icon_color']; ?>;
    -webkit-animation: spin 2s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
    animation: spin 2s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */
  }

  #loader.no-custom-icon:before {
    content: "";
    position: absolute;
    top: 3.33%;
    left: 3.33%;
    right: 3.33%;
    bottom: 3.33%;
    border-radius: 50%;
    border: 3px solid transparent;
    border-top-color: <?php echo $myoptions['page_loader_icon_color']; ?>;

    -webkit-animation: spin 3s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
    animation: spin 3s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */
  }

  #loader.no-custom-icon:after {
    content: "";
    position: absolute;
    top: 10%;
    left: 10%;
    right: 10%;
    bottom: 10%;
    border-radius: 50%;
    border: 3px solid transparent;
    border-top-color: <?php echo $myoptions['page_loader_icon_color']; ?>;

    -webkit-animation: spin 1.5s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
    animation: spin 1.5s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */
  }

  @media screen and (orientation: portrait){
    #loader{
      width: 15vw;
      height: 15vw;
    }

    #loader.no-custom-icon{
      margin-left: -7.5vw;
      margin-top: -7.5vw;
    }
  }

  @media screen and (orientation: landscape){
    #loader{
      width: 10vw;
      height: 10vw;
    }
    #loader.no-custom-icon{
      margin-left: -5vw;
      margin-top: -5vw;
    }
  }

  @-webkit-keyframes fade {
    0%   { 
      opacity: 0;
    }
    50% {
      opacity: 1;
    }
    100% {
      opacity: 0;
    }
  }
  @keyframes fade {
    0%   { 
      opacity: 0;
    }
    50% {
      opacity: 1;
    }
    100% {
      opacity: 0;
    }
  }

  @-webkit-keyframes spin {
    0%   { 
      -webkit-transform: rotate(0deg);  /* Chrome, Opera 15+, Safari 3.1+ */
      -ms-transform: rotate(0deg);  /* IE 9 */
      transform: rotate(0deg);  /* Firefox 16+, IE 10+, Opera */
    }
    100% {
      -webkit-transform: rotate(360deg);  /* Chrome, Opera 15+, Safari 3.1+ */
      -ms-transform: rotate(360deg);  /* IE 9 */
      transform: rotate(360deg);  /* Firefox 16+, IE 10+, Opera */
    }
  }
  @keyframes spin {
    0%   { 
      -webkit-transform: rotate(0deg);  /* Chrome, Opera 15+, Safari 3.1+ */
      -ms-transform: rotate(0deg);  /* IE 9 */
      transform: rotate(0deg);  /* Firefox 16+, IE 10+, Opera */
    }
    100% {
      -webkit-transform: rotate(360deg);  /* Chrome, Opera 15+, Safari 3.1+ */
      -ms-transform: rotate(360deg);  /* IE 9 */
      transform: rotate(360deg);  /* Firefox 16+, IE 10+, Opera */
    }
  }

  #loader-wrapper .loader-section {
    position: fixed;
    top: 0;
    width: 51%;
    height: 100%;
    background: <?php echo $myoptions['page_loader_bg_color']; ?>;
    z-index: 1000;
    -webkit-transform: translateX(0);  /* Chrome, Opera 15+, Safari 3.1+ */
    -ms-transform: translateX(0);  /* IE 9 */
    transform: translateX(0);  /* Firefox 16+, IE 10+, Opera */
  }

  #loader-wrapper .loader-section.section-left {
    left: 0;
  }

  #loader-wrapper .loader-section.section-right {
    right: 0;
  }

  /* Loaded */
  .loaded #loader-wrapper .loader-section.section-left {
    -webkit-transform: translateX(-100%);
    -ms-transform: translateX(-100%);
    transform: translateX(-100%);

    -webkit-transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);  
    transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
  }

  .loaded #loader-wrapper .loader-section.section-right {
    -webkit-transform: translateX(100%);
    -ms-transform: translateX(100%);
    transform: translateX(100%);

    -webkit-transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);  
    transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
  }

  .loaded #loader {
    opacity: 0;
    visibility: hidden;
    -webkit-transition: all 0.3s ease-out;  
    transition: all 0.3s ease-out;
  }
  .loaded #loader-wrapper {
    visibility: hidden;
    opacity: 0;
    -webkit-transform: translateY(-100%);
    -ms-transform: translateY(-100%); 
    transform: translateY(-100%);
    -webkit-transition: all 0.3s 1s ease-out;  
    transition: all 0.3s 1s ease-out;
  }

  /* JavaScript Turned Off */
  .no-js #loader-wrapper {
    display: none;
  }

  .no-js #wrapper {
    opacity: 1;
  }
</style>
<div id="loader-wrapper">
  <div class="loader-section section-left"></div>
  <div class="loader-section section-right"></div>
  <div id="loader" class="<?php echo $loader_class; ?>">
    <?php if (($myoptions['page_loader_icon'] == 1) && !empty($myoptions['page_loader_icon_img'])) {
      echo file_get_contents($myoptions['page_loader_icon_img']);
    }?>
  </div>
</div>
<script type="text/javascript">
  window.onload = function(){
    document.body.classList.add('loaded');
  }
  setTimeout(function(){ 
    if (!document.body.classList.contains('loaded')) {
      document.body.classList.add('loaded');
    }
  }, 3000);
</script>
<?php } ?>