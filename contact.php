<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Amore Paraiso | Weddings & Events</title>
    <link async href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700|Roboto:400,500,700|Satisfy" rel="stylesheet">

    <!-- <link rel="stylesheet" href="css/style.homepage.css"> -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav class="navbar">
        <section class="navbar-top">
            <ul class="navbar-top__list">
                <li class="navbar-top__items">
                    <h1 class="navbar-top__title">Amore Paraiso | Weddings & Events</h1>
                </li>
                <li class="navbar-top__items">
                    <p class="navbar-top__text">Follow Us</p>
                </li>
                <li class="navbar-top__items">
                    <a href="" class="navbar-top__links" target="_blank">
                        <svg class="navbar-top__icons" tabindex="0">
                            <use xlink:href="images/svg/sprite.svg#icon-instagram2"></use>
                        </svg>
                    </a>
                </li>
                <li class="navbar-top__items">
                    <a href="" class="navbar-top__links" target="_blank">
                        <svg class="navbar-top__icons" tabindex="0">
                            <use xlink:href="images/svg/sprite.svg#icon-facebook"></use>
                        </svg>
                    </a>
                </li>
                <li class="navbar-top__items">
                    <p class="navbar-top__text">Contact Us</p>
                </li>
                <li class="navbar-top__items">
                    <a href="" class="navbar-top__links">
                        <svg class="navbar-top__icons" tabindex="0">
                            <use xlink:href="images/svg/sprite.svg#icon-mail"></use>
                        </svg>
                    </a>
                </li>
            </ul>
        </section>

        <section class="navbar-bottom">
            <ul class="navbar-bottom__list">
                <li class="navbar-bottom__items">
                    <a href="index.html" class="navbar-bottom__link">Home</a>
                </li>
                <li class="navbar-bottom__items">
                    <a href="about.html" class="navbar-bottom__link">About</a>
                </li>
                <li class="navbar-bottom__items">
                    <a href="our-weddings.html" class="navbar-bottom__link">Our Weddings</a>
                </li>
                <li class="navbar-bottom__items">
                    <a href="" class="navbar-bottom__link">
                        <img src="images/svg/logo.svg" alt="" class="navbar-bottom__logo">
                    </a>
                </li>
                <li class="navbar-bottom__items">
                    <a href="services.html" class="navbar-bottom__link">Services</a>
                </li>
                <li class="navbar-bottom__items">
                    <a href="contact.html" class="navbar-bottom__link">Contact</a>
                </li>
                <li class="navbar-bottom__items">
                    <a href="blog.html" class="navbar-bottom__link">Blog</a>
                </li>
            </ul>
        </section>

        <section class="navbar-mobile">
            <ul class="navbar-mobile__list">
                <li class="navbar-mobile__item">
                    <a href="" class="navbar-bottom__link">
                        <img src="images/svg/logo.svg" alt="" class="navbar-bottom__logo">
                    </a>
                </li>
                <li class="navbar-mobile__item">
                    <input type="checkbox" class="navbar-mobile__checkbox" id="checkbox-toggle">
                    <label for="checkbox-toggle" class="navbar-mobile__button">
                        <span class="navbar-mobile__icon">&nbsp;</span>
                    </label>
                    <div class="navbar-mobile__menu">
                        <ul class="navbar-mobile__menu-list">
                            <li class="navbar-mobile__menu-items">
                                <a href="index.html" class="navbar-mobile__menu-link">Home</a>
                            </li>
                            <li class="navbar-mobile__menu-items">
                                <a href="about.html" class="navbar-mobile__menu-link">About</a>
                            </li>
                            <li class="navbar-mobile__menu-items">
                                <a href="our-weddings.html" class="navbar-mobile__menu-link">Our Weddings</a>
                            </li>
                            <li class="navbar-mobile__menu-items">
                                <a href="services.html" class="navbar-mobile__menu-link">Services</a>
                            </li>
                            <li class="navbar-mobile__menu-items">
                                <a href="contact.html" class="navbar-mobile__menu-link">Contact</a>
                            </li>
                            <li class="navbar-mobile__menu-items">
                                <a href="blog.html" class="navbar-mobile__menu-link">Blog</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </section>
    </nav>
        
    <?php 
        $msg = '';
        $msgClass = '';
        $color = '';

        if (filter_has_var(INPUT_POST, 'submit')) {
            //Get Form DAta
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $message = htmlspecialchars($_POST['message']);

            //Check required fields
            if (!empty($name) && !empty($email) && !empty($message)) {
                //Validate Email
                if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                    $msg = 'Email not valid';
                    $msgClass = 'error';
                    $color = "red";
                }
                else{
                    $toEmail = 'hello@amoreparaiso.com';
                    $subject = 'Contact request from '. $name;
                    $body    = '<h2>Contact Request</h2> 
                                <h4>Name </h4><p>' .$name. '</p>
                                <h4>Message</h4><p>' . $message .'</p>';
                    
                    $headers = "MIME-Version: 1.0" ."\r\n";
                    $headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";

                    $headers .= 'From: '.$email."\r\n" .
                                'Reply-To: '.$email."\r\n" .
                                'X-Mailer: PHP/' . phpversion();

                    if (mail($toEmail, $message, $body, $headers)) {
                        $msg = 'Your Email was sent';
                        $msgClass = 'success';
                        $color = "green";
                    } else{
                        $msg = 'Your Email was not sent';
                        $msgClass = 'error';
                        $color = "red";
                    }


                }
            } else {
                $msg = 'Fill all fields';
                $msgClass = 'error';
                $color = "red";
            }
            
        }
    ?>

    <h2 class="section-title">Contact Us</h2>

    <section class="sidebar-template">

        <form action="contact.php" method="POST" class="form">
            <div class="form__group">
                <input type="text" name="name" id="name" placeholder="Your Name" class="form__input" value="<?php echo isset($_POST['name'])? $name : ''; ?>"   required>
                <label for="name" class="form__label">Your Name</label>
            </div>
            <div class="form__group">
                <input type="text" name="location" id="location" placeholder="Your Location" class="form__input" value="<?php echo isset($_POST['location'])? $location : ''; ?>"   required>
                <label for="location" class="form__label">Your Location</label>
            </div>
            <div class="form__group">
                <input type="tel" name="phone" id="phone" placeholder="Your Phone" class="form__input" value="<?php echo isset($_POST['phone'])? $phone : ''; ?>"   required>
                <label for="phone" class="form__label">Your Phone</label>
            </div>
            <div class="form__group">
                <input type="email" name="email" id="email" placeholder="Your Email" class="form__input" value="<?php echo isset($_POST['email'])? $email : ''; ?>"   required>
                <label for="email" class="form__label">Your Email</label>
            </div>
            <div class="form__group">
                <input type="text" name="date" id="date" placeholder="Preffered Event Date" class="form__input" value="<?php echo isset($_POST['date'])? $date : ''; ?>"   required>
                <label for="date" class="form__label">Preffered Event Date</label>
            </div>
            <div class="form__group">
                <input type="text" name="budget" id="budget" placeholder="Approx. Budget" class="form__input" value="<?php echo isset($_POST['budget'])? $budget : ''; ?>"   required>
                <label for="budget" class="form__label">Approx. Budget</label>
            </div>
            <div class="form__group">
                <select name="venue" id="venue">
                    <option value="beach">Beach</option>
                    <option value="mountain">Mountain</option>
                </select>
                <!-- <label for="venue" class="form__label">Venue</label> -->
            </div>
            <div class="form__group">
                <input type="text" name="budget" id="budget" placeholder="Approx. Budget" class="form__input" value="<?php echo isset($_POST['budget'])? $budget : ''; ?>"   required>
                <label for="budget" class="form__label">Approx. Budget</label>
            </div>

            <div class="form__group">
                <textarea name="message" id="message" cols="30" rows="10" placeholder="Your Message" value="<?php echo isset($_POST['message'])? $message : ''; ?>" class="form__textarea"  required></textarea>
                <label for="message" class="form__label">Your Message</label>
            </div>
            <div class="form__group">

                <?php if ($msg != ''): ?>
                    <p class="<?php echo $msgClass; ?>" style="background:<?php echo $color; ?>;"> <?php echo $msg; ?> </p>
                <?php endif; ?>

                <input type="submit" value="Submit" name="submit">
            </div>
        </form>

        <aside class="sidebar">
            <div class="sidebar__intro">
                <img src="/images/svg/logo.svg" alt="" class="sidebar__logo">
                <p class="sidebar__intro-p">Wedding planner in love with photography and flower decorating. Blogger.</p>
                <a href="" class="btn btn--border btn--border-white">Plan my wedding</a>
            </div>
            <section class="sidebar__section">
                <h4 class="sidebar__title">Latest Articles</h4>
                <ul class="sidebar__list">
                    <li class="sidebar__list-items">
                        <p>
                            <a href="/getting-married-In-costa-rica.html"> Getting Married In Costa Rica! </a>
                        </p>
                    </li>
                    <hr>
                    <li class="sidebar__list-items">
                        <p>
                            <a href="">Amet consectetur adipisicing lorem ipsum dolor sit.</a>
                        </p>
                    </li>
                    <hr>
                    <li class="sidebar__list-items">
                        <p>
                            <a href="">Lorem, ipsum dolor.</a>
                        </p>
                    </li>
                    <hr>
                    <li class="sidebar__list-items">
                        <p>
                            <a href="">Consectetur adipisicing elit. Aperiam, sapiente.</a>
                        </p>
                    </li>
                </ul>
            </section>
            <section class="sidebar__section">
                <h4 class="sidebar__title">Instagram</h4>
                <div class="section-instagram__feed" id="section-instagram__feed"></div>
            </section>
        </aside>

    </section>



    <footer class="footer section-padding">
        <section class="footer__info">
            <h4 class="footer__title">Contact Us</h4>
            <p class="footer__p">
                <small>US</small> +1 94394 432 344</p>
            <p class="footer__p">
                <small>CR</small> +506 8954 3423</p>
            <p class="footer__p">info@amoreparaiso.com</p>
            <p class="footer__p">
                <small>&copy;2018 Amore Paraiso Weddings and Events</small>
            </p>
        </section>
        <section class="footer__info">
            <h4 class="footer__title">Social Medias</h4>
            <div class="footer__social-medias">
                <ul class="footer__social-list">
                    <li class="footer__social-items">
                        <a href="" class="footer__social-link" target="_blank">
                            <svg class="footer__social-icons" tabindex="0">
                                <use xlink:href="images/svg/sprite.svg#icon-instagram2"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="footer__social-items">
                        <a href="" class="footer__social-link" target="_blank">
                            <svg class="footer__social-icons" tabindex="0">
                                <use xlink:href="images/svg/sprite.svg#icon-facebook"></use>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>

        </section>
    </footer>


    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script async src="js/navbar.js"></script>
    <script async src="js/slider.js"></script>
    <script defer src="js/instagram.js"></script>
    <script async src="js/images.js"></script>
    <script async src="js/misc.js"></script>
</body>

</html>