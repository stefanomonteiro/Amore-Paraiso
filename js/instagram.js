const $token = "7493445319.4334a01.0063df2e037f49bfb87bda63f843f32c";
const imagesNumber = 8;

$.getJSON(
  "https://api.instagram.com/v1/users/self/media/recent/?access_token=" + $token
).done(function(data) {
  console.log(data.data);

  const screenWidth = window.screen.width;
  const pixelRatio = window.devicePixelRatio;

  for (let i = 0; i < imagesNumber; i++) {
    let imgSrc = data.data[i].images.standard_resolution.url;
    if (pixelRatio < 2) {
      imgSrc = data.data[i].images.low_resolution.url;
    }
    if (screenWidth < 700) {
      imgSrc = data.data[i].images.thumbnail.url;
    }

    //* Get size of <figure> and fetch image accordinly.
    //* Append the <figure> before get its width, then append <img>
    // const figure = document.querySelector(".section-instagram__figure");
    //const width = figure.clientWidth;
    // console.log(figure);

    let optimizedImgSrc = `https://res.cloudinary.com/sm-cdn/image/fetch/q_auto:eco,f_auto/${imgSrc}`;

    let postLink = data.data[i].link;
    let likes = data.data[i].likes.count;
    let comments = data.data[i].comments.count;

    $(".section-instagram__feed")
      .append(`<a href=${postLink} alt='Instagram Feed' target='_blank' class='section-instagram__link'> \
          <span class='section-instagram__span'> \
            <svg class='section-instagram__icons' tabindex='0'> \
              <use xlink:href='images/svg/sprite.svg#icon-heart'></use> \ 
            </svg> \
            ${likes} \
            <svg class='section-instagram__icons' tabindex='0'> \
              <use xlink:href='images/svg/sprite.svg#icon-comment'></use> \
            </svg> \
            ${comments} \
          </span> \
          <figure class='section-instagram__figure'> \
            <img src=${optimizedImgSrc} class='section-instagram__image'> \ 
          </figure> \
        </a> `);
  }
});
