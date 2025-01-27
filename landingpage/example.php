<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <meta name="facebook-domain-verification" content="99qsuolau62f1hsc4bso3a1ad0fdsz" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dynami Tecnologia</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.12.1/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Jquery and AJAX -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <title>Document</title>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="styles.css" rel="stylesheet" />
    <!-- Scripts -->
    <script>
        $(document).ready(function() {
            $("button").click(function() {
                let valNome = $("input[name=nome]").val();
                let valFone = $("input[name=fone]").val();
                let valEmail = $("input[name=email]").val();
                let valSis = $("select option:checked").val();
                let valObs = $("textarea").val();

                if (valNome != "" && valFone != "" && valEmail != "" && valSis != "") {
                    console.log('1ºif');
                    if (/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(valEmail)) {
                        console.log('2ºif');
                        if (/(?:(^\+\d{2})?)(?:([1-9]{2})|([0-9]{3})?)(\d{4,5})(\d{4})$/.test(valFone)) {
                            console.log('3ºif');
                            $.post("insert.php", {
                                nome: valNome,
                                fone: valFone,
                                email: valEmail,
                                sis: valSis,
                                obs: valObs
                            }).done(function(data) {
                                res = $.parseJSON(data);
                                if (res.status == "400") {
                                    alert("Erro de requerimento\n" + res.msg + "\nStatus " + res.status)
                                } else if (res.status == "200") {
                                    document.getElementById("myForm").reset();
                                    alert(res.msg)
                                }
                            }, "json").fail(function() {
                                alert("Requisição interrompida, tente novamente mais tarde")
                            });
                        } else {
                            alert("telefone invalido")
                        }
                    } else {
                        alert("Email invalido")
                    }
                } else {
                    alert("campo vazio!")
                }
            })
        })
    </script>

