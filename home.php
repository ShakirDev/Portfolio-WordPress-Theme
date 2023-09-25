<?php

/**
 * Template Name: Custom Home Page
 *
 * This is the custom home page template.
 */

get_header();
?>

<!--Hero Section-->
<section id='pt-home' class="wmit-hero text-white py-5 d-md-flex align-items-center">
    <div class="container">
        <div class="row">
            <!-- For Mobile -->
            <div class="col-12 d-md-none text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/img/portfoliopic.jpg" alt="Portfolio Image" class="portfoliopic" />
            </div>

            <!-- For Tablet and Larger Screens -->
            <div class="col-md-5 col-sm-12 order-md-2 d-md-flex justify-content-end">
                <!-- The image here for tablets and larger screens -->
                <img src="<?php echo get_template_directory_uri(); ?>/img/portfoliopic.jpg" alt="Portfolio Image" class="portfoliopic d-none d-md-block" />
            </div>
            <div class="col-md-7 col-sm-12 order-md-1 mt-5 mt-sm-0">
                <h1 class="display-4">Hi, I'm Shakir <span class="wave-emoji">👋</span></h1>
                <p class="lead">I'm a skilled WordPress and front-end developer with expertise in crafting outstanding digital experiences. I excel in WordPress theme and plugin development and am proficient in front-end development using React.js. With over 4 years of experience, I'm passionate about coding and continually expanding my tech knowledge.</p>
                <div class="icon-text">
                    <i class="fas fa-map-marker-alt"></i> Uttara, Dhaka, Bangladesh
                </div>
                <div class="icon-text">
                    <i class="fas fa-circle"></i> Available for projects
                </div>
                <div class="social-icons">
                    <a href="https://www.linkedin.com/in/shakir-ahmed-joy-019aab12a/" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="https://github.com/ShakirDev/" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="https://www.instagram.com/shakirjoy/" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>

<!--About Me Section-->
<section class="wmit-aboutme" id="pt-aboutme">

    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center mt-5"><span class="aboutus-txt">About me</span></div>
        </div>
        <div class="row mt-5 pb-5">
            <div class="col-md-6 d-flex justify-content-center justify-content-md-start">
                <img src="<?php echo get_template_directory_uri(); ?>/img/aboutpic.jpg" alt="Portfolio Image" class="portfolioabtpic" />
            </div>
            <div class="col-md-6 mt-sm-5">
                <h2 class="about-heading">Curious about me? Here you have it:</h2>
                <p class="about-paragraph mt-3 ">I'm a dedicated and self-taught programmer who embarked on this journey back in 2019. It all began when I found myself in isolation due to a COVID infection, far from family and friends. During that solitary time, I discovered my passion for programming, and in that very year, I delved into the world of WordPress.</p>
                <p class="about-paragraph">My expertise lies in the art of creating flawlessly precise WordPress websites, transforming designs from Figma or PSD into reality using page builders or custom themes. Crafting custom plugins to unlock advanced functionality in WordPress is also in my repertoire. With proficiency in PHP, OOP, JS, JQuery, Bootstrap, and Tailwind CSS, I boast over three years of professional experience serving esteemed companies in Bangladesh. I've had the privilege of crafting over 100 websites for both companies and clients alike.</p>
                <p class="about-paragraph">My enthusiasm for programming knows no bounds, and I'm a swift learner, always eager to embrace new technologies. By the close of 2023, my goal is to emerge as a Full Stack Developer. I've already achieved a <a href='https://www.udemy.com/certificate/UC-2fd9befc-bb13-418c-93df-10a7db1c542e/' target="_blank" class="bio-clink"> certificate</a> from Udemy as a MERN Stack developer and have contributed to three projects as a support engineer, marking just the beginning of my journey into the world of tech.</p>
                <button type="button" class="btn btn-primary btn-lg mt-3">Download CV</button>
            </div>
        </div>

    </div>

</section>

