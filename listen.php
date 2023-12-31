<?php
$body= 'div-block';
require ('./components/header.php'); ?>
<?php require ('./components/nav.php') ?>
<?php require ('./DB/db.php');?>
<?php 
if(!isset($_COOKIE['listener_username'])){
    header("Location: ./loginlistener.php?page_state=Listen");
}else{
    $username = $_COOKIE['listener_username'];
}
?>

<link rel="stylesheet" href="./creator/public/assets/css/track.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/plyr/3.7.8/plyr.css" integrity="sha512-yexU9hwne3MaLL2PG+YJDhaySS9NWcj6z7MvUDSoMhwNghPgXgcvYgVhfj4FMYpPh1Of7bt8/RK5A0rQ9fPMOw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class='div-block'>
    <div class="container">
        <div class="column add-bottom">
            <div id="mainwrap">
                <div id="plwrap">
                    <!-- <ul id="plList"></ul> -->
                    <!-- <table class='myTable table table-striped table-color-white'> -->
                    <table id='play_m' class='myTable_player table table-striped table-color-white'>
                        <thead>
                            <tr>
                                <th>Cover</th>
                                <th>Title</th>
                                <th>ARTIST</th>
                                <th>PLAY</th>
                            </tr>
                        </thead>
                        <tbody id=''>
                            <?php

                                $sql_count = "SELECT * FROM `listener` WHERE USERNAME='".$username."' ";
                                $run_count = mysqli_query($conn , $sql_count);
                                $row_count = mysqli_fetch_assoc($run_count);

                                $i = 0;
                                if($row_count['MEMBERSHIP'] == '0'){
                                    $sql_getEP = "SELECT * FROM episode ORDER BY RAND() LIMIT 2";
                                }else{
                                    $sql_getEP = "SELECT * FROM episode ORDER BY RAND()";
                                }
                                $run_getEP= mysqli_query($conn, $sql_getEP);
                                while ($row_getEP = mysqli_fetch_assoc($run_getEP)) {
                                    // if(!empty($row_getEP['COVER']) || !empty($row_getEP['TRACK'])){
                            ?>
                                <tr style='color: white;'>
                                    <td>
                                        <img width='100' height='50' src="./creator/public/assets/cover/<?php print($row_getEP['COVER']) ?>" alt='cover' />
                                    </td>
                                    <td><?php print($row_getEP['TITLE']) ?></td>
                                    <td><?php print($row_getEP['USER']) ?></td>
                                    <td><button class="btn btn-secondary btn-small">PLAY</button></td>
                                </tr>
                        <?php $i++; }?>
                    </tbody>
                    </table>
                </div>


                <div class="row justify-content-around">
                    <div class="col-md-12">
                        <div id="nowPlay">
                            <span id="npAction">Paused...</span><span id="npTitle"></span>
                            <div id="tracks">
                                <a id="btnPrev">&larr;</a><a id="btnNext">&rarr;</a>
                            </div>
                        </div>
                        <div id="audiowrap">
                            <div id="audio0">
                                <audio id="audio1" preload controls>Your browser does not support HTML5 Audio! 😢</audio>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

            <?php 
                if($row_count['MEMBERSHIP'] == '0'){
            ?>
                <div class="row pb-5 justify-content-around">
                    <div class='col-md-8 text-center' style='display: flex; justify-content: space-between;'>
                        <p class='pr-3'>TO VIEW ALL EPISODE CONTACT ADMIN TO UPGRADE YOUR ACCOUNT</p>
                        <a href="./contact-us.php?page_state=CONTACT-US" 
                        style='background-color: #dc3545; color:white;' class='btn btn-small btn-dnager'>
                            CONTACT ADMIN
                        </a>
                    </div>
                </div>
            <?php } ?>
    </div>
</div>