</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">DYNAMI</a><button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu<i class="fas fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contato</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#projects">Produtos</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#signup">Sobre Nós</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container d-flex h-100 align-items-center">
            <div class="mx-auto text-center">
                <h1 class="mx-auto my-0 text-uppercase">Dynami Tecnologia</h1>
                <h2 class="text-white-50 mx-auto mt-2 mb-5">Especializada em sistemas web</h2>
                <!-- <a class="btn btn-primary js-scroll-trigger" href="#about">Get Started</a> -->
            </div>
        </div>
    </header>
    <!-- About-->
    <section class="about-section text-center" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="text-white mb-4">Não se trata apenas de sistema, se trata de conectar pessoas</h2>
                    <p class="text-white-50">Conectamos empreendedores, coloboradores e clientes levando oportunidade e crescimento em conjunto!!<br><br>
                        Somos especializados em sistemas web, trazendo tecnologia digital, com a portabilidade de ter seu sistema com total acesso por todos os dispositivos..
                        <br>

                    </p>
                </div>
            </div>
            <img class="img-fluid" src="assets/img/ipad.png" alt="" />
        </div>
    </section>
    <!-- Projects-->
    <section class="projects-section bg-light" id="projects">
        <div class="container">

            <!-- Featured Project Row-->
            <div class="row align-items-center no-gutters mb-4 mb-lg-5">
                <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="assets/img/dynami-inteligency.png" alt="" /></div>
                <div class="col-xl-4 col-lg-5">
                    <div class="featured-text text-center text-lg-left">
                        <h4>SOLUÇÕES WEB INTELIGENTES</h4>
                        <p class="text-black-50 mb-0">Para atingir seus objetivos é necessário produtividade e inteligência nas rotinas diárias, controlando seus processos de crescimento!</p>
                    </div>
                </div>
            </div>

            <h2 id="produtos">PRODUTOS</h2>
            <!-- Project One Row-->
            <div class="row justify-content-end no-gutters mb-5 mb-lg-0" id="project1">
                <!--  <div class="col-lg-6"><img class="img-fluid" src="assets/img/demo-image-02.jpg" alt="" /></div> -->
                <!-- <div class="col-lg-6"></div> -->
                <div class="d-flex" id="desc1">
                    <div class="col-lg-6"></div>
                    <div class="col-lg-6 text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto pl-5 text-center text-lg-right">
                                <h4 class="text-white text-center">Facilite</h4>
                                <!-- <img src="assets/img/logoadm.png" alt="logo" height="60"> -->
                                <p class="mb-0 text-white-50">Aumente suas vendas, e estruture seus projetos, com a mais completa central de relacionamento com cliente para pequenos negócios, e você ainda conta com gestão financeira e uma área exclusiva para assinantes, com cases reais de sucesso de pequenos empreendedores, sabendo como cada um fez para superar os desafios na sua área!</p>
                                <hr class="d-none d-lg-block mb-0 ml-0" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="spacing"> </div>
            <!-- Project Two Row-->
            <div class="row justify-content-start no-gutters mb-5 mb-lg-0" id="project2">
                <!-- <div class="col-lg-6"><img class="img-fluid" src="assets/img/revendaplus.png" alt="" /></div> -->
                <div class="d-flex" id="desc2">
                    <div class="col-lg-6 text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-left">
                                <h4 class="text-white text-center">Revenda Plus</h4>
                                <p class="mb-0 text-white-50">Gestão e vendas são dois pilares fundamentais para qualquer revenda que queira se manter e crescer no mercado. Com mais de 10 ano de experiência no mercado automotivo, Revenda Plus é um sistema para revenda de veículos e concessionárias, quem tem vendas e gestão sobe controle, tem o sucesso da sua empresa na palma da mão.</p>
                                <hr class="d-none d-lg-block mb-0 mr-0" />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6"></div>
                </div>
            </div>
            <!--
				<div class="row justify-content-center no-gutters mb-5 mb-lg-0">
                    <div class="col-lg-6"><img class="img-fluid" src="assets/img/dynamirifas.png" alt="" /></div>
                    <div class="col-lg-6">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-left">
                                    <h4 class="text-white">Dýnami Rifas</h4>
                                    <p class="mb-0 text-white-50">A máis fácil e completa plataforma de rifas online, sem mensalidade, sem pagar comissão, sem pagar taxas anuais, utilizada em mais de 15 países por mais de 70 mil usuários. O dýnami rifas ajuda pessoas que precisam de dinheiro para diversas situações!</p>
                                    <hr class="d-none d-lg-block mb-0 ml-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                -->
        </div>
    </section>
    <!-- Formulario -->
    <section class="d-flex mb-5 pb-2" style="background-color: rgb(99, 99, 99)" id="contact">
        <div class="container d-flex flex-column">
            <img class="align-self-center pt-4" src="assets/img/mail.png" style="width:100px">
            <h3 class="align-self-center pb-1 text-light">Entre em Contato</h3>
            <form onsubmit="event.preventDefault()" class="rounded-4 container d-flex flex-column p-4 justify-content-center gap-4 w-50" id="myForm">
                <input class="border border-light rounded-5 p-2" type="text" name="nome" placeholder="Escreva seu nome" require>
                <input class="border border-light rounded-5 p-2 fone" type="tel" name="fone" placeholder="Escreva seu telefone" data-mask="" require>
                <input class="border border-light rounded-5 p-2" type="email" name="email" placeholder="Escreva seu email" require>
                <select class="rounded-4 p-2" name="sis" require>
                    <option value="">Selecione o Projeto</option>
                    <option value="Facilite">Facilite</option>
                    <option value="Revenda Plus">Revenda Plus</option>
                </select>
                <textarea class="border border-light rounded-4 p-2" rows="3" name="obs" placeholder="Deixe uma mensagen"></textarea>

            </form>
            <button class="size-2 mt-2 border rounded-5 p-2 mb-3 w-25 align-self-center">Enviar</button>
        </div>
    </section>
    <!-- Signup-->
    <section class="signup-section" id="signup">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-lg-5 text-center" style='color: white'>
                    <h2><strong>Sobre Nós</strong></h2>
                    <p>
                        A empresa Dýnami surgiu em 2016, fundada por Jonathan Zeferino, com foco em conectar pessoas aos seus sonhos através do desenvolvimento de software web.
                        <br>
                        Especializada em desenvolvimento para Web, sempre com sua qualidade nos serviços, com suporte por profissionais muito bem capacitados e com conhecimento do sistema e suas rotinas diárias.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact-->
    <section class="contact-section bg-black" style='display: inline'>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Endereço</h4>
                            <hr class="my-4" />
                            <div class="small text-black-50"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-envelope text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">E-mail</h4>
                            <hr class="my-4" />
                            <div class="small text-black-50"><a href="#!">atendimento@dynami.net</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-mobile-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Contato</h4>
                            <hr class="my-4" />
                            <div class="small text-black-50">(48) 99947-5753</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="social d-flex justify-content-center">
                <a class="mx-2" href="https://instagram.com/dynamitecnologia"><i class="fab fa-instagram"></i></a>
                <a class="mx-2" href="https://www.facebook.com/dynamisistemas"><i class="fab fa-facebook-f"></i></a>
                <a class="mx-2" href="#!"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer bg-black small text-center text-white-50">
        <div class="container">Copyright © Dynami 2021</div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>



    <div class='container-fluid .d-none' style='position: fixed;  bottom: 0; z-index: 999999999999;'>
        <div class='row'>
            <a href="https://instagram.com/suarifadigital" target='_blank' class='col-4 d-flex flex-column' id="media1">
                <i class="fab fa-instagram fa-2x align-self-center" style='color: #fff'></i>
            </a>
            <a href="https://api.whatsapp.com/send?phone=5548999475753" target='_blank' class='col-4 d-flex flex-column' id="media2">
                <i class="fab fa-whatsapp fa-2x align-self-center" style='color: #fff'></i>
            </a>
            <a href="https://facebook.com/dynamisistemas" target='_blank' class='col-4 d-flex flex-column' id="media3">
                <i class="fab fa-facebook fa-2x align-self-center" style='color: #fff'></i>
            </a>
        </div>
    </div>
    </div>
</body>

</html>