# MongoPhpInjection
Prerequisites for the project: Apache Server, MongoDB, PHP 5+   
Activity:
#Login as genuine user, and fetch all records based on login post request. 
Using Hackbar add-on, try to intercept the post request and change/modify parameters as below:
 username=pkaur&password=pkaur&submit=Login

Modify above request to username[$ne]=1&password[$ne]=1&submit=Login

#Bypass authentication by logging into other user’s account following similar procedure.
From above request, we will get to know the usernames of all users, Now run the query as below:
username=john&password[$ne]=1&submit=Login

#Update other user’s information as below:
Login as John and click on Edit link, steal his User ID in following ways:
Inspecting through Firebug when user id is stored in a hidden field.
Grab it from Cookie value.
Get it from GET URL request. 

#Login a own users’ account an@d while edit profile information, inspect and modify user id with the stolen id, this will update other’s information with attacker’s desired inputs.

#Delete other user’s account, steal user Id of other user by logging into their account, append this Id to the delete request.


 