<?php require('./components/footer.php'); ?>
<script>
    jQuery(function ($) {
    'use strict'
    var supportsAudio = !!document.createElement('audio').canPlayType;
    if (supportsAudio) {
        // initialize plyr
        var player = new Plyr('#audio1', {
            controls: [
                'restart',
                'play',
                'progress',
                'current-time',
                'duration',
                'mute',
                'volume',
                'download'
            ]
        });
        // let link = "/public/assets/tracks/5680_Justine_Skye_-_U_Don't_Know_ft._Wizkid.mp3";
        // let current_audio = new Audio("/public/assets/tracks/5680_Justine_Skye_-_U_Don't_Know_ft._Wizkid.mp3");
        // let duration = current_audion.duration();
        // console.log(link.duration)
        var index = 0,
            playing = false,
            mediaPath = './creator/public/assets/tracks/',
            extension = '.mp3',
            tracks = [
            <?php
                $sql_getEP = "SELECT * FROM episode ";
                $run_getEP= mysqli_query($conn, $sql_getEP);
                while ($row_getEP = mysqli_fetch_assoc($run_getEP)) {
            ?>
                {
                    "track": "<?php print($row_getEP['ID']) ?>",
                    "name": "<?php print($row_getEP['TITLE']) ?>",
                    // "duration": "2:46",
                    <?php 
                        $song = explode('.',$row_getEP['TRACK']);
                    ?>
                    "file": "<?php print($song['0']) ?>"
                },
            <?php } ?>
            ],
            buildPlaylist = $.each(tracks, function(key, value) {
                var trackNumber = value.track,
                    trackName = value.name,
                    trackDuration = value.duration;
                if (trackNumber.toString().length === 1) {
                    trackNumber = '0' + trackNumber;
                }
                console.log(value.file);

                // $('#plList').append('<li> \
                //     <div class="plItem"> \
                //         <span class="plNum">' + trackNumber + '.</span> \
                //         <span class="plTitle">' + trackName + '</span> \
                //         <span class="plLength">' + trackDuration + '</span> \
                //     </div> \
                // </li>');
            }),
            trackCount = tracks.length,
            npAction = $('#npAction'),
            npTitle = $('#npTitle'),
            audio = $('#audio1').on('play', function () {
                playing = true;
                npAction.text('Now Playing...');
            }).on('pause', function () {
                playing = false;
                npAction.text('Paused...');
            }).on('ended', function () {
                npAction.text('Paused...');
                if ((index + 1) < trackCount) {
                    index++;
                    loadTrack(index);
                    audio.play();
                } else {
                    audio.pause();
                    index = 0;
                    loadTrack(index);
                }
            }).get(0),
            btnPrev = $('#btnPrev').on('click', function () {
                if ((index - 1) > -1) {
                    index--;
                    loadTrack(index);
                    if (playing) {
                        audio.play();
                    }
                } else {
                    audio.pause();
                    index = 0;
                    loadTrack(index);
                }
            }),
            btnNext = $('#btnNext').on('click', function () {
                if ((index + 1) < trackCount) {
                    index++;
                    loadTrack(index);
                    if (playing) {
                        audio.play();
                    }
                } else {
                    audio.pause();
                    index = 0;
                    loadTrack(index);
                }
            }),

            // li = $('#plList li').on('click', function () {
            li = $('#play_m tr').on('click', function () {
                var id = parseInt($(this).index());
                // console.log(id + ' ' + index);
                // if (id !== index) {
                    playTrack(id);
                // }
            }),
            loadTrack = function (id) {
                $('.plSel').removeClass('plSel');
                $('#play_m li:eq(' + id + ')').addClass('plSel');
                console.log(tracks[id].file )
                npTitle.text(tracks[id].name);
                index = id;
                audio.src = mediaPath + tracks[id].file + extension;
                updateDownload(id, audio.src);
            },
            updateDownload = function (id, source) {
                player.on('loadedmetadata', function () {
                    $('a[data-plyr="download"]').attr('href', source);
                });
            },
            playTrack = function (id) {
                loadTrack(id);
                audio.play();
            };
            
        extension = audio.canPlayType('audio/mpeg') ? '.mp3' : audio.canPlayType('audio/ogg') ? '.ogg' : '';
        loadTrack(index);
    } else {
        // no audio support
        $('.column').addClass('hidden');
        var noSupport = $('#audio1').text();
        $('.container').append('<p class="no-support">' + noSupport + '</p>');
    }
    });
</script>