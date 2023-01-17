URL Compressor/Shorter


Project Description-

As per my understanding, The presently used some URL's are long enough to get mismatched during copying and pasting function. Therefore I have developed a system where the URL's can be shortened and you can also specify the no. of times it can be used by the user.

Here I have used a php framework named Laravel for frontend and  mysql as database. In this project an user can simply login to the system and generate unlimited no of URL's as per his/her requirment and share the generated url as per requirment and also the user can restrict the no of views in their respective URL's. 

I have used Laravel default authentication package using Bootstrap for Login, Registration, Forget Password etc etc. User can login with email_id and password by the credential given by them at the time of registration.

And to generate a shorter URL I have created a simple form with two fields only.In the first field a user can enter an URL that need to be shortend and in the next field user can enter  No of time it can be clicked. Then click on the submit button to save the data. while saveing I have generated a shortlink using current date time and a four digit random number as well as characters. User can copy the link and paste it in URL to use it.


In database i have created a table named  u_r_l_generators . columns are-

    1.  id Primary	bigint(20)	(auto increment)
	2.	url	varchar(255)		(url given by the user)
	3.	maximum_limit	int(11)		(no of times it can be clicked)
	4.	clicked	int(11)			(no. of time it has been clicked)
	5.	short_url	varchar(255) 	(newly generated URL)
	6.	user_id	varchar(255)	(created user id)
	


