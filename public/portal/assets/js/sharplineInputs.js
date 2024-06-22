
  /* upload audio file */
  function handleFiles(event) { 
      var files = event.target.files;
      console.log(files);
      $(".track").attr("src", URL.createObjectURL(files[0]));
      document.querySelector(".track").load();
      console.log(event);
      $("div.player").toggleClass('d-none');
      $(".file-upload-wrapper").toggleClass('d-none');
  }
//   document.querySelector(".audiofile").addEventListener("change", handleFiles, false);
    $('.audiofile').change(handleFiles);
  $('.track').each(function(index, audio) {
      $(audio).on('canplay', function() {
          console.log(audio.duration);
          $(".duration")[0].innerHTML = sec2time(audio.duration);
          $(".timeslieder")[0].max = audio.duration * 1000;
      });
  });

  /* start button */
  $(".start").click(function() {
      $(".track")[0].play();
      $(this).toggleClass('d-none');
      $(".pause").toggleClass('d-none');
  });
  /* pause button */
  $(".pause").click(function() {
      $(".track")[0].pause();
      $(this).toggleClass('d-none');
      $(".start").toggleClass('d-none');
  });
  /* reset button */
  $(".reset").click(function() {
      $(".track")[0].load();
      $(".start").toggleClass('d-none');
      $("#pause").toggleClass('d-none');
  });
  /* timeupdate log */
  $(".track")[0].addEventListener('timeupdate', function() {
      var currentTimeSec = this.currentTime;
      var currentTimeMs = this.currentTime * 1000;
      $(".currentTime")[0].innerHTML = sec2time(currentTimeSec);
      $(".timeslieder")[0].value = currentTimeMs;
      initRangeEl();
      var arrayTime = [sec2time(currentTimeSec), currentTimeMs];
      console.log(currentTimeMs);
  }, false);

  function sec2time(timeInSeconds) {
      var pad = function(num, size) {
              return ('000' + num).slice(size * -1);
          },
          time = parseFloat(timeInSeconds).toFixed(3),
          hours = Math.floor(time / 60 / 60),
          minutes = Math.floor(time / 60) % 60,
          seconds = Math.floor(time - minutes * 60),
          milliseconds = time.slice(-3);
      return pad(hours, 2) + ':' + pad(minutes, 2) + ':' + pad(seconds, 2);
  }


  /* timeline slieder */
  function valueTotalRatio(value, min, max) {
      return ((value - min) / (max - min)).toFixed(2);
  }

  function getLinearGradientCSS(ratio, leftColor, rightColor) {
      return [
          '-webkit-gradient(',
          'linear, ',
          'left top, ',
          'right top, ',
          'color-stop(' + ratio + ', ' + leftColor + '), ',
          'color-stop(' + ratio + ', ' + rightColor + ')',
          ')'
      ].join('');
  }

  function updateRangeEl(rangeEl) {
      var ratio = valueTotalRatio(rangeEl.value, rangeEl.min, rangeEl.max);
      rangeEl.style.backgroundImage = getLinearGradientCSS(ratio, '#3b87fd', '#fffcfc');
  }

  function initRangeEl() {
      var rangeEl = document.querySelector(".timeslieder");
      updateRangeEl(rangeEl);
      rangeEl.addEventListener("input", function(e) {
          updateRangeEl(e.target);
      });
  }

  $(".timeslieder")[0].addEventListener("input", function(e) {
      updateRangeEl(e.target);
      this.value = e.target.value;
      $(".track")[0].currentTime = e.target.value / 1000;
  });

// const addInputBtn = document.querySelector('.addInput');
// const removeInputBtn = document.querySelector('.removeInput');
// const inputContainer = document.querySelector('.container-fluid .row-fluid-input');
// addInputBtn.addEventListener('click', (event) => {
//     const createDiv = document.createElement('div');
//     createDiv.className = 'row';

//     createDiv.innerHTML = `<div class="col-lg-4">
//     <div class="form-group">
//         <label for="artist">Artist</label>
//         <select class="form-control" id="exampleFormControlSelect2">
//             <option>Primary Artist</option>
//             <option>Featured Artist</option>
//         </select>
//     </div>
// </div>
// <div class="col-lg-7">
//     <div class="form-group">
//         <label for=""></label>
//         <input type="text" name="#" id="" class="form-control" placeholder="Artist Name">
//     </div>
// </div>

// <div class="col-lg-1 d-flex align-items-center justify-content-between p-0 mt-4">
//     <div class="form-group d-flex align-items-center form-remove-add">
//         <a href="#" class="addInput">+</a>
//         <a href="#" class="removeInput">x</a>
//     </div>
// </div>`;

// console.log(createDiv);
// inputContainer.appendChild(createDiv)

//     event.preventDefault();
//     return true;
// });


// document.querySelector('.removeInput').addEventListener('click', (event) => {
//     console.log(event.target)
//     console.log(event.target.parentElement.parentElement.parentElement)
//     event.target.parentElement.parentElement.parentElement.remove()
//     event.preventDefault();
//     return true;
// })

// {/* <div class="col-lg-1 d-flex align-items-center justify-content-between p-0 mt-4">
//                                 <div class="form-group d-flex align-items-center form-remove-add">
//                                     <a href="#" class="addInput">+</a>
//                                     <a href="#" class="removeInput">x</a>
//                                 </div>
//                             </div> */}



  document.querySelector('.cross').addEventListener('click', (event) => {

    document.querySelector('.image-album').style.display = 'none';
    document.querySelector('#readUrl').value = ''
    document.querySelector('#readUrl').style.display = 'block'
    event.preventDefault();
    return true;
  })


  
  document.querySelector(".audiofile").addEventListener('change', function(event) {
    // const valAudInput = document.querySelector('#audiofile').name;
    // document.querySelector('.audio-name').textContent = valAudInput
    // console.log(valAudInput)
    const songName = $('.audiofile').name;
    // console.log(songName)
    event.preventDefault();
    return true;
  })