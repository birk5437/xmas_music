<html>
  <head>
    <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="underscore-min.js"></script>
    <script type="text/javascript" src="plugin/jquery-jplayer/jquery.jplayer.js"></script>
    <script src="plugin/ttw-music-player-min.js"></script>
    <link rel="stylesheet" type="text/css" href="plugin/css/style.css" />

    <?php include 'read_music_files.php'; ?>

    <script type="text/javascript">

      function getMusic(){
        var playlist = new Array();
        var i = 0;
        _.each($(".song"), function(song){
          var obj = Object();
          obj.mp3 = "music/" + $(song).attr('filename');
          obj.title = $(song).attr('title');
          obj.artist = $(song).attr('artist');
          playlist[i] = obj;
          i++;
        });
        return playlist;
      }

      $(document).ready(function(){
       //  getMusic();
       // var playlist = {
       //                  mp3:'music/daft_punk_-_superheroes_(solidisco_remix).mp3',
       //                      // rating:4.5,
       //                      title:'Superheroes',
       //                      artist:'Daft Punk',
       //                      cover:'cover.jpg'
       //                };
        var options = {autoPlay: false};

        $('body').ttwMusicPlayer(getMusic(), options);
      });

    </script>
  </head>
  <body>
  </body>
</html>
