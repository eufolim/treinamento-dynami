<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=ai, initial-scale=1.0">
    <title>Document</title>
    <!-- Jquery and AJAX -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://ajax.googlesapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <!-- scripts -->
    <script>
        $(document).ready(function() {
            $("button").click(function() {
                let fone = [$("input[id=1]").val(),
                     $("input[id=2]").val(), 
                     $("input[id=3]").val(), 
                     $("input[id=4]").val(),
                     $("input[id=5]").val()]
                if ($(count(fone)) >= 4) {
                    console.log('1ºif');
                    if (/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(valEmail)) {
                        console.log('2ºif');
                        if (/(?:(^\+\d{2})?)(?:([1-9]{2})|([0-9]{3})?)(\d{4,5})(\d{4})$/.test(valFone)) {
                            console.log('3ºif');
                            console.log(fone);
                            $.post("insert.php", {
                                fones: fone
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

<body>
    <main>
        <form onsubmit="event.preventDefault()" method="$_POST">
            <input type="tel" name="fone[]" id="1">
            <input type="tel" name="fone[]" id="2">
            <input type="tel" name="fone[]" id="3">
            <input type="tel" name="fone[]" id="4">
            <input type="tel" name="fone[]" id="5">
            <button type="submit" name="send" id="test">Enviar</button>
        </form>
    </main>
</body>

</html>