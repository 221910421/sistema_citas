<!DOCTYPE html>
<html>

<head>
<style>
 *{box-sizing:border-box;}

form{
	width:300px;
	padding:16px;
	border-radius:10px;
	margin:auto;
	background-color:#ccc;
}

form label{
	width:72px;
	font-weight:bold;
	display:inline-block;
}

form input[type="text"],
form input[type="email"]{
	width:180px;
	padding:3px 10px;
	border:1px solid #f6f6f6;
	border-radius:3px;
	background-color:#f6f6f6;
	margin:8px 0;
	display:inline-block;
}

form input[type="submit"]{
	width:100%;
	padding:8px 16px;
	margin-top:32px;
	border:1px solid #000;
	border-radius:5px;
	display:block;
	color:#fff;
	background-color:#000;
} 

form input[type="submit"]:hover{
	cursor:pointer;
}

textarea{
	width:100%;
	height:100px;
	border:1px solid #f6f6f6;
	border-radius:3px;
	background-color:#f6f6f6;			
	margin:8px 0;
	/*resize: vertical | horizontal | none | both*/
	resize:none;
	display:block;
}
  </style>
  <title>Iniciar sesión</title>
</head>

<body>
  <div class="login-page">
    <div class="form">
      <form class="login-form" action="{{route('login')}}" method="POST">
        {{ csrf_field() }}
        <label>Ingresa tus datos correspondientes para poder iniciar sesión</label><br>
        <input type="text" placeholder="Usuario o correo" required name="usuario" />
        <input type="password" placeholder="contraseña" minlength="8" required name="contraseña" />
        <button>Iniciar sesión</button>
      </form>
    </div>
  </div>

</body>

</html>