<section class="wmit-skills" id="pt-tech">
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center mt-5">
                <span class="aboutus-txt">Technologies</span>
            </div>
            <div class="col-md-12 d-flex justify-content-center mt-4">
                <span class="skills-txt">The skills, tools, and technologies I am really good at:</span>
            </div>
        </div>

        <div class="row pt-5 pb-3 d-flex justify-content-center">
            <div class="skills-name col-md-8 text-center d-flex justify-content-center justify-content-md-start justify-content-sm-start flex-wrap">
                <?php
                // Create an associative array to map text to image filenames
                $tech_image_map = array(
                    "PHP" => "php.png",
                    "Java-Script" => "javascript.png",
                    "Node-JS" => "node-js.png",
                    "Express-JS" => "express-js.png",
                    "React" => "react.png",
                    "mySQL" => "mysql.png",
                    "mongodb" => "mongodb.png",
                    "Tailwind-CSS" => "tailwind-css.png",
                );

                $tech_items = array_keys($tech_image_map);

                foreach ($tech_items as $item) :
                    $image_filename = isset($tech_image_map[$item]) ? $tech_image_map[$item] : ''; // Get the image filename
                    $image_src = get_template_directory_uri() . '/img/' . $image_filename;
                ?>
                    <div class="col-md-3 col-sm-6 col-6 text-center mb-4">
                        <div class="skills-div">
                            <img src="<?php echo $image_src; ?>" alt="<?php echo $item; ?>" class="skills-img" />
                            <p class="pt-4"><?php echo $item; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>


<!--Portfolio -->
<section class="wmit-aboutme" id="pt-portfolio">
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center mt-5">
                <span class="aboutus-txt">Portfolios</span>
            </div>
            <div class="col-md-12 d-flex justify-content-center mt-4">
                <span class="skills-txt">Some of the noteworthy projects I have built:</span>
            </div>
        </div>
        <div class="portfolio-section mt-5 pb-5">

            <?php echo do_shortcode('[portfolio]'); ?>
        </div>


</section>


<!--FAQ Section -->

<section class="wmit-skills" id="pt-faq">
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center mt-5">
                <span class="aboutus-txt">FAQ</span>
            </div>
            <div class="col-md-12 d-flex justify-content-center mt-4">
                <span class="skills-txt">Questions I frequently got asked from my clients</span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mt-5 pb-5">
                <?php get_template_part('template-parts/faq-section'); ?>
            </div>
        </div>
    </div>
</section>

<!--Testimonial Section -->
<section class="wmit-aboutme" id="pt-testimonial">
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center mt-5">
                <span class="aboutus-txt">Testimonial</span>
            </div>
            <div class="col-md-12 d-flex justify-content-center mt-4">
                <span class="skills-txt">Nice things people have said about me:</span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mt-5 pb-5">
                <!-- Include the testimonials.php file here -->
                <?php get_template_part('template-parts/testimonials'); ?>
            </div>
        </div>
    </div>
</section>


<!--Contact Section-->

<section class="wmit-skills" id="pt-contact">
    <div class="container">


        <div class="row">
            <div class="col-md-12 d-flex justify-content-center mt-5">
                <span class="aboutus-txt">Contact</span>
            </div>
            <div class="col-md-12 d-flex justify-content-center mt-4">
                <span class="skills-txt text-center">What’s next? Feel free to reach out to me if you're looking for <br> a developer, have a query, or simply want to connect.</span>
            </div>
        </div>
        <div class="row">
            <div class="text-contact col-md-12 text-center mt-10">
                <a href="mailto:shakirahmed.joy@gmail.com">
                    <i class="fa-solid fa-envelope"></i> shakirahmed.joy@gmail.com
                </a>
            </div>
            <div class="text-contact col-md-12 text-center mt-2">
                <a href="https://wa.me/8801728178905">
                    <i class="fa-brands fa-whatsapp"></i> +8801728178905
                </a>
            </div>

        </div>

        <div class="col-md-12 d-flex justify-content-center mt-10">
            <span class="skills-txt text-center">You may also find me on these platforms!</span>
        </div>
        <div class="social-icons d-flex justify-content-center pb-5">
            <a href="https://www.linkedin.com/in/your-linkedin-profile" target="_blank" rel="noopener noreferrer">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="https://github.com/your-github-profile" target="_blank" rel="noopener noreferrer">
                <i class="fab fa-github"></i>
            </a>
            <a href="https://www.instagram.com/your-instagram-profile" target="_blank" rel="noopener noreferrer">
                <i class="fab fa-instagram"></i>
            </a>
        </div>


    </div>


</section>
<?php
get_footer();
