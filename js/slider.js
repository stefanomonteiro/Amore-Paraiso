$(document) //make sure page is loaded
  .ready(function() {
    //Set Options
    const speed = 500; //Fade Speed
    let autoSwitch = false; //Auto Slider Option
    const autoSwitch_Speed = 4000; //Auto Rotation Speed
    var interval;

    //Add Initial Active Class
    $(".section-testimonials__box")
      .first()
      .addClass("section-testimonials__box--active");

    //Initial Active Class for Bullets
    $(".slider__control-bullets-item")
      .first()
      .addClass("slider__control-bullets-item--active");

    //Slide Switch
    function slideSwitch() {
      $(".oldActive").removeClass("oldActive");
      $(".oldActive").fadeOut(speed);
      setTimeout(() => {
        $(".section-testimonials__box--active").fadeIn(speed);
      }, 500);
    }

    //Bullet Switch - Add Class to Bullets According to Active Slide
    function bulletSwitch() {
      $(".slider__control-bullets-item--active").removeClass(
        "slider__control-bullets-item--active"
      );
      const slideActive = $(".section-testimonials__box--active");
      const slideNumber = $(".section-testimonials__box").index(slideActive);
      $(".slider__control-bullets-item")
        .eq(slideNumber)
        .addClass("slider__control-bullets-item--active");
    }

    //Slider Rotation Function
    function sliderRotation() {
      $(".section-testimonials__box--active")
        .removeClass("section-testimonials__box--active")
        .addClass("oldActive");
      if ($(".oldActive").is(":last-child")) {
        $(".section-testimonials__box")
          .first()
          .addClass("section-testimonials__box--active");
      } else {
        $(".oldActive")
          .next()
          .addClass("section-testimonials__box--active");
      }
      slideSwitch();
      bulletSwitch();
    }

    //Auto Rotation
    if (autoSwitch == true) {
      interval = setInterval(sliderRotation, autoSwitch_Speed);
      $(".section-testimonials__box")
        .mouseover(function() {
          clearInterval(interval);
        })
        .mouseleave(function(e) {
          interval = setInterval(sliderRotation, autoSwitch_Speed);
        });
    }

    //Stop Auto Rotation and Restart on Control Click
    //Not working properly - interval bugs when resart after multiple clicks
    function pauseOnClick() {
      clearInterval(interval);
      setTimeout(() => {
        interval = setInterval(sliderRotation, autoSwitch_Speed);
      }, 5000);
    }

    //Next Button
    $("#slider__control-button-arrow--next").on("click", function() {
      // pauseOnClick();
      clearInterval(interval);
      sliderRotation();
    });

    //Prev Button
    $("#slider__control-button-arrow--prev").on("click", function() {
      // pauseOnClick();
      clearInterval(interval);
      $(".section-testimonials__box--active")
        .removeClass("section-testimonials__box--active")
        .addClass("oldActive");
      if ($(".oldActive").is(":first-child")) {
        $(".section-testimonials__box")
          .last()
          .addClass("section-testimonials__box--active");
      } else {
        $(".oldActive")
          .prev()
          .addClass("section-testimonials__box--active");
      }
      slideSwitch();
      bulletSwitch();
    });

    //Select Slide on Bullets Click
    $(".slider__control-bullets-item").click(function() {
      // pauseOnClick();
      clearInterval(interval);

      //Removes All Active Classes
      $(".slider__control-bullets-item--active").removeClass(
        "slider__control-bullets-item--active"
      );
      $(".section-testimonials__box--active").removeClass(
        "section-testimonials__box--active"
      );
      $(".oldActive").removeClass("oldActive");
      $(".oldActive").fadeOut(speed);

      //Add Active Class On Clicked Bullet
      $(this).addClass("slider__control-bullets-item--active");

      //Find The Clicked Bullets Index
      let bulletActive = $(".slider__control-bullets-item--active");
      let bulletNumber = $(
        ".slider__control-bullets-group .slider__control-bullets-item"
      ).index(bulletActive);

      //Add Active Class to Same Index Slide as Clicked Bullets
      $(".section-testimonials__box")
        .eq(bulletNumber)
        .addClass("section-testimonials__box--active");
    });

    //end
  });
