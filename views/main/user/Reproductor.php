<?php 


// $contador = 0;
// $allMusic = '';
// foreach($this->listamusica as $music){
//   $columnaArr = array('id','artist','img','src');
//   $musica = array($music->getId_musica(),$music->getId_artista()->getNombreartista(),$music->getImgm(),$music->getCancion());
//   foreach($musica as $music1){
//     $allMusic .=  $columnaArr[$contador] . ':' . " ' ".$music1." ', ";
//     $contador ++;
//   }
// }



// $allMusic = substr_replace($allMusic, "",-1);

// echo var_dump($allMusic);
// $onClickButton = 'funcionJavaScript({'  .  $allMusic   . '})';
// //renderizando un boton:
// $buttonHTML5 = '<button id="idButton" name="nameButton onclick=" ' . $onClickButton   . ' " ';



foreach($this->listamusica as $music){
  $mp3 = $music->getCancion();
  $mp3 = str_replace(".mp3", "",$mp3);
  
    $musica = Array(
      'name' => $music->getNombre(),
      'artist' => $music->getId_artista()->getNombreartista(),
      'img' => $music->getImgm(),
      'src' => $mp3
    );
    
    
    $array[] = $musica;
  }



?>
<?php require "views/templates/header.php"; ?>



<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Music Player | CodingNepal</title>
  <link rel="stylesheet" href="<?php echo constant('URL') ?>resources/resources/css/styleReproductor.css">
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="icon" href="img/core-img/favicon.ico">

<!-- Stylesheet -->
<link rel="stylesheet" href="<?php echo constant('URL') ?>resources/resources/css/style.css">
<link rel="stylesheet" href="<?php echo constant('URL') ?>resources/resources/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo constant('URL') ?>resources/resources/css/classy-nav.css">
</head>
<body>

<header class="header-area">
        <!-- Navbar Area -->
        <div class="oneMusic-main-menu">
            <div class="classy-nav-container breakpoint-on">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="oneMusicNav">

                        <!-- Nav brand -->
                        <a href="<?php echo constant("URL") ?>main/principalIndex" class="nav-brand"><img src="<?php echo constant('URL') ?>resources/resources/img/core-img/logo.png" alt=""></a>
                        <!-- Menu -->
                        <div class="classy-menu" style="margin-right: 10%;">

                            <!-- Nav Start -->
                            <div class="classynav" >
                                <ul>
                                    <li><a href="<?php echo constant("URL") ?>main/principalIndex">Inicio</a></li>
                                    <li><a href="<?php echo constant("URL") ?>main/principalverArtista">Artistas</a></li>
                                    <li><a href="<?php echo constant("URL") ?>main/principalverEvento">Eventos</a></li>
                                    <li><a href="<?php echo constant("URL") ?>main/principalReproductor">Musica</a></li>
                                    <li><a href="<?php echo constant("URL") ?>main/principalComentarios">Foro</a></li>
                                    <li><a href="#"><?php echo "$_SESSION[NameUsuIni]"; ?></a>
                                        <ul class="dropdown" style="width: 200px;">
                                            <li><a href="#"><img src="<?php echo constant('URL') ?>resources/resources/img/core-img/logo.png" alt=""></a></li>
                                            <li><a href="<?php echo constant("URL") ?>main/principalIndex"><?php echo "$_SESSION[UsuarioIni]"; ?></a></li>
                                            <li><a href="<?php echo constant("URL") ?>main/principalSession">Cerrar Sesión</a></li>
                                        </ul>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
<script>
  var allMusic = JSON.parse('<?php echo json_encode($array);  ?>');
  console.log(allMusic);
</script>
  <div class="wrapper">
    
    <div class="img-area">
      <img src="" alt="">
    </div>
    <div class="song-details">
      <p class="name"></p>
      <p class="artist"></p>
    </div>
    <div class="progress-area">
      <div class="progress-bar">
        <audio id="main-audio" src=""></audio>
      </div>
      <div class="song-timer">
        <span class="current-time">0:00</span>
        <span class="max-duration">0:00</span>
      </div>
    </div>
    <div class="controls">
      <i id="repeat-plist" class="material-icons" title="Playlist looped">repeat</i>
      <i id="prev" class="material-icons">skip_previous</i>
      <div class="play-pause">
        <i class="material-icons play">play_arrow</i>
      </div>
      <i id="next" class="material-icons">skip_next</i>
      <i id="more-music" class="material-icons">queue_music</i>
    </div>
    <div class="music-list">
      <div class="header">
        <div class="row">
          <i class= "list material-icons">queue_music</i>
          <span>Music list</span>
        </div>
        <i id="close" class="material-icons">close</i>
      </div>
      <ul>
        <!-- here li list are coming from js -->
      </ul>
    </div>
  </div>



  
  
  <!-- <script src="<?php echo constant('URL') ?>resources/resources/js/script.js"></script> -->
  <script src="<?php echo constant('URL') ?>resources/resources/js/jquery/jquery-2.2.4.min.js"></script>
  <script>
    const wrapper = document.querySelector(".wrapper"),
