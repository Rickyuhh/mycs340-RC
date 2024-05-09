<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Barry University Computer Science Spring 2024 Programming for the Web</title>
        <meta charset="UTF-8"/>
        <meta name="keywords" content="we programming, computer science, javascript"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" type="text/css" href="css/front_page.css">
        <script src = "./JavaScript/p5/p5.js"></script>
        <script src="./JavaScript/shape.js"></script>
    </head>
    <nav class="nav_menu">
        <ul class="nav_list">
            <li class="nav_list_logo">
                <p> LOGO </p>
            </li>
            <li class="nav_list_li"><a href="index.php" title="Home page">Home</a></li>
                    <li><a href="HTML/registration.php">Course Schedule</a></li>
                    <li><a href="HTML/student_reg.php">Student Admission</a></li>
                    <li><a href="HTML/assignments.php">Assignments</a></li>
                    <li><a href="HTML/grade_report.php">Grade Report</a></li>
            <li class="nav_list_li"><a href="#" title="About Us">Help</a></li>
        </ul>
    </nav>
    <body>
    <div id="header_container">
        <header>
            <h1>Department of Computer Science and Mathematics</h1>
            <h2>Programming for the Web Project</h2>
            <h3>Spring 2024</h3>
        </header>
    </div>
    <div class="div_d_pg_explained">
        <div>
            <header>
                <h2 id="title_content_page">Dynamic Websites Explained</h2>
            </header>
            <p>A dynamic website is an ever-evolving digital space that transforms to fit your needs and interests. dynamic websites utilize advanced technologies to fluidly adjust and update in real-time. From interactive forms to personalized user experiences, the dynamic nature of these sites is what sets them apart. For example, an e-commerce site personalizes its product suggestions based on your browsing history. When it comes to mastering dynamic web development techniques, trusted sources like MDN Web Docs and W3Schools have been proven to help. They offer reliable information and resources to help you take your dynamic website to the next level.</p>
        </div>
        <article class="article_container">
            <!-- insert two pics when hovering -->
            <p></p>
            <section class="flex-item html_section">
                <h5>Hyper Text Markup Language &lpar;HTML&rpar;</h5>
                <img class="img" src="images/img1.jpg"/>
                <p class="section_p html_p">HTML is an essential tool for organizing online content. As a fundamental markup language, its purpose is to define the elements and structure of a web page, guiding browsers to properly display the information. With its system of tags, like &lt;p&gt; and &lt;h1&gt;, HTML makes it easy to present and manage content. As updates are introduced, each version of HTML offers new features and improvements to elevate the possibilities of web development.
                    In earlier iterations of HTML, like the 4.01 version, the main goal was to establish a consistent method for organizing web content. It brought in crucial elements like headings, paragraphs, lists, and links, laying the groundwork for creating web pages. Additionally, HTML 4.01 provided capabilities for managing forms, enabling users to enter data and engage with web services. Despite these innovations, its shortcomings in supporting multimedia and document structure ultimately spurred the development of more advanced versions of HTML.
                    In 2014, a groundbreaking technology by the name of HTML5 transformed the world of web development by tackling previous limitations head-on. By effectively integrating support for audio and video elements (&lt;audio&gt; and &lt;video&gt;), HTML5 eliminated the need for external plugins such as Flash. Additionally, the introduction of the &lt;canvas&gt; element made it possible to draw graphics directly on web pages, and the use of semantic elements (&lt;article&gt;, &lt;section&gt;, &lt;header&gt;, &lt;footer&gt;) improved document structure and accessibility. These remarkable advancements represented a monumental advancement in web development, empowering developers to design interactive and visually captivating websites.
                                                </p>
            </section>
            <section class="flex-item css_section">
                <h5>Cascading Style Sheet &lpar;CSS&rpar;</h5>
                <img class="img" src="images/img2.jpg"/>
                <p class="section_p ccs_p">CSS is an integral part of web development, providing a crucial stylesheet language for separating presentation and layout concerns from the structure of HTML documents. It grants developers the power to specify the visual design of HTML elements, including factors such as color, font, spacing, and positioning. Embracing a cascading principle, styles can be inherited and overridden, maintaining consistency and enabling quick updates across numerous pages. As CSS evolves from older versions to advanced CSS3, it brings forth exciting new features, from transitions and animations to responsive design capabilities. By playing a pivotal role in creating cohesive and refined website aesthetics, promoting accessibility, and empowering developers, CSS proves to be an essential component in the web development process.</p>
            </section>
            <section class="flex-item script_section">
                <h5>Scripting</h5>
                <img class="img" src="images/img3.jpg"/>
                <p class="section_p script_p">Client-side scripting is a powerful tool for web development, as it allows for dynamic changes to a webpage without the need for a server request. In this process, scripts are executed on the user's browser, giving developers the ability to manipulate the Document Object Model (DOM). Unsurprisingly, JavaScript is a popular choice for client-side scripting due to its versatility and ease of use. By utilizing the DOM, developers can create interactive components such as form validations, animations, and responsive user interfaces. A login form that quickly verifies entered information or a slideshow that smoothly transitions between images are just a few examples of the potential outcomes of client-side scripting. These capabilities not only enhance the user experience but also make website maintenance and updates more efficient.
                    Conversely, server-side scripting comprises of scripts executed on a web server, producing live content prior to its arrival at the user's web browser. Popular server-side scripting languages include PHP, Python, and Ruby, all of which are responsible for tasks like communicating with databases, verifying user credentials, and creating dynamic web pages. For example, upon submitting a form, server-side scripting takes charge by handling data, communicating with databases to store or retrieve information, and ultimately producing an updated webpage. The distinction between client-side and server-side scripting ensures a streamlined and safeguarded web development approach, striking a fine balance between user interaction and server-based functionalities.
                </p>
            </section>
        </article>
    </div>
    <main class="geo_main_section">
        <div class="geo_section">
            <h2>Check your Geometry Skills</h2>
        </div>
        <div class="shapes_container">
            <div class="trivial_geo type_selected">
            <p id="message" name="message"></p>
                <form class="shapecalculation" onsubmit="return false" >
                    <select id="shape_selected" name="shape_selected" onchange="getType()">
                            <option value="Select a Shape">Select a Shape</option>
                            <option value="Square">Square</option>
                            <option value="Rectangle">Rectangle</option>
                            <option value="Circle">Circle</option>
                            <option value="Triangle">Triangle</option>
                            <option value="Right Triangle">Right Triangle</option>
                            <option value="Parallelogram">Parallelogram</option>
                            <option value="Trapezoid">Trapezoid</option>
                            <option value="Cube">Cube</option>
                            <option value="Prism">Prism</option>
                            <option value="Pyramid or Cone">Pyramid or Cone</option>
                            <option value="Sphere">Sphere</option>
                    </select>
                    <div id="space_between">
                        <label id="lblId_len" name="lblId_len" style="display:none">Enter the length</label>
                        <input type="text" id="txtId_len" name="txtId_len" style="display:none">
                        <br>
                        <label id="lblId_width" name="lblId_width" style="display:none">Enter the width</label>
                        <input type="text" id="txtId_width" name="txtId_width" style="display:none">
                        <br>
                        <label id="lblId_height" name="lblId_height" style="display:none">Enter the height</label>
                        <input type="text" id="txtId_height" name="txtId_height" style="display:none">
                        <br>
                        <input id="btn_submit" type="submit" value="Calculate" onclick="getTypeParameter()">
                    </div>
                </form>
            </div>
            <div class="trivial_geo cal_results">
                <h3 id="geo_header">Result</h3>
                <br>
                <label id="lblId_perimeter" name="lblId_perimeter"></label>
                <br>
                <label id="lblId_area" name="lblId_area"></label>
                <br>
                <label id="lblId_volume" name="lblId_volume"></label>
                <br>
                <div id="dr_shape">
                    <canvas id="geo_canvas">
                    </canvas>
                </div>
            </div>
            <div class="trivial_geo result_explained">
                <h3 id="geo_header">Geometrical Shape Explanation</h3>
                <h6 id="shape_titleID"></h6><br>
                <label class="shape_def" id="object_def"></label>
                <p id="object_explanation"></p>
                <p id="object_explanation1"></p>
                <label  class="shape_def" id="formulas"></label><br>
                <label  class="shape_def" id="area_formula"></label><br>
                <label  class="shape_def" id="volume_formula"></label>
            </div>
        </div>
    </main>
    </body>
    <footer>
    </footer>
</html>