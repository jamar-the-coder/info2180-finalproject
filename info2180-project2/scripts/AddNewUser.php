
<link rel="stylesheet" type="text/css" href="../styles/newuserstyles.css">
<h1>New User</h1>
        <form class="newUserAdd" name="newUser" id = "newUser"  onsubmit="return submitLogIn()">
                <div>
                    <label for="firstname">First Name</label>
                    <input id="firstname" type="text" name="firstname" value="" autocomplete="off"> 
                </div>
                <div>
                    <label for="lastname">Last Name</label>
                    <input id="lastname" type="text" name="lastname" value="" autocomplete="off">   
                </div>
                <div>
                    <label for= "email">Email</label>
                    <input id="email" type="text" name="email" value=""  autocomplete="off">
                </div>
                <div>
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" value=""  autocomplete="off">
                </div>
                
                <div>
                    <input type="submit" id="submitbtn" value="Submit"/>
                </div>
            </form>
