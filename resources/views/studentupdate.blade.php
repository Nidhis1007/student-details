<!DOCTYPE html>
<!---Coding By CodingLab | www.codinglabweb.com--->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Update Form</title>
    <!---Custom CSS File--->
    <link rel="stylesheet" href="../style2.css" />
  </head>
  <body>
    <section class="container">
      <header>Student Update Form</header>
      <form name="register_form" action="/updatestudent" method="POST" class="form">
        <div class="input-box">
          <label>First Name</label>
          <input type="hidden" name="id" id="id" value={{$result["id"]}}>
          <input type="text" name="sname" id="sname" class="input" placeholder="First Name" value={{$result["fname"]}}>
          @error('fname')<div class="alert alert-danger">{{ $message }}</div>@enderror<br/>
        </div>

		<div class="input-box">
          <label>Last Name</label>
          <input type="text" name="slname" id="slname" class="input" placeholder="Last Name" value={{$result["lname"]}} />
          @error('lname')<div class="alert alert-danger">{{ $message }}</div>@enderror<br/>
        </div>

        <div class="input-box">
          <label>Registration Number</label>
          <input type="text" name="rno" id="rno" class="input" placeholder="Registration Number"  value={{$result["rno"]}}>
          @error('rno')<div class="alert alert-danger">{{ $message }}</div>@enderror<br/>
        </div>

        <div class="input-box">
          <label>Father's Name</label>
          <input type="text" name="fname" id="fname" class="input" placeholder="Father's Name"  value={{$result["fathername"]}}>
        </div>

        <div class="input-box">
          <label>Mother's Name</label>
          <input type="text" name="mname" id="mname" class="input" placeholder="Mother's Name" value={{$result["mothername"]}}>
        </div>

        <div class="gender-box">
          <h3>Gender</h3>
          <div class="gender-option">
            <div class="gender">
              <input type="radio" id="check-male" name="gender" value="male" @if($result['gender'] == 'male') checked @endif />
              <label for="check-male">male</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-female" value="female" name="gender" @if($result['gender'] == 'female') checked @endif />
              <label for="check-female">Female</label>
            </div>
          </div>
        </div>

        <div class="column">
          <div class="input-box">
            <label>Phone Number</label>
            <input type="text" name="phonenumber" id="phonenumber" placeholder="Enter phone number" value="{{$result["phonenumber"]}}" />
            @error('phone_number')<div class="alert alert-danger">{{ $message }}</div>@enderror<br/>
          </div>
          <div class="input-box">
            <label>Photo</label>
            <input type="file" name="photo" id="photo" class="input" />
          </div>
        </div>
        <button type="submit">Submit</button>
        @csrf
      </form>
    </section>
  </body>
</html>
