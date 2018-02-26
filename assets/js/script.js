function Audio() {

  this.currentlyPlaying;
  this.audio = document.createELement('audio');

  this.setTrack = function(src) {
    this.audio.src = src;
  }

}
