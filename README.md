###What's all this then?
This is an example of a simple database connector written in PHP using BootStrap with jQuery for the front-end. The primary purpose for this to exist is to provide an example of a working database abstraction class that allows simple operation in an application that isn't completely dependant on PHP. The reason this was created was for use with smaller webhosts that don't provide a great deal of low-level access to PHP code so that installing a functional framework isn't always possible as well as for use with smaller applications that may not need all the script overhead. The idea is that this should be lean and mean while still being simple and functional.
A demo for this project is locatied [here](http://doginflight.com/db_class). 
Feel free to check it out, fork it, modify it, whatever you'd like. If you have some suggestions for improvements, I'm quite open to them.</p>

####sCRUD
CRUD is an acronym that means Create - Read - Update - Delete. It's a simple description of the actions relating to the typical use of a web applications.
Somethimes you'll see the 's' leading CRUD as it stands for 'search'. I personally don't really follow the distinction, but to each their own.
A somewhat deeper explanation can be found on the [Wikipedia entry](http://en.wikipedia.org/wiki/Create,_read,_update_and_delete)

| Operation        | SQL    | HTTP        |
| -----------------|--------|-------------|
| Create           | INSERT | PUT / POST  |
| Read (Retrieve)  | SELECT | GET         |
| Update (Modify)  | UPDATE | PUT / PATCH |
| Delete (Destroy) | DELETE | DELETE      |

####Contact
Who am I? Who are you?!? Seriously, though... there are plenty of ways to get a hold of me... if you want... 

* [Twitter](http://twitter.com/fyrephlie)
* [GitHub](http://github.com/fskirschbaum)
* [Website](http://doginflight.com/fskirschbaum)