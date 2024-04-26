<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>User Profile</title>
    <link rel="stylesheet" href="{{ asset('css/profiledone.css') }}">
</head>

<body>
	@include('homebt')
    
    <header>
        <h1>User Profile</h1>
	</header>
	<main>
        <section>
            <h2>User Information</h2>
			<ul>
                
				<li><strong>Name:</strong> {{ $cusinfo->fname }} {{ $cusinfo->lname }}</li>
				<li><strong>Username:</strong> {{ $cusinfo->username }}</li>
				<li><strong>Email:</strong> {{ $cusinfo->email }}</li>
				<li><strong>Gender:</strong> {{ $cuspro->gender }}</li>
				<li><strong>Age Range:</strong> {{ $cuspro->age }} years</li>
				<li><strong>Height:</strong> {{ $cuspro->height }} inch</li>
				<li><strong>Weight:</strong> {{ $cuspro->current_weight }} kg</li>
			</ul>
		</section>
        
		<section>
            <h2>Profile Picture</h2>
			<img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Profile Picture">
		</section>
	</main>
    
</body>

</html>