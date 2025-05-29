 <!-- <iframe id="ytplayer" width="100%" height="315" src="http://www.youtube.com/embed/6aiu88DH32w?autoplay=1&loop=1&playlist=6aiu88DH32w&mute=1&controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->

<!-- <div id="player"></div> -->
<script src="https://player.vimeo.com/api/player.js"></script>
   
<iframe 
src="https://player.vimeo.com/video/356036978?autoplay=1&loop=1&autopause=0&muted=1&&title=0&byline=0&portrait=0&sidedock=0"
 width="100%" height="100%" frameborder="0" style="pointer-events:none;"></iframe>
   
<script>  
    var iframe = document.querySelector('iframe');
    var player = new Vimeo.Player(iframe); 
 
    player.on('play', function() {
      var header = document.querySelector('.header');
      if(header)
         header.style.background = '#000'; 
      setTimeout(hideTextVideo, 10000);       
    });

    player.getVideoTitle().then(function(title) {
      console.log('title:', title);
    });


    var tag = document.createElement('script');
    var isFinished = false;
    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag); 
    var player;
    function onYouTubeIframeAPIReady() {
      player = new YT.Player('player', {
        height: '100%',
        width: '100%',
        videoId: 'Hg2CR6V3wl0',
        playerVars: { 'loop': 1, 'controls': 0, 'mute': 1},
        events: {
          'onReady': playVideoYoutube,
          'onStateChange': onPlayerStateChange
        }
      });
    }
    

    // 4. The API will call this function when the video player is ready.
    function playVideoYoutube(event) {
        event.target.playVideo();
        if(! isFinished){
            setTimeout(hideTextVideo, 10000);
        }
    } 
    function stopVideo() {
        player.stopVideo();
    }
    function onPlayerStateChange(event){
        if (event.data == YT.PlayerState.ENDED) {
          //setTimeout(stopVideo, 6000);
          //done = true;
          playVideoYoutube(event);
          isFinished = true;
          setTimeout(hideTextVideo, 10000);
        }  
    }

    function showTextVideo(){
        $('#text-video').remoclass('hidden');
    }
    function hideTextVideo(){
        console.log($('#text-video'))
        $('#text-video').remove()
    }
 
</script>