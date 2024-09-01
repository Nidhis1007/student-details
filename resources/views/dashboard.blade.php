<!DOCTYPE html>
<!---Coding By CodingLab | www.codinglabweb.com--->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="../style2.css" />
  </head>
  <style type="text/css">

  	.submit-btn {
            text-decoration: none;
            color: black; /* Default color */
            padding: 10px; /* Optional: Adds padding to the button */
            border: 0px solid black; /* Optional: Adds border */
            border-radius: 5px; /* Optional: Rounds the corners */
    }

  	.submit-btn:hover {
            color: white; /* Change text color on hover */
            background-color: black; /* Change background color on hover */
        }
  </style>
  <body>
    <section class="container" style="max-width:1200px">
    <div style="display: inline-flex;margin-left: 80%;">
    <a href="/viewstudentlist" style="text-decoration: none;" class="submit-btn">View Student</a>&nbsp;&nbsp;&nbsp;
		<a href="/logout" style="text-decoration: none;" class="submit-btn">Logout</a>
	  </div>
		<form name="login_form" action="/addstudents" method="POST">
			<div class="signup">
				<h2 class="form-title" id="signup"><span>Welcome </span> {{ $user->fname }} {{ $user->lname }} </h2>
				</br>
				<button class="submit-btn btn-warning form-control">Click Here to Add Students</button>
			  </br>
				@csrf
			</div>
		</form>
	</br></br>
		 <!-- Display message if it exists -->
        @if(isset($message) && $message)
            <ul>
                <li style="color: red;list-style-type: none;">{{ $message }}</li>
            </ul>
        @endif

        @if(isset($students) && $students->isNotEmpty())
      	<table border="1" style="border-collapse: collapse;text-align: center;">
            <thead>
                <tr>
                    <th width="10%">First Name</th>
                    <th width="10%">Last Name</th>
                    <th width="10%">Roll No</th>
                    <th width="10%">Father's Name</th>
                    <th width="10%">Mother's Name</th>
                    <th width="10%">Gender</th>
                    <th width="10%">Phone Number</th>
                    <th width="10%">Edit</th>
                    <th width="10%">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->fname }}</td>
                        <td>{{ $student->lname }}</td>
                        <td>{{ $student->rno }}</td>
                        <td>{{ $student->fathername }}</td>
                        <td>{{ $student->mothername }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->phonenumber }}</td>
                        <td><a href="/update/{{ $student->id }}" class="btn btn-warning">Edit</a></td>
                        <td><a onclick="return confirm('Are you sure?')" href="/delete/{{ $student->id }}" class="btn btn-warning">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
	</section>
  </body>
</html>