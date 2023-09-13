// RECORD JS 
// Verify devices permissions access: no app media 

const devicesStatus = document.querySelector('.devices-status');

const snackbar = () => {
    setTimeout(() => {
        devicesStatus.classList.add('hide');
    }, 10000);
};

// Check access permissions

navigator.permissions.query({ name: 'microphone' }).then(function(result) {
    if (result.state == 'granted') {
        devicesStatus.innerHTML = 'Devices Access Granted.';
        snackbar();
    } else if (result.state == 'prompt') {
        devicesStatus.innerHTML = '';
        snackbar();
    } else if (result.state == 'denied') {
        devicesStatus.innerHTML = 'Please Enable Microphone Device.';
        snackbar();
    }
});

// media button

const title = document.querySelector('.title');
const rec = document.querySelector('.rec');
const stop = document.querySelector('.stop');
const audioPlay = document.querySelector('.audio');
const stopwatch = document.querySelector('.stopwatch');


let typeOfMedia = {
    audio: true
};
 
let chunks = [];
var options = {
        audioBitsPerSecond: 128000,
        videoBitsPerSecond: 2500000,
        mimeType: 'audio/webm'
    }
    // Download counter
let counter = 0;

//
// ───REC FUNCTION ───────────────────────────────────────

// RecStream init
let recStream;

const recFunction = async() => {
    try {
        // Access to computer devices
        const mediaDevices = await navigator.mediaDevices.getUserMedia(typeOfMedia)
        if (mediaDevices.active === true) { 
            recStream = new MediaRecorder(mediaDevices, options);
            recStream.ondataavailable = e => {
                    chunks.push(e.data);
                    // If state inactive stop recording
                    if (recStream.state == 'inactive') {
                        let blob = new Blob(chunks, { type: 'audio/webm' });
                        createAudioElement(URL.createObjectURL(blob))
                    }
                }
            recStream.start()
        }
    } catch (error) {
        if (error) console.log(error);
    }
}


let linkStyles = "display: block; padding: 10px; color:red; text-decoration: none; "
    
    //─── FUNCTION TO CREATE AN AUDIO ELEMENT TO PLAYBACK AND DOWNLOAD RECORDING ─────

function createAudioElement(blobUrl) {
    
    const divEl = document.createElement('div');
    divEl.className = 'div-audio'
    const downloadEl = document.createElement('a');
    downloadEl.style = linkStyles;
    downloadEl.innerHTML = `DOWNLOAD HERE-${counter = counter + 1}`;
    downloadEl.download = `Audio-${counter}.webm`;
    downloadEl.href = blobUrl;
    const audioEl = document.createElement('audio');
    audioEl.className = 'audio'
    audioEl.controls = true;
    const sourceEl = document.createElement('source');
    sourceEl.src = blobUrl;
    sourceEl.type = 'audio/webm';
    audioEl.appendChild(sourceEl);
    divEl.appendChild(audioEl)
    divEl.appendChild(downloadEl)
    document.body.appendChild(divEl);
}

// REC CLICK BUTTON EVENT LISTENER 

rec.onclick = e => {

        rec.disabled = true;
        rec.style.backgroundColor = 'green';
        rec.classList.add('scale');
        stop.disabled = false;
        stop.style.background = 'rgb(77, 0, 0)';
        stop.style.color = '#ffffff';
        title.style.color = 'rgb(77, 0, 0)'
            // Start recording
        recFunction()
            // START STOPWATCH
        clearInterval(swInterval);
        swIternal = setInterval(stopwatchFunction, 1000);
    }
    // STOP REC BUTTON EVENT LISTENER

stop.onclick = e => {
    rec.disabled = false;
    rec.style.backgroundColor = 'rgb(77, 0, 0)';
    rec.classList.remove('scale');
    stop.disabled = true;
    stop.style.backgroundColor = '#292929';
    stop.style.color = 'rgb(103, 103, 103)';
    title.style.color = '#313142'
    clearInterval(swIternal);
    sec = 0;
    min = 0;
    recStream.stop()

}

// STOPWATCH

let swInterval;
let displayStopwatch;
let sec = 0;
let min = 0;
let stopwatchFunction = () => {
    sec++
    if (sec <= 9) {
        sec = '0' + sec;
    }
    if (sec === 60) {
        sec = 0;
        min++
        if (min <= 9) {
            min = '0' + min;
        }
    }
    if (min === 60) {
        min = 0;
    }
    displayStopwatch = 'min: ' + min + ' : ' + 'sec: ' + sec;
    stopwatch.innerHTML = displayStopwatch;
}; 