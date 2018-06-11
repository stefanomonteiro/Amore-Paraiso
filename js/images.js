(() => {
  const cdnUrl = "http://res.cloudinary.com/sm-cdn/image/upload";

  Array.from(document.querySelectorAll("[data-img")).forEach(image => {
    const { clientWidth } = image;
    const pixelRatio = window.devicePixelRatio || 1.0;

    const imageParams = `w_${clientWidth * pixelRatio},f_auto,q_auto:eco`;
    const url = `${cdnUrl}/${imageParams}/${image.dataset.img}`;
    image.src = `${url}`;
    image.onload = function() {
      image.classList.remove("blur");
    };
  });

  Array.from(document.querySelectorAll("[data-bgimg]")).forEach(image => {
    const { clientWidth } = image;
    const pixelRatio = window.devicePixelRatio || 1.0;

    const imageParams = `w_${clientWidth * pixelRatio},f_auto,q_auto`;
    const url = `${cdnUrl}/${imageParams}/${image.dataset.bgimg}`;
    // console.log(image.dataset.bgimg);
    // image.style.backgroundImage = `linear-gradient( 0deg, rgba(#9b6062, 0.4), rgba(#9b6062, 0.4) ), url(${url})`;

    // image.style.backgroundImage = `url(${url})`;
    console.log("loaded");
  });
})();