musicImg = wrapper.querySelector(".img-area img"),
musicName = wrapper.querySelector(".song-details .name"),
musicArtist = wrapper.querySelector(".song-details .artist"),
playPauseBtn = wrapper.querySelector(".play-pause"),
prevBtn = wrapper.querySelector("#prev"),
nextBtn = wrapper.querySelector("#next"),
mainAudio = wrapper.querySelector("#main-audio"),
progressArea = wrapper.querySelector(".progress-area"),
progressBar = progressArea.querySelector(".progress-bar"),
musicList = wrapper.querySelector(".music-list"),
moreMusicBtn = wrapper.querySelector("#more-music"),
closemoreMusic = musicList.querySelector("#close");

let musicIndex = Math.floor((Math.random() * allMusic.length) + 1);
isMusicPaused = true;

window.addEventListener("load", ()=>{
  loadMusic(musicIndex);
  playingSong(); 
});

function loadMusic(indexNumb){
  musicName.innerText = allMusic[indexNumb - 1].name;
  musicArtist.innerText = allMusic[indexNumb - 1].artist;
  musicImg.src = `<?php echo constant('URL') ?>resources/musica/${allMusic[indexNumb - 1].img}`;
  mainAudio.src = `<?php echo constant('URL') ?>resources/canciones/${allMusic[indexNumb - 1].src}.mp3`;
}

//play music function
function playMusic(){
  wrapper.classList.add("paused");
  playPauseBtn.querySelector("i").innerText = "pause";
  mainAudio.play();
}

//pause music function
function pauseMusic(){
  wrapper.classList.remove("paused");
  playPauseBtn.querySelector("i").innerText = "play_arrow";
  mainAudio.pause();
}

//prev music function
function prevMusic(){
  musicIndex--; //decrement of musicIndex by 1
  //if musicIndex is less than 1 then musicIndex will be the array length so the last music play
  musicIndex < 1 ? musicIndex = allMusic.length : musicIndex = musicIndex;
  loadMusic(musicIndex);
  playMusic();
  playingSong(); 
}

//next music function
function nextMusic(){
  musicIndex++; //increment of musicIndex by 1
  //if musicIndex is greater than array length then musicIndex will be 1 so the first music play
  musicIndex > allMusic.length ? musicIndex = 1 : musicIndex = musicIndex;
  loadMusic(musicIndex);
  playMusic();
  playingSong(); 
}

// play or pause button event
playPauseBtn.addEventListener("click", ()=>{
  const isMusicPlay = wrapper.classList.contains("paused");
  //if isPlayMusic is true then call pauseMusic else call playMusic
  isMusicPlay ? pauseMusic() : playMusic();
  playingSong();
});

//prev music button event
prevBtn.addEventListener("click", ()=>{
  prevMusic();
});

//next music button event
nextBtn.addEventListener("click", ()=>{
  nextMusic();
});

// update progress bar width according to music current time
mainAudio.addEventListener("timeupdate", (e)=>{
  const currentTime = e.target.currentTime; //getting playing song currentTime
  const duration = e.target.duration; //getting playing song total duration
  let progressWidth = (currentTime / duration) * 100;
  progressBar.style.width = `${progressWidth}%`;

  let musicCurrentTime = wrapper.querySelector(".current-time"),
  musicDuartion = wrapper.querySelector(".max-duration");
  mainAudio.addEventListener("loadeddata", ()=>{
    // update song total duration
    let mainAdDuration = mainAudio.duration;
    let totalMin = Math.floor(mainAdDuration / 60);
    let totalSec = Math.floor(mainAdDuration % 60);
    if(totalSec < 10){ //if sec is less than 10 then add 0 before it
      totalSec = `0${totalSec}`;
    }
    musicDuartion.innerText = `${totalMin}:${totalSec}`;
  });
  // update playing song current time
  let currentMin = Math.floor(currentTime / 60);
  let currentSec = Math.floor(currentTime % 60);
  if(currentSec < 10){ //if sec is less than 10 then add 0 before it
    currentSec = `0${currentSec}`;
  }
  musicCurrentTime.innerText = `${currentMin}:${currentSec}`;
});

// update playing song currentTime on according to the progress bar width
progressArea.addEventListener("click", (e)=>{
  let progressWidth = progressArea.clientWidth; //getting width of progress bar
  let clickedOffsetX = e.offsetX; //getting offset x value
  let songDuration = mainAudio.duration; //getting song total duration
  
  mainAudio.currentTime = (clickedOffsetX / progressWidth) * songDuration;
  playMusic(); //calling playMusic function
  playingSong();
});

//change loop, shuffle, repeat icon onclick
const repeatBtn = wrapper.querySelector("#repeat-plist");
repeatBtn.addEventListener("click", ()=>{
  let getText = repeatBtn.innerText; //getting this tag innerText
  switch(getText){
    case "repeat":
      repeatBtn.innerText = "repeat_one";
      repeatBtn.setAttribute("title", "Song looped");
      break;
    case "repeat_one":
      repeatBtn.innerText = "shuffle";
      repeatBtn.setAttribute("title", "Playback shuffled");
      break;
    case "shuffle":
      repeatBtn.innerText = "repeat";
      repeatBtn.setAttribute("title", "Playlist looped");
      break;
  }
});

