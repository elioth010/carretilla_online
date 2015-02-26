<html>
<head>
	<title></title>
</head>
<body>
	<h1>Usuarios</h1>
	<ul>
	  @foreach($users as $usuario)
	  <!-- Equivalente en Blade a <?php foreach ($users as $usuario) ?> -->

	     <li> {{ $usuario->username.' '.$usuario->name }} </li>
	     <!-- Equivalente en Blade a <?php echo $usuario->username.' '.$usuario->name ?> -->
	  @endforeach 
	</ul>
</body>
</html>