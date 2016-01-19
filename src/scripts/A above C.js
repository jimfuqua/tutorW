<html>
<head>
<script >
window.audioContext = new (window.AudioContext || window.webkitAudioContext)();

var oscillator = window.audioContext.createOscillator();
oscillator.frequency.value = 440; // The A above middle C
oscillator.connect(window.audioContext.destination);
oscillator.noteOn(window.audioContext.currentTime);
oscillator.noteOff(window.audioContext.currentTime + 1.0);
</>
</head>