//code for what to do after song ended
mainAudio.addEventListener("ended", ()=>{
  // we'll do according to the icon means if user has set icon to
  // loop song then we'll repeat the current song and will do accordingly
  let getText = repeatBtn.innerText; //getting this tag innerText
  switch(getText){
    case "repeat":
      nextMusic(); //calling nextMusic function
      break;
    case "repeat_one":
      mainAudio.currentTime = 0; //setting audio current time to 0
      loadMusic(musicIndex); //calling loadMusic function with argument, in the argument there is a index of current song
      playMusic(); //calling playMusic function
      break;
    case "shuffle":
      let randIndex = Math.floor((Math.random() * allMusic.length) + 1); //genereting random index/numb with max range of array length
      do{
        randIndex = Math.floor((Math.random() * allMusic.length) + 1);
      }while(musicIndex == randIndex); //this loop run until the next random number won't be the same of current musicIndex
      musicIndex = randIndex; //passing randomIndex to musicIndex
      loadMusic(musicIndex);
      playMusic();
      playingSong();
      break;
  }
});

//show music list onclick of music icon
moreMusicBtn.addEventListener("click", ()=>{
  musicList.classList.toggle("show");
});
closemoreMusic.addEventListener("click", ()=>{
  moreMusicBtn.click();
});

const ulTag = wrapper.querySelector("ul");
// let create li tags according to array length for list
for (let i = 0; i < allMusic.length; i++) {
  //let's pass the song name, artist from the array
  let liTag = `<li li-index="${i + 1}">
                <div class="row">
                  <span>${allMusic[i].name}</span>
                  <p>${allMusic[i].artist}</p>
                </div>
                <span id="${allMusic[i].src}" class="audio-duration">3:40</span>
                <audio class="${allMusic[i].src}" src="<?php echo constant('URL') ?>resources/canciones/${allMusic[i].src}.mp3"></audio>
              </li>`;
  ulTag.insertAdjacentHTML("beforeend", liTag); //inserting the li inside ul tag

  let liAudioDuartionTag = ulTag.querySelector(`#${allMusic[i].src}`);
  let liAudioTag = ulTag.querySelector(`.${allMusic[i].src}`);
  liAudioTag.addEventListener("loadeddata", ()=>{
    let duration = liAudioTag.duration;
    let totalMin = Math.floor(duration / 60);
    let totalSec = Math.floor(duration % 60);
    if(totalSec < 10){ //if sec is less than 10 then add 0 before it
      totalSec = `0${totalSec}`;
    };
    liAudioDuartionTag.innerText = `${totalMin}:${totalSec}`; //passing total duation of song
    liAudioDuartionTag.setAttribute("t-duration", `${totalMin}:${totalSec}`); //adding t-duration attribute with total duration value
  });
}

//play particular song from the list onclick of li tag
function playingSong(){
  const allLiTag = ulTag.querySelectorAll("li");
  
  for (let j = 0; j < allLiTag.length; j++) {
    let audioTag = allLiTag[j].querySelector(".audio-duration");
    
    if(allLiTag[j].classList.contains("playing")){
      allLiTag[j].classList.remove("playing");
      let adDuration = audioTag.getAttribute("t-duration");
      audioTag.innerText = adDuration;
    }

    //if the li tag index is equal to the musicIndex then add playing class in it
    if(allLiTag[j].getAttribute("li-index") == musicIndex){
      allLiTag[j].classList.add("playing");
      audioTag.innerText = "Playing";
    }

    allLiTag[j].setAttribute("onclick", "clicked(this)");
  }
}

//particular li clicked function
function clicked(element){
  let getLiIndex = element.getAttribute("li-index");
  musicIndex = getLiIndex; //updating current song index with clicked li index
  loadMusic(musicIndex);
  playMusic();
  playingSong();
}
  </script>

  <!-- Page Specific JS File -->
  <script src="<?php echo constant('URL') ?>resources/assets/js/page/index.js"></script>
  <!-- Template JS File -->
  <!-- Custom JS File -->
  <script src="<?php echo constant('URL') ?>resources/assets/js/custom.js"></script>
  <script src="<?php echo constant('URL') ?>resources/assets/bundles/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
  <script src="<?php echo constant('URL') ?>resources/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="<?php echo constant('URL') ?>resources/assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="<?php echo constant('URL') ?>resources/assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="<?php echo constant('URL') ?>resources/assets/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <script src="<?php echo constant('URL') ?>resources/assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="<?php echo constant('URL') ?>resources/assets/bundles/select2/dist/js/select2.full.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="<?php echo constant('URL') ?>resources/assets/js/page/forms-advanced-forms.js"></script>
</body>
</html>
