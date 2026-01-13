/*

Validaciones para el formulario
Álvaro Gómez González

*/

document.getElementById('formT').addEventListener("submit",function(event){
    
    event.preventDefault();

    if(validarFormulario())
    {
        document.getElementById('formT').submit();//impide que envie nada al php
    }
});

document.getElementById('password').addEventListener("change",function(){
    limpiaError('password');
});
document.getElementById('idusuario').addEventListener("change",function(){
    limpiaError('idusuario');
});

function validarFormulario()
{
    let pass = document.getElementById('password').value;
    let identi = document.getElementById('idusuario').value;
    let correcto = true;
    var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[$@$!%*?&\.,])([A-Za-z\d$@$!%*?&]|[^ ]){8,15}$/;

    if (Number.isNaN(pass))
    {
        marcarError('password','La contraseña no puede estar vacia');
        correcto = false;
    }
    else
    {
        if(!regex.exec(pass))
        {
            marcarError('password','Formato de contraseña incorrecto');
            correcto = false;

        }
    }

    if (Number.isNaN(identi) || pass.length < 6 || pass.length > 15)
    {
        marcarError('idusuario','El usuario no puede estar vacio y debe ser entre 6 a 14 caracteres');
        correcto = false;
    }

    return correcto;
}

function marcarError(id,msg)
{
    document.getElementById(id).style.borderColor="red";
    document.getElementById(id+'Help').innerHTML = msg;
    document.getElementById(id+'Help').style.visibility="visible";
}

function limpiaError(id)
{
    document.getElementById(id).style.borderColor="#dee2e6";
    document.getElementById(id+'Help').style.visibility="hidden";
}