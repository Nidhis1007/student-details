<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
<script src="example.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<div class="form-structor">
	{{(isset($status)?$status:'')}}
	@if (session('status'))
	    <div class="alert alert-success" style="background-color: red; color: white;">
	        {{ session('status') }}
	    </div>
	@endif
	<form name="login_form" action="/register/userlogin" method="POST">
		<div class="signup">
			<h2 class="form-title" id="signup"><span>or</span>Log in</h2>
			<div class="form-holder">
				<input type="email" name="email" id="email" class="input" placeholder="Email" />
				<input type="password" name="password" id="password" class="input" placeholder="Password" />
			</div>
			<button type="submit" name="action1" value="login" class="submit-btn">Log in</button>
			@csrf
		</div>
	</form>
	<form name="register_form" action="/register/createuser" method="POST">
		<div class="login slide-up">
			<div class="center">
				<h2 class="form-title" id="login"><span>or</span>Sign up</h2>
				<div class="form-holder">
					<input type="text" name="fname" id="fname" class="input" placeholder="First Name" value={{old('fname');}}>
					<label style="color:red;">{{$errors->first('fname')}}</label>
					<input type="text" name="lname" id="lname" class="input" placeholder="Last Name" value={{old('lname');}}>
					<label style="color:red;">{{$errors->first('lname')}}</label>
					<input type="text" name="gender" id="gender" class="input" placeholder="Gender" value={{old('gender');}}>
					<label style="color:red;">{{$errors->first('gender')}}</label>
					<input type="text" name="email" id="email" class="input" placeholder="Email" value={{old('email');}}>
					<label style="color:red;">{{$errors->first('email')}}</label>
					<input type="password" name="password" id="password" class="input" placeholder="Password" value={{old('password');}}>
					<label style="color:red;">{{$errors->first('password')}}</label>
					<input type="number" name="phonenumber" id="phonenumber" class="input" placeholder="Phone Number" value={{old('phonenumbe');}}>
					<label style="color:red;">{{$errors->first('phonenumber')}}</label>
					</div>
					<button type="submit" name="action" value="signup" class="submit-btn">Sign up</button>
					@csrf
					
			</div>
		</div>
	</form>
</div>
</html>