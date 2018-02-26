var currentPlaylist = [];
var audioElement;

function Audio() {

	this.currentlyPlaying;
	this.audio = document.createElement('audio');

	this.setTrack = function(src) {
		this.audio.src = src;
	}

  this.play = function() {
    $('.controlButton.play').hide();
    $('.controlButton.pause').show();
    this.audio.play();
  }

  this.pause = function() {
    $('.controlButton.pause').hide();
    $('.controlButton.play').show();
    this.audio.pause();
  }

}
