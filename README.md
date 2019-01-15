# Flix555
A PHP class for the Flix555 API

### How To Use
Please check the _flx-how2use.php_ file for all possible usages of the class

### PHP version
Tested with PHP 7.2

### Note
- Flixx555 API does not have an easy way to upload files from your local computer to the upload server. You have to get the *sess_id* in order to upload a file. To retrieve the *sess_id* you have to login in with your login/password credentials first and grab it from the upload form (which makes me wonder why do they even have an API; the whole point of having an API is that you can automate stuff easily with just something simple as a key without using your main credentials right?). 
- Also, it is not possible to get the direct link to files (even though its in the [documentation](https://flix555.docs.apiary.io)). 
- Files that contain special characters, like `[]-` will get replaced by `_` (and for some reason spaces get stripped before and after these special characters)

**CONCLUSION**

Decent service when you're going to do stuff manually; Crap when you're going for automation. Examples of "better" alternatives are: openload, streamango, vidoza etc.
