<?php
$about_title = "About KIIT University";
$about_content = "Kalinga Institute of Industrial Technology (KIIT) is a prominent educational institution in India, renowned for its rapid growth and commitment to excellence. Established in 1992–93 as an Industrial Training Institute, KIIT expanded in 1997 to offer undergraduate and postgraduate programs in Engineering, Management, and Computer Applications. Over the years, it has diversified into various fields, including Law, Biotechnology, Medical Sciences, Dental Sciences, Nursing, Mass Communication, Film and Media, Fashion, and more. Today, KIIT boasts a vibrant academic community with around 40,000 students, including 2,000 international students from 65 countries. The university's sprawling 36-square-kilometer campus features state-of-the-art facilities, such as a 2,600-bed super-specialty hospital (KIMS), a central research facility, multiple auditoriums, 18 sports complexes, and 30 food courts. KIIT's commitment to quality education is reflected in its accreditations from prestigious national and international bodies, including the Accreditation Board for Engineering and Technology (ABET), USA. The university's remarkable journey from its humble beginnings to its current stature is a testament to its dedication to academic excellence and social development.";
$about_link = "https://kiit.ac.in/about/#";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About KIIT University</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center text-primary"><?php echo $about_title; ?></h2>
            <p class="text-justify"><?php echo $about_content; ?></p>
            <div class="text-center mt-3">
                <a href="<?php echo $about_link; ?>" class="btn btn-primary" target="_blank">Learn More</a>
            </div>
        </div>
    </div>
</body>
</html>
